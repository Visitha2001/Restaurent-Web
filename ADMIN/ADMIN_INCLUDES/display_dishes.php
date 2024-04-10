<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "the_outer_clove_restaurant";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `dishes`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='dish_container'>";
        $count = 0;

        while ($row = $result->fetch_assoc()) {
            if ($count % 5 === 0) {
                if ($count !== 0) {
                    echo '</div>';
                }
                echo '<div class="row">';
            }
            echo '<div class="remove_dish">';
            echo '<div class="remove_dish_box">';
            echo '<img class="dis_img_row" src="' . $row['dish_img_url'] . '" alt="' . $row['dish_name'] . '">';
            echo '<p>Name: ' . $row['dish_name'] . '</p>';
            echo '<p>Price: $' . $row['dish_price'] . '</p>';
            echo '<p>Category: ' . $row['dish_category'] . '</p>';
            echo '<p>ID: ' . $row['dish_id'] . '</p>';
            echo '<button class="remove_btn" onclick="removeDish(' . $row['dish_id'] . ')">Remove Dish</button>';
            echo '</div>';
            echo '</div>';
            $count++;
        }
        echo '</div>';
        echo "</div>";
    } else {
        echo "<h3 class='remove_dish_h3'>No dishes found.</h3>";
    }
    $conn->close();
?>