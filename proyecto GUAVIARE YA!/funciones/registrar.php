<?php


/**
 * Realiza el registro del usuario nuevo a la base de datos.
 * Autor: Ricardo Rivera - Salvador Pores.
 * @return string Devuelve un mensaje avisándole al usuario si se registró correctamente o si hubo un problema.
 */

// Verificar si se recibieron los parámetros esperados a través de la URL

// Definición de la función "registar" con parámetros de entrada y un valor de retorno.
function registar()
{
    // Inicialización de la variable de salida.
    $salida = "";

    // Conexión a la base de datos con los parámetros de host, usuario, contraseña y nombre de la base de datos.
    $conexion = mysqli_connect('localhost', 'root', 'root', 'db_guaviareya');

    $Correo = $_GET['Correo'];
    $Nombre = $_GET['Nombre'];
    $Apellido = $_GET['Apellido'];
    $Contraseña = $_GET['Contraseña'];
    $Telefono = $_GET['Telefono'];

    // Construcción de la consulta SQL para insertar un nuevo usuario en la tabla "tb_Usuarios".
    $sql = "INSERT INTO tb_Usuarios (Correo, Nombre, Apellido, Contraseña, Telefono) VALUES ('$Correo', '$Nombre', '$Apellido', '$Contraseña', '$Telefono')";

    // Ejecución de la consulta y almacenamiento del resultado.
    $resultado = $conexion->query($sql);

    // Verificación del resultado de la consulta.
    if ($resultado) {
        // Mensaje de éxito si la consulta fue exitosa.
        $salida = "Tu registro ha sido completado con éxito.";
    } else {
        // Mensaje de error si la consulta falló, incluyendo detalles del error.
        $salida = "¡Oh no! Parece que hubo un problema con el registro." . $conexion->error;
    }

    // Cierre de la conexión a la base de datos.
    $conexion->close();

    // Devolución del mensaje de salida.
    return $salida;
}


