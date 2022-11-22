<?php
require_once("enviroment.php");

if(isset($_GET['email']))  //Verificamos si el objeto, y los atributos(si es que lo tiene) no son nulos.
{
    if(!$serverStatus)
    {
        $email=$_GET['email'];
        
        $sql= $DB->query("call seUsuario('$email')");

        if($request= $sql->fetch_object())
        {
            http_response_code(200); //Todo salio bien.
            echo json_encode($request);
        }
        else
        {
        http_response_code(404); //No se encontraron articulos
        }
    }
    else
    {
        http_response_code(500); //Error de server
    }
}
else
{
    http_response_code(400); //Datos corruptos.
}

$DB->close();

?>