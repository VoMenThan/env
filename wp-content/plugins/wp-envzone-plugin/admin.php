<?php

class EnvzoneMTAdmin
{

    public function __construct()
    {
        //echo '<br>' . __METHOD__;
        add_action('admin_menu', array($this, 'settingMenuPost'));
    }


    //=======================================================
    //1. Them mot submenu vao Dashboard cua WP menus
    //=======================================================
    public function settingMenuPost(){
        $menuSlug = 'envzone-mt-setting-post';
        add_posts_page('Promotion Mode', 'Promotion Mode', 'manage_options',
            $menuSlug,array($this,'settingPagePost'));
    }


    public function settingPagePost(){
        require ENVZONE_MT_VIEWS_DIR . '/setting-page-post.php';
    }

}
