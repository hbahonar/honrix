<?php
/*
 * Template for displaying comments for posts
 *
 * package Hooya
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php
    $comment_args = array(
        'title_reply' => honrix_get_control_value('honrix_comment_form_title', __('Leave a reply', 'honrix')),
        'fields' => apply_filters('comment_form_default_fields', array(
            'author' => '<div class="comment-form-info pt-3 d-flex"><p class="comment-form-author w-50 pe-2">' .
                '<input id="author" class="w-100 p-3" name="author" placeholder="' . honrix_get_control_value('honrix_comment_form_name', esc_html__('Name', 'honrix')) . ($req ? ' *' : '') . '" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" /></p>',
            'email' => '<p class="comment-form-email w-50 ps-2">' .
                '<input id="email" class="w-100 p-3" name="email" placeholder="' . honrix_get_control_value('honrix_comment_form_email', esc_html__('Email', 'honrix')) . ($req ? ' *' : '') . '" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" />' . '</p></div>',
            'url' => ''
        )),
        'comment_field' => '<p class="comment-form-comment w-100">' .
            '<textarea id="comment" class="w-100 p-3" rows="8" placeholder="' . honrix_get_control_value('honrix_comment_form_comment', esc_html__('Write a Comment', 'honrix')) . ' *" name="comment" cols="45" aria-required="true"></textarea>' .
            '</p>',
        'comment_notes_after' => '',
        'comment_notes_before' => '',
    );
    comment_form($comment_args);
    ?>
    <?php if (have_comments()) { /* check the post has comment*/ ?>
        <h3 class="comments-title pt-3 mt-5">
            <?php
            $comments_number = get_comments_number(); ?>
            <?php if ('0' === $comments_number) : ?>
                <?php esc_html_e("0 Comment", 'honrix') ?>
            <?php elseif ('1' === $comments_number) : ?>
                <?php esc_html_e("One Comment", 'honrix') ?>
            <?php else : ?>
                <?php echo esc_html($comments_number); ?><?php esc_html_e(" Comments", 'honrix') ?>
            <?php endif; ?>
            <span></span>
        </h3>

        <ul class="comment-list pt-3 p-0 m-0 mt-3">
            <?php
            wp_list_comments(
                array(
                    'short_ping' => true,
                    'avatar_size' => 70,
                    'callback' => 'honrix_custom_comment_list'
                )
            );
            ?>
        </ul>

        <div class="comment-pagination">
            <?php paginate_comments_links(array('prev_text' => __('<i class="fa fa-angle-left"></i>', 'honrix'), 'next_text' => __('<i class="fa fa-angle-right"></i>', 'honrix'))); ?>
        </div>

    <?php }
    ?>

</div>