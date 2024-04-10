<?php include_once("./admin_header.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Staff</title>
    <link rel="stylesheet" href="./admin_styles/man_staff.css">
</head>
<body>
    <div class="row_01">
        <div class="manage_staff_row_1">
            <h1 class="man_sta_title">Manage Staff</h1>

            <form action="./ADMIN_INCLUDES/manage_staff_inc.php" method="POST">
                <label for="member_name">Member Name:</label>
                <input type="text" name="member_name" required><br>

                <label for="staff_username">Staff Username:</label>
                <input type="text" name="staff_username" required><br>

                <label for="member_email">Member Email:</label>
                <input type="email" name="member_email" required><br>

                <label for="member_role">Member Role:</label>
                <input type="text" name="member_role" required><br>

                <label for="staff_password">Staff Password:</label>
                <input type="password" name="staff_password" required><br>

                <button class="add_staff_btn" type="submit" name="add_staff">Add Staff</button>
            </form>
        </div>
        <br>
        <div class="staff_table">
            <table border="1">
                <tr>
                    <th>Member Name</th>
                    <th>Staff Username</th>
                    <th>Member Email</th>
                    <th>Member Role</th>
                    <th>Action</th>
                </tr>

                <?php
                    include './ADMIN_INCLUDES/manage_staff_inc.php';
                    display_staff($conn);
                ?>
            </table>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this staff member?");
        }
    </script>

    <?php
        if (isset($_GET['add_success'])) {
            echo "<script>alert('Member added successfully!');</script>";
        }

        if (isset($_GET['delete_success'])) {
            echo "<script>alert('Member deleted successfully!');</script>";
        }
    ?>
</body>
</html>

<?php include_once("./admin_footer.php") ?>
