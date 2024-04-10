<?php include_once("./admin_header.php") ?>

<?php
    include_once("../CUSTOMER/CUS_INCLUDES/cus_conn.php");

    $sql = "SELECT * FROM `customer`";
    $result = mysqli_query($cus_conn, $sql);

    if (!$result) {
        die("Error fetching users: " . mysqli_error($cus_conn));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Customer Accounts</title>
    <link rel="stylesheet" href="./admin_styles/man_cus_acc.css">
</head>
<body>
    <div class="manage_cus_acc">
        <h2 class="man_cus_acc_title">Manage Customer Accounts</h2>
    
        <div class="acc_table">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['cus_name']}</td>";
                    echo "<td>{$row['cus_username']}</td>";
                    echo "<td>{$row['cus_email']}</td>";
                    echo "<td><a href='./ADMIN_INCLUDES/delete_acc.php?id={$row['cus_id']}'>Delete</a></td>";
                    echo "</tr>";
                }

                mysqli_free_result($result);

                mysqli_close($cus_conn);
                ?>
            </table>
        </div>
    </div>
</body>
</html>

<?php include_once("./admin_footer.php") ?>