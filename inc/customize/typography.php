<?php
if (!function_exists('honrix_typography_customizer_register')) {
    function honrix_typography_customizer_register($wp_customize)
    {
        get_template_part('/inc/customize/class/Customizer');
        $customizer = new Honrix_Customizer_Control($wp_customize, 'honrix_typography_body', __('Typography', 'honrix'), 'honrix_general_settings_pannel');

        /* body font */
        $customizer->start_section(array(
            'id' => 'honrix_typography_body_text',
            'label' => __('Body Text', 'honrix'),
        ));

        $customizer->create_control(array(
            'id' => 'honrix_body_font',
            'default' => '',
            'label' => __('Font', 'honrix'),
            'description' => sprintf(
                '%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s The url will be like "https://fonts.googleapis.com/css2?family=Lato&display=swap".',
                __('Insert', 'honrix'),
                esc_url('https://www.google.com/fonts'),
                __('Google Font URL', 'honrix'),
                __('or custom font url from your website or other website, for embed fonts.', 'honrix')
            )
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_body_font_family',
            'default' => 'Helvetica',
            'label' => __('Font Family', 'honrix'),
            'description' => __('The font family should be like <strong>Lato, sans-serif</strong> without \' or ".', 'honrix')
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_body_font_size',
            'default' => '14',
            'label' => __('Font Size (px)', 'honrix'),
            'description' => __('Change font size of the content text to increase better user experience.', 'honrix')
        ), Honrix_Customizer_Control::$NUMBER);

        $customizer->create_control(array(
            'id' => 'honrix_body_line_height',
            'default' => '1.2',
            'label' => __('Line Height', 'honrix'),
            'description' => __('Change line height of the content text to increase better user experience.', 'honrix')
        ), Honrix_Customizer_Control::$NUMBER);

        $customizer->create_control(array(
            'id' => 'honrix_body_letter_space',
            'default' => '0',
            'label' => __('Letter Space', 'honrix'),
            'description' => __('Change letter space of the content text to increase better user experience.', 'honrix')
        ), Honrix_Customizer_Control::$NUMBER);

        $customizer->end_section('honrix_typography_body_text');

        /* heading */
        $customizer->start_section(array(
            'id' => 'honrix_typography_heading',
            'label' => __('Heading (h1 -h6)', 'honrix'),
        ));
        $customizer->create_control(array(
            'id' => 'honrix_custom_body_title_font',
            'default' => '',
            'label' => __('Font', 'honrix'),
            'description' => sprintf(
                '%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s The url will be like "https://fonts.googleapis.com/css2?family=Lato&display=swap".',
                __('Insert', 'honrix'),
                esc_url('https://www.google.com/fonts'),
                __('Google Font URL', 'honrix'),
                __('or custom font url from your website or other website, for embed fonts.', 'honrix')
            )
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_custom_body_title_font_family',
            'default' => 'Oswald',
            'label' => __('Font Family', 'honrix'),
            'description' => __('The font family should be like <strong>Lato, sans-serif</strong> without \' or ".', 'honrix')
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_h1_font_size',
            'default' => '36',
            'label' => __('H1 Font Size (px)', 'honrix'),
            'description' => __('Change H1 font size of the content.', 'honrix')
        ), Honrix_Customizer_Control::$NUMBER);

        $customizer->create_control(array(
            'id' => 'honrix_h2_font_size',
            'default' => '32',
            'label' => __('H2 Font Size (px)', 'honrix'),
            'description' => __('Change H2 font size of the content.', 'honrix')
        ), Honrix_Customizer_Control::$NUMBER);

        $customizer->create_control(array(
            'id' => 'honrix_h3_font_size',
            'default' => '28',
            'label' => __('H3 Font Size (px)', 'honrix'),
            'description' => __('Change H3 font size of the content.', 'honrix')
        ), Honrix_Customizer_Control::$NUMBER);

        $customizer->create_control(array(
            'id' => 'honrix_h4_font_size',
            'default' => '25',
            'label' => __('H4 Font Size (px)', 'honrix'),
            'description' => __('Change H4 font size of the content.', 'honrix')
        ), Honrix_Customizer_Control::$NUMBER);

        $customizer->create_control(array(
            'id' => 'honrix_h5_font_size',
            'default' => '21',
            'label' => __('H5 Font Size (px)', 'honrix'),
            'description' => __('Change H5 font size of the content.', 'honrix')
        ), Honrix_Customizer_Control::$NUMBER);

        $customizer->create_control(array(
            'id' => 'honrix_h6_font_size',
            'default' => '17',
            'label' => __('H6 Font Size (px)', 'honrix'),
            'description' => __('Change H6 font size of the content.', 'honrix')
        ), Honrix_Customizer_Control::$NUMBER);

        $customizer->end_section('honrix_typography_heading');

        /* title */
        $customizer->start_section(array(
            'id' => 'honrix_typography_title',
            'label' => __('Title', 'honrix'),
        ));

        $customizer->create_control(array(
            'id' => 'honrix_custom_title_font',
            'default' => '',
            'label' => __('Font', 'honrix'),
            'description' => sprintf(
                '%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s The url will be like "https://fonts.googleapis.com/css2?family=Lato&display=swap".',
                __('Insert', 'honrix'),
                esc_url('https://www.google.com/fonts'),
                __('Google Font URL', 'honrix'),
                __('or custom font url from your website or other website, for embed fonts.', 'honrix')
            )
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_custom_title_font_family',
            'default' => 'Oswald', 
            'label' => __('Font Family', 'honrix'),
            'description' => __('The font family should be like <strong>Lato, sans-serif</strong> without \' or ".', 'honrix')
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->end_section('honrix_typography_title');

        /* site name */
        $customizer->start_section(array(
            'id' => 'honrix_typography_site_name',
            'label' => __('Website Title', 'honrix'),
        ));

        $customizer->create_control(array(
            'id' => 'honrix_custom_site_name_font',
            'default' => '',
            'label' => __('Font', 'honrix'),
            'description' => sprintf(
                '%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s The url will be like "https://fonts.googleapis.com/css2?family=Lato&display=swap".',
                __('Insert', 'honrix'),
                esc_url('https://www.google.com/fonts'),
                __('Google Font URL', 'honrix'),
                __('or custom font url from your website or other website, for embed fonts.', 'honrix')
            )
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->create_control(array(
            'id' => 'honrix_custom_site_name_font_family',
            'default' => 'Bebas Neue',
            'label' => __('Font Family', 'honrix'),
            'description' => __('The font family should be like <strong>Lato, sans-serif</strong> without \' or ".', 'honrix')
        ), Honrix_Customizer_Control::$TEXT);

        $customizer->end_section('honrix_typography_site_name');

    }

    add_action('customize_register', 'honrix_typography_customizer_register');
}

if (!function_exists('honrix_typography_customizer_css')) {
    function honrix_typography_customizer_css()
    {
?>
        <style type="text/css">
            :root{
                --honrix-body-font-family: <?php echo esc_attr(honrix_get_control_value('honrix_body_font_family','Helvetica')); ?>;
                --honrix-heading-font-family: <?php echo esc_attr(honrix_get_control_value('honrix_custom_body_title_font_family','Oswald')); ?>;
                --honrix-title-font-family: <?php echo esc_attr(honrix_get_control_value('honrix_custom_title_font_family','Oswald')); ?>;
                --honrix-site-name-font-family: <?php echo esc_attr(honrix_get_control_value('honrix_custom_site_name_font_family','Bebas Neue')); ?>;
            }
            body{
                font-family: <?php echo esc_attr(honrix_get_control_value('honrix_body_font_family','DM Sans,sans-serif')); ?>;
                font-size: <?php echo esc_attr(honrix_get_control_value('honrix_body_font_size','14')); ?>px;
                line-height: <?php echo esc_attr(honrix_get_control_value('honrix_body_line_height','1.2')); ?>;
                letter-spacing: <?php echo esc_attr(honrix_get_control_value('honrix_body_letter_space','0')); ?>em;
            }

            .entry-content h1{
                font-size: <?php echo esc_attr(honrix_get_control_value('honrix_h1_font_size', '36')); ?>px;
            }

            .entry-content h2{
                font-size: <?php echo esc_attr(honrix_get_control_value('honrix_h2_font_size', '32')); ?>px;
            }

            .entry-content h3{
                font-size: <?php echo esc_attr(honrix_get_control_value('honrix_h3_font_size', '28')); ?>px;
            }

            .entry-content h4{
                font-size: <?php echo esc_attr(honrix_get_control_value('honrix_h4_font_size', '25')); ?>px;
            }

            .entry-content h5{
                font-size: <?php echo esc_attr(honrix_get_control_value('honrix_h5_font_size', '21')); ?>px;
            }

            .entry-content h6{
                font-size: <?php echo esc_attr(honrix_get_control_value('honrix_h6_font_size', '17')); ?>px;
            }
        </style>
<?php
    }

    add_action('wp_head', 'honrix_typography_customizer_css');
}
