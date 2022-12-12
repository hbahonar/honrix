<?php
if (!function_exists('honrix_copy_right_customizer_register')) {
    function honrix_copy_right_customizer_register($wp_customize)
    {
        get_template_part('/inc/customize/class/Customizer');
        $customizer = new Honrix_Customizer_Control($wp_customize, 'honrix_copy_right', __('Copy Right', 'honrix'), 'honrix_general_settings_pannel');

        $customizer->start_section(array(
            'id' => 'honrix_copyright_layout',
            'label' => __('Layout', 'honrix'),
        ));

        $customizer->create_control(array(
            'id' => 'honrix_copy_right_display',
            'default' => 'yes',
            'label'      => __('Copy Right', 'honrix'),
            'description' => __('Hide or display website copy right section.', 'honrix'),
            'options' => array(
                'yes' => __('Show', 'honrix'),
                'no' => __('Hide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->create_control(array(
            'id' => 'honrix_copy_right_width',
            'default' => 'boxed',
            'label'      => __('Width', 'honrix'),
            'description' => __('Wide or boxed copy right section of the website.', 'honrix'),
            'options' => array(
                'boxed' => __('Boxed', 'honrix'),
                'wide' => __('Wide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->end_section('honrix_copyright_layout');

        $customizer->start_section(array(
            'id' => 'honrix_copyright_colors',
            'label' => __('Colors', 'honrix'),
        ));

        $customizer->create_control(array(
            'id' => 'honrix_copy_right_bg_color',
            'default' => honrix_get_control_value('honrix_theme_second_color', '#eeeeee'),
            'label' => __('Background Color', 'honrix'),
            'description' => __('Change copy right section background color.', 'honrix')
        ), Honrix_Customizer_Control::$COLOR);

        $customizer->create_control(array(
            'id' => 'honrix_copy_right_text_color',
            'default' => '#666666',
            'label' => __('Text Color', 'honrix'),
            'description' => __('Change copy right section text color.', 'honrix')
        ), Honrix_Customizer_Control::$COLOR);

        $customizer->create_control(array(
            'id' => 'honrix_copy_right_link_color',
            'default' => honrix_get_control_value('honrix_theme_color', '#16bbe1'),
            'label' => __('Link Color', 'honrix'),
            'description' => __('Change copy right section links color.', 'honrix')
        ), Honrix_Customizer_Control::$COLOR);

        $customizer->create_control(array(
            'id' => 'honrix_copy_right_link_hover_color',
            'default' => honrix_get_control_value('honrix_footer_text_color', '#666666'),
            'label' => __('Hover Link Color', 'honrix'),
            'description' => __('Change copy right section links color in mouse hover.', 'honrix')
        ), Honrix_Customizer_Control::$COLOR);

        $customizer->end_section('honrix_copyright_colors');

        $customizer->start_section(array(
            'id' => 'honrix_copyright_content',
            'label' => __('Content', 'honrix'),
        ));

        $customizer->create_control(array(
            'id' => 'honrix_copyright_text',
            'default' => '© {year} {site_name}',
            'label' => __('CopyRight Text', 'honrix'),
            'description' => __('Add text and HTML code to display in Copyright section. Add "{site_name}" to display website name, "{description}" to display website description or "{year}" to display current year.', 'honrix')
        ), Honrix_Customizer_Control::$TEXTAREA);

        $customizer->end_section('honrix_copyright_content');
    }

    add_action('customize_register', 'honrix_copy_right_customizer_register');
}

if (!function_exists('honrix_copy_right_customizer_css')) {
    function honrix_copy_right_customizer_css()
    {
?>
        <style type="text/css">
            .site-copyright {
                background: <?php echo esc_attr(honrix_get_control_value('honrix_copy_right_bg_color', '#eeeeee')); ?> !important;
                color: <?php echo esc_attr(honrix_get_control_value('honrix_copy_right_text_color', '#666666')); ?> !important;
                border-top: 1px solid <?php echo esc_attr(honrix_get_control_value('honrix_copy_right_text_color', '#666666')); ?>99 !important;
            }

            .site-copyright a {
                color: <?php echo esc_attr(honrix_get_control_value('honrix_copy_right_link_color', '#16bbe1')); ?> !important;
            }

            .site-copyright a:hover {
                color: <?php echo esc_attr(honrix_get_control_value('honrix_copy_right_link_hover_color', '#666666')); ?> !important;
            }
        </style>
<?php
    }

    add_action('wp_head', 'honrix_copy_right_customizer_css');
}
