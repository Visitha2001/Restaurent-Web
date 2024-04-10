<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dish_name = $_POST["input_dish_name"];
    $price = $_POST["input_price"];
    $category = $_POST["input_category"];

    $targetDirectory = "ADMIN_IMG/dishes/";

    if (!file_exists($targetDirectory)) {
        if (!mkdir($targetDirectory, 0777, true) && !is_dir($targetDirectory)) {
            die('Failed to create the target directory');
        }
    }
    
    $url = $targetDirectory . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $url);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "the_outer_clove_restaurant";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO `dishes`(`dish_name`, `dish_price`, `dish_category`, `dish_img_url`)
    VALUES ('$dish_name','$price','$category','$url')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Dish added successfully.");</script>';
        echo '<script>window.location.href = "../manage_dishes.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>