<?php
// $hostname = "localhost";
$username;
$password;
$database;
if (get_server_name() == 'http://f1230728.xsph.ru') {
    $username = "f1230728";
    $password = "6596sAv$#@";
    $database = "f1230728_atomy_bd";
} else {
    $username = "sysoev";
    $password = "6596sA$#";
    $database = "atomy_bd";
}
$mysqli = new mysqli("localhost", $username, $password, $database);
$mysqli->set_charset("utf8"); // если в таблице только цифры - то и не надо 
