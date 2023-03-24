<?php
session_start();

include 'connection.php';

if(isset($_GET['token'])){
    $token = $_GET['token'];

    $updatequery = "Update Registration Set Status = 'active' where token='$token'";

    $query = oci_parse($conn, $updatequery);

    if($query){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] = "Account activated successfully";
            header ('location:login.php');
        }
        else{
            $_SESSION['msg'] = "Please try again.";
            header ('location:login.php');
        }
    
    }else{
        $_SESSION['msg'] = "Account not updated";
        header('location:register.php');
    }
}

?>