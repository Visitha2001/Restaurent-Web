<?php include_once("./admin_header.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div log_out_row_1>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body{
            background-color: rgb(3, 0, 52);
            color: white;
        }
        .username{
            font-family: 'Saira Extra Condensed', sans-serif;
            font-size: 30px;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .admin_image{
            width: 30%;
            height: auto;
            margin-left: 35%;
            padding-top: 5vh;
        }
        img{
            width: 100%;
            height: auto;
        }
        .logout_button{
            width: 15%;
            height: auto;
            padding: 1.5vh;
            margin-bottom: 5vh;
            margin-left: 42.5%;
            color: white;
            border: none;
            border-radius: 15px;
            background-color: red;
        }
        .logout_button:hover{
            color: black;
            background-color: rgb(255, 147, 147);
        }
        .logout_row_1{
            margin-top: 5vh;
            width: 50%;
            margin-left: 25%;
            border-radius: 15px;
            background-color: rgb(48, 49, 126);
            color: white;
            padding: 10px;
        }
    </style>
<body>
    <?php
        if (isset($_SESSION['admin_username'])) {
            $username = $_SESSION['admin_username'];
        } else {
            header("Location: ./admin_login_page.php");
            exit();
        }
    ?>

    <div class="logout_row_1">
        <img src="./ADMIN_IMG/login/pngegg.png" alt="User Image" class="admin_image">

        <p class="username"><?php echo $username; ?></p>

        <form action="./admin_log_out_inc.php" method="post">
            <button type="submit" class="logout_button">Logout</button>
        </form>
    </div>
</body>
</html>

<?php include_once("./admin_footer.php") ?>