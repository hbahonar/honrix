<?php

/**
 * Honrix archive
 *
 * @package honrix
 */
?>
<?php
if (honrix_get_control_value('honrix_display_breadcrumb', 'no') == 'yes') :
    honrix_breadcrumb();
elseif (honrix_get_control_value('honrix_archive_title_display', 'yes') == 'yes') : ?>
    <div class="honrix-archive-title pt-3 pb-3">
        <div class="<?php echo honrix_get_control_value('honrix_archive_title_width', honrix_get_control_value('honrix_boxed', 'boxed')) == 'boxed' ? 'container' : 'container-fluid'; ?>">
            <?php the_archive_title('<h1 class="page-title m-0 mb-2">', '</h1>'); ?>
            <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
        </div>
    </div>
<?php endif; ?>
<div id="content" class="honrix-content honrix-archive pt-4 pb-4 d-flex flex-wrap <?php echo honrix_get_control_value('honrix_boxed', 'boxed') == 'boxed' ? 'container' : 'container-fluid'; ?>">
    <?php is_rtl() ? get_sidebar('right') : get_sidebar('left'); ?>
    <div class="honrix-entries arcive-theme-<?php echo  esc_attr(honrix_get_control_value('honrix_archive_theme','1')); ?>">
        <div class="posts d-flex flex-wrap honrix-<?php echo esc_attr(honrix_get_control_value('honrix_archive_mode', 'grid')); ?>">
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