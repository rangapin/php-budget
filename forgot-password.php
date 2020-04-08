<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit']))
{
   $contactno=$_POST['contactno'];
   $email=$_POST['email'];
   
   $query=mysqli_query($con,"SELECT ID FROM user WHERE  Email='$email' AND MobileNumber='$contactno' ");
   $return=mysqli_fetch_array($query);
   if($return>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
      header('location:reset-password.php');
   }
   else{
      $message="Invalid Details. Please try again.";
   }
}
?>

<!DOCTYPE html>
<html>

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <title>Personal Finances</title>
   </head>

   <body>
      <div class="row">
         <h2>Forgot Password?</h2>

         <div class="container">
            <div class="panel ">
               <div class="heading">Log in</div>
               <div class="body">

                  <p><?php if($message){echo $message;}?></p>

                  <form role="form" action="" method="post" id="" name="login">
                     <fieldset>
                        <div class="group">
                           <input class="control" placeholder="E-mail" name="email" type="email" autofocus="" required="true">
                        </div>
                        <div class="group">
                           <input class="control" placeholder="Number" name="contactno" type="contactno" value="" required="true">
                        </div>
                        <div class="checkbox">
                           <button type="submit" value="" name="submit" class="btn btn-primary">Reset</button>
                           <span><a href="index.php" class="btn btn-primary">Login</a></span>
                        </div>
                     </fieldset>
                  </form>
               </div>
            </div>
         </div>
      </div>

   </body>
</html>
