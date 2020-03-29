<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Create an account</title>
   </head>
   <body>
      <div class="container">
         <h1>Personal Finance</h1>
         <div class="login">
            <div class="heading">Sign Up</div>
            <div class="body">
               <form role="form" action="" method="post" id="" name="signup" onsubmit="return checkpassword();">
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
                        <button type="submit" value="submit" name="submit" class="btn btn-primary">Register</button><span>
                        <a href="index.php" class="btn btn-primary">Login</a></span>
                     </div>
                  </fieldset>
               </form>
            </div>
         </div>
      </div>
      </div>	
   </body>
</html>