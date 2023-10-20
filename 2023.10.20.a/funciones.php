<?php
// Esta función realiza una consulta a la base de datos y devuelve los resultados formateados como una cadena de texto.
function consulta()
{
    // Se inicializa una variable para acumular los resultados.
    $salida = 0;

    // Se establece la conexión a la base de datos con el servidor, nombre de usuario, contraseña y nombre de la base de datos.
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_');

    // Se define la consulta SQL para seleccionar todos los registros de la tabla 'usuarios'.
    $sql = "select * from usuarios";

    // Se ejecuta la consulta y se obtiene el conjunto de resultados.
    $resultado = $conexion->query($sql);

    // Se recorren las filas de resultados y se concatenan las columnas a la variable de salida.
    while ($fila = mysqli_fetch_array($resultado)) {
        $salida .= $fila['0'] . "<br>"; // Concatenación del primer campo
        $salida .= $fila['1'] . "<br>"; // Concatenación del segundo campo
        $salida .= $fila['2'] . "<br>"; // Concatenación del tercer campo
        $salida .= $fila['3'] . "<br>"; // Concatenación del cuarto campo
    }

    // Se cierra la conexión a la base de datos.
    $conexion->close();

    // Se devuelve la cadena acumulada con los resultados de la consulta.
    return $salida;
}
