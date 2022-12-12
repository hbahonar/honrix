<?php

/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package honrix
 */
?>
</div>
<?php 
$is_footer_active = false;
for ($counter = 1; $counter <= honrix_get_control_value('honrix_footer_columns', '3'); $counter++) {
    if (is_active_sidebar('footer' . $counter)) {
        $is_footer_active = true;
    }
} ?>
<?php if (honrix_get_control_value('honrix_footer_display', 'yes') == 'yes') : ?>
    <?php if ($is_footer_active) : ?>
        <footer class="site-footer">
            <div class="inner-footer d-flex flex-wrap <?php echo honrix_get_control_value('honrix_footer_width', honrix_get_control_value('honrix_boxed', 'boxed')) == 'boxed' ? 'container' : 'container-fluid'; ?>">
                <?php for ($counter = 1; $counter <= honrix_get_control_value('honrix_footer_columns', '3'); $counter++) : ?>
                    <div class="footer pe-md-5 col-12 col-md-<?php echo esc_html(12 / honrix_get_control_value('honrix_footer_columns', '3')); ?>">
                        <?php if (is_active_sidebar('footer' . $counter)) : ?>
                            <?php dynamic_sidebar('footer' . $counter); ?>
                        <?php endif; ?>
                    </div>
                <?php endfor; ?>
            </div>
        </footer>
    <?php endif; ?>
<?php endif; ?>
<?php if (honrix_get_control_value('honrix_copy_right_display', 'yes') == 'yes') : ?>
    <div class="site-copyright pt-3 pb-3">
        <div class="inner-copyright d-flex align-items-center <?php echo honrix_get_control_value('honrix_copy_right_width', honrix_get_control_value('honrix_boxed', 'boxed')) == 'boxed' ? 'container' : 'container-fluid'; ?>">
            <div class="row w-100">
                <?php
                $copyright = honrix_get_control_value('honrix_copyright_text', '© {year} {site_name}');
                if (!empty($copyright)) :
                ?>
                    <div class="copyright col-12 col-md-6 text-center text-md-start">
                        <?php
                        $copyright = str_replace("{year}", date("Y"), $copyright);
                        $copyright = str_replace("{site_name}", get_bloginfo('name'), $copyright);
                        $copyright = str_replace("{description}", get_bloginfo('description'), $copyright);

                        echo wp_kses_post($copyright);
                        ?>
                    </div>
                <?php endif; ?>
                <?php if (has_nav_menu('copyright-menu')) : ?>
                    <div class="copyright-menu col-12 col-md-6 pt-3 pt-md-0 text-center text-md-end">
                        <?php
                        wp_nav_menu(array(
                            'menu' => 'copyright-menu',
                            'theme_location' => 'copyright-menu',
                            'container' => 'ul'
                        ));
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php wp_footer(); ?>

</body>

</html>