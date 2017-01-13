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

<header role = "banner">

<div id = "banner">
<a href = "index.php">
<div id="linkToHome">
    <h1>RIN</h1>
    <h2>
        Event Approval    </h2>
     
</div>
</a>


<!--Site navigation for smaller screens-->

<div id = "smallScreenNav">

<div class="dropdownNav">
    <button class="dropbtnNav"><i class="fa fa-navicon"></i></button>
        <div class="dropdown-contentNav">
            <a href="index.php">Home</a>
            <a href="createEvent.php">Create New Event</a> 
            
            
                <div class="dropdownIn">
                    <a href="javascript:void(0)" class="dropbtnIn">My Account</a>
                    <div class="dropdown-contentIn">
                        <a href="myFavourites.htm">My Favourites</a>
                        <a href="manageMyEvent.htm">Manage My Events</a>
                        <a href="resetPassword.htm">Reset Password</a>
                        <a href="approveEvents.htm">Approve Events</a>
                        <a href="displayAllUsers.htm">Manage Users</a>
                        <a href="_php/logout.php">Logout</a>
                    </div>
                 </div>             
            <a href="help.htm">Help</a>
        </div>
</div>

</div>


<!--Site navigation for larger screens-->

<div id="siteNav">

<ul id="navBar">
    <li class="navLink" id="homeLink"><a href="index.php" class="indexLink"><div class="linkText">HOME</div></a></li>
    <li class="navLink" id="createEventLink"><a href="createEvent.php"><div class="linkText">CREATE NEW EVENT</div></a></li>
    
    
        <li class = "dropdown" class="navLink" id="myAccountLink">
            <a href="javascript:void(0)" class="dropbtn"><div class="linkText">MY ACCOUNT</div></a>
            <div class="dropdown-content">
                <a href="myFavourites.htm">My Favourites</a>
                <a href="manageMyEvent.htm">Manage My Events</a>
                <a href="resetPassword.htm">Reset Password</a>
                <a href="approveEvents.htm">Approve Events</a>
                <a href="displayAllUsers.htm">Manage Users</a>
                <a href="_php/logout.php">Logout</a>
            </div>
        </li>    
    <li class="navLink" id="helpLink"><a href="help.htm"><div class="linkText">HELP</div></a></li>
</ul>

</div>

</div>
<!--Search bar-->
<section id="searchBar">
<input type="text" name="search" placeholder="Search.." id="searchField">
<button type = "button" id="searchButton">Search</button>

</section>

<!--Expanded Search section -->
<div id = "expandedSearch">

<div id = "subjectFilters">

<form action="" id = "filterText">

<!--Subject filters-->
<ul class="checkbox-grid">
    <li><input class="checkbox" type="checkbox" name="tagCheckbox[]" value="1"><label for="tagCheckbox[]">App Design</label></li><li><input class="checkbox" type="checkbox" name="tagCheckbox[]" value="19"><label for="tagCheckbox[]">Child Health</label></li><li><input class="checkbox" type="checkbox" name="tagCheckbox[]" value="11"><label for="tagCheckbox[]">Cognitive Science</label></li><li><input class="checkbox" type="checkbox" name="tagCheckbox[]" value="9"><label for="tagCheckbox[]">Epidemiology</label></li><li><input class="checkbox" type="checkbox" name="tagCheckbox[]" value="15"><label for="tagCheckbox[]">History of Science</label></li><li><input class="checkbox" type="checkbox" name="tagCheckbox[]" value="25"><label for="tagCheckbox[]">Infectious Diseases</label></li><li><input class="checkbox" type="checkbox" name="tagCheckbox[]" value="21"><label for="tagCheckbox[]">Law</label></li><li><input class="checkbox" type="checkbox" name="tagCheckbox[]" value="27"><label for="tagCheckbox[]">Mathematics</label></li><li><input class="checkbox" type="checkbox" name="tagCheckbox[]" value="29"><label for="tagCheckbox[]">Microbiology</label></li><li><input class="checkbox" type="checkbox" name="tagCheckbox[]" value="17"><label for="tagCheckbox[]">Nutrition</label></li><li><input class="checkbox" type="checkbox" name="tagCheckbox[]" value="23"><label for="tagCheckbox[]">Philosophy</label></li><li><input class="checkbox" type="checkbox" name="tagCheckbox[]" value="7"><label for="tagCheckbox[]">Public Health</label></li><li><input class="checkbox" type="checkbox" name="tagCheckbox[]" value="3"><label for="tagCheckbox[]">Social Science</label></li></ul>

</form>

</div>

<div id = "dateFromFilters">

        <h5>From</h5>
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

</header>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9YAjl-Zpvqyr6RqQFW9_18HKnelIFXXA&callback=initMap">
</script>
    

<main role = "main">

<!-- MANAGE ADMIN USERS CONTENT -->

<section id = "conferences">

<div class = "accordion">
<section class = "eventSummarySection">
    <h3>Group Meeting</h3>
    <img src=http://www.almanac.com/sites/default/files/users/Almanac%20Staff/hatching-raising-chicken-chicks_full_width.jpg alt = "Img1" class= "eventImage">
    <!-- PLEASE PLACE THESE BUTTONS NICELY -->
    <form action="_php/handleApproval.php" method="post" class="approvalButtons">
        <button name="approvalBtn" type="submit" value = "approve" class="eventApprovalButton"><div class = "approvalButtonText">Approve</div></button>
        <button name="approvalBtn" type="submit" value="reject" class="eventApprovalButton"><div class="approvalButtonText">Reject</div></button>
    </form>
 
    <ul class="eventSummaryDetails">    
        <li>Laurence Tennant</li>
        <li>Malet Place Engineering Building,<div class="address">WC1E 6BT</div>, England, United Kingdom, Europe, The World</li>
        <li>12:00</li>    
        <li>Tuesday 31st January 2017</li>
    </ul></section><div class="furtherDetails">
    <p>£100</p>
    <p>No Description</p>
    <p>
        <a href=https://www.facebook.com/ class="linkToEventSite">More information</a>
    </p>
    <div class="map"></div>
</div>
</div>
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

</body>
</html>
