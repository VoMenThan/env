<?php
/**
 * The admin-page functionality.
 *
 * @since      1.0.0
 * @package    MyThemeShop
 * @subpackage MyThemeShop\Admin
 * @author     MyThemeShop <support@rankmath.com>
 */

namespace MyThemeShop\Admin;

/**
 * Page class.
 */
class Page {

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
	 * Hold classes for body tag.
	 *
	 * @var array
	 */
	public $classes = null;

	/**
	 * The Constructor.
	 *
	 * @param string $id     Admin page unique id.
	 * @param string $title  Title of the admin page.
	 * @param array  $config Optional. Override page settings.
	 */
	public function __construct( $id, $title, $config = [] ) {

		// Early bail!
		if ( ! $id ) {
			wp_die( esc_html__( '$id variable required' ), esc_html__( 'Variable Required' ) );
		}

		if ( ! $title ) {
			wp_die( esc_html__( '$title variable required' ), esc_html__( 'Variable Required' ) );
		}

		$this->id    = $id;
		$this->title = $title;
		foreach ( $config as $key => $value ) {
			$this->$key = $value;
		}

		if ( ! $this->menu_title ) {
			$this->menu_title = $title;
		}

		add_action( 'init', [ $this, 'init' ], 25 );
	}

	/**
	 * Init admin page when WordPress Initialises.
	 *
	 * @codeCoverageIgnore
	 */
	public function init() {
		$priority = $this->parent ? intval( $this->position ) : -1;
		add_action( $this->is_network ? 'network_admin_menu' : 'admin_menu', [ $this, 'register_menu' ], $priority );

		// If not the page is not this page stop here.
		if ( ! $this->is_current_page() ) {
			return;
		}

		if ( ! is_null( $this->onsave ) && is_callable( $this->onsave ) ) {
			add_action( 'admin_init', [ $this, 'save' ] );
		}

		if ( ! empty( $this->assets ) ) {
			add_action( 'admin_enqueue_scripts', [ $this, 'enqueue' ] );
		}

		if ( ! empty( $this->help ) ) {
			add_filter( 'contextual_help', [ $this, 'contextual_help' ] );
		}

		if ( ! empty( $this->classes ) ) {
			add_action( 'admin_body_class', [ $this, 'body_class' ] );
		}
	}

	/**
	 * Register Admin Menu.
	 *
	 * @codeCoverageIgnore
	 */
	public function register_menu() {
		if ( ! $this->parent ) {
			add_menu_page( $this->title, $this->menu_title, $this->capability, $this->id, [ $this, 'display' ], $this->icon, $this->position );
			return;
		}

		add_submenu_page( $this->parent, $this->title, $this->menu_title, $this->capability, $this->id, [ $this, 'display' ] );
	}

	/**
	 * Enqueue styles and scripts.
	 *
	 * @codeCoverageIgnore
	 */
	public function enqueue() {
		$this->enqueue_styles();
		$this->enqueue_scripts();
	}

	/**
	 * Add classes to <body> of WordPress admin.
	 *
	 * @codeCoverageIgnore
	 *
	 * @param string $classes Space-separated list of CSS classes.
	 * @return string
	 */
	public function body_class( $classes = '' ) {
		return $classes . ' ' . join( ' ', $this->classes );
	}

	/**
	 * Save anything you want using onsave function.
	 *
	 * @codeCoverageIgnore
	 */
	public function save() {
		call_user_func( $this->onsave, $this );
	}

	/**
	 * Contextual Help.
	 *
	 * @codeCoverageIgnore
	 */
	public function contextual_help() {
		$screen = get_current_screen();

		foreach ( $this->help as $tab_id => $tab ) {
			$tab['id']      = $tab_id;
			$tab['content'] = $this->get_help_content( $tab );
			$screen->add_help_tab( $tab );
		}
	}

	/**
	 * Render admin page content using render function you passed in config.
	 *
	 * @codeCoverageIgnore
	 */
	public function display() {
		if ( is_null( $this->render ) ) {
			return;
		}

		if ( is_callable( $this->render ) ) {
			call_user_func( $this->onrender, $this );
			return;
		}

		if ( is_string( $this->render ) ) {
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

	/**
	 * Enqueue styles
	 *
	 * @codeCoverageIgnore
	 */
	private function enqueue_styles() {
		if ( ! isset( $this->assets['styles'] ) || empty( $this->assets['styles'] ) ) {
			return;
		}

		foreach ( $this->assets['styles'] as $handle => $src ) {
			wp_enqueue_style( $handle, $src, null );
		}
	}

	/**
	 * Enqueue scripts.
	 *
	 * @codeCoverageIgnore
	 */
	private function enqueue_scripts() {
		if ( ! isset( $this->assets['scripts'] ) || empty( $this->assets['scripts'] ) ) {
			return;
		}

		foreach ( $this->assets['scripts'] as $handle => $src ) {
			wp_enqueue_script( $handle, $src, null, null, true );
		}
	}

	/**
	 * Get tab content
	 *
	 * @codeCoverageIgnore
	 *
	 * @param  array $tab Tab to get content for.
	 * @return string
	 */
	private function get_help_content( $tab ) {
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
}
