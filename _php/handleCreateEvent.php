<?php
/*
Handles input validation/processing when user clicks "create event" on the createEvent.php page.
If input is valid, the event is added to the db.
*/


/* TODO:
Process tags, and write query that adds them to the db.
*/

require_once('config.php');
session_start();

print_r($_POST);
echo "<br>";

unset($_SESSION['eventCreationError']);

// Check an event type has been selected
if ($_POST['type'] == 0 ||
	$_POST['type'] == 1 ||
	$_POST['type'] == 2) {
	$event_type = $_POST['type'];
} else {
	$_SESSION['eventCreationError'] = "Please select an event type";
	echo "<script type='text/javascript'> document.location = 'http://localhost:8887/createEvent.php'; </script>";
	die();
}


// Event title
if (!empty($_POST['eventTitle'])) {
	$event_title = ucwords($_POST['eventTitle']);
} else {
	$_SESSION['eventCreationError'] = "Please enter an event title";
	echo "<script type='text/javascript'> document.location = 'http://localhost:8887/createEvent.php'; </script>";
	die();
}

// Location
if (!empty($_POST['location'])) {
	$event_location = $_POST['location'];
} else {
	$_SESSION['eventCreationError'] = "Please enter a location";
	echo "<script type='text/javascript'> document.location = 'http://localhost:8887/createEvent.php'; </script>";
	die();
}

// Date
// Needs validation
if (empty($_POST['date'])) {
	// No date entered
	$_SESSION['eventCreationError'] = "Please enter a date";
	echo "<script type='text/javascript'> document.location = 'http://localhost:8887/createEvent.php'; </script>";
	die();
} else {
	// Check if date is valid
	$split_date = explode('/', $_POST['date']);
	$day = $split_date[0];
	$month = $split_date[1];
	$year = $split_date[2];
	$date_valid = checkdate($month, $day, $year);
	if (!$date_valid) {
		// Date is invalid
		$_SESSION['eventCreationError'] = "Please enter a date in dd/mm/yyyy format";
		echo "<script type='text/javascript'> document.location = 'http://localhost:8887/createEvent.php'; </script>";
		die();
	} else {
		// Store date in SQL friendly format
		$event_date = implode('-', array($year, $month, $day));
	}
}

// Time
// Needs validation
if (empty($_POST['time'])) {
	// No time entered
	$_SESSION['eventCreationError'] = "Please enter a time";
	echo "<script type='text/javascript'> document.location = 'http://localhost:8887/createEvent.php'; </script>";
	die();
} else {
	// Check if time is valid
	// ref: https://stackoverflow.com/questions/3964972/validate-this-format-hhmm
	$time_valid = preg_match("/(2[0-3]|[01][0-9]):([0-5][0-9])/", $_POST['time']);
	if (!$time_valid) {
		// Time is invalid
		$_SESSION['eventCreationError'] = "Please enter a 24h time in hh:mm format";
		echo "<script type='text/javascript'> document.location = 'http://localhost:8887/createEvent.php'; </script>";
		die();
	} else {
		// Store time in SQL friendly format
		$event_time = $_POST['time'] . ":00";
	}
}

// Check datetime has not passed
$event_start = strtotime($event_date . " " . $event_time);
if ($event_start < time()) {
	// Start is in the past
	$_SESSION['eventCreationError'] = "Please enter a start time/date that is not in the past";
	echo "<script type='text/javascript'> document.location = 'http://localhost:8887/createEvent.php'; </script>";
	die();
}

// Description
if (!empty($_POST['description'])) {
	$event_description = $_POST['description'];
} else {
	$_SESSION['eventCreationError'] = "Please enter a description";
	echo "<script type='text/javascript'> document.location = 'http://localhost:8887/createEvent.php'; </script>";
	die();
}

// Duration
if (empty($_POST['duration'])) {
	// No duration entered
	$_SESSION['eventCreationError'] = "Please enter a duration";
	echo "<script type='text/javascript'> document.location = 'http://localhost:8887/createEvent.php'; </script>";
	die();
} else {
	// Validate duration
	if (intval($_POST[duration]) > 0) {
		// Store duration
		$event_duration = intval($_POST[duration]);
	} else {
		// Invalid duration
		$_SESSION['eventCreationError'] = "Please enter a valid duration in hours";
		echo "<script type='text/javascript'> document.location = 'http://localhost:8887/createEvent.php'; </script>";
		die();
	}
}

