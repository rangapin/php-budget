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
      <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
         <link rel="stylesheet" type="text/css" href="css/style.css">
         <title>Your Dashboard</title>
   </head>
   <body>
      <?php include_once('includes/header.php');?>
      <?php include_once('includes/sidebar.php');?>
      <div class="container">
         <div class="row">
            <em class="fa fa-home"></em>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <h1 class="page-header">Dashboard</h1>
            </div>
         </div>
         <div class="row">
            <div class="col-xs-2 col-md-6">
               <div class="panel">
                  <div class="body">
                     <?php
                        $userId=$_SESSION['personaluid'];
                        $tdate=date('Y-m-d');
                        $query=mysqli_query($con,"SELECT sum(cost) AS todaysexpense FROM expense WHERE (date)='$tdate' && (userId='$userId');");
                        $result=mysqli_fetch_array($query);
                        $sum_today_expense=$result['todaysexpense'];
                        ?> 
                     <h4>Today's</h4>
                     <div class="easypiechart" id="blue" data-percent="<?php echo $sum_today_expense;?>">
                        <span class="percent"><?php if($sum_today_expense==""){
                           echo "0";
                           } else {
                           echo $sum_today_expense;
                           }
                           ?>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xs-2 col-md-6">
               <div class="panel">
                  <?php
                     $userId=$_SESSION['personaluid'];
                     $ydate=date('Y-m-d',strtotime("-1 days"));
                     $query1=mysqli_query($con,"SELECT sum(cost) AS yesterdayexpense FROM expense WHERE (date)='$ydate' && (userId='$userId');");
                     $result1=mysqli_fetch_array($query1);
                     $sum_yesterday_expense=$result1['yesterdayexpense'];
                     ?> 
                  <div class="panel">
                     <h4>Yesterday's</h4>
                     <div class="easypiechart" id="orange" data-percent="<?php echo $sum_yesterday_expense;?>">
                        <span class="percent"><?php if($sum_yesterday_expense==""){
                           echo "0";
                           } else {
                           echo $sum_yesterday_expense;
                           }
                           
                           ?>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xs-2 col-md-6">
               <div class="panel">
                  <?php
                     $userId=$_SESSION['personaluid'];
                     $pastdate=  date("Y-m-d", strtotime("-1 week")); 
                     $crrntdte=date("Y-m-d");
                     $query2=mysqli_query($con,"SELECT sum(cost) AS weeklyexpense FROM expense WHERE ((date) BETWEEN '$pastdate' AND '$crrntdte') && (userId='$userId');");
                     $result2=mysqli_fetch_array($query2);
                     $sum_weekly_expense=$result2['weeklyexpense'];
                     ?>
                  <div class="panel">
                     <h4>Last 7 day's</h4>
                     <div class="easypiechart" id="teal" data-percent="<?php echo $sum_weekly_expense;?>">
                        <span class="percent"><?php if($sum_weekly_expense==""){
                           echo "0";
                           } else {
                           echo $sum_weekly_expense;
                           }
                           
                           ?>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xs-2 col-md-6">
               <div class="panel">
                  <?php
                     $userId=$_SESSION['personaluid'];
                     $monthdate=  date("Y-m-d", strtotime("-1 month")); 
                     $crrntdte=date("Y-m-d");
                     $query3=mysqli_query($con,"SELECT sum(cost) AS monthlyexpense FROM expense WHERE ((date) BETWEEN '$monthdate' AND '$crrntdte') && (userId='$userId');");
                     $result3=mysqli_fetch_array($query3);
                     $sum_monthly_expense=$result3['monthlyexpense'];
                     ?>
                  <div class="panel">
                     <h4>Last 30 day's</h4>
                     <div class="easypiechart" id="red" data-percent="<?php echo $sum_monthly_expense;?>">
                        <span class="percent"><?php if($sum_monthly_expense==""){
                           echo "0";
                           } else {
                           echo $sum_monthly_expense;
                           }
                           
                           ?>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xs-2 col-md-6">
               <div class="panel">
                  <?php
                     $userId=$_SESSION['personaluid'];
                     $cyear= date("Y");
                     $query4=mysqli_query($con,"SELECT sum(cost) AS yearlyexpense FROM expense WHERE (year(date)='$cyear') && (userId='$userId');");
                     $result4=mysqli_fetch_array($query4);
                     $sum_yearly_expense=$result4['yearlyexpense'];
                     ?>
                  <div class="panel">
                     <h4>This Year</h4>
                     <div class="easypiechart" id="green" data-percent="<?php echo $sum_yearly_expense;?>">
                        <span class="percent"><?php if($sum_yearly_expense==""){
                           echo "0";
                           } else {
                           echo $sum_yearly_expense;
                           }
                           ?>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xs-2 col-md-6">
               <div class="panel">
                  <?php
                     $userId=$_SESSION['personaluid'];
                     $query5=mysqli_query($con,"SELECT sum(cost) AS totalexpense FROM expense WHERE userId='$userId';");
                     $result5=mysqli_fetch_array($query5);
                     $sum_total_expense=$result5['totalexpense'];
                     ?>
                  <div class="panel">
                     <h4>Total</h4>
                     <div class="easypiechart" id="black" data-percent="<?php echo $sum_total_expense;?>">
                        <span class="percent">
                        <?php if($sum_total_expense==""){
                           echo "0";
                           } else {
                           echo $sum_total_expense;
                           }
                           
                           ?>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include_once('includes/footer.php');?>
   </body>
</html>
<?php 
   } 
   ?>
