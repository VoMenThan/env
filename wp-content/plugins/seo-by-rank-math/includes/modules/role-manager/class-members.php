<?php
/**
 * Menbers plugin integration.
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Modules\Role_Manager
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Modules\Role_Manager;

use RankMath\Helper;
use RankMath\Traits\Hooker;

defined( 'ABSPATH' ) || exit;

/**
 * Members class.
 */
class Members {

	use Hooker;

	/**
	 * Members cap group name.
	 *
	 * @var string
	 */
	const GROUP = 'rank_math';

	/**
	 * Class Members constructor.
	 */
	public function __construct() {
		$this->action( 'members_register_caps', 'register_caps' );
		$this->action( 'members_register_cap_groups', 'register_cap_groups' );
	}

	/**
	 * Registers cap group.
	 */
	public function register_cap_groups() {
		members_register_cap_group( self::GROUP, array(
			'label'    => esc_html__( 'Rank Math', 'rank-math' ),
			'caps'     => array(),
			'icon'     => 'dashicons-chart-area',
			'priority' => 30,
		));
	}

	/**
	 * Registers caps.
	 */
	public function register_caps() {
		$caps = Helper::get_capabilities();
		if ( isset( $_GET['role'] ) && 'administrator' === $_GET['role'] ) {
			$caps['rank_math_edit_htaccess'] = esc_html__( 'Edit .htaccess', 'rank-math' );
		}

		foreach ( $caps as $key => $value ) {
			members_register_cap( $key, array(
				'label' => html_entity_decode( $value ),
				'group' => self::GROUP,
			));
		}
	}
}
