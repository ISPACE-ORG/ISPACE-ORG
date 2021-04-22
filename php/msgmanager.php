<?php 
session_start();
include ("php/config.php");
$unti = $_SESSION['g'];
$sql = (mysqli_query($conn , "SELECT `outgoing_msg_id`, `incoming_msg_id`, `pic`, `msg_id` FROM `messages` WHERE incoming_msg_id ='{$unti}'"));



?>