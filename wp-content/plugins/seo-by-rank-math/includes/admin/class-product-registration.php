<?php
/**
 * The Setup Wizard - configure the SEO settings in a few steps.
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Admin
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Admin;

use RankMath\CMB2;
use RankMath\Traits\Hooker;
use RankMath\Traits\Wizard;
use RankMath\Helper as GlobalHelper;
use RankMath\KB;

defined( 'ABSPATH' ) || exit;

/**
 * Product_Registration class.
 */
class Product_Registration {

	use Hooker, Wizard;

	/**
	 * Hold steps data.
	 *
	 * @var array
	 */
	protected $steps = array();

	/**
	 * Hold current step.
	 *
	 * @var string
	 */
	protected $step = '';

	/**
	 * Current step slug.
	 *
	 * @var string
	 */
	protected $step_slug = '';

	/**
	 * The text string array.
	 *
	 * @var array
	 */
	protected $strings = null;

	/**
	 * Top level admin page.
	 *
	 * @var string
	 */
	protected $slug = 'rank-math-registration';

	/**
	 * CMB2 object
	 *
	 * @var \CMB2
	 */
	public $cmb = null;

	/**
	 * The Constructor.
	 */
	public function __construct() {
		$this->strings();
		$this->action( 'cmb2_admin_init', 'steps', 9 );
		$this->action( 'cmb2_admin_init', 'register_cmb2' );
		$this->action( 'admin_menu', 'add_admin_menu' );
		$this->action( 'admin_post_rank_math_save_wizard', 'save_wizard' );
		$this->action( 'admin_post_rank_math_skip_wizard', 'skip_wizard' );

		// If not the page is not this page stop here.
		if ( ! $this->is_current_page() ) {
			return;
		}

		$this->action( 'admin_init', 'admin_page', 30 );
		$this->filter( 'user_has_cap', 'filter_user_has_cap' );
	}

	/**
	 * Register CMB2 option page for setup wizard.
	 */
	public function register_cmb2() {
		$this->cmb = new_cmb2_box( array(
			'id'           => 'rank-math-wizard',
			'object_types' => array( 'options-page' ),
			'option_key'   => 'rank-math-wizard',
			'hookup'       => false,
			'save_fields'  => false,
		) );

		isset( $this->steps[ $this->step ], $this->steps[ $this->step ]['form'] ) ? call_user_func( $this->steps[ $this->step ]['form'], $this ) : false;

		CMB2::pre_init( $this->cmb );
	}

	/**
	 * Execute save handler for current step.
	 */
	public function save_wizard() {

		// If no form submission, bail.
		if ( empty( $_POST ) || 'register' !== $_POST['step'] ) {
			return wp_safe_redirect( $_POST['_wp_http_referer'] );
		}

		check_admin_referer( 'rank-math-wizard', 'security' );

		$show_content = true;
		$values       = $this->cmb->get_sanitized_values( $_POST );
		if ( isset( $this->steps[ $this->step ]['handler'] ) ) {
			$show_content = call_user_func( $this->steps[ $this->step ]['handler'], $values, $this );
		}

		Helper::allow_tracking();

		$redirect = true === $show_content ? GlobalHelper::get_admin_url( 'wizard' ) : $_POST['_wp_http_referer'];
		wp_safe_redirect( $redirect );
		exit;
	}

	/**
	 * Execute save handler for skip_wizard.
	 */
	public function skip_wizard() {
		check_admin_referer( 'rank-math-wizard', 'security' );
		add_option( 'rank_math_registration_skip', true );
		Helper::allow_tracking();
		GlobalHelper::schedule_flush_rewrite();
		wp_safe_redirect( GlobalHelper::get_admin_url( 'wizard' ) );
		exit;
	}

	/**
	 * Add the admin menu item, under Appearance.
	 */
	public function add_admin_menu() {
		$is_skipped = get_option( 'rank_math_registration_skip', false );
		if ( ( $is_skipped || ! $this->invalid_license ) && ( empty( $_GET['page'] ) || $this->slug !== $_GET['page'] ) ) {
			return;
		}

		$this->hook_suffix = add_menu_page(
			esc_html__( 'Rank Math', 'rank-math' ), esc_html__( 'Rank Math', 'rank-math' ), 'manage_options', $this->slug, array( $this, 'admin_page' )
		);
	}

