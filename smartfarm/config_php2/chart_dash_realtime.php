<?php
session_start();
require "../config_db/connectdb.php";
// $house_siteID = $_SESSION["site_id"];
// $houseID = $_SESSION["house_id"];
$house_master = $_POST["house_master"];
$start_day = date("Y/m/d - H:i:s", strtotime('-6 hour'));
$stop_day = date("Y/m/d - H:i:ss");

$stmt1 = $dbcon->prepare("SELECT * from tb3_dashstatus WHERE dashstatus_sn = '$house_master' order by dashstatus_id limit 1");
$stmt1->execute();
$row1 = $stmt1->fetch();

$count_dash = $row1["dashstatus_1_1"] + $row1["dashstatus_1_2"] + $row1["dashstatus_1_3"] + $row1["dashstatus_1_4"] +
              $row1["dashstatus_2_1"] + $row1["dashstatus_2_2"] + $row1["dashstatus_2_3"] + $row1["dashstatus_2_4"] +
              $row1["dashstatus_3_1"] + $row1["dashstatus_3_2"] + $row1["dashstatus_3_3"] + $row1["dashstatus_3_4"] +
              $row1["dashstatus_4_1"] + $row1["dashstatus_4_2"] + $row1["dashstatus_4_3"] + $row1["dashstatus_4_4"] +
              $row1["dashstatus_5_1"] + $row1["dashstatus_5_2"] + $row1["dashstatus_5_3"] + $row1["dashstatus_5_4"] +
              $row1["dashstatus_6_1"] + $row1["dashstatus_6_2"] + $row1["dashstatus_6_3"] + $row1["dashstatus_6_4"] +
              $row1["dashstatus_7_1"] + $row1["dashstatus_7_2"] + $row1["dashstatus_7_3"] + $row1["dashstatus_7_4"] +
              $row1["dashstatus_8_1"] + $row1["dashstatus_8_2"] + $row1["dashstatus_8_3"] + $row1["dashstatus_8_4"] +
              $row1["dashstatus_9_1"] + $row1["dashstatus_9_2"] + $row1["dashstatus_9_3"] + $row1["dashstatus_9_4"] +
              $row1["dashstatus_10_1"] + $row1["dashstatus_10_2"] + $row1["dashstatus_10_3"] + $row1["dashstatus_10_4"];

$stmt3 = $dbcon->prepare("SELECT * from tb3_statussn  WHERE statussn_sn = '$house_master' ");
$stmt3->execute();
$row3 = $stmt3->fetch();

