<?php

    require "define.php";

    $userId = ( isset( $_GET["eid"] ) ? addslashes($_GET["eid"]) : "" );

    if($userId == ""){
        echo "User ID is Required";
        return;
    }

    $sql = "DELETE FROM events WHERE id = '$userId'";

    if( $conn->query($sql) ){
        echo "success";
    }
    else{
        echo "Failed to Delete";
    }

?>