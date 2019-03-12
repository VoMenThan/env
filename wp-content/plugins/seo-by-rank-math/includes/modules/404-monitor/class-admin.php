<?php
/**
 * The 404 Monitor Module
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Modules\Monitor
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Modules\Monitor;

use RankMath\Helper;
use RankMath\Admin\Page;
use RankMath\Module;

defined( 'ABSPATH' ) || exit;

/**
 * Admin class.
 */
class Admin extends Module {

	/**
	 * The Constructor.
	 */
	public function __construct() {

		$directory = dirname( __FILE__ );
		$this->config(array(
			'id'             => '404-monitor',
			'directory'      => $directory,
			'table'          => 'RankMath\Modules\Monitor\Table',
			'help'           => array(
				'title' => esc_html__( '404 Monitor', 'rank-math' ),
				'view'  => $directory . '/views/help.php',
			),
			'screen_options' => array(
				'id'      => 'rank_math_404_monitor_per_page',
				'default' => 100,
			),
		));
		parent::__construct();

		if ( $this->page->is_current_page() ) {
			$this->action( 'init', 'init' );
		}

		$this->action( 'rank_math/dashboard/widget', 'dashboard_widget', 11 );
		$this->filter( 'rank_math/settings/general', 'add_settings' );
	}

	/**
	 * Initialize.
	 */
	public function init() {
		$action = Helper::get_request_action();
		if ( false === $action ) {
			return;
		}

		if ( ! check_admin_referer( 'bulk-events' ) ) {
			check_admin_referer( '404_delete_log', 'security' );
		}

		if ( 'delete' === $action && ! empty( $_REQUEST['log'] ) ) {
			$count = DB::delete_log( $_REQUEST['log'] );
			if ( $count > 0 ) {
				/* translators: delete counter */
				rank_math()->add_error( sprintf( esc_html__( '%d log(s) deleted.', 'rank-math' ), $count ), 'success' );
			}
			return;
		}

		if ( 'clear_log' === $action ) {

			$count = DB::get_count();
			DB::clear_logs();

			/* translators: delete counter */
			rank_math()->add_error( sprintf( esc_html__( 'Log cleared - %d items deleted.', 'rank-math' ), $count ), 'success' );
			return;
		}
	}

	/**
	 * Register admin page.
	 */
	public function register_admin_page() {

		$dir = $this->directory . '/views/';
		$uri = untrailingslashit( plugin_dir_url( __FILE__ ) );

		$this->page = new Page( 'rank-math-404-monitor', esc_html__( '404 Monitor', 'rank-math' ), array(
			'position'   => 12,
			'parent'     => 'rank-math',
			'capability' => 'rank_math_404_monitor',
			'render'     => $dir . 'main.php',
			'help'       => array(
				'404-overview'       => array(
					'title' => esc_html__( 'Overview', 'rank-math' ),
					'view'  => $dir . 'help-tab-overview.php',
				),
				'404-screen-content' => array(
					'title' => esc_html__( 'Screen Content', 'rank-math' ),
					'view'  => $dir . 'help-tab-screen-content.php',
				),
				'404-actions'        => array(
					'title' => esc_html__( 'Available Actions', 'rank-math' ),
					'view'  => $dir . 'help-tab-actions.php',
				),
				'404-bulk'           => array(
					'title' => esc_html__( 'Bulk Actions', 'rank-math' ),
					'view'  => $dir . 'help-tab-bulk.php',
				),
			),
			'assets'     => array(
				'styles'  => array( 'rank-math-common' => '' ),
				'scripts' => array( 'rank-math-404-monitor' => $uri . '/assets/404-monitor.js' ),
			),
		));

		if ( $this->page->is_current_page() ) {
			rank_math()->add_json( 'logConfirmClear', esc_html__( 'Are you sure you wish to delete all 404 error logs?', 'rank-math' ) );
			rank_math()->add_json( 'redirectionsUri', Helper::get_admin_url( 'redirections' ) );
		}
	}

	/**
	 * Add module settings into general optional panel.
	 *
	 * @param  array $tabs Array of option panel tabs.
	 * @return array
	 */
	public function add_settings( $tabs ) {

		Helper::array_insert( $tabs, array(
			'404-monitor' => array(
				'icon'  => 'dashicons dashicons-no',
				'title' => esc_html__( '404 Monitor', 'rank-math' ),
				/* translators: 1. Link to kb article 2. Link to redirection setting scree */
				'desc'  => sprintf( esc_html__( 'The 404 monitor lets you see the URLs where visitors and search engine crawlers run into 404 not found errors on your site. %1$s. Turn on %2$s too to redirect the faulty URLs easily.', 'rank-math' ), '<a href="https://mythemeshop.com/kb/rank-math-seo-plugin/general-settings/#404-monitor" target="_blank">' . esc_html__( 'Learn more', 'rank-math' ) . '</a>', '<a href="' . Helper::get_admin_url( 'options-general#setting-panel-redirections' ) . '" target="_blank">' . esc_html__( 'Redirections', 'rank-math' ) . '</a>' ),
				'file'  => $this->directory . '/views/options.php',
			),
		), 7 );

		return $tabs;
	}

	/**
	 * Add stats into admin dashboard
	 */
	public function dashboard_widget() {
		$data = DB::get_stats();
		?>
		<br />
		<h3><?php esc_html_e( '404 Monitor Stats', 'rank-math' ); ?></h3>
		<ul>
			<li><span><?php esc_html_e( '404 Monitor Log Count', 'rank-math' ); ?></span><?php echo Helper::human_number( $data->total ); ?></li>
			<li><span><?php esc_html_e( '404 URI Hits', 'rank-math' ); ?></span><?php echo Helper::human_number( $data->hits ); ?></li>
		</ul>
		<?php
	}
}
