<?php

// Log the current user out, then return them to the homepage
session_start();

if (isset($_SESSION['UserID'])) {
	unset($_SESSION['UserID']);
}

include('redirect.php');
die();

?>