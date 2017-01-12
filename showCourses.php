<?php

require_once('_php/config.php');

session_start();

// Used to make sure no events that have passed are displayed
$now = date("Y-m-d H:i:s", time());

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
        WHERE events.Type = 1
        AND event_tags.TagID IN ( $selectedTags )
        AND events.Approved = 1
        AND events.Start > $now
        ORDER BY Start ASC";
} else {
    // Query for all events
    $event_query = "
        SELECT *
        FROM events
        WHERE Type = 1
        AND Approved = 1
        AND Start > '" . $now . "'
        ORDER BY Start ASC";
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

        /* Event Summary Section */
        echo    '<section class = "eventSummarySection">';
        // Event title
        echo    '<h3>' . $row['Name'] . '</h3>'; 
        // Event image
        echo    '<img src=' . $row['ImageLink'] . ' alt = "Img1" class= "eventImage">'; 

        // Add to calendar button
        echo    '<span class="addtocalendar atc-style-button-icon atc-style-menu-wb">
                    <a class="atcb-link">
                    <i class="fa fa-calendar fa-2x" class="addToCalendar"></i>
                    </a>';
        // Details to populate event when added to calendar
        echo    '   <var class="atc_event">';
        echo    '   <var class="atc_date_start">' . $startDate . ' ' . $startTime . '</var>';
        echo    '       <var class="atc_date_end">' . $endDate . ' ' . $endTime . '</var>';
        echo    '       <var class="atc_timezone">Europe/London</var>';
        echo    '       <var class="atc_title">' . $row['Name'] . '</var>';
        echo    '       <var class="atc_description">' . $row['Description'] . '</var>';
        echo    '       <var class="atc_location">' . $row['Location'] . '</var>';
        echo    '       <var class="atc_organizer">' . $row['Speaker'] . '</var>';
        echo    '       <var class="atc_organizer_email">a.weasley@ministryofmagic.org</var>';
        echo    '   </var>';
        echo    '</span>';

        // Add to favourites button
        // Needs to call an add to favourites script
        echo    '<i class="fa fa-star fa-2x" aria-hidden="true"></i>';
        // Event summary details
        echo    '<ul class="eventSummaryDetails">';
        echo    '    <li>' . $row['Speaker'] . '</li>';
        echo    '    <li><div class="address">' . $row['Location'] . '</div></li>';
        echo    '    <li>' . $startTime . '</li>';
        echo    '    <li>' . $startDate . '</li>';
        echo    '</ul>';

        echo    '</section>';

        /* Further Details Section */

        $price = ($row['Cost'] == 0) ? 'Free' : '£' . $row['Cost'];
        echo    '<div class="furtherDetails">';
        // Price
        echo    '<p>' . $price . '</p>';
        echo    '<p>' . $row['Description'] . '</p>';
        // Tags - need to figure out how this works...

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
