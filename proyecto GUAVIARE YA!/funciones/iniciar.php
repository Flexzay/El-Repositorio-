<?php

/**
 * Realiza la autenticación de un usuario en la base de datos.
 * Autor: Ricardo Rivera - Salvador Pores.
 * @return      string       Devuelve un mensaje indicando si la autenticación fue exitosa o no.
 */

// Definición de la función "autenticar" con parámetros de entrada y un valor de retorno.
function autenticar() {
    // Inicialización de la variable de salida.
    $salida = "";
    
    // Conexión a la base de datos con los parámetros de host, usuario, contraseña y nombre de la base de datos.
    $conexion = mysqli_connect('localhost', 'root', 'root', 'db_guaviareya');

    $Correo=$_GET['Correo'];
    $Contraseña = $_GET['Contraseña'];
    
    // Construcción de la consulta SQL para verificar las credenciales del usuario.
    $sql = "SELECT * FROM tb_Usuarios WHERE Correo = '$Correo' AND Contraseña = '$Contraseña'";
    
    // Ejecución de la consulta y almacenamiento del resultado.
    $resultado = $conexion->query($sql);

    // Verificación del resultado de la consulta.
    if ($resultado && $resultado->num_rows > 0) {
        // Mensaje de éxito si las credenciales son válidas.
        $salida = "¡Bienvenido! Autenticación exitosa.";
    } else {
        // Mensaje de error si las credenciales no son válidas.
        $salida = "¡Oh no! Autenticación fallida. Verifica tu correo y contraseña.";
    }

    // Cierre de la conexión a la base de datos.
    $conexion->close();

    // Devolución del mensaje de salida.
    return $salida;
}


