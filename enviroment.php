<?php
$DB = new mysqli("electronicanordeste.tplinkdns.com", "appblog", "placido", "blog_php", 42321);
if ($DB->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $DB->connect_errno . ") " . $DB->connect_error;
}
?>