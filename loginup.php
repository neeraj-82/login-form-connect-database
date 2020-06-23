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
        $password=$_POST['password'];

        $emailquery="select * from music_lover where email='$email'";
        $query=mysqli_query($connection,$emailquery);
        $emailcount=mysqli_num_rows($query);

        if($emailcount)
        {
            $emailpass=mysqli_fetch_array($query);
            $pass=$emailpass['password'];

            $password_decode=password_verify($password,$pass);

            if($password_decode)
            {

                if(isset($_POST['rememberme']))
                {
                    setcookie('emailcookie',$email);
                    setcookie('passwordcookie',$password);
                    ?>
                <script>
                    location.replace("interaction.php")
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script>
                        location.replace("interaction.php")
                        </script>
                        <?php
                }
               
            }
            else{
                ?>
                <script>
                   document.querySelector(".warn-pass").innerHTML="wrong password";
                    </script>
                    <?php
            }
        }
        else{
            ?>
            <script>
               document.querySelector(".warn-mail").innerHTML="wrong e-mail";
                </script>
                <?php
        }
    }
?>

    <section class="login_section">
       <div class="login_container">
            <form onsubmit="return validation()" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">
                <header>
                    <h1>Login</h1>
                    
                </header>
                <main>
                    <div class="email">
                            
                        <input type="text" placeholder="e-mail......" name="email" class="mail"value="<?php if(isset($_COOKIE['emailcookie'])){
                            echo $_COOKIE['emailcookie'];
                        }?>">
                        <span class="warn-mail"></span>
                    </div>
                    <div class="password">
                        
                        <input type="password" placeholder="password....." class="pass" name="password"
                        value="<?php
                        if(isset($_COOKIE['passwordcookie'])){
                            echo $_COOKIE['passwordcookie'];
                        }?>">
                       
                        <span class="warn-pass"></span>
                    </div>
                </main>
                <footer>
                    <div class="forget">
                        <div class="check">
                            <input type="checkbox" class="remember" name="rememberme"><label>Remember me</label>
                        </div>
                            <div class="for-pass">
                                <a href="recovery_email.php">Forget password</a>
                            </div>
                        
                    </div>
                    <div class="login">
                        <button type="submit" class="sign" name="submit">Login</button>
                    </div>
                </footer>
            </form>
       </div>
            
        </div>
        </section>
        <script src="loginvalidation.js">
            
        </script>
</body>
</html>