<?php

	/**
	 * Function to login
	 * @param String: User String: Password
	 */
	function login($user, $pass) {
		$GLOBALS['db']$dbtmp = Database::instance();
		$dbtmp->prepare("SELECT * FROM _user WHERE nick = ? AND pass = ?;");
		$dbtmp->exe_prepare("ss", $user, md5($pass));
		if($u = $dbtmp->get_next_result("User")) {
			$_SESSION['user'] = serialize($u);
		}
	}

	/**
	 * Function to logout
	 */
	function logout() {
		$dbtmp = Database::instance();
		unset($_SESSION['user']);
	}

	/**
	 * Function to check if the user is signed in
	 * @return boolean true if signed in else false
	 */
	function signed_in() {
		$dbtmp = Database::instance();
		if(isset($_SESSION['user'])) {
			$user &= $_SESSION['user'];
			$dbtmp->prepare("SELECT * FROM _user WHERE session_id = ? AND last_signin	< current_timestamp + 60*15*1000;");
			$dbtmp->exe_prepare("s", $user->getSessionId());
			if($u = $dbtmp->get_next_result("User")) {
				return true;
			}
		}
		return false;
	}
?>