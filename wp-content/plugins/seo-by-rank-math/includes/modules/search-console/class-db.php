<?php
/**
 * The Analytics module database operations
 *
 * @since      0.9.0
 * @package    RANK_MATH
 * @subpackage RANK_MATH/modules
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Modules\Search_Console;

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
	 * @return \TheLeague\Database\Query_Builder
	 */
	private static function table() {
		return Database::table( 'rank_math_sc_analytics' );
	}

	/**
	 * Search for property.
	 *
	 * @param  string $query Search string.
	 * @return array
	 */
	public static function search( $query ) {
		return self::table()
			->select( 'property' )->selectAvg( 'position', 'position' )
			->where( 'dimension', 'query' )->whereLike( 'property', $query )
			->groupBy( 'property' )->orderBy( 'position', 'desc' )
			->limit( 500 )
			->get();
	}

	/**
	 * Get query for getting data for table
	 *
	 * @param  array $args Arguments.
	 * @return \TheLeague\Database\Query_Builder
	 */
	public static function get_data_query( $args ) {

		$table = self::table()
			->select( 'property' )
			->selectSum( 'clicks', 'clicks' )
			->selectSum( 'impressions', 'impressions' )
			->selectAvg( 'position', 'position' )
			->selectAvg( 'ctr', 'ctr' )
			->groupBy( 'property' );

		if ( ! empty( $args['dimension'] ) ) {
			$table->where( 'dimension', $args['dimension'] );
		}

		if ( ! empty( $args['search'] ) ) {
			$table->whereLike( 'property', $args['search'] );
		}

		if ( ! empty( $args['orderby'] ) && in_array( $args['orderby'], array( 'id', 'property', 'clicks', 'impressions', 'position', 'ctr' ) ) ) {
			$table->orderBy( $args['orderby'], $args['order'] );
		}

		return $table;
	}

	/**
	 * Get data for listing.
	 *
	 * @param  array $args Arguments.
	 * @return array
	 */
	public static function get_data( $args ) {
		$args = wp_parse_args( $args, array(
			'orderby' => 'clicks',
			'order'   => 'DESC',
			'limit'   => 10,
			'paged'   => 0,
			'offset'  => 0,
			'search'  => '',
		) );

		$table = self::get_data_query( $args )->found_rows();
		if ( ! empty( $args['start_date'] ) && ! empty( $args['end_date'] ) ) {
			$table->whereBetween( 'date', array( $args['start_date'], $args['end_date'] ) );
		}

		if ( $args['limit'] > 0 ) {
			$page = absint( $args['paged'] ) - 1;
			$table->page( $page, $args['limit'] );
		}

		$rows  = $table->get( ARRAY_A );
		$count = $table->get_found_rows();

		// Old Set.
		if ( ! empty( $args['prev_start_date'] ) && ! empty( $args['prev_end_date'] ) ) {

			$table->selectCount()->where( 'dimension', 'date' )->whereBetween( 'date', array( $args['prev_start_date'], $args['prev_end_date'] ) );
			$old_total = absint( $table->getVar() );

			$old_rows = array();
			if ( $args['diff'] <= $old_total ) {

				$table = self::get_data_query( $args );
				$table->whereBetween( 'date', array( $args['prev_start_date'], $args['prev_end_date'] ) )->limit( 5000 );

				$old_rows = array();
				foreach ( $table->get( ARRAY_A ) as $row ) {
					$old_rows[ $row['property'] ] = $row;
				}
			}
		}

		return compact( 'rows', 'old_rows', 'count' );
	}

	/**
	 * Get overview data from cache.
	 *
	 * The reason is the data change every day after it is fetched from api.
	 *
	 * @param string $id    ID of the data to fetch.
	 * @param array  $dates Array of dates.
	 * @return mixed
	 */
	public static function get_overview_data_from_cache( $id, $dates ) {
		$key  = 'rank_math_sc_overview_' . $id;
		$data = get_transient( $key );
		if ( false !== $data ) {
			return $data;
		}

		if ( 'keywords' === $id || 'pages' === $id ) {
			$data = self::table()->distinct()->selectCount( 'property', 'count' )
				->where( 'dimension', 'pages' === $id ? 'page' : 'query' )
				->whereBetween( 'date', array( $dates['start_date'], $dates['end_date'] ) )
				->getVar();
		}

		set_transient( $key, $data, DAY_IN_SECONDS );

		return $data;
	}

	/**
	 * Get overview data.
	 *
	 * @param array  $dates      Array of dates.
	 * @param string $dimension (Optional) Dimension to search in values are 'query', 'page' and 'date'.
	 * @return object
	 */
	public static function get_overview_data( $dates, $dimension = 'query' ) {
		$overview = new \stdClass;

		// Overview Data.
		$overview->pages       = absint( self::get_overview_data_from_cache( 'pages', $dates ) );
		$overview->keywords    = absint( self::get_overview_data_from_cache( 'keywords', $dates ) );
		$overview->clicks      = 0;
		$overview->impressions = 0;
		$overview->position    = 0;
		$overview->ctr         = 0;

		// Old  overview data.
		$overview->old_clicks      = 0;
		$overview->old_impressions = 0;
		$overview->old_position    = 0;
		$overview->old_ctr         = 0;

		// Chart Data.
		$rows  = self::get_data_query( array( 'dimension' => $dimension ) )->whereBetween( 'date', array( $dates['start_date'], $dates['end_date'] ) )->get();
		$total = count( $rows );

		foreach ( $rows as $row ) {
			$overview->clicks      += $row->clicks;
			$overview->impressions += $row->impressions;
			$overview->position    += $row->position;
			$overview->ctr         += $row->ctr;
		}

		if ( $total > 0 ) {
			$overview->ctr      = round( $overview->ctr / $total, 2 );
			$overview->position = round( $overview->position / $total, 2 );
		}

		// Previous Chart Data.
		$old_rows  = self::get_data_query( array( 'dimension' => $dimension ) )->whereBetween( 'date', array( $dates['prev_start_date'], $dates['prev_end_date'] ) )->get();
		$old_total = count( $old_rows );

		if ( $dates['diff'] <= $old_total ) {
			foreach ( $old_rows as $row ) {
				$overview->old_clicks      += $row->clicks;
				$overview->old_impressions += $row->impressions;
				$overview->old_position    += $row->position;
				$overview->old_ctr         += $row->ctr;
			}

			if ( $old_total > 0 ) {
				$overview->old_ctr      = round( $overview->old_ctr / $old_total, 2 );
				$overview->old_position = round( $overview->old_position / $old_total, 2 );
			}
		} else {
			$old_rows = false;
		}

		return (object) compact( 'overview', 'rows', 'total', 'old_rows', 'old_total' );
	}

	/**
	 * Add a record.
	 *
	 * @param array  $row Data to insert.
	 * @param string $date Date of creation.
	 * @param string $type Dimension.
	 */
	public static function insert( $row, $date, $type ) {
		self::table()->insert(array(
			'date'        => $date,
			'property'    => $row['keys'][0],
			'clicks'      => $row['clicks'],
			'impressions' => $row['impressions'],
			'position'    => $row['position'],
			'ctr'         => $row['ctr'],
			'dimension'   => $type,
		));
	}

	/**
	 * Delete a record.
	 *
	 * @param  int $days Decide whether to delete all or delete 90 days data.
	 */
	public static function delete( $days ) {
		if ( -1 === $days ) {
			self::table()->truncate();
		} else {
			$start = date( 'Y-m-d H:i:s', strtotime( '-1 days' ) );
			$end   = date( 'Y-m-d H:i:s', strtotime( '-90 days' ) );

			self::table()->whereBetween( 'date', array( $end, $start ) )->delete();
		}
		self::purge_cache();

		return true;
	}

	/**
	 * Check if a date exists in the sysyem.
	 *
	 * @param  string $date Date.
	 * @return boolean
	 */
	public static function date_exists( $date ) {
		$id = self::table()->select( 'id' )->where( 'dimension', 'date' )
			->where( 'date', $date . ' 00:00:00' )->where( 'property', $date )->getVar();

		return $id > 0 ? true : false;
	}

	/**
	 * Check if table is empty.
	 *
	 * @return boolean
	 */
	public static function is_empty() {
		$key  = 'rank_math_sc_is_empty';
		$data = get_transient( $key );
		if ( false !== $data ) {
			return $data;
		}

		$count = absint( self::table()->selectCount()->getVar() );
		$data  = $count > 0 ? false : true;

		set_transient( $key, $data, DAY_IN_SECONDS );
		return $data;
	}

	/**
	 * Get search console table info.
	 *
	 * @return array
	 */
	public static function info() {
		global $wpdb;

		$key  = 'rank_math_sc_info';
		$data = get_transient( $key );
		if ( false !== $data ) {
			return $data;
		}

		$days = $wpdb->get_var( 'SELECT COUNT(DISTINCT DATE(date)) as days FROM ' . $wpdb->prefix . 'rank_math_sc_analytics' ); // WPCS: unprepared SQL OK.
		$rows = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . $wpdb->prefix . 'rank_math_sc_analytics' ); // WPCS: unprepared SQL OK.
		$size = $wpdb->get_var( 'SELECT SUM((data_length + index_length)) AS size FROM information_schema.TABLES WHERE table_schema="' . $wpdb->dbname . '" AND (table_name="' . $wpdb->prefix . 'rank_math_sc_analytics")' ); // WPCS: unprepared SQL OK.

		$data = compact( 'days', 'rows', 'size' );

		set_transient( $key, $data, DAY_IN_SECONDS );
		return $data;
	}

	/**
	 * Get data for weekly email.
	 *
	 * @param  array $data Array of data to search within.
	 * @return array
	 */
	public static function data_info( $data ) {
		$option_key = 'rank_math_sc_' . md5( json_encode( $data ) );
		$data_info  = get_transient( $option_key );
		if ( false !== $data_info ) {
			return $data_info;
		}

		$table = self::table();

		// Overview Data.
		$pages    = absint( $table->distinct()->selectCount( 'property', 'count' )->where( 'dimension', 'page' )->getVar() );
		$keywords = absint( $table->distinct()->selectCount( 'property', 'count' )->where( 'dimension', 'query' )->getVar() );

		// Search Console Data.
		$totals = $table->selectSum( 'clicks', 'clicks' )
			->selectSum( 'impressions', 'impressions' )
			->selectAvg( 'position', 'position' )
			->selectAvg( 'ctr', 'ctr' )
			->whereBetween( 'date', array( $data['start_date'], $data['end_date'] ) )->one();

		$data_info = compact( 'keywords', 'pages', 'totals' );
		set_transient( $option_key, $data_info, DAY_IN_SECONDS * 7 );

		return $data_info;
	}

	/**
	 * Purge SC transient
	 */
	public static function purge_cache() {
		$table = Database::table( 'options' );
		$table->whereLike( 'option_name', 'rank_math_sc_' )->delete();
	}
}
