<?php

/**
 * Fetch a picture details.
 */
function getPicture(int $pictureId) {
  
  $pictureTitle = get_the_title($pictureId);
  $pictureUrl = wp_get_attachment_image_url($pictureId, "full");
  $pictureMetadata = wp_get_attachment_metadata($pictureId);

  return [
    "id" => $pictureId,
    "title" => $pictureTitle,
    "full_image_url" => $pictureUrl,
    "media_details" => $pictureMetadata
  ];
}