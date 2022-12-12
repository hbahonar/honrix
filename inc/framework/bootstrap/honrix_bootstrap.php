<?php
if (!function_exists('honrix_bootstrap_setup')) :
    function honrix_bootstrap_setup()
    {
        require_once get_template_directory() . '/inc/framework/bootstrap/class-wp-bootstrap-navwalker.php';
    }
    add_action('after_setup_theme', 'honrix_bootstrap_setup');
endif;

if (!function_exists('honrix_bootstrap_enqueue_scripts')) {
    function honrix_bootstrap_enqueue_scripts()
    {
        wp_enqueue_style('bootstrap', esc_url(get_template_directory_uri() . '/inc/framework/bootstrap/css/bootstrap.min.css'), array(), '1');
        if (is_rtl()) {
            wp_enqueue_style('bootstrap-rtl', esc_url(get_template_directory_uri() . '/inc/framework/bootstrap/css/bootstrap.rtl.min.css'), array(), '1');
        }

        wp_enqueue_script('bootstrap-script', esc_url(get_template_directory_uri() . '/inc/framework/bootstrap/js/bootstrap.bundle.min.js'), array('jquery'), '1.0.0', true);
    }
    add_action('wp_enqueue_scripts', 'honrix_bootstrap_enqueue_scripts');
}

add_filter('nav_menu_link_attributes', 'honrix_bootstrap5_dropdown_fix');
function honrix_bootstrap5_dropdown_fix($atts)
{
    if (array_key_exists('data-toggle', $atts)) {
        unset($atts['data-toggle']);
        $atts['data-bs-toggle'] = 'dropdown';
    }
    return $atts;
}

//delete role=navigation
add_filter('navigation_markup_template', 'honrix_navigation_template');
function honrix_navigation_template($template)
{
    $template = '
    <nav class="navigation %1$s">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">%3$s</div>
    </nav>';

    return $template;
}
