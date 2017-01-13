<?php

session_start();

if (isset($_SESSION['UserID'])) {
	unset($_SESSION['UserID']);
}

header('location: http://localhost:8887/index.php');
die();

?>