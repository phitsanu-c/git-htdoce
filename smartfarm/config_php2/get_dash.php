<?php
session_start();
require '../config_db/connectdb.php';

// $houseID = $_SESSION["house_id"];
$house_master = $_POST["house_master"];
$stmt = $dbcon->prepare("SELECT 
                dashstatus_1_1, dashstatus_1_2, dashstatus_1_3, dashstatus_1_4,
                dashstatus_2_1, dashstatus_2_2, dashstatus_2_3, dashstatus_2_4,
                dashstatus_3_1, dashstatus_3_2, dashstatus_3_3, dashstatus_3_4,
                dashstatus_4_1, dashstatus_4_2, dashstatus_4_3, dashstatus_4_4,
                dashstatus_5_1, dashstatus_5_2, dashstatus_5_3, dashstatus_5_4,
                dashstatus_6_1, dashstatus_6_2, dashstatus_6_3, dashstatus_6_4,
                dashstatus_7_1, dashstatus_7_2, dashstatus_7_3, dashstatus_7_4,
                dashstatus_8_1, dashstatus_8_2, dashstatus_8_3, dashstatus_8_4,
                dashstatus_9_1, dashstatus_9_2, dashstatus_9_3, dashstatus_9_4,
                dashstatus_10_1, dashstatus_10_2, dashstatus_10_3, dashstatus_10_4
            from tb3_dashstatus WHERE dashstatus_sn = '$house_master' order by dashstatus_id limit 1");
$stmt->execute();
$row1 = $stmt->fetch();


$stmt2 = $dbcon->prepare("SELECT 
                dashname_1_1, dashname_1_2, dashname_1_3, dashname_1_4,
                dashname_2_1, dashname_2_2, dashname_2_3, dashname_2_4,
                dashname_3_1, dashname_3_2, dashname_3_3, dashname_3_4,
                dashname_4_1, dashname_4_2, dashname_4_3, dashname_4_4,
                dashname_5_1, dashname_5_2, dashname_5_3, dashname_5_4,
                dashname_6_1, dashname_6_2, dashname_6_3, dashname_6_4,
                dashname_7_1, dashname_7_2, dashname_7_3, dashname_7_4,
                dashname_8_1, dashname_8_2, dashname_8_3, dashname_8_4,
                dashname_9_1, dashname_9_2, dashname_9_3, dashname_9_4,
                dashname_10_1, dashname_10_2, dashname_10_3, dashname_10_4
            from tb3_dashname WHERE dashname_sn = '$house_master' order by dashname_id limit 1");
$stmt2->execute();
$row2 = $stmt2->fetch();

$stmt3 = $dbcon->prepare("SELECT 
                statussn_1_1, statussn_1_2, statussn_1_3, statussn_1_4,
                statussn_2_1, statussn_2_2, statussn_2_3, statussn_2_4,
                statussn_3_1, statussn_3_2, statussn_3_3, statussn_3_4,
                statussn_4_1, statussn_4_2, statussn_4_3, statussn_4_4,
                statussn_5_1, statussn_5_2, statussn_5_3, statussn_5_4,
                statussn_6_1, statussn_6_2, statussn_6_3, statussn_6_4,
                statussn_7_1, statussn_7_2, statussn_7_3, statussn_7_4,
                statussn_8_1, statussn_8_2, statussn_8_3, statussn_8_4,
                statussn_9_1, statussn_9_2, statussn_9_3, statussn_9_4,
                statussn_10_1, statussn_10_2, statussn_10_3, statussn_10_4
            from tb3_statussn  WHERE statussn_sn = '$house_master' ");
$stmt3->execute();
$row3 = $stmt3->fetch();

$sn_mode1_1 =  $row3["statussn_1_1"];
$sn_mode1_2 =  $row3["statussn_1_2"];
$sn_mode1_3 =  $row3["statussn_1_3"];
$sn_mode1_4 =  $row3["statussn_1_4"];
$sn_mode2_1 =  $row3["statussn_2_1"];
$sn_mode2_2 =  $row3["statussn_2_2"];
$sn_mode2_3 =  $row3["statussn_2_3"];
$sn_mode2_4 =  $row3["statussn_2_4"];
$sn_mode3_1 =  $row3["statussn_3_1"];
$sn_mode3_2 =  $row3["statussn_3_2"];
$sn_mode3_3 =  $row3["statussn_3_3"];
$sn_mode3_4 =  $row3["statussn_3_4"];
$sn_mode4_1 =  $row3["statussn_4_1"];
$sn_mode4_2 =  $row3["statussn_4_2"];
$sn_mode4_3 =  $row3["statussn_4_3"];
$sn_mode4_4 =  $row3["statussn_4_4"];
$sn_mode5_1 =  $row3["statussn_5_1"];
$sn_mode5_2 =  $row3["statussn_5_2"];
$sn_mode5_3 =  $row3["statussn_5_3"];
$sn_mode5_4 =  $row3["statussn_5_4"];
$sn_mode6_1 =  $row3["statussn_6_1"];
$sn_mode6_2 =  $row3["statussn_6_2"];
$sn_mode6_3 =  $row3["statussn_6_3"];
$sn_mode6_4 =  $row3["statussn_6_4"];
$sn_mode7_1 =  $row3["statussn_7_1"];
$sn_mode7_2 =  $row3["statussn_7_2"];
$sn_mode7_3 =  $row3["statussn_7_3"];
$sn_mode7_4 =  $row3["statussn_7_4"];
$sn_mode8_1 =  $row3["statussn_8_1"];
$sn_mode8_2 =  $row3["statussn_8_2"];
$sn_mode8_3 =  $row3["statussn_8_3"];
$sn_mode8_4 =  $row3["statussn_8_4"];
$sn_mode9_1 =  $row3["statussn_9_1"];
$sn_mode9_2 =  $row3["statussn_9_2"];
$sn_mode9_3 =  $row3["statussn_9_3"];
$sn_mode9_4 =  $row3["statussn_9_4"];
$sn_mode10_1 =  $row3["statussn_10_1"];
$sn_mode10_2 =  $row3["statussn_10_2"];
$sn_mode10_3 =  $row3["statussn_10_3"];
$sn_mode10_4 =  $row3["statussn_10_4"];

$stmt_s1_1 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode1_1' ");
$stmt_s1_1->execute();
$row_s1_1 = $stmt_s1_1->fetch();
// echo $sn_mode1_1;
$stmt_s1_2 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode1_2' ");
$stmt_s1_2->execute();
$row_s1_2 = $stmt_s1_2->fetch();
$stmt_s1_3 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode1_3' ");
$stmt_s1_3->execute();
$row_s1_3 = $stmt_s1_3->fetch();
$stmt_s1_4 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode1_4' ");
$stmt_s1_4->execute();
$row_s1_4 = $stmt_s1_4->fetch();

$stmt_s2_1 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode2_1' ");
$stmt_s2_1->execute();
$row_s2_1 = $stmt_s2_1->fetch();
$stmt_s2_2 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode2_2' ");
$stmt_s2_2->execute();
$row_s2_2 = $stmt_s2_2->fetch();
$stmt_s2_3 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode2_3' ");
$stmt_s2_3->execute();
$row_s2_3 = $stmt_s2_3->fetch();
$stmt_s2_4 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode2_4' ");
$stmt_s2_4->execute();
$row_s2_4 = $stmt_s2_4->fetch();

$stmt_s3_1 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode3_1' ");
$stmt_s3_1->execute();
$row_s3_1 = $stmt_s3_1->fetch();
$stmt_s3_2 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode3_2' ");
$stmt_s3_2->execute();
$row_s3_2 = $stmt_s3_2->fetch();
$stmt_s3_3 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode3_3' ");
$stmt_s3_3->execute();
$row_s3_3 = $stmt_s3_3->fetch();
$stmt_s3_4 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode3_4' ");
$stmt_s3_4->execute();
$row_s3_4 = $stmt_s3_4->fetch();

$stmt_s4_1 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode4_1' ");
$stmt_s4_1->execute();
$row_s4_1 = $stmt_s4_1->fetch();
$stmt_s4_2 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode4_2' ");
$stmt_s4_2->execute();
$row_s4_2 = $stmt_s4_2->fetch();
$stmt_s4_3 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode4_3' ");
$stmt_s4_3->execute();
$row_s4_3 = $stmt_s4_3->fetch();
$stmt_s4_4 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode4_4' ");
$stmt_s4_4->execute();
$row_s4_4 = $stmt_s4_4->fetch();

$stmt_s5_1 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode5_1' ");
$stmt_s5_1->execute();
$row_s5_1 = $stmt_s5_1->fetch();
$stmt_s5_2 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode5_2' ");
$stmt_s5_2->execute();
$row_s5_2 = $stmt_s5_2->fetch();
$stmt_s5_3 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode5_3' ");
$stmt_s5_3->execute();
$row_s5_3 = $stmt_s5_3->fetch();
$stmt_s5_4 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode5_4' ");
$stmt_s5_4->execute();
$row_s5_4 = $stmt_s5_4->fetch();

$stmt_s6_1 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode6_1' ");
$stmt_s6_1->execute();
$row_s6_1 = $stmt_s6_1->fetch();
$stmt_s6_2 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode6_2' ");
$stmt_s6_2->execute();
$row_s6_2 = $stmt_s6_2->fetch();
$stmt_s6_3 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode6_3' ");
$stmt_s6_3->execute();
$row_s6_3 = $stmt_s6_3->fetch();
$stmt_s6_4 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode6_4' ");
$stmt_s6_4->execute();
$row_s6_4 = $stmt_s6_4->fetch();

$stmt_s7_1 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode7_1' ");
$stmt_s7_1->execute();
$row_s7_1 = $stmt_s7_1->fetch();
$stmt_s7_2 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode7_2' ");
$stmt_s7_2->execute();
$row_s7_2 = $stmt_s7_2->fetch();
$stmt_s7_3 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode7_3' ");
$stmt_s7_3->execute();
$row_s7_3 = $stmt_s7_3->fetch();
$stmt_s7_4 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode7_4' ");
$stmt_s7_4->execute();
$row_s7_4 = $stmt_s7_4->fetch();

$stmt_s8_1 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode8_1' ");
$stmt_s8_1->execute();
$row_s8_1 = $stmt_s8_1->fetch();
$stmt_s8_2 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode8_2' ");
$stmt_s8_2->execute();
$row_s8_2 = $stmt_s8_2->fetch();
$stmt_s8_3 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode8_3' ");
$stmt_s8_3->execute();
$row_s8_3 = $stmt_s8_3->fetch();
$stmt_s8_4 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode8_4' ");
$stmt_s8_4->execute();
$row_s8_4 = $stmt_s8_4->fetch();

$stmt_s9_1 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode9_1' ");
$stmt_s9_1->execute();
$row_s9_1 = $stmt_s9_1->fetch();
$stmt_s9_2 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode9_2' ");
$stmt_s9_2->execute();
$row_s9_2 = $stmt_s9_2->fetch();
$stmt_s9_3 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode9_3' ");
$stmt_s9_3->execute();
$row_s9_3 = $stmt_s9_3->fetch();
$stmt_s9_4 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode9_4' ");
$stmt_s9_4->execute();
$row_s9_4 = $stmt_s9_4->fetch();

$stmt_s10_1 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode10_1' ");
$stmt_s10_1->execute();
$row_s10_1 = $stmt_s10_1->fetch();
$stmt_s10_2 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode10_2' ");
$stmt_s10_2->execute();
$row_s10_2 = $stmt_s10_2->fetch();
$stmt_s10_3 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode10_3' ");
$stmt_s10_3->execute();
$row_s10_3 = $stmt_s10_3->fetch();
$stmt_s10_4 = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode10_4' ");
$stmt_s10_4->execute();
$row_s10_4 = $stmt_s10_4->fetch();

if ($row_s1_1["sensor_unit"] == 1) {
    $unit1_1 = "℃";
} else {
    $unit1_1 = $row_s1_1["sensor_unit"];
}
if ($row_s1_2["sensor_unit"] == 1) {
    $unit1_2 = "℃";
} else {
    $unit1_2 = $row_s1_2["sensor_unit"];
}
if ($row_s1_3["sensor_unit"] == 1) {
    $unit1_3 = "℃";
} else {
    $unit1_3 = $row_s1_3["sensor_unit"];
}
if ($row_s1_4["sensor_unit"] == 1) {
    $unit1_4 = "℃";
} else {
    $unit1_4 = $row_s1_4["sensor_unit"];
}
if ($row_s2_1["sensor_unit"] == 1) {
    $unit2_1 = "℃";
} else {
    $unit2_1 = $row_s2_1["sensor_unit"];
}
if ($row_s2_2["sensor_unit"] == 1) {
    $unit2_2 = "℃";
} else {
    $unit2_2 = $row_s2_2["sensor_unit"];
}
if ($row_s2_3["sensor_unit"] == 1) {
    $unit2_3 = "℃";
} else {
    $unit2_3 = $row_s2_3["sensor_unit"];
}
if ($row_s2_4["sensor_unit"] == 1) {
    $unit2_4 = "℃";
} else {
    $unit2_4 = $row_s2_4["sensor_unit"];
}
if ($row_s3_1["sensor_unit"] == 1) {
    $unit3_1 = "℃";
} else {
    $unit3_1 = $row_s3_1["sensor_unit"];
}
if ($row_s3_2["sensor_unit"] == 1) {
    $unit3_2 = "℃";
} else {
    $unit3_2 = $row_s3_2["sensor_unit"];
}
if ($row_s3_3["sensor_unit"] == 1) {
    $unit3_3 = "℃";
} else {
    $unit3_3 = $row_s3_3["sensor_unit"];
}
if ($row_s3_4["sensor_unit"] == 1) {
    $unit3_4 = "℃";
} else {
    $unit3_4 = $row_s3_4["sensor_unit"];
}
if ($row_s4_1["sensor_unit"] == 1) {
    $unit4_1 = "℃";
} else {
    $unit4_1 = $row_s4_1["sensor_unit"];
}
if ($row_s4_2["sensor_unit"] == 1) {
    $unit4_2 = "℃";
} else {
    $unit4_2 = $row_s4_2["sensor_unit"];
}
if ($row_s4_3["sensor_unit"] == 1) {
    $unit4_3 = "℃";
} else {
    $unit4_3 = $row_s4_3["sensor_unit"];
}
if ($row_s4_4["sensor_unit"] == 1) {
    $unit4_4 = "℃";
} else {
    $unit4_4 = $row_s4_4["sensor_unit"];
}
if ($row_s5_1["sensor_unit"] == 1) {
    $unit5_1 = "℃";
} else {
    $unit5_1 = $row_s5_1["sensor_unit"];
}
if ($row_s5_2["sensor_unit"] == 1) {
    $unit5_2 = "℃";
} else {
    $unit5_2 = $row_s5_2["sensor_unit"];
}
if ($row_s5_3["sensor_unit"] == 1) {
    $unit5_3 = "℃";
} else {
    $unit5_3 = $row_s5_3["sensor_unit"];
}
if ($row_s5_4["sensor_unit"] == 1) {
    $unit5_4 = "℃";
} else {
    $unit5_4 = $row_s5_4["sensor_unit"];
}
if ($row_s6_1["sensor_unit"] == 1) {
    $unit6_1 = "℃";
} else {
    $unit6_1 = $row_s6_1["sensor_unit"];
}
if ($row_s6_2["sensor_unit"] == 1) {
    $unit6_2 = "℃";
} else {
    $unit6_2 = $row_s6_2["sensor_unit"];
}
if ($row_s6_3["sensor_unit"] == 1) {
    $unit6_3 = "℃";
} else {
    $unit6_3 = $row_s6_3["sensor_unit"];
}
if ($row_s6_4["sensor_unit"] == 1) {
    $unit6_4 = "℃";
} else {
    $unit6_4 = $row_s6_4["sensor_unit"];
}
if ($row_s7_1["sensor_unit"] == 1) {
    $unit7_1 = "℃";
} else {
    $unit7_1 = $row_s7_1["sensor_unit"];
}
if ($row_s7_2["sensor_unit"] == 1) {
    $unit7_2 = "℃";
} else {
    $unit7_2 = $row_s7_2["sensor_unit"];
}
if ($row_s7_3["sensor_unit"] == 1) {
    $unit7_3 = "℃";
} else {
    $unit7_3 = $row_s7_3["sensor_unit"];
}
if ($row_s7_4["sensor_unit"] == 1) {
    $unit7_4 = "℃";
} else {
    $unit7_4 = $row_s7_4["sensor_unit"];
}
if ($row_s8_1["sensor_unit"] == 1) {
    $unit8_1 = "℃";
} else {
    $unit8_1 = $row_s8_1["sensor_unit"];
}
if ($row_s8_2["sensor_unit"] == 1) {
    $unit8_2 = "℃";
} else {
    $unit8_2 = $row_s8_2["sensor_unit"];
}
if ($row_s8_3["sensor_unit"] == 1) {
    $unit8_3 = "℃";
} else {
    $unit8_3 = $row_s8_3["sensor_unit"];
}
if ($row_s8_4["sensor_unit"] == 1) {
    $unit8_4 = "℃";
} else {
    $unit8_4 = $row_s8_4["sensor_unit"];
}
if ($row_s9_1["sensor_unit"] == 1) {
    $unit9_1 = "℃";
} else {
    $unit9_1 = $row_s9_1["sensor_unit"];
}
if ($row_s9_2["sensor_unit"] == 1) {
    $unit9_2 = "℃";
} else {
    $unit9_2 = $row_s9_2["sensor_unit"];
}
if ($row_s9_3["sensor_unit"] == 1) {
    $unit9_3 = "℃";
} else {
    $unit9_3 = $row_s9_3["sensor_unit"];
}
if ($row_s9_4["sensor_unit"] == 1) {
    $unit9_4 = "℃";
} else {
    $unit9_4 = $row_s9_4["sensor_unit"];
}
if ($row_s10_1["sensor_unit"] == 1) {
    $unit10_1 = "℃";
} else {
    $unit10_1 = $row_s10_1["sensor_unit"];
}
if ($row_s10_2["sensor_unit"] == 1) {
    $unit10_2 = "℃";
} else {
    $unit10_2 = $row_s10_2["sensor_unit"];
}
if ($row_s10_3["sensor_unit"] == 1) {
    $unit10_3 = "℃";
} else {
    $unit10_3 = $row_s10_3["sensor_unit"];
}
if ($row_s10_4["sensor_unit"] == 1) {
    $unit10_4 = "℃";
} else {
    $unit10_4 = $row_s10_4["sensor_unit"];
}

$img_sn = [];
$img_sn[1] = $row_s1_1["sensor_imgNor"];
$img_sn[2] = $row_s1_2["sensor_imgNor"];
$img_sn[3] = $row_s1_3["sensor_imgNor"];
$img_sn[4] = $row_s1_4["sensor_imgNor"];
$img_sn[5] = $row_s2_1["sensor_imgNor"];
$img_sn[6] = $row_s2_2["sensor_imgNor"];
$img_sn[7] = $row_s2_3["sensor_imgNor"];
$img_sn[8] = $row_s2_4["sensor_imgNor"];
$img_sn[9] = $row_s3_1["sensor_imgNor"];
$img_sn[10] = $row_s3_2["sensor_imgNor"];
$img_sn[11] = $row_s3_3["sensor_imgNor"];
$img_sn[12] =  $row_s3_4["sensor_imgNor"];
$img_sn[13] =  $row_s4_1["sensor_imgNor"];
$img_sn[14] = $row_s4_2["sensor_imgNor"];
$img_sn[15] = $row_s4_3["sensor_imgNor"];
$img_sn[16] = $row_s4_4["sensor_imgNor"];
$img_sn[17] =  $row_s5_1["sensor_imgNor"];
$img_sn[18] =  $row_s5_2["sensor_imgNor"];
$img_sn[19] =  $row_s5_3["sensor_imgNor"];
$img_sn[20] =  $row_s5_4["sensor_imgNor"];
$img_sn[21] =  $row_s6_1["sensor_imgNor"];
$img_sn[22] = $row_s6_2["sensor_imgNor"];
$img_sn[23] = $row_s6_3["sensor_imgNor"];
$img_sn[24] = $row_s6_4["sensor_imgNor"];
$img_sn[25] = $row_s7_1["sensor_imgNor"];
$img_sn[26] = $row_s7_2["sensor_imgNor"];
$img_sn[27] = $row_s7_3["sensor_imgNor"];
$img_sn[28] = $row_s7_4["sensor_imgNor"];
$img_sn[29] = $row_s8_1["sensor_imgNor"];
$img_sn[30] = $row_s8_2["sensor_imgNor"];
$img_sn[31] = $row_s8_3["sensor_imgNor"];
$img_sn[32] = $row_s8_4["sensor_imgNor"];
$img_sn[33] = $row_s9_1["sensor_imgNor"];
$img_sn[34] = $row_s9_2["sensor_imgNor"];
$img_sn[35] = $row_s9_3["sensor_imgNor"];
$img_sn[36] = $row_s9_4["sensor_imgNor"];
$img_sn[37] = $row_s10_1["sensor_imgNor"];
$img_sn[38] = $row_s10_2["sensor_imgNor"];
$img_sn[39] = $row_s10_3["sensor_imgNor"];
$img_sn[40] = $row_s10_4["sensor_imgNor"];

$unit_sn = [];
// $unit_sn[0] = $unit1_1;
// $unit_sn[1] = $unit1_2;
// $unit_sn[2] = $unit1_3;
// $unit_sn[3] = $unit1_4;
// $unit_sn[4] = $unit2_1;
// $unit_sn[5] = $unit2_2;
// $unit_sn[6] = $unit2_3;
// $unit_sn[7] = $unit2_4;
// $unit_sn[8] = $unit3_1;
// $unit_sn[9] = $unit3_2;
// $unit_sn[10] = $unit3_3;
// $unit_sn[11] = $unit3_4;
// $unit_sn[12] = $unit4_1;
// $unit_sn[13] = $unit4_2;
// $unit_sn[14] = $unit4_3;
// $unit_sn[15] = $unit4_4;
// $unit_sn[16] = $unit5_1;
// $unit_sn[17] = $unit5_2;
// $unit_sn[18] = $unit5_3;
// $unit_sn[19] = $unit5_4;
// $unit_sn[20] = $unit6_1;
// $unit_sn[21] = $unit6_2;
// $unit_sn[22] = $unit6_3;
// $unit_sn[23] = $unit6_4;
// $unit_sn[24] = $unit7_1;
// $unit_sn[25] = $unit7_2;
// $unit_sn[26] = $unit7_3;
// $unit_sn[27] = $unit7_4;
// $unit_sn[28] = $unit8_1;
// $unit_sn[29] = $unit8_2;
// $unit_sn[30] = $unit8_3;
// $unit_sn[31] = $unit8_4;
// $unit_sn[32] = $unit9_1;
// $unit_sn[33] = $unit9_2;
// $unit_sn[34] = $unit9_3;
// $unit_sn[35] = $unit9_4;
// $unit_sn[36] = $unit10_1;
// $unit_sn[37] = $unit10_2;
// $unit_sn[38] = $unit10_3;
// $unit_sn[39] = $unit10_4;

$unit_sn[1] = $unit1_1;
$unit_sn[2] = $unit1_2;
$unit_sn[3] = $unit1_3;
$unit_sn[4] = $unit1_4;
$unit_sn[5] = $unit2_1;
$unit_sn[6] = $unit2_2;
$unit_sn[7] = $unit2_3;
$unit_sn[8] = $unit2_4;
$unit_sn[9] = $unit3_1;
$unit_sn[10] = $unit3_2;
$unit_sn[11] = $unit3_3;
$unit_sn[12] = $unit3_4;
$unit_sn[13] = $unit4_1;
$unit_sn[14] = $unit4_2;
$unit_sn[15] = $unit4_3;
$unit_sn[16] = $unit4_4;
$unit_sn[17] = $unit5_1;
$unit_sn[18] = $unit5_2;
$unit_sn[19] = $unit5_3;
$unit_sn[20] = $unit5_4;
$unit_sn[21] = $unit6_1;
$unit_sn[22] = $unit6_2;
$unit_sn[23] = $unit6_3;
$unit_sn[24] = $unit6_4;
$unit_sn[25] = $unit7_1;
$unit_sn[26] = $unit7_2;
$unit_sn[27] = $unit7_3;
$unit_sn[28] = $unit7_4;
$unit_sn[29] = $unit8_1;
$unit_sn[30] = $unit8_2;
$unit_sn[31] = $unit8_3;
$unit_sn[32] = $unit8_4;
$unit_sn[33] = $unit9_1;
$unit_sn[34] = $unit9_2;
$unit_sn[35] = $unit9_3;
$unit_sn[36] = $unit9_4;
$unit_sn[37] = $unit10_1;
$unit_sn[38] = $unit10_2;
$unit_sn[39] = $unit10_3;
$unit_sn[40] = $unit10_4;

// echo json_encode($unit_sn);
// exit();

$stmt4 = $dbcon->prepare("SELECT 
            sncanel_1_1, sncanel_1_2, sncanel_1_3, sncanel_1_4,
            sncanel_2_1, sncanel_2_2, sncanel_2_3, sncanel_2_4,
            sncanel_3_1, sncanel_3_2, sncanel_3_3, sncanel_3_4,
            sncanel_4_1, sncanel_4_2, sncanel_4_3, sncanel_4_4,
            sncanel_5_1, sncanel_5_2, sncanel_5_3, sncanel_5_4,
            sncanel_6_1, sncanel_6_2, sncanel_6_3, sncanel_6_4,
            sncanel_7_1, sncanel_7_2, sncanel_7_3, sncanel_7_4,
            sncanel_8_1, sncanel_8_2, sncanel_8_3, sncanel_8_4,
            sncanel_9_1, sncanel_9_2, sncanel_9_3, sncanel_9_4,
            sncanel_10_1, sncanel_10_2, sncanel_10_3, sncanel_10_4
        from tb3_sncanel  WHERE sncanel_sn = '$house_master' ");
$stmt4->execute();
$row4 = $stmt4->fetch();

// ------------------------------------------------------
$stmt5 = $dbcon->prepare("SELECT * from tb3_controlstatus  WHERE controlstatus_sn = '$house_master' order by controlstatus_id limit 1");
$stmt5->execute();
$row5 = $stmt5->fetch();
if(
    $row5["controlstatus_1"] == 0 && $row5["controlstatus_2"] == 0 && $row5["controlstatus_3"] == 0 &&
    $row5["controlstatus_4"] == 0 && $row5["controlstatus_5"] == 0 && $row5["controlstatus_6"] == 0 &&
    $row5["controlstatus_7"] == 0 && $row5["controlstatus_8"] == 0 && $row5["controlstatus_9"] == 0 &&
    $row5["controlstatus_10"] == 0 && $row5["controlstatus_11"] == 0 && $row5["controlstatus_12"] == 0
){
    $data5 = 0;
    $data6 = "";
    $data7 = "";
}else{
    $data5 = [
        'controlstatus_1'  => $row5["controlstatus_1"],
        'controlstatus_2'  => $row5["controlstatus_2"],
        'controlstatus_3'  => $row5["controlstatus_3"],
        'controlstatus_4'  => $row5["controlstatus_4"],
        'controlstatus_5'  => $row5["controlstatus_5"],
        'controlstatus_6'  => $row5["controlstatus_6"],
        'controlstatus_7'  => $row5["controlstatus_7"],
        'controlstatus_8'  => $row5["controlstatus_8"],
        'controlstatus_9'  => $row5["controlstatus_9"],
        'controlstatus_10'  => $row5["controlstatus_10"],
        'controlstatus_11'  => $row5["controlstatus_11"],
        'controlstatus_12'  => $row5["controlstatus_12"]
    ];

    $stmt6 = $dbcon->prepare("SELECT * from tb3_conttrolname  WHERE conttrolname_sn = '$house_master' ");
    $stmt6->execute();
    $row6 = $stmt6->fetch();
    $data6 = [
        'conttrolname_1'  => $row6["conttrolname_1"],
        'conttrolname_2'  => $row6["conttrolname_2"],
        'conttrolname_3'  => $row6["conttrolname_3"],
        'conttrolname_4'  => $row6["conttrolname_4"],
        'conttrolname_5'  => $row6["conttrolname_5"],
        'conttrolname_6'  => $row6["conttrolname_6"],
        'conttrolname_7'  => $row6["conttrolname_7"],
        'conttrolname_8'  => $row6["conttrolname_8"],
        'conttrolname_9'  => $row6["conttrolname_9"],
        'conttrolname_10'  => $row6["conttrolname_10"],
        'conttrolname_11'  => $row6["conttrolname_11"],
        'conttrolname_12'  => $row6["conttrolname_12"]
    ];

    $stmt7 = $dbcon->prepare("SELECT * from tb3_controlcanel  WHERE controlcanel_sn = '$house_master' ");
    $stmt7->execute();
    $row7 = $stmt7->fetch();
    $canel_d1  = $row7["controlcanel_1"];
    $canel_d2  = $row7["controlcanel_2"];
    $canel_d3  = $row7["controlcanel_3"];
    $canel_d4  = $row7["controlcanel_4"];
    $canel_d5  = $row7["controlcanel_5"];
    $canel_d6  = $row7["controlcanel_6"];
    $canel_d7  = $row7["controlcanel_7"];
    $canel_d8  = $row7["controlcanel_8"];
    $canel_d9  = $row7["controlcanel_9"];
    $canel_d10  = $row7["controlcanel_10"];
    $canel_d11  = $row7["controlcanel_11"];
    $canel_d12  = $row7["controlcanel_12"];

    $stmtL1 = $dbcon->prepare("SELECT * from tb_loard  WHERE loard_id = '$canel_d1' ");
    $stmtL1->execute();
    $rowL1 = $stmtL1->fetch();

    $stmtL2 = $dbcon->prepare("SELECT * from tb_loard  WHERE loard_id = '$canel_d2' ");
    $stmtL2->execute();
    $rowL2 = $stmtL2->fetch();

    $stmtL3 = $dbcon->prepare("SELECT * from tb_loard  WHERE loard_id = '$canel_d3' ");
    $stmtL3->execute();
    $rowL3 = $stmtL3->fetch();

    $stmtL4 = $dbcon->prepare("SELECT * from tb_loard  WHERE loard_id = '$canel_d4' ");
    $stmtL4->execute();
    $rowL4 = $stmtL4->fetch();

    $stmtL5 = $dbcon->prepare("SELECT * from tb_loard  WHERE loard_id = '$canel_d5' ");
    $stmtL5->execute();
    $rowL5 = $stmtL5->fetch();

    $stmtL6 = $dbcon->prepare("SELECT * from tb_loard  WHERE loard_id = '$canel_d6' ");
    $stmtL6->execute();
    $rowL6 = $stmtL6->fetch();

    $stmtL7 = $dbcon->prepare("SELECT * from tb_loard  WHERE loard_id = '$canel_d7' ");
    $stmtL7->execute();
    $rowL7 = $stmtL7->fetch();

    $stmtL8 = $dbcon->prepare("SELECT * from tb_loard  WHERE loard_id = '$canel_d8' ");
    $stmtL8->execute();
    $rowL8 = $stmtL8->fetch();

    $stmtL9 = $dbcon->prepare("SELECT * from tb_loard  WHERE loard_id = '$canel_d9' ");
    $stmtL9->execute();
    $rowL9 = $stmtL9->fetch();

    $stmtL10 = $dbcon->prepare("SELECT * from tb_loard  WHERE loard_id = '$canel_d10' ");
    $stmtL10->execute();
    $rowL10 = $stmtL10->fetch();

    $stmtL11 = $dbcon->prepare("SELECT * from tb_loard  WHERE loard_id = '$canel_d11' ");
    $stmtL11->execute();
    $rowL11 = $stmtL11->fetch();

    $stmtL12 = $dbcon->prepare("SELECT * from tb_loard  WHERE loard_id = '$canel_d12' ");
    $stmtL12->execute();
    $rowL12 = $stmtL12->fetch();

    $data7 = [
        'drip_1_on'      => $rowL1["loard_imgOn"],
        'drip_1_off'     => $rowL1["loard_imgOff"],
        'drip_2_on'      => $rowL2["loard_imgOn"],
        'drip_2_off'     => $rowL2["loard_imgOff"],
        'drip_3_on'      => $rowL3["loard_imgOn"],
        'drip_3_off'     => $rowL3["loard_imgOff"],
        'drip_4_on'      => $rowL4["loard_imgOn"],
        'drip_4_off'     => $rowL4["loard_imgOff"],
        'drip_5_on'      => $rowL5["loard_imgOn"],
        'drip_5_off'     => $rowL5["loard_imgOff"],
        'drip_6_on'      => $rowL6["loard_imgOn"],
        'drip_6_off'     => $rowL6["loard_imgOff"],
        'drip_7_on'      => $rowL7["loard_imgOn"],
        'drip_7_off'     => $rowL7["loard_imgOff"],
        'drip_8_on'      => $rowL8["loard_imgOn"],
        'drip_8_off'     => $rowL8["loard_imgOff"],
        'foggy_on'       => $rowL9["loard_imgOn"],
        'foggy_off'      => $rowL9["loard_imgOff"],
        'fan_on'         => $rowL10["loard_imgOn"],
        'fan_off'        => $rowL10["loard_imgOff"],
        'shader_0'       => $rowL11["loard_imgOff"],
        'shader_1'       => $rowL11["loard_imgOn"],
        'shader_2'       => $rowL11["loard_img2"],
        'shader_3'       => $rowL11["loard_img3"],
        'shader_4'       => $rowL11["loard_img4"],
        'fertilizer_on'  => $rowL12["loard_imgOn"],
        'fertilizer_off' => $rowL12["loard_imgOff"]
    ];
}
$row_m = $dbcon->query("SELECT * from tb3_meter_status  WHERE meter_status_sn = '$house_master' ORDER BY meter_status_id DESC LIMIT 1")->fetch();
    if(
        $row_m["meter_status_v"] == "0" && $row_m["meter_status_a"] == "0" && $row_m["meter_status_p"] == "0" &&
        $row_m["meter_status_water"] == "0" && $row_m["meter_status_wind_speed"] == "0" && $row_m["meter_status_wind_direction"] == "0"
    ){
        $show_meter = 0;
    }else{
        $show_meter = 1;
    }
echo json_encode([
    'Status'        => $row1,
    'Name'          => $row2,
    'Sensor_mode'   => $row3,
    'Sncanel'       => $row4,
    'img_sn'        => $img_sn,
    'unit_sn'       => $unit_sn,
    'Controlstatus' => $data5,
    'Controlname'   => $data6,
    'Controlimg'    => $data7,
    'show_meter'    => $show_meter
    // 'meter_status'  => $data8
]);
