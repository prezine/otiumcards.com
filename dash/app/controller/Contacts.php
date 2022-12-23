<?php
	/**
	 * 
	 */
	class Contacts extends Database
	{
		public $conn;
		public function __construct($conn)
		{
			$this->conn = $conn;
		}
		public function saveContactDetails($data = '')
		{
			return $this->insert('ot_contact', $data);
		}
		public function fetchContactList()
		{
			$userID = $this->getSession('userID');
			return $this->select("SELECT * FROM ot_contact WHERE userID='$userID'", false, true);
		}
	}