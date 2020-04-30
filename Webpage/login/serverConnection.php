<?php

define('serveris', 'localhost');
define('serveruser', 'root');
define('password', '');
define('database', 'EMF_Scanner_Users');

$link = mysqli_connect(serveris, serveruser, password, database);

if($link === false){
    die("ERROR: Connection failed! ". mysqli_connect_error());
} else {
    // echo "Connection established";
}


?>