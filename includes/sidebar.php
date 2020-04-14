<?php
  session_start();
  error_reporting(0);
  include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Personal Finance</title>
  </head>

  <body>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
      <ul class="nav menu">
        <li class="active"><a href="dashboard.php"> Dashboard</a></li>
        <li class="parent">
          <a data-toggle="collapse" href="#sub-item-1"> Expenses <span data-toggle="collapse" href="#sub-item-1"></span></a>
          <ul class="children collapse" id="sub-item-1">
            <li><a class="" href="expense.php"> Add</a></li>
            <li><a class="" href="manage-expense.php"> Manage</a></li>
          </ul>
        </li>
        <li class="parent">
          <a data-toggle="collapse" href="#sub-item-2"> Expense Report <span data-toggle="collapse" href="#sub-item-1"></span></a>
          <ul class="children collapse" id="sub-item-2">
            <li><a class="" href="daily-expense-form.php"> Daily</a></li>
            <li><a class="" href="monthly-expense-form.php"> Monthly</a></li>
            <li><a class="" href="yearly-expense-form.php"> Yearly</a></li>
          </ul>
        </li>
        <li><a href="logout.php"> Logout</a></li>
      </ul>
    </div>
  </body>
</html>