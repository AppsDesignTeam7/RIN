var seminars = document.getElementById("seminars");
var courses = document.getElementById("courses");
var conferences = document.getElementById("conferences");
var expandedSearch = document.getElementById("expandedSearch");
var searchField = document.getElementById("searchField");
//var favouriteButton = document.getElementsByClassName("favouriteButton");
var calendarButton = document.getElementsByClassName("calendarButton");
var favouriteStar = document.getElementsByClassName("fa.fa-star");
var dropdown = document.getElementById("dropdown");

window.onload = function () {
   $(".accordion").accordion({
// sets accordion to be unexpanded at start (rather than default of having one section expanded at start)
   active: false,
   collapsible: true,
   heightStyle: "content"
    
   });
 

   $( ".accordion .fa.fa-star").click(function(event) {
// when the favourite star is clicked, the normal expansion function of the accordion is stoppped (this is to allow the star area of the accordion to be clickable)
       event.stopPropagation();
        event.preventDefault();
        $(this).css("color","Gold"); /* changes favourite star colour to gold on click */
        alert("Added to Favourites");
        });
   

   $(".accordion .fa.fa-calendar").click(function (event) {
// stops the normal expansion function of the accordion when when the  calendar button is clicked.
        event.stopPropagation();
        event.preventDefault();
        $(this).css("color","DarkBlue"); /* changes the colour of the calendar to DarkBlue on click */
        alert("Added to calendar");
        });
     
    $( ".accordion .addtocalendar.atc-style-button-icon.atc-style-menu-wb").click(function(event) {
// stops the normal expansion function of the accordion when when the add to calendar area (either the add to calendar button or the calendar button menu) is clicked
       event.stopPropagation();
        event.preventDefault();
        });
        
    $ ( ".accordion li.atc-item").click(function (event) {
        event.stopPropagation();
        event.preventDefault();
        
        
    });
   
   seminars.style.display = "block";
   courses.style.display = "none";
   conferences.style.display = "none";
   expandedSearch.style.display = "none";
};

document.getElementById("seminarsNav").onclick = function() {

    seminars.style.display = "block";
    seminarsNav.style.backgroundColor = "#ffe6cc";

    courses.style.display = "none";
    coursesNav.style.backgroundColor = "#e3e3e3";
    
    conferences.style.display = "none";
    conferencesNav.style.backgroundColor = "#e3e3e3"
};


document.getElementById("coursesNav").onclick = function() {

    seminars.style.display = "none";
    seminarsNav.style.backgroundColor = "#e3e3e3";
    
    courses.style.display = "block";
    coursesNav.style.backgroundColor = "#ffe6cc";
    
    conferences.style.display = "none";
    conferencesNav.style.backgroundColor = "#e3e3e3";
    
    
};

document.getElementById("conferencesNav").onclick = function() {

    seminars.style.display = "none";
    seminarsNav.style.backgroundColor = "#e3e3e3";
    
    courses.style.display = "none";
    coursesNav.style.backgroundColor = "#e3e3e3";
    
    conferences.style.display = "block";
    conferencesNav.style.backgroundColor = "#ffe6cc";
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
