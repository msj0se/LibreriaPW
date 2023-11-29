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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = $_POST["nombre"];
        $fecha = $_POST["fecha"];
        $correo = $_POST["correo"];
        $asunto = $_POST["asunto"];
        $comentario = $_POST["comentario"];

        $result = $db->exec("INSERT INTO Contacto (nombre, fecha, asunto, comentario, correo) 
                             VALUES ('$nombre', '$fecha', '$asunto', '$comentario', '$correo')");

    if ($result) {
        header("Location: gracias.html");
        exit();
    } else {
        echo "<p>Error al insertar datos en la base de datos.";
    }
    }
}
?>
