<?php
include('localconfig.php');
$mysqli = new mysqli($config['host'],$config['username'],$config['password'],$config['database_name']);

if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
var_dump($_POST);
?>