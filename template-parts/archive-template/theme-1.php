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
            $width = 'w-100 w-md-50';
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
<article class="post-<?php the_ID(); ?> <?php echo esc_html($width); ?> text-center ps-2 pe-2 mb-4 honrix-<?php echo esc_html(get_post_format()); ?>">
    <?php
    honrix_post_thumbnail(); ?>
    <div class="entry-content-box p-4 pt-3 d-flex flex-wrap justify-content-center clearfix">
        <?php if (honrix_get_control_value('honrix_archive_display_date', 'yes') == 'yes') : ?>
            <div class="mb-3 w-100 clearfix text-start">
                <?php honrix_entry_published_date(); ?>
            </div>
        <?php endif; ?>
        <?php honrix_entry_title("start"); ?>
        <?php if (honrix_get_control_value('honrix_archive_display_meta', 'yes') == 'yes' || honrix_get_control_value('honrix_archive_display_date', 'yes') == 'yes') : ?>
            <div class="entry-meta mb-3 w-100 clearfix text-start">
                <?php

                // if (honrix_get_control_value('honrix_archive_display_author', 'yes') == 'yes') :
                //     honrix_entry_author();
                // endif;
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
            <?php honrix_entry_share_buttons(); ?>
        <?php endif; ?>
        <?php if (honrix_get_control_value('honrix_archive_display_content', 'yes') == 'yes') : ?>
            <?php honrix_entry_content(); ?>
        <?php endif; ?>

        <?php if ($share_button_display && ($share_button_place == 'after' || $share_button_place == 'both')) : ?>
            <?php honrix_entry_share_buttons(); ?>
        <?php endif; ?>
        <div class="entry-footer pt-3 mb-3 clearfix w-100 d-flex align-items-center">
            <?php if (honrix_get_control_value('honrix_archive_content_display_read_more', 'yes') == 'yes') : ?>
                <div class="entry-read-more w-100 justify-content-end text-start">
                    <a href="<?php echo esc_url(get_permalink()) ?>" rel="bookmark" class=""><?php echo esc_html(honrix_get_control_value('honrix_archive_content_read_more_text', __('Continue Reading...', 'honrix'))) ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</article>