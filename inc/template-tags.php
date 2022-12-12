<?php
if (!function_exists('honrix_post_thumbnail')) {
    function honrix_post_thumbnail()
    {
        $thumbnail_ratio = '';
        if (honrix_get_control_value('honrix_archive_mode') != 'masonry') {
            $thumbnail_ratio = 'ratio ratio-4x3';
            switch (honrix_get_control_value('honrix_archive_thumbnail_ratio', '2')) {
                case '1':
                    $thumbnail_ratio = 'ratio ratio-1x1';
                    break;
                case '2':
                    $thumbnail_ratio = 'ratio ratio-4x3';
                    break;
                case '3':
                    $thumbnail_ratio = 'ratio ratio-16x9';
                    break;
                case '4':
                    $thumbnail_ratio = 'ratio ratio-21x9';
                    break;
                case '5':
                    if (get_post_format() != 'gallery') {
                        $thumbnail_ratio = '';
                    }
                    break;
            }
        }

        if (has_post_thumbnail()) : ?>
            <?php if (is_singular()) : ?>
                <div class="post-thumbnail text-center clearfix mt-3">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php else : ?>
                <div class="post-thumbnail clearfix <?php echo esc_html($thumbnail_ratio); ?>">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>
        <?php endif;
    }
}

if (!function_exists('honrix_navigation_post_thumbnail')) {
    function honrix_navigation_post_thumbnail($post)
    {
        $thumbnail_ratio = 'ratio ratio-4x3';
        switch (honrix_get_control_value('honrix_archive_thumbnail_ratio', '2')) {
            case '1':
                $thumbnail_ratio = 'ratio ratio-1x1';
                break;
            case '2':
                $thumbnail_ratio = 'ratio ratio-4x3';
                break;
            case '3':
                $thumbnail_ratio = 'ratio ratio-16x9';
                break;
            case '4':
                $thumbnail_ratio = 'ratio ratio-21x9';
                break;
            case '5':
                $thumbnail_ratio = '';
                break;
        }

        if (get_post_format($post) == 'audio') : ?>
            <div class="navigation-thumbnail <?php echo esc_html($thumbnail_ratio); ?>">
                <?php honrix_get_audio_post_by_id($post); ?>
            </div>
        <?php elseif (get_post_format($post) == 'video') : ?>
            <div class="navigation-thumbnail <?php echo esc_html($thumbnail_ratio); ?>">
                <?php honrix_get_video_post_by_id($post); ?>
            </div>

        <?php elseif (get_post_format($post) == 'gallery') : ?>
            <div class="navigation-thumbnail <?php echo esc_html($thumbnail_ratio); ?>">
                <?php honrix_get_gallery_post_by_id($post); ?>
            </div>
        <?php elseif (has_post_thumbnail($post)) : ?>
            <div class="navigation-thumbnail <?php echo esc_html($thumbnail_ratio); ?>">
                <?php echo get_the_post_thumbnail($post); ?>
            </div>
            <?php
        endif;
    }
}

if (!function_exists('honrix_entry_category')) {
    function honrix_entry_category($align = 'center')
    {
        $categories_list = get_the_category_list();
        if ($categories_list) :
            if (is_single()) : ?>
                <div class="entry-categories text-<?php echo esc_html($align); ?> pt-3 clearfix">
                    <?php printf('<span class="screen-reader-text">%1$s </span>%2$s', esc_html__('Used before category names.', 'honrix'), wp_kses($categories_list, array('a' => array('href' => array(), 'rel' => array())))); ?>
                </div>
            <?php else : ?>
                <span class="entry-categories clearfix">
                    <?php printf('<span class="screen-reader-text">%1$s </span>%2$s', esc_html__('Used before category names.', 'honrix'), wp_kses($categories_list, array('a' => array('href' => array(), 'rel' => array())))); ?>
                </span>
        <?php
            endif;
        endif;
    }
}

