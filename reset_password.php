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
   
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $password=$_POST['password'];
        $encrypt_password=password_hash($password,PASSWORD_BCRYPT);
        $confirm=$_POST['confirm'];
        $encrypt_confirm=password_hash($password,PASSWORD_BCRYPT);

        $verify=password_verify($confirm,$encrypt_password);

        if($verify)
        {

            $update_query="update music_lover set password='$encrypt_password' where id='$id'";
            $iquery=mysqli_query($connection,$update_query);

            if($iquery)
            {
                ?>
                <script>
                    location.replace("loginup.php");
                    </script>
                    <?php
            }
            else{
                echo "password not update";
            }

        }
   
   

  
   
    }
}

?>

   
    <section class="signup_section">
        <div class="container">
            <form onsubmit="return validation()" method="POST">
                    <header>
                        <h1>Reset password</h1>
                    </header>
                    <main>
                    
                        
                       
                        <div class="password">
                        
                            <input type="password" placeholder="password....." class="pass" name="password"> 
                           
                            <span class="warn-pass"></span>
                        </div>
                        <div class="confirm">
                        
                            <input type="password" placeholder="confirm-password......" class="con-pass" name="confirm">
                            <span class="warn-con"></span>
                        </div>
                    </main>
                    <footer>
                   
                    <div class="login">
                        <button type="submit" class="sign" name="submit">Update password</button>
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