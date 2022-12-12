<?php if (honrix_get_control_value('honrix_product_right_sidebar_display', 'yes') == 'yes') : ?>
    <?php if (is_active_sidebar('product_right_sidebar')) : ?>
        <div class="sidebar-right sidebar product-sidebar ps-md-4 pt-5 pt-md-0">
            <?php dynamic_sidebar('product_right_sidebar'); ?>
        </div>
    <?php endif; ?>
<?php endif; ?>