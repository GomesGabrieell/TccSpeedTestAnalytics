<?php
	session_start();

	if (isset($_SESSION['user_id'])) {
		session_destroy();
		header('Location: ./../page/login.php');
		exit();
	} else {
		header('Location: ./../page/login.php');
		exit();
	}