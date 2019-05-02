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

define('ENVZONE_MT_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ENVZONE_MT_VIEWS_DIR', ENVZONE_MT_PLUGIN_DIR . '/views');

if(!is_admin()){
    require_once ENVZONE_MT_PLUGIN_DIR . '/public.php';
}else{
    require_once ENVZONE_MT_PLUGIN_DIR . '/admin.php';
    new EnvzoneMTAdmin();
}