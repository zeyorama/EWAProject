<?php

	/**
	 * Function to login
	 * @param String: User String: Password
	 */
	function login($user, $pass) {
		$db->prepare("SELECT * FROM _user WHERE nick = ? AND pass = ?;");
		$db->exe_prepare("ss", $user, md5($pass));
		if($u = $db->get_next_result("User")) {
			$_SESSION['user'] = serialize($u);
		}
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
			$user &= $_SESSION['user'];
			$db->prepare("SELECT * FROM _user WHERE session_id = ? AND last_signin	< current_timestamp + 60*15*1000;");
			$db->exe_prepare("s", $user->getSessionId());
			if($u = $db->get_next_result("User")) {
				return true;
			}
		}
		return false;
	}
?>