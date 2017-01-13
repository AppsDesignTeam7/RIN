<?php

require_once("config.php");
session_start();

// Get email
if (!empty($_POST['emailAddress'])){
	$username = $_POST['emailAddress'];
} else {
	// No email entered
	$_SESSION['RegistrationError'] = "Please enter a valid email address.";
	$destination = 'register.php';
	include('redirect.php');
}

// Get password
if (!empty($_POST['password'])){
	if ($_POST['password'] == $_POST['confirmPass']) {
		$password = $_POST['password'];
	} else {
		// Password and confirm password did not match
		$_SESSION['RegistrationError'] = "Passwords did not match.";
		$destination = 'register.php';
		include('redirect.php');
	}
} else {
	// No password entered
	$_SESSION['RegistrationError'] = "Please enter a password.";
	$destination = 'register.php';
	include('redirect.php');
}

$sql = "INSERT INTO users (Username, Password) VALUES ('$username', '$password')";

if ($connection->query($sql)) {
	// User successfully added
	if (isset($_SESSION['RegistrationError'])) {
		unset($_SESSION['RegistrationError']);
	}
	// Set user as logged in
	$userID = $connection->insert_id;
	$_SESSION['UserID'] = $userID;
	// Redirect
	include('redirect.php');
} else {
	$_SESSION['RegistrationError'] = "Could not add user.
	Please contact the administrators.";
	$destination = 'register.php';
	include('redirect.php');
}

echo $_SESSION['RegistrationError'] . "<br>";




?>