<?php
    session_start();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body{
            background-color: black;
        }
    </style>
</head>
<body>
<script>
    alert("Logout successful!");
    window.location.href = './admin_login.php';
</script>
</body>
</html>

<?php exit(); ?>