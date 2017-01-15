<!doctype html>
<html lang="en">
<head>
<meta charset = "utf-8">
<Title>Register Page</Title>
<link rel="stylesheet" type="text/css" href="_css/styles.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<?php
// If the user is already logged in, redirect them back to index
session_start();
if (isset($_SESSION['UserID'])) {
    include('_php/redirect.php');
}
?>

</head>

<body>

<div id="container">

<div id="header">

<header role = "banner">

<!--Banner-->
<?php
$subtitle = "Register";
include('_php/banner.php');
?>

</header>

</div>

<div id="body">

<main role="main">

<h4>Register</h4>

<section id="registrationForm">

<?php
// If the user has tried to submit an invalid value, show the error message
if (isset($_SESSION['RegistrationError'])) {
    echo '<h4 style="color:red">' . $_SESSION['RegistrationError'] . '<h4>';
}
?>

<form id="regForm" action="_php/handleRegister.php" method="post">
    <input type="a" name = "firstName" placeholder="First Name"><br>
    <br>
    <input type="a" name = "surname" placeholder="Surname"><br>
    <br>
    <input type="email" name = "emailAddress" placeholder="name@ucl.ac.uk"><br>
    <br>
    <select>
        <option value="Position">Position</option>
        <option value="Student">Student</option>
        <option value = "Staff"> Staff </option>
    </select>
    <br>
    <select>
        <option value ="Department">Department</option>
        <option value = "Transfiguration">Transfiguration</option>
        <option value = "Charms">Charms</option>
        <option value = "Defence Against the Dark Arts">Defence Against the Dark Arts</option>
        <option value = "History of Magic">History of Magic</option>
    </select>
    <br>
    <select>
        <option value = "Research Group">Research Group</option>
        <option value = "The Slug Club">The Slug Club</option>
        <option value = "The Goblin Revolts">The Goblin Revolts</option>
    </select>
    <br>
    <p> Warning: this is a test site. Passwords encryption is not yet implemented. Do not use a password you use elsewhere.</p>
    <input type="password" name="password" placeholder = "password"><br>
    <br>
    <input type = "password" name="confirmPass" placeholder = "confirm password"><br>
    <br>
    <button type="submit" form="regForm" class = "formSubmissionButton" id="registerButton">Register</button>
</form>

</section>
<br>
    
</main>

</div>

<div id="footer">

<!--Footer--> 
<footer id = "pageFooter">
<ul id = "footerNav">
    <li class="footerLink"><a href="help.php"><div class="linkText">Terms and Conditions</div></a></li>
    <li class="footerLink"><a href ="help.php"><div class="linkText">Contact</div></a></li>
    <li class="footerLink"><a href= "help.php"><div class="linkText">Copyright</div></a></li>
</ul>
</footer>

</div>

</body>

</html>
