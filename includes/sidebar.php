<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div id="sidebar" class="container">
         <div class="sidebar">
            <div class="user">
               <img src="https://visualpharm.com/assets/225/Male%20User-595b40b85ba036ed117dc5a0.svg" class="img" alt="">
            </div>
            <div class="userName">
               <div class="profileName"></div>
            </div>
            <div class="clear"></div>
         </div>
         <div class="divider"></div>
         <ul class="menu">
            <li class="active"> <a href="dashboard.php"><em class="favicon"></em>Dashboard</a></li>
            <li><a href="profile.php"><em class="favicon"></em>Profile</a></li>
            <li class="parent ">
                <a data-toggle="collapse" href="itemOne"><em class="favicon"></em>Expenses <span data-toggle="collapse" href="itemOne" class="icon"><em class="favicon"></em></span></a>
                    <ul class="children collapse" id="item1">
                  <li><a class="" href="expense.php"><span class="favicon"></span>Add</a></li>
                  <li><a class="" href="manage-expense.php"><span class="favicon"></span>Manage</a></li>
                    </ul>
            </li>

            <li class="parent">
               <a data-toggle="collapse" href="itemtwo">
               <em class="favicon"></em>Expense Report <span data-toggle="collapse" href="itemOne" class="icon"><em class="favicon"></em></span>
               </a>
               <ul class="children collapse" id="item2">
                  <li><a class="" href="daily-expense-form.php"><span class="favicon"></span>Daily</a></li>
                  <li><a class="" href="monthly-expense-form.php"><span class="favicon"></span>Monthly</a></li>
                  <li><a class="" href="yearly-expense-form.php"><span class="favicon"></span>Yearly</a></li>
               </ul>
            </li>

            <li><a href="logout.php"><em class="favicon"></em>Logout</a></li>
         </ul>
      </div>
   </body>
</html>
