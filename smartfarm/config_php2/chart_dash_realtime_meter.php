<?php
session_start();
require "../config_db/connectdb.php";
// $house_siteID = $_SESSION["site_id"];
// $houseID = $_SESSION["house_id"];

if(!isset($_SESSION["meter_load"])){ // g=
    $house_master = $_POST["house_master"];
    $start_day = date("Y/m/d - H:i:s", strtotime('-6 hour'));
    $stop_day = date("Y/m/d - H:i:ss");

    $row1 = $dbcon->query("SELECT * from tb3_meter_status  WHERE meter_status_sn = '$house_master' ORDER BY meter_status_id DESC LIMIT 1")->fetch();
    $row2 = $dbcon->query("SELECT * from tb3_meter_chenal_mode  WHERE meter_chenal_mode_sn = '$house_master' ORDER BY meter_chenal_mode_id DESC LIMIT 1")->fetch();
    
    $sncanel_1  = $row2["meter_chenal_1"];
    $sncanel_2  = $row2["meter_chenal_2"];
    $sncanel_3  = $row2["meter_chenal_3"];
    $sncanel_4  = $row2["meter_chenal_4"];
    $sncanel_5  = $row2["meter_chenal_5"];
    // $sncanel_6  = $row2["meter_chenal_6"];

    try {
        $sql = "SELECT data_timestamp,
                    round($sncanel_1, 1) AS new_1, round($sncanel_2, 1) AS new_2, round($sncanel_3, 1) AS new_3, round($sncanel_4, 1) AS new_4, round($sncanel_5, 1) AS new_5
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' ORDER BY data_timestamp ";
        $stmt = $dbcon->prepare($sql);
        $stmt->execute();
        // $num = $stmt->fetchColumn();
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    // echo $num;exit();
    // if($num['num'] !== 0){
        $inc = 1;
        $data0 = array();
        while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
            $data0["timestamp"] = $row["data_timestamp"];
            if ($row1["meter_status_v"] == 1) {
                $data0["chart_v"] = $row["new_1"];
            }
            if ($row1["meter_status_a"] == 1) {
                $data0["chart_a"] = $row["new_2"];
            }
            if ($row1["meter_status_p"] == 1) {
                $data0["chart_p"] = $row["new_3"];
            }
            if ($row1["meter_status_water"] == 1) {
                $data0["chart_wt"] = $row["new_4"];
            }
            if ($row1["meter_status_wind_speed"] == 1) {
                $data0["chart_ws"] = $row["new_5"];
            }

            $arr[] = $data0;
            $inc++;
        }
        if ($data0 == null) {
            echo json_encode("null");
        } else {
            $_SESSION["meter_load"] = "load_success";
            echo json_encode($arr);
        }
}else{
    echo json_encode($_SESSION["meter_load"]);
}
