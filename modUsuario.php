<?php
require_once("enviroment.php");

$json = file_get_contents('php://input'); //Lectura de POST (que no vienen de un formulario)
$post = json_decode($json); //Conversion de json a object.

if($post!=null && $post->email!=null && $post->clave!=null && $post->imagen!=null && $post->nombre!=null && $post->apellido!=null)  //Verificamos si el objeto, y los atributos(si es que lo tiene) no son nulos.
{
    if(!$serverStatus)
    {
        $email=$post->email;
        $clave=$post->clave;
        $imagen=$post->imagen;
        $nombre=$post->nombre;
        $apellido=$post->apellido;

        if($sql= $DB->query("call seUsuario('$email')")->fetch_object())
        {
            $DB->close();
            $DB = new mysqli("electronicanordeste.tplinkdns.com", "appblog", "placido", "blog_php", 42321);
            if ($DB->query("call modUsuario('$email','$clave','$nombre','$apellido','$imagen')"))
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