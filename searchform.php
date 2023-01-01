<?php

if (!defined('ABSPATH')) {
    exit;
}
?>
<div class='search-close honrix-icon hornrix-close-btn d-none hs-pointer' tabindex='0'>
    <span class="close-line"></span>
    <span class="close-line"></span>
</div>
<form role="search" method="get" class="search-form hs-flex hs-m-auto" action="<?php echo esc_url(home_url("/")); ?>">
    <input type="search" tabindex="0" placeholder="<?php esc_attr_e('Search', 'honrix') ?>" class="search-field w-100 text-center" value="<?php echo esc_attr(get_search_query()); ?>" name="s" />
    <button type="submit" tabindex="0" class="search-submit hs-pointer"><i class="fab fa-sistrix honrix-icon"></i></button>
</form>