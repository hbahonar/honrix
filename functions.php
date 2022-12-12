<?php
require_once get_template_directory() . '/inc/honrix_setup.php';
require_once get_template_directory() . '/inc/honrix_enqueue.php';
require_once get_template_directory() . '/inc/honrix_widget_area.php';
require_once get_template_directory() . '/inc/template-functions.php';
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/framework/bootstrap/honrix_bootstrap.php';
require_once get_template_directory() . '/inc/customize/init.php';
if (class_exists('WooCommerce')) {
    // require_once get_template_directory() . '/inc/honrix-woocommerce.php';
}

/**
 * ----------------------------------------------------------------------------------------
 * Breadcrumb Section
 * ----------------------------------------------------------------------------------------
 */

if (!function_exists('honrix_breadcrumb')) {

    function honrix_breadcrumb()
    {

        // Get Option
        $content_options = get_option('honrix_content');

        $breadcrumbs_enabled = false;

        if (function_exists('yoast_breadcrumb')) {
            $breadcrumbs_enabled = WPSEO_Options::get('breadcrumbs-enable', false);
        }


        if ($breadcrumbs_enabled) {
            if (is_singular()) {
                yoast_breadcrumb('<div id="honrix-breadcrumbs" class="honrix-breadcrumbs-post"><div class="post-center-max-width">', '</div></div>');
            } else {
                yoast_breadcrumb('<div id="honrix-breadcrumbs" class="honrix-breadcrumbs"><div class="center-max-width">', '</div></div>');
            }
        } else if ($content_options['breadcrumb']) {

            // Settings
            $separator  = '/';
            $id         = 'honrix-breadcrumbs';
            $class      = 'honrix-breadcrumbs';
            $home_title = esc_html__('Home', 'honrix');
            $parents     = '';

            // Get the query & post information
            global $post, $wp_query;
            $category = get_the_category();

            // Do not display on the homepage
            if (!is_front_page()) {
                // Build the breadcrums

                echo '<div id="' . esc_attr($id) . '" class="' . esc_attr($class) . '">';
                echo '<div class="center-max-width">';
                echo '<ul>';
                // Home page
                echo '<li><a href="' . esc_url(get_home_url('/')) . '" title="' . esc_attr($home_title) . '">' . esc_html($home_title) . '</a></li>';
                echo '<li class="separator"> ' . esc_html($separator) . ' </li>';

                if (is_single() && !is_attachment()) {

                    // Single post (Only display the first category)
                    echo '<li><a  href="' . esc_url(get_category_link($category[0]->term_id)) . '" title="' . esc_attr($category[0]->cat_name) . '">' . esc_html($category[0]->cat_name) . '</a></li>';
                    echo '<li class="separator"> ' . esc_html($separator) . ' </li>';
                    echo '<li><strong title="' . esc_attr(get_the_title()) . '">' . esc_html(get_the_title()) . '</strong></li>';
                } else if (is_category() && $category) {

                    $category_name = get_category(get_query_var('cat'), false)->name;

                    // Category page
                    echo '<li><strong>' . esc_html__('Category Archives:&nbsp;', 'honrix') . esc_html($category_name) . '</strong></li>';
                } else if (is_page() || is_attachment()) {

                    // Standard page
                    if ($post->post_parent) {

                        // If child page, get parents 
                        $anc = get_post_ancestors($post->ID);

                        // Get parents in the right order
                        $anc = array_reverse($anc);

                        // Parent page loop
                        foreach ($anc as $ancestor) {
                            $parents .= '<li><a href="' . esc_url(get_permalink($ancestor)) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                            $parents .= '<li class="separator">' . $separator . '</li>';
                        }

                        // Display parent pages

                        echo '' . esc_html($parents);
                        // Current page
                        echo '<li><strong title="' . esc_attr(get_the_title()) . '">' . esc_html(get_the_title()) . '</strong></li>';
                    } else {

                        // Just display current page if not parents
                        echo '<li><strong> ' . esc_html(get_the_title()) . '</strong></li>';
                    }
                } else if (is_tag()) {

                    // Get tag information
                    $term_id = get_query_var('tag_id');
                    $taxonomy = 'post_tag';
                    $args = 'include=' . $term_id;
                    $terms = get_terms($taxonomy, $args);

                    // Display the tag name
                    echo '<li><strong>' . esc_html__('Tag Archives:&nbsp;', 'honrix') . '&nbsp;' . esc_html($terms[0]->name) . '</strong></li>';
                } elseif (is_day()) {

                    // Day archive

                    // Year link
                    echo '<li><a class="bread-year bread-year-' . esc_attr(get_the_time('Y')) . '" href="' . esc_url(get_year_link(get_the_time('Y'))) . '" title="' . esc_attr(get_the_time('Y')) . '">' . esc_html(get_the_time('Y')) . esc_html__('&nbsp;Year', 'honrix') . '</a></li>';
                    echo '<li>' . esc_html($separator) . '</li>';

                    // Month link
                    echo '<li><a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '" title="' . esc_attr(get_the_time('F')) . '">' . esc_html(get_the_time('F')) . '</a></li>';
                    echo '<li class="separator"> ' . esc_html($separator) . ' </li>';

                    // Day display
                    echo '<li><strong> ' . esc_html(get_the_time('jS')) . esc_html__('&nbsp;Archives:', 'honrix') . '</strong></li>';
                } else if (is_month()) {

                    // Month Archive

                    // Year link
                    echo '<li><a class="bread-year bread-year-' . esc_attr(get_the_time('Y')) . '" href="' . esc_url(get_year_link(get_the_time('Y'))) . '" title="' . esc_attr(get_the_time('Y')) . '">' . esc_html(get_the_time('Y')) . esc_html__('&nbsp;Year', 'honrix') . '</a></li>';
                    echo '<li class="separator"> ' . esc_html($separator) . ' </li>';

                    // Month display
                    echo '<li><strong title="' . esc_attr(get_the_time('F')) . '">' . esc_html(get_the_time('F')) . '</strong></li>';
                } else if (is_year()) {

                    // Display year archive
                    echo '<li><strong title="' . esc_attr(get_the_time('Y')) . '">' . esc_html(get_the_time('Y')) . esc_html__('&nbsp;Year', 'honrix') . '</strong></li>';
                } else if (is_author()) {

                    // Auhor archive

                    // Get the author information
                    global $author;
                    $userdata = get_userdata($author);

                    // Display author name
                    echo '<li><strong title="' . esc_attr($userdata->display_name) . '">' . esc_html__('Author:', 'honrix') . '&nbsp;' . esc_html($userdata->display_name) . '</strong></li>';
                } else if (is_search()) {
                    // Search results page
                    echo '<li><strong title="' . esc_attr(get_search_query()) . '">' . esc_html__('Search results for:', 'honrix') . '&nbsp;' . get_search_query() . '</strong></li>';
                } else if (get_query_var('paged')) {
                    // Paginated archives
                    echo '<li><strong  title="' . esc_attr(get_query_var('paged')) . '">' . esc_html__('Page:', 'honrix') . '&nbsp;' . esc_html(get_query_var('paged')) . '</strong></li>';
                } elseif (is_404()) {
                    // 404 page
                    echo '<li>' . esc_html__('Error 404', 'honrix') . '</li>';
                }
                echo '</ul>';
                echo '</div>';
                echo '</div>';
            }
        }
    }
}

