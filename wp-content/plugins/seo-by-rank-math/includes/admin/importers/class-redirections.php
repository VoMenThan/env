<?php
/**
 * The Redirections Import Class
 *
 * @since      0.9.0
 * @package    RANK_MATH
 * @subpackage RankMath\Admin\Importers
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Admin\Importers;

use RankMath\Helper;
use RankMath\Admin\Helper as Admin_Helper;
use RankMath\Modules\Redirections\Form as Form;

defined( 'ABSPATH' ) || exit;

/**
 * Redirections class.
 */
class Redirections extends Plugin_Importer {

	/**
	 * The plugin name.
	 *
	 * @var string
	 */
	protected $plugin_name = 'Redirections';

	/**
	 * Array of option keys to import and clean
	 *
	 * @var array
	 */
	protected $option_keys = array( 'redirection_options' );

	/**
	 * Array of choices keys to import
	 *
	 * @var array
	 */
	protected $choices = array( 'redirections' );

	/**
	 * Import redirections of plugin.
	 *
	 * @return bool
	 */
	protected function redirections() {
		global $wpdb;

		$count = 0;
		$rows  = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}redirection_items" );

		if ( empty( $rows ) ) {
			return false;
		}

		$form = new Form;

		foreach ( (array) $rows as $row ) {
			$sources = array(
				array(
					'pattern'    => $row->url,
					'comparison' => empty( $row->regex ) ? 'exact' : 'regex',
				),
			);
			$form->save_redirection(array(
				'sources'     => $sources,
				'url_to'      => $this->get_url_to( $row ),
				'header_code' => $row->action_code,
			));
			$count++;
		}

		Helper::update_modules( array( 'redirections' => 'on' ) );
		return compact( 'count' );
	}

	/**
	 * Get validated url to value
	 *
	 * @param  object $row Current row we are processing.
	 * @return string
	 */
	private function get_url_to( $row ) {
		if ( is_string( $row->action_data ) ) {
			return $row->action_data;
		}

		$data = maybe_unserialize( $row->action_data );
		if ( is_array( $data ) && isset( $data['url'] ) ) {
			return $data['url'];
		}

		return '/';
	}

	/**
	 * Returns array of choices of action which can be performed for plugin
	 *
	 * @return array
	 */
	public function get_choices() {
		return array(
			'redirections' => esc_html__( 'Import Redirections', 'rank-math' ) . Admin_Helper::get_tooltip( esc_html__( 'Plugin redirections.', 'rank-math' ) ),
		);
	}
}
