<?php
function honrix_body_classes($classes)
{

    // Helps detect if JS is enabled or not.
    $classes[] = 'no-js';

    // Adds `singular` to singular pages, and `hfeed` to all other pages.
    $classes[] = is_singular() ? 'singular' : 'hfeed';

    return $classes;
}
add_filter('body_class', 'honrix_body_classes');

function honrix_pingback_header()
{
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
    }
}
add_action('wp_head', 'honrix_pingback_header');

/**
 * Remove the `no-js` class from body if JS is supported.
 */
function honrix_supports_js()
{
    echo '<script>document.body.classList.remove("no-js");</script>';
}
add_action('wp_footer', 'honrix_supports_js');

/**
 * Changes comment form default fields.
 */
function honrix_comment_form_defaults($defaults)
{

    // Adjust height of comment form.
    $defaults['comment_field'] = preg_replace('/rows="\d+"/', 'rows="5"', $defaults['comment_field']);

    return $defaults;
}
add_filter('comment_form_defaults', 'honrix_comment_form_defaults');

/**
 * Determines if post thumbnail can be displayed.
 *
 * @since honrix 1.0
 *
 * @return bool
 */
function honrix_can_show_post_thumbnail()
{
    return apply_filters(
        'honrix_can_show_post_thumbnail',
        !post_password_required() && !is_attachment() && has_post_thumbnail()
    );
}

if (!function_exists('honrix_post_title')) {
    /**
     * Add a title to posts and pages that are missing titles.
     */
    function honrix_post_title($title)
    {
        return '' === $title ? esc_html_x('Untitled', 'Added to posts and pages that are missing titles', 'honrix') : $title;
    }
}
add_filter('the_title', 'honrix_post_title');

// /**
//  * Print the first instance of a block in the content, and then break away.
//  */
function honrix_print_first_instance_of_block($block_name, $content = null, $instances = 1)
{
    $instances_count = 0;
    $blocks_content  = '';

    if (!$content) {
        $content = get_the_content();
    }

    // Parse blocks in the content.
    $blocks = parse_blocks($content);

    // Loop blocks.
    foreach ($blocks as $block) {

        // Sanity check.
        if (!isset($block['blockName'])) {
            continue;
        }

        // Check if this the block matches the $block_name.
        $is_matching_block = false;

        // If the block ends with *, try to match the first portion.
        if ('*' === $block_name[-1]) {
            $is_matching_block = 0 === strpos($block['blockName'], rtrim($block_name, '*'));
        } else {
            $is_matching_block = $block_name === $block['blockName'];
        }

        if ($is_matching_block) {
            // Increment count.
            $instances_count++;

            // Add the block HTML.
            $blocks_content .= render_block($block);

            // Break the loop if the $instances count was reached.
            if ($instances_count >= $instances) {
                break;
            }
        }
    }

    if ($blocks_content) {
        /** This filter is documented in wp-includes/post-template.php */
        echo apply_filters('the_content', $blocks_content); // phpcs:ignore WordPress.Security.EscapeOutput
        return true;
    }

    return false;
}

// /**
//  * Retrieve protected post password form content.
//  *
//  * @since honrix 1.0
//  *
//  * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global $post.
//  * @return string HTML content for password form for password protected post.
//  */
function honrix_password_form($post = 0)
{
    $post   = get_post($post);
    $label  = 'pwbox-' . (empty($post->ID) ? wp_rand() : $post->ID);
    $output = '<p class="post-password-message">' . esc_html__('This content is password protected. Please enter a password to view.', 'honrix') . '</p>
	<form action="' . esc_url(home_url('wp-login.php?action=postpass', 'login_post')) . '" class="post-password-form" method="post">
	<label class="post-password-form__label" for="' . esc_attr($label) . '">' . esc_html_x('Password', 'Post password form', 'honrix') . '</label><input class="post-password-form__input" name="post_password" id="' . esc_attr($label) . '" type="password" size="20" /><input type="submit" class="post-password-form__submit" name="' . esc_attr_x('Submit', 'Post password form', 'honrix') . '" value="' . esc_attr_x('Enter', 'Post password form', 'honrix') . '" /></form>
	';
    return $output;
}
add_filter('the_password_form', 'honrix_password_form');

if (!function_exists('honrix_get_option')) :
    function honrix_get_option($id)
    {
        if (!$id) {
            return;
        }
        if (honrix_get_control_value($id) !== null) {
            return honrix_get_control_value($id);
        }
    }
endif;

if (!function_exists('honrix_get_control_value')) {
    function honrix_get_control_value($id, $default = '')
    {
        $value = get_theme_mod($id, $default);
        return empty($value) ? $default : $value;
    }
}

// if (!function_exists('honrix_get_control_value_not_sanitized')) {
//     function honrix_get_control_value_not_sanitized($id, $default = '')
//     {
//         $value = get_theme_mod($id, $default);
//         return empty($value) ? $default : $value;
//     }
// }

if (!function_exists('honrix_set_option')) {
    function honrix_set_option($id, $value = '')
    {
        $value = update_option($id, esc_attr($value));
    }
}

if (!function_exists('honrix_get_option')) {
    function honrix_get_option($id, $default = '')
    {
        $value = get_option($id, $default);
        return esc_attr(empty($value) ? $default : $value);
    }
}

