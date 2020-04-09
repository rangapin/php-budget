<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['personaluid']== 0)) {
   header('location:logout.php');
} else{
   
   if(isset($_POST['submit']))
   {
      $userid=$_SESSION['personaluid'];
      $date_expense=$_POST['date_expense'];
      $item=$_POST['item'];
      $item_price=$_POST['item_price'];
      $query=mysqli_query($con,"INSERT INTO expense (userId,purchaseDate,item,cost) VALUE ('$userid','$date_expense','$item','$item_price')");
      
      if($query){
         echo "<script>alert('Expense has been added');</script>";

         echo "<script>window.location.href='dashboard.php'</script>";
      } else {
      }
   }
?>

<!DOCTYPE html>
<html>

   <head>
      <meta charset="UTF-8"Expense Report>
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
                  <div classdate="heading">Expense</div>
                  <div class="body">

                     <p><?php if($message){echo $message;}?></p>

                     <div class="col-md-12">
                        <form role="form" method="post" action="">
                           <div class="group">
                              <label>Date</label>
                              <input class="form-control" type="date" value="" name="date_expense" required="true">
                           </div>
                           <div class="group">
                              <label>Item</label>
                              <input type="text" class="form-control" name="item" value="" required="true">
                           </div>
                           <div class="group">
                              <label>Cost</label>
                              <input class="form-control" type="text" value="" required="true" name="item_price">
                           </div>
                           <div class="group">
                              <button type="submit" class="btn btn-primary" name="submit">Add</button>
                           </div>
                     </div>
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
