<?php if (honrix_get_control_value('honrix_product_left_sidebar_display', 'yes') == 'yes') : ?>
    <?php if (is_active_sidebar('product_left_sidebar')) : ?>
        <div class="sidebar-left sidebar product-sidebar pe-md-4 pt-5 pt-md-0">
            <?php dynamic_sidebar('product_left_sidebar'); ?>
        </div>
    <?php endif; ?>
<?php endif; ?>