<?php
include('seguridad.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Alimento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label>Nombre de Alimento</label>
                <input type="text" name="nombre" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label>Descripción de Alimento</label>
                <input type="text" name="descripcion" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label>Categoría</label><br>
                  <input type="radio" name="categoria_alimento" value="Alimento Permitido"> Alimento Permitido
                  <input type="radio" name="categoria_alimento" value="Alimento No Permitido"> Alimento no Permitido
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background: #f29898; border: #f29898 ">Cancelar</button>
            <button type="submit" name="alimentobtn" class="btn btn-primary" style="background: #49b3bf; border: #49b3bf">Guardar</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3" style="clear: both;">
    <font size="6">
    <h6 class="m-0 font-weight-bold" style="color: #49b3bf">Alimentos Registrados</font>
            <p style="float: right;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile" style="background: #49b3bf; border: #49b3bf" >
              Nuevo Alimento 
            </button></p>
    </h6>
  </div>

  <div class="card-body">

    <?php
    if(isset($_SESSION['success']) && $_SESSION['success'] !='')
    {
        echo '<h2 style="color: #49b3bf""> '.$_SESSION['success'].' </h2>';
        unset($_SESSION['success']);
    }

    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
        echo '<h2 text-red"> '.$_SESSION['status'].' </h2>';
        unset($_SESSION['status']);
    }
    ?>

    <div class="table-responsive">

       <?php
      require 'db/dbconfig.php';

      $query = "SELECT * FROM alimentos";
      $query_run = mysqli_query($conexion, $query);
      ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nombre de Alimento</th>
            <th>Descripción</th>
            <th>Categoría</th>
          </tr>
        </thead>
        <tbody>
     
          <?php
          if (mysqli_num_rows($query_run) > 0) 
          {
            while($row = mysqli_fetch_assoc($query_run))
            {
              ?>

            <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['categoria_alimento']; ?></td>
            <td>
             <form action="alimento_editar.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id_alimento']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success" style="background: #77dd77; border: #77dd77">Editar</button>
             </form>
            </td>
            <td>
              <form action="code.php" method="post">
                  <input type="hidden" name="eliminar_id" value="<?php echo $row['id_alimento']; ?>">
                  <button type="submit" name="eliminarbtn" class="btn btn-danger" style="background: #f29898; border: #f29898">  Eliminar</button>
              </form>
            </td>
          </tr>

          <?php
        }

      }
      else{
        echo "No record found";
      }

          ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/script.php');
include('includes/footer.php');
?>