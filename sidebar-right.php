<?php if (honrix_get_control_value('honrix_right_sidebar_display', 'yes') == 'yes') : ?>
    <?php if (is_active_sidebar('right_sidebar')) : ?>
        <div class="sidebar-right sidebar default-sidebar ps-md-4 pt-5 pt-md-0">
            <?php dynamic_sidebar('right_sidebar'); ?>
        </div>
    <?php endif; ?>
<?php endif; ?>