// Speaker
if (!empty($_POST['speaker'])) {
	$event_speaker = ucwords($_POST['speaker']);
} else {
	$_SESSION['eventCreationError'] = "Please enter an event title";
	echo "<script type='text/javascript'> document.location = 'http://localhost:8887/createEvent.php'; </script>";
	die();
}

// Fees
// Needs validation
if (empty($_POST['fees'])) {
	// No fee entered
	$event_fees = 0;
} else {
	// Validate amount
	// ref: https://stackoverflow.com/questions/19251542/php-preg-match-validate-price-format
	if (preg_match('/^\d+(?:\.\d{2})?$/', $_POST['fees'])) {
		$event_fees = floatval($_POST['fees']);
	} else {
		// Price is invalid
		$_SESSION['eventCreationError'] = "Please enter a valid price";
		echo "<script type='text/javascript'> document.location = 'http://localhost:8887/createEvent.php'; </script>";
		die();
	}
}

// link
// Needs validation
if (empty($_POST['linkToWebsite'])) {
	// No fee entered
	$_SESSION['eventCreationError'] = "Please enter a link for further information";
	echo "<script type='text/javascript'> document.location = 'http://localhost:8887/createEvent.php'; </script>";
	die();
} else {
	if (filter_var($_POST['linkToWebsite'], FILTER_VALIDATE_URL)) {
		// link is valid
		$event_link = $_POST['linkToWebsite'];
	} else {
		// link is invalid
		$_SESSION['eventCreationError'] = "Please enter a valid information link";
		echo "<script type='text/javascript'> document.location = 'http://localhost:8887/createEvent.php'; </script>";
		die();
	}
}

// Tags
// Will be complicated

// Deadline
if ($event_type == 2) {
	// Event is a conference, and so should have a deadline
	if (empty($_POST['deadline'])) {
		// No deadline entered
		$_SESSION['eventCreationError'] = "Please enter a deadline for abstract submissions";
		echo "<script type='text/javascript'> document.location = 'http://localhost:8887/createEvent.php'; </script>";
		die();
	} else {
		// Check if date is valid
		$split_date = explode('/', $_POST['deadline']);
		$day = $split_date[0];
		$month = $split_date[1];
		$year = $split_date[2];
		$date_valid = checkdate($month, $day, $year);
		if (!$date_valid) {
			// Date is invalid
			$_SESSION['eventCreationError'] = "Please enter a deadline in dd/mm/yyyy format";
			echo "<script type='text/javascript'> document.location = 'http://localhost:8887/createEvent.php'; </script>";
			die();
		} else {
			// Store date in SQL friendly format
			$event_deadline = implode('-', array($year, $month, $day));
		}
	}
}


// Add to events db
$event_organiser = $_SESSION['UserID'];
$sql_add_event = "INSERT INTO events
(Type, Name, Location, Start, Duration, Description, Speaker, InfoLink, Cost, OrganiserID) VALUES
($event_type, '" . 
$event_title . "', '" . 
$event_location . "', '" . 
$event_date . " " . $event_time . "', 
$event_duration, '" . 
$event_description . "', '" . 
$event_speaker . "', '" . 
$event_link . "', 
$event_fees, 
$event_organiser)";
echo '<br>' . $sql_add_event . "<br>";

if ($connection->query($sql_add_event)) {
	echo "<br>Great success<br>";
	$event_id = $connection->insert_id;
} else {
	echo "<br>oh for fuck's sake<br>";
}

// Add the abstract deadline to db if necessary
echo '<br>' . $event_id;
if ($event_type == 2) {
	$sql_add_deadline = "INSERT INTO abstract_deadlines
		(Deadline, EventID) VALUES ($event_deadline, $event_id)";
	$connection->query($sql_add_deadline);
}

// Return to main page
// ref: Kiel Labuca https://stackoverflow.com/questions/21226166/php-header-location-redirect-not-working
// UPDATE THE ADDRESS USED HERE ONCE SITE IS LIVE
echo "<script type='text/javascript'> document.location = 'http://localhost:8887/index.php'; </script>";
die();

?>