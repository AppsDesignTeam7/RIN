<?php

session_start();

if ($_POST['submitBtn'] == "clear") {
	// If they pressed clear, remove all filters
	unset($_SESSION['selectedTags']);
} else {
	// If they pressed apply, set the filters for sql queries
	$tags = array();
	// Create an array of the TagNumber of all selected filters
	$selected = $_POST['tagCheckbox'];
	foreach ($selected as $tag) {
		array_push($tags, $tag);
	}

	// If tags have been selected, save them. If none are selected, then clear the selection.
	if (sizeof($tags) > 0) {
		$_SESSION['selectedTags'] = $tags;
	} else {
		unset($_SESSION['selectedTags']);
	}
}

// Get the location to return to
if (isset($_SESSION['searchLocation'])) {
	$destination = $_SESSION['searchLocation'];
}	

// reload page with new tag selections
include('redirect.php');
die();

?>
