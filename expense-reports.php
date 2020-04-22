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
					<div class="heading">Daily Report</div>
					<div class="body">

						<p><?php if($message){echo $message;}?></p>
						
						<div class="col-md-12">
							<form role="form" method="post" action="expense-reports-detailed.php" name="between-report">
								<div class="form-group">
									<input class="form-control" type="date" id="fromdate" name="fromdate" required="true">
									<label>From</label>
								</div>
								<div class="form-group">
									<input class="form-control" type="date" id="todate" name="todate" required="true">
									<label>To</label>
								</div>	
				            	<div class="form-group has-success">
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
