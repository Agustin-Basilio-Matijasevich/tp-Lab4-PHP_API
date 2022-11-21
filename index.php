<?php
require_once('enviroment.php');

$sql = $DB->query("call seUsuario ('tuvieja@gmail.com')");

var_dump($sql->fetch_all());

?>