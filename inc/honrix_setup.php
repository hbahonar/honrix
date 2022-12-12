<?php

if (!function_exists('honrix_setup')) :
    function honrix_setup()
    {
        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on appside, use a find and replace
		 * to change 'honrix' to the name of your theme in all the template files.
		 */
        load_theme_textdomain('honrix', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
			 * Let WordPress manage the document title.
			 * By adding theme support, we declare that this theme does not use a
			 * hard-coded <title> tag in the document head, and expect WordPress to
			 * provide it for us.
			 */
        add_theme_support('title-tag');

        /**
         * Set the content width in pixels, based on the theme's design and stylesheet.
         *
         * Priority 0 to make it available to lower priority callbacks.
         *
         * @global int $content_width
         */
        $GLOBALS['content_width'] = apply_filters('honrix_content_width', 1600);

        /**
         * Add post-formats support.
         */
        add_theme_support(
            'post-formats',
            array(
                'gallery',
                'video',
                'audio',
            )
        );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in three location.
        register_nav_menus(
            array(
                'main-menu' => esc_html__('Main Menu', 'honrix'),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('honrix_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');

        // Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );

        add_theme_support('wp-block-styles');
        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // -- Disable custom font sizes
        add_theme_support('disable-custom-font-sizes');
        // -- Disable Custom Colors
        add_theme_support('disable-custom-colors');
        // -- Editor Color Palette
        add_theme_support('editor-color-palette', array(
            array(
                'name'  => __('Theme Color', 'honrix'),
                'slug'  => 'honrix-theme-color',
                'color' => honrix_get_control_value('honrix_theme_color', '#f64c67'),
            ),
            array(
                'name'  => __('Title Color', 'honrix'),
                'slug'  => 'honrix-title-color',
                'color' => honrix_get_control_value('honrix_title_color', '#333'),
            ),
            array(
                'name'  => __('Text Color', 'honrix'),
                'slug'  => 'honrix-text-color',
                'color' => honrix_get_control_value('honrix_text_color', '#666'),
            ),
            array(
                'name'  => __('Background Color', 'honrix'),
                'slug'  => 'honrix-background-color',
                'color' => '#' . esc_attr(get_background_color()),
            ),
        ));

        // -- Editor Font Styles
        add_theme_support('editor-font-sizes', array(
            array(
                'name'      => esc_html__('small', 'honrix'),
                'shortName' => esc_html__('S', 'honrix'),
                'size'      => 12,
                'slug'      => 'small'
            ),
            array(
                'name'      => esc_html__('regular', 'honrix'),
                'shortName' => esc_html__('M', 'honrix'),
                'size'      => 14,
                'slug'      => 'regular'
            ),
            array(
                'name'      => esc_html__('large', 'honrix'),
                'shortName' => esc_html__('L', 'honrix'),
                'size'      => 18,
                'slug'      => 'large'
            ),
        ));

        $args = array(
            'default-text-color' => '000',
            'width'              => 1000,
            'height'             => 250,
            'flex-width'         => true,
            'flex-height'        => true,
        );
        add_theme_support('custom-header', $args);



        /****************************************************/

        // Add support for editor styles.
        add_theme_support('editor-styles');

        $editor_stylesheet_path = 'assets/css/editor-style.css';
        // Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ( $is_IE ) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}
        // Enqueue editor styles.
        add_editor_style($editor_stylesheet_path);

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */

        add_theme_support('custom-logo', array(
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'unlink-homepage-logo' => true,
        ));

        if (class_exists('WooCommerce')) {
            /* woocommerce */
            add_theme_support('woocommerce');
            add_theme_support('wc-product-gallery-zoom');
            add_theme_support('wc-product-gallery-lightbox');
            add_theme_support('wc-product-gallery-slider');
        }
    }
    add_action('after_setup_theme', 'honrix_setup');
endif;
