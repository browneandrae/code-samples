<?php 
require('/home/myxrappuser/public_html/wp-load.php');
//ini_set('display_errors',1);
//error_reporting(E_ALL|E_STRICT);

session_start();	 	
include_once '/xxxxxxxxxxxxxxxxxxx/xxxxxxxxxxxxxxxxxxxx/xxxxxxxxxxxxxxxxxxxx/google-api-php-client/src/Google/Client.php';
include_once '/xxxxxxxxxxxxxxxxxxx/xxxxxxxxxxxxxxxxxxxx/xxxxxxxxxxxxxxxxxxxx/xxxxxxxxxxxxxxxxxxx/xxxxxxxxxxxxxxxxxxxxxxx/xxxxxxxxxxxxxxx/Google/Service/Calendar.php';

//Creating connection to google calendar API to using class so can instantiate in different WordPress plugins
class Connection {

private $Email_address;
private $service;
private $client;

	public function Connection() {
		$client_id = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxx.apps.googleusercontent.com';
		$this->Email_address = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx@developer.gserviceaccount.com';	 
		$key_file_location = '/xxxxxx/xxxxxxxxxxx/xxxxxxxxxxxxxxxx/xxxxxxxxxxxxxx/xxxxxxxxxxxxxxxxxxxxxxx.p12';	 	
		$this->client = new Google_Client();	 	
		$this->client->setApplicationName("Event Creation Google Calendar");
		$this->client->setClientId($client_id);
        $this->client->setClientSecret('xxxxxxxxxxxxxxxxxxxxxxxxxxxx');
        $this->client->setDeveloperKey('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
        $this->client->setRedirectUri('http://example.com/login');
		$key = file_get_contents($key_file_location);
		$this->client->setAccessType('offline');
		$this->client->setApprovalPrompt('force');
		$scopes ="https://www.googleapis.com/auth/calendar"; 	
		$cred = new Google_Auth_AssertionCredentials(	 
			$this->Email_address,	 	 
			array($scopes),	 	
			$key	 	 
			);	 	
		$this->client->setAssertionCredentials($cred);
		if($this->client->getAuth()->isAccessTokenExpired()) {	 	
			$this->client->getAuth()->refreshTokenWithAssertion($cred);	 	
		}

		
		$this->setClient($this->client);
	
	 }
	 
	 //set  client so can get in new instance
	public function setClient($clientObject) {
		$this->service = new Google_Service_Calendar($clientObject); 
	}
	
	//retrieve client to interact with google calendar api
	public function getClient() {
		return $this->service; 
	}
}
?>