<?php
/**
 * Metabox - General Tab
 *
 * @package    RankMath
 * @subpackage RankMath\Metaboxes
 */

use RankMath\Helper;
use RankMath\Admin\Helper as Admin_Helper;

$cmb->add_field( array(
	'id'   => 'rank_math_serp_preview',
	'type' => 'raw',
	'file' => rank_math()->includes_dir() . 'metaboxes/serp-preview.php',
) );

$cmb->add_field( array(
	'id'              => 'rank_math_title',
	'type'            => 'text',
	'desc'            => esc_html__( 'This is what will appear in the first line when this post shows up in the search results.', 'rank-math' ),
	'classes'         => 'rank-math-supports-variables',
	'sanitization_cb' => false,
	'attributes'      => array( 'data-gramm_editor' => 'false' ),
) );

$cmb->add_field( array(
	'id'   => 'rank_math_permalink',
	'type' => 'text',
	'desc' => esc_html__( 'This is the unique URL of this page, displayed below the post title in the search results.', 'rank-math' ),
) );

$cmb->add_field( array(
	'id'              => 'rank_math_description',
	'type'            => 'textarea',
	'desc'            => esc_html__( 'This is what will appear as the description when this post shows up in the search results.', 'rank-math' ),
	'classes'         => 'rank-math-supports-variables',
	'sanitization_cb' => false,
	'attributes'      => array(
		'rows'              => 2,
		'data-autoresize'   => true,
		'data-gramm_editor' => 'false',
	),
) );

$cmb->add_field( array(
	'id'          => 'rank_math_focus_keyword',
	'type'        => 'text',
	'name'        => esc_html__( 'Focus Keyword', 'rank-math' ),
	/* translators: Link to kb article */
	'desc'        => sprintf( wp_kses_post( __( 'Insert keywords you want to rank for. Try to <a href="%s" target="_blank">attain 100/100 points</a> for better chances of ranking.', 'rank-math' ) ), 'https://mythemeshop.com/kb/wordpress-seo-plugin-rank-math/score-100-in-tests/?utm_source=Rank+Math+Plugin+Options&utm_medium=LP+CPC&utm_content=Rank+Math+KB&utm_campaign=Rank+Math' ),
	'classes'     => 'nob',
	'after_field' => Helper::is_mythemeshop_connected() ? '' : '<div class="notice notice-warning inline"><p>Get keyword suggestions from Google & optimize upto 5 Focus Keywords by <a href="' . Helper::get_admin_url( '', 'view=help' ) . '" target="_blank">linking your MyThemeShop account</a>.</p></div>',
	'attributes'  => array(
		'placeholder' => esc_html__( 'Example: MyThemeShop Themes', 'rank-math' ),
	),
) );

if ( ! Admin_Helper::is_term_profile_page() ) {
	$cmb->add_field( array(
		'id'      => 'rank_math_pillar_content',
		'type'    => 'checkbox',
		'name'    => '&nbsp;',
		'classes' => 'nob nopt',
		'desc'    => '<strong>' . esc_html__( 'This post is a Pillar Content', 'rank-math' ) . '</strong>' .
			Admin_Helper::get_tooltip( esc_html__( 'Select one or more Pillar Content posts for each post tag or category to show them in the Link Suggestions meta box.', 'rank-math' ) ),
	) );
}

if ( Helper::has_cap( 'onpage_analysis' ) ) {
	$cmb->add_field( array(
		'id'   => 'rank_math_serp_checklist',
		'type' => 'raw',
		'file' => rank_math()->includes_dir() . 'metaboxes/serp-checklist.php',
	) );
}

// Primary Category.
/**
 * Filter: Allow disabling the primary term feature.
 *
 * @param bool $return True to disable.
 */
if ( false === $this->do_filter( 'primary_term', false ) ) {
	$taxonomies = Helper::get_object_taxonomies( Admin_Helper::get_post_type(), 'objects' );
	$taxonomies = wp_filter_object_list( $taxonomies, array( 'hierarchical' => true ), 'and', 'name' );
	foreach ( $taxonomies as $taxonomy ) {
		$cmb->add_field( array(
			'id'         => 'rank_math_primary_' . $taxonomy,
			'type'       => 'hidden',
			'default'    => 0,
			'attributes' => array(
				'data-primary-term' => $taxonomy,
			),
		) );
	}
}

// SEO Score.
$cmb->add_field( array(
	'id'   => 'rank_math_seo_score',
	'type' => 'hidden',
) );
