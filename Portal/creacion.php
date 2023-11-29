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

    $createTableQuery = "
        CREATE TABLE IF NOT EXISTS Contacto (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nombre TEXT NOT NULL,
            fecha DATE NOT NULL,
            asunto TEXT,
            comentario TEXT,
            correo TEXT NOT NULL
        );
    ";

    $result = $db->exec($createTableQuery);

    if ($result) {
        echo "<p>La tabla 'Contacto' ha sido creada exitosamente.";
    } else {
        echo "<p>Error al crear la tabla 'Contacto'.";
    }
}
?>
