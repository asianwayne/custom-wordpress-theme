<?php 
//add_action('template_redirect', 'redirect_by_ip');

function redirect_by_ip() {
  // Get the visitor's IP address
  $ip = $_SERVER['REMOTE_ADDR'];

  // Call the ipstack API to get the visitor's location
  $response = file_get_contents("http://api.ipstack.com/$ip?access_key=0a94efb6957793f57c85773885f34221");

  // Convert the JSON response to an array
  $location = json_decode($response, true);

  // Check the country code in the location data and redirect the user to the appropriate language folder
  if (isset($location['country_code']) && $location['country_code'] == 'US') {
      wp_redirect(home_url( 'en' ));
      exit;
  } elseif (isset($location['country_code']) && $location['country_code'] == 'JP') {
      wp_redirect(home_url( 'jp' ));
      exit;
  } else {
    wp_redirect(site_url( ));

  }
}