<?php
   include("include/connection.php");
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select f_name,nic from employee where user_name = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['f_name'];
   $nic = $row['nic'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>