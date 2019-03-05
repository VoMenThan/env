<?php
define( 'ENV_THEME_DIR', get_stylesheet_directory().'/' );
define( 'ENV_THEME_URL', get_stylesheet_directory_uri().'/' );

define( 'ASSET_URL', get_template_directory_uri().'/assets/' );

define( 'ENV_THEM_INC_DIR', ENV_THEME_DIR . 'inc/' );
define( 'ENV_THEM_WIDGET_DIR', ENV_THEM_INC_DIR . 'widgets/' );

/*======================================================================================================
 * 4. KHOI CHAY WIDGETS MAIN
 * ======================================================================================================*/
require_once ENV_THEM_WIDGET_DIR. 'main.php';
new Env_Theme_Widget_Main();

/*======================================================================================================
 * 3. KHAI BAO HE THONG WIDGET CUA THEME
 * ======================================================================================================*/

add_action('widgets_init', 'mt_env_widgets_init');

function mt_env_widgets_init(){
    register_sidebar(
        array(
            'name'          => __( 'Sidebar', 'theme_text_domain' ),
            'id'            => 'unique-sidebar-id',    // ID should be LOWERCASE  ! ! !
            'description'   => '',
            'class'         => '',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>'
        )
    );
}
/*goi widget ra giao dien bang cach:
if(is_active_sidebar('unique-sidebar-id'))
dynamic_sidebar('unique-sidebar-id');
*/




/*======================================================================================================
 * 2. NAP NHUNG TAP TIN JS VAO THEME
 * ======================================================================================================*/

add_action('wp_enqueue_scripts', 'mt_env_register_js');
function mt_env_register_js(){
    $jsUrl = get_template_directory_uri().'/assets/js/';
	wp_deregister_script('jquery');
    wp_register_script('jquery', $jsUrl.'jquery.min.js', array(), '1.0', false);
    wp_enqueue_script('jquery');
	wp_enqueue_script('mt_env_jquery_3_slim', $jsUrl.'jquery-3.3.1.slim.min.js', array(), '1.0', true);
	wp_enqueue_script('mt_env_popper_min', $jsUrl.'popper.min.js', array(), '1.0', true);
	wp_enqueue_script('mt_env_bootstrap', $jsUrl.'bootstrap.min.js', array(), '1.0', true);
	wp_enqueue_script('mt_env_owl_carousel', $jsUrl.'owl.carousel.min.js', array(), '1.0', true);
	wp_enqueue_script('mt_env_jquery_matchheight', $jsUrl.'jquery.matchHeight-min.js', array(), '1.0', true);
	wp_enqueue_script('mt_env_jquery_mCustomScrollbar_concat_min', $jsUrl.'jquery.mCustomScrollbar.concat.min.js', array(), '1.0', true);
	wp_enqueue_script('mt_env_wowjs', $jsUrl.'wow.min.js', array(), '1.0', true);
	wp_enqueue_script('mt_env_videojs', $jsUrl.'video.js', array(), '1.0', true);
}

/*======================================================================================================
 * 1. NAP NHUNG TAP TIN CSS VAO THEME
 * ======================================================================================================*/

add_action('wp_enqueue_scripts', 'mt_env_register_style');
function mt_env_register_style(){
    $cssUrl = get_template_directory_uri().'/assets/css/';

    wp_enqueue_style('mt_env_bootstrap', $cssUrl.'bootstrap.min.css', array(), '1.0');
    wp_enqueue_style('mt_env_owl_carousel', $cssUrl.'owl.carousel.min.css', array(), '1.0');
    wp_enqueue_style('mt_env_owl_theme_default', $cssUrl.'owl.theme.default.min.css', array(), '1.0');
    wp_enqueue_style('mt_env_owl_theme_green', $cssUrl.'owl.theme.green.min.css', array(), '1.0');
    wp_enqueue_style('mt_env_font_awesome', $cssUrl.'font-awesome.min.css', array(), '1.0');
    wp_enqueue_style('mt_env_animate', $cssUrl.'animate.css', array(), '1.0');
    wp_enqueue_style('mt_env_jquery_mCustomScrollbar_min', $cssUrl.'jquery.mCustomScrollbar.min.css', array(), '1.0');
    wp_enqueue_style('mt_env_videojs', $cssUrl.'video-js.css', array(), '1.0');
    wp_enqueue_style('mt_env_styles', $cssUrl.'styles.css', array(), '2.0');
    //wp_enqueue_style('mt_env_custom_form', $cssUrl.'custom-form.css', array(), '1.0');
}

//add_filter('show_admin_bar', '__return_false');

if( ! function_exists( 'uri_segment' ) ) {
    function uri_segment($n = 0){
        $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
        $full_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        $url = str_replace( home_url() . '/', "", $full_url );
        $segments = explode('/', $url);
        return empty( $segments ) ? '' : $segments[$n];
    }
}
add_theme_support( 'post-thumbnails' );



/*LOAD MORE SEARCH*/
function misha_my_load_more_scripts() {

    global $wp_query;

    // In most cases it is already included on the page and this line can be removed
    wp_enqueue_script('jquery');

    // register our main script but do not enqueue it yet
    wp_register_script( 'my_loadmore', get_template_directory_uri().'/assets/js/myloadmore.js', array('jquery') );

    // now the most interesting part
    // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
    // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
    wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ), // WordPress AJAX
        'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
        'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ) );

    wp_enqueue_script( 'my_loadmore' );
}

add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );



function misha_loadmore_ajax_handler(){

    // prepare our arguments for the query
    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_status'] = 'publish';

    // it is always better to use WP_Query but not here
    query_posts( $args );

    if( have_posts() ) :

        // run the loop
        while( have_posts() ): the_post();

            // look into your theme code how the posts are inserted, but you can use your own HTML of course
            // do you remember? - my example is adapted for Twenty Seventeen theme
            get_template_part( 'template-parts/content', 'search' );
            // for the test purposes comment the line above and uncomment the below one
            // the_title();


        endwhile;

    endif;
    die; // here we exit the script and even no wp_reset_query() required!
}



add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}
/* END LOAD MORE SEARCH*/

?>