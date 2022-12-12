<?php

/**
 * Honrix page template
 *
 * @package honrix
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<div id="content" class="honrix-entry pb-4 <?php echo honrix_get_control_value('honrix_post_width', honrix_get_control_value('honrix_boxed', 'boxed')) == 'boxed' ? 'container' : 'container-fluid'; ?>">
    <div class="honrix-content d-flex">
        <?php is_rtl() ? get_sidebar('right-page') : get_sidebar('left-page'); ?>
        <div class="entry-page">
            <?php
            if (honrix_get_control_value('honrix_display_breadcrumb', 'no') == 'yes') {
                honrix_breadcrumb();
            } ?>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) :/* loop start*/
                    the_post(); ?>
                    <article <?php post_class('post pe-4'); ?>>
                        <?php honrix_post_thumbnail(); ?>
                        <?php
                        honrix_entry_title();

                        if (honrix_get_control_value('honrix_post_date_display', 'yes') == 'yes' || honrix_get_control_value('honrix_post_meta_comment_display', 'yes') == 'yes') : ?>
                            <div class="entry-meta text-center pt-3 clearfix">
                                <?php if (honrix_get_control_value('honrix_post_date_display', 'yes') == 'yes') : ?>
                                    <?php honrix_entry_published_date(); ?>
                                <?php endif; ?>
                                <?php if (honrix_get_control_value('honrix_post_meta_comment_display', 'yes') == 'yes') : ?>
                                    <?php honrix_entry_comments_number(); ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>



                        <?php
                        $share_button_display = honrix_get_control_value('honrix_share_bottuns_post_display', 'yes') == 'yes';

                        $share_button_place =  honrix_get_control_value('honrix_share_bottuns_post_place', 'after');
                        ?>
                        <?php if ($share_button_display && ($share_button_place == 'before' || $share_button_place == 'both')) : ?>
                            <?php honrix_entry_share_buttons(); ?>
                        <?php endif; ?>

                        <div class="entry-content pt-3 clearfix">
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
                        <?php if ($share_button_display && ($share_button_place == 'after' || $share_button_place == 'both')) : ?>
                            <?php honrix_entry_share_buttons(); ?>
                        <?php endif; ?>
                        <?php
                        if (honrix_get_control_value('honrix_post_navigation_display', 'yes') == 'yes') {
                            honrix_post_navigation();
                        }

                        honrix_post_comment();
                        ?>
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <?php is_rtl() ? get_sidebar('left-page') : get_sidebar('right-page'); ?>

    </div>
</div>