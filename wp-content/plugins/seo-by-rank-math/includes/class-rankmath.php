<?php
/**
 * The core class of the plugin.
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Core
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath;

use RankMath\Upgrade;
use RankMath\Admin\Admin;
use RankMath\Traits\Hooker;
use RankMath\Admin\Product_Registration;

defined( 'ABSPATH' ) || exit;

/**
 * Main RankMath Class.
 */
final class RankMath {

	use Hooker;

	/**
	 * Rank Math version.
	 *
	 * @var string
	 */
	public $version = '1.0.9';

	/**
	 * Rank Math database version.
	 *
	 * @var string
	 */
	public $db_version = '1';

	/**
	 * The single instance of the class.
	 *
	 * @var RankMath
	 */
	protected static $_instance = null;

	/**
	 * Possible error message.
	 *
	 * @var null|\WP_Error
	 */
	protected $error = null;

	/**
	 * Plugin url.
	 *
	 * @var string
	 */
	private $plugin_url = null;

	/**
	 * Plugin path.
	 *
	 * @var string
	 */
	private $plugin_dir = null;

	/**
	 * Factory.
	 *
	 * @var array
	 */
	private $factory = array();

	/**
	 * JSON factory.
	 *
	 * @var array
	 */
	private $json = array();

	/**
	 * Cloning is forbidden.
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cloning is forbidden.', 'rank-math' ), $this->version );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Unserializing instances of this class is forbidden.', 'rank-math' ), $this->version );
	}

	/**
	 * Magic get method.
	 *
	 * @param  string $key Key to get.
	 * @return mixed Property value or NULL if it does not exists
	 */
	public function __get( $key ) {

		if ( property_exists( $this, $key ) ) {
			return $this->$key;
		}

		if ( array_key_exists( $key, $this->factory ) ) {
			return $this->factory[ $key ];
		}

		return null;
	}

	/**
	 * Magic set method.
	 *
	 * @param mixed $key   Key to set.
	 * @param mixed $value Value to set.
	 */
	public function __set( $key, $value ) {

		if ( property_exists( $this, $key ) ) {
			$this->$key = $value;
		}

		$this->factory[ $key ] = $value;
	}

	/**
	 * Main RankMath instance.
	 *
	 * Ensure only one instance is loaded or can be loaded.
	 *
	 * @see rank_math()
	 * @return RankMath
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) && ! ( self::$_instance instanceof RankMath ) ) {
			self::$_instance = new RankMath();
			self::$_instance->setup();
		}

		return self::$_instance;
	}

	/**
	 * RankMath constructor.
	 */
	private function __construct() {}

	/**
	 * Instantiate the plugin.
	 */
	private function setup() {

		// For Developers.
		$file = get_stylesheet_directory() . '/rank-math.php';
		if ( file_exists( $file ) ) {
			require_once $file;
		}

		$this->settings = new Settings;
		if ( $this->is_invalid_registration() ) {
			return;
		}

		$this->includes();
		$this->hooks();

		/**
		 * Fires when plugin is included/loaded.
		 */
		$this->do_action( 'loaded' );
	}

	/**
	 * Include required core files used in admin and on the frontend.
	 */
	private function includes() {

		$this->manager = new Module_Manager;

		// Just Init.
		new Common;
		$this->rewrite = new Rewrite;
		new Compatibility;

		// Admin Only.
		if ( is_admin() ) {
			rank_math()->admin = new Admin;
		}

		// Frontend Only.
		if ( ! is_admin() ) {
			rank_math()->frontend = new Frontend;
		}

		// WP_CLI Commands.
		if ( defined( 'WP_CLI' ) && WP_CLI ) {
			include_once $this->includes_dir() . 'class-cli-command.php';
		}

		// Usage Tracking.
		if ( defined( 'DOING_CRON' ) && ! defined( 'DOING_AJAX' ) && Helper::get_settings( 'general.usage_tracking' ) ) {
			new Tracking;
		}
	}

