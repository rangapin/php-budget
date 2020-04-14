<?php  
   session_start();
   error_reporting(0);
   include('includes/config.php');
   if (strlen($_SESSION['personaluid']==0)) {
     header('location:logout.php');
     } else{
   
   if(isset($_GET['delid']))
   {
   $rowid=intval($_GET['delid']);
   $query=mysqli_query($con,"DELETE FROM expense WHERE ID='$rowid'");
   if($query){
   echo "<script>alert('Record successfully deleted');</script>";
   
   echo "<script>window.location.href='manage-expense.php'</script>";
   } else {
   echo "<script>alert('Something went wrong. Please try again');</script>";
   }
   } 
?>

<!DOCTYPE html>
<html>

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Personal Finance</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/datepicker3.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
   </head>

   <body>
      <?php include_once('includes/header.php');?>
	  <?php include_once('includes/sidebar.php');?>
	  
      <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
         <div class="row">
            <div class="col-lg-12">
               <div class="default">
                  <div class="heading">Manage your Expense</div>
                  <div class="body">

					 <p<?php if($message){echo $message;}?></p>
					 
                     <div class="col-md-12">
                        <div class="table-responsive">
                           <table class="table table-bordered mg-b-0">
                              <thead>
                                 <tr>
                                    <th>ID</th>
                                    <th>Item</th>
                                    <th>Cost</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <?php
                                 $userid=$_SESSION['personaluid'];
                                 $return=mysqli_query($con,"SELECT * FROM expense WHERE UserId='$userid'");
                                 $cnt=1;
                                 while ($row=mysqli_fetch_array($return)) {
                                 
                                 ?>
                              <tbody>
                                 <tr>
                                    <td><?php echo $cnt;?></td>
                                    <td><?php echo $row['item'];?></td>
                                    <td><?php echo $row['cost'] . €;;?></td>
                                    <td><?php echo $row['purchaseDate'];?></td>
                                    <td><a href="manage-expense.php?delid=<?php echo $row['ID'];?>">Delete</a>
                                 </tr>
                                 <?php 
                                    $cnt=$cnt+1;
                                    }?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php include_once('includes/footer.php');?>
         </div>
      </div>
      <script src="js/jquery-1.11.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/chart.min.js"></script>
      <script src="js/chart-data.js"></script>
      <script src="js/easypiechart.js"></script>
      <script src="js/easypiechart-data.js"></script>
      <script src="js/bootstrap-datepicker.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>
<?php }  ?>
