<?php
/**
 * The Rich Snippet Module
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Modules\RichSnippet
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Modules\RichSnippet;
use RankMath\Helper;
use RankMath\Admin\Helper as Admin_Helper;
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
			'id'        => 'rich-snippet',
			'directory' => $directory,
			'help'      => array(
				'title' => esc_html__( 'Rich Snippet', 'rank-math' ),
				'view'  => $directory . '/views/help.php',
			),
		));
		parent::__construct();

		$this->filter( 'rank_math/metabox/tabs', 'add_metabox_tab' );
		$this->action( 'rank_math/metabox/process_fields', 'save_advanced_meta' );
	}

	/**
	 * Add rich snippet tab to the metabox.
	 *
	 * @param array $tabs Array of tabs.
	 * @return array
	 */
	public function add_metabox_tab( $tabs ) {

		if ( Admin_Helper::is_term_profile_page() ) {
			return $tabs;
		}

		Helper::array_insert( $tabs, array(
			'richsnippet' => array(
				'icon'       => 'dashicons',
				'title'      => esc_html__( 'Rich Snippet', 'rank-math' ),
				'desc'       => esc_html__( 'This tab contains snippet options.', 'rank-math' ),
				'file'       => $this->directory . '/views/metabox-options.php',
				'capability' => 'onpage_snippet',
			),
		), 3 );

		return $tabs;
	}

	/**
	 * Save handler for metadata.
	 *
	 * @param CMB2 $cmb CMB2 instance.
	 */
	public function save_advanced_meta( $cmb ) {
		if ( isset( $cmb->data_to_save['rank_math_snippet_recipe_instruction_type'] ) && 'HowToSection' !== $cmb->data_to_save['rank_math_snippet_recipe_instruction_type'] ) {
			return;
		}

		$recipe_instructions = isset( $cmb->data_to_save['rank_math_snippet_recipe_instructions'] ) ? $cmb->data_to_save['rank_math_snippet_recipe_instructions'] : array();

		if ( empty( $recipe_instructions ) ) {
			return;
		}

		foreach ( $recipe_instructions as $key => $recipe_instruction ) {
			if ( ! $recipe_instruction['name'] || ! $recipe_instruction['text'] ) {
				unset( $recipe_instructions[ $key ] );
			}
		}
		$cmb->data_to_save['rank_math_snippet_recipe_instructions'] = $recipe_instructions;
	}
}
