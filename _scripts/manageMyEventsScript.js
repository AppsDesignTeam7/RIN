//var approvalStatus = document.getElementsByClassName("eventApprovalStatus").innerHTML;

window.onload = function () {

$(".accordion").accordion({
// sets accordion to be unexpanded at start (rather than default of having one section expanded at start)
    active: false,
    collapsible: true,
// makes each panel (the one visible when a section is expanded) fit to its contents (the default having each panel equal to the size of the largest panel).
    heightStyle: "content"
    });
 
//$(".editEventButton").button();
$( ".accordion .editEventButton").click(function(event) {
    event.stopPropagation();
    event.preventDefault();
    window.location.href="createEvent.htm";
    });
    

var allApprovalStatus = document.getElementsByClassName("eventApprovalStatus");
console.log(allApprovalStatus);
console.log(allApprovalStatus.length);

for(i = 0; i<allApprovalStatus.length;i++){

    var approvalStatus = document.getElementsByClassName("eventApprovalStatus")[i].innerHTML;
    console.log(approvalStatus);

    colorApprovalStatus(approvalStatus);
    
     }
};

function colorApprovalStatus(approvalStatus){

    if(approvalStatus == "Pending Approval"){
        console.log("set text to orange");
       // this.style.color = "Green";
    }else if(approvalStatus == "Approved"){
        console.log("set text to green");
    }else if(approvalStatus == "Not Approved"){
        console.log("set text to red");
    }
};


