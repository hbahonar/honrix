<?php if (honrix_get_control_value('honrix_shop_left_sidebar_display', 'yes') == 'yes') : ?>
    <?php if (is_active_sidebar('shop_left_sidebar')) : ?>
        <div class="sidebar-left sidebar shop-sidebar pe-md-4 pt-5 pt-md-0">
            <?php dynamic_sidebar('shop_left_sidebar'); ?>
        </div>
    <?php endif; ?>
<?php endif; ?>