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
      <title>Document</title>
   </head>

   <body>
      <div class="sidenav">
         <a href="dashboard.php">Dashboard</a>
         <button class="dropdown-btn">Manage Expense<i class="fa fa-caret-down"></i></button>
         <div class="dropdown-container">
            <a href="expense-report.php">Add</a>
            <a href="manage-expense.php">Manage</a>
         </div>
         <button class="dropdown-btn">Expense Reports<i class="fa fa-caret-down"></i></button>
         <div class="dropdown-container">
            <a href="daily-expense-form.php">Daily</a>
            <a href="monthly-expense-form.php">Monthly</a>
            <a href="yearly-expense-form.php">Yearly</a>
         </div>
         <a href="profile.php">Profile</a>
         <a href="logout.php">Log Out</a>
      </div>

      <script>
         var dropdown = document.getElementsByClassName("dropdown-btn");
         var i;
         
         for (i = 0; i < dropdown.length; i++) {
           dropdown[i].addEventListener("click", function() {
             this.classList.toggle("active");
             var dropdownContent = this.nextElementSibling;
             if (dropdownContent.style.display === "block") {
               dropdownContent.style.display = "none";
             } else {
               dropdownContent.style.display = "block";
             }
           });
         }
      </script>
   </body>
</html>





