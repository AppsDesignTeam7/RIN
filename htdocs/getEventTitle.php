<?php
$result=$connection->query("SELECT * FROM events WHERE EventID=$eventID");
if($result->connect_errno > 0){
	die('Unable to connect to database [' . $result->connect_error . ']');
}
if(!$result){
	echo "no result";
}
while($row = $result->fetch_assoc()){
	echo $row['Name'].'<br />';
}
?>