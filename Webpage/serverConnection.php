<?php

define('serveris', 'localhost');
define('serveruser', 'root');
define('password', '');
define('database', 'user');

$link = mysqli_connect(serveris, serveruser, password, database);

if($link === false){
    die("ERROR: Pieslēgums nav izdevies ". mysqli_connect_error());
} else {
    echo "Pieslēgums izveidots";
}


?>