<?php
require_once("enviroment.php");

if(isset($_GET['email']) && isset($_GET['id']) && !empty($_GET['email']) && !empty($_GET['id'])){

    if(!$serverStatus)
    {
        $id = $_GET['id'];
        $email=$_GET['email'];
        
        $sql= $DB->query("call seArticulo('$id','$email')");

        if($request= $sql->fetch_object())
        {
            $DB->close();
            $DB = new mysqli("electronicanordeste.tplinkdns.com", "appblog", "placido", "blog_php", 42321);
            $sql = mysqli_query($DB, "call delArticulo('$id','$email')"); //Query de eliminacion articulo.
        
                if($sql){
                    http_response_code(200); //Usuario eliminado con exito.
                }else{
                    http_response_code(500); //Error de Server
                }
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