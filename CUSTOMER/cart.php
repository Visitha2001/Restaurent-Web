<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="./CUS_STYLES/cart.css">
</head>
<body>
    <?php
        include_once("./header.php");

        $cusUsername = isset($_SESSION['cus_username']) ? $_SESSION['cus_username'] : '';

        if (empty($cusUsername)) {
            echo "DEBUG: User not logged in. Redirecting...";
            header("Location: ./customer_login_page.php");
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

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['dish_id']) && isset($_GET['dish_name']) && isset($_GET['quantity']) && isset($_GET['price'])) {
            $dishId = $_GET['dish_id'];
            $dishName = $_GET['dish_name'];
            $quantity = $_GET['quantity'];
            $price = $_GET['price'];

            $insertOrderStmt = $conn->prepare("INSERT INTO oders (dish_name, qty, cus_username, price) 
            VALUES (?, ?, ?, ?)");
            $insertOrderStmt->bind_param("siss", $dishName, $quantity, $cusUsername, $price);
            $insertOrderStmt->execute();
            $insertOrderStmt->close();

            $item = array(
                'dish_name' => $dishName,
                'quantity' => $quantity,
                'price' => $price
            );

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            array_push($_SESSION['cart'], $item);

            echo '<div class="alert">Item added to cart.</div>';
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] == 'clear cart') {
            unset($_SESSION['cart']);

            $clearCartStmt = $conn->prepare("DELETE FROM oders WHERE cus_username = ?");
            $clearCartStmt->bind_param("s", $cusUsername);
            $clearCartStmt->execute();
            $clearCartStmt->close();

            echo '<div class="alert">Cart has been cleared.</div>';
        }

        $conn->close();
        include_once("./footer.php");
    ?>

    <?php
        echo '<div class="cart_01">';
        echo '<h2 class="cart_title">Shopping Cart</h2>';
        
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            echo '<table>';
            echo '<tr><th>Dish Name</th><th>Quantity</th><th>Price</th></tr>';
            
            $totalPrice = 0;

            foreach ($_SESSION['cart'] as $item) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($item['dish_name']) . '</td>';
                echo '<td>' . htmlspecialchars($item['quantity']) . '</td>';
                echo '<td>$' . htmlspecialchars($item['quantity'] * $item['price']) . '</td>';
                echo '</tr>';

                $totalPrice += $item['quantity'] * $item['price'];
            }

            echo '</table>';
            echo '<p>Total Price: $' . htmlspecialchars($totalPrice) . '</p>';
            
            echo '<form method="post" action="cart.php">';
            echo '<input type="submit" name="action" value="clear cart">';
            echo '</form>';
        } else {
            echo 'Your cart is empty.';
        }
    ?>
</body>
</html>