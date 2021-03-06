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
        WHERE events.Type = 0
        AND event_tags.TagID IN ( $selectedTags )
        AND events.Approved = 1
        AND events.Start > '$dateFrom'
        AND events.Start < '$dateTo'
        ORDER BY Start ASC";
} else {
    // Query for all events
    $event_query = "
        SELECT *
        FROM events
        WHERE Type = 0
        AND Approved = 1
        AND Start > '$dateFrom'
        AND Start < '$dateTo'
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
        echo    '       <var class="atc_location">' . str_replace("<br>", ", ", $row['Location']) . ", " . $row['Postcode'] . '</var>';
        echo    '       <var class="atc_organizer">' . $row['Speaker'] . '</var>';
        echo    '       <var class="atc_organizer_email">a.weasley@ministryofmagic.org</var>';
        echo    '   </var>';
        echo    '</span>';

        // Add to favourites button

        // Get star colour
        $user = $_SESSION['UserID'];
        $event = $row['EventID'];
        $checkFave = "SELECT * FROM favourites WHERE EventID = $event AND UserID = $user";
        $faveResult = $connection->query($checkFave);
        $starColour = (mysqli_num_rows($faveResult) == 1) ? '"color:gold"' : '""';
        ?>

        <form action="_php/handleStar.php" method="post" class="favsForm">
            <input name="EventID" type="hidden" value=<?php echo $event ?>>
            <input name="Faved" type="hidden" value=<?php echo (mysqli_num_rows($faveResult) == 1) ?>>
            <button name="starBtn" type="submit" value="addToFavs" class="favButton">
                <i class="fa fa-star fa-2x" aria-hidden="true" id="clickMe" style=<?php echo $starColour ?>></i>
            </button>
        </form>

        <?php
        // Event summary details
        echo    '<ul class="eventSummaryDetails">';
        echo    '    <li>' . $row['Speaker'] . '</li>';
        echo    '    <li>' . $row['Location'] . '</li>';
        echo    '    <li><div class="address">' . $row['Postcode'] . '</div></li>';
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
