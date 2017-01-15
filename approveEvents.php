<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset = "utf-8">
<title>Event Approval</title>
<!-- 1. Include style -->
<link href="_css/atc-style-button-icon.css" rel="stylesheet" type="text/css">
<link href="_css/atc-style-menu-wb.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="_css/styles.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
</head>
<body>

<!--Script for google map-->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9YAjl-Zpvqyr6RqQFW9_18HKnelIFXXA&callback=initMap">
</script>

<div id="container">

<div id="header">

<header role = "banner">

<!-- Banner -->
<?php
$subtitle = "Event Approval";
include('_php/banner.php');
?>



<!--Search bar-->
<?php include('_php/showSearch.php'); ?>

</header>

</div>

<div id="body">

<main role = "main">

<!-- MANAGE ADMIN USERS CONTENT -->

<section id = "unapproved">

<?php include('showUnapprovedEvents.php'); ?>

</section>

</main>

</div>

<!--Footer--> 
<div id="footer">
<footer id = "pageFooter">
<ul id = "footerNav">
    <li class="footerLink"><a href="help.php"><div class="linkText">Terms and Conditions</div></a></li>
    <li class="footerLink"><a href ="help.php"><div class="linkText">Contact</div></a></li>
    <li class="footerLink"><a href= "help.php"><div class="linkText">Copyright</div></a></li>
</ul>
</footer>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src = "_scripts/script.js"></script>

</div>

</body>
</html>



