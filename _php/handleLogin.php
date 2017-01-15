<?php
/* 
Handles login attempts. This will redirect users to the main page if successful,
otherwise it will leave the user on the current page. Thus
*/

require_once('config.php');
session_start();

unset($_SESSION['loginError']);

if (isset($_SESSION['UserID'])) {
	// User is already logged in (shouldn't happen)
	// Redirect them back to the main page
	include('redirect.php'); 
	die();
}

// If a username and password have been entered, assign them to $username and $password
if (isset($_POST['emailAddressInput'])) $username = $_POST['emailAddressInput'];
if (isset($_POST['passWord'])) $password = $_POST['passWord'];

if (empty($_POST['emailAddressInput']) ||
	empty($_POST['passWord'])) {
	// One of the fields was empty
	$_SESSION['loginError'] = 'Invalid username or password';
} else {
	// Check if Username and Password match an account in the db
	$username = $_POST['emailAddressInput'];
	$password = $_POST['passWord'];

	$user_query = "
		SELECT *
		FROM users
		WHERE Username = '".$username."' AND Password = '".$password."'";

	$result = $connection->query($user_query);

	if ($result->connect_errno > 0) {
    	die('Unable to connect to database [' . $result->connect_error . ']');
	}

	// Try to log the user in
	if (!$result) {
		echo 'no result<br>';
	} else if (mysqli_num_rows($result) == 1) {
		// Matching account found, set the logged in user
		if (isset($_SESSION['loginError'])) {
			unset($_SESSION['loginError']); 
		}
		while ($row = $result->fetch_assoc()) {
			$_SESSION['UserID'] = $row['UserID'];
			$_SESSION['isAdmin'] = ($row['Admin'] == 1);
		}
	} else {
		// No matching account, set error
		$_SESSION['loginError'] = 'Invalid username or password';
	}
} 

// Redirect to the appropriate page depending on whether login was successful
if (!(isset($_SESSION['UserID']))) {
	$destination = "login.php";
}

include('redirect.php');
die();

?>