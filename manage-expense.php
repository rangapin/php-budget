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
   $query=mysqli_query($con,"DELETE FROM personaluid WHERE ID='$rowid'");
   if($query){
   echo "<script>alert('Record successfully deleted');</script>";
   echo "<script>window.location.href='manage-expense.php'</script>";
   } else {
   echo "<script>alert('Something went wrong. Please try again');</script>";
   
   }
   
   }
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <title>Manage your expense</title>
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
                  <div class="heading">Monthly Report</div>
                  <div class="body">
                     <div class="col-md-12">
                        <?php
                           $start_date=$_POST['fromdate'];
                           $end_date=$_POST['todate'];
                           $type=$_POST['requesttype'];
                           ?>
                        <h5>Monthly Report from <?php echo $start_date?> to <?php echo $end_date?></h5>
                        <hr />
                        <table id="datatable" class="table">
                           <thead>
                              <tr>
                              <tr>
                                 <th>Item Number</th>
                                 <th>Month-Year</th>
                                 <th>Expense Amount</th>
                              </tr>
                              </tr>
                           </thead>
                           <?php
                              $userId=$_SESSION['personaluid'];
                              $return=mysqli_query($con,"SELECT month(date) as month_report,year(date) as year_report,SUM(cost) as totalmonth FROM expense  WHERE (date BETWEEN '$start_date' and '$end_date') && (userId='$userId') GROUP BY month(date),year(date)");
                              $content=1;
                              while ($row=mysqli_fetch_array($return)) {
                              
                              ?>
                           <tr>
                              <td><?php echo $content;?></td>
                              <td><?php echo $row['month_report']."-".$row['year_report'];?></td>
                              <td><?php echo $totalsl=$row['totalmonth'];?></td>
                           </tr>
                           <?php
                              $totalsexp+=$totalsl; 
                              $content=$content+1;
                              }?>
                           <tr>
                              <th colspan="2">Total</th>
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
<?php } ?>
</body>
</html>
