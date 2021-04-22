<?php
session_start();
include("db.php");
if(isset($_POST['upload'])){
   // $name = $_FILES['file'];
   // echo "<pre>";
   // print_r($name);
   // exit();
    $point = $_POST['ty'];
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $temp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_destination = "upload/".$file_name;
    $e = $_SESSION['t'];
    $file_name1 = $_FILES['hello']['name'];
    $file_type1 = $_FILES['hello']['type'];
    $temp_name1 = $_FILES['hello']['tmp_name'];
    $file_size1 = $_FILES['hello']['size'];
    $file_destination1 = "upload/".$file_name1;
    $eee = $_SESSION['c'];
    $time = time();
    if(move_uploaded_file($temp_name1,$file_destination1)){
            
        if(move_uploaded_file($temp_name,$file_destination)){
        $q = "INSERT INTO video(video , cover1, point,code,unique_id_video,name) VALUES ('$file_name','$file_name1','$point','$e','$time','$eee')";
    if(mysqli_query($conn , $q)){
        header("Location:home.php");
    }else{
        $failed = "Something went wrong?? enter point yourself";
        }
    }

else{
    $msz = "Please select a video to upload..!";
    }
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>enter A Video</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
<div class="wrapper" style="width: 800px;max-height:700px;overflow-y:auto;">
    <section class="users">
    <nav>
        <header>
    <div class="container mt-3">
        <h1 class="text-center mb-5"><b>ACTION</b></h1>
        <div class="col-lg-8 m-auto">
        <form action="upload2.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label><strong>Upload a video :</strong></label>
                <input type="file" name="file" class="form-control">
            </div>
            <div class="form-group">
                <label><strong>Upload a Image :</strong></label>
                <input type="file" name="hello" class="form-control">
            </div>
            <div class="form-group">
                <label><strong></strong></label>
                <input type="text" name="ty" class="form-control" placeholder="Your Point ...">
            </div>
            <br>
            <?php if(isset($success)) { ?>
            <div class="alert alert-success">
            
                
                    <?php echo $success; ?>
            
            </div>
            <?php } ?>
            <?php if(isset($failed)) { ?>
            <div class="alert alert-danger">
            
            
                    <?php echo $failed; ?>
            
            </div>
            <?php } ?>

            <?php if(isset($msz)) { ?>
            <div class="alert alert-danger">
            
            
                    <?php echo $msz; ?>
            </div>
            <?php } ?>
            <br>
            
            <input type="submit" name="upload" value="Action" style="margin-left: 340px;width:100px;height:40px;" class="btn btn-primary mt-3">
        </form>
        </div>
    </div>
    </nav>
    </header>
    </section>
</div>
</body>
</html>