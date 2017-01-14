// DECLARATION OF VARIABLES
/* References for variable declaration: 
http://www.w3schools.com/jsref/met_document_getelementbyid.asp
AND
http://www.w3schools.com/jsref/met_document_getelementsbyclassname.asp
AND
https://www.lynda.com/JavaScript-tutorials/JavaScript-Essential-Training/81266-2.html
*/
var seminars = document.getElementById("seminars");
var courses = document.getElementById("courses");
var conferences = document.getElementById("conferences");
var expandedSearch = document.getElementById("expandedSearch");
var searchField = document.getElementById("searchField");
var calendarButton = document.getElementsByClassName("calendarButton");
var favouriteStar = document.getElementsByClassName("fa.fa-star");
var dropdown = document.getElementById("dropdown");
var favouriteState = 0;
var calendarState = 0;


// FUNCTIONS
/* Function adapted from:
https://developer.mozilla.org/en/docs/Web/API/GlobalEventHandlers/onload */
// Defines what is to be done when the window is loaded
window.onload = function () {

/* Function adapted from 
http://stackoverflow.com/questions/4633971/how-do-i-keep-jquery-ui-accordion-collapsed-by-default 
AND
http://stackoverflow.com/questions/2841075/how-can-you-adjust-the-height-of-a-jquery-ui-accordion */
// sets accordion to be unexpanded at start (rather than default of having one section expanded at start) and sets the height to fit its contents
$(".accordion").accordion({
active: false,
collapsible: true,
heightStyle: "content", 
});

/* Function created by Mairi Ng */
// Calls the intiMap() function when an accordion header is clicked
$(".eventSummarySection").click(function() {
    initMap();
});

// Sets the search filters search section to be not visible when the window first loads
expandedSearch.style.display = "none";

};

/* Function adapted from
http://stackoverflow.com/questions/2004869/jquery-accordion-prevent-pane-from-opening-cancel-changestart-event */
// Stops the normal propagation of the accordion when the favourite star is clicked, changes the colour of the star, and displays the appropriate alert
/*$( ".accordion .fa.fa-star").click(function(event) {
    event.stopPropagation();
    event.preventDefault(); 
    if(favouriteState == 0) {
         $(this).css("color","Gold");
         alert("Added to Favourites");
         favouriteState = 1;
    } else if(favouriteState == 1) {
        $(this).css("color","lightgray");
         alert("Removed from Favourites");
         favouriteState = 0;
    }
});*/

/* Function adapted from http://stackoverflow.com/questions/332384/jquery-accordion-links-dont-work */
// Stops normal propagation of accordion by disabling for sufficient time to allow the relevant php file to load
$(".accordion .fa.fa-star").click(function (event) {
    $(".accordion").accordion("disable");
    setTimeout(function() {
        $(".accordion").accordion("enable");
        }, 250);
});

/* Function adapted from http://stackoverflow.com/questions/332384/jquery-accordion-links-dont-work */
// Stops normal propagation of accordion by disabling it for a sufficient amount for time to allow the add to calendar function to work
$(".accordion .atc-style-menu-wb").click(function(event) {
    $(".accordion").accordion("disable");
    setTimeout(function() {
        $(".accordion").accordion("enable");
        }, 250);
});

/* Function adapted from
http://stackoverflow.com/questions/2004869/jquery-accordion-prevent-pane-from-opening-cancel-changestart-event */
// stops the normal expansion function of the accordion when when the  calendar button is clicked and changes the colour of the button to dark blue.
$(".accordion .fa.fa-calendar").click(function (event) {
    event.stopPropagation();
    event.preventDefault();
    $(this).css("color","DarkBlue"); /* changes the colour of the calendar to DarkBlue on click*/
});

/* Function adapted from http://stackoverflow.com/questions/332384/jquery-accordion-links-dont-work */
// Stops normal propagation of accordion by disabling for sufficient time to allow the relevant php file to load
$(".eventApprovalButton").click(function (event) {
    $(".accordion").accordion("disable");
    setTimeout(function() {
        $(".accordion").accordion("enable");
        }, 250);
});

/* Function developed from
http://www.w3schools.com/jsref/met_html_focus.asp
http://www.w3schools.com/jsref/prop_style_display.asp*/
// displays the search filters section when the searchField has focus
searchField.onfocus = function () {
expandedSearch.style.display = "block";
};

// FOR THE MAPS
/* Function adapted from:
https://developers.google.com/maps/documentation/javascript/examples/geocoding-simple
AND
http://stackoverflow.com/questions/2236633/jquery-accordion-need-index-of-currently-selected-content-part
AND
http://www.w3schools.com/jsref/met_element_getelementsbyclassname.asp */
// Gets the index of currently selected accordion content, selects the map associated to this index, and displays the google map here
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

/* Function adapted from:
https://developers.google.com/maps/documentation/javascript/examples/geocoding-simple
AND
http://stackoverflow.com/questions/3085818/get-id-of-new-and-old-content-from-jquery-ui-accordion
AND
https://api.jquery.com/find/ */
// Gets the postcode (.address) from the active accordion header and uses this to set the map location and marker
function geocodeAddress(geocoder, resultsMap) {

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

/* DON'T THINK THIS FUNCTION IS BEING USED
/*searchField.onclick = function () {
searchField.setAttribute("value","");
};*/

/* DON'T THINK THIS FUNCTION IS USED
document.getElementById("searchButton").onclick = function (){
expandedSearch.style.display = "none";
};*/

/* DON'T THINK THIS FUNCTION IS BEING USED
document.getElementsByClassName("dropbtn").onfocus = function () {
dropdown.style.display = "block";
};
*/