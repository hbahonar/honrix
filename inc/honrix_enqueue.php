<?php

/**
 * Enqueue scripts and styles.
 */
if (!function_exists('honrix_enqueue_scripts')) {
    function honrix_enqueue_scripts()
    {
        /* css styles */
        // wp_enqueue_style('swiper', esc_url(get_template_directory_uri() . '/assets/css/swiper-bundle.min.css'), defined('ELEMENTOR_PLUGIN_BASE') ? array('elementor-frontend') : array(), null);
        // wp_enqueue_style('magnific-popup', esc_url(get_template_directory_uri() . '/assets/css/magnific-popup.css'), array(), '1');
        wp_enqueue_style('honrix-style', get_stylesheet_uri());

        /* fontawesome */
        wp_enqueue_style('discord', esc_url(get_template_directory_uri() . '/inc/framework/font-awesome/css/all.css'), array(), '1');

        wp_enqueue_style('honrix-content-theme', esc_url(get_template_directory_uri() . '/assets/css/theme.css'), array('honrix-style'), null);

        /* javascript */
        // wp_enqueue_script('jquery-masonry');
        // wp_enqueue_script('honrix-plugins', esc_url(get_template_directory_uri() . '/assets/js/plugins.js'), array('jquery'), '1.0.0', true);

        wp_enqueue_script('honrix-main-script', esc_url(get_template_directory_uri() . '/assets/js/custom.js'), defined('ELEMENTOR_PLUGIN_BASE') ? array('jquery', 'elementor-frontend') : array('jquery'), '1.0.0', true);
        // wp_enqueue_script('swiper-script', esc_url(get_template_directory_uri() . '/assets/js/swiper-bundle.min.js'), array('honrix-main-script'), '1.0.0', true);
        // wp_enqueue_script('honrix-slider', esc_url(get_template_directory_uri() . '/assets/js/slider.js'), array('swiper-script'), '1.0.0', true);

        // $body_font = honrix_get_control_value('honrix_body_font', 'https://fonts.googleapis.com/css2?family=DM+Sans&display=swap');
        // $body_font = !empty($body_font) ? $body_font : '';
        // wp_enqueue_style('custom-body-font', esc_url($body_font), false);

        // $body_title_font = honrix_get_control_value('honrix_custom_body_title_font', '');
        // $body_title_font = !empty($body_title_font) ? $body_title_font : 'https://fonts.googleapis.com/css2?family=Oswald&display=swap';
        // // wp_enqueue_style('custom-body-title-font', esc_url($body_title_font), false);

        // $title_font = honrix_get_control_value('honrix_custom_title_font', '');
        // $title_font = !empty($title_font) ? $title_font : 'https://fonts.googleapis.com/css2?family=Oswald&display=swap';
        // // wp_enqueue_style('custom-title-font', esc_url($title_font), false);

        // $site_name_font = honrix_get_control_value('honrix_custom_site_name_font', '');
        // $site_name_font = !empty($site_name_font) ? $site_name_font : 'https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap';
        // // wp_enqueue_style('custom-site-name-font', esc_url($site_name_font), false);

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

    add_action('wp_enqueue_scripts', 'honrix_enqueue_scripts');
}

function honrix_admin_style()
{
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_script('underscore');
    wp_enqueue_style('discord-admin', esc_url(get_template_directory_uri() . '/inc/framework/font-awesome/css/all.css'), array(), '1');
    wp_enqueue_style('honrix-admin-css', esc_url(get_template_directory_uri() . '/assets/css/admin.css'), array(), '1');
    wp_enqueue_script('honrix-admin-script', esc_url(get_template_directory_uri() . '/assets/js/admin.js'), array('jquery'), '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'honrix_admin_style');

function honrix_customizer_control_toggle()
{
    wp_enqueue_script('honrix-customize-controls-toggle', get_template_directory_uri() . '/inc/customize/assets/customize-controls-toggle.js', array('jquery', 'customize-preview'), '1.30', true);
    wp_enqueue_script('honrix-customize-add-font', get_template_directory_uri() . '/inc/customize/assets/custom.js', array('jquery', 'customize-preview'), '1.30', true);
}
add_action('customize_controls_enqueue_scripts', 'honrix_customizer_control_toggle');
