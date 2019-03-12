<?php
/**
 * Rank Math core CLI commands.
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\WP_CLI
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath;

use WP_CLI;
use WP_CLI_Command;

defined( 'ABSPATH' ) || exit;

/**
 * CLI class.
 */
class CLI_Command extends WP_CLI_Command {

	/**
	 * Generate sitemap .
	 *
	 * @param array $args Argument passed.
	 */
	public function sitemap_generate( $args ) {
		$sitemap = Helper::get_module( 'sitemap' );
		if ( false === $sitemap ) {
			WP_CLI::error( 'Sitemap module not active.' );
			return;
		}

		$generator = new \RankMath\Modules\Sitemap\Generator;
		$generator->build_root_map();
		$generator->output( false );

		WP_CLI::success( 'Sitemap generated.' );
	}
}

WP_CLI::add_command( 'rm sitemap generate', [ '\RankMath\CLI_Command', 'sitemap_generate' ] );
