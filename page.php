<?php
/*
 * Page
 * Template for display pages content
 *
 * package Honrix
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
get_header();

get_template_part('template-parts/content', 'page');

get_footer();
