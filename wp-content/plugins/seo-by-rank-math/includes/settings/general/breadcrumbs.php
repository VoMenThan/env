<?php
/**
 * The breadcrumb settings.
 *
 * @package    RankMath
 * @subpackage RankMath\Settings
 */

use RankMath\Helper;

$cmb->add_field( array(
	'id'      => 'breadcrumbs',
	'type'    => 'switch',
	'name'    => esc_html__( 'Enable breadcrumbs function', 'rank-math' ),
	'desc'    => esc_html__( 'Turning off breadcrumbs will hide breadcrumbs inserted in template files too.', 'rank-math' ),
	'default' => 'off',
) );

$dependency = array( array( 'breadcrumbs', 'on' ) );
$cmb->add_field( array(
	'id'              => 'breadcrumbs_separator',
	'type'            => 'radio_inline',
	'name'            => esc_html__( 'Separator Character', 'rank-math' ),
	'desc'            => esc_html__( 'Separator character or string that appears between breadcrumb items.', 'rank-math' ),
	'options'         => Helper::choices_separator( Helper::get_settings( 'general.breadcrumbs_separator' ) ),
	'default'         => '-',
	'dep'             => $dependency,
	'sanitization_cb' => array( '\RankMath\CMB2', 'sanitize_htmlentities' ),
) );

$cmb->add_field( array(
	'id'      => 'breadcrumbs_home',
	'type'    => 'switch',
	'name'    => esc_html__( 'Show Homepage Link', 'rank-math' ),
	'desc'    => wp_kses_post( __( 'Display homepage breadcrumb in trail.', 'rank-math' ) ),
	'default' => 'on',
	'dep'     => $dependency,
) );

$dependency_home   = array( 'relation' => 'and' ) + $dependency;
$dependency_home[] = array( 'breadcrumbs_home', 'on' );
$cmb->add_field( array(
	'id'      => 'breadcrumbs_home_label',
	'type'    => 'text',
	'name'    => esc_html__( 'Homepage label', 'rank-math' ),
	'desc'    => esc_html__( 'Label used for homepage link (first item) in breadcrumbs.', 'rank-math' ),
	'default' => esc_html__( 'Home', 'rank-math' ),
	'dep'     => $dependency_home,
) );

$cmb->add_field( array(
	'id'   => 'breadcrumbs_prefix',
	'type' => 'text',
	'name' => esc_html__( 'Prefix Breadcrumb', 'rank-math' ),
	'desc' => esc_html__( 'Prefix for the breadcrumb path.', 'rank-math' ),
	'dep'  => $dependency,
) );

$cmb->add_field( array(
	'id'      => 'breadcrumbs_archive_format',
	'type'    => 'text',
	'name'    => esc_html__( 'Archive Format', 'rank-math' ),
	'desc'    => esc_html__( 'Format the label used for archive pages.', 'rank-math' ),
	/* translators: placeholder */
	'default' => esc_html__( 'Archives for %s', 'rank-math' ),
	'dep'     => $dependency,
) );

$cmb->add_field( array(
	'id'      => 'breadcrumbs_search_format',
	'type'    => 'text',
	'name'    => esc_html__( 'Search Results Format', 'rank-math' ),
	'desc'    => esc_html__( 'Format the label used for search results pages.', 'rank-math' ),
	/* translators: placeholder */
	'default' => esc_html__( 'Results for %s', 'rank-math' ),
	'dep'     => $dependency,
) );

$cmb->add_field( array(
	'id'      => 'breadcrumbs_404_label',
	'type'    => 'text',
	'name'    => esc_html__( '404 label', 'rank-math' ),
	'desc'    => esc_html__( 'Label used for 404 error item in breadcrumbs.', 'rank-math' ),
	'default' => esc_html__( '404 Error: page not found', 'rank-math' ),
	'dep'     => $dependency,
) );

$cmb->add_field( array(
	'id'      => 'breadcrumbs_remove_post_title',
	'type'    => 'switch',
	'name'    => esc_html__( 'Hide Post Title', 'rank-math' ),
	'desc'    => wp_kses_post( __( 'Hide Post title from Breadcrumb.', 'rank-math' ) ),
	'default' => 'off',
	'dep'     => $dependency,
) );

$cmb->add_field( array(
	'id'      => 'breadcrumbs_ancestor_categories',
	'type'    => 'switch',
	'name'    => esc_html__( 'Show Category(s)', 'rank-math' ),
	'desc'    => esc_html__( 'If category is a child category, show all ancestor categories.', 'rank-math' ),
	'default' => 'off',
	'dep'     => $dependency,
) );

$cmb->add_field( array(
	'id'      => 'breadcrumbs_hide_taxonomy_name',
	'type'    => 'switch',
	'name'    => esc_html__( 'Hide Taxonomy Name', 'rank-math' ),
	'desc'    => wp_kses_post( __( 'Hide Taxonomy Name from Breadcrumb.', 'rank-math' ) ),
	'default' => 'off',
	'dep'     => $dependency,
) );
