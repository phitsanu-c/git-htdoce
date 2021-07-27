<?php
    session_start();
    require '../config_db/connectdb.php';
    
    $house_master = $_POST["house_master"];
    echo $house_master;
    exit();
    $stmt = $dbcon->prepare("SELECT * from tb3_dashstatus WHERE dashstatus_sn = '$house_master' order by dashstatus_id limit 1");
    $stmt->execute();
    $row = $stmt->fetch();
         $data1 = [
        'dashstatus_1_1'  => $row["dashstatus_1_1"],
        'dashstatus_1_2'  => $row["dashstatus_1_2"],
        'dashstatus_1_3'  => $row["dashstatus_1_3"],
        'dashstatus_1_4'  => $row["dashstatus_1_4"],
        'dashstatus_2_1'  => $row["dashstatus_2_1"],
        'dashstatus_2_2'  => $row["dashstatus_2_2"],
        'dashstatus_2_3'  => $row["dashstatus_2_3"],
        'dashstatus_2_4'  => $row["dashstatus_2_4"],
        'dashstatus_3_1'  => $row["dashstatus_3_1"],
        'dashstatus_3_2'  => $row["dashstatus_3_2"],
        'dashstatus_3_3'  => $row["dashstatus_3_3"],
        'dashstatus_3_4'  => $row["dashstatus_3_4"],
        'dashstatus_4_1'  => $row["dashstatus_4_1"],
        'dashstatus_4_2'  => $row["dashstatus_4_2"],
        'dashstatus_4_3'  => $row["dashstatus_4_3"],
        'dashstatus_4_4'  => $row["dashstatus_4_4"],
        'dashstatus_5_1'  => $row["dashstatus_5_1"],
        'dashstatus_5_2'  => $row["dashstatus_5_2"],
        'dashstatus_5_3'  => $row["dashstatus_5_3"],
        'dashstatus_5_4'  => $row["dashstatus_5_4"],
        'dashstatus_6_1'  => $row["dashstatus_6_1"],
        'dashstatus_6_2'  => $row["dashstatus_6_2"],
        'dashstatus_6_3'  => $row["dashstatus_6_3"],
        'dashstatus_6_4'  => $row["dashstatus_6_4"],
        'dashstatus_7_1'  => $row["dashstatus_7_1"],
        'dashstatus_7_2'  => $row["dashstatus_7_2"],
        'dashstatus_7_3'  => $row["dashstatus_7_3"],
        'dashstatus_7_4'  => $row["dashstatus_7_4"],
        'dashstatus_8_1'  => $row["dashstatus_8_1"],
        'dashstatus_8_2'  => $row["dashstatus_8_2"],
        'dashstatus_8_3'  => $row["dashstatus_8_3"],
        'dashstatus_8_4'  => $row["dashstatus_8_4"],
        'dashstatus_9_1'  => $row["dashstatus_9_1"],
        'dashstatus_9_2'  => $row["dashstatus_9_2"],
        'dashstatus_9_3'  => $row["dashstatus_9_3"],
        'dashstatus_9_4'  => $row["dashstatus_9_4"],
        'dashstatus_10_1'  => $row["dashstatus_10_1"],
        'dashstatus_10_2'  => $row["dashstatus_10_2"],
        'dashstatus_10_3'  => $row["dashstatus_10_3"],
        'dashstatus_10_4'  => $row["dashstatus_10_4"]
    ];

    
    echo json_encode([
        'Status'        => $data1
    ]);