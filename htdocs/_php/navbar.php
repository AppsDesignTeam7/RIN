<?php
// Includes the nav bar with Seminars/Courses/Conferences
echo '
<nav role = "navigation">
<div id = "eventNavList">
    <a href ="index.php"><li class="eventTypeNavButton active" id="seminarsNav"><div class="seminarsButton">Seminars</div></li></a>
    <a href="courses.php"><li class="eventTypeNavButton" id = "coursesNav"><div class = "coursesButton"><div class="seminarsButton">Courses</div></div></li></a>
    <a href="conferences.php"><li class="eventTypeNavButton" id = "conferencesNav"><div class="seminarsButton">Conferences</div></li></a>
</div>
</nav>
';
?>