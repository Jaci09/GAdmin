<?php
include('seguridad.php');
session_start();
require 'db/dbconfig.php';

if(isset($_POST['registerbtn']))
{
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];


    if($password === $confirmpassword)
    {

        $query = "INSERT INTO admin (usuario,email,password) VALUES ('$usuario','$email','$password')";
        $query_run = mysqli_query($conexion, $query);
    
        if($query_run)
        {
            $_SESSION['success'] =  "El administrador ha sido agregado con éxito";
            header('Location: registro.php');
        }
        else 
        {
            $_SESSION['status'] =  "El administrador no ha sido agregado";
            header('Location: registro.php');
        }
    }
    else 
    {
        $_SESSION['status'] =  "Las contraseñas no coinciden";
        header('Location: registro.php');
    }
}


if (isset($_POST['actualizar'])) 
{
   $id = $_POST['edit_id'];
   $usuario = $_POST['edit_usuario'];
   $email = $_POST['edit_email'];
   $password = $_POST['edit_password'];

    $query = "UPDATE admin SET usuario='$usuario', email='$email', password='$password' WHERE id='$id' ";
        $query_run = mysqli_query($conexion, $query);

        if($query_run)
        {
            $_SESSION['success'] =  "Los datos han sido actualizados";
            header('Location: registro.php');
        }
        else 
        {
            $_SESSION['status'] =  "Los datos no se han actualizados";
            header('Location: registro.php');
        }
}



if(isset($_POST['eliminar'])) 
{
   $id = $_POST['delete_id'];
   

    $query = "DELETE FROM admin WHERE id='$id' ";
    $query_run = mysqli_query($conexion, $query);

        if($query_run)
        {
            $_SESSION['success'] =  "Los datos han sido eliminados";
            header('Location: registro.php');
        }
        else 
        {
            $_SESSION['status'] =  "Los datos no se han eliminado";
            header('Location: registro.php');
        }
}

//Alimentos

if(isset($_POST['alimentobtn']))
{
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria_alimento = $_POST['categoria_alimento'];

    $query = "INSERT INTO alimentos(nombre,descripcion,categoria_alimento) VALUES ('$nombre','$descripcion','$categoria_alimento')";
        $query_run = mysqli_query($conexion, $query);
    
        if($query_run)
        {
            $_SESSION['success'] =  "El alimento ha sido agregado con éxito";
            header('Location: alimentos.php');
        }
        else 
        {
            $_SESSION['status'] =  "El alimento no ha sido agregado";
            header('Location: alimentos.php');
        }
}

if (isset($_POST['actualizarbtn'])) 
{
   $id_alimento = $_POST['edit_id'];
   $nombre = $_POST['edit_nombre'];
   $descripcion = $_POST['edit_descripcion'];
   $categoria_alimento = $_POST['edit_categoria_alimento'];

    $query = "UPDATE alimentos SET nombre='$nombre', descripcion='$descripcion', categoria_alimento='$categoria_alimento' WHERE id_alimento='$id_alimento' ";
        $query_run = mysqli_query($conexion, $query);

        if($query_run)
        {
            $_SESSION['success'] =  "Los datos han sido actualizados";
            header('Location: alimentos.php');
        }
        else 
        {
            $_SESSION['status'] =  "Los datos no se han actualizados";
            header('Location: alimentos.php');
        }
}

if(isset($_POST['eliminarbtn'])) 
{
   $id_alimento = $_POST['eliminar_id'];
   

    $query = "DELETE FROM alimentos WHERE id_alimento='$id_alimento' ";
    $query_run = mysqli_query($conexion, $query);

        if($query_run)
        {
            $_SESSION['success'] =  "Los datos han sido eliminados";
            header('Location: alimentos.php');
        }
        else 
        {
            $_SESSION['status'] =  "Los datos no se han eliminado";
            header('Location: alimentos.php');
        }
}


?>