$stmt4 = $dbcon->prepare("SELECT * from tb3_sncanel  WHERE sncanel_sn = '$house_master' ");
$stmt4->execute();
$row4 = $stmt4->fetch();
// echo $row4["sncanel_1_1"] . "/1000";
// exit();
    if ($row3["statussn_1_1"] == 4 || $row3["statussn_1_1"] == 5) { $sncanel_1_1  = $row4["sncanel_1_1"] . "/1000"; } elseif ($row3["statussn_1_1"] == 6 || $row3["statussn_1_1"] == 7) { $sncanel_1_1  = $row4["sncanel_1_1"] . "/54"; } else { $sncanel_1_1  = $row4["sncanel_1_1"]; }
    if ($row3["statussn_1_2"] == 4 || $row3["statussn_1_2"] == 5) { $sncanel_1_2  = $row4["sncanel_1_2"] . "/1000"; } elseif ($row3["statussn_1_2"] == 6 || $row3["statussn_1_2"] == 7) { $sncanel_1_2  = $row4["sncanel_1_2"] . "/54"; } else { $sncanel_1_2  = $row4["sncanel_1_2"]; }
    if($house_master == "KMUMT001"){
        $sncanel_1_3  = $row4["sncanel_1_3"];
    }else{
        if ($row3["statussn_1_3"] == 4 || $row3["statussn_1_3"] == 5) { $sncanel_1_3  = $row4["sncanel_1_3"] . "/1000"; } elseif ($row3["statussn_1_3"] == 6 || $row3["statussn_1_3"] == 7) { $sncanel_1_3  = $row4["sncanel_1_3"] . "/54"; } else { $sncanel_1_3  = $row4["sncanel_1_3"]; }
    }
    if ($row3["statussn_1_4"] == 4 || $row3["statussn_1_4"] == 5) { $sncanel_1_4  = $row4["sncanel_1_4"] . "/1000"; } elseif ($row3["statussn_1_4"] == 6 || $row3["statussn_1_4"] == 7) { $sncanel_1_4  = $row4["sncanel_1_4"] . "/54"; } else { $sncanel_1_4  = $row4["sncanel_1_4"]; }
    if ($row3["statussn_2_1"] == 4 || $row3["statussn_2_1"] == 5) { $sncanel_2_1  = $row4["sncanel_2_1"] . "/1000"; } elseif ($row3["statussn_2_1"] == 6 || $row3["statussn_2_1"] == 7) { $sncanel_2_1  = $row4["sncanel_2_1"] . "/54"; } else { $sncanel_2_1  = $row4["sncanel_2_1"]; }
    if ($row3["statussn_2_2"] == 4 || $row3["statussn_2_2"] == 5) { $sncanel_2_2  = $row4["sncanel_2_2"] . "/1000"; } elseif ($row3["statussn_2_2"] == 6 || $row3["statussn_2_2"] == 7) { $sncanel_2_2  = $row4["sncanel_2_2"] . "/54"; } else { $sncanel_2_2  = $row4["sncanel_2_2"]; }
    if($house_master == "KMUMT001"){
        $sncanel_2_3  = $row4["sncanel_2_3"];
    }else{
        if ($row3["statussn_2_3"] == 4 || $row3["statussn_2_3"] == 5) { $sncanel_2_3  = $row4["sncanel_2_3"] . "/1000"; } elseif ($row3["statussn_2_3"] == 6 || $row3["statussn_2_3"] == 7) { $sncanel_2_3  = $row4["sncanel_2_3"] . "/54"; } else { $sncanel_2_3  = $row4["sncanel_2_3"]; }
    }
    if ($row3["statussn_2_4"] == 4 || $row3["statussn_2_4"] == 5) { $sncanel_2_4  = $row4["sncanel_2_4"] . "/1000"; } elseif ($row3["statussn_2_4"] == 6 || $row3["statussn_2_4"] == 7) { $sncanel_2_4  = $row4["sncanel_2_4"] . "/54"; } else { $sncanel_2_4  = $row4["sncanel_2_4"]; }
    if ($row3["statussn_3_1"] == 4 || $row3["statussn_3_1"] == 5) { $sncanel_3_1  = $row4["sncanel_3_1"] . "/1000"; } elseif ($row3["statussn_3_1"] == 6 || $row3["statussn_3_1"] == 7) { $sncanel_3_1  = $row4["sncanel_3_1"] . "/54"; } else { $sncanel_3_1  = $row4["sncanel_3_1"]; }
    if ($row3["statussn_3_2"] == 4 || $row3["statussn_3_2"] == 5) { $sncanel_3_2  = $row4["sncanel_3_2"] . "/1000"; } elseif ($row3["statussn_3_2"] == 6 || $row3["statussn_3_2"] == 7) { $sncanel_3_2  = $row4["sncanel_3_2"] . "/54"; } else { $sncanel_3_2  = $row4["sncanel_3_2"]; }
    if ($row3["statussn_3_3"] == 4 || $row3["statussn_3_3"] == 5) { $sncanel_3_3  = $row4["sncanel_3_3"] . "/1000"; } elseif ($row3["statussn_3_3"] == 6 || $row3["statussn_3_3"] == 7) { $sncanel_3_3  = $row4["sncanel_3_3"] . "/54"; } else { $sncanel_3_3  = $row4["sncanel_3_3"]; }
    if ($row3["statussn_3_4"] == 4 || $row3["statussn_3_4"] == 5) { $sncanel_3_4  = $row4["sncanel_3_4"] . "/1000"; } elseif ($row3["statussn_3_4"] == 6 || $row3["statussn_3_4"] == 7) { $sncanel_3_4  = $row4["sncanel_3_4"] . "/54"; } else { $sncanel_3_4  = $row4["sncanel_3_4"]; }
    if ($row3["statussn_4_1"] == 4 || $row3["statussn_4_1"] == 5) { $sncanel_4_1  = $row4["sncanel_4_1"] . "/1000"; } elseif ($row3["statussn_4_1"] == 6 || $row3["statussn_4_1"] == 7) { $sncanel_4_1  = $row4["sncanel_4_1"] . "/54"; } else { $sncanel_4_1  = $row4["sncanel_4_1"]; }
    if ($row3["statussn_4_2"] == 4 || $row3["statussn_4_2"] == 5) { $sncanel_4_2  = $row4["sncanel_4_2"] . "/1000"; } elseif ($row3["statussn_4_2"] == 6 || $row3["statussn_4_2"] == 7) { $sncanel_4_2  = $row4["sncanel_4_2"] . "/54"; } else { $sncanel_4_2  = $row4["sncanel_4_2"]; }
    if ($row3["statussn_4_3"] == 4 || $row3["statussn_4_3"] == 5) { $sncanel_4_3  = $row4["sncanel_4_3"] . "/1000"; } elseif ($row3["statussn_4_3"] == 6 || $row3["statussn_4_3"] == 7) { $sncanel_4_3  = $row4["sncanel_4_3"] . "/54"; } else { $sncanel_4_3  = $row4["sncanel_4_3"]; }
    if ($row3["statussn_4_4"] == 4 || $row3["statussn_4_4"] == 5) { $sncanel_4_4  = $row4["sncanel_4_4"] . "/1000"; } elseif ($row3["statussn_4_4"] == 6 || $row3["statussn_4_4"] == 7) { $sncanel_4_4  = $row4["sncanel_4_4"] . "/54"; } else { $sncanel_4_4  = $row4["sncanel_4_4"]; }
    if ($row3["statussn_5_1"] == 4 || $row3["statussn_5_1"] == 5) { $sncanel_5_1  = $row4["sncanel_5_1"] . "/1000"; } elseif ($row3["statussn_5_1"] == 6 || $row3["statussn_5_1"] == 7) { $sncanel_5_1  = $row4["sncanel_5_1"] . "/54"; } else { $sncanel_5_1  = $row4["sncanel_5_1"]; }
    if ($row3["statussn_5_2"] == 4 || $row3["statussn_5_2"] == 5) { $sncanel_5_2  = $row4["sncanel_5_2"] . "/1000"; } elseif ($row3["statussn_5_2"] == 6 || $row3["statussn_5_2"] == 7) { $sncanel_5_2  = $row4["sncanel_5_2"] . "/54"; } else { $sncanel_5_2  = $row4["sncanel_5_2"]; }
    if ($row3["statussn_5_3"] == 4 || $row3["statussn_5_3"] == 5) { $sncanel_5_3  = $row4["sncanel_5_3"] . "/1000"; } elseif ($row3["statussn_5_3"] == 6 || $row3["statussn_5_3"] == 7) { $sncanel_5_3  = $row4["sncanel_5_3"] . "/54"; } else { $sncanel_5_3  = $row4["sncanel_5_3"]; }
    if ($row3["statussn_5_4"] == 4 || $row3["statussn_5_4"] == 5) { $sncanel_5_4  = $row4["sncanel_5_4"] . "/1000"; } elseif ($row3["statussn_5_4"] == 6 || $row3["statussn_5_4"] == 7) { $sncanel_5_4  = $row4["sncanel_5_4"] . "/54"; } else { $sncanel_5_4  = $row4["sncanel_5_4"]; }
    if ($row3["statussn_6_1"] == 4 || $row3["statussn_6_1"] == 5) { $sncanel_6_1  = $row4["sncanel_6_1"] . "/1000"; } elseif ($row3["statussn_6_1"] == 6 || $row3["statussn_6_1"] == 7) { $sncanel_6_1  = $row4["sncanel_6_1"] . "/54"; } else { $sncanel_6_1  = $row4["sncanel_6_1"]; }
    if ($row3["statussn_6_2"] == 4 || $row3["statussn_6_2"] == 5) { $sncanel_6_2  = $row4["sncanel_6_2"] . "/1000"; } elseif ($row3["statussn_6_2"] == 6 || $row3["statussn_6_2"] == 7) { $sncanel_6_2  = $row4["sncanel_6_2"] . "/54"; } else { $sncanel_6_2  = $row4["sncanel_6_2"]; }
    if ($row3["statussn_6_3"] == 4 || $row3["statussn_6_3"] == 5) { $sncanel_6_3  = $row4["sncanel_6_3"] . "/1000"; } elseif ($row3["statussn_6_3"] == 6 || $row3["statussn_6_3"] == 7) { $sncanel_6_3  = $row4["sncanel_6_3"] . "/54"; } else { $sncanel_6_3  = $row4["sncanel_6_3"]; }
    if ($row3["statussn_6_4"] == 4 || $row3["statussn_6_4"] == 5) { $sncanel_6_4  = $row4["sncanel_6_4"] . "/1000"; } elseif ($row3["statussn_6_4"] == 6 || $row3["statussn_6_4"] == 7) { $sncanel_6_4  = $row4["sncanel_6_4"] . "/54"; } else { $sncanel_6_4  = $row4["sncanel_6_4"]; }
    if ($row3["statussn_7_1"] == 4 || $row3["statussn_7_1"] == 5) { $sncanel_7_1  = $row4["sncanel_7_1"] . "/1000"; } elseif ($row3["statussn_7_1"] == 6 || $row3["statussn_7_1"] == 7) { $sncanel_7_1  = $row4["sncanel_7_1"] . "/54"; } else { $sncanel_7_1  = $row4["sncanel_7_1"]; }
    if ($row3["statussn_7_2"] == 4 || $row3["statussn_7_2"] == 5) { $sncanel_7_2  = $row4["sncanel_7_2"] . "/1000"; } elseif ($row3["statussn_7_2"] == 6 || $row3["statussn_7_2"] == 7) { $sncanel_7_2  = $row4["sncanel_7_2"] . "/54"; } else { $sncanel_7_2  = $row4["sncanel_7_2"]; }
    if ($row3["statussn_7_3"] == 4 || $row3["statussn_7_3"] == 5) { $sncanel_7_3  = $row4["sncanel_7_3"] . "/1000"; } elseif ($row3["statussn_7_3"] == 6 || $row3["statussn_7_3"] == 7) { $sncanel_7_3  = $row4["sncanel_7_3"] . "/54"; } else { $sncanel_7_3  = $row4["sncanel_7_3"]; }
    if ($row3["statussn_7_4"] == 4 || $row3["statussn_7_4"] == 5) { $sncanel_7_4  = $row4["sncanel_7_4"] . "/1000"; } elseif ($row3["statussn_7_4"] == 6 || $row3["statussn_7_4"] == 7) { $sncanel_7_4  = $row4["sncanel_7_4"] . "/54"; } else { $sncanel_7_4  = $row4["sncanel_7_4"]; }
    if ($row3["statussn_8_1"] == 4 || $row3["statussn_8_1"] == 5) { $sncanel_8_1  = $row4["sncanel_8_1"] . "/1000"; } elseif ($row3["statussn_8_1"] == 6 || $row3["statussn_8_1"] == 7) { $sncanel_8_1  = $row4["sncanel_8_1"] . "/54"; } else { $sncanel_8_1  = $row4["sncanel_8_1"]; }
    if ($row3["statussn_8_2"] == 4 || $row3["statussn_8_2"] == 5) { $sncanel_8_2  = $row4["sncanel_8_2"] . "/1000"; } elseif ($row3["statussn_8_2"] == 6 || $row3["statussn_8_2"] == 7) { $sncanel_8_2  = $row4["sncanel_8_2"] . "/54"; } else { $sncanel_8_2  = $row4["sncanel_8_2"]; }
    if ($row3["statussn_8_3"] == 4 || $row3["statussn_8_3"] == 5) { $sncanel_8_3  = $row4["sncanel_8_3"] . "/1000"; } elseif ($row3["statussn_8_3"] == 6 || $row3["statussn_8_3"] == 7) { $sncanel_8_3  = $row4["sncanel_8_3"] . "/54"; } else { $sncanel_8_3  = $row4["sncanel_8_3"]; }
    if ($row3["statussn_8_4"] == 4 || $row3["statussn_8_4"] == 5) { $sncanel_8_4  = $row4["sncanel_8_4"] . "/1000"; } elseif ($row3["statussn_8_4"] == 6 || $row3["statussn_8_4"] == 7) { $sncanel_8_4  = $row4["sncanel_8_4"] . "/54"; } else { $sncanel_8_4  = $row4["sncanel_8_4"]; }
    if ($row3["statussn_9_1"] == 4 || $row3["statussn_9_1"] == 5) { $sncanel_9_1  = $row4["sncanel_9_1"] . "/1000"; } elseif ($row3["statussn_9_1"] == 6 || $row3["statussn_9_1"] == 7) { $sncanel_9_1  = $row4["sncanel_9_1"] . "/54"; } else { $sncanel_9_1  = $row4["sncanel_9_1"]; }
    if ($row3["statussn_9_2"] == 4 || $row3["statussn_9_2"] == 5) { $sncanel_9_2  = $row4["sncanel_9_2"] . "/1000"; } elseif ($row3["statussn_9_2"] == 6 || $row3["statussn_9_2"] == 7) { $sncanel_9_2  = $row4["sncanel_9_2"] . "/54"; } else { $sncanel_9_2  = $row4["sncanel_9_2"]; }
    if ($row3["statussn_9_3"] == 4 || $row3["statussn_9_3"] == 5) { $sncanel_9_3  = $row4["sncanel_9_3"] . "/1000"; } elseif ($row3["statussn_9_3"] == 6 || $row3["statussn_9_3"] == 7) { $sncanel_9_3  = $row4["sncanel_9_3"] . "/54"; } else { $sncanel_9_3  = $row4["sncanel_9_3"]; }
    if ($row3["statussn_9_4"] == 4 || $row3["statussn_9_4"] == 5) { $sncanel_9_4  = $row4["sncanel_9_4"] . "/1000"; } elseif ($row3["statussn_9_4"] == 6 || $row3["statussn_9_4"] == 7) { $sncanel_9_4  = $row4["sncanel_9_4"] . "/54"; } else { $sncanel_9_4  = $row4["sncanel_9_4"]; }
    if ($row3["statussn_10_1"] == 4 || $row3["statussn_10_1"] == 5) { $sncanel_10_1  = $row4["sncanel_10_1"] . "/1000"; } elseif ($row3["statussn_10_1"] == 6 || $row3["statussn_10_1"] == 7) { $sncanel_10_1  = $row4["sncanel_10_1"] . "/54"; } else { $sncanel_10_1  = $row4["sncanel_10_1"]; }
    if ($row3["statussn_10_2"] == 4 || $row3["statussn_10_2"] == 5) { $sncanel_10_2  = $row4["sncanel_10_2"] . "/1000"; } elseif ($row3["statussn_10_2"] == 6 || $row3["statussn_10_2"] == 7) { $sncanel_10_2  = $row4["sncanel_10_2"] . "/54"; } else { $sncanel_10_2  = $row4["sncanel_10_2"]; }
    if ($row3["statussn_10_3"] == 4 || $row3["statussn_10_3"] == 5) { $sncanel_10_3  = $row4["sncanel_10_3"] . "/1000"; } elseif ($row3["statussn_10_3"] == 6 || $row3["statussn_10_3"] == 7) { $sncanel_10_3  = $row4["sncanel_10_3"] . "/54"; } else { $sncanel_10_3  = $row4["sncanel_10_3"]; }
    if ($row3["statussn_10_4"] == 4 || $row3["statussn_10_4"] == 5) { $sncanel_10_4  = $row4["sncanel_10_4"] . "/1000"; } elseif ($row3["statussn_10_4"] == 6 || $row3["statussn_10_4"] == 7) { $sncanel_10_4  = $row4["sncanel_10_4"] . "/54"; } else { $sncanel_10_4  = $row4["sncanel_10_4"]; }


