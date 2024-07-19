<?php
session_start();

$error = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if ($username === 'admin' && $password === 'password') {
		// Login successful, set session variable and redirect to admin dashboard
		$_SESSION['admin_logged_in'] = true;
		header('Location: homepage.php');
		exit;
	} else {
		$error = 'Invalid username or password';
	}
}

?>