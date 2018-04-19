<?php
class sms {
// Require the bundled autoload file - the path may need to change
// based on where you downloaded and unzipped the SDK
function __construct() {
require 'Twilio/autoload.php';
	echo "test";
// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

$account_sid = 'ACa17784865385a29b0fcecde2e45ed9b0'; 
$auth_token = '16e55be52527aa97f248b0c061c9cbc2'; 
$client = new Client($account_sid, $auth_token); 
 

/*$messages = $client->accounts("ACa17784865385a29b0fcecde2e45ed9b0") 
  ->messages->create("+447947865725", array( 
        'From' => "+441277420345",  
        'Body' => "test sms code:008",      
  ));*/
  
  
  $mes = $client->messages->create(
    // the number you'd like to send the message to
    '+447947865725',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+441277420345',
        // the body of the text message you'd like to send
        'body' => "Hey! This is a test message!"
    )
);
// Loop over the list of calls and echo a property for each one
foreach($mes as $message) {
    echo "<tr><td class=\"text-center\">" . $message->from . "</td><td class=\"text-center\">" . $message->dateSent->format('Y-m-d H:i:s') . "</td><td class=\"text-center\">" . $message->body . "</td></tr>";
}
}
}
?>
 
