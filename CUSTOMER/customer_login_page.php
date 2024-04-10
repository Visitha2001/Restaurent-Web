<?php
    include_once("./header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
    <link rel="stylesheet" href="./CUS_STYLES/log_in_&_sign_up.css">
</head>
<body>
    <div>
        <form action="./CUS_INCLUDES/CUS_LOG.php" method="POST">
            <div class="box_view_1">
                <h1>Log-in</h1>
                <label for="username"><b>Username :</b></label>
                <input type="text" placeholder="Enter Username or E-mail address" name="cus_input_username" required>

                <label for="password"><b>Password :</b></label>
                <input type="password" placeholder="Enter Password" name="cus_input_password" required>
                
                <button name="submit" type="submit" style="margin-top: 5vh;">Login</button>
            </div>

            <div class="box_view_2">
                <p class="have">Create new account? <a href="./customer_signup_page.php" style="color: white;">create</a></p>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    include_once("./footer.php");
?>