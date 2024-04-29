<?php

add_action( 'rest_api_init', function() {
  register_rest_route( 'custom', '/contact/', [
    'methods' => 'GET',
    'callback' => 'yf_contact_route',
  ]);
});

add_action('rest_api_init', function () {
  register_rest_route( 'custom/contact', '/send', [
    'methods' => 'POST',
    'callback' => 'sendContactMail'
  ]);
});

function yf_contact_route() {

  $pictureId = get_theme_mod( "yf_contact_picture" );
  $picture = getPicture($pictureId);

  $contact = [
    "headline"      => get_theme_mod( "yf_contact_headline" ),
    "content"       => get_theme_mod("yf_contact_content"),
    "picture"       => $picture,
    "social_media"  => [
      "headline"    => get_theme_mod( "yf_contact_social_headline" ),
      "instagram"   => get_theme_mod( "yf_contact_instagram" ),
    ]
  ];
  return $contact;
}

function sendContactMail(WP_REST_Request $request) {
  $response = [
    'status' => 304,
    'message' => 'There was an error sending the form.'
  ];
  $parameters = $request->get_json_params();
  if (count($_POST) > 0) {
    $parameters = $_POST;
  }

  $siteName = sanitize_text_field(trim(get_option("blogname")));
  $contactName = sanitize_text_field(trim($parameters["contact_name"]));
  $contactEmail = sanitize_email(trim($parameters["contact_email"]));
  $contactMessage = sanitize_textarea_field(trim($parameters["contact_message"]));

  if (!empty($contactName) && !empty($contactEmail) && !empty($contactMessage)) {

    $data = [
      "comment_author" => " [" . $siteName . "] " . $contactName,
      "comment_author_email" => $contactEmail,
      "comment_content" => $contactMessage
    ];

    $result = wp_insert_comment($data);

    if ($result) {
      $response["status"] = 200;
      $response["message"] = "Form sent successfully.";
    }
  }
  return json_decode(json_encode($response));
  exit();
}
