<?php
require '../config_db/connectdb.php';

if (isset($_POST["house_master"])) {
   $house_master = $_POST["house_master"];


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
   $name_sn = [];
   $name_sn[1] = $row2["dashname_1_1"];
   $name_sn[2] = $row2["dashname_1_2"];
   $name_sn[3] = $row2["dashname_1_3"];
   $name_sn[4] = $row2["dashname_1_4"];
   $name_sn[5] = $row2["dashname_2_1"];
   $name_sn[6] = $row2["dashname_2_2"];
   $name_sn[7] = $row2["dashname_2_3"];
   $name_sn[8] = $row2["dashname_2_4"];
   $name_sn[9] = $row2["dashname_3_1"];
   $name_sn[10] = $row2["dashname_3_2"];
   $name_sn[11] = $row2["dashname_3_3"];
   $name_sn[12] = $row2["dashname_3_4"];
   $name_sn[13] = $row2["dashname_4_1"];
   $name_sn[14] = $row2["dashname_4_2"];
   $name_sn[15] = $row2["dashname_4_3"];
   $name_sn[16] = $row2["dashname_4_4"];
   $name_sn[17] = $row2["dashname_5_1"];
   $name_sn[18] = $row2["dashname_5_2"];
   $name_sn[19] = $row2["dashname_5_3"];
   $name_sn[20] = $row2["dashname_5_4"];
   $name_sn[21] = $row2["dashname_6_1"];
   $name_sn[22] = $row2["dashname_6_2"];
   $name_sn[23] = $row2["dashname_6_3"];
   $name_sn[24] = $row2["dashname_6_4"];
   $name_sn[25] = $row2["dashname_7_1"];
   $name_sn[26] = $row2["dashname_7_2"];
   $name_sn[27] = $row2["dashname_7_3"];
   $name_sn[28] = $row2["dashname_7_4"];
   $name_sn[29] = $row2["dashname_8_1"];
   $name_sn[30] = $row2["dashname_8_2"];
   $name_sn[31] = $row2["dashname_8_3"];
   $name_sn[32] = $row2["dashname_8_4"];
   $name_sn[33] = $row2["dashname_9_1"];
   $name_sn[34] = $row2["dashname_9_2"];
   $name_sn[35] = $row2["dashname_9_3"];
   $name_sn[36] = $row2["dashname_9_4"];
   $name_sn[37] = $row2["dashname_10_1"];
   $name_sn[38] = $row2["dashname_10_2"];
   $name_sn[39] = $row2["dashname_10_3"];
   $name_sn[40] = $row2["dashname_10_4"];

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
   } else if ($row_s1_1["sensor_unit"] == "Lux") {
      $unit1_1 = "KLux";
   } else {
      $unit1_1 = $row_s1_1["sensor_unit"];
   }

   if ($row_s1_2["sensor_unit"] == 1) {
      $unit1_2 = "℃";
   } else if ($row_s1_2["sensor_unit"] == "Lux") {
      $unit1_2 = "KLux";
   } else {
      $unit1_2 = $row_s1_2["sensor_unit"];
   }

   if ($row_s1_3["sensor_unit"] == 1) {
      $unit1_3 = "℃";
   } else if ($row_s1_3["sensor_unit"] == "Lux") {
      $unit1_3 = "KLux";
   } else {
      $unit1_3 = $row_s1_3["sensor_unit"];
   }

   if ($row_s1_4["sensor_unit"] == 1) {
      $unit1_4 = "℃";
   } else if ($row_s1_4["sensor_unit"] == "Lux") {
      $unit1_4 = "KLux";
   } else {
      $unit1_4 = $row_s1_4["sensor_unit"];
   }

   if ($row_s2_1["sensor_unit"] == 1) {
      $unit2_1 = "℃";
   } else if ($row_s2_1["sensor_unit"] == "Lux") {
      $unit2_1 = "KLux";
   } else {
      $unit2_1 = $row_s2_1["sensor_unit"];
   }

   if ($row_s2_2["sensor_unit"] == 1) {
      $unit2_2 = "℃";
   } else if ($row_s2_2["sensor_unit"] == "Lux") {
      $unit2_2 = "KLux";
   } else {
      $unit2_2 = $row_s2_2["sensor_unit"];
   }

   if ($row_s2_3["sensor_unit"] == 1) {
      $unit2_3 = "℃";
   } else if ($row_s2_3["sensor_unit"] == "Lux") {
      $unit2_3 = "KLux";
   } else {
      $unit2_3 = $row_s2_3["sensor_unit"];
   }

   if ($row_s2_4["sensor_unit"] == 1) {
      $unit2_4 = "℃";
   } else if ($row_s2_4["sensor_unit"] == "Lux") {
      $unit2_4 = "KLux";
   } else {
      $unit2_4 = $row_s2_4["sensor_unit"];
   }

   if ($row_s3_1["sensor_unit"] == 1) {
      $unit3_1 = "℃";
   } else if ($row_s3_1["sensor_unit"] == "Lux") {
      $unit3_1 = "KLux";
   } else {
      $unit3_1 = $row_s3_1["sensor_unit"];
   }

   if ($row_s3_2["sensor_unit"] == 1) {
      $unit3_2 = "℃";
   } else if ($row_s3_2["sensor_unit"] == "Lux") {
      $unit3_2 = "KLux";
   } else {
      $unit3_2 = $row_s3_2["sensor_unit"];
   }

   if ($row_s3_3["sensor_unit"] == 1) {
      $unit3_3 = "℃";
   } else if ($row_s3_3["sensor_unit"] == "Lux") {
      $unit3_3 = "KLux";
   } else {
      $unit3_3 = $row_s3_3["sensor_unit"];
   }

   if ($row_s3_4["sensor_unit"] == 1) {
      $unit3_4 = "℃";
   } else if ($row_s3_4["sensor_unit"] == "Lux") {
      $unit3_4 = "KLux";
   } else {
      $unit3_4 = $row_s3_4["sensor_unit"];
   }

   if ($row_s4_1["sensor_unit"] == 1) {
      $unit4_1 = "℃";
   } else if ($row_s4_1["sensor_unit"] == "Lux") {
      $unit4_1 = "KLux";
   } else {
      $unit4_1 = $row_s4_1["sensor_unit"];
   }

   if ($row_s4_2["sensor_unit"] == 1) {
      $unit4_2 = "℃";
   } else if ($row_s4_2["sensor_unit"] == "Lux") {
      $unit4_2 = "KLux";
   } else {
      $unit4_2 = $row_s4_2["sensor_unit"];
   }

   if ($row_s4_3["sensor_unit"] == 1) {
      $unit4_3 = "℃";
   } else if ($row_s4_3["sensor_unit"] == "Lux") {
      $unit4_3 = "KLux";
   } else {
      $unit4_3 = $row_s4_3["sensor_unit"];
   }

   if ($row_s4_4["sensor_unit"] == 1) {
      $unit4_4 = "℃";
   } else if ($row_s4_4["sensor_unit"] == "Lux") {
      $unit4_4 = "KLux";
   } else {
      $unit4_4 = $row_s4_4["sensor_unit"];
   }

   if ($row_s5_1["sensor_unit"] == 1) {
      $unit5_1 = "℃";
   } else if ($row_s5_1["sensor_unit"] == "Lux") {
      $unit5_1 = "KLux";
   } else {
      $unit5_1 = $row_s5_1["sensor_unit"];
   }

   if ($row_s5_2["sensor_unit"] == 1) {
      $unit5_2 = "℃";
   } else if ($row_s5_2["sensor_unit"] == "Lux") {
      $unit5_2 = "KLux";
   } else {
      $unit5_2 = $row_s5_2["sensor_unit"];
   }

   if ($row_s5_3["sensor_unit"] == 1) {
      $unit5_3 = "℃";
   } else if ($row_s5_3["sensor_unit"] == "Lux") {
      $unit5_3 = "KLux";
   } else {
      $unit5_3 = $row_s5_3["sensor_unit"];
   }

   if ($row_s5_4["sensor_unit"] == 1) {
      $unit5_4 = "℃";
   } else if ($row_s5_4["sensor_unit"] == "Lux") {
      $unit5_4 = "KLux";
   } else {
      $unit5_4 = $row_s5_4["sensor_unit"];
   }

   if ($row_s6_1["sensor_unit"] == 1) {
      $unit6_1 = "℃";
   } else if ($row_s6_1["sensor_unit"] == "Lux") {
      $unit6_1 = "KLux";
   } else {
      $unit6_1 = $row_s6_1["sensor_unit"];
   }

   if ($row_s6_2["sensor_unit"] == 1) {
      $unit6_2 = "℃";
   } else if ($row_s6_2["sensor_unit"] == "Lux") {
      $unit6_2 = "KLux";
   } else {
      $unit6_2 = $row_s6_2["sensor_unit"];
   }

   if ($row_s6_3["sensor_unit"] == 1) {
      $unit6_3 = "℃";
   } else if ($row_s6_3["sensor_unit"] == "Lux") {
      $unit6_3 = "KLux";
   } else {
      $unit6_3 = $row_s6_3["sensor_unit"];
   }

   if ($row_s6_4["sensor_unit"] == 1) {
      $unit6_4 = "℃";
   } else if ($row_s6_4["sensor_unit"] == "Lux") {
      $unit6_4 = "KLux";
   } else {
      $unit6_4 = $row_s6_4["sensor_unit"];
   }

   if ($row_s7_1["sensor_unit"] == 1) {
      $unit7_1 = "℃";
   } else if ($row_s7_1["sensor_unit"] == "Lux") {
      $unit7_1 = "KLux";
   } else {
      $unit7_1 = $row_s7_1["sensor_unit"];
   }

   if ($row_s7_2["sensor_unit"] == 1) {
      $unit7_2 = "℃";
   } else if ($row_s7_2["sensor_unit"] == "Lux") {
      $unit7_2 = "KLux";
   } else {
      $unit7_2 = $row_s7_2["sensor_unit"];
   }

   if ($row_s7_3["sensor_unit"] == 1) {
      $unit7_3 = "℃";
   } else if ($row_s7_3["sensor_unit"] == "Lux") {
      $unit7_3 = "KLux";
   } else {
      $unit7_3 = $row_s7_3["sensor_unit"];
   }

   if ($row_s7_4["sensor_unit"] == 1) {
      $unit7_4 = "℃";
   } else if ($row_s7_4["sensor_unit"] == "Lux") {
      $unit7_4 = "KLux";
   } else {
      $unit7_4 = $row_s7_4["sensor_unit"];
   }

   if ($row_s8_1["sensor_unit"] == 1) {
      $unit8_1 = "℃";
   } else if ($row_s8_1["sensor_unit"] == "Lux") {
      $unit8_1 = "KLux";
   } else {
      $unit8_1 = $row_s8_1["sensor_unit"];
   }

   if ($row_s8_2["sensor_unit"] == 1) {
      $unit8_2 = "℃";
   } else if ($row_s8_2["sensor_unit"] == "Lux") {
      $unit8_2 = "KLux";
   } else {
      $unit8_2 = $row_s8_2["sensor_unit"];
   }

   if ($row_s8_3["sensor_unit"] == 1) {
      $unit8_3 = "℃";
   } else if ($row_s8_3["sensor_unit"] == "Lux") {
      $unit8_3 = "KLux";
   } else {
      $unit8_3 = $row_s8_3["sensor_unit"];
   }

   if ($row_s8_4["sensor_unit"] == 1) {
      $unit8_4 = "℃";
   } else if ($row_s8_4["sensor_unit"] == "Lux") {
      $unit8_4 = "KLux";
   } else {
      $unit8_4 = $row_s8_4["sensor_unit"];
   }

   if ($row_s9_1["sensor_unit"] == 1) {
      $unit9_1 = "℃";
   } else if ($row_s9_1["sensor_unit"] == "Lux") {
      $unit9_1 = "KLux";
   } else {
      $unit9_1 = $row_s9_1["sensor_unit"];
   }

   if ($row_s9_2["sensor_unit"] == 1) {
      $unit9_2 = "℃";
   } else if ($row_s9_2["sensor_unit"] == "Lux") {
      $unit9_2 = "KLux";
   } else {
      $unit9_2 = $row_s9_2["sensor_unit"];
   }

   if ($row_s9_3["sensor_unit"] == 1) {
      $unit9_3 = "℃";
   } else if ($row_s9_3["sensor_unit"] == "Lux") {
      $unit9_3 = "KLux";
   } else {
      $unit9_3 = $row_s9_3["sensor_unit"];
   }

   if ($row_s9_4["sensor_unit"] == 1) {
      $unit9_4 = "℃";
   } else if ($row_s9_4["sensor_unit"] == "Lux") {
      $unit9_4 = "KLux";
   } else {
      $unit9_4 = $row_s9_4["sensor_unit"];
   }

   if ($row_s10_1["sensor_unit"] == 1) {
      $unit10_1 = "℃";
   } else if ($row_s10_1["sensor_unit"] == "Lux") {
      $unit10_1 = "KLux";
   } else {
      $unit10_1 = $row_s10_1["sensor_unit"];
   }

   if ($row_s10_2["sensor_unit"] == 1) {
      $unit10_2 = "℃";
   } else if ($row_s10_2["sensor_unit"] == "Lux") {
      $unit10_2 = "KLux";
   } else {
      $unit10_2 = $row_s10_2["sensor_unit"];
   }

   if ($row_s10_3["sensor_unit"] == 1) {
      $unit10_3 = "℃";
   } else if ($row_s10_3["sensor_unit"] == "Lux") {
      $unit10_3 = "KLux";
   } else {
      $unit10_3 = $row_s10_3["sensor_unit"];
   }

   if ($row_s10_4["sensor_unit"] == 1) {
      $unit10_4 = "℃";
   } else if ($row_s10_4["sensor_unit"] == "Lux") {
      $unit10_4 = "KLux";
   } else {
      $unit10_4 = $row_s10_4["sensor_unit"];
   }

   $unit_sn = [];
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
   echo json_encode([
      "unit" => $unit_sn,
      "sn_name" => $name_sn
      ]);
} else {
   echo "No data";
}
