<?php
define( 'ENV_THEME_DIR', get_stylesheet_directory().'/' );
define( 'ENV_THEME_URL', get_stylesheet_directory_uri().'/' );

define( 'ASSET_URL', get_template_directory_uri().'/assets/' );

define( 'ENV_THEM_INC_DIR', ENV_THEME_DIR . 'inc/' );

/*======================================================================================================
 * 3. KHAI BAO HE THONG WIDGET CUA THEME
 * ======================================================================================================*/

//add_action('widgets_init', 'mt_env_widgets_init');

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
 * 3. KHAI BAO HE THONG WIDGET
 * ======================================================================================================*/
add_action('widgets_init', 'mt_theme_widgets_init');
function mt_theme_widgets_init(){
    $args = array(
        'name'          => __( 'Sidebar name', 'theme_text_domain' ),
        'id'            => 'unique-sidebar-id',    // ID should be LOWERCASE  ! ! !
        'description'   => '',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>' );
    register_sidebar($args);
}

/*======================================================================================================
 * 2. NAP NHUNG TAP TIN JS VAO THEME
 * ======================================================================================================*/

add_action('wp_enqueue_scripts', 'mt_env_register_js');
function mt_env_register_js(){
    $jsUrl = get_template_directory_uri().'/assets/js/';
	wp_deregister_script('jquery');
    wp_register_script('jquery', $jsUrl.'jquery.min.js', array(), '1.0', true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('mt_env_popper', $jsUrl.'popper.min.js', array(), '1.0', true);
    wp_enqueue_script('mt_env_bootstrap', $jsUrl.'bootstrap.min.js', array(), '1.0', true);
	wp_enqueue_script('mt_env_owl_carousel', $jsUrl.'owl.carousel.min.js', array(), '1.0', true);
	wp_enqueue_script('mt_env_jquery_matchheight', $jsUrl.'jquery.matchHeight-min.js', array(), '1.0', true);
	wp_enqueue_script('mt_env_jquery_mCustomScrollbar_concat_min', $jsUrl.'jquery.mCustomScrollbar.concat.min.js', array(), '1.0', true);
	wp_enqueue_script('mt_env_myrating', $jsUrl.'myrating.js', array(), '1.0', true);
	wp_enqueue_script('mt_env_styles', $jsUrl.'styles.js', array(), '1.0', true);
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


/*ADD GOOGLE SCRIPT FOOTER*/
//add_action('wp_footer', 'mt_theme_script_code_google');
function mt_theme_script_code_google(){

    echo '<script async src="https://www.googletagmanager.com/gtag/js?id=UA-88982528-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag(\'js\', new Date());

    gtag(\'config\', \'UA-88982528-1\');
</script>


<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
<amp-analytics type="gtag" data-credentials="include">
    <script type="application/json">
        {
            "vars" : {
            "gtag_id": "<UA-88982528-1>",
                "config" : {
                "<UA-88982528-1>": { "groups": "default" }
                }
            }
        }
    </script>
</amp-analytics>';
}
/*ADD GOOGLE SCRIPT FOOTER END*/

//add_filter('show_admin_bar', '__return_false');

if( ! function_exists( 'uri_segment' ) ) {
    function uri_segment($n = 0){

        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
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
    wp_localize_script(
        'my_loadmore',
        'misha_loadmore_params', array(
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
    $event = $_POST['event'];
    $blog = $_POST['blog'];


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
            elseif ($event == 'true'){
                get_template_part('template-parts/content', 'event');
            }
            elseif ($blog == 'true'){
                get_template_part('template-parts/content', 'blog');
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


/*AJAX SURVEY*/
add_action('wp_ajax_mt_help_rating_form', array('CVF_Posts', 'mt_help_rating_form'));
add_action('wp_ajax_nopriv_mt_help_rating_form', array('CVF_Posts', 'mt_help_rating_form'));

/*=======Rating company detail=======*/
add_action('wp_ajax_mt_help_rating_form_company', array('CVF_Posts', 'mt_help_rating_form_company'));
add_action('wp_ajax_nopriv_mt_help_rating_form_company', array('CVF_Posts', 'mt_help_rating_form_company'));


add_action('wp_ajax_mt_help_rating_survey_website', array('CVF_Posts', 'mt_help_rating_survey_website'));
add_action('wp_ajax_nopriv_mt_help_rating_survey_website', array('CVF_Posts', 'mt_help_rating_survey_website'));

class CVF_Posts {
    public static function mt_help_rating_form() {
        $post_id = $_POST['post_id'];
        $star = get_field('rating_star', $post_id);
        $counting_star = get_field('counting_star', $post_id);
        $counting_star++;
        switch ($_POST['rating_star']):
            case 1:
                $star['1_star']++;
                break;
            case 2:
                $star['2_stars']++;
                break;
            case 3:
                $star['3_stars']++;
                break;
            case 4:
                $star['4_stars']++;
                break;
            case 5:
                $star['5_stars']++;
                break;
            default:
                break;
        endswitch;
        update_field( 'rating_star', $star, $post_id );
        update_field( 'counting_star', $counting_star, $post_id );
        $average_rating = round(($star['1_star']*1 + $star['2_stars']*2 + $star['3_stars']*3 + $star['4_stars']*4 + $star['5_stars']*5)/$counting_star, 1);
        echo '(Average rating '.$average_rating.'. Vote count: '.$counting_star.')';
        exit();
    }

    public static function mt_help_rating_form_company() {
        $post_id = $_POST['post_id'];
        $star = get_field('rating_star', $post_id);
        $counting_star = get_field('counting_star', $post_id);
        $counting_star++;
        switch ($_POST['rating_star']):
            case 1:
                $star['1_star']++;
                break;
            case 2:
                $star['2_stars']++;
                break;
            case 3:
                $star['3_stars']++;
                break;
            case 4:
                $star['4_stars']++;
                break;
            case 5:
                $star['5_stars']++;
                break;
            default:
                break;
        endswitch;
        update_field( 'rating_star', $star, $post_id );
        update_field( 'counting_star', $counting_star, $post_id );
        $average_rating = round(($star['1_star']*1 + $star['2_stars']*2 + $star['3_stars']*3 + $star['4_stars']*4 + $star['5_stars']*5)/$counting_star, 1);
        echo '(Average rating '.$average_rating.'. Vote count: '.$counting_star.')';
        exit();
    }

    public static function mt_help_rating_survey_website() {
        $post_id = 22;
        $star = get_field('rating_star', $post_id);
        $counting_star = get_field('counting_star', $post_id);
        $counting_star++;
        switch ($_POST['rating_star']):
            case 1:
                $star['1_star']++;
                break;
            case 2:
                $star['2_stars']++;
                break;
            case 3:
                $star['3_stars']++;
                break;
            case 4:
                $star['4_stars']++;
                break;
            case 5:
                $star['5_stars']++;
                break;
            default:
                break;
        endswitch;
        update_field( 'rating_star', $star, $post_id );
        update_field( 'counting_star', $counting_star, $post_id );
        $average_rating = round(($star['1_star']*1 + $star['2_stars']*2 + $star['3_stars']*3 + $star['4_stars']*4 + $star['5_stars']*5)/$counting_star, 1);
        echo '(Average rating '.$average_rating.'. Vote count: '.$counting_star.')';
        exit();
    }
}
/*AJAX SURVEY END*/


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
        $menu_icon = &$wp_post_types['post']->menu_icon;// menu icon dashboard
        $menu_icon = 'dashicons-text-page';
    }
    add_action( 'init', 'change_post_object_label' );


    /* Custom category ebook*/




}



add_action( 'gform_after_submission_17', 'post_to_third_party', 10, 2 );
function post_to_third_party( $entry ) {

    $post_id = wp_insert_post(
        array(  'post_title'    => rgar( $entry, '3' ),
            'post_status'   => 'publish',
            'post_type'     => 'discussion_board'));

    $display_name = rgar( $entry, '1' );
    $email_address = rgar( $entry, '2' );
    if (isset($display_name)) {
        update_post_meta($post_id, 'display_name', $display_name);
    }
    if (isset($email_address)) {
        update_post_meta($post_id, 'email_address', $email_address);
    }

    rocket_clean_post( 3593 );

}

function mepr_add_tabs_content($action) {
    $status_subscription = do_shortcode('[mepr-list-subscriptions]');
    $info_subscription = $status_subscription;
    $info_subscription = strip_tags($info_subscription);
    $info_subscription = preg_split('/\:/', $info_subscription);

    if($action == 'booking') {
        if ($status_subscription != 'You have no subscriptions' and $info_subscription[1] != 'Never') {
            ?>
            <div class="col-lg-7 order-2">
                <div class="account-setting-tab">
                    <h1>Booking</h1>
                    <div class="box-card">
                        <div class="card-header" id="headingBooking">
                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseBooking"
                                aria-expanded="true"
                                aria-controls="collapseBooking">
                                <?php _ex('Appointment Scheduling', 'ui', 'memberpress'); ?>
                            </h5>
                        </div>

                        <div id="collapseBookingConsultation" class="collapse show"
                             aria-labelledby="featureBookingConsultation">
                            <div class="card-body">
                                <div class="group-name">
                                    <?php _ex('Choose an appointment type following that you need support for your asset', 'ui', 'memberpress'); ?>
                                </div>
                                <div class="mp_wrapper">
                                    <div class="item-appointment-scheduling">
                                        <div class="category-appointment">advance</div>
                                        <a href=""
                                           onclick="Calendly.showPopupWidget('https://calendly.com/envzone/onsite-client-portal-integration');return false;">
                                            <h3 class="title-appointment">
                                                Onsite Client Portal Integration
                                            </h3>
                                            <i class="icon-ontime">
                                                <svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13 0L14.8 1.79L10.79 5.79L12.21 7.21L16.21 3.21L18 5V0H13ZM7 7C3.14 7 0 10.13 0 14C0 15.8565 0.737498 17.637 2.05025 18.9497C3.36301 20.2625 5.14348 21 7 21C10.86 21 14 17.87 14 14C14 12.1435 13.2625 10.363 11.9497 9.05025C10.637 7.7375 8.85652 7 7 7ZM7 9.15C9.67 9.15 11.85 11.32 11.85 14C11.85 14.6369 11.7246 15.2676 11.4808 15.856C11.2371 16.4444 10.8798 16.9791 10.4295 17.4295C9.9791 17.8798 9.44444 18.2371 8.85601 18.4808C8.26758 18.7246 7.63691 18.85 7 18.85C4.32 18.85 2.15 16.68 2.15 14C2.15 12.7137 2.66098 11.4801 3.57053 10.5705C4.48008 9.66098 5.7137 9.15 7 9.15ZM6 11V14.69L9.19 16.53L9.94 15.23L7.5 13.82V11"
                                                          fill="#78909C"/>
                                                </svg>
                                            </i>
                                        </a>
                                    </div>
                                    <div class="item-appointment-scheduling">
                                        <div class="category-appointment">standard</div>
                                        <a href=""
                                           onclick="Calendly.showPopupWidget('https://calendly.com/envzone/onsite-ats-integration');return false;">
                                            <h3 class="title-appointment">
                                                Onsite ATS Integration
                                            </h3>
                                            <i class="icon-ontime">
                                                <svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13 0L14.8 1.79L10.79 5.79L12.21 7.21L16.21 3.21L18 5V0H13ZM7 7C3.14 7 0 10.13 0 14C0 15.8565 0.737498 17.637 2.05025 18.9497C3.36301 20.2625 5.14348 21 7 21C10.86 21 14 17.87 14 14C14 12.1435 13.2625 10.363 11.9497 9.05025C10.637 7.7375 8.85652 7 7 7ZM7 9.15C9.67 9.15 11.85 11.32 11.85 14C11.85 14.6369 11.7246 15.2676 11.4808 15.856C11.2371 16.4444 10.8798 16.9791 10.4295 17.4295C9.9791 17.8798 9.44444 18.2371 8.85601 18.4808C8.26758 18.7246 7.63691 18.85 7 18.85C4.32 18.85 2.15 16.68 2.15 14C2.15 12.7137 2.66098 11.4801 3.57053 10.5705C4.48008 9.66098 5.7137 9.15 7 9.15ZM6 11V14.69L9.19 16.53L9.94 15.23L7.5 13.82V11"
                                                          fill="#78909C"/>
                                                </svg>
                                            </i>
                                        </a>
                                    </div>
                                    <div class="item-appointment-scheduling">
                                        <div class="category-appointment">standard</div>
                                        <a href=""
                                           onclick="Calendly.showPopupWidget('https://calendly.com/envzone/email-funnel-integration');return false;">
                                            <h3 class="title-appointment">
                                                Email Funnel Integration
                                            </h3>
                                            <i class="icon-ontime">
                                                <svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13 0L14.8 1.79L10.79 5.79L12.21 7.21L16.21 3.21L18 5V0H13ZM7 7C3.14 7 0 10.13 0 14C0 15.8565 0.737498 17.637 2.05025 18.9497C3.36301 20.2625 5.14348 21 7 21C10.86 21 14 17.87 14 14C14 12.1435 13.2625 10.363 11.9497 9.05025C10.637 7.7375 8.85652 7 7 7ZM7 9.15C9.67 9.15 11.85 11.32 11.85 14C11.85 14.6369 11.7246 15.2676 11.4808 15.856C11.2371 16.4444 10.8798 16.9791 10.4295 17.4295C9.9791 17.8798 9.44444 18.2371 8.85601 18.4808C8.26758 18.7246 7.63691 18.85 7 18.85C4.32 18.85 2.15 16.68 2.15 14C2.15 12.7137 2.66098 11.4801 3.57053 10.5705C4.48008 9.66098 5.7137 9.15 7 9.15ZM6 11V14.69L9.19 16.53L9.94 15.23L7.5 13.82V11"
                                                          fill="#78909C"/>
                                                </svg>
                                            </i>
                                        </a>
                                    </div>
                                    <div class="item-appointment-scheduling">
                                        <div class="category-appointment">standard</div>
                                        <a href=""
                                           onclick="Calendly.showPopupWidget('https://calendly.com/envzone/landing-page-integration');return false;">
                                            <h3 class="title-appointment">
                                                Landing Page Integration
                                            </h3>
                                            <i class="icon-ontime">
                                                <svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13 0L14.8 1.79L10.79 5.79L12.21 7.21L16.21 3.21L18 5V0H13ZM7 7C3.14 7 0 10.13 0 14C0 15.8565 0.737498 17.637 2.05025 18.9497C3.36301 20.2625 5.14348 21 7 21C10.86 21 14 17.87 14 14C14 12.1435 13.2625 10.363 11.9497 9.05025C10.637 7.7375 8.85652 7 7 7ZM7 9.15C9.67 9.15 11.85 11.32 11.85 14C11.85 14.6369 11.7246 15.2676 11.4808 15.856C11.2371 16.4444 10.8798 16.9791 10.4295 17.4295C9.9791 17.8798 9.44444 18.2371 8.85601 18.4808C8.26758 18.7246 7.63691 18.85 7 18.85C4.32 18.85 2.15 16.68 2.15 14C2.15 12.7137 2.66098 11.4801 3.57053 10.5705C4.48008 9.66098 5.7137 9.15 7 9.15ZM6 11V14.69L9.19 16.53L9.94 15.23L7.5 13.82V11"
                                                          fill="#78909C"/>
                                                </svg>
                                            </i>
                                        </a>
                                    </div>
                                    <div class="item-appointment-scheduling">
                                        <div class="category-appointment">standard</div>
                                        <a href=""
                                           onclick="Calendly.showPopupWidget('https://calendly.com/envzone/online-marketing-integration');return false;">
                                            <h3 class="title-appointment">
                                                Online Marketing Integration
                                            </h3>
                                            <i class="icon-ontime">
                                                <svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13 0L14.8 1.79L10.79 5.79L12.21 7.21L16.21 3.21L18 5V0H13ZM7 7C3.14 7 0 10.13 0 14C0 15.8565 0.737498 17.637 2.05025 18.9497C3.36301 20.2625 5.14348 21 7 21C10.86 21 14 17.87 14 14C14 12.1435 13.2625 10.363 11.9497 9.05025C10.637 7.7375 8.85652 7 7 7ZM7 9.15C9.67 9.15 11.85 11.32 11.85 14C11.85 14.6369 11.7246 15.2676 11.4808 15.856C11.2371 16.4444 10.8798 16.9791 10.4295 17.4295C9.9791 17.8798 9.44444 18.2371 8.85601 18.4808C8.26758 18.7246 7.63691 18.85 7 18.85C4.32 18.85 2.15 16.68 2.15 14C2.15 12.7137 2.66098 11.4801 3.57053 10.5705C4.48008 9.66098 5.7137 9.15 7 9.15ZM6 11V14.69L9.19 16.53L9.94 15.23L7.5 13.82V11"
                                                          fill="#78909C"/>
                                                </svg>
                                            </i>
                                        </a>
                                    </div>
                                    <div class="item-appointment-scheduling">
                                        <div class="category-appointment">standard</div>
                                        <a href=""
                                           onclick="Calendly.showPopupWidget('https://calendly.com/envzone/web-redesign-or-improvement');return false;">
                                            <h3 class="title-appointment">
                                                Web Redesign or Improvement
                                            </h3>
                                            <i class="icon-ontime">
                                                <svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13 0L14.8 1.79L10.79 5.79L12.21 7.21L16.21 3.21L18 5V0H13ZM7 7C3.14 7 0 10.13 0 14C0 15.8565 0.737498 17.637 2.05025 18.9497C3.36301 20.2625 5.14348 21 7 21C10.86 21 14 17.87 14 14C14 12.1435 13.2625 10.363 11.9497 9.05025C10.637 7.7375 8.85652 7 7 7ZM7 9.15C9.67 9.15 11.85 11.32 11.85 14C11.85 14.6369 11.7246 15.2676 11.4808 15.856C11.2371 16.4444 10.8798 16.9791 10.4295 17.4295C9.9791 17.8798 9.44444 18.2371 8.85601 18.4808C8.26758 18.7246 7.63691 18.85 7 18.85C4.32 18.85 2.15 16.68 2.15 14C2.15 12.7137 2.66098 11.4801 3.57053 10.5705C4.48008 9.66098 5.7137 9.15 7 9.15ZM6 11V14.69L9.19 16.53L9.94 15.23L7.5 13.82V11"
                                                          fill="#78909C"/>
                                                </svg>
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }else{
            ?>
            <div class="col-lg-7 order-2">
                <div class="mp-wrapper mp-no-subs">
                    <div class="account-setting-tab">
                        <div class="box-card">
                            <div class="card-header" id="headingProfile">
                                <h5 class="mb-0" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true"
                                    aria-controls="collapseProfile">
                                    Feature Locked
                                </h5>
                            </div>

                            <div id="collapseProfile" class="collapse show" aria-labelledby="headingProfile">
                                <div class="card-body">
                                    <div class="group-name">
                                        <?php _ex('Please purchase a plan to have this feature unlock.', 'ui', 'memberpress'); ?>
                                    </div>
                                    <div class="mp_wrapper text-center">
                                        <svg width="80" height="200" viewBox="0 0 80 80" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M63.7038 29.797V21.4815C63.7038 9.63704 53.0697 0 40.0001 0C26.9304 0 16.2964 9.63704 16.2964 21.4815V29.797C11.2578 30.6652 7.40747 35.0563 7.40747 40.3407V69.2918C7.40747 75.1955 12.2119 80 18.1171 80H61.883C67.7882 80 72.5926 75.1956 72.5926 69.2904V40.3393C72.5926 35.0563 68.7423 30.6652 63.7038 29.797ZM19.2593 21.4815C19.2593 11.2696 28.563 2.96296 40.0001 2.96296C51.4371 2.96296 60.7408 11.2696 60.7408 21.4815V29.6296H19.2593V21.4815ZM69.6297 69.2904C69.6297 73.5615 66.1541 77.037 61.883 77.037H18.1171C13.846 77.037 10.3704 73.5615 10.3704 69.2904V40.3393C10.3704 36.0681 13.846 32.5926 18.1171 32.5926H61.883C66.1541 32.5926 69.6297 36.0681 69.6297 40.3393V69.2904Z"
                                                  fill="#BDBDBD"/>
                                            <path d="M40 41.4815C36.7319 41.4815 34.0741 44.1393 34.0741 47.4074V56.2963C34.0741 59.5644 36.7319 62.2222 40 62.2222C43.2682 62.2222 45.9259 59.5644 45.9259 56.2963V47.4074C45.9259 44.1393 43.2682 41.4815 40 41.4815ZM42.963 56.2963C42.963 57.9304 41.6341 59.2593 40 59.2593C38.3659 59.2593 37.0371 57.9304 37.0371 56.2963V47.4074C37.0371 45.7733 38.3659 44.4444 40 44.4444C41.6341 44.4444 42.963 45.7733 42.963 47.4074V56.2963Z"
                                                  fill="#BDBDBD"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }elseif ($action == 'work-order'){
        if ($status_subscription != 'You have no subscriptions' and $info_subscription[1] != ' Never ') {
        ?>
        <div class="col-lg-7 order-2">
            <div class="account-setting-tab">
                <h1>
                    <?php _ex('Work Order', 'ui', 'memberpress');?>
                </h1>
                <div class="box-card">
                    <div class="card-header" id="featureDigitalAsset">
                        <h5 class="mb-0" data-toggle="collapse" data-target="#collapseDigitalAsset" aria-expanded="true" aria-controls="collapseDigitalAsset">
                            <?php _ex('Submit Ticket', 'ui', 'memberpress');?>
                        </h5>
                    </div>

                    <div id="collapseDigitalAsset" class="collapse show" aria-labelledby="featureDigitalAsset">
                        <div class="card-body">
                            <div class="group-name">
                                <?php _ex('Need help on your website, digital asset, etc.! Request help from team here.', 'ui', 'memberpress');?>
                            </div>
                            <div class="mp_wrapper">
                                <div class="clearfix">
                                    <div class="item-shadow-account item-ticket-portal">
                                        <h3 class="title-shadow">
                                            Ticket Portal
                                        </h3>
                                        <a href="https://envzone.supportbee.com/portal/sign_in" target="_blank" class="link-shadow">Request now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php
        }else{
            ?>
            <div class="col-lg-7 order-2">
                <div class="mp-wrapper mp-no-subs">
                    <div class="account-setting-tab">
                        <div class="box-card">
                            <div class="card-header" id="headingProfile">
                                <h5 class="mb-0" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true"
                                    aria-controls="collapseProfile">
                                    Feature Locked
                                </h5>
                            </div>

                            <div id="collapseProfile" class="collapse show" aria-labelledby="headingProfile">
                                <div class="card-body">
                                    <div class="group-name">
                                        <?php _ex('Please purchase a plan to have this feature unlock.', 'ui', 'memberpress'); ?>
                                    </div>
                                    <div class="mp_wrapper text-center">
                                        <svg width="80" height="200" viewBox="0 0 80 80" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M63.7038 29.797V21.4815C63.7038 9.63704 53.0697 0 40.0001 0C26.9304 0 16.2964 9.63704 16.2964 21.4815V29.797C11.2578 30.6652 7.40747 35.0563 7.40747 40.3407V69.2918C7.40747 75.1955 12.2119 80 18.1171 80H61.883C67.7882 80 72.5926 75.1956 72.5926 69.2904V40.3393C72.5926 35.0563 68.7423 30.6652 63.7038 29.797ZM19.2593 21.4815C19.2593 11.2696 28.563 2.96296 40.0001 2.96296C51.4371 2.96296 60.7408 11.2696 60.7408 21.4815V29.6296H19.2593V21.4815ZM69.6297 69.2904C69.6297 73.5615 66.1541 77.037 61.883 77.037H18.1171C13.846 77.037 10.3704 73.5615 10.3704 69.2904V40.3393C10.3704 36.0681 13.846 32.5926 18.1171 32.5926H61.883C66.1541 32.5926 69.6297 36.0681 69.6297 40.3393V69.2904Z"
                                                  fill="#BDBDBD"/>
                                            <path d="M40 41.4815C36.7319 41.4815 34.0741 44.1393 34.0741 47.4074V56.2963C34.0741 59.5644 36.7319 62.2222 40 62.2222C43.2682 62.2222 45.9259 59.5644 45.9259 56.2963V47.4074C45.9259 44.1393 43.2682 41.4815 40 41.4815ZM42.963 56.2963C42.963 57.9304 41.6341 59.2593 40 59.2593C38.3659 59.2593 37.0371 57.9304 37.0371 56.2963V47.4074C37.0371 45.7733 38.3659 44.4444 40 44.4444C41.6341 44.4444 42.963 45.7733 42.963 47.4074V56.2963Z"
                                                  fill="#BDBDBD"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }elseif ($action == 'digital-asset'){
        if ($status_subscription != 'You have no subscriptions' and $info_subscription[1] != ' Never ') {
        ?>
        <div class="col-lg-7 order-2">
            <div class="account-setting-tab">
                <h1>
                    <?php _ex('Digital Asset', 'ui', 'memberpress');?>
                </h1>
                <?php
                global $wp_query;
                $curauth = $wp_query->get_queried_object();

                $author_id = $curauth->ID;

                if (isset($_REQUEST['asset_website_address']) or isset($_REQUEST['asset_hosting_address']) or isset($_REQUEST['asset_cpanel_address']) or isset($_REQUEST['asset_ftp_address'])){
                    $website_address = $_POST['asset_website_address'];
                    $hosting_address = $_POST['asset_hosting_address'];
                    $cpanel_address = $_POST['asset_cpanel_address'];
                    $ftp_address = $_POST['asset_ftp_address'];

                    update_field( 'website',
                        array(  'website_address' => $website_address,
                            'hosting_address' => $hosting_address,
                            'cpanel_address' => $cpanel_address,
                            'ftp_address' => $ftp_address),
                        'user_'.$author_id );
                    $website_sucess = 'Updated!';
                }

                $field_website = get_field('website', 'user_'.$author_id);?>
                <?php
                if (isset($_REQUEST['asset_website_address'])):?>
                    <div class="alert alert-success">
                    <?php echo $website_sucess;?>
                    </div>
                <?php endif;?>
                <div class="box-card">
                    <div class="card-header" id="featureDigitalAsset">
                        <h5 class="mb-0" data-toggle="collapse" data-target="#collapseDigitalAsset" aria-expanded="true" aria-controls="collapseDigitalAsset">
                            <?php _ex('Website', 'ui', 'memberpress');?>
                        </h5>
                    </div>

                    <div id="collapseDigitalAsset" class="collapse show" aria-labelledby="featureDigitalAsset">
                        <div class="card-body">
                            <div class="group-name">
                                <?php _ex('Original Information and administration', 'ui', 'memberpress');?>
                            </div>
                            <div class="mp_wrapper">
                                <form class="mepr-account-form mepr-form clearfix" id="mepr-digital-asset" action="" method="post" novalidate>

                                    <div class="mp-form-row mepr_asset_website_address">
                                        <div class="mp-form-label">
                                            <label for="asset_website_address"><?php _ex('Website address*', 'ui', 'memberpress'); ?></label>
                                            <span class="cc-error"><?php _ex('Invalid Website address', 'ui', 'memberpress'); ?></span>
                                        </div>
                                        <input type="text" value="<?php echo isset($_POST['asset_website_address'])?$_POST['asset_website_address']:$field_website['website_address'];?>" id="asset_website_address" name="asset_website_address" class="mepr-form-input" required/>
                                    </div>
                                    <div class="mp-form-row mepr_asset_hosting_address pr-fix">
                                        <div class="mp-form-label">
                                            <label for="asset_hosting_address"><?php _ex('Hosting address', 'ui', 'memberpress'); ?></label>
                                            <span class="cc-error"><?php _ex('Invalid Hosting address', 'ui', 'memberpress'); ?></span>
                                        </div>
                                        <input type="text" value="<?php echo isset($_POST['asset_hosting_address'])?$_POST['asset_hosting_address']:$field_website['hosting_address'];?>" id="asset_hosting_address" name="asset_hosting_address" class="mepr-form-input"/>
                                    </div>

                                    <div class="mp-form-row mepr_asset_cpanel_address">
                                        <div class="mp-form-label">
                                            <label for="asset_cpanel_address"><?php _ex('Cpanel address', 'ui', 'memberpress'); ?></label>
                                            <span class="cc-error"><?php _ex('Invalid Cpanel address', 'ui', 'memberpress'); ?></span>
                                        </div>
                                        <input type="text" value="<?php echo isset($_POST['asset_cpanel_address'])?$_POST['asset_cpanel_address']:$field_website['cpanel_address'];?>" id="asset_cpanel_address" name="asset_cpanel_address" class="mepr-form-input"/>
                                    </div>

                                    <div class="mp-form-row mepr_asset_ftp_address pr-fix">
                                        <div class="mp-form-label">
                                            <label for="asset_ftp_address"><?php _ex('FTP address', 'ui', 'memberpress'); ?></label>
                                            <span class="cc-error"><?php _ex('Invalid FTP address', 'ui', 'memberpress'); ?></span>
                                        </div>
                                        <input type="text" value="<?php echo isset($_POST['asset_ftp_address'])?$_POST['asset_ftp_address']:$field_website['ftp_address'];?>" id="asset_ftp_address" name="asset_ftp_address" class="mepr-form-input"/>
                                    </div>

                                    <div class="mepr_spacer clearfix">&nbsp;</div>

                                    <button type="submit" name="mepr-digital-asset" class="mepr-submit mepr-share-button">
                                        <?php _ex('Save', 'ui', 'memberpress'); ?>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <?php
                if (isset($_REQUEST['asset_hosting_login']) or isset($_REQUEST['asset_hosting_password']) or isset($_REQUEST['asset_cpanel_login']) or isset($_REQUEST['asset_cpanel_password'])){
                    $hosting_id = $_POST['asset_hosting_login'];
                    $hosting_password = $_POST['asset_hosting_password'];
                    $cpanel_id = $_POST['asset_cpanel_login'];
                    $cpanel_password = $_POST['asset_cpanel_password'];

                    update_field( 'delegate_access_information',
                        array(  'hosting_id' => $hosting_id,
                            'hosting_password' => $hosting_password,
                            'cpanel_id' => $cpanel_id,
                            'cpanel_password' => $cpanel_password),
                        'user_'.$author_id );

                    $delegate_access_information_sucess = 'Updated!';
                }
                $field_delegate_access_information = get_field('delegate_access_information', 'user_'.$author_id);

                ?>
                    <?php
                    if (isset($_REQUEST['asset_hosting_login'])):?>
                        <div class="alert alert-success">
                            <?php echo $delegate_access_information_sucess;?>
                        </div>
                    <?php endif;?>

                <div class="box-card">
                    <div class="card-header" id="featureDelegateAccessInformation">
                        <h5 class="mb-0" data-toggle="collapse" data-target="#collapseDelegateAccessInformation" aria-expanded="true" aria-controls="collapseDelegateAccessInformation">
                            <?php _ex('Delegate Access Information', 'ui', 'memberpress');?>
                        </h5>
                    </div>

                    <div id="collapseDelegateAccessInformation" class="collapse show" aria-labelledby="featureDelegateAccessInformation">
                        <div class="card-body">
                            <div class="mp_wrapper">
                                <form class="mepr-account-form mepr-form clearfix" id="mepr-delegate-access" action="" method="post" novalidate>

                                    <div class="group-name">
                                        <?php _ex('Hosting', 'ui', 'memberpress');?>
                                    </div>

                                    <div class="mp-form-row mepr_asset_hosting_login">
                                        <div class="mp-form-label">
                                            <label for="asset_hosting_login"><?php _ex('Login ID', 'ui', 'memberpress'); ?></label>
                                            <span class="cc-error"><?php _ex('Invalid Login ID', 'ui', 'memberpress'); ?></span>
                                        </div>
                                        <input type="text" value="<?php echo isset($_POST['asset_hosting_login'])?$_POST['asset_hosting_login']:$field_delegate_access_information['hosting_id'];?>" id="asset_hosting_login" name="asset_hosting_login" class="mepr-form-input" required/>
                                    </div>

                                    <div class="mp-form-row mepr_asset_hosting_password pr-fix">
                                        <div class="mp-form-label">
                                            <label for="asset_hosting_password"><?php _ex('Password', 'ui', 'memberpress'); ?></label>
                                            <span class="cc-error"><?php _ex('Invalid Password', 'ui', 'memberpress'); ?></span>
                                        </div>
                                        <input type="password" value="<?php echo isset($_POST['asset_hosting_password'])?$_POST['asset_hosting_password']:$field_delegate_access_information['hosting_password'];?>" id="asset_hosting_password" name="asset_hosting_password" class="mepr-form-input"/>
                                    </div>

                                    <div class="group-name">
                                        <?php _ex('Cpanel', 'ui', 'memberpress');?>
                                    </div>
                                    <div class="mp-form-row mepr_asset_cpanel_login">
                                        <div class="mp-form-label">
                                            <label for="asset_cpanel_login"><?php _ex('Login ID', 'ui', 'memberpress'); ?></label>
                                            <span class="cc-error"><?php _ex('Invalid Login ID', 'ui', 'memberpress'); ?></span>
                                        </div>
                                        <input type="text" value="<?php echo isset($_POST['asset_cpanel_login'])?$_POST['asset_cpanel_login']:$field_delegate_access_information['cpanel_id'];?>" id="asset_cpanel_login" name="asset_cpanel_login" class="mepr-form-input"/>
                                    </div>

                                    <div class="mp-form-row mepr_asset_cpanel_password pr-fix">
                                        <div class="mp-form-label">
                                            <label for="asset_cpanel_password"><?php _ex('Password', 'ui', 'memberpress'); ?></label>
                                            <span class="cc-error"><?php _ex('Invalid Password', 'ui', 'memberpress'); ?></span>
                                        </div>
                                        <input type="password" value="<?php echo isset($_POST['asset_cpanel_password'])?$_POST['asset_cpanel_password']:$field_delegate_access_information['cpanel_password'];?>" id="asset_cpanel_password" name="asset_cpanel_password" class="mepr-form-input"/>
                                    </div>

                                    <div class="mepr_spacer clearfix">&nbsp;</div>

                                    <button type="submit" name="mepr-delegate-access" class="mepr-submit mepr-share-button">
                                        <?php _ex('Save', 'ui', 'memberpress'); ?>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php
        }else{
            ?>
            <div class="col-lg-7 order-2">
                <div class="mp-wrapper mp-no-subs">
                    <div class="account-setting-tab">
                        <div class="box-card">
                            <div class="card-header" id="headingProfile">
                                <h5 class="mb-0" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true"
                                    aria-controls="collapseProfile">
                                    Feature Locked
                                </h5>
                            </div>

                            <div id="collapseProfile" class="collapse show" aria-labelledby="headingProfile">
                                <div class="card-body">
                                    <div class="group-name">
                                        <?php _ex('Please purchase a plan to have this feature unlock.', 'ui', 'memberpress'); ?>
                                    </div>
                                    <div class="mp_wrapper text-center">
                                        <svg width="80" height="200" viewBox="0 0 80 80" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M63.7038 29.797V21.4815C63.7038 9.63704 53.0697 0 40.0001 0C26.9304 0 16.2964 9.63704 16.2964 21.4815V29.797C11.2578 30.6652 7.40747 35.0563 7.40747 40.3407V69.2918C7.40747 75.1955 12.2119 80 18.1171 80H61.883C67.7882 80 72.5926 75.1956 72.5926 69.2904V40.3393C72.5926 35.0563 68.7423 30.6652 63.7038 29.797ZM19.2593 21.4815C19.2593 11.2696 28.563 2.96296 40.0001 2.96296C51.4371 2.96296 60.7408 11.2696 60.7408 21.4815V29.6296H19.2593V21.4815ZM69.6297 69.2904C69.6297 73.5615 66.1541 77.037 61.883 77.037H18.1171C13.846 77.037 10.3704 73.5615 10.3704 69.2904V40.3393C10.3704 36.0681 13.846 32.5926 18.1171 32.5926H61.883C66.1541 32.5926 69.6297 36.0681 69.6297 40.3393V69.2904Z"
                                                  fill="#BDBDBD"/>
                                            <path d="M40 41.4815C36.7319 41.4815 34.0741 44.1393 34.0741 47.4074V56.2963C34.0741 59.5644 36.7319 62.2222 40 62.2222C43.2682 62.2222 45.9259 59.5644 45.9259 56.2963V47.4074C45.9259 44.1393 43.2682 41.4815 40 41.4815ZM42.963 56.2963C42.963 57.9304 41.6341 59.2593 40 59.2593C38.3659 59.2593 37.0371 57.9304 37.0371 56.2963V47.4074C37.0371 45.7733 38.3659 44.4444 40 44.4444C41.6341 44.4444 42.963 45.7733 42.963 47.4074V56.2963Z"
                                                  fill="#BDBDBD"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
add_action('mepr_account_nav_content', 'mepr_add_tabs_content');


?>