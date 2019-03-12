<?php
/**
 * The Redirections Module
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Modules\Redirections
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Modules\Redirections;

use CMB2_hookup;
use RankMath\Helper;
use RankMath\Module;
use RankMath\Admin\Page;
use RankMath\Traits\Ajax;
use RankMath\Traits\Hooker;
use RankMath\Admin\Helper as Admin_Helper;

defined( 'ABSPATH' ) || exit;

/**
 * Admin class.
 */
class Admin extends Module {

	use Ajax, Hooker;

	/**
	 * The Constructor.
	 */
	public function __construct() {

		$directory = dirname( __FILE__ );
		$this->config(array(
			'id'             => 'redirect',
			'directory'      => $directory,
			'table'          => 'RankMath\Modules\Redirections\Table',
			'help'           => array(
				'title' => esc_html__( 'Redirections', 'rank-math' ),
				'view'  => $directory . '/views/help.php',
			),
			'screen_options' => array(
				'id'      => 'rank_math_redirections_per_page',
				'default' => 100,
			),
		));
		parent::__construct();

		$this->action( 'rank_math/dashboard/widget', 'dashboard_widget', 12 );
		$this->filter( 'rank_math/settings/general', 'add_settings' );

		if ( Admin_Helper::is_post_edit() || Admin_Helper::is_term_edit() ) {
			new Metabox;
		}

		if ( $this->page->is_current_page() || 'rank_math_save_redirections' === Helper::param_post( 'action' ) ) {
			$this->form = new Form;
			$this->form->hooks();
		}

		if ( $this->page->is_current_page() ) {
			new Export;
			$this->action( 'init', 'init' );
			add_action( 'admin_enqueue_scripts', array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
			rank_math()->add_json( 'maintenanceMode', esc_html__( 'Maintenance Code', 'rank-math' ) );
			rank_math()->add_json( 'emptyError', __( 'This field must not be empty.', 'rank-math' ) );
		}

		if ( $this->is_ajax() ) {
			$this->ajax( 'redirection_delete', 'handle_ajax' );
			$this->ajax( 'redirection_activate', 'handle_ajax' );
			$this->ajax( 'redirection_deactivate', 'handle_ajax' );
			$this->ajax( 'redirection_trash', 'handle_ajax' );
			$this->ajax( 'redirection_restore', 'handle_ajax' );
		}

		add_action( 'rank_math/redirection/clean_trashed', array( '\\RankMath\\Modules\\Redirections\\DB', 'periodic_clean_trash' ) );
	}

	/**
	 * Register admin page.
	 */
	public function register_admin_page() {

		$dir = $this->directory . '/views/';
		$uri = untrailingslashit( plugin_dir_url( __FILE__ ) );

		$this->page = new Page( 'rank-math-redirections', esc_html__( 'Redirections', 'rank-math' ), array(
			'position'   => 12,
			'parent'     => 'rank-math',
			'capability' => 'rank_math_redirections',
			'render'     => $dir . 'main.php',
			'help'       => array(
				'redirections-overview'       => array(
					'title' => esc_html__( 'Overview', 'rank-math' ),
					'view'  => $dir . 'help-tab-overview.php',
				),
				'redirections-screen-content' => array(
					'title' => esc_html__( 'Screen Content', 'rank-math' ),
					'view'  => $dir . 'help-tab-screen-content.php',
				),
				'redirections-actions'        => array(
					'title' => esc_html__( 'Available Actions', 'rank-math' ),
					'view'  => $dir . 'help-tab-actions.php',
				),
				'redirections-bulk'           => array(
					'title' => esc_html__( 'Bulk Actions', 'rank-math' ),
					'view'  => $dir . 'help-tab-bulk.php',
				),
			),
			'assets'     => array(
				'styles'  => array(
					'rank-math-common'       => '',
					'rank-math-cmb2'         => '',
					'rank-math-redirections' => $uri . '/assets/redirections.css',
				),
				'scripts' => array(
					'rank-math-common'       => '',
					'rank-math-redirections' => $uri . '/assets/redirections.js',
				),
			),
		));
	}

	/**
	 * Add module settings into general optional panel.
	 *
	 * @param  array $tabs Array of option panel tabs.
	 * @return array
	 */
	public function add_settings( $tabs ) {

		Helper::array_insert( $tabs, array(
			'redirections' => array(
				'icon'  => 'dashicons dashicons-controls-forward',
				'title' => esc_html__( 'Redirections', 'rank-math' ),
				/* translators: Link to kb article */
				'desc'  => sprintf( esc_html__( 'Enable Redirections to set up custom 301, 302, 307, 410, or 451 redirections. %s.', 'rank-math' ), '<a href="https://mythemeshop.com/kb/rank-math-seo-plugin/general-settings/#redirections" target="_blank">' . esc_html__( 'Learn more', 'rank-math' ) . '</a>' ),
				'file'  => $this->directory . '/views/options.php',
			),
		), 8 );

		return $tabs;
	}

	/**
	 * Add stats into admin dashboard.
	 */
	public function dashboard_widget() {
		$data = DB::get_stats();
		?>
		<br />
		<h3><?php esc_html_e( 'Redirections Stats', 'rank-math' ); ?></h3>
		<ul>
			<li><span><?php esc_html_e( 'Redirections Count', 'rank-math' ); ?></span><?php echo Helper::human_number( $data->total ); ?></li>
			<li><span><?php esc_html_e( 'Redirections Hits', 'rank-math' ); ?></span><?php echo Helper::human_number( $data->hits ); ?></li>
		</ul>
		<?php
	}

	/**
	 * Initialize.
	 */
	public function init() {
		if ( ! empty( $_REQUEST['delete_all'] ) ) {
			check_admin_referer( 'bulk-redirections' );
			DB::clear_trashed();
			return;
		}

		$action = Helper::get_request_action();
		if ( false === $action || empty( $_REQUEST['redirection'] ) || 'edit' === $action ) {
			return;
		}

		check_admin_referer( 'bulk-redirections' );

		$ids = (array) $_REQUEST['redirection'];
		if ( empty( $ids ) ) {
			rank_math()->add_error( 'No valid id found.', 'error' );
			return;
		}

		$notice = $this->perform_action( $action, $ids );
		if ( $notice ) {
			rank_math()->add_error( $notice, 'success' );
			return;
		}

		rank_math()->add_error( esc_html__( 'No valid action found.', 'rank-math' ), 'error' );
	}

	/**
	 * Handle AJAX request.
	 */
	public function handle_ajax() {
		$action = Helper::get_request_action();
		if ( false === $action ) {
			return;
		}

		check_ajax_referer( 'redirection_list_action', 'security' );
		$this->has_cap_ajax( 'redirections' );

		$id     = isset( $_REQUEST['redirection'] ) ? absint( $_REQUEST['redirection'] ) : 0;
		$action = str_replace( 'rank_math_redirection_', '', $action );

		if ( ! $id ) {
			$this->error( esc_html__( 'No valid id found.', 'rank-math' ) );
		}

		$notice = $this->perform_action( $action, $id );
		if ( $notice ) {
			$this->success( $notice );
		}

		$this->error( esc_html__( 'No valid action found.', 'rank-math' ) );
	}

	/**
	 * Perform action on db.
	 *
	 * @param  string        $action Action to perform.
	 * @param  integer|array $ids    Rows to perform on.
	 * @return string
	 */
	private function perform_action( $action, $ids ) {
		$status  = array(
			'activate'   => 'active',
			'deactivate' => 'inactive',
			'trash'      => 'trashed',
			'restore'    => 'active',
		);
		$message = array(
			'activate'   => esc_html__( 'Redirection successfully activated.', 'rank-math' ),
			'deactivate' => esc_html__( 'Redirection successfully deactivated.', 'rank-math' ),
			'trash'      => esc_html__( 'Redirection successfully moved to Trash.', 'rank-math' ),
			'restore'    => esc_html__( 'Redirection successfully restored.', 'rank-math' ),
		);

		if ( isset( $status[ $action ] ) ) {
			DB::change_status( $ids, $status[ $action ] );
			return $message[ $action ];
		}

		if ( 'delete' === $action ) {
			$count = DB::delete( $ids );
			if ( $count > 0 ) {
				/* translators: delete counter */
				return sprintf( esc_html__( '%d redirection(s) successfully deleted.', 'rank-math' ), $count );
			}
		}

		return false;
	}
}
