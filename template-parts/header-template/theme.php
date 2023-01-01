<div class="honrix-inner-header hs-flex hs-wrap hs-items-center hs-m-auto <?php echo honrix_get_control_value(
    'honrix_header_boxed',
    honrix_get_control_value('honrix_boxed', 'boxed')
) == 'boxed'
    ? 'container'
    : 'container-fluid'; ?>">
        <div class='honrix-logo hs-w-20 hs-m-w-50'>
            <?php if (has_custom_logo()):
                the_custom_logo();
            else:

                $blog_info = get_bloginfo('name');
                $blog_description = get_bloginfo('description');
                $show_title = true === display_header_text();
                $header_class = $show_title
                    ? 'site-title'
                    : 'screen-reader-text';
                ?>
                <?php if ($blog_info): ?>
                    <?php if (is_front_page() && !is_paged()): ?>
                        <h1 class="<?php echo esc_attr($header_class); ?>">
                            <?php echo esc_html($blog_info); ?>
                        </h1>
                        <?php if (
                            honrix_get_control_value(
                                'honrix_header_description_display',
                                'yes'
                            ) == 'yes'
                        ): ?>
                            <span><?php echo esc_html(
                                $blog_description
                            ); ?></span>
                        <?php endif; ?>
                    <?php elseif (is_front_page() && !is_home()): ?>
                        <h1 class="<?php echo esc_attr($header_class); ?>">
                            <a href="<?php echo esc_url(
                                home_url('/')
                            ); ?>"><?php echo esc_html($blog_info); ?></a>
                        </h1>
                        <?php if (
                            honrix_get_control_value(
                                'honrix_header_description_display',
                                'yes'
                            ) == 'yes'
                        ): ?>
                            <span><?php echo esc_html(
                                $blog_description
                            ); ?></span>
                        <?php endif; ?>
                    <?php else: ?>
                        <h1 class="<?php echo esc_attr($header_class); ?>">
                            <a href="<?php echo esc_url(
                                home_url('/')
                            ); ?>"><?php echo esc_html($blog_info); ?></a>
                        </h1>
                        <?php if (
                            honrix_get_control_value(
                                'honrix_header_description_display',
                                'yes'
                            ) == 'yes'
                        ): ?>
                            <span><?php echo esc_html(
                                $blog_description
                            ); ?></span>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php
            endif; ?>
        </div>
        <div class='honrix-main-menu hs-w-60 hs-m-w-50 hs-m-justify-end'>
            <?php if (wp_is_mobile()): ?>
                <?php if (has_nav_menu('main-menu')): ?>
                    <nav class="navbar navbar-expand-md">
                        <button class="navbar-toggler btn-toggler-bar collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bscollapse" aria-controls="bscollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar top-bar"></span>
                            <span class="icon-bar middle-bar"></span>
                            <span class="icon-bar bottom-bar"></span>
                        </button>
                        <div id="bscollapse" class="navbar-box bcollapse navbar-collapse">
                            <button class="close navbar-toggler rounded-circle" data-bs-toggle="collapse" data-bs-target="#bscollapse" aria-controls="bscollapse" aria-expanded="false" aria-label="Toggle navigation">
                                <i class='fas fa-times'></i>
                            </button>
                            <?php wp_nav_menu([
                                'theme_location' => 'main-menu',
                                'container' => 'div',
                                'menu_class' => 'nav navbar-nav hs-flex wrap',
                            ]); ?>
                        </div>
                    </nav>
                <?php endif; ?>
            <?php else: ?>
                <?php if (has_nav_menu('main-menu')): ?>
                    <nav class="navbar navbar-expand-md">
                        <div id="bscollapse" class="navbar-box bcollapse navbar-collapse">
                            <?php wp_nav_menu([
                                'theme_location' => 'main-menu',
                                'container' => 'div',
                                'menu_class' => 'nav navbar-nav hs-flex wrap',
                            ]); ?>
                        </div>
                    </nav>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="honrix-cart-search hs-w-20 hs-flex hs-justify-end">
            <?php if(honrix_get_control_value('honrix_header_search_box_icon_display','yes')==='yes'): ?>
                <div class="honrix-search-button" tabindex="0">
                    <i class="fab fa-sistrix"></i>
                </div>
                <div class='honrix-search-box' tabindex="-1">
                    <?php get_search_form(); ?>
                </div>
            <?php endif; ?>
            <?php if (class_exists('WooCommerce')): ?>
                <div class="honrix-cart">
                    <a href="<?php echo esc_url(
                        wc_get_cart_url()
                    ); ?>" class="hs-flex">
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
                        <div class="cart-count-price">
                            <div class="cart-count">
                                <?php if (
                                    $count =
                                        WC()->cart->get_cart_contents_count() >
                                        1
                                ) {
                                    printf(
                                        esc_html__('%d Items', 'honrix'),
                                        $count
                                    );
                                } else {
                                    printf(
                                        esc_html__('%d Item', 'honrix'),
                                        $count
                                    );
                                } ?>
                            </div>
                            <div class="cart-price">
                                <?php echo WC()->cart->get_cart_total(); ?>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="honrix-mini-cart-details">
                    <?php if (class_exists('WooCommerce')): ?>
                        <div class="honrix-cart-products">
                            <div class="mini-cart-header">
                                <div class="">
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
                                    <span class="mini-cart-count">
                                        <?php if (
                                            $mcount =
                                                WC()->cart->get_cart_contents_count() >
                                                1
                                        ) {
                                            printf(
                                                esc_html__(
                                                    '%d Items',
                                                    'honrix'
                                                ),
                                                $mcount
                                            );
                                        } else {
                                            printf(
                                                esc_html__('%d Item', 'honrix'),
                                                $mcount
                                            );
                                        } ?>
                                    </span>
                                </div>
                                <div class="">
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