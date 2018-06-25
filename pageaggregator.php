<?php
include('localconfig.php');
setlocale(LC_CTYPE, 'POSIX');
error_reporting(E_ALL);
ini_set('display_errors', 1);
$mysqli = new mysqli($config['host'],$config['username'],$config['password'],$config['database_name']);
session_start();
if(!isset($_SESSION['time'] )){
    $_SESSION['time']     = time();
}

if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

if(isset($_POST['pageid'])) {
    if (isset($_POST['data'])) {
        $results = $mysqli->query("DELETE FROM aggregator WHERE sessionid = ".$_SESSION['time']." AND pageid=".$_POST['pageid']);

        if(!$results){
            print 'Error : ('. $mysqli->errno .') '. $mysqli->error;
        }
        $query = "INSERT INTO aggregator (sessionid, pageid, field, value) VALUES(?, ?, ?, ?)";
        foreach ($_POST['data'] as $field => $value) {
            $statement = $mysqli->prepare($query);

//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
            $statement->bind_param('siss', $_SESSION['time'],$_POST['pageid'], $field, $value);

            if (!$statement->execute()) {
                die('Error : (' . $mysqli->errno . ') ' . $mysqli->error);
            }
            $statement->close();
        }
    }

    switch ($_POST['pageid']) {
        case 1:
            include('page2.html');
            break;
        case 2:

    }
}
?>