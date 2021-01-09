<?php

    $serverName = "localhost";
    $user = "deelesis_csv_excel";
    $password = "8%DmvjJ[&x&u";
    $dbName = "deelesis_elliot_event";

    $conn = new mysqli($serverName, $user, $password, $dbName);

    if( $conn->connect_errno ){
        echo "Connection to Server Failed: ` $conn->connect_errno ` ";
        return;
    }

?>