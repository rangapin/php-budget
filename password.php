<?php
   session_start();
   include('includes/config.php');
   error_reporting(0);
   if (strlen($_SESSION['personaluid']==0)) {
     header('location:logout.php');
     } else{
   if(isset($_POST['submit']))
   {
   $userid=$_SESSION['personaluid'];
   $current_pass=md5($_POST['currentpassword']);
   $new_pass=md5($_POST['new_pass']);
   $query=mysqli_query($con,"SELECT ID FROM user WHERE ID='$userid' AND PASSWORD='$current_pass'");
   $row=mysqli_fetch_array($query);
   if($row>0){
   $return=mysqli_query($con,"UPDATE user SET PASSWORD='$new_pass' WHERE ID='$userid'");
   $message= "Your password successully changed"; 
   } else {
   
   $message="Your current password is wrong";
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

      <?php include_once('includes/header.php');?>
      <?php include_once('includes/sidebar.php');?>

      <div class="container">

         <div class="row">
            <div class="col-lg-12">
               <div class="panel ">
                  <div class="heading">Change Password</div>
                  <div class="body">

                     <p> <?php if($message){echo $message;}?></p>
                     
                     <div class="col-md-12">
                        <?php
                           $userid=$_SESSION['personaluid'];
                           $return=mysqli_query($con,"SELECT * FROM user WHERE ID='$userid'");
                           $content=1;
                           while ($row=mysqli_fetch_array($return)) {
                           
                           ?>
                        <form role="form" method="post" action="" name="changepassword" onsubmit="returnurn checkpass();">
                           <div class="group">
                              <label>Current Password</label>
                              <input type="password" name="currentpassword" class="control" required= "true" value="">
                           </div>
                           <div class="group">
                              <label>New Password</label>
                              <input type="password" name="new_pass" class="control" value="" required="true">
                           </div>
                           <div class="group">
                              <label>Confirm Password</label>
                              <input type="password" name="confirmpassword" class="control" value="" required="true">
                           </div>
                           <div class="group">
                              <button type="submit" class="btn btn-primary" name="submit">Change</button>
                           </div>
                     </div>
                     <?php } ?>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <?php include_once('includes/footer.php');?>
      </div>
      </div>

   </body>
</html>
<?php }  ?>
