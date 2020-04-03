<?php
   session_start();
   error_reporting(0);
   include('includes/config.php');
   ?>
<div id="sidebar" class="sidebar">
<div class="sidebar">
<div class="userpic">
   <img src="" class="img" alt="">
</div>
<div class="profile">

   <?php
      $uid=$_SESSION['personaluid'];
      $return=mysqli_query($con,"SELECT name FROM user WHERE ID='$uid'");
      $row=mysqli_fetch_array($return);
      $name=$row['name'];
      ?>
      
   <div class="profile"><?php echo $name ?></div>
   <div class="clear"></div>
   <div class="divider"></div>
   <ul class="menu">
      <li class="active"><a href="dashboard.php"><em class="fa fa-dashboard"></em>Dashboard</a></li>
      <li><a href="profile.php"><em class="fa fa-user"></em>Profile</a></li>
      <li class="parent">
         <a data-toggle="collapse" href="item1">
         <em class="fa fa-navicon"></em>Expenses <span data-toggle="collapse" href="item-1" class="icon"><em class="fa fa-plus"></em></span>
         </a>
         <ul class="children" id="item-1">
            <li><a class="" href="expense.php"><span class="fa fa-arrow-right"></span>Add</a></li>
            <li><a class="" href="daily-report.php"><span class="fa fa-arrow-right"></span>Manage</a></li>
         </ul>
      </li>
      <li class="parent">
         <a data-toggle="collapse" href="item2">
         <em class="fa fa-navicon"></em>Expense Report <span data-toggle="collapse" href="item-1" class="icon"><em class="fa fa-plus"></em></span>
         </a>
         <ul class="children" id="item-2">
            <li><a class="" href="daily-expense-form.php">
               <span class="fa fa-arrow-right"></span>Daily</a>
            </li>
            <li><a class="" href="monthly-expense-form.php">
               <span class="fa fa-arrow-right"></span>Monthly</a>
            </li>
            <li><a class="" href="yearly-expense-form.php">
               <span class="fa fa-arrow-right"></span>Yearly</a>
            </li>
         </ul>
      </li>
      <li><a href="logout.php"><em class="fa fa-power-off"></em>Logout</a></li>
   </ul>
</div>