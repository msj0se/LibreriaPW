<?php
class DBA extends SQLite3 {
    function __construct() {
        $this->open("libreria.db");
    }
}

$db = new DBA();

if (!$db) {
    echo "<p>ERROR al conectar la base de datos.";
} else {
    $queryConsulta = "SELECT * FROM Contacto";
    $resultadoConsulta = $db->query($queryConsulta);

    if ($resultadoConsulta) {
        echo "<h2>Datos en la tabla 'Contacto':</h2>";
        echo "<ul>";
        while ($fila = $resultadoConsulta->fetchArray(SQLITE3_ASSOC)) {
            echo "<li>Nombre: " . $fila['nombre'] . ", Fecha: " . $fila['fecha'] . ", Correo: " . $fila['correo'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Error al realizar la consulta.";
    }
}
?>
