<?php
/*
Called when an admin approves or rejects an event.
*/

require_once('config.php');

// Get relevant values from form
$eventID = $_POST['EventID'];
$approved = $_POST['approvalBtn'] == "approve";

if ($approved) {
	// If the button was approve:
	$sql = "UPDATE events SET Approved = 1 WHERE EventID = " . $eventID;
} else {
	// If the button was reject:
	$sql = "UPDATE events SET Approved = 0 WHERE EventID = " . $eventID;
}

$result = $connection->query($sql);

// Redirect
$destination = "approveEvents.php";
include('redirect.php');

?>