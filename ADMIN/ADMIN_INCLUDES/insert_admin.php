<?php
    require_once("./admin_conn.php");
?>
<?php
    $admin_username = "visitha_nirmal";
    $admin_email = "visitha2001@gmail.com";
    $admin_password = "VNR2001vnr#";

    $hashed_password = sha1($admin_password);

    $query = "INSERT INTO `admin`(`admin_username`, `admin_email`, `admin_password`) 
    VALUES ('$admin_username','$admin_email','$hashed_password')";

    $result = mysqli_query($conn, $query);

    if($result){
        //echo "<br><p>Record inserted successfully</p>";
    }else{
        //echo "<br><p>Record not inserted</p>";
    }
?>