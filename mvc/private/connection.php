<?php

define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DBNAME', '25061_db');

$mysqli = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);

if ($mysqli->errno) {
    echo 'Connection error: ' . $mysqli->connect_errno . '<br>';
}
return $mysqli;