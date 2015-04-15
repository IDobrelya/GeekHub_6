<?php /*
if(!class_exists('Post_Type_Template'))
{

    class Post_Type_Template
    {
        const POST_TYPE = "post-type-template";   // назва нашого поста який буде відображатись на адмін панелі, і в інших випадках
        private $_meta  = array(
            'meta_a',
            'meta_b',
            'meta_c',
        );

        public function __construct()
        {

            add_action('init', array(&$this, 'init'));
            add_action('admin_init', array(&$this, 'admin_init'));
        }
        public function init()
        {

            $this->create_post_type();
            add_action('save_post', array(&$this, 'save_post'));
        }
        public function create_post_type()
        {
            register_post_type(self::POST_TYPE,
                array(
                    'labels' => array(
                        'name' => __(sprintf('%ss', ucwords(str_replace("_", " ", self::POST_TYPE)))),
                        'singular_name' => __(ucwords(str_replace("_", " ", self::POST_TYPE)))
                    ),
                    'public' => true,
                    'has_archive' => true,
                    'description' => __("This is a sample post type meant only to illustrate a preferred structure of plugin development"),
                    'supports' => array(
                        'title', 'editor', 'thumbnail'
                    ),
                )
            );
        }

        public function save_post($post_id)
        {

            if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            {
                return;
            }
            if(isset($_POST['post_type']) && $_POST['post_type'] == self::POST_TYPE && current_user_can('edit_post', $post_id))
            {
                foreach($this->_meta as $field_name)
                {

                    update_post_meta($post_id, $field_name, $_POST[$field_name]);
                }
            }
            else
            {
                return;
            }
        }
        public function admin_init()
        {

            add_action('add_meta_boxes', array(&$this, 'add_meta_boxes'));
        }

        public function add_meta_boxes()
        {

            add_meta_box(

                'arzamath_settings_group',
                'Кастомні поля',
                array(&$this, 'add_inner_meta_boxes'),
                self::POST_TYPE
            );
        }

        public function add_inner_meta_boxes($post)
        {

            include(sprintf("%s/../template/%s_metabox.php", dirname(__FILE__), self::POST_TYPE));
        }
    }
} */

if(!class_exists('Post_Type_Template'))
{
    class Post_Type_Template
    {
        const POST_TYPE='post-type-template';
        private $_meta  = array(
            'setting_a',
            'setting_b',
            'setting_c'
        );

        public function __construct()
        {
            add_action('init', array(&$this, 'init'));              // init - коли завантажується WP
            add_action('admin_init', array(&$this, 'admin_init'));  // admin_init - коли отримується доступ до адмінки

        }



        public function init()
        {
            $this->create_post_type();
            add_action('save_post', array(&$this, 'save_post'));
        }

        public function create_post_type()
        {
            register_post_type(self::POST_TYPE,   // назва типу запису
                array(
                    'labels' => array(
                        'name' => 'Custom post',
                        'singular_name' =>  self::POST_TYPE,
                        'add_new' => 'Add custom post',
                        'add_new_item' => 'Треба заповнити всі поля'
                    ),
                    'public' => true,
                    'has_archive' => true,
                    'description' => __("This is a sample post type meant only to illustrate a preferred structure of plugin development"),
                    'supports' => array(
                        'title', 'editor', 'thumbnail'
                    ),
                ));
        }

        public function admin_init()
        {

            add_action('add_meta_boxes', array(&$this, 'add_meta_boxes'));  // add_meta_boxes - дозволяє реєструвати будь-які ти постів
            //add_action('admin_footer', 'my_action_javascript');

        }

        public function save_post($post_id)
        {
        /* if(isset($_POST['post_type']) && $_POST['post_type'] == self::POST_TYPE &&
         current_user_can('edit_post', $post_id))
         {

             foreach($this->_meta as $field_name)
             {

                 update_post_meta($post_id, $field_name, $_POST[$field_name]);
             }
         }
            else{
                return;
            }*/

            /*$setting1=$_POST['setting_a'];
            $setting2=$_POST['setting_b'];
            $setting3=$_POST['setting_c'];

            update_post_meta($post_id, 'setting_a', $setting1);
            update_post_meta($post_id, 'setting_b', $setting2);
            update_post_meta($post_id, 'setting_c', $setting3);*/
        }

        public function add_meta_boxes()
        {


            add_meta_box(                                   //    додає додаткові блоки на сторінку стоврення поста

                'arzamath_settings_group',                  //    атрибут тега або контейнера
                'Кастомні поля',                            //    залоговок який будуть бачити користувачі
                array(&$this, 'add_inner_meta_boxes'),      //    ф-ція яка виводить на екран поля
                self::POST_TYPE                             //    тип запису до якого додається блок
            );
        }

        public function add_inner_meta_boxes($post)
        {
            $var=$post->ID;
            echo $var;
            include(sprintf("%s/../template/%s_metabox.php", dirname(__FILE__), self::POST_TYPE));

        }
    }

}




