<?php

	/**
	 * Function to login
	 * @param String: User String: Password
	 * @return true if logged in else false
	 */
	function login($user, $pass) {
		$db = $GLOBALS['db'];
		$db->prepare("SELECT * FROM _user WHERE nick = ? AND pass = ? LIMIT 1;");
		$db->exe_prepare("ss", $user, md5($pass));
		while($u = $db->get_next_result("User")) {
			$u->setSessionId(session_id());
			$u->setlastSignIn(date('Y-m-d H:i:s'));
			$_SESSION['user'] = serialize($u);
			return true;
		}
		return false;
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
		$db = $GLOBALS['db'];
			$user &= $_SESSION['user'];
			$db->prepare("SELECT * FROM _user WHERE session_id = ? AND last_signin	< current_timestamp + 60*15*1000 LIMIT 1;");
			$db->exe_prepare("s", session_id());
			while($u = $db->get_next_result("User")) {
				return true;
			}
		}
		return false;
	}
?>