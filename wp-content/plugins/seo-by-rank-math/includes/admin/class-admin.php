<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Admin
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Admin;

use RankMath\Helper as GlobalHelper;
use RankMath\Traits\Ajax;
use RankMath\Traits\Hooker;
use RankMath\Modules\Search_Console\Search_Console;

defined( 'ABSPATH' ) || exit;

/**
 * Admin class.
 *
 * @codeCoverageIgnore
 */
class Admin {

	use Hooker, Ajax;

	/**
	 * The Constructor.
	 */
	public function __construct() {

		$this->includes();
		$this->hooks();

		/**
		 * Fires when admin is loaded.
		 */
		$this->do_action( 'admin/loaded' );
	}

	/**
	 * Include required files.
	 */
	private function includes() {

		rank_math()->admin_assets = new Assets;

		// Just Init.
		new Metabox;
		if ( filter_input( INPUT_GET, 'page' ) === 'rank-math-wizard' || filter_input( INPUT_POST, 'action' ) === 'rank_math_save_wizard' ) {
			new Setup_Wizard;
		}

		if ( defined( 'DOING_AJAX' ) && ! class_exists( 'Search_Console' ) ) {
			if ( isset( $_POST['action'] ) && in_array( $_POST['action'], array( 'rank_math_search_console_authentication', 'rank_math_search_console_deauthentication', 'rank_math_search_console_get_profiles' ) ) ) {
				GlobalHelper::update_modules( array( 'search-console' => 'on' ) );
				new Search_Console;
			}
		}
		new Watcher;

		$runners = array(
			new Post_Columns,
			new Import_Export,
			new Notices,
			new CMB2_Fields,
			new Deactivate_Survey,
		);

		foreach ( $runners as $runner ) {
			$runner->hooks();
		}
	}

	/**
	 * Hook into actions and filters.
	 */
	private function hooks() {

		$this->action( 'init', 'register_pages', 1 );
		$this->action( 'init', 'flush', 999 );
		$this->action( 'admin_menu', 'fix_first_submenu', 999 );
		$this->filter( 'user_contactmethods', 'update_contactmethods' );
		$this->action( 'admin_head', 'icon_css' );
		$this->action( 'save_post', 'canonical_check_notice' );
		$this->action( 'wp_dashboard_setup', 'add_dashboard_widgets' );
		$this->action( 'cmb2_save_options-page_fields', 'update_is_configured_value', 10, 2 );

		// AJAX.
		$this->ajax( 'is_keyword_new', 'is_keyword_new' );
		$this->ajax( 'save_checklist_layout', 'save_checklist_layout' );
		$this->ajax( 'deactivate_plugins', 'deactivate_plugins' );
	}

	/**
	 * If the flush option is set, flush the rewrite rules.
	 */
	public function flush() {
		if ( get_option( 'rank_math_flush_rewrite' ) ) {
			flush_rewrite_rules();
			delete_option( 'rank_math_flush_rewrite' );
		}
	}

