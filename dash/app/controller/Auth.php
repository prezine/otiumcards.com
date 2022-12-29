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
		public function activateCard($data = '')
		{
			$resp = $this->insert('ot_users', $data);
			$this->setSession('userID', $this->lastID());
			// update card used status
			$this->update("UPDATE ot_activator SET is_used='1', dateUsed='".GLOBAL_DATE."' WHERE token=". $data['token']);
			return $resp;
		}
		public function validateToken($token = '')
		{
			return $this->select("SELECT * FROM ot_activator WHERE token='$token'", false);
		}
		public function login($email = '', $password = '')
		{
			return $this->select("SELECT * FROM ot_users WHERE email='$email' AND password='$password'", false);
		}
		public function saveContact($contactData = '')
		{
			return $this->insert('ot_contact', $contactData);
		}
	}