Ruta: http://electronicanordeste.tplinkdns.com:5030/

Archivo: login.php
Campos requeridos: email, clave.
Metodo: POST
Retorna:{ "correoUsuario": string,
          "imagenUsuario": string,
          "claveUsuario": string,
          "nombre": string,
          "apellido": string }
Nota: Se debe decodificar la imagen del usuario.
Code Status posibles: 200, 400, 404, 500.


Archivo: registro.php
Campos requeridos: correo, clave, nombre, apellido, imagen
Metodo: POST
Nota: Se debe codificar la imagen antes de enviar al POST en formato Bytes.

Archivo: eliminarUsuario.php
Campos requeridos: correo
Metodo: GET

Archivo: crearArticulo.php
Campos requeridos: email, titulo, imagen, contenido
Metodo: POST
Nota:  Se debe codificar la imagen antes de enviar al POST en formato Bytes.

Archivo: saArticulo.php
Campos requeridos: id, email
Metodo: POST
Nota: Se debe decodificar la imagen del articulo.
Retorna: { "ID_Articulo": int,
    "correoAutor": string,
    "fecha": datetime,
    "titulo": string,
    "imagenArticulo": string,
    "contenido": string }


Archivo: sArticulo.php
Metodo: GET
Retorna: [
    {
        "ID_Articulo": int,
        "fecha": datetime,
        "titulo": string,
        "imagenArticulo": string,
        "contenido": string,
        "NombreUsuario": string,
        "imagenUsuario": string,
        "correoUsuario": string
    },
    {
        "ID_Articulo": int,
        "fecha": string,
        "titulo": string,
        "imagenArticulo": string,
        "contenido": string,
        "NombreUsuario": string,
        "imagenUsuario": string,
        "correoUsuario": string
    }, ......
Nota: El retorno varia dependiendo la cantidad de articulos que haya..
La imagen se debe decodificar.

Archivo: saArticulo.php
Metodo: POST
Campos requeridos: email
Retorna:[
    {
        "ID_Articulo": int,
        "fecha": datetime,
        "titulo": string,
        "imagenArticulo": string,
        "contenido": string,
        "NombreUsuario": string,
        "imagenUsuario": string,
        "correoUsuario": string
    },
    {
        "ID_Articulo": int,
        "fecha": string,
        "titulo": string,
        "imagenArticulo": string,
        "contenido": string,
        "NombreUsuario": string,
        "imagenUsuario": string,
        "correoUsuario": string
    }, ......
Nota: El retorno varia dependiendo la cantidad de articulos que haya..
La imagen se debe decodificar.




Forma de utilizar los archivos: Ruta/archivo.php/
Si es GET: Ruta/archivo.php/?param=...&param=....



 