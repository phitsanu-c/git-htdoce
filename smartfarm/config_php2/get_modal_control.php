<?php
session_start();
require '../config_db/connectdb.php';
// echo $_POST["house_master"];
// exit();
$house_master = $_POST["house_master"];
$stmt = $dbcon->prepare("SELECT * from tb3_controlstatus  WHERE controlstatus_sn = '$house_master' ");
$stmt->execute();
$row = $stmt->fetch();

if ($house_master != "KMUMT001") {
    if($row["controlstatus_1"] == "1"){
        $stmt1 = $dbcon->prepare("SELECT * from tb3_load_1  WHERE load_1_sn = '$house_master' ORDER BY load_1_id DESC limit 1 ");
        $stmt1->execute();
        $row1 = $stmt1->fetch();
        $load_1 = [
            'load_1_st_1'       => $row1["load_1_st_1"],
            'load_1_time_s_1'   => $row1["load_1_time_s_1"],
            'load_1_time_e_1'   => $row1["load_1_time_e_1"],
            'load_1_st_2'       => $row1["load_1_st_2"],
            'load_1_time_s_2'   => $row1["load_1_time_s_2"],
            'load_1_time_e_2'   => $row1["load_1_time_e_2"],
            'load_1_st_3'       => $row1["load_1_st_3"],
            'load_1_time_s_3'   => $row1["load_1_time_s_3"],
            'load_1_time_e_3'   => $row1["load_1_time_e_3"],
            'load_1_st_4'       => $row1["load_1_st_4"],
            'load_1_time_s_4'   => $row1["load_1_time_s_4"],
            'load_1_time_e_4'   => $row1["load_1_time_e_4"],
            'load_1_st_5'       => $row1["load_1_st_5"],
            'load_1_time_s_5'   => $row1["load_1_time_s_5"],
            'load_1_time_e_5'   => $row1["load_1_time_e_5"],
            'load_1_st_6'       => $row1["load_1_st_6"],
            'load_1_time_s_6'   => $row1["load_1_time_s_6"],
            'load_1_time_e_6'   => $row1["load_1_time_e_6"]
        ];
    }else{ $load_1 = ""; }

    if($row["controlstatus_2"] == "1"){
        $stmt2 = $dbcon->prepare("SELECT * from tb3_load_2  WHERE load_2_sn = '$house_master' ORDER BY load_2_id DESC limit 1");
        $stmt2->execute();
        $row2 = $stmt2->fetch();
        $load_2 = [
            'load_2_st_1'       => $row2["load_2_st_1"],
            'load_2_time_s_1'   => $row2["load_2_time_s_1"],
            'load_2_time_e_1'   => $row2["load_2_time_e_1"],
            'load_2_st_2'       => $row2["load_2_st_2"],
            'load_2_time_s_2'   => $row2["load_2_time_s_2"],
            'load_2_time_e_2'   => $row2["load_2_time_e_2"],
            'load_2_st_3'       => $row2["load_2_st_3"],
            'load_2_time_s_3'   => $row2["load_2_time_s_3"],
            'load_2_time_e_3'   => $row2["load_2_time_e_3"],
            'load_2_st_4'       => $row2["load_2_st_4"],
            'load_2_time_s_4'   => $row2["load_2_time_s_4"],
            'load_2_time_e_4'   => $row2["load_2_time_e_4"],
            'load_2_st_5'       => $row2["load_2_st_5"],
            'load_2_time_s_5'   => $row2["load_2_time_s_5"],
            'load_2_time_e_5'   => $row2["load_2_time_e_5"],
            'load_2_st_6'       => $row2["load_2_st_6"],
            'load_2_time_s_6'   => $row2["load_2_time_s_6"],
            'load_2_time_e_6'   => $row2["load_2_time_e_6"]
        ];
    }else{ $load_2 = ""; }

    if($row["controlstatus_3"] == "1"){
        $stmt3 = $dbcon->prepare("SELECT * from tb3_load_3  WHERE load_3_sn = '$house_master' ORDER BY load_3_id DESC limit 1");
        $stmt3->execute();
        $row3 = $stmt3->fetch();
        $load_3 = [
            'load_3_st_1'       => $row3["load_3_st_1"],
            'load_3_time_s_1'   => $row3["load_3_time_s_1"],
            'load_3_time_e_1'   => $row3["load_3_time_e_1"],
            'load_3_st_2'       => $row3["load_3_st_2"],
            'load_3_time_s_2'   => $row3["load_3_time_s_2"],
            'load_3_time_e_2'   => $row3["load_3_time_e_2"],
            'load_3_st_3'       => $row3["load_3_st_3"],
            'load_3_time_s_3'   => $row3["load_3_time_s_3"],
            'load_3_time_e_3'   => $row3["load_3_time_e_3"],
            'load_3_st_4'       => $row3["load_3_st_4"],
            'load_3_time_s_4'   => $row3["load_3_time_s_4"],
            'load_3_time_e_4'   => $row3["load_3_time_e_4"],
            'load_3_st_5'       => $row3["load_3_st_5"],
            'load_3_time_s_5'   => $row3["load_3_time_s_5"],
            'load_3_time_e_5'   => $row3["load_3_time_e_5"],
            'load_3_st_6'       => $row3["load_3_st_6"],
            'load_3_time_s_6'   => $row3["load_3_time_s_6"],
            'load_3_time_e_6'   => $row3["load_3_time_e_6"]
        ];
    }else{ $load_3 = "";}

    if($row["controlstatus_4"] == "1"){
        $stmt4 = $dbcon->prepare("SELECT * from tb3_load_4  WHERE load_4_sn = '$house_master' ORDER BY load_4_id DESC limit 1");
        $stmt4->execute();
        $row4 = $stmt4->fetch();
        $load_4 = [
            'load_4_st_1'       => $row4["load_4_st_1"],
            'load_4_time_s_1'   => $row4["load_4_time_s_1"],
            'load_4_time_e_1'   => $row4["load_4_time_e_1"],
            'load_4_st_2'       => $row4["load_4_st_2"],
            'load_4_time_s_2'   => $row4["load_4_time_s_2"],
            'load_4_time_e_2'   => $row4["load_4_time_e_2"],
            'load_4_st_3'       => $row4["load_4_st_3"],
            'load_4_time_s_3'   => $row4["load_4_time_s_3"],
            'load_4_time_e_3'   => $row4["load_4_time_e_3"],
            'load_4_st_4'       => $row4["load_4_st_4"],
            'load_4_time_s_4'   => $row4["load_4_time_s_4"],
            'load_4_time_e_4'   => $row4["load_4_time_e_4"],
            'load_4_st_5'       => $row4["load_4_st_5"],
            'load_4_time_s_5'   => $row4["load_4_time_s_5"],
            'load_4_time_e_5'   => $row4["load_4_time_e_5"],
            'load_4_st_6'       => $row4["load_4_st_6"],
            'load_4_time_s_6'   => $row4["load_4_time_s_6"],
            'load_4_time_e_6'   => $row4["load_4_time_e_6"]
        ];
    }else{ $load_4 = ""; }

    if($row["controlstatus_5"] == "1"){
        $stmt5 = $dbcon->prepare("SELECT * from tb3_load_5  WHERE load_5_sn = '$house_master' ORDER BY load_5_id DESC limit 1");
        $stmt5->execute();
        $row5 = $stmt5->fetch();
        $load_5 = [
            'load_5_st_1'       => $row5["load_5_st_1"],
            'load_5_time_s_1'   => $row5["load_5_time_s_1"],
            'load_5_time_e_1'   => $row5["load_5_time_e_1"],
            'load_5_st_2'       => $row5["load_5_st_2"],
            'load_5_time_s_2'   => $row5["load_5_time_s_2"],
            'load_5_time_e_2'   => $row5["load_5_time_e_2"],
            'load_5_st_3'       => $row5["load_5_st_3"],
            'load_5_time_s_3'   => $row5["load_5_time_s_3"],
            'load_5_time_e_3'   => $row5["load_5_time_e_3"],
            'load_5_st_4'       => $row5["load_5_st_4"],
            'load_5_time_s_4'   => $row5["load_5_time_s_4"],
            'load_5_time_e_4'   => $row5["load_5_time_e_4"],
            'load_5_st_5'       => $row5["load_5_st_5"],
            'load_5_time_s_5'   => $row5["load_5_time_s_5"],
            'load_5_time_e_5'   => $row5["load_5_time_e_5"],
            'load_5_st_6'       => $row5["load_5_st_6"],
            'load_5_time_s_6'   => $row5["load_5_time_s_6"],
            'load_5_time_e_6'   => $row5["load_5_time_e_6"]
        ];
    }else{ $load_5 = ""; }

    if($row["controlstatus_6"] == "1"){
        $stmt6 = $dbcon->prepare("SELECT * from tb3_load_6  WHERE load_6_sn = '$house_master' ORDER BY load_6_id DESC limit 1");
        $stmt6->execute();
        $row6 = $stmt6->fetch();
        $load_6 = [
            'load_6_st_1'       => $row6["load_6_st_1"],
            'load_6_time_s_1'   => $row6["load_6_time_s_1"],
            'load_6_time_e_1'   => $row6["load_6_time_e_1"],
            'load_6_st_2'       => $row6["load_6_st_2"],
            'load_6_time_s_2'   => $row6["load_6_time_s_2"],
            'load_6_time_e_2'   => $row6["load_6_time_e_2"],
            'load_6_st_3'       => $row6["load_6_st_3"],
            'load_6_time_s_3'   => $row6["load_6_time_s_3"],
            'load_6_time_e_3'   => $row6["load_6_time_e_3"],
            'load_6_st_4'       => $row6["load_6_st_4"],
            'load_6_time_s_4'   => $row6["load_6_time_s_4"],
            'load_6_time_e_4'   => $row6["load_6_time_e_4"],
            'load_6_st_5'       => $row6["load_6_st_5"],
            'load_6_time_s_5'   => $row6["load_6_time_s_5"],
            'load_6_time_e_5'   => $row6["load_6_time_e_5"],
            'load_6_st_6'       => $row6["load_6_st_6"],
            'load_6_time_s_6'   => $row6["load_6_time_s_6"],
            'load_6_time_e_6'   => $row6["load_6_time_e_6"]
        ];
    }else{ $load_6 = ""; }

    if($row["controlstatus_7"] == "1"){
        $stmt7 = $dbcon->prepare("SELECT * from tb3_load_7  WHERE load_7_sn = '$house_master' ORDER BY load_7_id DESC limit 1");
        $stmt7->execute();
        $row7 = $stmt7->fetch();
        $load_7 = [
            'load_7_st_1'       => $row7["load_7_st_1"],
            'load_7_time_s_1'   => $row7["load_7_time_s_1"],
            'load_7_time_e_1'   => $row7["load_7_time_e_1"],
            'load_7_st_2'       => $row7["load_7_st_2"],
            'load_7_time_s_2'   => $row7["load_7_time_s_2"],
            'load_7_time_e_2'   => $row7["load_7_time_e_2"],
            'load_7_st_3'       => $row7["load_7_st_3"],
            'load_7_time_s_3'   => $row7["load_7_time_s_3"],
            'load_7_time_e_3'   => $row7["load_7_time_e_3"],
            'load_7_st_4'       => $row7["load_7_st_4"],
            'load_7_time_s_4'   => $row7["load_7_time_s_4"],
            'load_7_time_e_4'   => $row7["load_7_time_e_4"],
            'load_7_st_5'       => $row7["load_7_st_5"],
            'load_7_time_s_5'   => $row7["load_7_time_s_5"],
            'load_7_time_e_5'   => $row7["load_7_time_e_5"],
            'load_7_st_6'       => $row7["load_7_st_6"],
            'load_7_time_s_6'   => $row7["load_7_time_s_6"],
            'load_7_time_e_6'   => $row7["load_7_time_e_6"]
        ];
    }else{ $load_7 = ""; }

    if($row["controlstatus_8"] == "1"){
        $stmt8 = $dbcon->prepare("SELECT * from tb3_load_8  WHERE load_8_sn = '$house_master' ORDER BY load_8_id DESC limit 1");
        $stmt8->execute();
        $row8 = $stmt8->fetch();
        $load_8 = [
            'load_8_st_1'       => $row8["load_8_st_1"],
            'load_8_time_s_1'   => $row8["load_8_time_s_1"],
            'load_8_time_e_1'   => $row8["load_8_time_e_1"],
            'load_8_st_2'       => $row8["load_8_st_2"],
            'load_8_time_s_2'   => $row8["load_8_time_s_2"],
            'load_8_time_e_2'   => $row8["load_8_time_e_2"],
            'load_8_st_3'       => $row8["load_8_st_3"],
            'load_8_time_s_3'   => $row8["load_8_time_s_3"],
            'load_8_time_e_3'   => $row8["load_8_time_e_3"],
            'load_8_st_4'       => $row8["load_8_st_4"],
            'load_8_time_s_4'   => $row8["load_8_time_s_4"],
            'load_8_time_e_4'   => $row8["load_8_time_e_4"],
            'load_8_st_5'       => $row8["load_8_st_5"],
            'load_8_time_s_5'   => $row8["load_8_time_s_5"],
            'load_8_time_e_5'   => $row8["load_8_time_e_5"],
            'load_8_st_6'       => $row8["load_8_st_6"],
            'load_8_time_s_6'   => $row8["load_8_time_s_6"],
            'load_8_time_e_6'   => $row8["load_8_time_e_6"]
        ];
    }else{ $load_8 = ""; }

    if($row["controlstatus_9"] == "1"){
        $stmt9 = $dbcon->prepare("SELECT * from tb3_load_9  WHERE load_9_sn = '$house_master' ORDER BY load_9_id DESC limit 1");
        $stmt9->execute();
        $row9 = $stmt9->fetch();
        $load_9 = [
            'load_9_st_1'       => $row9["load_9_st_1"],
            'load_9_time_s_1'   => $row9["load_9_time_s_1"],
            'load_9_time_e_1'   => $row9["load_9_time_e_1"],
            'load_9_st_2'       => $row9["load_9_st_2"],
            'load_9_time_s_2'   => $row9["load_9_time_s_2"],
            'load_9_time_e_2'   => $row9["load_9_time_e_2"],
            'load_9_st_3'       => $row9["load_9_st_3"],
            'load_9_time_s_3'   => $row9["load_9_time_s_3"],
            'load_9_time_e_3'   => $row9["load_9_time_e_3"],
            'load_9_st_4'       => $row9["load_9_st_4"],
            'load_9_time_s_4'   => $row9["load_9_time_s_4"],
            'load_9_time_e_4'   => $row9["load_9_time_e_4"],
            'load_9_st_5'       => $row9["load_9_st_5"],
            'load_9_time_s_5'   => $row9["load_9_time_s_5"],
            'load_9_time_e_5'   => $row9["load_9_time_e_5"],
            'load_9_st_6'       => $row9["load_9_st_6"],
            'load_9_time_s_6'   => $row9["load_9_time_s_6"],
            'load_9_time_e_6'   => $row9["load_9_time_e_6"],
            'load_9_st_7'       => $row9["load_9_st_7"],
            'load_9_time_s_7'   => $row9["load_9_time_s_7"],
            'load_9_time_e_7'   => $row9["load_9_time_e_7"],
            'load_9_time_on_7'=> $row9["load_9_time_on_7"],
            'load_9_time_off_7' => $row9["load_9_time_off_7"]
        ];
    }else{ $load_9 = ""; }

    if($row["controlstatus_10"] == "1"){
        $stmt10 = $dbcon->prepare("SELECT * from tb3_load_10  WHERE load_10_sn = '$house_master' ORDER BY load_10_id DESC limit 1");
        $stmt10->execute();
        $row10 = $stmt10->fetch();
        $load_10 = [
            'load_10_st_1'       => $row10["load_10_st_1"],
            'load_10_time_s_1'   => $row10["load_10_time_s_1"],
            'load_10_time_e_1'   => $row10["load_10_time_e_1"],
            'load_10_st_2'       => $row10["load_10_st_2"],
            'load_10_time_s_2'   => $row10["load_10_time_s_2"],
            'load_10_time_e_2'   => $row10["load_10_time_e_2"],
            'load_10_st_3'       => $row10["load_10_st_3"],
            'load_10_time_s_3'   => $row10["load_10_time_s_3"],
            'load_10_time_e_3'   => $row10["load_10_time_e_3"],
            'load_10_st_4'       => $row10["load_10_st_4"],
            'load_10_time_s_4'   => $row10["load_10_time_s_4"],
            'load_10_time_e_4'   => $row10["load_10_time_e_4"],
            'load_10_st_5'       => $row10["load_10_st_5"],
            'load_10_time_s_5'   => $row10["load_10_time_s_5"],
            'load_10_time_e_5'   => $row10["load_10_time_e_5"],
            'load_10_st_6'       => $row10["load_10_st_6"],
            'load_10_time_s_6'   => $row10["load_10_time_s_6"],
            'load_10_time_e_6'   => $row10["load_10_time_e_6"]
        ];
    }else{ $load_10 = ""; }

    if($row["controlstatus_11"] == "1"){
        $stmt11 = $dbcon->prepare("SELECT * from tb3_load_11  WHERE load_11_sn = '$house_master' ORDER BY load_11_id DESC limit 1");
        $stmt11->execute();
        $row11 = $stmt11->fetch();
        $load_11 = [
            'load_11_st_1'       => $row11["load_11_st_1"],
            'load_11_time_s_1'   => $row11["load_11_time_s_1"],
            'load_11_time_e_1'   => $row11["load_11_time_e_1"],
            'load_11_st_2'       => $row11["load_11_st_2"],
            'load_11_time_s_2'   => $row11["load_11_time_s_2"],
            'load_11_time_e_2'   => $row11["load_11_time_e_2"],
            'load_11_st_3'       => $row11["load_11_st_3"],
            'load_11_time_s_3'   => $row11["load_11_time_s_3"],
            'load_11_time_e_3'   => $row11["load_11_time_e_3"],
            'load_11_st_4'       => $row11["load_11_st_4"],
            'load_11_time_s_4'   => $row11["load_11_time_s_4"],
            'load_11_time_e_4'   => $row11["load_11_time_e_4"],
            'load_11_st_5'       => $row11["load_11_st_5"],
            'load_11_time_s_5'   => $row11["load_11_time_s_5"],
            'load_11_time_e_5'   => $row11["load_11_time_e_5"],
            'load_11_st_6'       => $row11["load_11_st_6"],
            'load_11_time_s_6'   => $row11["load_11_time_s_6"],
            'load_11_time_e_6'   => $row11["load_11_time_e_6"]
        ];
    }else{ $load_11 = ""; }

    echo json_encode([
        'load_1'  => $load_1,
        'load_2'  => $load_2,
        'load_3'  => $load_3,
        'load_4'  => $load_4,
        'load_5'  => $load_5,
        'load_6'  => $load_6,
        'load_7'  => $load_7,
        'load_8'  => $load_8,
        'load_9'  => $load_9,
        'load_10'  => $load_10,
        'load_11'  => $load_11,
        'username' => $_SESSION["Username"]
    ]);
}else{
    $row_n = $dbcon->query("SELECT * from tb3_conttrolname  WHERE conttrolname_sn = '$house_master' ORDER BY conttrolname_id DESC LIMIT 1")->fetch();
    $name = [
        'c1' => $row_n["conttrolname_1"],
        'c2' => $row_n["conttrolname_2"],
        'c3' => $row_n["conttrolname_3"],
        'c4' => $row_n["conttrolname_4"],
        'c5' => $row_n["conttrolname_5"]
    ];

    $row_mn = $dbcon->query("SELECT * from tb_control_maxmin  WHERE maxmin_max_sn = '$house_master' ORDER BY maxmin_id DESC LIMIT 1")->fetch();
    $max_min = [
        // round( ( $row_maxmin["maxmin_min_1"] * $row_loadmulti["loadm_A1"] ) - $row_loadmulti["loadm_B1"] ,2);
        'maxmin_min_1' => $row_mn["maxmin_min_1"],
        'maxmin_min_2' => $row_mn["maxmin_min_2"],
        'maxmin_min_3' => $row_mn["maxmin_min_3"],
        'maxmin_min_4' => $row_mn["maxmin_min_4"],
        'maxmin_min_5' => $row_mn["maxmin_min_5"],
        'maxmin_max_1' => $row_mn["maxmin_max_1"],
        'maxmin_max_2' => $row_mn["maxmin_max_2"],
        'maxmin_max_3' => $row_mn["maxmin_max_3"],
        'maxmin_max_4' => $row_mn["maxmin_max_4"],
        'maxmin_max_5' => $row_mn["maxmin_max_5"]
    ];
    echo json_encode([
        'control_name' => $name,
        'max_min'    => $max_min,
        'username' => $_SESSION["Username"]
    ]);
}