<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package WordPress
 * @subpackage Envzone
 * @since Envzone 1.0
 */
?>

<header class="page-header mb-5">
    <h1 class="page-title"><?php printf( __( 'Nothing Found: %s', 'envzone' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
</header><!-- .page-header -->
