<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./admin_styles/admin_nav_bar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&family=Saira+Extra+Condensed:wght@100&display=swap" rel="stylesheet">
</head>
<body>
    <?php session_start() ?>
    <div class="row-1">
        <p class="res_name">The Outer Clove restaurant</p>
    </div>
    <ul class="nav_bar_list">
        <li class="tabs"><a class="active" href="./index_admin.php">Home</a></li>
        <li class="tabs"><a href="./manage_dishes.php">Manage Dishes</a></li>
        <li class="tabs"><a href="./manage_cus_acc.php">Mnage Customer Accounts</a></li>
        <li class="tabs"><a href="./manage_staff.php">Manage Staff</a></li>
        <li class="tabs"><a href="./manage_oders.php">Manage Oders</a></li>
        <li class="tabs"><a href="./manage_bookings.php">Manag Bookings</a></li>
        <?php
            echo '<li class="tabs" style="float:right"><a href="./admin_log_out.php">Welcome, ' . $_SESSION['admin_username'] . '</a></li>';
        ?>
    </ul>