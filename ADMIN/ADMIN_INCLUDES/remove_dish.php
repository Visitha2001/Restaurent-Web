<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "the_outer_clove_restaurant";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['dish_id'])) {
        $dish_id = $_GET['dish_id'];

        $sql = "DELETE FROM `dishes` WHERE `dish_id` = $dish_id";
        if ($conn->query($sql) === TRUE) {
            $message = "Dish removed successfully";
        } else {
            $message = "Error removing dish: " . $conn->error;
        }
    } else {
        $message = "Invalid dish_id";
    }

    echo '<script>';
    echo 'alert("' . addslashes($message) . '");';
    echo 'window.location.href = "../manage_dishes.php";';
    echo '</script>';

    $conn->close();
?>