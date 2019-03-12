<?php
/**
 * Sitemaps List
 *
 * @since      0.9.0
 * @package    RANK_MATH
 * @subpackage RANK_MATH/modules
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Modules\Search_Console;

use RankMath\Helper;
use RankMath\Admin\List_Table;

defined( 'ABSPATH' ) || exit;

/**
 * Sitemaps_List class.
 */
class Sitemaps_List extends List_Table {

	/**
	 * The Constructor.
	 */
	public function __construct() {

		parent::__construct( array(
			'singular' => esc_html__( 'sitemap', 'rank-math' ),
			'plural'   => esc_html__( 'sitemaps', 'rank-math' ),
		) );

		$this->strings['no_items'] = esc_html__( 'No sitemaps submitted.', 'rank-math' );
	}

	/**
	 * Prepares the list of items for displaying.
	 */
	public function prepare_items() {

		$this->set_column_headers();
		$this->items = Helper::search_console()->sitemaps->get_sitemaps( true );

		$this->set_pagination_args( array(
			'total_items' => count( $this->items ),
			'per_page'    => 100,
		) );
	}

	/**
	 * Handles the default column output.
	 *
	 * @param object $item        The current item.
	 * @param string $column_name The current column name.
	 * @return string
	 */
	public function column_default( $item, $column_name ) {

		if ( 'path' === $column_name ) {
			return ( empty( $item['isSitemapsIndex'] ) ? '' : '<span class="dashicons dashicons-category"></span>' ) . '<a href="' . $item['path'] . '" target="_blank">' . $item['path'] . '</a>';
		}

		if ( 'lastDownloaded' === $column_name ) {
			$date = '';
			if ( ! empty( $item['lastDownloaded'] ) ) {
				$date = date_parse( $item['lastDownloaded'] );
				$date = date( 'Y-m-d H:i:s', mktime( $date['hour'], $date['minute'], $date['second'], $date['month'], $date['day'], $date['year'] ) );
			}

			return $date;
		}

		if ( 'items' === $column_name ) {
			$items = '';
			if ( ! empty( $item['contents'] ) && is_array( $item['contents'] ) ) {
				$hash = array(
					'web'   => array(
						'icon'  => 'media-default',
						'title' => esc_html__( 'Pages', 'rank-math' ),
					),
					'image' => array(
						'icon'  => 'format-image',
						'title' => esc_html__( 'Images', 'rank-math' ),
					),
					'news'  => array(
						'icon'  => 'media-document',
						'title' => esc_html__( 'News', 'rank-math' ),
					),
				);
				foreach ( $item['contents'] as $contents ) {

					$items .= ! isset( $hash[ $contents['type'] ] ) ? '<span class="rank-math-items-misc">' :
						sprintf(
							'<span title="%1$s"><span class="dashicons dashicons-%2$s"></span> ',
							$hash[ $contents['type'] ]['title'], $hash[ $contents['type'] ]['icon']
						);

					/* translators: content: submitted and indexed */
					$items .= sprintf( wp_kses_post( __( '%1$d <span class="indexed">(%2$d indexed)</span><br>', 'rank-math' ) ), $contents['submitted'], $contents['indexed'] );
					$items .= '</span>';
				}
			}

			return $items;
		}

		if ( 'warnings' === $column_name ) {
			return '<span title="' . esc_html__( 'Warnings', 'rank-math' ) . '">' . $item[ $column_name ] . '</span>';
		}

		if ( 'errors' === $column_name ) {
			return '<span title="' . esc_html__( 'Errors', 'rank-math' ) . '">' . $item[ $column_name ] . '</span>';
		}

		return print_r( $item, true );
	}

	/**
	 * Get a list of columns.
	 *
	 * @return array
	 */
	public function get_columns() {
		return array(
			'path'           => esc_html__( 'Path', 'rank-math' ),
			'lastDownloaded' => esc_html__( 'Last Downloaded', 'rank-math' ),
			'items'          => esc_html__( 'Items', 'rank-math' ),
			'warnings'       => esc_html__( 'Warnings', 'rank-math' ) . ' <span class="dashicons dashicons-warning"></span>',
			'errors'         => esc_html__( 'Errors', 'rank-math' ) . ' <span class="dashicons dashicons-dismiss"></span>',
		);
	}

	/**
	 * Generates content for a single row of the table.
	 *
	 * @param object $item The current item.
	 */
	public function single_row( $item ) {
		$classes = array();

		$classes[] = ! empty( $item['isSitemapsIndex'] ) ? 'is-sitemap-index' : 'is-sitemap';

		if ( ! empty( $item['isPending'] ) ) {
			$classes[] = 'is-pending';
		}

		if ( ! empty( $item['errors'] ) ) {
			$classes[] = 'has-errors';
		}

		if ( ! empty( $item['warnings'] ) ) {
			$classes[] = 'has-warnings';
		}

		echo '<tr class="' . join( ' ', $classes ) . '">';
			$this->single_row_columns( $item );
		echo '</tr>';
	}

	/**
	 * Get refresh button
	 */
	public function get_refresh_button() {
		$url = Helper::get_admin_url( 'search-console', array(
			'view'             => 'sitemaps',
			'refresh_sitemaps' => '1',
			'security'         => wp_create_nonce( 'rank_math_refresh_sitemaps' ),
		) );
		?>
		<div class="alignleft actions">
			<a href="<?php echo esc_url( $url ); ?>" class="button button-secondary"><?php esc_html_e( 'Refresh Sitemaps', 'rank-math' ); ?></a>
		</div>
		<?php
	}
}
