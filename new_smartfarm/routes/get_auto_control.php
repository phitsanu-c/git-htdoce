<?php
require "connectdb.php";
$house_master = $_POST["house_master"];
$channel = $_POST["channel"];
// echo $house_master." ".$channel;
$tb_name = 'tb3_load_'.$channel;
$ch_sn = 'load_'.$channel.'_sn';
if($channel != 9){
$select = 'load_'.$channel.'_st_1 AS st_1,
            load_'.$channel.'_time_s_1 AS t_s_1,
            load_'.$channel.'_time_e_1 AS t_e_1,
            load_'.$channel.'_st_2 AS st_2,
            load_'.$channel.'_time_s_2 AS t_s_2,
            load_'.$channel.'_time_e_2 AS t_e_2,
            load_'.$channel.'_st_3 AS st_3,
            load_'.$channel.'_time_s_3 AS t_s_3,
            load_'.$channel.'_time_e_3 AS t_e_3,
            load_'.$channel.'_st_1 AS st_4,
            load_'.$channel.'_time_s_4 AS t_s_4,
            load_'.$channel.'_time_e_4 AS t_e_4,
            load_'.$channel.'_st_1 AS st_5,
            load_'.$channel.'_time_s_5 AS t_s_5,
            load_'.$channel.'_time_e_5 AS t_e_5,
            load_'.$channel.'_st_1 AS st_6,
            load_'.$channel.'_time_s_6 AS t_s_6,
            load_'.$channel.'_time_e_6 AS t_e_6';
}else{
    $select = 'load_'.$channel.'_st_1 AS st_1,
            load_'.$channel.'_time_s_1 AS t_s_1,
            load_'.$channel.'_time_e_1 AS t_e_1,
            load_'.$channel.'_st_2 AS st_2,
            load_'.$channel.'_time_s_2 AS t_s_2,
            load_'.$channel.'_time_e_2 AS t_e_2,
            load_'.$channel.'_st_3 AS st_3,
            load_'.$channel.'_time_s_3 AS t_s_3,
            load_'.$channel.'_time_e_3 AS t_e_3,
            load_'.$channel.'_st_1 AS st_4,
            load_'.$channel.'_time_s_4 AS t_s_4,
            load_'.$channel.'_time_e_4 AS t_e_4,
            load_'.$channel.'_st_1 AS st_5,
            load_'.$channel.'_time_s_5 AS t_s_5,
            load_'.$channel.'_time_e_5 AS t_e_5,
            load_'.$channel.'_st_1 AS st_6,
            load_'.$channel.'_time_s_6 AS t_s_6,
            load_'.$channel.'_time_e_6 AS t_e_6,
            load_'.$channel.'_st_1 AS st_7,
            load_'.$channel.'_time_s_7 AS t_s_7,
            load_'.$channel.'_time_e_7 AS t_e_7,
            load_'.$channel.'_time_on_7 AS t_on_7,
            load_'.$channel.'_time_off_7 AS t_off_7';
}
$row = $dbcon->query("SELECT $select from $tb_name WHERE $ch_sn = '$house_master' limit 1 ")->fetch();
        // $load_1 = [
        //     'load_1_st_1'       => $row1["load_1_st_1"],
        //     'load_1_time_s_1'   => $row1["load_1_time_s_1"],
        //     'load_1_time_e_1'   => $row1["load_1_time_e_1"],
        //     'load_1_st_2'       => $row1["load_1_st_2"],
        //     'load_1_time_s_2'   => $row1["load_1_time_s_2"],
        //     'load_1_time_e_2'   => $row1["load_1_time_e_2"],
        //     'load_1_st_3'       => $row1["load_1_st_3"],
        //     'load_1_time_s_3'   => $row1["load_1_time_s_3"],
        //     'load_1_time_e_3'   => $row1["load_1_time_e_3"],
        //     'load_1_st_4'       => $row1["load_1_st_4"],
        //     'load_1_time_s_4'   => $row1["load_1_time_s_4"],
        //     'load_1_time_e_4'   => $row1["load_1_time_e_4"],
        //     'load_1_st_5'       => $row1["load_1_st_5"],
        //     'load_1_time_s_5'   => $row1["load_1_time_s_5"],
        //     'load_1_time_e_5'   => $row1["load_1_time_e_5"],
        //     'load_1_st_6'       => $row1["load_1_st_6"],
        //     'load_1_time_s_6'   => $row1["load_1_time_s_6"],
        //     'load_1_time_e_6'   => $row1["load_1_time_e_6"]
        // ];
        echo json_encode($row);