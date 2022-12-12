<?php
if (!function_exists('honrix_archive_customizer_register')) {
    function honrix_archive_customizer_register($wp_customize)
    {
        get_template_part('/inc/customize/class/Customizer');
        $customizer = new Honrix_Customizer_Control($wp_customize, 'honrix_archive', __('Archive', 'honrix'), 'honrix_general_settings_pannel');

        // $customizer->create_control(array(
        //     'id' => 'honrix_archive_title_display',
        //     'default' => 'yes',
        //     'label'      => __('Page Title', 'honrix'),
        //     'description' => __('Hide or display Archive Page Title.', 'honrix'),
        //     'options' => array(
        //         'yes' => __('Show', 'honrix'),
        //         'no' => __('Hide', 'honrix')
        //     )
        // ), Honrix_Customizer_Control::$SWITCH);

        // $customizer->create_control(array(
        //     'id' => 'honrix_archive_title_width',
        //     'default' => 'boxed',
        //     'label'      => __('Width', 'honrix'),
        //     'description' => __('Choose the width of the Archive Page Title.', 'honrix'),
        //     'options' => array(
        //         'boxed' => __('Boxed', 'honrix'),
        //         'wide' => __('Wide', 'honrix')
        //     )
        // ), Honrix_Customizer_Control::$SWITCH);

        // $customizer->create_control(array(
        //     'id' => 'honrix_archive_title_align',
        //     'default' => 'center',
        //     'label'      => __('Title Text Align', 'honrix'),
        //     'description' => __('Choose the text align of the Archive Page Title.', 'honrix'),
        //     'options' => array(
        //         'left' => __('Left', 'honrix'),
        //         'center' => __('Center', 'honrix'),
        //         'right' => __('Right', 'honrix')
        //     )
        // ), Honrix_Customizer_Control::$SWITCH);

        // $customizer->create_control(array(
        //     'id' => 'honrix_archive_title_bg_color',
        //     'default' => '#' . esc_attr(get_background_color()),
        //     'label' => __('Title Background Color', 'honrix'),
        //     'description' => __('Change Archive Page Title background color.', 'honrix')
        // ), Honrix_Customizer_Control::$COLOR);

        // $customizer->create_control(array(
        //     'id' => 'honrix_archive_title_text_color',
        //     'default' => honrix_get_control_value('honrix_theme_second_color', '#333333'),
        //     'label' => __('Title Text Color', 'honrix'),
        //     'description' => __('Change Archive Page Title text color.', 'honrix')
        // ), Honrix_Customizer_Control::$COLOR);

        // $customizer->create_control(array(
        //     'id' => 'honrix_archive_title_term_color',
        //     'default' => honrix_get_control_value('honrix_theme_second_color', '#333333'),
        //     'label' => __('Title Term Color', 'honrix'),
        //     'description' => __('Change Archive Page Title term color.', 'honrix')
        // ), Honrix_Customizer_Control::$COLOR);

        // $customizer->create_control(array(
        //     'id' => 'honrix_archive_mode',
        //     'default' => 'grid',
        //     'label'      => __('Layout', 'honrix'),
        //     'description' => __('Choose Archive Page layout.', 'honrix'),
        //     'options' => array(
        //         'grid' => __('Grid', 'honrix'),
        //         'masonry' => __('Masonry', 'honrix'),
        //         'list' => __('List', 'honrix')
        //     )
        // ), Honrix_Customizer_Control::$SWITCH);

        $customizer->start_section(array(
            'id' => 'honrix_archive_layout',
            'label' => __('Layout', 'honrix'),
        ));
        $customizer->create_control(array(
            'id' => 'honrix_archive_theme',
            'default' => '1',
            'label' => __('Theme', 'honrix'),
            'description' => __('Choose posts theme.', 'honrix'),
            'options' => array(
                '1' => __('Theme One', 'honrix'),
                // '2' => __('Theme Two', 'honrix'),
                // '3' => __('Theme Three', 'honrix'),
                // '4' => __('Theme Four', 'honrix')
            )
        ), Honrix_Customizer_Control::$SELECT);

        $customizer->create_control(array(
            'id' => 'honrix_archive_columns',
            'default' => '2',
            'label' => __('Columns', 'honrix'),
            'description' => __('Choose columns to display.', 'honrix'),
            'options' => array(
                '1' => __('One', 'honrix'),
                '2' => __('Two', 'honrix'),
                '3' => __('Three', 'honrix'),
                '4' => __('Four', 'honrix')
            )
        ), Honrix_Customizer_Control::$SELECT);

        $customizer->end_section('honrix_archive_layout');

        $customizer->start_section(array(
            'id' => 'honrix_archive_post',
            'label' => __('Post', 'honrix'),
        ));
        $customizer->create_control(array(
            'id' => 'honrix_archive_thumbnail_ratio',
            'default' => '2',
            'label' => __('Thumbnail Ratio', 'honrix'),
            'description' => __('Choose thumbnail ratio.', 'honrix'),
            'options' => array(
                '1' => __('1:1', 'honrix'),
                '2' => __('4:3', 'honrix'),
                '3' => __('16:9', 'honrix'),
                '4' => __('21:9', 'honrix'),
                '5' => __('Full', 'honrix')
            )
        ), Honrix_Customizer_Control::$SELECT);

        if (defined('HONRIX_CORE_URL')) {
            $customizer->create_control(array(
                'id' => 'honrix_share_bottuns_archive_display',
                'default' => 'yes',
                'label'      => __('Share Buttons in archive', 'honrix'),
                'description' => __('Hide or display share buttons only in archive posts not others or even post or page.', 'honrix'),
                'options' => array(
                    'yes' => __('Show', 'honrix'),
                    'no' => __('Hide', 'honrix')
                )
            ), Honrix_Customizer_Control::$SWITCH);

            $customizer->create_control(array(
                'id' => 'honrix_share_bottuns_archive_place',
                'default' => 'after',
                'label'      => __('Share Buttons Display Place', 'honrix'),
                'description' => __('Choose where to display.', 'honrix'),
                'options' => array(
                    'after' => __('After Content', 'honrix'),
                    'before' => __('Before Content', 'honrix'),
                    'both' => __('Both', 'honrix')
                )
            ), Honrix_Customizer_Control::$SWITCH);
        }

        $customizer->create_control(array(
            'id' => 'honrix_archive_display_category',
            'default' => 'yes',
            'label'      => __('Category', 'honrix'),
            'description' => __('Hide or display category name of the posts.', 'honrix'),
            'options' => array(
                'yes' => __('Show', 'honrix'),
                'no' => __('Hide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        // $customizer->create_control(array(
        //     'id' => 'honrix_archive_display_author',
        //     'default' => 'yes',
        //     'label'      => __('Author', 'honrix'),
        //     'description' => __('Hide or display author name of the posts.', 'honrix'),
        //     'options' => array(
        //         'yes' => __('Show', 'honrix'),
        //         'no' => __('Hide', 'honrix')
        //     )
        // ), Honrix_Customizer_Control::$SWITCH);

        $customizer->create_control(array(
            'id' => 'honrix_archive_display_date',
            'default' => 'yes',
            'label'      => __('Post Date', 'honrix'),
            'description' => __('Hide or display date of the posts.', 'honrix'),
            'options' => array(
                'yes' => __('Show', 'honrix'),
                'no' => __('Hide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->create_control(array(
            'id' => 'honrix_archive_display_content',
            'default' => 'yes',
            'label'      => __('Post Content', 'honrix'),
            'description' => __('Hide or display content of the posts.', 'honrix'),
            'options' => array(
                'yes' => __('Show', 'honrix'),
                'no' => __('Hide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->create_control(array(
            'id' => 'honrix_archive_content_length',
            'default' => '50',
            'label' => __('Content Length (word)', 'honrix'),
            'description' => __('Change the length of the content.', 'honrix')
        ), Honrix_Customizer_Control::$NUMBER);

        $customizer->create_control(array(
            'id' => 'honrix_archive_content_excerpt_end',
            'default' => '...',
            'label' => __('Excerpt [...]', 'honrix'),
            'description' => __('Type words to display in the end of the excerpt. Leave empty to delete the end word.', 'honrix'),
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_archive_content_display_read_more',
            'default' => 'yes',
            'label'      => __('Read More', 'honrix'),
            'description' => __('Hide or display read more button of the posts.', 'honrix'),
            'options' => array(
                'yes' => __('Show', 'honrix'),
                'no' => __('Hide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->create_control(array(
            'id' => 'honrix_archive_content_read_more_text',
            'default' => __('continue reading...', 'honrix'),
            'label' => __('Read More Text', 'honrix'),
            'description' => __('Change the text of the read more button.', 'honrix')
        ), Honrix_Customizer_Control::$TEXT);

        // if(defined('HONRIX_CORE_URL')){ 
        //     $customizer->create_control(array(
        //         'id' => 'honrix_archive_like_button',
        //         'default' => 'yes',
        //         'label'      => __('Like Button', 'honrix'),
        //         'description' => __('Hide or display like button of the posts.', 'honrix'),
        //         'options' => array(
        //             'yes' => __('Show', 'honrix'),
        //             'no' => __('Hide', 'honrix')
        //         )
        //     ), Honrix_Customizer_Control::$SWITCH);
        // }

        // if (class_exists('Post_Views_Counter')) {
        //     $customizer->create_control(array(
        //         'id' => 'honrix_archive_view_count',
        //         'default' => 'yes',
        //         'label'      => __('View Count', 'honrix'),
        //         'description' => __('Hide or display view count of the posts.', 'honrix'),
        //         'options' => array(
        //             'yes' => __('Show', 'honrix'),
        //             'no' => __('Hide', 'honrix')
        //         )
        //     ), Honrix_Customizer_Control::$SWITCH);
        // }

        // $customizer->create_control(array(
        //     'id' => 'honrix_archive_comment_count',
        //     'default' => 'yes',
        //     'label'      => __('Comments Count', 'honrix'),
        //     'description' => __('Hide or display comments count of the posts.', 'honrix'),
        //     'options' => array(
        //         'yes' => __('Show', 'honrix'),
        //         'no' => __('Hide', 'honrix')
        //     )
        // ), Honrix_Customizer_Control::$SWITCH);

        $customizer->end_section('honrix_archive_post');
    }

    add_action('customize_register', 'honrix_archive_customizer_register');
}

if (!function_exists('honrix_archive_customizer_css')) {
    function honrix_archive_customizer_css()
    {
?>
        <style type="text/css">
            .honrix-archive-title {
                background: <?php echo esc_attr(honrix_get_control_value('honrix_archive_title_bg_color', 'var(--honrix-background-color)')); ?> !important;
            }

            .honrix-archive-title h1,
            .honrix-archive-title .archive-description {
                color: <?php echo esc_attr(honrix_get_control_value('honrix_archive_title_text_color', 'var(--honrix-text-color)')); ?> !important;
                text-align: <?php echo esc_attr(honrix_get_control_value('honrix_archive_title_align', 'center')); ?> !important;
            }

            .honrix-archive-title span {
                color: <?php echo esc_attr(honrix_get_control_value('honrix_archive_title_term_color', 'var(--honrix-theme-color)')); ?> !important;
            }
        </style>
<?php
    }

    add_action('wp_head', 'honrix_archive_customizer_css');
}
