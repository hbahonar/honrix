<div class="honrix-inner-header <?php echo honrix_get_control_value('honrix_header_boxed', honrix_get_control_value('honrix_boxed', 'boxed')) == 'boxed' ? 'container' : 'container-fluid'; ?>">
    <div class="row pt-2 pb-2">
        <div class='honrix-logo col-6 col-md-2 d-flex align-items-center justify-content-md-start flex-wrap ps-0'>
            <?php
            if (has_custom_logo()) :
                the_custom_logo();
            else :
                $blog_info    = get_bloginfo('name');
                $blog_description = get_bloginfo('description');
                $show_title   = (true === display_header_text());
                $header_class = $show_title ? 'site-title' : 'screen-reader-text';
            ?>
                <?php if ($blog_info) : ?>
                    <?php if (is_front_page() && !is_paged()) : ?>
                        <h1 class="<?php echo esc_attr($header_class); ?> w-100 text-start m-0">
                            <?php echo esc_html($blog_info);?>
                        </h1>
                        <?php if(honrix_get_control_value('honrix_header_description_display', 'yes') == 'yes'): ?>
                            <span><?php echo esc_html($blog_description); ?></span>
                        <?php endif; ?>
                    <?php elseif (is_front_page() && !is_home()) : ?>
                        <h1 class="<?php echo esc_attr($header_class); ?> w-100 text-start m-0">
                            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($blog_info);?></a>
                        </h1>
                        <?php if(honrix_get_control_value('honrix_header_description_display', 'yes') == 'yes'): ?>
                            <span><?php echo esc_html($blog_description); ?></span>
                        <?php endif; ?>
                    <?php else : ?>
                        <h1 class="<?php echo esc_attr($header_class); ?> w-100 text-start m-0">
                            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($blog_info);?></a>
                        </h1>
                        <?php if(honrix_get_control_value('honrix_header_description_display', 'yes') == 'yes'): ?>
                            <span><?php echo esc_html($blog_description); ?></span>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif;
                ?>
            <?php endif;
            ?>
        </div>
        <div class='honrix-main-menu col-2 col-md-8 order-3 order-md-2 d-flex justify-content-center'>
            <?php if (has_nav_menu('main-menu')) : ?>
                <nav class="navbar navbar-expand-md w-100 p-0">
                    <button class="navbar-toggler btn-toggler-bar mobile-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bscollapse" aria-controls="bscollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>
                    <div id="bscollapse" class="navbar-box collapse navbar-collapse">
                        <button class="close navbar-toggler rounded-circle md-invisible d-flex justify-content-center align-items-center" data-bs-toggle="collapse" data-bs-target="#bscollapse" aria-controls="bscollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <i class='fas fa-times'></i>
                        </button>
                        <?php
                        wp_nav_menu(array(
                            'theme_location'    => 'main-menu',
                            'container'         => 'div',
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new WP_Bootstrap_Navwalker(),
                        ));
                        ?>
                    </div>
                </nav>
            <?php endif;
            ?>
        </div>
        <div class="honrix-cart-search col-4 col-md-2 pe-0 order-2 order-md-3 d-flex justify-content-end align-items-center">
            <div class="honrix-search-button pe-2 honrix-icon" tabindex="0">
                <i class="fab fa-sistrix"></i>
            </div>
            <div class='honrix-search-box d-flex w-100 h-100 align-items-center justify-content-center' tabindex="-1">
                <?php get_search_form(); ?>
            </div>
            <?php if (class_exists('WooCommerce')) : ?>
                <div class="honrix-cart ps-2">
                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="d-flex align-items-center">
                        <div class="cart-icon">
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
                        </div>
                        <div class="cart-count-price d-flex flex-wrap align-items-center ms-1">
                            <div class="cart-count w-100">
                                <?php
                                if ($count = WC()->cart->get_cart_contents_count() > 1) {
                                    printf(esc_html__('%d Items', 'honrix'), $count);
                                } else {
                                    printf(esc_html__('%d Item', 'honrix'), $count);
                                }
                                ?>
                            </div>
                            <div class="cart-price w-100">
                                <?php
                                echo WC()->cart->get_cart_total(); ?>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="honrix-mini-cart-details">
                    <?php if (class_exists('WooCommerce')) : ?>
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
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>