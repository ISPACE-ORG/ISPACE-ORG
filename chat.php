<?php

session_start();
if(!isset($_SESSION['unique_id'])){
    header("location:login.php");
}
?>
<?php include_once "header.php";  ?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
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
    background: #f7f7f7;
}

.wrapper{
    background: #fff;
    width: 455px;
    border-radius: 16px;
    box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.5),
                0 32px 64px -48px rgba(0,0,0,0.5);
}
.form{
    padding: 25px 30px;
}
.form header{
    font-size: 25px;
    font-weight: 600;
    padding-bottom: 10px;
    border-bottom: 1px solid #e6e6e6;
}
.form form{
    margin: 20px 0 ;
}
.form form .error-txt{
    color: #721c24;
    background: #f8d7da;
    padding: 8px 10px;
    text-align: center;
    border-radius: 5px;
    margin-bottom: 10px;
    border: 1px solid #f5c6cb;
    display: none;
}
.form form .name-details{
    display: flex;
}
form .name-details .field:first-child{
    margin-right: 10px;
}
form .name-details .field:last-child{
    margin-left: 10px;
}
.form form .field{
    display: flex;
    position: relative;
    flex-direction: column;
    margin-bottom: 10px;
}
.form form .field label{
    margin-bottom: 2px;
}
.form form .field input{
    outline: none;   
}
.form form .input input{
    height: 40px;
    width: 100%;
    font-size: 16px;
    padding: 0 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.form form .image input{
    font-size: 17px;

}
.form form .button input{
    margin-top: 13px;
    height: 45px;
    border: none;
    font-size: 17px;
    font-weight: 400;
    background: #333;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
}
.form form .field i{
    position: absolute;
    right: 15px;
    color: #fff;
    top: 70%;
    transform: translateY(-50%);
    cursor: pointer;
}
.form form .field i.active::before{
    content: "\f070";
    color: #333;
}
.form .link{
    text-align: center;
    margin: 10px 0;
    font-size: 17px;
}
.form .link a{
    color: #333;
}
.form .link a:hover{
    text-decoration: underline;

}

.users{
    padding: 25px 30px;
}
.users header,
.users-list a{
    display: flex;
    align-items: center;
    padding-bottom: 20px;
    justify-content: space-between;
    border-bottom: 1px solid #e6e6e6;
}

:is(.users , .users-list) .content{
    display: flex;
    align-items: center;
}
:is(.users , .users-list) .details{
    color: #000;
    margin-left: 15px;
}
:is(.users , .users-list) .details span{
    font-size: 18px;
    font-weight: 500;
}
.users header .logout{
    background: #333;
    color: #fff;
    padding:7px 15px;
    font-size: 17px;
    border-radius: 5px;

}
.users  .search{
    margin:20px 0;
    display: flex;
    position: relative;
    align-items: center;
    justify-content: space-between;
}
.users .search .text{
    font-size: 18px;

}
.users .search input{
    position: absolute;
    height: 42px;
    width: calc(100% - 50px);
    border: 1px solid #ccc;
    padding: 0 13px;
    font-size: 16px;
    border-radius: 5px;
    outline: none;   
    opacity: 0;
    pointer-events: none;
    transition: all 0.2s ease;
}
.users .search input.active{
    opacity: 1;
    pointer-events: auto;
}
.users .search button{
    width: 47px;
    height: 42px;
    border: none;
    outline: none;
    color: #333;
    background: #fff;
    font-size: 17px;
    border-radius: 0 5px 5px 0;
    transition: all 0.2s ease;
}
.users .search button.active{
    color: #fff;
    background: #333;
}
.users .search button.active i::before{
    content: "\f00d";

}
:is(.users-list , .chat-box)::-webkit-scrollbar{
    width: 0px;
}
.users-list{
    max-height: 350px;
    overflow-y: auto;
}
.users-list a{
    padding-right: 15px;
    margin-bottom: 15px;
    page-break-after: 10px;
    border-bottom-color: #f1f1f1 ;
}
.users-list a:last-child{
    border: none;
    margin-bottom: 0px;
}
.users-list a .content img{
    height: 40px;
    width: 40px;
}
.users-list a .content p{
    color: #67676a;

}
.users-list a .status-dot{
    font-size: 12px;
    color: #468669;
}
.users-list a .status-dot.offline{
    color: #ccc;
}
.chat-area header{
    display: flex;
    align-items: center;
    padding: 18px 30px;
}.chat-area header .back-icon{
    font-size: 18px;
    color: #333;

}
.chat-area header img{
    height: 45px;
    width: 45px;
    margin: 0 15px;
}
.chat-area header span{
    font-size: 17px;
    font-weight: 500;
}
.chat-box{
    height: 500px;
    overflow-y: auto;
    background: #f7f7f7;
    padding: 10px 30px 20px 30px;
    box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
                inset 0 32px 32px -32px rgb(0 0 0 / 5%);
}
.chat-box .chat{
    margin: 15px 0;
}
.chat-box .chat input{
    padding: 8px 16px;
    box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
                inset 0 32px 32px -32px rgb(0 0 0 / 5%);
}
.chat-box .outgoing{
    display: flex;
}
.outgoing .details{
    margin-left: auto;
    max-width: calc(100% - 130px);
}

.chat-box .incoming{
    display: flex;
    align-items: flex-end;
}
.chat-box .incoming img{
    width: 45px;
    height: 45px;
}
.incoming .details{
    margin-left: 10px;
    margin-right: auto;
    max-width: calc(100% - 130px);
}
.incoming .details .ri p{
    margin: 2px;
    background-color: #ccc;
    color: #333;
    font-size: 12px;
}
.outgoing .details .ro p{
    margin: 2px;
    background-color: #f3f3f3;
    color: #333;
    font-size: 12px;
}
.chat-area .typing-area{
    padding: 18px 30px;
    display: flex;
    justify-content: space-between;
}
.typing-area input{
    height: 45px;
    width: calc(100% - 58px);
    font-size: 17px;
    border:1px solid #ccc;
    padding: 0 13px;
    border-radius: 5px;
    outline: none;
}
.typing-area button{
    width: 2px;
    height: 533px;
    border: none;
    outline: none;
    background: #333;
    color: #fff;
    font-size: 15px;
    cursor: pointer;
    margin: 14px;
    
}
.typing-area .profileDisplay{
    width: 10px;
}

#profileDisplay{
    margin: 0px;
    padding: 0px;
    margin-top: -13px;
    margin-left: 25px; 

}
button{
    border-radius: 10px;
    margin: 10px;
    margin-right: 30px;
    margin-bottom: 50px;
    margin-left: 0px;
    min-width: 100px;
    max-width: 100px;
    min-height: 50px;
    max-height: 50px;
    width: 100px;
    height: 50px; 
    margin: 0;
    padding: 0;
}
.incoming .details img{
min-height: 200px;
max-height: 200px;
min-width: 200px;
max-width: 200px;
width: 200px;
height: 200px;
border-radius: 0;
}
.outgoing .details img{
min-height: 200px;
max-height: 200px;
min-width: 200px;
max-width: 200px;
width: 200px;
height: 200px;
border-radius: 0;
}
#img-div{
    margin: 15px auto;
    border: 1px solid #f7f7f7;
}
.font{
    font-size: 18px;
    font-family: Georgia, 'Times New Roman', Times, serif;
}
.ro{
    border: 1px solid #468669;
    border-radius: 5px 5px;
}
.ri{
    border: 1px solid #333;
    border-radius: 5px 5px;
}
#profileDisplay{
    margin-left: 10px;
}

