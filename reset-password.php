<?php
session_start();
error_reporting(0);
include('includes/config.php');
error_reporting(0);

if(isset($_POST['submit']))
{
   $contactno=$_SESSION['contactno'];
   $email=$_SESSION['email'];
   $password=md5($_POST['newpassword']);
   
   $query=mysqli_query($con,"UPDATE user SET PASSWORD='$password' WHERE  Email='$email' && MobileNumber='$contactno' ");
   if($query)
   {
      echo "<script>alert('Password successfully changed');</script>";
      session_destroy();
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
         <h2>Password</h2>
         <hr />
         <div class="container">
            <div class="panel ">
               <div class="heading">Rest Password</div>
               <div class="body">

                  <p><?php if($message){echo $message;}?></p>

                  <form role="form" action="" method="post" name="changepassword" onsubmit="return checkpass()">
                     <fieldset>
                        <div class="group">
                           <input class="control" placeholder="Password" name="newpassword" type="password" value="" required="true">
                        </div>
                        <div class="group">
                           <input class="control" placeholder="Confirm Password" name="confirmpassword" type="password" value="" required="true">
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
      <script src="js/jquery-1.11.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
   </body>
</html>