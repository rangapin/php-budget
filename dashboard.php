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
      <title>Dashboard</title>
      <link href="css/style.css" rel="stylesheet">
   </head>

   <body>

      <?php include_once('includes/header.php');?>
      <?php include_once('includes/sidebar.php');?>

      <div class="container">
         <div class="charts">
            <div class="col-xs-6 col-md-3">
               <div class="panel panel-default">
                  <div class="panel-body easypiechart-panel">
                     <?php
                        $userid=$_SESSION['personaluid'];
                        $today_date=date('Y-m-d');
                        $query=mysqli_query($con,"SELECT sum(cost) AS todayExpense FROM expense WHERE (theDate)='$today_date' && (UserId='$userid');");
                        $result=mysqli_fetch_array($query);
                        $sum_today_expense=$result['todayExpense'];
                         ?> 
                     <h4>Today</h4>
                     <div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $sum_today_expense;?>" ><span class="percent"><?php if($sum_today_expense=="")
                     {echo "0";} else {echo $sum_today_expense;}
                        
                        	?></span></div>
                  </div>
               </div>
            </div>
            <div class="col-xs-6 col-md-3">
               <div class="panel panel-default">
                  <?php
                     $userid=$_SESSION['personaluid'];
                     $yesterday_date=date('Y-m-d',strtotime("-1 days"));
                     $query_one=mysqli_query($con,"SELECT sum(cost) AS yesterdayExpense FROM expense WHERE (theDate)='$yesterday_date' && (UserId='$userid');");
                     $result_one=mysqli_fetch_array($query_one);
                     $sum_yesterday_expense=$result_one['yesterdayExpense'];
                      ?> 
                  <div class="panel-body easypiechart-panel">
                     <h4>Yesterday</h4>
                     <div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $sum_yesterday_expense;?>" ><span class="percent"><?php if($sum_yesterday_expense=="")
                     {echo "0";} else {echo $sum_today_expense;}

                        
                        	?></span></div>
                  </div>
               </div>
            </div>
            <div class="col-xs-6 col-md-3">
               <div class="panel panel-default">
                  <?php
                     
                     $userid=$_SESSION['personaluid'];
                     $week_date=  date("Y-m-d", strtotime("-1 week")); 
                     $current_date=date("Y-m-d");
                     $query_two=mysqli_query($con,"SELECT sum(cost) AS weelyExpense FROM expense WHERE ((theDate) BETWEEN '$week_date' AND '$current_date') && (UserId='$userid');");
                     $result_two=mysqli_fetch_array($query_two);
                     $sum_weekly_expense=$result_two['weelyExpense'];
                      ?>
                  <div class="panel-body easypiechart-panel">
                     <h4>Last 7 days</h4>
                     <div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $sum_weekly_expense;?>"><span class="percent"><?php if($sum_weekly_expense=="")
                     {echo "0";} else {echo $sum_today_expense;}

                        
                        	?></span></div>
                  </div>
               </div>
            </div>
            <div class="col-xs-6 col-md-3">
               <div class="panel panel-default">
                  <?php
                     
                     $userid=$_SESSION['personaluid'];
                     $month_date=  date("Y-m-d", strtotime("-1 month")); 
                     $current_date=date("Y-m-d");
                     $query_three=mysqli_query($con,"SELECT sum(cost) AS monthlyExpense FROM expense WHERE ((theDate) BETWEEN '$month_date' AND '$current_date') && (UserId='$userid');");
                     $result_three=mysqli_fetch_array($query3);
                     $sum_monthly_expense=$result_three['monthlyExpense'];
                      ?>
                  <div class="panel-body easypiechart-panel">
                     <h4>Last 30 days</h4>
                     <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_monthly_expense;?>" ><span class="percent"><?php if($sum_monthly_expense=="")
                     {echo "0";} else {echo $sum_today_expense;}

                        
                        	?></span></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xs-6 col-md-3">
               <div class="panel panel-default">
                  <?php
                     $userid=$_SESSION['personaluid'];
                     $current_year= date("Y");
                     $query_four=mysqli_query($con,"SELECT sum(cost) AS yearlyExpense FROM expense WHERE (year(theDate)='$current_year') && (UserId='$userid');");
                     $result_four=mysqli_fetch_array($query_four);
                     $sum_yearly_expense=$result_four['yearlyExpense'];
                      ?>
                  <div class="panel-body easypiechart-panel">
                     <h4>This Year</h4>
                     <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_yearly_expense;?>" ><span class="percent"><?php if($sum_yearly_expense=="")
                     {echo "0";} else {echo $sum_today_expense;}

                        
                        	?></span></div>
                  </div>
               </div>
            </div>
            <div class="col-xs-6 col-md-3">
               <div class="panel panel-default">
                  <?php
                     $userid=$_SESSION['personaluid'];
                     $query_five=mysqli_query($con,"SELECT sum(cost) AS totalExpense FROM expense WHERE UserId='$userid';");
                     $result_five=mysqli_fetch_array($query_five);
                     $sum_total_expense=$result_five['totalExpense'];
                      ?>
                  <div class="panel-body easypiechart-panel">
                     <h4>Total</h4>
                     <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_total_expense;?>" ><span class="percent"><?php if($sum_total_expense=="")
                     {echo "0";} else {echo $sum_today_expense;}

                        	?></span></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include_once('includes/footer.php');?>
      <script src="js/jquery-1.11.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/chart.min.js"></script>
      <script src="js/chart-data.js"></script>
      <script src="js/easypiechart.js"></script>
      <script src="js/easypiechart-data.js"></script>
      <script src="js/bootstrap-datepicker.js"></script>
      <script src="js/custom.js"></script>
      <script>
         window.onload = function () {
         var chart1 = document.getElementById("easypiechart").getContext("2d");
         window.myLine = new Chart(chart1).Line(lineChartData, {
         responsive: true,
         scaleLineColor: "rgba(0,0,0,.2)",
         scaleGridLineColor: "rgba(0,0,0,.05)",
         scaleFontColor: "#c5c7cc"
         });
         };
      </script>
   </body>
</html>
<?php } ?>
