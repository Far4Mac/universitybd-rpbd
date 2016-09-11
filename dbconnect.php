<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'university');

function db_connect(){
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    return $dbc;
}