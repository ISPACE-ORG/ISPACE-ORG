<html>
<head>
<title>your CASE ISPACE</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style1.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body style="display: flex;align-items: center;justify-content: center;min-height: 100vh;background:#f7f7f7;">
<div class="wrapper" style="width: 400px;height:700px;overflow-y:auto;">
    <section class="users">
    <nav>
            <header>
        <div class="container mt-3 mb-3" style="background: #fff;width:390px;box-shadow:0 0 128px 0 rgba(0 ,0,0,0.1)
                                                                                        0 32px 64px -48px rgba(0,0,0,0.5);">
                
            <div class="hy">
            <div class="column">
                <?php
                session_start();
                include ("db.php");
                $reza = $_SESSION['r17'];
                $e = $_SESSION['t'];
                $q = "SELECT * FROM video WHERE code != '{$e}' ORDER BY rand() DESC LIMIT 20";
                $sqli = "SELECT * FROM video WHERE video = '{$reza}'";
                $query1 = mysqli_query($conn , $sqli);
                $query = mysqli_query($conn , $q);
            while ($row1 = mysqli_fetch_array($query1)) {
                while($row = mysqli_fetch_array($query)){
                    ?>
                    <div class="col-md-4" style="margin-left: 5px;" >
                        <p dir="rtl"><?php echo "from"."&nbsp".$row1['name']; ?></p>
                        <video id="myVideo" width="300%" controls poster="<?php echo 'upload/'.$row1['cover1'];?>">
                        <source src="<?php echo 'upload/'.$row1['video'];?>">
                        </video>
                        <p style="padding: 20px;"><?php echo  $row1['point'];  ?></p>
                        <p dir="rtl"><?php echo "from"."&nbsp".$row['name']; ?></p>
                        <video id="myVideo" width="300%" controls poster="<?php echo 'upload/'.$row['cover1'];?>">
                        <source src="<?php echo 'upload/'.$row['video'];?>">
                        </video>
                        
                    <!--   <img id="myVideo" width="300%" src="<?php echo 'upload/'.$row['cover1'];?>"> -->
                        <p style="padding: 20px;"><?php echo  $row['point'];  ?></p>
                    <!--    <button style="font-size: 20px;color:#333;width:40px;height:40px;margin-left:20px;background-color:#fff;"><i class="fa fa-comments" aria-hidden="true"></i></button> -->
                    
                    </div>
                <?php } } ?>
            </div>
            </div>
        </div>
    </nav>
    </header>
    </section>
</div>
</body>
</html>