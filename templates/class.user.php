<?php
class USER
{
    private $db;
 
    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }
 
    public function register($uname,$uemail,$upass)
    {
       try
       {
           $new_password = password_hash($upass, PASSWORD_DEFAULT);
   
           $stmt = $this->db->prepare("INSERT INTO users(name,email,password) 
                                                       VALUES(:uname,:uemail,:upass)");
              
           $stmt->bindparam(":uname", $uname);
		   $stmt->bindparam(":uemail", $uemail); 
           $stmt->bindparam(":upass", $new_password);            
           $stmt->execute(); 
   
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
 
    public function login($uname,$upass)
    {
       try
       {
		  $stmt = $this->db->prepare("SELECT * FROM users WHERE name=:uname");
          $stmt->execute(array(':uname'=>$uname));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
			 if(password_verify($upass, $userRow['password']))
             {
				$_SESSION['user_session'] = $userRow['id'];
				return true;
             }
             else
             {
				return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   public function getRole()
   {
	   return $_SESSION['user_session'];
   }
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
}
?>