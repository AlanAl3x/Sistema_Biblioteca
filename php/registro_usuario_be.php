<?php

    include 'conexion_be.php';
    
    $nombre_completo = mysqli_real_escape_string($conexion, $_POST['nombre_completo']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);

    //Encriptamiento de contraseña
    // $contrasena = hash('sha512', $contrasena);

    $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena)
              VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena')";

               
    //Verificar que el CORREO no se repita en la base de datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo'
        <script>
        alert("El correo ya se encuentra registrado");
        window.location ="../index.php";
        </script>
        ';
        exit();
    }

        //Verificar que el USUARIO no se repita en la base de datos
        $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");

        if(mysqli_num_rows($verificar_usuario) > 0){
            echo'
            <script>
            alert("El usuario ya se encuentra registrado");
            window.location ="../index.php";
            </script>
            ';
            exit();
        }


    
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) { //Mensaje de registro
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
