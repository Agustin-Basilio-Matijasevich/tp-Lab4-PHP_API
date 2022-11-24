<?php
$DB = new mysqli("electronicanordeste.tplinkdns.com", "appblog", "placido", "blog_php", 42321);
$serverStatus = $DB->connect_errno;
header('Access-Control-Allow-Origin:*');
?>