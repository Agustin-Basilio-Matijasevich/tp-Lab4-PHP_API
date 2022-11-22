<?php
require_once("enviroment.php");

if(isset($_GET['email'])){    
    $searchUser = $_GET['email'];

    if(!$serverStatus){
        if($DB->query("call seUsuario('$searchUser')")->fetch_object()){ //Si existe el correo, entra
    
            $DB->close(); //Cerramos la conexion cada vez que realizamos una consulta.   
            
            $DB= new mysqli("electronicanordeste.tplinkdns.com", "appblog", "placido", "blog_php", 42321); //Abrimos de nuevo para realizar otra consulta.
        
            $sql = mysqli_query($DB, "call delUsuario('".$searchUser."')"); //Query de eliminacion usuario.
        
                if($sql){
                    http_response_code(200); //Usuario eliminado con exito.
                }else{
                    http_response_code(500); //Error de Server
                }
            }else{
                http_response_code(404); //Si el correo no existe, termina aqui.
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