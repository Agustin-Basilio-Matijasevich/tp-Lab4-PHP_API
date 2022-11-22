<?php
require_once("enviroment.php");

$json = file_get_contents('php://input'); //Lectura de POST (que no vienen de un formulario)
$post = json_decode($json); //Conversion de json a object.

if($post !=null && $post->email!=null && $post->clave!=null){ //Verificamos si el objeto, y los atributos(si es que lo tiene) no son nulos.
    if(!$serverStatus){
        $email=$post->email;
        $password=$post->clave;
        
        $sql= $DB->query("select * from usuario where correoUsuario = '$email';");

        if($request= $sql->fetch_object()){
            if($request->claveUsuario == $password){
            http_response_code(200); //Todo salio bien.
            echo json_encode($request);
            }else{
                http_response_code(404); //Clave incorrecta.
            }
        }else{
        http_response_code(404); //Usuario no encontrado
        }
    }else{
        http_response_code(500); //Erorr de server
    }
}else{
    http_response_code(400); //Datos corruptos.
}

$DB->close();
?>