<?php

header("content-type: text/html;charset=utf-8");

//Credenciais de acesso ao BD
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'estoque_desk');

$con = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);
$con->exec("SET CHARACTER SET utf8");
