<html>
<head>
<title>Notification</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style1.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="wrapper" style="width: 1200px;max-height:700px;overflow-y:auto;">
    <section class="users">
    <nav>
    <header>
    <div class="container mt-3 mb-3">
        <h1 style="color:#3c6155;">Notification</h1>
        
            <div id="r">
               <button style="padding:10px;margin-bottom:5px;margin-top:-50px;font-size:27px;margin-left:300px;color:#333;color: #333;border-color: #fff;background-color: #fff;border-bottom: 1px solid #fff;border-right: 1px solid #fff;"><div class="ew"><i class="fas fa-bell"></i></div></button> 
            </div>
            <a href="users.php" style="width: 200px;height:40px;font-size:17.5px;" class="btn btn-primary mt-3">Assecc to Users</a>
            <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;font-size:30px;color:#DC143C;">new masseges</p>
        <div class="row" id="ed"  style="margin-left: 40px;">    
            <?php
            session_start();
            error_reporting(0);
        ini_set('display_errors',0);
            include ("db.php");
            $y = $_SESSION['t'];
            $q = "SELECT * FROM messages WHERE incoming_msg_id = '{$y}' ORDER BY msg_id DESC LIMIT 6";
            $query = mysqli_query($conn , $q);
            $w = mysqli_query($conn ,"SELECT * FROM users ");
            $row = mysqli_fetch_array($q);
            $row1 = mysqli_fetch_array($w);
            if($row['out_going_id'] = $row1['unique_id']){
            while($row = mysqli_fetch_array($query)){
                ?>
                <div class="col-md-4">
                    <img id="myVideo" style="border-radius:3px;width:200px;height:150px;border-radius:15px;" src="<?php echo 'php/images/'.$row['pic'];?>">
                    <div id="e">
                    <p style="font-size:18px;"><?php echo "&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp".'From'." ".$row['fname']." ".$row['lname']."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp".$row['time'];?></p>
                    </div>
                </div>
            <?php } }?>
        </div>
        <div class="row" id="ed2" style="margin-left: 40px;margin-top:30px;">
            <?php
            include ("db.php");
            $q = "SELECT * FROM messages WHERE incoming_msg_id = '{$y}'";
            $query = mysqli_query($conn , $q);
            $w = mysqli_query($conn ,"SELECT * FROM users ");
            $row = mysqli_fetch_array($q);
            if($row['out_going_id'] = $row1['unique_id']){
            while($row = mysqli_fetch_array($query)){
                ?>
                <div class="col-md-4">
                    <img id="myVideo" style="border-radius:3px;width:200px;height:150px;border-radius:15px;" src="<?php echo 'php/images/'.$row['pic'];?>">
                    <div id="e">
                    <p style="font-size:18px;"><?php echo "&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp".'From'." ".$row['fname']." ".$row['lname']."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp".$row['time'];?></p>
                    </div>
                </div>
            <?php } }?>
        </div>
    </div>
    </nav>
    </header>
    </section>
</div>
</body>
</html>