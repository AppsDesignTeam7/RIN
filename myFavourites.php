<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset = "utf-8">
<title>My Favourites</title>
<!-- 1. Include style -->
<link href="_css/atc-style-button-icon.css" rel="stylesheet" type="text/css">
<link href="_css/atc-style-menu-wb.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="_css/styles.css">

<link rel="stylesheet" type="text/css" href="_css/favouriteStyles.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
</head>
<body>

<!-- 2. Include script -->
<script type="text/javascript">(function () {
            if (window.addtocalendar)if(typeof window.addtocalendar.start == "function")return;
            if (window.ifaddtocalendar == undefined) { window.ifaddtocalendar = 1;
                var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                s.type = 'text/javascript';s.charset = 'UTF-8';s.async = true;
                s.src = ('https:' == window.location.protocol ? 'https' : 'http')+'://addtocalendar.com/atc/1.5/atc.min.js';
                var h = d[g]('body')[0];h.appendChild(s); }})();
</script>
    
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9YAjl-Zpvqyr6RqQFW9_18HKnelIFXXA&callback=initMap">
</script>

<div id="container">

<div id="header">
<!--Banner-->
<header role = "banner">
  
<?php
$subtitle = "My Favourites";
include('_php/banner.php');
?>

<!--Search bar-->
<?php include('_php/showSearch.php'); ?>


</header>
</div>

<div id="body">
<main role = "main">

<!-- FAVOURITES CONTENT -->

<section id="favourites">

<!--start of favourites accordion-->
  
<?php
include('showFavourites.php');
?>

<!--end of favourites accordion-->
</section>


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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--<script src = "_scripts/myFavouritesScript.js"></script>-->
<script src = "_scripts/script.js"></script>
<script src = "_scripts/myFavourites.js"></script>

</div>

</body>

</html>
