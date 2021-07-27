<?php
session_start();
require '../config_db/connectdb.php';

    $house_sn = $_POST["house_master"];
    $user = $_SESSION["Username"];

    $A1 =  explode(";",$_POST["A1"]); 
    $A2 =  explode(";",$_POST["A2"]);
    $A3 =  explode(";",$_POST["A3"]);
    // $A4 =  explode(";",$_POST["A4"]);
    $A5 =  explode(";",$_POST["A5"]);
    // $A6 =  explode(";",$_POST["A6"]);
    // $A7 =  explode(";",$_POST["A7"]);
    // $A8 =  explode(";",$_POST["A8"]);

    if($A1[0] == $A1[1] ){ 
        echo json_encode("A1");
        exit();
    }if( $A2[0] == $A2[1] ){
        echo json_encode("A2");
        exit();
    }if( $A3[0] == $A3[1] ){
        echo json_encode("A3");
        exit();
    }
    // if( $A4[0] == $A4[1] ){
    //     echo json_encode("A4");
    // }
    if( $A5[0] == $A5[1] ){
        echo json_encode("A5");
        exit();
    // }if( $A6[0] == $A6[1] ){
    //     echo json_encode("A6");
    //     exit();
    // }if( $A7[0] == $A7[1] ){
    //     echo json_encode("A7");
    //     exit();
    // }if( $A8[0] == $A8[1] ){
    //     echo json_encode("A8");
    //     exit();
    }else{
        // exit();
        // $loadmulti = $dbcon->prepare("SELECT * FROM tb_load_multi WHERE loadm_siteID = '$house_siteID' AND loadm_houseID = '$houseID' order by loadm_id DESC limit 1");
        // $loadmulti->execute();
        // $row = $loadmulti->fetch(PDO::FETCH_BOTH);
        
        $new_minmax = [
            // 'a1'    => $day_date." - ".$today_time,
            'a2'    => 3,
            'a3'    => 3,
            'a4'    => $user,
            'min1' => $A1[0],
            'max1' => $A1[1],
            'min2' => $A2[0],
            'max2' => $A2[1],
            'min3' => $A3[0],
            'max3' => $A3[1],
            // 'min4' => $A4[0] + $row["loadm_B4"] ) / $row["loadm_A4"] ,4),
            // 'max4' => $A4[1] + $row["loadm_B4"] ) / $row["loadm_A4"] ,4),
            'min5' => $A5[0],
            'max5' => $A5[1],
            'sn'   => $house_sn
        ];
        // print_r($new_minmax); 
        // exit();
        $sql_maxmin = "INSERT INTO tb_control_maxmin (maxmin_siteID, maxmin_houseID, maxmin_user,
                                maxmin_min_1, maxmin_max_1, maxmin_min_2, maxmin_max_2,
                                maxmin_min_3, maxmin_max_3, maxmin_min_5, maxmin_max_5, maxmin_max_sn
                            ) VALUES (:a2, :a3, :a4, :min1, :max1, :min2, :max2, :min3, :max3, :min5, :max5, :sn )";
        if ($dbcon->prepare($sql_maxmin)->execute($new_minmax) === TRUE) {
            echo json_encode("Success");
        }else{
            echo json_encode("Insert_Error");
        }
    }
    $dbconn = null;
?>