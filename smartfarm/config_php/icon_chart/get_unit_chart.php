<?php
    session_start();
    require "../../config_db/connectdb.php";
    $mode = $_POST["mode"];

    $stmt = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$mode' ");
    $stmt->execute();
    $row = $stmt->fetch();

    if ($row["sensor_unit"] == 1) {
        $unit = "℃";
    } else {
        $unit = $row["sensor_unit"];
    }
    echo json_encode($unit);