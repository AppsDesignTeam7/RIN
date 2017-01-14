<?php

session_start();

// Tags

if ($_POST['submitBtn'] == "clear") {
	// If they pressed clear, remove all filters
	unset($_SESSION['selectedTags']);
	unset()
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

echo "<script> alert('users hate alerts') </script>";

// Dates

// Set date from
$dayFrom = $_POST['dayFrom'];
$monthFrom = $_POST['monthFrom'];
$yearFrom = $_POST['monthFrom'];
if ($dayFrom == 0 &&
	$monthFrom == 0 &&
	$yearFrom == 0) {
	// Default dateFrom to now
	$_SESSION['dateFrom'] = date("Y-m-d H:i:s", time());	
} else {
	// Use specified time
	// Get vars in sql friendly format
	if ($yearFrom == 0) $yearFrom = date("Y", time());
	if ($monthFrom == 0) $monthFrom = "00";
	if ($dayFrom == 0) $dayFrom = "00";
	// Set dateFrom
	$_SESSION['dateFrom'] = $yearFrom . "-" . $monthFrom . "-" . $dayFrom . " 00:00:00";
}

// Set dateTo from POST
$_SESSION['dateTo'] = $_POST['yearTo'] . "-" . $_POST['monthTo'] . "-" . $_POST['dayTo'] . " 23:59:59";

// Get the location to return to
if (isset($_SESSION['searchLocation'])) {
	$destination = $_SESSION['searchLocation'];
}	


// reload page with new tag selections
include('redirect.php');
die();

?>