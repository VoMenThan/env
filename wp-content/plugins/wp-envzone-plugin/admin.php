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
            $menuSlug, array($this,'settingPagePost'));

        $menuSlug = 'envzone-mt-setting-knowledge';
        add_submenu_page('edit.php?post_type=knowledge_center','Promotion Mode', 'Promotion Mode', 'manage_options',
            $menuSlug, array($this,'settingPageKnowledge'));

        $menuSlug = 'envzone-mt-setting-gallery';
        add_submenu_page('edit.php?post_type=studio_gallery','Promotion Mode', 'Promotion Mode', 'manage_options',
            $menuSlug, array($this,'settingPageGallery'));

        $menuSlug = 'envzone-mt-setting-motion';
        add_submenu_page('edit.php?post_type=studio_motion','Promotion Mode', 'Promotion Mode', 'manage_options',
            $menuSlug, array($this,'settingPageMotion'));

    }


    public function settingPagePost(){
        require ENVZONE_MT_VIEWS_DIR . '/setting-page-post.php';
    }

    public function settingPageKnowledge(){
        require ENVZONE_MT_VIEWS_DIR . '/setting-page-knowledge.php';
    }

    public function settingPageGallery(){
        require ENVZONE_MT_VIEWS_DIR . '/setting-page-gallery.php';
    }

    public function settingPageMotion(){
        require ENVZONE_MT_VIEWS_DIR . '/setting-page-motion.php';
    }

}
