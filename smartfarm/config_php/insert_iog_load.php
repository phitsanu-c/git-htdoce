<?php
session_start();
require '../config_db/connectdb.php';

$house_sn = $_POST["house_master"];
$user = $_SESSION["Username"];
if(isset($_POST["data"])){
    $json = $_POST["data"];
    $tb_numb = $json["tb_numb"];
    if($tb_numb == "9"){
        $data = [
            "sw_1" => $json["sw_1"],
            "sw_2" => $json["sw_2"],
            "sw_3" => $json["sw_3"],
            "sw_4" => $json["sw_4"],
            "sw_5" => $json["sw_5"],
            "sw_6" => $json["sw_6"],
            "sw_7" => $json["sw_7"],
            "s_1"  => $json["s_1"],
            "s_2"  => $json["s_2"],
            "s_3"  => $json["s_3"],
            "s_4"  => $json["s_4"],
            "s_5"  => $json["s_5"],
            "s_6"  => $json["s_6"],
            "s_7"  => $json["s_7"],
            "e_1"  => $json["e_1"],
            "e_2"  => $json["e_2"],
            "e_3"  => $json["e_3"],
            "e_4"  => $json["e_4"],
            "e_5"  => $json["e_5"],
            "e_6"  => $json["e_6"],
            "e_7"  => $json["e_7"],
            "on_7" => $json["on_7"],
            "off_7"=> $json["off_7"]
        ];
    }else{
        $data = [
            "sw_1" => $json["sw_1"],
            "sw_2" => $json["sw_2"],
            "sw_3" => $json["sw_3"],
            "sw_4" => $json["sw_4"],
            "sw_5" => $json["sw_5"],
            "sw_6" => $json["sw_6"],
            "s_1"  => $json["s_1"],
            "s_2"  => $json["s_2"],
            "s_3"  => $json["s_3"],
            "s_4"  => $json["s_4"],
            "s_5"  => $json["s_5"],
            "s_6"  => $json["s_6"],
            "e_1"  => $json["e_1"],
            "e_2"  => $json["e_2"],
            "e_3"  => $json["e_3"],
            "e_4"  => $json["e_4"],
            "e_5"  => $json["e_5"],
            "e_6"  => $json["e_6"]
        ];
    }
    // echo json_encode($data);
    // exit();
    $df_house = $dbcon->prepare("SELECT house_id, house_siteID from tb2_house WHERE house_master = '$house_sn' order by house_id limit 1");
    $df_house->execute();
    $row_df_house = $df_house->fetch();
    // echo json_encode($row_df_house);
    // exit();
    if($tb_numb == 1){
        $check_stmt = $dbcon->prepare("SELECT * from tb3_load_1  WHERE load_1_sn = '$house_sn' order by load_1_id DESC limit 1");
        $check_stmt->execute();
        $row_chack = $check_stmt->fetch();
        $data1 = [
            "sw_1" => $row_chack["load_1_st_1"],
            "sw_2" => $row_chack["load_1_st_2"],
            "sw_3" => $row_chack["load_1_st_3"],
            "sw_4" => $row_chack["load_1_st_4"],
            "sw_5" => $row_chack["load_1_st_5"],
            "sw_6" => $row_chack["load_1_st_6"],
            "s_1"  => $row_chack["load_1_time_s_1"],
            "s_2"  => $row_chack["load_1_time_s_2"],
            "s_3"  => $row_chack["load_1_time_s_3"],
            "s_4"  => $row_chack["load_1_time_s_4"],
            "s_5"  => $row_chack["load_1_time_s_5"],
            "s_6"  => $row_chack["load_1_time_s_6"],
            "e_1"  => $row_chack["load_1_time_e_1"],
            "e_2"  => $row_chack["load_1_time_e_2"],
            "e_3"  => $row_chack["load_1_time_e_3"],
            "e_4"  => $row_chack["load_1_time_e_4"],
            "e_5"  => $row_chack["load_1_time_e_5"],
            "e_6"  => $row_chack["load_1_time_e_6"]
        ];
        if($data == $data1){
            echo json_encode(['status' => "Error",'data' => "ข้อมูลซ้ำ" ], JSON_UNESCAPED_UNICODE );
        }else{
            $data["load_sn"] = $house_sn;
            $data["load_siteID"] = $row_df_house["house_siteID"];
            $data["load_houseID"] = $row_df_house["house_id"];
            $data["losd_user"] = $user;
            // echo json_encode($data);
            $stmt = "INSERT INTO `tb3_load_1`     (`load_1_sn`,       `load_1_siteID`,   `load_1_houseID`, 
                                `load_1_st_1`,     `load_1_st_2`,     `load_1_st_3`,     `load_1_st_4`,     `load_1_st_5`,     `load_1_st_6`, 
                                `load_1_time_s_1`, `load_1_time_s_2`, `load_1_time_s_3`, `load_1_time_s_4`, `load_1_time_s_5`, `load_1_time_s_6`, 
                                `load_1_time_e_1`, `load_1_time_e_2`, `load_1_time_e_3`, `load_1_time_e_4`, `load_1_time_e_5`, `load_1_time_e_6`, `load_1_user` ) 
                        VALUES (:load_sn, :load_siteID, :load_houseID,
                                :sw_1, :sw_2, :sw_3, :sw_4, :sw_5, :sw_6,
                                :s_1, :s_2, :s_3, :s_4, :s_5, :s_6,
                                :e_1, :e_2, :e_3, :e_4, :e_5, :e_6, :losd_user)";
            if ($dbcon->prepare($stmt)->execute($data) === TRUE) {
                echo json_encode(['status' => "OK",'data' => "Insert_Success" ], JSON_UNESCAPED_UNICODE );
            }else{
                echo json_encode(['status' => 'Error','data' => "Insert_Error tb3_load_1" ], JSON_UNESCAPED_UNICODE );
            } 
        }
    }elseif($tb_numb == 2){
        $check_stmt = $dbcon->prepare("SELECT * from tb3_load_2  WHERE load_2_sn = '$house_sn' order by load_2_id DESC LIMIT 1 ");
        $check_stmt->execute();
        $row_chack = $check_stmt->fetch();
        $data1 = [
            "sw_1" => $row_chack["load_2_st_1"],
            "sw_2" => $row_chack["load_2_st_2"],
            "sw_3" => $row_chack["load_2_st_3"],
            "sw_4" => $row_chack["load_2_st_4"],
            "sw_5" => $row_chack["load_2_st_5"],
            "sw_6" => $row_chack["load_2_st_6"],
            "s_1"  => $row_chack["load_2_time_s_1"],
            "s_2"  => $row_chack["load_2_time_s_2"],
            "s_3"  => $row_chack["load_2_time_s_3"],
            "s_4"  => $row_chack["load_2_time_s_4"],
            "s_5"  => $row_chack["load_2_time_s_5"],
            "s_6"  => $row_chack["load_2_time_s_6"],
            "e_1"  => $row_chack["load_2_time_e_1"],
            "e_2"  => $row_chack["load_2_time_e_2"],
            "e_3"  => $row_chack["load_2_time_e_3"],
            "e_4"  => $row_chack["load_2_time_e_4"],
            "e_5"  => $row_chack["load_2_time_e_5"],
            "e_6"  => $row_chack["load_2_time_e_6"]
        ];
        if($data == $data1){
            echo json_encode(['status' => "Error",'data' => "ข้อมูลซ้ำ" ], JSON_UNESCAPED_UNICODE );
        }else{
            $data["load_sn"] = $house_sn;
            $data["load_siteID"] = $row_df_house["house_siteID"];
            $data["load_houseID"] = $row_df_house["house_id"];
            $data["losd_user"] = $user;
            // echo json_encode($data);
            $stmt = "INSERT INTO `tb3_load_2`     (`load_2_sn`,       `load_2_siteID`,   `load_2_houseID`, 
                                `load_2_st_1`,     `load_2_st_2`,     `load_2_st_3`,     `load_2_st_4`,     `load_2_st_5`,     `load_2_st_6`, 
                                `load_2_time_s_1`, `load_2_time_s_2`, `load_2_time_s_3`, `load_2_time_s_4`, `load_2_time_s_5`, `load_2_time_s_6`, 
                                `load_2_time_e_1`, `load_2_time_e_2`, `load_2_time_e_3`, `load_2_time_e_4`, `load_2_time_e_5`, `load_2_time_e_6`, `load_2_user`) 
                    VALUES (:load_sn, :load_siteID, :load_houseID,
                                :sw_1, :sw_2, :sw_3, :sw_4, :sw_5, :sw_6,
                                :s_1, :s_2, :s_3, :s_4, :s_5, :s_6,
                                :e_1, :e_2, :e_3, :e_4, :e_5, :e_6, :losd_user)";
            if ($dbcon->prepare($stmt)->execute($data) === TRUE) {
                echo json_encode(['status' => "OK",'data' => "Insert_Success" ], JSON_UNESCAPED_UNICODE );
            }else{
                echo json_encode(['status' => 'Error','data' => "Insert_Error tb3_load_2" ], JSON_UNESCAPED_UNICODE );
            } 
        }
    }elseif($tb_numb == 3){
        $check_stmt = $dbcon->prepare("SELECT * from tb3_load_3  WHERE load_3_sn = '$house_sn' order by load_3_id DESC LIMIT 1");
        $check_stmt->execute();
        $row_chack = $check_stmt->fetch();
        $data1 = [
            "sw_1" => $row_chack["load_3_st_1"],
            "sw_2" => $row_chack["load_3_st_2"],
            "sw_3" => $row_chack["load_3_st_3"],
            "sw_4" => $row_chack["load_3_st_4"],
            "sw_5" => $row_chack["load_3_st_5"],
            "sw_6" => $row_chack["load_3_st_6"],
            "s_1"  => $row_chack["load_3_time_s_1"],
            "s_2"  => $row_chack["load_3_time_s_2"],
            "s_3"  => $row_chack["load_3_time_s_3"],
            "s_4"  => $row_chack["load_3_time_s_4"],
            "s_5"  => $row_chack["load_3_time_s_5"],
            "s_6"  => $row_chack["load_3_time_s_6"],
            "e_1"  => $row_chack["load_3_time_e_1"],
            "e_2"  => $row_chack["load_3_time_e_2"],
            "e_3"  => $row_chack["load_3_time_e_3"],
            "e_4"  => $row_chack["load_3_time_e_4"],
            "e_5"  => $row_chack["load_3_time_e_5"],
            "e_6"  => $row_chack["load_3_time_e_6"]
        ];
        if($data == $data1){
            echo json_encode(['status' => "Error",'data' => "ข้อมูลซ้ำ" ], JSON_UNESCAPED_UNICODE );
        }else{
            $data["load_sn"] = $house_sn;
            $data["load_siteID"] = $row_df_house["house_siteID"];
            $data["load_houseID"] = $row_df_house["house_id"];
            $data["losd_user"] = $user;
            // echo json_encode($data);
            $stmt = "INSERT INTO `tb3_load_3`     (`load_3_sn`,       `load_3_siteID`,   `load_3_houseID`, 
                                `load_3_st_1`,     `load_3_st_2`,     `load_3_st_3`,     `load_3_st_4`,     `load_3_st_5`,     `load_3_st_6`, 
                                `load_3_time_s_1`, `load_3_time_s_2`, `load_3_time_s_3`, `load_3_time_s_4`, `load_3_time_s_5`, `load_3_time_s_6`, 
                                `load_3_time_e_1`, `load_3_time_e_2`, `load_3_time_e_3`, `load_3_time_e_4`, `load_3_time_e_5`, `load_3_time_e_6`, `load_3_user`) 
                    VALUES (:load_sn, :load_siteID, :load_houseID,
                                :sw_1, :sw_2, :sw_3, :sw_4, :sw_5, :sw_6,
                                :s_1, :s_2, :s_3, :s_4, :s_5, :s_6,
                                :e_1, :e_2, :e_3, :e_4, :e_5, :e_6, :losd_user)";
            if ($dbcon->prepare($stmt)->execute($data) === TRUE) {
                echo json_encode(['status' => "OK",'data' => "Insert_Success" ], JSON_UNESCAPED_UNICODE );
            }else{
                echo json_encode(['status' => 'Error','data' => "Insert_Error tb3_load_3" ], JSON_UNESCAPED_UNICODE );
            } 
        }
    }elseif($tb_numb == 4){
        $check_stmt = $dbcon->prepare("SELECT * from tb3_load_4  WHERE load_4_sn = '$house_sn' order by load_4_id DESC LIMIT 1");
        $check_stmt->execute();
        $row_chack = $check_stmt->fetch();
        $data1 = [
            "sw_1" => $row_chack["load_4_st_1"],
            "sw_2" => $row_chack["load_4_st_2"],
            "sw_3" => $row_chack["load_4_st_3"],
            "sw_4" => $row_chack["load_4_st_4"],
            "sw_5" => $row_chack["load_4_st_5"],
            "sw_6" => $row_chack["load_4_st_6"],
            "s_1"  => $row_chack["load_4_time_s_1"],
            "s_2"  => $row_chack["load_4_time_s_2"],
            "s_3"  => $row_chack["load_4_time_s_3"],
            "s_4"  => $row_chack["load_4_time_s_4"],
            "s_5"  => $row_chack["load_4_time_s_5"],
            "s_6"  => $row_chack["load_4_time_s_6"],
            "e_1"  => $row_chack["load_4_time_e_1"],
            "e_2"  => $row_chack["load_4_time_e_2"],
            "e_3"  => $row_chack["load_4_time_e_3"],
            "e_4"  => $row_chack["load_4_time_e_4"],
            "e_5"  => $row_chack["load_4_time_e_5"],
            "e_6"  => $row_chack["load_4_time_e_6"]
        ];
        if($data == $data1){
            echo json_encode(['status' => "Error",'data' => "ข้อมูลซ้ำ" ], JSON_UNESCAPED_UNICODE );
        }else{
            $data["load_sn"] = $house_sn;
            $data["load_siteID"] = $row_df_house["house_siteID"];
            $data["load_houseID"] = $row_df_house["house_id"];
            $data["losd_user"] = $user;
            // echo json_encode($data);
            $stmt = "INSERT INTO `tb3_load_4`     (`load_4_sn`,       `load_4_siteID`,   `load_4_houseID`, 
                                `load_4_st_1`,     `load_4_st_2`,     `load_4_st_3`,     `load_4_st_4`,     `load_4_st_5`,     `load_4_st_6`, 
                                `load_4_time_s_1`, `load_4_time_s_2`, `load_4_time_s_3`, `load_4_time_s_4`, `load_4_time_s_5`, `load_4_time_s_6`, 
                                `load_4_time_e_1`, `load_4_time_e_2`, `load_4_time_e_3`, `load_4_time_e_4`, `load_4_time_e_5`, `load_4_time_e_6`, `load_4_user`) 
                    VALUES (:load_sn, :load_siteID, :load_houseID,
                                :sw_1, :sw_2, :sw_3, :sw_4, :sw_5, :sw_6,
                                :s_1, :s_2, :s_3, :s_4, :s_5, :s_6,
                                :e_1, :e_2, :e_3, :e_4, :e_5, :e_6, :losd_user)";
            if ($dbcon->prepare($stmt)->execute($data) === TRUE) {
                echo json_encode(['status' => "OK",'data' => "Insert_Success" ], JSON_UNESCAPED_UNICODE );
            }else{
                echo json_encode(['status' => 'Error','data' => "Insert_Error tb3_load_4" ], JSON_UNESCAPED_UNICODE );
            } 
        }
    }elseif($tb_numb == 5){
        $check_stmt = $dbcon->prepare("SELECT * from tb3_load_5  WHERE load_5_sn = '$house_sn' order by load_5_id DESC LIMIT 1");
        $check_stmt->execute();
        $row_chack = $check_stmt->fetch();
        $data1 = [
            "sw_1" => $row_chack["load_5_st_1"],
            "sw_2" => $row_chack["load_5_st_2"],
            "sw_3" => $row_chack["load_5_st_3"],
            "sw_4" => $row_chack["load_5_st_4"],
            "sw_5" => $row_chack["load_5_st_5"],
            "sw_6" => $row_chack["load_5_st_6"],
            "s_1"  => $row_chack["load_5_time_s_1"],
            "s_2"  => $row_chack["load_5_time_s_2"],
            "s_3"  => $row_chack["load_5_time_s_3"],
            "s_4"  => $row_chack["load_5_time_s_4"],
            "s_5"  => $row_chack["load_5_time_s_5"],
            "s_6"  => $row_chack["load_5_time_s_6"],
            "e_1"  => $row_chack["load_5_time_e_1"],
            "e_2"  => $row_chack["load_5_time_e_2"],
            "e_3"  => $row_chack["load_5_time_e_3"],
            "e_4"  => $row_chack["load_5_time_e_4"],
            "e_5"  => $row_chack["load_5_time_e_5"],
            "e_6"  => $row_chack["load_5_time_e_6"]
        ];
        if($data == $data1){
            echo json_encode(['status' => "Error",'data' => "ข้อมูลซ้ำ" ], JSON_UNESCAPED_UNICODE );
        }else{
            $data["load_sn"] = $house_sn;
            $data["load_siteID"] = $row_df_house["house_siteID"];
            $data["load_houseID"] = $row_df_house["house_id"];
            $data["losd_user"] = $user;
            // echo json_encode($data);
            $stmt = "INSERT INTO `tb3_load_5`     (`load_5_sn`,       `load_5_siteID`,   `load_5_houseID`, 
                                `load_5_st_1`,     `load_5_st_2`,     `load_5_st_3`,     `load_5_st_4`,     `load_5_st_5`,     `load_5_st_6`, 
                                `load_5_time_s_1`, `load_5_time_s_2`, `load_5_time_s_3`, `load_5_time_s_4`, `load_5_time_s_5`, `load_5_time_s_6`, 
                                `load_5_time_e_1`, `load_5_time_e_2`, `load_5_time_e_3`, `load_5_time_e_4`, `load_5_time_e_5`, `load_5_time_e_6`, `load_5_user`) 
                    VALUES (:load_sn, :load_siteID, :load_houseID,
                                :sw_1, :sw_2, :sw_3, :sw_4, :sw_5, :sw_6,
                                :s_1, :s_2, :s_3, :s_4, :s_5, :s_6,
                                :e_1, :e_2, :e_3, :e_4, :e_5, :e_6, :losd_user)";
            if ($dbcon->prepare($stmt)->execute($data) === TRUE) {
                echo json_encode(['status' => "OK",'data' => "Insert_Success" ], JSON_UNESCAPED_UNICODE );
            }else{
                echo json_encode(['status' => 'Error','data' => "Insert_Error tb3_load_5" ], JSON_UNESCAPED_UNICODE );
            } 
        }
    }elseif($tb_numb == 6){
        $check_stmt = $dbcon->prepare("SELECT * from tb3_load_6  WHERE load_6_sn = '$house_sn' order by load_6_id DESC LIMIT 1");
        $check_stmt->execute();
        $row_chack = $check_stmt->fetch();
        $data1 = [
            "sw_1" => $row_chack["load_6_st_1"],
            "sw_2" => $row_chack["load_6_st_2"],
            "sw_3" => $row_chack["load_6_st_3"],
            "sw_4" => $row_chack["load_6_st_4"],
            "sw_5" => $row_chack["load_6_st_5"],
            "sw_6" => $row_chack["load_6_st_6"],
            "s_1"  => $row_chack["load_6_time_s_1"],
            "s_2"  => $row_chack["load_6_time_s_2"],
            "s_3"  => $row_chack["load_6_time_s_3"],
            "s_4"  => $row_chack["load_6_time_s_4"],
            "s_5"  => $row_chack["load_6_time_s_5"],
            "s_6"  => $row_chack["load_6_time_s_6"],
            "e_1"  => $row_chack["load_6_time_e_1"],
            "e_2"  => $row_chack["load_6_time_e_2"],
            "e_3"  => $row_chack["load_6_time_e_3"],
            "e_4"  => $row_chack["load_6_time_e_4"],
            "e_5"  => $row_chack["load_6_time_e_5"],
            "e_6"  => $row_chack["load_6_time_e_6"]
        ];
        if($data == $data1){
            echo json_encode(['status' => "Error",'data' => "ข้อมูลซ้ำ" ], JSON_UNESCAPED_UNICODE );
        }else{
            $data["load_sn"] = $house_sn;
            $data["load_siteID"] = $row_df_house["house_siteID"];
            $data["load_houseID"] = $row_df_house["house_id"];
            $data["losd_user"] = $user;
            // echo json_encode($data);
            $stmt = "INSERT INTO `tb3_load_6`     (`load_6_sn`,       `load_6_siteID`,   `load_6_houseID`, 
                                `load_6_st_1`,     `load_6_st_2`,     `load_6_st_3`,     `load_6_st_4`,     `load_6_st_5`,     `load_6_st_6`, 
                                `load_6_time_s_1`, `load_6_time_s_2`, `load_6_time_s_3`, `load_6_time_s_4`, `load_6_time_s_5`, `load_6_time_s_6`, 
                                `load_6_time_e_1`, `load_6_time_e_2`, `load_6_time_e_3`, `load_6_time_e_4`, `load_6_time_e_5`, `load_6_time_e_6`, `load_6_user`) 
                    VALUES (:load_sn, :load_siteID, :load_houseID,
                                :sw_1, :sw_2, :sw_3, :sw_4, :sw_5, :sw_6,
                                :s_1, :s_2, :s_3, :s_4, :s_5, :s_6,
                                :e_1, :e_2, :e_3, :e_4, :e_5, :e_6, :losd_user)";
            if ($dbcon->prepare($stmt)->execute($data) === TRUE) {
                echo json_encode(['status' => "OK",'data' => "Insert_Success" ], JSON_UNESCAPED_UNICODE );
            }else{
                echo json_encode(['status' => 'Error','data' => "Insert_Error tb3_load_6" ], JSON_UNESCAPED_UNICODE );
            } 
        }
    }elseif($tb_numb == 7){
        $check_stmt = $dbcon->prepare("SELECT * from tb3_load_7  WHERE load_7_sn = '$house_sn' order by load_7_id DESC LIMIT 1");
        $check_stmt->execute();
        $row_chack = $check_stmt->fetch();
        $data1 = [
            "sw_1" => $row_chack["load_7_st_1"],
            "sw_2" => $row_chack["load_7_st_2"],
            "sw_3" => $row_chack["load_7_st_3"],
            "sw_4" => $row_chack["load_7_st_4"],
            "sw_5" => $row_chack["load_7_st_5"],
            "sw_6" => $row_chack["load_7_st_6"],
            "s_1"  => $row_chack["load_7_time_s_1"],
            "s_2"  => $row_chack["load_7_time_s_2"],
            "s_3"  => $row_chack["load_7_time_s_3"],
            "s_4"  => $row_chack["load_7_time_s_4"],
            "s_5"  => $row_chack["load_7_time_s_5"],
            "s_6"  => $row_chack["load_7_time_s_6"],
            "e_1"  => $row_chack["load_7_time_e_1"],
            "e_2"  => $row_chack["load_7_time_e_2"],
            "e_3"  => $row_chack["load_7_time_e_3"],
            "e_4"  => $row_chack["load_7_time_e_4"],
            "e_5"  => $row_chack["load_7_time_e_5"],
            "e_6"  => $row_chack["load_7_time_e_6"]
        ];
        if($data == $data1){
            echo json_encode(['status' => "Error",'data' => "ข้อมูลซ้ำ" ], JSON_UNESCAPED_UNICODE );
        }else{
            $data["load_sn"] = $house_sn;
            $data["load_siteID"] = $row_df_house["house_siteID"];
            $data["load_houseID"] = $row_df_house["house_id"];
            $data["losd_user"] = $user;
            // echo json_encode($data);
            $stmt = "INSERT INTO `tb3_load_7`     (`load_7_sn`,       `load_7_siteID`,   `load_7_houseID`, 
                                `load_7_st_1`,     `load_7_st_2`,     `load_7_st_3`,     `load_7_st_4`,     `load_7_st_5`,     `load_7_st_6`, 
                                `load_7_time_s_1`, `load_7_time_s_2`, `load_7_time_s_3`, `load_7_time_s_4`, `load_7_time_s_5`, `load_7_time_s_6`, 
                                `load_7_time_e_1`, `load_7_time_e_2`, `load_7_time_e_3`, `load_7_time_e_4`, `load_7_time_e_5`, `load_7_time_e_6`, `load_7_user`) 
                    VALUES (:load_sn, :load_siteID, :load_houseID,
                                :sw_1, :sw_2, :sw_3, :sw_4, :sw_5, :sw_6,
                                :s_1, :s_2, :s_3, :s_4, :s_5, :s_6,
                                :e_1, :e_2, :e_3, :e_4, :e_5, :e_6, :losd_user)";
            if ($dbcon->prepare($stmt)->execute($data) === TRUE) {
                echo json_encode(['status' => "OK",'data' => "Insert_Success" ], JSON_UNESCAPED_UNICODE );
            }else{
                echo json_encode(['status' => 'Error','data' => "Insert_Error tb3_load_7" ], JSON_UNESCAPED_UNICODE );
            } 
        }
    }elseif($tb_numb == 8){
        $check_stmt = $dbcon->prepare("SELECT * from tb3_load_8  WHERE load_8_sn = '$house_sn' order by load_8_id DESC LIMIT 1");
        $check_stmt->execute();
        $row_chack = $check_stmt->fetch();
        $data1 = [
            "sw_1" => $row_chack["load_8_st_1"],
            "sw_2" => $row_chack["load_8_st_2"],
            "sw_3" => $row_chack["load_8_st_3"],
            "sw_4" => $row_chack["load_8_st_4"],
            "sw_5" => $row_chack["load_8_st_5"],
            "sw_6" => $row_chack["load_8_st_6"],
            "s_1"  => $row_chack["load_8_time_s_1"],
            "s_2"  => $row_chack["load_8_time_s_2"],
            "s_3"  => $row_chack["load_8_time_s_3"],
            "s_4"  => $row_chack["load_8_time_s_4"],
            "s_5"  => $row_chack["load_8_time_s_5"],
            "s_6"  => $row_chack["load_8_time_s_6"],
            "e_1"  => $row_chack["load_8_time_e_1"],
            "e_2"  => $row_chack["load_8_time_e_2"],
            "e_3"  => $row_chack["load_8_time_e_3"],
            "e_4"  => $row_chack["load_8_time_e_4"],
            "e_5"  => $row_chack["load_8_time_e_5"],
            "e_6"  => $row_chack["load_8_time_e_6"]
        ];
        if($data == $data1){
            echo json_encode(['status' => "Error",'data' => "ข้อมูลซ้ำ" ], JSON_UNESCAPED_UNICODE );
        }else{
            $data["load_sn"] = $house_sn;
            $data["load_siteID"] = $row_df_house["house_siteID"];
            $data["load_houseID"] = $row_df_house["house_id"];
            $data["losd_user"] = $user;
            // echo json_encode($data);
            $stmt = "INSERT INTO `tb3_load_8`     (`load_8_sn`,       `load_8_siteID`,   `load_8_houseID`, 
                                `load_8_st_1`,     `load_8_st_2`,     `load_8_st_3`,     `load_8_st_4`,     `load_8_st_5`,     `load_8_st_6`, 
                                `load_8_time_s_1`, `load_8_time_s_2`, `load_8_time_s_3`, `load_8_time_s_4`, `load_8_time_s_5`, `load_8_time_s_6`, 
                                `load_8_time_e_1`, `load_8_time_e_2`, `load_8_time_e_3`, `load_8_time_e_4`, `load_8_time_e_5`, `load_8_time_e_6`, `load_8_user`) 
                    VALUES (:load_sn, :load_siteID, :load_houseID,
                                :sw_1, :sw_2, :sw_3, :sw_4, :sw_5, :sw_6,
                                :s_1, :s_2, :s_3, :s_4, :s_5, :s_6,
                                :e_1, :e_2, :e_3, :e_4, :e_5, :e_6, :losd_user)";
            if ($dbcon->prepare($stmt)->execute($data) === TRUE) {
                echo json_encode(['status' => "OK",'data' => "Insert_Success" ], JSON_UNESCAPED_UNICODE );
            }else{
                echo json_encode(['status' => 'Error','data' => "Insert_Error tb3_load_8"], JSON_UNESCAPED_UNICODE );
            } 
        }
    }elseif($tb_numb == 9){
        $check_stmt = $dbcon->prepare("SELECT * from tb3_load_9  WHERE load_9_sn = '$house_sn' order by load_9_id DESC LIMIT 1");
        $check_stmt->execute();
        $row_chack = $check_stmt->fetch();
        $data1 = [
            "sw_1" => $row_chack["load_9_st_1"],
            "sw_2" => $row_chack["load_9_st_2"],
            "sw_3" => $row_chack["load_9_st_3"],
            "sw_4" => $row_chack["load_9_st_4"],
            "sw_5" => $row_chack["load_9_st_5"],
            "sw_6" => $row_chack["load_9_st_6"],
            "sw_7" => $row_chack["load_9_st_7"],
            "s_1"  => $row_chack["load_9_time_s_1"],
            "s_2"  => $row_chack["load_9_time_s_2"],
            "s_3"  => $row_chack["load_9_time_s_3"],
            "s_4"  => $row_chack["load_9_time_s_4"],
            "s_5"  => $row_chack["load_9_time_s_5"],
            "s_6"  => $row_chack["load_9_time_s_6"],
            "s_7"  => $row_chack["load_9_time_s_7"],
            "e_1"  => $row_chack["load_9_time_e_1"],
            "e_2"  => $row_chack["load_9_time_e_2"],
            "e_3"  => $row_chack["load_9_time_e_3"],
            "e_4"  => $row_chack["load_9_time_e_4"],
            "e_5"  => $row_chack["load_9_time_e_5"],
            "e_6"  => $row_chack["load_9_time_e_6"],
            "e_7"  => $row_chack["load_9_time_e_7"],
            "on_7" => $row_chack["load_9_time_on_7"],
            "off_7"=> $row_chack["load_9_time_off_7"]
        ];
        if($data == $data1){
            echo json_encode(['status' => "Error",'data' => "ข้อมูลซ้ำ" ], JSON_UNESCAPED_UNICODE );
        }else{
            $data["load_sn"] = $house_sn;
            $data["load_siteID"] = $row_df_house["house_siteID"];
            $data["load_houseID"] = $row_df_house["house_id"];
            $data["losd_user"] = $user;
            // echo json_encode($data);
            $stmt = "INSERT INTO `tb3_load_9`     (`load_9_sn`,       `load_9_siteID`,   `load_9_houseID`, 
                                `load_9_st_1`,     `load_9_st_2`,     `load_9_st_3`,     `load_9_st_4`,     `load_9_st_5`,     `load_9_st_6`,       `load_9_st_7`,
                                `load_9_time_s_1`, `load_9_time_s_2`, `load_9_time_s_3`, `load_9_time_s_4`, `load_9_time_s_5`, `load_9_time_s_6`,   `load_9_time_s_7`, 
                                `load_9_time_e_1`, `load_9_time_e_2`, `load_9_time_e_3`, `load_9_time_e_4`, `load_9_time_e_5`, `load_9_time_e_6`,   `load_9_time_e_7`, 
                                `load_9_time_on_7`, `load_9_time_off_7`,   `load_9_user`) 
                    VALUES (:load_sn, :load_siteID, :load_houseID,
                                :sw_1, :sw_2, :sw_3, :sw_4, :sw_5, :sw_6, :sw_7,
                                :s_1,  :s_2,  :s_3,  :s_4,  :s_5,  :s_6,  :s_7,
                                :e_1,  :e_2,  :e_3,  :e_4,  :e_5,  :e_6,  :e_7,
                                :on_7, :off_7, :losd_user)";
            if ($dbcon->prepare($stmt)->execute($data) === TRUE) {
                echo json_encode(['status' => "OK",'data' => "Insert_Success" ], JSON_UNESCAPED_UNICODE );
            }else{
                // echo json_encode($data);
                echo json_encode(['status' => 'Error','data' => "Insert_Error tb3_load_9" ], JSON_UNESCAPED_UNICODE );
            } 
        }
    }elseif($tb_numb == 10){
        $check_stmt = $dbcon->prepare("SELECT * from tb3_load_10  WHERE load_10_sn = '$house_sn' order by load_10_id DESC LIMIT 1");
        $check_stmt->execute();
        $row_chack = $check_stmt->fetch();
        $data1 = [
            "sw_1" => $row_chack["load_10_st_1"],
            "sw_2" => $row_chack["load_10_st_2"],
            "sw_3" => $row_chack["load_10_st_3"],
            "sw_4" => $row_chack["load_10_st_4"],
            "sw_5" => $row_chack["load_10_st_5"],
            "sw_6" => $row_chack["load_10_st_6"],
            "s_1"  => $row_chack["load_10_time_s_1"],
            "s_2"  => $row_chack["load_10_time_s_2"],
            "s_3"  => $row_chack["load_10_time_s_3"],
            "s_4"  => $row_chack["load_10_time_s_4"],
            "s_5"  => $row_chack["load_10_time_s_5"],
            "s_6"  => $row_chack["load_10_time_s_6"],
            "e_1"  => $row_chack["load_10_time_e_1"],
            "e_2"  => $row_chack["load_10_time_e_2"],
            "e_3"  => $row_chack["load_10_time_e_3"],
            "e_4"  => $row_chack["load_10_time_e_4"],
            "e_5"  => $row_chack["load_10_time_e_5"],
            "e_6"  => $row_chack["load_10_time_e_6"]
        ];
        if($data == $data1){
            echo json_encode(['status' => "Error",'data' => "ข้อมูลซ้ำ" ], JSON_UNESCAPED_UNICODE );
        }else{
            $data["load_sn"] = $house_sn;
            $data["load_siteID"] = $row_df_house["house_siteID"];
            $data["load_houseID"] = $row_df_house["house_id"];
            $data["losd_user"] = $user;
            // echo json_encode($data);
            $stmt = "INSERT INTO `tb3_load_10`     (`load_10_sn`,       `load_10_siteID`,   `load_10_houseID`, 
                                `load_10_st_1`,     `load_10_st_2`,     `load_10_st_3`,     `load_10_st_4`,     `load_10_st_5`,     `load_10_st_6`, 
                                `load_10_time_s_1`, `load_10_time_s_2`, `load_10_time_s_3`, `load_10_time_s_4`, `load_10_time_s_5`, `load_10_time_s_6`, 
                                `load_10_time_e_1`, `load_10_time_e_2`, `load_10_time_e_3`, `load_10_time_e_4`, `load_10_time_e_5`, `load_10_time_e_6`, `load_10_user`) 
                    VALUES (:load_sn, :load_siteID, :load_houseID,
                                :sw_1, :sw_2, :sw_3, :sw_4, :sw_5, :sw_6,
                                :s_1, :s_2, :s_3, :s_4, :s_5, :s_6,
                                :e_1, :e_2, :e_3, :e_4, :e_5, :e_6, :losd_user)";
            if ($dbcon->prepare($stmt)->execute($data) === TRUE) {
                echo json_encode(['status' => "OK",'data' => "Insert_Success" ], JSON_UNESCAPED_UNICODE );
            }else{
                echo json_encode(['status' => 'Error','data' => "Insert_Error tb3_load_9" ], JSON_UNESCAPED_UNICODE );
            } 
        }
    }elseif($tb_numb == 11){
        $check_stmt = $dbcon->prepare("SELECT * from tb3_load_11  WHERE load_11_sn = '$house_sn' order by load_11_id DESC LIMIT 1");
        $check_stmt->execute();
        $row_chack = $check_stmt->fetch();
        $data1 = [
            "sw_1" => $row_chack["load_11_st_1"],
            "sw_2" => $row_chack["load_11_st_2"],
            "sw_3" => $row_chack["load_11_st_3"],
            "sw_4" => $row_chack["load_11_st_4"],
            "sw_5" => $row_chack["load_11_st_5"],
            "sw_6" => $row_chack["load_11_st_6"],
            "s_1"  => $row_chack["load_11_time_s_1"],
            "s_2"  => $row_chack["load_11_time_s_2"],
            "s_3"  => $row_chack["load_11_time_s_3"],
            "s_4"  => $row_chack["load_11_time_s_4"],
            "s_5"  => $row_chack["load_11_time_s_5"],
            "s_6"  => $row_chack["load_11_time_s_6"],
            "e_1"  => $row_chack["load_11_time_e_1"],
            "e_2"  => $row_chack["load_11_time_e_2"],
            "e_3"  => $row_chack["load_11_time_e_3"],
            "e_4"  => $row_chack["load_11_time_e_4"],
            "e_5"  => $row_chack["load_11_time_e_5"],
            "e_6"  => $row_chack["load_11_time_e_6"]
        ];
        if($data == $data1){
            echo json_encode(['status' => "Error",'data' => "ข้อมูลซ้ำ" ], JSON_UNESCAPED_UNICODE );
        }else{
            $data["load_sn"] = $house_sn;
            $data["load_siteID"] = $row_df_house["house_siteID"];
            $data["load_houseID"] = $row_df_house["house_id"];
            $data["losd_user"] = $user;
            // echo json_encode($data);
            $stmt = "INSERT INTO `tb3_load_11`     (`load_11_sn`,       `load_11_siteID`,   `load_11_houseID`, 
                                `load_11_st_1`,     `load_11_st_2`,     `load_11_st_3`,     `load_11_st_4`,     `load_11_st_5`,     `load_11_st_6`, 
                                `load_11_time_s_1`, `load_11_time_s_2`, `load_11_time_s_3`, `load_11_time_s_4`, `load_11_time_s_5`, `load_11_time_s_6`, 
                                `load_11_time_e_1`, `load_11_time_e_2`, `load_11_time_e_3`, `load_11_time_e_4`, `load_11_time_e_5`, `load_11_time_e_6`, `load_11_user`) 
                    VALUES (:load_sn, :load_siteID, :load_houseID,
                                :sw_1, :sw_2, :sw_3, :sw_4, :sw_5, :sw_6,
                                :s_1, :s_2, :s_3, :s_4, :s_5, :s_6,
                                :e_1, :e_2, :e_3, :e_4, :e_5, :e_6, :losd_user)";
            if ($dbcon->prepare($stmt)->execute($data) === TRUE) {
                echo json_encode(['status' => "OK",'data' => "Insert_Success" ], JSON_UNESCAPED_UNICODE );
            }else{
                echo json_encode(['status' => 'Error','data' => "Insert_Error tb3_load_11" ], JSON_UNESCAPED_UNICODE );
            } 
        }
    }else{
        echo "No";
    }
    // echo json_encode($data);
}else{
    echo json_encode("No data");
}