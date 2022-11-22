<?php
require_once("enviroment.php");

if(isset($_GET['correo'])){    
    $sql = mysqli_query($DB, "call delUsuario('".$_GET['correo']."')");

    if($sql!=null){
        http_response_code(200); //Usuario eliminado con exito.
    }else{
        http_response_code(400); //Correo de usuario no existente.
    }
}

$DB->close();

?>