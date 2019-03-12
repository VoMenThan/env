<?php
/**
 * The admin-page functionality.
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
 * Page class.
 */
class Page {

	use Hooker;

	/**
	 * Unique ID used for menu_slug.
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * The text to be displayed in the title tags of the page.
	 *
	 * @var string
	 */
	public $title = null;

	/**
	 * The slug name for the parent menu.
	 *
	 * @var string
	 */
	public $parent = null;

	/**
	 * The The on-screen name text for the menu.
	 *
	 * @var string
	 */
	public $menu_title = null;

	/**
	 * The capability required for this menu to be displayed to the user.
	 *
	 * @var string
	 */
	public $capability = 'manage_options';

	/**
	 * The icon for this menu.
	 *
	 * @var string
	 */
	public $icon = 'dashicons-art';

	/**
	 * The position in the menu order this menu should appear.
	 *
	 * @var int
	 */
	public $position = -1;

	/**
	 * The function/file that displays the page content for the menu page.
	 *
	 * @var string|callable
	 */
	public $render = null;

	/**
	 * The function that run on page POST to save data.
	 *
	 * @var callable
	 */
	public $onsave = null;

	/**
	 * Hold contextual help tabs.
	 *
	 * @var array
	 */
	public $help = null;

	/**
	 * Hold scripts and styles.
	 *
	 * @var array
	 */
	public $assets = null;

	/**
	 * Check if plugin is network active.
	 *
	 * @var array
	 */
	public $is_network = false;

	/**
	 * The Constructor.
	 *
	 * @param string $id     Admin page unique id.
	 * @param string $title  Title of the admin page.
	 * @param array  $config Optional. Override page settings.
	 */
	public function __construct( $id, $title, $config = array() ) {

		// Early bail!
		if ( ! $id ) {
			wp_die( esc_html__( '$id variable required', 'rank-math' ), esc_html__( 'Variable Required', 'rank-math' ) );
		}

		if ( ! $title ) {
			wp_die( esc_html__( '$title variable required', 'rank-math' ), esc_html__( 'Variable Required', 'rank-math' ) );
		}

		$this->id    = $id;
		$this->title = $title;
		$this->config( $config );

		if ( ! $this->menu_title ) {
			$this->menu_title = $title;
		}

		$this->action( 'init', 'init', 25 );
	}

	/**
	 * Init admin page when WordPress Initialises.
	 */
	public function init() {
		$priority = $this->parent ? intval( $this->position ) : -1;
		$this->action( $this->is_network ? 'network_admin_menu' : 'admin_menu', 'register_menu', $priority );

		// If not the page is not this page stop here.
		if ( ! $this->is_current_page() ) {
			return;
		}

		if ( ! is_null( $this->onsave ) && is_callable( $this->onsave ) ) {
			$this->action( 'admin_init', 'save' );
		}

		if ( ! empty( $this->assets ) ) {
			$this->action( 'admin_enqueue_scripts', 'enqueue_styles' );
			$this->action( 'admin_enqueue_scripts', 'enqueue_scripts' );
		}

		if ( ! empty( $this->help ) ) {
			$this->filter( 'contextual_help', 'contextual_help' );
		}

		$this->action( 'admin_body_class', 'body_class' );
	}

	/**
	 * Register Admin Menu.
	 */
	public function register_menu() {
		if ( ! $this->parent ) {
			add_menu_page( $this->title, $this->menu_title, $this->capability, $this->id, array( $this, 'display' ), $this->icon, $this->position );
			return;
		}

		add_submenu_page( $this->parent, $this->title, $this->menu_title, $this->capability, $this->id, array( $this, 'display' ) );
	}

	/**
	 * Enqueue styles
	 */
	public function enqueue_styles() {
		if ( isset( $this->assets['styles'] ) && ! empty( $this->assets['styles'] ) ) {
			foreach ( $this->assets['styles'] as $handle => $src ) {
				wp_enqueue_style( $handle, $src, null, rank_math()->get_version() );
			}
		}
	}

	/**
	 * Enqueue scripts.
	 */
	public function enqueue_scripts() {
		if ( isset( $this->assets['scripts'] ) && ! empty( $this->assets['scripts'] ) ) {
			foreach ( $this->assets['scripts'] as $handle => $src ) {
				wp_enqueue_script( $handle, $src, null, rank_math()->get_version(), true );
			}
		}
	}

	/**
	 * Add classes to <body> of WordPress admin.
	 *
	 * @param string $classes Space-separated list of CSS classes.
	 * @return string
	 */
	public function body_class( $classes = '' ) {
		return $classes . ' rank-math-page';
	}

	/**
	 * Save anything you want using onsave function.
	 */
	public function save() {
		call_user_func( $this->onsave, $this );
	}

	/**
	 * Contextual Help.
	 */
	public function contextual_help() {
		$screen = get_current_screen();

		foreach ( $this->help as $tab_id => $tab ) {
			$tab['id']      = $tab_id;
			$tab['content'] = $this->get_tab_content( $tab );
			$screen->add_help_tab( $tab );
		}

		if ( ! GlobalHelper::is_whitelabel() ) {
			$screen->set_help_sidebar(
				'<p><strong>' . esc_html__( 'SEO Support:', 'rank-math' ) . '</strong></p>' . '<p><a href="' . esc_url( GlobalHelper::get_admin_url( 'help' ) ) . '">' . esc_html__( 'Support Forums', 'rank-math' ) . '</a></p>'
			);
		}
	}

	/**
	 * Get tab content
	 *
	 * @param  array $tab Tab to get content for.
	 * @return string
	 */
	private function get_tab_content( $tab ) {
		ob_start();

		// If it is a function.
		if ( isset( $tab['content'] ) && is_callable( $tab['content'] ) ) {
			call_user_func( $tab['content'] );
		}

		// If it is a file.
		if ( isset( $tab['view'] ) && $tab['view'] ) {
			require $tab['view'];
		}

		return ob_get_clean();
	}

	/**
	 * Render admin page content using render function you passed in config.
	 */
	public function display() {
		if ( is_null( $this->render ) ) {
			return;
		}

		if ( is_callable( $this->render ) ) {
			call_user_func( $this->onrender, $this );
		} elseif ( is_string( $this->render ) ) {
			include_once $this->render;
		}
	}

	/**
	 * Is the page is currrent page.
	 *
	 * @return bool
	 */
	public function is_current_page() {

		$page = isset( $_GET['page'] ) && ! empty( $_GET['page'] ) ? filter_input( INPUT_GET, 'page' ) : false;
		return $page === $this->id;
	}
}
