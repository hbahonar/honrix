<?php

if (!function_exists('honrix_header_customizer_register')) {
    function honrix_header_customizer_register($wp_customize)
    {
        get_template_part('/inc/customize/class/Customizer');
        $customizer = new Honrix_Customizer_Control(
            $wp_customize,
            'honrix_header',
            __('Header', 'honrix'),
            'honrix_general_settings_pannel'
        );

        $customizer->start_section([
            'id' => 'honrix_header_layout',
            'label' => __('Layout', 'honrix'),
        ]);
        $customizer->create_control(
            [
                'id' => 'honrix_header_boxed',
                'default' => 'boxed',
                'label' => __('Mode', 'honrix'),
                'description' => __(
                    'This is an option you can choose to display your website header content in full width mode or boxed mode.',
                    'honrix'
                ),
                'options' => [
                    'boxed' => __('Boxed', 'honrix'),
                    'wide' => __('Wide', 'honrix'),
                ],
            ],
            Honrix_Customizer_Control::$SWITCH
        );

        $customizer->end_section('honrix_header_layout');

        /* header */
        $customizer->start_section([
            'id' => 'honrix_header_header',
            'label' => __('Header', 'honrix'),
        ]);

        $customizer->create_control(
            [
                'id' => 'honrix_header_bg_color',
                'default' => '#' . esc_attr(get_background_color()),
                'label' => __('Background Color', 'honrix'),
            ],
            Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(
            [
                'id' => 'honrix_header_shadow_display',
                'default' => 'no',
                'label' => __('Display Shadow Box', 'honrix'),
                'options' => [
                    'yes' => __('Yes', 'honrix'),
                    'no' => __('No', 'honrix'),
                ],
            ],
            Honrix_Customizer_Control::$SWITCH
        );

        $customizer->create_control(
            [
                'id' => 'honrix_header_shadow_color',
                'default' => '#333333',
                'label' => __('Shadow Color', 'honrix'),
            ],
            Honrix_Customizer_Control::$COLOR
        );

        $customizer->end_section('honrix_header_header');

        /* sticky header */
        $customizer->start_section([
            'id' => 'honrix_header_sticky_header',
            'label' => __('Sticky Header', 'honrix'),
        ]);
        $customizer->create_control(
            [
                'id' => 'honrix_header_sticky',
                'default' => 'yes',
                'label' => __('Sticky', 'honrix'),
                'description' => __(
                    'Do you want stick header on top of the page?',
                    'honrix'
                ),
                'options' => [
                    'yes' => __('Yes', 'honrix'),
                    'no' => __('No', 'honrix'),
                ],
            ],
            Honrix_Customizer_Control::$SWITCH
        );

        $customizer->create_control(
            [
                'id' => 'honrix_header_sticky_bg_color',
                'default' => '#' . esc_attr(get_background_color()),
                'label' => __('Background Color', 'honrix'),
            ],
            Honrix_Customizer_Control::$COLOR
        );

        $customizer->create_control(
            [
                'id' => 'honrix_sticky_header_shadow_display',
                'default' => 'yes',
                'label' => __('Display Shadow Box', 'honrix'),
                'options' => [
                    'yes' => __('Yes', 'honrix'),
                    'no' => __('No', 'honrix'),
                ],
            ],
            Honrix_Customizer_Control::$SWITCH
        );

        $customizer->create_control(
            [
                'id' => 'honrix_sticky_header_shadow_color',
                'default' => '#333333',
                'label' => __('Shadow Color', 'honrix'),
            ],
            Honrix_Customizer_Control::$COLOR
        );

        $customizer->end_section('honrix_header_sticky_header');

        /* mobile */
        $customizer->start_section([
            'id' => 'honrix_mobile_header_header',
            'label' => __('Mobile Header', 'honrix'),
        ]);
        $customizer->create_control(
            [
                'id' => 'honrix_header_mobile_bg_color',
                'default' => '#' . esc_attr(get_background_color()),
                'label' => __('Background Color', 'honrix'),
            ],
            Honrix_Customizer_Control::$COLOR
        );
        $customizer->create_control(
            [
                'id' => 'honrix_mobile_header_sticky',
                'default' => 'no',
                'label' => __('Sticky', 'honrix'),
                'description' => __(
                    'Do you want stick header on top of the page?',
                    'honrix'
                ),
                'options' => [
                    'yes' => __('Yes', 'honrix'),
                    'no' => __('No', 'honrix'),
                ],
            ],
            Honrix_Customizer_Control::$SWITCH
        );

        $customizer->create_control(
            [
                'id' => 'honrix_mobile_header_shadow_display',
                'default' => 'yes',
                'label' => __('Display Shadow Box', 'honrix'),
                'options' => [
                    'yes' => __('Yes', 'honrix'),
                    'no' => __('No', 'honrix'),
                ],
            ],
            Honrix_Customizer_Control::$SWITCH
        );

        $customizer->create_control(
            [
                'id' => 'honrix_mobile_header_shadow_color',
                'default' => '#333333',
                'label' => __('Shadow Color', 'honrix'),
            ],
            Honrix_Customizer_Control::$COLOR
        );

        $customizer->end_section('honrix_mobile_header_header');
    }
    add_action('customize_register', 'honrix_header_customizer_register');
}

if (!function_exists('honrix_header_customizer_css')) {
    function honrix_header_customizer_css()
    {
        ?>
        <style type="text/css">
            .honrix-header {
                background: <?php echo esc_attr(
                    honrix_get_control_value(
                        'honrix_header_bg_color',
                        'var(--honrix-background-color)'
                    )
                ); ?>;

                <?php if(honrix_get_control_value('honrix_header_shadow_display', 'no')=='yes'): ?>
                    box-shadow: 0 0 10px -5px <?php echo esc_attr(
                        honrix_get_control_value(
                            'honrix_header_shadow_color',
                            '#333333'
                        )
                    ); ?>;
                <?php endif; ?>
            }

            .honrix-header.honrix-sticky-header-show {
                background: <?php echo esc_attr(
                    honrix_get_control_value(
                        'honrix_header_sticky_bg_color',
                        'var(--honrix-background-color)'
                    )
                ); ?>;

                <?php if(honrix_get_control_value('honrix_sticky_header_shadow_display', 'yes')=='yes'): ?>
                    box-shadow: 0 0 10px -5px <?php echo esc_attr(
                        honrix_get_control_value(
                            'honrix_sticky_header_shadow_color',
                            '#333333'
                        )
                    ); ?>;
                <?php endif; ?>
            }

            @media (max-width: 767px){
                .honrix-header {
                    background: <?php echo esc_attr(
                        honrix_get_control_value(
                            'honrix_header_mobile_bg_color',
                            'var(--honrix-background-color)'
                        )
                    ); ?> !important;
                }
            }
        </style>
<?php
    }

    add_action('wp_head', 'honrix_header_customizer_css');
}
