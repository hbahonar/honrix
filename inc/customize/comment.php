<?php
if (!function_exists('honrix_comment_customizer_register')) {
    function honrix_comment_customizer_register($wp_customize)
    {
        get_template_part('/inc/customize/class/Customizer');
        $customizer = new Honrix_Customizer_Control($wp_customize, 'honrix_comment', __('Comments', 'honrix'), 'honrix_general_settings_pannel');

        $customizer->start_section(array(
            'id' => 'honrix_comment_layout',
            'label' => __('Layout', 'honrix'),
        ));
        $customizer->create_control(array(
            'id' => 'honrix_comment_display',
            'default' => 'yes',
            'label'      => __('Comment', 'honrix'),
            'description' => __('Hide or display all comment section from posts and pages.', 'honrix'),
            'options' => array(
                'yes' => __('Show', 'honrix'),
                'no' => __('Hide', 'honrix')
            )
        ), Honrix_Customizer_Control::$SWITCH);

        $customizer->end_section('honrix_comment_layout');

        $customizer->start_section(array(
            'id' => 'honrix_comment_form',
            'label' => __('Form', 'honrix'),
        ));
        $customizer->create_control(array(
            'id' => 'honrix_comment_form_title',
            'default' => __('Leave a reply', 'honrix'),
            'label' => __('Form Title', 'honrix'),
            'description' => __('Add form title.', 'honrix')
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_comment_form_name',
            'default' => __('Name', 'honrix'),
            'label' => __('Name Field Text', 'honrix'),
            'description' => __('Add form name field text.', 'honrix')
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_comment_form_email',
            'default' => __('Email', 'honrix'),
            'label' => __('Email Field Text', 'honrix'),
            'description' => __('Add form email field text.', 'honrix')
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_comment_form_comment',
            'default' => __('Write a Comment', 'honrix'),
            'label' => __('Comment Field Text', 'honrix'),
            'description' => __('Add form comment field text.', 'honrix')
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_comment_form_submit',
            'default' => __('Send Review', 'honrix'),
            'label' => __('Submit Button Text', 'honrix'),
            'description' => __('Add form submit button text.', 'honrix')
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_comment_close_message',
            'default' => __('Comments are closed for this section.', 'honrix'),
            'label' => __('Comment Closed Message', 'honrix'),
                'description' => __('Write close comment message in here to display when comments are closed for post or page. Leave it blank to display none.', 'honrix'),
        ), Honrix_Customizer_Control::$TEXTAREA);
        $customizer->end_section('honrix_comment_form');
    }

    add_action('customize_register', 'honrix_comment_customizer_register');
}
