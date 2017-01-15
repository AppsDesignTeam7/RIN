<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset = "utf-8">
    <title>Create Event</title>
    <link rel="stylesheet" type="text/css" href="_css/styles.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
</head>

<body>

<div id="container">

<div id="header">

<!-- Banner -->
<header role = "banner">

<?php include('_php/banner.php'); ?>

</header>

</div>

<!-- if a user is not logged in, redirect to the login page -->
<?php if (!isset($_SESSION['UserID'])) header('location: login.php'); ?>

<div id="body">

<main>

<h4>Enter Event Details</h4>

<?php
// If the user has tried to submit an invalid event, show the error message
if (isset($_SESSION['eventCreationError'])) {
    echo '<h4 style="color:red">' . $_SESSION['eventCreationError'] . '<h4>';
}
?>

<form action="_php/handleCreateEvent.php" method="post">
    <select name="type" method="post">
        <option value=-1>Event Type</option>
        <option value=2 >Conference</option>
        <option value=1 >Courses</option>
        <option value=0 >Seminars</option>
    </select>
    <br>
    <input type="a" name="eventTitle" placeholder="Event Title"><br>
    <br>
    <input type="a" name = "addressLine1" placeholder = "Address Line 1"><br>
    <br>
    <input type ="a" name = "addressLine2" placeholder = "Address Line 2"><br>
    <br>
    <input type="a" name = "postcode" placeholder="Postcode"><br>
    <br>
    <input type="a" name="date" placeholder="Date (dd/mm/yyyy)"><br>
    <br>
    <input type="a" name="time" placeholder="Time (hh:mm, 24h)"><br>
    <br>
    <textarea rows="4" name="description" placeholder="Description"></textarea><br>
    <br>
    <input type="a" name="duration" placeholder="Duration (hours)"><br>
    <br>
    <input type="a" name="speaker" placeholder="Speaker"><br>
    <br>
    <input type="a" name="fees" placeholder="Fees"><br>
    <br>
    <input type="a" name="linkToWebsite" placeholder="Link to Website"><br>
    <br>
    <input type="a" name="linkToImage" placeholder="Link to Event Image"><br>
    <br>
    <input type="a" name="tags" placeholder="Tags"><br>
    <br>
    <div class="promptText">Conferences only:</div><br>
    <input type="a" name="deadline" placeholder="Abstract Deadline (dd/mm/yyyy)"><br>
    <br>
    <button class="formSubmissionButton" id="createEventButton">Create Event!</button>
    <br>
</form>

</main>
</div>

<!--Footer--> 
<div id="footer">
<footer id = "pageFooter">
<ul id = "footerNav">
    <li class="footerLink"><a href="help.php"><div class="linkText">Terms and Conditions</div></a></li>
    <li class="footerLink"><a href="help.php"><div class="linkText">Contact</div></a></li>
    <li class="footerLink"><a href="help.php"><div class="linkText">Copyright</div></a></li>
</ul>
</footer>
</div>

</div>

</body>

</html>


