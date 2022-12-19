<?php

if (!function_exists('honrix_header_menu_customizer_register')) {
    function honrix_header_menu_customizer_register($wp_customize)
    {
        get_template_part('/inc/customize/class/Customizer');

        $customizer = new Honrix_Customizer_Control(
            $wp_customize,
            'honrix_main_menu',
            __('Main Menu', 'honrix'),
            'honrix_general_settings_pannel'
        );
        $customizer->start_section([
            'id' => 'honrix_header_menu',
            'label' => __('Main Menu', 'honrix'),
        ]);

        $customizer->create_control(
            [
                'id' => 'honrix_header_menu_link_color',
                'default' => '#333333',
                'label' => __('Link Color', 'honrix'),
                'description' => __('Change main menu top level color.', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(
            [
                'id' => 'honrix_header_menu_link_bg_color',
                'default' => '#ffffff',
                'label' => __('Link Background Color', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(
            [
                'id' => 'honrix_header_menu_link_hover_color',
                'default' => '#faab78',
                'label' => __('Link Hover Color', 'honrix'),
                'description' => __('Change main menu top level hover color.', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(
            [
                'id' => 'honrix_header_menu_link_hover_bg_color',
                'default' => '#ffffff',
                'label' => __('Link Background Hover Color', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(array(
            'id' => 'honrix_header_menu_link_font_size',
            'default' => '0.9rem',
            'label' => __('Font Size', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_header_menu_link_font_weight',
            'default' => '700',
            'label' => __('Font Weight', 'honrix'),
            'options' => array(
                '400' => __('400', 'honrix'),
                '600' => __('600', 'honrix'),
                '700' => __('700', 'honrix'),
                '900' => __('900', 'honrix')
            )
        ), Honrix_Customizer_Control::$SELECT);

        $customizer->create_control(array(
            'id' => 'honrix_header_menu_link_padding',
            'default' => '1rem 0.8rem',
            'label' => __('Padding', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_header_menu_link_border',
            'default' => 'none',
            'label' => __('Border', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->end_section('honrix_header_menu');

        /* sub menu box */
        $customizer->start_section([
            'id' => 'honrix_header_sub_menu_box',
            'label' => __('Sub Menu Box', 'honrix'),
        ]);

        $customizer->create_control(
            [
                'id' => 'honrix_header_sub_menu_bg_color',
                'default' => '#ffffff',
                'label' => __('Box Background Color', 'honrix'),
                'description' => __('Change sub menu box background color.', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(array(
            'id' => 'honrix_header_sub_menu_box_border',
            'default' => 'none',
            'label' => __('Border', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(
            [
                'id' => 'honrix_header_sub_menu_box_shadow_color',
                'default' => '#333333',
                'label' => __('Box Shadow Color', 'honrix'),
                'description' => __('Change sub menu box background color.', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->end_section('honrix_header_sub_menu_box');

        /* sub menu */
        $customizer->start_section([
            'id' => 'honrix_header_sub_menu',
            'label' => __('Sub Menu', 'honrix'),
        ]);
        $customizer->create_control(
            [
                'id' => 'honrix_header_sub_menu_link_color',
                'default' => '#333333',
                'label' => __('Link Color', 'honrix'),
                'description' => __('Change sub menu link color.', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(
            [
                'id' => 'honrix_header_sub_menu_link_bg_color',
                'default' => '#ffffff',
                'label' => __('Link Background Color', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(
            [
                'id' => 'honrix_header_sub_menu_link_hover_color',
                'default' => '#ffffff',
                'label' => __('Link Hover Color', 'honrix'),
                'description' => __('Change main menu top level hover color.', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(
            [
                'id' => 'honrix_header_sub_menu_link_hover_bg_color',
                'default' => '#faab78',
                'label' => __('Link Background Hover Color', 'honrix'),
            ],Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(array(
            'id' => 'honrix_header_sub_menu_link_font_size',
            'default' => '0.9rem',
            'label' => __('Font Size', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_header_sub_menu_link_font_weight',
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
            'id' => 'honrix_header_sub_menu_link_padding',
            'default' => '1rem 0.8rem',
            'label' => __('Padding', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_header_sub_menu_link_border',
            'default' => 'none',
            'label' => __('Border', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->end_section('honrix_header_sub_menu');
    }
    add_action('customize_register', 'honrix_header_menu_customizer_register');
}

if (!function_exists('honrix_header_menu_customizer_css')) {
    function honrix_header_menu_customizer_css()
    {
        ?>
        <style type="text/css">
            .honrix-main-menu .navbar-nav>li>a{
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_menu_link_color', '#333333')); ?>;
                background: <?php echo esc_attr(honrix_get_control_value('honrix_header_menu_link_bg_color', '#ffffff')); ?>;
                font-size: <?php echo esc_attr(honrix_get_control_value('honrix_header_menu_link_font_size', '0.9rem')); ?>;
                font-weight: <?php echo  esc_attr(honrix_get_control_value('honrix_header_menu_link_font_weight','700')); ?>;
                padding: <?php echo esc_attr(honrix_get_control_value('honrix_header_menu_link_padding', '1rem 0.8rem')); ?>;
                border: <?php echo esc_attr(honrix_get_control_value('honrix_header_menu_link_border', 'none')); ?>;
            }

            .honrix-main-menu .navbar-nav > li>a:hover,
            .honrix-main-menu .navbar-nav > li>a:focus,
            .honrix-main-menu .navbar-nav > li>a:active,
            .honrix-main-menu .navbar-nav > .active a{
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_menu_link_hover_color', '#faab78')); ?>;
                background: <?php echo esc_attr(honrix_get_control_value('honrix_header_menu_link_hover_bg_color', '#ffffff')); ?>;
            }

            .honrix-main-menu .sub-menu {
                background: <?php echo esc_attr(honrix_get_control_value('honrix_header_sub_menu_bg_color', '#ffffff')); ?>;
                box-shadow: 0 0 10px -5px <?php echo esc_attr(honrix_get_control_value('honrix_header_sub_menu_box_shadow_color', '#333333')); ?>;
                border: <?php echo esc_attr(honrix_get_control_value('honrix_header_sub_menu_box_border', 'none')); ?>;
            }

            .honrix-main-menu .sub-menu li a{
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_sub_menu_link_hover_color', '#333333')); ?>;
                background: <?php echo esc_attr(honrix_get_control_value('honrix_header_sub_menu_link_hover_bg_color', '#ffffff')); ?>;
                font-size: <?php echo esc_attr(honrix_get_control_value('honrix_header_sub_menu_link_font_size', '0.9rem')); ?>;
                font-weight: <?php echo  esc_attr(honrix_get_control_value('honrix_header_sub_menu_link_font_weight','400')); ?>;
                padding: <?php echo esc_attr(honrix_get_control_value('honrix_header_sub_menu_link_padding', '1rem 0.8rem')); ?>;
                border: <?php echo esc_attr(honrix_get_control_value('honrix_header_sub_menu_link_border', 'none')); ?>;
            }

            .honrix-main-menu .sub-menu li a:hover,
            .honrix-main-menu .sub-menu li a:focus,
            .honrix-main-menu .sub-menu li a:active,
            .honrix-main-menu .sub-menu li.active a{
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_sub_menu_link_hover_color', '#ffffff')); ?>;
                background: <?php echo esc_attr(honrix_get_control_value('honrix_header_sub_menu_link_hover_bg_color', '#faab78')); ?>;
            }

            @media (max-width: 767px){
                
            }
        </style>
<?php
    }

    add_action('wp_head', 'honrix_header_menu_customizer_css');
}
