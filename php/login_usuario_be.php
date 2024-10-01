<?php
    // Iniciar la sesión
    session_start();
    
    include 'conexion_be.php';

    // Saneamiento de los datos ingresados
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);
    
    //Desencriptar la contraseña
    $contrasena = hash('sha512', $contrasena);

    // echo $contrasena;
    // die();

    // Consulta SQL
    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE 
    correo = '$correo' AND contrasena = '$contrasena'");

    // Verificar si el usuario existe
    if(mysqli_num_rows($validar_login) > 0){
        // Guardar el correo del usuario en la sesión
        $_SESSION['usuario'] = $correo;
        header("location: ../bienvenida.php");
        exit;
    }else{
        echo '
        <script>
            alert("Correo o contraseña incorrectos, verifique los datos");
            window.location = "../index.php";
        </script>
        ';
        exit;
    }
?>
