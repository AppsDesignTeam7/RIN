<!doctype html>
<html lang="en">
<head>
<meta charset = "utf-8">
<title>Sign in Page</title>
<link rel="stylesheet" type="text/css" href="_css/styles.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

</head>

<body>

<div id="container">

<div id="header">
<header>
    
<?php include('_php/banner.php'); ?>
 
</header>
</div>

<div id="body">

<main>

<h4>Sign In</h4>

<form action="_php/handleLogin.php" method="post">

<input type = "email" name = "emailAddressInput" placeholder = "email address"><br><br>
<input type="password" name = "passWord" placeholder = "password">

<?php
// Show error message if there has been an unsuccessful attempt
session_start();
if (isset($_SESSION['loginError'])) {
    echo '<p style="color:red">'.$_SESSION['loginError'].'<p><br>';
} else {
    echo '<br><br>';
}
?>

<button type = "submit" class="formSubmissionButton" id="signInButton">Sign In</button><br>

</form>

<br>

<br>
    
<h5 class = "centerText">
No account? <a href="register.php">Create one!</a>
</h5>

<br>

<h5 class = "centerText"><a href="resetPassword.htm"> Forgot my password </a></h5>

</main>

</div>

<div id="footer">
<!--ZAK - PLEASE PUT THIS FOOTER ON EACH PAGE USING PHP -->
<!--Footer--> 
<footer id = "pageFooter">
<ul id = "footerNav">
    <li class="footerLink"><a href="tandc.htm"><div class="linkText">Terms and Conditions</div></a></li>
    <li class="footerLink"><a href ="contact.htm"><div class="linkText">Contact</div></a></li>
    <li class="footerLink"><a href= "copy.htm"><div class="linkText">Copyright</div></a></li>
</ul>
</footer>
<!--END OF FOOTER-->
</div>

</div>

</body>

</html>
