<?php

	/**
	 * Function to login
	 * @param String: User String: Password
	 * @return true if logged in, otherwise false
	 */
	function login($user, $pass) {
		
		global $db;
		$db->prepare("SELECT * FROM _user WHERE nick = ? AND pass = ? LIMIT 1;");
		$db->exe_prepare("ss", $user, md5($pass));
		$trigger = 0;
		
		while($tmp = $db->get_next_result("User")) {
		  if ($tmp->isLocked()) {
		    return -3;
		  }
		  
		  $u = $tmp;
			$_SESSION['user'] = serialize($u);
			$trigger = 1;
		}
		
		if($trigger === 1) {
		  $u->setSessionId(session_id());
			$u->setlastSignIn(date('Y-m-d H:i:s'));
			return 1;
		}
		
		return 0;
	}

	/**
	 * Function to logout
	 */
	function logout() {
		unset($_SESSION['user']);
	}

	/**
	 * Function to check if the user is signed in
	 * @return boolean true if signed in else false
	 */
	function signed_in() {
	
		if(isset($_SESSION['user'])) {
			
			global $db;
			$db->prepare("SELECT * FROM _user WHERE session_id = ? AND last_signin	< current_timestamp + 60*15*1000 LIMIT 1;");
			$db->exe_prepare("s", session_id());
			$trigger = 0;
			
			while($u = $db->get_next_result("User")) {
				$trigger = 1;
			}
			
			if($trigger) {
				return true;
			}
			
		}
		
		return false;
	}
?>
