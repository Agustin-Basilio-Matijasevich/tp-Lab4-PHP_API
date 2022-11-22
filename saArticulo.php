<?php
require_once("enviroment.php");

if(isset($_GET['email']))  //Verificamos que este seteado el email en GET
{
    if(!$serverStatus)
    {
        $email=$_GET['email'];
        
        $sql= $DB->query("call saArticulo('$email')");

        if($request= $sql->fetch_all(MYSQLI_ASSOC))
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