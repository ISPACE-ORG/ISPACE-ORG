<?php 
        session_start();
        if(!isset($_SESSION['unique_id'])){
            header("location:login.php");
        }   
              ?>
<?php include_once "header.php";
           ?>
<style>
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
    color: #333;
    border-color: #fff;
    border-bottom-color: #007bff;
    background-color: #fff;
    border-bottom: 1px solid #fff;
    border-right: 1px solid #fff;
}
.bj{
    margin-right: 100px;
    margin-top: -40px;
    height: 50px;
    width: 50px;
    color: #007bff;
    border-color: #fff;
    background-color: #fff;
    border-bottom: 1px solid #007bff;
    border-right: 1px solid #fff;
}
.kj{
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
.bh{
    padding: 4px;
    min-height: 50px;
    max-width: 50px;
    min-width: 50px;
    max-height: 50px;
    height: 50px;
    width: 50px;
    color: #333;
    border-color: #fff;
    background-color: #fff;
    border-bottom: 1px solid #fff;
    border-right: 1px solid #fff;
}
.bl{
    padding: 4px;
    min-height: 50px;
    max-width: 50px;
    min-width: 50px;
    max-height: 50px;
    height: 50px;
    width: 50px;
    color: #333;
    border-color: #fff;
    background-color: #fff;
    border-bottom: 1px solid #fff;
    border-right: 1px solid #fff; 
}
</style>
<body>
<div>
    <div class="wrapper">
        
        <section class="users">
            <div class="by">
            <button class="bj" onclick="location.href='users.php'"><i class="fa fa-comments" ></i></button>
            <button class="kj" onclick="location.href='news.php'"><i class="fa fa-search" ></i></button>
            <button class="bg" onclick="location.href='home.php'"><i class="fa fa-home" ></i></button>
            </div>
            <header>
                
            <?php  
                
                include_once "php/config.php";
                error_reporting(0);
                ini_set('display_errors',0);
                $sql = mysqli_query($conn , "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                    $t =  mysqli_fetch_array($sql);
                    $_SESSION['t'] = $row['unique_id'];
                    $_SESSION['c'] = $row['lname'];
                    $_SESSION['f'] = $row['fname'];
                }

                            ?>
                
            <div class="content">
                <img src="php/images/<?php echo $row['img'];?>" alt="">
                <div class="details">
                    <span><?php echo $row['fname']." ".$row['lname'];?></span>
                </div>
            </div>
            <div class="by">
        <!--    <a href="php/setting.php"><button class="bh"><i class="fas fa-cog"></i></button></a> -->
            <a href="notification.php"><button class="bl"><i class="fas fa-bell"></i></button></a>
            </div>
            </header>
            <div class="search">
                <span class="text">Search an user to start chat</span>
                <input type="text" placeholder="enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
            
            </div>
        </section>
    </div>
</div>    
    <script src="javascripts/users.js"></script>
</body>
</html>