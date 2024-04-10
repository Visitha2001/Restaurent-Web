<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../CUSTOMER/CUS_STYLES/cart.css">
</head>
<body>
    <?php
        include_once("./admin_header.php");

        $cusUsername = isset($_SESSION['admin_username']) ? $_SESSION['admin_username'] : '';

        if (empty($cusUsername)) {
            echo "DEBUG: User not logged in. Redirecting...";
            header("Location: ./admin_login.php");
            exit();
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "the_outer_clove_restaurant";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
            if ($_POST['action'] == 'clear cart') {
                unset($_SESSION['cart']);

                $clearCartStmt = $conn->prepare("DELETE FROM oders WHERE cus_username = ?");
                $clearCartStmt->bind_param("s", $cusUsername);
                $clearCartStmt->execute();
                $clearCartStmt->close();

                echo '<div class="alert">Cart has been cleared.</div>';
            } elseif ($_POST['action'] == 'Remove' && isset($_POST['remove_dish'])) {
                $removeDishName = $_POST['remove_dish'];
                foreach ($_SESSION['cart'] as $key => $item) {
                    if ($item['dish_name'] == $removeDishName) {
                        unset($_SESSION['cart'][$key]);

                        $removeDishStmt = $conn->prepare("DELETE FROM oders WHERE cus_username = ? AND dish_name = ?");
                        $removeDishStmt->bind_param("ss", $cusUsername, $removeDishName);
                        $removeDishStmt->execute();
                        $removeDishStmt->close();

                        echo '<div class="alert">Dish has been removed from the cart.</div>';
                        header("Location: ./manage_oders.php");
                        exit();
                    }
                }
            }
        }
    ?>
    <?php
        echo '<div class="cart_01">';
        echo '<h2 class="cart_title">Shopping Cart</h2>';
        
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            echo '<table>';
            echo '<tr>';
            echo '<th>Customer Username</th>';
            echo '<th>Dish Name</th>';
            echo '<th>Quantity</th>';
            echo '<th>Price</th>';
            echo '<th>Remove</th>';
            echo '</tr>';
            
            $totalPrice = 0;

            foreach ($_SESSION['cart'] as $item) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($cusUsername) . '</td>';
                echo '<td>' . htmlspecialchars($item['dish_name']) . '</td>';
                echo '<td>' . htmlspecialchars($item['quantity']) . '</td>';
                echo '<td>$' . htmlspecialchars($item['quantity'] * $item['price']) . '</td>';
                echo '<td>';
                echo '<form method="post" action="./manage_oders.php">';
                echo '<input type="hidden" name="remove_dish" value="' . htmlspecialchars($item['dish_name']) . '">';
                echo '<input type="submit" name="action" value="Remove">';
                echo '</form>';
                echo '</td>';
                echo '</tr>';

                $totalPrice += $item['quantity'] * $item['price'];
            }

            echo '</table>';
            echo '<p>Total Price: $' . htmlspecialchars($totalPrice) . '</p>';
            
            echo '<form method="post" action="./manage_oders.php">';
            echo '<input type="submit" name="action" value="clear cart">';
            echo '</form>';
        } else {
            echo 'Your cart is empty.';
        }
    ?>

    <?php
        $conn->close();
        include_once("./admin_footer.php");
    ?>
</body>
</html>
