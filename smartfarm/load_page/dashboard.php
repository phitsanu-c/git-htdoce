<?php
session_start();
require '../config_db/connectdb.php';
$house_master = $_POST["house_master"];// $_SESSION["house_master"];
// echo $house_master;
// exit();
// $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
// echo $actual_link;

// $salt = 'tikde78uj4ujuhlaoikiksakeidke';
// $new_password = hash_hmac('sha256', "big2021", $salt);
// echo $new_password;
if($house_master != ""){
    // $houseID = $_SESSION["house_id"];
    $stmt = $dbcon->prepare("SELECT * from tb3_dashstatus WHERE dashstatus_sn = '$house_master' order by dashstatus_id limit 1");
    $stmt->execute();
    $row = $stmt->fetch();

    $stmt2 = $dbcon->prepare("SELECT * from tb3_dashname WHERE dashname_sn = '$house_master' order by dashname_id limit 1");
    $stmt2->execute();
    $row2 = $stmt2->fetch();

    $stmt3 = $dbcon->prepare("SELECT * from tb3_statussn  WHERE statussn_sn = '$house_master' ");
    $stmt3->execute();
    $row3 = $stmt3->fetch();

    $stmt4 = $dbcon->prepare("SELECT * from tb3_sncanel  WHERE sncanel_sn = '$house_master' ");
    $stmt4->execute();
    $row4 = $stmt4->fetch();
    // ---------------------------------------------------------
    $stmt5 = $dbcon->prepare("SELECT * from tb3_controlstatus  WHERE controlstatus_sn = '$house_master' ");
    $stmt5->execute();
    $row5 = $stmt5->fetch();

    $stmt6 = $dbcon->prepare("SELECT * from tb3_conttrolname WHERE conttrolname_sn = '$house_master' ");
    $stmt6->execute();
    $row6 = $stmt6->fetch();

    $stmt7 = $dbcon->prepare("SELECT * from tb3_map_img WHERE map_sn = '$house_master' ORDER BY map_id DESC LIMIT 1");
    $stmt7->execute();
    $row7 = $stmt7->fetch();
    if(
        $row7[4] == "" && $row7[5] == "" && $row7[6] == "" && $row7[7] == "" && $row7[8] == "" && $row7[9] == "" && $row7[10] == "" && 
        $row7[11] == "" && $row7[12] == "" && $row7[13] == "" && $row7[14] == "" && $row7[15] == "" && $row7[16] == "" && $row7[17] == "" && $row7[18] == "" && $row7[19] == "" && $row7[20] == "" && 
        $row7[21] == "" && $row7[22] == "" && $row7[23] == "" && $row7[24] == "" && $row7[25] == "" && $row7[26] == "" && $row7[27] == "" && $row7[28] == "" && $row7[29] == "" && $row7[30] == "" && 
        $row7[31] == "" && $row7[32] == "" && $row7[33] == "" && $row7[34] == "" && $row7[35] == "" && $row7[36] == "" && $row7[37] == "" && $row7[38] == "" && $row7[39] == "" && $row7[40] == "" &&
        $row7[41] == "" && $row7[42] == "" && $row7[43] == ""
    ){ $map_img = 0; }else{ $map_img = 1; }

    // --------------------------------------------
    $row8 = $dbcon->query("SELECT * from tb3_meter_status  WHERE meter_status_sn = '$house_master' ORDER BY meter_status_id DESC LIMIT 1")->fetch();
    if(
        $row8["meter_status_v"] == "0" && $row8["meter_status_a"] == "0" && $row8["meter_status_p"] == "0" &&
        $row8["meter_status_water"] == "0" && $row8["meter_status_wind_speed"] == "0" && $row8["meter_status_wind_direction"] == "0"
    ){
        $show_meter = 0;
    }else{
        $show_meter = 1;
    }
    $row9 = $dbcon->query("SELECT * from tb3_meter_chenal_mode WHERE meter_chenal_mode_sn = '$house_master' ORDER BY meter_chenal_mode_id DESC LIMIT 1")->fetch();
        // $stmt_9 = $dbcon->prepare("SELECT * from tb3_meter_chenal_mode WHERE meter_chenal_mode_sn = 'KO7MT001' ORDER BY meter_chenal_mode_id DESC LIMIT 1");
        // $stmt_9->execute();
        // $row9 = $stmt_9->fetch();
        // $count_meter = $row8["meter_status_v"] + $row8["meter_status_a"] + $row8["meter_status_p"] + $row8["meter_status_water"] + $row8["meter_status_wind_speed"] + $row8["meter_status_wind_direction"];
        if($row8["meter_status_v"] == 1){
            $sn_mode1_41 = $row9["meter_mode_1"];
            $row_41 = $dbcon->query("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode1_41' ")->fetch();
            $unit_m1 = $row_41["sensor_unit"];
        }else{$unit_m1 = "";}
        if($row8["meter_status_a"] == 1){
            $sn_mode1_42 = $row9["meter_mode_2"];
            $row_42 = $dbcon->query("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode1_42' ")->fetch();
            $unit_m2 = $row_42["sensor_unit"];
        }else{$unit_m2 = "";}
        if($row8["meter_status_p"] == 1){
            $sn_mode1_43 = $row9["meter_mode_3"];
            $row_43 = $dbcon->query("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode1_43' ")->fetch();
            $unit_m3 = $row_43["sensor_unit"];
        }else{$unit_m3 = "";}
        if($row8["meter_status_water"] == 1){
            $sn_mode1_44 = $row9["meter_mode_4"];
            $row_44 = $dbcon->query("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode1_44' ")->fetch();
            $unit_m4 = $row_44["sensor_unit"];
        }else{$unit_m4 = "";}
        if($row8["meter_status_wind_speed"] == 1){
            $sn_mode1_45 = $row9["meter_mode_5"];
            $row_45 = $dbcon->query("SELECT * from tb_sensor  WHERE sensor_id = '$sn_mode1_45' ")->fetch();
            $unit_m5 = $row_45["sensor_unit"];
        }else{$unit_m5 = "";}
// echo json_encode($show_meter);
    // echo $row9;
    // exit();
    // echo json_encode($houseID);
    // exit();

?>
    <div id="dash_dep_1">
        <div class="row">
            <?php for ($i = 1; $i <= 40; $i++) { ?>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <?php if ($row[$i + 3] == "1") { ?>
                <div class="dashboard m-b-20">
                    <div class="card-body">
                        <div class="row">
                            <h3 class="card-title col-8 image-popups">
                                <?php if (($row7[$i + 3]) == "") { ?>
                                    <B class="text-dark"><?= $row2[$i + 3] ?></B>
                                    <?php } else { ?>
                                    <a href="dist/images/img_map/<?= $row7[$i + 3]  ?>"> <B class="text-dark"><?= $row2[$i + 3] ?></B> </a>
                                <?php } ?>
                            </h3>
                            <div class="card-title col-4" align='right'>
                                <a href="javascript:void(0)" class="ico-chart icon_chart" sncanel="<?= $row4[$i + 3] ?>" mode="<?= $row3[$i + 3] ?>" name="<?= $row2[$i + 3] ?>" house_master="<?= $house_master ?>"><i class="icon-line-chart  m-r-10"></i></a>
                                <a href="javascript:void(0)" class="ico-chart icon_table" sncanel="<?= $row4[$i + 3] ?>" mode="<?= $row3[$i + 3] ?>" name="<?= $row2[$i + 3] ?>" house_master="<?= $house_master ?>"><i class=" icon-table"></i></a>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-4">
                                <div class="css-bar m-b-0 css-bar-warning image-popups">
                                    <?php if (($row7[$i + 3]) == "") { ?>
                                    <img class="img_<?= $i ?>" width="100%">
                                    <?php } else { ?>
                                    <a href="dist/images/img_map/<?= $row7[$i + 3]  ?>"> <img class="img_<?= $i ?>" width="100%"> </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-8 text-center">
                                <h2 class="text-dark Data_1_<?= $i ?>"></h2>
                                <!-- style="font-size:29px" -->
                                <h3 class="text-dark Data_2_<?= $i ?>"></h3>
                            </div>
                        </div>
                        <!-- <div id="chart_<?= $i ?>" width="100%" style="color: #212529;"></div> -->
                        <div id="chart_<?= $i ?>"></div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>

        <!-- <br> CONTROL <br> -->
        <!-- <h3 class="card-title "><B>Control Status</B></h3> -->
        <div class="row"> 
            <?php for ($j = 1; $j <= 12; $j++) { ?>
            <div class="col-xl-3 col-md-6 col-sm-12 dash_c<?= $j ?>">
                <?php if ($row5[$j + 3] == "1") { ?>
                <div class="dashboard m-b-20">
                    <div class="card-body">
                        <div class="row">
                            <h3 class="card-title col-10">
                                <B class="text-dark"><?= $row6[$j + 3] ?></B>
                            </h3>
                            <?php if($house_master == "KMUMT001"){?>
                                <div class="card-title col-2" align='right'>
                                    <a href="javascript:void(0)" class="ico-chart memu_control"><i class="ti-settings"></i></a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="text-center">
                            <!-- <div class="col-4">
                                    <div class="css-bar m-b-0 css-bar-warning "> -->
                            <img class="img_c<?= $j ?>" width="185">
                            <!-- </div>
                                </div> -->
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <div id="dash_dep_2">
        <div class="row">
            <?php if($row8["meter_status_v"] == "1") { ?>
                <div class="col-xl-4 col-md-6 col-sm-12 ">
                    <div class="dashboard m-b-20">
                        <div class="card-body">
                            <div class="row">
                                <h3 class="card-title col-8">
                                    <B class="text-dark"><?= $row_41["sensor_name"] ?></B>
                                </h3>
                                <div class="card-title col-4" align='right'>
                                    <a href="javascript:void(0)" class="ico-chart icon_chart" sncanel="<?= $row9["meter_chenal_1"] ?>" mode="<?= $row9["meter_mode_1"] ?>" name="Voltage" house_master="<?= $house_master ?>"><i class="icon-line-chart  m-r-10"></i></a><!-- ico-chart -->
                                    <a href="javascript:void(0)" class="ico-chart icon_table" sncanel="<?= $row9["meter_chenal_1"] ?>" mode="<?= $row9["meter_mode_1"] ?>" name="Voltage" house_master="<?= $house_master ?>"><i class=" icon-table"></i></a>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <div class="css-bar m-b-0 css-bar-warning image-popups">
                                        <img src="dist/images/Sensor/<?= $row_41["sensor_imgNor"] ?>" width="100%">
                                    </div>
                                </div>
                                <div class="col-8 text-center">
                                    <h2 class="text-dark Data_41"></h2>
                                </div>
                            </div>
                            <div id="chart_41"></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if($row8["meter_status_a"] == "1") { ?>
                <div class="col-xl-4 col-md-6 col-sm-12 ">
                    <div class="dashboard m-b-20">
                        <div class="card-body">
                            <div class="row">
                                <h3 class="card-title col-8">
                                    <B class="text-dark"><?= $row_42["sensor_name"] ?></B>
                                </h3>
                                <div class="card-title col-4" align='right'>
                                    <a href="javascript:void(0)" class="ico-chart icon_chart" sncanel="<?= $row9["meter_chenal_2"] ?>" mode="<?= $row9["meter_mode_2"] ?>" name="Current" house_master="<?= $house_master ?>"><i class="icon-line-chart  m-r-10"></i></a>
                                    <a href="javascript:void(0)" class="ico-chart icon_table" sncanel="<?= $row9["meter_chenal_2"] ?>" mode="<?= $row9["meter_mode_2"] ?>" name="Current" house_master="<?= $house_master ?>"><i class=" icon-table"></i></a>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <div class="css-bar m-b-0 css-bar-warning image-popups">
                                        <img src="dist/images/Sensor/<?= $row_42["sensor_imgNor"] ?>" width="100%">
                                    </div>
                                </div>
                                <div class="col-8 text-center">
                                    <h2 class="text-dark Data_42"></h2>
                                </div>
                            </div>
                            <div id="chart_42"></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if($row8["meter_status_p"] == "1") { ?>
                <div class="col-xl-4 col-md-6 col-sm-12 ">
                    <div class="dashboard m-b-20">
                        <div class="card-body">
                            <div class="row">
                                <h3 class="card-title col-8">
                                    <B class="text-dark"><?= $row_43["sensor_name"] ?></B>
                                </h3>
                                <div class="card-title col-4" align='right'>
                                    <a href="javascript:void(0)" class="ico-chart icon_chart" sncanel="<?= $row9["meter_chenal_3"] ?>" mode="<?= $row9["meter_mode_3"] ?>" name="Power" house_master="<?= $house_master ?>"><i class="icon-line-chart  m-r-10"></i></a>
                                    <a href="javascript:void(0)" class="ico-chart icon_table" sncanel="<?= $row9["meter_chenal_3"] ?>" mode="<?= $row9["meter_mode_3"] ?>" name="Power" house_master="<?= $house_master ?>"><i class=" icon-table"></i></a>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <div class="css-bar m-b-0 css-bar-warning image-popups">
                                        <img src="dist/images/Sensor/<?= $row_43["sensor_imgNor"] ?>" width="100%">
                                    </div>
                                </div>
                                <div class="col-8 text-center">
                                    <h2 class="text-dark Data_43"></h2>
                                </div>
                            </div>
                            <div id="chart_43"></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <?php if($row8["meter_status_water"] == "1") { ?>
                <div class="col-xl-4 col-md-6 col-sm-12 ">
                    <div class="dashboard m-b-20">
                        <div class="card-body">
                            <div class="row">
                                <h3 class="card-title col-8">
                                    <B class="text-dark"><?= $row_44["sensor_name"] ?></B>
                                </h3>
                                <div class="card-title col-4" align='right'>
                                    <a href="javascript:void(0)" class="ico-chart icon_chart" sncanel="<?= $row9["meter_chenal_4"] ?>" mode="<?= $row9["meter_mode_4"] ?>" name="Water Consumption" house_master="<?= $house_master ?>"><i class="icon-line-chart  m-r-10"></i></a>
                                    <a href="javascript:void(0)" class="ico-chart icon_table" sncanel="<?= $row9["meter_chenal_4"] ?>" mode="<?= $row9["meter_mode_4"] ?>" name="Water Consumption" house_master="<?= $house_master ?>"><i class=" icon-table"></i></a>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <div class="css-bar m-b-0 css-bar-warning image-popups">
                                        <img src="dist/images/Sensor/<?= $row_44["sensor_imgNor"] ?>" width="100%">
                                    </div>
                                </div>
                                <div class="col-8 text-center">
                                    <h2 class="text-dark Data_44"></h2>
                                </div>
                            </div>
                            <div id="chart_44"></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if($row8["meter_status_wind_speed"] == "1") { ?>
                <div class="col-xl-4 col-md-6 col-sm-12 ">
                    <div class="dashboard m-b-20">
                        <div class="card-body">
                            <div class="row">
                                <h3 class="card-title col-8">
                                    <B class="text-dark"><?= $row_45["sensor_name"] ?></B>
                                </h3>
                                <div class="card-title col-4" align='right'>
                                    <a href="javascript:void(0)" class="ico-chart icon_chart" sncanel="<?= $row9["meter_chenal_5"] ?>" mode="<?= $row9["meter_mode_5"] ?>" name="Wind Speed" house_master="<?= $house_master ?>"><i class="icon-line-chart  m-r-10"></i></a>
                                    <a href="javascript:void(0)" class="ico-chart icon_table" sncanel="<?= $row9["meter_chenal_5"] ?>" mode="<?= $row9["meter_mode_5"] ?>" name="Wind Speed" house_master="<?= $house_master ?>"><i class=" icon-table"></i></a>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <div class="css-bar m-b-0 css-bar-warning image-popups">
                                        <img src="dist/images/Sensor/<?= $row_45["sensor_imgNor"] ?>" width="100%">
                                    </div>
                                </div>
                                <div class="col-8 text-center">
                                    <h2 class="text-dark Data_45"></h2>
                                </div>
                            </div>
                            <div id="chart_45"></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if($row8["meter_status_wind_direction"] == "1") { ?>
                <div class="col-xl-4 col-md-6 col-sm-12 ">
                    <div class="dashboard m-b-20">
                        <div class="card-body">
                            <div class="row">
                                <h3 class="card-title col-8">
                                    <B class="text-dark"><?= $row_46["sensor_name"] ?></B>
                                </h3>
                                <div class="card-title col-4" align='right'>
                                    <a href="javascript:void(0)" class="ico-chart icon_table" sncanel="<?= $row9["meter_chenal_6"] ?>" mode="" name="Wind Direction" house_master="<?= $house_master ?>"><i class=" icon-table"></i></a>
                                </div>
                            </div>
                            <div class="text-center">
                                <img class="img_46" width="50%">
                            </div>
                            <div class="text-center m-t-20">
                                <h2 class="text-dark Data_46"></h2>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Modal_icon -->
    <div class="modal fade" id="Modal_icon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog-scrollable modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-dark"><b class="icon_modalName"></b></h4>
                    <div class="col-3" align='right'>
                        <a href="javascript:void(0)" class="ico-chart icon_chart_mod"><i class="icon-line-chart  m-r-10"></i></a>
                        <a href="javascript:void(0)" class="ico-chart icon_table_mod"><i class=" icon-table"></i></a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="col-12 table-modal">
                        <div class="row parent">
                            <div class="col-12 col-xl-6 child2">
                                <div class="row">
                                    <div class="col-12 col-xl-3 text-center  li_modal_realtime">
                                        <a class="nav-link btn-secondary2 active modal_realtime" style="width:100%" href="javascript:void(0)">Real Time</a>
                                    </div>
                                    <div class="col-12 col-xl-9 text-center">
                                        <div class="row">
                                            <a class="col-4 nav-link btn-secondary2 modal_day" href="javascript:void(0)">Day</a>
                                            <a class="col-4 nav-link btn-secondary2 modal_week" href="javascript:void(0)">Week</a>
                                            <a class="col-4 nav-link btn-secondary2 modal_month" href="javascript:void(0)">Month</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6 child2">
                                <div class="row">
                                    <div class="col-12 col-xl-9">
                                        <div class="row fromto_active">
                                            <input class="col-5 nav-item text-center from_to_df f_start" type="text" placeholder="From"/>
                                            <input class="col-5 nav-item text-center from_to_df f_stop" type="text" placeholder="To"/>

                                            <a class="col-2 nav-link text-center btn-secondary2 modal_from_to" href="javascript:void(0)">
                                                <span class="d-none d-sm-block">PLOT</span>
                                                <span class="d-block d-sm-none"><i class="icon-check" ></i></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-3 text-center li_sel_icon_every">
                                        <select id="sel_modal_every" class="nav-link form-control" style="border: 1px solid rgba(155, 153, 153, 0.678);">
                                            <option value="1"> 1 minutes</option>
                                            <option value="2"> 5 minutes</option>
                                            <option value="3"> 10 minutes</option>
                                            <option value="4"> 15 minutes</option>
                                            <option value="5"> 30 minutes</option>
                                            <option value="6"> 60 minutes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" class="hide_house_master">
                            <input type="hidden" class="hide_sncanel">
                            <input type="hidden" class="hide_mode">
                            <input type="hidden" class="hide_name">
                            <input type="hidden" class="hide_start">
                            <input type="hidden" class="hide_stop">
                        </div>
                    </div>
                    <div class="page_chart">
                        <div id="icon_chart" class="text-dark"></div>
                    </div>
                    <div class="page_table">
                        <div id="icon_table" class="text-dark"></div>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="button" class="btn btn-danger waves-effect close_icon_Modal">
                        <i class="fa fa-fw fa-lg fa-times-circle"></i> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- exit Modal_icon -->

    <script>
        var house_master = '<?= $house_master ?>';
        var show_meter = '<?= $show_meter ?>';
        if(show_meter !== 0){
            var meter_st_1 = '<?= $row8["meter_status_v"] ?>';
            var meter_st_2 = '<?= $row8["meter_status_a"] ?>';
            var meter_st_3 = '<?= $row8["meter_status_p"] ?>';
            var meter_st_4 = '<?= $row8["meter_status_water"] ?>';
            var meter_st_5 = '<?= $row8["meter_status_wind_speed"] ?>';
            var meter_st_6 = '<?= $row8["meter_status_wind_direction"] ?>';

            var meter_ch_1 = '<?= $row9["meter_chenal_1"] ?>';
            var meter_ch_2 = '<?= $row9["meter_chenal_2"] ?>';
            var meter_ch_3 = '<?= $row9["meter_chenal_3"] ?>';
            var meter_ch_4 = '<?= $row9["meter_chenal_4"] ?>';
            var meter_ch_5 = '<?= $row9["meter_chenal_5"] ?>';
            var meter_ch_6 = '<?= $row9["meter_chenal_6"] ?>';

            var unit_m1 = '<?= $unit_m1 ?>';
            var unit_m2 = '<?= $unit_m2 ?>';
            var unit_m3 = '<?= $unit_m3 ?>';
            var unit_m4 = '<?= $unit_m4 ?>';
            var unit_m5 = '<?= $unit_m5 ?>';
        }
        
        var map_img = '<?= $map_img ?>';
        
    // if($(".memu_meter").hasClass("active") === true){
        $.ajax({
            url: 'load_page/close_sesion_load.php',
            method: "post",
            data: {
                sesion: "close"
            },
            dataType: "json",
            success: function(close_sesion) {
                console.log("close_sesion_on");
            }
        });
    // }
        
        $("#dash_dep_1").show();
        $("#dash_dep_2").hide();
        
        $(".memu_dashboard").click(function() {
            $(".memu_meter").removeClass("active");
            $(".memu_report").removeClass("active");
            $("#dash_dep_2").hide();
            $("#dash_dep_1").show();
            // alert(map_img);
            if(map_img == 0){
                $(".memu_map").hide();
            }else if(map_img == 1){
                $(".memu_map").show();
            }
            if(show_meter == 0){
                $(".memu_meter").hide();
            }else if(show_meter == 1){
                $(".memu_meter").show();
            }
            $(".load_status").show();
            $(".load_report").hide();
            // alert(map_img);
            $(".date").show();
            $(".time").show();
        });

        $('.f_start').daterangepicker({
            autoUpdateInput: false,
            singleDatePicker: true,
            showDropdowns: true,
            timePicker: true,
            timePicker24Hour: true,
            minYear: 2016,
            // maxYear: parseInt(moment().format('YYYY'), 10),
            locale: {
                cancelLabel: 'Close'
            }
        });
        $('.f_start').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY/MM/DD - HH:mm'));
        });
        $('.f_stop').daterangepicker({
            autoUpdateInput: false,
            singleDatePicker: true,
            showDropdowns: true,
            timePicker: true,
            timePicker24Hour: true,
            minYear: 2016,
            // maxYear: parseInt(moment().format('YYYY'), 10),
            locale: {
                cancelLabel: 'Close'
            }
        });
        $('.f_stop').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY/MM/DD - HH:mm'));
        });
        $(".icon_chart").click(function() {
            $(".icon_modalName").html($(this).attr("name"));
            $(".icon_chart_mod").hide();
            $(".icon_table_mod").show();
            $(".page_chart").show();
            $(".page_table").hide();
            $(".li_modal_realtime").show();
            $("#Modal_icon").modal("show");
            $(".modal_realtime").hide();//.addClass("active");
            $(".modal_day").removeClass("active");
            $(".modal_week").removeClass("active");
            $(".modal_month").removeClass("active");
            // $(".modal_from_to").removeClass("active");
            $(".fromto_active").removeClass("fromto_border");
            $('.f_start').val("");
            $('.f_stop').val("");

            $("#icon_chart").html("");
            $(".modal_day").removeClass("active");
            $(".modal_week").removeClass("active");
            $(".modal_month").removeClass("active");
            $(".fromto_active").removeClass("fromto_border");

            // var loading = verticalNoTitle();
            var house_master = $(this).attr("house_master");
            if (house_master === "KMUMT001" || house_master === "TSPWM001") {
                $(".li_sel_icon_every").hide();
            }
            var canelsn = $(this).attr("sncanel");
            var Msn = $(this).attr("mode");
            $(".hide_house_master").val(house_master);
            $(".hide_sncanel").val(canelsn);
            $(".hide_mode").val(Msn);
            $(".hide_name").val($(this).attr("name"));
            // window.alert("house_master "+house_master+ " canelsn "+canelsn+" mode "+Msn);
            // chart_irealtime(house_master, canelsn, Msn, loading);
        });

        $(".close_icon_Modal").click(function() {
            $("#Modal_icon").modal("hide");
            $(".hide_house_master").val("");
            $(".hide_sncanel").val("");
            $(".hide_mode").val("");
            $(".hide_name").val("");
            $(".hide_start").val("");
            $(".hide_stop").val("");
        });

        $(".icon_table").click(function() {
            $(".icon_modalName").html($(this).attr("name"));
            $(".page_chart").hide();
            $(".page_table").show();
            $("#Modal_icon").modal("show");
            $(".li_sel_icon_every").show();
            $(".li_modal_realtime").hide();
            $(".modal_realtime").removeClass("active");
            $(".hide_icon_table").addClass("col-2");
            // $(".modal_day").addClass("active");
            $('.f_start').val("");
            $('.f_stop').val("");

            $("#icon_table").html("");
            $(".modal_day").removeClass("active");
            $(".modal_week").removeClass("active");
            $(".modal_month").removeClass("active");
            $(".fromto_active").removeClass("fromto_border");

            var house_master = $(this).attr("house_master");
            if (house_master === "KMUMT001" || house_master === "TSPWM001") {
                $(".li_sel_icon_every").hide();
            }
            var canelsn = $(this).attr("sncanel");
            var Msn = $(this).attr("mode");
            $(".hide_house_master").val(house_master);
            $(".hide_sncanel").val(canelsn);
            $(".hide_mode").val(Msn);
            $(".hide_name").val($(this).attr("name"));
            if(Msn !== ""){
                $(".icon_chart_mod").show();
                $(".icon_table_mod").hide();
                // table_icanel(canelsn, Msn, status = "day", start = "", stop = "", loading = verticalNoTitle());
                // chart_icanel(canelsn, Msn, status = "day", start = "", stop = "", loading = "");
            }else{
                $(".icon_chart_mod").hide();
                $(".icon_table_mod").hide();
                // table_icanel(canelsn, Msn, status = "day", start = "", stop = "", loading = verticalNoTitle());
            }
        });
        $(".icon_chart_mod").click(function() {
            $(this).hide();
            $(".icon_table_mod").show();
            $(".page_chart").show();
            $(".page_table").hide();
            // $(".li_modal_realtime").show();
        });
        $(".icon_table_mod").click(function() {
            $(this).hide();
            $(".icon_chart_mod").show();
            $(".page_chart").hide();
            $(".page_table").show();

            // $(".modal_realtime").hide();
            // $(".li_modal_realtime").hide();
            // $(".modal_realtime").removeClass("active");

            // if ($(".modal_realtime").hasClass("active") == true) {
            //     $(".modal_realtime").removeClass("active");
            //     $(".modal_day").addClass("active");
            //     var status = "day";
            //     var start = "";
            //     var stop = "";
            // } else 
            if ($(".modal_day").hasClass("active") == true) {
                var status = "day";
                var start = "";
                var stop = "";
            } else if ($(".modal_week").hasClass("active") == true) {
                var status = "week";
                var start = "";
                var stop = "";
            } else if ($(".modal_month").hasClass("active") == true) {
                var status = "month";
                var start = "";
                var stop = "";
            } else if ($(".modal_from_to").hasClass("active") == true) {
                var status = "day";
                var start = $(".hide_start").val();
                var stop = $(".hide_stop").val();
            }
            if ($(".modal_day").hasClass("active") == false && $(".modal_week").hasClass("active") == false && $(".modal_month").hasClass("active") == false && $(".modal_from_to").hasClass("active") == false){}else{
                table_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status, start, stop, loading = verticalNoTitle());
                chart_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status, start, stop, loading = "");
            }
            $(".li_sel_icon_every").show();
            $(".li_modal_realtime").hide();
            $(".modal_realtime").removeClass("active");
        });
        // ---------------------------------------------------------------
        $(".modal_realtime").click(function() {
            $(this).addClass("active");
            $(".modal_day").removeClass("active");
            $(".modal_week").removeClass("active");
            $(".modal_month").removeClass("active");
            // $(".modal_from_to").removeClass("active");
            $(".fromto_active").removeClass("fromto_border");
            $('.f_start').val("");
            $('.f_stop').val("");
            chart_irealtime(house_master = $(".hide_house_master").val(), canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), loading = verticalNoTitle());
        });
        $(".modal_day").click(function() {
            $(".modal_realtime").removeClass("active");
            $(this).addClass("active");
            $(".modal_week").removeClass("active");
            $(".modal_month").removeClass("active");
            // $(".modal_from_to").removeClass("active");
            $(".fromto_active").removeClass("fromto_border");
            $('.f_start').val("");
            $('.f_stop').val("");
            if ($(".icon_table_mod").is(":hidden") == false) {
                chart_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status = "day", start = "", stop = "", loading = verticalNoTitle());
                table_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status = "day", start = "", stop = "", loading = "");
            } else {
                table_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status = "day", start = "", stop = "", loading = verticalNoTitle());
                chart_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status = "day", start = "", stop = "", loading = "");
            }
        });
        $(".modal_week").click(function() {
            $(".modal_realtime").removeClass("active");
            $(".modal_day").removeClass("active");
            $(this).addClass("active");
            $(".modal_month").removeClass("active");
            // $(".modal_from_to").removeClass("active");
            $(".fromto_active").removeClass("fromto_border");
            $('.f_start').val("");
            $('.f_stop').val("");
            if ($(".icon_table_mod").is(":hidden") == false) {
                chart_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status = "week", start = "", stop = "", loading = verticalNoTitle());
                table_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status = "week", start = "", stop = "", loading = "");
            } else {
                table_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status = "week", start = "", stop = "", loading = verticalNoTitle());
                chart_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status = "week", start = "", stop = "", loading = "");
            }
        });
        $(".modal_month").click(function() {
            $(".modal_realtime").removeClass("active");
            $(".modal_day").removeClass("active");
            $(".modal_week").removeClass("active");
            $(this).addClass("active");
            // $(".modal_from_to").removeClass("active");
            $(".fromto_active").removeClass("fromto_border");
            $('.f_start').val("");
            $('.f_stop').val("");
            if ($(".icon_table_mod").is(":hidden") == false) {
                chart_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status = "month", start = "", stop = "", loading = verticalNoTitle());
                table_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status = "month", start = "", stop = "", loading = "");
            } else {
                table_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status = "month", start = "", stop = "", loading = verticalNoTitle());
                chart_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status = "month", start = "", stop = "", loading = "");
            }
        });
        $(".modal_from_to").click(function() {
            var start = $('.f_start').val();
            var stop = $('.f_stop').val();
            // console.log(start);

            if (start === "") {
                $('.f_start').removeClass("from_to_df").addClass("input_err");
                return false;
            } else {
                $('.f_start').removeClass("input_err").addClass("from_to_df");
            }
            if (stop === "") {
                $('.f_stop').removeClass("from_to_df").addClass("input_err");
                return false;
            } else {
                $('.f_stop').removeClass("input_err").addClass("from_to_df");
            }
            if (start >= stop) {
                Swal({
                    type: 'error',
                    title: "Error...",
                    html: "Start time</b> must be less than the <b>End time</b> !",
                    allowOutsideClick: false
                });
                $('.f_start').removeClass("from_to_df").addClass("input_err");
                $('.f_stop').removeClass("from_to_df").addClass("input_err");
                return false;
            } else {
                $('.f_start').removeClass("input_err").addClass("from_to_df");
                $('.f_stop').removeClass("input_err").addClass("from_to_df");
            }
            // alert("Start = "+ start+"<br> Stop = "+stop);
            // return false;
            // $(this).on('apply.daterangepicker', function(ev, picker) {
                // window.alert(picker.startDate.format('YYYY/MM/DD - HH:mm:ss') + ' - ' + picker.endDate.format('YYYY/MM/DD - HH:mm:ss'));
                $(".modal_realtime").removeClass("active");
                $(".modal_day").removeClass("active");
                $(".modal_week").removeClass("active");
                $(".modal_month").removeClass("active");
                // $(this).addClass("active");
                $(".fromto_active").addClass("fromto_border");
                $(".hide_start").val(start);
                $(".hide_stop").val(stop);
                // $(".hide_start").val(picker.startDate.format('YYYY/MM/DD - HH:mm:ss'));
                // $(".hide_stop").val(picker.endDate.format('YYYY/MM/DD - HH:mm:ss'));
                if ($(".icon_table_mod").is(":hidden") == false) {
                    chart_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status = "formto", start, stop, loading = verticalNoTitle());
                    table_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status = "formto", start, stop, loading = "");
                } else {
                    table_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status = "formto", start, stop, loading = verticalNoTitle());
                    chart_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status = "formto", start, stop, loading = "");
                }
            // });
        });

        function chart_irealtime(house_master, canelsn, Msn, loading) {
            // $('#Modal_chart_icon').on('show.bs.modal', function(event) {
            // setTimeout(function() {
            $(".modal_day").removeClass("active");
            $(".modal_week").removeClass("active");
            $(".modal_month").removeClass("active");
            $(".modal_from_to").removeClass("active");
            $(".li_sel_icon_every").hide();
            $.ajax({
                url: 'config_php/icon_chart/get_unit_chart.php',
                method: "post",
                data: {
                    mode: Msn
                },
                dataType: "json",
                success: function(res_unit) {
                    if (Msn === "7" || Msn === "6") {
                        var chartIconUnit = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                    } else if (Msn === "5" || Msn === "4") {
                        var chartIconUnit = "kLux";
                    } else {
                        var chartIconUnit = res_unit;
                    }
                    $.ajax({
                        url: 'config_php/icon_chart/realtime.php',
                        method: "post",
                        data: {
                            house_master : house_master,
                            canel: canelsn, //$("#icon_chart_cn").val(),
                            mode: Msn
                        },
                        dataType: "json",
                        success: function(res) {
                            var chart = am4core.create("icon_chart", am4charts.XYChart);
                            chart.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                            chart.data = res;

                            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
                            dateAxis.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                            dateAxis.tooltipDateFormat = "HH:mm, d MMM yyyy";

                            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

                            // Create series
                            var series = chart.series.push(new am4charts.LineSeries());
                            series.dataFields.valueY = "chart_data";
                            series.dataFields.dateX = "timestamp";
                            series.tooltipText = "{chart_data}" + " (" + chartIconUnit + ")";
                            series.strokeWidth = 2;

                            // series.tooltip.pointerOrientation = "vertical";

                            chart.cursor = new am4charts.XYCursor();
                            chart.cursor.snapToSeries = series;
                            chart.cursor.xAxis = dateAxis;

                            chart.scrollbarX = new am4core.Scrollbar();
                            chart.scrollbarX.parent = chart.bottomAxesContainer;

                            // Global variables
                            var client = null;
                            var hostname = "203.150.37.144"; // 203.150.37.144   decccloud.com
                            var port = "8083";
                            var clientId = "mqtt_js_" + parseInt(Math.random() * 100000, 10);
                            // console.log(canelsn);
                            // console.log(house_master);
                            // return false;
                            function connect() {
                                client = new Paho.MQTT.Client(hostname, Number(port), clientId);
                                console.info('Connecting to Server: Hostname: ', hostname, '. Port: ', port, '. Client ID: ', clientId);

                                client.onConnectionLost = onConnectionLost;
                                client.onMessageArrived = onMessageArrived;

                                var options = {
                                    onSuccess: onConnect, // after connected, subscribes
                                    onFailure: onFail // useful for logging / debugging
                                };
                                client.connect(options);
                                console.info('Connecting...');
                            }
                            // ---------------------------------------------------------------------------------------

                            function onConnect(context) {
                                console.log("Client Connected");
                                // And subscribe to our topics	-- both with the same callback function
                                options = {
                                    qos: 1,
                                    onSuccess: function(context) {
                                        console.log("subscribed");
                                    }
                                }
                                client.subscribe(house_master + "/1/data_update/data_filter", options);
                            }

                            function onFail(context) {
                                location.reload();
                            }

                            function onConnectionLost(responseObject) {
                                if (responseObject.errorCode !== 0) {
                                    console.log("Connection Lost: " + responseObject.errorMessage);
                                    // location.reload();
                                    // window.alert("Someone else took my websocket!\nRefresh to take it back.");
                                }
                            }

                            function onMessageArrived(message) {
                                if (message.destinationName == house_master + "/1/data_update/data_filter") {
                                    if ($(".modal_realtime").hasClass("active") == true) {
                                        var result = message.payloadString;
                                        var parseJSON = $.parseJSON(result);
                                        // console.log(parseJSON);
                                        // -------------------------------------------------------------
                                        // var time_t = parseJSON['time'];
                                        // var ntime = time_t.substring(0, 5);
                                        var data_array = parseJSON['data'];
                                        var data_dash = data_array[canelsn];

                                        if (Msn === "4" || Msn === "5") {
                                            var new_data = (data_dash / 1000).toFixed(1);
                                        } else if (Msn === "6" || Msn === "7") {
                                            var new_data = (data_dash / 54).toFixed(1);
                                        } else {
                                            var new_data = (data_dash).toFixed(1);
                                        }

                                        chart.addData({
                                            timestamp: parseJSON['date_time'],
                                            chart_data: new_data
                                        });
                                        console.log(new_data);
                                    }
                                }
                            }
                            connect();
                            if (loading !== "") {
                                loadingOut(loading);
                            }
                        }
                    });
                }
            });
            //     }, 1000);
            // });
        } //exit_fuction_realtime_chart
        function chart_icanel(canelsn, Msn, status, start, stop, loading) {
            $(".li_sel_icon_every").show();
            $.ajax({
                url: 'config_php/icon_chart/get_unit_chart.php',
                method: "post",
                data: {
                    mode: Msn
                },
                dataType: "json",
                success: function(res_unit) {
                    if (Msn === "7" || Msn === "6") {
                        var chartIconUnit = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                    } else if (Msn === "5" || Msn === "4") {
                        var chartIconUnit = "kLux";
                    } else {
                        var chartIconUnit = res_unit;
                    }
                    $.ajax({
                        url: 'config_php/icon_chart/chart_canel.php',
                        method: "post",
                        data: {
                            house_master: house_master,
                            canel: canelsn,
                            mode: Msn,
                            status: status,
                            start: start,
                            stop: stop,
                            sel_time: $("#sel_modal_every").val()
                        },
                        dataType: "json",
                        success: function(res) {
                            var chart = am4core.create("icon_chart", am4charts.XYChart);
                            chart.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                            chart.data = res;

                            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
                            dateAxis.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                            dateAxis.tooltipDateFormat = "HH:mm, d MMM yyyy";

                            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

                            // Create series
                            var series = chart.series.push(new am4charts.LineSeries());
                            series.dataFields.valueY = "chart_data";
                            series.dataFields.dateX = "timestamp";
                            series.tooltipText = "{chart_data}" + " (" + chartIconUnit + ")";
                            series.strokeWidth = 2;

                            // series.tooltip.pointerOrientation = "vertical";

                            chart.cursor = new am4charts.XYCursor();
                            chart.cursor.snapToSeries = series;
                            chart.cursor.xAxis = dateAxis;

                            chart.scrollbarX = new am4core.Scrollbar();
                            chart.scrollbarX.parent = chart.bottomAxesContainer;

                            chart.exporting.menu = new am4core.ExportMenu();
                            chart.exporting.menu.items = [{
                                "label": "...",
                                "menu": [{
                                        "type": "png",
                                        "label": "PNG"
                                    }, {
                                        "type": "jpg",
                                        "label": "JPG"
                                    },
                                    //   { "label": "svg", "type": "SVG" }
                                ]
                            }];
                            if (loading !== "") {
                                loadingOut(loading);
                            }
                        }
                    });
                }
            });
        } //exit_chart_icanel
        function table_icanel(canelsn, Msn, status, start, stop, loading) {
            $.ajax({
                url: 'config_php/icon_table/table_canel.php',
                method: "post",
                data: {
                    house_master: house_master,
                    canel: canelsn,
                    mode: Msn,
                    name: $(".hide_name").val(),
                    status: status,
                    start: start,
                    stop: stop,
                    sel_time: $("#sel_modal_every").val()
                },
                success: function(res) {
                    $("#icon_table").html(res);
                    if (loading !== "") {
                        loadingOut(loading);
                    }
                }
            });
        }

        $("#sel_modal_every").on('change', function() {
            if ($(".modal_day").hasClass("active") == false && $(".modal_week").hasClass("active") == false && $(".modal_month").hasClass("active") == false) {
                return false;
            }
            if ($(".modal_day").hasClass("active") == true) {
                var status = "day";
                var start = "";
                var stop = "";
            } else if ($(".modal_week").hasClass("active") == true) {
                var status = "week";
                var start = "";
                var stop = "";
            } else if ($(".modal_month").hasClass("active") == true) {
                var status = "month";
                var start = "";
                var stop = "";
            } else if ($(".fromto_active").hasClass("fromto_border") == true) {
                var status = "formto";
                var start = $('.f_start').val();
                var stop = $('.f_stop').val();
            }
            if ($(".icon_table_mod").is(":hidden") == false) {
                chart_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status, start, stop, loading = verticalNoTitle());
                table_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status, start, stop, loading = "");
            } else {
                table_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status, start, stop, loading = verticalNoTitle());
                chart_icanel(canelsn = $(".hide_sncanel").val(), Msn = $(".hide_mode").val(), status, start, stop, loading = "");
            }
        });

        $('.image-popups').magnificPopup({
            delegate: 'a',
            type: 'image',
            removalDelay: 500, //delay removal by X to allow out-animation
            callbacks: {
                beforeOpen: function() {
                    // just a hack that adds mfp-anim class to markup 
                    this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                    this.st.mainClass = this.st.el.attr('data-effect');
                }
            },
            closeOnContentClick: false,
            midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
        });

        $(".memu_meter").click(function() {
            $(".load_status").show();
            var loading = verticalNoTitle();
            $(".memu_select_site").removeClass("active");
            $(".memu_dashboard").removeClass("active");
            $(".memu_report").removeClass("active");
            $(this).addClass("active");
            $(".load_site").hide();
            // $(".load_status").hide();
            $(".load_report").hide();
            $(".date").show();
            $(".time").show();

            // $(".load_meter").show();
            $("#dash_dep_1").hide();
            $("#dash_dep_2").show();
            $(".memu_setting").hide().removeClass("active");
            $.ajax({
                url: 'config_php/chart_dash_realtime_meter.php',
                method: "post",
                data: {
                    house_master: house_master
                },
                dataType: "json",
                success: function(res_chart) {
            // $.getJSON('config_php/chart_dash_realtime_meter.php', function(res_chart) {
                    if(res_chart !== "load_success"){
                        // console.log(res_chart);
                        // return false;
                        am4core.ready(function() {
                            am4core.useTheme(am4themes_animated);

                            // ----------------------------------------------------------------------
                            // Global variables
                            var client = null;
                            // These are configs	
                            var hostname = "203.150.37.144"; // 203.150.37.144   decccloud.com
                            var port = "8083";
                            var clientId = "mqtt_js_" + parseInt(Math.random() * 100000, 10);
                            var count = 0;

                            function connect() {
                                client = new Paho.MQTT.Client(hostname, Number(port), clientId);
                                console.info('Connecting to Server: Hostname: ', hostname, '. Port: ', port, '. Client ID: ', clientId);

                                client.onConnectionLost = onConnectionLost;
                                client.onMessageArrived = onMessageArrived;

                                var options = {
                                    onSuccess: onConnect, // after connected, subscribes
                                    onFailure: onFail // useful for logging / debugging
                                };
                                // connect the client
                                client.connect(options);
                                console.info('Connecting...');
                            }
                            // ---------------------------------------------------------------------------------------

                            function onConnect(context) {
                                console.log("Client Connected");
                                // And subscribe to our topics	-- both with the same callback function
                                options = {
                                    qos: 1,
                                    onSuccess: function(context) {
                                        // console.log("ไม่สามารถเชื่อมต่อกับ เครื่อง ได้ !!!!");
                                        // setInterval(function() {
                                        //     location.reload();
                                        // }, 30000);
                                        console.log("subscribed");
                                    }
                                }

                                client.subscribe(house_master + "/1/data_update/data_filter", options);
                                
                            }

                            function onFail(context) {
                                location.reload();
                            }

                            function onConnectionLost(responseObject) {
                                if (responseObject.errorCode !== 0) {
                                    console.log("Connection Lost: " + responseObject.errorMessage);
                                    // location.reload();
                                    // window.alert("Someone else took my websocket!\nRefresh to take it back.");
                                }
                            }

                            function onMessageArrived(message) {
                                if (message.destinationName == house_master + "/1/data_update/data_filter") {
                                    var result = message.payloadString;
                                    var parseJSON = $.parseJSON(result);
                                    // -------------------------------------------------------------
                                    var data_array = parseJSON['data'];
                                    console.log(parseJSON);
                                    show_dash(dstatus = meter_st_1, canelsn = meter_ch_1, canel = "41" );
                                    show_dash(dstatus = meter_st_2, canelsn = meter_ch_2, canel = "42" );
                                    show_dash(dstatus = meter_st_3, canelsn = meter_ch_3, canel = "43" );
                                    show_dash(dstatus = meter_st_4, canelsn = meter_ch_4, canel = "44" );
                                    show_dash(dstatus = meter_st_5, canelsn = meter_ch_5, canel = "45" );
                                    show_dash(dstatus = meter_st_6, canelsn = meter_ch_6, canel = "46" );
                                    
                                    function show_dash(dstatus, canelsn, canel) {
                                        var data_dash = data_array[canelsn];
                                        var new_data = (data_dash * 1).toFixed(1);
                                        if (dstatus === "1") {
                                            if(canel == 46){
                                                if(new_data <= 45){
                                                    $(".img_46").attr("src", "dist/images/Sensor/wind-direction1.png");
                                                    $(".Data_46").html("เหนือ");
                                                }else if(new_data <= 90 && new_data > 45){
                                                    $(".img_46").attr("src", "dist/images/Sensor/wind-direction2.png");
                                                    $(".Data_46").html("ตะวันออกเฉียงเหนือ");
                                                }else if(new_data <= 135 && new_data > 90){
                                                    $(".img_46").attr("src", "dist/images/Sensor/wind-direction3.png");
                                                    $(".Data_46").html("ตะวันออก");
                                                }else if(new_data <= 180 && new_data > 135){
                                                    $(".img_46").attr("src", "dist/images/Sensor/wind-direction4.png");
                                                    $(".Data_46").html("ตะวันออกเฉียงใต้");
                                                }else if(new_data <= 225 && new_data > 180){
                                                    $(".img_46").attr("src", "dist/images/Sensor/wind-direction5.png");
                                                    $(".Data_46").html("ใต้");
                                                }else if(new_data <= 270 && new_data > 225){
                                                    $(".img_46").attr("src", "dist/images/Sensor/wind-direction6.png");
                                                    $(".Data_46").html("ตะวันตกเฉียงใต้");
                                                }else if(new_data <= 315 && new_data > 270){
                                                    $(".img_46").attr("src", "dist/images/Sensor/wind-direction7.png");
                                                    $(".Data_46").html("ตะวันตก");
                                                }else if(new_data > 315){
                                                    $(".img_46").attr("src", "dist/images/Sensor/wind-direction8.png");
                                                    $(".Data_46").html("ตะวันตกเฉียงเหนือ");
                                                }
                                            } else{
                                                if(canel == 41){
                                                    var unit = unit_m1;
                                                }else if(canel == 42){
                                                    var unit = unit_m2;
                                                }else if(canel == 43){
                                                    var unit = unit_m3;
                                                }else if(canel == 44){
                                                    var unit = unit_m4;
                                                }else if(canel == 45){
                                                    var unit = unit_m5;
                                                }
                                                $(".Data_" + canel).html(new_data + " " + unit);
                                            }
                                        }
                                    }

                                    if (res_chart !== "null") {
                                        if (meter_st_1 === "1") {
                                            var new_data_chart_41 = (data_array[meter_ch_1] * 1).toFixed(1);
                                            chart_41.addData({
                                                timestamp: parseJSON['date_time'],
                                                chart_41: new_data_chart_41
                                            });
                                        }
                                        if (meter_st_2 === "1") {
                                            var new_data_chart_42 = (data_array[meter_ch_2] * 1).toFixed(1);
                                            chart_42.addData({
                                                timestamp: parseJSON['date_time'],
                                                chart_42: new_data_chart_42
                                            });
                                        }
                                        if (meter_st_3 === "1") {
                                            var new_data_chart_43 = (data_array[meter_ch_3] * 1).toFixed(1);
                                            chart_43.addData({
                                                timestamp: parseJSON['date_time'],
                                                chart_43: new_data_chart_43
                                            });
                                        }
                                        if (meter_st_4 === "1") {
                                            var new_data_chart_44 = (data_array[meter_ch_4] * 1).toFixed(1);
                                            chart_44.addData({
                                                timestamp: parseJSON['date_time'],
                                                chart_44: new_data_chart_44
                                            });
                                        }
                                        if (meter_st_5 === "1") {
                                            var new_data_chart_45 = (data_array[meter_ch_5] * 1).toFixed(1);
                                            chart_45.addData({
                                                timestamp: parseJSON['date_time'],
                                                chart_45: new_data_chart_45
                                            });
                                        }
                                    }
                                }
                            } // exit_message
                            connect();
                            if (meter_st_1 === "1") {
                                var chart_41 = am4core.create("chart_41", am4charts.XYChart);
                                chart_41.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                chart_41.data = res_chart;

                                var dateAxis_41 = chart_41.xAxes.push(new am4charts.DateAxis());
                                dateAxis_41.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                dateAxis_41.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                var valueAxis_41 = chart_41.yAxes.push(new am4charts.ValueAxis());

                                var series_41 = chart_41.series.push(new am4charts.LineSeries());
                                series_41.dataFields.valueY = "chart_v";
                                series_41.dataFields.dateX = "timestamp";
                                series_41.tooltipText = "{chart_v} ("+ unit_m1 +")";
                                series_41.strokeWidth = 2;

                                chart_41.cursor = new am4charts.XYCursor();
                                chart_41.cursor.snapToSeries = series_41;
                                chart_41.cursor.xAxis = dateAxis_41;
                            }
                            if (meter_st_2 === "1") {
                                var chart_42 = am4core.create("chart_42", am4charts.XYChart);
                                chart_42.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                chart_42.data = res_chart;

                                var dateAxis_42 = chart_42.xAxes.push(new am4charts.DateAxis());
                                dateAxis_42.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                dateAxis_42.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                var valueAxis_42 = chart_42.yAxes.push(new am4charts.ValueAxis());

                                var series_42 = chart_42.series.push(new am4charts.LineSeries());
                                series_42.dataFields.valueY = "chart_a";
                                series_42.dataFields.dateX = "timestamp";
                                series_42.tooltipText = "{chart_a} ("+ unit_m2 +")";
                                series_42.strokeWidth = 2;

                                chart_42.cursor = new am4charts.XYCursor();
                                chart_42.cursor.snapToSeries = series_42;
                                chart_42.cursor.xAxis = dateAxis_42;
                            }
                            if (meter_st_3 === "1") {
                                var chart_43 = am4core.create("chart_43", am4charts.XYChart);
                                chart_43.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                chart_43.data = res_chart;

                                var dateAxis_43 = chart_43.xAxes.push(new am4charts.DateAxis());
                                dateAxis_43.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                dateAxis_43.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                var valueAxis_43 = chart_43.yAxes.push(new am4charts.ValueAxis());

                                var series_43 = chart_43.series.push(new am4charts.LineSeries());
                                series_43.dataFields.valueY = "chart_p";
                                series_43.dataFields.dateX = "timestamp";
                                series_43.tooltipText = "{chart_p} ("+ unit_m3 +")";
                                series_43.strokeWidth = 2;

                                chart_43.cursor = new am4charts.XYCursor();
                                chart_43.cursor.snapToSeries = series_43;
                                chart_43.cursor.xAxis = dateAxis_43;
                            }
                            if (meter_st_4 === "1") {
                                var chart_44 = am4core.create("chart_44", am4charts.XYChart);
                                chart_44.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                chart_44.data = res_chart;

                                var dateAxis_44 = chart_44.xAxes.push(new am4charts.DateAxis());
                                dateAxis_44.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                dateAxis_44.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                var valueAxis_44 = chart_44.yAxes.push(new am4charts.ValueAxis());

                                var series_44 = chart_44.series.push(new am4charts.LineSeries());
                                series_44.dataFields.valueY = "chart_wt";
                                series_44.dataFields.dateX = "timestamp";
                                series_44.tooltipText = "{chart_wt} ("+ unit_m4 +")";
                                series_44.strokeWidth = 2;

                                chart_44.cursor = new am4charts.XYCursor();
                                chart_44.cursor.snapToSeries = series_44;
                                chart_44.cursor.xAxis = dateAxis_44;
                            }
                            if (meter_st_5 === "1") {
                                var chart_45 = am4core.create("chart_45", am4charts.XYChart);
                                chart_45.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                chart_45.data = res_chart;

                                var dateAxis_45 = chart_45.xAxes.push(new am4charts.DateAxis());
                                dateAxis_45.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                dateAxis_45.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                var valueAxis_45 = chart_45.yAxes.push(new am4charts.ValueAxis());

                                var series_45 = chart_45.series.push(new am4charts.LineSeries());
                                series_45.dataFields.valueY = "chart_ws";
                                series_45.dataFields.dateX = "timestamp";
                                series_45.tooltipText = "{chart_ws} ("+unit_m5+")";
                                series_45.strokeWidth = 2;

                                chart_45.cursor = new am4charts.XYCursor();
                                chart_45.cursor.snapToSeries = series_45;
                                chart_45.cursor.xAxis = dateAxis_45;
                            }
                            loadingOut(loading);
                        });
                    }else{
                        console.log(res_chart);
                        loadingOut(loading);
                    }
                }
            });
        });
    </script>
    <script src="config_js/mqtt_sw.js"></script>
<?php } ?>