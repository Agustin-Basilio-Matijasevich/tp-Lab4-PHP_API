<?php

require_once("enviroment.php");

if(!$serverStatus)
{
    $sql= $DB->query("call sArticulo ()");

    if($request= $sql->fetch_all(MYSQLI_ASSOC))
    {
        http_response_code(200); //Todo salio bien.
        echo json_encode($request);
    }
    else
    {
        http_response_code(404); //No hay articulos
    }
}
else
{
    http_response_code(500); //Error de server
}

$DB->close();

?>