<?php
    session_start();
    include_once 'config.php';
    $email = mysqli_real_escape_string($conn , $_POST['email']);
    $password = mysqli_real_escape_string($conn , $_POST['password']);
    
    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn , "SELECT * FROM users WHERE fname ='{$email}' AND password = '{$password}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $status = "Active Now";
            $sql2 =mysqli_query($conn , "UPDATE users SET fname = '{$email}' WHERE unique_id = {$row['unique_id']}");
            if($sql2){
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "success";
            }
        }else{
            echo "Name or Password is incorrect!";
            error_reporting(0);
            ini_set('display_errors',0);
        }
    }else{
        echo "ALL input fields are required !!";
    }
?>