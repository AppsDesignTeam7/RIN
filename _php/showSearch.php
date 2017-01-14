<?php
// Set return location
session_start();
$_SESSION['searchLocation'] = substr($_SERVER[REQUEST_URI], 1); // removes "/" from start of REQUEST_URI
?>

<!--Search bar-->
<section id="searchBar">
<form action="" method="get" id="searchForm">
	<input type="text" name="search" placeholder="Search..." id="searchField" <?php if(isset($_GET['search'])) echo 'value="' . $_GET['search'] . '"'; ?>>
	<button type = "submit" id="searchButton">Search</button>
</form>

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
<button id="applyFiltersButton" name="submitBtn" value="apply">Apply</button>
<button id="applyFiltersButton" name="submitBtn" value="clear">Clear</button>
</div>

</form>

</div>  
