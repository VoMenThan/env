<?php
/**
 * Created by PhpStorm.
 * User: than.vo
 * Date: 2019-01-26
 * Time: 13:00
 */

class Env_Theme_Widget_Main{

    private $_widget_options = array(); //bien toan cuc

    public function _construct(){
        $this->_widget_options = array(
          'searchForm' => true,
        );

        add_action('widgets_init', array($this, 'searchForm'));
    }

    public function searchForm(){
        require_once ENV_THEM_WIDGET_DIR. 'searchForm.php';
        new Env_Theme_Widget_SearchForm();
    }

}