if (!function_exists('honrix_get_video_post')) {
    function honrix_get_video_post()
    {
        if (get_post_format() == 'video') : ?>
            <?php
            $video_link = get_post_meta(get_the_ID(), 'honrix_video_link', true);
            if (empty($video_link)) :
                $content = get_the_content();
                if (has_block('core/video', $content)) :
                    honrix_print_first_instance_of_block('core/video', $content);
                elseif (has_block('core/embed', $content)) :
                    honrix_print_first_instance_of_block('core/embed', $content);
                else :
                    honrix_print_first_instance_of_block('core-embed/*', $content);
                endif;
            else : ?>
                <iframe src="<?php echo esc_url($video_link); ?>"></iframe>
            <?php
            endif; ?>
        <?php
        endif;
    }
}

if (!function_exists('honrix_get_video_post_by_id')) {
    function honrix_get_video_post_by_id($post)
    {
        if (get_post_format($post) == 'video') : ?>
            <?php
            $video_link = get_post_meta($post->ID, 'honrix_video_link', true);
            if (empty($video_link)) :
                $content = get_the_content($post);
                if (has_block('core/video', $content)) :
                    honrix_print_first_instance_of_block('core/video', $content);
                elseif (has_block('core/embed', $content)) :
                    honrix_print_first_instance_of_block('core/embed', $content);
                else :
                    honrix_print_first_instance_of_block('core-embed/*', $content);
                endif;
            else : ?>
                <iframe src="<?php echo esc_url($video_link); ?>"></iframe>
            <?php
            endif; ?>
        <?php
        endif;
    }
}

if (!function_exists('honrix_get_audio_post')) {
    function honrix_get_audio_post()
    {
        if (get_post_format() == 'audio') : ?>
            <?php
            $audio_link = get_post_meta(get_the_ID(), 'honrix_audio_link', true);
            if (empty($audio_link)) :
                $content = get_the_content();
                // the_post_thumbnail();
                if (has_block('core/audio', $content)) :
                    honrix_print_first_instance_of_block('core/audio', $content);
                elseif (has_block('core/embed', $content)) :
                    honrix_print_first_instance_of_block('core/embed', $content);
                else :
                    honrix_print_first_instance_of_block('core-embed/*', $content);
                endif;
            else : ?>
                <iframe src="<?php echo esc_url($audio_link); ?>"></iframe>
            <?php
            endif; ?>
        <?php
        endif;
    }
}

if (!function_exists('honrix_get_audio_post_by_id')) {
    function honrix_get_audio_post_by_id($post)
    {
        if (get_post_format($post) == 'audio') : ?>
            <?php
            $audio_link = get_post_meta($post->ID, 'honrix_audio_link', true);
            if (empty($audio_link)) :
                $content = get_the_content($post);
                // the_post_thumbnail();
                if (has_block('core/audio', $content)) :
                    honrix_print_first_instance_of_block('core/audio', $content);
                elseif (has_block('core/embed', $content)) :
                    honrix_print_first_instance_of_block('core/embed', $content);
                else :
                    honrix_print_first_instance_of_block('core-embed/*', $content);
                endif;
            else : ?>
                <iframe src="<?php echo esc_url($audio_link); ?>"></iframe>
            <?php
            endif; ?>
        <?php
        endif;
    }
}

if (!function_exists('honrix_get_gallery_post')) {
    function honrix_get_gallery_post()
    {
        if (get_post_format() == 'gallery') : ?>
            <?php
            $honrix_gallery_img_ids = get_post_meta(get_the_ID(), 'rf_gallery_imgs_src', true);
            $honrix_gallery_img_ids = explode(',', $honrix_gallery_img_ids);
            if (count($honrix_gallery_img_ids)) :
            ?>
                <div class="honrix-gallery-swiper honrix-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($honrix_gallery_img_ids as $id) : ?>
                            <div class="swiper-slide">
                                <img src="<?php echo esc_url($id); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            <?php
            endif; ?>
        <?php
        endif;
    }
}

if (!function_exists('honrix_get_gallery_post_by_id')) {
    function honrix_get_gallery_post_by_id($post)
    {
        if (get_post_format($post) == 'gallery') : ?>
            <?php
            $honrix_gallery_img_ids = get_post_meta($post->ID, 'rf_gallery_imgs_src', true);
            $honrix_gallery_img_ids = explode(',', $honrix_gallery_img_ids);
            if (count($honrix_gallery_img_ids)) :
            ?>
                <div class="honrix-gallery-swiper honrix-slider">
                    <div class="swiper-wrapper">
                        <?php foreach ($honrix_gallery_img_ids as $id) : ?>
                            <div class="swiper-slide">
                                <img src="<?php echo esc_url($id); ?>" alt="<?php echo esc_attr(get_the_title($post)); ?>" />
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            <?php
            endif; ?>
<?php
        endif;
    }
}

if (!function_exists('honrix_alter_excerpt')) :
    /**
     * Filter to change excerpt length size
     *
     * @since 1.0.0
     */
    function honrix_alter_excerpt($length)
    {
        if (is_admin()) {
            return $length;
        }

        return honrix_get_control_value('honrix_archive_content_length', '50');
    }
endif;
add_filter('excerpt_length', 'honrix_alter_excerpt');

function honrix_end_excerpt_more($more)
{
    return esc_html(honrix_get_control_value('honrix_archive_content_excerpt_end', __('...', 'honrix')));
}
add_filter('excerpt_more', 'honrix_end_excerpt_more');

if (!function_exists('honrix_hex_to_rgb')) {
    function honrix_hex_to_rgb($hex)
    {
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        return array($r, $g, $b);
    }
}

/*Remove extra attributes from link and script tag*/
add_action('wp_loaded', 'honrix_output_buffer_start');
function honrix_output_buffer_start()
{
    ob_start("honrix_output_callback");
}

function honrix_output_callback($buffer)
{
    return preg_replace("%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer);
}
