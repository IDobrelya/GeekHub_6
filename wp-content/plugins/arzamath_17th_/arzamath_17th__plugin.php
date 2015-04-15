<?php
/*
Plugin Name: arzamath_17th:
Plugin URI: http://vk.com/club78658235
Description: Plugin wordpress
Version: 1.0
Author: Ivan Dobrelya
Author URI: http://www.vk.com/id273271172
License: GPL2
Copyright 2014  Ivan.Dobrelya  (email : nergal@i.ua)
*/

if(!class_exists('Arzamath'))
{
    class Arzamath
    {
        public function __construct()
        {
            require_once('settings.php');
            require_once(sprintf("%s/settings.php", dirname(__FILE__)));
            $arzamath_settings=new Arzamath_Settings();

            require_once(sprintf("%s/post-types/post-type_template.php", dirname(__FILE__)));
            $Post_Type_Template = new Post_Type_Template();

            $plugin=plugin_basename(__FILE__);
            add_filter("plugin_action_links_$plugin", array($this, 'plugin_settings_link'));

        }

        public function plugin_settings_link($links)
        {
            $settings_link='<a href="options-general.php?page=arzamath_template">Settings</a>';
            array_unshift($links, $settings_link);
            return $links;
        }
    }
}

if (class_exists('Arzamath'))
{
    register_activation_hook(__FILE__, array('Arzamath', 'activate'));
    register_deactivation_hook(__FILE__, array('Arzamath', 'deactivate'));
    $arzamath=new Arzamath();
}

add_action( 'admin_footer', 'my_action_javascript' ); // Write our JS below here

function my_action_javascript(){ ?>
    <script type="text/javascript" >
        function hello(){
            var meta_key=jQuery('input').attr('id');
            var input_value = jQuery("#setting_a").val();
            var img_value=jQuery("#setting_b").val();
            var select_value=jQuery("#setting_c :selected").html();
            var post_id=jQuery("#hidden").val();

            var data={
                action:'my_action',
                'input_value' : input_value,
                'img_value' : img_value,
                'select_value' : select_value,
                'post_id': post_id,
                'meta_key' : meta_key

            };

            jQuery.post(ajaxurl, data, function(response) {
                //alert('Got this from the server: ' + response);
            });


        }



    </script> <?php
}



add_action( 'wp_ajax_my_action', 'my_action_callback' );



function my_action_callback() {
    global $wpdb;
    $meta_key=$_POST['meta_key'];
    $input_value=$_POST['input_value'];
    $img_value=$_POST['img_value'];
    $meta_key='setting_a';
    $post_id=$_POST['post_id'];
   // $meta_id=480;



    $wpdb->insert(
        $wpdb->postmeta, // указываем таблицу
        array( // 'название_колонки' => 'значение'
            'post_id' => $post_id,
            'meta_key' =>$meta_key,
            'meta_value'=>$img_value

        ),
        array(
            '%d', // %d - значит число
            '%s', // %s - значит строка
            '%s'
        )
    );


    $wpdb->update(
        $wpdb->postmeta, // указываем таблицу
        array( // 'название_колонки' => 'значение'
            'meta_value'=>$img_value,
        ),
        array( // 'название_колонки' => 'значение'
            'post_id' =>$post_id,
        ),
        array(
            '%s', // %s - значит строка
        )
    );

    die();
}



