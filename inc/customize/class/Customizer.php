<?php
get_template_part('/inc/customize/class/StartSection');
get_template_part('/inc/customize/class/EndSection');
get_template_part('/inc/customize/class/Input_Number_Option');
get_template_part('/inc/customize/class/Text_Radio_Button');

if (!class_exists('Honrix_Customizer_Control')) {
    class Honrix_Customizer_Control
    {
        public static $TEXT = 1, $NUMBER = 2, $COLOR = 3, $SWITCH = 4, $IMAGE = 5, $TEXTAREA = 6, $SELECT = 7;
        public $section = '', $wp_customize;
        public function __construct($wp_customize, $section_id, $title, $panel_id)
        {
            $this->section = $section_id;
            $this->wp_customize = $wp_customize;

            $wp_customize->add_section(
                $section_id,
                array(
                    'title' => $title,
                    'capability' => 'edit_theme_options',
                    'panel' => $panel_id
                )
            );
        }
        public function start_section($setting){
            $this->wp_customize->add_setting(
                $setting['id'],
                array(
                    'sanitize_callback' => 'esc_attr',
                    'transport' => 'refresh',
                )
            );

            $this->wp_customize->add_control(new honrix_Start_Section(
                $this->wp_customize,
                $setting['id'],
                array(
                    'label'      => $setting['label'],
                    'section'    => $this->section,
                    'settings'   => $setting['id'],
                )
            ));
        }

        public function end_section($id){
            $this->wp_customize->add_setting('end_section'.$id, array(
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'esc_attr'
            ));

            $this->wp_customize->add_control(new honrix_End_Section($this->wp_customize, 'end_section'.$id, array(
                'section' => $this->section,
                'settings' => 'end_section'.$id
            )));
        }
        public function create_control($setting, $type = 1)
        {
            switch ($type) {
                case self::$TEXT:
                    $this->wp_customize->add_setting($setting['id'], array(
                        'default' => $setting['default'],
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => 'honrix_sanitize_textarea_html'
                    ));

                    $this->wp_customize->add_control(new WP_Customize_Control($this->wp_customize, $setting['id'], array(
                        'type' => 'text',
                        'label' => $setting['label'],
                        'description' => $setting['description'],
                        'section' => $this->section,
                        'settings' => $setting['id']
                    )));
                    break;
                case self::$TEXTAREA:
                    $this->wp_customize->add_setting(
                        $setting['id'],
                        array(
                            'transport' => 'refresh',
                            'default' => $setting['default'],
                            'capability' => 'edit_theme_options',
                            'sanitize_callback' => 'honrix_sanitize_textarea_html'
                        )
                    );

                    $this->wp_customize->add_control(
                        $setting['id'],
                        array(
                            'type' => 'textarea',
                            'label' => $setting['label'],
                            'description' => $setting['description'],
                            'section' => $this->section,
                            'settings' => $setting['id']
                        )
                    );
                    break;
                case self::$NUMBER:
                    $this->wp_customize->add_setting($setting['id'], array(
                        'default' => $setting['default'],
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => 'esc_attr'
                    ));

                    $this->wp_customize->add_control(new honrix_Input_Number_Option($this->wp_customize, $setting['id'], array(
                        'type' => 'input',
                        'label' => $setting['label'],
                        'description' => $setting['description'],
                        'section' => $this->section,
                        'settings' => $setting['id'],
                        'choices' => array(
                            'columns' => $setting['default']
                        )
                    )));
                    break;
                case self::$COLOR:
                    $this->wp_customize->add_setting(
                        $setting['id'],
                        array(
                            'default' => $setting['default'],
                            'capability' => 'edit_theme_options',
                            'sanitize_callback' => 'sanitize_hex_color'
                        )
                    );

                    $this->wp_customize->add_control(new WP_Customize_Color_Control($this->wp_customize, $setting['id'], array(
                        'label' => $setting['label'],
                        'description'    => $setting['description'],
                        'section' => $this->section,
                        'settings' => $setting['id'],
                    )));
                    break;
                case self::$SWITCH:
                    $this->wp_customize->add_setting(
                        $setting['id'],
                        array(
                            'default'     => $setting['default'],
                            'sanitize_callback' => 'esc_attr',
                            'transport' => 'refresh',
                        )
                    );

                    $this->wp_customize->add_control(new honrix_Text_Radio_Button_Custom_Control(
                        $this->wp_customize,
                        $setting['id'],
                        array(
                            'label'      => $setting['label'],
                            'description'      => $setting['description'],
                            'section'    => $this->section,
                            'settings'   => $setting['id'],
                            'choices'    => $setting['options'],
                        )
                    ));
                    break;
                case self::$IMAGE:
                    $this->wp_customize->add_setting($setting['id'], array(
                        'capability'        => 'edit_theme_options',
                        'default'           => '',
                        'sanitize_callback' => 'honrix_sanitize_image',
                    ));

                    $this->wp_customize->add_control(new WP_Customize_Image_Control(
                        $this->wp_customize,
                        $setting['id'],
                        array(
                            'label'      => $setting['label'],
                            'description'      => $setting['description'],
                            'section'    => $this->section,
                            'settings' => $setting['id'],
                        )
                    ));
                    break;
                case self::$SELECT:
                    $this->wp_customize->add_setting($setting['id'], array(
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => 'honrix_sanitize_select',
                        'default' => $setting['default'],
                    ));

                    $this->wp_customize->add_control($setting['id'], array(
                        'type' => 'select',
                        'section' => $this->section,
                        'label' => $setting['label'],
                        'description' => $setting['description'],
                        'settings' => $setting['id'],
                        'choices' => $setting['options'],
                    ));
                    break;
            }
        }
    }
}

if (!function_exists('honrix_sanitize_image')) {
    function honrix_sanitize_image($file, $setting)
    {

        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );

        //check file type from file name
        $file_ext = wp_check_filetype($file, $mimes);

        //if file has a valid mime type return it, otherwise return default
        return ($file_ext['ext'] ? $file : $setting->default);
    }
}

if (!function_exists('honrix_sanitize_textarea_html')) {
    function honrix_sanitize_textarea_html($input)
    {
        return wp_kses_post($input);
    }
}

if (!function_exists('honrix_sanitize_select')) {
    function honrix_sanitize_select($input, $setting)
    {

        // Ensure input is a slug.
        $input = sanitize_key($input);

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control($setting->id)->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }
}
