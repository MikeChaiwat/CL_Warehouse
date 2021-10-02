<?php
  
    if(session_status()!= PHP_SESSION_ACTIVE){
        session_start();
    } 
    require_once "connect.php";
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM user WHERE username='$user'";
    $query = $db->query($sql);
    if($query->num_rows == 1){
        $row = $query->fetch_assoc();
        $chkUser = $row['username'];
        $chkPass = $row['password'];
        if($user==$chkUser && $pass==$chkPass){
            header('Location:warehouse.php');
            $_SESSION['username'] = $user;
        }else{
            header('Location:warehouse.php');
        }
    }
        
?>