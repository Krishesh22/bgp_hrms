<?php

$expiryDate = '2023-06-05';
$renewalDays = 15;

// Calculate the number of days until expiration
$today = date('Y-m-d');
$expirationDate = date('Y-m-d', strtotime($expiryDate));
$remainingDays = floor((strtotime($expirationDate) - strtotime($today)) / (60 * 60 * 24));
echo $remainingDays;
// Send expiration notification if within the renewal days
if($remainingDays >0)
{
if ($remainingDays <= $renewalDays) {

    echo "Test";
    // Send expiration notification to the user
    // You can use your preferred method to send the email

    // Example using PHP's mail function
    // $subject = 'Document Expiration Notification';
    // $message = "Dear user, your document is expiring in {$remainingDays} days. Please take necessary action.";
    // $headers = 'From: your_email@example.com';

    // mail($email, $subject, $message, $headers);
}
}
 ?>