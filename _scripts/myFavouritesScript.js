var expandedSearch = document.getElementById("expandedSearch");
var searchField = document.getElementById("searchField");
var favouriteStar = document.getElementsByClassName("fa.fa-star");
var dropdown = document.getElementById("dropdown");

var dropdownContent = document.getElementsByClassName("dropdown-content");

var dropDownBtn = document.getElementsByClassName("dropbtnSiteNavButton");

var favourites = document.getElementById("favourites");

window.onload = function () {
   $(".accordion").accordion({
// sets accordion to be unexpanded at start (rather than default of having one section expanded at start)
   active: false,
   collapsible: true,
   heightStyle: "content"
    
   });
 
   $( ".accordion .fa.fa-star").click(function(event) {
       event.stopPropagation();
        event.preventDefault();
        $(this).css("color","lightGray");
        alert("Removed from Favourites");
        });
   
   $(".accordion .fa.fa-calendar").click(function (event) {
        event.stopPropagation();
        event.preventDefault();
        $(this).css("color","DarkBlue");
        alert("Added to calender");
        });
   
    favourites.style.display = "block";
 
   expandedSearch.style.display = "none";
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

/*
dropdown.onfocus = function () {
    
    dropdown.style.display = "block";
};
*/

dropDownBtn.onfocus = function () {

    dropdown.style.display = "block";
};


