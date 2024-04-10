<?php
    $conn = mysqli_connect("localhost", "root", "", "the_outer_clove_restaurant");

    if(mysqli_connect_errno()){
        die("Database connection failed: " . mysqli_connect_error());
    } else {
        echo "Database connected successfully";
    }
?>

<?php
    require_once("./ADMIN_INCLUDES/admin_conn.php");

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($conn, $_POST['input_username']);
        $password = mysqli_real_escape_string($conn, $_POST['input_password']);
        
        $query = "SELECT * FROM `admin` WHERE `admin_username`='$username' AND `admin_password`=SHA1('$password')";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $_SESSION['admin_username'] = $username;
            echo '<script>alert("Log-in successfull");</script>';
            header("Location: index_admin.php");
            exit();
        } else {
            echo '<script>alert("Invalid username or password");</script>';
        }
    }
?>