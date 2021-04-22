<?php
   
    $conn = mysqli_connect("localhost","root","","ispace");
    mysqli_query($conn , "SET NAMES utf8");
    if(!$conn){
        echo "Database connected" . mysqli_connect_errno();
    }

?>