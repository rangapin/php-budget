<?php 
   session_start();
   error_reporting(0);
   include('includes/config.php');
   if(isset($_POST['submit']))
     {
       $fname=$_POST['name'];
       $mobno=$_POST['mobilenumber'];
       $email=$_POST['email'];
       $password=md5($_POST['password']);
   
       $return=mysqli_query($con, "SELECT Email FROM user WHERE Email='$email' ");
       $result=mysqli_fetch_array($return);
       if($result>0){
   $message="This email associated with another account";
       }
       else{
       $query=mysqli_query($con, "INSERT INTO user (name, number, email, password) VALUE('$fname', '$mobno', '$email', '$password' )");
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
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="theme-color" content="#1E90FF">

      <title>Personal Finance</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/datepicker3.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
      <link rel="manifest" href="manifest.webmanifest">
      <script type="text/javascript">
         function checkpass()
         {
         if(document.signup.password.value!=document.signup.repeatpassword.value)
         {
         alert('Password and Repeat Password field does not match');
         document.signup.repeatpassword.focus();
         return false;
         }
         return true;
         } 
	  </script>
	  
   <body class="index">
      <div class="row">
         <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel default">
               <div class="heading" style="color: white">Sign Up</div>
               <div class="body">

                  <form role="form" action="" method="post" id="" name="signup" onsubmit="return checkpass();">
					 <p<?php if($message){echo $message;}?></p>
					 
                     <fieldset>
                        <div class="form-group">
                           <input class="form-control" placeholder="Full Name" name="name" type="text" required="true">
                        </div>
                        <div class="form-group">
                           <input class="form-control" placeholder="E-mail" name="email" type="email" required="true">
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" maxlength="10" pattern="[0-9]{10}" required="true">
                        </div>
                        <div class="form-group">
                           <input class="form-control" placeholder="Password" name="password" type="password" value="" required="true">
                        </div>
                        <div class="form-group">
                           <input type="password" class="form-control" id="repeatpassword" name="repeatpassword" placeholder="Repeat Password" required="true">
                        </div>
                        <div class="checkbox">
						   <button type="submit" value="submit" name="submit" class="btn btn-primary">Register</button><span style="padding-left:250px">
						   
                           <a href="index.php" class="btn btn-primary">Login</a></span>
                        </div>
                     </fieldset>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <script src="js/jquery-1.11.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="sw.js"></script>

   </body>
</html>
