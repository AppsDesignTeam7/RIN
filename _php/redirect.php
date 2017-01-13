<?php
// Redirects the user, either to a specified file stored in $destination before calling,
// or to index (the homepage) if no destination is specified.
if (isset($destination)) {
	echo "<script type='text/javascript'> document.location = 'http://localhost:8887/$destination'; </script>";
} else {
	echo "<script type='text/javascript'> document.location = 'http://localhost:8887/index.php'; </script>";
}
die();
?>