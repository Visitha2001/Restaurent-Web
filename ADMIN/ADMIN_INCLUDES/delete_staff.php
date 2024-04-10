<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "the_outer_clove_restaurant";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['delete_staff'])) {
        $staff_username_delete = $_POST['staff_username_delete'];

        $stmt = $conn->prepare("DELETE FROM `staff` WHERE staff_username = ?");
        $stmt->bind_param("s", $staff_username_delete);
        $stmt->execute();
        $stmt->close();
        
        header("Location: ../manage_staff.php");
        exit();
    }
?>
