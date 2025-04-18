<?php


// function get_client_ip() {
//   $ipaddress = '';
//   if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//       $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
//   } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//       // Handle multiple IPs in HTTP_X_FORWARDED_FOR
//       $ipList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
//       $ipaddress = trim($ipList[0]); // First IP is the client IP
//   } elseif (!empty($_SERVER['HTTP_X_FORWARDED'])) {
//       $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
//   } elseif (!empty($_SERVER['HTTP_FORWARDED_FOR'])) {
//       $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
//   } elseif (!empty($_SERVER['HTTP_FORWARDED'])) {
//       $ipaddress = $_SERVER['HTTP_FORWARDED'];
//   } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
//       $ipaddress = $_SERVER['REMOTE_ADDR'];
//   } else {
//       $ipaddress = 'UNKNOWN';
//   }

//   // Validate and return the IP address
//   return filter_var($ipaddress, FILTER_VALIDATE_IP) ? $ipaddress : 'INVALID IP';
// }
echo get_client_ip();

function get_client_ip() {
  $ipaddress = '';
  if (isset($_SERVER['HTTP_CLIENT_IP']))
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if(isset($_SERVER['HTTP_X_FORWARDED']))
      $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
  else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
      $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
  else if(isset($_SERVER['HTTP_FORWARDED']))
      $ipaddress = $_SERVER['HTTP_FORWARDED'];
  else if(isset($_SERVER['REMOTE_ADDR']))
      $ipaddress = $_SERVER['REMOTE_ADDR'];
  else
      $ipaddress = 'UNKNOWN';
  return $ipaddress;
}

?>