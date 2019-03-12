<?php
/**
 * Class Upgrade
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Core
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath;

defined( 'ABSPATH' ) || exit;

/**
 * Upgrade class
 */
class Upgrade {

	/**
	 * Updates that need to be run
	 *
	 * @var array
	 */
	private static $updates = [
		'0.9.8'  => 'updates/update-0.9.8.php',
		'0.10.0' => 'updates/update-0.10.0.php',
	];

	/**
	 * Perform all updates
	 */
	public function __construct() {
		$installed_version = get_option( 'rank_math_version' );

		foreach ( self::$updates as $version => $path ) {
			if ( version_compare( $installed_version, $version, '<' ) ) {
				include $path;
				update_option( 'rank_math_version', $version );
			}
		}

		$this->perform_cleanup();
	}

	/**
	 * Finishes upgrading.
	 */
	protected function perform_cleanup() {
		update_option( 'rank_math_version', rank_math()->version );
		update_option( 'rank_math_db_version', rank_math()->db_version );
	}
}
