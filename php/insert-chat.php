<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn , $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn , $_POST['incoming_id']);
        $profile_image =time()."_".$_FILES['profileImage']['name'];
        $ch = curl_init();
        $fname = $_SESSION['f'];
        $lname = $_SESSION['c'];
        curl_setopt($ch , CURLOPT_URL,"https://ip.api.com/json");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $result = curl_exec($ch);
        $result = json_decode($result);
        if($result->status = 'success'){
        date_default_timezone_set($result->country."/".$result->city);
        $time =date("H:i");
        $target = 'images/'. $profile_image;
        mysqli_query($conn , "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, pic ,time, fname, lname) VALUES ('$incoming_id','$outgoing_id','$profile_image','$time','$fname','$lname')");
        move_uploaded_file($_FILES['profileImage']['tmp_name'] , $target);
    }}
?>