</style>
<body>
    <div class="wrapper" style="width: 1200px;max-height:700px;overflow-y:auto;">
        <section class="chat-area">
            <header>
                <?php  
                    include_once "php/config.php";
                    error_reporting(0);
                    ini_set('display_errors',0);
                    $user_id = mysqli_real_escape_string($conn , $_GET['user_id']);
                    $sql = mysqli_query($conn , "SELECT * FROM users WHERE unique_id = {$user_id}");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                    $_SESSION['img'] = $row['img']  
                ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/images/<?php echo $row['img'];?>" alt="" />
                <div class="details">
                    <span><?php echo $row['fname']." ".$row['lname'];?></span>
                    <p><?php echo $row['status']; ?></p>
                </div>
            </header>
            <div class="chat-box">
            </div>
                <form id="uploadImage" action="#" class="typing-area" autocomplete="off">
                    <img src="imj.jpg" onclick="triggerClick()" id="profileDisplay">
                    <input type="file" name="profileImage" id="profileImage"  style="display: none;" class="input-field">
                    <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id'];?>" hidden>
                    <input type="text" name="incoming_id" value="<?php echo $user_id;?>" hidden>
                    <button>
                    <div class="font">
                    Action
                    </div>
                    </button>
                </form>
        </section>
    </div>
    <script src="javascripts/chat.js"></script>
    <script>
    function triggerClick(){
    document.querySelector('#profileImage').click();
}

function displayImage(e){
    if (e.files[0]) {
        var reader= new FileReader();

        reader.onload = function(e) {
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
    </script>
</body>
</html>