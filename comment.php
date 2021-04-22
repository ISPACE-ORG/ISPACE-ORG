
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
        <div class="col-lg-8 m-auto">
        <form action="comment.php" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <label><strong></strong></label>
                <input type="text" name="texts" class="form-control" placeholder="Your Comment ...">
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
            
            <input type="submit" name="upload" value="Send" style="margin-left: 340px;width:100px;height:40px;" class="btn btn-primary mt-3">
        </form>
        </div>
    </div>
    </nav>
    </header>
<?php
session_start();
include("db.php");
if(isset($_POST['upload'])){
   // $name = $_FILES['file'];
   // echo "<pre>";
   // print_r($name);
   // exit();
    error_reporting(0);
    ini_set('display_errors',0);
    $point = $_POST['texts'];
    $e = $_SESSION['c'];
    $sql = mysqli_query ($conn , "INSERT INTO comment (person,texts) VALUES ('$e','$point')");
    $sql1 = mysqli_query( $conn , "SELECT * FROM comment");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
}} ?>
    <p><?php echo $row['person']."&nbsp"."says";?></p>
    <p><?php  echo $row['texts']."&nbsp";    ?></p>
    </section>
</div>
</body>
</html>