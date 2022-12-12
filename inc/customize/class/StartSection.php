<?php
/*
 * Customizer Input Number Option
 *
 * package WordPress
 * subpackage Honrix
 * since Honrix 1.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!class_exists('honrix_Start_Section')) {
    class honrix_Start_Section extends WP_Customize_Control
    {
        public $type = 'hs-start-section';
        public function render_content()
        { ?>
            <h3 class="customize-control-title"><?php echo esc_html($this->label); ?></h3>
<?php
        }
    }
}
