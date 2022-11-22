<?php
require_once("enviroment.php");

function checkFields($correo=null, $clave=null, $nombre=null, $apellido=null, $imagen=null){ //Funcion que me indica si los valores de los campos estan vacios.
    if($correo != null || $clave !=null || $nombre != null || $apellido != null || $imagen != null){
        return true;
    }else{ return false; }
}

$post = json_decode(file_get_contents('php://input')); //Post a Object

if(!empty($post)){
    
    if(isset($post->correo) && isset($post->clave) && isset($post->nombre)&& isset($post->apellido) && isset($post->imagen)){
        $correo = $post->correo;    
        $clave = $post->clave;    
        $nombre = $post->nombre;    
        $apellido = $post->apellido;    
        $imagen = $post->imagen;   

        if(checkFields($correo, $clave, $nombre, $apellido, $imagen)){ //Verificamos campos vacios.
        
        $sql = mysqli_query($DB, "call crearUsuario('$correo', '$clave', '$nombre', '$apellido', '$imagen')"); //Query
        
            if($sql){
                http_response_code(200); //Todo salio bien. Usuario creado con exito.
            }else{
                http_response_code(400); //El usuario ya existe, se envio un tipo de dato mal.
            }
        }else{
        http_response_code(400); //Envio de datos vacios, faltante de campos.
        }
    }else{
        http_response_code(404); //Si no se envia bien el post, con los parametros que se necesitan.
    }
}
$DB->close();

?>