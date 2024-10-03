
<?php
        // Incluir la conexión a la base de datos
        include 'php/conexion_be.php';

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

         // USUSARIOS
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

        // LIBROS
        // Consulta para obtener los libros
        $query_libros = "SELECT * FROM bd_libros";
        $resultado_libros = mysqli_query($conexion, $query_libros);

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
            <h1> Hola <?php echo htmlspecialchars($nombre_usuario); ?></h1>
        </div>

        <div class="contenedor__mensaje-libros">
            <h2>Libros disponibles</h2>
        </div>

        <div class="contenedor__lista-libros">
            <?php
            // Mostrar los libros obtenidos de la base de datos
            if ($resultado_libros && mysqli_num_rows($resultado_libros) > 0) {
                while ($libro = mysqli_fetch_assoc($resultado_libros)) {
                    echo "<div>";
                    echo "<h3>" . htmlspecialchars($libro['titulo']) . "</h3>";
                    echo "<p>Autor: " . htmlspecialchars($libro['autor']) . "</p>";
                    echo "<p>Precio: $" . htmlspecialchars($libro['precio']) . "</p>";
                    echo "<img src='assets/img/" . htmlspecialchars($libro['imagen']) . "' alt='" 
                    . htmlspecialchars($libro['titulo']) . "'>";

                    echo "<button>Añadir a la lista</button>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay libros disponibles.</p>";
            }
            ?>
        </div>

        <a href="php/cerrar_sesion.php">Cerrar sesión</a>
    </main>
</body>
</html>