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
    wp_register_script('jquery', $jsUrl.'jquery.min.js', array(), '1.0', true);
    wp_enqueue_script('jquery');
	wp_enqueue_script('mt_env_bootstrap', $jsUrl.'bootstrap.min.js', array(), '1.0', true);
	wp_enqueue_script('mt_env_owl_carousel', $jsUrl.'owl.carousel.min.js', array(), '1.0', true);
	wp_enqueue_script('mt_env_jquery_matchheight', $jsUrl.'jquery.matchHeight-min.js', array(), '1.0', true);
	wp_enqueue_script('mt_env_jquery_mCustomScrollbar_concat_min', $jsUrl.'jquery.mCustomScrollbar.concat.min.js', array(), '1.0', true);
}

/*======================================================================================================
 * 1. NAP NHUNG TAP TIN CSS VAO THEME
 * ======================================================================================================*/

add_action('wp_enqueue_scripts', 'mt_env_register_style');
function mt_env_register_style(){
    $cssUrl = get_template_directory_uri().'/assets/css/';

    wp_enqueue_style('mt_env_bootstrap', $cssUrl.'bootstrap.min.css', array(), '1.0');
    wp_enqueue_style('mt_env_owl_carousel', $cssUrl.'owl.carousel.min.css', array(), '1.0');
    wp_enqueue_style('mt_env_font_awesome', $cssUrl.'font-awesome.min.css', array(), '1.0');
    wp_enqueue_style('mt_env_mCustomScrollbar_min', $cssUrl.'mCustomScrollbar.min.css', array(), '1.0');
    wp_enqueue_style('mt_env_animate', $cssUrl.'animate.css', array(), '1.0');
    wp_enqueue_style('mt_env_styles', $cssUrl.'styles.css', array(), '3.0');
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
    $category = $_POST['category'];

    // it is always better to use WP_Query but not here
    query_posts( $args );

    if( have_posts() ) :

        // run the loop
        while( have_posts() ): the_post();

            // look into your theme code how the posts are inserted, but you can use your own HTML of course
            // do you remember? - my example is adapted for Twenty Seventeen theme
            if ($category == 'true'){
                get_template_part( 'template-parts/content', get_post_format() );
            }
            else{
                get_template_part('template-parts/content', 'search');
            }

            // for the test purposes comment the line above and uncomment the below one
            // the_title();


        endwhile;


    endif;
    die; // here we exit the script and even no wp_reset_query() required!
}



add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}
/* END LOAD MORE SEARCH*/


/*END CREATE POST TYPE*/

/*GET THUMBNAIL URL VIMEO*/
function grab_vimeo_thumbnail($vimeo_url){
    if( !$vimeo_url ) return false;
    $data = json_decode( file_get_contents( 'https://vimeo.com/api/oembed.json?url=' . $vimeo_url ) );
    if( !$data ) return false;
    return $data->thumbnail_url;
}

/*END GET THUMBNAIL URL VIMEO*/

/*allow html element in bio user*/
remove_filter('pre_user_description', 'wp_filter_kses');
/*allow html element in bio user*/

add_action( 'admin_init', 'wpex_mce_google_fonts_styles' );
function wpex_mce_google_fonts_styles() {
    $font1 = 'https://fonts.googleapis.com/css?family=Raleway:400,400i,700,700i|Roboto:400,400i,500,500i,700,700i';
    add_editor_style( str_replace( ',', '%2C', $font1 ) );
}

/*remove medium size in upload image*/
/*add_filter( 'intermediate_image_sizes', function( $sizes )
{
    return array_filter( $sizes, function( $val )
    {
        return 'medium_large' !== $val; // Filter out 'medium_large'
    } );
} );
remove_image_size( 'medium_large' );*/


/*CUSTOM LOGIN PAGE*/
function custom_login_logo() {
    echo '<style type="text/css">';
    echo 'h1{background: #fff !important; border-bottom: 4px solid #8DC63F; border-top-left-radius: 5px; border-top-right-radius: 5px;}';
    echo 'h1 a { background: url('.get_bloginfo('template_directory').'/assets/images/envzone-logo-login.png) 50% 50% no-repeat !important; width: auto !important; margin-bottom:0 !important; height: 60px !important;}';
    echo '.login form{margin-top: 0 !important; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;}';
    echo 'body{ background: #0D3153; color: #BDBDBD}';
    echo '.login .button-primary{    width: 100%; background: #8DC63F; border: none; box-shadow: none; text-shadow: none; margin-top: 15px; border-radius: 10px; font-size: 20px; height: 40px !important;}';
    echo '.login #login_error, .login .message, .login .success{ margin-bottom: 0 !important; border-left: 0 !important;}';
    echo '.login form{position: static !important;}';

    echo '</style>';
}
add_action('login_head', 'custom_login_logo');
/*CUSTOM LOGIN PAGE--------END*/

if (is_admin()){
    // Function to change "posts" to "news" in the admin side menu
    function change_post_menu_label() {
        global $menu;
        global $submenu;
        $menu[5][0] = 'Blogs';
        $submenu['edit.php'][5][0] = 'Blogs';
        $submenu['edit.php'][10][0] = 'Add Blog';
        $submenu['edit.php'][16][0] = 'Tags';
        echo '';
    }
    add_action( 'admin_menu', 'change_post_menu_label' );
// Function to change post object labels to "news"
    function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'Blogs';
        $labels->singular_name = 'Blog';
        $labels->add_new = 'Add Blog';
        $labels->add_new_item = 'Add Blog';
        $labels->edit_item = 'Edit Blog';
        $labels->new_item = 'Blog';
        $labels->view_item = 'View Blog';
        $labels->search_items = 'Search Blogs';
        $labels->not_found = 'No Blogs found';
        $labels->not_found_in_trash = 'No Blogs found in Trash';
    }
    add_action( 'init', 'change_post_object_label' );



}


?>