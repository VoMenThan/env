<?php
/**
 * Search console no auth page.
 *
 * @package Rank_Math
 */

?>
<br>
<div class="rank-math-notice notice notice-error inline">
	<p>
		<?php /* translators: admin screen link */ ?>
		<?php printf( wp_kses_post( __( 'Please navigate to <a href="%s">SEO > Settings > Search Console</a> to authorize access to Google Search Console.', 'rank-math' ) ), esc_url( RankMath\Helper::get_admin_url( 'options-general#setting-panel-search-console' ) ) ); ?> 
		<?php echo '<a href="https://mythemeshop.com/kb/wordpress-seo-plugin-rank-math/search-console/" target="_blank">' . __( 'Learn more.', 'rank-math' ) . '</a>'; ?>
	</p>
</div>
