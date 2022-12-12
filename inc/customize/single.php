<?php
if (!function_exists('honrix_post_customizer_register')) {
    function honrix_post_customizer_register($wp_customize)
    {
        get_template_part('/inc/customize/class/Customizer');
        $customizer = new Honrix_Customizer_Control($wp_customize, 'honrix_post', __('Post & Page', 'honrix'), 'honrix_general_settings_pannel');

        // $customizer->create_control(array(
        //     'id' => 'honrix_post_width',
        //     'default' => 'boxed',
        //     'label'      => __('Width', 'honrix'),
        //     'description' => __('Choose the width of the Post content.', 'honrix'),
        //     'options' => array(
        //         'boxed' => __('Boxed', 'honrix'),
        //         'wide' => __('Wide', 'honrix')
        //     )
        // ), Honrix_Customizer_Control::$SWITCH);

        $customizer->start_section(array(
            'id' => 'honrix_post_layout',
            'label' => __('Layout', 'honrix'),
        ));

        $customizer->create_control(array(
            'id' => 'honrix_post_theme',
            'default' => '1',
            'label' => __('Theme', 'honrix'),
            'description' => __('Choose post theme.', 'honrix'),
            'options' => array(
                '1' => __('Theme One', 'honrix'),
                // '2' => __('Theme Two', 'honrix'),
                // '3' => __('Theme Three', 'honrix'),
                // '4' => __('Theme Four', 'honrix')
            )
        ), Honrix_Customizer_Control::$SELECT);

        $customizer->end_section('honrix_post_layout');

        $customizer->start_section(array(
            'id' => 'honrix_post_post',
            'label' => __('Post & Page', 'honrix'),
        ));
        $customizer->create_control(array(
            'id' => 'honrix_post_date_display',
            'default' => 'yes',
            'label'      => __('Date', 'honrix'),
            'description' => __('Hide or display date of the post.', 'honrix'),
            'options' => array(
                'yes' => __('Show', 'honrix'),
                'no' => __('Hide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->create_control(array(
            'id' => 'honrix_post_date_title',
            'default' => __('Posted On: ', 'honrix'),
            'label' => __('Date Title', 'honrix'),
            'description' => __('Add title.', 'honrix')
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_post_author_display',
            'default' => 'yes',
            'label'      => __('Author (Only in Post)', 'honrix'),
            'description' => __('Hide or display author section of the post.', 'honrix'),
            'options' => array(
                'yes' => __('Show', 'honrix'),
                'no' => __('Hide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->create_control(array(
            'id' => 'honrix_post_author_title',
            'default' => __('Posted By: ', 'honrix'),
            'label' => __('Author Title', 'honrix'),
            'description' => __('Add title.', 'honrix')
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_post_category_display',
            'default' => 'yes',
            'label'      => __('Category (Only in Post)', 'honrix'),
            'description' => __('Hide or display categories of the post.', 'honrix'),
            'options' => array(
                'yes' => __('Show', 'honrix'),
                'no' => __('Hide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->create_control(array(
            'id' => 'honrix_post_tag_display',
            'default' => 'yes',
            'label'      => __('Tags (Only in Post)', 'honrix'),
            'description' => __('Hide or display tags of the post.', 'honrix'),
            'options' => array(
                'yes' => __('Show', 'honrix'),
                'no' => __('Hide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->create_control(array(
            'id' => 'honrix_post_tag_title',
            'default' => __('tags:', 'honrix'),
            'label' => __('Tag Title (Only in Post)', 'honrix'),
            'description' => __('Write tag title. Default is "Tags:". Leave blank if you want to hide.', 'honrix')
        ), Honrix_Customizer_Control::$TEXT);

        if (defined('HONRIX_CORE_URL')) {
            $customizer->create_control(array(
                'id' => 'honrix_share_bottuns_post_display',
                'default' => 'yes',
                'label'      => __('Share Buttons in post', 'honrix'),
                'description' => __('Hide or display share buttons only in post not others places like archive or blog.', 'honrix'),
                'options' => array(
                    'yes' => __('Show', 'honrix'),
                    'no' => __('Hide', 'honrix')
                )
            ), Honrix_Customizer_Control::$SWITCH);

            $customizer->create_control(array(
                'id' => 'honrix_share_bottuns_post_place',
                'default' => 'after',
                'label'      => __('Share Buttons Display Place', 'honrix'),
                'description' => __('Choose where to display.', 'honrix'),
                'options' => array(
                    'after' => __('After Content', 'honrix'),
                    'before' => __('Before Content', 'honrix'),
                    'both' => __('Both', 'honrix')
                )
            ), Honrix_Customizer_Control::$SWITCH);

            $customizer->create_control(array(
                'id' => 'honrix_post_share_title',
                'default' => __('Share:', 'honrix'),
                'label' => __('Share Title', 'honrix'),
                'description' => __('Write share title. Default is "Share:". Leave blank if you want to hide.', 'honrix')
            ), Honrix_Customizer_Control::$TEXT);
        }

        $customizer->create_control(array(
            'id' => 'honrix_post_navigation_display',
            'default' => 'yes',
            'label'      => __('Navigation', 'honrix'),
            'description' => __('Hide or display navigation section of the post.', 'honrix'),
            'options' => array(
                'yes' => __('Show', 'honrix'),
                'no' => __('Hide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->create_control(array(
            'id' => 'honrix_post_navigation_prev_title',
            'default' => __('Previous Article', 'honrix'),
            'label' => __('Previous Page Title', 'honrix'),
            'description' => __('Previous Post Title in navigation. Leave blank if you want to hide.', 'honrix')
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_post_navigation_next_title',
            'default' => __('Next Article', 'honrix'),
            'label' => __('Next Post Title', 'honrix'),
            'description' => __('Next Post Title in navigation. Leave blank if you want to hide.', 'honrix')
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_post_related_posts_display',
            'default' => 'yes',
            'label'      => __('Related Posts (Only in Post)', 'honrix'),
            'description' => __('Hide or display related posts section.', 'honrix'),
            'options' => array(
                'yes' => __('Show', 'honrix'),
                'no' => __('Hide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->create_control(array(
            'id' => 'honrix_post_related_posts_title',
            'default' => __('Related Posts', 'honrix'),
            'label' => __('Related Posts Title (Only in Post)', 'honrix'),
            'description' => __('Leave blank if you want to hide.', 'honrix')
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_post_related_posts_column',
            'default' => '3',
            'label' => __('Related Posts Columns (Only in Post)', 'honrix'),
            'description' => __('Display how many related posts.', 'honrix'),
            'options' => array(
                '2' => __('2', 'honrix'),
                '3' => __('3', 'honrix'),
                '4' => __('4', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->create_control(array(
            'id' => 'honrix_post_related_posts_count',
            'default' => '3',
            'label' => __('Related Posts Count (Only in Post)', 'honrix'),
            'description' => __('Display how many related posts.', 'honrix')
        ), Honrix_Customizer_Control::$NUMBER);

        $customizer->create_control(array(
            'id' => 'honrix_post_related_posts_meta_display',
            'default' => 'yes',
            'label'      => __('Related Posts Meta (Only in Post)', 'honrix'),
            'description' => __('Hide or display related posts meta section.', 'honrix'),
            'options' => array(
                'yes' => __('Show', 'honrix'),
                'no' => __('Hide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);
        $customizer->end_section('honrix_post_post');
    }
    add_action('customize_register', 'honrix_post_customizer_register');
}
