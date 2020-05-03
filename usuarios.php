<?php
include('seguridad.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Administrador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label>Usuario</label>
                <input type="text" name="usuario" class="form-control" placeholder="Ingrese un usuario">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Ingrese un Email">
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="Ingrese Contraseña">
            </div>
            <div class="form-group">
                <label>Confirmar Contraseña</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirmar Contraseña">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background: #f29898; border: #f29898 ">Cancelar</button>
            <button type="submit" name="registerbtn" class="btn btn-primary" style="background: #49b3bf; border: #49b3bf">Guardar</button>
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
    <h6 class="m-0 font-weight-bold" style="color: #49b3bf">Usuarios Registrados - GlicoApp</font>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

       <?php
      require 'db/dbconfig.php';

      $query = "SELECT * FROM usuarios";
      $query_run = mysqli_query($conexion, $query);
      ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Peso</th>
            <th>Genero</th>
            <th>Tipo Diabetes</th>
            <th>Email</th>
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
            <td><?php echo $row['Id_Usuario']; ?></td>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Edad']; ?></td>
            <td><?php echo $row['Peso']; ?></td>
            <td><?php echo $row['Genero']; ?></td>
            <td><?php echo $row['Tipo_Diabetes']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <!--<td>
             <form action="registro_editar.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success" style="background: #77dd77; border: #77dd77">Editar</button>
             </form>
            </td>
            <td>
              <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="eliminar" class="btn btn-danger" style="background: #f29898; border: #f29898">  Eliminar</button>
              </form>
            </td>-->
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