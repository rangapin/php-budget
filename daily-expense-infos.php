<?php
   session_start();
   error_reporting(0);
   include('includes/config.php');
   if (strlen($_SESSION['personaluid']==0)) {
     header('location:logout.php');
     } else{
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

   </head>

   <body>

      <?php include_once('includes/header.php');?>
      <?php include_once('includes/sidebar.php');?>

      <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
         <div class="row">
            <div class="col-lg-12">
               <div class="default">
               <div class="heading">Your daily expenses</div>
                  <div class="body">
                     <div class="col-md-12">
                        <?php
                           $fromDate=$_POST['fromdate'];
                           $endDate=$_POST['todate'];
                           $type=$_POST['requesttype'];
                           ?>
                        <hr />
                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                           <thead>
                              <tr>
                              <tr>
                                 <th>ID</th>
                                 <th>Date</th>
                                 <th>Amount</th>
                              </tr>
                              </tr>
                           </thead>
                           <?php
                              $userid=$_SESSION['personaluid'];
                              $return=mysqli_query($con,"SELECT purchaseDate,SUM(cost) AS totaldaily FROM `expense`  WHERE (purchaseDate BETWEEN '$fromDate' AND '$endDate') && (UserId='$userid') GROUP BY purchaseDate");
                              $content=1;
                              while ($row=mysqli_fetch_array($return)) {
                              ?>
                           <tr>
                              <td><?php echo $content;?></td>
                              <td><?php echo $row['purchaseDate'];?></td>
                              <td><?php echo $grandTotal=$row['totaldaily'];?></td>
                           </tr>
                           <?php
                              $totalExpenses+=$grandTotal; 
                              $content=$content+1;
                              }?>
                           <tr>
                              <th colspan="2" style="text-align:center">Total</th>
                              <td><?php echo $totalExpenses . €;?></td>
                           </tr>
                        </table>
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
      <script src="sw.js"></script>

   </body>
</html>
<?php } ?>
