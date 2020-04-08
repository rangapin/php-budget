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
      <li class="active"><a href="dashboard.php"><em class="dashboard"></em>Dashboard</a></li>
      <li><a href="profile.php"><em class="user"></em>Profile</a></li>
      <li class="parent">
         <a data-toggle="collapse" href="">
         <em class="navicon"></em>Expenses <span data-toggle="collapse" href="daily-expense-form.php" class="icon"><em class="plus"></em></span>
         </a>
         <ul class="children" id="item-1">
            <li><a class="" href="expense.php"><span class="arrow-right"></span>Add</a></li>
            <li><a class="" href="expense-report.php"><span class="arrow-right"></span>Manage</a></li>
         </ul>
      </li>
      <li class="parent">
         <a data-toggle="collapse" href="">
         <em class="navicon"></em>Expense Report <span data-toggle="collapse" href="daily-expense-infos.php" class="icon"><em class="plus"></em></span>
         </a>
         <ul class="children" id="item-2">
            <li><a class="" href="daily-expense-form.php">
               <span class="arrow-right"></span>Daily</a>
            </li>
            <li><a class="" href="monthly-expense-form.php">
               <span class="arrow-right"></span>Monthly</a>
            </li>
            <li><a class="" href="yearly-expense-form.php">
               <span class="arrow-right"></span>Yearly</a>
            </li>
         </ul>
      </li>
      <li><a href="logout.php"><em class="power-off"></em>Logout</a></li>
   </ul>
</div>