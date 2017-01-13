$( ".accordion .fa.fa-star").click(function(event) {
       event.stopPropagation();
        event.preventDefault();
        $(this).css("color","lightGray");
        alert("Removed from Favourites");
        });
