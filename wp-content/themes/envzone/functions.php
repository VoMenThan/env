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
            'name'          => __( 'Sidebar name', 'theme_text_domain' ),
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
    wp_register_script('jquery', $jsUrl.'jquery.min.js', array(), '1.0', true);
    wp_enqueue_script('jquery');
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
    wp_enqueue_style('mt_env_styles', $cssUrl.'styles.css', array(), '1.0');
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

?>