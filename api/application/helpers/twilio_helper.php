<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter HTML Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Multitech Team
 * @link		http://multitecinfo.com/twilio/helpers/twilio_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Heading
 *
 * Generates an SMS sending link.
 */
if(! function_exists('sendSMS')) {
	function sendSMS() {
		 echo "yes".(base_url().'assets/Twilio/autoload.php');
		 if(file_exists(base_url().'assets/Twilio/autoload.php')) {
				echo "mili"; 
		 }
		 else {
				echo "no"; 
		 }
		require (base_url().'assets/Twilio/autoload.php');
		
		//namespace Twilio\Rest\Client;
		//use Twilio\Rest\Client;
		echo "true";
		
		$account_sid = 'ACa17784865385a29b0fcecde2e45ed9b0'; 
		$auth_token = '16e55be52527aa97f248b0c061c9cbc2'; 
		$client = new Client($account_sid, $auth_token); 
				
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
		//echo "<tr><td class=\"text-center\">" . $message->from . "</td><td class=\"text-center\">" . $message->dateSent->format('Y-m-d H:i:s') . "</td><td class=\"text-center\">" . $message->body . "</td></tr>";
		}
		
	}
}
// ------------------------------------------------------------------------

/* End of file twilio_helper.php */
/* Location: ./system/helpers/html_helper.php */