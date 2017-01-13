<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset = "utf-8">
<title>RIN Homepage</title>

<link href="_css/atc-style-button-icon.css" rel="stylesheet" type="text/css">
<link href="_css/atc-style-menu-wb.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="_css/styles.css">
<link rel="stylesheet" type="text/css" href="_css/courses.css">

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

<header role = "banner">

<!-- banner -->
<?php 
$subtitle = "Courses";
include('_php/banner.php'); 
?>

<!--Search bar-->
<section id="searchBar">
<input type="text" name="search" placeholder="Search.." id="searchField">
<button type = "button" id="searchButton">Search</button>

</section>

<!--Expanded Search section -->
<div id = "expandedSearch">

<div id = "subjectFilters">

<form action="_php/applyFilters.php" method="post" id = "filterText">

<!--Subject filters-->
<ul class="checkbox-grid">
    <?php include("_php/showTags.php"); ?>
</ul>

<button class="formSubmissionButton" id="applyFiltersButton">Apply</button><br>

</form>

</div>

<!--Date filters-->
<div id = "dateFromFilters">

<h5>From:</h5>
<select class = "day">
    <option value = "1">1</option>
    <option value = "2">2</option>
    <option value = "3">3</option>
    <option value = "4">4</option>
    <option value = "5">5</option>
    <option value = "6">6</option>
    <option value = "7">7</option>
    <option value = "8">8</option>
    <option value = "9">9</option>
    <option value = "10">10</option>
    <option value = "11">11</option>
    <option value = "12">12</option>
    <option value = "13">13</option>
    <option value = "14">14</option>
    <option value = "15">15</option>
    <option value = "16">16</option>
    <option value = "17">17</option>
    <option value = "18">18</option>
    <option value = "19">19</option>
    <option value = "20">20</option>
    <option value = "21">21</option>
    <option value = "22">22</option>
    <option value = "23">23</option>
    <option value = "24">24</option>
    <option value = "25">25</option>
    <option value = "26">26</option>
    <option value = "27">27</option>
    <option value = "28">28</option>
    <option value = "29">29</option>
    <option value = "30">30</option>
    <option value = "31">31</option>
</select>

<select class = "month">
    <option value = "January">January</option>
    <option value = "February">February</option>
    <option value = "March">March</option>
    <option value = "April">April</option>
    <option value = "May">May</option>
    <option value = "June">June</option>
    <option value = "July">July</option>
    <option value = "August">August</option>
    <option value = "September">September</option>
    <option value = "October">October</option>
    <option value = "November">November</option>
    <option value = "December">December</option>
</select>

<select class = "year">
    <option value = "2016">2016</option>
    <option value = "2017">2017</option>
    <option value = "2018">2018</option>
    <option value = "2019">2019</option>
    <option value =  "2020">2020</option>
</select>


<h5>To:</h5>
<select class = "day">
    <option value = "1">1</option>
    <option value = "2">2</option>
    <option value = "3">3</option>
    <option value = "4">4</option>
    <option value = "5">5</option>
    <option value = "6">6</option>
    <option value = "7">7</option>
    <option value = "8">8</option>
    <option value = "9">9</option>
    <option value = "10">10</option>
    <option value = "11">11</option>
    <option value = "12">12</option>
    <option value = "13">13</option>
    <option value = "14">14</option>
    <option value = "15">15</option>
    <option value = "16">16</option>
    <option value = "17">17</option>
    <option value = "18">18</option>
    <option value = "19">19</option>
    <option value = "20">20</option>
    <option value = "21">21</option>
    <option value = "22">22</option>
    <option value = "23">23</option>
    <option value = "24">24</option>
    <option value = "25">25</option>
    <option value = "26">26</option>
    <option value = "27">27</option>
    <option value = "28">28</option>
    <option value = "29">29</option>
    <option value = "30">30</option>
    <option value = "31">31</option>
</select>

<select class = "month">
    <option value = "January">January</option>
    <option value = "February">February</option>
    <option value = "March">March</option>
    <option value = "April">April</option>
    <option value = "May">May</option>
    <option value = "June">June</option>
    <option value = "July">July</option>
    <option value = "August">August</option>
    <option value = "September">September</option>
    <option value = "October">October</option>
    <option value = "November">November</option>
    <option value = "December">December</option>
</select>

<select class = "year">
    <option value = "2016">2016</option>
    <option value = "2017">2017</option>
    <option value = "2018">2018</option>
    <option value = "2019">2019</option>
    <option value =  "2020">2020</option>
</select>

</div>

</div>  

<!--Event navigation-->
<?php include('_php/navbar.php'); ?>

</header>


<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9YAjl-Zpvqyr6RqQFW9_18HKnelIFXXA&callback=initMap">
</script>


<!--Event details-->

<!--Beginining of accordion 1-->

<!--SEMINARS TAB CONTENT-->

<main role = "main">
    
<!--COURSES TAB CONTENT-->

<section id = "courses">

<!-- Show Courses -->
<?php include("showCourses.php"); ?>

<!--end of accordion for courses-->
</section>


</main>



<!--Footer--> 
<footer id = "pageFooter">
<ul id = "footerNav">
    <li class="footerLink"><a href="tandc.htm">Terms and Conditions</a></li>
    <li class="footerLink"><a href ="contact.htm">Contact</a></li>
    <li class="footerLink"><a href= "copy.htm">Copyright</a></li>
</ul>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script src = "_scripts/script.js"></script>
<script src = "_scripts/courses.js"></script>

</body>
</html>




