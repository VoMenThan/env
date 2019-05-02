<?php
/* Prohibit direct script loading */
defined('ABSPATH') || die('No direct script access allowed!');
wp_enqueue_script('wpmf-gallery');
$class_default   = array();
$class_default[] = 'gallery wpmf_gallery_default gallery_default';
$class_default[] = 'galleryid-' . $id;
$class_default[] = 'gallery-columns-' . $columns;
$class_default[] = 'gallery-size-' . $size_class;
$class_default[] = 'gallery-link-' . $link;
$output = '<div class="wpmf-gallerys">';
$output          .= '<div id="' . $selector . '" class="' . implode(' ', $class_default) . '">';
$i               = 0;
$pos             = 1;
foreach ($gallery_items as $item_id => $attachment) {
    $image_meta = wp_get_attachment_metadata($item_id);
    if (empty($image_meta['height']) || empty($image_meta['width'])) {
        continue;
    }
    $post_excerpt = esc_html($attachment->post_excerpt);
    $link_target  = get_post_meta($attachment->ID, '_gallery_link_target', true);
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

    $orientation = '';
    if (isset($image_meta['height'], $image_meta['width'])) {
        $orientation = ($image_meta['height'] > $image_meta['width']) ? 'portrait' : 'landscape';
    }

    $output       .= '<figure class="wpmf-gallery-item gallery-item">';
    $output       .= '<div class="gallery-icon ' . $orientation . '">' . $image_output . '</div>';
    $caption_text = trim($post_excerpt);
    if (!empty($caption_text)) {
        $output .= '<figcaption class="wp-caption-text gallery-caption">';
        $output .= wptexturize($caption_text);
        $output .= '</figcaption>';
    }
    $output .= '</figure>';
    $pos ++;
}
$output .= '</div></div>';
