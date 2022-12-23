<?php
	/**
	 * 
	 */
	class Errno extends Database
	{
		public $conn;
		public function __construct($conn)
		{
			$conn = $this->conn;
		}
		public function error($type = '', $msg = '')
		{
			$err = array(
				'success' => '<div class="alert alert-success alert-dismissible fade show" role="alert">
							  <strong>Awesome!</strong> '. $msg .'
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
						   </div>', 
				'warning' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <strong>Uhhh!</strong> '. $msg .'
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
						   </div>', 
				'danger' => '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							  <strong>Oops!</strong> '. $msg .'
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
						   </div>', 
				'info' => '<div class="alert alert-info alert-dismissible fade show" role="alert">
							  <strong>Hey!</strong> '. $msg .'
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
						   </div>'
			);
			return $err[$type];
		}
	}