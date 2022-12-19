<?php
if (!function_exists('honrix_general_customizer_register')) {
    function honrix_general_customizer_register($wp_customize)
    {
        get_template_part('/inc/customize/class/Customizer');
        $customizer = new Honrix_Customizer_Control($wp_customize, 'honrix_general_layout', __('Layout', 'honrix'), 'honrix_general_settings_pannel');
        $customizer->start_section(array(
            'id' => 'honrix_general_layout',
            'label' => __('Layout', 'honrix'),
        ));

        $customizer->create_control(array(
            'id' => 'honrix_boxed',
            'default' => 'boxed',
            'label' => __('Mode', 'honrix'),
            'description' => __('This is an option you can choose to display your website content in full width mode or boxed mode.', 'honrix'),
            'options' => array(
                'boxed' => __('Boxed', 'honrix'),
                'wide' => __('Wide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->end_section('honrix_general_layout');

        $customizer->start_section(array(
            'id' => 'honrix_general_skip_link',
            'label' => __('Skip Link', 'honrix'),
        ));

        $customizer->create_control(array(
            'id' => 'honrix_general_skip_link_text',
            'default' => 'go to content',
            'label' => __('Text', 'honrix'),
            'description' => __('Type words to display in the skip link button.', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->end_section('honrix_general_skip_link');

        // $customizer->create_control(array(
        //     'id' => 'honrix_general_bootstrap',
        //     'default' => 'no',
        //     'label' => __('Use Bootstrap', 'honrix'),
        //     'description' => __('Check if you want to use Bootstrap', 'honrix'),
        //     'options' => array(
        //         'yes' => __('Yes', 'honrix'),
        //         'no' => __('No', 'honrix')
        //     )
        // ), Honrix_Customizer_Control::$SWITCH);

        $customizer->start_section(array(
            'id' => 'honrix_general_to_top',
            'label' => __('Back To Top Button', 'honrix'),
        ));

        $customizer->create_control(array(
            'id' => 'honrix_general_to_top_display',
            'default' => 'yes',
            'label' => __('Display', 'honrix'),
            'description' => __('Back to top button is a little button in bottom of the website page. If client clicks it, he will go to top of the page smoothly. Choose to display or hide the button in here.', 'honrix'),
            'options' => array(
                'yes' => __('Show', 'honrix'),
                'no' => __('Hide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->create_control(array(
            'id' => 'honrix_general_to_top_align',
            'default' => 'left',
            'label' => __('Align', 'honrix'),
            'description' => __('Back to top button place in the website.', 'honrix'),
            'options' => array(
                'left' => '<i class="fas fa-align-left"></i>',
                'center' => '<i class="fas fa-align-center"></i>',
                'right' => '<i class="fas fa-align-right"></i>',
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->create_control(array(
            'id' => 'honrix_general_to_top_text',
            'default' => 'fas fa-chevron-up',
            'label' => __('Icon class', 'honrix'),
            'description' => __('Type class to display in the back to top button.', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->end_section('honrix_general_to_top');

        if (function_exists('yoast_breadcrumb')) {
            $customizer->start_section(array(
                'id' => 'honrix_general_breadcrumb',
                'label' => __('Back To Top Button', 'honrix'),
            ));

            $customizer->create_control(array(
                'id' => 'honrix_display_breadcrumb',
                'default' => 'no',
                'label' => __('Display Breadcrumb', 'honrix'),
                'description' => __('Display breadcrumb in pages.', 'honrix'),
                'options' => array(
                    'yes' => __('Show', 'honrix'),
                    'no' => __('Hide', 'honrix')
                )
            ), Honrix_Customizer_Control::$SWITCH);

            $customizer->create_control(array(
                'id' => 'honrix_breadcrumb_bg_image',
                'label' => __('Breadcrumb Background Image', 'honrix'),
                'description' => __('Breadcrumb Background Image.', 'honrix')
            ), Honrix_Customizer_Control::$IMAGE);

            $customizer->end_section('honrix_general_breadcrumb');
        }

        $wp_customize->add_setting(
            'honrix_theme_color',
            array('default' => '#faab78', 'sanitize_callback' => 'sanitize_hex_color')
        );

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'honrix_theme_color', array(
            'label' => __('Theme Color', 'honrix'),
            'description' => __('Change Theme color to customize your website as you wanted.', 'honrix'),
            'section' => 'colors',
            'settings' => 'honrix_theme_color',
        )));

        $wp_customize->add_setting(
            'honrix_theme_second_color',
            array('default' => '#f64c67', 'sanitize_callback' => 'sanitize_hex_color')
        );

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'honrix_theme_second_color', array(
            'label' => __('Theme Second Color', 'honrix'),
            'description' => __('Change Theme Second color to customize your website as you wanted.', 'honrix'),
            'section' => 'colors',
            'settings' => 'honrix_theme_second_color',
        )));

        $wp_customize->add_setting(
            'honrix_title_color',
            array('default' => '#333333', 'sanitize_callback' => 'sanitize_hex_color')
        );

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'honrix_title_color', array(
            'label' => __('Title Color', 'honrix'),
            'description'    => __('Change title color', 'honrix'),
            'section' => 'colors',
            'settings' => 'honrix_title_color',
        )));

        $wp_customize->add_setting(
            'honrix_text_color',
            array('default' => '#666666', 'sanitize_callback' => 'sanitize_hex_color')
        );

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'honrix_text_color', array(
            'label' => __('Text Color', 'honrix'),
            'description'    => __('Change text (posts and pages content) color', 'honrix'),
            'section' => 'colors',
            'settings' => 'honrix_text_color',
        )));
    }

    add_action('customize_register', 'honrix_general_customizer_register');
}

if (!function_exists('honrix_customizer_css')) {
    function honrix_customizer_css()
    {
?>
        <style type="text/css">
            :root {
                --honrix-theme-color: <?php echo esc_attr(honrix_get_control_value('honrix_theme_color', '#faab78')); ?>;
                --honrix-title-color: <?php echo esc_attr(honrix_get_control_value('honrix_title_color', '#333333')); ?>;
                --honrix-text-color: <?php echo esc_attr(honrix_get_control_value('honrix_text_color', '#666666')); ?>;
                --honrix-background-color: #<?php echo esc_attr(get_background_color()); ?>;
            }

            .honrix-to-top-button{
                <?php switch(esc_attr(honrix_get_control_value('honrix_general_to_top_align', 'left'))){
                    case 'left':
                        echo 'left: 0;';
                        break;
                    case 'center':
                        echo 'left: calc(50% - 17px);';
                        break;
                    case 'center':
                        echo 'left: calc(100% - 65px);';
                        break;
                }?>
            }

            
            
            .honrix-inner-header .honrix-search-button:hover,
            .honrix-mini-cart-details .mini-cart-header,
            .honrix-mini-cart-details .product-name a:hover,
            .honrix-breadcrumbs,
            .honrix-breadcrumbs a:hover,
            .honrix-breadcrumbs-post,
            .honrix-breadcrumbs-post a:hover,
            .honrix-entries .posts article .entry-title a:hover,
            .honrix-entries .posts article .entry-categories a,
            article .author-name a:hover,
            .honrix-entry article .entry-categories a,
            .honrix-entry article .entry-tags a:hover,
            .honrix-entry article .entry-navigation a:hover h3,
            .honrix-entry article .entry-navigation .prev-post-title,
            .honrix-entry article .entry-navigation .next-post-title,
            .honrix-entry article .related-post .related-post-title a:hover,
            .honrix-entry article .entry-comment .comment-respond a:hover,
            .honrix-entry article .entry-comment .comment-list .comment-body .comment-author .comment-metadata a:hover,
            .woocommerce ul.products li.product .star-rating,
            .woocommerce div.product p.price,
            .woocommerce div.product span.price,
            .woocommerce div.product .product_title .woocommerce-product-rating,
            .woocommerce .star-rating,
            .woocommerce .star-rating::before,
            .woocommerce p.stars a::before,
            .woocommerce-cart .product-name a:hover,
            .woocommerce-info::before,
            .woocommerce .woocommerce-order-details a:hover {
                color: <?php echo esc_attr(honrix_get_control_value('honrix_theme_color', '#16bbe1')); ?> !important;
            }

            .honrix-search-box .search-close .close-line,
            .honrix-mini-cart-details .close .close-line,
            .honrix-entries .pagination .nav-links a,
            article .entry-content .page-links .post-page-numbers>span,
            article .entry-comment .page-numbers,
            .woocommerce nav.woocommerce-pagination ul li a,
            .quantity-button:hover,
            .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
            .woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
                background: <?php echo esc_attr(honrix_get_control_value('honrix_theme_color', '#16bbe1')); ?>;
            }

            .woocommerce-mini-cart__buttons a,
            .honrix-entry article .entry-comment .comment-respond .comment-form input:not(.submit),
            .honrix-entry article .entry-comment .comment-respond .comment-form textarea,
            .woocommerce #review_form #respond textarea,
            .woocommerce-info {
                border-color: <?php echo esc_attr(honrix_get_control_value('honrix_theme_color', '#16bbe1')); ?> !important;
            }

            .woocommerce div.product .woocommerce-tabs .panel,
            .woocommerce div.product .woocommerce-tabs ul.tabs li::after,
            .woocommerce div.product .woocommerce-tabs ul.tabs li::before,
            .woocommerce div.product .woocommerce-tabs ul.tabs li,
            .woocommerce #reviews #comments ol.commentlist .comment_container,
            .select2-container--default .select2-selection--single .select2-selection__rendered,
            .woocommerce form .form-row input.input-text,
            .woocommerce form .form-row textarea {
                border-color: <?php echo esc_attr(honrix_get_control_value('honrix_theme_color', '#16bbe1')); ?>66;
            }

            .honrix-mini-cart-details .mini-cart-header .mini-cart-count,
            .honrix-mini-cart-details .remove .remove_from_cart_button:hover,
            .woocommerce-mini-cart__total .woocommerce-Price-amount bdi,
            .woocommerce-mini-cart__buttons a,
            .honrix-entries .posts article .entry-read-more a,
            .honrix-entry article .entry-tags span,
            article .author-title::before,
            .honrix-entry article .entry-tags a:not(:nth-child(2))::before,
            .honrix-entry article .entry-comment .comment-list .comment-body .comment-reply-link,
            .woocommerce ul.products li.product .price del,
            .woocommerce div.product .sku_wrapper .sku,
            .woocommerce .widget_price_filter .price_slider_amount span,
            .woocommerce-cart a.remove:hover,
            .woocommerce table.shop_table .order-total bdi {
                color: <?php echo esc_attr(honrix_get_control_value('honrix_theme_second_color', '#f64c67')); ?> !important;
            }

            .honrix-search-box .search-close:hover .close-line,
            .honrix-mini-cart-details .close:hover .close-line,
            .honrix-entries .pagination .nav-links span,
            .honrix-entries .pagination .nav-links a:hover,
            article .entry-content .page-links .post-page-numbers:hover>span,
            article .entry-content .page-links .post-page-numbers.current>span,
            article .entry-comment .page-numbers:hover,
            article .entry-comment .page-numbers.current,
            .woocommerce span.onsale,
            .woocommerce nav.woocommerce-pagination ul li a:focus,
            .woocommerce nav.woocommerce-pagination ul li a:hover,
            .woocommerce nav.woocommerce-pagination ul li span.current,
            .quantity-button,
            .woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content {
                background: <?php echo esc_attr(honrix_get_control_value('honrix_theme_second_color', '#f64c67')); ?>;
            }

            .honrix-hover-background:hover .elementor-icon,
            .honrix-column-hover-background:hover .elementor-icon {
                background-color: <?php echo esc_attr(honrix_get_control_value('honrix_theme_second_color', '#f64c67')); ?> !important;
            }

            .honrix-entries .posts article .entry-content-box,
            .honrix-entry article .entry-navigation,
            .honrix-entry article .related-posts .related-post-meta,
            .honrix-entry article .entry-comment .comment-list .comment-body,
            .quantity-nav {
                border-color: <?php echo esc_attr(honrix_get_control_value('honrix_theme_second_color', '#f64c67')); ?>66 !important;
            }

            
            .honrix-inner-header .honrix-search-button,
            .honrix-search-box .search-field,
            .honrix-mini-cart-details .product-name a,
            .honrix-mini-cart-details .woocommerce-Price-amount bdi,
            .honrix-entries .posts article .entry-title a,
            .honrix-entries .posts article .entry-categories a:hover,
            .honrix-entries .posts article .entry-read-more a:hover,
            .honrix-breadcrumbs-post a,
            article .date-title,
            article .author-title,
            .honrix-entry article .entry-categories a:hover,
            .honrix-entry article .entry-tags a,
            .honrix-entry article .entry-navigation a h3,
            .honrix-entry article .related-post .related-post-title a,
            .honrix-entry article .entry-comment .comment-respond a,
            .honrix-entry article .entry-comment .comment-respond .comment-form input:not(.submit),
            .honrix-entry article .entry-comment .comment-respond .comment-form textarea,
            .honrix-entry article .entry-comment .comment-list .comment-body .comment-reply-link:hover,
            .honrix-entry article .entry-comment .comment-list .comment-body .comment-author .comment-metadata a:not(.comment-reply-link),
            .woocommerce ul.products li.product .price,
            .woocommerce div.product .sku_wrapper,
            .woocommerce div.product .woocommerce-tabs ul.tabs li a,
            .woocommerce div.product .woocommerce-tabs .panel .comment-reply-title,
            .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta,
            .woocommerce-cart a.remove,
            .woocommerce-cart .product-name a,
            .woocommerce-cart .product-price bdi,
            .woocommerce-cart .product-subtotal bdi,
            .woocommerce table.shop_table .product-name,
            .woocommerce table.shop_table .product-total bdi,
            .woocommerce table.shop_table .cart-subtotal bdi,
            .woocommerce .woocommerce-order-details a {
                color: <?php echo esc_attr(honrix_get_control_value('honrix_title_color', '#333333')); ?> !important;
            }

            nav.navbar .btn-toggler-bar .icon-bar {
                background: <?php echo esc_attr(honrix_get_control_value('honrix_title_color', '#333333')); ?>;
            }

            

            .honrix-sticky-header-show,
            .honrix-mini-cart-details,
            .honrix-inner-header .honrix-main-menu .dropdown-menu {
                box-shadow: <?php echo esc_attr(honrix_get_control_value('honrix_title_color', '#333333')); ?> 0 0 10px -2px;
            }


            body,
            .honrix-entries .posts article .entry-date,
            article .author-name a,
            .honrix-entry article .related-post .entry-date {
                color: <?php echo esc_attr(honrix_get_control_value('honrix_text_color', '#666666')); ?>;
            }

            .honrix-inner-header .honrix-cart .cart-icon svg,
            .honrix-inner-header .honrix-cart a,
            .honrix-search-box .search-submit,
            .search-form .search-submit,
            .woocommerce-mini-cart__buttons a:hover,
            .honrix-entries .pagination .nav-links span,
            .honrix-entries .pagination .nav-links a,
            article .entry-content .page-links .post-page-numbers>span,
            article .entry-comment .page-numbers,
            .woocommerce span.onsale,
            .woocommerce nav.woocommerce-pagination ul li a,
            .woocommerce nav.woocommerce-pagination ul li span,
            .quantity-button,
            .woocommerce div.product .woocommerce-tabs ul.tabs li.active,
            .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
            .honrix-hover-background:hover .elementor-icon,
            .honrix-hover-background:hover .elementor-icon-box-title,
            .honrix-hover-background:hover .elementor-icon-box-description,
            .honrix-hover-background:hover .elementor-counter-number,
            .honrix-hover-background:hover .elementor-counter-title,
            .honrix-column-hover-background:hover .elementor-icon,
            .honrix-column-hover-background:hover .elementor-counter-number,
            .honrix-column-hover-background:hover .elementor-counter-title,
            .honrix-button a:hover,
            .woocommerce-mini-cart__buttons a .woocommerce-Price-amount,
            .woocommerce-mini-cart__total,
            .honrix-breadcrumbs a,
            .honrix-entry article .entry-comment .comment-respond .comment-form .submit,
            .woocommerce ul.products li.product .button,
            .woocommerce div.product form.cart .button,
            .woocommerce #review_form #respond .form-submit input,
            .woocommerce .widget_price_filter .price_slider_amount .button,
            .woocommerce .cart .button,
            .woocommerce .cart input.button,
            .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
            .woocommerce #payment #place_order,
            .woocommerce-page #payment #place_order {
                color: #<?php echo esc_attr(get_background_color()); ?> !important;
            }

            .honrix-mini-cart-details,
            .honrix-bar::before,
            .woocommerce-mini-cart__total .woocommerce-Price-amount,
            .woocommerce div.product .woocommerce-tabs ul.tabs li {
                background: #<?php echo esc_attr(get_background_color()); ?> !important;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs li::before {
                box-shadow: 2px 2px 0 #<?php echo esc_attr(get_background_color()); ?>;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs li::after {
                box-shadow: -2px 2px 0 #<?php echo esc_attr(get_background_color()); ?>;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs li.active::before {
                box-shadow: 2px 2px 0 <?php echo esc_attr(honrix_get_control_value('honrix_theme_color', '#16bbe1')); ?>;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs li.active::after {
                box-shadow: -2px 2px 0 <?php echo esc_attr(honrix_get_control_value('honrix_theme_color', '#16bbe1')); ?>;
            }

            .honrix-inner-header .honrix-cart a,
            .honrix-search-box .search-submit,
            .search-form .search-submit,
            .honrix-hover-background::before,
            .honrix-column-hover-background .elementor-column-wrap::before,
            .honrix-button a,
            .honrix-bar,
            .woocommerce-mini-cart__buttons a .woocommerce-Price-amount,
            .woocommerce-mini-cart__total,
            .honrix-entry article .entry-comment .comment-respond .comment-form .submit,
            .woocommerce ul.products li.product .button:hover,
            .woocommerce div.product form.cart .button:hover,
            .woocommerce #review_form #respond .form-submit input,
            .woocommerce .widget_price_filter .price_slider_amount .button,
            .woocommerce .cart .button,
            .woocommerce .cart input.button,
            .woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
            .woocommerce #payment #place_order,
            .woocommerce-page #payment #place_order {
                background: linear-gradient(to right top, <?php echo esc_attr(honrix_get_control_value('honrix_theme_second_color', '#f64c67')); ?>, <?php echo esc_attr(honrix_get_control_value('honrix_theme_color', '#16bbe1')); ?>, <?php echo esc_attr(honrix_get_control_value('honrix_theme_color', '#16bbe1')); ?>) !important;
            }

            .honrix-inner-header .honrix-cart a:hover,
            .honrix-search-box .search-submit:hover,
            .honrix-button a:hover,
            .search-form .search-submit:hover,
            .woocommerce-mini-cart__buttons a:hover,
            .honrix-entry article .entry-comment .comment-respond .comment-form .submit:hover,
            .woocommerce ul.products li.product .button,
            .woocommerce div.product form.cart .button,
            .woocommerce #review_form #respond .form-submit input:hover,
            .woocommerce .widget_price_filter .price_slider_amount .button:hover,
            .woocommerce .cart .button:hover,
            .woocommerce .cart input.button:hover,
            .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
            .woocommerce #payment #place_order:hover,
            .woocommerce-page #payment #place_order:hover {
                background: linear-gradient(to right top, <?php echo esc_attr(honrix_get_control_value('honrix_theme_color', '#16bbe1')); ?>, <?php echo esc_attr(honrix_get_control_value('honrix_theme_color', '#16bbe1')); ?>, <?php echo esc_attr(honrix_get_control_value('honrix_theme_color', '#16bbe1')); ?>) !important;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs li.active {
                background: <?php echo esc_attr(honrix_get_control_value('honrix_theme_color', '#16bbe1')); ?> !important;
            }

            .search-form {
                border-color: <?php echo esc_attr(honrix_get_control_value('honrix_title_color', '#333333')); ?>;
            }

            .honrix-breadcrumbs {
                background-image: url(<?php echo honrix_get_control_value('honrix_breadcrumb_bg_image'); ?>);
            }

            @media (max-width: 767px) {
                .honrix-inner-header .honrix-main-menu .navbar-box {
                    background: #<?php echo esc_attr(get_background_color()); ?>;
                }
            }
        </style>
<?php
    }

    add_action('wp_head', 'honrix_customizer_css');
}