	/**
	 * Hook into actions and filters.
	 */
	private function hooks() {
		if ( is_admin() ) {
			/*
			 * Redirect to about page.
			 *
			 * We don't use the 'was_setup' option for the redirection as
			 * if the install fails the first time this will create a redirect loop
			 * on the about page.
			 */
			if ( true === boolval( get_option( 'rank_math_redirect_about', false ) ) ) {
				$this->action( 'init', 'redirect_to_welcome' );
			}

			$this->action( 'admin_head', 'display_deferred_notices' );
			$this->action( 'admin_footer', 'print_json', 1 );
			$this->action( 'admin_notices', 'display_notices', 99 );
		} else {
			$this->action( 'wp_footer', 'print_json', 1 );
		}

		$this->action( 'admin_init', 'is_update_needed' );
		$this->action( 'plugins_loaded', 'load_textdomain' );
		$this->filter( 'plugin_action_links_' . plugin_basename( RANK_MATH_FILE ), 'action_links' );
		$this->filter( 'plugin_row_meta', 'plugin_row_meta', 10, 2 );
		$this->filter( 'cron_schedules', 'cron_schedules' );
	}

	/**
	 * Load Localisation files.
	 *
	 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
	 *
	 * Locales found in:
	 *     - WP_LANG_DIR/rank-math/rank-math-LOCALE.mo
	 *     - WP_LANG_DIR/plugins/rank-math-LOCALE.mo
	 */
	public function load_textdomain() {
		$locale = is_admin() && function_exists( 'get_user_locale' ) ? get_user_locale() : get_locale();
		$locale = apply_filters( 'plugin_locale', $locale, 'rank-math' );

		unload_textdomain( 'rank-math' );
		load_textdomain( 'rank-math', WP_LANG_DIR . '/rank-math/rank-math-' . $locale . '.mo' );
		load_plugin_textdomain( 'rank-math', false, $this->plugin_dir() . '/languages/' );
	}

	/**
	 * Check if need any update
	 *
	 * @return boolean
	 */
	public function is_update_needed() {
		$installed_version = get_option( 'rank_math_version' );

		// may be it's the first install.
		if ( ! $installed_version ) {
			return false;
		}

		if ( version_compare( $installed_version, $this->version, '<' ) ) {
			new Upgrade;
		}
	}

	/**
	 * Show action links on the plugin screen.
	 *
	 * @param  mixed $links Plugin Action links.
	 * @return array
	 */
	public function action_links( $links ) {

		$plugin_links = array(
			'<a href="' . Helper::get_admin_url( 'options-general' ) . '">' . esc_html__( 'Settings', 'rank-math' ) . '</a>',
			'<a href="' . Helper::get_admin_url( 'wizard' ) . '">' . esc_html__( 'Setup Wizard', 'rank-math' ) . '</a>',
		);

		return array_merge( $links, $plugin_links );
	}

	/**
	 * Show row meta on the plugin screen.
	 *
	 * @param  mixed $links Plugin Row Meta.
	 * @param  mixed $file  Plugin Base file.
	 * @return array
	 */
	public function plugin_row_meta( $links, $file ) {

		if ( plugin_basename( RANK_MATH_FILE ) !== $file ) {
			return $links;
		}

		$more = array(
			'<a href="' . Helper::get_admin_url( 'help' ) . '">' . esc_html__( 'Getting Started', 'rank-math' ) . '</a>',
			'<a href="https://mythemeshop.com/kb/wordpress-seo-plugin-rank-math/titles-and-meta/?utm_source=Rank+Math+Plugins+List&utm_medium=LP+CPC&utm_content=Rank+Math+KB&utm_campaign=Rank+Math">' . esc_html__( 'Documentation', 'rank-math' ) . '</a>',
		);

		return array_merge( $links, $more );
	}

	/**
	 * Add more cron schedules.
	 *
	 * @param  array $schedules List of WP scheduled cron jobs.
	 * @return array
	 */
	public function cron_schedules( $schedules ) {

		$schedules['weekly'] = array(
			'interval' => DAY_IN_SECONDS * 7,
			'display'  => esc_html__( 'Once Weekly', 'rank-math' ),
		);

		return $schedules;
	}

