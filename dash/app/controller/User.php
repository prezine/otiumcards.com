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
		public function countTotalContacts()
		{
			$userID = $this->getSession('userID');
			return $this->select("SELECT COUNT(*) FROM ot_contact WHERE userID='$userID'", false)['COUNT(*)'];
		}
		public function countTotalContactsGender($gender = '')
		{
			$userID = $this->getSession('userID');
			return $this->select("SELECT COUNT(*) FROM ot_contact WHERE userID='$userID' AND contactGender='$gender'", false)['COUNT(*)'];
		}
	}