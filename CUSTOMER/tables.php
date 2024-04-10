<?php include_once("./header.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Booking</title>
    <link rel="stylesheet" href="./CUS_STYLES/booking.css">
</head>
<body>
    <div class="table_booking">
        <h2>Table Booking</h2>

        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "the_outer_clove_restaurant";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $bookedTablesSql = "SELECT * FROM av_tables";
            $bookedTablesResult = $conn->query($bookedTablesSql);

            if ($bookedTablesResult->num_rows > 0) {
                echo '<div class="booked_tables">';
                echo '<h4>Already Booked Tables</h4>';
                echo '<table class="booked_tables_info">';
                echo '<tr><th>Table ID</th><th>Start Time</th><th>End Time</th><th>Area</th></tr>';
                while ($row = $bookedTablesResult->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row["table_id"] . '</td>';
                    echo '<td>' . $row["start_time"] . '</td>';
                    echo '<td>' . $row["end_time"] . '</td>';
                    echo '<td>' . $row["area"] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
                echo '</div>';
            }
        ?>

        <form action="./CUS_INCLUDES/tables_inc.php" method="post">
            <label for="table_id">Table ID:</label>
            <input type="text" name="table_id" required><br>

            <label for="area">Area (Indoor/Outdoor):</label>
            <select name="area" required>
                <option value="indoor">Indoor</option>
                <option value="outdoor">Outdoor</option>
            </select><br>

            <label for="start_time">Start Time:</label>
            <input type="time" name="start_time" required><br>

            <label for="end_time">End Time:</label>
            <input type="time" name="end_time" required><br>

            <button type="submit">Book Table</button>
        </form>
    </div>
</body>
</html>

<?php include_once("./footer.php") ?>