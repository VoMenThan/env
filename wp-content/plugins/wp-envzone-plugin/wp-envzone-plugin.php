<?php
/*
 Plugin Name: EnvZone Plugin
Plugin URI: https://www.envzone.com
Description: Plugin for website EnvZone.
Author: Men Than
Version: 1.0
Author URI: https://www.envzone.com/author/than.vo
*/

define('ENVZONE_MT_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ENVZONE_MT_IMAGES_URL', ENVZONE_MT_PLUGIN_URL . '/images');
define('ENVZONE_MT_JS_URL', ENVZONE_MT_PLUGIN_URL . '/js');
define('ENVZONE_MT_CSS_URL', ENVZONE_MT_PLUGIN_URL . '/css');

define('ENVZONE_MT_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ENVZONE_MT_VIEWS_DIR', ENVZONE_MT_PLUGIN_DIR . '/views');

define( 'ENVZONE_MT_PLUGIN_VER', '1.0.0' );

if(!is_admin()){
    require_once ENVZONE_MT_PLUGIN_DIR . '/public.php';
}else{
    function admin_load_pdf_js(){
        echo '<script type="text/javascript" src="'.ENVZONE_MT_JS_URL.'/jspdf.debug.js"></script>';
        echo '<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>';
    }
    add_action('admin_head', 'admin_load_pdf_js');
    require_once ENVZONE_MT_PLUGIN_DIR . '/admin.php';
    new EnvzoneMTAdmin();
}