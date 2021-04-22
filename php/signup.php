<?php
    session_start();
    include_once 'config.php';
    $fname = mysqli_real_escape_string($conn , $_POST['fname']);
    $lname = mysqli_real_escape_string($conn , $_POST['lname']);
    $email = mysqli_real_escape_string($conn , $_POST['email']);
    $password = mysqli_real_escape_string($conn , $_POST['password']);
    
    error_reporting(0);
    ini_set('display_errors',0);
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
            $wer = mysqli_query($conn , "SELECT * FROM users WHERE fname ='$fname'");
            if(!mysqli_num_rows($wer) > 0){
            if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name']; 
                    $tmp_name = $_FILES['image']['tmp_name']; 
                    $img_explode = explode('.' , $img_name);
                    $img_ext = end($img_explode);
                    $extensions = ['png','jpeg','jpg'];
                    if(in_array($img_ext , $extensions) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name, "images/".$new_img_name)){
                            $random_id = rand(time(),10000000);
                            $sql2 = mysqli_query($conn ,"INSERT INTO users (unique_id, fname, lname, email, password, img) VALUES ('$random_id','$fname','$lname','$email','$password','$new_img_name')");
                            if($sql2){
                                $sql3 = mysqli_query($conn,"SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success";
                                }
                            }else{
                                echo "Something went wrong!";
                            }
                        }else{
                            echo "hello iam not sure about it";
                        }
                        
                    }else{  
                        echo "Please select an Image file - jpeg , jpg ,png...";
                    }
                }else{
                    echo "Please select an Image file!";
                }
            }else{
                echo "change your firstname";
            }
    }else{
        echo "ALL input field are required!!";
    }
?>
