### Ruta: http://electronicanordeste.tplinkdns.com:5030/

### Forma de utilizar los archivos:
Ruta/archivo.php
Si es GET: Ruta/archivo.php/?param=...&param=....

### Status Codes
200: Todo bien
400: Datos mal enviados/Faltan Enviar datos
404: No se encuentran datos/Datos no corresponden con elemento en Base de Datos
406: Error al insertar dato/Clave Primaria Repetida
500: Error de conexion a la Base de Datos (Ingrese la ruta en el navegador para verificar el estado de conexion)

### Nota
La comunicacion se realiza por JSON o por GET por lo que el tipo de dato siempre sera string. Sin embargo se indica el tipo de dato
correspondiente a cada campo ya que asi es almacenado en la Base de Datos y para que de ser necesario se pueda estar seguro de hacer un casteo.
Tambien de esa forma indicamos como debe ser el elemento que queremos recibir para las solicitudes.

### Archivo: login.php
Accion: Recibe los datos de login y valida el usuario
Datos requeridos: JSON con un elemento.
Campos:
email=>string
clave=>string
Metodo: POST
Ejemplo contenido JSON:
{
    "email": "hola@gmail.com",
    "clave": "1234"
}
Retorna JSON de 1 elemento con Clave Valor:
correoUsuario=>string
imagenUsuario=>string con imagen en base64 y datos de formato
claveUsuario=>string
nombre=>string
apellido=>string

### Archivo: registro.php
Accion: Recibe los datos de un nuevo usuario, lo valida (Por correo repetido) y lo inserta si no esta repetido.
Datos requeridos: JSON con un elemento.
Campos:
email=>string
clave=>string
nombre=>string
apellido=>string
imagen=>string con imagen codificada en base64
Metodo: POST
Ejemplo contenido JSON:
{
    "email": "Hola@gmail.com",
    "clave": "1234",
    "nombre": "Agu",
    "apellido": "basi",
    "imagen": "data:image/png;base64,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"
}

### Archivo: eliminarUsuario.php
Accion: Recibe un correo y si existe el usuario vinculado lo borra junto a todos sus articulos
Datos requeridos: Valores por URL "GET"
Campos: 
email=>string
Metodo: GET
Ejemplo de URL:
http://electronicanordeste.tplinkdns.com:5030/eliminarUsuario.php?email=hola@gmail.com

### Archivo: crearArticulo.php
Accion: Recibe todos los datos de un nuevo articulo, valida que el usuario existe y lo inserta.
Datos requeridos: JSON con un elemento.
Campos:
email=>string
titulo=>string
imagen=>string con imagen codificada en base64
contenido=>string
Metodo: POST
Ejemplo contenido JSON:
{
    "email": "hola@gmail.com",
    "titulo": "El mejor articulo",
    "contenido": "Mucho Texto",
    "imagen": "data:image/png;base64,..."
}

### Archivo: saArticulo.php
Accion: Recibe un correo y devuelve todos los articulos de ese usuario.
Datos requeridos: Valores por URL "GET"
Campos:
email=>string
Metodo: GET
Ejemplo de URL:
http://electronicanordeste.tplinkdns.com:5030/saArticulo.php?email=hola@gmail.com
Retorna JSON de varios elementos con clave Valor:
ID_Articulo=>int UNSIGNED
correoAutor=>string
fecha=>datetime
titulo=>string
imagenArticulo=>string
contenido=>string
Ejemplo JSON de Retorno:
[
    {
        "ID_Articulo": "2",
        "correoAutor": "tuvieja@gmail.com",
        "fecha": "2022-11-21",
        "titulo": "Nuevo",
        "imagenArticulo": "data:image/png;base64,...",
        "contenido": "Mas Texto"
    },
    {
        "ID_Articulo": "3",
        "correoAutor": "tuvieja@gmail.com",
        "fecha": "2022-11-21",
        "titulo": "unarticulo",
        "imagenArticulo": "data:image/png;base64,...",
        "contenido": "Mucho texto"
    }
]

### Archivo: sArticulo.php
Accion: Devuelve todos los articulos almacenados con informacion resumida del autor y simplificando el nombre del mismo.
Datos requeridos: Ninguno
Retorna JSON de varios elementos con clave Valor:
ID_Articulo=> int UNSIGNED
fecha=> datetime,
titulo=> string,
imagenArticulo=> string,
contenido=> string,
NombreUsuario=> string,
imagenUsuario=> string,
correoUsuario=> string
Ejemplo JSON de Retorno:
[
    {
        "ID_Articulo": "2",
        "fecha": "2022-11-21",
        "titulo": "Nuevo",
        "imagenArticulo": "data:image/png;base64,...",
        "contenido": "Mas Texto",
        "NombreUsuario": "sss apellido",
        "imagenUsuario": "data:image/png;base64,...",
        "correoUsuario": "tuvieja@gmail.com"
    },
    {
        "ID_Articulo": "3",
        "fecha": "2022-11-21",
        "titulo": "unarticulo",
        "imagenArticulo": "data:image/png;base64,...",
        "contenido": "Mucho texto",
        "NombreUsuario": "Gola Manolas",
        "imagenUsuario": "data:image/png;base64,...",
        "correoUsuario": "Hola@gmail.com"
    }
]

### Archivo: seArticulo.php
Accion: Recibe el correo del autor y la id de un articulo y devuelve el articulo en cuestion
Datos requeridos: Valores por URL "GET"
Campos:
email=>string
id=>int UNSIGNED
Metodo: GET
Ejemplo de URL:
http://electronicanordeste.tplinkdns.com:5030/seArticulo.php?email=tuvieja@gmail.com&id=3
Retorna: JSON de 1 Elemento con Clave Valor:
ID_Articulo=>int UNSIGNED
correoAutor=>string
fecha=>datetime
titulo=>string
imagenArticulo=>string
contenido=>string