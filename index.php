<?php
require_once('enviroment.php');

if ($serverStatus)
{
    echo "Fallo al conectar a MySQL: (" . $DB->connect_errno . ") " . $DB->connect_error;
}
else
{
    echo "Exito al conectar con MySQL";
}

echo "<br><br> Estado de Conexion: ".$DB->host_info . "<br>";

$DB->close();

?>