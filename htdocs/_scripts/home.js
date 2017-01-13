// when the favourite star is clicked, the normal expansion function of the accordion is stoppped (this is to allow the star area of the accordion to be clickable)
/*
$( ".accordion .fa.fa-star").click(function(event) {
   event.stopPropagation();
    event.preventDefault();
    $(this).css("color","Gold"); /* changes favourite star colour to gold on click 
    alert("Added to Favourites");
    });*/
    
    /*
$( ".accordion .fa.fa-star").click(function(event) {
    event.stopPropagation();
    event.preventDefault(); 
    
   // var star = $(".accordion .fa.fa-star");

    if((this).css('color') == 'rgb(211,211,211)') {
         $(this).css("color","Gold");
         alert("Added to Favourites");
    } else if((this).css('color') == 'rgb(255,215,0)') {
        $(this).css("color","lightgray");
         alert("Removed from Favourites");
    }
}*/

/*
$( ".accordion .fa.fa-star").click(function(event) {
    event.stopPropagation();
    event.preventDefault(); 
    
    var colorState;

    if(colorState == 0) {
         $(this).css("color","Gold");
         alert("Added to Favourites");
         color
    } else if(colorState == 1) {
        $(this).css("color","lightgray");
         alert("Removed from Favourites");
    }
}*/