window.onload = function () {
$(".accordion").accordion({
// sets accordion to be unexpanded at start (rather than default of having one section expanded at start)
    active: false,
    collapsible: true,
// makes each panel (the one visible when a section is expanded) fit to its contents (the default having each panel equal to the size of the largest panel).
    heightStyle: "content"
    });
    
   $( ".accordion .fa.fa-star").click(function(event) {
       event.stopPropagation();
        event.preventDefault();
        $(this).css("color","Gold");
        alert("Added to Favourites");
        });
   
   $(".accordion .fa.fa-calendar").click(function (event) {
        event.stopPropagation();
        event.preventDefault();
        $(this).css("color","DarkBlue");
        alert("Added to calender");
        });
   
   expandedSearch.style.display = "none";
    
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
