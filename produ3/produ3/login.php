<?php

include('conexion.php');

$correo = $_POST["txtcorreo"];
$pass 	= $_POST["txtpassword"];

//Para iniciar sesión

$queryusuario = mysqli_query($conn,"SELECT * FROM login WHERE correo ='$correo' and pass = '$pass'");
$nr 		= mysqli_num_rows($queryusuario);  
$tipo_usuario = mysqli_fetch_assoc($queryusuario)['tipo']; // Obtenemos el tipo de usuario

if ($nr == 1) {
    if($tipo_usuario == 1) {
        header("Location: indexm.html");
    } else if($tipo_usuario == 2) {
        header("Location: buscador.html");
    } else if($tipo_usuario == 3) {
        header("Location: recomendacion.html");
    } else {
        echo "<script> alert('Tipo de usuario no válido.');window.location= 'login.html' </script>";
    }
} else {
    echo "<script> alert('Usuario o contraseña incorrecto.');window.location= 'login.html' </script>";
}

/*VaidrollTeam*/
?>