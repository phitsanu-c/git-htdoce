<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<style>
  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
  .toggle.ios .toggle-handle { border-radius: 20px; }
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
                                        <h5 class="mb-0 mmn"><b><?= $conttrolname[$i] ?></b></h5>
                                        <div class="ms-auto">
                                            <?php 
                                                if($i == 12){
                                                    echo '<div class="Dsw_manual_'.$i.'">
                                                            <input type="checkbox" class="sw_manual_'.$i.'" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="xs" data-style="ios">
                                                        </div>';
                                                } else {
                                                    if($i == 11){
                                                        echo '<div class="dropdown sw_manual">
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
                                                        </div>';
                                                    }else{
                                                        echo '<div class="sw_manual Dsw_manual_'.$i.'">
                                                            <input type="checkbox" class="sw_manual_'.$i.'" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="xs" data-style="ios">
                                                        </div>';
                                                    } 
                                                    echo '<a class="font-20 sw_auto" href="javascript:;" id="'.$i.'">	<i class="lni lni-cog"></i> </a>';
                                                }
                                            ?>
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
        <!-- Modal Control -->
        <div class="modal fade" id="Modal_Auto_control"  tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-4">
                        <div class="card-title d-flex align-items-center">
                            <!-- <div><i class="bx bxs-user me-1 font-22 text-info"></i></div> -->
                            <h5 class="mb-0 text-info"></h5>
                        </div>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" id="seve_auto" onsubmit="return false">
                            <input type="hidden" class="channel" id="channel">
                            <div class="border p-4 rounded mb-3 time_loop">
                                <div class="d-flex mb-2">
                                <B>TIMER Loop</B>
                                    <div class="sw_toggle ms-auto">
                                        <input class="input_check" type="checkbox" id="sw_7" data-toggle="toggle" data-onstyle="success" data-size="mini" data-offstyle="secondary" data-style="ios">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 m-t-0">
                                        <div class="form-group text-left">
                                            <div class="row">
                                                <div class="col-md-3 align-vertical-center">
                                                    <small class="form-control-feedback"> START </small>
                                                </div>
                                                <div class="col-md-9">
                                                    <select id="time_s_7" class="form-select input_time">
                                                        <option value="">Select</option>
                                                        <option value="06:00">06:00</option>
                                                        <option value="07:00">07:00</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="12:00">12:00</option>
                                                        <option value="13:00">13:00</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="15:00">15:00</option>
                                                        <option value="16:00">16:00</option>
                                                        <option value="17:00">17:00</option>
                                                    </select>
                                                    <div class="invalid-feedback">กรุณาระบุเวลาเริ่มต้น</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 m-t-0">
                                        <div class="form-group text-left">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <small class="form-control-feedback"> END </small>
                                                </div>
                                                <div class="col-md-9">
                                                    <select id="time_e_7" class="form-select input_time">
                                                        <option value="">Select</option>
                                                        <option value="07:00">07:00</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="12:00">12:00</option>
                                                        <option value="13:00">13:00</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="15:00">15:00</option>
                                                        <option value="16:00">16:00</option>
                                                        <option value="17:00">17:00</option>
                                                        <option value="18:00">18:00</option>
                                                    </select>
                                                    <div class="invalid-feedback">กรุณาระบุเวลาสิ้นสุด</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 m-t-0">
                                        <div class="form-group text-left">
                                            <div class="row">
                                                <div class="col-md-3 align-vertical-center">
                                                    <small class="form-control-feedback"> ON </small>
                                                </div>
                                                <div class="col-md-9">
                                                    <select id="time_on_7" class="form-select input_time">
                                                        <option value="">Select</option>
                                                        <option value="5">5 min.</option>
                                                        <option value="10">10 min.</option>
                                                        <option value="15">15 min.</option>
                                                        <option value="20">20 min.</option>
                                                        <option value="25">25 min.</option>
                                                        <option value="30">30 min.</option>
                                                    </select>
                                                    <div class="invalid-feedback">กรุณาระบุเวลาทำงาน</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 m-t-0">
                                        <div class="form-group text-left">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <small class="form-control-feedback"> OFF </small>
                                                </div>
                                                <div class="col-md-9">
                                                    <select id="time_off_7" class="form-select input_time">
                                                        <option value="">Select</option>
                                                        <option value="5">5 min.</option>
                                                        <option value="10">10 min.</option>
                                                        <option value="15">15 min.</option>
                                                        <option value="20">20 min.</option>
                                                        <option value="25">25 min.</option>
                                                        <option value="30">30 min.</option>
                                                    </select>
                                                    <div class="invalid-feedback">กรุณาระบุเวลาหยุดทำงาน</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="border p-4 rounded">
                                <div class="d-flex mb-2">
                                    <B>TIMER 1</B>
                                    <div class="sw_toggle ms-auto">
                                        <input class="input_check" type="checkbox" id="sw_1" data-toggle="toggle" data-onstyle="success" data-size="mini" data-offstyle="secondary" data-style="ios">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 m-t-0">
                                        <div class="form-group text-left">
                                            <div class="row">
                                                <div class="col-md-3 align-vertical-center">
                                                    <small class="form-control-feedback start_7"> START </small>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="time" id="time_s_1" class="form-control input_time">
                                                    <div class="invalid-feedback">กรุณาระบุเวลา</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 m-t-0">
                                        <div class="form-group text-left">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <small class="form-control-feedback end_7"> END </small>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="time" id="time_e_1" class="form-control input_time">
                                                    <select id="time_se_1" class="form-select input_time">
                                                        <option value="0">0 : Close 0%</option>
                                                        <option value="1">1 : Close 25%</option>
                                                        <option value="2">2 : Close 50%</option>
                                                        <option value="3">3 : Close 75%</option>
                                                        <option value="4">4 : Close 100%</option>
                                                    </select>
                                                    <div class="invalid-feedback">กรุณาระบุเวลา</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="d-flex mb-2">
                                    <B>TIMER 2</B>
                                    <div class="sw_toggle ms-auto">
                                        <input class="input_check" type="checkbox" id="sw_2" data-toggle="toggle" data-onstyle="success" data-size="mini" data-offstyle="secondary" data-style="ios">
                                    </div>
                                </div>
                                <div class="row m-t-10 ">
                                    <div class="col-6 m-t-0">
                                        <div class="form-group text-left">
                                            <div class="row">
                                                <div class="col-md-3 align-vertical-center">
                                                    <small class="form-control-feedback start_7"> START </small>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="time" id="time_s_2" class="form-control input_time">
                                                    <div class="invalid-feedback">กรุณาระบุเวลา</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 m-t-0">
                                        <div class="form-group text-left">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <small class="form-control-feedback end_7"> END </small>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="time" id="time_e_2" class="form-control input_time">
                                                    <div class="invalid-feedback">กรุณาระบุเวลา</div>
                                                    <select id="time_se_2" class="form-select input_time">
                                                        <option value="0">0 : Close 0%</option>
                                                        <option value="1">1 : Close 25%</option>
                                                        <option value="2">2 : Close 50%</option>
                                                        <option value="3">3 : Close 75%</option>
                                                        <option value="4">4 : Close 100%</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="d-flex mb-2">
                                    <B>TIMER 3</B>
                                    <div class="sw_toggle ms-auto">
                                        <input class="input_check" type="checkbox" id="sw_3" data-toggle="toggle" data-onstyle="success" data-size="mini" data-offstyle="secondary" data-style="ios">
                                    </div>
                                </div>
                                <div class="row m-t-10 ">
                                    <div class="col-6 m-t-0">
                                        <div class="form-group text-left">
                                            <div class="row">
                                                <div class="col-md-3 align-vertical-center">
                                                    <small class="form-control-feedback start_7"> START </small>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="time" id="time_s_3" class="form-control input_time">
                                                    <div class="invalid-feedback">กรุณาระบุเวลา</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 m-t-0">
                                        <div class="form-group text-left">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <small class="form-control-feedback end_7"> END </small>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="time" id="time_e_3" class="form-control input_time">
                                                    <div class="invalid-feedback">กรุณาระบุเวลา</div>
                                                    <select id="time_se_3" class="form-select input_time">
                                                        <option value="0">0 : Close 0%</option>
                                                        <option value="1">1 : Close 25%</option>
                                                        <option value="2">2 : Close 50%</option>
                                                        <option value="3">3 : Close 75%</option>
                                                        <option value="4">4 : Close 100%</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="d-flex mb-2">
                                    <B>TIMER 4</B>
                                    <div class="sw_toggle ms-auto">
                                        <input class="input_check" type="checkbox" id="sw_4" data-toggle="toggle" data-onstyle="success" data-size="mini" data-offstyle="secondary" data-style="ios">
                                    </div>
                                </div>
                                <div class="row m-t-10 ">
                                    <div class="col-6 m-t-0">
                                    <div class="form-group text-left">
                                            <div class="row">
                                                <div class="col-md-3 align-vertical-center">
                                                    <small class="form-control-feedback start_7"> START </small>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="time" id="time_s_4" class="form-control input_time">
                                                    <div class="invalid-feedback">กรุณาระบุเวลา</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 m-t-0">
                                        <div class="form-group text-left">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <small class="form-control-feedback end_7"> END </small>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="time" id="time_e_4" class="form-control input_time">
                                                    <div class="invalid-feedback">กรุณาระบุเวลา</div>
                                                    <select id="time_se_4" class="form-select input_time">
                                                        <option value="0">0 : Close 0%</option>
                                                        <option value="1">1 : Close 25%</option>
                                                        <option value="2">2 : Close 50%</option>
                                                        <option value="3">3 : Close 75%</option>
                                                        <option value="4">4 : Close 100%</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="d-flex mb-2">
                                    <B>TIMER 5</B>
                                    <div class="sw_toggle ms-auto">
                                        <input class="input_check" type="checkbox" id="sw_5" data-toggle="toggle" data-onstyle="success" data-size="mini" data-offstyle="secondary" data-style="ios">
                                    </div>
                                </div>
                                <div class="row m-t-10 ">
                                    <div class="col-6 m-t-0">
                                    <div class="form-group text-left">
                                            <div class="row">
                                                <div class="col-md-3 align-vertical-center">
                                                    <small class="form-control-feedback start_7"> START </small>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="time" id="time_s_5" class="form-control input_time">
                                                    <div class="invalid-feedback">กรุณาระบุเวลา</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 m-t-0">
                                        <div class="form-group text-left">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <small class="form-control-feedback end_7"> END </small>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="time" id="time_e_5" class="form-control input_time">
                                                    <div class="invalid-feedback">กรุณาระบุเวลา</div>
                                                    <select id="time_se_5" class="form-select input_time">
                                                        <option value="0">0 : Close 0%</option>
                                                        <option value="1">1 : Close 25%</option>
                                                        <option value="2">2 : Close 50%</option>
                                                        <option value="3">3 : Close 75%</option>
                                                        <option value="4">4 : Close 100%</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="d-flex mb-2">
                                    <B>TIMER 6</B>
                                    <div class="sw_toggle ms-auto">
                                        <input class="input_check" type="checkbox" id="sw_6" data-toggle="toggle" data-onstyle="success" data-size="mini" data-offstyle="secondary" data-style="ios">
                                    </div>
                                </div>
                                <div class="row m-t-10 ">
                                    <div class="col-6 m-t-0">
                                    <div class="form-group text-left">
                                            <div class="row">
                                                <div class="col-md-3 align-vertical-center">
                                                    <small class="form-control-feedback start_7"> START </small>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="time" id="time_s_6" class="form-control input_time">
                                                    <div class="invalid-feedback">กรุณาระบุเวลา</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 m-t-0">
                                        <div class="form-group text-left">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <small class="form-control-feedback end_7"> END </small>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="time" id="time_e_6" class="form-control input_time">
                                                    <div class="invalid-feedback">กรุณาระบุเวลา</div>
                                                    <select id="time_se_6" class="form-select input_time">
                                                        <option value="0">0 : Close 0%</option>
                                                        <option value="1">1 : Close 25%</option>
                                                        <option value="2">2 : Close 50%</option>
                                                        <option value="3">3 : Close 75%</option>
                                                        <option value="4">4 : Close 100%</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </from>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="save_auto_cont" class="btn btn-success waves-light">
                            <i class="fadeIn animated bx bx-save"></i> บันทึก
                        </button>
                        <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">
                            <i class="fadeIn animated bx bx-window-close"></i> ยกเลิก
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- exit Modal Control -->
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

    $(".sw_auto").click(function () { 
        $('.input_check').off('change');
        var channel = $(this).attr("id");
        // alert(channel);
        $.ajax({
            url: "routes/get_auto_control.php",
            method: "post",
            data: { 
                house_master: house_master,
                channel : channel
            },
            dataType: "json",
            success: function(res) {
                $(".channel").val(channel);
                // alert(channel)
                console.log(res)
                
                if(channel != 9){
                    $(".time_loop").hide();
                }else{
                    $(".time_loop").show();
                    if(res.st_7 == 0){
                        $("#sw_7").bootstrapToggle('off');
                        $("#time_s_7").prop('disabled', true).val(res.t_s_7);
                        $("#time_e_7").prop('disabled', true).val(res.t_e_7);
                        $("#time_on_7").prop('disabled', true).val(res.t_on_7);
                        $("#time_off_7").prop('disabled', true).val(res.t_off_7);
                    }else{
                        $("#sw_7").bootstrapToggle('on');
                        $("#time_s_7").prop('disabled', false).val(res.t_s_7);
                        $("#time_e_7").prop('disabled', false).val(res.t_e_7);
                        $("#time_on_7").prop('disabled', false).val(res.t_on_7);
                        $("#time_off_7").prop('disabled', false).val(res.t_off_7);
                    }
                }
                if(channel == 11){
                    $(".start_7").html("TIME");
                    $(".end_7").html("LEVEL");
                    $("#time_se_1").show();
                    $("#time_se_2").show();
                    $("#time_se_3").show();
                    $("#time_se_4").show();
                    $("#time_se_5").show();
                    $("#time_se_6").show();
                    $("#time_e_1").hide();
                    $("#time_e_2").hide();
                    $("#time_e_3").hide();
                    $("#time_e_4").hide();
                    $("#time_e_5").hide();
                    $("#time_e_6").hide();
                    if(res.st_1 == 0){
                        $("#sw_1").bootstrapToggle('off');
                        $("#time_s_1").prop('disabled', true).val("");
                        $("#time_se_1").prop('disabled', true).val("0");
                        $("#sw_2").bootstrapToggle('disable');
                        $("#sw_3").bootstrapToggle('disable');
                        $("#sw_4").bootstrapToggle('disable');
                        $("#sw_5").bootstrapToggle('disable');
                        $("#sw_6").bootstrapToggle('disable');
                    }else{
                        $("#sw_1").bootstrapToggle('on');
                        $("#time_s_1").prop('disabled', false).val(res.t_s_1);
                        $("#time_se_1").prop('disabled', false).val(res.t_e_1);
                        $("#sw_2").bootstrapToggle('enable');
                        $("#sw_3").bootstrapToggle('disable');
                        $("#sw_4").bootstrapToggle('disable');
                        $("#sw_5").bootstrapToggle('disable');
                        $("#sw_6").bootstrapToggle('disable');
                    }
                    if(res.st_2 == 0){
                        $("#sw_2").bootstrapToggle('off');
                        $("#time_s_2").prop('disabled', true).val("");
                        $("#time_se_2").prop('disabled', true).val("0");
                        $("#sw_3").bootstrapToggle('disable');
                        $("#sw_4").bootstrapToggle('disable');
                        $("#sw_5").bootstrapToggle('disable');
                        $("#sw_6").bootstrapToggle('disable');
                    }else{
                        $("#sw_2").bootstrapToggle('on');
                        $("#time_s_2").prop('disabled', false).val(res.t_s_2);
                        $("#time_se_2").prop('disabled', false).val(res.t_e_2);
                        $("#sw_3").bootstrapToggle('enable');
                        $("#sw_4").bootstrapToggle('disable');
                        $("#sw_5").bootstrapToggle('disable');
                        $("#sw_6").bootstrapToggle('disable');
                    }
                    if(res.st_3 == 0){
                        $("#sw_3").bootstrapToggle('off');
                        $("#time_s_3").prop('disabled', true).val("");
                        $("#time_se_3").prop('disabled', true).val("0");
                        $("#sw_4").bootstrapToggle('disable');
                        $("#sw_5").bootstrapToggle('disable');
                        $("#sw_6").bootstrapToggle('disable');
                    }else{
                        $("#sw_3").bootstrapToggle('on');
                        $("#time_s_3").prop('disabled', false).val(res.t_s_3);
                        $("#time_se_3").prop('disabled', false).val(res.t_e_3);
                        $("#sw_4").bootstrapToggle('enable');
                        $("#sw_5").bootstrapToggle('disable');
                        $("#sw_6").bootstrapToggle('disable');
                    }
                    if(res.st_4 == 0){
                        $("#sw_4").bootstrapToggle('off');
                        $("#time_s_4").prop('disabled', true).val("");
                        $("#time_se_4").prop('disabled', true).val("0");
                        $("#sw_5").bootstrapToggle('disable');
                        $("#sw_6").bootstrapToggle('disable');
                    }else{
                        $("#sw_4").bootstrapToggle('on');
                        $("#time_s_4").prop('disabled', false).val(res.t_s_4);
                        $("#time_se_4").prop('disabled', false).val(res.t_e_4);
                        $("#sw_5").bootstrapToggle('enable');
                        $("#sw_6").bootstrapToggle('disable');
                    }
                    if(res.st_5 == 0){
                        $("#sw_5").bootstrapToggle('off');
                        $("#time_s_5").prop('disabled', true).val("");
                        $("#time_se_5").prop('disabled', true).val("0");
                        $("#sw_6").bootstrapToggle('disable');
                    }else{
                        $("#sw_5").bootstrapToggle('on');
                        $("#time_s_5").prop('disabled', false).val(res.t_s_5);
                        $("#time_se_5").prop('disabled', false).val(res.t_e_5);
                        $("#sw_6").bootstrapToggle('enable');
                    }
                    if(res.st_6 == 0){
                        $("#sw_6").bootstrapToggle('off');
                        $("#time_s_6").prop('disabled', true).val("");
                        $("#time_se_6").prop('disabled', true).val("0");
                    }else{
                        $("#sw_6").bootstrapToggle('on');
                        $("#time_s_6").prop('disabled', false).val(res.t_s_6);
                        $("#time_se_6").prop('disabled', false).val(res.t_e_6);
                    }
                }else{
                    $(".start_7").html("START");
                    $(".end_7").html("END");
                    $("#sw_1").bootstrapToggle('enable');
                    $("#sw_2").bootstrapToggle('enable');
                    $("#sw_3").bootstrapToggle('enable');
                    $("#sw_4").bootstrapToggle('enable');
                    $("#sw_5").bootstrapToggle('enable');
                    $("#sw_6").bootstrapToggle('enable');
                    $("#time_e_1").show();
                    $("#time_e_2").show();
                    $("#time_e_3").show();
                    $("#time_e_4").show();
                    $("#time_e_5").show();
                    $("#time_e_6").show();
                    $("#time_se_1").hide();
                    $("#time_se_2").hide();
                    $("#time_se_3").hide();
                    $("#time_se_4").hide();
                    $("#time_se_5").hide();
                    $("#time_se_6").hide();
                    
                    if(res.st_1 == 0){
                        $("#sw_1").bootstrapToggle('off');
                        $("#time_s_1").prop('disabled', true).val("");
                        $("#time_e_1").prop('disabled', true).val("");
                    }else{
                        $("#sw_1").bootstrapToggle('on');
                        $("#time_s_1").prop('disabled', false).val(res.t_s_1);
                        $("#time_e_1").prop('disabled', false).val(res.t_e_1);
                    }
                    if(res.st_2 == 0){
                        $("#sw_2").bootstrapToggle('off');
                        $("#time_s_2").prop('disabled', true).val("");
                        $("#time_e_2").prop('disabled', true).val("");
                    }else{
                        $("#sw_2").bootstrapToggle('on');
                        $("#time_s_2").prop('disabled', false).val(res.t_s_2);
                        $("#time_e_2").prop('disabled', false).val(res.t_e_2);
                    }
                    if(res.st_3 == 0){
                        $("#sw_3").bootstrapToggle('off');
                        $("#time_s_3").prop('disabled', true).val("");
                        $("#time_e_3").prop('disabled', true).val("");
                    }else{
                        $("#sw_3").bootstrapToggle('on');
                        $("#time_s_3").prop('disabled', false).val(res.t_s_3);
                        $("#time_e_3").prop('disabled', false).val(res.t_e_3);
                    }
                    if(res.st_4 == 0){
                        $("#sw_4").bootstrapToggle('off');
                        $("#time_s_4").prop('disabled', true).val("");
                        $("#time_e_4").prop('disabled', true).val("");
                    }else{
                        $("#sw_4").bootstrapToggle('on');
                        $("#time_s_4").prop('disabled', false).val(res.t_s_4);
                        $("#time_e_4").prop('disabled', false).val(res.t_e_4);
                    }
                    if(res.st_5 == 0){
                        $("#sw_5").bootstrapToggle('off');
                        $("#time_s_5").prop('disabled', true).val("");
                        $("#time_e_5").prop('disabled', true).val("");
                    }else{
                        $("#sw_5").bootstrapToggle('on');
                        $("#time_s_5").prop('disabled', false).val(res.t_s_5);
                        $("#time_e_5").prop('disabled', false).val(res.t_e_5);
                    }
                    if(res.st_6 == 0){
                        $("#sw_6").bootstrapToggle('off');
                        $("#time_s_6").prop('disabled', true).val("");
                        $("#time_e_6").prop('disabled', true).val("");
                    }else{
                        $("#sw_6").bootstrapToggle('on');
                        $("#time_s_6").prop('disabled', false).val(res.t_s_6);
                        $("#time_e_6").prop('disabled', false).val(res.t_e_6);
                    }
                }
                $("#Modal_Auto_control").modal("show");
                
                $('.input_check').change(function() {
                    var input_num = this.id.split("_");
                    // alert(Number(input_num[1]));
                    if(channel == 11){ // slan
                        if ($(this).prop('checked') === true) {
                            $("#time_s_" + Number(input_num[1])).prop('disabled', false).val(eval("res.t_s_" + Number(input_num[1])));
                            $("#time_se_" + Number(input_num[1])).prop('disabled', false).val(eval("res.t_e_" + Number(input_num[1])));
                            $("#sw_" +(Number(input_num[1]) + 1)).bootstrapToggle('enable');
                            for (var t = (Number(input_num[1]+1)); t <= 6; t++) {
                                $("#sw_" +(t+1)).bootstrapToggle('off').bootstrapToggle('disable')
                            }
                        }else{
                            $("#time_s_" + Number(input_num[1])).prop('disabled', true).val("");
                            $("#time_se_" + Number(input_num[1])).prop('disabled', true).val("0");
                            for (var t = Number(input_num[1]); t <= 6; t++) {
                                $("#sw_" +(t + 1)).bootstrapToggle('off').bootstrapToggle('disable');
                            }
                        }

                    }else if(channel == 9){ // foggy
                        if (Number(input_num[1]) == 7) { // sw_7
                            if ($(this).prop('checked') === true) { // on 7
                                $("#time_s_7").prop('disabled', false).val(res.t_s_7);
                                $("#time_e_7").prop('disabled', false).val(res.t_s_7);
                                $("#time_on_7").prop('disabled', false).val(res.t_on_7);
                                $("#time_off_7").prop('disabled', false).val(res.t_off_7);
                                $("#sw_1").bootstrapToggle('off');
                                $("#sw_2").bootstrapToggle('off');
                                $("#sw_3").bootstrapToggle('off');
                                $("#sw_4").bootstrapToggle('off');
                                $("#sw_5").bootstrapToggle('off');
                                $("#sw_6").bootstrapToggle('off');
                            }else{ // off_7
                                $("#time_s_7").prop('disabled', true).val("");
                                $("#time_e_7").prop('disabled', true).val("");
                                $("#time_on_7").prop('disabled', true).val("");
                                $("#time_off_7").prop('disabled', true).val("");
                            }
                        }else{ // sw_!7
                            if ($(this).prop('checked') === true) { // on
                                $("#sw_7").bootstrapToggle('off'); 
                                $("#time_s_" + Number(input_num[1])).prop('disabled', false).val(eval("res.t_s_" + Number(input_num[1])));
                                $("#time_e_" + Number(input_num[1])).prop('disabled', false).val(eval("res.t_s_" + Number(input_num[1])));
                            }else{ // off
                                $("#time_s_" + Number(input_num[1])).prop('disabled', true).val("");
                                $("#time_e_" + Number(input_num[1])).prop('disabled', true).val("");
                            }
                        }
                    }else{ // != foggy != slan
                        if ($(this).prop('checked') === true) {
                            $("#time_s_" + Number(input_num[1])).prop('disabled', false).val(eval("res.t_s_" + Number(input_num[1])));
                            $("#time_e_" + Number(input_num[1])).prop('disabled', false).val(eval("res.t_s_" + Number(input_num[1])));
                        }else{
                            $("#time_s_" + Number(input_num[1])).prop('disabled', true).val("");
                            $("#time_e_" + Number(input_num[1])).prop('disabled', true).val("");
                        }
                    }
                });
            }// succress
        });
    });
    
    $("#save_auto_cont").click(function(){
        var channel = $(".channel").val();
        // alert(channel)
        if(channel == 9){
            if($("#sw_7").prop('checked') == true){
                if($("#time_s_7").val() === ""){
                    $('#time_s_7').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_s_7').removeClass('is-invalid')
                }
                if($("#time_e_7").val() === ""){
                    $('#time_e_7').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_e_7').removeClass('is-invalid')
                }
                if($("#time_s_7").val() >= $("#time_e_7").val()){
                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER LOOP : <b>เวลาเริ่มต้นต้องน้อยกว่าเวลาสิ้นสุด</b> !');
                    $('#time_s_7').addClass('is-invalid')
                    $('#time_e_7').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_s_7').removeClass('is-invalid')
                    $('#time_e_7').removeClass('is-invalid')
                }
                if($("#time_on_7").val() === ""){
                    $('#time_on_7').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_on_7').removeClass('is-invalid')
                }
                if($("#time_off_7").val() === ""){
                    $('#time_off_7').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_off_7').removeClass('is-invalid')
                }
            }else{
                if($("#sw_1").prop('checked') == true){
                    if($("#time_s_1").val() === ""){
                        $('#time_s_1').addClass('is-invalid')
                        return false;
                    }else{
                        $('#time_s_1').removeClass('is-invalid')
                    }
                    if($("#time_e_1").val() === ""){
                        $('#time_e_1').addClass('is-invalid')
                        return false;
                    }else{
                        $('#time_e_1').removeClass('is-invalid')
                    }
                    if($("#time_s_1").val() >= $("#time_e_1").val()){
                        swal_c(type = 'error', title = 'Error...', text = 'TIMMER 1 : <b>เวลาเริ่มต้นต้องน้อยกว่าเวลาสิ้นสุด</b> !');
                        $('#time_s_1').addClass('is-invalid')
                        $('#time_e_1').addClass('is-invalid')
                        return false;
                    }else{
                        $('#time_s_1').removeClass('is-invalid')
                        $('#time_e_1').removeClass('is-invalid')
                    }
                }
                if($("#sw_2").prop('checked') == true){
                    if($("#time_s_2").val() === ""){
                        $('#time_s_2').addClass('is-invalid')
                        return false;
                    }else{
                        $('#time_s_2').removeClass('is-invalid')
                    }
                    if($("#time_e_2").val() === ""){
                        $('#time_e_2').addClass('is-invalid')
                        return false;
                    }else{
                        $('#time_e_2').removeClass('is-invalid')
                    }
                    if($("#time_s_2").val() >= $("#time_e_2").val()){
                        swal_c(type = 'error', title = 'Error...', text = 'TIMMER 2 : <b>เวลาเริ่มต้นต้องน้อยกว่าเวลาสิ้นสุด</b> !');
                        $('#time_s_2').addClass('is-invalid')
                        $('#time_e_2').addClass('is-invalid')
                        return false;
                    }else{
                        $('#time_s_2').removeClass('is-invalid')
                        $('#time_e_2').removeClass('is-invalid')
                    }
                }
                if($("#sw_3").prop('checked') == true){
                    if($("#time_s_3").val() === ""){
                        $('#time_s_3').addClass('is-invalid')
                        return false;
                    }else{
                        $('#time_s_3').removeClass('is-invalid')
                    }
                    if($("#time_e_3").val() === ""){
                        $('#time_e_3').addClass('is-invalid')
                        return false;
                    }else{
                        $('#time_e_3').removeClass('is-invalid')
                    }
                    if($("#time_s_3").val() >= $("#time_e_3").val()){
                        swal_c(type = 'error', title = 'Error...', text = 'TIMMER 3 : <b>เวลาเริ่มต้นต้องน้อยกว่าเวลาสิ้นสุด</b> !');
                        $('#time_s_3').addClass('is-invalid')
                        $('#time_e_3').addClass('is-invalid')
                        return false;
                    }else{
                        $('#time_s_3').removeClass('is-invalid')
                        $('#time_e_3').removeClass('is-invalid')
                    }
                }
                if($("#sw_4").prop('checked') == true){
                    if($("#time_s_4").val() === ""){
                        $('#time_s_4').addClass('is-invalid')
                        return false;
                    }else{
                        $('#time_s_4').removeClass('is-invalid')
                    }
                    if($("#time_e_4").val() === ""){
                        $('#time_e_4').addClass('is-invalid')
                        return false;
                    }else{
                        $('#time_e_4').removeClass('is-invalid')
                    }
                    if($("#time_s_4").val() >= $("#time_e_4").val()){
                        swal_c(type = 'error', title = 'Error...', text = 'TIMMER 4 : <b>เวลาเริ่มต้นต้องน้อยกว่าเวลาสิ้นสุด</b> !');
                        $('#time_s_4').addClass('is-invalid')
                        $('#time_e_4').addClass('is-invalid')
                        return false;
                    }else{
                        $('#time_s_4').removeClass('is-invalid')
                        $('#time_e_4').removeClass('is-invalid')
                    }
                }
                if($("#sw_5").prop('checked') == true){
                    if($("#time_s_5").val() === ""){
                        $('#time_s_5').addClass('is-invalid')
                        return false;
                    }else{
                        $('#time_s_5').removeClass('is-invalid')
                    }
                    if($("#time_e_5").val() === ""){
                        $('#time_e_5').addClass('is-invalid')
                        return false;
                    }else{
                        $('#time_e_5').removeClass('is-invalid')
                    }
                    if($("#time_s_5").val() >= $("#time_e_5").val()){
                        swal_c(type = 'error', title = 'Error...', text = 'TIMMER 5 : <b>เวลาเริ่มต้นต้องน้อยกว่าเวลาสิ้นสุด</b> !');
                        $('#time_s_5').addClass('is-invalid')
                        $('#time_e_5').addClass('is-invalid')
                        return false;
                    }else{
                        $('#time_s_5').removeClass('is-invalid')
                        $('#time_e_5').removeClass('is-invalid')
                    }
                }
                if($("#sw_6").prop('checked') == true){
                    if($("#time_s_6").val() === ""){
                        $('#time_s_6').addClass('is-invalid')
                        return false;
                    }else{
                        $('#time_s_6').removeClass('is-invalid')
                    }
                    if($("#time_e_6").val() === ""){
                        $('#time_e_6').addClass('is-invalid')
                        return false;
                    }else{
                        $('#time_e_6').removeClass('is-invalid')
                    }
                    if($("#time_s_6").val() >= $("#time_e_6").val()){
                        swal_c(type = 'error', title = 'Error...', text = 'TIMMER 6 : <b>เวลาเริ่มต้นต้องน้อยกว่าเวลาสิ้นสุด</b> !');
                        $('#time_s_6').addClass('is-invalid')
                        $('#time_e_6').addClass('is-invalid')
                        return false;
                    }else{
                        $('#time_s_6').removeClass('is-invalid')
                        $('#time_e_6').removeClass('is-invalid')
                    }
                }
            }
        }else if(channel == 11){
            var minsToAdd = 15;
            var newTime_d2 = new Date(new Date("1970/01/01 " + $("#time_s_1").val()).getTime() + minsToAdd * 60000).toLocaleTimeString('en-UK', { hour: '2-digit', minute: '2-digit', hour12: false });
            var newTime_d3 = new Date(new Date("1970/01/01 " + $("#time_s_2").val()).getTime() + minsToAdd * 60000).toLocaleTimeString('en-UK', { hour: '2-digit', minute: '2-digit', hour12: false });
            var newTime_d4 = new Date(new Date("1970/01/01 " + $("#time_s_3").val()).getTime() + minsToAdd * 60000).toLocaleTimeString('en-UK', { hour: '2-digit', minute: '2-digit', hour12: false });
            var newTime_d5 = new Date(new Date("1970/01/01 " + $("#time_s_4").val()).getTime() + minsToAdd * 60000).toLocaleTimeString('en-UK', { hour: '2-digit', minute: '2-digit', hour12: false });
            var newTime_d6 = new Date(new Date("1970/01/01 " + $("#time_s_5").val()).getTime() + minsToAdd * 60000).toLocaleTimeString('en-UK', { hour: '2-digit', minute: '2-digit', hour12: false });
            
                // ----------
            if($("#sw_1").prop('checked') == true){
                if($("#time_s_1").val() === ""){
                    $('#time_s_1').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_s_1').removeClass('is-invalid')
                }
            }
            if($("#sw_2").prop('checked') == true){
                if($("#time_s_2").val() === ""){
                    $('#time_s_2').addClass('is-invalid')
                    return false;
                }else if($("#time_s_2").val() <= newTime_d2){
                    swal_c(type = 'error', title = 'Error...', text = '<b>TIMMER 2 : TIME </b> ต้องมากกว่า <b>' + newTime_d2 + '</b> !');
                    $("#time_s_2").addClass("is-invalid");
                    return false;
                }else{
                    $('#time_s_2').removeClass('is-invalid')
                }
                if($("#time_se_1").val() == $("#time_se_2").val()){
                    swal_c(type = 'error', title = 'Error...', text = '<b> LEVEL : TIMMER 2 </b> ต้องไม่เท่ากับ <b> LEVEL : TIMMER 1 </b> !');
                    $("#time_se_2").addClass("is-invalid");
                    return false;
                }else{
                    $("#time_se_2").removeClass("is-invalid");
                }
            }
            if($("#sw_3").prop('checked') == true){
                if($("#time_s_3").val() === ""){
                    $('#time_s_3').addClass('is-invalid')
                    return false;
                }else if($("#time_s_3").val() <= newTime_d3){
                    swal_c(type = 'error', title = 'Error...', text = '<b>TIMMER 3 : TIME </b> เวลาต้องมากกว่า <b>' + newTime_d3 + '</b> !');
                    $("#time_s_3").addClass("is-invalid");
                    return false;
                }else{
                    $('#time_s_3').removeClass('is-invalid')
                }
                if($("#time_se_2").val() == $("#time_se_3").val()){
                    swal_c(type = 'error', title = 'Error...', text = '<b> LEVEL : TIMMER 3 </b> ต้องไม่เท่ากับ <b> LEVEL : TIMMER 2 </b> !');
                    $("#time_se_3").addClass("is-invalid");
                    return false;
                }else{
                    $("#time_se_3").removeClass("is-invalid");
                }
            }
            if($("#sw_4").prop('checked') == true){
                if($("#time_s_4").val() === ""){
                    $('#time_s_4').addClass('is-invalid')
                    return false;
                }else if($("#time_s_4").val() <= newTime_d4){
                    swal_c(type = 'error', title = 'Error...', text = '<b>TIMMER 4 : TIME </b> เวลาต้องมากกว่า <b>' + newTime_d4 + '</b> !');
                    $("#time_s_4").addClass("is-invalid");
                    return false;
                }else{
                    $('#time_s_4').removeClass('is-invalid')
                }
                if($("#time_se_3").val() == $("#time_se_4").val()){
                    swal_c(type = 'error', title = 'Error...', text = '<b> LEVEL : TIMMER 4 </b> ต้องไม่เท่ากับ <b> LEVEL : TIMMER 3 </b> !');
                    $("#time_se_4").addClass("is-invalid");
                    return false;
                }else{
                    $("#time_se_4").removeClass("is-invalid");
                }
            }
            if($("#sw_5").prop('checked') == true){
                if($("#time_s_5").val() === ""){
                    $('#time_s_5').addClass('is-invalid')
                    return false;
                }else if($("#time_s_5").val() <= newTime_d5){
                    swal_c(type = 'error', title = 'Error...', text = '<b>TIMMER 5 : TIME </b> เวลาต้องมากกว่า <b>' + newTime_d5 + '</b> !');
                    $("#time_s_5").addClass("is-invalid");
                    return false;
                }else{
                    $('#time_s_5').removeClass('is-invalid')
                }
                if($("#time_se_4").val() == $("#time_se_5").val()){
                    swal_c(type = 'error', title = 'Error...', text = '<b> LEVEL : TIMMER 5 </b> ต้องไม่เท่ากับ <b> LEVEL : TIMMER 4 </b> !');
                    $("#time_se_5").addClass("is-invalid");
                    return false;
                }else{
                    $("#time_se_5").removeClass("is-invalid");
                }
            }
            if($("#sw_6").prop('checked') == true){
                if($("#time_s_6").val() === ""){
                    $('#time_s_6').addClass('is-invalid')
                    return false;
                }else if($("#time_s_6").val() <= newTime_d6){
                    swal_c(type = 'error', title = 'Error...', text = '<b>TIMMER 6 : TIME </b> เวลาต้องมากกว่า <b>' + newTime_d6 + '</b> !');
                    $("#time_s_6").addClass("is-invalid");
                    return false;
                }else{
                    $('#time_s_6').removeClass('is-invalid')
                }
                if($("#time_se_5").val() == $("#time_se_6").val()){
                    swal_c(type = 'error', title = 'Error...', text = '<b> LEVEL : TIMMER 6 </b> ต้องไม่เท่ากับ <b> LEVEL : TIMMER 5 </b> !');
                    $("#time_se_6").addClass("is-invalid");
                    return false;
                }else{
                    $("#time_se_6").removeClass("is-invalid");
                }
            }
        }else{
            if($("#sw_1").prop('checked') == true){
                if($("#time_s_1").val() === ""){
                    $('#time_s_1').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_s_1').removeClass('is-invalid')
                }
                if($("#time_e_1").val() === ""){
                    $('#time_e_1').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_e_1').removeClass('is-invalid')
                }
                if($("#time_s_1").val() >= $("#time_e_1").val()){
                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER 1 : <b>เวลาเริ่มต้นต้องน้อยกว่าเวลาสิ้นสุด</b> !');
                    $('#time_s_1').addClass('is-invalid')
                    $('#time_e_1').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_s_1').removeClass('is-invalid')
                    $('#time_e_1').removeClass('is-invalid')
                }
            }
            if($("#sw_2").prop('checked') == true){
                if($("#time_s_2").val() === ""){
                    $('#time_s_2').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_s_2').removeClass('is-invalid')
                }
                if($("#time_e_2").val() === ""){
                    $('#time_e_2').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_e_2').removeClass('is-invalid')
                }
                if($("#time_s_2").val() >= $("#time_e_2").val()){
                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER 2 : <b>เวลาเริ่มต้นต้องน้อยกว่าเวลาสิ้นสุด</b> !');
                    $('#time_s_2').addClass('is-invalid')
                    $('#time_e_2').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_s_2').removeClass('is-invalid')
                    $('#time_e_2').removeClass('is-invalid')
                }
            }
            if($("#sw_3").prop('checked') == true){
                if($("#time_s_3").val() === ""){
                    $('#time_s_3').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_s_3').removeClass('is-invalid')
                }
                if($("#time_e_3").val() === ""){
                    $('#time_e_3').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_e_3').removeClass('is-invalid')
                }
                if($("#time_s_3").val() >= $("#time_e_3").val()){
                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER 3 : <b>เวลาเริ่มต้นต้องน้อยกว่าเวลาสิ้นสุด</b> !');
                    $('#time_s_3').addClass('is-invalid')
                    $('#time_e_3').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_s_3').removeClass('is-invalid')
                    $('#time_e_3').removeClass('is-invalid')
                }
            }
            if($("#sw_4").prop('checked') == true){
                if($("#time_s_4").val() === ""){
                    $('#time_s_4').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_s_4').removeClass('is-invalid')
                }
                if($("#time_e_4").val() === ""){
                    $('#time_e_4').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_e_4').removeClass('is-invalid')
                }
                if($("#time_s_4").val() >= $("#time_e_4").val()){
                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER 4 : <b>เวลาเริ่มต้นต้องน้อยกว่าเวลาสิ้นสุด</b> !');
                    $('#time_s_4').addClass('is-invalid')
                    $('#time_e_4').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_s_4').removeClass('is-invalid')
                    $('#time_e_4').removeClass('is-invalid')
                }
            }
            if($("#sw_5").prop('checked') == true){
                if($("#time_s_5").val() === ""){
                    $('#time_s_5').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_s_5').removeClass('is-invalid')
                }
                if($("#time_e_5").val() === ""){
                    $('#time_e_5').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_e_5').removeClass('is-invalid')
                }
                if($("#time_s_5").val() >= $("#time_e_5").val()){
                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER 5 : <b>เวลาเริ่มต้นต้องน้อยกว่าเวลาสิ้นสุด</b> !');
                    $('#time_s_5').addClass('is-invalid')
                    $('#time_e_5').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_s_5').removeClass('is-invalid')
                    $('#time_e_5').removeClass('is-invalid')
                }
            }
            if($("#sw_6").prop('checked') == true){
                if($("#time_s_6").val() === ""){
                    $('#time_s_6').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_s_6').removeClass('is-invalid')
                }
                if($("#time_e_6").val() === ""){
                    $('#time_e_6').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_e_6').removeClass('is-invalid')
                }
                if($("#time_s_6").val() >= $("#time_e_6").val()){
                    swal_c(type = 'error', title = 'Error...', text = 'TIMMER 6 : <b>เวลาเริ่มต้นต้องน้อยกว่าเวลาสิ้นสุด</b> !');
                    $('#time_s_6').addClass('is-invalid')
                    $('#time_e_6').addClass('is-invalid')
                    return false;
                }else{
                    $('#time_s_6').removeClass('is-invalid')
                    $('#time_e_6').removeClass('is-invalid')
                }
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
        if ($("#sw_1").prop('checked') == true) { var sw_1 = 1; } else { var sw_1 = 0; }
        if ($("#sw_2").prop('checked') == true) { var sw_2 = 1; } else { var sw_2 = 0; }
        if ($("#sw_3").prop('checked') == true) { var sw_3 = 1; } else { var sw_3 = 0; }
        if ($("#sw_4").prop('checked') == true) { var sw_4 = 1; } else { var sw_4 = 0; }
        if ($("#sw_5").prop('checked') == true) { var sw_5 = 1; } else { var sw_5 = 0; }
        if ($("#sw_6").prop('checked') == true) { var sw_6 = 1; } else { var sw_6 = 0; }
        if ($("#sw_7").prop('checked') == true) { var sw_7 = 1; } else { var sw_7 = 0; }
        $.ajax({
            type: "POST",
            url: "routes/save_autoControl.php",
            data: {
                house_master: house_master,
                channel     : $("#channel").val(),
                sw_1 : sw_1,
                sw_2 : sw_2,
                sw_3 : sw_3,
                sw_4 : sw_4,
                sw_5 : sw_5,
                sw_6 : sw_6,
                sw_7 : sw_7,
                s_1 : $("#time_s_1").val(),
                s_2 : $("#time_s_2").val(),
                s_3 : $("#time_s_3").val(),
                s_4 : $("#time_s_4").val(),
                s_5 : $("#time_s_5").val(),
                s_6 : $("#time_s_6").val(),
                s_7 : $("#time_s_7").val(),
                e_1 : $("#time_e_1").val(),
                e_2 : $("#time_e_2").val(),
                e_3 : $("#time_e_3").val(),
                e_4 : $("#time_e_4").val(),
                e_5 : $("#time_e_5").val(),
                e_6 : $("#time_e_6").val(),
                e_7 : $("#time_e_7").val(),
                on_7 : $("#time_on_7").val(),
                off_7 : $("#time_off_7").val()
            },
            dataType: 'json',
            success: function(res) {
                console.log(res)
                // if (res.status_login === 'No user') {
                //     $('.l_err').show();
                // } else if (res.status_login != '') {
                //     window.location.href = "index.html";
                // }
            }
        });
    });
</script>