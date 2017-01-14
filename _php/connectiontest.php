<?php

require_once('config.php');

echo (msqli_ping($connection) ? "Connected" : "Not Connected");

?>