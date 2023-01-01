<?php

if (!function_exists('honrix_header_search_box_customizer_register')) {
    function honrix_header_search_box_customizer_register($wp_customize)
    {
        get_template_part('/inc/customize/class/Customizer');

        $customizer = new Honrix_Customizer_Control(
            $wp_customize,
            'honrix_search_box',
            __('Search Box', 'honrix'),
            'honrix_general_settings_pannel'
        );

        /* icon */
        $customizer->start_section([
            'id' => 'honrix_header_search_box_icon',
            'label' => __('Icon', 'honrix'),
        ]);

        
        $customizer->create_control(
            [
                'id' => 'honrix_header_search_box_icon_display',
                'default' => 'yes',
                'label' => __('Display Icon', 'honrix'),
                'options' => [
                    'yes' => __('Yes', 'honrix'),
                    'no' => __('No', 'honrix'),
                ],
            ],
            Honrix_Customizer_Control::$SWITCH
        );

        $customizer->create_control(
            [
                'id' => 'honrix_header_search_box_icon_color',
                'default' => '#333333',
                'label' => __('Color', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(
            [
                'id' => 'honrix_header_search_box_icon_hover_color',
                'default' => 'var(--honrix-theme-color)',
                'label' => __('Hover Color', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(array(
            'id' => 'honrix_header_search_box_icon_font_size',
            'default' => '1.5rem',
            'label' => __('Font Size', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);
        $customizer->end_section('honrix_header_search_box_icon');

        /* box */
        $customizer->start_section([
            'id' => 'honrix_header_search_box_box',
            'label' => __('Box', 'honrix'),
        ]);

        $customizer->create_control(
            [
                'id' => 'honrix_header_search_box_box_bg_color',
                'default' => '#ffffff',
                'label' => __('Background Color', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(
            [
                'id' => 'honrix_header_search_box_box_close_color',
                'default' => '#faab78',
                'label' => __('Close Button Color', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(
            [
                'id' => 'honrix_header_search_box_box_close_hover_color',
                'default' => '#333333',
                'label' => __('Close Button Hover Color', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->end_section('honrix_header_search_box_box');

        /* input */
        $customizer->start_section([
            'id' => 'honrix_header_search_box_text',
            'label' => __('Text', 'honrix'),
        ]);

        $customizer->create_control(
            [
                'id' => 'honrix_header_search_box_text_color',
                'default' => '#333333',
                'label' => __('Color', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(array(
            'id' => 'honrix_header_search_box_text_font_size',
            'default' => '1.2rem',
            'label' => __('Font Size', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_header_search_box_text_font_weight',
            'default' => '400',
            'label' => __('Font Weight', 'honrix'),
            'options' => array(
                '400' => __('400', 'honrix'),
                '600' => __('600', 'honrix'),
                '700' => __('700', 'honrix'),
                '900' => __('900', 'honrix')
            )
        ), Honrix_Customizer_Control::$SELECT);

        $customizer->create_control(array(
            'id' => 'honrix_header_search_box_text_padding',
            'default' => '10px 0',
            'label' => __('Padding', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(
            [
                'id' => 'honrix_header_search_box_text_border_color',
                'default' => '#333333',
                'label' => __('Border Color', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(array(
            'id' => 'honrix_header_search_box_text_border_width',
            'default' => '0 0 0 0',
            'label' => __('Border Width', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_header_search_box_text_border_radius',
            'default' => '0 0 0 0',
            'label' => __('Border Radious', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->end_section('honrix_header_search_box_text');

        /* submit */
        $customizer->start_section([
            'id' => 'honrix_header_search_box_submit',
            'label' => __('Search Button', 'honrix'),
        ]);

        $customizer->create_control(
            [
                'id' => 'honrix_header_search_box_submit_bg_color',
                'default' => '#faab78',
                'label' => __('Background Color', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(
            [
                'id' => 'honrix_header_search_box_submit_bg_hover_color',
                'default' => '#ffffff',
                'label' => __('Background Hover Color', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(
            [
                'id' => 'honrix_header_search_box_submit_color',
                'default' => '#ffffff',
                'label' => __('Color', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(
            [
                'id' => 'honrix_header_search_box_submit_hover_color',
                'default' => '#faab78',
                'label' => __('Hover Color', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(array(
            'id' => 'honrix_header_search_box_submit_font_size',
            'default' => '1.2rem',
            'label' => __('Font Size', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_header_search_box_submit_padding',
            'default' => '1rem',
            'label' => __('Padding', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(
            [
                'id' => 'honrix_header_search_box_submit_border_color',
                'default' => '#ffffff',
                'label' => __('Border Color', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(
            [
                'id' => 'honrix_header_search_box_submit_border_hover_color',
                'default' => '#ffffff',
                'label' => __('Border Hover Color', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(
            [
                'id' => 'honrix_header_search_box_submit_border_hover_color',
                'default' => '#333333',
                'label' => __('Border Hover Color', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(array(
            'id' => 'honrix_header_search_box_submit_border_width',
            'default' => '0 0 0 0',
            'label' => __('Border Width', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_header_search_box_submit_border_radius',
            'default' => '5px',
            'label' => __('Border Radious', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->end_section('honrix_header_search_box_text');
        
    }
    add_action('customize_register', 'honrix_header_search_box_customizer_register');
}

if (!function_exists('honrix_header_search_box_customizer_css')) {
    function honrix_header_search_box_customizer_css()
    {
        ?>
        <style type="text/css">
            header .honrix-search-button{
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_icon_color', '#333333')); ?>;
                font-size: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_icon_font_size', '1.5rem')); ?>;
            }

            header .honrix-search-button:hover{
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_icon_hover_color', 'var(--honrix-theme-color)')); ?>;
            }

            header .honrix-search-box{
                background: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_box_bg_color', '#ffffff')); ?>;
            }

            header .honrix-search-box .search-close span{
                background: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_box_close_color', '#faab78')); ?>;
            }

            header .honrix-search-box .search-close:hover span{
                background: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_box_close_hover_color', '#333333')); ?>;
            }

            header .honrix-search-box .search-field{
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_text_color', '#333333')); ?>;
                padding: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_text_padding', '10px 0')); ?>;
                border-color: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_text_border_color', '#333333')); ?>;
                border-width: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_text_border_width', '0 0 0 0')); ?>;
                border-radius: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_text_border_radius', '0 0 0 0')); ?>;
                -webkit-border-radius: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_text_border_radius', '0 0 0 0')); ?>;
                font-size: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_text_font_size', '1.2rem')); ?>;
                font-weight: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_text_font_weight', '400')); ?>;
            }

            header .honrix-search-box .search-submit{
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_submit_color', '#ffffff')); ?>;
                background: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_submit_bg_color', '#faab78')); ?>;
                font-size: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_submit_font_size', '1.2rem')); ?>;
                padding: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_submit_padding', '1rem')); ?>;
                border-color: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_submit_border_color', '#ffffff')); ?>;
                border-width: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_submit_border_width', '0 0 0 0')); ?>;
                border-radius: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_submit_border_radius', '5px')); ?>;
                -webkit-border-radius: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_submit_border_radius', '5px')); ?>;
            }

            header .honrix-search-box .search-submit:hover{
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_submit_hover_color', '#faab78')); ?>;
                background: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_submit_bg_hover_color', '#ffffff')); ?>;
                border-color: <?php echo esc_attr(honrix_get_control_value('honrix_header_search_box_submit_border_hover_color', '#ffffff')); ?>;
            }
            
        </style>
<?php
    }

    add_action('wp_head', 'honrix_header_search_box_customizer_css');
}
