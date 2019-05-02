<?php
/* Prohibit direct script loading */
defined('ABSPATH') || die('No direct script access allowed!');
wp_enqueue_script('jquery-masonry');
wp_enqueue_script('wpmf-gallery');
// getting rid of float
$class[] = 'gallery-' . $display;
$class[] = 'galleryid-' . $id;
$class[] = 'gallery-columns-' . $columns;
$class[] = 'gallery-size-' . $size_class;
$class[] = 'wpmf-gallery-bottomspace-' . $bottomspace;
$class[] = 'wpmf-gallery-clear';

$class = implode(' ', $class);

$padding_masonry = get_option('wpmf_padding_masonry');
if (!isset($padding_masonry) && $padding_masonry === '') {
    $padding_masonry = 5;
}
$output = "<div class='wpmf-gallerys'>";
$output .= '<div id="' . $selector . '"
 data-gutter-width="' . $padding_masonry . '"
  data-wpmfcolumns="' . $columns . '" class="' . $class . '">';
$i      = 0;
$pos    = 1;


foreach ($gallery_items as $item_id => $attachment) {
    $image_meta = wp_get_attachment_metadata($item_id);
    if (empty($image_meta['height']) || empty($image_meta['width'])) {
        continue;
    }

    $link_target = get_post_meta($attachment->ID, '_gallery_link_target', true);

    if (!empty($link) && ('file' === $link || 'post' === $link)) {
        $image_output = $this->getAttachmentLink($item_id, $size, false, $targetsize, $customlink, $link_target);
    } elseif (!empty($link) && 'none' === $link) {
        if (get_post_meta($item_id, _WPMF_GALLERY_PREFIX . 'custom_image_link', true) !== '') {
            $image_output = $this->getAttachmentLink($item_id, $size, false, $targetsize, $customlink, $link_target);
        } else {
            $image_output = wp_get_attachment_image($item_id, $size, false, array('data-type' => 'wpmfgalleryimg'));
        }
    } else {
        $image_output = $this->getAttachmentLink($item_id, $size, true, 'large', false, $link_target);
    }
    $orientation = ($image_meta['height'] > $image_meta['width']) ? 'portrait' : 'landscape';

    $output .= '<div class="wpmf-gallery-item
     wpmf-gallery-item-position-' . $pos . ' wpmf-gallery-item-attachment-' . $item_id . '">';
    $output .= '<div class="gallery-icon ' . $orientation . '">' . $image_output . '</div>';
    $output .= '</div>';
    $pos ++;
}
$output .= "</div></div>\n";
