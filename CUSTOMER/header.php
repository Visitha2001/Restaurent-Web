<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./CUS_IMAGES/logo/Outer clove.png" type="image/x-icon">
    <title>Outer Clove</title>
    <link rel="stylesheet" href="./CUS_STYLES/navigation_bar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&family=Saira+Extra+Condensed:wght@100&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        session_start();
    ?>
    <div class="row-1">
        <div class="logo_con">
            <img class="logo" src="./CUS_IMAGES/logo/Outer clove.png" alt="logo" >
        </div>
        <p class="res_name">The Outer Clove restaurant</p>
    </div>
    <ul class="nav_bar_list">
        <li class="tabs"><a class="active" href="./index.php">Home</a></li>
        <li class="tabs"><a href="./dish_menu.php">Menu & Oders</a></li>
        <li class="tabs"><a href="./tables.php">Reservation</a></li>
        <li class="tabs"><a href="./about_us.php">About Us</a></li>
        <?php
            if (isset($_SESSION['cus_username'])) {
                echo '<li class="tabs" style="float:right"><a href="./log_out.php">Welcome, ' . $_SESSION['cus_username'] . '</a></li>';
            } else {
                echo '<li class="tabs" style="float:right"><a href="./customer_login_page.php">Log-in</a></li>';
            }
        ?>
    </ul>