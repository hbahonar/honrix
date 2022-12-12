<?php

if (!function_exists('honrix_header_customizer_register')) {
    function honrix_header_customizer_register($wp_customize)
    {
        get_template_part('/inc/customize/class/Customizer');
        $customizer = new Honrix_Customizer_Control($wp_customize, 'honrix_header', __('Header', 'honrix'), 'honrix_general_settings_pannel');

        $customizer->start_section(array(
            'id' => 'honrix_header_layout',
            'label' => __('Layout', 'honrix'),
        ));
        $customizer->create_control(array(
            'id' => 'honrix_header_boxed',
            'default' => 'boxed',
            'label' => __('Mode', 'honrix'),
            'description' => __('This is an option you can choose to display your website header content in full width mode or boxed mode.', 'honrix'),
            'options' => array(
                'boxed' => __('Boxed', 'honrix'),
                'wide' => __('Wide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->create_control(array(
            'id' => 'honrix_header_sticky',
            'default' => 'yes',
            'label' => __('Sticky', 'honrix'),
            'description' => __('Do you want stick header on top of the page?', 'honrix'),
            'options' => array(
                'yes' => __('Yes', 'honrix'),
                'no' => __('No', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->create_control(array(
            'id' => 'honrix_header_theme',
            'default' => '1',
            'label' => __('Theme', 'honrix'),
            'description' => __('Choose header theme.', 'honrix'),
            'options' => array(
                '1' => __('Theme One', 'honrix'),
                '2' => __('Theme Two', 'honrix'),
                '3' => __('Theme Three', 'honrix')
            )
        ), Honrix_Customizer_Control::$SELECT);

        $customizer->end_section('honrix_header_layout');

        $customizer->start_section(array(
            'id' => 'honrix_header_colors',
            'label' => __('Layout', 'honrix'),
        ));

        $customizer->create_control(array(
            'id' => 'honrix_header_bg_color',
            'default' => '#' . esc_attr(get_background_color()),
            'label' => __('Background Color', 'honrix'),
            'description' => __('Change header section background color.', 'honrix')
        ), Honrix_Customizer_Control::$COLOR);

        $customizer->create_control(array(
            'id' => 'honrix_header_text_color',
            'default' => honrix_get_control_value('honrix_text_color', '#666666'),
            'label' => __('Text Color', 'honrix'),
            'description' => __('Change header section text color.', 'honrix')
        ), Honrix_Customizer_Control::$COLOR);

        $customizer->create_control(array(
            'id' => 'honrix_header_link_color',
            'default' => honrix_get_control_value('honrix_theme_color', '#333333'),
            'label' => __('Link Color', 'honrix'),
            'description' => __('Change header section links color.', 'honrix')
        ), Honrix_Customizer_Control::$COLOR);

        $customizer->create_control(array(
            'id' => 'honrix_header_link_hover_color',
            'default' => honrix_get_control_value('honrix_text_color', '#666666'),
            'label' => __('Hover Link Color', 'honrix'),
            'description' => __('Change header section links color in mouse hover.', 'honrix')
        ), Honrix_Customizer_Control::$COLOR);

        $customizer->create_control(array(
            'id' => 'honrix_header_site_name_color',
            'default' => honrix_get_control_value('honrix_theme_color', '#333333'),
            'label' => __('Website Title Color', 'honrix'),
            'description' => __('Change website name color in header section.', 'honrix')
        ), Honrix_Customizer_Control::$COLOR);

        $customizer->end_section('honrix_header_colors');

        $customizer = new Honrix_Customizer_Control($wp_customize, 'honrix_logo', __('Site Logo & Title', 'honrix'), 'honrix_general_settings_pannel');
        if (has_custom_logo()){
            $customizer->start_section(array(
                'id' => 'honrix_header_logo',
                'label' => __('Website Logo', 'honrix'),
            ));
            $customizer->create_control(array(
                'id' => 'honrix_header_logo_width',
                'default' => '200',
                'label' => __('Width', 'honrix'),
                'description' => __('Change width of the website logo.', 'honrix')
            ), Honrix_Customizer_Control::$NUMBER);
            $customizer->end_section('honrix_header_logo');
        }
        if(true === display_header_text()){
            $customizer->start_section(array(
                'id' => 'honrix_header_description',
                'label' => __('Site Title Description', 'honrix'),
            ));
            $customizer->create_control(array(
                'id' => 'honrix_header_description_display',
                'default' => 'yes',
                'label' => __('Display', 'honrix'),
                'options' => array(
                    'yes' => __('Yes', 'honrix'),
                    'no' => __('No', 'honrix')
                )
            ), Honrix_Customizer_Control::$SWITCH);
            $customizer->end_section('honrix_header_description');
        }
    }
    add_action('customize_register', 'honrix_header_customizer_register');
}

if (!function_exists('honrix_header_customizer_css')) {
    function honrix_header_customizer_css()
    {
?>
        <style type="text/css">
            .honrix-header,
            .honrix-search-box,
            .honrix-mini-cart-details,
            .honrix-inner-header .honrix-cart .count,
            .honrix-inner-header .honrix-main-menu .dropdown-menu {
                background: <?php echo esc_attr(honrix_get_control_value('honrix_header_bg_color', 'var(--honrix-background-color)')); ?> !important;
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_text_color', 'var(--honrix-text-color)')); ?> !important;
            }

            <?php if (honrix_get_control_value('honrix_header_theme', '1') == '3') : ?>
                .home .honrix-header:not(.honrix-sticky-header),
                .home .honrix-header:not(.honrix-sticky-header) .honrix-inner-header .honrix-main-menu .dropdown-menu,
                .home .honrix-header:not(.honrix-sticky-header) .honrix-inner-header .honrix-cart .count{
                    background: <?php echo esc_attr(honrix_get_control_value('honrix_header_bg_color', '#'. esc_attr(get_background_color()))); ?>bb !important;
                }
            <?php endif; ?>
                
            .honrix-header,
            .honrix-mini-cart-details,
            .honrix-inner-header .honrix-main-menu .dropdown-menu {
                box-shadow: <?php echo esc_attr(honrix_get_control_value('honrix_header_link_color', 'var(--honrix-title-color)')); ?> 0 0 10px -2px;
            }

            .honrix-inner-header .honrix-logo img{
                width: <?php echo esc_attr(honrix_get_control_value('honrix_header_logo_width', '200')); ?>px;
            }

            .honrix-inner-header .honrix-logo .site-title,
            .honrix-inner-header .honrix-logo .site-title a {
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_site_name_color', 'var(--honrix-theme-color)')); ?> !important;
            }

            .honrix-inner-header .honrix-logo .site-title a:hover {
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_link_hover_color', 'var(--honrix-text-color)')); ?> !important;
            }

            .honrix-inner-header .honrix-logo .site-description span::before,
            .honrix-inner-header .honrix-logo .site-description span::after {
                background: <?php echo esc_attr(honrix_get_control_value('honrix_header_site_name_color', 'var(--honrix-theme-color)')); ?> !important;
            }

            .honrix-inner-header a,
            .honrix-inner-header a:active,
            .honrix-inner-header a:focus,
            .honrix-mini-cart-details a,
            .honrix-inner-header .honrix-search-button,
            .honrix-inner-header .honrix-cart .honrix-cart-icon,
            .honrix-search-box .search-close,
            .search-form .search-submit,
            .honrix-inner-header .honrix-cart .count,
            .woocommerce-mini-cart__total .woocommerce-Price-amount bdi {
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_link_color', 'var(--honrix-title-color)')); ?> !important;
            }

            .honrix-inner-header a:hover,
            .honrix-mini-cart-details a:hover,
            .honrix-inner-header .honrix-search-button:hover,
            .honrix-inner-header .honrix-cart .honrix-cart-icon:hover,
            .honrix-search-box .search-close:hover,
            .search-form .search-submit:hover,
            .honrix-inner-header .honrix-cart .honrix-cart-icon:hover .count,
            .honrix-inner-header .honrix-main-menu .navbar-nav>li.active>a,
            .honrix-inner-header .honrix-main-menu .mobile-btn:hover,
            .honrix-inner-header .honrix-main-menu .close:hover,
            .honrix-mini-cart-details .close:hover {
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_link_hover_color', 'var(--honrix-text-color)')); ?> !important;
            }

            .search-form .search-field,
            .search-form .search-submit,
            .honrix-search-box .search-close,
            .honrix-inner-header .honrix-cart .count,
            .honrix-inner-header .honrix-main-menu .mobile-btn:hover,
            .honrix-inner-header .honrix-main-menu .close:hover,
            .honrix-mini-cart-details .close:hover,
            .woocommerce-mini-cart__total {
                border-color: <?php echo esc_attr(honrix_get_control_value('honrix_header_link_hover_color', 'var(--honrix-theme-color)')); ?> !important;
            }

            .search-form .search-field {
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_text_color', 'var(--honrix-text-color)')); ?> !important;
            }

            .honrix-inner-header .honrix-main-menu .navbar-nav .active .active a,
            .honrix-inner-header .honrix-main-menu .dropdown-menu li a:hover,
            .honrix-inner-header .honrix-main-menu .dropdown-menu li a:active,
            .honrix-inner-header .honrix-main-menu .dropdown-menu li a:focus {
                background: <?php echo esc_attr(honrix_get_control_value('honrix_header_link_hover_color', 'var(--honrix-text-color)')); ?> !important;
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_bg_color', 'var(--honrix-background-color)')); ?> !important;
            }

            .honrix-inner-header .honrix-main-menu .mobile-btn,
            .honrix-inner-header .honrix-main-menu .close,
            .honrix-mini-cart-details .close {
                border-color: <?php echo esc_attr(honrix_get_control_value('honrix_header_link_color', 'var(--honrix-title-color)')); ?> !important;
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_link_color', 'var(--honrix-title-color)')); ?> !important;
            }

            .woocommerce-mini-cart__buttons a {
                background: <?php echo esc_attr(honrix_get_control_value('honrix_header_bg_color', 'var(--honrix-background-color)')); ?> !important;
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_link_color', 'var(--honrix-title-color)')); ?>  !important;
                border-color: <?php echo esc_attr(honrix_get_control_value('honrix_header_link_color', 'var(--honrix-title-color)')); ?> !important;
            }

            .woocommerce-mini-cart__buttons a:hover {
                background: <?php echo esc_attr(honrix_get_control_value('honrix_header_link_color', 'var(--honrix-title-color)')); ?> !important;
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_bg_color', 'var(--honrix-background-color)')); ?> !important;
                border-color: <?php echo esc_attr(honrix_get_control_value('honrix_header_link_color', 'var(--honrix-title-color)')); ?> !important;
            }

            .woocommerce a.remove:hover{
                color: <?php echo esc_attr(honrix_get_control_value('honrix_header_text_color', 'var(--honrix-text-color)')); ?> !important;
                background: transparent;
            }

            @media (max-width: 767px) {
                <?php if (honrix_get_control_value('honrix_header_theme', '1') == '3') : ?>
                .home .honrix-header:not(.honrix-sticky-header),
                .home .honrix-header:not(.honrix-sticky-header) .honrix-inner-header .honrix-main-menu .dropdown-menu,
                .home .honrix-header:not(.honrix-sticky-header) .honrix-inner-header .honrix-cart .count{
                    background: <?php echo esc_attr(honrix_get_control_value('honrix_header_bg_color', '#'. esc_attr(get_background_color()))); ?>dd !important;
                }
            <?php endif; ?>
                .honrix-inner-header .honrix-main-menu .navbar-box {
                    background: <?php echo esc_attr(honrix_get_control_value('honrix_header_bg_color', 'var(--honrix-background-color)')); ?> !important;
                }

                .honrix-inner-header .honrix-main-menu li:not(:last-child) {
                    border-color: <?php echo esc_attr(honrix_get_control_value('honrix_header_link_color', 'var(--honrix-text-color)')); ?> !important;
                }
            }
        </style>
<?php
    }

    add_action('wp_head', 'honrix_header_customizer_css');
}
