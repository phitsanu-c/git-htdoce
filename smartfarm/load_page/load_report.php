<?php
session_start();
require '../config_db/connectdb.php';
$house_master = $_POST["house_master"];

$stmtc = $dbcon->prepare("SELECT * from tb3_controlstatus  WHERE controlstatus_sn = '$house_master' ");
$stmtc->execute();
$rowc = $stmtc->fetch();
$count_c = $rowc["controlstatus_1"] + $rowc["controlstatus_2"] + $rowc["controlstatus_3"] + $rowc["controlstatus_4"] + $rowc["controlstatus_5"] +
    $rowc["controlstatus_6"] + $rowc["controlstatus_7"] + $rowc["controlstatus_8"] + $rowc["controlstatus_9"] + $rowc["controlstatus_10"] + $rowc["controlstatus_11"]; //$stmtc->rowCount();

$stmt1 = $dbcon->prepare("SELECT * from tb3_conttrolname  WHERE conttrolname_sn = '$house_master' ");
$stmt1->execute();
$row1 = $stmt1->fetch();

// $stmt2 = $dbcon->prepare("SELECT
//                 dashname_1_1, dashname_1_2, dashname_1_3, dashname_1_4,
//                 dashname_2_1, dashname_2_2, dashname_2_3, dashname_2_4,
//                 dashname_3_1, dashname_3_2, dashname_3_3, dashname_3_4,
//                 dashname_4_1, dashname_4_2, dashname_4_3, dashname_4_4,
//                 dashname_5_1, dashname_5_2, dashname_5_3, dashname_5_4,
//                 dashname_6_1, dashname_6_2, dashname_6_3, dashname_6_4,
//                 dashname_7_1, dashname_7_2, dashname_7_3, dashname_7_4,
//                 dashname_8_1, dashname_8_2, dashname_8_3, dashname_8_4,
//                 dashname_9_1, dashname_9_2, dashname_9_3, dashname_9_4,
//                 dashname_10_1, dashname_10_2, dashname_10_3, dashname_10_4
//             from tb3_dashname WHERE dashname_sn = '$house_master' order by dashname_id limit 1");
// $stmt2->execute();
// $row2 = $stmt2->fetch();
?>
<style>
    .chartdiv {
        width: 100%;
        height: 500px;
    }

    .floatRight {
        float: right;
    }

    .clear {
        clear: both;
    }
