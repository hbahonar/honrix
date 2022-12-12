<?php 
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if (!function_exists('honrix_init_widget_area')) {
    function honrix_init_widget_area()
    {
        register_sidebar(
            array(
                'name' => __('Home: Before Content', 'honrix'),
                'id' => 'honrix_before_content',
                'description' => __('Add your widgets here.', 'honrix'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            )
        );

        register_sidebar(
            array(
                'name' => __('Home: After Content', 'honrix'),
                'id' => 'honrix_after_content',
                'description' => __('Add your widgets here.', 'honrix'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            )
        );

        register_sidebar(
            array(
                'name' => __('Before Footer', 'honrix'),
                'id' => 'honrix_before_footer',
                'description' => __('Add your widgets here.', 'honrix'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            )
        );

        register_sidebar(
            array(
                'name' => __('Default Left Sidebar', 'honrix'),
                'id' => 'left_sidebar',
                'description' => __('Add your widgets here.', 'honrix'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            )
        );

        register_sidebar(
            array(
                'name' => __('Default Right Sidebar', 'honrix'),
                'id' => 'right_sidebar',
                'description' => __('Add your widgets here.', 'honrix'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            )
        );

        register_sidebar(
            array(
                'name' => __('Post Left Sidebar', 'honrix'),
                'id' => 'post_left_sidebar',
                'description' => __('Add your widgets here.', 'honrix'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            )
        );

        register_sidebar(
            array(
                'name' => __('Post Right Sidebar', 'honrix'),
                'id' => 'post_right_sidebar',
                'description' => __('Add your widgets here.', 'honrix'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            )
        );

        register_sidebar(
            array(
                'name' => __('Page Left Sidebar', 'honrix'),
                'id' => 'page_left_sidebar',
                'description' => __('Add your widgets here.', 'honrix'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            )
        );

        register_sidebar(
            array(
                'name' => __('Page Right Sidebar', 'honrix'),
                'id' => 'page_right_sidebar',
                'description' => __('Add your widgets here.', 'honrix'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            )
        );

        if (class_exists('WooCommerce')) {
            register_sidebar(
                array(
                    'name' => __('Shop Right Sidebar', 'honrix'),
                    'id' => 'shop_right_sidebar',
                    'description' => __('Add your widgets here.', 'honrix'),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<h2 class="widget-title">',
                    'after_title' => '</h2>',
                )
            );

            register_sidebar(
                array(
                    'name' => __('Shop Left Sidebar', 'honrix'),
                    'id' => 'shop_left_sidebar',
                    'description' => __('Add your widgets here.', 'honrix'),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<h2 class="widget-title">',
                    'after_title' => '</h2>',
                )
            );

            register_sidebar(
                array(
                    'name' => __('Product Right Sidebar', 'honrix'),
                    'id' => 'product_right_sidebar',
                    'description' => __('Add your widgets here.', 'honrix'),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<h2 class="widget-title">',
                    'after_title' => '</h2>',
                )
            );

            register_sidebar(
                array(
                    'name' => __('Product Left Sidebar', 'honrix'),
                    'id' => 'product_left_sidebar',
                    'description' => __('Add your widgets here.', 'honrix'),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<h2 class="widget-title">',
                    'after_title' => '</h2>',
                )
            );
        }

        register_sidebar(
            array(
                'name' => __('404 Left Sidebar', 'honrix'),
                'id' => 'p404_left_sidebar',
                'description' => __('Add your widgets here.', 'honrix'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            )
        );

        register_sidebar(
            array(
                'name' => __('404 Right Sidebar', 'honrix'),
                'id' => 'p404_right_sidebar',
                'description' => __('Add your widgets here.', 'honrix'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            )
        );

        for ($counter = 1; $counter <= get_option('honrix_footer_columns', '3'); $counter++) :
            $name = 'Footer Column %s';
            $name = sprintf($name, $counter);
            register_sidebar(
                array(
                    'name' => $name,
                    'id' => 'footer' . $counter,
                    'description' => esc_html__('Add your widgets here.', 'honrix'),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<h2 class="widget-title">',
                    'after_title' => '</h2>',
                )
            );
        endfor;
    }

    add_action('widgets_init', 'honrix_init_widget_area');
}