<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"SELECT ID FROM user WHERE  Email='$email' && PASSWORD='$password' ");
    $return=mysqli_fetch_array($query);
    if($return>0){
      $_SESSION['personaluid']=$return['ID'];
     header('location:dashboard.php');
    }
    else{
    $message="Invalid Details.";
    }
  }
  ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#1E90FF">
	<title>Personal Finance</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="canonical" href="https://personal-finance.richardangapin.io/dashboard.php"/>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="manifest" href="manifest.webmanifest">
</head>

<body class="index">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel default">
				<div class="heading" style="color: white">Log in</div>
				<div class="body">

					<p><?php if($message){echo $message;}?></p>

					<form role="form" action="" method="post" id="" name="login">
						<fieldset>
							<div class="form-group">
								<input class="form-control" id= "email" placeholder="E-mail" name="email" type="email" autofocus="" required="true">
							</div>
							<div class="form-group">
								<input class="form-control" id="password" placeholder="Password" name="password" type="password" value="" required="true">
							</div>
							<div class="checkbox">
								<button type="submit" value="login" name="login" class="btn btn-primary" id="login">Login</button>
								<span><a href="register.php" class="btn btn-primary">Register</a></span>
							</div>
							</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>	
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="sw.js"></script>
<script src="local.js"></script>
<script>
      if ('serviceWorker' in navigator){
          navigator.serviceWorker.register('sw.js');
	  }
	  
      if (window.Notification){
            if(window.Notification!=="denied"){

                Notification.requestPermission(permission=>{
                    if(permission==="granted"){
                        const options={
                            body:'Keep going!',
                            icon:'images/icons/apple-icon-60x60-dunplab-manifest-623.png'
                        }
                        const notif= new Notification('New notification', options);
                    }else{
                        console.log('The user has blocked notifications');
                    }
                })

            }
        }
    </script> 
</body>
</html>
