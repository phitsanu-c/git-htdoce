<div class="d-flex mb-2">
    <div class="row row-cols-auto g-3 mb-2">
        <div class="col">
            <button type="button" class="btn btn-outline-secondary px-5 all_day">1 วัน</button>
            <button type="button" class="btn btn-outline-secondary px-5 all_week">1 สัปดาห์</button>
            <button type="button" class="btn btn-outline-secondary px-5 all_month">1 เดือน</button>
        </div>
        <div class="col">
            <div class="input-group mb-3">
                <input type="text" class="form-control text-center from_to_df val_start" placeholder="วันเวลาเริ่มต้น" aria-label="Recipient's username" aria-describedby="button-addon2">
                <input type="text" class="form-control text-center from_to_df val_end" type="text" placeholder="วันเวลาสิ้นสุด" aria-label="วันเวลาสิ้นสุด" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary all_from_to" type="button" id="button-addon2">
                    <span class="d-none d-sm-block">กำหนดเอง</span>
                    <span class="d-block d-sm-none"><i class="fadeIn animated bx bx-check"></i></span>
                </button>
            </div>
        </div>
    </div>
    <div class="ms-auto">
        <ul class="nav nav-pills mb-3" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="pill" href="#p-chart" role="tab" aria-selected="true" style="border: 1px solid transparent; border-color: #6c757d;">
                    <i class="fadeIn animated bx bx-line-chart"></i> กราฟ
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="pill" href="#p-table" role="tab" aria-selected="false" style="border: 1px solid transparent; border-color: #6c757d;">
                    <i class="fadeIn animated bx bx-table"></i> ตาราง
                </a>
            </li>
        </ul>
    </div>
    <!-- Modal_select_sn -->
    <div class="modal fade" id="Modal_select_sn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog-scrollable modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <!-- <div class="modal-header text-center">
                    <h4 class="modal-title"><b>เลือกเซ็นเซอร์</b></h4>
                </div> -->
                <div class="modal-body">
                    <!-- เลือกเซ็นเซอร์ -->
                    <!-- <div class="Collapse_tb_sel"> -->
                    <h4 class="card-title text-center">
                        <b>เลือกเซ็นเซอร์</b>
                    </h4><hr/>
                    <div class="d-flex mb-2">
                    <div class="form-check mb-3">
                        <h5 style="margin-left:40px">
                        <input type="checkbox" class="form-check-input" id="checkbox_all_sn">
                        <label class="form-check-label">เลือกทุกประเภท</label></h5>
                    </div>
                        <div class="ms-auto">
                            <label class="form-check-label" for="flexSwitchCheckCheckedDanger">แสดงข้อมูล : </label>
                            <select id="sel_all_every" class="form-check-label">
                                <option value="1">ทุก ๆ 1 นาที</option>
                                <option value="2">ทุก ๆ 5 นาที</option>
                                <option value="3">ทุก ๆ 10 นาที</option>
                                <option value="4">ทุก ๆ 15 นาที</option>
                                <option value="5">ทุก ๆ 30 นาที</option>
                                <option value="6">ทุก ๆ 1 ชั่วโมง</option>
                            </select>
                        </div>
                    </div>

                    <?php
                        $s_master = $_POST['s_master'];
                        $dashStatus = $_POST['dashStatus'];
                        $dashName = $_POST['dashName'];
                        $dashSncanel = $_POST["dashSncanel"];
                        $dashMode = $_POST["dashMode"];
                        // $count_dash = array_count_values($dashMode)['1'];
                        // print_r( array_count_values($dashStatus) );
                    // echo array_count_values($controlstatus)['0'];
                    // exit();
                    for($i=1; $i <= 40; $i++ ){
                        if($dashStatus[$i] == 1){
                            if($dashMode[$i] == 1){
                                $data_count1[] = $i;
                            }
                        }
                    }
                    for($i=1; $i <= 40; $i++ ){
                        if($dashStatus[$i] == 1){
                            if($dashMode[$i] == 2){
                                $data_count2[] = $i;
                            }
                        }
                    }
                    for($i=1; $i <= 40; $i++ ){
                        if($dashStatus[$i] == 1){
                            if($dashMode[$i] == 3){
                                $data_count3[] = $i;
                            }
                        }
                    }
                    for($i=1; $i <= 40; $i++ ){
                        if($dashStatus[$i] == 1){
                            if($dashMode[$i] == 4 || $dashMode[$i] == 5 || $dashMode[$i] == 6 || $dashMode[$i] == 7){
                                $data_count4[] = $i;
                            }
                        }
                    }
                    // echo $count_dash);
                    // echo count($data_count1);
                    // print_r($data_count1);
                    // print_r($data_count2);
                    // print_r($data_count3);
                    // print_r($data_count4);
                    // print_r($data_count0);
                    ?>

                    <div class="row">
                        <?php if(isset($data_count1)){?>
                        <div class="col-lg-3 col-xl-3 col-sm-12 d-flex">
                            <div class="card-body border radius-10 shadow-none mb-3">
                                <div class="form-check">
									<input class="form-check-input" name="radio_c" id="radio_temp" type="radio" onchange="ch_radio('temp')" checked>
									<h5>อุณหภูมิ</h5>
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" name="checkbox_all_temp" onchange="checkbox_all('temp')" checked>
                                        <label class="form-check-label">เลือกทั้งหมด</label>
                                    </div>
                                    <hr/>
                                    <?php for($i=1; $i <= 40; $i++ ){
                                        if($dashStatus[$i] == 1){
                                            if($dashMode[$i] == 1){ ?>
                                                <div class="form-check mb-3"> 
                                                    <input type="checkbox" class="form-check-input" name="checkbox_temp[]" value="<?= $dashSncanel[$i] ?>" onchange="checkbox_check(<?= count($data_count1) ?> ,'temp')" checked>
                                                    <label class="form-check-label"><?= $dashName[$i] ?></label>
                                                </div>
                                    <?php } } } ?>
								</div>
                            </div>
                        </div>
                        <?php } if(isset($data_count2)){?>
                            <div class="col-lg-3 col-xl-3 col-sm-12 d-flex">
                                <div class="card-body border radius-10 shadow-none mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name="radio_c" id="radio_hum" type="radio" onchange="ch_radio('hum')">
                                        <h5>ความชื้นอากาศ</h5>
                                        <div class="form-check mb-3">
                                            <input type="checkbox" class="form-check-input" name="checkbox_all_hum" onchange="checkbox_all('hum')">
                                            <label class="form-check-label">เลือกทั้งหมด</label>
                                        </div>
                                        <hr/>
                                        <?php for($i=1; $i <= 40; $i++ ){
                                            if($dashStatus[$i] == 1){
                                                if($dashMode[$i] == 1){ ?>
                                                    <div class="form-check mb-3"> 
                                                        <input type="checkbox" class="form-check-input" name="checkbox_hum[]" value="<?= $dashSncanel[$i] ?>" onchange="checkbox_check(<?= count($data_count1) ?> ,'hum')" checked>
                                                        <label class="form-check-label"><?= $dashName[$i] ?></label>
                                                    </div>
                                        <?php } } } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } if(isset($data_count3)){?>
                            <div class="col-lg-3 col-xl-3 col-sm-12 d-flex">
                                <div class="card-body border radius-10 shadow-none mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name="radio_c" id="radio_soil" type="radio" onchange="ch_radio('soil')">
                                        <h5>ความชื้นในดิน</h5>
                                        <div class="form-check mb-3">
                                            <input type="checkbox" class="form-check-input" name="checkbox_all_soil" onchange="checkbox_all('soil')">
                                            <label class="form-check-label">เลือกทั้งหมด</label>
                                        </div>
                                        <hr/>
                                        <?php for($i=1; $i <= 40; $i++ ){
                                            if($dashStatus[$i] == 1){
                                                if($dashMode[$i] == 1){ ?>
                                                    <div class="form-check mb-3"> 
                                                        <input type="checkbox" class="form-check-input" name="checkbox_soil[]" value="<?= $dashSncanel[$i] ?>" onchange="checkbox_check(<?= count($data_count1) ?> ,'soil')" checked>
                                                        <label class="form-check-label"><?= $dashName[$i] ?></label>
                                                    </div>
                                        <?php } } } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } if(isset($data_count4)){?>
                            <div class="col-lg-3 col-xl-3 col-sm-12 d-flex">
                                <div class="card-body border radius-10 shadow-none mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name="radio_c" id="radio_light" type="radio" onchange="ch_radio('light')">
                                        <h5>ความเข้มแสง</h5>
                                        <div class="form-check mb-3">
                                            <input type="checkbox" class="form-check-input" name="checkbox_all_light" onchange="checkbox_all('light')">
                                            <label class="form-check-label">เลือกทั้งหมด</label>
                                        </div>
                                        <hr/>
                                        <?php for($i=1; $i <= 40; $i++ ){
                                            if($dashStatus[$i] == 1){
                                                if($dashMode[$i] == 1){ ?>
                                                    <div class="form-check mb-3"> 
                                                        <input type="checkbox" class="form-check-input" name="checkbox_light[]" value="<?= $dashSncanel[$i] ?>" onchange="checkbox_check(<?= count($data_count1) ?> ,'light')" checked>
                                                        <label class="form-check-label"><?= $dashName[$i] ?></label>
                                                    </div>
                                        <?php } } } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } if(isset($data_count0)){?>
                            <div class="col-lg-3 col-xl-3 col-sm-12 d-flex">
                                <div class="card-body border radius-10 shadow-none mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name="radio_c" id="radio_other" type="radio" onchange="ch_radio('other')">
                                        <h5>อื่นๆ</h5>
                                        <div class="form-check mb-3">
                                            <input type="checkbox" class="form-check-input" name="checkbox_all_other" onchange="checkbox_all('other')">
                                            <label class="form-check-label">เลือกทั้งหมด</label>
                                        </div>
                                        <hr/>
                                        <?php for($i=1; $i <= 40; $i++ ){
                                            if($dashStatus[$i] == 1){
                                                if($dashMode[$i] == 1){ ?>
                                                    <div class="form-check mb-3"> 
                                                        <input type="checkbox" class="form-check-input" name="checkbox_other[]" value="<?= $dashSncanel[$i] ?>" onchange="checkbox_check(<?= count($data_count1) ?> ,'other')" checked>
                                                        <label class="form-check-label"><?= $dashName[$i] ?></label>
                                                    </div>
                                        <?php } } } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- </div> -->
                </div>
                <div class="modal-footer text-right">
                    <button type="button" id="submit_select_sn_Modal" class="btn btn-success waves-light">
                    <i class="fadeIn animated bx bx-check"></i> ตกลง
                    </button>
                    <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">
                        <i class="fadeIn animated bx bx-window-close"></i> ยกเลิก
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- exit Modal_select_sn -->
</div>
<div class="tab-content">
    <div class="tab-pane fade show active" id="p-chart" role="tabpanel">
        <div id="report_chart"></div>
    </div>
    <div class="tab-pane fade" id="p-table" role="tabpanel">
        <div id="report_table"></div>
    </div>
</div>

<script>
    ch_radio('temp');
    $(".all_day").click(function() {
        $("#Modal_select_sn").modal("show");
    });
    $("#submit_select_sn_Modal").click(function() {
        var ch_value = [];
        var checked = [];
        if($("#checkbox_all_sn").prop("checked") == true){
            ch_value.push("all");
            $("input[name='checkbox_temp[]']:checked").each(function (){
                checked.push($(this).val());
            });
            $("input[name='checkbox_hum[]']:checked").each(function (){
                checked.push($(this).val());
            });
            ch_value.push(checked)
        }else{
            if ($("#radio_temp").prop('checked') == true) {
                ch_value.push("temp");
                $("input[name='checkbox_temp[]']:checked").map(function (){
                    checked.push($(this).val());
                });
                ch_value.push(checked)
            }
            if ($("#radio_hum").prop('checked') == true) {
                ch_value.push("hum");
                $("input[name='checkbox_hum[]']:checked").map(function (){
                    checked.push($(this).val());
                });
                ch_value.push(checked)
            }
            if ($("#radio_soil").prop('checked') == true) {
                ch_value.push("soil");
                $("input[name='checkbox_soil[]']:checked").map(function (){
                    checked.push($(this).val());
                });
                ch_value.push(checked)
            }
            if ($("#radio_light").prop('checked') == true) {
                ch_value.push("light");
                $("input[name='checkbox_light[]']:checked").map(function (){
                    checked.push($(this).val());
                });
                ch_value.push(checked)
            }
            if ($("#radio_other").prop('checked') == true) {
                ch_value.push("other");
                $("input[name='checkbox_other[]']:checked").map(function (){
                    checked.push($(this).val());
                });
                ch_value.push(checked)
            }
        }
        if (checked.length == 0) {
            Swal({
                type: "warning",
                title: "กรุณาเลือกเซ็นเซอร์",
                // html: text,
                allowOutsideClick: false
            });
            return false;
        }
        console.log(ch_value)
        // alert(checked);
    });
    function ch_radio(){
        if ($("#radio_temp").prop('checked') == true) {
            $("input[name='checkbox_temp[]']").attr("disabled", false).prop( "checked", true );
            $("input[name='checkbox_all_temp']").attr("disabled", false).prop( "checked", true );
        }else{
            $("input[name='checkbox_temp[]']").attr("disabled", true).prop( "checked", false );
            $("input[name='checkbox_all_temp']").attr("disabled", true).prop( "checked", false );
        }
        if ($("#radio_hum").prop('checked') == true) {
            $("input[name='checkbox_hum[]']").attr("disabled", false).prop( "checked", true );
            $("input[name='checkbox_all_hum']").attr("disabled", false).prop( "checked", true );
        }else{
            $("input[name='checkbox_hum[]']").attr("disabled", true).prop( "checked", false );
            $("input[name='checkbox_all_hum']").attr("disabled", true).prop( "checked", false );
        }
        if ($("#radio_soil").prop('checked') == true) {
            $("input[name='checkbox_soil[]']").attr("disabled", false).prop( "checked", true );
            $("input[name='checkbox_all_soil']").attr("disabled", false).prop( "checked", true );
        }else{
            $("input[name='checkbox_soil[]']").attr("disabled", true).prop( "checked", false );
            $("input[name='checkbox_all_soil']").attr("disabled", true).prop( "checked", false );
        }
        if ($("#radio_light").prop('checked') == true) {
            $("input[name='checkbox_light[]']").attr("disabled", false).prop( "checked", true );
            $("input[name='checkbox_all_light']").attr("disabled", false).prop( "checked", true );
        }else{
            $("input[name='checkbox_light[]']").attr("disabled", true).prop( "checked", false );
            $("input[name='checkbox_all_light']").attr("disabled", true).prop( "checked", false );
        }
        if ($("#radio_other").prop('checked') == true) {
            $("input[name='checkbox_other[]']").attr("disabled", false).prop( "checked", true );
            $("input[name='checkbox_all_other']").attr("disabled", false).prop( "checked", true );
        }else{
            $("input[name='checkbox_other[]']").attr("disabled", true).prop( "checked", false );
            $("input[name='checkbox_all_other']").attr("disabled", true).prop( "checked", false );
        }
    }
    $("#checkbox_all_sn").change(function () { 
        if($(this).prop( "checked") == true){
            $("#radio_temp").attr("disabled", true);
            $("#radio_hum").attr("disabled", true);
            $("#radio_light").attr("disabled", true);
            $("#radio_soil").attr("disabled", true);
            $("#radio_other").attr("disabled", true);
            $("input[name='checkbox_temp[]']").attr("disabled", false).prop( "checked", true );
            $("input[name='checkbox_all_temp']").attr("disabled", false).prop( "checked", true );
            $("input[name='checkbox_hum[]']").attr("disabled", false).prop( "checked", true );
            $("input[name='checkbox_all_hum']").attr("disabled", false).prop( "checked", true );
            $("input[name='checkbox_light[]']").attr("disabled", false).prop( "checked", true );
            $("input[name='checkbox_all_light']").attr("disabled", false).prop( "checked", true );
            $("input[name='checkbox_soil[]']").attr("disabled", false).prop( "checked", true );
            $("input[name='checkbox_all_soil']").attr("disabled", false).prop( "checked", true );
            $("input[name='checkbox_other[]']").attr("disabled", false).prop( "checked", true );
            $("input[name='checkbox_all_other']").attr("disabled", false).prop( "checked", true );   
        }else{
            $("#radio_temp").attr("disabled", false);
            $("#radio_hum").attr("disabled", false);
            $("#radio_light").attr("disabled", false);
            $("#radio_soil").attr("disabled", false);
            $("#radio_other").attr("disabled", false);
            if ($("#radio_temp").prop('checked') == true) {ch_radio('temp');}
            if ($("#radio_hum").prop('checked') == true) {ch_radio('hum');}
            if ($("#radio_light").prop('checked') == true) {ch_radio('light');}
            if ($("#radio_soil").prop('checked') == true) {ch_radio('soil');}
            if ($("#radio_other").prop('checked') == true) {ch_radio('other');}
        }
    });
    function checkbox_all(val){
        // $("input[name='checkbox_"+ val.value+"[]']").attr("disabled", false);
        // alert(val.prop('checked'));
        
        if ($("input[name='checkbox_all_"+val+"']").prop('checked') == true) {
            $("input[name='checkbox_"+ val+"[]']").prop( "checked", true );
        }else{
            $("input[name='checkbox_"+ val+"[]']").prop( "checked", false );
        }
    }
    function checkbox_check(count,mode){
        var count_ch = [];
        $("input[name='checkbox_"+mode+"[]']:checked").map(function (){
            count_ch.push($(this).val());
        });//
        // alert(mode)
        if(count_ch.length === count){
            $("input[name='checkbox_all_"+mode+"']").prop( "checked", true );
        }else{
            $("input[name='checkbox_all_"+mode+"']").prop( "checked", false );
        }
        // alert("cl "+count_ch.length+" +all "+count)
    }
    </script>