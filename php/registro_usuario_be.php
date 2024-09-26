<?php

    include 'conexion_be.php';
    
    $nombre_completo = mysqli_real_escape_string($conexion, $_POST['nombre_completo']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);

    $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena)
              VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena')";

    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo '
            <script>
            alert("Registro exitoso");
            window.location = "../index.php";
            </script>
        ';
    } else {
        echo '
            <script>
            alert("Intentelo de nuevo, el usuario no fue registrado");
            window.location = "../index.php";
            </script>
        ';
    }

    mysqli_close($conexion);

?>
