<?php
include_once('dbconfig.php');
if($user->is_loggedin()!="")
{
 $user->redirect('../index.php');
}

if(isset($_POST['btn-login']))
{
 $uname = $_POST['name'];
 $upass = $_POST['pass'];
  
 if($user->login($uname,$upass))
 {
  $user->redirect('../index.php');
 }
 else
 {
  $error = "Wrong Details !";
 } 
}
include('login.html');
?>
