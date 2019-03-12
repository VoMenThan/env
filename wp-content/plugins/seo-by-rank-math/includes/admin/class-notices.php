<?php
/**
 * The admin notices.
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Admin
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Admin;

use RankMath\Runner;
use RankMath\Traits\Ajax;
use RankMath\Traits\Hooker;
use RankMath\Helper as GlobalHelper;

defined( 'ABSPATH' ) || exit;

/**
 * Notices class.
 */
class Notices implements Runner {

	use Hooker, Ajax;

	/**
	 * Register hooks.
	 */
	public function hooks() {
		$this->action( 'admin_init', 'notices' );
		$this->ajax( 'notice_dismissible', 'notice_dismissible' );
	}

	/**
	 * Run all notices routine
	 */
	public function notices() {
		$this->is_plugin_configured();
		$this->new_post_type();
	}

	/**
	 * Notice dismissal
	 */
	public function notice_dismissible() {

		$this->verify_nonce( 'rank-math-ajax-nonce' );

		$which     = explode( ',', $_POST['dismiss'] );
		$dismissed = (array) get_option( 'rank_math_dismissed_notices' );
		foreach ( $which as $id ) {
			if ( 'new_post_type' === $id ) {
				$current = get_post_types( array( 'public' => true ) );
				update_option( 'rank_math_known_post_types', $current );
			} else {
				$dismissed[ $id ] = true;
			}
		}

		update_option( 'rank_math_dismissed_notices', $dismissed );

		$this->success( 'done' );
	}

	/**
	 * If plugin configuration not done
	 */
	private function is_plugin_configured() {
		if ( isset( $_GET['page'] ) && 'mts-install-plugins' === $_GET['page'] ) {
			return;
		}

		$dismissed = get_option( 'rank_math_dismissed_notices', array() );
		if ( ! isset( $dismissed['config'] ) && ! GlobalHelper::is_configured() ) {
			$message = sprintf(
				'<b>Warning!</b> You didn\'t set up your Rank Math SEO plugin yet, which means you\'re missing out on essential settings and tweaks! <a href="%s">Complete your setup by clicking here.</a>',
				GlobalHelper::get_admin_url( 'wizard' )
			);
			rank_math()->add_error( $message, 'warning', 'config' );
		}
	}

	/**
	 * If any new post type detected
	 */
	private function new_post_type() {
		$known   = get_option( 'rank_math_known_post_types', array() );
		$current = GlobalHelper::get_accessible_post_types();
		$new     = array_diff( $current, $known );

		if ( empty( $new ) ) {
			return;
		}

		$list = implode( ', ', $new );
		/* translators: post names */
		$message = $this->do_filter( 'admin/notice/new_post_type', __( 'We detected new post type(s) (%1$s), and you would want to check the settings of <a href="%2$s">Titles &amp; Meta page</a>.', 'rank-math' ) );
		$message = sprintf( wp_kses_post( $message ), $list, GlobalHelper::get_admin_url( 'options-titles#setting-panel-post-type-' . key( $new ) ), GlobalHelper::get_admin_url( 'options-sitemap#setting-panel-sitemap-post-type-' . key( $new ) ) );
		rank_math()->add_error( $message, 'info', 'new_post_type' );
	}
}
