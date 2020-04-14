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
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <script src="css/bootstrap.css"></script>
      <link href="css/datepicker3.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
      <link rel="manifest" href="webwebmanifest.json">
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
   </head>

   <body>

      <?php include_once('includes/header.php');?>
      <?php include_once('includes/sidebar.php');?>

      <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
         <div class="charts">
            <div class="col-xs-6 col-md-3">
               <div class="default">
                  <div class="body easypiechart-panel">

                     <?php
                        $user_id=$_SESSION['personaluid'];
                        $today_date=date('Y-m-d');
                        $query=mysqli_query($con,"SELECT sum(cost) AS todaysexpense FROM expense WHERE (purchaseDate)='$today_date' && (UserId='$user_id');");
                        $result=mysqli_fetch_array($query);
                        $today_expense=$result['todaysexpense'];
                         ?> 

                     <h4>Today</h4>
                     <div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $today_expense;?>"><span class="percent">

                        <?php if($today_expense==""){echo "0";} else {echo $today_expense . €;}?></span></div>
                  </div>
               </div>
            </div>

            <div class="col-xs-6 col-md-3">
               <div class="default">

                  <?php
                     $user_id=$_SESSION['personaluid'];
                     $yesterday_date=date('Y-m-d',strtotime("-1 days"));
                     $query_one=mysqli_query($con,"SELECT sum(cost) AS yesterdayexpense FROM expense WHERE (purchaseDate)='$yesterday_date' && (UserId='$user_id');");
                     $result_one=mysqli_fetch_array($query_one);
                     $yesterday_expense=$result_one['yesterdayexpense'];
                      ?> 

                  <div class="body easypiechart-panel">
                     <h4>Yesterday</h4>
                     <div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $yesterday_expense;?>"><span class="percent">
                        <?php if($yesterday_expense==""){echo "0";} else {echo $yesterday_expense . €;}?></span></div>
                  </div>
               </div>
            </div>

            <div class="col-xs-6 col-md-3">
               <div class="default">

                  <?php
                     $user_id=$_SESSION['personaluid'];
                     $week_date=  date("Y-m-d", strtotime("-1 week")); 
                     $current_date=date("Y-m-d");
                     $qquery_two=mysqli_query($con,"SELECT sum(cost) AS weeklyexpense FROM expense WHERE ((purchaseDate) BETWEEN '$week_date' AND '$current_date') && (UserId='$user_id');");
                     $result_two=mysqli_fetch_array($qquery_two);
                     $weekly_expense=$result_two['weeklyexpense'];
                      ?>

                  <div class="body easypiechart-panel">
                     <h4>Last 7 days</h4>
                     <div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $weekly_expense;?>"><span class="percent">
                        <?php if($weekly_expense==""){echo "0";} else {echo $weekly_expense . €;}?></span></div>
                  </div>
               </div>
            </div>

            <div class="col-xs-6 col-md-3">
               <div class="default">

                  <?php
                     $user_id=$_SESSION['personaluid'];
                     $month_date=  date("Y-m-d", strtotime("-1 month")); 
                     $current_date=date("Y-m-d");
                     $query_three=mysqli_query($con,"SELECT sum(cost) AS monthlyexpense FROM expense WHERE ((purchaseDate) BETWEEN '$month_date' AND '$current_date') && (UserId='$user_id');");
                     $result_three=mysqli_fetch_array($query_three);
                     $monthly_expense=$result_three['monthlyexpense'];
                      ?>

                  <div class="body easypiechart-panel">
                     <h4>Last 30 days</h4>
                     <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $monthly_expense;?>"><span class="percent">
                        <?php if($monthly_expense==""){echo "0";} else {echo $monthly_expense . €;}?></span></div>
                  </div>
               </div>
            </div>
         </div>

         <div class="charts">
            <div class="col-xs-6 col-md-3">
               <div class="default">

                  <?php
                     $user_id=$_SESSION['personaluid'];
                     $year_date= date("Y");
                     $query_four=mysqli_query($con,"SELECT sum(cost) AS yearlyexpense FROM expense WHERE (year(purchaseDate)='$year_date') && (UserId='$user_id');");
                     $result_four=mysqli_fetch_array($query_four);
                     $yearly_expense=$result_four['yearlyexpense'];
                      ?>

                  <div class="body easypiechart-panel">
                     <h4>This Year</h4>
                     <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $yearly_expense;?>"><span class="percent">
                        <?php if($yearly_expense==""){echo "0";} else {echo $yearly_expense . €;}?></span></div>
                  </div>
               </div>
            </div>

            <div class="col-xs-6 col-md-3">
               <div class="default">

                  <?php
                     $user_id=$_SESSION['personaluid'];
                     $query_five=mysqli_query($con,"SELECT sum(cost) AS totalexpense FROM expense WHERE UserId='$user_id';");
                     $result_five=mysqli_fetch_array($query_five);
                     $total_expense=$result_five['totalexpense'];
                      ?>

                  <div class="body easypiechart-panel">
                     <h4>Total</h4>
                     <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $total_expense;?>"><span class="percent">
                        <?php if($total_expense==""){echo "0";} else {echo $total_expense . €;}?></span></div>
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
         var chart1 = document.getElementById("line-chart").getContext("2d");
         window.myLine = new Chart(chart1).Line(lineChartData, {
         responsive: true,
         scaleLineColor: "black",
         scaleGridLineColor: "black",
         scaleFontColor: "grey"
         });
         };
      </script>
   </body>
</html>
<?php } ?>