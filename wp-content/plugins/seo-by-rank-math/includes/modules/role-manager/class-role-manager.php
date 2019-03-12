<?php
/**
 * The Role Manager Module.
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Modules\Role_Manager
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Modules\Role_Manager;

use RankMath\Helper;
use RankMath\Module;
use RankMath\Admin\Page;

defined( 'ABSPATH' ) || exit;

/**
 * Role_Manager class.
 */
class Role_Manager extends Module {

	/**
	 * The Constructor.
	 */
	public function __construct() {

		$directory = dirname( __FILE__ );
		$this->config(array(
			'id'        => 'role-manager',
			'directory' => $directory,
			'help'      => array(
				'title' => esc_html__( 'Role Manager', 'rank-math' ),
				'view'  => $directory . '/views/help.php',
			),
		));
		parent::__construct();

		$this->action( 'cmb2_admin_init', 'register_form' );
		add_filter( 'cmb2_override_option_get_rank-math-role-manager', array( '\RankMath\Helper', 'get_roles_capabilities' ) );
		$this->action( 'admin_post_rank_math_save_capabilities', 'save_capabilities' );

		if ( $this->page->is_current_page() ) {
			add_action( 'admin_enqueue_scripts', array( 'CMB2_hookup', 'enqueue_cmb_css' ), 25 );
		}

		// Members plugin integration.
		if ( \function_exists( 'members_plugin' ) ) {
			new Members;
		}

		// User Role Editor plugin integration.
		if ( defined( 'URE_PLUGIN_URL' ) ) {
			new User_Role_Editor;
		}
	}

	/**
	 * Register admin page.
	 */
	public function register_admin_page() {
		$uri = untrailingslashit( plugin_dir_url( __FILE__ ) );

		$this->page = new Page( 'rank-math-role-manager', esc_html__( 'Role Manager', 'rank-math' ), array(
			'position' => 11,
			'parent'   => 'rank-math',
			'render'   => $this->directory . '/views/main.php',
			'assets'   => array(
				'styles' => array(
					'rank-math-common'       => '',
					'rank-math-cmb2'         => '',
					'rank-math-role-manager' => $uri . '/assets/role-manager.css',
				),
			),
		));
	}

	/**
	 * Register form for Add New Record.
	 */
	public function register_form() {

		$cmb = new_cmb2_box( array(
			'id'           => 'rank-math-role-manager',
			'object_types' => array( 'options-page' ),
			'option_key'   => 'rank-math-role-manager',
			'hookup'       => false,
			'save_fields'  => false,
		) );

		foreach ( Helper::get_roles() as $role => $label ) {
			$cmb->add_field( array(
				'id'                => esc_attr( $role ),
				'type'              => 'multicheck_inline',
				'name'              => translate_user_role( $label ),
				'options'           => Helper::get_capabilities(),
				'select_all_button' => false,
				'classes'           => 'cmb-big-labels',
			) );
		}
	}

	/**
	 * Save capabilities form submit handler.
	 */
	public function save_capabilities() {

		// If no form submission, bail!
		if ( empty( $_POST ) ) {
			return false;
		}

		check_admin_referer( 'rank-math-save-capabilities', 'security' );

		if ( ! Helper::has_cap( 'role_manager' ) ) {
			rank_math()->add_deferred_error( esc_html__( 'You are not authorized to perform this action.', 'rank-math' ) );
			wp_safe_redirect( Helper::get_admin_url( 'role-manager' ) );
			exit;
		}

		$cmb = cmb2_get_metabox( 'rank-math-role-manager' );
		Helper::set_capabilities( $cmb->get_sanitized_values( $_POST ) );

		wp_safe_redirect( Helper::get_admin_url( 'role-manager' ) );
		exit;
	}

	/**
	 * Add capabilities.
	 */
	public static function add_capabilities() {
		foreach ( Helper::get_roles() as $slug => $role ) {
			$role = get_role( $slug );
			if ( ! $role ) {
				continue;
			}

			foreach ( self::get_default_capabilities_by_role( $slug ) as $cap ) {
				$role->add_cap( $cap );
			}
		}
	}

	/**
	 * Remove capabilities.
	 */
	public static function remove_capabilities() {

		$capabilities = array_keys( Helper::get_capabilities() );
		foreach ( Helper::get_roles() as $slug => $role ) {
			$role = get_role( $slug );
			if ( ! $role ) {
				continue;
			}

			foreach ( $capabilities as $cap ) {
				$role->remove_cap( $cap );
			}
		}
	}

	/**
	 * Get default capabilities by roles.
	 *
	 * @param  string $role Capabilities for this role.
	 * @return array
	 */
	private static function get_default_capabilities_by_role( $role ) {

		if ( 'administrator' === $role ) {
			return array_keys( Helper::get_capabilities() );
		}

		if ( 'editor' === $role ) {
			return array(
				'rank_math_site_analysis',
				'rank_math_onpage_analysis',
				'rank_math_onpage_general',
				'rank_math_onpage_snippet',
				'rank_math_onpage_social',
			);
		}

		if ( 'author' === $role ) {
			return array(
				'rank_math_onpage_analysis',
				'rank_math_onpage_general',
				'rank_math_onpage_snippet',
				'rank_math_onpage_social',
			);
		}

		return array(
			'rank_math_onpage_analysis',
			'rank_math_onpage_general',
			'rank_math_onpage_social',
		);
	}
}
