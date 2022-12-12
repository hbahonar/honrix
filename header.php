<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head();
    ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class='honrix-site'>
        <a class='honrix-skip-link screen-reader-text' href='#content'>
            <?php
            echo esc_html(honrix_get_control_value('honrix_general_skip_link_text', __('go to content', 'honrix')));
            ?>
        </a>
        <?php if (honrix_get_control_value('honrix_general_to_top_display','yes') == 'yes') : ?>
            <button class='honrix-to-top-button' onclick='window.scrollTo({top: 0, behavior: "smooth"});'>
                <i class="<?php
                            echo esc_attr(honrix_get_control_value('honrix_general_to_top_text', 'fas fa-chevron-up'));
                            ?>"></i>
            </button>
        <?php endif;

        $header_image_url = header_image();
        ?>
        <header class='honrix-header <?php echo honrix_get_control_value('honrix_header_sticky', 'yes') == 'yes' ? 'honrix-sticky-header' : ''; ?> w-100 <?php echo esc_attr('theme-' . honrix_get_control_value('honrix_header_theme', '1')); ?>' <?php echo !empty($header_image_url) ? 'style="background-image:url(' . esc_url($header_image_url) . ')"' : ''; ?>>
            <?php get_template_part('template-parts/header-template/theme'); ?>
        </header>