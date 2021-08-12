<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<style>
  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
  .toggle.ios .toggle-handle { border-radius: 20px; }



  .switch {
  position: relative;
  display: inline-block;
  width: 260px;
  height: 100px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  overflow: hidden;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #f2f2f2;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  z-index: 2;
  content: "";
  height: 96px;
  width: 96px;
  left: 2px;
  bottom: 2px;
  background-color: darkslategrey;
      -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.22);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.22);
  -webkit-transition: .4s;
  transition: all 0.4s ease-in-out;
}
.slider:after {
  position: absolute;
  left: 0;
  z-index: 1;
  content: "YES";
    font-size: 45px;
    text-align: left !important;
    line-height: 95px;
  padding-left: 0;
    width: 260px;
    color: #fff;
    height: 100px;
    border-radius: 100px;
    background-color: #ff6418;
    -webkit-transform: translateX(-160px);
    -ms-transform: translateX(-160px);
    transform: translateX(-160px);
    transition: all 0.4s ease-in-out;
}

input:checked + .slider:after {
  -webkit-transform: translateX(0px);
  -ms-transform: translateX(0px);
  transform: translateX(0px);
  /*width: 235px;*/
  padding-left: 25px;
}

input:checked + .slider:before {
  background-color: #fff;
}

input:checked + .slider:before {
  -webkit-transform: translateX(160px);
  -ms-transform: translateX(160px);
  transform: translateX(160px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 100px;
}

.slider.round:before {
  border-radius: 50%;
}
.absolute-no {
	position: absolute;
	left: 0;
	color: darkslategrey;
	text-align: right !important;
    font-size: 45px;
    width: calc(100% - 25px);
    height: 100px;
    line-height: 95px;
    cursor: pointer;
}
</style>
<div class="page-content">
<?php
    $s_master = $_POST['s_master'];
    $dashStatus = $_POST['dashStatus'];
    $dashName = $_POST['dashName'];
    $controlstatus = $_POST['controlstatus'];
    $conttrolname = $_POST['conttrolname'];
    // print_r( array_count_values($dashStatus) );
// echo array_count_values($controlstatus)['0'];
// exit();
?>

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?= $s_master['site_name'] ?></div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $s_master['house_name'] ?></li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <span class="text-center">
                    <span class="date"></span><br>
                    <span class="time"></span>
                </span>
                <!-- <button type="button" class="btn btn-primary">Settings</button> -->
                <!-- <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item" href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                </div> -->
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <!-- <h6 class="mb-0 text-uppercase">Horizontal Card</h6> -->
    <hr/>
    <div class="row">
        <div class="col-12 col-lg-4 col-xl-4 d-flex">
            <div class="card w-100 radius-10">
                <div class="card-body"> 
                    <div class="card radius-10 shadow-none">
                        <img src="public/images/site/<?= $s_master['site_img'] ?>" alt="..." class="card-img">
                        <!-- <div class="card-body"> -->
                        <!-- <h4 class="card-title text-muted"><?// $s_master['house_name'] ?></h4> -->
                        <!-- </div> -->
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-7 col-xl-8 d-flex">
            <div class="card w-100 radius-10">
                <div class="card-body"> 
                    <div class="card radius-10 border shadow-none">
                        <div class="card-body">
                            <!--  -->
                            <div class="row">
                                <div class="col-lg-4 col-xl-4 col-sm-6 text-center">
                                    <img src="" class="weather-icon" alt="Weather Icon" style="height: 40%; width: 40%;" /><br>
                                    <span class="mb-0 text-primary weather-description capitalize"></span>
                                </div>
                                <div class="col-lg-4 col-xl-4 col-sm-6 text-center">
                                    <h6 class="mb-0">อุณหภูมิ</h6><br>
                                    <h6 class="mb-0 font-semibold text-primary weather-temperature"></h6><br>
                                    <h6 class="mb-0 text-primary"> (<span class="weather-min-temperature"></span> - <span class="weather-max-temperature"></span>)</h6>
                                </div>
                                <!-- <hr/> -->
                                <div class="col-lg-4 col-xl-4 col-sm-6 text-center">
                                    <h6 class="mb-0">ความชื้นในอากาศ</h6><br>
                                    <h6 class="mb-0 text-primary weather-humidity"></h6>
                                </div>
                                <div class="col-lg-4 col-xl-4 col-sm-6 text-center">
                                    <h6 class="mb-0">ความเร็วลม</h6><br>
                                    <h6 class="mb-0 text-primary weather-wind-speed"></h6>
                                </div>
                                <!-- <hr/> -->
                                <div class="col-lg-4 col-xl-4 col-sm-6 text-center">
                                    <h6 class="mb-0">พระอาทิตย์ขึ้น</h6><br>
                                    <h6 class="mb-0 text-primary weather-sunrise"></h6>
                                </div>
                                <div class="col-lg-4 col-xl-4 col-sm-6 text-center">
                                    <h6 class="mb-0">พระอาทิตย์ตก</h6><br>
                                    <h6 class="mb-0 text-primary weather-sunset"></h6>
                                </div>
                            </div>
                            <!--  -->
                        </div>
                    </div>
                    <div class="row">
                        <?php for($i = 1; $i <= array_count_values($dashStatus)['1']; $i++){?>
                            <div class="col-lg-3 col-xl-3 col-sm-12">
                                <div class="card-body border radius-10 shadow-none mb-3">
                                    <div class="row g-0">
                                        <div class="col-4">
                                            <img src="" alt="..." class="card-img dash_img_<?= $i ?>" width="5%">
                                        </div>
                                        <div class="col-8 text-center">
                                            <!-- <div class=""> -->
                                                <h6 class="card-title mt-2"><B><?= $dashName[$i] ?></B></h6>
                                                <h6 class="card-text dash_data_1_<?= $i ?>"></h6>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if(!isset(array_count_values($controlstatus)['0']) || array_count_values($controlstatus)['0'] != 12){?>
        <div class="col-12 col-lg-12 col-xl-12 d-flex">
            <div class="card w-100 radius-10">
                <div class="card-body">
                    <div class="card-body">
                        <h4 class="card-title text-center"><b>ระบบควบคุม </b></h4>
                        <div class="row g-2">
                            <div class="col-lg-6 col-xl-6 col-sm-12 text-end">
                                <button type="button" class="col-lg-6 col-xl-6 col-sm-12 btn btn-outline-success px-5 radius-30 sw_mode_Auto">โหมดตั้งเวลา</button>
                            </div>
                            <div class="col-lg-6 col-xl-6 col-sm-12">
                                <button type="button" class="col-lg-6 col-xl-6 col-sm-12 btn btn-outline-info px-5 radius-30 sw_mode_Manual">โหมดสั่งงานด้วยตนเอง</button>
                            </div>
                        </div>
                    </div>
                            <!-- <div class="card-body"> -->
                    <div class="row">
                        <?php for($i = 1; $i <= 12; $i++){ if($controlstatus[$i] == 1){ //array_count_values($controlstatus)['1'] ?>
                        <div class="col-lg-3 col-xl-3 col-sm-12">
                            <div class="card-body border radius-10 shadow-none mb-3">
                            
                                <!-- <div class="card-body"> -->
                                    <div class="d-flex">
                                        <h5 class="mb-0"><b><?= $conttrolname[$i] ?></b></h5>
                                        <div class="ms-auto Dsw_manual_<?= $i ?>">
                                            <!-- <label class="switch">
                                                <input type="checkbox" class="sw_manual_<?= $i ?>">
                                                <span class="slider round"></span>
                                                <span class="absolute-no">OFF</span>
                                            </label> -->
                                            
                                            <?php if($i != 11){
                                                echo '<input type="checkbox" class="sw_manual_'.$i.'" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="xs" data-style="ios">';
                                            }else{echo '<div class="dropdown">
                                                <button class="btn btn-outline-secondary dropdown-toggle shader_slw" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item sw_shader0">0 : ปิด 100%</a>
                                                    </li>
                                                    <li><a class="dropdown-item sw_shader1">1 : เปิด 25%</a>
                                                    </li>
                                                    <li><a class="dropdown-item sw_shader2">2 : เปิด 50%</a>
                                                    </li>
                                                    <li><a class="dropdown-item sw_shader3">3 : เปิด 75%</a>
                                                    </li>
                                                    <li><a class="dropdown-item sw_shader4">4 : เปิด 100%</a>
                                                    </li>
                                                </ul>
                                            </div>';} ?>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <!-- <div class="col-4">
                                                <div class="css-bar m-b-0 css-bar-warning "> -->
                                        <img class="dash_img_con_<?= $i ?>" width="185">
                                        <!-- </div>
                                            </div> -->
                                    </div>
                                <!-- </div> -->
                            </div>
                        </div>
                        <?php }} ?>
                    </div>
                            <!-- </div>
                        </div> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <?php } ?>
    </div><!--end row-->
</div>
<script>
    var house_master = '<?= $s_master["house_master"] ?>';
    var login_user = $(".INuser_name").val();
    // alert(house_master)
    // return false;
    // ----------------------------------------------------------------------
    // alert(house_master);
    if (house_master != '') {
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
            // client.subscribe(house_master + "/1/data_update/data_filter", options);
            // if (Contstatus !== 0) {

            // if (house_master !== "KMUMT001") {
                client.subscribe(house_master + "/1/control/json_control_filter", options);
            // } else {
            //     client.subscribe(house_master + "/1/control/mode", options);
            //     client.subscribe(house_master + "/1/control/control_st_1", options);
            //     client.subscribe(house_master + "/1/control/control_st_2", options);
            //     client.subscribe(house_master + "/1/control/control_st_3", options);
            //     client.subscribe(house_master + "/1/control/control_st_4", options);
            //     client.subscribe(house_master + "/1/control/control_st_5", options);
            // }
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
                    title: 'เปลี่ยนโหมดการทำงาน !',
                    text: "คุณต้องการเปลี่ยนเป็นไปใช้โหมด" + sw_name + " ?",
                    type: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonColor: '#32CD32',
                    cancelButtonColor: '#FF3333',
                    confirmButtonText: 'ไช่',
                    cancelButtonText: 'ยกเลิก'
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

                        // swal({
                        //     text: "Loading ... ",
                        //     allowOutsideClick: false,
                        //     onOpen: () => {
                        //         swal.showLoading()
                        //         timerInterval = setInterval(() => {}, 100)
                        //     }
                        // });
                    }
                });
            }
            // $('.sw_manual_1').attr('checked')
            // alert($(".sw_manual_1").is(":checked"))
            
            $(".Dsw_manual_1").click(function() {
                setTimeout(function(){
                    // alert($(".sw_manual_1").prop('checked'));
                    switch_control(sta = $(".sw_manual_1").prop('checked'), sw_name = "sw_manual_1", ch_name='<?= $conttrolname[1] ?>', mqtt_ch_name = "dripper_1", mqtt_name_us = "user_control" );
                }, 100);
            });
            $(".Dsw_manual_2").click(function() {
                setTimeout(function(){
                    switch_control(sta = $(".sw_manual_2").prop('checked'), sw_name = "sw_manual_2", ch_name='<?= $conttrolname[2] ?>', mqtt_ch_name = "dripper_2", mqtt_name_us = "user_control" );
                }, 100);
            });
            $(".Dsw_manual_3").click(function() {
                setTimeout(function(){
                    switch_control(sta = $(".sw_manual_3").prop('checked'), sw_name = "sw_manual_3", ch_name='<?= $conttrolname[3] ?>', mqtt_ch_name = "dripper_3", mqtt_name_us = "user_control" );
                }, 100);
            });
            $(".Dsw_manual_4").click(function() {
                setTimeout(function(){
                    switch_control(sta = $(".sw_manual_4").prop('checked'), sw_name = "sw_manual_4", ch_name='<?= $conttrolname[4] ?>', mqtt_ch_name = "dripper_4", mqtt_name_us = "user_control" );
                }, 100);
            });
            $(".Dsw_manual_5").click(function() {
                setTimeout(function(){
                    switch_control(sta = $(".sw_manual_5").prop('checked'), sw_name = "sw_manual_5", ch_name='<?= $conttrolname[5] ?>', mqtt_ch_name = "dripper_5", mqtt_name_us = "user_control" );
                }, 100);
            });
            $(".Dsw_manual_6").click(function() {
                setTimeout(function(){
                    switch_control(sta = $(".sw_manual_6").prop('checked'), sw_name = "sw_manual_6", ch_name='<?= $conttrolname[6] ?>', mqtt_ch_name = "dripper_6", mqtt_name_us = "user_control" );
                }, 100);
            });
            $(".Dsw_manual_7").click(function() {
                setTimeout(function(){
                    switch_control(sta = $(".sw_manual_7").prop('checked'), sw_name = "sw_manual_7", ch_name='<?= $conttrolname[7] ?>', mqtt_ch_name = "dripper_7", mqtt_name_us = "user_control" );
                }, 100);
            });
            $(".Dsw_manual_8").click(function() {
                setTimeout(function(){
                    switch_control(sta = $(".sw_manual_8").prop('checked'), sw_name = "sw_manual_8", ch_name='<?= $conttrolname[8] ?>', mqtt_ch_name = "dripper_8", mqtt_name_us = "user_control" );
                }, 100);
            });
            $(".Dsw_manual_9").click(function() {
                setTimeout(function(){
                    switch_control(sta = $(".sw_manual_9").prop('checked'), sw_name = "sw_manual_9", ch_name='<?= $conttrolname[9] ?>', mqtt_ch_name = "foggy", mqtt_name_us = "user_control" );
                }, 100);
            });
            $(".Dsw_manual_10").click(function() {
                setTimeout(function(){
                    switch_control(sta = $(".sw_manual_10").prop('checked'), sw_name = "sw_manual_10", ch_name='<?= $conttrolname[10] ?>', mqtt_ch_name = "fan", mqtt_name_us = "user_control" );
                }, 100);
            });
            $('.sw_shader0').click(function() {
                if($(this).hasClass("active") != true){
                    switch_control_slan(sta = "ปิด", ch_name='<?= $conttrolname[11] ?> 100%', mess = "0", mqtt_ch_name = "shader", mqtt_name_us = "user_control");
                }
            });
            $('.sw_shader1').click(function() {
                if($(this).hasClass("active") != true){
                    switch_control_slan(sta = "เปิด", ch_name='<?= $conttrolname[11] ?> 25%', mess = "1", mqtt_ch_name = "shader", mqtt_name_us = "user_control");
                }
            });
            $('.sw_shader2').click(function() {
                if($(this).hasClass("active") != true){
                    switch_control_slan(sta = "เปิด", ch_name='<?= $conttrolname[11] ?> 50%', mess = "2", mqtt_ch_name = "shader", mqtt_name_us = "user_control");
                }
            });
            $('.sw_shader3').click(function() {
                if($(this).hasClass("active") != true){
                    switch_control_slan(sta = "เปิด", ch_name='<?= $conttrolname[11] ?> 75%', mess = "3", mqtt_ch_name = "shader", mqtt_name_us = "user_control");
                }
            });
            $('.sw_shader4').click(function() {
                if($(this).hasClass("active") != true){
                    switch_control_slan(sta = "เปิด", ch_name='<?= $conttrolname[11] ?> 100%', mess = "4", mqtt_ch_name = "shader", mqtt_name_us = "user_control");
                }
            });
            $(".Dsw_manual_12").click(function() {
                setTimeout(function(){
                    switch_control(sta = $(".sw_manual_12").prop('checked'), sw_name = "sw_manual_12", ch_name='<?= $conttrolname[12] ?>', mqtt_ch_name = "fertilizer", mqtt_name_us = "user_control" );
                }, 100);
            });
            function switch_control(sta, sw_name, ch_name, mqtt_ch_name, mqtt_name_us) {
                if(sta === false){var sw_sta = "ปิด"; var mess = "OFF";}else{var sw_sta = "เปิด";var mess = "ON";}
                swal({
                    title: 'คุณต้องการ ' + sw_sta + ' ' + ch_name + ' ?',
                    // text: "คุณต้องการเปลี่ยนไปใช้โหมด Manual !!!",
                    type: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonColor: '#32CD32',
                    cancelButtonColor: '#FF3333',
                    confirmButtonText: 'ไช่',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    console.log(result)
                    if (result.value) {
                        // alert(sta)
                        // return false;
                        message = new Paho.MQTT.Message(login_user);
                        message.destinationName = house_master + "/1/control/" + mqtt_name_us;
                        message.qos = 1;
                        message.retained = true;
                        client.send(message);

                        message = new Paho.MQTT.Message(mess);
                        message.destinationName = house_master + "/1/control/" + mqtt_ch_name;
                        message.qos = 1;
                        message.retained = true;
                        client.send(message);
                        // console.log(message.qos);
                    }else{
                        $('.'+sw_name).bootstrapToggle("toggle");
                    }
                });
            }
            function switch_control_slan(sta, ch_name, mess, mqtt_ch_name, mqtt_name_us) {
                swal({
                    title: 'คุณต้องการ ' + sta + ' ' + ch_name + ' ?',
                    // text: "คุณต้องการเปลี่ยนไปใช้โหมด Manual !!!",
                    type: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonColor: '#32CD32',
                    cancelButtonColor: '#FF3333',
                    confirmButtonText: 'ไช่',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    console.log(result)
                    if (result.value) {
                        // alert(sta)
                        // return false;
                        message = new Paho.MQTT.Message(login_user);
                        message.destinationName = house_master + "/1/control/" + mqtt_name_us;
                        message.qos = 1;
                        message.retained = true;
                        client.send(message);

                        message = new Paho.MQTT.Message(mess);
                        message.destinationName = house_master + "/1/control/" + mqtt_ch_name;
                        message.qos = 1;
                        message.retained = true;
                        client.send(message);
                        // console.log(message.qos);
                    }else{
                        // $('.'+sw_name).bootstrapToggle("toggle");
                    }
                });
            }
            // ------- Switch control --------------
            
        } // exit_message
        connect();
    }

</script>