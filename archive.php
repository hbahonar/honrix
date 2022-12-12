<?php
/*
 * Page
 * Template for display archive content
 *
 * package Hooya
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
get_header();

get_template_part('template-parts/content', 'archive');

get_footer();