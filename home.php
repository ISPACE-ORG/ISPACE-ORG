<?php 
        session_start();
        if(!isset($_SESSION['unique_id'])){
            header("location:login.php");
        }   
              ?>
<?php include_once "header.php";
           ?>

<link rel="stylesheet" type="text/css" href="bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    font-family: 'Poppins',sans-serif;
}
body{
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    
}
html{
    background-color: #fff;
}
.wrapper{
    width: 455px;
    border-radius: 16px;
    box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.5),
                0 32px 64px -48px rgba(0,0,0,0.5);
    margin-top: 90px;
}
.wrapper nav{
    display: flex;
    justify-content: center;
}
nav .items{
    display: flex;
    max-width: 455px;
    width: 100%;
    justify-content: space-between;
    border: 1px solid #ddd;
    border-radius: 12px;
}
nav .items .item{
    padding: 10px 17.5px;
    font-size: 15px;
    font-weight: 500;
    color: #007bff;
    cursor: pointer;
    transition: all 0.3s ease;

}
nav .items .active,
nav .items .item:hover{
    color: #007bff;
    border-bottom: 1px solid #007bff;
    border-radius: 1px;
    margin-left: 5px;
}
.gallery{
    display: inline-flex;
    flex-wrap: wrap;
    margin-top: 10px;
    border-radius: 0 ;
    max-height: 485px;
    overflow-y: auto;
}
.users{
    margin-bottom: 30px;
}
.gallery::-webkit-scrollbar{
    width: 0px;

}
.gallery .image{
    width: 128.2px;
    
}
.gallery .image.hide{
    display: none;
}
.gallery .image.show{
    animation: animate 0.4s ease;
}
@keyframes animate{
    0%{
        transform: scale(0.5);
    }
    100%{
        transform: scale(1);
    }
}
.gallery .image span{
    display: flex;
    width: 100%;
    overflow: hidden;
    
}
.gallery .image img{
    width: 100%;
    vertical-align: middle;
    transition: all 0.3s ease;
    border-radius: 0 ;
    padding: 3px;
}
.gallery .image:hover img{
    transform: scale(1.1);
}

.cr{
    min-width: 150px;
    max-width: 150px;
    width: 150px;
    min-height: 150px;
    max-height: 150px;
    height: 150px;
}
.preview-box{
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50% , -50%) scale(0.9);
    background: #fff;
    max-width: 300px;
    min-width: 300px;
    width: 400px;
    min-height: 400px;
    max-height: 400px;
    height: 400px;
    z-index: 5;
    opacity: 0;
    pointer-events: none;
    border-radius: 3px;
    padding:  0 5px 5px 5px;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
}
.preview-box .details{
    display: flex;
    align-items: center;
    padding: 13px 15px 13px 10px;
    justify-content: space-between;

}
.preview-box .details .title{
    display: flex;
    font-weight: 400;
    font-size: 15.20px;
}
.preview-box .details .title p{
    margin-left: 5px;
    font-weight: 500;
}
.details .icon{
    color: #007bff;
    font-size: 19.3px;
    cursor: pointer;
}
.preview-box .image-box{
    display: flex;
    width: 295px;    
}
.image-box img{
    width: 295px;
    border-radius:  0 0 3px 3px;
}
.shadow{
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 2;
    background: rgba(0,0,0,0.4);
    display: none;
}
.preview-box.show{
    opacity: 1;
    pointer-events: auto;
    transform: translate(-50% , -50%) scale(1);
}
.shadow.show{
    display: block;
}
.by{
    padding: 10px;
    margin: 10px;
    cursor: pointer;
    font-size: 17px;
    
}
.bg{
    margin-left: 200px;
    margin-top: -50px;
    height: 50px;
    width: 50px;
    color: #007bff;
    border-color: #fff;
    background-color: #fff;
    border-bottom: 1px solid #007bff;
    border-right: 1px solid #fff;
}
.bj{
    margin-right: 100px;
    margin-top: -40px;
    height: 50px;
    width: 50px;
    color: #333;
    border-color: #fff;
    background-color: #fff;
    border-bottom: 1px solid #fff;
    border-right: 1px solid #fff;
}
.kj{
    cursor: pointer;
    margin-right: -110px;
    margin-top: -45px;
    height: 50px;
    width: 50px;
    color: #333;
    border-color: #fff;
    background-color: #fff;
    border-bottom: 1px solid #fff;
    border-right: 1px solid #fff;
}
.rt{
    padding: 10px;
    
}
.re{
    margin-left: 40px;
    font-size: 14.5px;
    margin-top: -20px;
}
.aa img{
    border-radius: 50% / 50%;
    width: 100px;
    height: 100px;
}
.aa{
    margin-top: 10px;
    margin-left: 30px;
}
header{
    margin-top:-40px;
}
nav{
    border-bottom: 1px solid #e6e6e6;
}
.sa {
    
    padding-left: 60px;
    cursor: pointer;
    font-size: 19px;
}
.ss{
    height: 55px;
    width: 55px;
    border-radius: 4px;
    color: #333;
    border: 1px solid #e6e6e6;
}
.ry{
    margin-left: 20px;
}
.ak {
    margin-left: -80px;
    margin-bottom: -90px; 
}
.image{
    border-radius: 0 0;
}

</style>
<body>
<div>
        <div class="wrapper" style="max-height: 100vh;">
        <section class="users">
            <div class="by">
            <button class="bj" onclick="location.href='users.php'"><i class="fa fa-comments" ></i></button>
            <button class="kj" onclick="location.href='news.php'"><i class="fa fa-search" ></i></button>
            <button class="bg" onclick="location.href='home.php'"><i class="fa fa-home" ></i></button>
            </div>
            <nav>
            <header>
            
            <?php  
                include_once "php/config.php";
                error_reporting(0);
                ini_set('display_errors',0);
                $sql = mysqli_query($conn , "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                }

                            ?>
                    
                <div class="aa" >
                <div class="ak">
                <img  src="php/images/<?php echo $row['img'];?>" alt="">
                </div>
                <div class="details">
                    <div class="re">
                    <div class="rt">
                    <span><?php echo $row['fname']." ".$row['lname'];?></span>
                    </div>
                    <div class="ry">
                    <p><?php echo $row['email']; ?></p>
                    </div>
                    <div class="sa">
                    <button class="ss" onclick="location.href='upload2.php'"><i class="fa fa-camera"></i></button>
                    </div>
                    </div>
                </div>
                </div>
            </nav>
            </header>
        
        <?php 
        session_start();
        include ("db.php");
        $e = $_SESSION['t'];
        $q = "SELECT * FROM video WHERE code = '{$e}'";
        $query = mysqli_query($conn , $q);
        while($row = mysqli_fetch_array($query)){
            ?>
        <div class="gallery">   
            <div class="image" data-name="ipod"><span><a href="index1.php"><img class="cr" src="<?php echo 'upload/'.$row['cover1'];?>" alt=""></a></span></div>              
        </div>
        <?php  } ?>               
        
        
        </section>
        </div>
</div>   
<script src="my script.js"></script>
</body>
</html>
