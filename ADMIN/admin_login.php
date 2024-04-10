<?php include_once('./ADMIN_INCLUDES/LOG-IN.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="./admin_styles/admin_login.css">
</head>
<body>
    <div class="admin_log_page">
        <h1>Admin Login</h1>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="input_username" required><br>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="input_password" required><br>
            
            <button name="submit" type="submit" style="margin-top: 5vh;"><p class="log_button">Login</p></button>
        </form>
    </div>
</body>
</html>
