<?php
/**
 * An interface for metabox values.
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Admin\Formatter
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Admin\Formatter;

defined( 'ABSPATH' ) || exit;

/**
 * Metabox_Formatter.
 */
interface Metabox_Formatter {

	/**
	 * Returns formatter values.
	 *
	 * @return array
	 */
	public function get_values();
}
