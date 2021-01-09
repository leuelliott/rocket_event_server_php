<?php

    require "define.php";
    
    $id = ( isset( $_POST["eid"] ) ? addslashes($_POST["eid"]) : ( isset( $_GET["eid"] ) ) ? addslashes($_GET["eid"]) : "" );
    $sql = null;
    
    if($id == ""):
        $sql = "SELECT * FROM events ORDER BY created DESC";
    else:
        $sql = "SELECT * FROM events WHERE id = '$id' ORDER BY created DESC";
    endif;
    
    $result = $conn->query($sql);

    $arr = array();

    if( $result->num_rows > 0 ){
        
        while( $rowData = $result->fetch_assoc() ){

            $id = $rowData["id"];
            $name = $rowData["name"];
            $dateTime = $rowData["dateTime"];
            $description = $rowData["description"];
            $feat_icon = $rowData["feat_icon"];
            $def = $rowData["def"];
            
            $dayOfWeek2 = "";
            $dayofMonth = "";
            $month = "";
            $fullDate = $dateTime;
            
            if($def != "block"):
                
                $datetime = new DateTime($dateTime);
                $dayOfWeek = $datetime->format('l');
                $dayOfWeek2 = mb_substr($dayOfWeek, 0, 3);
                $dayofMonth = $datetime->format('d');
                $month = $datetime->format('M');
                $year = $datetime->format('Y');
                $dayofMonth = cleanUpString($dayofMonth);
                $fullDate = $dayOfWeek . " " . getOrdinal($dayofMonth) . " of " . $month . " " . $year;
                
            endif;

            $subArr = array(
                "id" => $id,
                "name" => $name,
                "dateTime" => $dateTime,
                "description" => $description,
                "icon" => $feat_icon,
                "day" => $dayOfWeek2,
                "dayMonth" => $dayofMonth,
                "month" => $month,
                "fullDate" => $fullDate,
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