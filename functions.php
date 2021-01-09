<?php

    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    function time_elapsed_hours($datetime, $full = false) {

        $now = new DateTime;
        $ago = new DateTime($datetime);

        $diff = $now->diff($ago);

        $hours = $diff->h;
        $hours = $hours + ($diff->days*24);

        return $hours;

    }
    
    function alphaRandomString($length_of_string) {
        
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result),  0, $length_of_string); 
        
    }
    
    function fetch_data($table, $row, $col, $val, $operations)
    {
        $data = "";
        $sql = "SELECT * FROM `$table` WHERE {$row} = '$col'";
        $query = $operations->retrieve($sql);
        $result = json_decode($query);
        foreach ($result as $key => $res):
            $data = $res->$val;
        endforeach;
        return $data;
    }
    
    function getEventName($conn, $eventId){
        
        $eventName = "";
        $sql = "SELECT * FROM events WHERE id = '$eventId'";
        $result = $conn->query($sql);
        if( $result->num_rows > 0 ){
            if( $rowData = $result->fetch_assoc() ){
                $eventName = $rowData["name"];
            }
        }
        
        return $eventName;
        
    }
    
    function cleanUpString($num){
        $num2 = substr($num, 0, 1);
        if($num2 == "0" || $num2 == 0) {
            $num = substr($num, 1);
            return $num;
        }
        return $num;
    }
    
    
    function getOrdinal($number){
        // get first digit
        $digit = abs($number) % 10;
        $ext = 'th';
        // if the last two digits are between 4 and 21 add a th
        if(abs($number) %100 < 21 && abs($number) %100 > 4){
            $ext = 'th';
        }
        else{
            if($digit < 4){
                $ext = 'rd';
            }
            
            if($digit < 3){
                $ext = 'nd';
            }
            
            if($digit < 2){
                $ext = 'st';
            }
            
            if($digit < 1){
                $ext = 'th';
            }
        }
        return $number.$ext;
    }

?>