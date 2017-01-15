<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset = "utf-8">
<title>Verify Admin Users</title>
<!-- 1. Include style -->
<link href="_css/atc-style-button-icon.css" rel="stylesheet" type="text/css">
<link href="_css/atc-style-menu-wb.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="_css/styles.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
</head>
<body>

<div id="container">

<div id="header">

<header role = "banner">

<?php
$subtitle = "Manage Users";
include('_php/banner.php');
?>

</header>

</div>

<div id="body">    

<main role = "main">

<!-- MANAGE ADMIN USERS CONTENT -->

<section id="favourites">

<br>
<table style = "width: 100%" class = "adminTableText">
    
    <!-- tr is the row -->
    <!-- table cell is td -->
    <!-- th is the header -->
    <tr class = "adminTableHeader">
        <th> Username </th>
        <th> Admin Status </th>
        <th> Toggle Admin Status </th>
    </tr>

    <?php
    require_once('_php/config.php');

    // Show admins
    $sql = "SELECT * FROM users WHERE Admin = 1 ORDER BY Username";
    $result = $connection->query($sql);
    if (!$result) {
        echo "could not load users";
    } else {
        foreach ($result as $row) {
            echo '<tr>';
            echo '  <td>' . $row['Username'] . '</td>';
            echo '  <td> Admin </td>';
            echo '  <td><form action="_php/toggleAdmin.php" method="post">';
            echo '  <input type="hidden" name="UserID" value="' . $row['UserID'] . '">';
            echo '  <button type="submit" class="yesBtn">Remove Admin</button></form></td>';
            echo '</tr>';
        }
    }

    // Show regular users
    $sql = "SELECT * FROM users WHERE Admin = 0 ORDER BY Username";
    $result = $connection->query($sql);
    if (!$result) {
        echo "could not load users";
    } else {
        foreach ($result as $row) {
            echo '<tr>';
            echo '  <td>' . $row['Username'] . '</td>';
            echo '  <td> Non-Admin </td>';
            echo '  <td><form action="_php/toggleAdmin.php" method="post">';
            echo '  <input type="hidden" name="UserID" value="' . $row['UserID'] . '">';
            echo '  <button type="submit" class="yesBtn">Make Admin</button></form></td>';
            echo '</tr>';
        }
    }
    ?>
  
</table>

</section>

</main>

</div>

<div id="footer">

<!--Footer--> 
<footer id = "pageFooter">
<ul id = "footerNav">
    <li class="footerLink"><a href="help.php"><div class="linkText">Terms and Conditions</div></a></li>
    <li class="footerLink"><a href="help.php"><div class="linkText">Contact</div></a></li>
    <li class="footerLink"><a href="help.php"><div class="linkText">Copyright</div></a></li>
</ul>
</footer>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src = "_scripts/script.js"></script>

</body>
</html>
