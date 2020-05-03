<?php
include('seguridad.php');

        if(isset($_POST['login'])) 
        {
        $email = $_POST['email'];
        $password = $_POST['password'];

   

        $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
        $query_run = mysqli_query($conexion, $query);

        if(mysqli_fetch_array($query_run))
        {
            $_SESSION['usuario'] =  $email;
            header('Location: index.php');
        }
        else 
        {
            $_SESSION['status'] =  "El email o contraseña son incorrectos";
            header('Location: login.php');
        }
}
?>