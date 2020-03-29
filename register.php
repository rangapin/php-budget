<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="js/script.js" type="text/javascript"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <title>Sign Up</title>
</head>
   <body>
      <div class="rcontainer">
         <div class="login">
            <div class="heading">Create your account</div>
            <div class="body">
               <form role="form" action="" method="post" id="" name="signup" onsubmit="return checkPass();">
                  <fieldset>
                     <div class="login-form">
                        <input class="input-form" placeholder="Full Name" name="name" type="text" required="true">
                     </div>
                     <div class="login-form">
                        <input class="input-form" placeholder="E-mail" name="email" type="email" required="true">
                     </div>
                     <div class="login-form">
                        <input type="text" class="input-form" id="number" name="number" placeholder="Number" maxlength="12" required="true">
                     </div>
                     <div class="login-form">
                        <input class="input-form" placeholder="Password" name="password" type="password" value="" required="true">
                     </div>
                     <div class="login-form">
                        <input type="password" class="input-form" id="repeat" name="repeat" placeholder="Repeat Password" required="true">
                     </div>
                     <div class="checkbox">
                        <button type="submit" value="submit" name="submit" class="btn btn-primary">Register</button>
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