	/**
	 * Redirect to welcome page.
	 *
	 * Redirect the user to the welcome page after plugin activation.
	 */
	public function redirect_to_welcome() {

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		delete_option( 'rank_math_redirect_about' );
		$url = 'registration';
		if ( $this->invalid_license ) {
			$url = 'registration';
		} elseif ( get_option( 'rank_math_wizard_completed' ) ) {
			$url = '';
		}
		wp_redirect( Helper::get_admin_url( $url ) );
		exit;
	}

	/**
	 * Check that the plugin is licensed properly.
	 *
	 * @return bool
	 */
	private function is_invalid_registration() {
		$options           = get_option( 'mts_connect_data', false );
		$invalid           = empty( $options ) ? true : false;
		$skip_registration = Helper::is_plugin_active_for_network() ? get_blog_option( get_main_site_id(), 'rank_math_registration_skip' ) : get_option( 'rank_math_registration_skip' );

		if ( true === boolval( $skip_registration ) ) {
			$invalid = false;
		}

		if ( $invalid ) {

			register_activation_hook( RANK_MATH_FILE, array( '\RankMath\Installer', 'install' ) );
			add_action( 'wpmu_new_blog', array( '\RankMath\Installer', 'activate_new_blog' ) );
			add_filter( 'wpmu_drop_tables', array( '\RankMath\Installer', 'on_delete_blog' ) );

			if ( is_admin() ) {
				/*
				 * Redirect to about page.
				 *
				 * We don't use the 'was_setup' option for the redirection as
				 * if the install fails the first time this will create a redirect loop
				 * on the about page.
				 */
				if ( true === boolval( get_option( 'rank_math_redirect_about', false ) ) ) {
					$this->action( 'init', 'redirect_to_welcome' );
				}
			}

			$this->invalid_license = true;

		}

		new Product_Registration;
		return $invalid;
	}

	/**
	 * Add a notice for display in admin after page reload.
	 *
	 * @param string $message Message.
	 * @param string $code    Optional. Notice type. Accepts 'error', 'info', 'success', 'warning'. Default 'error'.
	 * @param string $screen  Optional. Screen id. Accepts 'any', '{$screen->id}'. Default 'any'.
	 */
	public function add_deferred_error( $message, $code = 'error', $screen = 'any' ) {

		$notices   = get_option( 'rank_math_deferred_notices', array() );
		$notices[] = array(
			'code'    => $code,
			'message' => $message,
			'screen'  => $screen,
		);

		update_option( 'rank_math_deferred_notices', $notices );
	}

	/**
	 * Add a notice for display in admin after page reload.
	 *
	 * Add a new error to the WP_Error object and create object if it doesn't exists.
	 *
	 * @param string $message Message.
	 * @param string $code    Optional. Notice type. Accepts 'error', 'info', 'success', 'warning'. Default 'error'.
	 * @param string $data    Optional. Error data. Default empty.
	 */
	public function add_error( $message, $code = 'error', $data = '' ) {

		if ( is_null( $this->error ) && ! ( $this->error instanceof \WP_Error ) ) {
			$this->error = new \WP_Error();
		}

		if ( $data ) {
			$current = (array) $this->error->get_error_data( $code );
			$data    = array_merge( (array) $data, $current );
		}
		$this->error->add( $code, $message, $data );
	}

	/**
	 * Display deferred notices.
	 */
	public function display_deferred_notices() {
		$notices = get_option( 'rank_math_deferred_notices', array() );

		if ( empty( $notices ) ) {
			return;
		}

		$screen = get_current_screen();
		foreach ( $notices as $index => $notice ) {

			if ( 'any' === $notice['screen'] || $screen->id == $notice['screen'] ) {
				$this->add_error( $notice['message'], $notice['code'] );
				unset( $notices[ $index ] );
			}
		}

		update_option( 'rank_math_deferred_notices', $notices );
	}

