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

    //=======================================================
    //2. Them mot role cho user
    //=======================================================


    public function addUserRole(){
        $group = get_role('author');

        $caps = $group->capabilities;

        add_role('guest_author_env', 'Guest Author', $caps);
        add_role('former_staff_env', 'Former Staff', $caps);

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

    }





}
