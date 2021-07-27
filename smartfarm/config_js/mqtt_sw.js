if (house_master !== "") {
    // control_modal
    $(".memu_control").click(function() {
        $('.input_check').off('change');
        $('.input_time').off('change');
        $(this).removeClass("active").css({
            "color": "#8d97ad"
        });
        $(".memu_dashboard").css({
            "color": "#00c292"
        });
        $("#Modal_control").modal("show");

        // if ($(".s_mode_Auto").hasClass("active") === true) { // Auto_Mode
        $(".edit_cont").show();
        $(".img_sw").show();
        $(".sw_toggle").hide();
        // $(".sw_toggle").bootstrapToggle('disable'); // switch on off
        $('.input_time').prop('disabled', true); // input เลือกเวลา
        $("#save_auto_cont").hide();
        $("#close_auto_cont").hide();
        // console.log($(".edit_contdrip1").css('display'));

        $.ajax({
            url: "config_php/get_modal_control.php",
            method: "post",
            data: { house_master: house_master },
            dataType: "json",
            success: function(res) {
                var login_user = res.username;
                if (house_master !== "KMUMT001") {
                    var c_load_1 = res.load_1;
                    var c_load_2 = res.load_2;
                    var c_load_3 = res.load_3;
                    var c_load_4 = res.load_4;
                    var c_load_5 = res.load_5;
                    var c_load_6 = res.load_6;
                    var c_load_7 = res.load_7;
                    var c_load_8 = res.load_8;
                    var c_load_9 = res.load_9;
                    var c_load_10 = res.load_10;
                    var c_load_11 = res.load_11;
                    console.log(res);
                    if (c_load_1 !== "") {
                        df_ed_text(numb = "1");
                    }
                    if (c_load_2 !== "") {
                        df_ed_text(numb = "2");
                    }
                    if (c_load_3 !== "") {
                        df_ed_text(numb = "3");
                    }
                    if (c_load_4 !== "") {
                        df_ed_text(numb = "4");
                    }
                    if (c_load_5 !== "") {
                        df_ed_text(numb = "5");
                    }
                    if (c_load_6 !== "") {
                        df_ed_text(numb = "6");
                    }
                    if (c_load_7 !== "") {
                        df_ed_text(numb = "7");
                    }
                    if (c_load_8 !== "") {
                        df_ed_text(numb = "8");
                    }
                    if (c_load_9 !== "") {
                        df_ed_text(numb = "9");
                    }
                    if (c_load_10 !== "") {
                        df_ed_text(numb = "10");
                    }
                    if (c_load_11 !== "") {
                        df_ed_text(numb = "11");
                    }

                    function df_ed_text(numb) {
                        if (eval("c_load_" + numb + ".load_" + numb + "_st_1") === "1") {
                            $("#" + numb + "_1").bootstrapToggle('on');
                            $("." + numb + "_1").attr("src", "dist/images/icon/switck_on.png");
                            $("#time_s_" + numb + "_1").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_s_1"));
                            $("#time_e_" + numb + "_1").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_e_1"));
                        } else {
                            $("#" + numb + "_1").bootstrapToggle('off');
                            $("." + numb + "_1").attr("src", "dist/images/icon/switck_off.png");
                            $("#time_s_" + numb + "_1").prop('disabled', true).val("");
                            $("#time_e_" + numb + "_1").prop('disabled', true).val("");
                        }
                        if (eval("c_load_" + numb + ".load_" + numb + "_st_2") === "1") {
                            $("#" + numb + "_2").bootstrapToggle('on');
                            $("." + numb + "_2").attr("src", "dist/images/icon/switck_on.png");
                            $("#time_s_" + numb + "_2").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_s_2"));
                            $("#time_e_" + numb + "_2").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_e_2"));
                        } else {
                            $("#" + numb + "_2").bootstrapToggle('off');
                            $("." + numb + "_2").attr("src", "dist/images/icon/switck_off.png");
                            $("#time_s_" + numb + "_2").prop('disabled', true).val("");
                            $("#time_e_" + numb + "_2").prop('disabled', true).val("");
                        }
                        if (eval("c_load_" + numb + ".load_" + numb + "_st_3") === "1") {
                            $("#" + numb + "_3").bootstrapToggle('on');
                            $("." + numb + "_3").attr("src", "dist/images/icon/switck_on.png");
                            $("#time_s_" + numb + "_3").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_s_3"));
                            $("#time_e_" + numb + "_3").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_e_3"));
                        } else {
                            $("#" + numb + "_3").bootstrapToggle('off');
                            $("." + numb + "_3").attr("src", "dist/images/icon/switck_off.png");
                            $("#time_s_" + numb + "_3").prop('disabled', true).val("");
                            $("#time_e_" + numb + "_3").prop('disabled', true).val("");
                        }
                        if (eval("c_load_" + numb + ".load_" + numb + "_st_4") === "1") {
                            $("#" + numb + "_4").bootstrapToggle('on');
                            $("." + numb + "_4").attr("src", "dist/images/icon/switck_on.png");
                            $("#time_s_" + numb + "_4").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_s_4"));
                            $("#time_e_" + numb + "_4").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_e_4"));
                        } else {
                            $("#" + numb + "_4").bootstrapToggle('off');
                            $("." + numb + "_4").attr("src", "dist/images/icon/switck_off.png");
                            $("#time_s_" + numb + "_4").prop('disabled', true).val("");
                            $("#time_e_" + numb + "_4").prop('disabled', true).val("");
                        }
                        if (eval("c_load_" + numb + ".load_" + numb + "_st_5") === "1") {
                            $("#" + numb + "_5").bootstrapToggle('on');
                            $("." + numb + "_5").attr("src", "dist/images/icon/switck_on.png");
                            $("#time_s_" + numb + "_5").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_s_5"));
                            $("#time_e_" + numb + "_5").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_e_5"));
                        } else {
                            $("#" + numb + "_5").bootstrapToggle('off');
                            $("." + numb + "_5").attr("src", "dist/images/icon/switck_off.png");
                            $("#time_s_" + numb + "_5").prop('disabled', true).val("");
                            $("#time_e_" + numb + "_5").prop('disabled', true).val("");
                        }
                        if (eval("c_load_" + numb + ".load_" + numb + "_st_6") === "1") {
                            $("#" + numb + "_6").bootstrapToggle('on');
                            $("." + numb + "_6").attr("src", "dist/images/icon/switck_on.png");
                            $("#time_s_" + numb + "_6").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_s_6"));
                            $("#time_e_" + numb + "_6").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_e_6"));
                        } else {
                            $("#" + numb + "_6").bootstrapToggle('off');
                            $("." + numb + "_6").attr("src", "dist/images/icon/switck_off.png");
                            $("#time_s_" + numb + "_6").prop('disabled', true).val("");
                            $("#time_e_" + numb + "_6").prop('disabled', true).val("");
                        }
                        if (numb === "9") {
                            if (eval("c_load_" + numb + ".load_" + numb + "_st_7") === "1") {
                                $("#" + numb + "_7").bootstrapToggle('on');
                                $("." + numb + "_7").attr("src", "dist/images/icon/switck_on.png");
                                $("#time_s_" + numb + "_7").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_s_7"));
                                $("#time_e_" + numb + "_7").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_e_7"));
                                $("#time_on_" + numb + "_7").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_on_7"));
                                $("#time_off_" + numb + "_7").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_off_7"));
                            } else {
                                $("#" + numb + "_7").bootstrapToggle('off');
                                $("." + numb + "_7").attr("src", "dist/images/icon/switck_off.png");
                                $("#time_s_" + numb + "_7").prop('disabled', true).val("");
                                $("#time_e_" + numb + "_7").prop('disabled', true).val("");
                                $("#time_on_" + numb + "_7").prop('disabled', true).val("");
                                $("#time_off_" + numb + "_7").prop('disabled', true).val("");
                            }
                        }
                    }
                } else { //มจธ. 
                    var c_name = res.control_name;
                    var max_min = res.max_min;
                    kmutt_auto_mode(
                        min1 = max_min.maxmin_min_1, min2 = max_min.maxmin_min_2, min3 = max_min.maxmin_min_3, min5 = max_min.maxmin_min_5,
                        max1 = max_min.maxmin_max_1, max2 = max_min.maxmin_max_2, max3 = max_min.maxmin_max_3, max5 = max_min.maxmin_max_5,
                        disb = true
                    );
                }

                // ==============================
                var client = null;
                // These are configs	
                var hostname = "203.150.37.144"; //'103.2.115.15'; // 203.150.37.144   decccloud.com
                var port = "8083";
                var clientId = "mqtt_js_" + parseInt(Math.random() * 100000, 10);
                // Create a client instance
                client = new Paho.MQTT.Client(hostname, Number(port), clientId);

                // set callback handlers
                client.onConnectionLost = onConnectionLost;
                client.onMessageArrived = onMessageArrived;

                // connect the client
                client.connect({ onSuccess: onConnect });

                // called when the client connects
                function onConnect() {
                    // Once a connection has been made, make a subscription and send a message.
                    console.log("onConnect");
                    client.subscribe("/World");
                    message = new Paho.MQTT.Message("Hello");
                    message.destinationName = "/World";
                    client.send(message);
                }

                // called when the client loses its connection
                function onConnectionLost(responseObject) {
                    if (responseObject.errorCode !== 0) {
                        console.log("onConnectionLost:" + responseObject.errorMessage);
                    }
                }

                function onMessageArrived(message) {
                    // console.log(message);
                    $('.sw_mode_Auto').click(function() { // console.log($(this).attr("id"));
                        if ($(this).hasClass("active") === false) {
                            if (house_master !== "KMUMT001") {
                                switch_mode(sw_name = "Auto", mess = "Auto", mqtt_name = "user_control");
                            } else {
                                switch_mode(sw_name = "Auto", mess = "on", mqtt_name = "control_user");
                            }
                        }
                    });
                    $('.sw_mode_Manual').click(function() { // console.log($(this).attr("id"));
                        if ($(this).hasClass("active") === false) {
                            if (house_master !== "KMUMT001") {
                                switch_mode(sw_name = "Manual", mess = "Manual", mqtt_name_us = "user_control");
                            } else {
                                switch_mode(sw_name = "Manual", mess = "off", mqtt_name_us = "control_user");
                            }
                        }
                    });

                    function switch_mode(sw_name, mess, mqtt_name_us) {
                        swal({
                            title: 'Changing mode !',
                            text: "You want to switch to the mode " + sw_name + " ?",
                            type: 'warning',
                            allowOutsideClick: false,
                            showCancelButton: true,
                            confirmButtonColor: '#32CD32',
                            cancelButtonColor: '#FF3333',
                            confirmButtonText: 'Yes'
                        }).then((result) => {
                            if (result.value) {
                                // console.log(login_user);
                                message = new Paho.MQTT.Message(login_user);
                                message.destinationName = house_master + "/1/control/" + mqtt_name_us;
                                message.retained = true;
                                message.qos = 1;
                                client.send(message);

                                message = new Paho.MQTT.Message(mess);
                                message.destinationName = house_master + "/1/control/mode";
                                message.retained = true;
                                message.qos = 1;
                                client.send(message);

                                swal({
                                    text: "Loading ... ",
                                    allowOutsideClick: false,
                                    onOpen: () => {
                                        swal.showLoading()
                                        timerInterval = setInterval(() => {}, 100)
                                    }
                                });
                            }
                        });
                    }

                    // Drim_1 ---------------------------------------------------------
                    $('.sw_drip1_on').click(function() {
                        if (house_master !== "KMUMT001") {
                            switch_control(sta = "ON", sw_name = "Dripper 1", CH_name = "dripper_1", mess = "ON", mqtt_name_us = "user_control");
                        } else {
                            switch_control(sta = "ON", sw_name = c_name.c1, CH_name = "control_st_1", mess = "on", mqtt_name_us = "control_user");
                        }
                    });
                    $('.sw_drip1_off').click(function() {
                        if (house_master !== "KMUMT001") {
                            switch_control(sta = "OFF", sw_name = "Dripper 1", CH_name = "dripper_1", mess = "OFF", mqtt_name_us = "user_control");
                        } else {
                            switch_control(sta = "OFF", sw_name = c_name.c1, CH_name = "control_st_1", mess = "off", mqtt_name_us = "control_user");
                        }
                    });
                    // Drim_2 ---------------------------------------------------------
                    $('.sw_drip2_on').click(function() {
                        // switch_control(sta = "ON", sw_name = "Dripper 2", CH_name = "dripper_2", mess = "ON");
                        if (house_master !== "KMUMT001") {
                            switch_control(sta = "ON", sw_name = "Dripper 2", CH_name = "dripper_2", mess = "ON", mqtt_name_us = "user_control");
                        } else {
                            switch_control(sta = "ON", sw_name = c_name.c2, CH_name = "control_st_2", mess = "on", mqtt_name_us = "control_user");
                        }
                    });
                    $('.sw_drip2_off').click(function() {
                        // switch_control(sta = "OFF", sw_name = "Dripper 2", CH_name = "dripper_2", mess = "OFF");
                        if (house_master !== "KMUMT001") {
                            switch_control(sta = "OFF", sw_name = "Dripper 2", CH_name = "dripper_2", mess = "OFF", mqtt_name_us = "user_control");
                        } else {
                            switch_control(sta = "OFF", sw_name = c_name.c2, CH_name = "control_st_2", mess = "off", mqtt_name_us = "control_user");
                        }
                    });
                    // Drim_3 ---------------------------------------------------------
                    $('.sw_drip3_on').click(function() {
                        // switch_control(sta = "ON", sw_name = "Dripper 3", CH_name = "dripper_3", mess = "ON");
                        if (house_master !== "KMUMT001") {
                            switch_control(sta = "ON", sw_name = "Dripper 3", CH_name = "dripper_3", mess = "ON", mqtt_name_us = "user_control");
                        } else {
                            switch_control(sta = "ON", sw_name = c_name.c3, CH_name = "control_st_3", mess = "on", mqtt_name_us = "control_user");
                        }
                    });
                    $('.sw_drip3_off').click(function() {
                        // switch_control(sta = "OFF", sw_name = "Dripper 3", CH_name = "dripper_3", mess = "OFF");
                        if (house_master !== "KMUMT001") {
                            switch_control(sta = "OFF", sw_name = "Dripper 3", CH_name = "dripper_3", mess = "OFF", mqtt_name_us = "user_control");
                        } else {
                            switch_control(sta = "OFF", sw_name = c_name.c3, CH_name = "control_st_3", mess = "off", mqtt_name_us = "control_user");
                        }
                    });
                    // Drim_4 ---------------------------------------------------------
                    $('.sw_drip4_on').click(function() {
                        // switch_control(sta = "ON", sw_name = "Dripper 4", CH_name = "dripper_4", mess = "ON");
                        if (house_master !== "KMUMT001") {
                            switch_control(sta = "ON", sw_name = "Dripper 4", CH_name = "dripper_4", mess = "ON", mqtt_name_us = "user_control");
                        } else {
                            switch_control(sta = "ON", sw_name = c_name.c4, CH_name = "control_st_4", mess = "on", mqtt_name_us = "control_user");
                        }
                    });
                    $('.sw_drip4_off').click(function() {
                        // switch_control(sta = "OFF", sw_name = "Dripper 4", CH_name = "dripper_4", mess = "OFF");
                        if (house_master !== "KMUMT001") {
                            switch_control(sta = "OFF", sw_name = "Dripper 4", CH_name = "dripper_4", mess = "OFF", mqtt_name_us = "user_control");
                        } else {
                            switch_control(sta = "OFF", sw_name = c_name.c4, CH_name = "control_st_4", mess = "off", mqtt_name_us = "control_user");
                        }
                    });
                    // Drim_5 ---------------------------------------------------------
                    $('.sw_drip5_on').click(function() {
                        // switch_control(sta = "ON", sw_name = "Dripper 5", CH_name = "dripper_5", mess = "ON");
                        if (house_master !== "KMUMT001") {
                            switch_control(sta = "ON", sw_name = "Dripper 5", CH_name = "dripper_5", mess = "ON", mqtt_name_us = "user_control");
                        } else {
                            switch_control(sta = "ON", sw_name = c_name.c5, CH_name = "control_st_5", mess = "on", mqtt_name_us = "control_user");
                        }
                    });
                    $('.sw_drip5_off').click(function() {
                        // switch_control(sta = "OFF", sw_name = "Dripper 5", CH_name = "dripper_5", mess = "OFF");
                        if (house_master !== "KMUMT001") {
                            switch_control(sta = "OFF", sw_name = "Dripper 5", CH_name = "dripper_5", mess = "OFF", mqtt_name_us = "user_control");
                        } else {
                            switch_control(sta = "OFF", sw_name = c_name.c5, CH_name = "control_st_5", mess = "off", mqtt_name_us = "control_user");
                        }
                    });
                    // Drim_6 ---------------------------------------------------------
                    $('.sw_drip6_on').click(function() {
                        switch_control(sta = "ON", sw_name = "Dripper 6", CH_name = "dripper_6", mess = "ON", mqtt_name_us = "user_control");
                    });
                    $('.sw_drip6_off').click(function() {
                        switch_control(sta = "OFF", sw_name = "Dripper 6", CH_name = "dripper_6", mess = "OFF", mqtt_name_us = "user_control");
                    });
                    // Drim_7 ---------------------------------------------------------
                    $('.sw_drip7_on').click(function() {
                        switch_control(sta = "ON", sw_name = "Dripper 7", CH_name = "dripper_7", mess = "ON", mqtt_name_us = "user_control");
                    });
                    $('.sw_drip7_off').click(function() {
                        switch_control(sta = "OFF", sw_name = "Dripper 7", CH_name = "dripper_7", mess = "OFF", mqtt_name_us = "user_control");
                    });
                    // Drim_8 ---------------------------------------------------------
                    $('.sw_drip8_on').click(function() {
                        switch_control(sta = "ON", sw_name = "Dripper 8", CH_name = "dripper_8", mess = "ON", mqtt_name_us = "user_control");
                    });
                    $('.sw_drip8_off').click(function() {
                        switch_control(sta = "OFF", sw_name = "Dripper 8", CH_name = "dripper_8", mess = "OFF", mqtt_name_us = "user_control");
                    });
                    // foggy ---------------------------------------------------------
                    $('.sw_foggy_on').click(function() {
                        switch_control(sta = "ON", sw_name = "Foggy", CH_name = "foggy", mess = "ON", mqtt_name_us = "user_control");
                    });
                    $('.sw_foggy_off').click(function() {
                        switch_control(sta = "OFF", sw_name = "Foggy", CH_name = "foggy", mess = "OFF", mqtt_name_us = "user_control");
                    });
                    // fna ---------------------------------------------------------
                    $('.sw_fan_on').click(function() {
                        switch_control(sta = "ON", sw_name = "Fan", CH_name = "fan", mess = "ON", mqtt_name_us = "user_control");
                    });
                    $('.sw_fan_off').click(function() {
                        switch_control(sta = "OFF", sw_name = "Fan", CH_name = "fan", mess = "OFF", mqtt_name_us = "user_control");
                    });
                    // fertilizer ---------------------------------------------------------
                    $('.sw_fertilizer_on').click(function() {
                        switch_control(sta = "ON", sw_name = "Fertilizer", CH_name = "fertilizer", mess = "ON", mqtt_name_us = "user_control");
                    });
                    $('.sw_fertilizer_off').click(function() {
                        switch_control(sta = "OFF", sw_name = "Fertilizer", CH_name = "fertilizer", mess = "OFF", mqtt_name_us = "user_control");
                    });
                    // shader ---------------------------------------------------------
                    $('.sw_shader0').click(function() {
                        switch_control(sta = "OFF", sw_name = "Roof", CH_name = "shader", mess = "0", mqtt_name_us = "user_control");
                    });
                    $('.sw_shader1').click(function() {
                        switch_control(sta = "ON", sw_name = "Roof 25%", CH_name = "shader", mess = "1", mqtt_name_us = "user_control");
                    });
                    $('.sw_shader2').click(function() {
                        switch_control(sta = "ON", sw_name = "Roof 50%", CH_name = "shader", mess = "2", mqtt_name_us = "user_control");
                    });
                    $('.sw_shader3').click(function() {
                        switch_control(sta = "ON", sw_name = "Roof 75%", CH_name = "shader", mess = "3", mqtt_name_us = "user_control");
                    });
                    $('.sw_shader4').click(function() {
                        switch_control(sta = "ON", sw_name = "Roof 100%", CH_name = "shader", mess = "4", mqtt_name_us = "user_control");
                    });

                    function switch_control(sta, sw_name, CH_name, mess, mqtt_name_us) {
                        swal({
                            title: 'Do you want ' + sta + ' ' + sw_name + ' ?',
                            // text: "คุณต้องการเปลี่ยนไปใช้โหมด Manual !!!",
                            type: 'warning',
                            allowOutsideClick: false,
                            showCancelButton: true,
                            confirmButtonColor: '#32CD32',
                            cancelButtonColor: '#FF3333',
                            confirmButtonText: 'Yes'
                        }).then((result) => {
                            if (result.value) {
                                $("#Modal1").modal('hide');
                                message = new Paho.MQTT.Message(login_user);
                                message.destinationName = house_master + "/1/control/" + mqtt_name_us;
                                message.qos = 1;
                                message.retained = true;
                                client.send(message);

                                message = new Paho.MQTT.Message(mess);
                                message.destinationName = house_master + "/1/control/" + CH_name;
                                message.qos = 1;
                                message.retained = true;
                                client.send(message);
                                // console.log(message.qos);
                            }
                        });
                    }
                    // ---------------------------------------------------------------
                    $("#save_auto_cont").click(function() {
                        if (house_master !== "KMUMT001") {
                            var numb_s = $("#hidden_edit_cont").val();
                            // console.log(numb_s);
                            // return false;

                            if ($("#" + numb_s + "_1").prop('checked') === true) {
                                var sw_1 = "1";
                                var cls_inp_s = "time_s_" + numb_s + "_1";
                                var cls_inp_e = "time_e_" + numb_s + "_1";
                                if ($("#" + cls_inp_s).val() === "") {
                                    $("#" + cls_inp_s).addClass("input_err");
                                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER 1 : Please specify the <b> Start time</b> !');
                                    return false;
                                } else {
                                    $("#" + cls_inp_s).removeClass("input_err");
                                }
                                if ($("#" + cls_inp_e).val() === "") {
                                    $("#" + cls_inp_e).addClass("input_err");
                                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER 1 : Please specify the <b> End time</b> !');
                                    return false;
                                } else {
                                    $("#" + cls_inp_e).removeClass("input_err");
                                }
                                if (numb_s !== "11") {
                                    if ($("#" + cls_inp_s).val() >= $("#" + cls_inp_e).val()) {
                                        $("#" + cls_inp_e).addClass("input_err");
                                        swal_c(type = 'error', title = 'Error...', text = 'TIMMER 1 : <b>Start time</b> must be less than the <b>End time</b> !');
                                        return false;
                                    } else {
                                        $("#" + cls_inp_e).removeClass("input_err");
                                    }
                                }
                                var s_1 = $("#time_s_" + numb_s + "_1").val();
                                var e_1 = $("#time_e_" + numb_s + "_1").val();
                            } else {
                                var sw_1 = "0";
                                if (numb_s !== "11") {
                                    var s_1 = "";
                                    var e_1 = "";
                                } else {
                                    var s_1 = "";
                                    var e_1 = "0";
                                    $("#time_s_" + numb_s + "_1").removeClass("input_err");
                                    $("#time_s_" + numb_s + "_2").removeClass("input_err");
                                    $("#time_s_" + numb_s + "_3").removeClass("input_err");
                                    $("#time_s_" + numb_s + "_4").removeClass("input_err");
                                    $("#time_s_" + numb_s + "_5").removeClass("input_err");
                                    $("#time_s_" + numb_s + "_6").removeClass("input_err");
                                }
                            }
                            if ($("#" + numb_s + "_2").prop('checked') === true) {
                                var sw_2 = "1";
                                var cls_inp_s = "time_s_" + numb_s + "_2";
                                var cls_inp_e = "time_e_" + numb_s + "_2";
                                if ($("#" + cls_inp_s).val() === "") {
                                    $("#" + cls_inp_s).addClass("input_err");
                                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER 2 : Please specify the <b> Start time</b> !');
                                    return false;
                                } else {
                                    $("#" + cls_inp_s).removeClass("input_err");
                                }
                                if ($("#" + cls_inp_e).val() === "") {
                                    $("#" + cls_inp_e).addClass("input_err");
                                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER 2 : Please specify the <b> End time</b> !');
                                    return false;
                                } else {
                                    $("#" + cls_inp_e).removeClass("input_err");
                                }
                                if (numb_s !== "11") {
                                    if ($("#" + cls_inp_s).val() >= $("#" + cls_inp_e).val()) {
                                        $("#" + cls_inp_e).addClass("input_err");
                                        swal_c(type = 'error', title = 'Error...', text = 'TIMMER 2 : <b>Start time</b> must be less than the <b>End time</b> !');
                                        return false;
                                    } else {
                                        $("#" + cls_inp_e).removeClass("input_err");
                                    }
                                } else {
                                    var minsToAdd = 15;
                                    var time = $("#time_s_" + numb_s + "_1").val();
                                    var newTime = new Date(new Date("1970/01/01 " + time).getTime() + minsToAdd * 60000).toLocaleTimeString('en-UK', { hour: '2-digit', minute: '2-digit', hour12: false });
                                    // console.log(newTime);
                                    if ($("#" + cls_inp_s).val() <= newTime) {
                                        swal_c(type = 'error', title = 'Error...', text = '<b>TIMMER 2 : time</b> must be more than the <b>' + newTime + '</b> !');
                                        $("#" + cls_inp_s).addClass("input_err");
                                        return false;
                                    } else {
                                        $("#" + cls_inp_s).removeClass("input_err");
                                    }
                                }
                                var s_2 = $("#time_s_" + numb_s + "_2").val();
                                var e_2 = $("#time_e_" + numb_s + "_2").val();
                            } else {
                                var sw_2 = "0";
                                if (numb_s !== "11") {
                                    var s_2 = "";
                                    var e_2 = "";
                                } else {
                                    var s_2 = "";
                                    var e_2 = "0";
                                    $("#time_s_" + numb_s + "_2").removeClass("input_err");
                                    $("#time_s_" + numb_s + "_3").removeClass("input_err");
                                    $("#time_s_" + numb_s + "_4").removeClass("input_err");
                                    $("#time_s_" + numb_s + "_5").removeClass("input_err");
                                    $("#time_s_" + numb_s + "_6").removeClass("input_err");
                                }
                            }
                            if ($("#" + numb_s + "_3").prop('checked') === true) {
                                var sw_3 = "1";
                                var cls_inp_s = "time_s_" + numb_s + "_3";
                                var cls_inp_e = "time_e_" + numb_s + "_3";
                                if ($("#" + cls_inp_s).val() === "") {
                                    $("#" + cls_inp_s).addClass("input_err");
                                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER 3 : Please specify the <b> Start time</b> !');
                                    return false;
                                } else {
                                    $("#" + cls_inp_s).removeClass("input_err");
                                }
                                if ($("#" + cls_inp_e).val() === "") {
                                    $("#" + cls_inp_e).addClass("input_err");
                                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER 3 : Please specify the <b> End time</b> !');
                                    return false;
                                } else {
                                    $("#" + cls_inp_e).removeClass("input_err");
                                }
                                if (numb_s !== "11") {
                                    if ($("#" + cls_inp_s).val() >= $("#" + cls_inp_e).val()) {
                                        $("#" + cls_inp_e).addClass("input_err");
                                        swal_c(type = 'error', title = 'Error...', text = 'TIMMER 3 : <b>Start time</b> must be less than the <b>End time</b> !');
                                        return false;
                                    } else {
                                        $("#" + cls_inp_e).removeClass("input_err");
                                    }
                                } else { //=11
                                    var minsToAdd = 15;
                                    var time = $("#time_s_" + numb_s + "_2").val();
                                    var newTime = new Date(new Date("1970/01/01 " + time).getTime() + minsToAdd * 60000).toLocaleTimeString('en-UK', { hour: '2-digit', minute: '2-digit', hour12: false });
                                    // console.log(newTime);
                                    if ($("#" + cls_inp_s).val() <= newTime) {
                                        swal_c(type = 'error', title = 'Error...', text = '<b>TIMMER 3 : time</b> must be more than the <b>' + newTime + '</b> !');
                                        $("#" + cls_inp_s).addClass("input_err");
                                        return false;
                                    } else {
                                        $("#" + cls_inp_s).removeClass("input_err");
                                    }
                                }
                                var s_3 = $("#time_s_" + numb_s + "_3").val();
                                var e_3 = $("#time_e_" + numb_s + "_3").val();
                            } else {
                                var sw_3 = "0";
                                if (numb_s !== "11") {
                                    var s_3 = "";
                                    var e_3 = "";
                                } else {
                                    var s_3 = "";
                                    var e_3 = "0";
                                    $("#time_s_" + numb_s + "_3").removeClass("input_err");
                                    $("#time_s_" + numb_s + "_4").removeClass("input_err");
                                    $("#time_s_" + numb_s + "_5").removeClass("input_err");
                                    $("#time_s_" + numb_s + "_6").removeClass("input_err");
                                }
                            }
                            if ($("#" + numb_s + "_4").prop('checked') === true) {
                                var sw_4 = "1";
                                var cls_inp_s = "time_s_" + numb_s + "_4";
                                var cls_inp_e = "time_e_" + numb_s + "_4";
                                if ($("#" + cls_inp_s).val() === "") {
                                    $("#" + cls_inp_s).addClass("input_err");
                                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER 4 : Please specify the <b> Start time</b> !');
                                    return false;
                                } else {
                                    $("#" + cls_inp_s).removeClass("input_err");
                                }
                                if ($("#" + cls_inp_e).val() === "") {
                                    $("#" + cls_inp_e).addClass("input_err");
                                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER 4 : Please specify the <b> End time</b> !');
                                    return false;
                                } else {
                                    $("#" + cls_inp_e).removeClass("input_err");
                                }
                                if (numb_s !== "11") {
                                    if ($("#" + cls_inp_s).val() >= $("#" + cls_inp_e).val()) {
                                        $("#" + cls_inp_e).addClass("input_err");
                                        swal_c(type = 'error', title = 'Error...', text = 'TIMMER 4 : <b>Start time</b> must be less than the <b>End time</b> !');
                                        return false;
                                    } else {
                                        $("#" + cls_inp_e).removeClass("input_err");
                                    }
                                } else { //=11
                                    var minsToAdd = 15;
                                    var time = $("#time_s_" + numb_s + "_3").val();
                                    var newTime = new Date(new Date("1970/01/01 " + time).getTime() + minsToAdd * 60000).toLocaleTimeString('en-UK', { hour: '2-digit', minute: '2-digit', hour12: false });
                                    // console.log(newTime);
                                    if ($("#" + cls_inp_s).val() <= newTime) {
                                        swal_c(type = 'error', title = 'Error...', text = '<b>TIMMER 4 : time</b> must be more than the <b>' + newTime + '</b> !');
                                        $("#" + cls_inp_s).addClass("input_err");
                                        return false;
                                    } else {
                                        $("#" + cls_inp_s).removeClass("input_err");
                                    }
                                }
                                var s_4 = $("#time_s_" + numb_s + "_4").val();
                                var e_4 = $("#time_e_" + numb_s + "_4").val();
                            } else {
                                var sw_4 = "0";
                                if (numb_s !== "11") {
                                    var s_4 = "";
                                    var e_4 = "";
                                } else {
                                    var s_4 = "";
                                    var e_4 = "0";
                                    $("#time_s_" + numb_s + "_4").removeClass("input_err");
                                    $("#time_s_" + numb_s + "_5").removeClass("input_err");
                                    $("#time_s_" + numb_s + "_6").removeClass("input_err");
                                }
                            }
                            if ($("#" + numb_s + "_5").prop('checked') === true) {
                                var sw_5 = "1";
                                var cls_inp_s = "time_s_" + numb_s + "_5";
                                var cls_inp_e = "time_e_" + numb_s + "_5";
                                if ($("#" + cls_inp_s).val() === "") {
                                    $("#" + cls_inp_s).addClass("input_err");
                                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER 5 : Please specify the <b> Start time</b> !');
                                    return false;
                                } else {
                                    $("#" + cls_inp_s).removeClass("input_err");
                                }
                                if ($("#" + cls_inp_e).val() === "") {
                                    $("#" + cls_inp_e).addClass("input_err");
                                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER 5 : Please specify the <b> End time</b> !');
                                    return false;
                                } else {
                                    $("#" + cls_inp_e).removeClass("input_err");
                                }
                                if (numb_s !== "11") {
                                    if ($("#" + cls_inp_s).val() >= $("#" + cls_inp_e).val()) {
                                        $("#" + cls_inp_e).addClass("input_err");
                                        swal_c(type = 'error', title = 'Error...', text = 'TIMMER 5 : <b>Start time</b> must be less than the <b>End time</b> !');
                                        return false;
                                    } else {
                                        $("#" + cls_inp_e).removeClass("input_err");
                                    }
                                } else { //=11
                                    var minsToAdd = 15;
                                    var time = $("#time_s_" + numb_s + "_4").val();
                                    var newTime = new Date(new Date("1970/01/01 " + time).getTime() + minsToAdd * 60000).toLocaleTimeString('en-UK', { hour: '2-digit', minute: '2-digit', hour12: false });
                                    // console.log(newTime);
                                    if ($("#" + cls_inp_s).val() <= newTime) {
                                        swal_c(type = 'error', title = 'Error...', text = '<b>TIMMER 5 : time</b> must be more than the <b>' + newTime + '</b> !');
                                        $("#" + cls_inp_s).addClass("input_err");
                                        return false;
                                    } else {
                                        $("#" + cls_inp_s).removeClass("input_err");
                                    }
                                }
                                var s_5 = $("#time_s_" + numb_s + "_5").val();
                                var e_5 = $("#time_e_" + numb_s + "_5").val();
                            } else {
                                var sw_5 = "0";
                                if (numb_s !== "11") {
                                    var s_5 = "";
                                    var e_5 = "";
                                } else {
                                    var s_5 = "";
                                    var e_5 = "0";
                                    $("#time_s_" + numb_s + "_5").removeClass("input_err");
                                    $("#time_s_" + numb_s + "_6").removeClass("input_err");
                                }
                            }
                            if ($("#" + numb_s + "_6").prop('checked') === true) {
                                var sw_6 = "1";
                                var cls_inp_s = "time_s_" + numb_s + "_6";
                                var cls_inp_e = "time_e_" + numb_s + "_6";
                                if ($("#" + cls_inp_s).val() === "") {
                                    $("#" + cls_inp_s).addClass("input_err");
                                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER 6 : Please specify the <b> Start time</b> !');
                                    return false;
                                } else {
                                    $("#" + cls_inp_s).removeClass("input_err");
                                }
                                if ($("#" + cls_inp_e).val() === "") {
                                    $("#" + cls_inp_e).addClass("input_err");
                                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER 6 : Please specify the <b> End time</b> !');
                                    return false;
                                } else {
                                    $("#" + cls_inp_e).removeClass("input_err");
                                }
                                if (numb_s !== "11") {
                                    if ($("#" + cls_inp_s).val() >= $("#" + cls_inp_e).val()) {
                                        $("#" + cls_inp_e).addClass("input_err");
                                        swal_c(type = 'error', title = 'Error...', text = 'TIMMER 6 : <b>Start time</b> must be less than the <b>End time</b> !');
                                        return false;
                                    } else {
                                        $("#" + cls_inp_e).removeClass("input_err");
                                    }
                                } else { //=11
                                    var minsToAdd = 15;
                                    var time = $("#time_s_" + numb_s + "_5").val();
                                    var newTime = new Date(new Date("1970/01/01 " + time).getTime() + minsToAdd * 60000).toLocaleTimeString('en-UK', { hour: '2-digit', minute: '2-digit', hour12: false });
                                    // console.log(newTime);
                                    if ($("#" + cls_inp_s).val() <= newTime) {
                                        swal_c(type = 'error', title = 'Error...', text = '<b>TIMMER 6 : time</b> must be more than the <b>' + newTime + '</b> !');
                                        $("#" + cls_inp_s).addClass("input_err");
                                        return false;
                                    } else {
                                        $("#" + cls_inp_s).removeClass("input_err");
                                    }
                                }
                                var s_6 = $("#time_s_" + numb_s + "_6").val();
                                var e_6 = $("#time_e_" + numb_s + "_6").val();
                            } else {
                                var sw_6 = "0";
                                if (numb_s !== "11") {
                                    var s_6 = "";
                                    var e_6 = "";
                                } else {
                                    var s_6 = "";
                                    var e_6 = "0";
                                    $("#time_s_" + numb_s + "_6").removeClass("input_err");
                                }
                            }
                            if (numb_s === "9") {
                                if ($("#" + numb_s + "_7").prop('checked') === true) {
                                    var sw_7 = "1";
                                    var cls_inp_s = "time_s_" + numb_s + "_7";
                                    var cls_inp_e = "time_e_" + numb_s + "_7";
                                    if ($("#" + cls_inp_s).val() === "") {
                                        $("#" + cls_inp_s).addClass("input_err");
                                        swal_c(type = 'error', title = 'Error...', text = 'TIMMER 7 : Please specify the <b> Start time</b> !');
                                        return false;
                                    } else {
                                        $("#" + cls_inp_s).removeClass("input_err");
                                    }
                                    if ($("#" + cls_inp_e).val() === "") {
                                        $("#" + cls_inp_e).addClass("input_err");
                                        swal_c(type = 'error', title = 'Error...', text = 'TIMMER 7 : Please specify the <b> End time</b> !');
                                        return false;
                                    } else {
                                        $("#" + cls_inp_e).removeClass("input_err");
                                    }
                                    if ($("#" + cls_inp_s).val() >= $("#" + cls_inp_e).val()) {
                                        $("#" + cls_inp_e).addClass("input_err");
                                        swal_c(type = 'error', title = 'Error...', text = 'TIMMER 7 : <b>Start time</b> must be less than the <b>End time</b> !');
                                        return false;
                                    } else {
                                        $("#" + cls_inp_e).removeClass("input_err");
                                    }
                                    if ($("#time_on_" + numb_s + "_7").val() === "") {
                                        $("#time_on_" + numb_s + "_7").addClass("input_err");
                                        swal_c(type = 'error', title = 'Error...', text = 'TIMMER 7 : Please select the <b> Open every </b> !');
                                    } else {
                                        $("#time_on_" + numb_s + "_7").removeClass("input_err");
                                    }
                                    if ($("#time_off_" + numb_s + "_7").val() === "") {
                                        $("#time_off_" + numb_s + "_7").addClass("input_err");
                                        swal_c(type = 'error', title = 'Error...', text = 'TIMMER 7 : Please select the <b> Work </b> !');
                                    } else {
                                        $("#time_off_" + numb_s + "_7").removeClass("input_err");
                                    }
                                    var s_7 = $("#time_s_" + numb_s + "_7").val();
                                    var e_7 = $("#time_e_" + numb_s + "_7").val();
                                    var on_7 = $("#time_on_" + numb_s + "_7").val();
                                    var off_7 = $("#time_off_" + numb_s + "_7").val();
                                } else {
                                    var sw_7 = "0";
                                    var s_7 = "";
                                    var e_7 = "";
                                    var on_7 = "";
                                    var off_7 = "";
                                }
                            }

                            function swal_c(type, title, text) {
                                Swal({
                                    type: type,
                                    title: title,
                                    html: text,
                                    allowOutsideClick: false
                                });
                            }
                            var data = {
                                "tb_numb": numb_s,
                                "sw_1": sw_1,
                                "sw_2": sw_2,
                                "sw_3": sw_3,
                                "sw_4": sw_4,
                                "sw_5": sw_5,
                                "sw_6": sw_6,
                                "s_1": s_1,
                                "s_2": s_2,
                                "s_3": s_3,
                                "s_4": s_4,
                                "s_5": s_5,
                                "s_6": s_6,
                                "e_1": e_1,
                                "e_2": e_2,
                                "e_3": e_3,
                                "e_4": e_4,
                                "e_5": e_5,
                                "e_6": e_6
                            };
                            if (numb_s === "9") {
                                $.extend(data, {
                                    "sw_7": sw_7,
                                    "s_7": s_7,
                                    "e_7": e_7,
                                    "on_7": on_7,
                                    "off_7": off_7
                                });
                            }
                            // $.ajax({
                            //     url: "config_php/get_json_sw7.php",
                            //     method: "post",
                            //     data: {
                            //         sw_7: sw_7,
                            //         s_7: s_7,
                            //         e_7: e_7,
                            //         on_7: on_7,
                            //         off_7: off_7
                            //     },
                            //     dataType: "json",
                            //     success: function(json_sw7) {
                            //         console.log(json_sw7);
                            //     }
                            // });
                            // alert(JSON.stringify(data));
                            // alert(numb_s);
                            // return false;
                            $.ajax({
                                url: "config_php/insert_iog_load.php",
                                method: "post",
                                data: {
                                    house_master: house_master,
                                    data: data
                                },
                                dataType: "json",
                                success: function(log_data) {
                                    // console.log(log_data);
                                    // return false;
                                    if (log_data.data === "Insert_Success") {
                                        $.ajax({
                                            url: "config_php/get_json_sw7.php",
                                            method: "post",
                                            data: {
                                                sw_7: sw_7,
                                                s_7: s_7,
                                                e_7: e_7,
                                                on_7: on_7,
                                                off_7: off_7
                                            },
                                            dataType: "json",
                                            success: function(json_sw7) {
                                                // ---------------------------------
                                                var control_auto = {};
                                                // if (c_load_1 !== "") {
                                                if ($("#1_1").prop('checked') === true) { var s_1_1 = $("#time_s_1_1").val(); var e_1_1 = $("#time_e_1_1").val(); } else { var s_1_1 = "99:99"; var e_1_1 = "99:99"; }
                                                if ($("#1_2").prop('checked') === true) { var s_1_2 = $("#time_s_1_2").val(); var e_1_2 = $("#time_e_1_2").val(); } else { var s_1_2 = "99:99"; var e_1_2 = "99:99"; }
                                                if ($("#1_3").prop('checked') === true) { var s_1_3 = $("#time_s_1_3").val(); var e_1_3 = $("#time_e_1_3").val(); } else { var s_1_3 = "99:99"; var e_1_3 = "99:99"; }
                                                if ($("#1_4").prop('checked') === true) { var s_1_4 = $("#time_s_1_4").val(); var e_1_4 = $("#time_e_1_4").val(); } else { var s_1_4 = "99:99"; var e_1_4 = "99:99"; }
                                                if ($("#1_5").prop('checked') === true) { var s_1_5 = $("#time_s_1_5").val(); var e_1_5 = $("#time_e_1_5").val(); } else { var s_1_5 = "99:99"; var e_1_5 = "99:99"; }
                                                if ($("#1_6").prop('checked') === true) { var s_1_6 = $("#time_s_1_6").val(); var e_1_6 = $("#time_e_1_6").val(); } else { var s_1_6 = "99:99"; var e_1_6 = "99:99"; }

                                                $.extend(control_auto, {
                                                    'dripper_1': {
                                                        'S_1': s_1_1,
                                                        'E_1': e_1_1,
                                                        'S_2': s_1_2,
                                                        'E_2': e_1_2,
                                                        'S_3': s_1_3,
                                                        'E_3': e_1_3,
                                                        'S_4': s_1_4,
                                                        'E_4': e_1_4,
                                                        'S_5': s_1_5,
                                                        'E_5': e_1_5,
                                                        'S_6': s_1_6,
                                                        'E_6': e_1_6
                                                    }
                                                });
                                                // }
                                                // if (c_load_2 !== "") {
                                                if ($("#2_1").prop('checked') === true) { var s_2_1 = $("#time_s_2_1").val(); var e_2_1 = $("#time_e_2_1").val(); } else { var s_2_1 = "99:99"; var e_2_1 = "99:99"; }
                                                if ($("#2_2").prop('checked') === true) { var s_2_2 = $("#time_s_2_2").val(); var e_2_2 = $("#time_e_2_2").val(); } else { var s_2_2 = "99:99"; var e_2_2 = "99:99"; }
                                                if ($("#2_3").prop('checked') === true) { var s_2_3 = $("#time_s_2_3").val(); var e_2_3 = $("#time_e_2_3").val(); } else { var s_2_3 = "99:99"; var e_2_3 = "99:99"; }
                                                if ($("#2_4").prop('checked') === true) { var s_2_4 = $("#time_s_2_4").val(); var e_2_4 = $("#time_e_2_4").val(); } else { var s_2_4 = "99:99"; var e_2_4 = "99:99"; }
                                                if ($("#2_5").prop('checked') === true) { var s_2_5 = $("#time_s_2_5").val(); var e_2_5 = $("#time_e_2_5").val(); } else { var s_2_5 = "99:99"; var e_2_5 = "99:99"; }
                                                if ($("#2_6").prop('checked') === true) { var s_2_6 = $("#time_s_2_6").val(); var e_2_6 = $("#time_e_2_6").val(); } else { var s_2_6 = "99:99"; var e_2_6 = "99:99"; }

                                                $.extend(control_auto, {
                                                    'dripper_2': {
                                                        'S_1': s_2_1,
                                                        'E_1': e_2_1,
                                                        'S_2': s_2_2,
                                                        'E_2': e_2_2,
                                                        'S_3': s_2_3,
                                                        'E_3': e_2_3,
                                                        'S_4': s_2_4,
                                                        'E_4': e_2_4,
                                                        'S_5': s_2_5,
                                                        'E_5': e_2_5,
                                                        'S_6': s_2_6,
                                                        'E_6': e_2_6
                                                    }
                                                });
                                                // }
                                                // if (c_load_3 !== "") {
                                                if ($("#3_1").prop('checked') === true) { var s_3_1 = $("#time_s_3_1").val(); var e_3_1 = $("#time_e_3_1").val(); } else { var s_3_1 = "99:99"; var e_3_1 = "99:99"; }
                                                if ($("#3_2").prop('checked') === true) { var s_3_2 = $("#time_s_3_2").val(); var e_3_2 = $("#time_e_3_2").val(); } else { var s_3_2 = "99:99"; var e_3_2 = "99:99"; }
                                                if ($("#3_3").prop('checked') === true) { var s_3_3 = $("#time_s_3_3").val(); var e_3_3 = $("#time_e_3_3").val(); } else { var s_3_3 = "99:99"; var e_3_3 = "99:99"; }
                                                if ($("#3_4").prop('checked') === true) { var s_3_4 = $("#time_s_3_4").val(); var e_3_4 = $("#time_e_3_4").val(); } else { var s_3_4 = "99:99"; var e_3_4 = "99:99"; }
                                                if ($("#3_5").prop('checked') === true) { var s_3_5 = $("#time_s_3_5").val(); var e_3_5 = $("#time_e_3_5").val(); } else { var s_3_5 = "99:99"; var e_3_5 = "99:99"; }
                                                if ($("#3_6").prop('checked') === true) { var s_3_6 = $("#time_s_3_6").val(); var e_3_6 = $("#time_e_3_6").val(); } else { var s_3_6 = "99:99"; var e_3_6 = "99:99"; }

                                                $.extend(control_auto, {
                                                    'dripper_3': {
                                                        'S_1': s_3_1,
                                                        'E_1': e_3_1,
                                                        'S_2': s_3_2,
                                                        'E_2': e_3_2,
                                                        'S_3': s_3_3,
                                                        'E_3': e_3_3,
                                                        'S_4': s_3_4,
                                                        'E_4': e_3_4,
                                                        'S_5': s_3_5,
                                                        'E_5': e_3_5,
                                                        'S_6': s_3_6,
                                                        'E_6': e_3_6
                                                    }
                                                });
                                                // }
                                                // if (c_load_4 !== "") {
                                                if ($("#4_1").prop('checked') === true) { var s_4_1 = $("#time_s_4_1").val(); var e_4_1 = $("#time_e_4_1").val(); } else { var s_4_1 = "99:99"; var e_4_1 = "99:99"; }
                                                if ($("#4_2").prop('checked') === true) { var s_4_2 = $("#time_s_4_2").val(); var e_4_2 = $("#time_e_4_2").val(); } else { var s_4_2 = "99:99"; var e_4_2 = "99:99"; }
                                                if ($("#4_3").prop('checked') === true) { var s_4_3 = $("#time_s_4_3").val(); var e_4_3 = $("#time_e_4_3").val(); } else { var s_4_3 = "99:99"; var e_4_3 = "99:99"; }
                                                if ($("#4_4").prop('checked') === true) { var s_4_4 = $("#time_s_4_4").val(); var e_4_4 = $("#time_e_4_4").val(); } else { var s_4_4 = "99:99"; var e_4_4 = "99:99"; }
                                                if ($("#4_5").prop('checked') === true) { var s_4_5 = $("#time_s_4_5").val(); var e_4_5 = $("#time_e_4_5").val(); } else { var s_4_5 = "99:99"; var e_4_5 = "99:99"; }
                                                if ($("#4_6").prop('checked') === true) { var s_4_6 = $("#time_s_4_6").val(); var e_4_6 = $("#time_e_4_6").val(); } else { var s_4_6 = "99:99"; var e_4_6 = "99:99"; }

                                                $.extend(control_auto, {
                                                    'dripper_4': {
                                                        'S_1': s_4_1,
                                                        'E_1': e_4_1,
                                                        'S_2': s_4_2,
                                                        'E_2': e_4_2,
                                                        'S_3': s_4_3,
                                                        'E_3': e_4_3,
                                                        'S_4': s_4_4,
                                                        'E_4': e_4_4,
                                                        'S_5': s_4_5,
                                                        'E_5': e_4_5,
                                                        'S_6': s_4_6,
                                                        'E_6': e_4_6
                                                    }
                                                });
                                                // }
                                                if (c_load_5 !== "") {
                                                    if ($("#5_1").prop('checked') === true) { var s_5_1 = $("#time_s_5_1").val(); var e_5_1 = $("#time_e_5_1").val(); } else { var s_5_1 = "99:99"; var e_5_1 = "99:99"; }
                                                    if ($("#5_2").prop('checked') === true) { var s_5_2 = $("#time_s_5_2").val(); var e_5_2 = $("#time_e_5_2").val(); } else { var s_5_2 = "99:99"; var e_5_2 = "99:99"; }
                                                    if ($("#5_3").prop('checked') === true) { var s_5_3 = $("#time_s_5_3").val(); var e_5_3 = $("#time_e_5_3").val(); } else { var s_5_3 = "99:99"; var e_5_3 = "99:99"; }
                                                    if ($("#5_4").prop('checked') === true) { var s_5_4 = $("#time_s_5_4").val(); var e_5_4 = $("#time_e_5_4").val(); } else { var s_5_4 = "99:99"; var e_5_4 = "99:99"; }
                                                    if ($("#5_5").prop('checked') === true) { var s_5_5 = $("#time_s_5_5").val(); var e_5_5 = $("#time_e_5_5").val(); } else { var s_5_5 = "99:99"; var e_5_5 = "99:99"; }
                                                    if ($("#5_6").prop('checked') === true) { var s_5_6 = $("#time_s_5_6").val(); var e_5_6 = $("#time_e_5_6").val(); } else { var s_5_6 = "99:99"; var e_5_6 = "99:99"; }

                                                    $.extend(control_auto, {
                                                        'dripper_5': {
                                                            'S_1': s_5_1,
                                                            'E_1': e_5_1,
                                                            'S_2': s_5_2,
                                                            'E_2': e_5_2,
                                                            'S_3': s_5_3,
                                                            'E_3': e_5_3,
                                                            'S_4': s_5_4,
                                                            'E_4': e_5_4,
                                                            'S_5': s_5_5,
                                                            'E_5': e_5_5,
                                                            'S_6': s_5_6,
                                                            'E_6': e_5_6
                                                        }
                                                    });
                                                }
                                                if (c_load_6 !== "") {
                                                    if ($("#6_1").prop('checked') === true) { var s_6_1 = $("#time_s_6_1").val(); var e_6_1 = $("#time_e_6_1").val(); } else { var s_6_1 = "99:99"; var e_6_1 = "99:99"; }
                                                    if ($("#6_2").prop('checked') === true) { var s_6_2 = $("#time_s_6_2").val(); var e_6_2 = $("#time_e_6_2").val(); } else { var s_6_2 = "99:99"; var e_6_2 = "99:99"; }
                                                    if ($("#6_3").prop('checked') === true) { var s_6_3 = $("#time_s_6_3").val(); var e_6_3 = $("#time_e_6_3").val(); } else { var s_6_3 = "99:99"; var e_6_3 = "99:99"; }
                                                    if ($("#6_4").prop('checked') === true) { var s_6_4 = $("#time_s_6_4").val(); var e_6_4 = $("#time_e_6_4").val(); } else { var s_6_4 = "99:99"; var e_6_4 = "99:99"; }
                                                    if ($("#6_5").prop('checked') === true) { var s_6_5 = $("#time_s_6_5").val(); var e_6_5 = $("#time_e_6_5").val(); } else { var s_6_5 = "99:99"; var e_6_5 = "99:99"; }
                                                    if ($("#6_6").prop('checked') === true) { var s_6_6 = $("#time_s_6_6").val(); var e_6_6 = $("#time_e_6_6").val(); } else { var s_6_6 = "99:99"; var e_6_6 = "99:99"; }

                                                    $.extend(control_auto, {
                                                        'dripper_6': {
                                                            'S_1': s_6_1,
                                                            'E_1': e_6_1,
                                                            'S_2': s_6_2,
                                                            'E_2': e_6_2,
                                                            'S_3': s_6_3,
                                                            'E_3': e_6_3,
                                                            'S_4': s_6_4,
                                                            'E_4': e_6_4,
                                                            'S_5': s_6_5,
                                                            'E_5': e_6_5,
                                                            'S_6': s_6_6,
                                                            'E_6': e_6_6
                                                        }
                                                    });
                                                }
                                                if (c_load_7 !== "") {
                                                    if ($("#7_1").prop('checked') === true) { var s_7_1 = $("#time_s_7_1").val(); var e_7_1 = $("#time_e_7_1").val(); } else { var s_7_1 = "99:99"; var e_7_1 = "99:99"; }
                                                    if ($("#7_2").prop('checked') === true) { var s_7_2 = $("#time_s_7_2").val(); var e_7_2 = $("#time_e_7_2").val(); } else { var s_7_2 = "99:99"; var e_7_2 = "99:99"; }
                                                    if ($("#7_3").prop('checked') === true) { var s_7_3 = $("#time_s_7_3").val(); var e_7_3 = $("#time_e_7_3").val(); } else { var s_7_3 = "99:99"; var e_7_3 = "99:99"; }
                                                    if ($("#7_4").prop('checked') === true) { var s_7_4 = $("#time_s_7_4").val(); var e_7_4 = $("#time_e_7_4").val(); } else { var s_7_4 = "99:99"; var e_7_4 = "99:99"; }
                                                    if ($("#7_5").prop('checked') === true) { var s_7_5 = $("#time_s_7_5").val(); var e_7_5 = $("#time_e_7_5").val(); } else { var s_7_5 = "99:99"; var e_7_5 = "99:99"; }
                                                    if ($("#7_6").prop('checked') === true) { var s_7_6 = $("#time_s_7_6").val(); var e_7_6 = $("#time_e_7_6").val(); } else { var s_7_6 = "99:99"; var e_7_6 = "99:99"; }

                                                    $.extend(control_auto, {
                                                        'dripper_7': {
                                                            'S_1': s_7_1,
                                                            'E_1': e_7_1,
                                                            'S_2': s_7_2,
                                                            'E_2': e_7_2,
                                                            'S_3': s_7_3,
                                                            'E_3': e_7_3,
                                                            'S_4': s_7_4,
                                                            'E_4': e_7_4,
                                                            'S_5': s_7_5,
                                                            'E_5': e_7_5,
                                                            'S_6': s_7_6,
                                                            'E_6': e_7_6
                                                        }
                                                    });
                                                }
                                                if (c_load_8 !== "") {
                                                    if ($("#8_1").prop('checked') === true) { var s_8_1 = $("#time_s_8_1").val(); var e_8_1 = $("#time_e_8_1").val(); } else { var s_8_1 = "99:99"; var e_8_1 = "99:99"; }
                                                    if ($("#8_2").prop('checked') === true) { var s_8_2 = $("#time_s_8_2").val(); var e_8_2 = $("#time_e_8_2").val(); } else { var s_8_2 = "99:99"; var e_8_2 = "99:99"; }
                                                    if ($("#8_3").prop('checked') === true) { var s_8_3 = $("#time_s_8_3").val(); var e_8_3 = $("#time_e_8_3").val(); } else { var s_8_3 = "99:99"; var e_8_3 = "99:99"; }
                                                    if ($("#8_4").prop('checked') === true) { var s_8_4 = $("#time_s_8_4").val(); var e_8_4 = $("#time_e_8_4").val(); } else { var s_8_4 = "99:99"; var e_8_4 = "99:99"; }
                                                    if ($("#8_5").prop('checked') === true) { var s_8_5 = $("#time_s_8_5").val(); var e_8_5 = $("#time_e_8_5").val(); } else { var s_8_5 = "99:99"; var e_8_5 = "99:99"; }
                                                    if ($("#8_6").prop('checked') === true) { var s_8_6 = $("#time_s_8_6").val(); var e_8_6 = $("#time_e_8_6").val(); } else { var s_8_6 = "99:99"; var e_8_6 = "99:99"; }

                                                    $.extend(control_auto, {
                                                        'dripper_8': {
                                                            'S_1': s_8_1,
                                                            'E_1': e_8_1,
                                                            'S_2': s_8_2,
                                                            'E_2': e_8_2,
                                                            'S_3': s_8_3,
                                                            'E_3': e_8_3,
                                                            'S_4': s_8_4,
                                                            'E_4': e_8_4,
                                                            'S_5': s_8_5,
                                                            'E_5': e_8_5,
                                                            'S_6': s_8_6,
                                                            'E_6': e_8_6
                                                        }
                                                    });
                                                }
                                                // if (c_load_9 !== "") {
                                                if ($("#9_1").prop('checked') === true) { var s_9_1 = $("#time_s_9_1").val(); var e_9_1 = $("#time_e_9_1").val(); } else { var s_9_1 = "99:99"; var e_9_1 = "99:99"; }
                                                if ($("#9_2").prop('checked') === true) { var s_9_2 = $("#time_s_9_2").val(); var e_9_2 = $("#time_e_9_2").val(); } else { var s_9_2 = "99:99"; var e_9_2 = "99:99"; }
                                                if ($("#9_3").prop('checked') === true) { var s_9_3 = $("#time_s_9_3").val(); var e_9_3 = $("#time_e_9_3").val(); } else { var s_9_3 = "99:99"; var e_9_3 = "99:99"; }
                                                if ($("#9_4").prop('checked') === true) { var s_9_4 = $("#time_s_9_4").val(); var e_9_4 = $("#time_e_9_4").val(); } else { var s_9_4 = "99:99"; var e_9_4 = "99:99"; }
                                                if ($("#9_5").prop('checked') === true) { var s_9_5 = $("#time_s_9_5").val(); var e_9_5 = $("#time_e_9_5").val(); } else { var s_9_5 = "99:99"; var e_9_5 = "99:99"; }
                                                if ($("#9_6").prop('checked') === true) { var s_9_6 = $("#time_s_9_6").val(); var e_9_6 = $("#time_e_9_6").val(); } else { var s_9_6 = "99:99"; var e_9_6 = "99:99"; }

                                                // console.log(json_sw7["foggy"]);

                                                if ($("#9_7").prop('checked') === true) {
                                                    $.extend(control_auto, json_sw7);
                                                } else {
                                                    $.extend(control_auto, {
                                                        'foggy': {
                                                            'S_1': s_9_1,
                                                            'E_1': e_9_1,
                                                            'S_2': s_9_2,
                                                            'E_2': e_9_2,
                                                            'S_3': s_9_3,
                                                            'E_3': e_9_3,
                                                            'S_4': s_9_4,
                                                            'E_4': e_9_4,
                                                            'S_5': s_9_5,
                                                            'E_5': e_9_5,
                                                            'S_6': s_9_6,
                                                            'E_6': e_9_6
                                                        }
                                                    });
                                                }

                                                // }
                                                // if (c_load_10 !== "") {
                                                if ($("#10_1").prop('checked') === true) { var s_10_1 = $("#time_s_10_1").val(); var e_10_1 = $("#time_e_10_1").val(); } else { var s_10_1 = "99:99"; var e_10_1 = "99:99"; }
                                                if ($("#10_2").prop('checked') === true) { var s_10_2 = $("#time_s_10_2").val(); var e_10_2 = $("#time_e_10_2").val(); } else { var s_10_2 = "99:99"; var e_10_2 = "99:99"; }
                                                if ($("#10_3").prop('checked') === true) { var s_10_3 = $("#time_s_10_3").val(); var e_10_3 = $("#time_e_10_3").val(); } else { var s_10_3 = "99:99"; var e_10_3 = "99:99"; }
                                                if ($("#10_4").prop('checked') === true) { var s_10_4 = $("#time_s_10_4").val(); var e_10_4 = $("#time_e_10_4").val(); } else { var s_10_4 = "99:99"; var e_10_4 = "99:99"; }
                                                if ($("#10_5").prop('checked') === true) { var s_10_5 = $("#time_s_10_5").val(); var e_10_5 = $("#time_e_10_5").val(); } else { var s_10_5 = "99:99"; var e_10_5 = "99:99"; }
                                                if ($("#10_6").prop('checked') === true) { var s_10_6 = $("#time_s_10_6").val(); var e_10_6 = $("#time_e_10_6").val(); } else { var s_10_6 = "99:99"; var e_10_6 = "99:99"; }

                                                $.extend(control_auto, {
                                                    'fan': {
                                                        'S_1': s_10_1,
                                                        'E_1': e_10_1,
                                                        'S_2': s_10_2,
                                                        'E_2': e_10_2,
                                                        'S_3': s_10_3,
                                                        'E_3': e_10_3,
                                                        'S_4': s_10_4,
                                                        'E_4': e_10_4,
                                                        'S_5': s_10_5,
                                                        'E_5': e_10_5,
                                                        'S_6': s_10_6,
                                                        'E_6': e_10_6
                                                    }
                                                });
                                                // }
                                                // if (c_load_11 !== "") {
                                                if ($("#11_1").prop('checked') === true) { var s_11_1 = $("#time_s_11_1").val(); var e_11_1 = $("#time_e_11_1").val(); } else { var s_11_1 = "99:99"; var e_11_1 = "0"; }
                                                if ($("#11_2").prop('checked') === true) { var s_11_2 = $("#time_s_11_2").val(); var e_11_2 = $("#time_e_11_2").val(); } else { var s_11_2 = "99:99"; var e_11_2 = "0"; }
                                                if ($("#11_3").prop('checked') === true) { var s_11_3 = $("#time_s_11_3").val(); var e_11_3 = $("#time_e_11_3").val(); } else { var s_11_3 = "99:99"; var e_11_3 = "0"; }
                                                if ($("#11_4").prop('checked') === true) { var s_11_4 = $("#time_s_11_4").val(); var e_11_4 = $("#time_e_11_4").val(); } else { var s_11_4 = "99:99"; var e_11_4 = "0"; }
                                                if ($("#11_5").prop('checked') === true) { var s_11_5 = $("#time_s_11_5").val(); var e_11_5 = $("#time_e_11_5").val(); } else { var s_11_5 = "99:99"; var e_11_5 = "0"; }
                                                if ($("#11_6").prop('checked') === true) { var s_11_6 = $("#time_s_11_6").val(); var e_11_6 = $("#time_e_11_6").val(); } else { var s_11_6 = "99:99"; var e_11_6 = "0"; }

                                                $.extend(control_auto, {
                                                    'shader': {
                                                        'S_1': { 'T': s_11_1, 'L': e_11_1 },
                                                        'S_2': { 'T': s_11_2, 'L': e_11_2 },
                                                        'S_3': { 'T': s_11_3, 'L': e_11_3 },
                                                        'S_4': { 'T': s_11_4, 'L': e_11_4 },
                                                        'S_5': { 'T': s_11_5, 'L': e_11_5 },
                                                        'S_6': { 'T': s_11_6, 'L': e_11_6 }
                                                        // 'S_2': s_11_2,
                                                        // 'L_2': e_11_2,
                                                        // 'S_3': s_11_3,
                                                        // 'L_3': e_11_3,
                                                        // 'S_4': s_11_4,
                                                        // 'L_4': e_11_4,
                                                        // 'S_5': s_11_5,
                                                        // 'L_5': e_11_5,
                                                        // 'S_6': s_11_6,
                                                        // 'L_6': e_11_6
                                                    }
                                                });
                                                // }
                                                var json_msg = JSON.stringify(control_auto);


                                                // console.log(json_msg);
                                                message = new Paho.MQTT.Message(json_msg);
                                                message.destinationName = house_master + "/1/control/time_control";
                                                message.qos = 1;
                                                message.retained = true;
                                                client.send(message);
                                            }
                                        });
                                        // ---------------------------------------------------------------
                                        if (data.sw_1 === "1") {
                                            $("#" + numb_s + "_1").bootstrapToggle('on');
                                            $("." + numb_s + "_1").attr("src", "dist/images/icon/switck_on.png");
                                        } else {
                                            $("#" + numb_s + "_1").bootstrapToggle('off');
                                            $("." + numb_s + "_1").attr("src", "dist/images/icon/switck_off.png");
                                        }
                                        if (data.sw_2 === "1") {
                                            $("#" + numb_s + "_2").bootstrapToggle('on');
                                            $("." + numb_s + "_2").attr("src", "dist/images/icon/switck_on.png");
                                        } else {
                                            $("#" + numb_s + "_2").bootstrapToggle('off');
                                            $("." + numb_s + "_2").attr("src", "dist/images/icon/switck_off.png");
                                        }
                                        if (data.sw_3 === "1") {
                                            $("#" + numb_s + "_3").bootstrapToggle('on');
                                            $("." + numb_s + "_3").attr("src", "dist/images/icon/switck_on.png");
                                        } else {
                                            $("#" + numb_s + "_3").bootstrapToggle('off');
                                            $("." + numb_s + "_3").attr("src", "dist/images/icon/switck_off.png");
                                        }
                                        if (data.sw_4 === "1") {
                                            $("#" + numb_s + "_4").bootstrapToggle('on');
                                            $("." + numb_s + "_4").attr("src", "dist/images/icon/switck_on.png");
                                        } else {
                                            $("#" + numb_s + "_4").bootstrapToggle('off');
                                            $("." + numb_s + "_4").attr("src", "dist/images/icon/switck_off.png");
                                        }
                                        if (data.sw_5 === "1") {
                                            $("#" + numb_s + "_5").bootstrapToggle('on');
                                            $("." + numb_s + "_5").attr("src", "dist/images/icon/switck_on.png");
                                        } else {
                                            $("#" + numb_s + "_5").bootstrapToggle('off');
                                            $("." + numb_s + "_5").attr("src", "dist/images/icon/switck_off.png");
                                        }
                                        if (data.sw_6 === "1") {
                                            $("#" + numb_s + "_6").bootstrapToggle('on');
                                            $("." + numb_s + "_6").attr("src", "dist/images/icon/switck_on.png");
                                        } else {
                                            $("#" + numb_s + "_6").bootstrapToggle('off');
                                            $("." + numb_s + "_6").attr("src", "dist/images/icon/switck_off.png");
                                        }
                                        // ---------------------------
                                        $("#time_s_" + numb_s + "_1").prop('disabled', true).val(data.s_1);
                                        $("#time_e_" + numb_s + "_1").prop('disabled', true).val(data.e_1);
                                        $("#time_s_" + numb_s + "_2").prop('disabled', true).val(data.s_2);
                                        $("#time_e_" + numb_s + "_2").prop('disabled', true).val(data.e_2);
                                        $("#time_s_" + numb_s + "_3").prop('disabled', true).val(data.s_3);
                                        $("#time_e_" + numb_s + "_3").prop('disabled', true).val(data.e_3);
                                        $("#time_s_" + numb_s + "_4").prop('disabled', true).val(data.s_4);
                                        $("#time_e_" + numb_s + "_4").prop('disabled', true).val(data.e_4);
                                        $("#time_s_" + numb_s + "_5").prop('disabled', true).val(data.s_5);
                                        $("#time_e_" + numb_s + "_5").prop('disabled', true).val(data.e_5);
                                        $("#time_s_" + numb_s + "_6").prop('disabled', true).val(data.s_6);
                                        $("#time_e_" + numb_s + "_6").prop('disabled', true).val(data.e_6);

                                        swal({
                                            title: 'Successfully.',
                                            // text: "" + sw_name + " ?",
                                            type: 'success',
                                            allowOutsideClick: false,
                                            confirmButtonColor: '#32CD32'
                                        });

                                        $(".nav-link").removeClass('disabled');
                                        $(".img_sw").show();
                                        $('.input_time').prop('disabled', true);
                                        $(".sw_toggle").hide();
                                        $(".edit_cont").show();
                                        // console.log(numb2);
                                        $(".sw_mode_Auto").attr('disabled', false);
                                        $(".sw_mode_Manual").attr('disabled', false);
                                        $(".close_modal").show();
                                        $("#save_auto_cont").hide();
                                        $("#close_auto_cont").hide();
                                        $("#hidden_edit_cont").val("");
                                        $(".show_contfertilizer").show();
                                        return false;
                                    } else if (log_data.data === "ข้อมูลซ้ำ") {
                                        // swal({
                                        //     title: 'Duplicate data !',
                                        //     // text: "" + sw_name + " ?",
                                        //     type: 'warning',
                                        //     allowOutsideClick: false,
                                        //     confirmButtonColor: '#32CD32'
                                        // });
                                        return false;
                                    } else {
                                        swal({
                                            title: 'Error !',
                                            text: "ddddd ?",
                                            type: 'error',
                                            allowOutsideClick: false,
                                            confirmButtonColor: '#32CD32'
                                        });
                                    }
                                }
                            });
                        } else { // save_auto_cont house_master === "KMUMT001"
                            var Rmx1 = $(".range_control1").val().split(";");
                            var Rmx2 = $(".range_control2").val().split(";");
                            var Rmx3 = $(".range_control3").val().split(";");
                            var Rmx5 = $(".range_control5").val().split(";");

                            // return false;
                            $.ajax({
                                url: "config_php/insert_autoMode.php",
                                method: "post",
                                data: {
                                    house_master: house_master,
                                    A1: $(".range_control1").val(),
                                    A2: $(".range_control2").val(),
                                    A3: $(".range_control3").val(),
                                    A5: $(".range_control5").val()
                                },
                                dataType: "json",
                                success: function(res) {
                                    console.log(res);
                                    if (res === "Success") {
                                        message = new Paho.MQTT.Message(Rmx1[0]);
                                        message.destinationName = house_master + "/1/data_config/data_config_sprinnker_base_down";
                                        message.retained = true;
                                        client.send(message);

                                        message = new Paho.MQTT.Message(Rmx1[1]);
                                        message.destinationName = house_master + "/1/data_config/data_config_sprinnker_base_up";
                                        message.retained = true;
                                        client.send(message);

                                        message = new Paho.MQTT.Message(Rmx2[0]);
                                        message.destinationName = house_master + "/1/data_config/data_config_sprinnker_down";
                                        message.retained = true;
                                        client.send(message);

                                        message = new Paho.MQTT.Message(Rmx2[1]);
                                        message.destinationName = house_master + "/1/data_config/data_config_sprinnker_up";
                                        message.retained = true;
                                        client.send(message);

                                        message = new Paho.MQTT.Message(Rmx3[0]);
                                        message.destinationName = house_master + "/1/data_config/data_config_foggy_down";
                                        message.retained = true;
                                        client.send(message);

                                        message = new Paho.MQTT.Message(Rmx3[1]);
                                        message.destinationName = house_master + "/1/data_config/data_config_foggy_up";
                                        message.retained = true;
                                        client.send(message);

                                        message = new Paho.MQTT.Message(Rmx3[0]);
                                        message.destinationName = house_master + "/1/data_config/data_config_sprinnker_top_down";
                                        message.retained = true;
                                        client.send(message);

                                        message = new Paho.MQTT.Message(Rmx3[1]);
                                        message.destinationName = house_master + "/1/data_config/data_config_sprinnker_top_up";
                                        message.retained = true;
                                        client.send(message);

                                        message = new Paho.MQTT.Message(Rmx5[0]);
                                        message.destinationName = house_master + "/1/data_config/data_config_slan_down";
                                        message.retained = true;
                                        client.send(message);

                                        message = new Paho.MQTT.Message(Rmx5[1]);
                                        message.destinationName = house_master + "/1/data_config/data_config_slan_up";
                                        message.retained = true;
                                        client.send(message);

                                        swal({
                                            title: 'Successfully.',
                                            // text: "" + sw_name + " ?",
                                            type: 'success',
                                            allowOutsideClick: false,
                                            confirmButtonColor: '#32CD32'
                                        });

                                        kmutt_auto_mode(
                                            min1 = Rmx1[0], min2 = Rmx2[0], min3 = Rmx3[0], min5 = Rmx5[0],
                                            max1 = Rmx1[1], max2 = Rmx2[1], max3 = Rmx3[1], max5 = Rmx5[1],
                                            disb = true
                                        );

                                        $(".edit_cont").show();
                                        $("#save_auto_cont").hide();
                                        $("#close_auto_cont").hide();
                                        $(".sw_mode_Auto").attr('disabled', false);
                                        $(".sw_mode_Manual").attr('disabled', false);
                                        $(".close_modal").show();
                                        return false;
                                    } else {
                                        swal({
                                            title: 'Error !',
                                            text: "ddddd ?",
                                            type: 'error',
                                            allowOutsideClick: false,
                                            confirmButtonColor: '#32CD32'
                                        });
                                    }
                                }
                            });
                        }
                    });
                }
            }
        }); // exit ajax
    });
    $(".close_modal").click(function() {
        $("#save_auto_cont").hide();
        $("#close_auto_cont").hide();
        $("#Modal_control").modal("hide");
    });
}
// }
// });