if (!function_exists('honrix_entry_title')) {
    function honrix_entry_title($align = 'center')
    {
        ?>
        <?php if (is_singular()) : ?>
            <?php if (is_sticky()) : ?>
                <?php
                the_title(sprintf('<h1 class="entry-title pt-5 m-0 text-' . $align . ' clearfix"><span class="dashicons dashicons-sticky"></span> ', esc_url(get_permalink())), '</h1>');
                ?>
            <?php else : ?>
                <?php
                the_title(sprintf('<h1 class="entry-title pt-5 m-0 text-' . $align . ' clearfix">', esc_url(get_permalink())), '</h1>');
                ?>
            <?php endif; ?>
        <?php else : ?>
            <?php if (is_sticky()) : ?>
                <?php
                the_title(sprintf('<h2 class="entry-title clearfix mb-3 m-0 d-flex align-items-center justify-content-' . $align . ' w-100"><span class="dashicons dashicons-sticky"></span><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
                ?>
            <?php else : ?>
                <?php the_title(sprintf('<h2 class="entry-title clearfix mb-3 m-0 d-flex align-items-center justify-content-' . $align . ' w-100"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php
    }
}

if (!function_exists('honrix_entry_published_date')) {
    function honrix_entry_published_date()
    {
        if (class_exists('WooCommerce')) {
            if (
                is_shop() ||
                is_cart() ||
                is_checkout() ||
                is_account_page() ||
                is_product_category() ||
                is_product_tag() ||
                is_product() ||
                is_wc_endpoint_url()
            ) {
                return;
            }
        }
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    ?>
        <span class="entry-date">
            <?php
            $time_string = sprintf(
                $time_string,
                esc_attr(get_the_date(DATE_W3C)),
                esc_html(get_the_date("j M, Y"))
            );
            echo wp_kses_post($time_string); ?>
        </span>
    <?php
    }
}

if (!function_exists('honrix_entry_author')) {
    function honrix_entry_author()
    {
    ?>
        <span class="entry-author">
            <span class="byline"><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author();  ?></a></span>
        </span>
    <?php
    }
}

if (!function_exists('honrix_entry_content')) {
    function honrix_entry_content()
    {
    ?>
        <div class="entry-content mb-3 w-100 clearfix">
            <?php get_template_part('template-parts/excerpt/excerpt', get_post_format()); ?>
        </div>
    <?php
    }
}

if (!function_exists('honrix_entry_share_buttons')) {
    function honrix_entry_share_buttons($align = 'center')
    {
        $margin = is_singular() ? 'mt-5' : 'mb-3';
        if (!defined('HONRIX_CORE_URL') || honrix_get_control_value('honrix_share_bottuns_display', 'yes') == 'no') {
            return;
        }
        if (class_exists('WooCommerce')) {
            if (
                is_shop() ||
                is_cart() ||
                is_checkout() ||
                is_account_page() ||
                is_product_category() ||
                is_product_tag() ||
                is_product() ||
                is_wc_endpoint_url()
            ) {
                return;
            }
        }
    ?>
        <div class="entry-share w-100 <?php echo esc_html($margin); ?> clearfix entry-share w-100 clearfix d-flex <?php echo esc_attr((!is_singular()) ? 'justify-content-' . $align : 'align-items-center'); ?>">
            <?php if (is_singular()) : ?>
                <?php echo !empty(honrix_get_control_value('honrix_post_share_title', 'Share:')) ? '<span class="share-title">' . esc_html(honrix_get_control_value('honrix_post_share_title', 'Share:')) . '</span>' : ''; ?>
            <?php endif; ?>
            <?php if (honrix_get_control_value('honrix_facebook_display', 'yes') == 'yes') : ?>
                <a rel="nofollow noreferrer" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="share_facebook" onclick="if (navigator.share) {
  navigator.share({
		title: document.title,
	  text: '<?php the_title(); ?>',
	  url: '<?php the_permalink(); ?>',
  })
} else {window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&display=popup', 'facebook-share-dialog', 'width=626,height=436');
	                                return false;} "><i class="fab fa-facebook-f"></i></a>
            <?php endif; ?>

            <?php if (honrix_get_control_value('honrix_twitter_display', 'yes') == 'yes') : ?>
                <a rel="nofollow noreferrer" href="https://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank" class="share_twitter"><i class="fab fa-twitter"></i></a>
            <?php endif; ?>

            <?php if (honrix_get_control_value('honrix_gplus_display', 'no') == 'yes') : ?>
                <a rel="nofollow noreferrer" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
	                                        '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
	                                return false;" class="share_googleplus"><i class="fab fa-google"></i></a>
            <?php endif; ?>

            <?php if (honrix_get_control_value('honrix_linkedin_display', 'yes') == 'yes') : ?>
                <a rel="nofollow noreferrer" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>" target="_blank" class="share_linkedin"><i class="fab fa-linkedin-in"></i></a>
            <?php endif; ?>

            <?php
            $image_url = '';
            if (has_post_thumbnail()) {
                $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                $image_url = $image_url[0];
            }

            $pinterest_title = str_replace(' ', '%20', get_the_title());
            $pinterest_media = '';
            $pinterest_media_sep = '';
            if ($image_url != '') {
                $pinterest_media_sep = '&amp;media=';
                $pinterest_media =  $image_url;
            }
            ?>

            <?php if (honrix_get_control_value('honrix_pinterest_display', 'yes') == 'yes') : ?>
                <?php

                $pin_url = 'https://www.pinterest.com/pin/create/button/?url=' . get_the_permalink() . esc_attr($pinterest_media_sep) . esc_url($pinterest_media) . '&amp;description=' . esc_attr($pinterest_title);
                ?>
                <a rel="nofollow noreferrer" href="<?php echo esc_url($pin_url); ?>" class="share_pinterest" target="_blank" data-pin-custom="true"><i class="fab fa-pinterest-p"></i></a>
            <?php endif; ?>

            <?php if (honrix_get_control_value('honrix_reddit_display', 'no') == 'yes') : ?>
                <a rel="nofollow noreferrer" href="https://reddit.com/submit?url=<?php the_permalink(); ?>" class="share_reddit" target="_blank"><i class="fab fa-reddit-alien"></i></a>
            <?php endif; ?>

            <?php if (honrix_get_control_value('honrix_tumblr_display', 'no') == 'yes') : ?>
                <a rel="nofollow noreferrer" href="https://www.tumblr.com/share/link?url=<?php the_permalink(); ?>" class="share_tumblr" target="_blank"><i class="fab fa-tumblr"></i></a>
            <?php endif; ?>

            <?php if (honrix_get_control_value('honrix_vk_display', 'no') == 'yes') : ?>
                <a rel="nofollow noreferrer" href="https://vk.com/share.php?url=<?php the_permalink(); ?>" class="share_vk" target="_blank"><i class="fab fa-vk"></i></a>
            <?php endif; ?>

            <?php if (honrix_get_control_value('honrix_pocket_display', 'no') == 'yes') : ?>
                <a rel="nofollow noreferrer" target="_blank" class="share_pinterest" href="https://getpocket.com/save?url=<?php the_permalink(); ?>&title=<?php echo esc_attr($pinterest_title); ?>" data-event-category="Social" data-event-action="Share:pocket"><i class="fab fa-get-pocket"></i></a>
            <?php endif; ?>

            <?php if (honrix_get_control_value('honrix_whatsapp_display', 'no') == 'yes') : ?>
                <a rel="nofollow noreferrer" class="share_whatsapp" href="whatsapp://send?text=<?php the_permalink(); ?>" data-action="share/whatsapp/share"><i class="fab fa-whatsapp"></i></a>
            <?php endif; ?>

            <?php if (honrix_get_control_value('honrix_telegram_display', 'no') == 'yes') : ?>
                <a rel="nofollow noreferrer" target="_blank" class="share_telegram" href="https://t.me/share/url?url=<?php the_permalink(); ?>"><i class="fab fa-telegram-plane"></i></a>
            <?php endif; ?>

            <?php if (honrix_get_control_value('honrix_mail_display', 'no') == 'yes') : ?>
                <a rel="nofollow noreferrer" target="_blank" class="share_mail" href="mailto:?body=<?php the_permalink(); ?>"><i class="far fa-envelope"></i></a>
            <?php endif; ?>
        </div>
        <?php
    }
}

if (!function_exists('honrix_entry_comments_number')) {
    function honrix_entry_comments_number()
    {
        if (class_exists('WooCommerce')) {
            if (
                is_shop() ||
                is_cart() ||
                is_checkout() ||
                is_account_page() ||
                is_product_category() ||
                is_product_tag() ||
                is_product() ||
                is_wc_endpoint_url()
            ) {
                return;
            }
        }
        if (comments_open()) : ?>
            <span class="entry-comment-count">
                <?php
                /*display comments count*/
                $comments_number = get_comments_number(); ?>
                <?php if ('0' === $comments_number) : ?>
                    <?php esc_html_e("No Comment", 'honrix') ?>
                <?php elseif ('1' === $comments_number) : ?>
                    <?php esc_html_e("One Comment", 'honrix') ?>
                <?php else : ?>
                    <?php echo esc_html($comments_number); ?><?php esc_html_e(" Comments", 'honrix') ?>
                <?php endif; ?>
            </span>
        <?php
        endif;
    }
}

if (!function_exists('honrix_entries_pagination')) {
    function honrix_entries_pagination()
    {
        if (is_rtl()) {
            the_posts_pagination(array(
                'prev_text' => __('<i class="fas fa-angle-double-right"></i>', 'honrix'),
                'next_text' => __('<i class="fas fa-angle-double-left"></i>', 'honrix'),
            ));
        } else {
            the_posts_pagination(array(
                'prev_text' => __('<i class="fas fa-angle-double-left"></i>', 'honrix'),
                'next_text' => __('<i class="fas fa-angle-double-right"></i>', 'honrix'),
            ));
        }
    }
}

if (!function_exists('honrix_post_navigation')) {
    function honrix_post_navigation()
    {
        if (class_exists('WooCommerce')) {
            if (
                is_shop() ||
                is_cart() ||
                is_checkout() ||
                is_account_page() ||
                is_product_category() ||
                is_product_tag() ||
                is_product() ||
                is_wc_endpoint_url()
            ) {
                return;
            }
        }

        $prev_post = get_adjacent_post(false, '', true);
        $next_post = get_adjacent_post(false, '', false);

        ?>
        <div class="entry-navigation pt-3 pb-3 mt-5 d-flex clearfix">
            <div class="pre-post w-50">
                <?php
                if (!empty($prev_post)) { ?>
                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="d-md-flex align-items-center" title="<?php echo esc_attr(honrix_check_post_title($prev_post->post_title)); ?>">
                        <?php honrix_navigation_post_thumbnail($prev_post); ?>
                        <h3 class="navigation-content p-md-3 pt-3 pb-3 text-start">
                            <?php
                            $prev_post_title = honrix_get_control_value('honrix_post_navigation_prev_title', __('Previous Article', 'honrix'));
                            echo !empty($prev_post_title) ? '<span class="prev-post-title pb-3">' . esc_html($prev_post_title) . '</span>' : '';
                            ?>
                            <?php echo wp_kses_post(honrix_check_post_title($prev_post->post_title)); ?>
                        </h3>
                    </a>
                <?php
                }
                ?>
            </div>
            <div class="next-post w-50 d-flex justify-content-end">
                <?php
                if (!empty($next_post)) { ?>
                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="d-md-flex align-items-center flex-row-reverse" title="<?php echo esc_attr(honrix_check_post_title($next_post->post_title)); ?>">
                        <?php honrix_navigation_post_thumbnail($next_post); ?>
                        <h3 class="navigation-content p-md-3 pt-3 pb-3 text-end">
                            <?php
                            $next_post_title = honrix_get_control_value('honrix_post_navigation_next_title', __('Next Article', 'honrix'));
                            echo !empty($next_post_title) ? '<span class="prev-post-title pb-3">' . esc_html($next_post_title) . '</span>' : '';
                            ?>
                            <?php echo wp_kses_post(honrix_check_post_title($next_post->post_title)); ?>
                        </h3>

                    </a>
                <?php
                }
                ?>
            </div>
        </div>
        <?php
    }
}

if (!function_exists('honrix_post_tags')) {
    function honrix_post_tags()
    {
        $tags_list = get_the_tag_list('', _x(', ', 'Used between list items, there is a space after the comma.', 'honrix'));
        if ($tags_list && !is_wp_error($tags_list)) :
            $tag_title = !empty(honrix_get_control_value('honrix_post_tag_title', 'Tags:')) ? '<span class="tag-title">' . honrix_get_control_value('honrix_post_tag_title', 'Tags:') . '</span>' : '';
        ?>
            <div class="entry-tags pt-5 clearfix">
                <?php
                /* display post tags*/

                // printf(
                //     '%1$s %2$s',
                //     wp_kses($tag_title, array('a' => array('class' => array()))),
                //     wp_kses($tags_list, array('a' => array('href' => array(), 'rel' => array())))

                // );

                printf(
                    '%1$s %2$s',
                    wp_kses_post($tag_title),
                    wp_kses($tags_list, array('a' => array('href' => array(), 'rel' => array())))
                );
                ?>
            </div>
        <?php
        endif;
    }
}

if (!function_exists('honrix_post_avatar')) {
    function honrix_post_avatar()
    {
        if ('post' === get_post_type()) : ?>
            <div class="entry-avatar pt-3 mt-3 d-flex flex-md-nowrap flex-wrap align-items-center clearfix">
                <?php
                $author_avatar_size = apply_filters('honrix_author_avatar_size', 100); ?>
                <span class="screen-reader-text"><?php esc_html_e('Used before post author name.', 'honrix'); ?></span>
                <div class="author-avatar m-auto"><?php echo get_avatar(get_the_author_meta('user_email'), $author_avatar_size); ?></div>
                <div class="author-meta text-center text-md-start w-100 p-md-3 pt-3 pb-3">
                    <div class="author-name"><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author(); ?></a>
                    </div>
                    <div class="author-description pt-2"><?php echo esc_html(get_the_author_meta('description')); ?></div>
                </div>
            </div>
        <?php
        endif;
    }
}

if (!function_exists('honrix_related_posts')) {
    function honrix_related_posts()
    {
        if (is_single()) : ?>
            <?php
            $categories = get_the_category();
            if (count($categories) > 0) :
            ?>

                <?php

                $thumbnail_ratio = 'ratio ratio-4x3';
                switch (honrix_get_control_value('honrix_archive_thumbnail_ratio', '2')) {
                    case '1':
                        $thumbnail_ratio = 'ratio ratio-1x1';
                        break;
                    case '2':
                        $thumbnail_ratio = 'ratio ratio-4x3';
                        break;
                    case '3':
                        $thumbnail_ratio = 'ratio ratio-16x9';
                        break;
                    case '4':
                        $thumbnail_ratio = 'ratio ratio-21x9';
                        break;
                    case '5':
                        $thumbnail_ratio = '';
                        break;
                }
                $terms = get_the_terms(get_the_ID(), 'category');

                if (empty($terms)) $terms = array();

                $term_list = wp_list_pluck($terms, 'slug');

                $related_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => honrix_get_control_value('honrix_post_related_posts_count', '3'),
                    'post_status' => 'publish',
                    'post__not_in' => array(get_the_ID()),
                    //                        'orderby' => 'rand',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => $term_list
                        )
                    )
                );

                $the_query = new WP_Query($related_args);
                global $cl_from_element;
                $cl_from_element['is_related'] = true;
                // Display posts
                if ($the_query->have_posts()) :
                ?>
                    <div class="related-posts pt-3 mt-5 clearfix">
                        <?php if (!empty(honrix_get_control_value('honrix_post_related_posts_title', __('Related Posts', 'honrix')))) : ?>
                            <h2 class="related-posts-title text-center m-0">
                                <?php echo esc_html(honrix_get_control_value('honrix_post_related_posts_title', __('Related Posts', 'honrix'))); ?>
                            </h2>
                        <?php endif; ?>
                        <div class="posts row mt-3">
                            <?php $counter = 1;
                            while ($the_query->have_posts() && $counter < 4) :
                                $the_query->the_post(); ?>
                                <div class="related-post col-12 col-md-<?php echo esc_attr((12 / honrix_get_control_value('honrix_post_related_posts_column', '3'))); ?> pe-md-1 pt-5 pt-md-0">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="related-post-thumbnail <?php echo esc_html($thumbnail_ratio); ?>">
                                            <?php
                                            the_post_thumbnail(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="related-post-meta p-3">
                                        <?php if (honrix_get_control_value('honrix_post_related_posts_meta_display', 'yes') == 'yes') : ?>
                                            <div class="mb-3">
                                                <?php honrix_entry_published_date(); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php the_title(sprintf('<h2 class="related-post-title m-0 mb-3"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
                                    </div>
                                </div>
                            <?php
                                $counter++;
                            endwhile;
                            ?>
                        </div>
                    </div>
                <?php endif;

                wp_reset_query();
                $cl_from_element['is_related'] = false;
                ?>

            <?php endif;
        endif;
    }
}

if (!function_exists('honrix_post_comment')) {
    function honrix_post_comment()
    {
        if (class_exists('WooCommerce')) {
            if (
                is_shop() ||
                is_cart() ||
                is_checkout() ||
                is_account_page() ||
                is_product_category() ||
                is_product_tag() ||
                is_product() ||
                is_wc_endpoint_url()
            ) {
                return;
            }
        }
        if (honrix_get_control_value('honrix_comment_display', 'yes') == 'yes' && get_post_meta(get_the_ID(), 'honrix_post_option_comment_display', true) != 'hide') :
            if (comments_open() || get_comments_number()) : ?>
                <div class="entry-comment pt-3 mt-5">
                    <?php comments_template(); ?>
                </div>
            <?php elseif (!comments_open()) : ?>
<?php
                $close_comment_msg = honrix_get_control_value('honrix_comment_close_message', __('Comments are closed for this section.', 'honrix'));
                if (!empty($close_comment_msg)) :
                    sprintf('<div class="entry-comment">%1$s</div>', $close_comment_msg);
                endif;
            endif;
        endif;
    }
}
