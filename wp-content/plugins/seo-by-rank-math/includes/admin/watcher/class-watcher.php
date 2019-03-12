<?php
/**
 * The conflicting plugin watcher.
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Admin
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Admin;

use RankMath\Traits\Hooker;
use RankMath\Helper as GlobalHelper;

defined( 'ABSPATH' ) || exit;

/**
 * Watcher class.
 */
class Watcher {

	use Hooker;

	/**
	 * The Constructor.
	 */
	public function __construct() {
		$this->set_conflicting_plugins();
		$this->hooks();
	}

	/**
	 * Set Noticeable plugins from conflict plugin lists.
	 */
	private function set_conflicting_plugins() {

		$this->conflicting_plugins = get_transient( '_rank_math_conflicting_plugins' );

		if ( ! is_array( $this->conflicting_plugins ) || empty( $this->conflicting_plugins ) ) {
			$this->conflicting_plugins = array();
			return;
		}

		$plugins            = array();
		$plugins['seo']     = array_intersect( $this->conflicting_plugins, $this->get_conflicting_plugins( 'seo' ) );
		$plugins['sitemap'] = array_intersect( $this->conflicting_plugins, $this->get_conflicting_plugins( 'sitemap' ) );

		$this->noticeable_plugins = $plugins;
	}

	/**
	 * Hook into actions.
	 */
	private function hooks() {
		$this->action( 'activated_plugin', 'check_activated_plugin' );

		if ( empty( $this->noticeable_plugins ) ) {
			return;
		}

		$this->action( 'admin_init', 'notices' );
		$this->action( 'deactivated_plugin', 'check_deactivated_plugin' );
	}

	/**
	 * Function to run when new plugin is activated.
	 *
	 * @param string $plugin Activated plugin path.
	 */
	public function check_activated_plugin( $plugin ) {
		if ( ! in_array( $plugin, $this->get_conflicting_plugins( 'seo' ) ) && ! in_array( $plugin, $this->get_conflicting_plugins( 'sitemap' ) ) ) {
			return;
		}

		$this->conflicting_plugins[] = $plugin;
		$this->update_conflicting_plugins( $this->conflicting_plugins );
	}

	/**
	 * Function to run when new plugin is deactivated.
	 *
	 * @param string $plugin Deactivated plugin path.
	 */
	public function check_deactivated_plugin( $plugin ) {
		$plugin = array_search( $plugin, $this->conflicting_plugins );
		if ( false !== $plugin ) {
			unset( $this->conflicting_plugins[ $plugin ] );
			$this->update_conflicting_plugins( $this->conflicting_plugins );
		}
	}

	/**
	 * Function to add/remove conflicting plugins in transient.
	 *
	 * @param array $plugins List of Conflicting plugins.
	 */
	public function update_conflicting_plugins( $plugins = array() ) {
		set_transient( '_rank_math_conflicting_plugins', $plugins );
	}

	/**
	 * Run all notices routine.
	 */
	public function notices() {

		if ( empty( $this->noticeable_plugins ) ) {
			return;
		}

		if ( ! empty( $this->noticeable_plugins['seo'] ) ) {
			$this->seo_conflict_plugins();
		}

		if ( ! empty( $this->noticeable_plugins['sitemap'] ) ) {
			$this->sitemap_conflict_plugins();
		}
	}

	/**
	 * If any plugin detected which can conflict notify
	 */
	private function seo_conflict_plugins() {

		if ( ! GlobalHelper::is_module_active( 'redirections' ) ) {
			if ( ( $key = array_search( 'redirection/redirection.php', $this->noticeable_plugins['seo'] ) ) !== false ) { // @codingStandardsIgnoreLine
				unset( $this->noticeable_plugins['seo'][ $key ] );
			}

			if ( empty( $this->noticeable_plugins['seo'] ) ) {
				return;
			}
		}

		if ( isset( $_GET['rank_math_deactivate_plugins'] ) ) {
			foreach ( $this->noticeable_plugins['seo'] as $plugin ) {
				deactivate_plugins( $plugin );
			}
			return;
		}

		/* translators: deactivation link */
		rank_math()->add_error( sprintf( __( 'Please keep only one SEO plugin active, otherwise, you might lose your rankings and traffic. %s.', 'rank-math' ), '<a href="' . add_query_arg( 'rank_math_deactivate_plugins', 'true' ) . '">Click here to Deactivate</a>' ), 'error', 'conflict_plugins' );
	}

	/**
	 * If any plugin detected which can conflict with sitemap notify
	 */
	private function sitemap_conflict_plugins() {

		if ( ! GlobalHelper::is_module_active( 'sitemap' ) ) {
			return;
		}

		if ( isset( $_GET['rank_math_deactivate_sitemap'] ) ) {
			foreach ( $this->noticeable_plugins['sitemap'] as $plugin ) {
				deactivate_plugins( $plugin );
			}
			return;
		}

		/* translators: deactivation link */
		rank_math()->add_error( sprintf( __( 'Please keep only one Sitemap plugin active, otherwise, you might lose your rankings and traffic. %s.', 'rank-math' ), '<a href="' . add_query_arg( 'rank_math_deactivate_sitemap', 'true' ) . '">Click here to Deactivate</a>' ), 'error', 'conflict_plugins' );
	}

	/**
	 * Function to get all noticeable plugins.
	 *
	 * @param string $type Plugin type.
	 * @return array
	 */
	private function get_conflicting_plugins( $type ) {
		$plugins = array(
			'sitemap' => array(
				'google-sitemap-generator/sitemap.php',
				'xml-sitemap-feed/xml-sitemap.php',
			),
			'seo'     => array(
				'wordpress-seo/wp-seo.php',
				'wordpress-seo-premium/wp-seo-premium.php',
				'all-in-one-seo-pack/all_in_one_seo_pack.php',
				'all-in-one-schemaorg-rich-snippets/index.php',
				'wp-schema-pro/wp-schema-pro.php',
				'redirection/redirection.php',
			),
		);

		return $plugins[ $type ];
	}
}
