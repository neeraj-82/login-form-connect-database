<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="design.css">
</head>
<body>



<?php


include 'signupdb.php';

if(isset($_POST['submit']))
{
   
    $email=$_POST['email'];
   
  

    
   
   $emailquery="select * from music_lover where email='$email'";
   $query=mysqli_query($connection,$emailquery);
   $email_count=mysqli_num_rows($query);

   if($email_count)
   {
       $userdata=mysqli_fetch_array($query);
       $username=$userdata['username'];
       $id=$userdata['id'];

      
        $subject="reset password";
        $body="hi, $username .Click here to reset your password http://localhost/sassfile/song%20website/reset_password.php?id=$id";
        $headers="From: neerajgusain317@gmail.com";
        
    
            if(mail($email,$subject,$body,$headers)){
            //    echo "check your mail";
            
            }
            else{
                echo "email sending failed";
            }
   }
   else{
        ?>
        <script>
            document.querySelector(".warn-mail").innerHTML=" e-mail not found";
            </script>
            <?php
       }
   
}

?>

   
    <section class="signup_section">
        <div class="container">
            <form onsubmit="return validation()" method="POST">
                    <header>
                        <h1>Recovery E-mail</h1>
                    </header>
                    <main>
                    
                       
                        <div class="email">
                            
                            <input type="text" placeholder="e-mail......" name="email" class="mail">
                            <span class="warn-mail"></span>
                        </div>
                       
                        
                    </main>
                    <footer>
                   
                    <div class="login">
                        <button type="submit" class="sign" name="submit">Send mail</button>
                    </div>
                    <div class="account">
                        <p>Already have an account?</p><a href="loginup.php">Login</a>
                    </div>
                    
                    </footer>
                </form>
            </div>
    </section>
    <script src="singvalidation.js">

    </script>
</body>
</html>