<?php
require_once('config.php');

class usersRepository {
	private static $instance = null;
	private $link;
	private function __construct() { 
		($this->link = mysqli_connect(SERVER, LOGIN, PASSWORD, DATABASE));
	}

	static function getInstance() {
		if(self::$instance == null)
		self::$instance = new usersRepository;
		return self::$instance;
	}
			//New post to database//
	function auth($user) {
		if (isset($user->username) && isset($user->password)) {
			$has = mysqli_query($this->link,"SELECT * FROM uni_members
						    WHERE username = '".$user->username."'
						      AND password = '".$user->password."'");
			return mysqli_fetch_array($has);
		} else {
			print_r('Error occurs while getting $user object for authorization! Not isset $user->username AND $user->password');
		}
	}	
}
?>