<?php

class EnvzoneMTAdmin
{

    public function __construct()
    {
        //echo '<br>' . __METHOD__;
        add_action('admin_menu', array($this, 'settingMenuPost'));

        add_action('init', array($this, 'addUserRole'));

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

        $menuSlugMagnet = 'envzone-mt-setting-companies';
        add_submenu_page('edit.php?post_type=companies','Promotion Mode', 'Promotion Mode', 'manage_options',
            $menuSlugMagnet, array($this,'settingPageCompanies'));

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


    public function addUserRole(){

        $group = get_role('author');

        $caps = $group->capabilities;

        add_role('guest_author_env', 'Guest Author', $caps);
        add_role('former_staff_env', 'Former Staff', $caps);

        /*Remove capabilities role guest author*/
        $group_env = get_role('guest_author_env');
        $group_env->remove_cap('read');
        $group_env->remove_cap('rank_math_onpage_analysis');
        $group_env->remove_cap('rank_math_onpage_general');
        $group_env->remove_cap('rank_math_onpage_social');
        $group_env->remove_cap('edit_posts');
        $group_env->remove_cap('edit_published_posts');
        $group_env->remove_cap('publish_posts');
        $group_env->remove_cap('upload_files');
        $group_env->remove_cap('level_2');
        $group_env->remove_cap('level_1');
        $group_env->remove_cap('level_0');


        /*Remove capabilities role former staff*/
        $group_staff_env = get_role('former_staff_env');
        $group_staff_env->remove_cap('read');
        $group_staff_env->remove_cap('rank_math_onpage_analysis');
        $group_staff_env->remove_cap('rank_math_onpage_general');
        $group_staff_env->remove_cap('rank_math_onpage_social');
        $group_staff_env->remove_cap('edit_posts');
        $group_staff_env->remove_cap('edit_published_posts');
        $group_staff_env->remove_cap('publish_posts');
        $group_staff_env->remove_cap('upload_files');
        $group_staff_env->remove_cap('level_2');
        $group_staff_env->remove_cap('level_1');
        $group_staff_env->remove_cap('level_0');

        /*Add capabilities role editor*/
        $group_editor_env = get_role('editor');

        $group_editor_env->add_cap('rank_math_onpage_advanced');
        $group_editor_env->add_cap('rank_math_edit_htaccess');
        $group_editor_env->add_cap('rank_math_titles');
        $group_editor_env->add_cap('rank_math_site_analysis');
        $group_editor_env->add_cap('rank_math_onpage_general');
        $group_editor_env->add_cap('rank_math_role_manager');
        $group_editor_env->add_cap('rank_math_onpage_analysis');
        $group_editor_env->add_cap('rank_math_site_analysis');
        $group_editor_env->add_cap('rank_math_link_builder');
        $group_editor_env->add_cap('rank_math_onpage_snippet');
        $group_editor_env->remove_cap('rank_math_titles');
        $group_editor_env->add_cap('rank_math_general');

    }





}
