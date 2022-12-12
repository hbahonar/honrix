<?php if (honrix_get_control_value('honrix_post_right_sidebar_display', 'yes') == 'yes') : ?>
    <?php if (is_active_sidebar('post_right_sidebar')) : ?>
        <div class="sidebar-right sidebar post-sidebar ps-md-4 pt-5 pt-md-0 mt-3">
            <?php dynamic_sidebar('post_right_sidebar'); ?>
        </div>
    <?php endif; ?>
<?php endif; ?>