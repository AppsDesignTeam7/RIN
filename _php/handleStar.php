<?php
require_once('config.php');
session_start();
echo "Event: " . $_POST['EventID'] . "<br>";
echo "User: " . $_SESSION['UserID'] . "<br>";

$fav_event = $_POST['EventID'];
$fav_user = $_SESSION['UserID'];

if ($_POST['Faved']) {
	$favsql = "DELETE FROM favourites WHERE EventID = $fav_event AND UserID = $fav_user";
} else {
	$favsql = "INSERT INTO favourites (EventID, UserID) VALUES ($fav_event, $fav_user)";
}

echo $favsql . "<br>";
$success = $connection->query($favsql);
if ($success) {
	echo "success";
} else {
	echo "failed";
}

if (isset($_SESSION['faveReturn'])) {
	$destination = $_SESSION['faveReturn'];
}

include('redirect.php');

?>