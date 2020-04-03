<?php
   session_start();
   error_reporting(0);
   include('includes/config.php');
   if (strlen($_SESSION['personaluid']==0)) {
     header('location:logout.php');
     } else{
     ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <title>Daily Report</title>
   </head>
   <body>
      <?php include_once('includes/header.php');?>
      <?php include_once('includes/sidebar.php');?>
      <div class="container">
         <div class="row">
         </div>
         <div class="row">
            <div class="col-lg-12">
               <div class="panel">
                  <div class="heading">Daily Report</div>
                  <div class="body">
                     <div class="col-md-12">
                        <?php
                           $start_date=$_POST['fromdate'];
                            $end_date=$_POST['todate'];
                           $type=$_POST['requesttype'];
                           ?>
                        <h5>Daily Report from <?php echo $start_date?> to <?php echo $end_date?></h5>
                        <hr />
                        <table id="datatable" class="table">
                           <thead>
                              <tr>
                              <tr>
                                 <th>Item Number</th>
                                 <th>Date</th>
                                 <th>Expense Amount</th>
                              </tr>
                              </tr>
                           </thead>
                           <?php
                              $userId=$_SESSION['personaluid'];
                              $return=mysqli_query($con,"SELECT date,SUM(cost) as totaldaily FROM `expense`  WHERE (date BETWEEN '$start_date' and '$end_date') && (userId='$userId') GROUP BY date");
                              $content=1;
                              while ($row=mysqli_fetch_array($return)) {
                              ?>
                           <tr>
                              <td><?php echo $content;?></td>
                              <td><?php echo $row['date'];?></td>
                              <td><?php echo $totalsl=$row['totaldaily'];?></td>
                           </tr>
                           <th>Total</th>
                           <td><?php echo $totalsexp;?></td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <?php include_once('includes/footer.php');?>
         </div>
      </div>
   </body>
</html>
