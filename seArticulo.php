<?php
require_once("enviroment.php");

if(isset($_GET['email']) && isset($_GET['id']) && !empty($_GET['email']) && !empty($_GET['id']))  //Verificamos si el objeto, y los atributos(si es que lo tiene) no son nulos.
{
    if(!$serverStatus)
    {
        $id = $_GET['id'];
        $email=$_GET['email'];
        
        $sql= $DB->query("call seArticulo('$id','$email')");

        if($request= $sql->fetch_object())
        {
            http_response_code(200); //Todo salio bien.
            echo json_encode($request);
        }
        else
        {
        http_response_code(410); //No se encontraron articulos
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