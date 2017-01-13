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
var favouriteState = 0;
var calendarState = 0;

// FUNCTIONS
window.onload = function () {

// sets accordion to be unexpanded at start (rather than default of having one section expanded at start)
$(".accordion").accordion({
active: false,
collapsible: true,
heightStyle: "content", 
});

// Should load the relevant php file to set the colour of the star according to whether the user has or has not added it to their database
favouriteStatus('con2'); 
calendarStatus('con2'); 

$(".eventSummarySection").click(function() {
    initMap();
});


expandedSearch.style.display = "none";
};




$(".fa.fa-star").click(function() {
    return false;
});

$(".fa.fa-star").mousedown(function() {
    favouriteStatus('con3');
});

$(".fa.fa-calendar").click(function() {
    return false;
});

$(".fa.fa-calendar").mousedown(function() {
    calendarStatus('con3');
});


$(".reset").click(function() {
    return false;
});

$(".reset").mousedown(function() {
    favouriteStatus('con1');
    calendarStatus('con1');
});

function favouriteStatus(cv) {
    //$("#myDiv").html("Put animated gif here").show();
    var url="favourite.php";
    $.post(url, {contentVar: cv}, function(data) {
        $("#myDiv").html(data).show();
    });
    // Need php to give 0 if the user has not added the event to favourites and 1 if they have.
}

function calendarStatus(cv) {
    //$("#myDiv").html("Put animated gif here").show();
    var url="calendarStatus.php";
    $.post(url, {contentVar: cv}, function(data) {
        $("#calStatusTest").html(data).show();
    });
    // Need php to give 0 if the user has not added the event to favourites and 1 if they have.
}

$( ".accordion .fa.fa-star").click(function(event) {
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
});

$(".accordion .atc-style-menu-wb").click(function(event) {
    $(".accordion").accordion("disable");
    setTimeout(function() {
        $(".accordion").accordion("enable");
        }, 250);
});

$(".eventApprovalButton").click(function (event) {
    $(".accordion").accordion("disable");
    setTimeout(function() {
        $(".accordion").accordion("enable");
        }, 250);
});

// stops the normal expansion function of the accordion when when the  calendar button is clicked.
$(".accordion .fa.fa-calendar").click(function (event) {
    event.stopPropagation();
    event.preventDefault();
    $(this).css("color","DarkBlue"); /* changes the colour of the calendar to DarkBlue on click*/
});

/*
$(".eventApprovalButton").click(function (event) {
    event.stopPropagation();
    event.preventDefault();
});*/
    

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


// this doesn't work - think because calendar already has a click event associated with it 
   /*
   if(calendarState == 0) {
        $(this).css("color","DarkBlue"); /* changes the colour of the calendar to DarkBlue on click 
        //alert("Added to calendar");
        calendarState == 1;
        console.log(calendarState);
    }else if(calendarState == 1) {
        alert("Already added to calendar");
    }
});*/

// CODE FOR TESTING - TO BE REMOVED
/*
function swapContent(cv) {
    $("#myDiv").html("Put animated gif here").show();
    var url="myphpscript.php";
    $.post(url, {contentVar: cv}, function(data) {
        $("#myDiv").html(data).show();
    });
}*/