function kmutt_auto_mode(min1, min2, min3, min5, max1, max2, max3, max5, disb) {
    var $range1 = $(".range_control1"),
        range_instance1;
    $range1.ionRangeSlider({
        type: "double",
        min: 0,
        max: 100,
        from: min1,
        to: max1,
        grid: true,
        // disable: true
        // onChange: function(data) {
        //     console.log(data);
        // },
    });
    range_instance1 = $range1.data("ionRangeSlider");
    range_instance1.update({
        from: min1,
        to: max1,
        "disable": disb
    });

    var $range2 = $(".range_control2"),
        range_instance2;
    $range2.ionRangeSlider({
        type: "double",
        min: 0,
        max: 100,
        from: min2,
        to: max2,
        grid: true,
        // disable: true
    });
    range_instance2 = $range2.data("ionRangeSlider");
    range_instance2.update({
        from: min2,
        to: max2,
        "disable": disb
    });

    var $range3 = $(".range_control3"),
        range_instance3;
    $range3.ionRangeSlider({
        type: "double",
        min: 0,
        max: 100,
        from: min3,
        to: max3,
        grid: true,
        // disable: true
    });
    range_instance3 = $range3.data("ionRangeSlider");
    range_instance3.update({
        from: min3,
        to: max3,
        "disable": disb
    });

    var $range5 = $(".range_control5"),
        range_instance5;
    $range5.ionRangeSlider({
        type: "double",
        min: 0,
        max: 100,
        from: min5,
        to: max5,
        grid: true,
        // disable: true
    });
    range_instance5 = $range5.data("ionRangeSlider");
    range_instance5.update({
        from: min5,
        to: max5,
        "disable": disb
    });
}

