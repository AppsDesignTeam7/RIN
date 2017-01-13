<?php
/* 
Get event details 
requires $eventID to be set beforehand
*/

$result=$connection->query("SELECT * FROM events WHERE EventID=$eventID");
if($result->connect_errno > 0){
    die('Unable to connect to database [' . $result->connect_error . ']');
}
if(!$result){
    echo 'no result'.'<br /><br /><br />';
}
while($row = $result->fetch_assoc()){
    echo $row['Speaker'].'<br />';
    echo $row['Location'].'<br />';
    echo $row['Start'].'<br />';
}
?>