<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset = "utf-8">
<title>Manage My Events</title>

<link rel="stylesheet" type="text/css" href="_css/styles.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

</head>
<body>
        
<!--script for calendar function-->
<script type="text/javascript">(function () {
            if (window.addtocalendar)if(typeof window.addtocalendar.start == "function")return;
            if (window.ifaddtocalendar == undefined) { window.ifaddtocalendar = 1;
                var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                s.type = 'text/javascript';s.charset = 'UTF-8';s.async = true;
                s.src = ('https:' == window.location.protocol ? 'https' : 'http')+'://addtocalendar.com/atc/1.5/atc.min.js';
                var h = d[g]('body')[0];h.appendChild(s); }})();
</script>

<!--Script for Google map -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9YAjl-Zpvqyr6RqQFW9_18HKnelIFXXA&callback=initMap">
</script>

<div id="container">

<div id="header">
<header role = "banner">

<!--Banner -->
<?php
$subtitle = "Manage My Events";
include('_php/banner.php');
?>

<!--Search bar-->
<?php include('_php/showSearch.php'); ?>

</header>
</div>

<div id="body">
<main role = "main">

<!-- Events Accordion -->
<?php include('showMyEvents.php'); ?>

</div>
<!--end of accordion-->
        
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
<!--END OF FOOTER-->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src = "_scripts/manageMyEventsScript.js"></script>
<script src = "_scripts/script.js"></script>

</div>

</body>
</html>