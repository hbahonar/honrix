<?php

/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce\Templates
 * @version    1.6.4
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

global $product;

if (!wc_review_ratings_enabled()) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

$rating_html = '';

if ($rating_count > 0) {
	$rating_html .= '<span class="woocommerce-product-rating">'
		. wc_get_rating_html($average, $rating_count) .
		'</span>';
}

the_title('<h1 class="product_title entry-title">', $rating_html.'</h1>');

global $product;
if (wc_product_sku_enabled() && ($product->get_sku() || $product->is_type('variable'))) : ?>

	<div class="sku_wrapper pb-3"><?php esc_html_e('SKU:', 'honrix'); ?> <span class="sku"><?php echo esc_html(($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'honrix')); ?></span></div>

<?php endif;
