<?php
    require '../public/plugins/phpMQTT-master/phpMQTT.php';
    $house_master = $_POST["house_master"];
    $channel = $_POST["channel"];
// print_r($_POST);
    // exit();
    $host = '203.150.37.144';     // change if necessary
    $port = 1883;                     // change if necessary
    $username = '';                   // set your username
    $password = '';                   // set your password
    $client_id = 'phpMQTT-subscribe-msg'; // make sure this is unique for connecting to sever - you could use uniqid()

    $mqtt = new bluerhinos\phpMQTT($host, $port, "ClientID".rand());

    if(!$mqtt->connect(true,NULL,$username,$password)){
        exit(1);
    }

     $data_mqtt = $mqtt->subscribeAndWaitForMessage($house_master.'/1/control/time_control', 1);
    //  echo $data_mqtt;
    $mqtt->close();

    $tb_name = 'tb3_load_'.$channel;
    $colume = [
        'load_'.$channel.'_sn',
        'load_'.$channel.'_user',
        'load_'.$channel.'_st_1',
        'load_'.$channel.'_st_2',
        'load_'.$channel.'_st_3',
        'load_'.$channel.'_st_4',
        'load_'.$channel.'_st_5',
        'load_'.$channel.'_st_6',
        'load_'.$channel.'_time_s_1',
        'load_'.$channel.'_time_s_2',
        'load_'.$channel.'_time_s_3',
        'load_'.$channel.'_time_s_4',
        'load_'.$channel.'_time_s_5',
        'load_'.$channel.'_time_s_6',
        'load_'.$channel.'_time_e_1',
        'load_'.$channel.'_time_e_2',
        'load_'.$channel.'_time_e_3',
        'load_'.$channel.'_time_e_4',
        'load_'.$channel.'_time_e_5',
        'load_'.$channel.'_time_e_6'
    ];
    // echo json_encode($_POST["time_s_1"]);
    // echo $_POST["sw_1"].':'.$_POST["time_s_1"].':'.$_POST["time_e_1"];
    if($channel == 9){
        $post_data = [
            "sw_1" => $_POST["sw_1"],
            "sw_2" => $_POST["sw_2"],
            "sw_3" => $_POST["sw_3"],
            "sw_4" => $_POST["sw_4"],
            "sw_5" => $_POST["sw_5"],
            "sw_6" => $_POST["sw_6"],
            "sw_7" => $_POST["sw_7"],
            "s_1"  => $_POST["s_1"],
            "s_2"  => $_POST["s_2"],
            "s_3"  => $_POST["s_3"],
            "s_4"  => $_POST["s_4"],
            "s_5"  => $_POST["s_5"],
            "s_6"  => $_POST["s_6"],
            "s_7"  => $_POST["s_7"],
            "e_1"  => $_POST["e_1"],
            "e_2"  => $_POST["e_2"],
            "e_3"  => $_POST["e_3"],
            "e_4"  => $_POST["e_4"],
            "e_5"  => $_POST["e_5"],
            "e_6"  => $_POST["e_6"],
            "e_7"  => $_POST["e_7"],
            "on_7"  => $_POST["on_7"],
            "off_7"  => $_POST["off_7"]
        ];
    }else{
        $post_data = [
            "sw_1" => $_POST["sw_1"],
            "sw_2" => $_POST["sw_2"],
            "sw_3" => $_POST["sw_3"],
            "sw_4" => $_POST["sw_4"],
            "sw_5" => $_POST["sw_5"],
            "sw_6" => $_POST["sw_6"],
            "s_1"  => $_POST["s_1"],
            "s_2"  => $_POST["s_2"],
            "s_3"  => $_POST["s_3"],
            "s_4"  => $_POST["s_4"],
            "s_5"  => $_POST["s_5"],
            "s_6"  => $_POST["s_6"],
            "e_1"  => $_POST["e_1"],
            "e_2"  => $_POST["e_2"],
            "e_3"  => $_POST["e_3"],
            "e_4"  => $_POST["e_4"],
            "e_5"  => $_POST["e_5"],
            "e_6"  => $_POST["e_6"]
        ];
    }
print_r($post_data);
    exit();
        $row_dfData = $dbcon->query("SELECT * from $tb_name  WHERE load_1_sn = '$house_sn' limit 1")->fetch();
        if($channel == 9){}else{
            $df_data = [
                "sy_1" => $row_dfData[6],
                "sw_2" => $row_dfData[7],
                "sw_3" => $row_dfData[8],
                "sw_4" => $row_dfData[9],
                "sw_5" => $row_dfData[10],
                "sw_6" => $row_dfData[11],
                "s_1"  => $row_dfData[12],
                "s_2"  => $row_dfData[13],
                "s_3"  => $row_dfData[14],
                "s_4"  => $row_dfData[15],
                "s_5"  => $row_dfData[16],
                "s_6"  => $row_dfData[17],
                "e_1"  => $row_dfData[18],
                "e_2"  => $row_dfData[19],
                "e_3"  => $row_dfData[20],
                "e_4"  => $row_dfData[21],
                "e_5"  => $row_dfData[22],
                "e_6"  => $row_dfData[23]
            ];
        }
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
    
    // exit();
    // INSERT INTO $tb_name ($colume) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]','[value-14]','[value-15]','[value-16]','[value-17]','[value-18]','[value-19]','[value-20]','[value-21]','[value-22]','[value-23]','[value-24]','[value-25]','[value-26]','[value-27]','[value-28]','[value-29]')