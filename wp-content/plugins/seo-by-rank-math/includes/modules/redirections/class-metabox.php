<?php
/**
 * The Redirections Metabox
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Modules\Redirections
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Modules\Redirections;

use RankMath\Helper;
use RankMath\Traits\Hooker;

defined( 'ABSPATH' ) || exit;

/**
 * Metabox class.
 */
class Metabox {

	use Hooker;

	/**
	 * The Constructor.
	 */
	public function __construct() {
		$this->action( 'rank_math/metabox/settings/advanced', 'metabox_settings_advanced' );
		$this->action( 'rank_math/metabox/process_fields', 'save_advanced_meta' );
	}

	/**
	 * Metabox settings in advanced tab.
	 *
	 * @param CMB2 $cmb The CMB2 metabox object.
	 */
	public function metabox_settings_advanced( $cmb ) {
		$redirection = Cache::get_by_object_id( $cmb->object_id, $cmb->object_type() );

		$url = parse_url( get_permalink( $cmb->object_id ), PHP_URL_PATH );
		$url = trim( $url, '/' );

		$redirection = $redirection ? DB::get_redirection_by_id( $redirection->redirection_id ) : array(
			'id'          => '',
			'url_to'      => '',
			'header_code' => Helper::get_settings( 'general.redirections_header_code' ),
		);

		$message = ! empty( $redirection['id'] ) ? esc_html__( 'Edit redirection for the URL of this post.', 'rank-math' ) :
			esc_html__( 'Create new redirection for the URL of this post.', 'rank-math' );

		$cmb->add_field( array(
			'id'   => 'redirection_heading',
			'type' => 'title',
			'name' => esc_html__( 'Redirect', 'rank-math' ),
			'desc' => $message . ' ' . esc_html__( 'Publish or update the post to save the redirection.', 'rank-math' ),
		) );

		$cmb->add_field( array(
			'id'         => 'redirection_header_code',
			'type'       => 'select',
			'name'       => esc_html__( 'Redirection Type', 'rank-math' ),
			'options'    => Helper::choices_redirection_types(),
			'default'    => isset( $redirection['header_code'] ) ? $redirection['header_code'] : '',
			'save_field' => false,
		) );

		$cmb->add_field( array(
			'id'         => 'redirection_url_to',
			'type'       => 'text',
			'name'       => esc_html__( 'Destination URL', 'rank-math' ),
			'save_field' => false,
			'default'    => isset( $redirection['url_to'] ) ? $redirection['url_to'] : '',
		) );

		$cmb->add_field( array(
			'id'         => 'redirection_id',
			'type'       => 'hidden',
			'save_field' => false,
			'default'    => isset( $redirection['id'] ) ? $redirection['id'] : '',
		) );

		$cmb->add_field( array(
			'id'         => 'redirection_sources',
			'type'       => 'hidden',
			'save_field' => false,
			'default'    => $url,
		) );
	}

	/**
	 * Save handler for metadata.
	 *
	 * @param CMB2 $cmb CMB2 instance.
	 */
	public function save_advanced_meta( $cmb ) {

		if ( empty( $cmb->data_to_save['redirection_url_to'] ) ) {

			if ( ! empty( $cmb->data_to_save['redirection_id'] ) ) {
				DB::delete( $cmb->data_to_save['redirection_id'] );
				rank_math()->add_deferred_error( esc_html__( 'Redirection successfully deleted.', 'rank-math' ), 'info' );
			}
			return;
		}

		$values = array(
			'id'          => $cmb->data_to_save['redirection_id'],
			'url_to'      => $cmb->data_to_save['redirection_url_to'],
			'sources'     => array(
				array(
					'pattern'    => $cmb->data_to_save['redirection_sources'],
					'comparison' => 'exact',
				),
			),
			'header_code' => $cmb->data_to_save['redirection_header_code'],
		);

		$redirection_id = DB::update_iff( $values );
		if ( ! isset( $values['id'] ) ) {
			rank_math()->add_deferred_error( esc_html__( 'New redirection created.', 'rank-math' ), 'success' );
		}

		Cache::add(array(
			'from_url'       => $cmb->data_to_save['redirection_sources'],
			'redirection_id' => $redirection_id,
			'object_id'      => $cmb->object_id,
		));
	}
}
