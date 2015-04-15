<?php
/*if(!class_exists('Arzamath_Settings')){

	class Arzamath_Settings
	{

		public function __construct()
		{
			add_action('admin_init', array(&$this, 'admin_init'));
			add_action('admin_menu', array(&$this, 'add_menu'));

		}

		public function admin_init()
		{
			register_setting('arzamath_settings_group', 'setting_a');
			register_setting('arzamath_settings_group', 'setting_b');
            register_setting('arzamath_settings_group', 'setting_c');
            register_setting('arzamath_settings_group', 'setting_d');

			add_settings_section(
				'arzamath_section',
				'Arzamath Setting',
				array(&$this, 'setting_section'),
				'arzamath_template'
				);

			add_settings_field(
				'arzamath_section_setting_a',   //id opstions
				'Перше поле',     //title in page settings
				array(&$this, 'setting_input_text'),   //ф-ція відображає необхідне поле
				'arzamath_template',                   // на яку сторінку будут додаватись налаштування
				'arzamath_section',                    //  назва секції в яку буде додано налаштування
				array(
					'field' => 'setting_a')            //  массив параметрів які будуть передаватись
				);

			add_settings_field(
				'arzamath_section_setting_b',
				'Друге поле',
				array(&$this, 'setting_input_text_two'),
				'arzamath_template',
				'arzamath_section',
				array(
					'field' => 'setting_b')
				);

            add_settings_field(
                'arzamath_section_setting_c',
                'Третє поле',
                array(&$this, 'setting_input_text_three'),
                'arzamath_template',
                'arzamath_section',
                array(
                    'field' => 'setting_c')
            );

            add_settings_field(
                'arzamath_section_setting_d',
                'Третє поле',
                array(&$this, 'setting_input_text_four'),
                'arzamath_template',
                'arzamath_section',
                array(
                    'field' => 'setting_d')
            );

		}

		public function setting_section()
		{
			echo "Поля з налаштуваннями";
		}

		public function setting_input_text($args)
		{
			
            $field = $args['field'];
            // Get the value of this setting
            $value = get_option($field);
            
            echo sprintf('<input type="text" name="%s" id="%s" value="%s" />', $field, $field, $value);
            echo $value;
		}

		public function setting_input_text_two($args)
		{
			$field=$args['field'];
			$value=get_option($field);

            //echo sprintf('<input type="text" name="%s" id="%s" value="%s" />', $field, $field, $value);
            echo sprintf('<input type="text" name="%s" id="%s" value="%s">', $field, $field, $value);
            echo $value;


        }

        public function setting_input_text_three($args)
        {
            $field = $args['field'];
            // Get the value of this setting
            $value = get_option($field);

            echo sprintf('<input type="text" name="%s" id="%s" value="%s" />', $field, $field, $value);
            echo $value;
        }

        public function setting_input_text_four($args)
        {
            $field = $args['field'];
            // Get the value of this setting
            $value = get_option($field);    // в змінну value зберігає введені данні в поле

            echo sprintf('<input type="text" name="%s" id="%s" value="%s" />', $field, $field, $value);
            echo '<br>Value: '.$value.'<br>';
            echo 'Field: '.$field;
        }



		public function add_menu()
		{
			add_options_page(
				'Arzamath Setting',
				'Arzamath Setting',
				'manage_options',
				'arzamath_template',
				array(&$this, 'plugin_settings_page')
				);
		}

		public function plugin_settings_page()
		{
			if(!current_user_can('manage_options'))
            {
                wp_die(__('You do not have sufficient permissions to access this page.'));
            }

           
            include(sprintf("%s/template/settings.php", dirname(__FILE__)));
		}
	}
}*/

if(!class_exists('Arzamath_Settings')) {

    class Arzamath_Settings
    {

        public function __construct()
        {
            add_action('admin_init', array(&$this, 'admin_init'));
            add_action('admin_menu', array(&$this, 'add_menu'));

        }

        public function admin_init()
        {
            $this->init_settings();
        }

        public function init_settings()
        {
            register_setting('arzamath_settings_group', 'setting_a');
            register_setting('arzamath_settings_group', 'setting_b');
        }

        public function add_menu()
        {
            add_options_page('Plugin settings', 'Plugin themplate','manage_options',
                'arzamath_template', array(&$this, 'plugin_settings_page'));
        }

        public function plugin_settings_page()
        {
            if(!current_user_can('manage_options'))
            {
                wp_die(__('You do not have sufficient permissions to access this page.'));
            }


            include(sprintf("%s/template/settings.php", dirname(__FILE__)));
        }
    }
}