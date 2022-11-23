<?php
require_once("enviroment.php");

$json = file_get_contents('php://input'); //Lectura de POST (que no vienen de un formulario)
$post = json_decode($json); //Conversion de json a object.

if($post!=null && $post->email!=null && $post->titulo!=null && $post->imagen!=null && $post->contenido!=null && $post->id!=null)  //Verificamos si el objeto, y los atributos(si es que lo tiene) no son nulos.
{
    if(!$serverStatus)
    {
        $email=$post->email;
        $titulo=$post->titulo;
        $imagen=$post->imagen;
        $contenido=$post->contenido;
        $id=$post->id;

        if($sql= $DB->query("call seArticulo('$id','$email')")->fetch_object())
        {
            $DB->close();
            $DB = new mysqli("electronicanordeste.tplinkdns.com", "appblog", "placido", "blog_php", 42321);
            if ($DB->query("call modArticulo('$email','$id','$titulo','$imagen','$contenido')"))
            { 
                http_response_code(201); //Exito
            }
            else
            {
                http_response_code(500); //Error de server
            }
        }
        else
        {
            http_response_code(410); //Articulo no existe
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