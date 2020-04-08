<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['personaluid']==0)) {
   header('location:logout.php');
} else{
   if(isset($_POST['submit']))
   {
      $userid=$_SESSION['personaluid'];
      $fullname=$_POST['fullname'];
      $phone=$_POST['contactnumber'];
      
      $query=mysqli_query($con, "UPDATE user SET FullName ='$fullname', MobileNumber='$phone' WHERE ID='$userid'");
      if ($query) {
         $message="User profile has been updated.";
      }
      else
      {
         $message="Something Went Wrong. Please try again.";
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
                  <div class="heading">Your profile</div>
                  <div class="body">

                     <p"> <?php if($message){echo $message;}?></p>

                     <div class="col-md-12">

                        <?php
                           $userid=$_SESSION['personaluid'];
                           $return=mysqli_query($con,"SELECT * FROM user WHERE ID='$userid'");
                           $content=1;
                           while ($row=mysqli_fetch_array($return)) {
                           ?>

                        <form role="form" method="post" action="">
                           <div class="group">
                              <label>Name:</label>
                              <input class="control" type="text" value="<?php  echo $row['FullName'];?>" name="fullname" required="true">
                           </div>
                           <div class="group">
                              <label>Email:</label>
                              <input type="email" class="control" name="email" value="<?php  echo $row['Email'];?>" required="true" readonly="true">
                           </div>
                           <div class="group">
                              <label>Number:</label>
                              <input class="control" type="text" value="<?php  echo $row['MobileNumber'];?>" required="true" name="contactnumber" maxlength="12">
                           </div>
                           <div class="group">
                              <label>Date:</label>
                              <input class="control" name="regdate" type="text" value="<?php  echo $row['RegDate'];?>" readonly="true">
                           </div>
                           <div class="group">
                              <button type="submit" class="btn btn-primary" name="submit">Update</button>
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
