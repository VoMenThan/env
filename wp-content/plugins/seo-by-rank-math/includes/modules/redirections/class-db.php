<?php
/**
 * The Redirection module database operations
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Modules\Redirections
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Modules\Redirections;

use RankMath\Helper;
use TheLeague\Database\Database;

defined( 'ABSPATH' ) || exit;

/**
 * DB class.
 */
class DB {

	/**
	 * Get query builder.
	 *
	 * @return Query_Builder
	 */
	private static function table() {
		return Database::table( 'rank_math_redirections' );
	}

	/**
	 * Get counts of record group by active and inactive.
	 *
	 * @return array
	 */
	public static function get_counts() {
		static $redirction_counts;
		if ( ! is_null( $redirction_counts ) ) {
			return $redirction_counts;
		}

		$redirction_counts = self::table()
			->selectSum( 'status = "active"', 'active' )
			->selectSum( 'status = "inactive"', 'inactive' )
			->selectSum( 'status = "trashed"', 'trashed' )
			->one( ARRAY_A );

		$redirction_counts['all'] = $redirction_counts['active'] + $redirction_counts['inactive'];

		return $redirction_counts;
	}

	/**
	 * Get redirections.
	 *
	 * @param  array $args Array of filters apply to query.
	 * @return array
	 */
	public static function get_redirections( $args ) {
		$args = wp_parse_args( $args, array(
			'orderby' => 'id',
			'order'   => 'DESC',
			'limit'   => 10,
			'paged'   => 1,
			'search'  => '',
			'status'  => 'any',
		) );

		$table = self::table()->found_rows()->page( $args['paged'] - 1, $args['limit'] );
		if ( ! empty( $args['search'] ) ) {
			$table->whereLike( 'sources', $args['search'] );
			$table->orWhereLike( 'url_to', $args['search'] );
		}

		if ( ! empty( $args['status'] ) && 'any' !== $args['status'] && in_array( $args['status'], array( 'active', 'inactive', 'trashed' ) ) ) {
			$table->where( 'status', $args['status'] );
		} else {
			$table->where( 'status', '!=', 'trashed' );
		}

		if ( ! empty( $args['orderby'] ) && in_array( $args['orderby'], array( 'id', 'url_to', 'header_code', 'hits', 'last_accessed' ) ) ) {
			$table->orderBy( $args['orderby'], $args['order'] );
		}

		$redirections = $table->get( ARRAY_A );
		$count        = $table->get_found_rows();

		return compact( 'redirections', 'count' );
	}

	/**
	 * Match redirections for uri
	 *
	 * @param  string $uri Current uri to match.
	 * @return object
	 */
	public static function match_redirections( $uri ) {
		if ( empty( $uri ) ) {
			return false;
		}

		$table = self::table()->where( 'status', 'active' )->orderby( 'updated', 'desc' );

		// Generate words.
		$words = self::remove_stopwords( $uri );

		// Generate where cluase.
		$where  = array();
		$source = maybe_serialize( array(
			'pattern'    => $uri,
			'comparison' => 'exact',
		) );

		$where[] = array( 'sources', 'like', $table->esc_like( $source ) );
		foreach ( $words as $word ) {
			$where[] = array( 'sources', 'like', $table->esc_like( $word ) );
		}

		$redirections = $table->where( $where, 'or' )->get( ARRAY_A );

		return self::compare_redirections( $redirections, $uri );
	}

	/**
	 * Compare given redirections
	 *
	 * @param  array  $redirections Array of redirection matched.
	 * @param  string $uri          Uri to comapre with.
	 * @return array|bool
	 */
	private static function compare_redirections( $redirections, $uri ) {
		foreach ( $redirections as $redirection ) {
			$redirection['sources'] = maybe_unserialize( $redirection['sources'] );
			foreach ( $redirection['sources'] as $source ) {
				if ( Helper::str_comparison( trim( $source['pattern'], '/' ), $uri, $source['comparison'] ) ) {
					return $redirection;
				}
			}
		}

		return false;
	}

	/**
	 *  Get source by id.
	 *
	 * @param  int    $id     Id of the record to search for.
	 * @param  string $status Status to filter with.
	 * @return array
	 */
	public static function get_redirection_by_id( $id, $status = 'all' ) {
		$table = self::table()->where( 'id', $id );

		if ( 'all' !== $status ) {
			$table->where( 'status', $status );
		}
		$item            = $table->one( ARRAY_A );
		$item['sources'] = maybe_unserialize( $item['sources'] );

		return $item;
	}

	/**
	 * Get stats for dashboard widget.
	 *
	 * @return int
	 */
	public static function get_stats() {
		return self::table()->selectCount( '*', 'total' )->selectSum( 'hits', 'hits' )->one();
	}

	/**
	 * Add a new record.
	 *
	 * @param array $args Values to insert.
	 */
	public static function add( $args = array() ) {
		if ( empty( $args ) ) {
			return;
		}

		$args = wp_parse_args( $args, array(
			'sources'     => '',
			'url_to'      => '',
			'header_code' => '301',
			'hits'        => '0',
			'status'      => 'active',
			'created'     => current_time( 'mysql' ),
			'updated'     => current_time( 'mysql' ),
		));

		$args['sources'] = maybe_serialize( $args['sources'] );

		return self::table()->insert( $args, array( '%s', '%s', '%d', '%d', '%s', '%s', '%s' ) );
	}

