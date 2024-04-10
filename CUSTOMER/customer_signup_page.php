<?php
include_once("./header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./CUS_STYLES/log_in_&_sign_up.css">
</head>
<body>
    <div>
        <form action="./CUS_INCLUDES/cus_insert.php" method="POST">
            <div class="box_view_1">
                <h1>Sign Up</h1>
                <label for="name"><b>Name :</b></label>
                <input type="text" placeholder="Enter Your name" name="input_name" required>

                <label for="username"><b>Username :</b></label>
                <input type="text" placeholder="Enter Username" name="input_username" required>

                <label for="email"><b>Email :</b></label>
                <input type="text" placeholder="Enter Email" name="input_email" required>

                <label for="password"><b>Password :</b></label>
                <input type="password" placeholder="Enter Password" name="input_password" required>

                <p class="terms">By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                <button type="submit" class="signupbtn">Sign Up</button>
            </div>

            <div class="box_view_2">
                <p class="have">Already have an account?  <a href="./customer_login_page.php" style="color: white;">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>

<?php
include_once("./footer.php");
?>
