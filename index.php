   <?php
   session_start();
   error_reporting(0);
   include('includes/config.php');

   if(isset($_POST['login']))
   {
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      $query = mysqli_query($con,"SELECT ID FROM user WHERE email = '$email' && PASSWORD ='$password' ");
      $ret = mysqli_fetch_array($query);
      if($ret > 0){
         $_SESSION['personaluid']=$ret['ID'];
      header('location:dashboard.php');
      }
      else{
      $msg="These details are invalid.";
      }
   }
   ?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <title>Log In</title>
   </head>
   <body>
      <div class="icontainer">
         <h1 class="center">Personal Finance</h1>
         <div class="login">
            <div class="heading">Log into your account</div>
            <div class="body">
               <form role="form" action="" method="post" id="" name="login">
                  <fieldset>
                     <div class="login-form">
                        <input class="input-form" placeholder="E-mail" name="email" type="email" autofocus="" required="true">
                     </div>
                     <div class="login-form">
                        <input class="input-form" placeholder="Password" name="password" type="password" value="" required="true">
                     </div>
                     <div class="checkbox">
                        <button type="submit" value="login" name="login" class="btn btn-primary">Login</button>
                        <span><a href="register.php" class="btn btn-primary">Register</a></span>
                        <br>
                        <br>
                        <a href="password.php">Forgot Password?</a>
                     </div>
                  </fieldset>
               </form>
            </div>
         </div>
      </div>
   </body>
</html>