<?php

/**
 * Realiza una consulta a la base de datos y devuelve los resultados formateados como una cadena de texto.
 * Autor: Cristian Ricardo Rivera Montañez.
 * @param string $u Documento para buscar datos en la tabla usuarios. (Opcional, por defecto es null).
 * @param sting $c Contraseña para buscar datos en la tabla usuarios. (Opcional, por defecto es null).
 * @param int $n Número para controlar el tipo de consulta. (Opcional, por defecto es 1).
 * @return string Devuelve una cadena con los valores de la tabla 'usuarios' separados por saltos de línea.
 */
function consulta($u = null, $c = null, $z =1,$n = 1)
{
    // Se inicializa una variable para acumular los resultados.
    $salida = "";

    // Se establece la conexión a la base de datos con el servidor, nombre de usuario, contraseña y nombre de la base de datos.
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_');

    // Se define la consulta SQL según el valor de $n.
    if ($n == 1) {
        // Consulta principal para seleccionar todos los registros de la tabla 'usuarios'.
        $sql = "SELECT * FROM usuarios";
        // Si se proporciona un documento, se agrega una condición WHERE a la consulta.
        if ($u != null) {
            $sql .= " WHERE documento='$u'";
        }
        // Si se proporcionan tanto el documento como la contraseña, se realiza una consulta adicional con ambas condiciones.
        if ($u != null && $c != null) {
            $sql = "SELECT * FROM usuarios WHERE documento='$u' AND clave='$c'";
        }else if($z !=1){
            $sql= "select * from usuarios limit $z";
        };
    } else if ($n != 1) {
        // Consulta de recuento para obtener el número total de registros en la tabla 'usuarios'.
        $sql = "SELECT count(*) FROM usuarios";
    }

    // Se ejecuta la consulta y se obtiene el conjunto de resultados.
    $resultado = $conexion->query($sql);

    // Se verifica si se encontraron resultados.
    if ($resultado) {
        if ($n == 1) {
            // Se recorren las filas de resultados y se concatenan las columnas a la variable de salida.
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $salida .= $fila['documento'] . "<br>"; // Concatenación del primer campo
                $salida .= $fila['nombre'] . "<br>"; // Concatenación del segundo campo
                $salida .= $fila['sitio'] . "<br>"; // Concatenación del tercer campo
                $salida .= $fila['bienvenida'] . "<br>"; // Concatenación del cuarto campo
                $salida .= $fila['clave'] . "<br>";
            }
        } elseif ($n != 1) {
            // Se obtiene el resultado del recuento.
            $count = mysqli_fetch_row($resultado)[0];
            $salida .= "Número total de registros: $count";
        }
    }

    // Se cierra la conexión a la base de datos.
    $conexion->close();

    // Se devuelve la cadena acumulada con los resultados de la consulta.
    return $salida;
}
