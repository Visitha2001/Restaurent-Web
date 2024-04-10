<?php
include_once("../../CUSTOMER/CUS_INCLUDES/cus_conn.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM `customer` WHERE `cus_id`='$id'";
    $result = mysqli_query($cus_conn, $sql);

    if ($result) {
        echo '<script>alert("User deleted successfully!");</script>';
        echo '<script>window.location.href = "../manage_cus_acc.php";</script>';
    } else {
        echo "Error deleting user: " . mysqli_error($cus_conn);
    }
} else {
    echo '<script>alert("Invalid request.");</script>';
    echo '<script>window.location.href = "../manage_cus_acc.php";</script>';
}
mysqli_close($cus_conn);
?>
