<?php
/**
 * The HTML helpers.
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Helpers
 * @author     MyThemeShop <admin@mythemeshop.com>
 */

namespace RankMath\Helpers;

use RankMath\KB;

defined( 'ABSPATH' ) || exit;

/**
 * HTML class.
 */
trait HTML {

	/**
	 * Extract attributes from a html tag.
	 *
	 * @param  string $elem Extract attributes from tag.
	 * @return array
	 */
	public static function html_extract_attributes( $elem ) {
		$regex = '#([^\s=]+)\s*=\s*(\'[^<\']*\'|"[^<"]*")#';
		preg_match_all( $regex, $elem, $attributes, PREG_SET_ORDER );

		$new = array();
		foreach ( $attributes as $attribute ) {
			$new[ $attribute[1] ] = substr( $attribute[2], 1, -1 );
		}

		return $new;
	}

	/**
	 * Generate html attribute string for array.
	 *
	 * @param  array  $attributes Contains key/value pair to generate a string.
	 * @param  string $prefix     If you want to append a prefic before every key.
	 * @return string
	 */
	public static function html_generate_attributes( $attributes = array(), $prefix = '' ) {

		// Early Bail!
		if ( empty( $attributes ) ) {
			return false;
		}

		$out = '';
		foreach ( $attributes as $key => $value ) {
			if ( true === $value || false === $value ) {
				$value = $value ? 'true' : 'false';
			}

			$out .= ' ' . esc_html( $prefix . $key );
			$out .= empty( $value ) ? '' : sprintf( '="%s"', esc_attr( $value ) );
		}

		return $out;
	}

	/**
	 * Get Social Share buttons.
	 *
	 * @codeCoverageIgnore
	 */
	public static function get_social_share() {
		if ( self::is_whitelabel() ) {
			return;
		}

		$tw_link = KB::get( 'tw-link' );
		$fb_link = urlencode( KB::get( 'fb-link' ) );
		/* translators: sitename */
		$tw_message = urlencode( sprintf( esc_html__( 'I just installed Rank Math #SEO #WordPress Plugin. It looks promising! %s', 'rank-math' ), $tw_link ) );
		/* translators: sitename */
		$fb_message = urlencode( esc_html__( 'I just installed Rank Math SEO WordPress Plugin. It looks promising!', 'rank-math' ) );

		$tweet_url = add_query_arg( array(
			'text'     => $tw_message,
			'hashtags' => 'rankmath',
		), 'https://twitter.com/intent/tweet' );

		$fb_share_url = add_query_arg( array(
			'u'       => $fb_link,
			'quote'   => $fb_message,
			'caption' => esc_html__( 'SEO by Rank Math', 'rank-math' ),
		), 'https://www.facebook.com/sharer/sharer.php' );
		?>
		<div class="wizard-share">
			<a href="#" onclick="window.open('<?php echo $tweet_url; ?>', 'sharewindow', 'resizable,width=600,height=300'); return false;" class="share-twitter">
				<span class="dashicons dashicons-twitter"></span> <?php esc_html_e( 'Tweet', 'rank-math' ); ?>
			</a>
			<a href="#" onclick="window.open('<?php echo $fb_share_url; ?>', 'sharewindow', 'resizable,width=600,height=300'); return false;" class="share-facebook">
				<span class="dashicons dashicons-facebook-alt"></span> <?php esc_html_e( 'Share', 'rank-math' ); ?>
			</a>
		</div>
		<?php
	}
}
