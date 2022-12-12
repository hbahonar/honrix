<?php
$width = honrix_get_control_value('honrix_archive_columns', '2');

if (honrix_get_control_value('honrix_archive_mode', 'grid') == 'list') {
    $width = 'w-100';
} else {
    switch ($width) {
        case '1':
            $width = 'w-100';
            break;
        case '2':
            $width = 'w-50';
            break;
        case '3':
            $width = 'w-33';
            break;
        case '4':
            $width = 'w-25';
            break;
    }
}


?>
<article class="post-<?php the_ID(); ?> <?php echo esc_html($width); ?> ps-3 pe-3 mb-4 honrix-<?php echo esc_html(get_post_format()); ?>">
    <?php
    honrix_post_thumbnail(); ?>
    <div class="entry-content-box pb-4 d-flex flex-wrap clearfix">
        <?php honrix_entry_title("start"); ?>
        <?php if (honrix_get_control_value('honrix_archive_display_meta', 'yes') == 'yes' || honrix_get_control_value('honrix_archive_display_date', 'yes') == 'yes') : ?>
            <div class="entry-meta mb-3 w-100 clearfix">
                <?php
                if (honrix_get_control_value('honrix_archive_display_date', 'yes') == 'yes') :
                    honrix_entry_published_date();
                endif;
                if (honrix_get_control_value('honrix_archive_display_author', 'yes') == 'yes') :
                    honrix_entry_author();
                endif;
                if (honrix_get_control_value('honrix_archive_display_category', 'yes') == 'yes') :
                    honrix_entry_category();
                endif; ?>
            </div>
        <?php
        endif;


        $share_button_display = honrix_get_control_value('honrix_share_bottuns_archive_display', 'yes') == 'yes';
        $share_button_place =  honrix_get_control_value('honrix_share_bottuns_archive_place', 'after');
        ?>
        <?php if ($share_button_display && ($share_button_place == 'before' || $share_button_place == 'both')) : ?>
            <?php honrix_entry_share_buttons("start"); ?>
        <?php endif; ?>
        <?php if (honrix_get_control_value('honrix_archive_display_content', 'yes') == 'yes') : ?>
            <?php honrix_entry_content(); ?>
        <?php endif; ?>

        <?php if ($share_button_display && ($share_button_place == 'after' || $share_button_place == 'both')) : ?>
            <?php honrix_entry_share_buttons("start"); ?>
        <?php endif; ?>
        <div class="entry-footer pt-3 mb-3 clearfix w-100 d-flex align-items-center">
            <div class="entry-like-view w-50 justify-content-start text-start d-flex">
                <?php
                if (defined('HONRIX_CORE_URL')) {
                    echo wp_kses_post(honrix_core_get_simple_likes_button(get_the_ID()));
                } ?>
                <?php
                if (class_exists('Post_Views_Counter')) {
                    echo do_shortcode('[post-views]');
                }
                ?>
                <?php if (comments_open()) : ?>
                    <div class="entry-comment d-flex align-items-center">
                        <i class="fas fa-comments"></i>
                        <div class="comment-count"><?php echo esc_html(get_comments_number()); ?></div>
                    </div>
                <?php endif; ?>
            </div>
            <?php if (honrix_get_control_value('honrix_archive_content_display_read_more', 'yes') == 'yes') : ?>
                <div class="entry-read-more w-50 justify-content-end text-end">
                    <a href="<?php echo esc_url(get_permalink()) ?>" rel="bookmark" class=""><?php echo esc_html(honrix_get_control_value('honrix_archive_content_read_more_text', __('Continue Reading...', 'honrix'))) ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</article>