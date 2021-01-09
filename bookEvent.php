<?php

    require "define.php";
    
    // print_r($_POST);
    $data = json_decode(file_get_contents('php://input'), true);
    // print_r($data);
    // return;
    
    $fullName = ( isset( $_POST["fullName"] ) ? addslashes($_POST["fullName"]) : ( isset( $_GET["fullName"] ) ) ? addslashes($_GET["fullName"]) : "" );
    $emailAddress = ( isset( $_POST["emailAddress"] ) ? addslashes($_POST["emailAddress"]) : ( isset( $_GET["emailAddress"] ) ) ? addslashes($_GET["emailAddress"]) : "" );
    $phoneNumber = ( isset( $_POST["phoneNumber"] ) ? addslashes($_POST["phoneNumber"]) : ( isset( $_GET["phoneNumber"] ) ) ? addslashes($_GET["phoneNumber"]) : "" );
    $eventId = ( isset( $_POST["eventId"] ) ? addslashes($_POST["eventId"]) : ( isset( $_GET["eventId"] ) ) ? addslashes($_GET["eventId"]) : "" );
    $action = ( isset( $_POST["action"] ) ? addslashes($_POST["action"]) : ( isset( $_GET["action"] ) ) ? addslashes($_GET["action"]) : "" );
    $id = ( isset( $_POST["id"] ) ? addslashes($_POST["id"]) : ( isset( $_GET["id"] ) ) ? addslashes($_GET["id"]) : "" );
    
    $fullName = ( $fullName == "" ) ? $data["fullName"] : "";
    $emailAddress = ( $emailAddress == "" ) ? $data["emailAddress"] : "";
    $phoneNumber = ( $phoneNumber == "" ) ? $data["phoneNumber"] : "";
    $eventId = ( $eventId == "" ) ? $data["eventId"] : "";
    // $action = ( $action == "" ) ? $data["action"] : "";
    // $id = ( $id == "" ) ? $data["id"] : "";
    
    if($fullName == ""){
        $message = array(
            "status" => false,
            "text" => "Full Name is Required"
        );
        echo json_encode($message);
        return;
    }
    
    if($emailAddress == ""){
        $message = array(
            "status" => false,
            "text" => "Email Address is Required"
        );
        echo json_encode($message);
        return;
    }
    
    if($phoneNumber == ""){
        $message = array(
            "status" => false,
            "text" => "Phone Number is Required"
        );
        echo json_encode($message);
        return;
    }
    
    if($eventId == ""){
        $message = array(
            "status" => false,
            "text" => "Event Id is Required"
        );
        echo json_encode($message);
        return;
    }
    
    $emailAddress = filter_var($emailAddress, FILTER_SANITIZE_EMAIL);
    
    if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)):
        $message = array(
            "status" => false,
            "text" => "Email Address Not Valid"
        );
        echo json_encode($message);
        return;
    endif;
    
    $sqlCheck = "SELECT * FROM bookings WHERE eventId = '$eventId' AND email = '$emailAddress'";
    $resultCheck = $conn->query($sqlCheck);
    $totalCount = $resultCheck->num_rows;
    
    $bookCode = alphaRandomString(8) . $eventId;
    
    $sql = null;
    
    if($action == "edit"){
    }
    else{
        $sql = "INSERT INTO bookings (fname, email, phone, eventId, bookCode) VALUES ('$fullName', '$emailAddress', '$phoneNumber', '$eventId', '$bookCode')";
    }
    
    $rep = ( $action == "edit" ) ? "Updated" : "Created";
    $rep2 = ( $action == "edit" ) ? "Update" : "Create";
    
    if($totalCount > 0):
        $message = array(
            "status" => false,
            "text" => "You have already Booked for this event, Please try another."
        );
        echo json_encode($message);
        return;
    endif;
    
    if( $conn->query($sql) ){
        $message = array(
            "status" => true,
            "text" => "Booking $rep Succesfully"
        );
        echo json_encode($message);
    }
    else{
        $message = array(
            "status" => false,
            "text" => "Failed to " . $rep2
        );
        echo json_encode($message);
    }

?>