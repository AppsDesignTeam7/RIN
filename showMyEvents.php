<?php

require_once('_php/config.php');

session_start();

$_SESSION['faveReturn'] = substr($_SERVER[REQUEST_URI], 1);

if (isset($_SESSION['dateFrom'])) {
    $dateFrom = $_SESSION['dateFrom'];
} else {
    $dateFrom = "2000-00-00 00:00:00";
}

if (isset($_SESSION['dateTo'])) {
    $dateTo = $_SESSION['dateTo'];
} else {
    $dateTo = "2020-12-31 23:59:59";
}

if (isset($_SESSION['selectedTags'])) {
    // Query for events with selected tags
    $selectedTags = implode(',', $_SESSION['selectedTags']);
    /*
    Slightly concerned that this will return duplicates - if an event has two 
    tags, and both of those tags are selected for the filter, then it may have
    two rows with the same event: one for each tag.
    
    Potential solution:
    Subquery to select distinct eventIDs from event_tags where tagID in (selectedTags)
    */
    $event_query = "
        SELECT *
        FROM event_tags
        LEFT JOIN events ON events.EventID = event_tags.EventID
        WHERE events.OrganiserID = " . $_SESSION['UserID'] . "
        AND event_tags.TagID IN ( $selectedTags )
        AND events.Start > '$dateFrom'
        AND events.Start < '$dateTo'
        ORDER BY Approved ASC, Start ASC";
} else {
    // Query for all events
    $event_query = "
        SELECT *
        FROM events
        WHERE OrganiserID = " . $_SESSION['UserID'] . "
        AND events.Start > '$dateFrom'
        AND events.Start < '$dateTo'
        ORDER BY Approved ASC, Start ASC";
}

$result = $connection->query($event_query);

if($result->connect_errno > 0){
    die('Unable to connect to database [' . $result->connect_error . ']');
}

if(!$result){
    echo "no result";
} else if(mysqli_num_rows($result) == 0) {
    echo '<h4>No Events Found</h4>';
} else {

    echo '<div class = "accordion">';

    while ($row = $result->fetch_assoc()) {
        
        // Format dates
        $start = strtotime($row['Start']);
        $startDate = date('l jS F Y', $start);
        $startTime = date('H:i', $start);
        $end = date_add($start, date_interval_create_from_date_string($row['Duration'] . " hours"));
        $endDate = date('l jS F Y', $end);
        $endTime = date('H:i', $end); 

        // Event Summary Section 
        echo    '<section class = "eventSummarySection">';
        // Event type and title
        if ($row['Type'] == 0) {
            $type = "Seminar: ";
        } else if ($row['Type'] == 1) {
            $type = "Course: ";
        } else {
            $type = "Conference: ";
        }
        echo    '<h3>' . $type . $row['Name'] . '</h3>'; 
        // Event image
        echo    '<img src=' . $row['ImageLink'] . ' alt = "Img1" class= "eventImage">'; 

        // Approval status
        if ($row['Approved'] == NULL) {
            $approval = "Pending Approval";
        } else if ($row['Approved'] == 0) {
            $approval = "Not Approved";
        } else {
            $approval = "Approved";
        }
        echo    '<div class="approvalDetails">';
        echo    '<div class="eventApprovalStatus eventApprovalStatusText">' . $approval . '</div>';
        if ($approval == "Approved") {
            $noFaves = $connection->query("SELECT DISTINCT UserID FROM favourites WHERE EventID = " . $row['EventID']);
            $noAdds = $connection->query("SELECT DISTINCT UserID FROM calendar_adds WHERE EventID = " .$row['EventID']);
            echo '<div class="infoForOrganiser">';
            echo    '<div class="noFavourites">' . mysqli_num_rows($noFaves) . ' favourites</div>';
            echo    '<div class="noCalendarAdds">' . mysqli_num_rows($noAdds) . ' calendar adds</div>';
            echo '</div>';
        }
        echo    '</div>';
        // Event summary details
        echo    '<ul class="eventSummaryDetails">';
        echo    '    <li>' . $row['Speaker'] . '</li>';
        echo    '    <li>' . $row['Location'] . '</li>';
        echo    '    <li><div class="address">' . $row['Postcode'] . '</div></li>';
        echo    '    <li>' . $startTime . '</li>';
        echo    '    <li>' . $startDate . '</li>';
        echo    '</ul>';

        echo    '</section>';

        // Further Details Section 

        $price = ($row['Cost'] == 0) ? 'Free' : '£' . $row['Cost'];
        echo    '<div class="furtherDetails">';
        // Price
        echo    '<p>' . $price . '</p>';
        echo    '<p>' . $row['Description'] . '</p>';
        
        // Tags 

        $current_id = $row['EventID'];
        $tag_query = "SELECT * FROM event_tags JOIN tags ON event_tags.TagID = tags.TagID
                        WHERE event_tags.EventID = " . $current_id;
        
        $tag_result = $connection->query($tag_query);
        $tag_names = array();
        foreach ($tag_result as $res) {
            array_push($tag_names, $res['TagName']);
        }
        if (!(sizeof($tag_names) == 0)) {
            $tag_list = "Tags: " .  implode(", ", $tag_names);
        } else {
            $tag_list = "No tags";
        }
        
        echo    '<p>' . $tag_list . '</p>';
        // Link
        echo    '<p>
                 <a href=' . $row['InfoLink'] . ' class="linkToEventSite">More information</a>
                 </p>';
        // Map
        echo    '<div class="map"></div>';
        echo    '</div>';

    }

    echo '</div>';

}

?>
