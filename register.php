
<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
{
   $fname=$_POST['name'];
   $phone=$_POST['mobilenumber'];
   $email=$_POST['email'];
   $password=md5($_POST['password']);
   
   $ret=mysqli_query($con, "SELECT Email FROM user WHERE Email='$email' ");
   $result=mysqli_fetch_array($ret);
   if($result>0){
      $message="This email  associated with another account";
   }
   else{
      $query=mysqli_query($con, "INSERT INTO user(FullName, MobileNumber, Email,  PASSWORD) VALUE('$fname', '$phone', '$email', '$password' )");
      if ($query) {
         $message="You have successfully registered";
      }
      else
      {
         $message="Something Went Wrong. Please try again";
      }
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
   </script>
   <body>
      <div class="row">
         <h2>Register</h2>
         <hr />
         <div class="container">
            <div class="panel ">
               <div class="heading">Sign Up</div>
               <div class="body">
                  <form role="form" action="" method="post" id="" name="signup" onsubmit="return checkpass();">

                     <p><?php if($message){echo $message;}?></p>
                     
                     <fieldset>
                        <div class="group">
                           <input class="control" placeholder="Full Name" name="name" type="text" required="true">
                        </div>
                        <div class="group">
                           <input class="control" placeholder="E-mail" name="email" type="email" required="true">
                        </div>
                        <div class="group">
                           <input type="text" class="control" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" maxlength="10" pattern="[0-9]{10}" required="true">
                        </div>
                        <div class="group">
                           <input class="control" placeholder="Password" name="password" type="password" value="" required="true">
                        </div>
                        <div class="group">
                           <input type="password" class="control" id="repeatpassword" name="repeatpassword" placeholder="Repeat Password" required="true">
                        </div>
                        <div class="checkbox">
                           <button type="submit" value="submit" name="submit" class="btn btn-primary">Register</button>

                           <span"><a href="index.php" class="btn btn-primary">Login</a></span>
                        </div>
                     </fieldset>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>