$(".edit_cont").click(function() {
    $(".nav-link").addClass('disabled');
    $(this).hide();
    if (house_master !== "KMUMT001") {
        var numb2 = $(this).attr("status");
        $("#hidden_edit_cont").val(numb2);
        $.ajax({
            url: "config_php/get_modal_control.php",
            method: "post",
            data: { house_master: house_master },
            dataType: "json",
            success: function(res) {
                var c_load_1 = res.load_1;
                var c_load_2 = res.load_2;
                var c_load_3 = res.load_3;
                var c_load_4 = res.load_4;
                var c_load_5 = res.load_5;
                var c_load_6 = res.load_6;
                var c_load_7 = res.load_7;
                var c_load_8 = res.load_8;
                var c_load_9 = res.load_9;
                var c_load_10 = res.load_10;
                var c_load_11 = res.load_11;
                // console.log(res);

                // $("#" + numb2 + "_1").bootstrapToggle('enable');
                // $("#" + numb2 + "_2").bootstrapToggle('enable');
                // $("#" + numb2 + "_3").bootstrapToggle('enable');
                // $("#" + numb2 + "_4").bootstrapToggle('enable');
                // $("#" + numb2 + "_5").bootstrapToggle('enable');
                // $("#" + numb2 + "_6").bootstrapToggle('enable');

                if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_1") === "1") {
                    $("#time_s_" + numb2 + "_1").prop('disabled', false);
                    $("#time_e_" + numb2 + "_1").prop('disabled', false);
                } else {
                    $("#time_s_" + numb2 + "_1").prop('disabled', true);
                    $("#time_e_" + numb2 + "_1").prop('disabled', true);
                }
                if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_2") === "1") {
                    $("#time_s_" + numb2 + "_2").prop('disabled', false);
                    $("#time_e_" + numb2 + "_2").prop('disabled', false);
                } else {
                    $("#time_s_" + numb2 + "_2").prop('disabled', true);
                    $("#time_e_" + numb2 + "_2").prop('disabled', true);
                }
                if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_3") === "1") {
                    $("#time_s_" + numb2 + "_3").prop('disabled', false);
                    $("#time_e_" + numb2 + "_3").prop('disabled', false);
                } else {
                    $("#time_s_" + numb2 + "_3").prop('disabled', true);
                    $("#time_e_" + numb2 + "_3").prop('disabled', true);
                }
                if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_4") === "1") {
                    $("#time_s_" + numb2 + "_4").prop('disabled', false);
                    $("#time_e_" + numb2 + "_4").prop('disabled', false);
                } else {
                    $("#time_s_" + numb2 + "_4").prop('disabled', true);
                    $("#time_e_" + numb2 + "_4").prop('disabled', true);
                }
                if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_5") === "1") {
                    $("#time_s_" + numb2 + "_5").prop('disabled', false);
                    $("#time_e_" + numb2 + "_5").prop('disabled', false);
                } else {
                    $("#time_s_" + numb2 + "_5").prop('disabled', true);
                    $("#time_e_" + numb2 + "_5").prop('disabled', true);
                }
                if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_6") === "1") {
                    $("#time_s_" + numb2 + "_6").prop('disabled', false);
                    $("#time_e_" + numb2 + "_6").prop('disabled', false);
                } else {
                    $("#time_s_" + numb2 + "_6").prop('disabled', true);
                    $("#time_e_" + numb2 + "_6").prop('disabled', true);
                }
                // alert(eval("c_load_" + numb2 + ".load_" + numb2 + "_st_7"));
                if (numb2 === "9") {
                    if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_7") === "1") {
                        $("#time_s_" + numb2 + "_7").prop('disabled', false);
                        $("#time_e_" + numb2 + "_7").prop('disabled', false);
                        $("#time_on_" + numb2 + "_7").prop('disabled', false);
                        $("#time_off_" + numb2 + "_7").prop('disabled', false);
                    } else {
                        $("#time_e_" + numb2 + "_7").prop('disabled', true);
                        $("#time_on_" + numb2 + "_7").prop('disabled', true);
                        $("#time_off_" + numb2 + "_7").prop('disabled', true);
                    }
                }
                // --------------
                if (numb2 !== "11") {
                    $(".img_sw").hide();
                    $(".sw_toggle").show();
                } else {
                    $(".swt_11_1").show();
                    $(".11_1").hide();
                    if ($('#11_1').prop('checked') === true) {
                        $(".11_2").hide();
                        $(".swt_11_2").show();
                    }
                    if ($('#11_2').prop('checked') === true) {
                        $(".11_3").hide();
                        $(".swt_11_3").show();
                    }
                    if ($('#11_3').prop('checked') === true) {
                        $(".11_4").hide();
                        $(".swt_11_4").show();
                    }
                    if ($('#11_4').prop('checked') === true) {
                        $(".11_5").hide();
                        $(".swt_11_5").show();
                    }
                    if ($('#11_5').prop('checked') === true) {
                        $(".11_6").hide();
                        $(".swt_11_6").show();
                    }
                }
                // console.log(numb2);
                // $("#save_auto_cont").show();
                $("#close_auto_cont").show();
                $(".sw_mode_Auto").attr('disabled', true);
                $(".sw_mode_Manual").attr('disabled', true);
                $(".close_modal").hide();
                $(".show_contfertilizer").hide();

                $('.input_check').change(function() {
                    var input_num = this.id.split("_");
                    // alert(numb2 + " " + $(this).prop('checked') + " - " + Number(input_num[1]));
                    if (numb2 === "11") { // Slan
                        if ($(this).prop('checked') === true) {
                            // console.log(".swt_" + numb2 + "_" + (Number(input_num[1]) + 1));
                            $(".swt_" + numb2 + "_" + (Number(input_num[1]) + 1)).show();
                            $("." + numb2 + "_" + (Number(input_num[1]) + 1)).hide();
                            for (var t = Number(input_num[1]); t <= 6; t++) {
                                $("#" + numb2 + "_" + (t + 1)).bootstrapToggle('off');
                                // console.log(".swt_" + n1umb2 + "_" + (t + 1));
                                // $(".swt_" + numb2 + "_" + (t + 1)).hide();
                                // $("." + numb2 + "_" + (t + 1)).show();
                            }
                            $("#time_s_" + this.id).prop('disabled', false).val(eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_" + Number(input_num[1])));
                            $("#time_e_" + this.id).prop('disabled', false).val(eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_" + Number(input_num[1])));
                            // console.log("Change event: " + Number(input_num[1]));
                        } else {
                            // -----------------
                            for (var t = Number(input_num[1]); t <= 6; t++) {
                                // console.log(".swt_" + numb2 + "_" + (t + 1));
                                $(".swt_" + numb2 + "_" + (t + 1)).hide();
                                $("#" + numb2 + "_" + (t + 1)).bootstrapToggle('off');
                                $("." + numb2 + "_" + (t + 1)).show().attr("src", "dist/images/icon/switck_off.png");
                                $("#time_s_" + numb2 + "_" + (t + 1)).prop('disabled', true).val("");
                                $("#time_e_" + numb2 + "_" + (t + 1)).prop('disabled', true).val("0");
                            }
                            $("#time_s_" + this.id).prop('disabled', true).val("").removeClass("input_err");
                            $("#time_e_" + this.id).prop('disabled', true).val("0");
                            // console.log("Change event: No");
                        }
                        btn_save_chang(numb2, close_btn = "");
                    } else if (numb2 === "9") { // foggy
                        if ($(this).prop('checked') === true) {
                            if (Number(input_num[1]) == "7") {
                                // alert(numb2 + " true 7 - " + Number(input_num[1]));
                                for (var b = 1; b <= 6; b++) {
                                    $("#" + numb2 + "_" + b).bootstrapToggle('off');
                                }
                                $("#time_s_" + this.id).prop('disabled', false).val(eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_" + Number(input_num[1])));
                                $("#time_e_" + this.id).prop('disabled', false).val(eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_" + Number(input_num[1])));
                                $("#time_on_" + this.id).prop('disabled', false).val(eval("c_load_" + numb2 + ".load_" + numb2 + "_time_on_" + Number(input_num[1])));
                                $("#time_off_" + this.id).prop('disabled', false).val(eval("c_load_" + numb2 + ".load_" + numb2 + "_time_off_" + Number(input_num[1])));
                            } else {
                                // alert(numb2 + " true no 7 - " + Number(input_num[1]));
                                $("#" + numb2 + "_7").bootstrapToggle('off');
                                $("#time_s_" + this.id).prop('disabled', false).val(eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_" + Number(input_num[1])));
                                $("#time_e_" + this.id).prop('disabled', false).val(eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_" + Number(input_num[1])));
                            }
                        } else {
                            if (Number(input_num[1]) == "7") {
                                $("#time_s_" + this.id).prop('disabled', true).val("");
                                $("#time_e_" + this.id).prop('disabled', true).val("");
                                $("#time_on_" + this.id).prop('disabled', true).val("");
                                $("#time_off_" + this.id).prop('disabled', true).val("");
                            } else {
                                // $("#" + numb2 + "_7").bootstrapToggle('off');
                                $("#time_s_" + this.id).prop('disabled', true).val("");
                                $("#time_e_" + this.id).prop('disabled', true).val("");
                            }
                        }
                        btn_save_chang(numb2, close_btn = "");
                    } else { // SW 1-6
                        if ($(this).prop('checked') === true) {
                            $("#time_s_" + this.id).prop('disabled', false).val(eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_" + Number(input_num[1])));
                            $("#time_e_" + this.id).prop('disabled', false).val(eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_" + Number(input_num[1])));
                            // console.log("Change event: " + Number(input_num[1]));
                        } else {
                            $("#time_s_" + this.id).prop('disabled', true).val("");
                            $("#time_e_" + this.id).prop('disabled', true).val("");
                            // console.log("Change event: No");
                        }
                        btn_save_chang(numb2, close_btn = "");
                    }
                });

                // -------------------------------------------
                $(".input_time").change(function() {
                    btn_save_chang(numb2, close_btn = "");
                });

                function btn_save_chang(numb2, close_btn) {
                    if (numb2 !== "11") {
                        if ($("#" + numb2 + "_1").prop('checked') === true) {
                            var sw_1 = "1";
                            var ss_1 = $("#time_s_" + numb2 + "_1").val();
                            var ee_1 = $("#time_e_" + numb2 + "_1").val();
                        } else {
                            var sw_1 = "0";
                            var ss_1 = "";
                            var ee_1 = "";
                        }
                        if ($("#" + numb2 + "_2").prop('checked') === true) {
                            var sw_2 = "1";
                            var ss_2 = $("#time_s_" + numb2 + "_2").val();
                            var ee_2 = $("#time_e_" + numb2 + "_2").val();
                        } else {
                            var sw_2 = "0";
                            var ss_2 = "";
                            var ee_2 = "";
                        }
                        if ($("#" + numb2 + "_3").prop('checked') === true) {
                            var sw_3 = "1";
                            var ss_3 = $("#time_s_" + numb2 + "_3").val();
                            var ee_3 = $("#time_e_" + numb2 + "_3").val();
                        } else {
                            var sw_3 = "0";
                            var ss_3 = "";
                            var ee_3 = "";
                        }
                        if ($("#" + numb2 + "_4").prop('checked') === true) {
                            var sw_4 = "1";
                            var ss_4 = $("#time_s_" + numb2 + "_4").val();
                            var ee_4 = $("#time_e_" + numb2 + "_4").val();
                        } else {
                            var sw_4 = "0";
                            var ss_4 = "";
                            var ee_4 = "";
                        }
                        if ($("#" + numb2 + "_5").prop('checked') === true) {
                            var sw_5 = "1";
                            var ss_5 = $("#time_s_" + numb2 + "_5").val();
                            var ee_5 = $("#time_e_" + numb2 + "_5").val();
                        } else {
                            var sw_5 = "0";
                            var ss_5 = "";
                            var ee_5 = "";
                        }
                        if ($("#" + numb2 + "_6").prop('checked') === true) {
                            var sw_6 = "1";
                            var ss_6 = $("#time_s_" + numb2 + "_6").val();
                            var ee_6 = $("#time_e_" + numb2 + "_6").val();
                        } else {
                            var sw_6 = "0";
                            var ss_6 = "";
                            var ee_6 = "";
                        }
                        if (numb2 === "9") {
                            if ($("#" + numb2 + "_7").prop('checked') === true) {
                                var sw_7 = "1";
                                var ss_7 = $("#time_s_" + numb2 + "_7").val();
                                var ee_7 = $("#time_e_" + numb2 + "_7").val();
                                var ee_on_7 = $("#time_on_" + numb2 + "_7").val();
                                var ee_off_7 = $("#time_off_" + numb2 + "_7").val();
                            } else {
                                var sw_7 = "0";
                                var ss_7 = "";
                                var ee_7 = "";
                                var ee_on_7 = "";
                                var ee_off_7 = "";
                            }
                        }
                        //=======
                        if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_1") === "1") {
                            var swD_1 = "1";
                            var sD_1 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_1");
                            var eD_1 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_1");
                        } else {
                            var swD_1 = "0";
                            var sD_1 = "";
                            var eD_1 = "";
                        }
                        if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_2") === "1") {
                            var swD_2 = "1";
                            var sD_2 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_2");
                            var eD_2 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_2");
                        } else {
                            var swD_2 = "0";
                            var sD_2 = "";
                            var eD_2 = "";
                        }
                        if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_3") === "1") {
                            var swD_3 = "1";
                            var sD_3 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_3");
                            var eD_3 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_3");
                        } else {
                            var swD_3 = "0";
                            var sD_3 = "";
                            var eD_3 = "";
                        }
                        if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_4") === "1") {
                            var swD_4 = "1";
                            var sD_4 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_4");
                            var eD_4 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_4");
                        } else {
                            var swD_4 = "0";
                            var sD_4 = "";
                            var eD_4 = "";
                        }
                        if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_5") === "1") {
                            var swD_5 = "1";
                            var sD_5 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_5");
                            var eD_5 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_5");
                        } else {
                            var swD_5 = "0";
                            var sD_5 = "";
                            var eD_5 = "";
                        }
                        if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_6") === "1") {
                            var swD_6 = "1";
                            var sD_6 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_6");
                            var eD_6 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_6");
                        } else {
                            var swD_6 = "0";
                            var sD_6 = "";
                            var eD_6 = "";
                        }
                        if (numb2 === "9") {
                            if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_7") === "1") {
                                var swD_7 = "1";
                                var sD_7 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_7");
                                var eD_7 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_7");
                                var eD_on_7 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_on_7");
                                var eD_off_7 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_off_7");
                            } else {
                                var swD_7 = "0";
                                var sD_7 = "";
                                var eD_7 = "";
                                var eD_on_7 = "";
                                var eD_off_7 = "";
                            }
                        }
                    } else { // =11
                        if ($("#" + numb2 + "_1").prop('checked') === true) {
                            var sw_1 = "1";
                            var ss_1 = $("#time_s_" + numb2 + "_1").val();
                            var ee_1 = $("#time_e_" + numb2 + "_1").val();
                        } else {
                            var sw_1 = "0";
                            var ss_1 = "";
                            var ee_1 = "0";
                        }
                        if ($("#" + numb2 + "_2").prop('checked') === true) {
                            var sw_2 = "1";
                            var ss_2 = $("#time_s_" + numb2 + "_2").val();
                            var ee_2 = $("#time_e_" + numb2 + "_2").val();
                        } else {
                            var sw_2 = "0";
                            var ss_2 = "";
                            var ee_2 = "0";
                        }
                        if ($("#" + numb2 + "_3").prop('checked') === true) {
                            var sw_3 = "1";
                            var ss_3 = $("#time_s_" + numb2 + "_3").val();
                            var ee_3 = $("#time_e_" + numb2 + "_3").val();
                        } else {
                            var sw_3 = "0";
                            var ss_3 = "";
                            var ee_3 = "0";
                        }
                        if ($("#" + numb2 + "_4").prop('checked') === true) {
                            var sw_4 = "1";
                            var ss_4 = $("#time_s_" + numb2 + "_4").val();
                            var ee_4 = $("#time_e_" + numb2 + "_4").val();
                        } else {
                            var sw_4 = "0";
                            var ss_4 = "";
                            var ee_4 = "0";
                        }
                        if ($("#" + numb2 + "_5").prop('checked') === true) {
                            var sw_5 = "1";
                            var ss_5 = $("#time_s_" + numb2 + "_5").val();
                            var ee_5 = $("#time_e_" + numb2 + "_5").val();
                        } else {
                            var sw_5 = "0";
                            var ss_5 = "";
                            var ee_5 = "0";
                        }
                        if ($("#" + numb2 + "_6").prop('checked') === true) {
                            var sw_6 = "1";
                            var ss_6 = $("#time_s_" + numb2 + "_6").val();
                            var ee_6 = $("#time_e_" + numb2 + "_6").val();
                        } else {
                            var sw_6 = "0";
                            var ss_6 = "";
                            var ee_6 = "0";
                        }
                        //==========================================================================
                        if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_1") === "1") {
                            var swD_1 = "1";
                            var sD_1 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_1");
                            var eD_1 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_1");
                        } else {
                            var swD_1 = "0";
                            var sD_1 = "";
                            var eD_1 = "0";
                        }
                        if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_2") === "1") {
                            var swD_2 = "1";
                            var sD_2 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_2");
                            var eD_2 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_2");
                        } else {
                            var swD_2 = "0";
                            var sD_2 = "";
                            var eD_2 = "0";
                        }
                        if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_3") === "1") {
                            var swD_3 = "1";
                            var sD_3 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_3");
                            var eD_3 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_3");
                        } else {
                            var swD_3 = "0";
                            var sD_3 = "";
                            var eD_3 = "0";
                        }
                        if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_4") === "1") {
                            var swD_4 = "1";
                            var sD_4 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_4");
                            var eD_4 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_4");
                        } else {
                            var swD_4 = "0";
                            var sD_4 = "";
                            var eD_4 = "0";
                        }
                        if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_5") === "1") {
                            var swD_5 = "1";
                            var sD_5 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_5");
                            var eD_5 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_5");
                        } else {
                            var swD_5 = "0";
                            var sD_5 = "";
                            var eD_5 = "0";
                        }
                        if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_6") === "1") {
                            var swD_6 = "1";
                            var sD_6 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_6");
                            var eD_6 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_6");
                        } else {
                            var swD_6 = "0";
                            var sD_6 = "";
                            var eD_6 = "0";
                        }
                    }
                    if (numb2 === "9") {
                        var a_data = {
                            "sw_1": sw_1,
                            "sw_2": sw_2,
                            "sw_3": sw_3,
                            "sw_4": sw_4,
                            "sw_5": sw_5,
                            "sw_6": sw_6,
                            "sw_7": sw_7,
                            "s_1": ss_1,
                            "s_2": ss_2,
                            "s_3": ss_3,
                            "s_4": ss_4,
                            "s_5": ss_5,
                            "s_6": ss_6,
                            "s_7": ss_7,
                            "e_1": ee_1,
                            "e_2": ee_2,
                            "e_3": ee_3,
                            "e_4": ee_4,
                            "e_5": ee_5,
                            "e_6": ee_6,
                            "e_7": ee_7,
                            "on_7": ee_on_7,
                            "off_7": ee_off_7
                        };
                        var df_data = {
                            "sw_1": swD_1,
                            "sw_2": swD_2,
                            "sw_3": swD_3,
                            "sw_4": swD_4,
                            "sw_5": swD_5,
                            "sw_6": swD_6,
                            "sw_7": swD_7,
                            "s_1": sD_1,
                            "s_2": sD_2,
                            "s_3": sD_3,
                            "s_4": sD_4,
                            "s_5": sD_5,
                            "s_6": sD_6,
                            "s_7": sD_7,
                            "e_1": eD_1,
                            "e_2": eD_2,
                            "e_3": eD_3,
                            "e_4": eD_4,
                            "e_5": eD_5,
                            "e_6": eD_6,
                            "e_7": eD_7,
                            "on_7": eD_on_7,
                            "off_7": eD_off_7
                        };
                    } else {
                        var a_data = {
                            "sw_1": sw_1,
                            "sw_2": sw_2,
                            "sw_3": sw_3,
                            "sw_4": sw_4,
                            "sw_5": sw_5,
                            "sw_6": sw_6,
                            "s_1": ss_1,
                            "s_2": ss_2,
                            "s_3": ss_3,
                            "s_4": ss_4,
                            "s_5": ss_5,
                            "s_6": ss_6,
                            "e_1": ee_1,
                            "e_2": ee_2,
                            "e_3": ee_3,
                            "e_4": ee_4,
                            "e_5": ee_5,
                            "e_6": ee_6
                        };
                        var df_data = {
                            "sw_1": swD_1,
                            "sw_2": swD_2,
                            "sw_3": swD_3,
                            "sw_4": swD_4,
                            "sw_5": swD_5,
                            "sw_6": swD_6,
                            "s_1": sD_1,
                            "s_2": sD_2,
                            "s_3": sD_3,
                            "s_4": sD_4,
                            "s_5": sD_5,
                            "s_6": sD_6,
                            "e_1": eD_1,
                            "e_2": eD_2,
                            "e_3": eD_3,
                            "e_4": eD_4,
                            "e_5": eD_5,
                            "e_6": eD_6
                        };
                    }

                    if (JSON.stringify(df_data) === JSON.stringify(a_data)) {
                        $("#save_auto_cont").hide();
                        // $("#tt_test").hide();
                    } else {
                        $("#save_auto_cont").show();
                        // $("#tt_test").show();
                    }
                }
            }
        }); // exit ajax

    } else { // house_master === "KMUMT001"
        $.ajax({
            url: "config_php/get_modal_control.php",
            method: "post",
            data: { house_master: house_master },
            dataType: "json",
            success: function(res) {
                // console.log(res);
                var max_min = res.max_min;
                kmutt_auto_mode(
                    min1 = max_min.maxmin_min_1, min2 = max_min.maxmin_min_2, min3 = max_min.maxmin_min_3, min5 = max_min.maxmin_min_5,
                    max1 = max_min.maxmin_max_1, max2 = max_min.maxmin_max_2, max3 = max_min.maxmin_max_3, max5 = max_min.maxmin_max_5,
                    disb = false
                );

                // console.log(JSON.stringify(max_min));
                $("#close_auto_cont").show();
                $(".sw_mode_Auto").attr('disabled', true);
                $(".sw_mode_Manual").attr('disabled', true);
                $(".close_modal").hide();
                $(".show_contfertilizer").hide();
                $(".range_control").change(function() {
                    var json_log = {
                        "r_1": max_min.maxmin_min_1 + ';' + max_min.maxmin_max_1,
                        "r_2": max_min.maxmin_min_2 + ';' + max_min.maxmin_max_2,
                        "r_3": max_min.maxmin_min_3 + ';' + max_min.maxmin_max_3,
                        "r_5": max_min.maxmin_min_5 + ';' + max_min.maxmin_max_5
                    };
                    var json_rang = {
                        "r_1": $(".range_control1").val(),
                        "r_2": $(".range_control2").val(),
                        "r_3": $(".range_control3").val(),
                        "r_5": $(".range_control5").val()
                    };
                    if (JSON.stringify(json_log) === JSON.stringify(json_rang)) {
                        $("#save_auto_cont").hide();
                        // $("#tt_test").hide();
                    } else {
                        $("#save_auto_cont").show();
                        // $("#tt_test").show();
                    }
                });
            }
        });
    }
});

