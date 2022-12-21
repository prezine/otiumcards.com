<?php
	/**
	 * 
	 */
	class Otium
	{
		private $app_name;
		private $app_version;
		public function __construct()
		{
			$this->app_name = "Scrow";
			$this->app_version = "v1.0";
		}
		public function app_name()
		{
			return $this->app_name;
		}
		public function version()
		{
			return $this->app_version;
		}
		public function viewJson()
		{
			header("Content-Type: Application/json");
		}
		public function setSession($name = '', $value = '')
		{
			$_SESSION[$name] = $value;
		}
		public function updateSession($name = '', $value = '')
		{
			$_SESSION[$name] = $value;
		}
		public function getSession($name = '')
		{
			return (!isset($_SESSION[$name])) ? NULL : $_SESSION[$name] ;
		}
		public function setCookie($name = '', $value = '')
		{
			setcookie($name, $value, time()+30*24*60*60);
		}
		public function updateCookie($name = '', $value = '')
		{
			$_SESSION[$name] = $value;
		}
		public function getCookie($name = '')
		{
			return (!isset($_COOKIE[$name])) ? NULL : $_COOKIE[$name] ;
		}
		public function removeCookie($name = '')
		{
			return setcookie($name, "", time()-3600);
		}
		public function cleanurl($str = '')
		{
			list($i, $e) = explode(".", $str);
			return $i;
		}
		public function killSession($name = '')
		{
			unset($_SESSION[$name]);
			session_destroy();
			session_unset();
			return 200;
		}
		public function time_elapsed_string($datetime, $full = false)
	    {
			$now = new DateTime;
			$ago = new DateTime($datetime);
			$diff = $now->diff($ago);

			$diff->w = floor($diff->d / 7);
			$diff->d -= $diff->w * 7;

			$string = array(
				'y' => 'year',
				'm' => 'month',
				'w' => 'week',
				'd' => 'day',
				'h' => 'hour',
				'i' => 'min',
				's' => 'sec',
			);
			foreach ($string as $k => &$v) {
				if ($diff->$k) {
					$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
				} else {
					unset($string[$k]);
				}
			}

			if (!$full) $string = array_slice($string, 0, 1);
			return $string ? implode(', ', $string) . ' ago' : 'Just now';
	    }
	    public function secondsToTime($seconds) 
	    {
	        $dtF = new \DateTime('@0');
	        $dtT = new \DateTime("@$seconds");
	        $daterray = array(
	          'days' => $dtF->diff($dtT)->format('%a'),
	          'hours' => $dtF->diff($dtT)->format('%h'),
	          'minutes' => $dtF->diff($dtT)->format('%i'),
	          'seconds' => $dtF->diff($dtT)->format('%s'),
	          'full' => $dtF->diff($dtT)->format('%a days %h hours %i minutes %s seconds') 
	        );
	        return $daterray;
	    }
	    public function diffDateToSeconds($ts1, $ts2)
	    {
	        $ts1 = strtotime($ts1);
	        $ts2 = strtotime($ts2);
	        $seconds_diff = $ts2 - $ts1;
	        return $seconds_diff;
	    }
	    public function getCCType($cardNumber) {
	      // Remove non-digits from the number
	      $cardNumber = preg_replace('/\D/', '', $cardNumber);
	   
	      // Validate the length
	      $len = strlen($cardNumber);
	      if ($len < 15 || $len > 16) {
	          throw new Exception("Invalid credit card number. Length does not match");
	      } else {
	        switch($cardNumber) {
	          case(preg_match ('/^4/', $cardNumber) >= 1):
	              return 'Visa';
	          case(preg_match ('/^5[1-5]/', $cardNumber) >= 1):
	              return 'Mastercard';
	          case(preg_match ('/^3[47]/', $cardNumber) >= 1):
	              return 'Amex';
	          case(preg_match ('/^3(?:0[0-5]|[68])/', $cardNumber) >= 1):
	              return 'Diners Club';
	          case(preg_match ('/^6(?:011|5)/', $cardNumber) >= 1):
	              return 'Discover';
	          case(preg_match ('/^(?:2131|1800|35\d{3})/', $cardNumber) >= 1):
	              return 'JCB';
	          default:
	              throw new Exception("Could not determine the credit card type.");
	              break;
	          }
	      }
	    }
	    public function validateChecksum($number) {
	      // Remove non-digits from the number
	      $number=preg_replace('/\D/', '', $number);
	      // Get the string length and parity
	      $number_length = strlen($number);
	      $parity = $number_length % 2;
	      // Split up the number into single digits and get the total
	      $total=0;
	      for ($i=0; $i<$number_length; $i++) {
	          $digit=$number[$i];
	          // Multiply alternate digits by two
	          if ($i % 2 == $parity) {
	              $digit*=2;    
	              // If the sum is two digits, add them together
	              if ($digit > 9) {
	                  $digit-=9;
	              }
	          }    
	          // Sum up the digits
	          $total+=$digit;
	      }
	      // If the total mod 10 equals 0, the number is valid
	      return ($total % 10 == 0) ? TRUE : FALSE;
	    }
	    public function cURL($url = '', $authkey = '')
	    {
		    $curl = curl_init();

		    curl_setopt_array($curl, array(
		    CURLOPT_URL => $url, // e.g "https://api.paystack.co/bank/resolve?account_number=6150222737&bank_code=070"
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 30,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "GET",
		    CURLOPT_HTTPHEADER => array(
		          "Authorization: Bearer $authkey", // sk_live_ec109d45e6e6d174b1b3883c65f7e2050e201faf
		          "Cache-Control: no-cache",
		        ),
		    ));

		    $response = curl_exec($curl);
		    $err = curl_error($curl);
		    curl_close($curl);
		    if ($err) {
		        return "cURL Error #:" . $err;
		    } else {
		        return $response;
		    }
	    }
	    public function transstatus($int = '')
	    {
	    	if ($int == 1) {
	    		return '<span class="status-pill smaller yellow"></span><span>Awaiting Payment</span>';
	    	} else if ($int == 2) {
	    		return '<span class="status-pill smaller green"></span><span>Payment made</span>';
	    	} else if ($int == 3) {
	    		return '<span class="status-pill smaller green"></span><span>Marked Delivered</span>';
	    	} else if ($int == 4) {
	    		return '<span class="status-pill smaller green"></span><span>Completed</span>';
	    	} else {
	    		return '<span class="status-pill smaller red"></span><span>Terminated</span>';
	    	}
	    }
	    public function readableDate($input)
	    {
	      $convert = date("jS F, Y", strtotime($input));
	      return $convert;
	    }
	    public function addDate($setDate, $addedDays)
	    {
	      $date = new DateTime($setDate);
	      $date->add(new DateInterval('P'. $addedDays .'D'));
	      return $date->format('Y-m-d');
	    }
	    public function nullify($value = '')
	    {
	    	return (!empty($value)) ? $value : NULL;
	    }
	    public function cleanamount($amount = '')
	    {
	    	return round(str_replace(",", "", $amount));
	    }
		public function customError($type = '', $msg = '')
		{
			if ($type == 'success') {
				$res = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true"> ×</span></button>'. $msg . '</div>';
			} else if ($type == 'warning') {
				$res = '<div class="alert alert-warning alert-dismissible fade show" role="alert"><button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true"> ×</span></button>'. $msg . '</div>';
			} else if ($type == 'danger') {
				$res = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true"> ×</span></button>'. $msg . '</div>';
			} else if ($type == 'info') {
				$res = '<div class="alert alert-info alert-dismissible fade show" role="alert"><button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true"> ×</span></button>'. $msg . '</div>';
			}
			return $res;
		}
	}