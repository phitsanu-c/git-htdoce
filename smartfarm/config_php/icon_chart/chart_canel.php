<?php
    session_start();
    require "../../config_db/connectdb.php";
    // $house_siteID = $_SESSION["site_id"];
    // $houseID = $_SESSION["house_id"];
    $house_master = $_POST["house_master"]; // $_SESSION["house_master"];
    $status = $_POST["status"];
    if($status == "day"){
        $start_day = date("Y/m/d - H:i:s",strtotime('-1 day'));
        $stop_day = date("Y/m/d - H:i:ss");
    }elseif($status == "week"){
        $start_day = date("Y/m/d - H:i:s",strtotime('-7 day'));
        $stop_day = date("Y/m/d - H:i:ss");
    }elseif($status == "month"){
        $start_day = date("Y/m/d - H:i:s",strtotime('-30 day'));
        $stop_day = date("Y/m/d - H:i:ss");
    }elseif($status == "formto"){
        $start_day = $_POST["start"];
        $stop_day = $_POST["stop"];
    }
    $cannel =  $_POST["canel"];
    $mode =  $_POST["mode"];
    if($mode == 4 || $mode == 5){
        if($house_master == "KMUMT001"){
            $new_sncanel  = $cannel;
        }else{
            $new_sncanel  = $cannel."/1000";
        }
    }elseif($mode == 6 || $mode == 7){
        if($house_master == "KMUMT001"){
            $new_sncanel  = $cannel;
        }else{
            $new_sncanel  = $cannel."/54";
        }
    }else {
        $new_sncanel  = $cannel;
    }

    try{
        if($_POST["sel_time"] == 2){ // ทุก 5 นาที
            $sql = "SELECT data_timestamp,
                    round($new_sncanel, 1) AS new_data
                    FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' AND mod(minute(`data_time`),5) = 0
                    ORDER BY data_timestamp "; 
        }else if($_POST["sel_time"] == 3){ // ทุก 10 นาที
            $sql = "SELECT data_timestamp,
                    round($new_sncanel, 1) AS new_data
                    FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' AND mod(minute(`data_time`),10) = 0
                    ORDER BY data_timestamp "; 
        }else if($_POST["sel_time"] == 4){ // ทุก 15 นาที
            $sql = "SELECT data_timestamp,
                    round($new_sncanel, 1) AS new_data
                    FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' AND mod(minute(`data_time`),15) = 0
                    ORDER BY data_timestamp "; 
        }else if($_POST["sel_time"] == 5){ // ทุก 10 นาที
            $sql = "SELECT data_timestamp,
                    round($new_sncanel, 1) AS new_data
                    FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' AND mod(minute(`data_time`),30) = 0
                    ORDER BY data_timestamp "; 
        }else if($_POST["sel_time"] == 6){ // ทุก 10 นาที
            $sql = "SELECT data_timestamp,
                    round($new_sncanel, 1) AS new_data
                    FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' AND mod(minute(`data_time`),60) = 0
                    ORDER BY data_timestamp "; 
        }else{
            $sql = "SELECT data_timestamp,
                    round($new_sncanel, 1) AS new_data
                    FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                    ORDER BY data_timestamp "; // AND DataST1_1 > 0 
        }
        $stmt = $dbcon->prepare($sql);
        $stmt->execute();
    }catch(Exception $ex){
        echo $ex->getMessage();
    }
    $inc = 1;
    $data0 = array();
    while($row = $stmt->fetch(PDO::FETCH_BOTH)){
        // $show=explode("-",$row["data_timestamp"]);
        // $data0["data_timestamp"] = strtotime($show[0].$show[1]);
        $data0["timestamp"] = $row["data_timestamp"];
        $data0["chart_data"] = $row["new_data"];
       
        $arr[] = $data0;
    $inc++;
    }
    if($data0 == null){
        echo json_encode("null");
    }else{
        echo json_encode($arr);
    }
