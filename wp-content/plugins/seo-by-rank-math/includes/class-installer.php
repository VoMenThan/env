<?php
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Core
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath;

use RankMath\Modules\Role_Manager\Role_Manager;

defined( 'ABSPATH' ) || exit;

/**
 * Installer class.
 */
class Installer {

	/**
	 * Fired when the plugin is activated.
	 *
	 * @param bool $network_wide True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog.
	 */
	public static function install( $network_wide ) {
		$is_multisite = function_exists( 'is_multisite' ) && is_multisite() && $network_wide;
		if ( ! $is_multisite ) {
			self::single_activate();
			return;
		}

		$blog_ids = self::get_blog_ids();
		if ( empty( $blog_ids ) ) {
			return;
		}

		foreach ( $blog_ids as $blog_id ) {
			switch_to_blog( $blog_id );
			self::single_activate();
		}

		restore_current_blog();
	}

	/**
	 * Fired for each blog when the plugin is activated.
	 */
	private static function single_activate() {
		self::add_tables();
		self::add_options();
		self::add_defaults();
		self::add_capabilities();
		self::add_crons();
	}

	/**
	 * Set up the database tables which the plugin needs to function.
	 */
	private static function add_tables() {
		global $wpdb;

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		$max_index_length = 191;
		$charset_collate  = $wpdb->get_charset_collate();

		if ( ! Helper::check_table_exists( 'rank_math_404_logs' ) ) {
			$sql = "CREATE TABLE {$wpdb->prefix}rank_math_404_logs (
				id BIGINT(20) unsigned NOT NULL AUTO_INCREMENT,
				uri VARCHAR(255) NOT NULL,
				accessed DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
				times_accessed BIGINT(20) unsigned NOT NULL DEFAULT 1,
				ip VARCHAR(50) NOT NULL DEFAULT '',
				referer VARCHAR(255) NOT NULL DEFAULT '',
				user_agent VARCHAR(255) NOT NULL DEFAULT '',
				PRIMARY KEY (id),
				KEY uri (uri($max_index_length))
			) $charset_collate;";

			dbDelta( $sql );
		}

		if ( ! Helper::check_table_exists( 'rank_math_redirections' ) ) {
			$sql = "CREATE TABLE {$wpdb->prefix}rank_math_redirections (
				id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				sources TEXT NOT NULL,
				url_to TEXT NOT NULL,
				header_code SMALLINT(4) UNSIGNED NOT NULL,
				hits BIGINT(20) UNSIGNED NOT NULL DEFAULT '0',
				status VARCHAR(25) NOT NULL DEFAULT 'active',
				created DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
				updated DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
				last_accessed DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
				PRIMARY KEY (id),
				KEY (status)
			) $charset_collate;";

