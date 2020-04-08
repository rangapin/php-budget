<?php  
   session_start();
   error_reporting(0);
   include('includes/config.php');
   if (strlen($_SESSION['personaluid']==0)) {
     header('location:logout.php');
     } else{
   
   if(isset($_GET['delete']))
   {
   $row=intval($_GET['delete']);
   $query=mysqli_query($con,"DELETE FROM expense WHERE ID='$row'");
   if($query){
   echo "<script>alert('Record successfully deleted');</script>";

   echo "<script>window.location.href='manage-expense.php'</script>";
   } else {
   echo "<script>alert('Something went wrong. Please try again');</script>";
   }
   }
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
               <div class="panel ">
                  <div class="heading">Expense</div>
                  <div class="body">

                     <p><?php if($message){echo $message;}?></p>
                     
                     <div class="col-md-12">
                     ID          <div class="table">
                           <table class="table-bordered">
                              <thead>
                                 <tr>
                                    <th>Item</th>
                                    <th>Item</th>
                                    <th>Cost</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <?php
                                 $userid=$_SESSION['personaluid'];
                                 $return=mysqli_query($con,"SELECT * FROM expense WHERE UserId='$userid'");
                                 $content=1;
                                 while ($row=mysqli_fetch_array($return)) {
                                 
                                 ?>
                              <tbody>
                                 <tr>
                                    <td><?php  echo $content;?></td>
                                    <td><?php  echo $row['item'];?></td>
                                    <td><?php  echo $row['cost'];?></td>
                                    <td><?php  echo $row['purchaseDate'];?></td>
                                    <td><a href="manage-expense.php?delete=<?php echo $row['ID'];?>">Delete</a>
                                 </tr>
                                 <?php $content=$content+1;}?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php include_once('includes/footer.php');?>
         </div>
      </div>

   </body>
</html>
<?php }  ?>