<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <title>Document</title>
   </head>
   <body>
      <div class="container">
         <div class="row"></div>
         <div class="row">
            <div class="col-lg-12">
               <div class="panel">
                  <div class="heading">Monthly Report</div>
                  <div class="body">
                     <div class="col-md-12">
                        <form role="form" method="post" action="" name="datesreport">
                           <div class="form-group">
                              <label>From Date</label>
                              <input class="form-control" type="date"  id="fromdate" name="fromdate" required="true">
                           </div>
                           <div class="form-group">
                              <label>To Date</label>
                              <input class="form-control" type="date"  id="todate" name="todate" required="true">
                           </div>
                           <div class="form-group">
                              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                           </div>
                     </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
   </body>
</html>
