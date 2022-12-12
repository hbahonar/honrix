<?php if (honrix_get_control_value('honrix_404_right_sidebar_display', 'yes') == 'yes') : ?>
    <?php if (is_active_sidebar('p404_right_sidebar')) : ?>
        <div class="sidebar-right sidebar p404-sidebar ps-md-4 pt-5 pt-md-0">
            <?php dynamic_sidebar('p404_right_sidebar'); ?>
        </div>
    <?php endif; ?>
<?php endif; ?>