	/**
	 * Add the admin page.
	 */
	public function admin_page() {

		// Do not proceed, if we're not on the right page.
		if ( empty( $_GET['page'] ) || $this->slug !== $_GET['page'] ) {
			return;
		}

		if ( ob_get_length() ) {
			ob_end_clean();
		}

		// Enqueue styles.
		\CMB2_hookup::enqueue_cmb_css();
		\CMB2_hookup::enqueue_cmb_js();

		$css = rank_math()->plugin_url() . 'assets/admin/css/';
		wp_register_style( 'rank-math-common', $css . 'common.css', null, rank_math()->get_version() );
		wp_register_style( 'rank-math-cmb2', $css . 'cmb2.css', null, rank_math()->get_version() );
		wp_enqueue_style( 'rank-math-wizard', $css . 'setup-wizard.css', array( 'wp-admin', 'buttons', 'cmb2-styles', 'rank-math-common', 'rank-math-cmb2' ), rank_math()->get_version() );

		$logo_url = '<a href="' . KB::get( 'logo' ) . '" target="_blank"><img src="' . esc_url( rank_math()->plugin_url() . 'assets/admin/img/logo.svg' ) . '"></a>';

		ob_start();

		/**
		 * Start the actual page content.
		 */
		include_once $this->get_view( 'header' );
		include_once $this->get_view( 'content' );
		include_once $this->get_view( 'footer' );
		exit;
	}

	/**
	 * 2. Register Product.
	 */
	protected function register() {
		?>
		<header>

		<?php if ( $this->invalid_license ) { ?>
			<h1><?php esc_html_e( 'Connect FREE Account', 'rank-math' ); ?></h1>
			<div class="notice notice-warning rank-math-registration-notice inline">
				<p>
					<?php
					/* translators: Link to MyThemeShop signup page */
					printf( wp_kses_post( __( 'You need to connect with your <a href="%s" target="_blank"><strong>FREE MyThemeShop account</strong></a> to use Rank Math on this site.', 'rank-math' ) ), KB::get( 'free-account' ) );
					?>
				</p>
			</div>
		<?php } else { ?>
			<h1><?php esc_html_e( 'Account Successfully Connected', 'rank-math' ); ?></h1>
			<h3 style="text-align: center; padding-top:15px;"><?php esc_html_e( 'You have successfully activated Rank Math.', 'rank-math' ); ?></h3>
		<?php } ?>

		</header>

		<span class="wp-header-end"></span>

		<?php rank_math()->display_deferred_notices(); ?>
		<?php rank_math()->display_notices(); ?>

		<?php $this->cmb->show_form(); ?>
		<footer class="form-footer wp-core-ui rank-math-ui">
			<button type="submit" class="button button-<?php echo $this->invalid_license ? 'primary alignright' : 'secondary'; ?>"><?php echo $this->invalid_license ? esc_html__( 'Activate Rank Math', 'rank-math' ) : esc_html__( 'Deactivate License', 'rank-math' ); ?></button>
			<button type="submit" class="button button-<?php echo $this->invalid_license ? 'secondary' : 'primary alignright'; ?>" formnovalidate id="skip-registration" style="margin-right:15px"><?php echo $this->invalid_license ? esc_html__( 'Skip Now', 'rank-math' ) : esc_html__( 'Next', 'rank-math' ); ?></button>
		</footer>
		<?php
		$this->print_script();
	}

	/**
	 * Print javascript
	 */
	private function print_script() {
		?>
		<script>
		(function($){
			$(function() {
				$( '#skip-registration' ).on( 'click', function( event ) {
					$('[name="action"]').val( 'rank_math_skip_wizard' );
					$( this ).closest( '.cmb-form' );
				});

				$( '.cmb-form' ).on( 'keyup keypress', function( event ) {
					var isValid = event.currentTarget.checkValidity();

					var keyCode = event.keyCode || event.which;
					if ( ! isValid && 13 === keyCode ) {
						event.preventDefault();
						return false;
					}
				});

				// Required Field
				$( '.required, [required]' ).on( 'input invalid', function( event ) {
					event.preventDefault();

					var input = $( this );
					if ( ! event.target.validity.valid ) {
						input.addClass( 'invalid animated shake' );
					} else {
						input.removeClass( 'invalid animated shake' );
					}
				});

			});
		})(jQuery);
		</script>
		<?php
	}

