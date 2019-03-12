<?php
/**
 * The Conditional helpers.
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Helpers
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Helpers;

use RankMath\Helper;
use RankMath\Admin\Helper as Admin_Helper;

defined( 'ABSPATH' ) || exit;

/**
 * Conditional class.
 */
trait Conditional {

	/**
	 * Is REST request
	 *
	 * @return bool
	 */
	public static function is_rest() {
		$prefix = rest_get_url_prefix();
		if (
			defined( 'REST_REQUEST' ) && REST_REQUEST || // (#1)
			isset( $_GET['rest_route'] ) && // (#2)
			0 === strpos( trim( $_GET['rest_route'], '\\/' ), $prefix, 0 )
		) {
			return true;
		}

		// (#3)
		$rest_url    = wp_parse_url( site_url( $prefix ) );
		$current_url = wp_parse_url( add_query_arg( array() ) );
		return 0 === strpos( $current_url['path'], $rest_url['path'], 0 );
	}

	/**
	 * Is WooCommerce Installed
	 *
	 * @return bool
	 */
	public static function is_woocommerce_active() {
		// @codeCoverageIgnoreStart
		if ( ! function_exists( 'is_plugin_active' ) ) {
			include_once ABSPATH . 'wp-admin/includes/plugin.php';
		}
		// @codeCoverageIgnoreEnd
		return is_plugin_active( 'woocommerce/woocommerce.php' );
	}

	/**
	 * Is EDD Installed
	 *
	 * @return bool
	 */
	public static function is_edd_active() {
		return class_exists( 'Easy_Digital_Downloads' );
	}

	/**
	 * Check if whitelabel filter is active.
	 *
	 * @return boolean
	 */
	public static function is_whitelabel() {
		return apply_filters( 'rank_math/whitelabel', false );
	}

	/**
	 * Check whether a url is relative.
	 *
	 * @param  string $url URL string to check.
	 * @return boolean
	 */
	public static function is_url_relative( $url ) {
		return ( strpos( $url, 'http' ) !== 0 && strpos( $url, '//' ) !== 0 );
	}

	/**
	 * Checks whether a url is external.
	 *
	 * @param string $url URL string to check. This should be a absolute URL.
	 * @return bool
	 */
	public static function is_external_url( $url ) {
		if ( empty( $url ) || '#' === $url[0] || '/' === $url[0] ) { // Link to current page or relative link.
			return false;
		}

		$domain = Helper::get_parent_domain( home_url() );
		if ( Helper::str_contains( $domain, $url ) ) {
			return false;
		}

		return true;
	}

	/**
	 * Check if the request is heartbeat.
	 *
	 * @return boolean
	 */
	public static function is_heartbeat() {
		if ( isset( $_POST ) && isset( $_POST['action'] ) && 'heartbeat' === $_POST['action'] ) {
			return true;
		}

		return false;
	}

	/**
	 * Is module active.
	 *
	 * @param  string $id ID to get module.
	 * @return boolean
	 */
	public static function is_module_active( $id ) {
		$active_modules = get_option( 'rank_math_modules', array() );

		return in_array( $id, $active_modules ) && array_key_exists( $id, rank_math()->manager->modules );
	}

	/**
	 * Checks if the plugin is configured.
	 *
	 * @param bool $value If this param is set, the option will be updated.
	 * @return bool Return the option value if param is not set.
	 */
	public static function is_configured( $value = null ) {
		$key = 'rank_math_is_configured';
		if ( is_null( $value ) ) {
			$value = get_option( $key );
			return ! empty( $value );
		}
		Helper::schedule_flush_rewrite();
		update_option( $key, $value );
	}

	/**
	 * Get parent domain
	 *
	 * @param  string $url Url to parse.
	 * @return string
	 */
	public static function get_parent_domain( $url ) {
		$pieces = wp_parse_url( $url );
		$domain = isset( $pieces['host'] ) ? $pieces['host'] : '';

		if ( Helper::str_contains( 'localhost', $domain ) ) {
			return 'localhost';
		}

		if ( preg_match( '/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,15})$/i', $domain, $regs ) ) {
			return $regs['domain'];
		}

		return false;
	}

	/**
	 * Check if mythemeshop account is connected
	 *
	 * @return bool
	 */
	public static function is_mythemeshop_connected() {
		return (bool) Admin_Helper::get_registration_data();
	}

	/**
	 * Check if author archive are indexable
	 *
	 * @return bool
	 */
	public static function is_author_archive_indexable() {
		if ( true === Helper::get_settings( 'titles.disable_author_archives' ) ) {
			return false;
		}

		if ( true === Helper::get_settings( 'titles.noindex_author_archive' ) ) {
			return false;
		}

		return true;
	}
}