/*
 * Custom Comment Form
 */
if (!function_exists('honrix_custom_comment_list')) {
    function honrix_custom_comment_list($comment, $args, $depth)
    {
?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <div id="div-comment-<?php comment_ID(); ?>" class="comment-body d-flex flex-wrap p-2 mb-3">
                <?php
                if (0 != $args['avatar_size']) :
                    $avatar = get_avatar($comment, $args['avatar_size']);
                    if ($avatar) :
                ?>
                        <div class="avatar-image">
                            <?php echo get_avatar($comment, $args['avatar_size']); ?>
                        </div>
                <?php endif;
                endif; ?>
                <div class="comment-author ps-md-3">
                    <div class="comment-metadata d-flex">
                        <div class="name w-75">
                            <?php echo wp_kses(get_comment_author_link(), array('a' => array('href' => array()))); ?>
                            <span class="comment-date">
                                <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                    <?php
                                    $time_string = '<span class="date"><time class="entry-date published updated" datetime="%1$s">%2$s</time></span>';
                                    $time_string = sprintf(
                                        $time_string,
                                        esc_attr(get_comment_date(DATE_W3C)),
                                        esc_html(get_comment_date("j M, Y"))
                                    );
                                    echo wp_kses_post($time_string); ?>

                                </a>
                                <?php edit_comment_link(esc_html__('(Edit)', 'honrix'), '<span class="edit-link">', '</span>'); ?>
                            </span>
                        </div>
                        <div class="comment-reply w-25 text-end">
                            <?php
                            comment_reply_link(array_merge($args, array(
                                'reply_text' => __('<i class="fas fa-reply"></i>', 'honrix'),
                                'depth'      => $depth,
                                'max_depth'  => $args['max_depth']
                            )));
                            ?>
                        </div>
                    </div>

                    <div class="comment-content entry-content pt-3">
                        <?php comment_text(); ?>
                    </div>
                </div>

            </div>
            <div class="comment-footer">
                <?php if ('0' == $comment->comment_approved) : ?>
                    <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'honrix'); ?></p>
                <?php endif; ?>
            </div>
    <?php
    }
}

