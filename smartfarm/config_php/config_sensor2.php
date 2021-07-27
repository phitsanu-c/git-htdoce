<?php
session_start();
require '../config_db/connectdb.php';

$sn_sn = $_GET["sn"];
$sn_row = $dbcon->query("SELECT * from tb_sensor  WHERE sensor_id = '$sn_sn' ")->fetch();
if($sn_row["sensor_unit"] == 1){
    $unit = "℃";
}else{
    $unit = $sn_row["sensor_unit"];
}
echo json_encode([
    'name' => $sn_row["sensor_name"],
    'img' => $sn_row["sensor_imgNor"],
    'unit' => $unit
]);
?>