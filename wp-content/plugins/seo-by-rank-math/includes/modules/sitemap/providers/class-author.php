<?php
/**
 * The Sitemap Module
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Modules\Sitemap
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Modules\Sitemap\Providers;

use RankMath\Helper;
use RankMath\Modules\Sitemap\Router;
use RankMath\Traits\Hooker;

defined( 'ABSPATH' ) || exit;

/**
 * Author class.
 */
class Author implements Provider {

	use Hooker;

	/**
	 * Check if provider supports given item type.
	 *
	 * @param  string $type Type string to check for.
	 * @return boolean
	 */
	public function handles_type( $type ) {
		return 'author' === $type;
	}

	/**
	 * Get set of sitemaps index link data.
	 *
	 * @param  int $max_entries Entries per sitemap.
	 * @return array
	 */
	public function get_index_links( $max_entries ) {
		$users = $this->get_users();

		if ( empty( $users ) ) {
			return array();
		}

		$page       = 1;
		$index      = array();
		$user_pages = array_chunk( $users, $max_entries );

		if ( 1 === count( $user_pages ) ) {
			$page = '';
		}

		foreach ( $user_pages as $user_page ) {
			$user    = array_shift( $user_page ); // Time descending, first user on page is most recently updated.
			$index[] = array(
				'loc'     => Router::get_base_url( 'author-sitemap' . $page . '.xml' ),
				'lastmod' => '@' . $user->last_update,
			);

			$page++;
		}

		return $index;
	}

	/**
	 * Get set of sitemap link data.
	 *
	 * @param  string $type         Sitemap type.
	 * @param  int    $max_entries  Entries per sitemap.
	 * @param  int    $current_page Current page of the sitemap.
	 * @return array
	 */
	public function get_sitemap_links( $type, $max_entries, $current_page ) {
		$links = array();
		$users = $this->get_users( array(
			'offset' => ( $current_page - 1 ) * $max_entries,
			'number' => $max_entries,
		) );

		if ( empty( $users ) ) {
			return $links;
		}

		foreach ( $users as $user ) {
			$author_link = get_author_posts_url( $user->ID );
			if ( empty( $author_link ) ) {
				continue;
			}

			$mod = isset( $user->last_update ) ? $user->last_update : $user->user_registered;
			$url = array(
				'loc' => $author_link,
				'mod' => date( DATE_W3C, $mod ),
			);

			/** This filter is documented at includes/modules/sitemap/providers/class-post-type.php */
			$url = $this->do_filter( 'sitemap/entry', $url, 'user', $user );

			if ( ! empty( $url ) ) {
				$links[] = $url;
			}
		}

		return $links;
	}

	/**
	 * Retrieve users, taking account of all necessary exclusions.
	 *
	 * @param  array $args Arguments to add.
	 * @return array
	 */
	protected function get_users( $args = array() ) {

		$defaults = array(
			'meta_key'   => 'last_update',
			'orderby'    => 'meta_value_num',
			'order'      => 'DESC',
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'relation' => 'OR',
					array(
						'key'     => 'rank_math_robots',
						'value'   => 'noindex',
						'compare' => 'NOT LIKE',
					),
					array(
						'key'     => 'rank_math_robots',
						'compare' => 'NOT EXISTS',
					),
				),
			),
		);

		$exclude_roles = Helper::get_settings( 'sitemap.exclude_roles' );
		if ( ! empty( $exclude_roles ) ) {
			$defaults['role__not_in'] = $exclude_roles;
		}

		$exclude = Helper::get_settings( 'sitemap.exclude_users' );
		$exclude = ! $exclude ? $exclude : wp_parse_id_list( $exclude );
		if ( ! empty( $exclude ) ) {
			$defaults['exclude'] = $exclude;
		}

		return get_users( wp_parse_args( $args, $defaults ) );
	}
}
