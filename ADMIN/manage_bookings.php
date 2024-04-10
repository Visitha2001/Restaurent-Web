<?php include_once("./admin_header.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Received tables</title>
    <link rel="stylesheet" href="../CUSTOMER/CUS_STYLES/recived.css">
    <style>
        body{
            background-color: rgb(1, 0, 24);
        }
    </style>
</head>
<body>
    <?php
        $cus_name = $_SESSION['admin_username'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "the_outer_clove_restaurant";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['cancel_booking'])) {
                $cancel_table_id = $_POST['cancel_table_id'];

                $delete_sql = "DELETE FROM av_tables WHERE table_id = '$cancel_table_id' AND cus_name = '$cus_name'";
                if ($conn->query($delete_sql) === TRUE) {
                    echo '<script>alert("Booking canceled successfully!");</script>';
                } else {
                    echo "Error: " . $delete_sql . "<br>" . $conn->error;
                }
            }
        }

        $sql = "SELECT * FROM av_tables WHERE cus_name = '$cus_name'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<div class="received_tables">';
            echo '<h2>Recived Tables</h2>';
            echo '<table class="received_tables_info">';
            echo '<tr><th>Table ID</th><th>Start Time</th><th>End Time</th><th>Area</th><th>Action</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["table_id"] . '</td>';
                echo '<td>' . $row["start_time"] . '</td>';
                echo '<td>' . $row["end_time"] . '</td>';
                echo '<td>' . $row["area"] . '</td>';
                echo '<td>';
                echo '<form method="post" action="">';
                echo '<input type="hidden" name="cancel_table_id" value="' . $row["table_id"] . '">';
                echo '<button type="submit" name="cancel_booking">Cancel Booking</button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '</div>';
        } else {
            echo "No booked tables found.";
        }

        $conn->close();
    ?>
</body>
</html>

<?php include_once("./admin_footer.php") ?>