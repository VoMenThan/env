<?php
/**
 * Admin helper Functions.
 *
 * This file contains functions need during the admin screens.
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Admin
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Admin;

use RankMath\Helper as GlobalHelper;

defined( 'ABSPATH' ) || exit;

/**
 * Helper class.
 */
class Helper {

	/**
	 * Instantiates the WordPress filesystem for use.
	 *
	 * @return object
	 */
	public static function get_filesystem() {
		global $wp_filesystem;

		if ( ! defined( 'FS_METHOD' ) ) {
			define( 'FS_METHOD', 'direct' );
		}

		if ( empty( $wp_filesystem ) ) {
			require_once ABSPATH . '/wp-admin/includes/file.php';
			WP_Filesystem();
		}

		return $wp_filesystem;
	}

	/**
	 * Get robots.txt related data.
	 *
	 * @return array
	 */
	public static function get_robots_data() {
		$wp_filesystem = self::get_filesystem();

		if ( $wp_filesystem->exists( ABSPATH . 'robots.txt' ) ) {
			return array(
				'exists'  => true,
				'default' => $wp_filesystem->get_contents( ABSPATH . 'robots.txt' ),
			);
		}

		$default = "User-agent: *\n";
		$public  = get_option( 'blog_public' );
		if ( '0' === $public ) {
			$default .= "Disallow: /\n";
		} else {
			$site_url = parse_url( site_url() );
			$path     = ! empty( $site_url['path'] ) ? $site_url['path'] : '';
			$default .= "Disallow: $path/wp-admin/\n";
			$default .= "Allow: $path/wp-admin/admin-ajax.php\n";
		}

		return array(
			'exists'  => false,
			'default' => apply_filters( 'robots_txt', $default, $public ),
		);
	}

	/**
	 * Get htaccess related data.
	 *
	 * @return array
	 */
	public static function get_htaccess_data() {
		$wp_filesystem = self::get_filesystem();
		$htaccess_file = get_home_path() . '.htaccess';

		return ! $wp_filesystem->exists( $htaccess_file ) ? false : array(
			'content'  => $wp_filesystem->get_contents( $htaccess_file ),
			'writable' => $wp_filesystem->is_writable( $htaccess_file ),
		);
	}

	/**
	 * Create htaccess backup.
	 *
	 * @return bool
	 */
	public static function do_htaccess_backup() {
		$wp_filesystem = self::get_filesystem();

		$path = get_home_path();
		$file = $path . '.htaccess';
		if ( ! $wp_filesystem->is_writable( $path ) || ! $wp_filesystem->exists( $file ) ) {
			return false;
		}

		$backup = $path . '.htaccess_back_' . get_option( 'rank_math_htaccess_secret', '' );
		return $wp_filesystem->copy( $file, $backup, true );
	}

	/**
	 * Update htaccess file.
	 *
	 * @param string $content Htaccess content.
	 * @return string|bool
	 */
	public static function do_htaccess_update( $content ) {
		if ( empty( $content ) ) {
			return false;
		}

		$wp_filesystem = self::get_filesystem();
		$htaccess_file = get_home_path() . '.htaccess';

		return ! $wp_filesystem->is_writable( $htaccess_file ) ? false : $wp_filesystem->put_contents( $htaccess_file, $content );
	}

	/**
	 * Get tooltip html.
	 *
	 * @param  string $message Message to show in tooltip.
	 * @return string
	 */
	public static function get_tooltip( $message ) {
		return '<span class="rank-math-tooltip"><em class="dashicons-before dashicons-editor-help"></em><span>' . $message . '</span></span>';
	}

	/**
	 * Get admin view file.
	 *
	 * @param  string $view View filename.
	 * @return string Complete path to view
	 */
	public static function get_view( $view ) {
		return rank_math()->admin_dir() . "views/{$view}.php";
	}

	/**
	 * Get taxonomies as choices.
	 *
	 * @param array $args (Optional) Arguments passed to filter list.
	 * @return array|bool
	 */
	public static function get_taxonomies_options( $args = array() ) {
		global $wp_taxonomies;

		$args = wp_parse_args( $args, array(
			'public' => true,
		) );

		$taxonomies = wp_filter_object_list( $wp_taxonomies, $args, 'and', 'label' );

		return empty( $taxonomies ) ? false : array( 'off' => esc_html__( 'None', 'rank-math' ) ) + $taxonomies;
	}

	/**
	 * Get current post type.
	 *
	 * This function has some fallback strategies to get the current screen post type.
	 *
	 * @return string|bool
	 */
	public static function get_post_type() {
		global $pagenow;

		$post_type = self::post_type_from_globals();
		if ( false !== $post_type ) {
			return $post_type;
		}

		$post_type = self::post_type_from_request();
		if ( false !== $post_type ) {
			return $post_type;
		}

		return 'post-new.php' === $pagenow ? 'post' : false;
	}

	/**
	 * Get post type from global variables
	 *
	 * @return string|bool
	 */
	private static function post_type_from_globals() {
		global $post, $typenow, $current_screen;

		if ( $post && $post->post_type ) {
			return $post->post_type;
		}

		if ( $typenow ) {
			return $typenow;
		}

		if ( $current_screen && $current_screen->post_type ) {
			return $current_screen->post_type;
		}

		return false;
	}

