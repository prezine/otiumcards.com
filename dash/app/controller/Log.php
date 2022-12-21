<?php
	/**
	 * 
	 */
	class Log extends Database
	{
		public $conn;
		public function __construct($conn)
		{
			$this->conn = $conn;
		}
		public function loginlog($loginlog = '')
		{
			return $this->insert('sc_loginlog', $loginlog);
		}
		public function errorlog($errlog = '')
		{
			return $this->insert('sc_log', $errlog);
		}
		public function activitylog($activitylog = '')
		{
			return $this->insert('sc_activity', $activitylog);
		}
		public function sessionlog($sessionlog = '')
		{
			$userID = $sessionlog['userID'];
			$ip = $sessionlog['ip'];
			$browser = $sessionlog['browser'];
			$checkforip = $this->select("SELECT * FROM sc_sessions WHERE userID='$userID' AND ip='$ip' AND browser='$browser'", true);
			if ($checkforip == 'null') {
				$this->update("UPDATE sc_sessions SET is_access='0' WHERE userID='$userID'");
				return $this->insert('sc_sessions', $sessionlog);
			}
		}
		public function grabuserlog()
		{
			$userID = $this->getSession('userID');
			return $this->select("SELECT * FROM sc_activity WHERE userID='$userID' ORDER BY activityID DESC LIMIT 8", true, true);			
		}
	}