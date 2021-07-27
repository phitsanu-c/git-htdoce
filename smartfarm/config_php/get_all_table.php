<?php
require '../config_db/connectdb.php';

if (isset($_POST["house_master"])) {
   $house_master = $_POST["house_master"];
   $btn_status = $_POST["btn_status"]; // array btn_status
   // echo json_encode($btn_status);
   // exit();
   if ($_POST["status"] == 'day') {
      $start_day = date("Y/m/d H:i:s", strtotime('-1 day'));
      $stop_day = date("Y/m/d H:i:s");
   } else if ($_POST["status"] == 'week') {
      $start_day = date("Y/m/d H:i:s", strtotime('-7 day'));
      $stop_day = date("Y/m/d H:i:s");
   } else if ($_POST["status"] == 'month') {
      $start_day = date("Y/m/d H:i:s", strtotime('-30 day'));
      $stop_day = date("Y/m/d H:i:s");
   } else if ($_POST["status"] == 'from_to') {
      $start_day = $_POST["v_start"];
      $stop_day = $_POST["v_end"];
   }
   try {
      $stmt_n = $dbcon->prepare("SELECT * from tb3_dashname WHERE dashname_sn = '$house_master' order by dashname_id limit 1");
      $stmt_n->execute();
      $row_n = $stmt_n->fetch();

      $stmt3 = $dbcon->prepare("SELECT * from tb3_statussn  WHERE statussn_sn = '$house_master' ");
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
      // -------------------------------------

      $query1 = $dbcon->prepare("SELECT * FROM tb3_sncanel WHERE sncanel_sn = '$house_master' ORDER BY sncanel_id LIMIT 1 ");
      $query1->execute();
      $row1 = $query1->fetch(PDO::FETCH_BOTH);

      if ($row3["statussn_1_1"] == 4 || $row3["statussn_1_1"] == 5) {
         $sncanel_1_1 = $row1["sncanel_1_1"] . "/1000";
      } elseif ($row3["statussn_1_1"] == 6 || $row3["statussn_1_1"] == 7) {
         $sncanel_1_1 = $row1["sncanel_1_1"] . "/54";
      } else {
         $sncanel_1_1 = $row1["sncanel_1_1"];
      }
      if ($row3["statussn_1_2"] == 4 || $row3["statussn_1_2"] == 5) {
         $sncanel_1_2 = $row1["sncanel_1_2"] . "/1000";
      } elseif ($row3["statussn_1_2"] == 6 || $row3["statussn_1_2"] == 7) {
         $sncanel_1_2 = $row1["sncanel_1_2"] . "/54";
      } else {
         $sncanel_1_2 = $row1["sncanel_1_2"];
      }
      if($house_master == "KMUMT001"){
         $sncanel_1_3 = $row1["sncanel_1_3"];
      }else{
         if ($row3["statussn_1_3"] == 4 || $row3["statussn_1_3"] == 5) {
            $sncanel_1_3 = $row1["sncanel_1_3"] . "/1000";
         } elseif ($row3["statussn_1_3"] == 6 || $row3["statussn_1_3"] == 7) {
            $sncanel_1_3 = $row1["sncanel_1_3"] . "/54";
         } else {
            $sncanel_1_3 = $row1["sncanel_1_3"];
         }
      }
      if ($row3["statussn_1_4"] == 4 || $row3["statussn_1_4"] == 5) {
         $sncanel_1_4 = $row1["sncanel_1_4"] . "/1000";
      } elseif ($row3["statussn_1_4"] == 6 || $row3["statussn_1_4"] == 7) {
         $sncanel_1_4 = $row1["sncanel_1_4"] . "/54";
      } else {
         $sncanel_1_4 = $row1["sncanel_1_4"];
      }

      if ($row3["statussn_2_1"] == 4 || $row3["statussn_2_1"] == 5) {
         $sncanel_2_1 = $row1["sncanel_2_1"] . "/1000";
      } elseif ($row3["statussn_2_1"] == 6 || $row3["statussn_2_1"] == 7) {
         $sncanel_2_1 = $row1["sncanel_2_1"] . "/54";
      } else {
         $sncanel_2_1 = $row1["sncanel_2_1"];
      }
      if ($row3["statussn_2_2"] == 4 || $row3["statussn_2_2"] == 5) {
         $sncanel_2_2 = $row1["sncanel_2_2"] . "/1000";
      } elseif ($row3["statussn_2_2"] == 6 || $row3["statussn_2_2"] == 7) {
         $sncanel_2_2 = $row1["sncanel_2_2"] . "/54";
      } else {
         $sncanel_2_2 = $row1["sncanel_2_2"];
      }
      if($house_master == "KMUMT001"){
         $sncanel_2_3 = $row1["sncanel_3_3"];
      }else{
         if ($row3["statussn_2_3"] == 4 || $row3["statussn_2_3"] == 5) {
            $sncanel_2_3 = $row1["sncanel_2_3"] . "/1000";
         } elseif ($row3["statussn_2_3"] == 6 || $row3["statussn_2_3"] == 7) {
            $sncanel_2_3 = $row1["sncanel_2_3"] . "/54";
         } else {
            $sncanel_2_3 = $row1["sncanel_2_3"];
         }
      }
      if ($row3["statussn_2_4"] == 4 || $row3["statussn_2_4"] == 5) {
         $sncanel_2_4 = $row1["sncanel_2_4"] . "/1000";
      } elseif ($row3["statussn_2_4"] == 6 || $row3["statussn_2_4"] == 7) {
         $sncanel_2_4 = $row1["sncanel_2_4"] . "/54";
      } else {
         $sncanel_2_4 = $row1["sncanel_2_4"];
      }

      if ($row3["statussn_3_1"] == 4 || $row3["statussn_3_1"] == 5) {
         $sncanel_3_1 = $row1["sncanel_3_1"] . "/1000";
      } elseif ($row3["statussn_3_1"] == 6 || $row3["statussn_3_1"] == 7) {
         $sncanel_3_1 = $row1["sncanel_3_1"] . "/54";
      } else {
         $sncanel_3_1 = $row1["sncanel_3_1"];
      }
      if ($row3["statussn_3_2"] == 4 || $row3["statussn_3_2"] == 5) {
         $sncanel_3_2 = $row1["sncanel_3_2"] . "/1000";
      } elseif ($row3["statussn_3_2"] == 6 || $row3["statussn_3_2"] == 7) {
         $sncanel_3_2 = $row1["sncanel_3_2"] . "/54";
      } else {
         $sncanel_3_2 = $row1["sncanel_3_2"];
      }
      if ($row3["statussn_3_3"] == 4 || $row3["statussn_3_3"] == 5) {
         $sncanel_3_3 = $row1["sncanel_3_3"] . "/1000";
      } elseif ($row3["statussn_3_3"] == 6 || $row3["statussn_3_3"] == 7) {
         $sncanel_3_3 = $row1["sncanel_3_3"] . "/54";
      } else {
         $sncanel_3_3 = $row1["sncanel_3_3"];
      }
      if ($row3["statussn_3_4"] == 4 || $row3["statussn_3_4"] == 5) {
         $sncanel_3_4 = $row1["sncanel_3_4"] . "/1000";
      } elseif ($row3["statussn_3_4"] == 6 || $row3["statussn_3_4"] == 7) {
         $sncanel_3_4 = $row1["sncanel_3_4"] . "/54";
      } else {
         $sncanel_3_4 = $row1["sncanel_3_4"];
      }

      if ($row3["statussn_4_1"] == 4 || $row3["statussn_4_1"] == 5) {
         $sncanel_4_1 = $row1["sncanel_4_1"] . "/1000";
      } elseif ($row3["statussn_4_1"] == 6 || $row3["statussn_4_1"] == 7) {
         $sncanel_4_1 = $row1["sncanel_4_1"] . "/54";
      } else {
         $sncanel_4_1 = $row1["sncanel_4_1"];
      }
      if ($row3["statussn_4_2"] == 4 || $row3["statussn_4_2"] == 5) {
         $sncanel_4_2 = $row1["sncanel_4_2"] . "/1000";
      } elseif ($row3["statussn_4_2"] == 6 || $row3["statussn_4_2"] == 7) {
         $sncanel_4_2 = $row1["sncanel_4_2"] . "/54";
      } else {
         $sncanel_4_2 = $row1["sncanel_4_2"];
      }
      if ($row3["statussn_4_3"] == 4 || $row3["statussn_4_3"] == 5) {
         $sncanel_4_3 = $row1["sncanel_4_3"] . "/1000";
      } elseif ($row3["statussn_4_3"] == 6 || $row3["statussn_4_3"] == 7) {
         $sncanel_4_3 = $row1["sncanel_4_3"] . "/54";
      } else {
         $sncanel_4_3 = $row1["sncanel_4_3"];
      }
      if ($row3["statussn_4_4"] == 4 || $row3["statussn_4_4"] == 5) {
         $sncanel_4_4 = $row1["sncanel_4_4"] . "/1000";
      } elseif ($row3["statussn_4_4"] == 6 || $row3["statussn_4_4"] == 7) {
         $sncanel_4_4 = $row1["sncanel_4_4"] . "/54";
      } else {
         $sncanel_4_4 = $row1["sncanel_4_4"];
      }

      if ($row3["statussn_5_1"] == 4 || $row3["statussn_5_1"] == 5) {
         $sncanel_5_1 = $row1["sncanel_5_1"] . "/1000";
      } elseif ($row3["statussn_5_1"] == 6 || $row3["statussn_5_1"] == 7) {
         $sncanel_5_1 = $row1["sncanel_5_1"] . "/54";
      } else {
         $sncanel_5_1 = $row1["sncanel_5_1"];
      }
      if ($row3["statussn_5_2"] == 4 || $row3["statussn_5_2"] == 5) {
         $sncanel_5_2 = $row1["sncanel_5_2"] . "/1000";
      } elseif ($row3["statussn_5_2"] == 6 || $row3["statussn_5_2"] == 7) {
         $sncanel_5_2 = $row1["sncanel_5_2"] . "/54";
      } else {
         $sncanel_5_2 = $row1["sncanel_5_2"];
      }
      if ($row3["statussn_5_3"] == 4 || $row3["statussn_5_3"] == 5) {
         $sncanel_5_3 = $row1["sncanel_5_3"] . "/1000";
      } elseif ($row3["statussn_5_3"] == 6 || $row3["statussn_5_3"] == 7) {
         $sncanel_5_3 = $row1["sncanel_5_3"] . "/54";
      } else {
         $sncanel_5_3 = $row1["sncanel_5_3"];
      }
      if ($row3["statussn_5_4"] == 4 || $row3["statussn_5_4"] == 5) {
         $sncanel_5_4 = $row1["sncanel_5_4"] . "/1000";
      } elseif ($row3["statussn_5_4"] == 6 || $row3["statussn_5_4"] == 7) {
         $sncanel_5_4 = $row1["sncanel_5_4"] . "/54";
      } else {
         $sncanel_5_4 = $row1["sncanel_5_4"];
      }

      if ($row3["statussn_6_1"] == 4 || $row3["statussn_6_1"] == 5) {
         $sncanel_6_1 = $row1["sncanel_6_1"] . "/1000";
      } elseif ($row3["statussn_6_1"] == 6 || $row3["statussn_6_1"] == 7) {
         $sncanel_6_1 = $row1["sncanel_6_1"] . "/54";
      } else {
         $sncanel_6_1 = $row1["sncanel_6_1"];
      }
      if ($row3["statussn_6_2"] == 4 || $row3["statussn_6_2"] == 5) {
         $sncanel_6_2 = $row1["sncanel_6_2"] . "/1000";
      } elseif ($row3["statussn_6_2"] == 6 || $row3["statussn_6_2"] == 7) {
         $sncanel_6_2 = $row1["sncanel_6_2"] . "/54";
      } else {
         $sncanel_6_2 = $row1["sncanel_6_2"];
      }
      if ($row3["statussn_6_3"] == 4 || $row3["statussn_6_3"] == 5) {
         $sncanel_6_3 = $row1["sncanel_6_3"] . "/1000";
      } elseif ($row3["statussn_6_3"] == 6 || $row3["statussn_6_3"] == 7) {
         $sncanel_6_3 = $row1["sncanel_6_3"] . "/54";
      } else {
         $sncanel_6_3 = $row1["sncanel_6_3"];
      }
      if ($row3["statussn_6_4"] == 4 || $row3["statussn_6_4"] == 5) {
         $sncanel_6_4 = $row1["sncanel_6_4"] . "/1000";
      } elseif ($row3["statussn_6_4"] == 6 || $row3["statussn_6_4"] == 7) {
         $sncanel_6_4 = $row1["sncanel_6_4"] . "/54";
      } else {
         $sncanel_6_4 = $row1["sncanel_6_4"];
      }

      if ($row3["statussn_7_1"] == 4 || $row3["statussn_7_1"] == 5) {
         $sncanel_7_1 = $row1["sncanel_7_1"] . "/1000";
      } elseif ($row3["statussn_7_1"] == 6 || $row3["statussn_7_1"] == 7) {
         $sncanel_7_1 = $row1["sncanel_7_1"] . "/54";
      } else {
         $sncanel_7_1 = $row1["sncanel_7_1"];
      }
      if ($row3["statussn_7_2"] == 4 || $row3["statussn_7_2"] == 5) {
         $sncanel_7_2 = $row1["sncanel_7_2"] . "/1000";
      } elseif ($row3["statussn_7_2"] == 6 || $row3["statussn_7_2"] == 7) {
         $sncanel_7_2 = $row1["sncanel_7_2"] . "/54";
      } else {
         $sncanel_7_2 = $row1["sncanel_7_2"];
      }
      if ($row3["statussn_7_3"] == 4 || $row3["statussn_7_3"] == 5) {
         $sncanel_7_3 = $row1["sncanel_7_3"] . "/1000";
      } elseif ($row3["statussn_7_3"] == 6 || $row3["statussn_7_3"] == 7) {
         $sncanel_7_3 = $row1["sncanel_7_3"] . "/54";
      } else {
         $sncanel_7_3 = $row1["sncanel_7_3"];
      }
      if ($row3["statussn_7_4"] == 4 || $row3["statussn_7_4"] == 5) {
         $sncanel_7_4 = $row1["sncanel_7_4"] . "/1000";
      } elseif ($row3["statussn_7_4"] == 6 || $row3["statussn_7_4"] == 7) {
         $sncanel_7_4 = $row1["sncanel_7_4"] . "/54";
      } else {
         $sncanel_7_4 = $row1["sncanel_7_4"];
      }

      if ($row3["statussn_8_1"] == 4 || $row3["statussn_8_1"] == 5) {
         $sncanel_8_1 = $row1["sncanel_8_1"] . "/1000";
      } elseif ($row3["statussn_8_1"] == 6 || $row3["statussn_8_1"] == 7) {
         $sncanel_8_1 = $row1["sncanel_8_1"] . "/54";
      } else {
         $sncanel_8_1 = $row1["sncanel_8_1"];
      }
      if ($row3["statussn_8_2"] == 4 || $row3["statussn_8_2"] == 5) {
         $sncanel_8_2 = $row1["sncanel_8_2"] . "/1000";
      } elseif ($row3["statussn_8_2"] == 6 || $row3["statussn_8_2"] == 7) {
         $sncanel_8_2 = $row1["sncanel_8_2"] . "/54";
      } else {
         $sncanel_8_2 = $row1["sncanel_8_2"];
      }
      if ($row3["statussn_8_3"] == 4 || $row3["statussn_8_3"] == 5) {
         $sncanel_8_3 = $row1["sncanel_8_3"] . "/1000";
      } elseif ($row3["statussn_8_3"] == 6 || $row3["statussn_8_3"] == 7) {
         $sncanel_8_3 = $row1["sncanel_8_3"] . "/54";
      } else {
         $sncanel_8_3 = $row1["sncanel_8_3"];
      }
      if ($row3["statussn_8_4"] == 4 || $row3["statussn_8_4"] == 5) {
         $sncanel_8_4 = $row1["sncanel_8_4"] . "/1000";
      } elseif ($row3["statussn_8_4"] == 6 || $row3["statussn_8_4"] == 7) {
         $sncanel_8_4 = $row1["sncanel_8_4"] . "/54";
      } else {
         $sncanel_8_4 = $row1["sncanel_8_4"];
      }

      if ($row3["statussn_9_1"] == 4 || $row3["statussn_9_1"] == 5) {
         $sncanel_9_1 = $row1["sncanel_9_1"] . "/1000";
      } elseif ($row3["statussn_9_1"] == 6 || $row3["statussn_9_1"] == 7) {
         $sncanel_9_1 = $row1["sncanel_9_1"] . "/54";
      } else {
         $sncanel_9_1 = $row1["sncanel_9_1"];
      }
      if ($row3["statussn_9_2"] == 4 || $row3["statussn_9_2"] == 5) {
         $sncanel_9_2 = $row1["sncanel_9_2"] . "/1000";
      } elseif ($row3["statussn_9_2"] == 6 || $row3["statussn_9_2"] == 7) {
         $sncanel_9_2 = $row1["sncanel_9_2"] . "/54";
      } else {
         $sncanel_9_2 = $row1["sncanel_9_2"];
      }
      if ($row3["statussn_9_3"] == 4 || $row3["statussn_9_3"] == 5) {
         $sncanel_9_3 = $row1["sncanel_9_3"] . "/1000";
      } elseif ($row3["statussn_9_3"] == 6 || $row3["statussn_9_3"] == 7) {
         $sncanel_9_3 = $row1["sncanel_9_3"] . "/54";
      } else {
         $sncanel_9_3 = $row1["sncanel_9_3"];
      }
      if ($row3["statussn_9_4"] == 4 || $row3["statussn_9_4"] == 5) {
         $sncanel_9_4 = $row1["sncanel_9_4"] . "/1000";
      } elseif ($row3["statussn_9_4"] == 6 || $row3["statussn_9_4"] == 7) {
         $sncanel_9_4 = $row1["sncanel_9_4"] . "/54";
      } else {
         $sncanel_9_4 = $row1["sncanel_9_4"];
      }

      if ($row3["statussn_10_1"] == 4 || $row3["statussn_10_1"] == 5) {
         $sncanel_10_1 = $row1["sncanel_01_1"] . "/1000";
      } elseif ($row3["statussn_10_1"] == 6 || $row3["statussn_10_1"] == 7) {
         $sncanel_10_1 = $row1["sncanel_10_1"] . "/54";
      } else {
         $sncanel_10_1 = $row1["sncanel_10_1"];
      }
      if ($row3["statussn_10_2"] == 4 || $row3["statussn_10_2"] == 5) {
         $sncanel_10_2 = $row1["sncanel_10_2"] . "/1000";
      } elseif ($row3["statussn_10_2"] == 6 || $row3["statussn_10_2"] == 7) {
         $sncanel_10_2 = $row1["sncanel_10_2"] . "/54";
      } else {
         $sncanel_10_2 = $row1["sncanel_10_2"];
      }
      if ($row3["statussn_10_3"] == 4 || $row3["statussn_10_3"] == 5) {
         $sncanel_10_3 = $row1["sncanel_10_3"] . "/1000";
      } elseif ($row3["statussn_10_3"] == 6 || $row3["statussn_10_3"] == 7) {
         $sncanel_10_3 = $row1["sncanel_10_3"] . "/54";
      } else {
         $sncanel_10_3 = $row1["sncanel_10_3"];
      }
      if ($row3["statussn_10_4"] == 4 || $row3["statussn_10_4"] == 5) {
         $sncanel_10_4 = $row1["sncanel_10_4"] . "/1000";
      } elseif ($row3["statussn_10_4"] == 6 || $row3["statussn_10_4"] == 7) {
         $sncanel_10_4 = $row1["sncanel_10_4"] . "/54";
      } else {
         $sncanel_10_4 = $row1["sncanel_10_4"];
      }
   } catch (Exception $ex) {
      echo $ex->getMessage();
   }

   
   try {
      if ($_POST["sel_all_every"] == 2) { // ทุก 5 นาที
         $sql = "SELECT data_date, data_time, 
                  round($sncanel_1_1,1 ) AS data_cn1,
                  round($sncanel_1_2,1 ) AS data_cn2,
                  round($sncanel_1_3,1 ) AS data_cn3,
                  round($sncanel_1_4,1 ) AS data_cn4,
                  round($sncanel_2_1,1 ) AS data_cn5,
                  round($sncanel_2_2,1 ) AS data_cn6,
                  round($sncanel_2_3,1 ) AS data_cn7,
                  round($sncanel_2_4,1 ) AS data_cn8,
                  round($sncanel_3_1,1 ) AS data_cn9,
                  round($sncanel_3_2,1 ) AS data_cn10,
                  round($sncanel_3_3,1 ) AS data_cn11,
                  round($sncanel_3_4,1 ) AS data_cn12,
                  round($sncanel_4_1,1 ) AS data_cn13,
                  round($sncanel_4_2,1 ) AS data_cn14,
                  round($sncanel_4_3,1 ) AS data_cn15,
                  round($sncanel_4_4,1 ) AS data_cn16,
                  round($sncanel_5_1,1 ) AS data_cn17,
                  round($sncanel_5_2,1 ) AS data_cn18,
                  round($sncanel_5_3,1 ) AS data_cn19,
                  round($sncanel_5_4,1 ) AS data_cn20,
                  round($sncanel_6_1,1 ) AS data_cn21,
                  round($sncanel_6_2,1 ) AS data_cn22,
                  round($sncanel_6_3,1 ) AS data_cn23,
                  round($sncanel_6_4,1 ) AS data_cn24,
                  round($sncanel_7_1,1 ) AS data_cn25,
                  round($sncanel_7_2,1 ) AS data_cn26,
                  round($sncanel_7_3,1 ) AS data_cn27,
                  round($sncanel_7_4,1 ) AS data_cn28,
                  round($sncanel_8_1,1 ) AS data_cn29,
                  round($sncanel_8_2,1 ) AS data_cn30,
                  round($sncanel_8_3,1 ) AS data_cn31,
                  round($sncanel_8_4,1 ) AS data_cn32,
                  round($sncanel_9_1,1 ) AS data_cn33,
                  round($sncanel_9_2,1 ) AS data_cn34,
                  round($sncanel_9_3,1 ) AS data_cn35,
                  round($sncanel_9_4,1 ) AS data_cn36,
                  round($sncanel_10_1,1 ) AS data_cn37,
                  round($sncanel_10_2,1 ) AS data_cn38,
                  round($sncanel_10_3,1 ) AS data_cn39,
                  round($sncanel_10_4,1 ) AS data_cn40
               FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' AND mod(minute(`data_time`),5) = 0
               ORDER BY data_timestamp ";
      } else if ($_POST["sel_all_every"] == 3) { // ทุก 10 นาที
         $sql = "SELECT data_date, data_time, 
                  round($sncanel_1_1,1 ) AS data_cn1,
                  round($sncanel_1_2,1 ) AS data_cn2,
                  round($sncanel_1_3,1 ) AS data_cn3,
                  round($sncanel_1_4,1 ) AS data_cn4,
                  round($sncanel_2_1,1 ) AS data_cn5,
                  round($sncanel_2_2,1 ) AS data_cn6,
                  round($sncanel_2_3,1 ) AS data_cn7,
                  round($sncanel_2_4,1 ) AS data_cn8,
                  round($sncanel_3_1,1 ) AS data_cn9,
                  round($sncanel_3_2,1 ) AS data_cn10,
                  round($sncanel_3_3,1 ) AS data_cn11,
                  round($sncanel_3_4,1 ) AS data_cn12,
                  round($sncanel_4_1,1 ) AS data_cn13,
                  round($sncanel_4_2,1 ) AS data_cn14,
                  round($sncanel_4_3,1 ) AS data_cn15,
                  round($sncanel_4_4,1 ) AS data_cn16,
                  round($sncanel_5_1,1 ) AS data_cn17,
                  round($sncanel_5_2,1 ) AS data_cn18,
                  round($sncanel_5_3,1 ) AS data_cn19,
                  round($sncanel_5_4,1 ) AS data_cn20,
                  round($sncanel_6_1,1 ) AS data_cn21,
                  round($sncanel_6_2,1 ) AS data_cn22,
                  round($sncanel_6_3,1 ) AS data_cn23,
                  round($sncanel_6_4,1 ) AS data_cn24,
                  round($sncanel_7_1,1 ) AS data_cn25,
                  round($sncanel_7_2,1 ) AS data_cn26,
                  round($sncanel_7_3,1 ) AS data_cn27,
                  round($sncanel_7_4,1 ) AS data_cn28,
                  round($sncanel_8_1,1 ) AS data_cn29,
                  round($sncanel_8_2,1 ) AS data_cn30,
                  round($sncanel_8_3,1 ) AS data_cn31,
                  round($sncanel_8_4,1 ) AS data_cn32,
                  round($sncanel_9_1,1 ) AS data_cn33,
                  round($sncanel_9_2,1 ) AS data_cn34,
                  round($sncanel_9_3,1 ) AS data_cn35,
                  round($sncanel_9_4,1 ) AS data_cn36,
                  round($sncanel_10_1,1 ) AS data_cn37,
                  round($sncanel_10_2,1 ) AS data_cn38,
                  round($sncanel_10_3,1 ) AS data_cn39,
                  round($sncanel_10_4,1 ) AS data_cn40
               FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' AND mod(minute(`data_time`),10) = 0
               ORDER BY data_timestamp ";
      } else if ($_POST["sel_all_every"] == 4) { // ทุก 15 นาที
         $sql = "SELECT data_date, data_time, 
               round($sncanel_1_1,1 ) AS data_cn1,
               round($sncanel_1_2,1 ) AS data_cn2,
               round($sncanel_1_3,1 ) AS data_cn3,
               round($sncanel_1_4,1 ) AS data_cn4,
               round($sncanel_2_1,1 ) AS data_cn5,
               round($sncanel_2_2,1 ) AS data_cn6,
               round($sncanel_2_3,1 ) AS data_cn7,
               round($sncanel_2_4,1 ) AS data_cn8,
               round($sncanel_3_1,1 ) AS data_cn9,
               round($sncanel_3_2,1 ) AS data_cn10,
               round($sncanel_3_3,1 ) AS data_cn11,
               round($sncanel_3_4,1 ) AS data_cn12,
               round($sncanel_4_1,1 ) AS data_cn13,
               round($sncanel_4_2,1 ) AS data_cn14,
               round($sncanel_4_3,1 ) AS data_cn15,
               round($sncanel_4_4,1 ) AS data_cn16,
               round($sncanel_5_1,1 ) AS data_cn17,
               round($sncanel_5_2,1 ) AS data_cn18,
               round($sncanel_5_3,1 ) AS data_cn19,
               round($sncanel_5_4,1 ) AS data_cn20,
               round($sncanel_6_1,1 ) AS data_cn21,
               round($sncanel_6_2,1 ) AS data_cn22,
               round($sncanel_6_3,1 ) AS data_cn23,
               round($sncanel_6_4,1 ) AS data_cn24,
               round($sncanel_7_1,1 ) AS data_cn25,
               round($sncanel_7_2,1 ) AS data_cn26,
               round($sncanel_7_3,1 ) AS data_cn27,
               round($sncanel_7_4,1 ) AS data_cn28,
               round($sncanel_8_1,1 ) AS data_cn29,
               round($sncanel_8_2,1 ) AS data_cn30,
               round($sncanel_8_3,1 ) AS data_cn31,
               round($sncanel_8_4,1 ) AS data_cn32,
               round($sncanel_9_1,1 ) AS data_cn33,
               round($sncanel_9_2,1 ) AS data_cn34,
               round($sncanel_9_3,1 ) AS data_cn35,
               round($sncanel_9_4,1 ) AS data_cn36,
               round($sncanel_10_1,1 ) AS data_cn37,
               round($sncanel_10_2,1 ) AS data_cn38,
               round($sncanel_10_3,1 ) AS data_cn39,
               round($sncanel_10_4,1 ) AS data_cn40
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' AND mod(minute(`data_time`),15) = 0
            ORDER BY data_timestamp ";
      } else if ($_POST["sel_all_every"] == 5) { // ทุก 10 นาที
         $sql = "SELECT data_date, data_time, 
               round($sncanel_1_1,1 ) AS data_cn1,
               round($sncanel_1_2,1 ) AS data_cn2,
               round($sncanel_1_3,1 ) AS data_cn3,
               round($sncanel_1_4,1 ) AS data_cn4,
               round($sncanel_2_1,1 ) AS data_cn5,
               round($sncanel_2_2,1 ) AS data_cn6,
               round($sncanel_2_3,1 ) AS data_cn7,
               round($sncanel_2_4,1 ) AS data_cn8,
               round($sncanel_3_1,1 ) AS data_cn9,
               round($sncanel_3_2,1 ) AS data_cn10,
               round($sncanel_3_3,1 ) AS data_cn11,
               round($sncanel_3_4,1 ) AS data_cn12,
               round($sncanel_4_1,1 ) AS data_cn13,
               round($sncanel_4_2,1 ) AS data_cn14,
               round($sncanel_4_3,1 ) AS data_cn15,
               round($sncanel_4_4,1 ) AS data_cn16,
               round($sncanel_5_1,1 ) AS data_cn17,
               round($sncanel_5_2,1 ) AS data_cn18,
               round($sncanel_5_3,1 ) AS data_cn19,
               round($sncanel_5_4,1 ) AS data_cn20,
               round($sncanel_6_1,1 ) AS data_cn21,
               round($sncanel_6_2,1 ) AS data_cn22,
               round($sncanel_6_3,1 ) AS data_cn23,
               round($sncanel_6_4,1 ) AS data_cn24,
               round($sncanel_7_1,1 ) AS data_cn25,
               round($sncanel_7_2,1 ) AS data_cn26,
               round($sncanel_7_3,1 ) AS data_cn27,
               round($sncanel_7_4,1 ) AS data_cn28,
               round($sncanel_8_1,1 ) AS data_cn29,
               round($sncanel_8_2,1 ) AS data_cn30,
               round($sncanel_8_3,1 ) AS data_cn31,
               round($sncanel_8_4,1 ) AS data_cn32,
               round($sncanel_9_1,1 ) AS data_cn33,
               round($sncanel_9_2,1 ) AS data_cn34,
               round($sncanel_9_3,1 ) AS data_cn35,
               round($sncanel_9_4,1 ) AS data_cn36,
               round($sncanel_10_1,1 ) AS data_cn37,
               round($sncanel_10_2,1 ) AS data_cn38,
               round($sncanel_10_3,1 ) AS data_cn39,
               round($sncanel_10_4,1 ) AS data_cn40
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' AND mod(minute(`data_time`),30) = 0
            ORDER BY data_timestamp ";
      } else if ($_POST["sel_all_every"] == 6) { // ทุก 10 นาที
         $sql = "SELECT data_date, data_time, 
               round($sncanel_1_1,1 ) AS data_cn1,
               round($sncanel_1_2,1 ) AS data_cn2,
               round($sncanel_1_3,1 ) AS data_cn3,
               round($sncanel_1_4,1 ) AS data_cn4,
               round($sncanel_2_1,1 ) AS data_cn5,
               round($sncanel_2_2,1 ) AS data_cn6,
               round($sncanel_2_3,1 ) AS data_cn7,
               round($sncanel_2_4,1 ) AS data_cn8,
               round($sncanel_3_1,1 ) AS data_cn9,
               round($sncanel_3_2,1 ) AS data_cn10,
               round($sncanel_3_3,1 ) AS data_cn11,
               round($sncanel_3_4,1 ) AS data_cn12,
               round($sncanel_4_1,1 ) AS data_cn13,
               round($sncanel_4_2,1 ) AS data_cn14,
               round($sncanel_4_3,1 ) AS data_cn15,
               round($sncanel_4_4,1 ) AS data_cn16,
               round($sncanel_5_1,1 ) AS data_cn17,
               round($sncanel_5_2,1 ) AS data_cn18,
               round($sncanel_5_3,1 ) AS data_cn19,
               round($sncanel_5_4,1 ) AS data_cn20,
               round($sncanel_6_1,1 ) AS data_cn21,
               round($sncanel_6_2,1 ) AS data_cn22,
               round($sncanel_6_3,1 ) AS data_cn23,
               round($sncanel_6_4,1 ) AS data_cn24,
               round($sncanel_7_1,1 ) AS data_cn25,
               round($sncanel_7_2,1 ) AS data_cn26,
               round($sncanel_7_3,1 ) AS data_cn27,
               round($sncanel_7_4,1 ) AS data_cn28,
               round($sncanel_8_1,1 ) AS data_cn29,
               round($sncanel_8_2,1 ) AS data_cn30,
               round($sncanel_8_3,1 ) AS data_cn31,
               round($sncanel_8_4,1 ) AS data_cn32,
               round($sncanel_9_1,1 ) AS data_cn33,
               round($sncanel_9_2,1 ) AS data_cn34,
               round($sncanel_9_3,1 ) AS data_cn35,
               round($sncanel_9_4,1 ) AS data_cn36,
               round($sncanel_10_1,1 ) AS data_cn37,
               round($sncanel_10_2,1 ) AS data_cn38,
               round($sncanel_10_3,1 ) AS data_cn39,
               round($sncanel_10_4,1 ) AS data_cn40
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' AND mod(minute(`data_time`),60) = 0
            ORDER BY data_timestamp ";
      } else {
         $sql = "SELECT data_date, data_time, 
               round($sncanel_1_1,1 ) AS data_cn1,
               round($sncanel_1_2,1 ) AS data_cn2,
               round($sncanel_1_3,1 ) AS data_cn3,
               round($sncanel_1_4,1 ) AS data_cn4,
               round($sncanel_2_1,1 ) AS data_cn5,
               round($sncanel_2_2,1 ) AS data_cn6,
               round($sncanel_2_3,1 ) AS data_cn7,
               round($sncanel_2_4,1 ) AS data_cn8,
               round($sncanel_3_1,1 ) AS data_cn9,
               round($sncanel_3_2,1 ) AS data_cn10,
               round($sncanel_3_3,1 ) AS data_cn11,
               round($sncanel_3_4,1 ) AS data_cn12,
               round($sncanel_4_1,1 ) AS data_cn13,
               round($sncanel_4_2,1 ) AS data_cn14,
               round($sncanel_4_3,1 ) AS data_cn15,
               round($sncanel_4_4,1 ) AS data_cn16,
               round($sncanel_5_1,1 ) AS data_cn17,
               round($sncanel_5_2,1 ) AS data_cn18,
               round($sncanel_5_3,1 ) AS data_cn19,
               round($sncanel_5_4,1 ) AS data_cn20,
               round($sncanel_6_1,1 ) AS data_cn21,
               round($sncanel_6_2,1 ) AS data_cn22,
               round($sncanel_6_3,1 ) AS data_cn23,
               round($sncanel_6_4,1 ) AS data_cn24,
               round($sncanel_7_1,1 ) AS data_cn25,
               round($sncanel_7_2,1 ) AS data_cn26,
               round($sncanel_7_3,1 ) AS data_cn27,
               round($sncanel_7_4,1 ) AS data_cn28,
               round($sncanel_8_1,1 ) AS data_cn29,
               round($sncanel_8_2,1 ) AS data_cn30,
               round($sncanel_8_3,1 ) AS data_cn31,
               round($sncanel_8_4,1 ) AS data_cn32,
               round($sncanel_9_1,1 ) AS data_cn33,
               round($sncanel_9_2,1 ) AS data_cn34,
               round($sncanel_9_3,1 ) AS data_cn35,
               round($sncanel_9_4,1 ) AS data_cn36,
               round($sncanel_10_1,1 ) AS data_cn37,
               round($sncanel_10_2,1 ) AS data_cn38,
               round($sncanel_10_3,1 ) AS data_cn39,
               round($sncanel_10_4,1 ) AS data_cn40
            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
            ORDER BY data_timestamp "; // AND DataST1_1 > 0 
      }

      $stmt = $dbcon->prepare($sql);
      $stmt->execute();
   } catch (Exception $ex) {
      echo $ex->getMessage();
   }
   $i = 1;
   // $data0 = array();
   ?>
   <style>
      .floatRight {
         float: right;
      }

      .clear {
         clear: both;
      }
   </style>
   <div class="table-responsive m-t-10">
      <table id="table_exp3" class="cell-border" width="100%">
         <thead>
            <tr>
               <th class="text-center">#</th>
               <th class="text-center">Timestamp</th>
               <th class="text-center">Date</th>
               <th class="text-center">Time</th>
               <?php // 4184660
                  if ($btn_status["Tbtn_sn1"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_1_1"].' ('.$unit1_1.')</th>';
                  }
                  if ($btn_status["Tbtn_sn2"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_1_2"].' ('.$unit1_2.')</th>';
                  }
                  if ($btn_status["Tbtn_sn3"] == "true") {
                     echo '<th class="text-center">'.$row_n["dashname_1_3"].' ('.$unit1_3.')</th>';
                   }
                  if ($btn_status["Tbtn_sn4"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_1_4"].' ('.$unit1_4.')</th>';
                  }
                  if ($btn_status["Tbtn_sn5"] == "true") {
                     echo '<th class="text-center">'.$row_n["dashname_2_1"].' ('.$unit2_1.')</th>';
                  }
                  if ($btn_status["Tbtn_sn6"] == "true") {
                     echo '<th class="text-center">'.$row_n["dashname_2_2"].' ('.$unit2_2.')</th>';
                   }
                  if ($btn_status["Tbtn_sn7"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_2_3"].' ('.$unit2_3.')</th>';
                  }
                  if ($btn_status["Tbtn_sn8"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_2_4"].' ('.$unit2_4.')</th>';
                  }
                  if ($btn_status["Tbtn_sn9"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_3_1"].' ('.$unit3_1.')</th>';
                  }
                  if ($btn_status["Tbtn_sn10"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_3_2"].' ('.$unit3_2.')</th>';
                  }
                  if ($btn_status["Tbtn_sn11"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_3_3"].' ('.$unit3_3.')</th>';
                  }
                  if ($btn_status["Tbtn_sn12"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_3_4"].' ('.$unit3_4.')</th>';
                  }
                  if ($btn_status["Tbtn_sn13"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_4_1"].' ('.$unit4_1.')</th>';
                  }
                  if ($btn_status["Tbtn_sn14"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_4_2"].' ('.$unit4_2.')</th>';
                  }
                  if ($btn_status["Tbtn_sn15"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_4_3"].' ('.$unit4_3.')</th>';
                  }
                  if ($btn_status["Tbtn_sn16"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_4_4"].' ('.$unit4_4.')</th>';
                  }
                  if ($btn_status["Tbtn_sn17"] == "true") {
                     echo '<th class="text-center">'.$row_n["dashname_5_1"].' ('.$unit5_1.')</th>';
                   }
                  if ($btn_status["Tbtn_sn18"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_5_2"].' ('.$unit5_2.')</th>';
                  }
                  if ($btn_status["Tbtn_sn19"] == "true") {
                     echo '<th class="text-center">'.$row_n["dashname_5_3"].' ('.$unit5_3.')</th>';
                   }
                  if ($btn_status["Tbtn_sn20"] == "true") {
                     echo '<th class="text-center">'.$row_n["dashname_5_4"].' ('.$unit5_4.')</th>';
                   }
                  if ($btn_status["Tbtn_sn21"] == "true") {
                     echo '<th class="text-center">'.$row_n["dashname_6_1"].' ('.$unit6_1.')</th>';
                   }
                  if ($btn_status["Tbtn_sn22"] == "true") {
                     echo '<th class="text-center">'.$row_n["dashname_6_2"].' ('.$unit6_2.')</th>';
                   }
                  if ($btn_status["Tbtn_sn23"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_6_3"].' ('.$unit6_3.')</th>';
                  }
                  if ($btn_status["Tbtn_sn24"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_6_4"].' ('.$unit6_4.')</th>';
                  }
                  if ($btn_status["Tbtn_sn25"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_7_1"].' ('.$unit7_1.')</th>';
                  }
                  if ($btn_status["Tbtn_sn26"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_7_2"].' ('.$unit7_2.')</th>';
                  }
                  if ($btn_status["Tbtn_sn27"] == "true") {
                     echo '<th class="text-center">'.$row_n["dashname_7_3"].' ('.$unit7_3.')</th>';
                   }
                  if ($btn_status["Tbtn_sn28"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_7_4"].' ('.$unit7_4.')</th>';
                  }
                  if ($btn_status["Tbtn_sn29"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_8_1"].' ('.$unit8_1.')</th>';
                  }
                  if ($btn_status["Tbtn_sn30"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_8_2"].' ('.$unit8_2.')</th>';
                  }
                  if ($btn_status["Tbtn_sn31"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_8_3"].' ('.$unit8_3.')</th>';
                  }
                  if ($btn_status["Tbtn_sn32"] == "true") {
                     echo '<th class="text-center">'.$row_n["dashname_8_4"].' ('.$unit8_4.')</th>';
                   }
                  if ($btn_status["Tbtn_sn33"] == "true") {
                     echo '<th class="text-center">'.$row_n["dashname_9_1"].' ('.$unit9_1.')</th>';
                   }
                  if ($btn_status["Tbtn_sn34"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_9_2"].' ('.$unit9_2.')</th>';
                  }
                  if ($btn_status["Tbtn_sn35"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_9_3"].' ('.$unit9_3.')</th>';
                  }
                  if ($btn_status["Tbtn_sn36"] == "true") {
                     echo '<th class="text-center">'.$row_n["dashname_9_4"].' ('.$unit9_4.')</th>';
                   }
                  if ($btn_status["Tbtn_sn37"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_10_1"].' ('.$unit10_1.')</th>';
                  }
                  if ($btn_status["Tbtn_sn38"] == "true") {
                     echo '<th class="text-center">'.$row_n["dashname_10_2"].' ('.$unit10_2.')</th>';
                   }
                  if ($btn_status["Tbtn_sn39"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_10_3"].' ('.$unit10_3.')</th>';
                  }
                  if ($btn_status["Tbtn_sn40"] == "true") { 
                     echo '<th class="text-center">'.$row_n["dashname_10_4"].' ('.$unit10_4.')</th>';
                  }
               ?>
            </tr>
         </thead>
         <tbody>
            <?php
               while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                  echo '<tr>
                           <td class="text-center">'. $i .'</td>
                           <td class="text-center">'.$row["data_date"].' - '.substr($row["data_time"], 0, 5).'</td>
                           <td class="text-center">'.$row["data_date"].'</td>
                           <td class="text-center">'.substr($row["data_time"], 0, 5).'</td>';
                  if ($btn_status["Tbtn_sn1"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn1"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn2"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn2"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn3"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn3"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn4"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn4"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn5"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn5"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn6"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn6"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn7"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn7"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn8"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn8"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn9"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn9"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn10"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn10"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn11"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn11"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn12"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn12"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn13"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn13"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn14"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn14"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn15"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn15"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn16"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn16"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn17"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn17"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn18"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn18"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn19"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn19"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn20"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn20"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn21"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn21"].'</td>';
                  }
            
                  if ($btn_status["Tbtn_sn22"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn22"].'</td>';
                  }
            
                  if ($btn_status["Tbtn_sn23"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn23"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn24"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn24"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn25"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn25"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn26"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn26"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn27"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn27"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn28"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn28"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn29"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn29"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn30"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn30"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn31"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn31"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn32"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn32"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn33"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn33"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn34"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn34"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn35"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn35"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn36"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn36"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn37"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn37"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn38"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn38"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn39"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn39"].'</td>';
                  }
                  if ($btn_status["Tbtn_sn40"] == "true") {
                     echo '<td class="text-center">'.$row["data_cn40"].'</td>';
                  }
                  echo '</td>
                  </tr>';
                  $i++;
               }
            ?>
         </tbody>
      </table>
   </div>
   <script>
      // $.fn.dataTable.moment( 'YYYY/MM/dd' );
      // $.fn.dataTable.moment( 'YYYY MM dd' );
      $('#table_exp3').DataTable({
         // "columnDefs": [{
         //         "visible": false,
         //         "targets": 2
         //     }],
         //     "ordering": false,

         "scrollY": "400px",
         "scrollX": true,
         "scrollCollapse": true,
         "paging": false,
         "searching": false,
         "order": [
               [0, "desc"]
         ],
         "columnDefs": [
            {
               "targets": [ 1 ],
               // render: $.fn.dataTable.render.moment( 'X', 'YYYY/MM/DD' ),
               // "render": $.fn.dataTable.render.moment( 'YYYY/MM/DD' ),
               "visible": false,
               "searchable": false
            },
            
         ],
         dom: '<"floatRight"B><"clear">frtip',
         buttons: [
               //  'csv',
               {
                  text: 'Export csv',
                  title: "Smart Farm Data Sensor",
                  charset: 'utf-8',
                  extension: '.csv',
                  // exportOptions: {
                  //    columns: [ 0, 2, 5 ]
                  // },
                  extend: 'csv',
                  format: 'YYYY/MM/dd',
                  // fieldSeparator: ';',
                  // fieldBoundary: '',
                  filename: 'export_smart_farm',
                  // className: 'btn-info',
                  bom: true
               }
         ]
      });
   </script>

<?php
}
?>

