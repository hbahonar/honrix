<?php

/**
 * Product loop sale flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/sale-flash.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

global $post, $product;

// var_dump($product->get_sale_price(), $product->get_regular_price());

?>
<?php if ($product->is_on_sale()) :
	if (is_numeric($product->get_sale_price()) && is_numeric($product->get_regular_price())) :
		echo apply_filters('woocommerce_sale_flash', '<span class="onsale">' . esc_html('-' . intval((100 - ($product->get_sale_price() * 100) / $product->get_regular_price())) . '%') . '</span>', $post, $product);
	else :
		echo apply_filters('woocommerce_sale_flash', '<span class="onsale">' . esc_html__('Sale','honrix') . '</span>', $post, $product);
	endif;
endif;

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
