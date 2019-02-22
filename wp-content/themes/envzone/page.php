<?php

global $post;
get_header();

switch ( $post->post_name ) {

    case 'about':
        include( locate_template( 'inc/about.php' ) );
        break;

    default:
        include( locate_template( "inc/$post->post_name.php" ) );
        break;

}

get_footer();

