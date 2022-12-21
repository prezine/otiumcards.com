<?php
	/**
	 * 
	 */
	class Auth extends Database
	{
		public $conn;
		public function __construct($conn)
		{
			$this->conn = $conn;
		}
		public function login($data)
		{
			$query = 
			$this->select('SELECT userID, acc_type FROM sc_users WHERE email="'. $data["email"] .'" AND password ="'. $data["password"] .'"', false);
			$this->setSession('userID', $query['userID']);
			$this->setCookie('userID', $query['userID']);
			$userID = $query['userID'];
			$getbusinessID = 
			$this->select("SELECT businessID FROM sc_business WHERE userID='$userID' AND is_default='1'", true);
			if ($getbusinessID != 'null') {
				$gbid = json_decode($getbusinessID, true);
				$this->setSession('businessID', $gbid['businessID']);
				$this->setSession('accessID', 1);
				$this->setCookie('businessID', $gbid['businessID']);
				$this->setCookie('accessID', 1);
			} else if ($this->isbusinessteam() != 'null') {
				$checkifbusiness = $this->isbusinessteam();
				$gbid = json_decode($checkifbusiness, true);	
				$this->setSession('businessID', $gbid['businessID']);
				$this->setSession('accessID', 1);	
				$this->setCookie('businessID', $gbid['businessID']);
				$this->setCookie('accessID', 1);
			} else {
				$isbusiness = ($query['acc_type'] == 1) ? $this->setSession('iamBusiness', 1) : null ; 
				$this->setSession('accessID', $query['acc_type']);
				$this->setCookie('accessID', $query['acc_type']);
			}
			return (!$query['userID']) ? $query : 200 ;
		}
		public function join($data, $email_token, $phone_token)
		{
			if ($this->insert('sc_users', $data) == 200) {
				$this->setSession('userID', $this->lastID());
				$this->setSession('accessID', $data['acc_type']);
				$this->setCookie('userID', $this->lastID());
				$this->setCookie('accessID', $data['acc_type']);
				return $this->setVerification(array(
					'userID' => $this->getSession('userID'),
					'email_token' => $email_token,
					'phone_token' => $phone_token,
					'email_is_used' => 0,
					'phone_is_used' => 0 
				));
			} else {
				return $this->insert('sc_users', $data);
			}
		}
		public function isbusinessteam()
		{
			$userID = $this->getSession('userID');
			return $this->select("SELECT * FROM sc_businessteam WHERE userID='$userID' LIMIT 1", true);
		}
		public function checkemail($email = '')
		{
			return $this->select("SELECT email FROM sc_users WHERE email = '$email'", true);
		}
		public function checkphone($phone = '')
		{
			return $this->select("SELECT phone FROM sc_users WHERE phone = '$phone'", true);
		}
		public function checkteamemail($email = '')
		{
			return $this->select("SELECT email FROM sc_businessinvite WHERE email = '$email'", true);
		}
		public function setVerification($data)
		{
			return $this->insert('sc_verify', $data);
		}
		public function verifyAccount($code = '')
		{
			$this->update("UPDATE sc_verify SET email_is_used='1' WHERE email_token='$code'");
			$getuserID = $this->select("SELECT * FROM sc_verify WHERE email_token='$code'", true);
			if ($getuserID !== "null") {
				$jd = json_decode($getuserID, true);	
				$this->setSession('userID', $jd['userID']);
				return $this->update("UPDATE sc_users SET is_verified='1' WHERE userID='". $jd['userID'] ."'");
			} else {
				return 400;
			}
		}
		public function verifyPhone($code = '')
		{
			$this->update("UPDATE sc_verify SET phone_is_used='1' WHERE phone_token='$code'");
			$getuserID = $this->select("SELECT * FROM sc_verify WHERE phone_token='$code'", true);
			if ($getuserID !== "null") {
				$jd = json_decode($getuserID, true);	
				$this->setSession('userID', $jd['userID']);
				return $this->update("UPDATE sc_users SET is_verified='1' WHERE userID='". $jd['userID'] ."'");
			} else {
				return 400;
			}
		}
		public function retrieve_verification()
		{
			$userID = $this->getSession('userID');
			return $this->select("SELECT * FROM sc_verify WHERE userID='$userID'", true);
		}
		public function getusercurrentsession()
		{
			$userID = $this->getSession('userID');
			return $this->select("SELECT * FROM sc_sessions WHERE userID='$userID' ORDER BY sessionID DESC LIMIT 1", true, true);		
		}
		public function getusersessions()
		{
			$userID = $this->getSession('userID');
			return $this->select("SELECT * FROM sc_sessions WHERE userID='$userID'", true, true);			
		}
		public function createAPI($data = '')
		{
			return $this->insert('sc_application', $data);
		}
		public function sendSMS($phone = '', $message = '')
		{
			// Your Account SID and Auth Token from twilio.com/console
			$sid = ACCOUNT_SID;
			$token = AUTH_TOKEN;
			$client = new Client($sid, $token);

			// Use the client to do fun stuff like send text messages!
			$client->messages->create(
			    // the number you'd like to send the message to
			    $phone,
			    [
			        // A Twilio phone number you purchased at twilio.com/console
			        'from' => TWILIO_NUMBER,
			        // the body of the text message you'd like to send
			        'body' => $message
			    ]
			);
		}
	}