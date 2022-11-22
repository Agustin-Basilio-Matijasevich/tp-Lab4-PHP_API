<?php
require_once("enviroment.php");

$json = file_get_contents('php://input'); //Lectura de POST (que no vienen de un formulario)
$post = json_decode($json); //Conversion de json a object.

if($post!=null && $post->emailV && $post->emailN)  //Verificamos si el objeto, y los atributos(si es que lo tiene) no son nulos.
{
    if(!$serverStatus)
    {
        $emailV=$post->emailV;
        $emailN=$post->emailN;

        if($sql= $DB->query("call seUsuario('$emailV')")->fetch_object())
        {
            $DB->close();
            $DB = new mysqli("electronicanordeste.tplinkdns.com", "appblog", "placido", "blog_php", 42321);
            if ($DB->query("call modUCorreo('$emailV','$emailN')"))
            { 
                http_response_code(200); //Exito
            }
            else
            {
                http_response_code(500); //Error de server
            }
        }
        else
        {
            http_response_code(404); //Usuario no existe
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