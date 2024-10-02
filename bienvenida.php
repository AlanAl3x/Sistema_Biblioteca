<?php

    session_start();
    //SEGURIDAD SI ALGUIEN INTENTA INGRESAR A LA PAGINA SIN USUARIO
    //Si NO existe el usuario...//Manda alerta //Regresa al index
    if(!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Por favor debes iniciar sesión"); 
                window.location = "index.php"; 
            </script>
        ';
        session_destroy(); //Termina la sesion
        die();
    }
    //session_destroy(); //Termina la sesion

 // PAGINA BIENVENIDO

        // Incluir la conexión a la base de datos
        include 'php/conexion_be.php';

        // Obtener el correo del usuario desde la sesión
        $correo = $_SESSION['usuario'];

        // Consulta para obtener el nombre del usuario usando el correo
        $query = "SELECT nombre_completo FROM usuarios WHERE correo = '$correo'";
        $resultado = mysqli_query($conexion, $query);

        // Verificar si la consulta fue exitosa y obtener el nombre
        if($resultado && mysqli_num_rows($resultado) > 0){
            $row = mysqli_fetch_assoc($resultado);
            $nombre_usuario = $row['nombre_completo'];
           // print_r($nombre_usuario); //impresion nombre_completo del usuario
        } else {
            // Si no se encuentra el nombre, manejar el error
            echo "Error al encontrar el nombre de usuario";
        }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Libros de <?php print_r($nombre_usuario); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">;

    <link rel="stylesheet" href="assets/css/styles_Bienvenida.css">
</head>
<body>
    <main> 
        <div class="contenedor__inicio-hola">
            <h1> Hola <?php print_r($nombre_usuario); ?></h1>
            </div>
            
            <a href="php/cerrar_sesion.php">Cerrar sesión</a>
    </main>
</body>
</html>