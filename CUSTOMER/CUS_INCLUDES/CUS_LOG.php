<?php
    require_once("./cus_conn.php");
?>
<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input_username = mysqli_real_escape_string($cus_conn, $_POST['cus_input_username']);
        $password = mysqli_real_escape_string($cus_conn, $_POST['cus_input_password']);

        if (strpos($input_username, '@') !== false) {
            $condition = "`cus_email`='$input_username'";
        } else {
            $condition = "`cus_username`='$input_username'";
        }

        $sql = "SELECT * FROM `customer` WHERE $condition AND `cus_password`=SHA1('$password')";
        $result = mysqli_query($cus_conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['cus_username'] = $row['cus_username'];
            echo '<script>alert("Login successful");</script>';
            echo '<script>window.location.href="../index.php";</script>';
            exit();
        } else {
            echo '<script>alert("Invalid username or password");</script>';
            echo '<script>window.location.href="../customer_login_page.php";</script>';
            exit();
        }
    }
?>