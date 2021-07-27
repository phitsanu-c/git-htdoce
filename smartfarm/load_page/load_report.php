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

<script>
    var house_master = '<?= $house_master ?>';
    if (house_master === "KMUMT001" || house_master === "KMUWM001" || house_master === "KMUWM002" || house_master === "OVTMT002" || house_master === "TSPWM001") {
        $(".hid_sn").hide();
    }
    var controlstatus_1 = '<?= $rowc["controlstatus_1"] ?>';
    var controlstatus_2 = '<?= $rowc["controlstatus_2"] ?>';
    var controlstatus_3 = '<?= $rowc["controlstatus_3"] ?>';
    var controlstatus_4 = '<?= $rowc["controlstatus_4"] ?>';
    var controlstatus_5 = '<?= $rowc["controlstatus_5"] ?>';
    var controlstatus_6 = '<?= $rowc["controlstatus_6"] ?>';
    var controlstatus_7 = '<?= $rowc["controlstatus_7"] ?>';
    var controlstatus_8 = '<?= $rowc["controlstatus_8"] ?>';
    var controlstatus_9 = '<?= $rowc["controlstatus_9"] ?>';
    var controlstatus_10 = '<?= $rowc["controlstatus_10"] ?>';
    var controlstatus_11 = '<?= $rowc["controlstatus_11"] ?>';

    $('.val_start').daterangepicker({
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
    $('.val_start').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY/MM/DD - HH:mm'));
    });

    $('.val_end').daterangepicker({
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
    $('.val_end').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY/MM/DD - HH:mm'));
    });

    $(".page_table_sensor").show();
    $(".page_table_cont").hide();
    $(".page_table_cont_a").hide();
    // $("#report_con_table").load("config_php/get_report_table.php");

    $(".memu_report_sensor").click(function() {
        $(this).addClass("active");
        $(".memu_report_cont").removeClass("active");
        $(".memu_report_cont_a").removeClass("active");
        $(".page_table_sensor").show();
        $(".page_table_cont").hide();
        $(".page_table_cont_a").hide();
    });
    $(".memu_report_cont").click(function() {
        // $(".r_cont").removeClass("active");
        $(".memu_report_sensor").removeClass("active");
        $(this).addClass("active");
        $(".memu_report_cont_a").removeClass("active");
        $(".page_table_sensor").hide();
        $(".page_table_cont").show();
        $(".page_table_cont_a").hide();
        var loading = verticalNoTitle();
        $.ajax({
            url: "config_php/get_report_table.php",
            method: "post",
            data: {
                house_master: house_master
            },
            success: function(get_report_table) {
                $("#report_con_table").html(get_report_table);
                if (loading !== "") {
                    loadingOut(loading);
                }
            }
        });
    });

    $(".memu_report_cont_a").click(function() {
        $(".memu_report_sensor").removeClass("active");
        $(".memu_report_cont").removeClass("active");
        $(this).addClass("active");
        $(".page_table_sensor").hide();
        $(".page_table_cont").hide();
        $(".page_table_cont_a").show();
        if (controlstatus_1 == 1) {
            $("#1").addClass("active");
            var chanel = 1;
        } else if (controlstatus_1 == 0 && controlstatus_2 == 1) {
            $("#1").removeClass("active");
            $("#2").addClass("active");
            var chanel = 2;
        } else if (controlstatus_1 == 0 && controlstatus_2 == 0 && controlstatus_3 == 1) {
            $("#1").removeClass("active");
            $("#2").removeClass("active");
            $("#3").addClass("active");
            var chanel = 3;
        } else if (controlstatus_1 == 0 && controlstatus_2 == 0 && controlstatus_3 == 0 && controlstatus_4 == 1) {
            $("#1").removeClass("active");
            $("#2").removeClass("active");
            $("#3").removeClass("active");
            $("#4").addClass("active");
            var chanel = 4;
        } else if (controlstatus_1 == 0 && controlstatus_2 == 0 && controlstatus_3 == 0 && controlstatus_4 == 0 && controlstatus_5 == 1) {
            $("#1").removeClass("active");
            $("#2").removeClass("active");
            $("#3").removeClass("active");
            $("#4").removeClass("active");
            $("#5").addClass("active");
            var chanel = 5;
        } else if (controlstatus_1 == 0 && controlstatus_2 == 0 && controlstatus_3 == 0 && controlstatus_4 == 0 && controlstatus_5 == 0 && controlstatus_6 == 1) {
            $("#1").removeClass("active");
            $("#2").removeClass("active");
            $("#3").removeClass("active");
            $("#4").removeClass("active");
            $("#5").removeClass("active");
            $("#6").addClass("active");
            var chanel = 6;
        } else if (controlstatus_1 == 0 && controlstatus_2 == 0 && controlstatus_3 == 0 && controlstatus_4 == 0 && controlstatus_5 == 0 && controlstatus_6 == 0 && controlstatus_7 == 1) {
            $("#1").removeClass("active");
            $("#2").removeClass("active");
            $("#3").removeClass("active");
            $("#4").removeClass("active");
            $("#5").removeClass("active");
            $("#6").removeClass("active");
            $("#7").addClass("active");
            var chanel = 7;
        } else if (controlstatus_1 == 0 && controlstatus_2 == 0 && controlstatus_3 == 0 && controlstatus_4 == 0 && controlstatus_5 == 0 && controlstatus_6 == 0 && controlstatus_7 == 0 && controlstatus_8 == 1) {
            $("#1").removeClass("active");
            $("#2").removeClass("active");
            $("#3").removeClass("active");
            $("#4").removeClass("active");
            $("#5").removeClass("active");
            $("#6").removeClass("active");
            $("#7").removeClass("active");
            $("#8").addClass("active");
            var chanel = 8;
        } else if (controlstatus_1 == 0 && controlstatus_2 == 0 && controlstatus_3 == 0 && controlstatus_4 == 0 && controlstatus_5 == 0 && controlstatus_6 == 0 && controlstatus_7 == 0 && controlstatus_8 == 0 && controlstatus_9 == 1) {
            $("#1").removeClass("active");
            $("#2").removeClass("active");
            $("#3").removeClass("active");
            $("#4").removeClass("active");
            $("#5").removeClass("active");
            $("#6").removeClass("active");
            $("#7").removeClass("active");
            $("#8").removeClass("active");
            $("#9").addClass("active");
            var chanel = 9;
        } else if (controlstatus_1 == 0 && controlstatus_2 == 0 && controlstatus_3 == 0 && controlstatus_4 == 0 && controlstatus_5 == 0 && controlstatus_6 == 0 && controlstatus_7 == 0 && controlstatus_8 == 0 && controlstatus_9 == 0 && controlstatus_10 == 1) {
            $("#1").removeClass("active");
            $("#2").removeClass("active");
            $("#3").removeClass("active");
            $("#4").removeClass("active");
            $("#5").removeClass("active");
            $("#6").removeClass("active");
            $("#7").removeClass("active");
            $("#8").removeClass("active");
            $("#9").removeClass("active");
            $("#10").addClass("active");
            var chanel = 10;
        } else if (controlstatus_1 == 0 && controlstatus_2 == 0 && controlstatus_3 == 0 && controlstatus_4 == 0 && controlstatus_5 == 0 && controlstatus_6 == 0 && controlstatus_7 == 0 && controlstatus_8 == 0 && controlstatus_9 == 0 && controlstatus_10 == 0 && controlstatus_11 == 1) {
            $("#1").removeClass("active");
            $("#2").removeClass("active");
            $("#3").removeClass("active");
            $("#4").removeClass("active");
            $("#5").removeClass("active");
            $("#6").removeClass("active");
            $("#7").removeClass("active");
            $("#8").removeClass("active");
            $("#9").removeClass("active");
            $("#10").removeClass("active");
            $("#11").addClass("active");
            var chanel = 11;
        }
        var loading = verticalNoTitle();
        $.ajax({
            url: 'config_php/get_report_table_a.php',
            method: "post",
            data: {
                house_master: house_master,
                chanel: chanel
            },
            // dataType: "json",
            success: function(res) {
                $("#report_con_table_a").html(res);
                if (loading !== "") {
                    loadingOut(loading);
                }
            }
        });
        // $("#report_con_table_a").load("config_php/get_report_table_a.php");
    });

    $(".r_cont").click(function() {
        for (var i = 1; i < 12; i++) {
            if (i != $(this).attr("id")) {
                $(".r_cont").removeClass("active");
            }
            $(this).addClass("active");
        }
        $.ajax({
            url: 'config_php/get_report_table_a.php',
            method: "post",
            data: {
                house_master: house_master,
                chanel: $(this).attr("id")
            },
            // dataType: "json",
            success: function(res) {
                $("#report_con_table_a").html(res);
            }
        });
    });

    // $(".icon_all").hide();
    $(".page_all_chart").show();
    $(".page_all_table").hide();
    $(".all_day").click(function() {
        $("#status_btn_all").val("day");
        modal_sel_show();
    });
    $(".all_week").click(function() {
        $("#status_btn_all").val("week");
        modal_sel_show();
    });
    $(".all_month").click(function() {
        $("#status_btn_all").val("month");
        modal_sel_show();
    });
    $(".all_from_to").click(function() {
        var start = $(".val_start").val();
        var end = $(".val_end").val();
        if (start === "" && end === "") {
            swal({
                title: "Please enter a From and To.!!!",
                type: "warning",
                allowOutsideClick: false,
                showConfirmButton: true
            });
            $(".val_start").removeClass("from_to_df").addClass("input_err");
            $(".val_end").removeClass("from_to_df").addClass("input_err");
            return false;
        }
        if (start === "") {
            swal({
                title: "Please enter a From.!!!",
                type: "warning",
                allowOutsideClick: false,
                showConfirmButton: true
            });
            $(".val_start").removeClass("from_to_df").addClass("input_err");
            return false;
        } else {
            $(".val_start").removeClass("input_err").addClass("from_to_df");
        }
        if (end === "") {
            swal({
                title: "Please enter a To !!!",
                type: "warning",
                allowOutsideClick: false,
                showConfirmButton: true
            });
            $(".val_end").removeClass("from_to_df").addClass("input_err");
            return false;
        } else {
            $(".val_end").removeClass("input_err").addClass("from_to_df");
        }
        $("#status_btn_all").val("from_to");
        modal_sel_show();
    });

    function modal_sel_show(status, start, end) {
        var tn_sn1 = $('.Tbtn_sn1').prop('checked');
        var tn_sn2 = $('.Tbtn_sn2').prop('checked');
        var tn_sn3 = $('.Tbtn_sn3').prop('checked');
        var tn_sn4 = $('.Tbtn_sn4').prop('checked');
        var tn_sn5 = $('.Tbtn_sn5').prop('checked');
        var tn_sn6 = $('.Tbtn_sn6').prop('checked');
        var tn_sn7 = $('.Tbtn_sn7').prop('checked');
        var tn_sn8 = $('.Tbtn_sn8').prop('checked');
        var tn_sn9 = $('.Tbtn_sn9').prop('checked');
        var tn_sn10 = $('.Tbtn_sn10').prop('checked');
        var tn_sn11 = $('.Tbtn_sn11').prop('checked');
        var tn_sn12 = $('.Tbtn_sn12').prop('checked');
        var tn_sn13 = $('.Tbtn_sn13').prop('checked');
        var tn_sn14 = $('.Tbtn_sn14').prop('checked');
        var tn_sn15 = $('.Tbtn_sn15').prop('checked');
        var tn_sn16 = $('.Tbtn_sn16').prop('checked');
        var tn_sn17 = $('.Tbtn_sn17').prop('checked');
        var tn_sn18 = $('.Tbtn_sn18').prop('checked');
        var tn_sn19 = $('.Tbtn_sn19').prop('checked');
        var tn_sn20 = $('.Tbtn_sn20').prop('checked');
        var tn_sn21 = $('.Tbtn_sn21').prop('checked');
        var tn_sn22 = $('.Tbtn_sn22').prop('checked');
        var tn_sn23 = $('.Tbtn_sn23').prop('checked');
        var tn_sn24 = $('.Tbtn_sn24').prop('checked');
        var tn_sn25 = $('.Tbtn_sn25').prop('checked');
        var tn_sn26 = $('.Tbtn_sn26').prop('checked');
        var tn_sn27 = $('.Tbtn_sn27').prop('checked');
        var tn_sn28 = $('.Tbtn_sn28').prop('checked');
        var tn_sn29 = $('.Tbtn_sn29').prop('checked');
        var tn_sn30 = $('.Tbtn_sn30').prop('checked');
        var tn_sn31 = $('.Tbtn_sn31').prop('checked');
        var tn_sn32 = $('.Tbtn_sn32').prop('checked');
        var tn_sn33 = $('.Tbtn_sn33').prop('checked');
        var tn_sn34 = $('.Tbtn_sn34').prop('checked');
        var tn_sn35 = $('.Tbtn_sn35').prop('checked');
        var tn_sn36 = $('.Tbtn_sn36').prop('checked');
        var tn_sn37 = $('.Tbtn_sn37').prop('checked');
        var tn_sn38 = $('.Tbtn_sn38').prop('checked');
        var tn_sn39 = $('.Tbtn_sn39').prop('checked');
        var tn_sn40 = $('.Tbtn_sn40').prop('checked');
        $("#Modal_select_sn").modal("show");

        $(".close_select_sn_Modal").click(function() {
            $("#Modal_select_sn").modal("hide");
            $("#status_btn_all").val("");
            // return false;
            // var df_label = $("#datelabel").val();
            // if (df_label === "") {
            //     $('#reportrange span').html("Select Date time");
            //     $("#datefilter").val("");
            // } else {
            //     $('#reportrange span').html(df_label);
            //     $("#datefilter").val("");
            // }
            switch_toggle(sw_status = tn_sn1, Csw_status = "Tbtn_sn1");
            switch_toggle(sw_status = tn_sn2, Csw_status = "Tbtn_sn2");
            switch_toggle(sw_status = tn_sn3, Csw_status = "Tbtn_sn3");
            switch_toggle(sw_status = tn_sn4, Csw_status = "Tbtn_sn4");
            switch_toggle(sw_status = tn_sn5, Csw_status = "Tbtn_sn5");
            switch_toggle(sw_status = tn_sn6, Csw_status = "Tbtn_sn6");
            switch_toggle(sw_status = tn_sn7, Csw_status = "Tbtn_sn7");
            switch_toggle(sw_status = tn_sn8, Csw_status = "Tbtn_sn8");
            switch_toggle(sw_status = tn_sn9, Csw_status = "Tbtn_sn9");
            switch_toggle(sw_status = tn_sn10, Csw_status = "Tbtn_sn10");
            switch_toggle(sw_status = tn_sn11, Csw_status = "Tbtn_sn11");
            switch_toggle(sw_status = tn_sn12, Csw_status = "Tbtn_sn12");
            switch_toggle(sw_status = tn_sn13, Csw_status = "Tbtn_sn13");
            switch_toggle(sw_status = tn_sn14, Csw_status = "Tbtn_sn14");
            switch_toggle(sw_status = tn_sn15, Csw_status = "Tbtn_sn15");
            switch_toggle(sw_status = tn_sn16, Csw_status = "Tbtn_sn16");
            switch_toggle(sw_status = tn_sn17, Csw_status = "Tbtn_sn17");
            switch_toggle(sw_status = tn_sn18, Csw_status = "Tbtn_sn18");
            switch_toggle(sw_status = tn_sn19, Csw_status = "Tbtn_sn19");
            switch_toggle(sw_status = tn_sn20, Csw_status = "Tbtn_sn20");
            switch_toggle(sw_status = tn_sn21, Csw_status = "Tbtn_sn21");
            switch_toggle(sw_status = tn_sn22, Csw_status = "Tbtn_sn22");
            switch_toggle(sw_status = tn_sn23, Csw_status = "Tbtn_sn23");
            switch_toggle(sw_status = tn_sn24, Csw_status = "Tbtn_sn24");
            switch_toggle(sw_status = tn_sn25, Csw_status = "Tbtn_sn25");
            switch_toggle(sw_status = tn_sn26, Csw_status = "Tbtn_sn26");
            switch_toggle(sw_status = tn_sn27, Csw_status = "Tbtn_sn27");
            switch_toggle(sw_status = tn_sn28, Csw_status = "Tbtn_sn28");
            switch_toggle(sw_status = tn_sn29, Csw_status = "Tbtn_sn29");
            switch_toggle(sw_status = tn_sn30, Csw_status = "Tbtn_sn30");
            switch_toggle(sw_status = tn_sn31, Csw_status = "Tbtn_sn31");
            switch_toggle(sw_status = tn_sn32, Csw_status = "Tbtn_sn32");
            switch_toggle(sw_status = tn_sn33, Csw_status = "Tbtn_sn33");
            switch_toggle(sw_status = tn_sn34, Csw_status = "Tbtn_sn34");
            switch_toggle(sw_status = tn_sn35, Csw_status = "Tbtn_sn35");
            switch_toggle(sw_status = tn_sn36, Csw_status = "Tbtn_sn36");
            switch_toggle(sw_status = tn_sn37, Csw_status = "Tbtn_sn37");
            switch_toggle(sw_status = tn_sn38, Csw_status = "Tbtn_sn38");
            switch_toggle(sw_status = tn_sn39, Csw_status = "Tbtn_sn39");
            switch_toggle(sw_status = tn_sn40, Csw_status = "Tbtn_sn40");
        });
    }

    function switch_toggle(sw_status, Csw_status) {
        if (sw_status === true) {
            $('.' + Csw_status).bootstrapToggle('on');
        } else {
            $('.' + Csw_status).bootstrapToggle('off');
        }
    }

    $("#submit_select_sn_Modal").click(function() {
        if($("#status_btn_all").val() === "day"){ 
            $(".all_day").addClass("active");
            $(".all_week").removeClass("active");
            $(".all_month").removeClass("active");
            $(".all_from_to").removeClass("active");
            $(".fromto_all_active").removeClass("fromto_border");
        }else if($("#status_btn_all").val() === "week"){ 
            $(".all_day").removeClass("active");
            $(".all_week").addClass("active");
            $(".all_month").removeClass("active");
            $(".all_from_to").removeClass("active");
            $(".fromto_all_active").removeClass("fromto_border");
        }else if($("#status_btn_all").val() === "month"){ 
            $(".all_day").removeClass("active");
            $(".all_week").removeClass("active");
            $(".all_month").addClass("active");
            $(".all_from_to").removeClass("active");
            $(".fromto_all_active").removeClass("fromto_border");
        }else if($("#status_btn_all").val() === "from_to"){ 
            $(".all_day").removeClass("active");
            $(".all_week").removeClass("active");
            $(".all_month").removeClass("active");
            $(".fromto_all_active").addClass("fromto_border");
            $(".all_from_to").addClass("active");
        }
        $("#Modal_select_sn").modal("hide");
        if ($(".icon_all_chart_mod").hasClass("active") === true) {
            all_chart();
            // all_table();
        }
        if ($(".icon_all_table_mod").hasClass("active") === true) {
            all_table();
            // all_chart(loading);
        }
    });

    $(".icon_all_chart_mod").click(function() {
        $(".icon_all_table_mod").removeClass("active");
        if ($(".all_day").hasClass("active") === true || $(".all_week").hasClass("active") === true || $(".all_month").hasClass("active") === true) {
            all_chart();
        }
        $(this).addClass("active");
        $(".page_all_chart").show();
        $(".page_all_table").hide();
    });
    $(".icon_all_table_mod").click(function() {
        $(".icon_all_chart_mod").removeClass("active");
        if ($(".all_day").hasClass("active") === true || $(".all_week").hasClass("active") === true || $(".all_month").hasClass("active") === true) {
            all_table();
        }
        $(this).addClass("active");
        $(".page_all_chart").hide();
        $(".page_all_table").show();

    });

    function all_table() {
        var loading = verticalNoTitle();
        $(".val_start").removeClass("input_err").addClass("from_to_df");
        $(".val_end").removeClass("input_err").addClass("from_to_df");
        var snStatus = {
            "Tbtn_sn1": $('.Tbtn_sn1').prop('checked'),
            "Tbtn_sn2": $('.Tbtn_sn2').prop('checked'),
            "Tbtn_sn3": $('.Tbtn_sn3').prop('checked'),
            "Tbtn_sn4": $('.Tbtn_sn4').prop('checked'),
            "Tbtn_sn5": $('.Tbtn_sn5').prop('checked'),
            "Tbtn_sn6": $('.Tbtn_sn6').prop('checked'),
            "Tbtn_sn7": $('.Tbtn_sn7').prop('checked'),
            "Tbtn_sn8": $('.Tbtn_sn8').prop('checked'),
            "Tbtn_sn9": $('.Tbtn_sn9').prop('checked'),
            "Tbtn_sn10": $('.Tbtn_sn10').prop('checked'),

            "Tbtn_sn11": $('.Tbtn_sn11').prop('checked'),
            "Tbtn_sn12": $('.Tbtn_sn12').prop('checked'),
            "Tbtn_sn13": $('.Tbtn_sn13').prop('checked'),
            "Tbtn_sn14": $('.Tbtn_sn14').prop('checked'),
            "Tbtn_sn15": $('.Tbtn_sn15').prop('checked'),
            "Tbtn_sn16": $('.Tbtn_sn16').prop('checked'),
            "Tbtn_sn17": $('.Tbtn_sn17').prop('checked'),
            "Tbtn_sn18": $('.Tbtn_sn18').prop('checked'),
            "Tbtn_sn19": $('.Tbtn_sn19').prop('checked'),
            "Tbtn_sn20": $('.Tbtn_sn20').prop('checked'),

            "Tbtn_sn21": $('.Tbtn_sn21').prop('checked'),
            "Tbtn_sn22": $('.Tbtn_sn22').prop('checked'),
            "Tbtn_sn23": $('.Tbtn_sn23').prop('checked'),
            "Tbtn_sn24": $('.Tbtn_sn24').prop('checked'),
            "Tbtn_sn25": $('.Tbtn_sn25').prop('checked'),
            "Tbtn_sn26": $('.Tbtn_sn26').prop('checked'),
            "Tbtn_sn27": $('.Tbtn_sn27').prop('checked'),
            "Tbtn_sn28": $('.Tbtn_sn28').prop('checked'),
            "Tbtn_sn29": $('.Tbtn_sn29').prop('checked'),
            "Tbtn_sn30": $('.Tbtn_sn30').prop('checked'),

            "Tbtn_sn31": $('.Tbtn_sn31').prop('checked'),
            "Tbtn_sn32": $('.Tbtn_sn32').prop('checked'),
            "Tbtn_sn33": $('.Tbtn_sn33').prop('checked'),
            "Tbtn_sn34": $('.Tbtn_sn34').prop('checked'),
            "Tbtn_sn35": $('.Tbtn_sn35').prop('checked'),
            "Tbtn_sn36": $('.Tbtn_sn36').prop('checked'),
            "Tbtn_sn37": $('.Tbtn_sn37').prop('checked'),
            "Tbtn_sn38": $('.Tbtn_sn38').prop('checked'),
            "Tbtn_sn39": $('.Tbtn_sn39').prop('checked'),
            "Tbtn_sn40": $('.Tbtn_sn40').prop('checked')
        };
        $.ajax({
            url: "config_php/get_all_table.php",
            method: "post",
            data: {
                house_master: house_master,
                status: $("#status_btn_all").val(), //day week month
                btn_status: snStatus, // array
                sel_all_every: $("#sel_all_every").val(), // เลืแหเวลา 4 5 10 15 30 60
                v_start: $('.val_start').val(),
                v_end: $('.val_end').val()
            },
            // dataType: "json",
            success: function(res_table) {
                // console.log(res_table);
                $("#all_table").html(res_table);

                if ($(".icon_all_table_mod").hasClass("active") === true) {
                    // $("#status_btn_all").val("");
                    if (loading !== "") {
                        loadingOut(loading);
                    }
                }
            }
        });
    }

    function all_chart() {
        var loading = verticalNoTitle();
        var snStatus = {
            "Tbtn_sn1": $('.Tbtn_sn1').prop('checked'),
            "Tbtn_sn2": $('.Tbtn_sn2').prop('checked'),
            "Tbtn_sn3": $('.Tbtn_sn3').prop('checked'),
            "Tbtn_sn4": $('.Tbtn_sn4').prop('checked'),
            "Tbtn_sn5": $('.Tbtn_sn5').prop('checked'),
            "Tbtn_sn6": $('.Tbtn_sn6').prop('checked'),
            "Tbtn_sn7": $('.Tbtn_sn7').prop('checked'),
            "Tbtn_sn8": $('.Tbtn_sn8').prop('checked'),
            "Tbtn_sn9": $('.Tbtn_sn9').prop('checked'),
            "Tbtn_sn10": $('.Tbtn_sn10').prop('checked'),

            "Tbtn_sn11": $('.Tbtn_sn11').prop('checked'),
            "Tbtn_sn12": $('.Tbtn_sn12').prop('checked'),
            "Tbtn_sn13": $('.Tbtn_sn13').prop('checked'),
            "Tbtn_sn14": $('.Tbtn_sn14').prop('checked'),
            "Tbtn_sn15": $('.Tbtn_sn15').prop('checked'),
            "Tbtn_sn16": $('.Tbtn_sn16').prop('checked'),
            "Tbtn_sn17": $('.Tbtn_sn17').prop('checked'),
            "Tbtn_sn18": $('.Tbtn_sn18').prop('checked'),
            "Tbtn_sn19": $('.Tbtn_sn19').prop('checked'),
            "Tbtn_sn20": $('.Tbtn_sn20').prop('checked'),

            "Tbtn_sn21": $('.Tbtn_sn21').prop('checked'),
            "Tbtn_sn22": $('.Tbtn_sn22').prop('checked'),
            "Tbtn_sn23": $('.Tbtn_sn23').prop('checked'),
            "Tbtn_sn24": $('.Tbtn_sn24').prop('checked'),
            "Tbtn_sn25": $('.Tbtn_sn25').prop('checked'),
            "Tbtn_sn26": $('.Tbtn_sn26').prop('checked'),
            "Tbtn_sn27": $('.Tbtn_sn27').prop('checked'),
            "Tbtn_sn28": $('.Tbtn_sn28').prop('checked'),
            "Tbtn_sn29": $('.Tbtn_sn29').prop('checked'),
            "Tbtn_sn30": $('.Tbtn_sn30').prop('checked'),

            "Tbtn_sn31": $('.Tbtn_sn31').prop('checked'),
            "Tbtn_sn32": $('.Tbtn_sn32').prop('checked'),
            "Tbtn_sn33": $('.Tbtn_sn33').prop('checked'),
            "Tbtn_sn34": $('.Tbtn_sn34').prop('checked'),
            "Tbtn_sn35": $('.Tbtn_sn35').prop('checked'),
            "Tbtn_sn36": $('.Tbtn_sn36').prop('checked'),
            "Tbtn_sn37": $('.Tbtn_sn37').prop('checked'),
            "Tbtn_sn38": $('.Tbtn_sn38').prop('checked'),
            "Tbtn_sn39": $('.Tbtn_sn39').prop('checked'),
            "Tbtn_sn40": $('.Tbtn_sn40').prop('checked')
        };
        // console.log(snStatus);
        // var loading = verticalNoTitle();
        $.ajax({
            url: "config_php/get_all_unit.php",
            method: "post",
            data: {
                house_master: house_master
            },
            dataType: "json",
            success: function(res) {
                var unit = res.unit;
                var sn_name = res.sn_name;
                // console.log(sn_name);
                // alert(res["1"]);


                // ------------------------------
                $(".val_start").removeClass("input_err").addClass("from_to_df");
                $(".val_end").removeClass("input_err").addClass("from_to_df");
                $.ajax({
                    url: "config_php/get_all_chart.php",
                    method: "post",
                    data: {
                        house_master: house_master,
                        status: $("#status_btn_all").val(), //day week month
                        btn_status: snStatus, // array
                        sel_all_every: $("#sel_all_every").val(), // เลืแหเวลา 4 5 10 15 30 60
                        v_start: $('.val_start').val(),
                        v_end: $('.val_end').val()
                    },
                    dataType: "json",
                    success: function(res_chart) {
                        console.log(res_chart);
                        // return false;
                        am4core.useTheme(am4themes_animated);
                        // Ff (Sensor_mode[0] === "7" || Sensor_mode[0] === "6") {
                        //     var chartUnit_1 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                        // } else if (Sensor_mode[0] === "5" || Sensor_mode[0] === "4") {
                        //     var chartUnit_1 = "kLux";
                        // } else {
                        //     var chartUnit_1 = Unit_sn[1];
                        // }

                        var chart = am4core.create("all_chart", am4charts.XYChart);
                        chart.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                        chart.data = res_chart;

                        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
                        dateAxis.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                        dateAxis.tooltipDateFormat = "HH:mm, d MMM yyyy";

                        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

                        if (snStatus.Tbtn_sn1 === true) {
                            var series1 = chart.series.push(new am4charts.LineSeries());
                            series1.dataFields.valueY = "chart_1";
                            series1.dataFields.dateX = "timestamp";
                            series1.tooltipText = sn_name["1"] + " : {chart_1} (" + unit["1"] + ")";
                            series1.name = sn_name["1"];
                            series1.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn2 === true) {
                            var series2 = chart.series.push(new am4charts.LineSeries());
                            series2.dataFields.valueY = "chart_2";
                            series2.dataFields.dateX = "timestamp";
                            series2.tooltipText = sn_name["2"] + " : {chart_2} (" + unit["2"] + ")";
                            series2.name = sn_name["2"];
                            series2.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn3 === true) {
                            var series3 = chart.series.push(new am4charts.LineSeries());
                            series3.dataFields.valueY = "chart_3";
                            series3.dataFields.dateX = "timestamp";
                            series3.tooltipText = sn_name["3"] + " : {chart_3} (" + unit["3"] + ")";
                            series3.name = sn_name["3"];
                            series3.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn4 === true) {
                            var series4 = chart.series.push(new am4charts.LineSeries());
                            series4.dataFields.valueY = "chart_4";
                            series4.dataFields.dateX = "timestamp";
                            series4.tooltipText = sn_name["4"] + " : {chart_4} (" + unit["4"] + ")";
                            series4.name = sn_name["4"];
                            series4.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn5 === true) {
                            var series5 = chart.series.push(new am4charts.LineSeries());
                            series5.dataFields.valueY = "chart_5";
                            series5.dataFields.dateX = "timestamp";
                            series5.tooltipText = sn_name["5"] + " : {chart_5} (" + unit["5"] + ")";
                            series5.name = sn_name["5"];
                            series5.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn6 === true) {
                            var series6 = chart.series.push(new am4charts.LineSeries());
                            series6.dataFields.valueY = "chart_6";
                            series6.dataFields.dateX = "timestamp";
                            series6.tooltipText = sn_name["6"] + " : {chart_6} (" + unit["6"] + ")";
                            series6.name = sn_name["6"];
                            series6.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn7 === true) {
                            var series7 = chart.series.push(new am4charts.LineSeries());
                            series7.dataFields.valueY = "chart_7";
                            series7.dataFields.dateX = "timestamp";
                            series7.tooltipText = sn_name["7"] + " : {chart_7} (" + unit["7"] + ")";
                            series7.name = sn_name["7"];
                            series7.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn8 === true) {
                            var series8 = chart.series.push(new am4charts.LineSeries());
                            series8.dataFields.valueY = "chart_8";
                            series8.dataFields.dateX = "timestamp";
                            series8.tooltipText = sn_name["8"] + " : {chart_8} (" + unit["8"] + ")";
                            series8.name = sn_name["8"];
                            series8.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn9 === true) {
                            var series9 = chart.series.push(new am4charts.LineSeries());
                            series9.dataFields.valueY = "chart_9";
                            series9.dataFields.dateX = "timestamp";
                            series9.tooltipText = sn_name["9"] + " : {chart_9} (" + unit["9"] + ")";
                            series9.name = sn_name["9"];
                            series9.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn10 === true) {
                            var series10 = chart.series.push(new am4charts.LineSeries());
                            series10.dataFields.valueY = "chart_10";
                            series10.dataFields.dateX = "timestamp";
                            series10.tooltipText = sn_name["10"] + " : {chart_10} (" + unit["10"] + ")";
                            series10.name = sn_name["10"];
                            series10.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn11 === true) {
                            var series11 = chart.series.push(new am4charts.LineSeries());
                            series11.dataFields.valueY = "chart_11";
                            series11.dataFields.dateX = "timestamp";
                            series11.tooltipText = sn_name["11"] + " : {chart_11} (" + unit["11"] + ")";
                            series11.name = sn_name["11"];
                            series11.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn12 === true) {
                            var series12 = chart.series.push(new am4charts.LineSeries());
                            series12.dataFields.valueY = "chart_12";
                            series12.dataFields.dateX = "timestamp";
                            series12.tooltipText = sn_name["12"] + " : {chart_12} (" + unit["12"] + ")";
                            series12.name = sn_name["12"];
                            series12.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn13 === true) {
                            var series13 = chart.series.push(new am4charts.LineSeries());
                            series13.dataFields.valueY = "chart_13";
                            series13.dataFields.dateX = "timestamp";
                            series13.tooltipText = sn_name["13"] + " : {chart_13} (" + unit["13"] + ")";
                            series13.name = sn_name["13"];
                            series13.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn14 === true) {
                            var series14 = chart.series.push(new am4charts.LineSeries());
                            series14.dataFields.valueY = "chart_14";
                            series14.dataFields.dateX = "timestamp";
                            series14.tooltipText =  sn_name["14"] + " : {chart_14} (" + unit["14"] + ")";
                            series14.name = sn_name["14"];
                            series14.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn15 === true) {
                            var series15 = chart.series.push(new am4charts.LineSeries());
                            series15.dataFields.valueY = "chart_15";
                            series15.dataFields.dateX = "timestamp";
                            series15.tooltipText = sn_name["15"] + " : {chart_15} (" + unit["15"] + ")";
                            series15.name = sn_name["15"];
                            series15.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn16 === true) {
                            var series16 = chart.series.push(new am4charts.LineSeries());
                            series16.dataFields.valueY = "chart_16";
                            series16.dataFields.dateX = "timestamp";
                            series16.tooltipText = sn_name["16"] + " : {chart_16} (" + unit["16"] + ")";
                            series16.name = sn_name["16"];
                            series16.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn17 === true) {
                            var series17 = chart.series.push(new am4charts.LineSeries());
                            series17.dataFields.valueY = "chart_17";
                            series17.dataFields.dateX = "timestamp";
                            series17.tooltipText = sn_name["17"] + " : {chart_17} (" + unit["17"] + ")";
                            series17.name = sn_name["17"];
                            series17.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn18 === true) {
                            var series18 = chart.series.push(new am4charts.LineSeries());
                            series18.dataFields.valueY = "chart_18";
                            series18.dataFields.dateX = "timestamp";
                            series18.tooltipText = sn_name["18"] + " : {chart_18} (" + unit["18"] + ")";
                            series18.name = sn_name["18"];
                            series18.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn19 === true) {
                            var series19 = chart.series.push(new am4charts.LineSeries());
                            series19.dataFields.valueY = "chart_19";
                            series19.dataFields.dateX = "timestamp";
                            series19.tooltipText = sn_name["19"] + " : {chart_19} (" + unit["19"] + ")";
                            series19.name = sn_name["19"];
                            series19.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn20 === true) {
                            var series20 = chart.series.push(new am4charts.LineSeries());
                            series20.dataFields.valueY = "chart_20";
                            series20.dataFields.dateX = "timestamp";
                            series20.tooltipText = sn_name["20"] + " : {chart_20} (" + unit["20"] + ")";
                            series20.name = sn_name["20"];
                            series20.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn21 === true) {
                            var series21 = chart.series.push(new am4charts.LineSeries());
                            series21.dataFields.valueY = "chart_21";
                            series21.dataFields.dateX = "timestamp";
                            series21.tooltipText = sn_name["21"] + " : {chart_21} (" + unit["21"] + ")";
                            series21.name = sn_name["21"];
                            series21.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn22 === true) {
                            var series22 = chart.series.push(new am4charts.LineSeries());
                            series22.dataFields.valueY = "chart_22";
                            series22.dataFields.dateX = "timestamp";
                            series22.tooltipText = sn_name["22"] + " : {chart_22} (" + unit["22"] + ")";
                            series22.name = sn_name["22"];
                            series22.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn23 === true) {
                            var series23 = chart.series.push(new am4charts.LineSeries());
                            series23.dataFields.valueY = "chart_23";
                            series23.dataFields.dateX = "timestamp";
                            series23.tooltipText = sn_name["23"] + " : {chart_23} (" + unit["23"] + ")";
                            series23.name = sn_name["23"];
                            series23.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn24 === true) {
                            var series24 = chart.series.push(new am4charts.LineSeries());
                            series24.dataFields.valueY = "chart_24";
                            series24.dataFields.dateX = "timestamp";
                            series24.tooltipText = sn_name["24"] + " : {chart_24} (" + unit["24"] + ")";
                            series24.name = sn_name["24"];
                            series24.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn25 === true) {
                            var series25 = chart.series.push(new am4charts.LineSeries());
                            series25.dataFields.valueY = "chart_25";
                            series25.dataFields.dateX = "timestamp";
                            series25.tooltipText = sn_name["25"] + " : {chart_25} (" + unit["25"] + ")";
                            series25.name = sn_name["25"];
                            series25.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn26 === true) {
                            var series26 = chart.series.push(new am4charts.LineSeries());
                            series26.dataFields.valueY = "chart_26";
                            series26.dataFields.dateX = "timestamp";
                            series26.tooltipText = sn_name["26"] + " : {chart_26} (" + unit["26"] + ")";
                            series26.name = sn_name["26"];
                            series26.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn27 === true) {
                            var series27 = chart.series.push(new am4charts.LineSeries());
                            series27.dataFields.valueY = "chart_27";
                            series27.dataFields.dateX = "timestamp";
                            series27.tooltipText = sn_name["27"] + " : {chart_27} (" + unit["27"] + ")";
                            series27.name = sn_name["27"];
                            series27.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn28 === true) {
                            var series28 = chart.series.push(new am4charts.LineSeries());
                            series28.dataFields.valueY = "chart_28";
                            series28.dataFields.dateX = "timestamp";
                            series28.tooltipText = sn_name["28"] + " : {chart_28} (" + unit["28"] + ")";
                            series28.name = sn_name["28"];
                            series28.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn29 === true) {
                            var series29 = chart.series.push(new am4charts.LineSeries());
                            series29.dataFields.valueY = "chart_29";
                            series29.dataFields.dateX = "timestamp";
                            series29.tooltipText = sn_name["29"] + " : {chart_29} (" + unit["29"] + ")";
                            series29.name = sn_name["29"];
                            series29.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn30 === true) {
                            var series30 = chart.series.push(new am4charts.LineSeries());
                            series30.dataFields.valueY = "chart_30";
                            series30.dataFields.dateX = "timestamp";
                            series30.tooltipText = sn_name["30"] + " : {chart_30} (" + unit["30"] + ")";
                            series30.name = sn_name["30"];
                            series30.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn31 === true) {
                            var series31 = chart.series.push(new am4charts.LineSeries());
                            series31.dataFields.valueY = "chart_31";
                            series31.dataFields.dateX = "timestamp";
                            series31.tooltipText = sn_name["31"] + " : {chart_31} (" + unit["31"] + ")";
                            series31.name = sn_name["31"];
                            series31.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn32 === true) {
                            var series32 = chart.series.push(new am4charts.LineSeries());
                            series32.dataFields.valueY = "chart_32";
                            series32.dataFields.dateX = "timestamp";
                            series32.tooltipText = sn_name["32"] + " : {chart_32} (" + unit["32"] + ")";
                            series32.name = sn_name["32"];
                            series32.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn33 === true) {
                            var series33 = chart.series.push(new am4charts.LineSeries());
                            series33.dataFields.valueY = "chart_33";
                            series33.dataFields.dateX = "timestamp";
                            series33.tooltipText = sn_name["33"] + " : {chart_33} (" + unit["33"] + ")";
                            series33.name = sn_name["33"];
                            series33.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn34 === true) {
                            var series34 = chart.series.push(new am4charts.LineSeries());
                            series34.dataFields.valueY = "chart_34";
                            series34.dataFields.dateX = "timestamp";
                            series34.tooltipText = sn_name["34"] + " : {chart_34} (" + unit["34"] + ")";
                            series34.name = sn_name["34"];
                            series34.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn35 === true) {
                            var series35 = chart.series.push(new am4charts.LineSeries());
                            series35.dataFields.valueY = "chart_35";
                            series35.dataFields.dateX = "timestamp";
                            series35.tooltipText = sn_name["35"] + " : {chart_35} (" + unit["35"] + ")";
                            series35.name = sn_name["35"];
                            series35.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn36 === true) {
                            var series36 = chart.series.push(new am4charts.LineSeries());
                            series36.dataFields.valueY = "chart_36";
                            series36.dataFields.dateX = "timestamp";
                            series36.tooltipText = sn_name["36"] + " : {chart_36} (" + unit["36"] + ")";
                            series36.name = sn_name["36"];
                            series36.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn37 === true) {
                            var series37 = chart.series.push(new am4charts.LineSeries());
                            series37.dataFields.valueY = "chart_37";
                            series37.dataFields.dateX = "timestamp";
                            series37.tooltipText = sn_name["37"] + " : {chart_37} (" + unit["37"] + ")";
                            series37.name = sn_name["37"];
                            series37.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn38 === true) {
                            var series38 = chart.series.push(new am4charts.LineSeries());
                            series38.dataFields.valueY = "chart_38";
                            series38.dataFields.dateX = "timestamp";
                            series38.tooltipText = sn_name["38"] + " : {chart_38} (" + unit["38"] + ")";
                            series38.name = sn_name["38"];
                            series38.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn39 === true) {
                            var series39 = chart.series.push(new am4charts.LineSeries());
                            series39.dataFields.valueY = "chart_39";
                            series39.dataFields.dateX = "timestamp";
                            series39.tooltipText = sn_name["39"] + " : {chart_39} (" + unit["39"] + ")";
                            series39.name = sn_name["39"];
                            series39.strokeWidth = 2;
                        }
                        if (snStatus.Tbtn_sn40 === true) {
                            var series40 = chart.series.push(new am4charts.LineSeries());
                            series40.dataFields.valueY = "chart_40";
                            series40.dataFields.dateX = "timestamp";
                            series40.tooltipText = sn_name["40"] + " : {chart_40} (" + unit["40"] + ")";
                            series40.name = sn_name["40"];
                            series40.strokeWidth = 2;
                        }

                        chart.cursor = new am4charts.XYCursor();
                        // chart.cursor.snapToSeries = series;
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

                        // Add legend
                        chart.legend = new am4charts.Legend();
                        chart.legend.itemContainers.template.events.on("over", function(event) {
                            var segments = event.target.dataItem.dataContext.segments;
                            segments.each(function(segment) {
                                segment.isHover = true;
                            })
                        })

                        chart.legend.itemContainers.template.events.on("out", function(event) {
                            var segments = event.target.dataItem.dataContext.segments;
                            segments.each(function(segment) {
                                segment.isHover = false;
                            })
                        })
                        if ($(".icon_all_chart_mod").hasClass("active") === true) {
                            // $("#status_btn_all").val("");
                            if (loading !== "") {
                                loadingOut(loading);
                            }
                        }
                    }
                });

            }
        });
    }
</script>