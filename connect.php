<?php

    $server = "localhost";
    $name = "root";
    $pass = "";
    $dbName = "php_basic_crud";

    $db = mysqli_connect($server,$name,$pass,$dbName);

    if($db == false){
        die('Error:' . mysqli_connect_error($db));
    }

?>