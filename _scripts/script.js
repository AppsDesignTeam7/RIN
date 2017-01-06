// DECLARATION OF VARIABLES
var seminars = document.getElementById("seminars");
var courses = document.getElementById("courses");
var conferences = document.getElementById("conferences");
var expandedSearch = document.getElementById("expandedSearch");
var searchField = document.getElementById("searchField");
//var favouriteButton = document.getElementsByClassName("favouriteButton");
var calendarButton = document.getElementsByClassName("calendarButton");
var favouriteStar = document.getElementsByClassName("fa.fa-star");
var dropdown = document.getElementById("dropdown");


// FUNCTIONS
window.onload = function () {

// sets accordion to be unexpanded at start (rather than default of having one section expanded at start)
$(".accordion").accordion({
active: false,
collapsible: true,
heightStyle: "content"
});


// when the favourite star is clicked, the normal expansion function of the accordion is stoppped (this is to allow the star area of the accordion to be clickable)
$( ".accordion .fa.fa-star").click(function(event) {
   event.stopPropagation();
    event.preventDefault();
    $(this).css("color","Gold"); /* changes favourite star colour to gold on click */
    alert("Added to Favourites");
    });


// stops the normal expansion function of the accordion when when the  calendar button is clicked.
$(".accordion .fa.fa-calendar").click(function (event) {
    event.stopPropagation();
    event.preventDefault();
    $(this).css("color","DarkBlue"); /* changes the colour of the calendar to DarkBlue on click */
   // alert("Added to calendar");
    });
 
$(".accordion .atc-style-menu-wb").click(function(event) {

    $(".accordion").accordion("disable");

    setTimeout(function() {
        $(".accordion").accordion("enable");
        }, 250);

});

/* CODE USED FOR TESTING - NOT TO BE USED IN FINAL VERSION
 // Enables the testLink to function as expected when on the header of the accordion
  $(".testLink").click(function () {
  event.stopPropagation();
 event.preventDefault();
 $(this).css("color","Gold");
// window.location.href="https://www.ucl.ac.uk/";
 window.open($(this).attr('href'));
 console.log($(this).attr('href'));
 });*/

seminars.style.display = "block";
courses.style.display = "none";
conferences.style.display = "none";
expandedSearch.style.display = "none";
};



document.getElementById("seminarsNav").onclick = function() {

seminars.style.display = "block";
seminarsNav.style.backgroundColor = "lightsteelblue";

courses.style.display = "none";
coursesNav.style.backgroundColor = "#e3e3e3";

conferences.style.display = "none";
conferencesNav.style.backgroundColor = "#e3e3e3"
};


document.getElementById("coursesNav").onclick = function() {

seminars.style.display = "none";
seminarsNav.style.backgroundColor = "#e3e3e3";

courses.style.display = "block";
coursesNav.style.backgroundColor = "lightsteelblue";

conferences.style.display = "none";
conferencesNav.style.backgroundColor = "#e3e3e3";


};

document.getElementById("conferencesNav").onclick = function() {

seminars.style.display = "none";
seminarsNav.style.backgroundColor = "#e3e3e3";

courses.style.display = "none";
coursesNav.style.backgroundColor = "#e3e3e3";

conferences.style.display = "block";
conferencesNav.style.backgroundColor = "lightsteelblue";
};

document.getElementById("searchField").onfocus = function () {

expandedSearch.style.display = "block";  
};

searchField.onfocus = function () {

expandedSearch.style.display = "block";
};

searchField.onclick = function () {

searchField.setAttribute("value","");
};

document.getElementById("searchButton").onclick = function () {

expandedSearch.style.display = "none";
};

document.getElementsByClassName("dropbtn").onfocus = function () {

dropdown.style.display = "block";
};
