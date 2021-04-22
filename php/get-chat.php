<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        error_reporting(0);
        ini_set('display_errors',0);
        $outgoing_id = mysqli_real_escape_string($conn , $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn , $_POST['incoming_id']);
        $output = "";
        $img = $_SESSION['img'];
        $_SESSION['w1'] = $incoming_id;
        $sql = "SELECT * FROM messages
            LEFT JOIN users ON users.unique_id = messages.incoming_msg_id
            WHERE (outgoing_msg_id ={$outgoing_id} AND incoming_msg_id={$incoming_id})
            OR (outgoing_msg_id ={$incoming_id} AND incoming_msg_id={$outgoing_id}) ORDER BY msg_id";    
        $query = mysqli_query($conn , $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .=
                            '   
                                <div class="outgoing" id="img-div">
                                <div class="details">
                                <div class = "ro">
                                <img src="php/images/'.$row['pic'].'" alt="">
                                <p>'.$row['time'].'</p>
                                
                                </div>
                                </div>
                                </div>
                                ';   
                    }
                    
                else{
                    $output .=
                            '
                                <div class="incoming" id="img-div">
                                <img src="php/images/'. $img.'" alt="">
                                <div class="details">
                                <div class="ri">
                                <img src="php/images/'.$row['pic'].'" alt="">
                                <p>'.$row['time'].'</p>
                                </div>
                                </div>
                                </div>
                                ';
                }
            }
            echo $output;
        }
    }else{
    header("../login.php");
    }

?>
