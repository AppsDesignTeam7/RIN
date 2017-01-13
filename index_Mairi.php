<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset = "utf-8">
<title>RIN Homepage</title>

<!--Importing relevant stylesheets -->
<link href="_css/atc-style-button-icon.css" rel="stylesheet" type="text/css">
<link href="_css/atc-style-menu-wb.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="_css/styles.css">
<link rel="stylesheet" type="text/css" href="_css/index.css">

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
$subtitle = "Homepage";
include('_php/banner.php'); 
?>

<?php include('_php/truefalse.php'); ?>

<!--testing for star-->
<script type="text/javascript">
var result = "<?php echo ((getFalse()) ? "TRUE" : "FALSE"); ?>";
if(result == "TRUE"){
    console.log("This is true");
} else if(result == "FALSE") {
    console.log("This is false");
} else{
    console.log("Neither true nor false were returned");
}
</script>


<!--ZAK - PLEASE ADD THE SEARCH SECTION ON EVERY PAGE WITH PHP - SEE FURTHER ON IN CODE FOR WHEN THE SEARCH SECTION ENDS -->
<!--Search section-->
<!--Search bar-->
<section id="searchBar">
<input type="text" name="search" placeholder="Search.." id="searchField">
<button type = "button" id="searchButton">Search</button>

</section>

<!--Expanded Search section -->
<div id = "expandedSearch">

<form action="_php/applyFilters.php" method="post" id = "filterText">

<div id="allFilters">
<div id = "subjectFilters">

<!--Subject filters-->
<ul class="checkbox-grid">
    <?php include("_php/showTags.php"); ?>
</ul>

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

<div id="applyButtonSection">
<button id="applyFiltersButton">Apply</button>
</div>

</form>

</div>  
<!--END OF SEARCH SECTION-->


<!--SEMINARS TAB CONTENT-->

<section id="seminars">

<!--start of seminars accordion-->
<div class = "accordion">

<!--Seminar 1-->

<!--seminar 1 accordion header - e.g. what is visible when the section is unexpanded --> 
<section class = "eventSummarySection">

<h3>On Muggle Teapots</h3>

<img src="_images/teapot.jpg" alt = "Img1" class= "eventImage">  

<span class="addtocalendar atc-style-button-icon atc-style-menu-wb">
        <a class="atcb-link">
        <form action="handleCalendar.php" method="post" class="calForm">
        <button name = "calBtn" type="submit" value="addToCal" class="calButton">
        <i class="fa fa-calendar fa-2x" class="addToCalendar"></i>
        </button>
        </form>
            <!--<img src="_images/icon.png" width="32">-->
        </a>	
        <var class="atc_event">
            <var class="atc_date_start">2016-11-28 17:00:00</var>
            <var class="atc_date_end">2016-11-28 18:00:00</var>
            <var class="atc_timezone">Europe/London</var>
            <var class="atc_title">On Muggle Teapots</var>
            <var class="atc_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Si quae forte-possumus. Re mihi non aeque satisfacit, et quidem locis pluribus. Si quidem, inquit, tollerem, sed relinquo. Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant.</var>
            <var class="atc_location">Ministry of Magic</var>
            <var class="atc_organizer">Arthur Weasley</var>
            <var class="atc_organizer_email">a.weasley@ministryofmagic.org</var>
        </var>
</span>

<!--CODE FOR TESTING - TO REMOVE
<a href="#" onClick="return false" onmousedown="javascript:swapContent('con3');"><i class="fa fa-star fa-2x" aria-hidden="true" id="clickMe"></i></a>
-->

<form action="handleStar.php" method="post" class="favsForm">
<button name="starBtn" type="submit" value="addToFavs" class="favButton">
<i class="fa fa-star fa-2x" aria-hidden="true" id="clickMe" ></i>
</button>
</form>


    <ul class="eventSummaryDetails">
        <li>Mr Weasley</li>
        <li>Department of Muggle Relations, <div class="address">WC1E 6BT</div></li>
        <li>Ministry of Magic</li>
        <li>17:00</li>
        <li>Monday 28th November 2016</li>
    </ul>
    
</section>

<!--seminar 1 accordion contents - e.g. what is visible when the section has been expanded-->
<div class="furtherDetails">


<p>Free</p>
        
<p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Si quae forte-possumus. Re mihi non aeque satisfacit, et quidem locis pluribus. Si quidem, inquit, tollerem, sed relinquo. Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant.</p>
        
<p>
<a href = "index.htm" class="hashtag">#teapots</a> 
<a href = "index.htm" class="hashtag">#arthurweasley</a>
<a href = "index.htm" class="hashtag">#mugglestudies</a>
<a href = "index.htm" class="hashtag">#Philosophy</a>

</p>

        
<p>
<a href="https://www.ucl.ac.uk" class="linkToEventSite">http://www.ministryofmagic.com</a>
</p>

<div class="map"></div>

</div>
<!--end of seminar 1 contents-->
    
<!--Seminar 2-->
<!--seminar 2 accordion header--> 
<section class = "eventSummarySection">

<h3>The Employment Conditions of House Elves</h3>

<img src="_images/dobby.jpg" alt = "Img2" class= "eventImage">
    
