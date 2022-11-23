<?php
require_once("enviroment.php");

$post = json_decode(file_get_contents('php://input')); //Post a Object

if($post !=null && $post->email!=null && $post->clave!=null && $post->nombre!=null && $post->apellido != null && $post->imagen != null){
    
    if(!$serverStatus){
        $email = $post->email;    
        $clave = $post->clave;    
        $nombre = $post->nombre;    
        $apellido = $post->apellido;    
        $imagen = $post->imagen;

        if($sql= $DB->query("call seUsuario('$email')")->fetch_object())
        {
            http_response_code(412); //El Usuario ya existe
        }
        else
        {
            $DB->close();
            $DB = new mysqli("electronicanordeste.tplinkdns.com", "appblog", "placido", "blog_php", 42321);
            $sql = mysqli_query($DB, "call crearUsuario('$email', '$clave', '$nombre', '$apellido', '$imagen')"); //Query
            if($sql){
                http_response_code(201); //Todo salio bien. Usuario creado con exito.
            }
            else{
                http_response_code(500); //Error de Server
            }
        }
        
    }else{
        http_response_code(500); //Error de Server
    }
}
else
{
    http_response_code(400); //Datos mal enviados
}
$DB->close();

?>