try {
    if($count_dash == 1){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 2){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 3){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 4){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 5){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 6){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 7){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 8){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 9){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 10){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 11){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 12){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 13){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 14){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 15){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 16){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 17){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 18){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 19){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 20){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 21){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 22){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 23){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2, round($sncanel_6_3, 1) AS new_6_3
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 24){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2, round($sncanel_6_3, 1) AS new_6_3, round($sncanel_6_4, 1) AS new_6_4
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 25){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2, round($sncanel_6_3, 1) AS new_6_3, round($sncanel_6_4, 1) AS new_6_4,
                    round($sncanel_7_1, 1) AS new_7_1
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 26){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2, round($sncanel_6_3, 1) AS new_6_3, round($sncanel_6_4, 1) AS new_6_4,
                    round($sncanel_7_1, 1) AS new_7_1, round($sncanel_7_2, 1) AS new_7_2
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 27){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2, round($sncanel_6_3, 1) AS new_6_3, round($sncanel_6_4, 1) AS new_6_4,
                    round($sncanel_7_1, 1) AS new_7_1, round($sncanel_7_2, 1) AS new_7_2, round($sncanel_7_3, 1) AS new_7_3
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 28){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2, round($sncanel_6_3, 1) AS new_6_3, round($sncanel_6_4, 1) AS new_6_4,
                    round($sncanel_7_1, 1) AS new_7_1, round($sncanel_7_2, 1) AS new_7_2, round($sncanel_7_3, 1) AS new_7_3, round($sncanel_7_4, 1) AS new_7_4
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 29){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2, round($sncanel_6_3, 1) AS new_6_3, round($sncanel_6_4, 1) AS new_6_4,
                    round($sncanel_7_1, 1) AS new_7_1, round($sncanel_7_2, 1) AS new_7_2, round($sncanel_7_3, 1) AS new_7_3, round($sncanel_7_4, 1) AS new_7_4,
                    round($sncanel_8_1, 1) AS new_8_1
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 30){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2, round($sncanel_6_3, 1) AS new_6_3, round($sncanel_6_4, 1) AS new_6_4,
                    round($sncanel_7_1, 1) AS new_7_1, round($sncanel_7_2, 1) AS new_7_2, round($sncanel_7_3, 1) AS new_7_3, round($sncanel_7_4, 1) AS new_7_4,
                    round($sncanel_8_1, 1) AS new_8_1, round($sncanel_8_2, 1) AS new_8_2
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 31){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2, round($sncanel_6_3, 1) AS new_6_3, round($sncanel_6_4, 1) AS new_6_4,
                    round($sncanel_7_1, 1) AS new_7_1, round($sncanel_7_2, 1) AS new_7_2, round($sncanel_7_3, 1) AS new_7_3, round($sncanel_7_4, 1) AS new_7_4,
                    round($sncanel_8_1, 1) AS new_8_1, round($sncanel_8_2, 1) AS new_8_2, round($sncanel_8_3, 1) AS new_8_3
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 32){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2, round($sncanel_6_3, 1) AS new_6_3, round($sncanel_6_4, 1) AS new_6_4,
                    round($sncanel_7_1, 1) AS new_7_1, round($sncanel_7_2, 1) AS new_7_2, round($sncanel_7_3, 1) AS new_7_3, round($sncanel_7_4, 1) AS new_7_4,
                    round($sncanel_8_1, 1) AS new_8_1, round($sncanel_8_2, 1) AS new_8_2, round($sncanel_8_3, 1) AS new_8_3, round($sncanel_8_4, 1) AS new_8_4
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 33){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2, round($sncanel_6_3, 1) AS new_6_3, round($sncanel_6_4, 1) AS new_6_4,
                    round($sncanel_7_1, 1) AS new_7_1, round($sncanel_7_2, 1) AS new_7_2, round($sncanel_7_3, 1) AS new_7_3, round($sncanel_7_4, 1) AS new_7_4,
                    round($sncanel_8_1, 1) AS new_8_1, round($sncanel_8_2, 1) AS new_8_2, round($sncanel_8_3, 1) AS new_8_3, round($sncanel_8_4, 1) AS new_8_4,
                    round($sncanel_9_1, 1) AS new_9_1
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 34){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2, round($sncanel_6_3, 1) AS new_6_3, round($sncanel_6_4, 1) AS new_6_4,
                    round($sncanel_7_1, 1) AS new_7_1, round($sncanel_7_2, 1) AS new_7_2, round($sncanel_7_3, 1) AS new_7_3, round($sncanel_7_4, 1) AS new_7_4,
                    round($sncanel_8_1, 1) AS new_8_1, round($sncanel_8_2, 1) AS new_8_2, round($sncanel_8_3, 1) AS new_8_3, round($sncanel_8_4, 1) AS new_8_4,
                    round($sncanel_9_1, 1) AS new_9_1, round($sncanel_9_2, 1) AS new_9_2
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 35){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2, round($sncanel_6_3, 1) AS new_6_3, round($sncanel_6_4, 1) AS new_6_4,
                    round($sncanel_7_1, 1) AS new_7_1, round($sncanel_7_2, 1) AS new_7_2, round($sncanel_7_3, 1) AS new_7_3, round($sncanel_7_4, 1) AS new_7_4,
                    round($sncanel_8_1, 1) AS new_8_1, round($sncanel_8_2, 1) AS new_8_2, round($sncanel_8_3, 1) AS new_8_3, round($sncanel_8_4, 1) AS new_8_4,
                    round($sncanel_9_1, 1) AS new_9_1, round($sncanel_9_2, 1) AS new_9_2, round($sncanel_9_3, 1) AS new_9_3
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 36){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2, round($sncanel_6_3, 1) AS new_6_3, round($sncanel_6_4, 1) AS new_6_4,
                    round($sncanel_7_1, 1) AS new_7_1, round($sncanel_7_2, 1) AS new_7_2, round($sncanel_7_3, 1) AS new_7_3, round($sncanel_7_4, 1) AS new_7_4,
                    round($sncanel_8_1, 1) AS new_8_1, round($sncanel_8_2, 1) AS new_8_2, round($sncanel_8_3, 1) AS new_8_3, round($sncanel_8_4, 1) AS new_8_4,
                    round($sncanel_9_1, 1) AS new_9_1, round($sncanel_9_2, 1) AS new_9_2, round($sncanel_9_3, 1) AS new_9_3, round($sncanel_9_4, 1) AS new_9_4
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 37){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2, round($sncanel_6_3, 1) AS new_6_3, round($sncanel_6_4, 1) AS new_6_4,
                    round($sncanel_7_1, 1) AS new_7_1, round($sncanel_7_2, 1) AS new_7_2, round($sncanel_7_3, 1) AS new_7_3, round($sncanel_7_4, 1) AS new_7_4,
                    round($sncanel_8_1, 1) AS new_8_1, round($sncanel_8_2, 1) AS new_8_2, round($sncanel_8_3, 1) AS new_8_3, round($sncanel_8_4, 1) AS new_8_4,
                    round($sncanel_9_1, 1) AS new_9_1, round($sncanel_9_2, 1) AS new_9_2, round($sncanel_9_3, 1) AS new_9_3, round($sncanel_9_4, 1) AS new_9_4,
                    round($sncanel_10_1, 1) AS new_10_1
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 38){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2, round($sncanel_6_3, 1) AS new_6_3, round($sncanel_6_4, 1) AS new_6_4,
                    round($sncanel_7_1, 1) AS new_7_1, round($sncanel_7_2, 1) AS new_7_2, round($sncanel_7_3, 1) AS new_7_3, round($sncanel_7_4, 1) AS new_7_4,
                    round($sncanel_8_1, 1) AS new_8_1, round($sncanel_8_2, 1) AS new_8_2, round($sncanel_8_3, 1) AS new_8_3, round($sncanel_8_4, 1) AS new_8_4,
                    round($sncanel_9_1, 1) AS new_9_1, round($sncanel_9_2, 1) AS new_9_2, round($sncanel_9_3, 1) AS new_9_3, round($sncanel_9_4, 1) AS new_9_4,
                    round($sncanel_10_1, 1) AS new_10_1, round($sncanel_10_2, 1) AS new_10_2
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 39){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2, round($sncanel_6_3, 1) AS new_6_3, round($sncanel_6_4, 1) AS new_6_4,
                    round($sncanel_7_1, 1) AS new_7_1, round($sncanel_7_2, 1) AS new_7_2, round($sncanel_7_3, 1) AS new_7_3, round($sncanel_7_4, 1) AS new_7_4,
                    round($sncanel_8_1, 1) AS new_8_1, round($sncanel_8_2, 1) AS new_8_2, round($sncanel_8_3, 1) AS new_8_3, round($sncanel_8_4, 1) AS new_8_4,
                    round($sncanel_9_1, 1) AS new_9_1, round($sncanel_9_2, 1) AS new_9_2, round($sncanel_9_3, 1) AS new_9_3, round($sncanel_9_4, 1) AS new_9_4,
                    round($sncanel_10_1, 1) AS new_10_1, round($sncanel_10_2, 1) AS new_10_2, round($sncanel_10_3, 1) AS new_10_3
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp ";
    }else if($count_dash == 40){
        $sql = "SELECT data_timestamp,
                    round($sncanel_1_1, 1) AS new_1_1, round($sncanel_1_2, 1) AS new_1_2, round($sncanel_1_3, 1) AS new_1_3, round($sncanel_1_4, 1) AS new_1_4,
                    round($sncanel_2_1, 1) AS new_2_1, round($sncanel_2_2, 1) AS new_2_2, round($sncanel_2_3, 1) AS new_2_3, round($sncanel_2_4, 1) AS new_2_4,
                    round($sncanel_3_1, 1) AS new_3_1, round($sncanel_3_2, 1) AS new_3_2, round($sncanel_3_3, 1) AS new_3_3, round($sncanel_3_4, 1) AS new_3_4,
                    round($sncanel_4_1, 1) AS new_4_1, round($sncanel_4_2, 1) AS new_4_2, round($sncanel_4_3, 1) AS new_4_3, round($sncanel_4_4, 1) AS new_4_4,
                    round($sncanel_5_1, 1) AS new_5_1, round($sncanel_5_2, 1) AS new_5_2, round($sncanel_5_3, 1) AS new_5_3, round($sncanel_5_4, 1) AS new_5_4,
                    round($sncanel_6_1, 1) AS new_6_1, round($sncanel_6_2, 1) AS new_6_2, round($sncanel_6_3, 1) AS new_6_3, round($sncanel_6_4, 1) AS new_6_4,
                    round($sncanel_7_1, 1) AS new_7_1, round($sncanel_7_2, 1) AS new_7_2, round($sncanel_7_3, 1) AS new_7_3, round($sncanel_7_4, 1) AS new_7_4,
                    round($sncanel_8_1, 1) AS new_8_1, round($sncanel_8_2, 1) AS new_8_2, round($sncanel_8_3, 1) AS new_8_3, round($sncanel_8_4, 1) AS new_8_4,
                    round($sncanel_9_1, 1) AS new_9_1, round($sncanel_9_2, 1) AS new_9_2, round($sncanel_9_3, 1) AS new_9_3, round($sncanel_9_4, 1) AS new_9_4,
                    round($sncanel_10_1, 1) AS new_10_1, round($sncanel_10_2, 1) AS new_10_2, round($sncanel_10_3, 1) AS new_10_3, round($sncanel_10_4, 1) AS new_10_4
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                ORDER BY data_timestamp "; // AND DataST1_1 > 0 
    }
    $stmt = $dbcon->prepare($sql);
    $stmt->execute();
} catch (Exception $ex) {
    echo $ex->getMessage();
}
$inc = 1;
$data0 = array();
while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
    $show = explode("-", $row["data_timestamp"]);
    // $data0["data_timestamp"] = strtotime($show[0].$show[1]);
    $data0["timestamp"] = $row["data_timestamp"];
    if ($row1["dashstatus_1_1"] == 1) {
        $data0["chart_1"] = $row["new_1_1"];
    }
    if ($row1["dashstatus_1_2"] == 1) {
        $data0["chart_2"] = $row["new_1_2"];
    }
    if ($row1["dashstatus_1_3"] == 1) {
        $data0["chart_3"] = $row["new_1_3"];
    }
    if ($row1["dashstatus_1_4"] == 1) {
        $data0["chart_4"] = $row["new_1_4"];
    }
    if ($row1["dashstatus_2_1"] == 1) {
        $data0["chart_5"] = $row["new_2_1"];
    }
    if ($row1["dashstatus_2_2"] == 1) {
        $data0["chart_6"] = $row["new_2_2"];
    }
    if ($row1["dashstatus_2_3"] == 1) {
        $data0["chart_7"] = $row["new_2_3"];
    }
    if ($row1["dashstatus_2_4"] == 1) {
        $data0["chart_8"] = $row["new_2_4"];
    }
    if ($row1["dashstatus_3_1"] == 1) {
        $data0["chart_9"] = $row["new_3_1"];
    }
    if ($row1["dashstatus_3_2"] == 1) {
        $data0["chart_10"] = $row["new_3_2"];
    }
    if ($row1["dashstatus_3_3"] == 1) {
        $data0["chart_11"] = $row["new_3_3"];
    }
    if ($row1["dashstatus_3_4"] == 1) {
        $data0["chart_12"] = $row["new_3_4"];
    }
    if ($row1["dashstatus_4_1"] == 1) {
        $data0["chart_13"] = $row["new_4_1"];
    }
    if ($row1["dashstatus_4_2"] == 1) {
        $data0["chart_14"] = $row["new_4_2"];
    }
    if ($row1["dashstatus_4_3"] == 1) {
        $data0["chart_15"] = $row["new_4_3"];
    }
    if ($row1["dashstatus_4_4"] == 1) {
        $data0["chart_16"] = $row["new_4_4"];
    }
    if ($row1["dashstatus_5_1"] == 1) {
        $data0["chart_17"] = $row["new_5_1"];
    }
    if ($row1["dashstatus_5_2"] == 1) {
        $data0["chart_18"] = $row["new_5_2"];
    }
    if ($row1["dashstatus_5_3"] == 1) {
        $data0["chart_19"] = $row["new_5_3"];
    }
    if ($row1["dashstatus_5_4"] == 1) {
        $data0["chart_20"] = $row["new_5_4"];
    }
    if ($row1["dashstatus_6_1"] == 1) {
        $data0["chart_21"] = $row["new_6_1"];
    }
    if ($row1["dashstatus_6_2"] == 1) {
        $data0["chart_22"] = $row["new_6_2"];
    }
    if ($row1["dashstatus_6_3"] == 1) {
        $data0["chart_23"] = $row["new_6_3"];
    }
    if ($row1["dashstatus_6_4"] == 1) {
        $data0["chart_24"] = $row["new_6_4"];
    }
    if ($row1["dashstatus_7_1"] == 1) {
        $data0["chart_25"] = $row["new_7_1"];
    }
    if ($row1["dashstatus_7_2"] == 1) {
        $data0["chart_26"] = $row["new_7_2"];
    }
    if ($row1["dashstatus_7_3"] == 1) {
        $data0["chart_27"] = $row["new_7_3"];
    }
    if ($row1["dashstatus_7_4"] == 1) {
        $data0["chart_28"] = $row["new_7_4"];
    }
    if ($row1["dashstatus_8_1"] == 1) {
        $data0["chart_29"] = $row["new_8_1"];
    }
    if ($row1["dashstatus_8_2"] == 1) {
        $data0["chart_30"] = $row["new_8_2"];
    }
    if ($row1["dashstatus_8_3"] == 1) {
        $data0["chart_31"] = $row["new_8_3"];
    }
    if ($row1["dashstatus_8_4"] == 1) {
        $data0["chart_32"] = $row["new_8_4"];
    }
    if ($row1["dashstatus_9_1"] == 1) {
        $data0["chart_33"] = $row["new_9_1"];
    }
    if ($row1["dashstatus_9_2"] == 1) {
        $data0["chart_34"] = $row["new_9_2"];
    }
    if ($row1["dashstatus_9_3"] == 1) {
        $data0["chart_35"] = $row["new_9_3"];
    }
    if ($row1["dashstatus_9_4"] == 1) {
        $data0["chart_36"] = $row["new_9_4"];
    }
    if ($row1["dashstatus_10_1"] == 1) {
        $data0["chart_37"] = $row["new_10_1"];
    }
    if ($row1["dashstatus_10_2"] == 1) {
        $data0["chart_38"] = $row["new_10_2"];
    }
    if ($row1["dashstatus_10_3"] == 1) {
        $data0["chart_39"] = $row["new_10_3"];
    }
    if ($row1["dashstatus_10_4"] == 1) {
        $data0["chart_40"] = $row["new_10_4"];
    }

    $arr[] = $data0;
    $inc++;
}
if ($data0 == null) {
    echo json_encode("null");
} else {
    echo json_encode($arr);
}
