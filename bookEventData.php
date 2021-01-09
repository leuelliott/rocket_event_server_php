<?php

    require "define.php";
    
    $id = ( isset( $_POST["id"] ) ? addslashes($_POST["id"]) : ( isset( $_GET["id"] ) ) ? addslashes($_GET["id"]) : "" );
    $email = ( isset( $_POST["email"] ) ? addslashes($_POST["email"]) : ( isset( $_GET["email"] ) ) ? addslashes($_GET["email"]) : "" );
    
    $sql = null;
    
    if($id == "" || $email == ""):
        
        $sql = "SELECT * FROM bookings ORDER BY created DESC";
        
    else:
        
        if($id != ""):
            
            $sql = "SELECT * FROM bookings WHERE id = '$id' ORDER BY created DESC";
            
        elseif($email != ""):
            
            $sql = "SELECT * FROM bookings WHERE email = '$email' ORDER BY created DESC";
            
        endif;
        
    endif;
    
    $result = $conn->query($sql);

    $arr = array();

    if( $result->num_rows > 0 ){
        
        while( $rowData = $result->fetch_assoc() ){

            $id = $rowData["id"];
            $fname = $rowData["fname"];
            $email = $rowData["email"];
            $phone = $rowData["phone"];
            $eventId = $rowData["eventId"];
            $bookingCode = $rowData["bookCode"];
            $created = $rowData["created"];
            
            $eventName = getEventName($conn, $eventId);
            
            $subArr = array(
                "id" => $id,
                "fname" => $fname,
                "email" => $email,
                "phone" => $phone,
                "eventName" => $eventName,
                "eventId" => $eventId,
                "created" => $created,
                "bookingCode" => $bookingCode,
            );

            array_push($arr, $subArr);

        }


    }
    else{
        echo json_encode($arr);
    }

    echo json_encode($arr);

    // convert json to array => json_decode($arrayName, true);
    
?>