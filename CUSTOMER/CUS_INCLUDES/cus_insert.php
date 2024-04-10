<?php
include_once("./cus_conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["input_name"];
    $username = $_POST["input_username"];
    $email = $_POST["input_email"];
    $password = $_POST["input_password"];

    $checkQuery = "SELECT * FROM `customer` WHERE `cus_username`='$username' OR `cus_email`='$email'";
    $checkResult = mysqli_query($cus_conn, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        echo '<script>alert("Username or email already exists. Please choose a different one.");</script>';
        echo '<script>window.location.href = "../customer_signup_page.php";</script>';
        mysqli_close($cus_conn);
        exit();
    }

    $hashed_password = sha1($password);

    $sql = "INSERT INTO `customer`(`cus_name`, `cus_username`, `cus_email`, `cus_password`) 
    VALUES ('$name','$username','$email','$hashed_password')";

    $result = mysqli_query($cus_conn, $sql);

    if ($result) {
        echo '<script>alert("Account created successfully!");</script>';
        echo '<script>window.location.href = "../customer_login_page.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($cus_conn);
    }
}

echo '<script>alert("Error creating account. Please try again.");</script>';
echo '<script>window.location.href = "../customer_signup_page.php";</script>';

mysqli_close($cus_conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: rgb(36, 36, 36);
        }
    </style>
</head>
<body>
    
</body>
</html>
