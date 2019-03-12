<?php
/**
 * The robots.txt settings.
 *
 * @package    RankMath
 * @subpackage RankMath\Settings
 */

use RankMath\Admin\Helper;

$data       = Helper::get_robots_data();
$attributes = array();
if ( $data['exists'] ) {
	$attributes['readonly'] = 'readonly';
	$attributes['value']    = $data['default'];
} else {
	$attributes['placeholder'] = $data['default'];
}

$cmb->add_field( array(
	'id'         => 'robots_txt_content',
	'type'       => 'textarea',
	'desc'       => ! $data['exists'] ? '' : esc_html__( 'Contents are locked because robots.txt file is present in the root folder.', 'rank-math' ),
	'attributes' => $attributes,
) );
