<?php

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

echo $sql;

$result = $connection->query($sql);
// Could have a js alert here to indicate success or failure...
// Would probably be annoying if you were approving loads of events though...

// Redirect
$destination = "approveEvents.php";
include('redirect.php');

?>