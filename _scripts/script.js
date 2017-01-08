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
//var currentAddress;


// FUNCTIONS
window.onload = function () {


// sets accordion to be unexpanded at start (rather than default of having one section expanded at start)
$(".accordion").accordion({
active: false,
collapsible: true,
heightStyle: "content", 
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

$(".eventSummarySection").click(function() {
    initMap();
});

/*seminars.style.display = "block";
courses.style.display = "none";
conferences.style.display = "none";*/
expandedSearch.style.display = "none";
};

/*
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
*/

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


// FOR THE MAPS 
 function initMap() {
     
     var active = $(".accordion").accordion('option', 'active');
     console.log(active);
 
    var map = new google.maps.Map(document.getElementsByClassName("map")[active], {
            zoom: 14,
            center: {lat: -34.397, lng: 150.644}
    });
        
        var geocoder = new google.maps.Geocoder();

        geocodeAddress(geocoder, map);
}

function geocodeAddress(geocoder, resultsMap) {
        //var address = //document.getElementById('address').value;
        
    $(".accordion").accordion({
        activate: function(event, ui) {
            var address = ui.newHeader.find(".address").html();
        
            geocoder.geocode({'address': address}, function(results, status) {
        
                if (status === 'OK') {
                    resultsMap.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                          map: resultsMap,
                          position: results[0].geometry.location
                    });
                } else {
                    //alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    })
}