			dbDelta( $sql );
		}

		if ( ! Helper::check_table_exists( 'rank_math_redirections_cache' ) ) {
			$sql = "CREATE TABLE {$wpdb->prefix}rank_math_redirections_cache (
				id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				from_url TEXT NOT NULL,
				redirection_id BIGINT(20) UNSIGNED NOT NULL,
				object_id BIGINT(20) UNSIGNED NOT NULL DEFAULT '0',
				object_type VARCHAR(10) NOT NULL DEFAULT 'post',
				is_redirected TINYINT(1) NOT NULL DEFAULT '0',
				PRIMARY KEY (id),
				KEY (redirection_id)
			) $charset_collate;";

			dbDelta( $sql );
		}

		// Link Storage.
		if ( ! Helper::check_table_exists( 'rank_math_internal_links' ) ) {
			$sql = "CREATE TABLE {$wpdb->prefix}rank_math_internal_links (
				id BIGINT(20) unsigned NOT NULL AUTO_INCREMENT,
				url VARCHAR(255) NOT NULL,
				post_id bigint(20) unsigned NOT NULL,
				target_post_id bigint(20) unsigned NOT NULL,
				type VARCHAR(8) NOT NULL,
				PRIMARY KEY (id),
				KEY link_direction (post_id, type)
			) $charset_collate;";
			dbDelta( $sql );
		}

		// Link meta.
		if ( ! Helper::check_table_exists( 'rank_math_internal_meta' ) ) {
			$sql = "CREATE TABLE {$wpdb->prefix}rank_math_internal_meta (
				object_id bigint(20) UNSIGNED NOT NULL,
				internal_link_count int(10) UNSIGNED NULL DEFAULT 0,
				external_link_count int(10) UNSIGNED NULL DEFAULT 0,
				incoming_link_count int(10) UNSIGNED NULL DEFAULT 0,
				UNIQUE KEY object_id (object_id)
			) $charset_collate;";
			dbDelta( $sql );
		}

		if ( ! Helper::check_table_exists( 'rank_math_sc_analytics' ) ) {
			$sql = "CREATE TABLE {$wpdb->prefix}rank_math_sc_analytics (
				id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				date DATETIME NOT NULL,
				property TEXT NOT NULL,
				clicks mediumint(6) NOT NULL,
				impressions mediumint(6) NOT NULL,
				position double NOT NULL,
				ctr double NOT NULL,
				dimension VARCHAR(25) NOT NULL,
				PRIMARY KEY (id),
				KEY property (property($max_index_length))
			) $charset_collate;";

			dbDelta( $sql );
		}
	}

	/**
	 * Default options.
	 *
	 * Sets up the default options used on the settings page.
	 */
	private static function add_options() {

		// Create htaccess_secret for the backup filename.
		$secret = get_option( 'rank_math_htaccess_secret', '' );
		if ( empty( $secret ) ) {
			$new_secret = substr( md5( get_home_url() . rand( 0, 999 ) . time() ), 0, 6 );
			add_option( 'rank_math_htaccess_secret', $new_secret );
		}

		// Update "known CPTs" list, So we can send notice about new ones later.
		add_option( 'rank_math_known_post_types', Helper::get_accessible_post_types() );

		add_option( 'rank_math_version', rank_math()->version );
		add_option( 'rank_math_db_version', rank_math()->db_version );
		add_option( 'rank_math_redirect_about', true );

		add_option( 'rank_math_search_console_data', array(
			'authorized' => false,
			'profiles'   => array(),
		) );

		$modules = array(
			'internal-linking',
			'search-console',
			'seo-analysis',
			'sitemap',

			// Premium.
			'rich-snippet',
			'woocommerce',
		);

		// Role Manager.
		$users = get_users( array( 'role__in' => array( 'administrator', 'editor', 'author', 'contributor' ) ) );
		if ( count( $users ) > 1 ) {
			$modules[] = 'role-manager';
		}

		// If AMP plugin is installed.
		if ( function_exists( 'is_amp_endpoint' ) || class_exists( 'Better_AMP' ) || class_exists( 'Weeblramp_Api' ) || class_exists( 'AMPHTML' ) ) {
			$modules[] = 'amp';
		}

		add_option( 'rank_math_modules', $modules );
	}

	/**
	 * Add default values.
	 */
	private static function add_defaults() {

		// General Settings.
		$general = array(
			'strip_category_base'                 => 'off',
			'attachment_redirect_urls'            => 'on',
			'attachment_redirect_default'         => get_home_url(),
			'url_strip_stopwords'                 => 'off',
			'nofollow_external_links'             => 'off',
			'nofollow_image_links'                => 'on',
			'new_window_external_links'           => 'on',
			'add_img_alt'                         => 'off',
			'img_alt_format'                      => '%title% %count(alt)%',
			'add_img_title'                       => 'off',
			'img_title_format'                    => '%title% %count(title)%',
			'breadcrumbs'                         => 'off',
			'breadcrumbs_separator'               => '-',
			'breadcrumbs_home'                    => 'on',
			'breadcrumbs_home_label'              => esc_html__( 'Home', 'rank-math' ),
			/* translators: Archive title */
			'breadcrumbs_archive_format'          => esc_html__( 'Archives for %s', 'rank-math' ),
			/* translators: Search query term */
			'breadcrumbs_search_format'           => esc_html__( 'Results for %s', 'rank-math' ),
			'breadcrumbs_404_label'               => esc_html__( '404 Error: page not found', 'rank-math' ),
			'breadcrumbs_ancestor_categories'     => 'off',
			'404_monitor_mode'                    => 'simple',
			'404_monitor_limit'                   => 100,
			'404_monitor_ignore_query_parameters' => 'on',
			'redirections_header_code'            => '301',
			'redirections_debug'                  => 'off',
			'console_profile'                     => '',
			'console_caching_control'             => '90',
			'link_builder_links_per_page'         => '7',
			'link_builder_links_per_target'       => '1',
			'wc_remove_product_base'              => 'off',
			'wc_remove_category_base'             => 'off',
			'wc_remove_category_parent_slugs'     => 'off',
			'rss_before_content'                  => '',
			'rss_after_content'                   => '',
			'usage_tracking'                      => 'on',
			'wc_remove_generator'                 => 'on',
		);

		// Sitemap Settings.
		$roles = Helper::get_roles();
		unset( $roles['administrator'], $roles['editor'], $roles['author'] );
		$sitemap = array(
			'items_per_page'         => 1000,
			'include_images'         => 'on',
			'include_featured_image' => 'off',
			'ping_search_engines'    => 'on',
			'exclude_roles'          => $roles,
		);

		$opening_hours = array();
		foreach ( array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' ) as $day ) {
			$opening_hours[] = array(
				'day'  => $day,
				'time' => '09:00-17:00',
			);
		}

		// Title Settings.
		$titles = array(
			'noindex_empty_taxonomies'   => 'on',
			'title_separator'            => '-',
			'capitalize_titles'          => 'off',
			'twitter_card_type'          => 'summary_large_image',
			'knowledgegraph_type'        => class_exists( 'Easy_Digital_Downloads' ) || class_exists( 'WooCommerce' ) ? 'company' : 'person',
			'knowledgegraph_name'        => get_bloginfo( 'name' ),
			'local_business_type'        => 'Organization',
			'local_address_format'       => '{address} {locality}, {region} {postalcode}',
			'opening_hours'              => $opening_hours,
			'opening_hours_format'       => 'off',
			'homepage_title'             => '%sitename% %page% %sep% %sitedesc%',
			'homepage_description'       => '',
			'homepage_custom_robots'     => 'off',
			'disable_author_archives'    => 'on',
			'url_author_base'            => 'author',
			'noindex_author_archive'     => 'off',
			'author_archive_title'       => '%name% %sep% %sitename% %page%',
			'author_add_meta_box'        => 'on',
			'disable_date_archives'      => 'off',
			'date_archive_title'         => '%date% %page% %sep% %sitename%',
			'search_title'               => '%search_query% %page% %sep% %sitename%',
			'404_title'                  => 'Page Not Found %sep% %sitename%',
			'noindex_date'               => 'on',
			'noindex_search'             => 'on',
			'noindex_archive_subpages'   => 'off',
			'noindex_password_protected' => 'off',
		);

		// Post types.
		$richsnp_default = array(
			'post'    => 'article',
			'page'    => 'article',
			'product' => 'product',
		);

		$post_types   = Helper::get_accessible_post_types();
		$post_types[] = 'product';

		foreach ( $post_types as $post_type ) {
			$custom_default = 'off';
			$robots_default = array();
			if ( 'post' === $post_type || 'page' === $post_type ) {
				$custom_default = 'off';
				$robots_default = array();
			} elseif ( 'attachment' === $post_type ) {
				$custom_default = 'on';
				$robots_default = array( 'noindex' );
			}

			$titles[ 'pt_' . $post_type . '_title' ]                = '%title% %sep% %sitename%';
			$titles[ 'pt_' . $post_type . '_description' ]          = '%excerpt%';
			$titles[ 'pt_' . $post_type . '_robots' ]               = $robots_default;
			$titles[ 'pt_' . $post_type . '_custom_robots' ]        = $custom_default;
			$titles[ 'pt_' . $post_type . '_default_rich_snippet' ] = isset( $richsnp_default[ $post_type ] ) ? $richsnp_default[ $post_type ] : 'off';
			$titles[ 'pt_' . $post_type . '_default_article_type' ] = 'post' === $post_type ? 'BlogPosting' : 'Article';
			$titles[ 'pt_' . $post_type . '_default_snippet_name' ] = '%title%';
			$titles[ 'pt_' . $post_type . '_default_snippet_desc' ] = '%excerpt%';

			$post_type_obj = get_post_type_object( $post_type );
			if ( ! is_null( $post_type_obj ) && $post_type_obj->has_archive ) {
				$titles[ 'pt_' . $post_type . '_archive_title' ] = '%title% %page% %sep% %sitename%';
			}

			if ( 'attachment' === $post_type ) {
				$sitemap[ 'pt_' . $post_type . '_sitemap' ]     = 'off';
				$titles[ 'pt_' . $post_type . '_add_meta_box' ] = 'off';
				continue;
			}

			$sitemap[ 'pt_' . $post_type . '_sitemap' ]         = 'on';
			$titles[ 'pt_' . $post_type . '_ls_use_fk' ]        = 'titles';
			$titles[ 'pt_' . $post_type . '_add_meta_box' ]     = 'on';
			$titles[ 'pt_' . $post_type . '_bulk_editing' ]     = 'editing';
			$titles[ 'pt_' . $post_type . '_link_suggestions' ] = 'on';

			// Primary Taxonomy.
			$taxonomy_hash = array(
				'post'    => 'category',
				'product' => 'product_cat',
			);

			if ( isset( $taxonomy_hash[ $post_type ] ) ) {
				$titles[ 'pt_' . $post_type . '_primary_taxonomy' ] = $taxonomy_hash[ $post_type ];
			}
		}

		// Taxonomies.
		$taxonomies = Helper::get_accessible_taxonomies();
		foreach ( $taxonomies as $taxonomy => $object ) {
			$metabox_default = 'off';
			$custom_default  = 'off';
			$robots_default  = array();

			if ( 'category' === $taxonomy ) {
				$metabox_default = 'on';
				$custom_default  = 'off';
				$robots_default  = array();
			} elseif ( 'post_tag' === $taxonomy || 'post_format' === $taxonomy || 'product_tag' === $taxonomy ) {
				$metabox_default = 'off';
				$custom_default  = 'on';
				$robots_default  = array( 'noindex' );
			}

			$titles[ 'tax_' . $taxonomy . '_title' ]         = '%term% %sep% %sitename%';
			$titles[ 'tax_' . $taxonomy . '_robots' ]        = $robots_default;
			$titles[ 'tax_' . $taxonomy . '_add_meta_box' ]  = $metabox_default;
			$titles[ 'tax_' . $taxonomy . '_custom_robots' ] = $custom_default;

			$sitemap[ 'tax_' . $taxonomy . '_sitemap' ] = 'category' === $taxonomy ? 'on' : 'off';
		}

		add_option( 'rank-math-options-general', apply_filters( 'rank_math/settings/defaults/general', $general ) );
		add_option( 'rank-math-options-titles', apply_filters( 'rank_math/settings/defaults/titles', $titles ) );
		add_option( 'rank-math-options-sitemap', apply_filters( 'rank_math/settings/defaults/sitemap', $sitemap ) );
	}

	/**
	 * Create capabilities.
	 */
	private static function add_capabilities() {
		$admin = get_role( 'administrator' );
		if ( ! is_null( $admin ) ) {
			$admin->add_cap( 'rank_math_edit_htaccess', true );
		}

		Role_Manager::add_capabilities();
	}

	/**
	 * Create cron jobs.
	 */
	private static function add_crons() {
		$schedule_for_midnight = strtotime( 'tomorrow midnight' );

		// Add cron job for Usage Tracking (clear it first).
		wp_clear_scheduled_hook( 'rank_math/tracker/send_event' );
		wp_schedule_event( $schedule_for_midnight, apply_filters( 'rank_math/tracker/event_recurrence', 'weekly' ), 'rank_math/tracker/send_event' );

		// Add cron job for Get Search Console Analytics Data.
		wp_clear_scheduled_hook( 'rank_math/search_console/get_analytics' );
		wp_schedule_event( $schedule_for_midnight, apply_filters( 'rank_math/search_console/get_analytics_recurrence', 'daily' ), 'rank_math/search_console/get_analytics' );

		// Add cron for cleaning trashed redirects.
		wp_clear_scheduled_hook( 'rank_math/redirection/clean_trashed' );
		wp_schedule_event( $schedule_for_midnight, apply_filters( 'rank_math/redirection/clean_trashed_recurrence', 'daily' ), 'rank_math/redirection/clean_trashed' );

		// Add cron for counting links.
		wp_clear_scheduled_hook( 'rank_math/links/count_internal_links' );
		wp_schedule_event( $schedule_for_midnight, apply_filters( 'rank_math/links/internal_links_recurrence', 'daily' ), 'rank_math/links/count_internal_links' );
	}

	/**
	 * Get all blog ids of blogs in the current network that are:
	 * - not archived
	 * - not spam
	 * - not deleted
	 *
	 * @return array|false The blog ids, false if no matches.
	 */
	private static function get_blog_ids() {
		global $wpdb;

		return $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs WHERE archived = '0' AND spam = '0' AND deleted = '0'" );
	}
}
