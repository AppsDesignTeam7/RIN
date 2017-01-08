// when the favourite star is clicked, the normal expansion function of the accordion is stoppped (this is to allow the star area of the accordion to be clickable)
$( ".accordion .fa.fa-star").click(function(event) {
   event.stopPropagation();
    event.preventDefault();
    $(this).css("color","Gold"); /* changes favourite star colour to gold on click */
    alert("Added to Favourites");
    });