	/**
	 * Get post type from request variables
	 *
	 * @return string|bool
	 */
	private static function post_type_from_request() {

		if ( isset( $_REQUEST['post_type'] ) ) {
			return sanitize_key( $_REQUEST['post_type'] );
		}

		if ( isset( $_REQUEST['post_ID'] ) ) {
			return get_post_type( $_REQUEST['post_ID'] );
		}

		if ( isset( $_GET['post'] ) ) {
			return get_post_type( $_GET['post'] );
		}

		return false;
	}

	/**
	 * Registration data get/update.
	 *
	 * @param array|bool|null $data Array of data to save.
	 * @return array
	 */
	public static function get_registration_data( $data = null ) {
		$key = 'mts_connect_data';

		// Setter.
		if ( ! is_null( $data ) ) {
			if ( false === $data ) {
				update_option( 'rank_math_registration_skip', 1 );
				return delete_option( $key );
			}

			return update_option( $key, $data );
		}

		// Getter.
		$options = GlobalHelper::is_plugin_active_for_network() ? get_blog_option( get_main_site_id(), $key, false ) : get_option( $key, false );
		return empty( $options ) ? false : $options;
	}

	/**
	 * Register product routine.
	 *
	 * @param  string $username Username for registration.
	 * @param  string $password Password for registration.
	 * @return bool
	 */
	public static function register_product( $username, $password ) {
		$error = false;

		if ( empty( $username ) ) {
			$error = true;
			rank_math()->add_deferred_error( esc_html__( 'Username is not entered.', 'rank-math' ) );
		}

		if ( empty( $password ) ) {
			$error = true;
			rank_math()->add_deferred_error( esc_html__( 'Password is not entered.', 'rank-math' ) );
		}

		if ( $error ) {
			return false;
		}

		$body = self::authenticate_user( $username, $password );

		if ( false !== $body && isset( $body['login'] ) ) {
			self::get_registration_data( array(
				'username'  => $body['login'],
				'api_key'   => $body['key'],
				'connected' => true,
			) );
			rank_math()->add_deferred_error( esc_html__( 'Thank you for connecting Rank Math to your MyThemeShop account.', 'rank-math' ), 'success' );

			return true;
		}

		return false;
	}

	/**
	 * Authenticate user routine.
	 *
	 * @param  string $username Username for registration.
	 * @param  string $password Password for registration.
	 * @return bool
	 */
	private static function authenticate_user( $username, $password ) {
		$response = wp_remote_post( 'https://mythemeshop.com/mtsapi/v1/get_key/', array(
			'timeout' => 10,
			'body'    => array(
				'user' => $username,
				'pass' => $password,
			),
		) );

		$body = wp_remote_retrieve_body( $response );
		$body = json_decode( $body, true );

		if ( is_wp_error( $response ) || isset( $body['code'] ) ) {
			$message = is_wp_error( $response ) ? $response->get_error_message() : $body['message'];

			foreach ( (array) $message as $e ) {
				rank_math()->add_deferred_error( $e );
			}

			return false;
		}

		return $body;
	}

	/**
	 * Change tracking status.
	 */
	public static function allow_tracking() {
		$allow = 'off';
		if ( isset( $_POST['rank-math-usage-tracking'] ) ) {
			$allow = filter_input( INPUT_POST, 'rank-math-usage-tracking', FILTER_VALIDATE_BOOLEAN );
			$allow = $allow ? 'on' : 'off';
		}

		$settings                   = get_option( 'rank-math-options-general' );
		$settings['usage_tracking'] = $allow;

		update_option( 'rank-math-options-general', $settings );
	}

	/**
	 * Compare values.
	 *
	 * @param  integer $value1     Old value.
	 * @param  integer $value2     New Value.
	 * @param  bool    $percentage Treat as percentage.
	 * @return float
	 */
	public static function compare_values( $value1, $value2, $percentage = false ) {
		$diff = round( ( $value2 - $value1 ), 2 );

		if ( ! $percentage ) {
			return (float) $diff;
		}

		if ( $value1 ) {
			$diff = round( ( ( $diff / $value1 ) * 100 ), 2 );
			if ( ! $value2 ) {
				$diff = -100;
			}
		} elseif ( $value2 ) {
			$diff = 100;
		}

		return (float) $diff;
	}

	/**
	 * Check if current page is post create/edit screen.
	 *
	 * @return bool
	 */
	public static function is_post_edit() {
		global $pagenow;

		return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
	}

	/**
	 * Check if current page is term create/edit screen.
	 *
	 * @return bool
	 */
	public static function is_term_edit() {
		global $pagenow;
		return ( 'term.php' === $pagenow );
	}

	/**
	 * Check if current page is user create/edit screen.
	 *
	 * @return bool
	 */
	public static function is_user_edit() {
		global $pagenow;

		return in_array( $pagenow, array( 'profile.php', 'user-edit.php' ) );
	}

	/**
	 * Check if current page is user or term create/edit screen.
	 *
	 * @return bool
	 */
	public static function is_term_profile_page() {
		global $pagenow;

		return in_array( $pagenow, array( 'term.php', 'profile.php', 'user-edit.php' ) );
	}
}
