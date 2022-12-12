<?php
if (!function_exists('honrix_footer_customizer_register')) {
    function honrix_footer_customizer_register($wp_customize)
    {
        get_template_part('/inc/customize/class/Customizer');
        $customizer = new Honrix_Customizer_Control($wp_customize, 'honrix_footer', __('Footer', 'honrix'), 'honrix_general_settings_pannel');

        $customizer->start_section(array(
            'id' => 'honrix_footer_layout',
            'label' => __('Layout', 'honrix'),
        ));

        $customizer->create_control(array(
            'id' => 'honrix_footer_display',
            'default' => 'yes',
            'label'      => __('Footer', 'honrix'),
            'description' => __('Hide or display website footer.', 'honrix'),
            'options' => array(
                'yes' => __('Show', 'honrix'),
                'no' => __('Hide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->create_control(array(
            'id' => 'honrix_footer_width',
            'default' => 'boxed',
            'label' => __('Layout Mode', 'honrix'),
            'description' => __('This is an option you can choose to display your website footer content in full width mode or boxed mode.', 'honrix'),
            'options' => array(
                'boxed' => __('Boxed', 'honrix'),
                'wide' => __('Wide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->create_control(array(
            'id' => 'honrix_footer_columns',
            'default' => '3',
            'label'      => __('Columns Count', 'honrix'),
            'description' => __('Choose your website column count. All columns will have the same width.', 'honrix'),
            'options' => array(
                '1' => __('1', 'honrix'),
                '2' => __('2', 'honrix'),
                '3' => __('3', 'honrix'),
                '4' => __('4', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->end_section('honrix_footer_layout');

        $customizer->start_section(array(
            'id' => 'honrix_footer_colors',
            'label' => __('Colors', 'honrix'),
        ));
        $customizer->create_control(array(
            'id' => 'honrix_footer_bg_color',
            'default' => honrix_get_control_value('honrix_theme_second_color', '#eeeeee'),
            'label' => __('Background Color', 'honrix'),
            'description' => __('Change footer background color.', 'honrix')
        ), Honrix_Customizer_Control::$COLOR);

        $customizer->create_control(array(
            'id' => 'honrix_footer_text_color',
            'default' => honrix_get_control_value('honrix_text_color', '#666666'),
            'label' => __('Text Color', 'honrix'),
            'description' => __('Change footer text color.', 'honrix')
        ), Honrix_Customizer_Control::$COLOR);

        $customizer->create_control(array(
            'id' => 'honrix_footer_title_color',
            'default' => honrix_get_control_value('honrix_theme_color', '#16bbe1'),
            'label' => __('Widget Title Color', 'honrix'),
            'description' => __('Change footer widget title color.', 'honrix')
        ), Honrix_Customizer_Control::$COLOR);

        $customizer->create_control(array(
            'id' => 'honrix_footer_link_color',
            'default' => honrix_get_control_value('honrix_theme_color', '#16bbe1'),
            'label' => __('Link Color', 'honrix'),
            'description' => __('Change footer section links color.', 'honrix')
        ), Honrix_Customizer_Control::$COLOR);

        $customizer->create_control(array(
            'id' => 'honrix_footer_link_hover_color',
            'default' => honrix_get_control_value('honrix_footer_text_color', '#666666'),
            'label' => __('Hover Link Color', 'honrix'),
            'description' => __('Change footer section links color in mouse hover.', 'honrix')
        ), Honrix_Customizer_Control::$COLOR);

        $customizer->end_section('honrix_footer_colors');
    }

    add_action('customize_register', 'honrix_footer_customizer_register');
}

if (!function_exists('honrix_footer_customizer_css')) {
    function honrix_footer_customizer_css()
    {
?>
        <style type="text/css">
            :root {
                --honrix-footer-background-color: <?php echo esc_attr(honrix_get_control_value('honrix_footer_bg_color', 'var(--honrix-title-color)')); ?>;
                --honrix-footer-text-color: <?php echo esc_attr(honrix_get_control_value('honrix_footer_text_color', '#' . esc_attr(get_background_color()) . '99')); ?>;
                --honrix-footer-title-color: <?php echo esc_attr(honrix_get_control_value('honrix_footer_title_color', 'var(--honrix-background-color)')); ?>;
                --honrix-footer-link-color: <?php echo esc_attr(honrix_get_control_value('honrix_footer_link_color', 'var(--honrix-background-color)')); ?>;
                --honrix-footer-link-hover-color: <?php echo esc_attr(honrix_get_control_value('honrix_footer_link_hover_color', '#' . esc_attr(get_background_color()) . '99')); ?>;
            }

            .site-footer {
                background-color: <?php echo esc_attr(honrix_get_control_value('honrix_footer_bg_color', '#eeeeee')); ?>;
                color: <?php echo esc_attr(honrix_get_control_value('honrix_footer_text_color', '#666666')); ?>;
            }

            .site-footer a {
                color: <?php echo esc_attr(honrix_get_control_value('honrix_footer_link_color', '#16bbe1')); ?>;
            }

            .site-footer a:hover {
                color: <?php echo esc_attr(honrix_get_control_value('honrix_footer_link_hover_color', '#666666')); ?>;
            }

            .site-footer .widget-title,
            .site-footer h1,
            .site-footer h2,
            .site-footer h3,
            .site-footer h4,
            .site-footer h5,
            .site-footer h6 {
                color: <?php echo esc_attr(honrix_get_control_value('honrix_footer_title_color', '#16bbe1')); ?>;
            }
        </style>
<?php
    }

    add_action('wp_head', 'honrix_footer_customizer_css');
}