	/**
	 * Update a record.
	 *
	 * @param array $args Values to update.
	 */
	public static function update( $args = array() ) {
		if ( empty( $args ) ) {
			return;
		}

		$args = wp_parse_args( $args, array(
			'id'          => '',
			'sources'     => '',
			'url_to'      => '',
			'header_code' => '301',
			'status'      => 'active',
			'updated'     => current_time( 'mysql' ),
		));

		$id = absint( $args['id'] );
		if ( 0 === $id ) {
			return false;
		}

		$args['sources'] = maybe_serialize( $args['sources'] );
		unset( $args['id'] );

		Cache::purge( $id );
		return self::table()->set( $args )->where( 'id', $id )->update();
	}

	/**
	 * Add or Update record
	 *
	 * @param  array $redirection Single redirection item.
	 * @return int
	 */
	public static function update_iff( $redirection ) {
		// Update record.
		if ( isset( $redirection['id'] ) ) {
			self::update( $redirection );
			return $redirection['id'];
		}

		// Add record.
		return self::add( $redirection );
	}

	/**
	 * Update counter for redirection.
	 *
	 * @param  object $redirection Record to update.
	 * @return int|false The number of rows updated, or false on error.
	 */
	public static function update_access( $redirection ) {
		if ( empty( $redirection ) ) {
			return;
		}

		$args['hits']          = absint( $redirection['hits'] ) + 1;
		$args['last_accessed'] = current_time( 'mysql' );

		self::table()->set( $args )->where( 'id', $redirection['id'] )->update();
	}

	/**
	 * Delete multiple record.
	 *
	 * @param  array $ids           Array of ids to delete.
	 * @return int Number of records deleted.
	 */
	public static function delete( $ids ) {
		Cache::purge( $ids );
		return self::table()->whereIn( 'id', (array) $ids )->delete();
	}

	/**
	 * Change record status to active or inactive.
	 *
	 * @param  array $ids     Array of ids.
	 * @param  bool  $status Active=1, Inactive=0.
	 * @return int Number of records updated.
	 */
	public static function change_status( $ids, $status ) {
		$allowed = array( 'active', 'inactive', 'trashed' );
		if ( ! in_array( $status, $allowed ) ) {
			return false;
		}

		return self::table()->set( 'status', $status )
			->set( 'updated', current_time( 'mysql' ) )
			->whereIn( 'id', (array) $ids )->update();
	}

	/**
	 * Cleans trashed redirects after 30 days.
	 *
	 * @return int Number of records deleted.
	 */
	public static function periodic_clean_trash() {
		$ids = self::table()->select( 'id' )->where( 'status', 'trashed' )->where( 'updated', '<=', date( 'Y-m-d', strtotime( '30 days ago' ) ) )->get( ARRAY_A );
		$ids = wp_list_pluck( $ids, 'id' );
		Cache::purge( $ids );
		return self::table()->where( 'status', 'trashed' )->where( 'updated', '<=', date( 'Y-m-d', strtotime( '30 days ago' ) ) )->delete();
	}

	/**
	 * Deletes all trashed redirections and associated sources
	 *
	 * @return int Number of records deleted.
	 */
	public static function clear_trashed() {
		$ids = self::table()->select( 'id' )->where( 'status', 'trashed' )->get();
		$ids = wp_list_pluck( $ids, 'id' );
		Cache::purge( $ids );
		return self::table()->where( 'status', 'trashed' )->delete();
	}

	/**
	 * Removes stopword from the sample permalink that is generated in an AJAX request.
	 *
	 * @param  string $uri The uri to remove words from.
	 * @return array
	 */
	private static function remove_stopwords( $uri ) {
		static $redirection_stop_words;

		if ( is_null( $redirection_stop_words ) ) {
			$redirection_stop_words = explode( ',', esc_html__( "a,about,above,after,again,against,all,am,an,and,any,are,as,at,be,because,been,before,being,below,between,both,but,by,could,did,do,does,doing,down,during,each,few,for,from,further,had,has,have,having,he,he'd,he'll,he's,her,here,here's,hers,herself,him,himself,his,how,how's,i,i'd,i'll,i'm,i've,if,in,into,is,it,it's,its,itself,let's,me,more,most,my,myself,nor,of,on,once,only,or,other,ought,our,ours,ourselves,out,over,own,same,she,she'd,she'll,she's,should,so,some,such,than,that,that's,the,their,theirs,them,themselves,then,there,there's,these,they,they'd,they'll,they're,they've,this,those,through,to,too,under,until,up,very,was,we,we'd,we'll,we're,we've,were,what,what's,when,when's,where,where's,which,while,who,who's,whom,why,why's,with,would,you,you'd,you'll,you're,you've,your,yours,yourself,yourselves", 'rank-math' ) );
		}

		// Turn it to an array and strip stop words by comparing against an array of stopwords.
		$words = str_replace( '/', '-', $uri );
		$words = str_replace( '.', '-', $uri );
		$words = explode( '-', $words );
		return array_diff( $words, $redirection_stop_words );
	}
}
