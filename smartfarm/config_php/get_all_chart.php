<?php
require '../config_db/connectdb.php';

if (isset($_POST["house_master"])) {
   $house_master = $_POST["house_master"];
   $btn_status = $_POST["btn_status"]; // array btn_status
   // echo json_encode($btn_status);
   // exit();
   if ($_POST["status"] == 'day') {
      $start_day = date("Y/m/d - H:i:s", strtotime('-1 day'));
      $stop_day = date("Y/m/d - H:i:s");
   } else if ($_POST["status"] == 'week') {
      $start_day = date("Y/m/d - H:i:s", strtotime('-7 day'));
      $stop_day = date("Y/m/d - H:i:s");
   } else if ($_POST["status"] == 'month') {
      $start_day = date("Y/m/d - H:i:s", strtotime('-30 day'));
      $stop_day = date("Y/m/d - H:i:s");
   } else if ($_POST["status"] == 'from_to') {
      $start_day = $_POST["v_start"].':00';
      $stop_day = $_POST["v_end"].':00';
   }
   // echo json_encode([
   //    'house_master'=>$_POST["house_master"],
   //    'status'=>$_POST["status"],
   //    // 'btn_status'=>$_POST["btn_status"],
   //    'sel_all_every'=>$_POST["sel_all_every"],
   //    '$start_day'=>$start_day,
   //    '$stop_day'=>$stop_day]);
   // exit();
   try {
      $stmt3 = $dbcon->prepare("SELECT * from tb3_statussn  WHERE statussn_sn = '$house_master' ");
      $stmt3->execute();
      $row3 = $stmt3->fetch();

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
         $sncanel_2_3 = $row1["sncanel_2_3"];
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
         $sql = "SELECT data_timestamp AS timestamp, 
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
         $sql = "SELECT data_timestamp AS timestamp, 
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
         $sql = "SELECT data_timestamp AS timestamp, 
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
         $sql = "SELECT data_timestamp AS timestamp, 
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
         $sql = "SELECT data_timestamp AS timestamp, 
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
         $sql = "SELECT data_timestamp AS timestamp, 
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
   $inc = 1;
   $data0 = array();
   while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
      //     $data0["timestamp"] = $row["timestamp"];
      //     $data0["dataY"] = $row["datachart_month"];
      //     $arr[] = $data0;
      // $inc++;
      // }
      // echo json_encode($arr);

      $data0["timestamp"] = $row["timestamp"];
      if ($btn_status["Tbtn_sn1"] == "true") {
         $data0["chart_1"] = $row["data_cn1"];
      }
      if ($btn_status["Tbtn_sn2"] == "true") {
         $data0["chart_2"] = $row["data_cn2"];
      }
      if ($btn_status["Tbtn_sn3"] == "true") {
         $data0["chart_3"] = $row["data_cn3"];
      }
      if ($btn_status["Tbtn_sn4"] == "true") {
         $data0["chart_4"] = $row["data_cn4"];
      }
      if ($btn_status["Tbtn_sn5"] == "true") {
         $data0["chart_5"] = $row["data_cn5"];
      }
      if ($btn_status["Tbtn_sn6"] == "true") {
         $data0["chart_6"] = $row["data_cn6"];
      }
      if ($btn_status["Tbtn_sn7"] == "true") {
         $data0["chart_7"] = $row["data_cn7"];
      }
      if ($btn_status["Tbtn_sn8"] == "true") {
         $data0["chart_8"] = $row["data_cn8"];
      }
      if ($btn_status["Tbtn_sn9"] == "true") {
         $data0["chart_9"] = $row["data_cn9"];
      }
      if ($btn_status["Tbtn_sn10"] == "true") {
         $data0["chart_10"] = $row["data_cn10"];
      }
      if ($btn_status["Tbtn_sn11"] == "true") {
         $data0["chart_11"] = $row["data_cn11"];
      }
      if ($btn_status["Tbtn_sn12"] == "true") {
         $data0["chart_12"] = $row["data_cn12"];
      }
      if ($btn_status["Tbtn_sn13"] == "true") {
         $data0["chart_13"] = $row["data_cn13"];
      }
      if ($btn_status["Tbtn_sn14"] == "true") {
         $data0["chart_14"] = $row["data_cn14"];
      }
      if ($btn_status["Tbtn_sn15"] == "true") {
         $data0["chart_15"] = $row["data_cn15"];
      }
      if ($btn_status["Tbtn_sn16"] == "true") {
         $data0["chart_16"] = $row["data_cn16"];
      }
      if ($btn_status["Tbtn_sn17"] == "true") {
         $data0["chart_17"] = $row["data_cn17"];
      }
      if ($btn_status["Tbtn_sn18"] == "true") {
         $data0["chart_18"] = $row["data_cn18"];
      }
      if ($btn_status["Tbtn_sn19"] == "true") {
         $data0["chart_19"] = $row["data_cn19"];
      }
      if ($btn_status["Tbtn_sn20"] == "true") {
         $data0["chart_20"] = $row["data_cn20"];
      }
      if ($btn_status["Tbtn_sn21"] == "true") {
         $data0["chart_21"] = $row["data_cn21"];
      }

      if ($btn_status["Tbtn_sn22"] == "true") {
         $data0["chart_22"] = $row["data_cn22"];
      }

      if ($btn_status["Tbtn_sn23"] == "true") {
         $data0["chart_23"] = $row["data_cn23"];
      }
      if ($btn_status["Tbtn_sn24"] == "true") {
         $data0["chart_24"] = $row["data_cn24"];
      }
      if ($btn_status["Tbtn_sn25"] == "true") {
         $data0["chart_25"] = $row["data_cn25"];
      }
      if ($btn_status["Tbtn_sn26"] == "true") {
         $data0["chart_26"] = $row["data_cn26"];
      }
      if ($btn_status["Tbtn_sn27"] == "true") {
         $data0["chart_27"] = $row["data_cn27"];
      }
      if ($btn_status["Tbtn_sn28"] == "true") {
         $data0["chart_28"] = $row["data_cn28"];
      }
      if ($btn_status["Tbtn_sn29"] == "true") {
         $data0["chart_29"] = $row["data_cn29"];
      }
      if ($btn_status["Tbtn_sn30"] == "true") {
         $data0["chart_30"] = $row["data_cn30"];
      }
      if ($btn_status["Tbtn_sn31"] == "true") {
         $data0["chart_31"] = $row["data_cn31"];
      }
      if ($btn_status["Tbtn_sn32"] == "true") {
         $data0["chart_32"] = $row["data_cn32"];
      }
      if ($btn_status["Tbtn_sn33"] == "true") {
         $data0["chart_33"] = $row["data_cn33"];
      }
      if ($btn_status["Tbtn_sn34"] == "true") {
         $data0["chart_34"] = $row["data_cn34"];
      }
      if ($btn_status["Tbtn_sn35"] == "true") {
         $data0["chart_35"] = $row["data_cn35"];
      }
      if ($btn_status["Tbtn_sn36"] == "true") {
         $data0["chart_36"] = $row["data_cn36"];
      }
      if ($btn_status["Tbtn_sn37"] == "true") {
         $data0["chart_37"] = $row["data_cn37"];
      }
      if ($btn_status["Tbtn_sn38"] == "true") {
         $data0["chart_38"] = $row["data_cn38"];
      }
      if ($btn_status["Tbtn_sn39"] == "true") {
         $data0["chart_39"] = $row["data_cn39"];
      }
      if ($btn_status["Tbtn_sn40"] == "true") {
         $data0["chart_40"] = $row["data_cn40"];
      }

      $arr[] = $data0;
      $inc++;
   }
   echo json_encode($arr);
}
