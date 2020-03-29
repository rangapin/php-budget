<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <title>Dashboard</title>
   </head>
   <body>
      <div class="container">
         <div class="row">
            <em class="favicon"></em>
         </div>
         <div class="row">
            <div class="column">
               <h1 class="header">Dashboard</h1>
            </div>
         </div>
         <div class="row">
            <div class="column">
               <div class="panel">
                  <div class="chart">
                     <h4>Today's</h4>
                     <div class="easypiechart" id="blue">
                        <span class="percent">
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="column">
               <div class="panel">
                  <div class="chart">
                     <h4>Yesterday</h4>
                     <div class="easypiechart" id="orange">
                        <span class="percent">
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="column">
               <div class="panel">
                  <div class="chart">
                     <h4>Last 7 days</h4>
                     <div class="easypiechart" id="teal">
                        <span class="percent">
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="column">
               <div class="panel">
                  <div class="chart">
                     <h4>Last 30 days</h4>
                     <div class="easypiechart" id="red">
                        <span class="percent">
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="column">
               <div class="panel">
                  <div class="chart">
                     <h4>This Year</h4>
                     <div class="easypiechart" id="easypiechart-red">
                        <span class="percent">
                     </div>
                  </div>
               </div>
            </div>
            <div class="column">
               <div class="panel">
                  <div class="chart">
                     <h4>Total</h4>
                     <div class="easypiechart" id="easypiechart-red">
                        <span class="percent">
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
