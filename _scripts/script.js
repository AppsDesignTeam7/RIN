var seminars = document.getElementById("seminars");
var courses = document.getElementById("courses");
var conferences = document.getElementById("conferences");
var expandedSearch = document.getElementById("expandedSearch");
var searchField = document.getElementById("searchField");
var favouriteButton = document.getElementsByClassName("favouriteButton");

window.onload = function () {
   $(".accordion").accordion();
   
   seminars.style.display = "block";
   courses.style.display = "none";
   conferences.style.display = "none";
   expandedSearch.style.display = "none";
};

document.getElementById("seminarsNav").onclick = function() {

    seminars.style.display = "block";
    courses.style.display = "none";
    conferences.style.display = "none";
};


document.getElementById("coursesNav").onclick = function() {

    seminars.style.display = "none";
    courses.style.display = "block";
    conferences.style.display = "none";
};

document.getElementById("conferencesNav").onclick = function() {

    seminars.style.display = "none";
    courses.style.display = "none";
    conferences.style.display = "block";
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

favouriteButton.onclick = function () {

    alert("Added to favourites");
};





