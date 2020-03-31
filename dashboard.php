<?php
   session_start();
   error_reporting(0);
   include('includes/config.php');
   if (strlen($_SESSION['personaluid'] == 0)) {
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
      <title>Dashboard</title>
   </head>
   <body>
      <div class="container">
         <div class="row">
            <em class="favicon"></em>
         </div>
         <div class="row">
            <div class="column">
               <h1 class="header">Dashboard</h1>
            </div>
         </div>
         <div class="row">
            <div class="column">
               <div class="panel">
                  <div class="chart">
                     <?php
                        $userId = $_SESSION['personaluid'];
                        $adate = date('Y-m-d');
                        $query = mysqli_query($con,"SELECT sum(cost) AS todaysexpense FROM expense WHERE (date)='$adate' && (userId='$userId');");
                        $result = mysqli_fetch_array($query);
                        $sum_today_expense = $result['todaysexpense'];
                        ?> 
                     <h4>Today's</h4>
                     <div class="easypiechart" id="blue">
                        <span class="percent">
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="column">
               <div class="panel">
                  <div class="chart">
                     <?php
                        $userId = $_SESSION['personaluid'];
                        $bdate = date('Y-m-d',strtotime("-1 days"));
                        $query1 = mysqli_query($con,"SELECT sum(cost) AS yesterdayexpense FROM expense WHERE (date)='$bdate' && (userId='$userId');");
                        $result1 = mysqli_fetch_array($query1);
                        $sum_yesterday_expense = $result1['yesterdayexpense'];
                        ?> 
                     <h4>Yesterday</h4>
                     <div class="easypiechart" id="orange">
                        <span class="percent">
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="column">
               <div class="panel">
                  <div class="chart">
                     <?php
                        $userId = $_SESSION['personaluid'];
                        $cdate =  date("Y-m-d", strtotime("-1 week")); 
                        $crrntdte = date("Y-m-d");
                        $query2 = mysqli_query($con,"SELECT sum(cost) AS weeklyexpense FROM expense WHERE ((date) BETWEEN '$cdate' AND '$crrntdte') && (userId='$userId');");
                        $result2 = mysqli_fetch_array($query2);
                        $sum_weekly_expense=$result2['weeklyexpense'];
                        ?>
                     <h4>Last 7 days</h4>
                     <div class="easypiechart" id="teal">
                        <span class="percent">
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="column">
               <div class="panel">
                  <div class="chart">
                     <?php
                        $userId = $_SESSION['personaluid'];
                        $ddate = date("Y-m-d", strtotime("-1 month")); 
                        $crrntdte = date("Y-m-d");
                        $query3 = mysqli_query($con,"SELECT sum(cost) AS monthlyexpense FROM expense WHERE ((date) BETWEEN '$ddate' AND '$crrntdte') && (userId='$userId');");
                        $result3 = mysqli_fetch_array($query3);
                        $sum_monthly_expense = $result3['monthlyexpense'];
                        ?>
                     <h4>Last 30 days</h4>
                     <div class="easypiechart" id="red">
                        <span class="percent">
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="column">
               <div class="panel">
                  <div class="chart">
                     <?php
                        $userId = $_SESSION['personaluid'];
                        $year = date("Y");
                        $query4 = mysqli_query($con,"SELECT sum(cost) AS yearlyexpense FROM expense WHERE (year(date)='$year') && (userId='$userId');");
                        $result4 = mysqli_fetch_array($query4);
                        $sum_yearly_expense=$result4['yearlyexpense'];
                        ?>
                     <h4>This Year</h4>
                     <div class="easypiechart" id="easypiechart-red">
                        <span class="percent">
                     </div>
                  </div>
               </div>
            </div>
            <div class="column">
               <div class="panel">
                  <div class="chart">
                     <?php
                        $userId = $_SESSION['personaluid'];
                        $query5 = mysqli_query($con,"SELECT sum(cost) AS totalexpense FROM expense WHERE userId='$userId';");
                        $result5 = mysqli_fetch_array($query5);
                        $sum_total_expense=$result5['totalexpense'];
                        ?>
                     <h4>Total</h4>
                     <div class="easypiechart" id="easypiechart-red">
                        <span class="percent">
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>