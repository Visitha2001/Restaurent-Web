<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "the_outer_clove_restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function add_staff_members($conn, $member_name, $staff_username, $member_email, $member_role, $staff_password)
{
    $stmt = $conn->prepare("INSERT INTO `staff`(`member_name`, `staff_username`, `member_email`, `member_role`, `staff_password`) 
        VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $member_name, $staff_username, $member_email, $member_role, $staff_password);
    $stmt->execute();
    $stmt->close();
}

function display_staff($conn)
{
    $result = $conn->query("SELECT * FROM `staff`");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['member_name']}</td>";
            echo "<td>{$row['staff_username']}</td>";
            echo "<td>{$row['member_email']}</td>";
            echo "<td>{$row['member_role']}</td>";
            echo "<td><form action='./ADMIN_INCLUDES/delete_staff.php' method='POST' onsubmit='return confirmDelete()'>";
            echo "<input type='hidden' name='staff_username_delete' value='{$row['staff_username']}'>";
            echo "<button style='background-color:red;' type='submit' name='delete_staff'>Delete</button>";
            echo "</form></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No staff members found</td></tr>";
    }
}

if (isset($_POST['add_staff'])) {
    $member_name = $_POST['member_name'];
    $staff_username = $_POST['staff_username'];
    $member_email = $_POST['member_email'];
    $member_role = $_POST['member_role'];
    $staff_password = password_hash($_POST['staff_password'], PASSWORD_DEFAULT);

    add_staff_members($conn, $member_name, $staff_username, $member_email, $member_role, $staff_password);

    header("Location: ../manage_staff.php?add_success=1");
    exit();
}

?>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this staff member?");
    }
</script>