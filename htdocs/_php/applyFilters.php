<?php

session_start();

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

// reload page with new tag selections
// ref: Kiel Labuca https://stackoverflow.com/questions/21226166/php-header-location-redirect-not-working
// UPDATE THE ADDRESS USED HERE ONCE SITE IS LIVE
echo "<script type='text/javascript'> document.location = 'http://localhost:8887/index.php'; </script>";
die();

?>