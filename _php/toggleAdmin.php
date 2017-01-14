<?php
require_once('config.php');

// Get user info
$sql = "SELECT * FROM users WHERE UserID = '" . $_POST['UserID'] . "'";
$result = $connection->query($sql);
$row = $result->fetch_assoc();

// Check if they are an admin or not
if ($row['Admin'] == 1) {
	// Demote from admin
	$toggle = "UPDATE users SET Admin = 0 WHERE UserID = '" . $_POST['UserID'] . "'";
} else {
	// Promote to admin
	$toggle = "UPDATE users SET Admin = 1 WHERE UserID = '" . $_POST['UserID'] . "'";
}

// Update admin status
if (!($connection->query($toggle))) {
	echo "<script> alert('Update Failed') </script>";
}

// Redirect 
$destination = "displayAllUsers.php";
include('redirect.php');
die();
?>