<?php
require_once('config.php');
session_start();

$result = $connection->query("SELECT * FROM tags ORDER BY TagName ASC");
if($result->connect_errno > 0){
    die('Unable to connect to database [' . $result->connect_error . ']');
}

if(!$result){
    echo "no result<br>";
} else if(mysqli_num_rows($result) == 0) {
    echo 'No tags found<br>';
} else {
    foreach ($result as $row) {
        echo '<li><input class="checkbox" type="checkbox" name="tagCheckbox[]" value="'.$row['TagID'].'"';
        if (in_array($row['TagID'], $_SESSION['selectedTags'])) echo ' checked="checked"';
        echo '><label for="tagCheckbox[]">'.$row['TagName'].'</label></li>
';
    }
}
?>