	/**
	 * Print icon CSS for admin menu bar.
	 */
	public function icon_css() {
		?>
		<style>
			#wp-admin-bar-rank-math .rank-math-icon {
				display: inline-block;
				top: 6px;
				position: relative;
				padding-right: 10px;
				max-width: 20px;
			}
			#wp-admin-bar-rank-math .rank-math-icon svg {
				fill-rule: evenodd;
				fill: #dedede;
			}
			#wp-admin-bar-rank-math:hover .rank-math-icon svg {
				fill-rule: evenodd;
				fill: #00b9eb;
			}
		</style>
		<?php
	}

	/**
	 * Register admin pages for plugin.
	 */
	public function register_pages() {
		$this->check_registration();

		// Dashboard / Welcome / About.
		new Page( 'rank-math', esc_html__( 'Rank Math', 'rank-math' ), array(
			'position'   => 80,
			'capability' => 'manage_options',
			'icon'       => 'dashicons-chart-area',
			'render'     => Helper::get_view( 'dashboard' ),
			'assets'     => array(
				'styles'  => array( 'rank-math-dashboard' => '' ),
				'scripts' => array( 'rank-math-dashboard' => '' ),
			),
			'is_network' => GlobalHelper::is_plugin_active_for_network() && is_network_admin(),
		));

		// Help & Support.
		new Page( 'rank-math-help', esc_html__( 'Help &amp; Support', 'rank-math' ), array(
			'position'   => 99,
			'parent'     => 'rank-math',
			'capability' => 'level_1',
			'render'     => Helper::get_view( 'help-manager' ),
			'assets'     => array(
				'styles'  => array( 'rank-math-common' => '' ),
				'scripts' => array( 'rank-math-common' => '' ),
			),
		));

	}

	/**
	 * Fix first submenu name.
	 */
	public function fix_first_submenu() {
		global $submenu;
		if ( isset( $submenu['rank-math'] ) ) {
			if ( current_user_can( 'manage_options' ) && 'Rank Math' === $submenu['rank-math'][0][0] ) {
				$submenu['rank-math'][0][0] = esc_html__( 'Dashboard', 'rank-math' );
			} else {
				unset( $submenu['rank-math'][0] );
			}

			if ( empty( $submenu['rank-math'] ) ) {
				return;
			}
			// Store ID of first_menu item so we can use it in the Admin menu item.
			set_transient( 'rank_math_first_submenu_id', array_values( $submenu['rank-math'] )[0][2] );
		}
	}

	/**
	 * Filter the $contactmethods array and add Facebook, Google+ and Twitter.
	 * These are used with the Facebook author, rel="author" and Twitter cards implementation.
	 *
	 * @param array $contactmethods Currently set contactmethods.
	 * @return array $contactmethods with added contactmethods.
	 */
	public function update_contactmethods( $contactmethods ) {
		$contactmethods['googleplus'] = esc_html__( 'Google+', 'rank-math' );
		$contactmethods['twitter']    = esc_html__( 'Twitter username (without @)', 'rank-math' );
		$contactmethods['facebook']   = esc_html__( 'Facebook profile URL', 'rank-math' );

		return $contactmethods;
	}

	/**
	 * Register dashboard widget.
	 */
	public function add_dashboard_widgets() {
		wp_add_dashboard_widget( 'rank_math_dashboard_widget', esc_html__( 'Rank Math', 'rank-math' ), array( $this, 'render_dashboard_widget' ) );
	}

	/**
	 * Render dashboard widget.
	 */
	public function render_dashboard_widget() {
		?>
		<div id="published-posts" class="activity-block">
			<?php $this->do_action( 'dashboard/widget' ); ?>
		</div>
		<?php
	}

	/**
	 * Display dashabord tabs.
	 */
	public function display_dashboard_nav() {
		$current = isset( $_GET['view'] ) ? $_GET['view'] : 'modules';
		?>
		<h2 class="nav-tab-wrapper">
			<?php
			foreach ( $this->get_nav_links() as $id => $link ) :
				if ( isset( $link['cap'] ) && ! current_user_can( $link['cap'] ) ) {
					continue;
				}
				?>
			<a class="nav-tab<?php echo $id === $current ? ' nav-tab-active' : ''; ?>" href="<?php echo esc_url( GlobalHelper::get_admin_url( $link['url'], $link['args'] ) ); ?>" title="<?php echo $link['title']; ?>"><?php echo $link['title']; ?></a>
			<?php endforeach; ?>
		</h2>
		<?php
	}

	/**
	 * Show notice when canonical URL is not a valid URL.
	 *
	 * @param int $post_id The post id.
	 */
	public function canonical_check_notice( $post_id ) {
		$post_type      = get_post_type( $post_id );
		$is_allowed     = in_array( $post_type, GlobalHelper::get_allowed_post_types() );
		$doing_ajax     = defined( 'DOING_AJAX' ) && DOING_AJAX;
		$doing_autosave = defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE;

		if ( ! $is_allowed || $doing_autosave || $doing_ajax || isset( $_REQUEST['bulk_edit'] ) ) {
			return $post_id;
		}

		if ( ! empty( $_POST['rank_math_canonical_url'] ) && false === filter_var( $_POST['rank_math_canonical_url'], FILTER_VALIDATE_URL ) ) {
			$message = esc_html__( 'The canonical URL you entered does not seem to be a valid URL. Please double check it in the SEO meta box &raquo; Advanced tab.', 'rank-math' );
			rank_math()->add_deferred_error( $message, 'error' );
		}
	}

	/**
	 * Save checklist layout.
	 */
	public function save_checklist_layout() {

		check_ajax_referer( 'rank-math-ajax-nonce', 'security' );

		if ( empty( $_POST['layout'] ) || ! is_array( $_POST['layout'] ) ) {
			return;
		}

		$layout  = $_POST['layout'];
		$allowed = array(
			'basic'               => 1,
			'advanced'            => 1,
			'title-readability'   => 1,
			'content-readability' => 1,
		);
		$layout  = array_intersect_key( $layout, $allowed );

		update_user_meta( get_current_user_id(), 'rank_math_metabox_checklist_layout', $layout );
		exit;
	}

	/**
	 * CHeck if the keyword already used or not.
	 */
	public function is_keyword_new() {
		global $wpdb;

		check_ajax_referer( 'rank-math-ajax-nonce', 'security' );

		$result = array( 'isNew' => true );
		if ( empty( $_GET['keyword'] ) ) {
			$this->success( $result );
		}

		$keyword     = $_GET['keyword'];
		$object_id   = $_GET['objectID'];
		$object_type = $_GET['objectType'];
		$column_ids  = array(
			'post' => 'ID',
			'term' => 'term_id',
			'user' => 'ID',
		);
		if ( ! in_array( $object_type, array( 'post', 'term', 'user' ) ) ) {
			$object_type = 'post';
		}

		$main = $wpdb->{$object_type . 's'};
		$meta = $wpdb->{$object_type . 'meta'};

		$query = sprintf( 'select %1$s from %2$s inner join %3$s on %2$s.%1$s = %3$s.%4$s_id where ', $column_ids[ $object_type ], $main, $meta, $object_type );
		if ( 'post' === $object_type ) {
			$query .= sprintf( '%s.post_status = \'publish\' and ', $main );
		}
		$query .= sprintf( '%1$s.meta_key = \'rank_math_focus_keyword\' and %1$s.meta_value like %2$s and %1$s.%3$s_id != %4$d', $meta, '%s', $object_type, $object_id );

		$data = $wpdb->get_row( $wpdb->prepare( $query, '%' . $wpdb->esc_like( $keyword ) . '%' ) ); // WPCS: unprepared SQL ok.

		$result['isNew'] = empty( $data );

		$this->success( $result );
	}

	/**
	 * Get link suggestions for the current post.
	 *
	 * @param  int|WP_Post $post Current post.
	 * @return array
	 */
	public function get_link_suggestions( $post ) {
		global $pagenow;

		if ( 'post-new.php' === $pagenow ) {
			return;
		}

		$output = array();
		$post   = get_post( $post );
		$args   = array(
			'post_type'      => $post->post_type,
			'post__not_in'   => array( $post->ID ),
			'posts_per_page' => 5,
			'meta_key'       => 'rank_math_pillar_content',
			'meta_value'     => 'on',
			'tax_query'      => array( 'relation' => 'OR' ),
		);

		$taxonomies         = GlobalHelper::get_object_taxonomies( $post, 'names' );
		$exclude_taxonomies = array( 'post_format', 'product_shipping_class' );

		foreach ( $taxonomies as $taxonomy ) {

			if ( GlobalHelper::str_start_with( 'pa_', $taxonomy ) || in_array( $taxonomy, $exclude_taxonomies ) ) {
				continue;
			}

			$terms = wp_get_post_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
			if ( empty( $terms ) ) {
				continue;
			}

			$args['tax_query'][] = array(
				'taxonomy' => $taxonomy,
				'field'    => 'term_id',
				'terms'    => $terms,
			);
		}

		$posts = get_posts( $args );
		foreach ( $posts as $related_post ) {
			$item = array(
				'title'          => get_the_title( $related_post->ID ),
				'url'            => get_permalink( $related_post->ID ),
				'post_id'        => $related_post->ID,
				'focus_keywords' => get_post_meta( $related_post->ID, 'rank_math_focus_keyword', true ),
			);

			$item['focus_keywords'] = empty( $item['focus_keywords'] ) ? array() : explode( ',', $item['focus_keywords'] );

			$output[] = $item;
		}

		return $output;
	}

	/**
	 * Output link suggestions.
	 *
	 * @param  array $suggestions Link items.
	 * @return string
	 */
	public function get_link_suggestions_html( $suggestions ) {
		$output = '<div class="rank-math-link-suggestions-content" data-count="' . count( $suggestions ) . '">';

		$is_use_fk = 'focus_keywords' === GlobalHelper::get_settings( 'titles.pt_' . get_post_type() . '_ls_use_fk' );
		foreach ( $suggestions as $suggestion ) {
			$label = $suggestion['title'];
			if ( $is_use_fk && ! empty( $suggestion['focus_keywords'] ) ) {
				$label = $suggestion['focus_keywords'][0];
			}

			$output .= sprintf(
				'<div class="suggestion-item">
					<div class="suggestion-actions">
						<span class="dashicons dashicons-clipboard suggestion-copy" title="%5$s" data-clipboard-text="%2$s"></span>
						<span class="dashicons dashicons-admin-links suggestion-insert" title="%6$s" data-url="%2$s" data-text="%7$s"></span>
					</div>
					<span class="suggestion-title" data-fk=\'%1$s\'><a target="_blank" href="%2$s" title="%3$s">%4$s</a></span>
				</div>',
				esc_attr( json_encode( $suggestion['focus_keywords'] ) ),
				$suggestion['url'], $suggestion['title'], $label,
				esc_attr__( 'Copy Link URL to Clipboard', 'rank-math' ),
				esc_attr__( 'Insert Link in Content', 'rank-math' ),
				esc_attr( $label )
			);
		}

		$output .= '</div>';

		return $output;
	}

	/**
	 * Updates the is_configured value.
	 *
	 * @param int    $object_id The ID of the current object.
	 * @param string $cmb_id    The current box ID.
	 */
	public function update_is_configured_value( $object_id, $cmb_id ) {
		if ( 0 !== strpos( $cmb_id, 'rank_math' ) && 0 !== strpos( $cmb_id, 'rank-math' ) ) {
			return;
		}
		GlobalHelper::is_configured( true );
	}

	/**
	 * Deactivate plugin.
	 */
	public function deactivate_plugins() {
		check_ajax_referer( 'rank-math-ajax-nonce', 'security' );
		if ( 'all' !== $_POST['plugin'] ) {
			deactivate_plugins( $_POST['plugin'] );
			die( '1' );
		}

		$detector = new Importers\Detector();
		$plugins  = $detector->get();
		foreach ( $plugins as $plugin ) {
			deactivate_plugins( $plugin['file'] );
		}

		die( '1' );
	}

	/**
	 * Check for registration.
	 */
	private function check_registration() {

		$what = isset( $_POST['registration-action'] ) ? $_POST['registration-action'] : false;
		if ( false === $what ) {
			return;
		}

		if ( 'register' === $what ) {
			Helper::allow_tracking();
			Helper::register_product( $_POST['connect-username'], $_POST['connect-password'] );
		}

		if ( 'deregister' === $what ) {
			Helper::get_registration_data( false );
		}
	}

	/**
	 * Get dashbaord navigation links
	 *
	 * @return array
	 */
	private function get_nav_links() {
		$links = array(
			'modules'       => array(
				'url'   => '',
				'args'  => 'view=modules',
				'cap'   => 'manage_options',
				'title' => esc_html__( 'Modules', 'rank-math' ),
			),
			'help'          => array(
				'url'   => '',
				'args'  => 'view=help',
				'cap'   => 'manage_options',
				'title' => esc_html__( 'Help', 'rank-math' ),
			),
			'wizard'        => array(
				'url'   => 'wizard',
				'args'  => '',
				'cap'   => 'manage_options',
				'title' => esc_html__( 'Setup Wizard', 'rank-math' ),
			),
			'import-export' => array(
				'url'   => 'import-export',
				'args'  => '',
				'cap'   => 'manage_options',
				'title' => esc_html__( 'Import &amp; Export', 'rank-math' ),
			),
		);

		if ( GlobalHelper::is_plugin_active_for_network() ) {
			unset( $links['help'] );
		}

		return $links;
	}
}