$("#close_auto_cont").click(function() {
    var numb2 = $("#hidden_edit_cont").val();
    $.ajax({
        url: "config_php/get_modal_control.php",
        method: "post",
        data: { house_master: house_master },
        dataType: "json",
        success: function(res) {
            if (house_master !== "KMUMT001") {
                var c_load_1 = res.load_1;
                var c_load_2 = res.load_2;
                var c_load_3 = res.load_3;
                var c_load_4 = res.load_4;
                var c_load_5 = res.load_5;
                var c_load_6 = res.load_6;
                var c_load_7 = res.load_7;
                var c_load_8 = res.load_8;
                var c_load_9 = res.load_9;
                var c_load_10 = res.load_10;
                var c_load_11 = res.load_11;
                // console.log(res);

                if (numb2 !== "11") {
                    if ($("#" + numb2 + "_1").prop('checked') === true) {
                        var sw_1 = "1";
                        var ss_1 = $("#time_s_" + numb2 + "_1").val();
                        var ee_1 = $("#time_e_" + numb2 + "_1").val();
                    } else {
                        var sw_1 = "0";
                        var ss_1 = "";
                        var ee_1 = "";
                    }
                    if ($("#" + numb2 + "_2").prop('checked') === true) {
                        var sw_2 = "1";
                        var ss_2 = $("#time_s_" + numb2 + "_2").val();
                        var ee_2 = $("#time_e_" + numb2 + "_2").val();
                    } else {
                        var sw_2 = "0";
                        var ss_2 = "";
                        var ee_2 = "";
                    }
                    if ($("#" + numb2 + "_3").prop('checked') === true) {
                        var sw_3 = "1";
                        var ss_3 = $("#time_s_" + numb2 + "_3").val();
                        var ee_3 = $("#time_e_" + numb2 + "_3").val();
                    } else {
                        var sw_3 = "0";
                        var ss_3 = "";
                        var ee_3 = "";
                    }
                    if ($("#" + numb2 + "_4").prop('checked') === true) {
                        var sw_4 = "1";
                        var ss_4 = $("#time_s_" + numb2 + "_4").val();
                        var ee_4 = $("#time_e_" + numb2 + "_4").val();
                    } else {
                        var sw_4 = "0";
                        var ss_4 = "";
                        var ee_4 = "";
                    }
                    if ($("#" + numb2 + "_5").prop('checked') === true) {
                        var sw_5 = "1";
                        var ss_5 = $("#time_s_" + numb2 + "_5").val();
                        var ee_5 = $("#time_e_" + numb2 + "_5").val();
                    } else {
                        var sw_5 = "0";
                        var ss_5 = "";
                        var ee_5 = "";
                    }
                    if ($("#" + numb2 + "_6").prop('checked') === true) {
                        var sw_6 = "1";
                        var ss_6 = $("#time_s_" + numb2 + "_6").val();
                        var ee_6 = $("#time_e_" + numb2 + "_6").val();
                    } else {
                        var sw_6 = "0";
                        var ss_6 = "";
                        var ee_6 = "";
                    }
                    if (numb2 === "9") {
                        if ($("#" + numb2 + "_7").prop('checked') === true) {
                            var sw_7 = "1";
                            var ss_7 = $("#time_s_" + numb2 + "_7").val();
                            var ee_7 = $("#time_e_" + numb2 + "_7").val();
                            var ee_on_7 = $("#time_on_" + numb2 + "_7").val();
                            var ee_off_7 = $("#time_off_" + numb2 + "_7").val();
                        } else {
                            var sw_7 = "0";
                            var ss_7 = "";
                            var ee_7 = "";
                            var ee_on_7 = "";
                            var ee_off_7 = "";
                        }
                    }
                    //=======
                    if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_1") === "1") {
                        var swD_1 = "1";
                        var sD_1 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_1");
                        var eD_1 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_1");
                    } else {
                        var swD_1 = "0";
                        var sD_1 = "";
                        var eD_1 = "";
                    }
                    if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_2") === "1") {
                        var swD_2 = "1";
                        var sD_2 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_2");
                        var eD_2 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_2");
                    } else {
                        var swD_2 = "0";
                        var sD_2 = "";
                        var eD_2 = "";
                    }
                    if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_3") === "1") {
                        var swD_3 = "1";
                        var sD_3 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_3");
                        var eD_3 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_3");
                    } else {
                        var swD_3 = "0";
                        var sD_3 = "";
                        var eD_3 = "";
                    }
                    if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_4") === "1") {
                        var swD_4 = "1";
                        var sD_4 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_4");
                        var eD_4 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_4");
                    } else {
                        var swD_4 = "0";
                        var sD_4 = "";
                        var eD_4 = "";
                    }
                    if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_5") === "1") {
                        var swD_5 = "1";
                        var sD_5 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_5");
                        var eD_5 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_5");
                    } else {
                        var swD_5 = "0";
                        var sD_5 = "";
                        var eD_5 = "";
                    }
                    if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_6") === "1") {
                        var swD_6 = "1";
                        var sD_6 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_6");
                        var eD_6 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_6");
                    } else {
                        var swD_6 = "0";
                        var sD_6 = "";
                        var eD_6 = "";
                    }
                    if (numb2 === "9") {
                        if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_7") === "1") {
                            var swD_7 = "1";
                            var sD_7 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_7");
                            var eD_7 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_7");
                            var eD_on_7 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_on_7");
                            var eD_off_7 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_off_7");
                        } else {
                            var swD_7 = "0";
                            var sD_7 = "";
                            var eD_7 = "";
                            var eD_on_7 = "";
                            var eD_off_7 = "";
                        }
                    }
                } else { // =11
                    if ($("#" + numb2 + "_1").prop('checked') === true) {
                        var sw_1 = "1";
                        var ss_1 = $("#time_s_" + numb2 + "_1").val();
                        var ee_1 = $("#time_e_" + numb2 + "_1").val();
                    } else {
                        var sw_1 = "0";
                        var ss_1 = "";
                        var ee_1 = "0";
                    }
                    if ($("#" + numb2 + "_2").prop('checked') === true) {
                        var sw_2 = "1";
                        var ss_2 = $("#time_s_" + numb2 + "_2").val();
                        var ee_2 = $("#time_e_" + numb2 + "_2").val();
                    } else {
                        var sw_2 = "0";
                        var ss_2 = "";
                        var ee_2 = "0";
                    }
                    if ($("#" + numb2 + "_3").prop('checked') === true) {
                        var sw_3 = "1";
                        var ss_3 = $("#time_s_" + numb2 + "_3").val();
                        var ee_3 = $("#time_e_" + numb2 + "_3").val();
                    } else {
                        var sw_3 = "0";
                        var ss_3 = "";
                        var ee_3 = "0";
                    }
                    if ($("#" + numb2 + "_4").prop('checked') === true) {
                        var sw_4 = "1";
                        var ss_4 = $("#time_s_" + numb2 + "_4").val();
                        var ee_4 = $("#time_e_" + numb2 + "_4").val();
                    } else {
                        var sw_4 = "0";
                        var ss_4 = "";
                        var ee_4 = "0";
                    }
                    if ($("#" + numb2 + "_5").prop('checked') === true) {
                        var sw_5 = "1";
                        var ss_5 = $("#time_s_" + numb2 + "_5").val();
                        var ee_5 = $("#time_e_" + numb2 + "_5").val();
                    } else {
                        var sw_5 = "0";
                        var ss_5 = "";
                        var ee_5 = "0";
                    }
                    if ($("#" + numb2 + "_6").prop('checked') === true) {
                        var sw_6 = "1";
                        var ss_6 = $("#time_s_" + numb2 + "_6").val();
                        var ee_6 = $("#time_e_" + numb2 + "_6").val();
                    } else {
                        var sw_6 = "0";
                        var ss_6 = "";
                        var ee_6 = "0";
                    }
                    //==========================================================================
                    if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_1") === "1") {
                        var swD_1 = "1";
                        var sD_1 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_1");
                        var eD_1 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_1");
                    } else {
                        var swD_1 = "0";
                        var sD_1 = "";
                        var eD_1 = "0";
                    }
                    if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_2") === "1") {
                        var swD_2 = "1";
                        var sD_2 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_2");
                        var eD_2 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_2");
                    } else {
                        var swD_2 = "0";
                        var sD_2 = "";
                        var eD_2 = "0";
                    }
                    if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_3") === "1") {
                        var swD_3 = "1";
                        var sD_3 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_3");
                        var eD_3 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_3");
                    } else {
                        var swD_3 = "0";
                        var sD_3 = "";
                        var eD_3 = "0";
                    }
                    if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_4") === "1") {
                        var swD_4 = "1";
                        var sD_4 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_4");
                        var eD_4 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_4");
                    } else {
                        var swD_4 = "0";
                        var sD_4 = "";
                        var eD_4 = "0";
                    }
                    if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_5") === "1") {
                        var swD_5 = "1";
                        var sD_5 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_5");
                        var eD_5 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_5");
                    } else {
                        var swD_5 = "0";
                        var sD_5 = "";
                        var eD_5 = "0";
                    }
                    if (eval("c_load_" + numb2 + ".load_" + numb2 + "_st_6") === "1") {
                        var swD_6 = "1";
                        var sD_6 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_s_6");
                        var eD_6 = eval("c_load_" + numb2 + ".load_" + numb2 + "_time_e_6");
                    } else {
                        var swD_6 = "0";
                        var sD_6 = "";
                        var eD_6 = "0";
                    }
                }
                if (numb2 === "9") {
                    var a_data = {
                        "sw_1": sw_1,
                        "sw_2": sw_2,
                        "sw_3": sw_3,
                        "sw_4": sw_4,
                        "sw_5": sw_5,
                        "sw_6": sw_6,
                        "sw_7": sw_7,
                        "s_1": ss_1,
                        "s_2": ss_2,
                        "s_3": ss_3,
                        "s_4": ss_4,
                        "s_5": ss_5,
                        "s_6": ss_6,
                        "s_7": ss_7,
                        "e_1": ee_1,
                        "e_2": ee_2,
                        "e_3": ee_3,
                        "e_4": ee_4,
                        "e_5": ee_5,
                        "e_6": ee_6,
                        "e_7": ee_7,
                        "on_7": ee_on_7,
                        "off_7": ee_off_7
                    };
                    var df_data = {
                        "sw_1": swD_1,
                        "sw_2": swD_2,
                        "sw_3": swD_3,
                        "sw_4": swD_4,
                        "sw_5": swD_5,
                        "sw_6": swD_6,
                        "sw_7": swD_7,
                        "s_1": sD_1,
                        "s_2": sD_2,
                        "s_3": sD_3,
                        "s_4": sD_4,
                        "s_5": sD_5,
                        "s_6": sD_6,
                        "s_7": sD_7,
                        "e_1": eD_1,
                        "e_2": eD_2,
                        "e_3": eD_3,
                        "e_4": eD_4,
                        "e_5": eD_5,
                        "e_6": eD_6,
                        "e_7": eD_7,
                        "on_7": eD_on_7,
                        "off_7": eD_off_7
                    };
                } else {
                    var a_data = {
                        "sw_1": sw_1,
                        "sw_2": sw_2,
                        "sw_3": sw_3,
                        "sw_4": sw_4,
                        "sw_5": sw_5,
                        "sw_6": sw_6,
                        "s_1": ss_1,
                        "s_2": ss_2,
                        "s_3": ss_3,
                        "s_4": ss_4,
                        "s_5": ss_5,
                        "s_6": ss_6,
                        "e_1": ee_1,
                        "e_2": ee_2,
                        "e_3": ee_3,
                        "e_4": ee_4,
                        "e_5": ee_5,
                        "e_6": ee_6
                    };
                    var df_data = {
                        "sw_1": swD_1,
                        "sw_2": swD_2,
                        "sw_3": swD_3,
                        "sw_4": swD_4,
                        "sw_5": swD_5,
                        "sw_6": swD_6,
                        "s_1": sD_1,
                        "s_2": sD_2,
                        "s_3": sD_3,
                        "s_4": sD_4,
                        "s_5": sD_5,
                        "s_6": sD_6,
                        "e_1": eD_1,
                        "e_2": eD_2,
                        "e_3": eD_3,
                        "e_4": eD_4,
                        "e_5": eD_5,
                        "e_6": eD_6
                    };
                }
                // console.log(JSON.stringify(df_data));
                // console.log(JSON.stringify(a_data));
                if (JSON.stringify(df_data) === JSON.stringify(a_data)) {
                    $(".nav-link").removeClass('disabled');
                    $(".img_sw").show();
                    $('.input_time').prop('disabled', true);
                    $(".sw_toggle").hide();
                    $(".edit_cont").show();
                    $("#save_auto_cont").hide();
                    $("#close_auto_cont").hide();
                    $(".sw_mode_Auto").attr('disabled', false);
                    $(".sw_mode_Manual").attr('disabled', false);
                    $(".close_modal").show();
                    $(".show_contfertilizer").show();
                    $("#hidden_edit_cont").val("");
                } else {
                    swal({
                        title: 'Are you sure?',
                        text: "Do you want want to cancel the setting?",
                        type: 'warning',
                        allowOutsideClick: false,
                        showCancelButton: true,
                        confirmButtonColor: '#da3444',
                        cancelButtonColor: '#8e8e8e',
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No',
                    }).then((result) => {
                        if (result.value) {
                            $(".nav-link").removeClass('disabled');
                            $(".img_sw").show();
                            $('.input_time').removeClass("input_err").prop('disabled', true);
                            $(".sw_toggle").hide();
                            $(".edit_cont").show();
                            // console.log(numb2);
                            $(".sw_mode_Auto").attr('disabled', false);
                            $(".sw_mode_Manual").attr('disabled', false);
                            $(".close_modal").show();
                            $(".show_contfertilizer").show();
                            df_ed_text(numb = numb2);
                            $("#save_auto_cont").hide();
                            $("#close_auto_cont").hide();
                            $("#hidden_edit_cont").val("");
                        }
                    });
                }

                function df_ed_text(numb) {
                    if (eval("c_load_" + numb + ".load_" + numb + "_st_1") === "1") {
                        $("#" + numb + "_1").bootstrapToggle('on');
                        $("." + numb + "_1").attr("src", "dist/images/icon/switck_on.png");
                        $("#time_s_" + numb + "_1").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_s_1"));
                        $("#time_e_" + numb + "_1").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_e_1"));
                    } else {
                        $("#" + numb + "_1").bootstrapToggle('off');
                        $("." + numb + "_1").attr("src", "dist/images/icon/switck_off.png");
                        $("#time_s_" + numb + "_1").prop('disabled', true).val("");
                        $("#time_e_" + numb + "_1").prop('disabled', true).val("");
                    }
                    if (eval("c_load_" + numb + ".load_" + numb + "_st_2") === "1") {
                        $("#" + numb + "_2").bootstrapToggle('on');
                        $("." + numb + "_2").attr("src", "dist/images/icon/switck_on.png");
                        $("#time_s_" + numb + "_2").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_s_2"));
                        $("#time_e_" + numb + "_2").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_e_2"));
                    } else {
                        $("#" + numb + "_2").bootstrapToggle('off');
                        $("." + numb + "_2").attr("src", "dist/images/icon/switck_off.png");
                        $("#time_s_" + numb + "_2").prop('disabled', true).val("");
                        $("#time_e_" + numb + "_2").prop('disabled', true).val("");
                    }
                    if (eval("c_load_" + numb + ".load_" + numb + "_st_3") === "1") {
                        $("#" + numb + "_3").bootstrapToggle('on');
                        $("." + numb + "_3").attr("src", "dist/images/icon/switck_on.png");
                        $("#time_s_" + numb + "_3").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_s_3"));
                        $("#time_e_" + numb + "_3").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_e_3"));
                    } else {
                        $("#" + numb + "_3").bootstrapToggle('off');
                        $("." + numb + "_3").attr("src", "dist/images/icon/switck_off.png");
                        $("#time_s_" + numb + "_3").prop('disabled', true).val("");
                        $("#time_e_" + numb + "_3").prop('disabled', true).val("");
                    }
                    if (eval("c_load_" + numb + ".load_" + numb + "_st_4") === "1") {
                        $("#" + numb + "_4").bootstrapToggle('on');
                        $("." + numb + "_4").attr("src", "dist/images/icon/switck_on.png");
                        $("#time_s_" + numb + "_4").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_s_4"));
                        $("#time_e_" + numb + "_4").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_e_4"));
                    } else {
                        $("#" + numb + "_4").bootstrapToggle('off');
                        $("." + numb + "_4").attr("src", "dist/images/icon/switck_off.png");
                        $("#time_s_" + numb + "_4").prop('disabled', true).val("");
                        $("#time_e_" + numb + "_4").prop('disabled', true).val("");
                    }
                    if (eval("c_load_" + numb + ".load_" + numb + "_st_5") === "1") {
                        $("#" + numb + "_5").bootstrapToggle('on');
                        $("." + numb + "_5").attr("src", "dist/images/icon/switck_on.png");
                        $("#time_s_" + numb + "_5").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_s_5"));
                        $("#time_e_" + numb + "_5").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_e_5"));
                    } else {
                        $("#" + numb + "_5").bootstrapToggle('off');
                        $("." + numb + "_5").attr("src", "dist/images/icon/switck_off.png");
                        $("#time_s_" + numb + "_5").prop('disabled', true).val("");
                        $("#time_e_" + numb + "_5").prop('disabled', true).val("");
                    }
                    if (eval("c_load_" + numb + ".load_" + numb + "_st_6") === "1") {
                        $("#" + numb + "_6").bootstrapToggle('on');
                        $("." + numb + "_6").attr("src", "dist/images/icon/switck_on.png");
                        $("#time_s_" + numb + "_6").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_s_6"));
                        $("#time_e_" + numb + "_6").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_e_6"));
                    } else {
                        $("#" + numb + "_6").bootstrapToggle('off');
                        $("." + numb + "_6").attr("src", "dist/images/icon/switck_off.png");
                        $("#time_s_" + numb + "_6").prop('disabled', true).val("");
                        $("#time_e_" + numb + "_6").prop('disabled', true).val("");
                    }
                    if (numb === "9") {
                        if (eval("c_load_" + numb + ".load_" + numb + "_st_7") === "1") {
                            $("#" + numb + "_7").bootstrapToggle('on');
                            $("." + numb + "_7").attr("src", "dist/images/icon/switck_on.png");
                            $("#time_s_" + numb + "_7").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_s_7"));
                            $("#time_e_" + numb + "_7").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_e_7"));
                            $("#time_on_" + numb + "_7").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_on_7"));
                            $("#time_off_" + numb + "_7").prop('disabled', true).val(eval("c_load_" + numb + ".load_" + numb + "_time_off_7"));
                        } else {
                            $("#" + numb + "_7").bootstrapToggle('off');
                            $("." + numb + "_7").attr("src", "dist/images/icon/switck_off.png");
                            $("#time_s_" + numb + "_7").prop('disabled', true).val("");
                            $("#time_e_" + numb + "_7").prop('disabled', true).val("");
                            $("#time_on_" + numb + "_7").prop('disabled', true).val("");
                            $("#time_off_" + numb + "_7").prop('disabled', true).val("");
                        }
                    }
                }
            } else { // มจธ.
                var max_min = res.max_min;
                var json_log = {
                    "r_1": max_min.maxmin_min_1 + ';' + max_min.maxmin_max_1,
                    "r_2": max_min.maxmin_min_2 + ';' + max_min.maxmin_max_2,
                    "r_3": max_min.maxmin_min_3 + ';' + max_min.maxmin_max_3,
                    "r_5": max_min.maxmin_min_5 + ';' + max_min.maxmin_max_5
                };
                var json_rang = {
                    "r_1": $(".range_control1").val(),
                    "r_2": $(".range_control2").val(),
                    "r_3": $(".range_control3").val(),
                    "r_5": $(".range_control5").val()
                };
                if (JSON.stringify(json_log) === JSON.stringify(json_rang)) {
                    $(".edit_cont").show();
                    $("#save_auto_cont").hide();
                    $("#close_auto_cont").hide();
                    $(".sw_mode_Auto").attr('disabled', false);
                    $(".sw_mode_Manual").attr('disabled', false);
                    $(".close_modal").show();
                    kmutt_auto_mode(
                        min1 = max_min.maxmin_min_1, min2 = max_min.maxmin_min_2, min3 = max_min.maxmin_min_3, min5 = max_min.maxmin_min_5,
                        max1 = max_min.maxmin_max_1, max2 = max_min.maxmin_max_2, max3 = max_min.maxmin_max_3, max5 = max_min.maxmin_max_5,
                        disb = true
                    );
                } else {
                    swal({
                        title: 'Are you sure?',
                        text: "Do you want want to cancel the setting?",
                        type: 'warning',
                        allowOutsideClick: false,
                        showCancelButton: true,
                        confirmButtonColor: '#da3444',
                        cancelButtonColor: '#8e8e8e',
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No',
                    }).then((result) => {
                        if (result.value) {
                            $(".edit_cont").show();
                            $("#save_auto_cont").hide();
                            $("#close_auto_cont").hide();
                            $(".sw_mode_Auto").attr('disabled', false);
                            $(".sw_mode_Manual").attr('disabled', false);
                            $(".close_modal").show();

                            kmutt_auto_mode(
                                min1 = max_min.maxmin_min_1, min2 = max_min.maxmin_min_2, min3 = max_min.maxmin_min_3, min5 = max_min.maxmin_min_5,
                                max1 = max_min.maxmin_max_1, max2 = max_min.maxmin_max_2, max3 = max_min.maxmin_max_3, max5 = max_min.maxmin_max_5,
                                disb = true
                            );
                        }
                    });
                }
            }
        }
    });
});