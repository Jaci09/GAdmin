<?php 
include('seguridad.php');
include('includes/header.php');
include('includes/navbar.php'); ?>



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color: #49b3bf">Dashboard</h1>
            <a href="index.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="background: #77dd77; border: #77dd77"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Administradores</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        
                        <?php
                        require 'db/dbconfig.php';

                        $query = "SELECT id FROM admin ORDER BY id";
                        $query_run = mysqli_query($conexion, $query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1> ' .$row.'</h1>';

                        ?>


                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Usuarios Registrados</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

                        <?php
                        require 'db/dbconfig.php';

                        $query = "SELECT Id_Usuario FROM usuarios ORDER BY Id_Usuario";
                        $query_run = mysqli_query($conexion, $query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1> ' .$row.'</h1>';

                        ?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Diabetes - Femenino</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            
                            <?php
                        require 'db/dbconfig.php';

                        $query = "SELECT * FROM usuarios WHERE Genero='Femenino'";
                        $query_run = mysqli_query($conexion, $query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1> ' .$row.'</h1>';

                        ?>
                          </div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-female fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Diabetes - Masculino</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php
                        require 'db/dbconfig.php';

                        $query = "SELECT * FROM usuarios WHERE Genero='Masculino'";
                        $query_run = mysqli_query($conexion, $query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1> ' .$row.'</h1>';

                        ?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-male fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


          <!-- Content Row -->
          <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Porcentaje de Diabetes por Genero</h6>
                </div>
                <?php 
                $conexion = mysqli_connect("34.71.227.1", "admin", "super-strong-password", "glicoapp");
                $query = "SELECT Genero, count(*) as number FROM usuarios GROUP BY Genero";
                $result = mysqli_query($conexion, $query)
                ?>
                <head>    
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Genero', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["Genero"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                        
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <div style="width:300px;">  
                <br />  
                <div id="myPieChart" style="width: 350px; height: 200px;"></div>


                  </div>
                </div>
              </div>
            </body>
          </div>
        </div>

 <!-- Donut Chart -->
    <!-- Donut Chart -->
</div>
    <!--Barras-->
                 
    
      <!-- End of Main Content -->


  <?php 
  include('includes/script.php');
  include('includes/footer.php');
   ?>