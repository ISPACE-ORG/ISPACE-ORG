<?php 
        session_start();
        if(!isset($_SESSION['unique_id'])){
            header("location:login.php");
        }   
             ?>
<?php include_once "header.php";
error_reporting(0);
ini_set('display_errors',0);           ?>
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
    margin-top: 40px;
    width: 455px;
    border-radius: 16px;
    box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.5),
                0 32px 64px -48px rgba(0,0,0,0.5);
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
    margin-left: -40px;
    border-radius: 12px;
    width: 500px;
}
nav .items .item{
    padding: 10px 17.5px;
    font-size: 12px;
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
    display: flex;
    flex-wrap: wrap;
    margin-top: -10px;
    border-radius: 0;
    max-height: 520px;
    overflow-y: auto;
}
.gallery::-webkit-scrollbar{
    width: 0px;

}
.gallery .image{
    width: calc(100% / 3);
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
    border-radius: 0 0;
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
    margin-top: -45px;
    height: 50px;
    width: 50px;
    color: #333;
    border-color: #fff;
    border-bottom-color: #007bff;
    background-color: #fff;
    border-bottom: 1px solid #fff;
    border-right: 1px solid #fff;
    font-size: 17px;
}
.bj{
    margin-right: 100px;
    margin-top: -35px;
    height: 50px;
    width: 50px;
    color: #333;
    border-color: #fff;
    background-color: #fff;
    border-bottom: 1px solid #fff;
    border-right: 1px solid #fff;
    font-size: 17px;
}
.kj{
    margin-right: -110px;
    margin-top: -40px;
    height: 50px;
    width: 50px;
    color: #007bff;
    border-color: #fff;
    background-color: #fff;
    border-bottom: 1px solid #007bff;
    border-right: 1px solid #fff;
    font-size: 17px;
}