	/**
	 * 2.b. Handles form for register page.
	 */
	protected function register_form() {

		if ( $this->invalid_license ) {

			$this->cmb->add_field( array(
				'id'         => 'username',
				'type'       => 'text',
				'name'       => esc_html__( 'Username/Email', 'rank-math' ),
				'classes'    => 'nob nopb',
				'attributes' => array(
					'required'     => '',
					'autocomplete' => 'off',
				),
				'after'      => '<span class="validation-message">' . esc_html__( 'This field is required.', 'rank-math' ) . '</span>',
			));

			$this->cmb->add_field( array(
				'id'         => 'validation_code',
				'type'       => 'text',
				'name'       => esc_html__( 'Password', 'rank-math' ),
				'classes'    => 'nob nopb',
				'attributes' => array(
					'required'     => '',
					'autocomplete' => 'off',
					'type'         => 'password',
				),
				'after'      => '<span class="validation-message">' . esc_html__( 'This field is required.', 'rank-math' ) . '</span>',
			));

		}
		$settings = get_option( 'rank-math-options-general' );
		$this->cmb->add_field( array(
			'id'      => 'rank-math-usage-tracking',
			'type'    => 'checkbox',
			/* translators: Link to MyThemeShop privay policy */
			'name'    => sprintf( __( 'Gathering usage data helps us make Rank Math SEO plugin better - for you. By understanding how you use Rank Math, we can introduce new features and find out if existing features are working well for you. If you don’t want us to collect data from your website, uncheck the tickbox. Please note that licensing information may still be sent back to us for authentication. We collect data anonymously, read more %s.', 'rank-math' ), '<a href="' . KB::get( 'rm-privacy' ) . '" target="_blank">here</a>' ),
			'classes' => 'nob nopb',
			'default' => ( isset( $settings['usage_tracking'] ) && 'off' === $settings['usage_tracking'] ) ? '' : 'on',
		));
	}

	/**
	 * 2.c. Handles save button from register page.
	 *
	 * @param array $values Array of values for the step to process.
	 */
	protected function register_handler( $values ) {

		if ( ! isset( $values['username'] ) ) {
			delete_option( 'mts_connect_data' );
			return;
		}

		$values = wp_parse_args( $values, array(
			'username'        => '',
			'validation_code' => '',
		) );
		return Helper::register_product( $values['username'], $values['validation_code'] );
	}

	/**
	 * Setup steps.
	 */
	public function steps() {

		$this->steps['register'] = array(
			'name'     => esc_html__( 'Register', 'rank-math' ),
			'view'     => array( $this, 'register' ),
			'form'     => array( $this, 'register_form' ),
			'handler'  => array( $this, 'register_handler' ),
			'nav_hide' => true,
		);

		// Set Current Step.
		$this->step      = isset( $_REQUEST['step'] ) ? sanitize_key( $_REQUEST['step'] ) : current( array_keys( $this->steps ) );
		$this->step_slug = isset( $this->steps[ $this->step ] ) ? strtolower( $this->steps[ $this->step ]['name'] ) : '';
	}

	/**
	 * Set string.
	 */
	private function strings() {

		// Strings passed in from the config file.
		$this->strings = array(
			'title'               => esc_html__( 'Rank Math Product Registration', 'rank-math' ),
			'return-to-dashboard' => esc_html__( 'Return to dashboard', 'rank-math' ),
		);

		$options               = get_option( 'mts_connect_data', false );
		$this->invalid_license = empty( $options ) ? true : false;
	}

	/**
	 * Get view file to display.
	 *
	 * @param string $view View to display.
	 * @return string
	 */
	public function get_view( $view ) {

		if ( 'navigation' === $view ) {
			return Helper::get_view( 'wizard/no-navigation' );
		}

		return Helper::get_view( "wizard/{$view}" );
	}
}
