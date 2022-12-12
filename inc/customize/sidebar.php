<?php
if (!function_exists('honrix_sidebar_customizer_register')) {
    function honrix_sidebar_customizer_register($wp_customize)
    {
        get_template_part('/inc/customize/class/Customizer');
        $customizer = new Honrix_Customizer_Control(
            $wp_customize,
            'honrix_sidebar',
            __('Sidebar', 'honrix'),
            'honrix_general_settings_pannel'
        );

        $customizer->start_section(array(
            'id' => 'honrix_sidebar_layout',
            'label' => __('Layout', 'honrix'),
        ));
        $customizer->create_control(
            [
                'id' => 'honrix_sticky_sidebar',
                'default' => 'yes',
                'label' => __('Sticky Sidebar', 'honrix'),
                'description' => __(
                    'Choose sidebars to be sticky when scrolling.',
                    'honrix'
                ),
                'options' => [
                    'yes' => __('Yes', 'honrix'),
                    'no' => __('No', 'honrix'),
                ],
            ],
            Honrix_Customizer_Control::$SWITCH
        );

        $customizer->end_section('honrix_sidebar_layout');

        $customizer->start_section(array(
            'id' => 'honrix_sidebar_default',
            'label' => __('Default Sidebar', 'honrix'),
        ));
        $customizer->create_control(
            [
                'id' => 'honrix_right_sidebar_display',
                'default' => 'yes',
                'label' => __('Right Sidebar', 'honrix'),
                'description' => __(
                    'Hide or display right sidebar of the blog, archive and search page.',
                    'honrix'
                ),
                'options' => [
                    'yes' => __('Show', 'honrix'),
                    'no' => __('Hide', 'honrix'),
                ],
            ],
            Honrix_Customizer_Control::$SWITCH
        );

        $customizer->create_control(
            [
                'id' => 'honrix_right_sidebar_width',
                'default' => '25',
                'label' => __('Right Sidebar Width (%)', 'honrix'),
                'description' => __(
                    'Change the length of the sidebar.',
                    'honrix'
                ),
            ],
            Honrix_Customizer_Control::$NUMBER
        );

        $customizer->create_control(
            [
                'id' => 'honrix_left_sidebar_display',
                'default' => 'yes',
                'label' => __('Left Sidebar', 'honrix'),
                'description' => __(
                    'Hide or display left sidebar of the blog, archive and search page.',
                    'honrix'
                ),
                'options' => [
                    'yes' => __('Show', 'honrix'),
                    'no' => __('Hide', 'honrix'),
                ],
            ],
            Honrix_Customizer_Control::$SWITCH
        );

        $customizer->create_control(
            [
                'id' => 'honrix_left_sidebar_width',
                'default' => '25',
                'label' => __('Left Sidebar Width (%)', 'honrix'),
                'description' => __(
                    'Change the length of the sidebar.',
                    'honrix'
                ),
            ],
            Honrix_Customizer_Control::$NUMBER
        );
        $customizer->end_section('honrix_sidebar_default');

        /****** post */
        $customizer->start_section(array(
            'id' => 'honrix_sidebar_post',
            'label' => __('Post Sidebar', 'honrix'),
        ));
        
        $customizer->create_control(
            [
                'id' => 'honrix_post_right_sidebar_display',
                'default' => 'yes',
                'label' => __('Right Sidebar', 'honrix'),
                'description' => __(
                    'Hide or display right sidebar of the post.',
                    'honrix'
                ),
                'options' => [
                    'yes' => __('Show', 'honrix'),
                    'no' => __('Hide', 'honrix'),
                ],
            ],
            Honrix_Customizer_Control::$SWITCH
        );

        $customizer->create_control(
            [
                'id' => 'honrix_post_right_sidebar_width',
                'default' => '25',
                'label' => __('Right Sidebar Width (%)', 'honrix'),
                'description' => __(
                    'Change the length of the sidebar.',
                    'honrix'
                ),
            ],
            Honrix_Customizer_Control::$NUMBER
        );

        $customizer->create_control(
            [
                'id' => 'honrix_post_left_sidebar_display',
                'default' => 'yes',
                'label' => __('Left Sidebar', 'honrix'),
                'description' => __(
                    'Hide or display left sidebar of the post.',
                    'honrix'
                ),
                'options' => [
                    'yes' => __('Show', 'honrix'),
                    'no' => __('Hide', 'honrix'),
                ],
            ],
            Honrix_Customizer_Control::$SWITCH
        );

        $customizer->create_control(
            [
                'id' => 'honrix_post_left_sidebar_width',
                'default' => '25',
                'label' => __('Left Sidebar Width (%)', 'honrix'),
                'description' => __(
                    'Change the length of the sidebar.',
                    'honrix'
                ),
            ],
            Honrix_Customizer_Control::$NUMBER
        );

        $customizer->end_section('honrix_sidebar_post');

        /****** page */
        $customizer->start_section(array(
            'id' => 'honrix_sidebar_page',
            'label' => __('Page Sidebar', 'honrix'),
        ));
        $customizer->create_control(
            [
                'id' => 'honrix_page_right_sidebar_display',
                'default' => 'yes',
                'label' => __('Right Sidebar', 'honrix'),
                'description' => __(
                    'Hide or display right sidebar of the page.',
                    'honrix'
                ),
                'options' => [
                    'yes' => __('Show', 'honrix'),
                    'no' => __('Hide', 'honrix'),
                ],
            ],
            Honrix_Customizer_Control::$SWITCH
        );

        $customizer->create_control(
            [
                'id' => 'honrix_page_right_sidebar_width',
                'default' => '25',
                'label' => __('Right Sidebar Width (%)', 'honrix'),
                'description' => __(
                    'Change the length of the sidebar.',
                    'honrix'
                ),
            ],
            Honrix_Customizer_Control::$NUMBER
        );

        $customizer->create_control(
            [
                'id' => 'honrix_page_left_sidebar_display',
                'default' => 'yes',
                'label' => __('Left Sidebar', 'honrix'),
                'description' => __(
                    'Hide or display left sidebar of the page.',
                    'honrix'
                ),
                'options' => [
                    'yes' => __('Show', 'honrix'),
                    'no' => __('Hide', 'honrix'),
                ],
            ],
            Honrix_Customizer_Control::$SWITCH
        );

        $customizer->create_control(
            [
                'id' => 'honrix_page_left_sidebar_width',
                'default' => '25',
                'label' => __('Left Sidebar Width (%)', 'honrix'),
                'description' => __(
                    'Change the length of the sidebar.',
                    'honrix'
                ),
            ],
            Honrix_Customizer_Control::$NUMBER
        );
        $customizer->end_section('honrix_sidebar_page');

        /******* shop */
        if (class_exists('WooCommerce')) {
            $customizer->start_section(array(
                'id' => 'honrix_sidebar_shop',
                'label' => __('Shop Sidebar', 'honrix'),
            ));
            $customizer->create_control(
                [
                    'id' => 'honrix_shop_right_sidebar_display',
                    'default' => 'yes',
                    'label' => __('Right Sidebar', 'honrix'),
                    'description' => __(
                        'Hide or display right sidebar of the shop page.',
                        'honrix'
                    ),
                    'options' => [
                        'yes' => __('Show', 'honrix'),
                        'no' => __('Hide', 'honrix'),
                    ],
                ],
                Honrix_Customizer_Control::$SWITCH
            );

            $customizer->create_control(
                [
                    'id' => 'honrix_shop_right_sidebar_width',
                    'default' => '25',
                    'label' => __('Right Sidebar Width (%)', 'honrix'),
                    'description' => __(
                        'Change the length of the sidebar.',
                        'honrix'
                    ),
                ],
                Honrix_Customizer_Control::$NUMBER
            );

            $customizer->create_control(
                [
                    'id' => 'honrix_shop_left_sidebar_display',
                    'default' => 'yes',
                    'label' => __('Left Sidebar', 'honrix'),
                    'description' => __(
                        'Hide or display left sidebar of the shop page.',
                        'honrix'
                    ),
                    'options' => [
                        'yes' => __('Show', 'honrix'),
                        'no' => __('Hide', 'honrix'),
                    ],
                ],
                Honrix_Customizer_Control::$SWITCH
            );

            $customizer->create_control(
                [
                    'id' => 'honrix_shop_left_sidebar_width',
                    'default' => '25',
                    'label' => __('Left Sidebar Width (%)', 'honrix'),
                    'description' => __(
                        'Change the length of the sidebar.',
                        'honrix'
                    ),
                ],
                Honrix_Customizer_Control::$NUMBER
            );
            $customizer->end_section('honrix_sidebar_shop');

            /* product */
            $customizer->start_section(array(
                'id' => 'honrix_sidebar_product',
                'label' => __('Product Sidebar', 'honrix'),
            ));
            $customizer->create_control(
                [
                    'id' => 'honrix_product_right_sidebar_display',
                    'default' => 'yes',
                    'label' => __('Right Sidebar', 'honrix'),
                    'description' => __(
                        'Hide or display right sidebar of the shop page.',
                        'honrix'
                    ),
                    'options' => [
                        'yes' => __('Show', 'honrix'),
                        'no' => __('Hide', 'honrix'),
                    ],
                ],
                Honrix_Customizer_Control::$SWITCH
            );

            $customizer->create_control(
                [
                    'id' => 'honrix_product_right_sidebar_width',
                    'default' => '25',
                    'label' => __('Right Sidebar Width (%)', 'honrix'),
                    'description' => __(
                        'Change the length of the sidebar.',
                        'honrix'
                    ),
                ],
                Honrix_Customizer_Control::$NUMBER
            );

            $customizer->create_control(
                [
                    'id' => 'honrix_product_left_sidebar_display',
                    'default' => 'yes',
                    'label' => __('Left Sidebar', 'honrix'),
                    'description' => __(
                        'Hide or display left sidebar of the shop page.',
                        'honrix'
                    ),
                    'options' => [
                        'yes' => __('Show', 'honrix'),
                        'no' => __('Hide', 'honrix'),
                    ],
                ],
                Honrix_Customizer_Control::$SWITCH
            );

            $customizer->create_control(
                [
                    'id' => 'honrix_product_left_sidebar_width',
                    'default' => '25',
                    'label' => __('Left Sidebar Width (%)', 'honrix'),
                    'description' => __(
                        'Change the length of the sidebar.',
                        'honrix'
                    ),
                ],
                Honrix_Customizer_Control::$NUMBER
            );
            $customizer->end_section('honrix_sidebar_product');
        }

        /****** 404 */
        $customizer->start_section(array(
            'id' => 'honrix_sidebar_404',
            'label' => __('404 Page Sidebar', 'honrix'),
        ));
        $customizer->create_control(
            [
                'id' => 'honrix_404_right_sidebar_display',
                'default' => 'yes',
                'label' => __('Right Sidebar', 'honrix'),
                'description' => __(
                    'Hide or display right sidebar of the 404 error page.',
                    'honrix'
                ),
                'options' => [
                    'yes' => __('Show', 'honrix'),
                    'no' => __('Hide', 'honrix'),
                ],
            ],
            Honrix_Customizer_Control::$SWITCH
        );

        $customizer->create_control(
            [
                'id' => 'honrix_404_right_sidebar_width',
                'default' => '25',
                'label' => __('Right Sidebar Width (%)', 'honrix'),
                'description' => __(
                    'Change the length of the sidebar.',
                    'honrix'
                ),
            ],
            Honrix_Customizer_Control::$NUMBER
        );

        $customizer->create_control(
            [
                'id' => 'honrix_404_left_sidebar_display',
                'default' => 'yes',
                'label' => __('Left Sidebar', 'honrix'),
                'description' => __(
                    'Hide or display left sidebar of the 404 error page.',
                    'honrix'
                ),
                'options' => [
                    'yes' => __('Show', 'honrix'),
                    'no' => __('Hide', 'honrix'),
                ],
            ],
            Honrix_Customizer_Control::$SWITCH
        );

        $customizer->create_control(
            [
                'id' => 'honrix_404_left_sidebar_width',
                'default' => '25',
                'label' => __('Left Sidebar Width (%)', 'honrix'),
                'description' => __(
                    'Change the length of the sidebar.',
                    'honrix'
                ),
            ],
            Honrix_Customizer_Control::$NUMBER
        );
        $customizer->end_section('honrix_sidebar_404');
    }

    add_action('customize_register', 'honrix_sidebar_customizer_register');
}

