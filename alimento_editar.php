<?php
include('seguridad.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3"><font size="4"><h6 class="m-0 font-weight-bold" style="color: #49b3bf">Editar Alimento</font>
   </h6>
  </div>

  <div class="card-body">

<?php
    require 'db/dbconfig.php';
  if (isset($_POST['edit_btn'])) 
    {
        $id_alimento = $_POST['edit_id'];
    
      $query = "SELECT * FROM alimentos WHERE id_alimento='$id_alimento' ";
      $query_run = mysqli_query($conexion, $query);

      foreach($query_run as $row) 
      {
        ?>

        <form action="code.php" method="POST">
          <input type="hidden" name="edit_id" value="<?php echo $row['id_alimento']; ?>">
  	       <div class="form-group">
                <label>Nombre de Alimento</label>
                <input type="text" name="edit_nombre" value="<?php echo $row['nombre']; ?>" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label>Descripción de Alimento</label>
                <input type="text" name="edit_descripcion" value="<?php echo $row['descripcion']; ?>" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label>Categoría de Alimento</label>
                <br>
                <input type="radio" name="edit_categoria_alimento" value="Alimento Permitido" <?php echo $row['categoria_alimento']; ?>>Alimento Permitido
                &nbsp;<input type="radio" name="edit_categoria_alimento" value="Alimento No Permitido" <?php echo $row['categoria_alimento']; ?>>Alimento No Permitido
            </div>
            <a href="alimentos.php" class="btn btn-danger" style="background: #f29898; border: #f29898 ">Cancelar</a>
            <button type="submit" name="actualizarbtn" class="btn btn-primary" style="background: #49b3bf; border: #49b3bf">Actualizar</button>
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