<?php

    require "define.php";
    
    $data = json_decode(file_get_contents('php://input'), true);
    
    // echo $data;
    // return;
    
    $eventDescription = ( isset( $_POST["eventDescription"] ) ? addslashes($_POST["eventDescription"]) : "" );
    $eventName = ( isset( $_POST["eventName"] ) ? addslashes($_POST["eventName"]) : "" );
    $eventDateTime = ( isset( $_POST["eventDateTime"] ) ? addslashes($_POST["eventDateTime"]) : "" );
    $action = ( isset( $_POST["action"] ) ? addslashes($_POST["action"]) : "" );
    $id = ( isset( $_POST["id"] ) ? addslashes($_POST["id"]) : "" );
    $def = ( isset( $_POST["def"] ) ? addslashes($_POST["def"]) : "" );
    $fileName = ( isset( $_POST["fileName"] ) ? addslashes($_POST["fileName"]) : "" );
    $baseImage = ( isset( $_POST["baseImage"] ) ? addslashes($_POST["baseImage"]) : "" );
    
    $eventDescription = ( $eventDescription == "" ) ? addslashes($data["eventDescription"]) : "";
    $eventName = ( $eventName == "" ) ? addslashes($data["eventName"]) : "";
    $eventDateTime = ( $eventDateTime == "" ) ? addslashes($data["eventDateTime"]) : "";
    $action = ( $action == "" ) ? addslashes($data["action"]) : "";
    $id = ( $id == "" ) ? addslashes($data["id"]) : "";
    $def = ( $def == "" ) ? addslashes($data["def"]) : "none";
    $fileName = ( $fileName == "" ) ? addslashes($data["fileName"]) : "";
    $baseImage = ( $baseImage == "" ) ? addslashes($data["baseImage"]) : "";
    
    $message = array();
    
    if($eventName == ""){
        $message = array(
            "status" => false,
            "text" => "Event Name is Required"
        );
        echo json_encode($message);
        return;
    }

    if($eventDateTime == ""){
        $message = array(
            "status" => false,
            "text" => "Event DateTime is Required"
        );
        echo json_encode($message);
        return;
    }
    
    $allowedExts = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "gif", "GIF");
    
    if ( $def == "block" ) :
        
        if( $fileName == "" ):
            
            $message = array(
                "status" => false,
                "text" => "Please Select File to Upload"
            );
            echo json_encode($message);
            return;
            
        endif;
        
    else :
        
        if( !isset($_FILES['feat_icon']) ):
            
            $message = array(
                "status" => false,
                "text" => "Please Select File to Upload"
            );
            echo json_encode($message);
            return;
            
        endif;
        
    endif;
    
    $temp = "";
    $file_name = "";
    $file_size = "";
    $file_tmp = "";
    $file_type = "";
    
    if ( $def == "none" ) :
        
        $file_name = $_FILES['feat_icon']['name'];
        $file_size = $_FILES['feat_icon']['size'];
        $file_tmp = $_FILES['feat_icon']['tmp_name'];
        $file_type = $_FILES['feat_icon']['type'];
        
        $temp = explode(".", $file_name);
        $file_ext = end($temp);
    
        if(in_array( $file_ext, $allowedExts )=== false){
            $errors = "File Type not allowed, please choose an Image file.";
            $message = array(
                "status" => false,
                "text" => $errors
            );
            echo json_encode($message);
            return;
        }
        
        if( $file_size > 358400 ){
            $errors = "File size must be Less 300KB";
            $message = array(
                "status" => false,
                "text" => $errors
            );
            echo json_encode($message);
            return;
        }
        
    endif;
    
    $mainDir = "https://projects.deelesisuanu.com/elliot-events/";
    
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $fileLocation = ( ( $def == "none" ) ? "images/" . $newfilename : "images/" . $fileName );
    
    $userFtIcon = $mainDir . $fileLocation;
    
    $sql = null;
    
    if($action == "edit"){
    }
    else{
        $sql = "INSERT INTO events (name, dateTime, description, feat_icon, def) VALUES ('$eventName', '$eventDateTime', '$eventDescription', '$userFtIcon', '$def')";
    }
    
    $rep = ( $action == "edit" ) ? "Updated" : "Created";
    $rep2 = ( $action == "edit" ) ? "Update" : "Create";
    
    $actionPerformed = ( ( $def == "none" ) ? $conn->query($sql) & move_uploaded_file( $file_tmp, $fileLocation) : $conn->query($sql) & file_put_contents( $fileLocation, base64_decode( $baseImage ) ) );
    
    if( $actionPerformed ){
        $message = array(
            "status" => true,
            "text" => "Event $rep Succesfully"
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