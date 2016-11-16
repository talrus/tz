<?php
require_once('dbconfig.php');
if($user->is_loggedin()!="")
{
    $user->redirect('../index.php');
}

if(isset($_POST['btn-regme']))
{
   $uname = trim($_POST['txt-name']);
   $umail = trim($_POST['txt-email']);
   $upass = trim($_POST['txt-pass']); 
 
   if($uname=="") {
      $error[] = "provide username !"; 
   }
   else if($umail=="") {
      $error[] = "provide email id !"; 
   }
   else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address !';
   }
   else if($upass=="") {
      $error[] = "provide password !";
   }
   else if(strlen($upass) < 6){
      $error[] = "Password must be atleast 6 characters"; 
   }
   else
   {
      try
      {
         $stmt = $DB_con->prepare("SELECT name,email FROM users WHERE name=:uname OR email=:umail");
         $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
         if($row['name']==$uname) {
            $error[] = "sorry username already taken !";
         }
         else if($row['email']==$umail) {
            $error[] = "sorry email id already taken !";
         }
         else
         {
            if($user->register($uname,$umail,$upass)) 
            {
                $user->redirect('../index.php');
            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  } 
}
include('register.html');
?>
