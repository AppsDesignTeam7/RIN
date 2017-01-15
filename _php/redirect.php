<?php
// Redirects the user, either to a specified file stored in $destination before calling,
// or to index (the homepage) if no destination is specified.
// ref: Kiel Labuca https://stackoverflow.com/questions/21226166/php-header-location-redirect-not-working
if (isset($destination)) {
	// Destination is specified, redirect to that location
	if (strpos($destination, "eph-search") !== FALSE) {
		echo "<script type='text/javascript'> document.location = 'https://www.ucl.ac.uk/$destination'; </script>";
	} else {
		echo "<script type='text/javascript'> document.location = 'https://www.ucl.ac.uk/eph-search/$destination'; </script>";
	}
} else {
	// No destination specified, redirect to the homepage
	echo "<script type='text/javascript'> document.location = 'https://www.ucl.ac.uk/eph-search/'; </script>";
}
die();
?>