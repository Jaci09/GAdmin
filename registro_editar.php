<?php
include('seguridad.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3"><font size="4"><h6 class="m-0 font-weight-bold" style="color: #49b3bf">Editar Perfil Administrador</font>
   </h6>
  </div>

  <div class="card-body">

  	<?php
  	require 'db/dbconfig.php';
	if (isset($_POST['edit_btn'])) 
    {
        $id = $_POST['edit_id'];
    
      $query = "SELECT * FROM admin WHERE id='$id' ";
      $query_run = mysqli_query($conexion, $query);

      foreach($query_run as $row) 
      {
      	?>

        <form action="code.php" method="POST">
          <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
  	       <div class="form-group">
                <label>Usuario</label>
                <input type="text" name="edit_usuario" value="<?php echo $row['usuario']; ?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="edit_email" value="<?php echo $row['email']; ?>" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="edit_password" value="<?php echo $row['password']; ?>" class="form-control" placeholder="Enter Password">
            </div>
            <a href="registro.php" class="btn btn-danger" style="background: #f29898; border: #f29898 ">Cancelar</a>
            <button type="submit" name="actualizar" class="btn btn-primary" style="background: #49b3bf; border: #49b3bf">Actualizar</button>
          </form>

            <?php
        }
    }
?>
        </div>
    </div>
</div>

<?php
include('includes/script.php');
include('includes/footer.php');
?>