if (!function_exists('honrix_sidebar_customizer_css')) {
    function honrix_sidebar_customizer_css()
    {
        $default_right_sidebar_width =
            honrix_get_control_value('honrix_right_sidebar_display', 'yes') ==
                'yes' && is_active_sidebar('right_sidebar')
                ? honrix_get_control_value('honrix_right_sidebar_width', '25')
                : 0;
        $default_left_sidebar_width =
            honrix_get_control_value('honrix_left_sidebar_display', 'yes') ==
                'yes' && is_active_sidebar('left_sidebar')
                ? honrix_get_control_value('honrix_left_sidebar_width', '25')
                : 0;

        $post_right_sidebar_width =
            honrix_get_control_value(
                'honrix_post_right_sidebar_display',
                'yes'
            ) == 'yes' && is_active_sidebar('post_right_sidebar')
                ? honrix_get_control_value(
                    'honrix_post_right_sidebar_width',
                    '25'
                )
                : 0;
        $post_left_sidebar_width =
            honrix_get_control_value(
                'honrix_post_left_sidebar_display',
                'yes'
            ) == 'yes' && is_active_sidebar('post_left_sidebar')
                ? honrix_get_control_value(
                    'honrix_post_left_sidebar_width',
                    '25'
                )
                : 0;

        $page_right_sidebar_width =
            honrix_get_control_value(
                'honrix_page_right_sidebar_display',
                'yes'
            ) == 'yes' && is_active_sidebar('page_right_sidebar')
                ? honrix_get_control_value(
                    'honrix_page_right_sidebar_width',
                    '25'
                )
                : 0;
        $page_left_sidebar_width =
            honrix_get_control_value(
                'honrix_page_left_sidebar_display',
                'yes'
            ) == 'yes' && is_active_sidebar('page_left_sidebar')
                ? honrix_get_control_value(
                    'honrix_page_left_sidebar_width',
                    '25'
                )
                : 0;

        $p404_right_sidebar_width =
            honrix_get_control_value(
                'honrix_404_right_sidebar_display',
                'yes'
            ) == 'yes' && is_active_sidebar('p404_right_sidebar')
                ? honrix_get_control_value(
                    'honrix_404_right_sidebar_width',
                    '25'
                )
                : 0;
        $p404_left_sidebar_width =
            honrix_get_control_value(
                'honrix_404_left_sidebar_display',
                'yes'
            ) == 'yes' && is_active_sidebar('p404_left_sidebar')
                ? honrix_get_control_value(
                    'honrix_404_left_sidebar_width',
                    '25'
                )
                : 0;

        $shop_right_sidebar_width =
            honrix_get_control_value(
                'honrix_shop_right_sidebar_display',
                'yes'
            ) == 'yes' && is_active_sidebar('shop_right_sidebar')
                ? honrix_get_control_value(
                    'honrix_shop_right_sidebar_width',
                    '25'
                )
                : 0;
        $shop_left_sidebar_width =
            honrix_get_control_value(
                'honrix_shop_left_sidebar_display',
                'yes'
            ) == 'yes' && is_active_sidebar('shop_left_sidebar')
                ? honrix_get_control_value(
                    'honrix_shop_left_sidebar_width',
                    '25'
                )
                : 0;

        $product_right_sidebar_width =
            honrix_get_control_value(
                'honrix_product_right_sidebar_display',
                'yes'
            ) == 'yes' && is_active_sidebar('product_right_sidebar')
                ? honrix_get_control_value(
                    'honrix_product_right_sidebar_width',
                    '25'
                )
                : 0;
        $product_left_sidebar_width =
            honrix_get_control_value(
                'honrix_product_left_sidebar_display',
                'yes'
            ) == 'yes' && is_active_sidebar('product_left_sidebar')
                ? honrix_get_control_value(
                    'honrix_product_left_sidebar_width',
                    '25'
                )
                : 0;
        ?>
        <style type="text/css">
            <?php if (
                honrix_get_control_value('honrix_sticky_sidebar', 'yes') ==
                'yes'
            ): ?>@media (min-width: 768px) {

.honrix-content .sidebar,
.honrix-entries {
    
    align-self: start;
    position: sticky;
    top: var(--offset);
}
}

<?php endif; ?>
.default-sidebar.sidebar-right,
.search .sidebar-right,
.archive .sidebar-right {
width: <?php echo esc_html($default_right_sidebar_width); ?>%;
}

.default-sidebar.sidebar-left,
.search .sidebar-left,
.archive .sidebar-left {
width: <?php echo esc_html($default_left_sidebar_width); ?>%;
}

.blog .honrix-entries,
.search .honrix-entries,
.archive .honrix-entries,
.honrix-entry.none-content .post {
width: <?php echo esc_html(
    100 - ($default_left_sidebar_width + $default_right_sidebar_width)
); ?>%;
}

<?php if (class_exists('WooCommerce')): ?>
<?php if (is_shop() || is_product_category() || is_product_tag()): ?>
.archive .honrix-entries{
    width: <?php echo esc_html(
        100 - ($shop_left_sidebar_width + $shop_right_sidebar_width)
    ); ?>%;
}
<?php endif; ?>
<?php endif; ?>

.post-sidebar.sidebar-right {
width: <?php echo esc_html($post_right_sidebar_width); ?>%;
}

.post-sidebar.sidebar-left {
width: <?php echo esc_html($post_left_sidebar_width); ?>%;
}

.single .entry-post {
width: <?php echo esc_html(
    100 - ($post_left_sidebar_width + $post_right_sidebar_width)
); ?>%;
}


.page-sidebar.sidebar-right {
width: <?php echo esc_html($page_right_sidebar_width); ?>%;
}

.page-sidebar.sidebar-left {
width: <?php echo esc_html($page_left_sidebar_width); ?>%;
}

.page .entry-page {
width: <?php echo esc_html(
    100 - ($page_left_sidebar_width + $page_right_sidebar_width)
); ?>%;
}

.p404-sidebar.sidebar-right {
width: <?php echo esc_html($p404_right_sidebar_width); ?>%;
}

.p404-sidebar.sidebar-left {
width: <?php echo esc_html($p404_left_sidebar_width); ?>%;
}

.error404 .page {
width: <?php echo esc_html(
    100 - ($p404_left_sidebar_width + $p404_right_sidebar_width)
); ?>%;
}

.shop-sidebar.sidebar-right {
width: <?php echo esc_html($shop_right_sidebar_width); ?>%;
}

.shop-sidebar.sidebar-left {
width: <?php echo esc_html($shop_left_sidebar_width); ?>%;
}

.woocommerce.woocommerce-shop .honrix-entries {
width: <?php echo esc_html(
    100 - ($shop_left_sidebar_width + $shop_right_sidebar_width)
); ?>%;
}

.product-sidebar.sidebar-right {
width: <?php echo esc_html($product_right_sidebar_width); ?>%;
}

.product-sidebar.sidebar-left {
width: <?php echo esc_html($product_left_sidebar_width); ?>%;
}

.woocommerce.single-product .honrix-entries {
width: <?php echo esc_html(
    100 - ($product_left_sidebar_width + $product_right_sidebar_width)
); ?>%;
}

@media (max-width: 767px) {

.honrix-entries,
.honrix-entry .post,
.honrix-entry .page,
.honrixducts,
.sidebar-right,
.sidebar-left {
    width: 100% !important;
}
}
        </style>
<?php
    }
    add_action('wp_head', 'honrix_sidebar_customizer_css');
}
