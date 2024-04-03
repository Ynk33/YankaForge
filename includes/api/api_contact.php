<?php

add_action( 'rest_api_init', function() {
  register_rest_route( 'custom', '/contact/', [
    'methods' => 'GET',
    'callback' => 'wp_contact_route',
  ]);
});

function wp_contact_route() {

  $pictureId = get_theme_mod( "yanka_contact_picture" );
  $pictureDetails = getPictureDetails($pictureId);

  $contact = [
    "headline"      => get_theme_mod( "yanka_contact_headline" ),
    "content"       => get_theme_mod("yanka_contact_content"),
    "picture"       => $pictureDetails,
    "social_media"  => [
      "headline"    => get_theme_mod( "yanka_contact_social_headline" ),
      "instagram"   => get_theme_mod( "yanka_contact_instagram" ),
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

  $siteName = wp_strip_all_tags(trim(get_option('blogname')));
  $contactName = wp_strip_all_tags(trim($parameters['contact_name']));
  $contactEmail = wp_strip_all_tags(trim($parameters['contact_email']));
  $contactMessage = wp_strip_all_tags(trim($parameters['contact_message']));

  if (!empty($contactName) && !empty($contactEmail) && !empty($contactMessage)) {
    $subject = "(New message sent from site $siteName) $contactName <$contactEmail>";
    $body = "<h3>$subject</h3><br/>";
    $body .= "<p><b>Name:</b> $contactName</p>";
    $body .= "<p><b>Email:</b> $contactEmail</p>";
    $body .= "<p><b>Message:</b> $contactMessage</p>";
    if (send_email($contactEmail, $contactName, $body)) {
      $response['status'] = 200;
      $response['message'] = 'Form sent successfully.';
    }
  }
  return json_decode(json_encode($response));
  exit();
}

add_action('rest_api_init', function () {
  register_rest_route( 'custom/contact', '/send', [
    'methods' => 'POST',
    'callback' => 'sendContactMail'
  ]);
});

function send_email($form_email, $form_name, $form_message) {
  $email_subject = 'Message from '. get_bloginfo('name') . ' - ' . $form_email;
  $headers = "From: '" . $form_name . "' <" . $form_email . "> \r\n";
  $headers .= "Reply-To: ". strip_tags($form_email) . "\r\n";
  $headers .= "Content-Type:text/html;charset=utf-8";
  $email_message = '<html><body>';
  $email_message .= "<table>";
  $email_message .= "<tr><td>NAME: </td><td>" . $form_name . "</td></tr>";
  $email_message .= "<tr><td>MESSAGE: </td><td>" . $form_message . "</td></tr>";
  $email_message .= "</table>";
  $email_message .= "</body></html>";
  $email_message = nl2br($email_message);
  wp_mail('ytirand@gmail.com', $email_subject, $email_message, $headers);

  return true;
}
