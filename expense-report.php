<?php
   session_start();
   error_reporting(0);
   include('includes/config.php');
   if (strlen($_SESSION['personaluid']==0)) {
     header('location:logout.php');
     } else{
   
     
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <title>Expense Report</title>
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
                     <p> <?php if($message){
                        echo $message;
                        }  ?> </p>
                     <div class="col-md-12">
                        <form role="form" method="post" action="expense.php" name="bwdatesreport">
                           <div class="group">
                              <label>From Date</label>
                              <input class="form-control" type="date"  id="fromdate" name="fromdate" required="true">
                           </div>
                           <div class="group">
                              <label>To Date</label>
                              <input class="form-control" type="date"  id="todate" name="todate" required="true">
                           </div>
                           <div class="group">
                              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
</body>
</html>