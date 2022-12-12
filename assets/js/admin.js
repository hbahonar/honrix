(function ($) {
  // Add Color Picker to all inputs that have 'color-field' class
  $(function () {
    $(".honrix-color-picker").wpColorPicker();
  });
})(jQuery);

function honrixMetaboxes(selector) {
  // hide metaboxes
  jQuery(
    "#honrix_audio_post_meta_box,#honrix_video_post_meta_box,#honrix_gallery_post_meta_box"
  ).css({ display: "none" });

  if (selector.val() === "audio") {
    jQuery("#honrix_audio_post_meta_box").removeAttr("style");
  }
  if (selector.val() === "video") {
    jQuery("#honrix_video_post_meta_box").removeAttr("style");
  }
  if (selector.val() === "gallery") {
    jQuery("#honrix_gallery_post_meta_box").removeAttr("style");
  }
}

jQuery(document).ready(function () {
  jQuery(
    "#honrix_audio_post_meta_box,#honrix_video_post_meta_box,#honrix_gallery_post_meta_box"
  ).css({ display: "none" });

  honrixMetaboxes(
    jQuery('[id*="post-format-selector"],input[name="post_format"]:checked')
  );

  jQuery(document).on("change", '[id*="post-format-selector"]', function () {
    honrixMetaboxes(jQuery(this));
  });
}); // end dom ready
