<div id = "banner">
<a href = "index.php">
<div id="linkToHome">
    <h1>RIN</h1>
    <h2>
        <?php echo $subtitle ?>
    </h2>
     
</div>
</a>


<!--Site navigation for smaller screens-->

<div id = "smallScreenNav">

<div class="dropdownNav">
    <button class="dropbtnNav"><i class="fa fa-navicon"></i></button>
        <div class="dropdown-contentNav">
            <a href="index.php">Home</a>
            <a href="createEvent.php">Create New Event</a> 
            
            <?php
            session_start();
            if (isset($_SESSION['UserID'])) {
                // If user is logged in, show My Account menu
                echo '
                <div class="dropdownIn">
                    <a href="javascript:void(0)" class="dropbtnIn">My Account</a>
                    <div class="dropdown-contentIn">
                        <a href="myFavourites.htm">My Favourites</a>
                        <a href="manageMyEvent.htm">Manage My Events</a>
                        <a href="resetPassword.htm">Reset Password</a>';
                if ($_SESSION['isAdmin']) {
                    // If user is an admin, show admin options
                    echo '
                        <a href="approveEvents.php">Approve Events</a>
                        <a href="displayAllUsers.htm">Manage Users</a>';
                }
                echo '
                        <a href="_php/logout.php">Logout</a>
                    </div>
                 </div>';

                
            } else {
                // If user is not logged in, show Log In button
                echo '<a href="login.php">Login</a>';
            }
            ?>
             
            <a href="help.htm">Help</a>
        </div>
</div>

</div>


<!--Site navigation for larger screens-->

<div id="siteNav">

<ul id="navBar">
    <li class="navLink" id="homeLink"><a href="index.php" class="indexLink"><div class="linkText">HOME</div></a></li>
    <li class="navLink" id="createEventLink"><a href="createEvent.php"><div class="linkText">CREATE NEW EVENT</div></a></li>
    
    <?php
    session_start();


    if (isset($_SESSION['UserID'])) {
        // Nav options if the user is logged in
        echo '
        <li class = "dropdown" class="navLink" id="myAccountLink">
            <a href="javascript:void(0)" class="dropbtn"><div class="linkText">MY ACCOUNT</div></a>
            <div class="dropdown-content">
                <a href="myFavourites.htm">My Favourites</a>
                <a href="manageMyEvent.htm">Manage My Events</a>
                <a href="resetPassword.htm">Reset Password</a>';
        if ($_SESSION['isAdmin']) {
            // If user is an admin, show admin options
            echo '
                <a href="approveEvents.php">Approve Events</a>
                <a href="displayAllUsers.htm">Manage Users</a>';
        }
        echo '
                <a href="_php/logout.php">Logout</a>
            </div>
        </li>';
    } else {
        // Nav options if the user is not logged in
        echo '<li class="navLink" id="myAccountLink"><a href = "login.php"><div class="linkText">LOG IN</div></a></li>';
    }
    ?>
    
    <li class="navLink" id="helpLink"><a href="help.htm"><div class="linkText">HELP</div></a></li>
</ul>

</div>

</div>