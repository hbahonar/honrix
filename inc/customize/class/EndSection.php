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

if (!class_exists('honrix_End_Section')) {
    class honrix_End_Section extends WP_Customize_Control
    {
        public $type = 'hs-end-section';
        public function render_content()
        { }
    }
}