<!--<i class="fa fa-calendar fa-2x"></i>-->

<span class="addtocalendar atc-style-button-icon atc-style-menu-wb">
        <a class="atcb-link">
        <i class="fa fa-calendar fa-2x" class="addToCalendar"></i>
            <!--<img src="_images/icon.png" width="32">-->
        </a>	
        <var class="atc_event">
            <var class="atc_date_start">2016-11-29 18:00:00</var>
            <var class="atc_date_end">2016-11-29 19:00:00</var>
            <var class="atc_timezone">Europe/London</var>
            <var class="atc_title">The Employment Conditions of House Elves</var>
            <var class="atc_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Si quae forte-possumus. Re mihi non aeque satisfacit, et quidem locis pluribus. Si quidem, inquit, tollerem, sed relinquo. Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant.</var>
            <var class="atc_location">Hogwarts School of Witchcraft and Wizardry</var>
            <var class="atc_organizer">Hermione Granger</var>
            <var class="atc_organizer_email">h.granger@ministryofmagic.org</var>
        </var>
    </span>

<i class="fa fa-star fa-2x" aria-hidden="true"></i>
    
    <ul class="eventSummaryDetails">
        <li>Hermione Granger</li>
        <li>Society for the Promotion of Elfish Welfare, <div class="address">EH9 2PT</div></li>
        <li>Hogwarts School of Witchcraft and Wizadry</li>
        <li>18:00</li>
        <li>Tuesday 29th November 2016</li>
    </ul>
    
</section>

<!--seminar 2 accordion contents-->
<div class="furtherDetails">
        
<p>Free</p>
        
<p></p>
        
<p>
<a href = "index.htm" class="hashtag">#houseelves</a>
<a href = "index.htm" class="hashtag">#employmentconditions</a> 
<a href = "index.htm" class="hashtag">#elfrights</a>
<a href = "index.htm" class="hashtag">#SPEW</a>

</p>
        
<p>
<a href="https://www.ucl.ac.uk" class = "linkToEventSite">http://www.hogwarts/spew.com</a>
</p>

<div class="map"></div>
    
</div>
<!--end of seminar 2 accordion contents -->
    
<!--Seminar 3-->
<!--seminar 3 accordion header-->
<section class = "eventSummarySection">
<h3>The Use of the Patronus</h3>

<img src="_images/patronus_stag.jpg" alt = "Img3" class= "eventImage">

<!--i class="fa fa-calendar fa-2x"></i>-->

<span class="addtocalendar atc-style-button-icon atc-style-menu-wb">
        <a class="atcb-link">
        <i class="fa fa-calendar fa-2x" class="addToCalendar"></i>
            <!--<img src="_images/icon.png" width="32">-->
        </a>	
        <var class="atc_event">
            <var class="atc_date_start">2016-11-30 19:00:00</var>
            <var class="atc_date_end">2016-11-30 21:00:00</var>
            <var class="atc_timezone">Europe/London</var>
            <var class="atc_title">The Use of the Patronus</var>
            <var class="atc_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Si quae forte-possumus. Re mihi non aeque satisfacit, et quidem locis pluribus. Si quidem, inquit, tollerem, sed relinquo. Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant.</var>
            <var class="atc_location">The Room of Requirement</var>
            <var class="atc_organizer">Harry Potter</var>
            <var class="atc_organizer_email">h.potter@hogwarts.edu</var>
        </var>
    </span>
    
<i class="fa fa-star fa-2x" aria-hidden="true"></i>
    
    <ul class="eventSummaryDetails">
        <li>Harry Potter</li>
        <li>Department of Dumbledore's Army, <div class= "address">N16 0AP</div></li>
        <li>Room of Requirement</li>
        <li>19:00</li>
        <li>Wednesday 30th November 2016</li>
    </ul>

</section>

<!--seminar 3 accordion contents-->
<div class="furtherDetails">
        
<p>Free</p>
        
<p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Si quae forte-possumus. Re mihi non aeque satisfacit, et quidem locis pluribus. Si quidem, inquit, tollerem, sed relinquo. Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant.</p>
        
<p>
<a href = "index.htm" class="hashtag">#patronus</a>
<a href = "index.htm" class="hashtag">#patronustechniques</a> 
<a href = "index.htm" class="hashtag">#defenceagainstthedarkarts</a>
<a href = "index.htm" class="hashtag">#dumbledoresarmy</a>
<a href = "index.htm" class="hashtag">#DA</a>

</p>
        
<p>
<a href="https://www.ucl.ac.uk" class = "linkToEventSite">http://www.hogwarts/da.com</a>
</p>

<div class="map"></div>
    
</div>
<!--end of accordion contents 3 -->
    
</div>
<!--end of seminar accordion-->
</section>
    


<!--Event navigation-->
<!--< php include('_php/navbar.php'); ?>
-->

</header>

</div>

<div id="body">

<!--Event Details Accordion-->
<main role = "main">

<!--start of seminars accordion-->
<?php include("showSeminars.php"); ?>

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

<!--JavaScript imports -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src = "_scripts/script.js"></script>
<script src = "_scripts/home.js"></script>

</div>

</body>
</html>
