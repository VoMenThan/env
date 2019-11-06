<?php

class EnvzoneMTAdmin
{

    public function __construct()
    {
        add_action('admin_menu', array($this, 'settingMenuPost'));
        add_action('admin_menu', array($this, 'settingMenuEmail'));
        add_action('admin_menu', array($this, 'mt_envzone_plugin_scripts'));

    }

    //=======================================================
    //2. Them mot Menu vao Dashboard cua WP menus
    //=======================================================
    public function settingMenuEmail(){
        $menuSlugMagnet = 'envzone-mt-setting-email';
        add_submenu_page('edit.php?post_type=mail_notification','Send email', 'Send email', 'manage_options',
            $menuSlugMagnet, array($this,'settingPageEmail'));
    }

    public function settingPageEmail(){
        //require ENVZONE_MT_VIEWS_DIR . '/setting-page-email.php';
        require ENVZONE_MT_VIEWS_DIR . '/send-email-page.php';
    }

    function mt_envzone_plugin_scripts() {
        wp_enqueue_style( 'mt_envzone_email_admin_css', ENVZONE_MT_CSS_URL . '/sefa.css', '', ENVZONE_MT_PLUGIN_VER );
    }

    //=======================================================
    //1. Them mot submenu vao Dashboard cua WP menus
    //=======================================================
    public function settingMenuPost(){
        $menuSlugPost = 'envzone-mt-setting-post';
        add_posts_page('Promotion Mode', 'Promotion Mode', 'manage_options',
            $menuSlugPost, array($this,'settingPagePost'));

        $menuSlugKnowledge = 'envzone-mt-setting-knowledge';
        add_submenu_page('edit.php?post_type=knowledge_center','Promotion Mode', 'Promotion Mode', 'manage_options',
            $menuSlugKnowledge, array($this,'settingPageKnowledge'));

        $menuSlugGallery = 'envzone-mt-setting-gallery';
        add_submenu_page('edit.php?post_type=studio_gallery','Promotion Mode', 'Promotion Mode', 'manage_options',
            $menuSlugGallery, array($this,'settingPageGallery'));

        $menuSlugMotion = 'envzone-mt-setting-motion';
        add_submenu_page('edit.php?post_type=studio_motion','Promotion Mode', 'Promotion Mode', 'manage_options',
            $menuSlugMotion, array($this,'settingPageMotion'));

        $menuSlugMagnet = 'envzone-mt-setting-resources';
        add_submenu_page('edit.php?post_type=resources','Promotion Mode', 'Promotion Mode', 'manage_options',
            $menuSlugMagnet, array($this,'settingPageMagnet'));

        $menuSlugCompanies = 'envzone-mt-setting-companies';
        add_submenu_page('edit.php?post_type=companies','Promotion Mode', 'Promotion Mode', 'manage_options',
            $menuSlugCompanies, array($this,'settingPageCompanies'));

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

    public function settingPageMagnet(){
        require ENVZONE_MT_VIEWS_DIR . '/setting-page-resources.php';
    }
    public function settingPageCompanies(){
        require ENVZONE_MT_VIEWS_DIR . '/setting-page-companies.php';
    }
    //=======================================================
    //2. Them mot role cho user
    //=======================================================
}
