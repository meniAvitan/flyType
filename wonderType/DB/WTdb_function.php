<?php
function openDb(){
    include 'WTparameters.php';
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_schema);
    return $mysqli;
}
function closeDb($mysqli){
    mysqli_close($mysqli);
}
