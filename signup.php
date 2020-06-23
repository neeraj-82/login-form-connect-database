<?php
 session_start();
?>


<?php

include 'signupp.html';
include 'signupdb.php';

if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $_SESSION['username']=$username;
    $email=$_POST['email'];
    $password=$_POST['password'];
    $encrypt_password=password_hash($password,PASSWORD_BCRYPT);
    $confirm=$_POST['confirm'];
    $encrypt_confirm=password_hash($password,PASSWORD_BCRYPT);

    $verify=password_verify($confirm,$encrypt_password);

    if(!$verify)
    {
       ?>
       <script>
            document.querySelector(".warn-con").innerHTML="password not match";
       </script>
       <?php
    }
   
   $emailquery="select * from music_lover where email='$email'";
   $query=mysqli_query($connection,$emailquery);
   $email_count=mysqli_num_rows($query);

   if($email_count>0)
   {
       ?>
       <script>
           document.querySelector(".warn-mail").innerHTML=" e-mail already exist!";
           </script>
           <?php
   }
   else{
       $insert_query="insert into music_lover(username,email,password,confirm) values('$username','$email','$encrypt_password','$encrypt_confirm')";
       $iquery=mysqli_query($connection,$insert_query);

       if($iquery)
       {
           ?>
           <script>
               location.replace("loginup.php");
       </script>
       <?php
       }
   }
}

?>

   