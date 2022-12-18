<?php

if (!function_exists('honrix_header_logo_customizer_register')) {
    function honrix_header_logo_customizer_register($wp_customize)
    {
        get_template_part('/inc/customize/class/Customizer');

        $customizer = new Honrix_Customizer_Control(
            $wp_customize,
            'honrix_logo',
            __('Site Logo & Title', 'honrix'),
            'honrix_general_settings_pannel'
        );
        $customizer->start_section([
            'id' => 'honrix_header_logo',
            'label' => __('Website Logo', 'honrix'),
        ]);
        $customizer->create_control(
            [
                'id' => 'honrix_header_logo_width',
                'default' => '200',
                'label' => __('Width (px)', 'honrix'),
                'description' => __(
                    'Change width of the website logo.',
                    'honrix'
                ),
            ],
            Honrix_Customizer_Control::$NUMBER
        );

        $customizer->create_control(
            [
                'id' => 'honrix_mobile_header_logo_width',
                'default' => '300',
                'label' => __('Mobile Width (px)', 'honrix'),
                'description' => __(
                    'Change width of the website logo on mobile mode.',
                    'honrix'
                ),
            ],
            Honrix_Customizer_Control::$NUMBER
        );
        $customizer->end_section('honrix_header_logo');

        if (true === display_header_text()) {
            $customizer->start_section([
                'id' => 'honrix_header_site_title',
                'label' => __('Website Title', 'honrix'),
            ]);
            

            $customizer->create_control(
                [
                    'id' => 'honrix_header_title_color',
                    'default' => '#16bbe1',
                    'label' => __('Website Name Color', 'honrix'),
                    'description' => __('Change website name color.', 'honrix'),
                ],Honrix_Customizer_Control::$COLOR
            );

            $customizer->create_control(
                [
                    'id' => 'honrix_header_title_hover_color',
                    'default' => '#333333',
                    'label' => __('Website Name Hover Color', 'honrix'),
                    'description' => __('Change website name hover color.', 'honrix'),
                ],Honrix_Customizer_Control::$COLOR
            );

            $customizer->end_section('honrix_header_site_title');

            $customizer->start_section([
                'id' => 'honrix_header_site_description',
                'label' => __('Website Description', 'honrix'),
            ]);

            $customizer->create_control(
                [
                    'id' => 'honrix_header_description_display',
                    'default' => 'yes',
                    'label' => __('Display Description', 'honrix'),
                    'options' => [
                        'yes' => __('Yes', 'honrix'),
                        'no' => __('No', 'honrix'),
                    ],
                ],
                Honrix_Customizer_Control::$SWITCH
            );

            $customizer->create_control(
                [
                    'id' => 'honrix_header_description_color',
                    'default' => '#666666',
                    'label' => __('Website Description Color', 'honrix'),
                    'description' => __('Change website description color.', 'honrix'),
                ],Honrix_Customizer_Control::$COLOR
            );

            $customizer->end_section('honrix_header_site_description');
        }
    }
    add_action('customize_register', 'honrix_header_logo_customizer_register');
}

if (!function_exists('honrix_header_logo_customizer_css')) {
    function honrix_header_logo_customizer_css()
    {
        ?>
        <style type="text/css">
            .honrix-logo img{
                width: <?php echo esc_attr(
                    honrix_get_control_value('honrix_header_logo_width', '200')
                ); ?>px;
            }

            .honrix-logo .site-title,
            .honrix-logo .site-title a{
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_title_color', '#faab78')); ?>;
            }

            .honrix-logo .site-title a:hover{
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_title_hover_color', '#333333')); ?>;
            }

            .honrix-logo span{
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_description_color', '#666666')); ?>;
            }

            @media (max-width: 767px){
                .honrix-logo img{
                    width: <?php echo esc_attr(
                        honrix_get_control_value('honrix_mobile_header_logo_width', '200')
                    ); ?>px;
                }
            }
        </style>
<?php
    }

    add_action('wp_head', 'honrix_header_logo_customizer_css');
}
