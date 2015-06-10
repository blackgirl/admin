<?php

	function isNameValid ($name) {
		if (strlen($name) > 4) return true;
	}
	function isTextValid ($text, $length=10) {
		if (strlen($text) > $length) return true;
	}
	function isEmailValid ($email) {
		if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) return true;
	}

?>