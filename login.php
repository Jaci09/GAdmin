<?php
session_start();
include('includes/header.php'); 
?>


<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <img src="img/glico.png" width="200" height="200"><br>

                    <?php
    				if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    				{
        				echo '<h2 text-blue"> '.$_SESSION['status'].' </h2>';
       				 	unset($_SESSION['status']);
    				}
    ?>


                  </div>
                  <form class="user" action="config.php" method="POST">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" placeholder="Ingrese su correo electrónico">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" placeholder="Ingrese su contraseña">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block" style="background: #49b3bf; border: #49b3bf ">Iniciar Sesión</button>
                </hr>
            </form>
                </div>
              </div>
      </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>


<?php
include('includes/script.php');
?>