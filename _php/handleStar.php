<?php
/* 
When the "add to favourites" star is clicked. Adds the event to the user's favourites
if it is not currently favourited, and removes it from their favourites if they have
added it previously.
*/
require_once('config.php');
session_start();

if (!(isset($_SESSION['UserID']))) {
	// If the user is not logged in, send them to the login page
	$_SESSION['loginError'] = "You must be logged in to favourite an event.";
	$destination = "login.php";
	include('redirect.php');
	die();
}

// Get relevant variables for query
$fav_event = $_POST['EventID'];
$fav_user = $_SESSION['UserID'];

// Set the SQL query depending on whether the event needs to be added or removed
// from the user's favourites.
if ($_POST['Faved']) {
	$favsql = "DELETE FROM favourites WHERE EventID = $fav_event AND UserID = $fav_user";
} else {
	$favsql = "INSERT INTO favourites (EventID, UserID) VALUES ($fav_event, $fav_user)";
}

// Execute the query
$success = $connection->query($favsql);

// Set the return destination for the redirect
if (isset($_SESSION['faveReturn'])) {
	$destination = $_SESSION['faveReturn'];
}

include('redirect.php');

?>