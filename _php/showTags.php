<?php

require_once('config.php');
session_start();

// Show all currently selected tags:
if (isset($_SESSION['selectedTags'])) {
	$selectedTags = implode(", ", $_SESSION['selectedTags']);
	$sql = "SELECT * FROM tags WHERE TagID IN ( $selectedTags ) ORDER BY TagName ASC";

	$selected = $connection->query($sql);

	if($selected){
		foreach ($selected as $row) {
			echo '<li><input class="checkbox" type="checkbox" name="tagCheckbox[]" value="' . $row['TagID'] . '" checked="checked">';
			echo '<label for="tagCheckbox[]">' . $row['TagName'] . '</label></li>';
		}
	}
}

// Show other tags

// Get list of tags, depending on search terms
if (isset($_GET['search'])) {
	if (empty($_GET['search'])) {
		// If search bar is empty, unset the search variable
		unset($_GET['search']);
	} 
	// Search entered
	$sql = "SELECT * FROM tags WHERE TagName LIKE '%" . $_GET['search'] . "%' ORDER BY TagName ASC";
} else {
	// No search entered
	$sql = "SELECT * FROM tags ORDER BY TagName ASC";
}

$result = $connection->query($sql);

if($result->connect_errno > 0){
    die('Unable to connect to database [' . $result->connect_error . ']');
}

// Return HTML to display the tags that are found
if(!$result){
	// Connection to db failed
    echo "no result<br>";
} else if(mysqli_num_rows($result) == 0) {
	// No tags found
    echo 'No tags found<br>';
} else {
	// Show a checkbox for each tag found
    while ($row = $result->fetch_assoc()) {
    	if (!in_array($row['TagID'], $_SESSION['selectedTags'])) {
        	echo '<li><input class="checkbox" type="checkbox" name="tagCheckbox[]" value="'.$row['TagID'].'">';
        	echo '<label for="tagCheckbox[]">'.$row['TagName'].'</label></li>';
        }
    }
}
?>