<?php
add_filter('woocommerce_show_page_title', '__return_false');
add_filter( 'wc_add_to_cart_message_html', '__return_null' );

/** Remove product data tabs */ 
add_filter( 'woocommerce_product_tabs', 'honrix__remove_product_tabs', 98 );
 
function honrix__remove_product_tabs( $tabs ) {
  unset( $tabs['additional_information'] ); // To remove the additional information tab
  return $tabs;
}

add_filter('woocommerce_add_to_cart_fragments', 'honrix_add_to_cart_fragment');
function honrix_add_to_cart_fragment($fragments)
{
    ob_start();
    $count = WC()->cart->get_cart_contents_count();
    echo '<div class="cart-count-price d-flex flex-wrap align-items-center ms-1"><div class="cart-count w-100">'
        . esc_html($count > 1 ? sprintf(esc_html__('%d Items', 'honrix'), $count) : sprintf(esc_html__('%d Item', 'honrix'), $count))
        . '</div><div class="cart-price w-100">' . WC()->cart->get_cart_total() . '</div></div>';
    $fragments['.honrix-inner-header .honrix-cart .cart-count-price'] = ob_get_clean();

    ob_start();
?>
    <div class="honrix-cart-products">
        <div class="mini-cart-header row p-3 m-0">
            <div class="col-md-9 d-flex align-items-center p-0">
                <svg class="shrink-0" viewBox="0 0 12.686 16">
                    <g transform="translate(-27.023 -2)">
                        <g transform="translate(27.023 5.156)">
                            <g>
                                <path d="M65.7,111.043l-.714-9A1.125,1.125,0,0,0,63.871,101H62.459V103.1a.469.469,0,1,1-.937,0V101H57.211V103.1a.469.469,0,1,1-.937,0V101H54.862a1.125,1.125,0,0,0-1.117,1.033l-.715,9.006a2.605,2.605,0,0,0,2.6,2.8H63.1a2.605,2.605,0,0,0,2.6-2.806Zm-4.224-4.585-2.424,2.424a.468.468,0,0,1-.663,0l-1.136-1.136a.469.469,0,0,1,.663-.663l.8.8,2.092-2.092a.469.469,0,1,1,.663.663Z" transform="translate(-53.023 -101.005)" fill="currentColor"></path>
                            </g>
                        </g>
                        <g transform="translate(30.274 2)">
                            <g>
                                <path d="M160.132,0a3.1,3.1,0,0,0-3.093,3.093v.063h.937V3.093a2.155,2.155,0,1,1,4.311,0v.063h.937V3.093A3.1,3.1,0,0,0,160.132,0Z" transform="translate(-157.039)" fill="currentColor"></path>
                            </g>
                        </g>
                    </g>
                </svg>
                <span class="mini-cart-count ps-2">
                    <?php
                    if ($mcount = WC()->cart->get_cart_contents_count() > 1) {
                        printf(esc_html__('%d Items', 'honrix'), $mcount);
                    } else {
                        printf(esc_html__('%d Item', 'honrix'), $mcount);
                    }
                    ?>
                </span>
            </div>
            <div class="col-md-3 p-0 d-flex align-items-center justify-content-end">
                <button class="close honrix-icon hornrix-close-btn" onclick="close_mini_cart()">
                    <span class="close-line"></span>
                    <span class="close-line"></span>
                </button>
            </div>
        </div>
        <?php woocommerce_mini_cart(); ?>
    </div>
    <?php
    $fragments['.honrix-mini-cart-details .honrix-cart-products'] = ob_get_clean();
    return $fragments;
}

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'custom_loop_product_thumbnail', 10 );
function custom_loop_product_thumbnail() {
    global $product;
    $size = 'woocommerce_thumbnail';

    $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

    echo $product ? '<div class="shop-thumbnail">'.$product->get_image( $image_size ).'</div>' : '';
}