<?php
/**
 * The List Table Base CLass
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Admin
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Admin;

use WP_List_Table;

defined( 'ABSPATH' ) || exit;

/**
 * List_Table class.
 */
class List_Table extends WP_List_Table {

	/**
	 * String to use in the class.
	 *
	 * @var array
	 */
	public $strings = array();

	/**
	 * The Constructor.
	 *
	 * @param array $args Array of arguments.
	 */
	public function __construct( $args = array() ) {
		parent::__construct( $args );
	}

	/**
	 * Message to be displayed when there are no items.
	 */
	public function no_items() {
		echo isset( $this->strings['no_items'] ) ? $this->strings['no_items'] : esc_html__( 'No items found.', 'rank-math' );
	}

	/**
	 * Get order setting.
	 *
	 * @return string
	 */
	protected function get_order() {
		return ! empty( $_REQUEST['order'] ) && in_array( $_REQUEST['order'], array( 'desc', 'asc' ) ) ? strtoupper( $_REQUEST['order'] ) : 'DESC';
	}

	/**
	 * Get orderby setting.
	 *
	 * @param string $default (Optional) Extract order by from request.
	 * @return string
	 */
	protected function get_orderby( $default = 'create_date' ) {
		return ! empty( $_GET['orderby'] ) ? filter_input( INPUT_GET, 'orderby', FILTER_SANITIZE_STRING ) : $default;
	}

	/**
	 * Get search query variable.
	 *
	 * @return bool|string
	 */
	protected function get_search() {
		return ! empty( $_REQUEST['s'] ) ? sanitize_text_field( $_REQUEST['s'] ) : '';
	}

	/**
	 * Set column headers.
	 */
	protected function set_column_headers() {
		$this->_column_headers = array(
			$this->get_columns(),
			array(),
			$this->get_sortable_columns(),
		);
	}
}
