<?php
	/**
	 * 
	 */
	class Users extends Database
	{
		public $conn;
		public function __construct($conn)
		{
			$this->conn = $conn;
		}
		public function userData($userID = '')
		{
			return $this->select("SELECT * FROM ot_users WHERE userID = '$userID'");
		}
		public function countTotalContacts($token = '')
		{
			return $this->select("SELECT COUNT(*) FROM ot_contact WHERE token='$token'", false)['COUNT(*)'];
		}
		public function countTotalContactsGender($token = '', $gender = '')
		{
			return $this->select("SELECT COUNT(*) FROM ot_contact WHERE token='$token' AND contactGender='$gender'", false)['COUNT(*)'];
		}
		function connectNickUserData($nick_token = '')
		{
			return $this->select("SELECT * FROM ot_users WHERE nick='$nick_token' OR token='$nick_token'", false);
		}
	}