<?php
    include_once("./header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu_&_Orders</title>
    <link rel="stylesheet" href="./CUS_STYLES/menu.css">
</head>
<body>
    <form method="get" action="dish_menu.php">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" placeholder="Enter dish name">
        <button type="submit">Search</button>
    </form>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "the_outer_clove_restaurant";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
        $sql = "SELECT * FROM dishes WHERE dish_name LIKE '%$searchQuery%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<div class="menu">';
            $count = 0;

            while ($row = $result->fetch_assoc()) {
                if ($count % 5 === 0) {
                    echo '<div class="row">';
                }

                echo '<div class="dish">';
                echo '<div class="menu_image_box">';
                echo '<img class="menu_image_box_01" src="../ADMIN/ADMIN_IMG/dishes/' . basename($row['dish_img_url']) . '" alt="' . $row['dish_name'] . '">';
                echo '</div>';
                echo '<h3>' . $row['dish_name'] . '</h3>';
                echo '<p>Price: $' . $row['dish_price'] . '</p>';
                echo '<div class="add-to-cart">';
                echo '<input type="number" min="1" value="1" id="quantity_' . $row['dish_id'] . '">';
                echo '<button class="addtocart_btn" onclick="addToCart(' . $row['dish_id'] . ', \'' . $row['dish_name'] . '\', ' . $row['dish_price'] . ')">Add to Cart</button>';
                echo '</div>';
                echo '</div>';

                if ($count % 5 === 4 || $count === $result->num_rows - 1) {
                    echo '</div>';
                }

                $count++;
            }
            echo '</div>';
        } else {
            echo 'No dishes available.';
        }
        $conn->close();
    ?>

    <script>
        function addToCart(dishId, dishName, dishPrice) {
            var quantity = document.getElementById('quantity_' + dishId).value;
            window.location.href = './cart.php?dish_id=' + dishId + '&dish_name=' + encodeURIComponent(dishName) + '&quantity=' + quantity + '&price=' + dishPrice;
            alert('Item added to cart!');
        }
    </script>
</body>
</html>

<?php
    include_once("./footer.php");
?>