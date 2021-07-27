// alert(house_master);
// return false;
$.ajax({
    url: "config_php/get_sesion.php",
    method: "post",
    data: { house_master: house_master },
    dataType: "json",
    success: function(res) {
        console.log(res);
        var login_user = res.username;
        $("#title_modal").html("Control Status " + res.house_name);
        $(".table_modalName").html("Control Report " + res.house_name);
        if (res.house_icon_map === "") {
            $(".memu_map").hide();
        } else {
            $(".memu_map").show().html('<a class="waves-effect waves-dark" href="dist/images/img_map/' + res.house_icon_map + '" data-effect="mfp-move-horizontal"><i class="icon-map-marker"></i><span class="hide-menu">Sensor map</span></a>');
        }
        // alert(res.house_icon_map);
        if (res.cont === "1") { // site เดียว
            $(".dash_bar").html(res.house_name);
            $(".h4_modalTB").html("<B>Table " + res.house_name + "</B>");
            // -----------------------------
            // $(".load_site").load("load_page/load_site.php");
            $(".site_name").html(res.site_name);

            $(".memu_select_site").hide();
            $(".memu_dashboard").show().addClass("active");
            $(".load_site").hide();
            $(".load_status").show();
            // $(".load_meter").hide();
            $(".date").show();
            $(".time").show();
            if (house_master === "") {
                location.hash = "#" + res.house_master;
                location.reload();
                return false;
            } else {
                $.ajax({
                    url: "load_page/dashboard.php",
                    method: "post",
                    data: { house_master: house_master },
                    // dataType: "json",
                    success: function(res_dash) {
                        $(".load_status").html(res_dash);
                    }
                });
            }
        } else { // หลาย site
            $(".dash_bar").html(res.site_name + " / " + res.house_name);
            $(".h4_modalTB").html("<B>Table " + res.house_name + "</B>");
            // -------------------------------------------------------------------
            $(".load_site").load("load_page/load_site.php");
            $(".site_name").html(res.site_name);
            if (house_master === "") {
                // console.log("stab");
                $(".memu_select_site").addClass("active");
                $(".memu_dashboard").hide();
                $('.memu_report').hide();
                // $(".dash_chart").hide();
                // $(".dash_table").hide();
                // $(".memu_control").hide();
                // $(".memu_report").hide();
                // $(".memu_map").hide();
                // $(".memu_meter").hide();
                $(".dash_bar").html('Select Site or House');
                $(".load_site").show();
                $(".load_status").hide();
                // $(".load_meter").hide();
                // $(".load_status").css({
                //     "color": "#00c292"
                // });
            } else {
                // console.log("stab");
                $(".memu_select_site").removeClass("active")
                $(".memu_dashboard").show().addClass("active");
                // $(".dash_chart").show();
                // $(".dash_table").show();
                // $(".memu_control").show();
                // $(".memu_report").show();
                // $(".memu_map").show();
                // $(".memu_meter").show();
                $(".load_site").hide();
                $(".load_status").show();
                // $(".load_meter").hide();
                $(".date").show();
                $(".time").show();

                $.ajax({
                    url: "load_page/dashboard.php",
                    method: "post",
                    data: { house_master: house_master },
                    // dataType: "json",
                    success: function(res_dash) {
                        $(".load_status").html(res_dash);
                    }
                });
            }
        }
        if (house_master === "") {
            $(".memu_control").hide();
            $(".memu_control_report").hide();
            $(".memu_map").hide();
            $(".memu_meter").hide();
        } else {
            $.ajax({
                url: 'config_php/get_dash.php',
                method: "post",
                data: { house_master: house_master },
                dataType: "json",
                success: function(get_dash) {
                    var Status = get_dash.Status;
                    var Name = get_dash.Name;
                    var Sensor_mode = get_dash.Sensor_mode;
                    var Sncanel = get_dash.Sncanel;
                    var Img_sn = get_dash.img_sn;
                    var Unit_sn = get_dash.unit_sn;
                    var Contstatus = get_dash.Controlstatus;
                    var Contname = get_dash.Controlname;
                    var Controlimg = get_dash.Controlimg;
                    // var Status_meter = get_dash.status_meter;
                    console.log(get_dash);
                    // console.log(Status_meter);
                    // return false;
                    // check_control_memu
                    if (Contstatus === 0) {
                        $(".memu_control").hide();
                        $(".memu_control_report").hide();
                    } else {
                        $(".memu_control").show();
                        $(".memu_control_report").show();
                    }
                    if (get_dash.show_meter === 0) {
                        $(".memu_meter").hide();
                    } else {
                        $(".memu_meter").show();
                    }

                    $(".memu_dashboard").click(function() {
                        $(".memu_select_site").removeClass("active");
                        $(this).addClass("active");

                        $('.memu_report').show();
                        $(".date").show();
                        $(".time").show();
                        $(".load_site").hide();
                        // $(".load_meter").hide();
                        if (res.cont === "1") {
                            $(".dash_bar").html(res.site_name);
                            $(".h4_modalTB").html("<B>Table " + res.site_name + "</B>");
                        } else {
                            $(".dash_bar").html(res.site_name + " / " + res.house_name);
                            $(".h4_modalTB").html("<B>Table " + res.house_name + "</B>");
                        }

                        if (Contstatus === 0) {
                            $(".memu_control").hide();
                            $(".memu_control_report").hide();
                        } else {
                            $(".memu_control").show();
                            $(".memu_control_report").show();
                        }
                    });


                    var loading = verticalNoTitle();
                    $.ajax({
                        url: 'config_php/chart_dash_realtime.php',
                        method: "post",
                        data: { house_master: house_master },
                        dataType: "json",
                        success: function(res_chart) {
                            console.log(res_chart);
                            am4core.ready(function() {
                                am4core.useTheme(am4themes_animated);

                                // ----------------------------------------------------------------------
                                // Global variables
                                var client = null;
                                // These are configs
                                var hostname = "203.150.37.144"; //'103.2.115.15'; // 203.150.37.144   decccloud.com
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
                                    // if (Contstatus !== 0) {

                                    if (house_master !== "KMUMT001") {
                                        client.subscribe(house_master + "/1/control/json_control_filter", options);
                                    } else {
                                        client.subscribe(house_master + "/1/control/mode", options);
                                        client.subscribe(house_master + "/1/control/control_st_1", options);
                                        client.subscribe(house_master + "/1/control/control_st_2", options);
                                        client.subscribe(house_master + "/1/control/control_st_3", options);
                                        client.subscribe(house_master + "/1/control/control_st_4", options);
                                        client.subscribe(house_master + "/1/control/control_st_5", options);
                                    }
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
                                        console.log(parseJSON);
                                        if (house_master === "KMUMT001") {
                                            var p_json = parseJSON['data_update']['data'][0];
                                            var data_array = p_json['data'];
                                            // console.log(parseJSON);
                                            console.log(p_json);
                                            // console.log(loading);
                                            // -------------------------------------------------------------
                                            var time_t = p_json['time'];
                                            var ntime = time_t.substring(0, 5);
                                            $(".date").html(p_json['date']);
                                            $(".time").html(ntime);
                                            // --------------------------------------substring(1, 4)
                                            // console.log(Sncanel.sncanel_1_1.substring(7));
                                            // $("#time_stamp").html("Data update : "+time_stmap);
                                            // return false;
                                        } else {
                                            // console.log(loading);
                                            // -------------------------------------------------------------
                                            var time_t = parseJSON['time'];
                                            var ntime = time_t.substring(0, 5);
                                            $(".date").html(parseJSON['date']);
                                            $(".time").html(ntime);
                                            // var data_array = parseJSON['data_update']['data'][0]['data'];
                                            var data_array = parseJSON['data'];
                                        }
                                        // console.log(parseJSON);
                                        show_dash(dstatus = Status.dashstatus_1_1, sn_img = Img_sn[1], sn_Tunit = Unit_sn[1], canelsn = Sncanel.sncanel_1_1, canel = "1", snmode = Sensor_mode.statussn_1_1);
                                        show_dash(dstatus = Status.dashstatus_1_2, sn_img = Img_sn[2], sn_Tunit = Unit_sn[2], canelsn = Sncanel.sncanel_1_2, canel = "2", snmode = Sensor_mode.statussn_1_2);
                                        show_dash(dstatus = Status.dashstatus_1_3, sn_img = Img_sn[3], sn_Tunit = Unit_sn[3], canelsn = Sncanel.sncanel_1_3, canel = "3", snmode = Sensor_mode.statussn_1_3);
                                        show_dash(dstatus = Status.dashstatus_1_4, sn_img = Img_sn[4], sn_Tunit = Unit_sn[4], canelsn = Sncanel.sncanel_1_4, canel = "4", snmode = Sensor_mode.statussn_1_4);
                                        show_dash(dstatus = Status.dashstatus_2_1, sn_img = Img_sn[5], sn_Tunit = Unit_sn[5], canelsn = Sncanel.sncanel_2_1, canel = "5", snmode = Sensor_mode.statussn_2_1);
                                        show_dash(dstatus = Status.dashstatus_2_2, sn_img = Img_sn[6], sn_Tunit = Unit_sn[6], canelsn = Sncanel.sncanel_2_2, canel = "6", snmode = Sensor_mode.statussn_2_2);
                                        show_dash(dstatus = Status.dashstatus_2_3, sn_img = Img_sn[7], sn_Tunit = Unit_sn[7], canelsn = Sncanel.sncanel_2_3, canel = "7", snmode = Sensor_mode.statussn_2_3);
                                        show_dash(dstatus = Status.dashstatus_2_4, sn_img = Img_sn[8], sn_Tunit = Unit_sn[8], canelsn = Sncanel.sncanel_2_4, canel = "8", snmode = Sensor_mode.statussn_2_4);
                                        show_dash(dstatus = Status.dashstatus_3_1, sn_img = Img_sn[9], sn_Tunit = Unit_sn[9], canelsn = Sncanel.sncanel_3_1, canel = "9", snmode = Sensor_mode.statussn_3_1);
                                        show_dash(dstatus = Status.dashstatus_3_2, sn_img = Img_sn[10], sn_Tunit = Unit_sn[10], canelsn = Sncanel.sncanel_3_2, canel = "10", snmode = Sensor_mode.statussn_3_2);
                                        show_dash(dstatus = Status.dashstatus_3_3, sn_img = Img_sn[11], sn_Tunit = Unit_sn[11], canelsn = Sncanel.sncanel_3_3, canel = "11", snmode = Sensor_mode.statussn_3_3);
                                        show_dash(dstatus = Status.dashstatus_3_4, sn_img = Img_sn[12], sn_Tunit = Unit_sn[12], canelsn = Sncanel.sncanel_3_4, canel = "12", snmode = Sensor_mode.statussn_3_4);
                                        show_dash(dstatus = Status.dashstatus_4_1, sn_img = Img_sn[13], sn_Tunit = Unit_sn[13], canelsn = Sncanel.sncanel_4_1, canel = "13", snmode = Sensor_mode.statussn_4_1);
                                        show_dash(dstatus = Status.dashstatus_4_2, sn_img = Img_sn[14], sn_Tunit = Unit_sn[14], canelsn = Sncanel.sncanel_4_2, canel = "14", snmode = Sensor_mode.statussn_4_2);
                                        show_dash(dstatus = Status.dashstatus_4_3, sn_img = Img_sn[15], sn_Tunit = Unit_sn[15], canelsn = Sncanel.sncanel_4_3, canel = "15", snmode = Sensor_mode.statussn_4_3);
                                        show_dash(dstatus = Status.dashstatus_4_4, sn_img = Img_sn[16], sn_Tunit = Unit_sn[16], canelsn = Sncanel.sncanel_4_4, canel = "16", snmode = Sensor_mode.statussn_4_4);
                                        show_dash(dstatus = Status.dashstatus_5_1, sn_img = Img_sn[17], sn_Tunit = Unit_sn[17], canelsn = Sncanel.sncanel_5_1, canel = "17", snmode = Sensor_mode.statussn_5_1);
                                        show_dash(dstatus = Status.dashstatus_5_2, sn_img = Img_sn[18], sn_Tunit = Unit_sn[18], canelsn = Sncanel.sncanel_5_2, canel = "18", snmode = Sensor_mode.statussn_5_2);
                                        show_dash(dstatus = Status.dashstatus_5_3, sn_img = Img_sn[19], sn_Tunit = Unit_sn[19], canelsn = Sncanel.sncanel_5_3, canel = "19", snmode = Sensor_mode.statussn_5_3);
                                        show_dash(dstatus = Status.dashstatus_5_4, sn_img = Img_sn[20], sn_Tunit = Unit_sn[20], canelsn = Sncanel.sncanel_5_4, canel = "20", snmode = Sensor_mode.statussn_5_4);
                                        show_dash(dstatus = Status.dashstatus_6_1, sn_img = Img_sn[21], sn_Tunit = Unit_sn[21], canelsn = Sncanel.sncanel_6_1, canel = "21", snmode = Sensor_mode.statussn_6_1);
                                        show_dash(dstatus = Status.dashstatus_6_2, sn_img = Img_sn[22], sn_Tunit = Unit_sn[22], canelsn = Sncanel.sncanel_6_2, canel = "22", snmode = Sensor_mode.statussn_6_2);
                                        show_dash(dstatus = Status.dashstatus_6_3, sn_img = Img_sn[23], sn_Tunit = Unit_sn[23], canelsn = Sncanel.sncanel_6_3, canel = "23", snmode = Sensor_mode.statussn_6_3);
                                        show_dash(dstatus = Status.dashstatus_6_4, sn_img = Img_sn[24], sn_Tunit = Unit_sn[24], canelsn = Sncanel.sncanel_6_4, canel = "24", snmode = Sensor_mode.statussn_6_4);
                                        show_dash(dstatus = Status.dashstatus_7_1, sn_img = Img_sn[25], sn_Tunit = Unit_sn[25], canelsn = Sncanel.sncanel_7_1, canel = "25", snmode = Sensor_mode.statussn_7_1);
                                        show_dash(dstatus = Status.dashstatus_7_2, sn_img = Img_sn[26], sn_Tunit = Unit_sn[26], canelsn = Sncanel.sncanel_7_2, canel = "26", snmode = Sensor_mode.statussn_7_2);
                                        show_dash(dstatus = Status.dashstatus_7_3, sn_img = Img_sn[27], sn_Tunit = Unit_sn[27], canelsn = Sncanel.sncanel_7_3, canel = "27", snmode = Sensor_mode.statussn_7_3);
                                        show_dash(dstatus = Status.dashstatus_7_4, sn_img = Img_sn[28], sn_Tunit = Unit_sn[28], canelsn = Sncanel.sncanel_7_4, canel = "28", snmode = Sensor_mode.statussn_7_4);
                                        show_dash(dstatus = Status.dashstatus_8_1, sn_img = Img_sn[29], sn_Tunit = Unit_sn[29], canelsn = Sncanel.sncanel_8_1, canel = "29", snmode = Sensor_mode.statussn_8_1);
                                        show_dash(dstatus = Status.dashstatus_8_2, sn_img = Img_sn[30], sn_Tunit = Unit_sn[30], canelsn = Sncanel.sncanel_8_2, canel = "30", snmode = Sensor_mode.statussn_8_2);
                                        show_dash(dstatus = Status.dashstatus_8_3, sn_img = Img_sn[31], sn_Tunit = Unit_sn[31], canelsn = Sncanel.sncanel_8_3, canel = "31", snmode = Sensor_mode.statussn_8_3);
                                        show_dash(dstatus = Status.dashstatus_8_4, sn_img = Img_sn[32], sn_Tunit = Unit_sn[32], canelsn = Sncanel.sncanel_8_4, canel = "32", snmode = Sensor_mode.statussn_8_4);
                                        show_dash(dstatus = Status.dashstatus_9_1, sn_img = Img_sn[33], sn_Tunit = Unit_sn[33], canelsn = Sncanel.sncanel_9_1, canel = "33", snmode = Sensor_mode.statussn_9_1);
                                        show_dash(dstatus = Status.dashstatus_9_2, sn_img = Img_sn[34], sn_Tunit = Unit_sn[34], canelsn = Sncanel.sncanel_9_2, canel = "34", snmode = Sensor_mode.statussn_9_2);
                                        show_dash(dstatus = Status.dashstatus_9_3, sn_img = Img_sn[35], sn_Tunit = Unit_sn[35], canelsn = Sncanel.sncanel_9_3, canel = "35", snmode = Sensor_mode.statussn_9_3);
                                        show_dash(dstatus = Status.dashstatus_9_4, sn_img = Img_sn[36], sn_Tunit = Unit_sn[36], canelsn = Sncanel.sncanel_9_4, canel = "36", snmode = Sensor_mode.statussn_9_4);
                                        show_dash(dstatus = Status.dashstatus_10_1, sn_img = Img_sn[37], sn_Tunit = Unit_sn[37], canelsn = Sncanel.sncanel_10_1, canel = "37", snmode = Sensor_mode.statussn_10_1);
                                        show_dash(dstatus = Status.dashstatus_10_2, sn_img = Img_sn[38], sn_Tunit = Unit_sn[38], canelsn = Sncanel.sncanel_10_2, canel = "38", snmode = Sensor_mode.statussn_10_2);
                                        show_dash(dstatus = Status.dashstatus_10_3, sn_img = Img_sn[39], sn_Tunit = Unit_sn[39], canelsn = Sncanel.sncanel_10_3, canel = "39", snmode = Sensor_mode.statussn_10_3);
                                        show_dash(dstatus = Status.dashstatus_10_4, sn_img = Img_sn[40], sn_Tunit = Unit_sn[40], canelsn = Sncanel.sncanel_10_4, canel = "40", snmode = Sensor_mode.statussn_10_4);

                                        function show_dash(dstatus, sn_img, sn_Tunit, canelsn, canel, snmode) {
                                            if (dstatus === "1") {
                                                // $(".dash_" + canel).show();
                                                // $(".title_" + canel).html(title);
                                                $(".img_" + canel).attr("src", "dist/images/Sensor/" + sn_img);
                                                if (house_master === "KMUMT001") {
                                                    var data_dash = data_array["data_st" + canelsn.substring(7)];
                                                } else {
                                                    var data_dash = data_array[canelsn];
                                                }
                                                // if (sn_Tunit === "1") { var sn_unit = "℃"; } else { var sn_unit = sn_Tunit; }
                                                if (data_dash >= 1000) {
                                                    var new_data = (data_dash / 1000).toFixed(1);
                                                    var unit = "k" + sn_Tunit;
                                                } else if (data_dash >= 1000000) {
                                                    var new_data = (data_dash / 1000).toFixed(1);
                                                    var unit = "M" + sn_Tunit;
                                                } else {
                                                    var new_data = (data_dash * 1).toFixed(1);
                                                    var unit = sn_Tunit;
                                                }
                                                var new_data_c = (data_dash / 54).toFixed(1);
                                                // console.log(new_data);

                                                if (snmode === "7") {
                                                    $(".Data_1_" + canel).html((data_dash / 1000).toFixed(1) + " kLux");
                                                    $(".Data_2_" + canel).html(new_data_c + " µmol m<sup>-2</sup>s<sup>-1</sup>");
                                                } else if (snmode === "6") {
                                                    $(".Data_1_" + canel).html(new_data_c);
                                                    $(".Data_2_" + canel).html(" µmol m<sup>-2</sup>s<sup>-1</sup>");
                                                } else if (snmode === "5") {
                                                    $(".Data_1_" + canel).html((data_dash / 1000).toFixed(1) + " kLux");
                                                    $(".Data_2_" + canel).html(new_data_c + " µmol m<sup>-2</sup>s<sup>-1</sup>");
                                                } else if (snmode === "4") {
                                                    $(".Data_1_" + canel).html(new_data + " " + unit);
                                                    $(".Data_2_" + canel).hide();
                                                } else {
                                                    $(".Data_1_" + canel).html(new_data + " " + unit);
                                                    $(".Data_2_" + canel).hide();
                                                }
                                            }
                                            //  else {
                                            //     $(".dash_" + canel).hide();
                                            // }
                                        }

                                        if (res_chart !== "null") {
                                            if (house_master === "KMUMT001") {
                                                if (Status[0] === "1") {
                                                    // if (Sensor_mode[0] === "7") {
                                                    //     var new_data_chart_1 = (data_array["data_st" + Sncanel[0].substring(7)] / 54).toFixed(1);
                                                    // } else if (Sensor_mode[0] === "6") {
                                                    //     var new_data_chart_1 = (data_array["data_st" + Sncanel[0].substring(7)] / 54).toFixed(1);
                                                    // } else if (Sensor_mode[0] === "5") {
                                                    //     var new_data_chart_1 = (data_array["data_st" + Sncanel[0].substring(7)] / 1000).toFixed(1);
                                                    // } else if (Sensor_mode[0] === "4") {
                                                    //     var new_data_chart_1 = (data_array["data_st" + Sncanel[0].substring(7)] / 1000).toFixed(1);
                                                    // } else {
                                                    var new_data_chart_1 = (data_array["data_st" + Sncanel[0].substring(7)] * 1).toFixed(1);
                                                    // }
                                                    chart_1.addData({
                                                        timestamp: p_json['date_time'],
                                                        chart_1: new_data_chart_1
                                                    });
                                                }
                                                if (Status[1] === "1") {
                                                    // if (Sensor_mode[1] === "7") {
                                                    //     var new_data_chart_2 = (data_array["data_st" + Sncanel[1].substring(7)] / 54).toFixed(1);
                                                    // } else if (Sensor_mode[1] === "6") {
                                                    //     var new_data_chart_2 = (data_array["data_st" + Sncanel[1].substring(7)] / 54).toFixed(1);
                                                    // } else if (Sensor_mode[1] === "5") {
                                                    //     var new_data_chart_2 = (data_array["data_st" + Sncanel[1].substring(7)] / 1000).toFixed(1);
                                                    // } else if (Sensor_mode[1] === "4") {
                                                    //     var new_data_chart_2 = (data_array["data_st" + Sncanel[1].substring(7)] / 1000).toFixed(1);
                                                    // } else {
                                                    var new_data_chart_2 = (data_array["data_st" + Sncanel[1].substring(7)] * 1).toFixed(1);
                                                    // }
                                                    chart_2.addData({
                                                        timestamp: p_json['date_time'],
                                                        chart_2: new_data_chart_2
                                                    });
                                                }
                                                if (Status[2] === "1") {
                                                    // if (Sensor_mode[2] === "7") {
                                                    //     var new_data_chart_3 = (data_array["data_st" + Sncanel[2].substring(7)] / 54).toFixed(1);
                                                    // } else if (Sensor_mode[2] === "6") {
                                                    //     var new_data_chart_3 = (data_array["data_st" + Sncanel[2].substring(7)] / 54).toFixed(1);
                                                    // } else if (Sensor_mode[2] === "5") {
                                                    //     var new_data_chart_3 = (data_array["data_st" + Sncanel[2].substring(7)] / 1000).toFixed(1);
                                                    // } else if (Sensor_mode[2] === "4") {
                                                    //     var new_data_chart_3 = (data_array["data_st" + Sncanel[2].substring(7)] / 1000).toFixed(1);
                                                    // } else {
                                                    var new_data_chart_3 = (data_array["data_st" + Sncanel[2].substring(7)] * 1).toFixed(1);
                                                    console.log("new_data_chart_3 : " + new_data_chart_3);
                                                    // }
                                                    chart_3.addData({
                                                        timestamp: p_json['date_time'],
                                                        chart_3: new_data_chart_3
                                                    });
                                                }
                                                if (Status[3] === "1") {
                                                    // if (Sensor_mode[3] === "7") {
                                                    //     var new_data_chart_4 = (data_array["data_st" + Sncanel[3].substring(7)] / 54).toFixed(1);
                                                    // } else if (Sensor_mode[3] === "6") {
                                                    //     var new_data_chart_4 = (data_array["data_st" + Sncanel[3].substring(7)] / 54).toFixed(1);
                                                    // } else if (Sensor_mode[3] === "5") {
                                                    //     var new_data_chart_4 = (data_array["data_st" + Sncanel[3].substring(7)] / 1000).toFixed(1);
                                                    // } else if (Sensor_mode[3] === "4") {
                                                    //     var new_data_chart_4 = (data_array["data_st" + Sncanel[3].substring(7)] / 1000).toFixed(1);
                                                    // } else {
                                                    var new_data_chart_4 = (data_array["data_st" + Sncanel[3].substring(7)] * 1).toFixed(1);
                                                    // }
                                                    chart_4.addData({
                                                        timestamp: p_json['date_time'],
                                                        chart_4: new_data_chart_4
                                                    });
                                                }
                                                if (Status[4] === "1") {
                                                    // if (Sensor_mode[4] === "7") {
                                                    //     var new_data_chart_5 = (data_array["data_st" + Sncanel[4].substring(7)] / 54).toFixed(1);
                                                    // } else if (Sensor_mode[4] === "6") {
                                                    //     var new_data_chart_5 = (data_array["data_st" + Sncanel[4].substring(7)] / 54).toFixed(1);
                                                    // } else if (Sensor_mode[4] === "5") {
                                                    //     var new_data_chart_5 = (data_array["data_st" + Sncanel[4].substring(7)] / 1000).toFixed(1);
                                                    // } else if (Sensor_mode[4] === "4") {
                                                    //     var new_data_chart_5 = (data_array["data_st" + Sncanel[4].substring(7)] / 1000).toFixed(1);
                                                    // } else {
                                                    var new_data_chart_5 = (data_array["data_st" + Sncanel[4].substring(7)] * 1).toFixed(1);
                                                    // }
                                                    chart_5.addData({
                                                        timestamp: p_json['date_time'],
                                                        chart_5: new_data_chart_5
                                                    });
                                                }
                                                if (Status[5] === "1") {
                                                    // if (Sensor_mode[5] === "7") {
                                                    //     var new_data_chart_6 = (data_array["data_st" + Sncanel[5].substring(7)] / 54).toFixed(1);
                                                    // } else if (Sensor_mode[5] === "6") {
                                                    //     var new_data_chart_6 = (data_array["data_st" + Sncanel[5].substring(7)] / 54).toFixed(1);
                                                    // } else if (Sensor_mode[5] === "5") {
                                                    //     var new_data_chart_6 = (data_array["data_st" + Sncanel[5].substring(7)] / 1000).toFixed(1);
                                                    // } else if (Sensor_mode[5] === "4") {
                                                    //     var new_data_chart_6 = (data_array["data_st" + Sncanel[5].substring(7)] / 1000).toFixed(1);
                                                    // } else {
                                                    var new_data_chart_6 = (data_array["data_st" + Sncanel[5].substring(7)] * 1).toFixed(1);
                                                    // }
                                                    chart_6.addData({
                                                        timestamp: p_json['date_time'],
                                                        chart_6: new_data_chart_6
                                                    });
                                                }
                                                if (Status[6] === "1") {
                                                    // if (Sensor_mode[6] === "7") {
                                                    //     var new_data_chart_7 = (data_array["data_st" + Sncanel[6].substring(7)] / 54).toFixed(1);
                                                    // } else if (Sensor_mode[6] === "6") {
                                                    //     var new_data_chart_7 = (data_array["data_st" + Sncanel[6].substring(7)] / 54).toFixed(1);
                                                    // } else if (Sensor_mode[6] === "5") {
                                                    //     var new_data_chart_7 = (data_array["data_st" + Sncanel[6].substring(7)] / 1000).toFixed(1);
                                                    // } else if (Sensor_mode[6] === "4") {
                                                    //     var new_data_chart_7 = (data_array["data_st" + Sncanel[6].substring(7)] / 1000).toFixed(1);
                                                    // } else {
                                                    var new_data_chart_7 = (data_array["data_st" + Sncanel[6].substring(7)] * 1).toFixed(1);
                                                    // }
                                                    chart_7.addData({
                                                        timestamp: p_json['date_time'],
                                                        chart_7: new_data_chart_7
                                                    });
                                                }
                                                if (Status[7] === "1") {
                                                    // if (Sensor_mode[7] === "7") {
                                                    //     var new_data_chart_8 = (data_array["data_st" + Sncanel[7].substring(7)] / 54).toFixed(1);
                                                    // } else if (Sensor_mode[7] === "6") {
                                                    //     var new_data_chart_8 = (data_array["data_st" + Sncanel[7].substring(7)] / 54).toFixed(1);
                                                    // } else if (Sensor_mode[7] === "5") {
                                                    //     var new_data_chart_8 = (data_array["data_st" + Sncanel[7].substring(7)] / 1000).toFixed(1);
                                                    // } else if (Sensor_mode[7] === "4") {
                                                    //     var new_data_chart_8 = (data_array["data_st" + Sncanel[7].substring(7)] / 1000).toFixed(1);
                                                    // } else {
                                                    var new_data_chart_8 = (data_array["data_st" + Sncanel[7].substring(7)] * 1).toFixed(1);
                                                    // }
                                                    chart_8.addData({
                                                        timestamp: p_json['date_time'],
                                                        chart_8: new_data_chart_8
                                                    });
                                                }
                                            } else {
                                                if (Status[0] === "1") {
                                                    if (Sensor_mode[0] === "7") {
                                                        var new_data_chart_1 = (data_array[Sncanel[0]] / 54).toFixed(1);
                                                    } else if (Sensor_mode[0] === "6") {
                                                        var new_data_chart_1 = (data_array[Sncanel[0]] / 54).toFixed(1);
                                                    } else if (Sensor_mode[0] === "5") {
                                                        var new_data_chart_1 = (data_array[Sncanel[0]] / 1000).toFixed(1);
                                                    } else if (Sensor_mode[0] === "4") {
                                                        var new_data_chart_1 = (data_array[Sncanel[0]] / 1000).toFixed(1);
                                                    } else {
                                                        var new_data_chart_1 = (data_array[Sncanel[0]] * 1).toFixed(1);
                                                    }
                                                    chart_1.addData({
                                                        timestamp: parseJSON['date_time'],
                                                        chart_1: new_data_chart_1
                                                    });
                                                }
                                                if (Status[1] === "1") {
                                                    if (Sensor_mode[1] === "7") {
                                                        var new_data_chart_2 = (data_array[Sncanel[1]] / 54).toFixed(1);
                                                    } else if (Sensor_mode[1] === "6") {
                                                        var new_data_chart_2 = (data_array[Sncanel[1]] / 54).toFixed(1);
                                                    } else if (Sensor_mode[1] === "5") {
                                                        var new_data_chart_2 = (data_array[Sncanel[1]] / 1000).toFixed(1);
                                                    } else if (Sensor_mode[1] === "4") {
                                                        var new_data_chart_2 = (data_array[Sncanel[1]] / 1000).toFixed(1);
                                                    } else {
                                                        var new_data_chart_2 = (data_array[Sncanel[1]] * 1).toFixed(1);
                                                    }
                                                    chart_2.addData({
                                                        timestamp: parseJSON['date_time'],
                                                        chart_2: new_data_chart_2
                                                    });
                                                }
                                                if (Status[2] === "1") {
                                                    if (Sensor_mode[2] === "7") {
                                                        var new_data_chart_3 = (data_array[Sncanel[2]] / 54).toFixed(1);
                                                    } else if (Sensor_mode[2] === "6") {
                                                        var new_data_chart_3 = (data_array[Sncanel[2]] / 54).toFixed(1);
                                                    } else if (Sensor_mode[2] === "5") {
                                                        var new_data_chart_3 = (data_array[Sncanel[2]] / 1000).toFixed(1);
                                                    } else if (Sensor_mode[2] === "4") {
                                                        var new_data_chart_3 = (data_array[Sncanel[2]] / 1000).toFixed(1);
                                                    } else {
                                                        var new_data_chart_3 = (data_array[Sncanel[2]] * 1).toFixed(1);
                                                    }
                                                    chart_3.addData({
                                                        timestamp: parseJSON['date_time'],
                                                        chart_3: new_data_chart_3
                                                    });
                                                }
                                                if (Status[3] === "1") {
                                                    if (Sensor_mode[3] === "7") {
                                                        var new_data_chart_4 = (data_array[Sncanel[3]] / 54).toFixed(1);
                                                    } else if (Sensor_mode[3] === "6") {
                                                        var new_data_chart_4 = (data_array[Sncanel[3]] / 54).toFixed(1);
                                                    } else if (Sensor_mode[3] === "5") {
                                                        var new_data_chart_4 = (data_array[Sncanel[3]] / 1000).toFixed(1);
                                                    } else if (Sensor_mode[3] === "4") {
                                                        var new_data_chart_4 = (data_array[Sncanel[3]] / 1000).toFixed(1);
                                                    } else {
                                                        var new_data_chart_4 = (data_array[Sncanel[3]] * 1).toFixed(1);
                                                    }
                                                    chart_4.addData({
                                                        timestamp: parseJSON['date_time'],
                                                        chart_4: new_data_chart_4
                                                    });
                                                }
                                                if (Status[4] === "1") {
                                                    if (Sensor_mode[4] === "7") {
                                                        var new_data_chart_5 = (data_array[Sncanel[4]] / 54).toFixed(1);
                                                    } else if (Sensor_mode[4] === "6") {
                                                        var new_data_chart_5 = (data_array[Sncanel[4]] / 54).toFixed(1);
                                                    } else if (Sensor_mode[4] === "5") {
                                                        var new_data_chart_5 = (data_array[Sncanel[4]] / 1000).toFixed(1);
                                                    } else if (Sensor_mode[4] === "4") {
                                                        var new_data_chart_5 = (data_array[Sncanel[4]] / 1000).toFixed(1);
                                                    } else {
                                                        var new_data_chart_5 = (data_array[Sncanel[4]] * 1).toFixed(1);
                                                    }
                                                    chart_5.addData({
                                                        timestamp: parseJSON['date_time'],
                                                        chart_5: new_data_chart_5
                                                    });
                                                }
                                                if (Status[5] === "1") {
                                                    if (Sensor_mode[5] === "7") {
                                                        var new_data_chart_6 = (data_array[Sncanel[5]] / 54).toFixed(1);
                                                    } else if (Sensor_mode[5] === "6") {
                                                        var new_data_chart_6 = (data_array[Sncanel[5]] / 54).toFixed(1);
                                                    } else if (Sensor_mode[5] === "5") {
                                                        var new_data_chart_6 = (data_array[Sncanel[5]] / 1000).toFixed(1);
                                                    } else if (Sensor_mode[5] === "4") {
                                                        var new_data_chart_6 = (data_array[Sncanel[5]] / 1000).toFixed(1);
                                                    } else {
                                                        var new_data_chart_6 = (data_array[Sncanel[5]] * 1).toFixed(1);
                                                    }
                                                    chart_6.addData({
                                                        timestamp: parseJSON['date_time'],
                                                        chart_6: new_data_chart_6
                                                    });
                                                }
                                                if (Status[6] === "1") {
                                                    if (Sensor_mode[6] === "7") {
                                                        var new_data_chart_7 = (data_array[Sncanel[6]] / 54).toFixed(1);
                                                    } else if (Sensor_mode[6] === "6") {
                                                        var new_data_chart_7 = (data_array[Sncanel[6]] / 54).toFixed(1);
                                                    } else if (Sensor_mode[6] === "5") {
                                                        var new_data_chart_7 = (data_array[Sncanel[6]] / 1000).toFixed(1);
                                                    } else if (Sensor_mode[6] === "4") {
                                                        var new_data_chart_7 = (data_array[Sncanel[6]] / 1000).toFixed(1);
                                                    } else {
                                                        var new_data_chart_7 = (data_array[Sncanel[6]] * 1).toFixed(1);
                                                    }
                                                    chart_7.addData({
                                                        timestamp: parseJSON['date_time'],
                                                        chart_7: new_data_chart_7
                                                    });
                                                }
                                                if (Status[7] === "1") {
                                                    if (Sensor_mode[7] === "7") {
                                                        var new_data_chart_8 = (data_array[Sncanel[7]] / 54).toFixed(1);
                                                    } else if (Sensor_mode[7] === "6") {
                                                        var new_data_chart_8 = (data_array[Sncanel[7]] / 54).toFixed(1);
                                                    } else if (Sensor_mode[7] === "5") {
                                                        var new_data_chart_8 = (data_array[Sncanel[7]] / 1000).toFixed(1);
                                                    } else if (Sensor_mode[7] === "4") {
                                                        var new_data_chart_8 = (data_array[Sncanel[7]] / 1000).toFixed(1);
                                                    } else {
                                                        var new_data_chart_8 = (data_array[Sncanel[7]] * 1).toFixed(1);
                                                    }
                                                    chart_8.addData({
                                                        timestamp: parseJSON['date_time'],
                                                        chart_8: new_data_chart_8
                                                    });
                                                }
                                            }

                                            if (Status[8] === "1") {
                                                if (Sensor_mode[8] === "7") {
                                                    var new_data_chart_9 = (data_array[Sncanel[8]] / 54).toFixed(1);
                                                } else if (Sensor_mode[8] === "6") {
                                                    var new_data_chart_9 = (data_array[Sncanel[8]] / 54).toFixed(1);
                                                } else if (Sensor_mode[8] === "5") {
                                                    var new_data_chart_9 = (data_array[Sncanel[8]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[8] === "4") {
                                                    var new_data_chart_9 = (data_array[Sncanel[8]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_9 = (data_array[Sncanel[8]] * 1).toFixed(1);
                                                }
                                                chart_9.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_9: new_data_chart_9
                                                });
                                            }
                                            if (Status[9] === "1") {
                                                if (Sensor_mode[9] === "7") {
                                                    var new_data_chart_10 = (data_array[Sncanel[9]] / 54).toFixed(1);
                                                } else if (Sensor_mode[9] === "6") {
                                                    var new_data_chart_10 = (data_array[Sncanel[9]] / 54).toFixed(1);
                                                } else if (Sensor_mode[9] === "5") {
                                                    var new_data_chart_10 = (data_array[Sncanel[9]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[9] === "4") {
                                                    var new_data_chart_10 = (data_array[Sncanel[9]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_10 = (data_array[Sncanel[9]] * 1).toFixed(1);
                                                }
                                                chart_10.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_10: new_data_chart_10
                                                });
                                            }
                                            if (Status[10] === "1") {
                                                if (Sensor_mode[10] === "7") {
                                                    var new_data_chart_11 = (data_array[Sncanel[10]] / 54).toFixed(1);
                                                } else if (Sensor_mode[10] === "6") {
                                                    var new_data_chart_11 = (data_array[Sncanel[10]] / 54).toFixed(1);
                                                } else if (Sensor_mode[10] === "5") {
                                                    var new_data_chart_11 = (data_array[Sncanel[10]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[10] === "4") {
                                                    var new_data_chart_11 = (data_array[Sncanel[10]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_11 = (data_array[Sncanel[10]] * 1).toFixed(1);
                                                }
                                                chart_11.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_11: new_data_chart_11
                                                });
                                            }
                                            if (Status[11] === "1") {
                                                if (Sensor_mode[11] === "7") {
                                                    var new_data_chart_12 = (data_array[Sncanel[11]] / 54).toFixed(1);
                                                } else if (Sensor_mode[11] === "6") {
                                                    var new_data_chart_12 = (data_array[Sncanel[11]] / 54).toFixed(1);
                                                } else if (Sensor_mode[11] === "5") {
                                                    var new_data_chart_12 = (data_array[Sncanel[11]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[11] === "4") {
                                                    var new_data_chart_12 = (data_array[Sncanel[11]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_12 = (data_array[Sncanel[11]] * 1).toFixed(1);
                                                }
                                                chart_12.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_12: new_data_chart_12
                                                });
                                            }
                                            if (Status[12] === "1") {
                                                if (Sensor_mode[12] === "7") {
                                                    var new_data_chart_13 = (data_array[Sncanel[12]] / 54).toFixed(1);
                                                } else if (Sensor_mode[12] === "6") {
                                                    var new_data_chart_13 = (data_array[Sncanel[12]] / 54).toFixed(1);
                                                } else if (Sensor_mode[12] === "5") {
                                                    var new_data_chart_13 = (data_array[Sncanel[12]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[12] === "4") {
                                                    var new_data_chart_13 = (data_array[Sncanel[12]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_13 = (data_array[Sncanel[12]] * 1).toFixed(1);
                                                }
                                                chart_13.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_13: new_data_chart_13
                                                });
                                            }
                                            if (Status[13] === "1") {
                                                if (Sensor_mode[13] === "7") {
                                                    var new_data_chart_14 = (data_array[Sncanel[13]] / 54).toFixed(1);
                                                } else if (Sensor_mode[13] === "6") {
                                                    var new_data_chart_14 = (data_array[Sncanel[13]] / 54).toFixed(1);
                                                } else if (Sensor_mode[13] === "5") {
                                                    var new_data_chart_14 = (data_array[Sncanel[13]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[13] === "4") {
                                                    var new_data_chart_14 = (data_array[Sncanel[13]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_14 = (data_array[Sncanel[13]] * 1).toFixed(1);
                                                }
                                                chart_14.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_14: new_data_chart_14
                                                });
                                            }
                                            if (Status[14] === "1") {
                                                if (Sensor_mode[14] === "7") {
                                                    var new_data_chart_15 = (data_array[Sncanel[14]] / 54).toFixed(1);
                                                } else if (Sensor_mode[14] === "6") {
                                                    var new_data_chart_15 = (data_array[Sncanel[14]] / 54).toFixed(1);
                                                } else if (Sensor_mode[14] === "5") {
                                                    var new_data_chart_15 = (data_array[Sncanel[14]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[14] === "4") {
                                                    var new_data_chart_15 = (data_array[Sncanel[14]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_15 = (data_array[Sncanel[14]] * 1).toFixed(1);
                                                }
                                                chart_15.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_15: new_data_chart_15
                                                });
                                            }
                                            if (Status[15] === "1") {
                                                if (Sensor_mode[15] === "7") {
                                                    var new_data_chart_16 = (data_array[Sncanel[15]] / 54).toFixed(1);
                                                } else if (Sensor_mode[15] === "6") {
                                                    var new_data_chart_16 = (data_array[Sncanel[15]] / 54).toFixed(1);
                                                } else if (Sensor_mode[15] === "5") {
                                                    var new_data_chart_16 = (data_array[Sncanel[15]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[15] === "4") {
                                                    var new_data_chart_16 = (data_array[Sncanel[15]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_16 = (data_array[Sncanel[15]] * 1).toFixed(1);
                                                }
                                                chart_16.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_16: new_data_chart_16
                                                });
                                            }
                                            if (Status[16] === "1") {
                                                if (Sensor_mode[16] === "7") {
                                                    var new_data_chart_17 = (data_array[Sncanel[16]] / 54).toFixed(1);
                                                } else if (Sensor_mode[16] === "6") {
                                                    var new_data_chart_17 = (data_array[Sncanel[16]] / 54).toFixed(1);
                                                } else if (Sensor_mode[16] === "5") {
                                                    var new_data_chart_17 = (data_array[Sncanel[16]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[16] === "4") {
                                                    var new_data_chart_17 = (data_array[Sncanel[16]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_17 = (data_array[Sncanel[16]] * 1).toFixed(1);
                                                }
                                                chart_17.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_17: new_data_chart_17
                                                });
                                            }
                                            if (Status[17] === "1") {
                                                if (Sensor_mode[17] === "7") {
                                                    var new_data_chart_18 = (data_array[Sncanel[17]] / 54).toFixed(1);
                                                } else if (Sensor_mode[17] === "6") {
                                                    var new_data_chart_18 = (data_array[Sncanel[17]] / 54).toFixed(1);
                                                } else if (Sensor_mode[17] === "5") {
                                                    var new_data_chart_18 = (data_array[Sncanel[17]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[17] === "4") {
                                                    var new_data_chart_18 = (data_array[Sncanel[17]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_18 = (data_array[Sncanel[17]] * 1).toFixed(1);
                                                }
                                                chart_18.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_18: new_data_chart_18
                                                });
                                            }
                                            if (Status[18] === "1") {
                                                if (Sensor_mode[18] === "7") {
                                                    var new_data_chart_19 = (data_array[Sncanel[18]] / 54).toFixed(1);
                                                } else if (Sensor_mode[18] === "6") {
                                                    var new_data_chart_19 = (data_array[Sncanel[18]] / 54).toFixed(1);
                                                } else if (Sensor_mode[18] === "5") {
                                                    var new_data_chart_19 = (data_array[Sncanel[18]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[18] === "4") {
                                                    var new_data_chart_19 = (data_array[Sncanel[18]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_19 = (data_array[Sncanel[18]] * 1).toFixed(1);
                                                }
                                                chart_19.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_19: new_data_chart_19
                                                });
                                            }
                                            if (Status[19] === "1") {
                                                if (Sensor_mode[19] === "7") {
                                                    var new_data_chart_20 = (data_array[Sncanel[19]] / 54).toFixed(1);
                                                } else if (Sensor_mode[19] === "6") {
                                                    var new_data_chart_20 = (data_array[Sncanel[19]] / 54).toFixed(1);
                                                } else if (Sensor_mode[19] === "5") {
                                                    var new_data_chart_20 = (data_array[Sncanel[19]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[19] === "4") {
                                                    var new_data_chart_20 = (data_array[Sncanel[19]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_20 = (data_array[Sncanel[19]] * 1).toFixed(1);
                                                }
                                                chart_20.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_20: new_data_chart_20
                                                });
                                            }
                                            if (Status[20] === "1") {
                                                if (Sensor_mode[20] === "7") {
                                                    var new_data_chart_21 = (data_array[Sncanel[20]] / 54).toFixed(1);
                                                } else if (Sensor_mode[20] === "6") {
                                                    var new_data_chart_21 = (data_array[Sncanel[20]] / 54).toFixed(1);
                                                } else if (Sensor_mode[20] === "5") {
                                                    var new_data_chart_21 = (data_array[Sncanel[20]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[20] === "4") {
                                                    var new_data_chart_21 = (data_array[Sncanel[20]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_21 = (data_array[Sncanel[20]] * 1).toFixed(1);
                                                }
                                                chart_21.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_21: new_data_chart_21
                                                });
                                            }
                                            if (Status[21] === "1") {
                                                if (Sensor_mode[21] === "7") {
                                                    var new_data_chart_22 = (data_array[Sncanel[21]] / 54).toFixed(1);
                                                } else if (Sensor_mode[21] === "6") {
                                                    var new_data_chart_22 = (data_array[Sncanel[21]] / 54).toFixed(1);
                                                } else if (Sensor_mode[21] === "5") {
                                                    var new_data_chart_22 = (data_array[Sncanel[21]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[21] === "4") {
                                                    var new_data_chart_22 = (data_array[Sncanel[21]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_22 = (data_array[Sncanel[21]] * 1).toFixed(1);
                                                }
                                                chart_22.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_22: new_data_chart_22
                                                });
                                            }
                                            if (Status[22] === "1") {
                                                if (Sensor_mode[22] === "7") {
                                                    var new_data_chart_23 = (data_array[Sncanel[22]] / 54).toFixed(1);
                                                } else if (Sensor_mode[22] === "6") {
                                                    var new_data_chart_23 = (data_array[Sncanel[22]] / 54).toFixed(1);
                                                } else if (Sensor_mode[22] === "5") {
                                                    var new_data_chart_23 = (data_array[Sncanel[22]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[22] === "4") {
                                                    var new_data_chart_23 = (data_array[Sncanel[22]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_23 = (data_array[Sncanel[22]] * 1).toFixed(1);
                                                }
                                                chart_23.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_23: new_data_chart_23
                                                });
                                            }
                                            if (Status[23] === "1") {
                                                if (Sensor_mode[23] === "7") {
                                                    var new_data_chart_24 = (data_array[Sncanel[23]] / 54).toFixed(1);
                                                } else if (Sensor_mode[23] === "6") {
                                                    var new_data_chart_24 = (data_array[Sncanel[23]] / 54).toFixed(1);
                                                } else if (Sensor_mode[23] === "5") {
                                                    var new_data_chart_24 = (data_array[Sncanel[23]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[23] === "4") {
                                                    var new_data_chart_24 = (data_array[Sncanel[23]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_24 = (data_array[Sncanel[23]] * 1).toFixed(1);
                                                }
                                                chart_24.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_24: new_data_chart_24
                                                });
                                            }
                                            if (Status[24] === "1") {
                                                if (Sensor_mode[24] === "7") {
                                                    var new_data_chart_25 = (data_array[Sncanel[24]] / 54).toFixed(1);
                                                } else if (Sensor_mode[24] === "6") {
                                                    var new_data_chart_25 = (data_array[Sncanel[24]] / 54).toFixed(1);
                                                } else if (Sensor_mode[24] === "5") {
                                                    var new_data_chart_25 = (data_array[Sncanel[24]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[24] === "4") {
                                                    var new_data_chart_25 = (data_array[Sncanel[24]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_25 = (data_array[Sncanel[24]] * 1).toFixed(1);
                                                }
                                                chart_25.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_25: new_data_chart_25
                                                });
                                            }
                                            if (Status[25] === "1") {
                                                if (Sensor_mode[25] === "7") {
                                                    var new_data_chart_26 = (data_array[Sncanel[25]] / 54).toFixed(1);
                                                } else if (Sensor_mode[25] === "6") {
                                                    var new_data_chart_26 = (data_array[Sncanel[25]] / 54).toFixed(1);
                                                } else if (Sensor_mode[25] === "5") {
                                                    var new_data_chart_26 = (data_array[Sncanel[25]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[25] === "4") {
                                                    var new_data_chart_26 = (data_array[Sncanel[25]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_26 = (data_array[Sncanel[25]] * 1).toFixed(1);
                                                }
                                                chart_26.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_26: new_data_chart_26
                                                });
                                            }
                                            if (Status[26] === "1") {
                                                if (Sensor_mode[26] === "7") {
                                                    var new_data_chart_27 = (data_array[Sncanel[26]] / 54).toFixed(1);
                                                } else if (Sensor_mode[26] === "6") {
                                                    var new_data_chart_27 = (data_array[Sncanel[26]] / 54).toFixed(1);
                                                } else if (Sensor_mode[26] === "5") {
                                                    var new_data_chart_27 = (data_array[Sncanel[26]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[26] === "4") {
                                                    var new_data_chart_27 = (data_array[Sncanel[26]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_27 = (data_array[Sncanel[26]] * 1).toFixed(1);
                                                }
                                                chart_27.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_27: new_data_chart_27
                                                });
                                            }
                                            if (Status[27] === "1") {
                                                if (Sensor_mode[27] === "7") {
                                                    var new_data_chart_28 = (data_array[Sncanel[27]] / 54).toFixed(1);
                                                } else if (Sensor_mode[27] === "6") {
                                                    var new_data_chart_28 = (data_array[Sncanel[27]] / 54).toFixed(1);
                                                } else if (Sensor_mode[27] === "5") {
                                                    var new_data_chart_28 = (data_array[Sncanel[27]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[27] === "4") {
                                                    var new_data_chart_28 = (data_array[Sncanel[27]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_28 = (data_array[Sncanel[27]] * 1).toFixed(1);
                                                }
                                                chart_28.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_28: new_data_chart_28
                                                });
                                            }
                                            if (Status[28] === "1") {
                                                if (Sensor_mode[28] === "7") {
                                                    var new_data_chart_29 = (data_array[Sncanel[28]] / 54).toFixed(1);
                                                } else if (Sensor_mode[28] === "6") {
                                                    var new_data_chart_29 = (data_array[Sncanel[28]] / 54).toFixed(1);
                                                } else if (Sensor_mode[28] === "5") {
                                                    var new_data_chart_29 = (data_array[Sncanel[28]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[28] === "4") {
                                                    var new_data_chart_29 = (data_array[Sncanel[28]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_29 = (data_array[Sncanel[28]] * 1).toFixed(1);
                                                }
                                                chart_29.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_29: new_data_chart_29
                                                });
                                            }
                                            if (Status[29] === "1") {
                                                if (Sensor_mode[29] === "7") {
                                                    var new_data_chart_30 = (data_array[Sncanel[29]] / 54).toFixed(1);
                                                } else if (Sensor_mode[29] === "6") {
                                                    var new_data_chart_30 = (data_array[Sncanel[29]] / 54).toFixed(1);
                                                } else if (Sensor_mode[29] === "5") {
                                                    var new_data_chart_30 = (data_array[Sncanel[29]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[29] === "4") {
                                                    var new_data_chart_30 = (data_array[Sncanel[29]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_30 = (data_array[Sncanel[29]] * 1).toFixed(1);
                                                }
                                                chart_30.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_30: new_data_chart_30
                                                });
                                            }
                                            if (Status[30] === "1") {
                                                if (Sensor_mode[30] === "7") {
                                                    var new_data_chart_31 = (data_array[Sncanel[30]] / 54).toFixed(1);
                                                } else if (Sensor_mode[30] === "6") {
                                                    var new_data_chart_31 = (data_array[Sncanel[30]] / 54).toFixed(1);
                                                } else if (Sensor_mode[30] === "5") {
                                                    var new_data_chart_31 = (data_array[Sncanel[30]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[30] === "4") {
                                                    var new_data_chart_31 = (data_array[Sncanel[30]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_31 = (data_array[Sncanel[30]] * 1).toFixed(1);
                                                }
                                                chart_31.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_31: new_data_chart_31
                                                });
                                            }
                                            if (Status[31] === "1") {
                                                if (Sensor_mode[31] === "7") {
                                                    var new_data_chart_32 = (data_array[Sncanel[31]] / 54).toFixed(1);
                                                } else if (Sensor_mode[31] === "6") {
                                                    var new_data_chart_32 = (data_array[Sncanel[31]] / 54).toFixed(1);
                                                } else if (Sensor_mode[31] === "5") {
                                                    var new_data_chart_32 = (data_array[Sncanel[31]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[31] === "4") {
                                                    var new_data_chart_32 = (data_array[Sncanel[31]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_32 = (data_array[Sncanel[31]] * 1).toFixed(1);
                                                }
                                                chart_32.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_32: new_data_chart_32
                                                });
                                            }
                                            if (Status[32] === "1") {
                                                if (Sensor_mode[32] === "7") {
                                                    var new_data_chart_33 = (data_array[Sncanel[32]] / 54).toFixed(1);
                                                } else if (Sensor_mode[32] === "6") {
                                                    var new_data_chart_33 = (data_array[Sncanel[32]] / 54).toFixed(1);
                                                } else if (Sensor_mode[32] === "5") {
                                                    var new_data_chart_33 = (data_array[Sncanel[32]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[32] === "4") {
                                                    var new_data_chart_33 = (data_array[Sncanel[32]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_33 = (data_array[Sncanel[32]] * 1).toFixed(1);
                                                }
                                                chart_33.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_33: new_data_chart_33
                                                });
                                            }
                                            if (Status[33] === "1") {
                                                if (Sensor_mode[33] === "7") {
                                                    var new_data_chart_34 = (data_array[Sncanel[33]] / 54).toFixed(1);
                                                } else if (Sensor_mode[33] === "6") {
                                                    var new_data_chart_34 = (data_array[Sncanel[33]] / 54).toFixed(1);
                                                } else if (Sensor_mode[33] === "5") {
                                                    var new_data_chart_34 = (data_array[Sncanel[33]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[33] === "4") {
                                                    var new_data_chart_34 = (data_array[Sncanel[33]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_34 = (data_array[Sncanel[33]] * 1).toFixed(1);
                                                }
                                                chart_34.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_34: new_data_chart_34
                                                });
                                            }
                                            if (Status[34] === "1") {
                                                if (Sensor_mode[34] === "7") {
                                                    var new_data_chart_35 = (data_array[Sncanel[34]] / 54).toFixed(1);
                                                } else if (Sensor_mode[34] === "6") {
                                                    var new_data_chart_35 = (data_array[Sncanel[34]] / 54).toFixed(1);
                                                } else if (Sensor_mode[34] === "5") {
                                                    var new_data_chart_35 = (data_array[Sncanel[34]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[34] === "4") {
                                                    var new_data_chart_35 = (data_array[Sncanel[34]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_35 = (data_array[Sncanel[34]] * 1).toFixed(1);
                                                }
                                                chart_35.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_35: new_data_chart_35
                                                });
                                            }
                                            if (Status[35] === "1") {
                                                if (Sensor_mode[35] === "7") {
                                                    var new_data_chart_36 = (data_array[Sncanel[35]] / 54).toFixed(1);
                                                } else if (Sensor_mode[35] === "6") {
                                                    var new_data_chart_36 = (data_array[Sncanel[35]] / 54).toFixed(1);
                                                } else if (Sensor_mode[35] === "5") {
                                                    var new_data_chart_36 = (data_array[Sncanel[35]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[35] === "4") {
                                                    var new_data_chart_36 = (data_array[Sncanel[35]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_36 = (data_array[Sncanel[35]] * 1).toFixed(1);
                                                }
                                                chart_36.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_36: new_data_chart_36
                                                });
                                            }
                                            if (Status[36] === "1") {
                                                if (Sensor_mode[36] === "7") {
                                                    var new_data_chart_37 = (data_array[Sncanel[36]] / 54).toFixed(1);
                                                } else if (Sensor_mode[36] === "6") {
                                                    var new_data_chart_37 = (data_array[Sncanel[36]] / 54).toFixed(1);
                                                } else if (Sensor_mode[36] === "5") {
                                                    var new_data_chart_37 = (data_array[Sncanel[36]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[36] === "4") {
                                                    var new_data_chart_37 = (data_array[Sncanel[36]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_37 = (data_array[Sncanel[36]] * 1).toFixed(1);
                                                }
                                                chart_37.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_37: new_data_chart_37
                                                });
                                            }
                                            if (Status[37] === "1") {
                                                if (Sensor_mode[37] === "7") {
                                                    var new_data_chart_38 = (data_array[Sncanel[37]] / 54).toFixed(1);
                                                } else if (Sensor_mode[37] === "6") {
                                                    var new_data_chart_38 = (data_array[Sncanel[37]] / 54).toFixed(1);
                                                } else if (Sensor_mode[37] === "5") {
                                                    var new_data_chart_38 = (data_array[Sncanel[37]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[37] === "4") {
                                                    var new_data_chart_38 = (data_array[Sncanel[37]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_38 = (data_array[Sncanel[37]] * 1).toFixed(1);
                                                }
                                                chart_38.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_38: new_data_chart_38
                                                });
                                            }
                                            if (Status[38] === "1") {
                                                if (Sensor_mode[38] === "7") {
                                                    var new_data_chart_39 = (data_array[Sncanel[38]] / 54).toFixed(1);
                                                } else if (Sensor_mode[38] === "6") {
                                                    var new_data_chart_39 = (data_array[Sncanel[38]] / 54).toFixed(1);
                                                } else if (Sensor_mode[38] === "5") {
                                                    var new_data_chart_39 = (data_array[Sncanel[38]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[38] === "4") {
                                                    var new_data_chart_39 = (data_array[Sncanel[38]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_39 = (data_array[Sncanel[38]] * 1).toFixed(1);
                                                }
                                                chart_39.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_39: new_data_chart_39
                                                });
                                            }
                                            if (Status[39] === "1") {
                                                if (Sensor_mode[39] === "7") {
                                                    var new_data_chart_40 = (data_array[Sncanel[39]] / 54).toFixed(1);
                                                } else if (Sensor_mode[39] === "6") {
                                                    var new_data_chart_40 = (data_array[Sncanel[39]] / 54).toFixed(1);
                                                } else if (Sensor_mode[39] === "5") {
                                                    var new_data_chart_40 = (data_array[Sncanel[39]] / 1000).toFixed(1);
                                                } else if (Sensor_mode[39] === "4") {
                                                    var new_data_chart_40 = (data_array[Sncanel[39]] / 1000).toFixed(1);
                                                } else {
                                                    var new_data_chart_40 = (data_array[Sncanel[39]] * 1).toFixed(1);
                                                }
                                                chart_40.addData({
                                                    timestamp: parseJSON['date_time'],
                                                    chart_40: new_data_chart_40
                                                });
                                            }
                                            // -------------------------------
                                        }
                                    }
                                    // --------------------------------------------------------------------------
                                    if (house_master !== "KMUMT001") {
                                        $(".Auto_kmutt").hide();
                                        // json_control_All
                                        if (message.destinationName == house_master + "/1/control/json_control_filter") {
                                            if (Contstatus !== 0) {
                                                var result = message.payloadString;
                                                var parseJSON = $.parseJSON(result);
                                                var data_array = parseJSON.control_status;
                                                console.log(parseJSON);

                                                if (data_array.Mode === "Auto") { //Auto
                                                    $(".ul_Auto").show();
                                                    $(".s_mode_Manual").removeClass("active");
                                                    $(".s_mode_Auto").addClass("active");
                                                    $(".sw_mode_Manual").removeClass("text-white btn-success active").html(' Manual Mode');
                                                    $(".sw_mode_Auto").addClass("text-white btn-success active").html(' Auto Mode');
                                                    // $(".sw_mode_timmer").removeClass("text-white btn-warning active").html('<i class="fa fa-square-o"></i> Timmer Mode');
                                                } else if (data_array.Mode === "Manual") {
                                                    $(".ul_Auto").hide();
                                                    $("#save_auto_cont").hide();
                                                    $("#close_auto_cont").hide();
                                                    $(".s_mode_Auto").removeClass("active");
                                                    $(".s_mode_Manual").addClass("active");
                                                    $(".sw_mode_Auto").removeClass("text-white btn-success active").html(' Auto Mode');
                                                    $(".sw_mode_Manual").addClass("text-white btn-success active").html(' Manual Mode');
                                                    // $(".sw_mode_timmer").removeClass("text-white btn-warning active").html('<i class="fa fa-square-o"></i> Timmer Mode');
                                                }

                                                // dripper_1
                                                if (Contstatus.controlstatus_1 === "1") {
                                                    $(".dash_c1").show();
                                                    $(".title_c1").html(Contname.conttrolname_1);
                                                    cont_dash_show(img_c = "img_c1", c_dash = data_array.dripper_1, c_img_off = Controlimg.drip_1_off, c_img_on = Controlimg.drip_1_on);
                                                    // modal_manual
                                                    SW_Control_SLW(result = data_array.dripper_1, sw_1 = "sw_drip1_on", sw_2 = "sw_drip1_off");
                                                } else {
                                                    $(".dash_c1").hide();
                                                }

                                                // dripper_2
                                                if (Contstatus.controlstatus_2 === "1") {
                                                    $(".dash_c2").show();
                                                    $(".title_c2").html(Contname.conttrolname_2);
                                                    cont_dash_show(img_c = "img_c2", c_dash = data_array.dripper_2, c_img_off = Controlimg.drip_2_off, c_img_on = Controlimg.drip_2_on);
                                                    // modal_manual
                                                    SW_Control_SLW(result = data_array.dripper_2, sw_1 = "sw_drip2_on", sw_2 = "sw_drip2_off");
                                                } else {
                                                    $(".dash_c2").hide();
                                                }

                                                // dripper_3
                                                if (Contstatus.controlstatus_3 === "1") {
                                                    $(".dash_c3").show();
                                                    $(".title_c3").html(Contname.conttrolname_3);
                                                    cont_dash_show(img_c = "img_c3", c_dash = data_array.dripper_3, c_img_off = Controlimg.drip_3_off, c_img_on = Controlimg.drip_3_on);
                                                    // modal_manual
                                                    SW_Control_SLW(result = data_array.dripper_3, sw_1 = "sw_drip3_on", sw_2 = "sw_drip3_off");
                                                } else {
                                                    $(".dash_c3").hide();
                                                }

                                                // dripper_4
                                                if (Contstatus.controlstatus_4 === "1") {
                                                    $(".dash_c4").show();
                                                    $(".title_c4").html(Contname.conttrolname_4);
                                                    cont_dash_show(img_c = "img_c4", c_dash = data_array.dripper_4, c_img_off = Controlimg.drip_4_off, c_img_on = Controlimg.drip_4_on);
                                                    // modal_manual
                                                    SW_Control_SLW(result = data_array.dripper_4, sw_1 = "sw_drip4_on", sw_2 = "sw_drip4_off");
                                                } else {
                                                    $(".dash_c4").hide();
                                                }

                                                // dripper_5
                                                if (Contstatus.controlstatus_5 === "1") {
                                                    $(".dash_c5").show();
                                                    $(".title_c5").html(Contname.conttrolname_5);
                                                    cont_dash_show(img_c = "img_c5", c_dash = data_array.dripper_5, c_img_off = Controlimg.drip_5_off, c_img_on = Controlimg.drip_5_on);
                                                    // modal_manual
                                                    SW_Control_SLW(result = data_array.dripper_5, sw_1 = "sw_drip5_on", sw_2 = "sw_drip5_off");
                                                } else {
                                                    $(".dash_c5").hide();
                                                }

                                                // dripper_6
                                                if (Contstatus.controlstatus_6 === "1") {
                                                    $(".dash_c6").show();
                                                    $(".title_c6").html(Contname.conttrolname_6);
                                                    cont_dash_show(img_c = "img_c6", c_dash = data_array.dripper_6, c_img_off = Controlimg.drip_6_off, c_img_on = Controlimg.drip_6_on);
                                                    // modal_manual
                                                    SW_Control_SLW(result = data_array.dripper_6, sw_1 = "sw_drip6_on", sw_2 = "sw_drip6_off");
                                                } else {
                                                    $(".dash_c6").hide();
                                                }

                                                // dripper_7
                                                if (Contstatus.controlstatus_7 === "1") {
                                                    $(".dash_c7").show();
                                                    $(".title_c7").html(Contname.conttrolname_7);
                                                    cont_dash_show(img_c = "img_c7", c_dash = data_array.dripper_7, c_img_off = Controlimg.drip_7_off, c_img_on = Controlimg.drip_7_on);
                                                    // modal_manual
                                                    SW_Control_SLW(result = data_array.dripper_7, sw_1 = "sw_drip7_on", sw_2 = "sw_drip7_off");
                                                } else {
                                                    $(".dash_c7").hide();
                                                }

                                                // dripper_8
                                                if (Contstatus.controlstatus_8 === "1") {
                                                    $(".dash_c8").show();
                                                    $(".title_c8").html(Contname.conttrolname_8);
                                                    cont_dash_show(img_c = "img_c8", c_dash = data_array.dripper_8, c_img_off = Controlimg.drip_8_off, c_img_on = Controlimg.drip_8_on);
                                                    // modal_manual
                                                    SW_Control_SLW(result = data_array.dripper_8, sw_1 = "sw_drip8_on", sw_2 = "sw_drip8_off");
                                                } else {
                                                    $(".dash_c8").hide();
                                                }

                                                // foggy
                                                if (Contstatus.controlstatus_9 === "1") {
                                                    $(".dash_c9").show();
                                                    $(".title_c9").html(Contname.conttrolname_9);
                                                    cont_dash_show(img_c = "img_c9", c_dash = data_array.foggy, c_img_off = Controlimg.foggy_off, c_img_on = Controlimg.foggy_on);
                                                    // modal_manual
                                                    SW_Control_SLW(result = data_array.foggy, sw_1 = "sw_foggy_on", sw_2 = "sw_foggy_off");
                                                } else {
                                                    $(".dash_c9").hide();
                                                }

                                                // fan
                                                if (Contstatus.controlstatus_10 === "1") {
                                                    $(".dash_c10").show();
                                                    $(".title_c10").html(Contname.conttrolname_10);
                                                    cont_dash_show(img_c = "img_c10", c_dash = data_array.fan, c_img_off = Controlimg.fan_off, c_img_on = Controlimg.fan_on);
                                                    // modal_manual
                                                    SW_Control_SLW(result = data_array.fan, sw_1 = "sw_fan_on", sw_2 = "sw_fan_off");
                                                } else {
                                                    $(".dash_c10").hide();
                                                }

                                                //Slan
                                                if (Contstatus.controlstatus_11 === "1") {
                                                    // console.log("aaa " + data_array.shader);
                                                    $(".dash_c11").show();
                                                    $(".title_c11").html(Contname.conttrolname_11);
                                                    if (data_array.shader === "0") {
                                                        $(".img_c11").attr("src", "dist/images/control/" + Controlimg.shader_0);
                                                    } else if (data_array.shader === "1") {
                                                        $(".img_c11").attr("src", "dist/images/control/" + Controlimg.shader_1);
                                                    } else if (data_array.shader === "2") {
                                                        $(".img_c11").attr("src", "dist/images/control/" + Controlimg.shader_2);
                                                    } else if (data_array.shader === "3") {
                                                        $(".img_c11").attr("src", "dist/images/control/" + Controlimg.shader_3);
                                                    } else if (data_array.shader === "4") {
                                                        $(".img_c11").attr("src", "dist/images/control/" + Controlimg.shader_4);
                                                    }

                                                    // modal_manual
                                                    if (data_array["shader"] == 0) {
                                                        var shader_slw = "0 : Close 0%";
                                                        $(".sw_shader0").addClass("active");
                                                        $(".sw_shader1").removeClass("active");
                                                        $(".sw_shader2").removeClass("active");
                                                        $(".sw_shader3").removeClass("active");
                                                        $(".sw_shader4").removeClass("active");
                                                    }
                                                    if (data_array["shader"] == 1) {
                                                        var shader_slw = "1 : Close 25%";
                                                        $(".sw_shader0").removeClass("active");
                                                        $(".sw_shader1").addClass("active");
                                                        $(".sw_shader2").removeClass("active");
                                                        $(".sw_shader3").removeClass("active");
                                                        $(".sw_shader4").removeClass("active");
                                                    }
                                                    if (data_array["shader"] == 2) {
                                                        var shader_slw = "2 : Close 50%";
                                                        $(".sw_shader0").removeClass("active");
                                                        $(".sw_shader1").removeClass("active");
                                                        $(".sw_shader2").addClass("active");
                                                        $(".sw_shader3").removeClass("active");
                                                        $(".sw_shader4").removeClass("active");
                                                    }
                                                    if (data_array["shader"] == 3) {
                                                        var shader_slw = "3 : Close 75%";
                                                        $(".sw_shader0").removeClass("active");
                                                        $(".sw_shader1").removeClass("active");
                                                        $(".sw_shader2").removeClass("active");
                                                        $(".sw_shader3").addClass("active");
                                                        $(".sw_shader4").removeClass("active");
                                                    }
                                                    if (data_array["shader"] == 4) {
                                                        var shader_slw = "4 : Close 100%";
                                                        $(".sw_shader0").removeClass("active");
                                                        $(".sw_shader1").removeClass("active");
                                                        $(".sw_shader2").removeClass("active");
                                                        $(".sw_shader3").removeClass("active");
                                                        $(".sw_shader4").addClass("active");
                                                    }
                                                    $(".shader_slw").html(shader_slw);
                                                } else {
                                                    $(".dash_c11").hide();
                                                }

                                                // fertilizer
                                                if (Contstatus.controlstatus_12 === "1") {
                                                    $(".dash_c12").show();
                                                    $(".title_c12").html(Contname.conttrolname_12);
                                                    cont_dash_show(img_c = "img_c12", c_dash = data_array.fertilizer, c_img_off = Controlimg.fertilizer_off, c_img_on = Controlimg.fertilizer_on);
                                                    // modal_manual
                                                    SW_Control_SLW(result = data_array.fertilizer, sw_1 = "sw_fertilizer_on", sw_2 = "sw_fertilizer_off");
                                                } else {
                                                    $(".dash_c12").hide();
                                                }

                                                function cont_dash_show(img_c, c_dash, c_img_off, c_img_on) {
                                                    if (c_dash === "OFF") {
                                                        $("." + img_c).attr("src", "dist/images/control/" + c_img_off);
                                                    } else if (c_dash === "ON") {
                                                        $("." + img_c).attr("src", "dist/images/control/" + c_img_on);
                                                    }
                                                }

                                                function SW_Control_SLW(result, sw_1, sw_2) {
                                                    if (result === "ON") {
                                                        $("." + sw_2).removeClass("text-white btn-danger").html('<i class="fa fa-square-o"></i> OFF');
                                                        $("." + sw_1).addClass("text-white btn-success active").html('<i class="fa fa-check-square-o"></i> ON');
                                                    } else {
                                                        $("." + sw_1).removeClass("text-white btn-success").html('<i class="fa fa-square-o"></i> ON');
                                                        $("." + sw_2).addClass("text-white btn-danger active").html('<i class="fa fa-check-square-o"></i> OFF');
                                                    }
                                                }
                                                swal.close();
                                            }
                                        }
                                    } else {
                                        $(".Auto_kmutt").show();
                                        // ---------------------------------------------------------------------------
                                        // mode_Auto_Manual
                                        if (message.destinationName == "KMUMT001/1/control/mode") {
                                            var cont_status = message.payloadString;

                                            if (cont_status === "on") { //Auto
                                                $(".ul_Auto").hide();
                                                $(".s_mode_Manual").removeClass("active");
                                                $(".s_mode_Auto").addClass("active");
                                                $(".sw_mode_Manual").removeClass("text-white btn-success active").html(' Manual Mode');
                                                $(".sw_mode_Auto").addClass("text-white btn-success active").html(' Auto Mode');
                                                // $(".sw_mode_timmer").removeClass("text-white btn-warning active").html('<i class="fa fa-square-o"></i> Timmer Mode');
                                            } else {
                                                $(".ul_Auto").hide();
                                                $("#save_auto_cont").hide();
                                                $("#close_auto_cont").hide();
                                                $(".s_mode_Auto").removeClass("active");
                                                $(".s_mode_Manual").addClass("active");
                                                $(".sw_mode_Auto").removeClass("text-white btn-success active").html(' Auto Mode');
                                                $(".sw_mode_Manual").addClass("text-white btn-success active").html(' Manual Mode');
                                                // $(".sw_mode_timmer").removeClass("text-white btn-warning active").html('<i class="fa fa-square-o"></i> Timmer Mode');
                                            }
                                            swal.close();
                                        }
                                        // ---------------------------------------------------------------------------

                                        // mode_Control_1
                                        else if (message.destinationName == "KMUMT001/1/control/control_st_1") {
                                            var cont_status = message.payloadString;

                                            // dripper_1
                                            if (Contstatus.controlstatus_1 === "1") {
                                                $(".dash_c1").show();
                                                $(".title_c1").html(Contname.conttrolname_1);
                                                if (cont_status === "off") {
                                                    $(".img_c1").attr("src", "dist/images/control/" + Controlimg.drip_1_off);

                                                    $(".sw_drip1_on").removeClass("text-white btn-success").html('<i class="fa fa-square-o"></i> ON');
                                                    $(".sw_drip1_off").addClass("text-white btn-danger active").html('<i class="fa fa-check-square-o"></i> OFF');
                                                } else { // "ON"
                                                    $(".img_c1").attr("src", "dist/images/control/" + Controlimg.drip_1_on);

                                                    $(".sw_drip1_off").removeClass("text-white btn-danger").html('<i class="fa fa-square-o"></i> OFF');
                                                    $(".sw_drip1_on").addClass("text-white btn-success active").html('<i class="fa fa-check-square-o"></i> ON');
                                                }
                                            } else {
                                                $(".dash_c1").hide();
                                            }
                                            swal.close();
                                        }
                                        // ---------------------------------------------------------------------------
                                        // mode_Control_2
                                        else if (message.destinationName == "KMUMT001/1/control/control_st_2") {
                                            var cont_status = message.payloadString;
                                            // dripper_2
                                            if (Contstatus.controlstatus_2 === "1") {
                                                $(".dash_c2").show();
                                                $(".title_c2").html(Contname.conttrolname_2);

                                                if (cont_status === "off") {
                                                    $(".img_c2").attr("src", "dist/images/control/" + Controlimg.drip_2_off);

                                                    $(".sw_drip2_on").removeClass("text-white btn-success").html('<i class="fa fa-square-o"></i> ON');
                                                    $(".sw_drip2_off").addClass("text-white btn-danger active").html('<i class="fa fa-check-square-o"></i> OFF');
                                                } else { // "ON"
                                                    $(".img_c2").attr("src", "dist/images/control/" + Controlimg.drip_2_on);

                                                    $(".sw_drip2_off").removeClass("text-white btn-danger").html('<i class="fa fa-square-o"></i> OFF');
                                                    $(".sw_drip2_on").addClass("text-white btn-success active").html('<i class="fa fa-check-square-o"></i> ON');
                                                }

                                            } else {
                                                $(".dash_c2").hide();
                                            }
                                            swal.close();
                                        }
                                        // ---------------------------------------------------------------------------
                                        // mode_Control_3
                                        else if (message.destinationName == "KMUMT001/1/control/control_st_3") {
                                            var cont_status = message.payloadString;
                                            // dripper_3
                                            if (Contstatus.controlstatus_3 === "1") {
                                                $(".dash_c3").show();
                                                $(".title_c3").html(Contname.conttrolname_3);

                                                if (cont_status === "off") {
                                                    $(".img_c3").attr("src", "dist/images/control/" + Controlimg.drip_3_off);

                                                    $(".sw_drip3_on").removeClass("text-white btn-success").html('<i class="fa fa-square-o"></i> ON');
                                                    $(".sw_drip3_off").addClass("text-white btn-danger active").html('<i class="fa fa-check-square-o"></i> OFF');
                                                } else { // "ON"
                                                    $(".img_c3").attr("src", "dist/images/control/" + Controlimg.drip_3_on);

                                                    $(".sw_drip3_off").removeClass("text-white btn-danger").html('<i class="fa fa-square-o"></i> OFF');
                                                    $(".sw_drip3_on").addClass("text-white btn-success active").html('<i class="fa fa-check-square-o"></i> ON');
                                                }

                                            } else {
                                                $(".dash_c3").hide();
                                            }
                                            swal.close();
                                        }
                                        // ---------------------------------------------------------------------------
                                        // mode_Control_4
                                        else if (message.destinationName == "KMUMT001/1/control/control_st_4") {
                                            var cont_status = message.payloadString;

                                            // dripper_4
                                            if (Contstatus.controlstatus_4 === "1") {
                                                $(".dash_c4").show();
                                                $(".title_c4").html(Contname.conttrolname_4);

                                                if (cont_status === "off") {
                                                    $(".img_c4").attr("src", "dist/images/control/" + Controlimg.drip_4_off);

                                                    $(".sw_drip4_on").removeClass("text-white btn-success").html('<i class="fa fa-square-o"></i> ON');
                                                    $(".sw_drip4_off").addClass("text-white btn-danger active").html('<i class="fa fa-check-square-o"></i> OFF');
                                                } else { // "ON"
                                                    $(".img_c4").attr("src", "dist/images/control/" + Controlimg.drip_4_on);

                                                    $(".sw_drip4_off").removeClass("text-white btn-danger").html('<i class="fa fa-square-o"></i> OFF');
                                                    $(".sw_drip4_on").addClass("text-white btn-success active").html('<i class="fa fa-check-square-o"></i> ON');
                                                }

                                            } else {
                                                $(".dash_c4").hide();
                                            }
                                            swal.close();
                                        }
                                        // ---------------------------------------------------------------------------
                                        // mode_Control_5
                                        else if (message.destinationName == "KMUMT001/1/control/control_st_5") {
                                            var cont_status = message.payloadString;

                                            // dripper_5
                                            if (Contstatus.controlstatus_5 === "1") {
                                                $(".dash_c5").show();
                                                $(".title_c5").html(Contname.conttrolname_5);
                                                if (cont_status === "off") {
                                                    $(".img_c5").attr("src", "dist/images/control/" + Controlimg.drip_5_off);

                                                    $(".sw_drip5_on").removeClass("text-white btn-success").html('<i class="fa fa-square-o"></i> ON');
                                                    $(".sw_drip5_off").addClass("text-white btn-danger active").html('<i class="fa fa-check-square-o"></i> OFF');
                                                } else { // "ON"
                                                    $(".img_c5").attr("src", "dist/images/control/" + Controlimg.drip_5_on);

                                                    $(".sw_drip5_off").removeClass("text-white btn-danger").html('<i class="fa fa-square-o"></i> OFF');
                                                    $(".sw_drip5_on").addClass("text-white btn-success active").html('<i class="fa fa-check-square-o"></i> ON');
                                                }
                                            } else {
                                                $(".dash_c5").hide();
                                            }
                                            swal.close();
                                        }
                                    }
                                } // exit_message
                                connect();

                                // Dashboard_Chart
                                if (res_chart !== "null") {
                                    if (Status[0] === "1") {
                                        if (Sensor_mode[0] === "7" || Sensor_mode[0] === "6") {
                                            var chartUnit_1 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[0] === "5" || Sensor_mode[0] === "4") {
                                            var chartUnit_1 = "kLux";
                                        } else {
                                            var chartUnit_1 = Unit_sn[1];
                                        }

                                        var chart_1 = am4core.create("chart_1", am4charts.XYChart);
                                        chart_1.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_1.data = res_chart;

                                        var dateAxis_1 = chart_1.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_1.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_1.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_1 = chart_1.yAxes.push(new am4charts.ValueAxis());

                                        var series_1 = chart_1.series.push(new am4charts.LineSeries());
                                        series_1.dataFields.valueY = "chart_1";
                                        series_1.dataFields.dateX = "timestamp";
                                        series_1.tooltipText = "{chart_1} (" + chartUnit_1 + ")";
                                        series_1.strokeWidth = 2;

                                        chart_1.cursor = new am4charts.XYCursor();
                                        chart_1.cursor.snapToSeries = series_1;
                                        chart_1.cursor.xAxis = dateAxis_1;
                                    }
                                    if (Status[1] === "1") {
                                        if (Sensor_mode[1] === "7" || Sensor_mode[1] === "6") {
                                            var chartUnit_2 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[1] === "5" || Sensor_mode[1] === "4") {
                                            var chartUnit_2 = "kLux";
                                        } else {
                                            var chartUnit_2 = Unit_sn[2];
                                        }

                                        var chart_2 = am4core.create("chart_2", am4charts.XYChart);
                                        chart_2.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_2.data = res_chart;

                                        var dateAxis_2 = chart_2.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_2.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_2.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_2 = chart_2.yAxes.push(new am4charts.ValueAxis());

                                        var series_2 = chart_2.series.push(new am4charts.LineSeries());
                                        series_2.dataFields.valueY = "chart_2";
                                        series_2.dataFields.dateX = "timestamp";
                                        series_2.tooltipText = "{chart_2} (" + chartUnit_2 + ")";
                                        series_2.strokeWidth = 2;

                                        chart_2.cursor = new am4charts.XYCursor();
                                        chart_2.cursor.snapToSeries = series_2;
                                        chart_2.cursor.xAxis = dateAxis_2;
                                    }
                                    if (Status[2] === "1") {
                                        if (Sensor_mode[2] === "7" || Sensor_mode[2] === "6") {
                                            var chartUnit_3 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[2] === "5" || Sensor_mode[2] === "4") {
                                            var chartUnit_3 = "kLux";
                                        } else {
                                            var chartUnit_3 = Unit_sn[3];
                                        }

                                        var chart_3 = am4core.create("chart_3", am4charts.XYChart);
                                        chart_3.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_3.data = res_chart;

                                        var dateAxis_3 = chart_3.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_3.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_3.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_3 = chart_3.yAxes.push(new am4charts.ValueAxis());

                                        var series_3 = chart_3.series.push(new am4charts.LineSeries());
                                        series_3.dataFields.valueY = "chart_3";
                                        series_3.dataFields.dateX = "timestamp";
                                        series_3.tooltipText = "{chart_3} (" + chartUnit_3 + ")";
                                        series_3.strokeWidth = 2;

                                        chart_3.cursor = new am4charts.XYCursor();
                                        chart_3.cursor.snapToSeries = series_3;
                                        chart_3.cursor.xAxis = dateAxis_3;
                                    }
                                    if (Status[3] === "1") {
                                        if (Sensor_mode[3] === "7" || Sensor_mode[3] === "6") {
                                            var chartUnit_4 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[3] === "5" || Sensor_mode[3] === "4") {
                                            var chartUnit_4 = "kLux";
                                        } else {
                                            var chartUnit_4 = Unit_sn[4];
                                        }

                                        var chart_4 = am4core.create("chart_4", am4charts.XYChart);
                                        chart_4.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_4.data = res_chart;

                                        var dateAxis_4 = chart_4.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_4.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_4.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_4 = chart_4.yAxes.push(new am4charts.ValueAxis());

                                        var series_4 = chart_4.series.push(new am4charts.LineSeries());
                                        series_4.dataFields.valueY = "chart_4";
                                        series_4.dataFields.dateX = "timestamp";
                                        series_4.tooltipText = "{chart_4} (" + chartUnit_4 + ")";
                                        series_4.strokeWidth = 2;

                                        chart_4.cursor = new am4charts.XYCursor();
                                        chart_4.cursor.snapToSeries = series_4;
                                        chart_4.cursor.xAxis = dateAxis_4;
                                    }
                                    if (Status[4] === "1") {
                                        if (Sensor_mode[4] === "7" || Sensor_mode[4] === "6") {
                                            var chartUnit_5 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[4] === "5" || Sensor_mode[4] === "4") {
                                            var chartUnit_5 = "kLux";
                                        } else {
                                            var chartUnit_5 = Unit_sn[5];
                                        }

                                        var chart_5 = am4core.create("chart_5", am4charts.XYChart);
                                        chart_5.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_5.data = res_chart;

                                        var dateAxis_5 = chart_5.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_5.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_5.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_5 = chart_5.yAxes.push(new am4charts.ValueAxis());

                                        var series_5 = chart_5.series.push(new am4charts.LineSeries());
                                        series_5.dataFields.valueY = "chart_5";
                                        series_5.dataFields.dateX = "timestamp";
                                        series_5.tooltipText = "{chart_5} (" + chartUnit_5 + ")";
                                        series_5.strokeWidth = 2;

                                        chart_5.cursor = new am4charts.XYCursor();
                                        chart_5.cursor.snapToSeries = series_5;
                                        chart_5.cursor.xAxis = dateAxis_5;
                                    }
                                    if (Status[5] === "1") {
                                        if (Sensor_mode[5] === "7" || Sensor_mode[5] === "6") {
                                            var chartUnit_6 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[5] === "5" || Sensor_mode[5] === "4") {
                                            var chartUnit_6 = "kLux";
                                        } else {
                                            var chartUnit_6 = Unit_sn[6];
                                        }

                                        var chart_6 = am4core.create("chart_6", am4charts.XYChart);
                                        chart_6.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_6.data = res_chart;

                                        var dateAxis_6 = chart_6.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_6.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_6.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_6 = chart_6.yAxes.push(new am4charts.ValueAxis());

                                        var series_6 = chart_6.series.push(new am4charts.LineSeries());
                                        series_6.dataFields.valueY = "chart_6";
                                        series_6.dataFields.dateX = "timestamp";
                                        series_6.tooltipText = "{chart_6} (" + chartUnit_6 + ")";
                                        series_6.strokeWidth = 2;

                                        chart_6.cursor = new am4charts.XYCursor();
                                        chart_6.cursor.snapToSeries = series_6;
                                        chart_6.cursor.xAxis = dateAxis_6;
                                    }
                                    if (Status[6] === "1") {
                                        if (Sensor_mode[6] === "7" || Sensor_mode[6] === "6") {
                                            var chartUnit_7 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[6] === "5" || Sensor_mode[6] === "4") {
                                            var chartUnit_7 = "kLux";
                                        } else {
                                            var chartUnit_7 = Unit_sn[7];
                                        }

                                        var chart_7 = am4core.create("chart_7", am4charts.XYChart);
                                        chart_7.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_7.data = res_chart;

                                        var dateAxis_7 = chart_7.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_7.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_7.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_7 = chart_7.yAxes.push(new am4charts.ValueAxis());

                                        var series_7 = chart_7.series.push(new am4charts.LineSeries());
                                        series_7.dataFields.valueY = "chart_7";
                                        series_7.dataFields.dateX = "timestamp";
                                        series_7.tooltipText = "{chart_7} (" + chartUnit_7 + ")";
                                        series_7.strokeWidth = 2;

                                        chart_7.cursor = new am4charts.XYCursor();
                                        chart_7.cursor.snapToSeries = series_7;
                                        chart_7.cursor.xAxis = dateAxis_7;
                                    }
                                    if (Status[7] === "1") {
                                        if (Sensor_mode[7] === "7" || Sensor_mode[7] === "6") {
                                            var chartUnit_8 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[7] === "5" || Sensor_mode[7] === "4") {
                                            var chartUnit_8 = "kLux";
                                        } else {
                                            var chartUnit_8 = Unit_sn[8];
                                        }

                                        var chart_8 = am4core.create("chart_8", am4charts.XYChart);
                                        chart_8.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_8.data = res_chart;

                                        var dateAxis_8 = chart_8.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_8.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_8.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_8 = chart_8.yAxes.push(new am4charts.ValueAxis());

                                        var series_8 = chart_8.series.push(new am4charts.LineSeries());
                                        series_8.dataFields.valueY = "chart_8";
                                        series_8.dataFields.dateX = "timestamp";
                                        series_8.tooltipText = "{chart_8} (" + chartUnit_8 + ")";
                                        series_8.strokeWidth = 2;

                                        chart_8.cursor = new am4charts.XYCursor();
                                        chart_8.cursor.snapToSeries = series_8;
                                        chart_8.cursor.xAxis = dateAxis_8;
                                    }
                                    if (Status[8] === "1") {
                                        if (Sensor_mode[8] === "7" || Sensor_mode[8] === "6") {
                                            var chartUnit_9 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[8] === "5" || Sensor_mode[8] === "4") {
                                            var chartUnit_9 = "kLux";
                                        } else {
                                            var chartUnit_9 = Unit_sn[9];
                                        }

                                        var chart_9 = am4core.create("chart_9", am4charts.XYChart);
                                        chart_9.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_9.data = res_chart;

                                        var dateAxis_9 = chart_9.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_9.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_9.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_9 = chart_9.yAxes.push(new am4charts.ValueAxis());

                                        var series_9 = chart_9.series.push(new am4charts.LineSeries());
                                        series_9.dataFields.valueY = "chart_9";
                                        series_9.dataFields.dateX = "timestamp";
                                        series_9.tooltipText = "{chart_9} (" + chartUnit_9 + ")";
                                        series_9.strokeWidth = 2;

                                        chart_9.cursor = new am4charts.XYCursor();
                                        chart_9.cursor.snapToSeries = series_9;
                                        chart_9.cursor.xAxis = dateAxis_9;
                                    }
                                    if (Status[9] === "1") {
                                        if (Sensor_mode[9] === "7" || Sensor_mode[9] === "6") {
                                            var chartUnit_10 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[9] === "5" || Sensor_mode[9] === "4") {
                                            var chartUnit_10 = "kLux";
                                        } else {
                                            var chartUnit_10 = Unit_sn[10];
                                        }

                                        var chart_10 = am4core.create("chart_10", am4charts.XYChart);
                                        chart_10.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_10.data = res_chart;

                                        var dateAxis_10 = chart_10.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_10.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_10.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_10 = chart_10.yAxes.push(new am4charts.ValueAxis());

                                        var series_10 = chart_10.series.push(new am4charts.LineSeries());
                                        series_10.dataFields.valueY = "chart_10";
                                        series_10.dataFields.dateX = "timestamp";
                                        series_10.tooltipText = "{chart_10} (" + chartUnit_10 + ")";
                                        series_10.strokeWidth = 2;

                                        chart_10.cursor = new am4charts.XYCursor();
                                        chart_10.cursor.snapToSeries = series_10;
                                        chart_10.cursor.xAxis = dateAxis_10;
                                    }
                                    if (Status[10] === "1") {
                                        if (Sensor_mode[10] === "7" || Sensor_mode[10] === "6") {
                                            var chartUnit_11 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[10] === "5" || Sensor_mode[10] === "4") {
                                            var chartUnit_11 = "kLux";
                                        } else {
                                            var chartUnit_11 = Unit_sn[11];
                                        }

                                        var chart_11 = am4core.create("chart_11", am4charts.XYChart);
                                        chart_11.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_11.data = res_chart;

                                        var dateAxis_11 = chart_11.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_11.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_11.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_11 = chart_11.yAxes.push(new am4charts.ValueAxis());

                                        var series_11 = chart_11.series.push(new am4charts.LineSeries());
                                        series_11.dataFields.valueY = "chart_11";
                                        series_11.dataFields.dateX = "timestamp";
                                        series_11.tooltipText = "{chart_11} (" + chartUnit_11 + ")";
                                        series_11.strokeWidth = 2;

                                        chart_11.cursor = new am4charts.XYCursor();
                                        chart_11.cursor.snapToSeries = series_11;
                                        chart_11.cursor.xAxis = dateAxis_11;
                                    }
                                    if (Status[11] === "1") {
                                        if (Sensor_mode[11] === "7" || Sensor_mode[11] === "6") {
                                            var chartUnit_12 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[11] === "5" || Sensor_mode[11] === "4") {
                                            var chartUnit_12 = "kLux";
                                        } else {
                                            var chartUnit_12 = Unit_sn[12];
                                        }

                                        var chart_12 = am4core.create("chart_12", am4charts.XYChart);
                                        chart_12.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_12.data = res_chart;

                                        var dateAxis_12 = chart_12.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_12.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_12.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_12 = chart_12.yAxes.push(new am4charts.ValueAxis());

                                        var series_12 = chart_12.series.push(new am4charts.LineSeries());
                                        series_12.dataFields.valueY = "chart_12";
                                        series_12.dataFields.dateX = "timestamp";
                                        series_12.tooltipText = "{chart_12} (" + chartUnit_12 + ")";
                                        series_12.strokeWidth = 2;

                                        chart_12.cursor = new am4charts.XYCursor();
                                        chart_12.cursor.snapToSeries = series_12;
                                        chart_12.cursor.xAxis = dateAxis_12;
                                    }
                                    if (Status[12] === "1") {
                                        if (Sensor_mode[12] === "7" || Sensor_mode[12] === "6") {
                                            var chartUnit_13 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[12] === "5" || Sensor_mode[12] === "4") {
                                            var chartUnit_13 = "kLux";
                                        } else {
                                            var chartUnit_13 = Unit_sn[13];
                                        }

                                        var chart_13 = am4core.create("chart_13", am4charts.XYChart);
                                        chart_13.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_13.data = res_chart;

                                        var dateAxis_13 = chart_13.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_13.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_13.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_13 = chart_13.yAxes.push(new am4charts.ValueAxis());

                                        var series_13 = chart_13.series.push(new am4charts.LineSeries());
                                        series_13.dataFields.valueY = "chart_13";
                                        series_13.dataFields.dateX = "timestamp";
                                        series_13.tooltipText = "{chart_13} (" + chartUnit_13 + ")";
                                        series_13.strokeWidth = 2;

                                        chart_13.cursor = new am4charts.XYCursor();
                                        chart_13.cursor.snapToSeries = series_13;
                                        chart_13.cursor.xAxis = dateAxis_13;
                                    }
                                    if (Status[13] === "1") {
                                        if (Sensor_mode[13] === "7" || Sensor_mode[13] === "6") {
                                            var chartUnit_14 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[13] === "5" || Sensor_mode[13] === "4") {
                                            var chartUnit_14 = "kLux";
                                        } else {
                                            var chartUnit_14 = Unit_sn[14];
                                        }

                                        var chart_14 = am4core.create("chart_14", am4charts.XYChart);
                                        chart_14.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_14.data = res_chart;

                                        var dateAxis_14 = chart_14.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_14.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_14.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_14 = chart_14.yAxes.push(new am4charts.ValueAxis());

                                        var series_14 = chart_14.series.push(new am4charts.LineSeries());
                                        series_14.dataFields.valueY = "chart_14";
                                        series_14.dataFields.dateX = "timestamp";
                                        series_14.tooltipText = "{chart_14} (" + chartUnit_14 + ")";
                                        series_14.strokeWidth = 2;

                                        chart_14.cursor = new am4charts.XYCursor();
                                        chart_14.cursor.snapToSeries = series_14;
                                        chart_14.cursor.xAxis = dateAxis_14;
                                    }
                                    if (Status[14] === "1") {
                                        if (Sensor_mode[14] === "7" || Sensor_mode[14] === "6") {
                                            var chartUnit_15 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[14] === "5" || Sensor_mode[14] === "4") {
                                            var chartUnit_15 = "kLux";
                                        } else {
                                            var chartUnit_15 = Unit_sn[15];
                                        }

                                        var chart_15 = am4core.create("chart_15", am4charts.XYChart);
                                        chart_15.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_15.data = res_chart;

                                        var dateAxis_15 = chart_15.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_15.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_15.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_15 = chart_15.yAxes.push(new am4charts.ValueAxis());

                                        var series_15 = chart_15.series.push(new am4charts.LineSeries());
                                        series_15.dataFields.valueY = "chart_15";
                                        series_15.dataFields.dateX = "timestamp";
                                        series_15.tooltipText = "{chart_15} (" + chartUnit_15 + ")";
                                        series_15.strokeWidth = 2;

                                        chart_15.cursor = new am4charts.XYCursor();
                                        chart_15.cursor.snapToSeries = series_15;
                                        chart_15.cursor.xAxis = dateAxis_15;
                                    }
                                    if (Status[15] === "1") {
                                        if (Sensor_mode[15] === "7" || Sensor_mode[15] === "6") {
                                            var chartUnit_16 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[15] === "5" || Sensor_mode[15] === "4") {
                                            var chartUnit_16 = "kLux";
                                        } else {
                                            var chartUnit_16 = Unit_sn[16];
                                        }

                                        var chart_16 = am4core.create("chart_16", am4charts.XYChart);
                                        chart_16.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_16.data = res_chart;

                                        var dateAxis_16 = chart_16.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_16.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_16.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_16 = chart_16.yAxes.push(new am4charts.ValueAxis());

                                        var series_16 = chart_16.series.push(new am4charts.LineSeries());
                                        series_16.dataFields.valueY = "chart_16";
                                        series_16.dataFields.dateX = "timestamp";
                                        series_16.tooltipText = "{chart_16} (" + chartUnit_16 + ")";
                                        series_16.strokeWidth = 2;

                                        chart_16.cursor = new am4charts.XYCursor();
                                        chart_16.cursor.snapToSeries = series_16;
                                        chart_16.cursor.xAxis = dateAxis_16;
                                    }
                                    if (Status[16] === "1") {
                                        if (Sensor_mode[16] === "7" || Sensor_mode[16] === "6") {
                                            var chartUnit_17 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[16] === "5" || Sensor_mode[16] === "4") {
                                            var chartUnit_17 = "kLux";
                                        } else {
                                            var chartUnit_17 = Unit_sn[17];
                                        }

                                        var chart_17 = am4core.create("chart_17", am4charts.XYChart);
                                        chart_17.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_17.data = res_chart;

                                        var dateAxis_17 = chart_17.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_17.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_17.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_17 = chart_17.yAxes.push(new am4charts.ValueAxis());

                                        var series_17 = chart_17.series.push(new am4charts.LineSeries());
                                        series_17.dataFields.valueY = "chart_17";
                                        series_17.dataFields.dateX = "timestamp";
                                        series_17.tooltipText = "{chart_17} (" + chartUnit_17 + ")";
                                        series_17.strokeWidth = 2;

                                        chart_17.cursor = new am4charts.XYCursor();
                                        chart_17.cursor.snapToSeries = series_17;
                                        chart_17.cursor.xAxis = dateAxis_17;
                                    }
                                    if (Status[17] === "1") {
                                        if (Sensor_mode[17] === "7" || Sensor_mode[17] === "6") {
                                            var chartUnit_18 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[17] === "5" || Sensor_mode[17] === "4") {
                                            var chartUnit_18 = "kLux";
                                        } else {
                                            var chartUnit_18 = Unit_sn[18];
                                        }

                                        var chart_18 = am4core.create("chart_18", am4charts.XYChart);
                                        chart_18.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_18.data = res_chart;

                                        var dateAxis_18 = chart_18.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_18.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_18.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_18 = chart_18.yAxes.push(new am4charts.ValueAxis());

                                        var series_18 = chart_18.series.push(new am4charts.LineSeries());
                                        series_18.dataFields.valueY = "chart_18";
                                        series_18.dataFields.dateX = "timestamp";
                                        series_18.tooltipText = "{chart_18} (" + chartUnit_18 + ")";
                                        series_18.strokeWidth = 2;

                                        chart_18.cursor = new am4charts.XYCursor();
                                        chart_18.cursor.snapToSeries = series_18;
                                        chart_18.cursor.xAxis = dateAxis_18;
                                    }
                                    if (Status[18] === "1") {
                                        if (Sensor_mode[18] === "7" || Sensor_mode[18] === "6") {
                                            var chartUnit_19 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[18] === "5" || Sensor_mode[18] === "4") {
                                            var chartUnit_19 = "kLux";
                                        } else {
                                            var chartUnit_19 = Unit_sn[19];
                                        }

                                        var chart_19 = am4core.create("chart_19", am4charts.XYChart);
                                        chart_19.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_19.data = res_chart;

                                        var dateAxis_19 = chart_19.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_19.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_19.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_19 = chart_19.yAxes.push(new am4charts.ValueAxis());

                                        var series_19 = chart_19.series.push(new am4charts.LineSeries());
                                        series_19.dataFields.valueY = "chart_19";
                                        series_19.dataFields.dateX = "timestamp";
                                        series_19.tooltipText = "{chart_19} (" + chartUnit_19 + ")";
                                        series_19.strokeWidth = 2;

                                        chart_19.cursor = new am4charts.XYCursor();
                                        chart_19.cursor.snapToSeries = series_19;
                                        chart_19.cursor.xAxis = dateAxis_19;
                                    }
                                    if (Status[19] === "1") {
                                        if (Sensor_mode[19] === "7" || Sensor_mode[19] === "6") {
                                            var chartUnit_20 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[19] === "5" || Sensor_mode[19] === "4") {
                                            var chartUnit_20 = "kLux";
                                        } else {
                                            var chartUnit_20 = Unit_sn[20];
                                        }

                                        var chart_20 = am4core.create("chart_20", am4charts.XYChart);
                                        chart_20.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_20.data = res_chart;

                                        var dateAxis_20 = chart_20.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_20.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_20.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_20 = chart_20.yAxes.push(new am4charts.ValueAxis());

                                        var series_20 = chart_20.series.push(new am4charts.LineSeries());
                                        series_20.dataFields.valueY = "chart_20";
                                        series_20.dataFields.dateX = "timestamp";
                                        series_20.tooltipText = "{chart_20} (" + chartUnit_20 + ")";
                                        series_20.strokeWidth = 2;

                                        chart_20.cursor = new am4charts.XYCursor();
                                        chart_20.cursor.snapToSeries = series_20;
                                        chart_20.cursor.xAxis = dateAxis_20;
                                    }
                                    if (Status[20] === "1") {
                                        if (Sensor_mode[20] === "7" || Sensor_mode[20] === "6") {
                                            var chartUnit_21 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[20] === "5" || Sensor_mode[20] === "4") {
                                            var chartUnit_21 = "kLux";
                                        } else {
                                            var chartUnit_21 = Unit_sn[21];
                                        }

                                        var chart_21 = am4core.create("chart_21", am4charts.XYChart);
                                        chart_21.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_21.data = res_chart;

                                        var dateAxis_21 = chart_21.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_21.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_21.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_21 = chart_21.yAxes.push(new am4charts.ValueAxis());

                                        var series_21 = chart_21.series.push(new am4charts.LineSeries());
                                        series_21.dataFields.valueY = "chart_21";
                                        series_21.dataFields.dateX = "timestamp";
                                        series_21.tooltipText = "{chart_21} (" + chartUnit_21 + ")";
                                        series_21.strokeWidth = 2;

                                        chart_21.cursor = new am4charts.XYCursor();
                                        chart_21.cursor.snapToSeries = series_21;
                                        chart_21.cursor.xAxis = dateAxis_21;
                                    }
                                    if (Status[21] === "1") {
                                        if (Sensor_mode[21] === "7" || Sensor_mode[21] === "6") {
                                            var chartUnit_22 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[21] === "5" || Sensor_mode[21] === "4") {
                                            var chartUnit_22 = "kLux";
                                        } else {
                                            var chartUnit_22 = Unit_sn[22];
                                        }

                                        var chart_22 = am4core.create("chart_22", am4charts.XYChart);
                                        chart_22.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_22.data = res_chart;

                                        var dateAxis_22 = chart_22.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_22.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_22.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_22 = chart_22.yAxes.push(new am4charts.ValueAxis());

                                        var series_22 = chart_22.series.push(new am4charts.LineSeries());
                                        series_22.dataFields.valueY = "chart_22";
                                        series_22.dataFields.dateX = "timestamp";
                                        series_22.tooltipText = "{chart_22} (" + chartUnit_22 + ")";
                                        series_22.strokeWidth = 2;

                                        chart_22.cursor = new am4charts.XYCursor();
                                        chart_22.cursor.snapToSeries = series_22;
                                        chart_22.cursor.xAxis = dateAxis_22;
                                    }
                                    if (Status[22] === "1") {
                                        if (Sensor_mode[22] === "7" || Sensor_mode[22] === "6") {
                                            var chartUnit_23 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[22] === "5" || Sensor_mode[22] === "4") {
                                            var chartUnit_23 = "kLux";
                                        } else {
                                            var chartUnit_23 = Unit_sn[23];
                                        }

                                        var chart_23 = am4core.create("chart_23", am4charts.XYChart);
                                        chart_23.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_23.data = res_chart;

                                        var dateAxis_23 = chart_23.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_23.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_23.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_23 = chart_23.yAxes.push(new am4charts.ValueAxis());

                                        var series_23 = chart_23.series.push(new am4charts.LineSeries());
                                        series_23.dataFields.valueY = "chart_23";
                                        series_23.dataFields.dateX = "timestamp";
                                        series_23.tooltipText = "{chart_23} (" + chartUnit_23 + ")";
                                        series_23.strokeWidth = 2;

                                        chart_23.cursor = new am4charts.XYCursor();
                                        chart_23.cursor.snapToSeries = series_23;
                                        chart_23.cursor.xAxis = dateAxis_23;
                                    }
                                    if (Status[23] === "1") {
                                        if (Sensor_mode[23] === "7" || Sensor_mode[23] === "6") {
                                            var chartUnit_24 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[23] === "5" || Sensor_mode[23] === "4") {
                                            var chartUnit_24 = "kLux";
                                        } else {
                                            var chartUnit_24 = Unit_sn[24];
                                        }

                                        var chart_24 = am4core.create("chart_24", am4charts.XYChart);
                                        chart_24.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_24.data = res_chart;

                                        var dateAxis_24 = chart_24.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_24.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_24.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_24 = chart_24.yAxes.push(new am4charts.ValueAxis());

                                        var series_24 = chart_24.series.push(new am4charts.LineSeries());
                                        series_24.dataFields.valueY = "chart_24";
                                        series_24.dataFields.dateX = "timestamp";
                                        series_24.tooltipText = "{chart_24} (" + chartUnit_24 + ")";
                                        series_24.strokeWidth = 2;

                                        chart_24.cursor = new am4charts.XYCursor();
                                        chart_24.cursor.snapToSeries = series_24;
                                        chart_24.cursor.xAxis = dateAxis_24;
                                    }
                                    if (Status[24] === "1") {
                                        if (Sensor_mode[24] === "7" || Sensor_mode[24] === "6") {
                                            var chartUnit_25 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[24] === "5" || Sensor_mode[24] === "4") {
                                            var chartUnit_25 = "kLux";
                                        } else {
                                            var chartUnit_25 = Unit_sn[25];
                                        }

                                        var chart_25 = am4core.create("chart_25", am4charts.XYChart);
                                        chart_25.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_25.data = res_chart;

                                        var dateAxis_25 = chart_25.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_25.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_25.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_25 = chart_25.yAxes.push(new am4charts.ValueAxis());

                                        var series_25 = chart_25.series.push(new am4charts.LineSeries());
                                        series_25.dataFields.valueY = "chart_25";
                                        series_25.dataFields.dateX = "timestamp";
                                        series_25.tooltipText = "{chart_25} (" + chartUnit_25 + ")";
                                        series_25.strokeWidth = 2;

                                        chart_25.cursor = new am4charts.XYCursor();
                                        chart_25.cursor.snapToSeries = series_25;
                                        chart_25.cursor.xAxis = dateAxis_25;
                                    }
                                    if (Status[25] === "1") {
                                        if (Sensor_mode[25] === "7" || Sensor_mode[25] === "6") {
                                            var chartUnit_26 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[25] === "5" || Sensor_mode[25] === "4") {
                                            var chartUnit_26 = "kLux";
                                        } else {
                                            var chartUnit_26 = Unit_sn[26];
                                        }

                                        var chart_26 = am4core.create("chart_26", am4charts.XYChart);
                                        chart_26.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_26.data = res_chart;

                                        var dateAxis_26 = chart_26.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_26.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_26.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_26 = chart_26.yAxes.push(new am4charts.ValueAxis());

                                        var series_26 = chart_26.series.push(new am4charts.LineSeries());
                                        series_26.dataFields.valueY = "chart_26";
                                        series_26.dataFields.dateX = "timestamp";
                                        series_26.tooltipText = "{chart_26} (" + chartUnit_26 + ")";
                                        series_26.strokeWidth = 2;

                                        chart_26.cursor = new am4charts.XYCursor();
                                        chart_26.cursor.snapToSeries = series_26;
                                        chart_26.cursor.xAxis = dateAxis_26;
                                    }
                                    if (Status[26] === "1") {
                                        if (Sensor_mode[26] === "7" || Sensor_mode[26] === "6") {
                                            var chartUnit_27 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[26] === "5" || Sensor_mode[26] === "4") {
                                            var chartUnit_27 = "kLux";
                                        } else {
                                            var chartUnit_27 = Unit_sn[27];
                                        }

                                        var chart_27 = am4core.create("chart_27", am4charts.XYChart);
                                        chart_27.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_27.data = res_chart;

                                        var dateAxis_27 = chart_27.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_27.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_27.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_27 = chart_27.yAxes.push(new am4charts.ValueAxis());

                                        var series_27 = chart_27.series.push(new am4charts.LineSeries());
                                        series_27.dataFields.valueY = "chart_27";
                                        series_27.dataFields.dateX = "timestamp";
                                        series_27.tooltipText = "{chart_27} (" + chartUnit_27 + ")";
                                        series_27.strokeWidth = 2;

                                        chart_27.cursor = new am4charts.XYCursor();
                                        chart_27.cursor.snapToSeries = series_27;
                                        chart_27.cursor.xAxis = dateAxis_27;
                                    }
                                    if (Status[27] === "1") {
                                        if (Sensor_mode[27] === "7" || Sensor_mode[27] === "6") {
                                            var chartUnit_28 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[27] === "5" || Sensor_mode[27] === "4") {
                                            var chartUnit_28 = "kLux";
                                        } else {
                                            var chartUnit_28 = Unit_sn[28];
                                        }

                                        var chart_28 = am4core.create("chart_28", am4charts.XYChart);
                                        chart_28.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_28.data = res_chart;

                                        var dateAxis_28 = chart_28.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_28.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_28.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_28 = chart_28.yAxes.push(new am4charts.ValueAxis());

                                        var series_28 = chart_28.series.push(new am4charts.LineSeries());
                                        series_28.dataFields.valueY = "chart_28";
                                        series_28.dataFields.dateX = "timestamp";
                                        series_28.tooltipText = "{chart_28} (" + chartUnit_28 + ")";
                                        series_28.strokeWidth = 2;

                                        chart_28.cursor = new am4charts.XYCursor();
                                        chart_28.cursor.snapToSeries = series_28;
                                        chart_28.cursor.xAxis = dateAxis_28;
                                    }
                                    if (Status[28] === "1") {
                                        if (Sensor_mode[28] === "7" || Sensor_mode[28] === "6") {
                                            var chartUnit_29 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[28] === "5" || Sensor_mode[28] === "4") {
                                            var chartUnit_29 = "kLux";
                                        } else {
                                            var chartUnit_29 = Unit_sn[29];
                                        }

                                        var chart_29 = am4core.create("chart_29", am4charts.XYChart);
                                        chart_29.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_29.data = res_chart;

                                        var dateAxis_29 = chart_29.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_29.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_29.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_29 = chart_29.yAxes.push(new am4charts.ValueAxis());

                                        var series_29 = chart_29.series.push(new am4charts.LineSeries());
                                        series_29.dataFields.valueY = "chart_29";
                                        series_29.dataFields.dateX = "timestamp";
                                        series_29.tooltipText = "{chart_29} (" + chartUnit_29 + ")";
                                        series_29.strokeWidth = 2;

                                        chart_29.cursor = new am4charts.XYCursor();
                                        chart_29.cursor.snapToSeries = series_29;
                                        chart_29.cursor.xAxis = dateAxis_29;
                                    }
                                    if (Status[29] === "1") {
                                        if (Sensor_mode[29] === "7" || Sensor_mode[29] === "6") {
                                            var chartUnit_30 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[29] === "5" || Sensor_mode[29] === "4") {
                                            var chartUnit_30 = "kLux";
                                        } else {
                                            var chartUnit_30 = Unit_sn[30];
                                        }

                                        var chart_30 = am4core.create("chart_30", am4charts.XYChart);
                                        chart_30.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_30.data = res_chart;

                                        var dateAxis_30 = chart_30.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_30.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_30.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_30 = chart_30.yAxes.push(new am4charts.ValueAxis());

                                        var series_30 = chart_30.series.push(new am4charts.LineSeries());
                                        series_30.dataFields.valueY = "chart_30";
                                        series_30.dataFields.dateX = "timestamp";
                                        series_30.tooltipText = "{chart_30} (" + chartUnit_30 + ")";
                                        series_30.strokeWidth = 2;

                                        chart_30.cursor = new am4charts.XYCursor();
                                        chart_30.cursor.snapToSeries = series_30;
                                        chart_30.cursor.xAxis = dateAxis_30;
                                    }
                                    if (Status[30] === "1") {
                                        if (Sensor_mode[30] === "7" || Sensor_mode[30] === "6") {
                                            var chartUnit_31 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[30] === "5" || Sensor_mode[30] === "4") {
                                            var chartUnit_31 = "kLux";
                                        } else {
                                            var chartUnit_31 = Unit_sn[31];
                                        }

                                        var chart_31 = am4core.create("chart_31", am4charts.XYChart);
                                        chart_31.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_31.data = res_chart;

                                        var dateAxis_31 = chart_31.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_31.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_31.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_31 = chart_31.yAxes.push(new am4charts.ValueAxis());

                                        var series_31 = chart_31.series.push(new am4charts.LineSeries());
                                        series_31.dataFields.valueY = "chart_31";
                                        series_31.dataFields.dateX = "timestamp";
                                        series_31.tooltipText = "{chart_31} (" + chartUnit_31 + ")";
                                        series_31.strokeWidth = 2;

                                        chart_31.cursor = new am4charts.XYCursor();
                                        chart_31.cursor.snapToSeries = series_31;
                                        chart_31.cursor.xAxis = dateAxis_31;
                                    }
                                    if (Status[31] === "1") {
                                        if (Sensor_mode[31] === "7" || Sensor_mode[31] === "6") {
                                            var chartUnit_32 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[31] === "5" || Sensor_mode[31] === "4") {
                                            var chartUnit_32 = "kLux";
                                        } else {
                                            var chartUnit_32 = Unit_sn[32];
                                        }

                                        var chart_32 = am4core.create("chart_32", am4charts.XYChart);
                                        chart_32.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_32.data = res_chart;

                                        var dateAxis_32 = chart_32.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_32.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_32.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_32 = chart_32.yAxes.push(new am4charts.ValueAxis());

                                        var series_32 = chart_32.series.push(new am4charts.LineSeries());
                                        series_32.dataFields.valueY = "chart_32";
                                        series_32.dataFields.dateX = "timestamp";
                                        series_32.tooltipText = "{chart_32} (" + chartUnit_32 + ")";
                                        series_32.strokeWidth = 2;

                                        chart_32.cursor = new am4charts.XYCursor();
                                        chart_32.cursor.snapToSeries = series_32;
                                        chart_32.cursor.xAxis = dateAxis_32;
                                    }
                                    if (Status[32] === "1") {
                                        if (Sensor_mode[32] === "7" || Sensor_mode[32] === "6") {
                                            var chartUnit_33 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[32] === "5" || Sensor_mode[32] === "4") {
                                            var chartUnit_33 = "kLux";
                                        } else {
                                            var chartUnit_33 = Unit_sn[33];
                                        }

                                        var chart_33 = am4core.create("chart_33", am4charts.XYChart);
                                        chart_33.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_33.data = res_chart;

                                        var dateAxis_33 = chart_33.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_33.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_33.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_33 = chart_33.yAxes.push(new am4charts.ValueAxis());

                                        var series_33 = chart_33.series.push(new am4charts.LineSeries());
                                        series_33.dataFields.valueY = "chart_33";
                                        series_33.dataFields.dateX = "timestamp";
                                        series_33.tooltipText = "{chart_33} (" + chartUnit_33 + ")";
                                        series_33.strokeWidth = 2;

                                        chart_33.cursor = new am4charts.XYCursor();
                                        chart_33.cursor.snapToSeries = series_33;
                                        chart_33.cursor.xAxis = dateAxis_33;
                                    }
                                    if (Status[33] === "1") {
                                        if (Sensor_mode[33] === "7" || Sensor_mode[33] === "6") {
                                            var chartUnit_34 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[33] === "5" || Sensor_mode[33] === "4") {
                                            var chartUnit_34 = "kLux";
                                        } else {
                                            var chartUnit_34 = Unit_sn[34];
                                        }

                                        var chart_34 = am4core.create("chart_34", am4charts.XYChart);
                                        chart_34.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_34.data = res_chart;

                                        var dateAxis_34 = chart_34.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_34.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_34.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_34 = chart_34.yAxes.push(new am4charts.ValueAxis());

                                        var series_34 = chart_34.series.push(new am4charts.LineSeries());
                                        series_34.dataFields.valueY = "chart_34";
                                        series_34.dataFields.dateX = "timestamp";
                                        series_34.tooltipText = "{chart_34} (" + chartUnit_34 + ")";
                                        series_34.strokeWidth = 2;

                                        chart_34.cursor = new am4charts.XYCursor();
                                        chart_34.cursor.snapToSeries = series_34;
                                        chart_34.cursor.xAxis = dateAxis_34;
                                    }
                                    if (Status[34] === "1") {
                                        if (Sensor_mode[34] === "7" || Sensor_mode[34] === "6") {
                                            var chartUnit_35 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[34] === "5" || Sensor_mode[34] === "4") {
                                            var chartUnit_35 = "kLux";
                                        } else {
                                            var chartUnit_35 = Unit_sn[35];
                                        }

                                        var chart_35 = am4core.create("chart_35", am4charts.XYChart);
                                        chart_35.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_35.data = res_chart;

                                        var dateAxis_35 = chart_35.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_35.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_35.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_35 = chart_35.yAxes.push(new am4charts.ValueAxis());

                                        var series_35 = chart_35.series.push(new am4charts.LineSeries());
                                        series_35.dataFields.valueY = "chart_35";
                                        series_35.dataFields.dateX = "timestamp";
                                        series_35.tooltipText = "{chart_35} (" + chartUnit_35 + ")";
                                        series_35.strokeWidth = 2;

                                        chart_35.cursor = new am4charts.XYCursor();
                                        chart_35.cursor.snapToSeries = series_35;
                                        chart_35.cursor.xAxis = dateAxis_35;
                                    }
                                    if (Status[35] === "1") {
                                        if (Sensor_mode[35] === "7" || Sensor_mode[35] === "6") {
                                            var chartUnit_36 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[35] === "5" || Sensor_mode[35] === "4") {
                                            var chartUnit_36 = "kLux";
                                        } else {
                                            var chartUnit_36 = Unit_sn[36];
                                        }

                                        var chart_36 = am4core.create("chart_36", am4charts.XYChart);
                                        chart_36.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_36.data = res_chart;

                                        var dateAxis_36 = chart_36.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_36.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_36.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_36 = chart_36.yAxes.push(new am4charts.ValueAxis());

                                        var series_36 = chart_36.series.push(new am4charts.LineSeries());
                                        series_36.dataFields.valueY = "chart_36";
                                        series_36.dataFields.dateX = "timestamp";
                                        series_36.tooltipText = "{chart_36} (" + chartUnit_36 + ")";
                                        series_36.strokeWidth = 2;

                                        chart_36.cursor = new am4charts.XYCursor();
                                        chart_36.cursor.snapToSeries = series_36;
                                        chart_36.cursor.xAxis = dateAxis_36;
                                    }
                                    if (Status[36] === "1") {
                                        if (Sensor_mode[36] === "7" || Sensor_mode[36] === "6") {
                                            var chartUnit_37 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[36] === "5" || Sensor_mode[36] === "4") {
                                            var chartUnit_37 = "kLux";
                                        } else {
                                            var chartUnit_37 = Unit_sn[37];
                                        }

                                        var chart_37 = am4core.create("chart_37", am4charts.XYChart);
                                        chart_37.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_37.data = res_chart;

                                        var dateAxis_37 = chart_37.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_37.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_37.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_37 = chart_37.yAxes.push(new am4charts.ValueAxis());

                                        var series_37 = chart_37.series.push(new am4charts.LineSeries());
                                        series_37.dataFields.valueY = "chart_37";
                                        series_37.dataFields.dateX = "timestamp";
                                        series_37.tooltipText = "{chart_37} (" + chartUnit_37 + ")";
                                        series_37.strokeWidth = 2;

                                        chart_37.cursor = new am4charts.XYCursor();
                                        chart_37.cursor.snapToSeries = series_37;
                                        chart_37.cursor.xAxis = dateAxis_37;
                                    }
                                    if (Status[37] === "1") {
                                        if (Sensor_mode[37] === "7" || Sensor_mode[37] === "6") {
                                            var chartUnit_38 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[37] === "5" || Sensor_mode[37] === "4") {
                                            var chartUnit_38 = "kLux";
                                        } else {
                                            var chartUnit_38 = Unit_sn[38];
                                        }

                                        var chart_38 = am4core.create("chart_38", am4charts.XYChart);
                                        chart_38.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_38.data = res_chart;

                                        var dateAxis_38 = chart_38.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_38.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_38.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_38 = chart_38.yAxes.push(new am4charts.ValueAxis());

                                        var series_38 = chart_38.series.push(new am4charts.LineSeries());
                                        series_38.dataFields.valueY = "chart_38";
                                        series_38.dataFields.dateX = "timestamp";
                                        series_38.tooltipText = "{chart_38} (" + chartUnit_38 + ")";
                                        series_38.strokeWidth = 2;

                                        chart_38.cursor = new am4charts.XYCursor();
                                        chart_38.cursor.snapToSeries = series_38;
                                        chart_38.cursor.xAxis = dateAxis_38;
                                    }
                                    if (Status[38] === "1") {
                                        if (Sensor_mode[38] === "7" || Sensor_mode[38] === "6") {
                                            var chartUnit_39 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[38] === "5" || Sensor_mode[38] === "4") {
                                            var chartUnit_39 = "kLux";
                                        } else {
                                            var chartUnit_39 = Unit_sn[39];
                                        }

                                        var chart_39 = am4core.create("chart_39", am4charts.XYChart);
                                        chart_39.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_39.data = res_chart;

                                        var dateAxis_39 = chart_39.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_39.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_39.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_39 = chart_39.yAxes.push(new am4charts.ValueAxis());

                                        var series_39 = chart_39.series.push(new am4charts.LineSeries());
                                        series_39.dataFields.valueY = "chart_39";
                                        series_39.dataFields.dateX = "timestamp";
                                        series_39.tooltipText = "{chart_39} (" + chartUnit_39 + ")";
                                        series_39.strokeWidth = 2;

                                        chart_39.cursor = new am4charts.XYCursor();
                                        chart_39.cursor.snapToSeries = series_39;
                                        chart_39.cursor.xAxis = dateAxis_39;
                                    }
                                    if (Status[39] === "1") {
                                        if (Sensor_mode[39] === "7" || Sensor_mode[39] === "6") {
                                            var chartUnit_40 = "µmol m[baseline-shift: super; font-size: 10;]-2[baseline-shift: baseline;]s[baseline-shift: super; font-size: 10;]-1[baseline-shift: baseline;]";
                                        } else if (Sensor_mode[39] === "5" || Sensor_mode[39] === "4") {
                                            var chartUnit_40 = "kLux";
                                        } else {
                                            var chartUnit_40 = Unit_sn[40];
                                        }

                                        var chart_40 = am4core.create("chart_40", am4charts.XYChart);
                                        chart_40.dateFormatter.inputDateFormat = "yyyy/MM/dd - HH:mm";

                                        chart_40.data = res_chart;

                                        var dateAxis_40 = chart_40.xAxes.push(new am4charts.DateAxis());
                                        dateAxis_40.periodChangeDateFormats.setKey("hour", "[bold]dd MMM ");
                                        dateAxis_40.tooltipDateFormat = "HH:mm, d MMM yyyy";

                                        var valueAxis_40 = chart_40.yAxes.push(new am4charts.ValueAxis());

                                        var series_40 = chart_40.series.push(new am4charts.LineSeries());
                                        series_40.dataFields.valueY = "chart_40";
                                        series_40.dataFields.dateX = "timestamp";
                                        series_40.tooltipText = "{chart_40} (" + chartUnit_40 + ")";
                                        series_40.strokeWidth = 2;

                                        chart_40.cursor = new am4charts.XYCursor();
                                        chart_40.cursor.snapToSeries = series_40;
                                        chart_40.cursor.xAxis = dateAxis_40;
                                    }
                                    // -----------------------------------
                                }
                                loadingOut(loading);

                            });
                        }
                    });
                    $(".memu_control").click(function() {
                        cont_mode_manual(show_cont = "show_contdrip1", numb = "1");
                        cont_mode_manual(show_cont = "show_contdrip2", numb = "2");
                        cont_mode_manual(show_cont = "show_contdrip3", numb = "3");
                        cont_mode_manual(show_cont = "show_contdrip4", numb = "4");
                        cont_mode_manual(show_cont = "show_contdrip5", numb = "5");
                        cont_mode_manual(show_cont = "show_contdrip6", numb = "6");
                        cont_mode_manual(show_cont = "show_contdrip7", numb = "7");
                        cont_mode_manual(show_cont = "show_contdrip8", numb = "8");
                        cont_mode_manual(show_cont = "show_contfoggy", numb = "9");
                        cont_mode_manual(show_cont = "show_contfan", numb = "10");
                        cont_mode_manual(show_cont = "show_shader", numb = "11");
                        cont_mode_manual(show_cont = "show_contfertilizer", numb = "12");

                        function cont_mode_manual(show_cont, numb) {
                            if (eval("Contstatus.controlstatus_" + numb) === "1") {
                                $("." + show_cont).show();
                                $(".text_load_" + numb).html(eval("Contname.conttrolname_" + numb));
                            } else {
                                $("." + show_cont).hide();
                            }
                        }
                    });

                    $(".memu_report").click(function() {
                        $(".memu_select_site").removeClass("active");
                        $(".memu_dashboard").removeClass("active");
                        $(this).addClass("active");
                        $(".memu_meter").removeClass("active");

                        $(".load_site").hide();
                        $(".load_status").hide();
                        $.ajax({
                            url: "load_page/load_report.php",
                            method: "post",
                            data: { house_master: house_master },
                            // dataType: "json",
                            success: function(res_report) {
                                $(".load_report").show().html(res_report);
                            }
                        });
                        $(".date").hide();
                        $(".time").hide();

                        status_extb();
                        // click_select_box_
                        $(".click_box_select").change(function() {
                            status_tball();
                        });

                        function status_tball() {
                            if (Status.dashstatus_1_1 === "1") {
                                if ($('.Tbtn_sn1').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_1_2 === "1") {
                                if ($('.Tbtn_sn2').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_1_3 === "1") {
                                if ($('.Tbtn_sn3').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_1_4 === "1") {
                                if ($('.Tbtn_sn4').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_2_1 === "1") {
                                if ($('.Tbtn_sn5').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_2_2 === "1") {
                                if ($('.Tbtn_sn6').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_2_3 === "1") {
                                if ($('.Tbtn_sn7').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_2_4 === "1") {
                                if ($('.Tbtn_sn8').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_3_1 === "1") {
                                if ($('.Tbtn_sn9').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_3_2 === "1") {
                                if ($('.Tbtn_sn10').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_3_3 === "1") {
                                if ($('.Tbtn_sn11').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_3_4 === "1") {
                                if ($('.Tbtn_sn12').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_4_1 === "1") {
                                if ($('.Tbtn_sn13').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_4_2 === "1") {
                                if ($('.Tbtn_sn14').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_4_3 === "1") {
                                if ($('.Tbtn_sn15').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_4_4 === "1") {
                                if ($('.Tbtn_sn16').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_5_1 === "1") {
                                if ($('.Tbtn_sn17').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_5_2 === "1") {
                                if ($('.Tbtn_sn18').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_5_3 === "1") {
                                if ($('.Tbtn_sn19').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_5_4 === "1") {
                                if ($('.Tbtn_sn20').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_6_1 === "1") {
                                if ($('.Tbtn_sn21').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_6_2 === "1") {
                                if ($('.Tbtn_sn22').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_6_3 === "1") {
                                if ($('.Tbtn_sn23').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_6_4 === "1") {
                                if ($('.Tbtn_sn24').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_7_1 === "1") {
                                if ($('.Tbtn_sn25').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_7_2 === "1") {
                                if ($('.Tbtn_sn26').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_7_3 === "1") {
                                if ($('.Tbtn_sn27').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_7_4 === "1") {
                                if ($('.Tbtn_sn28').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_8_1 === "1") {
                                if ($('.Tbtn_sn29').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_8_2 === "1") {
                                if ($('.Tbtn_sn30').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_8_3 === "1") {
                                if ($('.Tbtn_sn31').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_8_4 === "1") {
                                if ($('.Tbtn_sn32').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_9_1 === "1") {
                                if ($('.Tbtn_sn33').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_9_2 === "1") {
                                if ($('.Tbtn_sn34').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_9_3 === "1") {
                                if ($('.Tbtn_sn35').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_9_4 === "1") {
                                if ($('.Tbtn_sn36').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_10_1 === "1") {
                                if ($('.Tbtn_sn37').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_10_2 === "1") {
                                if ($('.Tbtn_sn38').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_10_3 === "1") {
                                if ($('.Tbtn_sn39').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            if (Status.dashstatus_10_4 === "1") {
                                if ($('.Tbtn_sn40').prop('checked') === false) {
                                    $("#SelectAll").prop('checked', false);
                                    return false;
                                }
                            }
                            $("#SelectAll").prop('checked', true);
                        }

                        function status_extb() {
                            if (Status.dashstatus_1_1 === "1") {
                                $(".Td_btn_sn1").show();
                                $('.Tbtn_sn1').bootstrapToggle('on');
                                $(".Tshow_namesn1").html(Name.dashname_1_1);
                            } else {
                                $(".Td_btn_sn1").hide();
                            }
                            if (Status.dashstatus_1_2 === "1") {
                                $(".Td_btn_sn2").show();
                                $('.Tbtn_sn2').bootstrapToggle('on');
                                $(".Tshow_namesn2").html(Name.dashname_1_2);
                            } else {
                                $(".Td_btn_sn2").hide();
                            }
                            if (Status.dashstatus_1_3 === "1") {
                                $(".Td_btn_sn3").show();
                                $('.Tbtn_sn3').bootstrapToggle('on');
                                $(".Tshow_namesn3").html(Name.dashname_1_3);
                            } else {
                                $(".Td_btn_sn3").hide();
                            }
                            if (Status.dashstatus_1_4 === "1") {
                                $(".Td_btn_sn4").show();
                                $('.Tbtn_sn4').bootstrapToggle('on');
                                $(".Tshow_namesn4").html(Name.dashname_1_4);
                            } else {
                                $(".Td_btn_sn4").hide();
                            }
                            if (Status.dashstatus_2_1 === "1") {
                                $(".Td_btn_sn5").show();
                                $('.Tbtn_sn5').bootstrapToggle('on');
                                $(".Tshow_namesn5").html(Name.dashname_2_1);
                            } else {
                                $(".Td_btn_sn5").hide();
                            }
                            if (Status.dashstatus_2_2 === "1") {
                                $(".Td_btn_sn6").show();
                                $('.Tbtn_sn6').bootstrapToggle('on');
                                $(".Tshow_namesn6").html(Name.dashname_2_2);
                            } else {
                                $(".Td_btn_sn6").hide();
                            }
                            if (Status.dashstatus_2_3 === "1") {
                                $(".Td_btn_sn7").show();
                                $('.Tbtn_sn7').bootstrapToggle('on');
                                $(".Tshow_namesn7").html(Name.dashname_2_3);
                            } else {
                                $(".Td_btn_sn7").hide();
                            }
                            if (Status.dashstatus_2_4 === "1") {
                                $(".Td_btn_sn8").show();
                                $('.Tbtn_sn8').bootstrapToggle('on');
                                $(".Tshow_namesn8").html(Name.dashname_2_4);
                            } else {
                                $(".Td_btn_sn8").hide();
                            }
                            if (Status.dashstatus_3_1 === "1") {
                                $(".Td_btn_sn9").show();
                                $('.Tbtn_sn9').bootstrapToggle('on');
                                $(".Tshow_namesn9").html(Name.dashname_3_1);
                            } else {
                                $(".Td_btn_sn9").hide();
                            }
                            if (Status.dashstatus_3_2 === "1") {
                                $(".Td_btn_sn10").show();
                                $('.Tbtn_sn10').bootstrapToggle('on');
                                $(".Tshow_namesn10").html(Name.dashname_3_2);
                            } else {
                                $(".Td_btn_sn10").hide();
                            }
                            if (Status.dashstatus_3_3 === "1") {
                                $(".Td_btn_sn11").show();
                                $('.Tbtn_sn11').bootstrapToggle('on');
                                $(".Tshow_namesn11").html(Name.dashname_3_3);
                            } else {
                                $(".Td_btn_sn11").hide();
                            }
                            if (Status.dashstatus_3_4 === "1") {
                                $(".Td_btn_sn12").show();
                                $('.Tbtn_sn12').bootstrapToggle('on');
                                $(".Tshow_namesn12").html(Name.dashname_3_4);
                            } else {
                                $(".Td_btn_sn12").hide();
                            }
                            if (Status.dashstatus_4_1 === "1") {
                                $(".Td_btn_sn13").show();
                                $('.Tbtn_sn13').bootstrapToggle('on');
                                $(".Tshow_namesn13").html(Name.dashname_4_1);
                            } else {
                                $(".Td_btn_sn13").hide();
                            }
                            if (Status.dashstatus_4_2 === "1") {
                                $(".Td_btn_sn14").show();
                                $('.Tbtn_sn14').bootstrapToggle('on');
                                $(".Tshow_namesn14").html(Name.dashname_4_2);
                            } else {
                                $(".Td_btn_sn14").hide();
                            }
                            if (Status.dashstatus_4_3 === "1") {
                                $(".Td_btn_sn15").show();
                                $('.Tbtn_sn15').bootstrapToggle('on');
                                $(".Tshow_namesn15").html(Name.dashname_4_3);
                            } else {
                                $(".Td_btn_sn15").hide();
                            }
                            if (Status.dashstatus_4_4 === "1") {
                                $(".Td_btn_sn16").show();
                                $('.Tbtn_sn16').bootstrapToggle('on');
                                $(".Tshow_namesn16").html(Name.dashname_4_4);
                            } else {
                                $(".Td_btn_sn16").hide();
                            }
                            if (Status.dashstatus_5_1 === "1") {
                                $(".Td_btn_sn17").show();
                                $('.Tbtn_sn17').bootstrapToggle('on');
                                $(".Tshow_namesn17").html(Name.dashname_5_1);
                            } else {
                                $(".Td_btn_sn17").hide();
                            }
                            if (Status.dashstatus_5_2 === "1") {
                                $(".Td_btn_sn18").show();
                                $('.Tbtn_sn18').bootstrapToggle('on');
                                $(".Tshow_namesn18").html(Name.dashname_5_2);
                            } else {
                                $(".Td_btn_sn18").hide();
                            }
                            if (Status.dashstatus_5_3 === "1") {
                                $(".Td_btn_sn19").show();
                                $('.Tbtn_sn19').bootstrapToggle('on');
                                $(".Tshow_namesn19").html(Name.dashname_5_3);
                            } else {
                                $(".Td_btn_sn19").hide();
                            }
                            if (Status.dashstatus_5_4 === "1") {
                                $(".Td_btn_sn20").show();
                                $('.Tbtn_sn20').bootstrapToggle('on');
                                $(".Tshow_namesn20").html(Name.dashname_5_4);
                            } else {
                                $(".Td_btn_sn20").hide();
                            }
                            if (Status.dashstatus_6_1 === "1") {
                                $(".Td_btn_sn21").show();
                                $('.Tbtn_sn21').bootstrapToggle('on');
                                $(".Tshow_namesn21").html(Name.dashname_6_1);
                            } else {
                                $(".Td_btn_sn21").hide();
                            }
                            if (Status.dashstatus_6_2 === "1") {
                                $(".Td_btn_sn22").show();
                                $('.Tbtn_sn22').bootstrapToggle('on');
                                $(".Tshow_namesn22").html(Name.dashname_6_2);
                            } else {
                                $(".Td_btn_sn22").hide();
                            }
                            if (Status.dashstatus_6_3 === "1") {
                                $(".Td_btn_sn23").show();
                                $('.Tbtn_sn23').bootstrapToggle('on');
                                $(".Tshow_namesn23").html(Name.dashname_6_3);
                            } else {
                                $(".Td_btn_sn23").hide();
                            }
                            if (Status.dashstatus_6_4 === "1") {
                                $(".Td_btn_sn24").show();
                                $('.Tbtn_sn24').bootstrapToggle('on');
                                $(".Tshow_namesn24").html(Name.dashname_6_4);
                            } else {
                                $(".Td_btn_sn24").hide();
                            }
                            if (Status.dashstatus_7_1 === "1") {
                                $(".Td_btn_sn25").show();
                                $('.Tbtn_sn25').bootstrapToggle('on');
                                $(".Tshow_namesn25").html(Name.dashname_7_1);
                            } else {
                                $(".Td_btn_sn25").hide();
                            }
                            if (Status.dashstatus_7_2 === "1") {
                                $(".Td_btn_sn26").show();
                                $('.Tbtn_sn26').bootstrapToggle('on');
                                $(".Tshow_namesn26").html(Name.dashname_7_2);
                            } else {
                                $(".Td_btn_sn26").hide();
                            }
                            if (Status.dashstatus_7_3 === "1") {
                                $(".Td_btn_sn27").show();
                                $('.Tbtn_sn27').bootstrapToggle('on');
                                $(".Tshow_namesn27").html(Name.dashname_7_3);
                            } else {
                                $(".Td_btn_sn27").hide();
                            }
                            if (Status.dashstatus_7_4 === "1") {
                                $(".Td_btn_sn28").show();
                                $('.Tbtn_sn28').bootstrapToggle('on');
                                $(".Tshow_namesn28").html(Name.dashname_7_4);
                            } else {
                                $(".Td_btn_sn28").hide();
                            }
                            if (Status.dashstatus_8_1 === "1") {
                                $(".Td_btn_sn29").show();
                                $('.Tbtn_sn29').bootstrapToggle('on');
                                $(".Tshow_namesn29").html(Name.dashname_8_1);
                            } else {
                                $(".Td_btn_sn29").hide();
                            }
                            if (Status.dashstatus_8_2 === "1") {
                                $(".Td_btn_sn30").show();
                                $('.Tbtn_sn30').bootstrapToggle('on');
                                $(".Tshow_namesn30").html(Name.dashname_8_2);
                            } else {
                                $(".Td_btn_sn30").hide();
                            }
                            if (Status.dashstatus_8_3 === "1") {
                                $(".Td_btn_sn31").show();
                                $('.Tbtn_sn31').bootstrapToggle('on');
                                $(".Tshow_namesn31").html(Name.dashname_8_3);
                            } else {
                                $(".Td_btn_sn31").hide();
                            }
                            if (Status.dashstatus_8_4 === "1") {
                                $(".Td_btn_sn32").show();
                                $('.Tbtn_sn32').bootstrapToggle('on');
                                $(".Tshow_namesn32").html(Name.dashname_8_4);
                            } else {
                                $(".Td_btn_sn32").hide();
                            }
                            if (Status.dashstatus_9_1 === "1") {
                                $(".Td_btn_sn33").show();
                                $('.Tbtn_sn33').bootstrapToggle('on');
                                $(".Tshow_namesn33").html(Name.dashname_9_1);
                            } else {
                                $(".Td_btn_sn33").hide();
                            }
                            if (Status.dashstatus_9_2 === "1") {
                                $(".Td_btn_sn34").show();
                                $('.Tbtn_sn34').bootstrapToggle('on');
                                $(".Tshow_namesn34").html(Name.dashname_9_2);
                            } else {
                                $(".Td_btn_sn34").hide();
                            }
                            if (Status.dashstatus_9_3 === "1") {
                                $(".Td_btn_sn35").show();
                                $('.Tbtn_sn35').bootstrapToggle('on');
                                $(".Tshow_namesn35").html(Name.dashname_9_3);
                            } else {
                                $(".Td_btn_sn35").hide();
                            }
                            if (Status.dashstatus_9_4 === "1") {
                                $(".Td_btn_sn36").show();
                                $('.Tbtn_sn36').bootstrapToggle('on');
                                $(".Tshow_namesn36").html(Name.dashname_9_4);
                            } else {
                                $(".Td_btn_sn36").hide();
                            }
                            if (Status.dashstatus_10_1 === "1") {
                                $(".Td_btn_sn37").show();
                                $('.Tbtn_sn37').bootstrapToggle('on');
                                $(".Tshow_namesn37").html(Name.dashname_10_1);
                            } else {
                                $(".Td_btn_sn37").hide();
                            }
                            if (Status.dashstatus_10_2 === "1") {
                                $(".Td_btn_sn38").show();
                                $('.Tbtn_sn38').bootstrapToggle('on');
                                $(".Tshow_namesn38").html(Name.dashname_10_2);
                            } else {
                                $(".Td_btn_sn38").hide();
                            }
                            if (Status.dashstatus_10_3 === "1") {
                                $(".Td_btn_sn39").show();
                                $('.Tbtn_sn39').bootstrapToggle('on');
                                $(".Tshow_namesn39").html(Name.dashname_10_3);
                            } else {
                                $(".Td_btn_sn39").hide();
                            }
                            if (Status.dashstatus_10_4 === "1") {
                                $(".Td_btn_sn40").show();
                                $('.Tbtn_sn40').bootstrapToggle('on');
                                $(".Tshow_namesn40").html(Name.dashname_10_4);
                            } else {
                                $(".Td_btn_sn40").hide();
                            }
                            status_tball();
                        }

                        $("#SelectAll").click(function() {
                            console.log($(this).prop('checked'));
                            if ($(this).prop('checked') === true) {
                                if (Status.dashstatus_1_1 === "1") {
                                    $('.Tbtn_sn1').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_1_2 === "1") {
                                    $('.Tbtn_sn2').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_1_3 === "1") {
                                    $('.Tbtn_sn3').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_1_4 === "1") {
                                    $('.Tbtn_sn4').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_2_1 === "1") {
                                    $('.Tbtn_sn5').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_2_2 === "1") {
                                    $('.Tbtn_sn6').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_2_3 === "1") {
                                    $('.Tbtn_sn7').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_2_4 === "1") {
                                    $('.Tbtn_sn8').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_3_1 === "1") {
                                    $('.Tbtn_sn9').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_3_2 === "1") {
                                    $('.Tbtn_sn10').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_3_3 === "1") {
                                    $('.Tbtn_sn11').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_3_4 === "1") {
                                    $('.Tbtn_sn12').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_4_1 === "1") {
                                    $('.Tbtn_sn13').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_4_2 === "1") {
                                    $('.Tbtn_sn14').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_4_3 === "1") {
                                    $('.Tbtn_sn15').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_4_4 === "1") {
                                    $('.Tbtn_sn16').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_5_1 === "1") {
                                    $('.Tbtn_sn17').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_5_2 === "1") {
                                    $('.Tbtn_sn18').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_5_3 === "1") {
                                    $('.Tbtn_sn19').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_5_4 === "1") {
                                    $('.Tbtn_sn20').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_6_1 === "1") {
                                    $('.Tbtn_sn21').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_6_2 === "1") {
                                    $('.Tbtn_sn22').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_6_3 === "1") {
                                    $('.Tbtn_sn23').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_6_4 === "1") {
                                    $('.Tbtn_sn24').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_7_1 === "1") {
                                    $('.Tbtn_sn25').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_7_2 === "1") {
                                    $('.Tbtn_sn26').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_7_3 === "1") {
                                    $('.Tbtn_sn27').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_7_4 === "1") {
                                    $('.Tbtn_sn28').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_8_1 === "1") {
                                    $('.Tbtn_sn29').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_8_2 === "1") {
                                    $('.Tbtn_sn30').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_8_3 === "1") {
                                    $('.Tbtn_sn31').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_8_4 === "1") {
                                    $('.Tbtn_sn32').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_9_1 === "1") {
                                    $('.Tbtn_sn33').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_9_2 === "1") {
                                    $('.Tbtn_sn34').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_9_3 === "1") {
                                    $('.Tbtn_sn35').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_9_4 === "1") {
                                    $('.Tbtn_sn36').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_10_1 === "1") {
                                    $('.Tbtn_sn37').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_10_2 === "1") {
                                    $('.Tbtn_sn38').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_10_3 === "1") {
                                    $('.Tbtn_sn39').bootstrapToggle('on');
                                }
                                if (Status.dashstatus_10_4 === "1") {
                                    $('.Tbtn_sn40').bootstrapToggle('on');
                                }
                            } else {
                                $('.Tbtn_sn1').bootstrapToggle('off');
                                $('.Tbtn_sn2').bootstrapToggle('off');
                                $('.Tbtn_sn3').bootstrapToggle('off');
                                $('.Tbtn_sn4').bootstrapToggle('off');
                                $('.Tbtn_sn5').bootstrapToggle('off');
                                $('.Tbtn_sn6').bootstrapToggle('off');
                                $('.Tbtn_sn7').bootstrapToggle('off');
                                $('.Tbtn_sn8').bootstrapToggle('off');
                                $('.Tbtn_sn9').bootstrapToggle('off');
                                $('.Tbtn_sn10').bootstrapToggle('off');
                                $('.Tbtn_sn11').bootstrapToggle('off');
                                $('.Tbtn_sn12').bootstrapToggle('off');
                                $('.Tbtn_sn13').bootstrapToggle('off');
                                $('.Tbtn_sn14').bootstrapToggle('off');
                                $('.Tbtn_sn15').bootstrapToggle('off');
                                $('.Tbtn_sn16').bootstrapToggle('off');
                                $('.Tbtn_sn17').bootstrapToggle('off');
                                $('.Tbtn_sn18').bootstrapToggle('off');
                                $('.Tbtn_sn19').bootstrapToggle('off');
                                $('.Tbtn_sn20').bootstrapToggle('off');
                                $('.Tbtn_sn20').bootstrapToggle('off');
                                $('.Tbtn_sn21').bootstrapToggle('off');
                                $('.Tbtn_sn22').bootstrapToggle('off');
                                $('.Tbtn_sn23').bootstrapToggle('off');
                                $('.Tbtn_sn24').bootstrapToggle('off');
                                $('.Tbtn_sn25').bootstrapToggle('off');
                                $('.Tbtn_sn26').bootstrapToggle('off');
                                $('.Tbtn_sn27').bootstrapToggle('off');
                                $('.Tbtn_sn28').bootstrapToggle('off');
                                $('.Tbtn_sn29').bootstrapToggle('off');
                                $('.Tbtn_sn30').bootstrapToggle('off');
                                $('.Tbtn_sn31').bootstrapToggle('off');
                                $('.Tbtn_sn32').bootstrapToggle('off');
                                $('.Tbtn_sn33').bootstrapToggle('off');
                                $('.Tbtn_sn34').bootstrapToggle('off');
                                $('.Tbtn_sn35').bootstrapToggle('off');
                                $('.Tbtn_sn36').bootstrapToggle('off');
                                $('.Tbtn_sn37').bootstrapToggle('off');
                                $('.Tbtn_sn38').bootstrapToggle('off');
                                $('.Tbtn_sn39').bootstrapToggle('off');
                                $('.Tbtn_sn40').bootstrapToggle('off');
                            }
                            status_tball();
                        });
                    });
                }
            }); //exit get_dash
        }
    }
});