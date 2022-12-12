<?php

/**
 * Honrix page template
 *
 * @package honrix
 */

if (!defined('ABSPATH')) {
    exit;
}

if (honrix_get_control_value('honrix_display_breadcrumb', 'no') == 'yes') : 
    $container='container-fluid';
    if(is_product()){
        $container=honrix_get_control_value('honrix_boxed', 'boxed') == 'boxed' ? 'container' : 'container-fluid';
    }
?>
    <div class="p-0 <?php echo esc_html($container); ?>">
        <?php honrix_breadcrumb(); ?>
    </div>

<?php endif; ?>

<div id="content" class="honrix-content honrix-shop p-0 pt-4 pb-4 d-flex flex-wrap <?php echo honrix_get_control_value('honrix_boxed', 'boxed') == 'boxed' ? 'container' : 'container-fluid'; ?>">
    <?php if (is_product()) :
        is_rtl() ? get_sidebar('right-product') : get_sidebar('left-product');
    else :
        is_rtl() ? get_sidebar('right-shop') : get_sidebar('left-shop');
    endif;  ?>
    <div class="honrix-entries <?php echo is_shop() ? esc_attr('ps-2 pe-2') : ''; ?>">
        <?php woocommerce_content(); ?>
    </div>
    <?php if (is_product()) :
        is_rtl() ? get_sidebar('left-product') : get_sidebar('right-product');
    else :
        is_rtl() ? get_sidebar('left-shop') : get_sidebar('right-shop');
    endif;  ?>
</div>