	/**
	 * Display notices.
	 *
	 * Get all the error messages and display them in the admin notice.
	 */
	public function display_notices() {
		if ( is_null( $this->error ) || ! ( $this->error instanceof \WP_Error ) ) {
			return;
		}

		$this->print_messages( 'success' );
		$this->print_messages( 'error' );
		$this->print_messages( 'info' );
		$this->print_messages( 'warning' );

		?>
		<script>
			;(function($) {
				$( '.is-dismissible' ).on( 'click', '.notice-dismiss', function() {
					var button = $( this ),
						data = button.parent().data( 'dismiss' )

					if ( false == data ) {
						return
					}

					$.ajax({
						url: ajaxurl,
						type: 'POST',
						dataType: 'json',
						data: {
							action: 'rank_math_notice_dismissible',
							security: ( typeof rankMath !== 'undefined' && rankMath.security ) ? rankMath.security : '<?php echo wp_create_nonce( 'rank-math-ajax-nonce' ); // WPCS: xss ok. ?>',
							dismiss: data
						}
					});
				});
			})(jQuery);
		</script>
		<?php
	}

	/**
	 * Print messages
	 *
	 * @param string $type Type of message to print.
	 */
	private function print_messages( $type ) {
		$messages = $this->error->get_error_messages( $type );
		if ( ! $messages ) {
			return;
		}

		$data = $this->error->get_error_data( $type );
		$data = ! empty( $data ) ? join( ',', $data ) : 'false';
		?>
		<div class="rank-math-notice notice notice-<?php echo $type; ?> is-dismissible" data-dismiss="<?php echo $data; // WPCS: xss ok. ?>">
			<p>
				<?php echo join( '<br>', $messages ); // WPCS: xss ok. ?>
			</p>
		</div>
		<?php
	}

	/**
	 * Print JSON object to use in admin and front-end.
	 */
	public function print_json() {
		$this->json['version']  = $this->get_version();
		$this->json['ajaxurl']  = admin_url( 'admin-ajax.php' );
		$this->json['adminurl'] = admin_url( 'admin.php' );
		$this->json['security'] = wp_create_nonce( 'rank-math-ajax-nonce' );

		foreach ( $this->json as $key => $value ) {
			if ( ! is_string( $value ) ) {
				continue;
			}

			$this->json[ $key ] = html_entity_decode( (string) $value, ENT_QUOTES, 'UTF-8' );
		}

		$script = 'var rankMath = ' . wp_json_encode( $this->json ) . ';';

		echo "<script type='text/javascript'>\n";
		echo "/* <![CDATA[ */\n";
		echo "$script\n";
		echo "/* ]]> */\n";
		echo "</script>\n";
	}

	/**
	 * Add something to JSON object.
	 *
	 * @param string $key   Unique identifier.
	 * @param mixed  $value Value of pair.
	 */
	public function add_json( $key, $value ) {
		// If key doesn't exists.
		if ( ! isset( $this->json[ $key ] ) ) {
			$this->json[ $key ] = $value;
			return;
		}

		// If key already exists.
		$old_value = $this->json[ $key ];

		// If both array merge them.
		if ( is_array( $old_value ) && is_array( $value ) ) {
			$this->json[ $key ] = array_merge( $old_value, $value );
			return;
		}

		$this->json[ $key ] = $value;
	}

	/**
	 * Get the plugin dir.
	 *
	 * @return string
	 */
	public function plugin_dir() {

		if ( is_null( $this->plugin_dir ) ) {
			$this->plugin_dir = untrailingslashit( plugin_dir_path( RANK_MATH_FILE ) ) . '/';
		}

		return $this->plugin_dir;
	}

	/**
	 * Get the plugin url.
	 *
	 * @return string
	 */
	public function plugin_url() {

		if ( is_null( $this->plugin_url ) ) {
			$this->plugin_url = untrailingslashit( plugin_dir_url( RANK_MATH_FILE ) ) . '/';
		}

		return $this->plugin_url;
	}

	/**
	 * Get plugin includes directory.
	 *
	 * @return string
	 */
	public function includes_dir() {
		return $this->plugin_dir() . 'includes/';
	}

	/**
	 * Get assets url.
	 *
	 * @return string
	 */
	public function assets() {
		return $this->plugin_url() . 'assets/front/';
	}

	/**
	 * Get plugin admin directory.
	 *
	 * @return string
	 */
	public function admin_dir() {
		return $this->plugin_dir() . 'includes/admin/';
	}

	/**
	 * Get plugin version.
	 *
	 * @return string
	 */
	public function get_version() {
		return $this->version;
	}
}