if (!function_exists('honrix_move_comment_field_to_bottom')) {
    function honrix_move_comment_field_to_bottom($fields)
    {
        $comment_field = $fields['comment'];
        unset($fields['comment']);
        $fields['comment'] = $comment_field;
        return $fields;
    }

    add_filter('comment_form_fields', 'honrix_move_comment_field_to_bottom');
}

remove_action('set_comment_cookies', 'wp_set_comment_cookies');

add_filter('comment_form_defaults', 'honrix_comment_form_modification');
function honrix_comment_form_modification($defaults)
{
    $defaults['label_submit'] = honrix_get_control_value('honrix_comment_form_submit', __('Send Review', 'honrix'));
    return $defaults;
}

if (!function_exists('honrix_check_post_title')) {
    function honrix_check_post_title($post_title)
    {
        return !empty($post_title) ? $post_title : __('Untitled', 'honrix');
    }
}

if (defined('HONRIX_CORE_URL')) {
    if (!function_exists('honrix_meta_customizer_css')) {
        function honrix_meta_customizer_css()
        {
            $gtm_code = honrix_get_control_value('honrix_meta_gtm_code', '');
            if (!empty($gtm_code)) :
                wp_add_inline_script('honrix-main-script', "
                (function(w, d, s, l, i) {
                    w[l] = w[l] || [];
                    w[l].push({
                        'gtm.start': new Date().getTime(),
                        event: 'gtm.js'
                    });
                    var f = d.getElementsByTagName(s)[0],
                        j = d.createElement(s),
                        dl = l != 'dataLayer' ? '&l=' + l : '';
                    j.async = true;
                    j.src =
                        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                    f.parentNode.insertBefore(j, f);
                })(window, document, 'script', 'dataLayer', '" . esc_js($gtm_code) . "');
                ", 'before');
            endif;

            $ga_code = honrix_get_control_value('honrix_meta_ga_code', '');
            if (!empty($ga_code)) :
                wp_add_inline_script('honrix-main-script', "
                window.ga = window.ga || function() {
                    (ga.q = ga.q || []).push(arguments)
                };
                ga.l = +new Date;
                ga('create', '" . esc_js($ga_code) . "', 'auto');
                ga('send', 'pageview');
                ", 'before');
            endif;
        }

        add_action('wp_head', 'honrix_meta_customizer_css');
    }
}

/******** TGMP */
if (!function_exists('honrix_register_required_plugins')) {
    add_action('tgmpa_register', 'honrix_register_required_plugins');

    function honrix_register_required_plugins()
    {
        $plugins = array(
            array(
                'name'        => __('One Click Demo Import', 'honrix'),
                'slug'        => 'one-click-demo-import',
                'required'  => false,
            ),
            array(
                'name'         => 'Honrix Core',
                'slug'         => 'honrix-core',
                'source'       => 'https://honarsystems.com/plugins/honrix-core.zip',
                'required'     => true,
            ),
            array(
                'name'        => __('Simple Local Avatars', 'honrix'),
                'slug'        => 'simple-local-avatars',
                'required'  => false,
            ),
            array(
                'name'        => __('Post View Counter', 'honrix'),
                'slug'        => 'post-views-counter',
                'required'  => false,
            ),
            array(
                'name'        => __('Contact Form 7', 'honrix'),
                'slug'        => 'contact-form-7',
                'required'  => false,
            ),
            array(
                'name'        => __('MailPoet 3', 'honrix'),
                'slug'        => 'mailpoet',
                'required'  => false,
            ),
            array(
                'name'        => __('WooCommerce', 'honrix'),
                'slug'        => 'woocommerce',
                'required'  => false,
            ),
            array(
                'name'        => __('Yoast SEO', 'honrix'),
                'slug'        => 'wordpress-seo',
                'required'  => false,
            ),
        );

        $config = array(
            'id'           => 'honrix',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins', // Menu slug.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
        );

        tgmpa($plugins, $config);
    }
}

/******* demo importer */
function honrix_import_files()
{
    return [
        [
            'import_file_name'           => __('Honrix', 'honrix'),
            'import_file_url'            => 'https://honarsystems.com/themes/honrix/demo-content/honrix-content.xml',
            'import_widget_file_url'     => 'https://honarsystems.com/themes/honrix/demo-content/honrix-widgets.wie',
            'import_customizer_file_url' => 'https://honarsystems.com/themes/honrix/demo-content/honrix-customizer.dat',
        ],
    ];
}
add_filter('ocdi/import_files', 'honrix_import_files');

function honrix_ocdi_after_import_setup()
{
    // update_option('post_views_counter_settings_display', array(
    //     'label'                    => '',
    //     'post_types_display'    => ['post'],
    //     'page_types_display'    => ['singular'],
    //     'restrict_display'        => [
    //         'groups' => [],
    //         'roles'     => []
    //     ],
    //     'position'                => 'manual',
    //     'display_style'            => [
    //         'icon'     => true,
    //         'text'     => false
    //     ],
    //     'icon_class'            => 'dashicons-visibility',
    //     'toolbar_statistics'    => true
    // ));
}
add_action('ocdi/after_import', 'honrix_ocdi_after_import_setup');

function honrix_create_post_type()
{
    $labels = array(
        'name'               => esc_html__('Honrix Blocks', 'honrix'),
        'singular_name'      => esc_html__('Honrix Block', 'honrix'),
        'menu_name'          => esc_html__('Honrix Blocks', 'honrix'),
        'parent_item_colon'  => esc_html__('Parent Item:', 'honrix'),
        'all_items'          => esc_html__('All Items', 'honrix'),
        'view_item'          => esc_html__('View Item', 'honrix'),
        'add_new_item'       => esc_html__('Add New Item', 'honrix'),
        'add_new'            => esc_html__('Add New', 'honrix'),
        'edit_item'          => esc_html__('Edit Item', 'honrix'),
        'update_item'        => esc_html__('Update Item', 'honrix'),
        'search_items'       => esc_html__('Search Item', 'honrix'),
        'not_found'          => esc_html__('Not found', 'honrix'),
        'not_found_in_trash' => esc_html__('Not found in Trash', 'honrix'),
    );

    $args = array(
        'label'               => esc_html__('honrix_block', 'honrix'),
        'description'         => esc_html__('Honrix Blocks for custom HTML to place in your pages', 'honrix'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor'),
        'hierarchical'        => false,
        'public'              => true,
        'publicly_queryable'  => is_user_logged_in(),
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 29,
        'menu_icon'           => 'dashicons-schedule',
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'rewrite'             => false,
        'capability_type'     => 'page',
    );

    register_post_type('honrix_block', $args);
}
add_action('init', 'honrix_create_post_type');

// Add the custom columns to the book post type:
add_filter('manage_honrix_block_posts_columns', 'set_custom_edit_book_columns');
function set_custom_edit_book_columns($columns)
{
    $columns['shortcode'] = __('Shortcode', 'honrix');
    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action('manage_honrix_block_posts_custom_column', 'honrix_custom_block_column', 10, 2);
function honrix_custom_block_column($column, $post_id)
{
    switch ($column) {
        case 'shortcode':
            echo esc_html('[honrix_block_shortcode id="' . $post_id . '"]');
            break;
    }
}

function honrix_custom_shortcode($atts)
{
    $a = shortcode_atts(array(
        'id' => '',
    ), $atts);

    $args = array('post_type' => 'honrix_block', 'p' => $a['id']);
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) :
            $the_query->the_post();
            the_content();
        endwhile;
    endif;
}
add_shortcode('honrix_block_shortcode', 'honrix_custom_shortcode');
