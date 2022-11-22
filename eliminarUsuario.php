<?php
require_once("enviroment.php");

if(isset($_GET['correo'])){    
    $searchUser = $_GET['correo'];

    if($DB->query("call seUsuario('$searchUser')")->fetch_object()){ //Si existe el correo, entra
    
    $DB->close(); //Cerramos la conexion cada vez que realizamos una conexion.    
    
    $DB= new mysqli("electronicanordeste.tplinkdns.com", "appblog", "placido", "blog_php", 42321); //Abrimos de nuevo para realizar otra consulta.

    $sql = mysqli_query($DB, "call delUsuario('".$searchUser."')"); //Query de eliminacion usuario.

        if($sql){
            http_response_code(200); //Usuario eliminado con exito.
        }else{
            http_response_code(400); //Correo de usuario no existente.
        }
    }else{
        http_response_code(404); //Si el correo no existe, termina aqui.
    }
}

$DB->close();

?>