</style>
<div class="dashboard m-b-20">
    <div class="card-body">
        <div class="col-12 table-modal">
            <div class="row parent">
                <div class="col-12 col-xl-6 child2">
                    <div class="col-12 text-center">
                        <div class="row">
                            <a class="col-4 nav-link btn-secondary2 active memu_report_sensor" href="javascript:void(0)">Sensor Report</a>
                            <?php if ($count_c > 0) { ?>
                                <a class="col-4 nav-link btn-secondary2 memu_report_cont" href="javascript:void(0)">Control Report</a>
                                <?php if ($house_master != "KMUMT001") { ?>
                                    <a class="col-4 nav-link btn-secondary2 memu_report_cont_a" href="javascript:void(0)">Control Auto Report</a>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page_table_sensor m-t-10">
            <div class="col-12 table-modal">
                <div class="row parent">
                    <div class="col-12 col-xl-4 child2">
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="row">
                                    <a class="col-4 nav-link btn-secondary2 all_day" href="javascript:void(0)">Day</a>
                                    <a class="col-4 nav-link btn-secondary2 all_week" href="javascript:void(0)">Week</a>
                                    <a class="col-4 nav-link btn-secondary2 all_month" href="javascript:void(0)">Month</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-8 child2">
                        <div class="row">
                            <div class="col-12 col-xl-9">
                                <div class="row fromto_all_active">
                                    <input class="col-5 nav-item text-center from_to_df val_start" type="text" placeholder="From" />
                                    <input class="col-5 nav-item text-center from_to_df val_end" type="text" placeholder="To" />

                                    <a class="col-2 nav-link text-center btn-secondary2 all_from_to" href="javascript:void(0)">
                                        <span class="d-none d-sm-block">PLOT</span>
                                        <span class="d-block d-sm-none"><i class="icon-check"></i></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-3 text-center">
                                <div class="row icon_all">
                                    <a class="col-6 nav-link btn-secondary2 active icon_all_chart_mod" href="javascript:void(0)"><i class="icon-line-chart"></i> Chart</a>
                                    <a class="col-6 nav-link btn-secondary2 icon_all_table_mod" href="javascript:void(0)"><i class=" icon-table"></i> Table</a>
                                </div>
                            </div>
                            <!-- <div class="col-12 col-xl-3 text-center">
                                <select id="sel_modal_every" class="nav-link form-control" style="border: 1px solid rgba(155, 153, 153, 0.678);">
                                    <option value="1"> 1 minutes</option>
                                    <option value="2"> 5 minutes</option>
                                    <option value="3"> 10 minutes</option>
                                    <option value="4"> 15 minutes</option>
                                    <option value="5"> 30 minutes</option>
                                    <option value="6"> 60 minutes</option>
                                </select>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="page_all_chart">
                <div id="all_chart" class="chartdiv"></div>
            </div>
            <div class="page_all_table">
                <div id="all_table"></div>
            </div>
        </div>
        <div class="page_table_cont">
            <div id="report_con_table" class="text-dark"></div>
        </div>
        <div class="page_table_cont_a">
            <div class="col-12 table-modal">
                <div class="row parent">
                    <div class="col-12 col-xl-12 child2">
                        <div class="col-12 text-center">
                            <div class="row m-t-20">
                                <?php
                                if ($rowc["controlstatus_1"] == 1) {
                                    echo '<a class="nav-link btn-secondary2 r_cont" id="1" href="javascript:void(0)">' . $row1["conttrolname_1"] . '</a>';
                                }
                                if ($rowc["controlstatus_2"] == 1) {
                                    echo '<a class="nav-link btn-secondary2 r_cont" id="2" href="javascript:void(0)">' . $row1["conttrolname_2"] . '</a>';
                                }
                                if ($rowc["controlstatus_3"] == 1) {
                                    echo '<a class="nav-link btn-secondary2 r_cont" id="3" href="javascript:void(0)">' . $row1["conttrolname_3"] . '</a>';
                                }
                                if ($rowc["controlstatus_4"] == 1) {
                                    echo '<a class="nav-link btn-secondary2 r_cont" id="4" href="javascript:void(0)">' . $row1["conttrolname_4"] . '</a>';
                                }
                                if ($rowc["controlstatus_5"] == 1) {
                                    echo '<a class="nav-link btn-secondary2 r_cont" id="5" href="javascript:void(0)">' . $row1["conttrolname_5"] . '</a>';
                                }
                                if ($rowc["controlstatus_6"] == 1) {
                                    echo '<a class="nav-link btn-secondary2 r_cont" id="6" href="javascript:void(0)">' . $row1["conttrolname_6"] . '</a>';
                                }
                                if ($rowc["controlstatus_7"] == 1) {
                                    echo '<a class="nav-link btn-secondary2 r_cont" id="7" href="javascript:void(0)">' . $row1["conttrolname_7"] . '</a>';
                                }
                                if ($rowc["controlstatus_8"] == 1) {
                                    echo '<a class="nav-link btn-secondary2 r_cont" id="8" href="javascript:void(0)">' . $row1["conttrolname_8"] . '</a>';
                                }
                                if ($rowc["controlstatus_9"] == 1) {
                                    echo '<a class="nav-link btn-secondary2 r_cont" id="9" href="javascript:void(0)">' . $row1["conttrolname_9"] . '</a>';
                                }
                                if ($rowc["controlstatus_10"] == 1) {
                                    echo '<a class="nav-link btn-secondary2 r_cont" id="10" href="javascript:void(0)">' . $row1["conttrolname_10"] . '</a>';
                                }
                                if ($rowc["controlstatus_11"] == 1) {
                                    echo '<a class="nav-link btn-secondary2 r_cont" id="11" href="javascript:void(0)">' . $row1["conttrolname_11"] . '</a>';
                                }
                                // if($rowc["controlstatus_12"] == 1){echo '<a class="nav-link btn-secondary2 r_cont" id="12" href="javascript:void(0)">'.$row1["conttrolname_12"].'</a>';}

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="report_con_table_a" class="text-dark"></div>
        </div>
    </div>
</div>

