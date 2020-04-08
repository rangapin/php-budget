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
               <h1 class="header">Dashboard</h1>
            </div>
         </div>
         <div class="row">
            <div class="col-xs-6 col-md-3">
               <div class="panel ">
                  <div class="easy">
                     <?php
                        $userid=$_SESSION['personaluid'];
                        $end_date=date('Y-m-d');
                        $query=mysqli_query($con,"SELECT sum(cost) AS todaysexpense FROM expense WHERE (purchaseDate)='$end_date' && (UserId='$userid');");
                        $result=mysqli_fetch_array($query);
                        $sum_today_expense=$result['todaysexpense'];
                         ?> 
                     <h4>Today</h4>
                     <div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $sum_today_expense;?>" ><span class="percent"><?php if($sum_today_expense==""){
                        echo "0";
                        } else {
                        echo $sum_today_expense;
                        }
                        	?></span></div>
                  </div>
               </div>

            </div>
            <div class="col-xs-6 col-md-3">
               <div class="panel ">
                  <?php
                     $userid=$_SESSION['personaluid'];
                     $yesterday=date('Y-m-d',strtotime("-1 days"));
                     $query_one=mysqli_query($con,"SELECT sum(cost) AS yesterdayexpense FROM expense WHERE (purchaseDate)='$yesterday' && (UserId='$userid');");
                     $result_one=mysqli_fetch_array($query_one);
                     $sum_yesterday_expense=$result_one['yesterdayexpense'];
                      ?> 
                  <div class="easy">
                     <h4>Yesterday</h4>
                     <div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $sum_yesterday_expense;?>" ><span class="percent"><?php if($sum_yesterday_expense==""){
                        echo "0";
                        } else {
                        echo $sum_yesterday_expense;
                        }
                        	?></span></div>
                  </div>
               </div>
            </div>

            <div class="col-xs-6 col-md-3">
               <div class="panel ">
                  <?php
                     $userid=$_SESSION['personaluid'];
                     $past=date("Y-m-d", strtotime("-1 week")); 
                     $current=date("Y-m-d");
                     $query_two=mysqli_query($con,"SELECT sum(cost) AS weeklyexpense FROM expense WHERE ((purchaseDate) BETWEEN '$past' AND '$current') && (UserId='$userid');");
                     $result_two=mysqli_fetch_array($query_two);
                     $sum_weekly_expense=$result_two['weeklyexpense'];
                      ?>
                  <div class="easy">
                     <h4>Last 7 days</h4>
                     <div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $sum_weekly_expense;?>"><span class="percent"><?php if($sum_weekly_expense==""){
                        echo "0";
                        } else {
                        echo $sum_weekly_expense;
                        }
                        	?></span></div>
                  </div>
               </div>
            </div>

            <div class="col-xs-6 col-md-3">
               <div class="panel ">
                  <?php
                     $userid=$_SESSION['personaluid'];
                     $monthdate=  date("Y-m-d", strtotime("-1 month")); 
                     $current=date("Y-m-d");
                     $query_three=mysqli_query($con,"SELECT sum(cost) AS monthlyexpense FROM expense WHERE ((purchaseDate) BETWEEN '$monthdate' AND '$current') && (UserId='$userid');");
                     $result_three=mysqli_fetch_array($query_three);
                     $sum_monthly_expense=$result_three['monthlyexpense'];
                      ?>
                  <div class="easy">
                     <h4>Last 30 days</h4>
                     <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_monthly_expense;?>" ><span class="percent"><?php if($sum_monthly_expense==""){
                        echo "0";
                        } else {
                        echo $sum_monthly_expense;
                        }
                        	?></span></div>
                  </div>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-xs-6 col-md-3">
               <div class="panel ">
                  <?php
                     $userid=$_SESSION['personaluid'];
                     $this_year= date("Y");
                     $query_four=mysqli_query($con,"SELECT sum(cost) AS yearlyexpense FROM expense WHERE (year(purchaseDate)='$this_year') && (UserId='$userid');");
                     $result_four=mysqli_fetch_array($query_four);
                     $sum_yearly_expense=$result_four['yearlyexpense'];
                      ?>
                  <div class="easy">
                     <h4>This year</h4>
                     <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_yearly_expense;?>" ><span class="percent"><?php if($sum_yearly_expense==""){
                        echo "0";
                        } else {
                        echo $sum_yearly_expense;
                        }
                        	?></span></div>
                  </div>
               </div>
            </div>

            <div class="col-xs-6 col-md-3">
               <div class="panel ">
                  <?php
                     $userid=$_SESSION['personaluid'];
                     $query_five=mysqli_query($con,"SELECT sum(cost) AS totalexpense FROM expense WHERE UserId='$userid';");
                     $result_five=mysqli_fetch_array($query_five);
                     $sum_total_expense=$result_five['totalexpense'];
                      ?>
                  <div class="easy">
                     <h4>Total</h4>
                     <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_total_expense;?>" ><span class="percent"><?php if($sum_total_expense==""){
                        echo "0";
                        } else {
                        echo $sum_total_expense;
                        }
                        	?></span></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include_once('includes/footer.php');?>
      
   </body>
</html>
<?php } ?>