</style>
<body>
<div>
    <div class="wrapper" style="max-height:100vh;">
        
        <section class="users">
            <div class="by">
            
            <button class="bj" onclick="location.href='users.php'"><i class="fa fa-comments" ></i></button>
            <button class="kj" onclick="location.href='news.php'" ><i class="fa fa-search" ></i></button>
            <button class="bg" onclick="location.href='home.php'"><i class="fa fa-home" ></i></button>
            
            </div>
            <header>
            
        <nav>
            <div class="items">
                <?php include ("php/config.php");
                    $eeee = $_SESSION['t']; 
                    $www1 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www1) > 0){
                    $irow1 = mysqli_fetch_assoc($www1);
                    $www2 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www2) > 0){
                    $irow2 = mysqli_fetch_assoc($www2);
                    $www3 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www3) > 0){
                    $irow3 = mysqli_fetch_assoc($www3);
                    $www4 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www4) > 0){
                    $irow4 = mysqli_fetch_assoc($www4);
                    $www5 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www5) > 0){
                    $irow5 = mysqli_fetch_assoc($www5);
                    $www6 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www6) > 0){
                    $irow6 = mysqli_fetch_assoc($www6);
                    $www7 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www7) > 0){
                    $irow7 = mysqli_fetch_assoc($www7);
                    $www8 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www8) > 0){
                    $irow8 = mysqli_fetch_assoc($www8);
                    $www9 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www9) > 0){
                    $irow9 = mysqli_fetch_assoc($www9);
                    $www10 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www10) > 0){
                    $irow10 = mysqli_fetch_assoc($www10);
                    $www11 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www11) > 0){
                    $irow11 = mysqli_fetch_assoc($www11);
                    $www12 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www12) > 0){
                    $irow12 = mysqli_fetch_assoc($www12);
                    $www13 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www13) > 0){
                    $irow13 = mysqli_fetch_assoc($www13);
                    $www14 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www14) > 0){
                    $irow14 = mysqli_fetch_assoc($www14);
                    $www15 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www15) > 0){
                    $irow15 = mysqli_fetch_assoc($www15);
                    $www16 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www16) > 0){
                    $irow16 = mysqli_fetch_assoc($www16);
                    $www17 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www17) > 0){
                    $irow17 = mysqli_fetch_assoc($www17);
                    $www18 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www18) > 0){
                    $irow18 = mysqli_fetch_assoc($www18);
                    $www19 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www19) > 0){
                    $irow19 = mysqli_fetch_assoc($www19);
                    $www20 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www20) > 0){
                    $irow20 = mysqli_fetch_assoc($www20);
                    $www21 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www21) > 0){
                    $irow21 = mysqli_fetch_assoc($www21);
                    $www22 = mysqli_query($conn , "SELECT * FROM video WHERE code !='{$eeee}' ORDER BY rand() LIMIT 22");
                    if(mysqli_num_rows($www22) > 0){
                    $irow22 = mysqli_fetch_assoc($www22);
                    $_SESSION['r1'] = $irow1['video'];
                    $_SESSION['r2'] = $irow2['video'];
                    $_SESSION['r3'] = $irow3['video'];
                    $_SESSION['r4'] = $irow4['video'];
                    $_SESSION['r5'] = $irow5['video'];
                    $_SESSION['r6'] = $irow6['video'];
                    $_SESSION['r7'] = $irow7['video'];
                    $_SESSION['r8'] = $irow8['video'];
                    $_SESSION['r9'] = $irow9['video'];
                    $_SESSION['r10'] = $irow10['video'];
                    $_SESSION['r11'] = $irow11['video'];
                    $_SESSION['r12'] = $irow12['video'];
                    $_SESSION['r13'] = $irow13['video'];
                    $_SESSION['r14'] = $irow14['video'];
                    $_SESSION['r15'] = $irow15['video'];
                    $_SESSION['r16'] = $irow16['video'];
                    $_SESSION['r17'] = $irow17['video'];
                    $_SESSION['r18'] = $irow18['video'];
                    $_SESSION['r19'] = $irow19['video'];
                    $_SESSION['r20'] = $irow20['video'];
                    $_SESSION['r21'] = $irow21['video'];
                    ?>
              
                <span class="item active" data-name="all" >all</span>
                <span class="item" data-name="<?php echo $irow2['point']; ?>"><?php echo $irow6['point']; ?></span>
                <span class="item" data-name="ipod"><?php echo $irow3['point']; ?></span>
                <span class="item" data-name="carpet"><?php echo $irow4['point']; ?></span>
                <span class="item" data-name="mac"><?php echo $irow5['point']; ?></span>
                <span class="item" data-name="shoes"><?php echo $irow1['point']; ?></span>
               
            </div>
            </header>
            <?php
            
            include ("db.php");
            $yy = $_SESSION['t'];
            $q =mysqli_query($conn ,"SELECT * FROM messages WHERE incoming_msg_id ={$yy} ORDER BY rand() DESC LIMIT 6");
            $w = mysqli_query($conn , "SELECT * FROM users");
            $row1 = mysqli_fetch_array($w);
            if($row['out_going_id'] = $row1['unique_id']){
            if(mysqli_num_rows($q) > 0){
            $row = mysqli_fetch_assoc($q);
            $q2 =mysqli_query($conn ,"SELECT * FROM messages WHERE incoming_msg_id ={$yy} ORDER BY rand(),msg_id DESC LIMIT 6");
            $w2 = mysqli_query($conn , "SELECT * FROM users");
            $row22 = mysqli_fetch_array($w2);
            if($row['out_going_id'] = $row22['unique_id']){
            if(mysqli_num_rows($q2) > 0){
            $row2 = mysqli_fetch_assoc($q2);
            $q3 =mysqli_query($conn ,"SELECT * FROM messages WHERE incoming_msg_id ={$yy} ORDER BY rand(),msg_id DESC LIMIT 6");
            $w3 = mysqli_query($conn , "SELECT * FROM users");
            $row33 = mysqli_fetch_array($w3);
            if($row['out_going_id'] = $row33['unique_id']){
            if(mysqli_num_rows($q3) > 0){
            $row3 = mysqli_fetch_assoc($q3);   
            $q4 =mysqli_query($conn ,"SELECT * FROM messages WHERE incoming_msg_id ={$yy} ORDER BY rand(),msg_id DESC LIMIT 6");
            $w4 = mysqli_query($conn , "SELECT * FROM users");
            $row44 = mysqli_fetch_array($w4);
            if($row['out_going_id'] = $row44['unique_id']){
            if(mysqli_num_rows($q4) > 0){
            $row4 = mysqli_fetch_assoc($q4);
            $q5 =mysqli_query($conn ,"SELECT * FROM messages WHERE incoming_msg_id ={$yy} ORDER BY rand(),msg_id DESC LIMIT 6");
            $w5 = mysqli_query($conn , "SELECT * FROM users");
            $row55 = mysqli_fetch_array($w5);
            if($row['out_going_id'] = $row55['unique_id']){
            if(mysqli_num_rows($q5) > 0){
            $row5 = mysqli_fetch_assoc($q5);
            $q6 =mysqli_query($conn ,"SELECT * FROM messages WHERE incoming_msg_id ={$yy} ORDER BY rand(),msg_id DESC LIMIT 6");
            $w6 = mysqli_query($conn , "SELECT * FROM users");
            $row66 = mysqli_fetch_array($w6);
            if($row['out_going_id'] = $row66['unique_id']){
            if(mysqli_num_rows($q6) > 0){
            $row6 = mysqli_fetch_assoc($q6);  ?>
        </nav>
        <div class="gallery">
        <div class="image" ><span><a href="notification.php"><img class="cr" src="<?php echo 'php/images/'.$row['pic'];?>"></a></span></div>
            <div class="image" data-name="<?php echo $irow1['point']; ?>"><span><a href="index22.php"><img class="cr" src="<?php echo 'upload/'.$irow1['cover1'];?>" alt=""></a></span></div>
            <div class="image" data-name="<?php echo $irow2['point']; ?>"><span><a href="index2.php"><img class="cr" src="<?php echo 'upload/'.$irow2['cover1'];?>" alt=""></a></span></div>
            <div class="image" data-name="<?php echo $irow3['point']; ?>"><span><a href="index3.php"><img class="cr"  src="<?php echo 'upload/'.$irow3['cover1'];?>" alt=""></a></span></div>
        <div class="image" ><span><a href="notification.php"><img class="cr" src="<?php echo 'php/images/'.$row2['pic'];?>"></a></span></div>
            <div class="image" data-name="<?php echo $irow4['point']; ?>"><span><a href="index4.php"><img class="cr" src="<?php echo 'upload/'.$irow4['cover1'];?>" alt=""></a></span></div>
            <div class="image" data-name="<?php echo $irow5['point']; ?>"><span><a href="index5.php"><img class="cr" src="<?php echo 'upload/'.$irow5['cover1'];?>" alt=""></a></span></div>
            <div class="image" data-name="<?php echo $irow6['point']; ?>"><span><a href="index6.php"><img class="cr" src="<?php echo 'upload/'.$irow6['cover1'];?>" alt=""></a></span></div>
        <div class="image" ><span><a href="notification.php"><img class="cr" src="<?php echo 'php/images/'.$row3['pic'];?>"></a></span></div>
            <div class="image" data-name="<?php echo $irow7['point']; ?>"><span><a href="index7.php"><img class="cr" src="<?php echo 'upload/'.$irow7['cover1'];?>" alt=""></a></span></div>
            <div class="image" data-name="<?php echo $irow8['point']; ?>"><span><a href="index8.php"><img class="cr" src="<?php echo 'upload/'.$irow8['cover1'];?>" alt=""></a></span></div>            
            <div class="image" data-name="<?php echo $irow9['point']; ?>"><span><a href="index9.php"><img class="cr" src="<?php echo 'upload/'.$irow9['cover1'];?>" alt=""></a></span></div>
        <div class="image" ><span><a href="notification.php"><img class="cr" src="<?php echo 'php/images/'.$row4['pic'];?>"></a></span></div>
            <div class="image" data-name="<?php echo $irow10['point']; ?>"><span><a href="index10.php"><img class="cr" src="<?php echo 'upload/'.$irow10['cover1'];?>" alt=""></a></span></div>
            <div class="image" data-name="<?php echo $irow11['point']; ?>"><span><a href="index11.php"><img class="cr" src="<?php echo 'upload/'.$irow11['cover1'];?>" alt=""></a></span></div>
            <div class="image" data-name="<?php echo $irow12['point']; ?>"><span><a href="index12.php"><img class="cr"  src="<?php echo 'upload/'.$irow12['cover1'];?>" alt=""></a></span></div>
        <div class="image" ><span><a href="notification.php"><img class="cr" src="<?php echo 'php/images/'.$row5['pic'];?>"></a></span></div>
            <div class="image" data-name="<?php echo $irow21['point']; ?>"><span><a href="index21.php"><img class="cr" src="<?php echo 'upload/'.$irow21['cover1'];?>" alt=""></a></span></div>
            <div class="image" data-name="<?php echo $irow13['point']; ?>"><span><a href="index13.php"><img class="cr"  src="<?php echo 'upload/'.$irow13['cover1'];?>" alt=""></a></span></div>
            <div class="image" data-name="<?php echo $irow14['point']; ?>"><span><a href="index14.php"><img class="cr" src="<?php echo 'upload/'.$irow14['cover1'];?>" alt=""></a></span></div>
            <div class="image" data-name="<?php echo $irow15['point']; ?>"><span><a href="index15.php"><img class="cr" src="<?php echo 'upload/'.$irow15['cover1'];?>" alt=""></a></span></div>   
            <div class="image" data-name="<?php echo $irow16['point']; ?>"><span><a href="index16.php"><img class="cr" src="<?php echo 'upload/'.$irow16['cover1'];?>" alt=""></a></span></div>
            <div class="image" data-name="<?php echo $irow17['point']; ?>"><span><a href="index17.php"><img class="cr" src="<?php echo 'upload/'.$irow17['cover1'];?>" alt=""></a></span></div>
       <div class="image" ><span> <a href="notification.php"><img class="cr" src="<?php echo 'php/images/'.$row6['pic'];?>"></a></span></div>
            <div class="image" data-name="<?php echo $irow18['point']; ?>"><span><a href="index18.php"><img class="cr" src="<?php echo 'upload/'.$irow18['cover1'];?>" alt=""></a></span></div>
            <div class="image" data-name="<?php echo $irow19['point']; ?>"><span><a href="index19.php"><img class="cr" src="<?php echo 'upload/'.$irow19['cover1'];?>"  alt=""></a></span></div>
            <div class="image" data-name="<?php echo $irow20['point']; ?>"><span><a href="index20.php"><img class="cr"  src="<?php echo 'upload/'.$irow20['cover1'];?>" alt=""></a></span></div>
           <?php  }}}}}}}}}}}}}}}}}}}}}} ?> <?php }}}}}}}}}}}} ?>  
        </section>
    </div>
</div>   
<script src="my script.js"></script>
</body>
</html>