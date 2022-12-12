<?php

/**
 * Honrix blog list
 *
 * @package honrix
 */
if (!is_front_page() && honrix_get_control_value('honrix_display_breadcrumb', 'no') == 'yes') {
    honrix_breadcrumb();
}

if (is_front_page()) : ?>
    <?php if (is_active_sidebar('honrix_before_content')) : ?>
        <div class="home-before-content">
            <?php dynamic_sidebar('honrix_before_content'); ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

<div id="content" class="honrix-content honrix-archive pt-4 pb-4 d-flex flex-wrap <?php echo honrix_get_control_value('honrix_boxed', 'boxed') == 'boxed' ? 'container' : 'container-fluid'; ?>">
    <?php is_rtl() ? get_sidebar('right') : get_sidebar('left'); ?>
    <div class="honrix-entries arcive-theme-<?php echo esc_attr(honrix_get_control_value('honrix_archive_theme','1')); ?>">
        <div class="posts d-flex flex-wrap honrix-<?php echo esc_attr(honrix_get_control_value('honrix_archive_mode', 'grid')); ?> d-flex flex-wrap">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) :
                    the_post(); ?>
                    <?php get_template_part('/template-parts/archive-template/theme', honrix_get_control_value('honrix_archive_theme', '1')); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <?php honrix_entries_pagination(); ?>
    </div>
    <?php is_rtl() ? get_sidebar('left') : get_sidebar('right'); ?>
</div>

<?php if (is_front_page()) : ?>
    <?php if (is_active_sidebar('honrix_after_content')) : ?>
        <div class="home-after-content">
            <?php dynamic_sidebar('honrix_after_content'); ?>
        </div>
    <?php endif; ?>
<?php endif; ?>