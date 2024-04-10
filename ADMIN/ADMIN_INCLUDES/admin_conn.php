<?php 
    $conn = mysqli_connect("localhost", "root", "", "the_outer_clove_restaurant");
    if(mysqli_connect_errno()){
        die("database connection failed: " . mysqli_connect_error());
    }else{
        //echo "<p>database connected sucessully<p>";
    }
?>