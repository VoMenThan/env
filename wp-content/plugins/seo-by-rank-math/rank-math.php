<?php // @codingStandardsIgnoreFilename
/**
 * Rank Math SEO Plugin.
 *
 * @package      RANK_MATH
 * @copyright    Copyright (C) 2018, MyThemeShop - support-team@mythemeshop.com
 * @link         http://mythemeshop.com
 * @since        0.9.0
 *
 * @wordpress-plugin
 * Plugin Name:       Rank Math SEO
 * Version:           1.0.9
 * Plugin URI:        https://link.mythemeshop.com/rankmathseo
 * Description:       Rank Math is a revolutionary SEO product that combines the features of many SEO tools and lets you multiply your traffic in the easiest way possible.
 * Author:            MyThemeShop
 * Author URI:        https://link.mythemeshop.com/rankmathmythemeshop
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rank-math
 * Domain Path:       /languages
 */

defined( 'ABSPATH' ) || exit;

/**
 * The plugin file, absolute unix path.
 *
 * @since 0.9.0
 */
define( 'RANK_MATH_FILE', __FILE__ );

if ( ! class_exists( 'Rank_Math_Bootstrap', false ) ) {

	/**
	 * Rank Math Bootstrap
	 */
	class Rank_Math_Bootstrap {

		/**
		 * Halt plugin loading.
		 *
		 * @var bool
		 */
		private $is_critical = false;

		/**
		 * Minimum version of WordPress required to run the plugin.
		 *
		 * @var string
		 */
		private $wordpress_version = '4.2';

		/**
		 * Minimum version of PHP required to run the plugin.
		 *
		 * @var string
		 */
		private $php_version = '5.6';

		/**
		 * Hold messages.
		 *
		 * @var bool
		 */
		private $messages = array();

		/**
		 * RankMath constructor.
		 */
		public function __construct() {
			if ( $this->check_requirements() ) {
				register_activation_hook( RANK_MATH_FILE, array( $this, 'auto_deactivate' ) );
				return;
			}

			/**
			 * PSR-4 Autoload.
			 */
			include dirname( __FILE__ ) . '/vendor/autoload.php';

			$this->rollbar();

			// Plugin Activation and Deactivation.
			register_activation_hook( RANK_MATH_FILE, array( $this, 'activate' ) );
			register_deactivation_hook( RANK_MATH_FILE, array( $this, 'deactivate' ) );

			add_action( 'wpmu_new_blog', array( '\RankMath\Installer', 'activate_new_blog' ) );
			add_filter( 'wpmu_drop_tables', array( '\RankMath\Installer', 'on_delete_blog' ) );

			// Start the engine.
			\RankMath\RankMath::instance();
		}

		/**
		 * Load rollbar
		 */
		private function rollbar() {
			$settings = get_option( 'rank-math-options-general' );
			if ( defined( 'WC_DOING_PHPUNIT' ) || ! isset( $settings['usage_tracking'] ) || 'off' === $settings['usage_tracking'] ) {
				return;
			}

			\Rollbar\Rollbar::init( array(
				'access_token' => '020f63d75296413da4ea438e6eed0d04',
				'environment'  => 'development',
				'code_version' => '1.0.9',
				'check_ignore' => array( $this, 'filter_rollbar_items' ),
			));
		}

		/**
		 * Check what to send to rollbar
		 *
		 * @param  boolean          $isUncaught Set to true if the error was an uncaught exception.
		 * @param  RollbarException $toLog      RollbarException instance that will allow you to get the message or exception; or a string if you're logging a simple message.
		 * @param  array            $payload    Array of payload.
		 * @return boolean
		 */
		public function filter_rollbar_items( $isUncaught, $toLog, $payload ) {
			$keys    = array( 'data', 'body', 'trace', 'frames' );
			$payload = $payload->serialize();
			foreach ( $keys as $key ) {
				if ( is_null( $payload ) ) {
					return false;
				}

				$payload = isset( $payload[ $key ] ) ? $payload[ $key ] : null;
			}

			foreach ( $payload as $frame ) {
				if ( \RankMath\Helper::str_contains( 'rank-math', $frame['filename'] ) ) {
					return false;
				}
			}

			return true;
		}

		/**
		 * Bail out if the php version is lower than
		 *
		 * @return void
		 */
		public function auto_deactivate() {
			deactivate_plugins( plugin_basename( RANK_MATH_FILE ) );

			$error  = '<h1>' . esc_html__( 'An Error Occured', 'rank-math' ) . '</h1>';
			$error .= '<p>' . join( '<br>', $this->messages ) . '</p>';
			$error .= '<p><a href="' . admin_url( 'plugins.php' ) . '">' . __( '&laquo; Back', 'rank-math' ) . '</a></p>';

			wp_die( $error, esc_html__( 'Plugin Activation Error', 'rank-math' ) );
		}

		/**
		 * Does something when activating Rank Math.
		 *
		 * @param bool $network_wide Whether the plugin is being activated network-wide.
		 */
		function activate( $network_wide = false ) {
			RankMath\Installer::install( $network_wide );
			if ( is_multisite() && ms_is_switched() ) {
				delete_option( 'rewrite_rules' );
			} else {
				RankMath\Helper::schedule_flush_rewrite();
			}

			$this->clear_cache();

			do_action( 'rank_math_activate' );
		}

		/**
		 * Does something when deactivating Rank Math.
		 */
		function deactivate() {
			if ( is_multisite() && ms_is_switched() ) {
				delete_option( 'rewrite_rules' );
			} else {
				add_action( 'shutdown', 'flush_rewrite_rules' );
			}

			$this->clear_cache();

			do_action( 'rank_math_deactivate' );
		}

		/**
		 * Fired when a new site is activated with a WPMU environment.
		 *
		 * @param int $blog_id ID of the new blog.
		 */
		public function activate_new_blog( $blog_id ) {
			if ( 1 !== did_action( 'wpmu_new_blog' ) ) {
				return;
			}

			switch_to_blog( $blog_id );
			RankMath\Installer::single_activate();
			restore_current_blog();
		}

		/**
		 * Uninstall tables when MU blog is deleted.
		 *
		 * @param  array $tables List of tables that will be deleted by WP.
		 * @return array
		 */
		public function on_delete_blog( $tables ) {
			global $wpdb;

			$tables[] = $wpdb->prefix . 'rank_math_404_logs';
			$tables[] = $wpdb->prefix . 'rank_math_redirections';
			$tables[] = $wpdb->prefix . 'rank_math_links';
			$tables[] = $wpdb->prefix . 'rank_math_sc_analytics';

			return $tables;
		}

		/**
		 * Clears the WP or W3TC cache depending on which is used.
		 */
		private function clear_cache() {
			if ( function_exists( 'w3tc_pgcache_flush' ) ) {
				w3tc_pgcache_flush();
			} elseif ( function_exists( 'wp_cache_clear_cache' ) ) {
				wp_cache_clear_cache();
			}
		}

		/**
		 * Check that the WordPress and PHP setup meets the plugin requirements.
		 *
		 * @return bool
		 */
		private function check_requirements() {
			$this->is_wp_enough();
			$this->is_php_enough();

			return $this->is_critical;
		}

		/**
		 * Check if WordPress version is enough to run this plugin.
		 */
		private function is_wp_enough() {
			if ( version_compare( get_bloginfo( 'version' ), $this->wordpress_version, '<' ) ) {
				/* translators: WordPress Version */
				$this->messages[]  = sprintf( esc_html__( 'Rank Math requires WordPress version %s or above. Please update WordPress to run this plugin.', 'rank-math' ), $this->wordpress_version );
				$this->is_critical = true;
			}
		}

		/**
		 * Check if PHP version is enough to run this plugin.
		 */
		private function is_php_enough() {
			if ( version_compare( phpversion(), $this->php_version, '<' ) ) {
				/* translators: PHP Version */
				$this->messages[]  = sprintf( esc_html__( 'Rank Math requires PHP version %s or above. Please update PHP to run this plugin.', 'rank-math' ), $this->php_version );
				$this->is_critical = true;
			}
		}
	}

	/**
	 * Main instance of RankMath.
	 *
	 * Returns the main instance of RankMath to prevent the need to use globals.
	 *
	 * @return RankMath\RankMath
	 */
	function rank_math() {
		return RankMath\RankMath::instance();
	}

	/**
	 * Starts the plugin.
	 *
	 * @since 0.9.0
	 */
	new Rank_Math_Bootstrap;
}
