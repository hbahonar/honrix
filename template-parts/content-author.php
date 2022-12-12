<?php

/**
 * Honrix author
 *
 * @package honrix
 */
$email = get_the_author_meta('user_email');
if (get_avatar($email, 160) != '') {
    $author_avatar = get_avatar($email, 160);
}
$author_profile_url = get_author_posts_url(get_the_author_meta('ID'));
?>
<?php
if (honrix_get_control_value('honrix_display_breadcrumb', 'no') == 'yes') {
    honrix_breadcrumb();
} ?>
<?php if (isset($author_avatar)) : ?>
    <div class="honrix-author">
        <div class="avatar"><?php echo wp_kses_post($author_avatar); ?></div>
        <div class="name"><?php echo get_the_author(); ?></div>
        <div class="description"><?php the_author_meta('description'); ?></div>
        <div class="social-media">
            <?php
            $social_icons_list = '';

            if ($email) {
                $social_icons_list .= '<a rel="nofollow noreferrer" href="mailto:' . esc_url($email) . '" target="_blank" class="social_icon social_email social_icon_email" ><i class="fa fa-envelope"></i></a>';
            }
            // Website
            if ($url_link = get_the_author_meta('url')) {
                $social_icons_list .= '<a rel="nofollow noreferrer" href="' . esc_url($url_link) . '" target="_blank" class="social_icon social_url social_icon_url" ><i class="fa fa-globe"></i></a>';
            }

            // Facebook
            if ($facebook_link = get_the_author_meta('facebook')) {

                if (!strrpos($facebook_link, 'facebook.com') && !strrpos($facebook_link, 'fb.com')) {
                    $facebook = "https://facebook.com/" . $facebook_link;
                } else {
                    $facebook = $facebook_link;
                }

                $social_icons_list .= '<a target="_blank" rel="nofollow noreferrer" href="' . esc_url($facebook) . '" class="social_icon social_facebook social_icon_facebook" ><i class="fa fa-facebook"></i></a>';
            }

            // Twitter
            if ($twitter_link = get_the_author_meta('twitter')) {
                if (!strrpos($twitter_link, 'twitter.com') && !strrpos($twitter_link, 'twt.com')) {

                    if (strpos($twitter_link, '@')) {
                        $twitter = str_replace('@', '', $twitter_link);
                    } else {
                        $twitter = $twitter_link;
                    }
                    $twitter = 'https://twitter.com/' . $twitter;
                } else {
                    $twitter = $twitter_link;
                }

                $social_icons_list .= '<a rel="nofollow noreferrer" href="' . esc_url($twitter) . '" target="_blank" class="social_icon social_twitter social_icon_twitter"><i class="fa fa-twitter"></i></a>';
            }

            // Google+
            if (get_the_author_meta('gplus') != "") {
                $social_icons_list .= '<a rel="nofollow noreferrer" href="' . esc_url(get_the_author_meta('gplus')) . '" target="_blank" class="social_icon social_gplus social_icon_gplus"><i class="fa fa-google-plus"></i></a>';
            }

            // Linkedin
            if (get_the_author_meta('linkedin') != "") {
                $social_icons_list .= '<a rel="nofollow noreferrer" href="' . esc_url(get_the_author_meta('linkedin')) . '" target="_blank" class="social_icon social_linkedin social_icon_linkdin"><i class="fa fa-linkedin"></i></a>';
            }

            // Pinterest
            if (get_the_author_meta('pinterest') != "") {
                $social_icons_list .= '<a rel="nofollow noreferrer" href="' . esc_url(get_the_author_meta('pinterest')) . '" class="social_icon social_pinterest social_icon_pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>';
            }

            // Social Icons List if any exists
            if ($social_icons_list != '') {
                echo '<div class="social_icons_list">' . wp_kses_post($social_icons_list) . '</div>';
            }
            ?></div>
    </div>




<?php endif; ?>
<div id="content" class="honrix-content honrix-archive d-flex flex-wrap pt-4 pb-4 <?php echo honrix_get_control_value('honrix_boxed', 'boxed') == 'boxed' ? 'honrix-boxed' : ''; ?>">
    <?php is_rtl() ? get_sidebar('right') : get_sidebar('left'); ?>
    <div class="honrix-entries arcive-theme-<?php echo esc_attr(honrix_get_control_value('honrix_archive_theme','1')); ?>">
        <?php
        $columns = 'column-' . honrix_get_control_value('honrix_archive_columns', '2');
        if (honrix_get_control_value('honrix_archive_mode', 'grid') == 'list') {
            $columns = 'column-1';
        }
        ?>
        <div class="posts honrix-<?php echo esc_attr(honrix_get_control_value('honrix_archive_mode', 'grid')); ?> <?php echo esc_html($columns); ?>">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) :/* loop start*/
                    the_post(); ?>
                    <?php get_template_part('/template-parts/archive-template/theme', honrix_get_control_value('honrix_archive_theme', '1')); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <?php honrix_entries_pagination(); ?>

    </div>
    <?php is_rtl() ? get_sidebar('left') : get_sidebar('right'); ?>
</div>