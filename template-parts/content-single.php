<?php

/**
 * Honrix single post template
 *
 * @package honrix
 */

if (!defined('ABSPATH')) {
    exit;
}
 
?>
<div id="content" class="honrix-entry pb-4 <?php echo honrix_get_control_value('honrix_post_width', honrix_get_control_value('honrix_boxed', 'boxed')) == 'boxed' ? 'container' : 'container-fluid'; ?>">
    <div class="honrix-content d-flex">
        <?php is_rtl() ? get_sidebar('right-post') : get_sidebar('left-post'); ?>
        <div class="entry-post">
            <?php
            if (honrix_get_control_value('honrix_display_breadcrumb', 'no') == 'yes') {
                honrix_breadcrumb();
            } ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) :
                    the_post(); ?>
                    <article <?php post_class('post pe-4'); ?>>
                        <?php honrix_post_thumbnail(); ?>

                        <?php if (honrix_get_control_value('honrix_post_date_display', 'yes') == 'yes' || honrix_get_control_value('honrix_post_author_display', 'yes') == 'yes') : ?>
                            <div class="entry-meta pt-5 clearfix">
                                <?php if (honrix_get_control_value('honrix_post_date_display', 'yes') == 'yes') : ?>
                                    <?php
                                    $date_title = honrix_get_control_value('honrix_post_date_title', __('Posted On: ', 'honrix'));
                                    if (!empty($date_title)) : ?>
                                        <span class="date-title"><?php echo esc_html($date_title); ?></span>
                                    <?php
                                    endif;
                                    ?>
                                    <?php honrix_entry_published_date(); ?>
                                <?php endif; ?>
                                <?php if (honrix_get_control_value('honrix_post_author_display', 'yes') == 'yes') : ?>
                                    <?php
                                    $author_title = honrix_get_control_value('honrix_post_author_title', __('Posted By: ', 'honrix'));
                                    if (!empty($author_title)) : ?>
                                        <span class="author-title"><?php echo esc_html($author_title); ?></span>
                                    <?php
                                    endif; ?>
                                    <span class="author-name"><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author(); ?></a></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php
                        honrix_entry_title("start");
                        if (honrix_get_control_value('honrix_post_category_display', 'yes') == 'yes') {
                            honrix_entry_category("start");
                        }

                        $share_button_display = honrix_get_control_value('honrix_share_bottuns_post_display', 'yes') == 'yes';

                        $share_button_place =  honrix_get_control_value('honrix_share_bottuns_post_place', 'after');
                        ?>
                        <?php if ($share_button_display && ($share_button_place == 'before' || $share_button_place == 'both')) : ?>
                            <?php honrix_entry_share_buttons(); ?>
                        <?php endif; ?>

                        <div class="entry-content pt-5 clearfix">
                            <?php the_content(); ?>
                            <?php
                            wp_link_pages(
                                array(
                                    'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'honrix') . '</span>',
                                    'after' => '</div>',
                                    'link_before' => '<span>',
                                    'link_after' => '</span>',
                                    'pagelink' => '<span class="screen-reader-text">' . __('Page', 'honrix') . ' </span>%',
                                    'separator' => '<span class="screen-reader-text">, </span>',
                                )
                            );
                            ?>
                        </div>

                        <?php
                        if (honrix_get_control_value('honrix_post_tag_display', 'yes') == 'yes') {
                            honrix_post_tags();
                        }
                        ?>

                        <?php if ($share_button_display && ($share_button_place == 'after' || $share_button_place == 'both')) : ?>
                            <?php honrix_entry_share_buttons(); ?>
                        <?php endif; ?>
                        <?php
                        if (honrix_get_control_value('honrix_post_navigation_display', 'yes') == 'yes') {
                            honrix_post_navigation();
                        }

                        if (honrix_get_control_value('honrix_post_related_posts_display', 'yes') == 'yes') {
                            honrix_related_posts();
                        }

                        honrix_post_comment();
                        ?>
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <?php is_rtl() ? get_sidebar('left-post') : get_sidebar('right-post'); ?>
    </div>
</div>