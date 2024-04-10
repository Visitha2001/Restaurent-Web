<?php
    session_start();

    if (!isset($_SESSION['cus_username'])) {
        header("Location: ../customer_login_page.php");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $table_id = $_POST['table_id'];
        $area = $_POST['area'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];

        $cus_name = $_SESSION['cus_username'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "the_outer_clove_restaurant";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $check_sql = "SELECT * FROM av_tables 
                    WHERE table_id = '$table_id' 
                    AND ((start_time BETWEEN '$start_time' AND '$end_time') 
                    OR (end_time BETWEEN '$start_time' AND '$end_time'))";

        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows > 0) {
            echo '<script>alert("Table is already booked for the selected time range. Please choose a different time.");</script>';
        } else {
            $insert_sql = "INSERT INTO av_tables (table_id, cus_name, start_time, end_time, area)
                        VALUES ('$table_id', '$cus_name', '$start_time', '$end_time', '$area')";

            if ($conn->query($insert_sql) === TRUE) {
                header("Location: ../table_recived.php");
                exit();
            } else {
                echo "Error: " . $insert_sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    }
?>
