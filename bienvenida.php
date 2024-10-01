<?php

    session_start();
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

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - Nombre</title>
</head>
<body>
    <h1>Bienvenido al server pa</h1>
</body>
</html>