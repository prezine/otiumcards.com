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
		public function userdata()
		{
			$userID = $this->getSession('userID');
			return $this->select("SELECT * FROM sc_users WHERE userID = '$userID'", true);
		}
		public function auserdata($userID = '')
		{
			return $this->select("SELECT * FROM sc_users WHERE userID = '$userID'");
		}
		public function userrole($int = '')
		{
			return ($int == 0) ? 'Admin' : 'Moderator' ;
		}
		public function checkuserwithemail($email = '')
		{
			return $this->select("SELECT * FROM sc_users WHERE email='$email'", true);
		}
		public function checkuserwithphone($phone = '')
		{
			return $this->select("SELECT * FROM sc_users WHERE phone='$phone'", true);
		}
		public function checkuserwithtoken($token = '')
		{
			return $this->select("SELECT * FROM sc_users WHERE token='$token'", true);
		}
		public function createtempaccount($data = '')
		{
			$res = $this->insert('sc_users', $data);
			$this->setSession('tmpuserID', $this->lastID());
			return $res;
		}
		public function grabcustomers()
		{
			$businessID = $this->getSession('businessID');
			return $this->select("SELECT * FROM sc_customer WHERE businessID='$businessID'", true, true);
		}
		public function grabcustomerwithhash($hash = '')
		{
			return $this->select("SELECT * FROM sc_customer WHERE payurl='$hash'", true);
		}
		public function dp($name = '')
		{
			return 'https://ui-avatars.com/api/?name='.$name.'&background=03045E&color=fff&rounded=true&bold=true';
		}
		public function customerstats($int = '')
		{
			$tive = array(
	            0 => 'div class="status-pill red" data-title="Inactive" data-toggle="tooltip" data-original-title="" title=""></div>',
	            1 => 'div class="status-pill green" data-title="Active" data-toggle="tooltip" data-original-title="" title=""></div>'
	        );
	        return $tive[$int];
		}
		public function switcher($val1 = '', $val2 = '')
		{
			return ($val1 != '' || $val1 != null) ? $val1 : $val2 ;
		}
		public function is_verifiedBadge($int = '')
		{
			return ($int == '1') ? '<img src="https://img.icons8.com/ios-glyphs/20/2ed159/approval.png" data-toggle="tooltip" title="" data-original-title="Verified Account"/>' : null;
		}public function is_businessBadge($int = '')
		{
			return ($int == '1') ? 
			'<img src="https://img.icons8.com/ios-glyphs/20/3e40b8/small-business.png" data-toggle="tooltip" title="" data-original-title="Business Account"/>' : 
			'<img src="https://img.icons8.com/fluent-systems-filled/20/ef8354/user.png" data-toggle="tooltip" title="" data-original-title="Individual Account"/>';
		}
	}