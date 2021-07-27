<?php
session_start();
require '../config_db/connectdb.php';

$house_master = $_GET["house_master"];
if($house_master != "0"){
    
    $stmt3 = $dbcon->prepare("SELECT * from tb3_statussn  WHERE statussn_sn = '$house_master' ");
    $stmt3->execute();
    $row3 = $stmt3->fetch();

    // ---------------------------------------------------------
    $stmt5 = $dbcon->prepare("SELECT * from tb3_map_img WHERE map_sn = '$house_master' ORDER BY map_id DESC LIMIT 1");
    $stmt5->execute();
    $row5 = $stmt5->fetch();
?>
    <div class="row">
        <?php for ($i = 1; $i <= 40; $i++) { 
            $sn_sn = $row3[$i + 3];
            $sn_row = $dbcon->query("SELECT * from tb_sensor  WHERE sensor_id = '$sn_sn' ")->fetch();
            if($sn_row["sensor_unit"] == 1){
                $unit = "℃";
            }else{
                $unit = $sn_row["sensor_unit"];
            }
        ?>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="dashboard m-b-20">
                    <div class="card-body">
                        <h3 class="card-title">
                            <B class="text-dark">Chanel <?= $i ?></B>
                        </h3>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="form-control">แสดง</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group has-icon-left">
                                        <select class="form-control status_sn<?=$i?>" disabled>
                                            <option value="0">ไม่แสดง</option>
                                            <option value="1">แสดง</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="form-control">ชื่อช่อง </label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group has-icon-left">
                                        <input type="text" class="form-control sn_name<?= $i ?>" disabled >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="form-control">ช่องเซนเซอร์ </label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group has-icon-left">
                                        <input type="text" class="form-control se_chanel<?= $i ?>" disabled >
                                    </div>
                                </div>
                            </div>
                            <div class="text-center" style="border:1px solid black">
                                <div class="text-right  m-b-15 m-t-5 m-r-5">
                                    <button type="button" class="btn btn-primary btn-sm edit_chouse2" 
                                        id="<?= $row3[$i + 3] ?>" name="<?= $sn_row["sensor_name"] ?>"
                                        unit="<?= $unit ?>" img="<?= $sn_row['sensor_imgNor'] ?>"
                                        img_map="<?= $row5[$i + 3]?>"><i class="fa fa-pencil"></i> ตั้งค่า sensor</button>
                                </div>
                                <h4>Sensor : <?= $sn_row["sensor_name"] ?></h4>
                                <div class="row">
                                    <img class="col-7" src="dist/images/Sensor/<?= $sn_row['sensor_imgNor'] ?>" width="50"  height="50" alt="...">
                                    <div class="m-t-15"><?= $unit ?></div>
                                </div><br>
                                <h4>จุดติดตั้งเซนเซอร์</h4>
                                <?php if (($row5[$i + 3]) == "") { ?>
                                    <B class="text-dark">ไม่ระบุ</B>
                                <?php } else { ?>
                                    <img class="col-12" src="dist/images/img_map/<?= $row5[$i + 3]  ?>" alt="...">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <script>
        $.getJSON( "config_php/config_sensor.php?house_master=<?= $_GET['house_master'] ?>", function( data ) {
            console.log(data.house_name);
            for(var i=1; i<=40; i++){
                $(".status_sn"+i).val(data.dashstatus[3+i]);
                $(".sn_name"+i).val(data.dashname[3+i]);
                $(".se_chanel"+i).val(data.sncanel[3+i]);
            }
            $(".title_m_sn").html("ตั้งต่าโรงเรือน "+data.house_name);
        });
        $(".edit_chouse").click(function(){
            if($("#sn_T1").hasClass("active") == true){
                $("#model_config_sensor").modal("show");
            }
        });
        $(".edit_chouse2").click(function(){
            $(".sn_sensor").val($(this).attr("id"));
            $(".mo_name").html("Sensor : "+$(this).attr("name"));
            $(".mo_img").attr("src","dist/images/Sensor/"+ $(this).attr("img"));
            $(".mo_unit").html($(this).attr("unit"));
            if($(this).attr("img_map") === ""){
                $('.mo_img_map').attr("src", "dist/images/default.jpg");
            }else{
                $('.mo_img_map').attr("src", "dist/images/img_map/"+$(this).attr("img_map") );
            }
            $("#model_config_sensor2").modal("show");
        });
        $(".sn_sensor").change(function(){
            $.getJSON("config_php/config_sensor2.php?sn="+$(this).val(), function( data ) {
                $(".mo_name").html("Sensor : "+data.name);
                $(".mo_img").attr("src","dist/images/Sensor/"+data.img);
                $(".mo_unit").html(data.unit);
            });
        });
    </script>
<?php }else{echo "";} ?>

<div class="modal fade text-left" id="model_config_sensor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header custom-modal-title bg-dark">
                <b class="text-white title_m_sn"></b>
            </div>
            <div class="modal-body">
                <form method="post" id="config_sensor_form" enctype="multipart/form-data" onSubmit="return false;">
                    <?php for ($i = 1; $i <= 40; $i++) { ?>
                        <div class="row">
                            <div class="col-2">
                                <label class="">Status Chanel <?= $i ?></label>
                            </div>
                            <div class="col-2">
                                <select class="form-control status_sn<?=$i?>">
                                    <option value="0">ไม่แสดง</option>
                                    <option value="1">แสดง</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label class="">Name Chanel <?= $i ?></label>
                            </div>
                            <div class="col-2">
                                <input type="text" class="form-control sn_name<?= $i ?>" >
                            </div>
                            <div class="col-2">
                                <label class="">Chanel Data Chanel <?= $i ?></label>
                            </div>
                            <div class="col-2">
                                <select name="" class="form-control se_chanel<?= $i ?>">
                                    <option value="dataST_1_1">dataST_1_1</option>
                                    <option value="dataST_1_2">dataST_1_2</option>
                                    <option value="dataST_1_3">dataST_1_3</option>
                                    <option value="dataST_1_4">dataST_1_4</option>
                                    <option value="dataST_1_5">dataST_1_5</option>
                                    <option value="dataST_2_1">dataST_2_1</option>
                                    <option value="dataST_2_2">dataST_2_2</option>
                                    <option value="dataST_2_3">dataST_2_3</option>
                                    <option value="dataST_2_4">dataST_2_4</option>
                                    <option value="dataST_2_5">dataST_2_5</option>
                                    <option value="dataST_3_1">dataST_3_1</option>
                                    <option value="dataST_3_2">dataST_3_2</option>
                                    <option value="dataST_3_3">dataST_3_3</option>
                                    <option value="dataST_3_4">dataST_3_4</option>
                                    <option value="dataST_3_5">dataST_3_5</option>
                                    <option value="dataST_4_1">dataST_4_1</option>
                                    <option value="dataST_4_2">dataST_4_2</option>
                                    <option value="dataST_4_3">dataST_4_3</option>
                                    <option value="dataST_4_4">dataST_4_4</option>
                                    <option value="dataST_4_5">dataST_4_5</option>
                                    <option value="dataST_5_1">dataST_5_1</option>
                                    <option value="dataST_5_2">dataST_5_2</option>
                                    <option value="dataST_5_3">dataST_5_3</option>
                                    <option value="dataST_5_4">dataST_5_4</option>
                                    <option value="dataST_5_5">dataST_5_5</option>
                                    <option value="dataST_6_1">dataST_6_1</option>
                                    <option value="dataST_6_2">dataST_6_2</option>
                                    <option value="dataST_6_3">dataST_6_3</option>
                                    <option value="dataST_6_4">dataST_6_4</option>
                                    <option value="dataST_6_5">dataST_6_5</option>
                                    <option value="dataST_7_1">dataST_7_1</option>
                                    <option value="dataST_7_2">dataST_7_2</option>
                                    <option value="dataST_7_3">dataST_7_3</option>
                                    <option value="dataST_7_4">dataST_7_4</option>
                                    <option value="dataST_7_5">dataST_7_5</option>
                                    <option value="dataST_8_1">dataST_8_1</option>
                                    <option value="dataST_8_2">dataST_8_2</option>
                                    <option value="dataST_8_3">dataST_8_3</option>
                                    <option value="dataST_8_4">dataST_8_4</option>
                                    <option value="dataST_8_5">dataST_8_5</option>
                                    <option value="dataST_9_1">dataST_9_1</option>
                                    <option value="dataST_9_2">dataST_9_2</option>
                                    <option value="dataST_9_3">dataST_9_3</option>
                                    <option value="dataST_9_4">dataST_9_4</option>
                                    <option value="dataST_9_5">dataST_9_5</option>
                                    <option value="dataST_10_1">dataST_10_1</option>
                                    <option value="dataST_10_2">dataST_10_2</option>
                                    <option value="dataST_10_3">dataST_10_3</option>
                                    <option value="dataST_10_4">dataST_10_4</option>
                                    <option value="dataST_10_5">dataST_10_5</option>
                                    <option value="dataST_11_1">dataST_11_1</option>
                                    <option value="dataST_11_2">dataST_11_2</option>
                                    <option value="dataST_11_3">dataST_11_3</option>
                                    <option value="dataST_11_4">dataST_11_4</option>
                                    <option value="dataST_11_5">dataST_11_5</option>
                                    <option value="dataST_12_1">dataST_12_1</option>
                                    <option value="dataST_12_2">dataST_12_2</option>
                                    <option value="dataST_12_3">dataST_12_3</option>
                                    <option value="dataST_12_4">dataST_12_4</option>
                                    <option value="dataST_12_5">dataST_12_5</option>
                                    <option value="dataST_13_1">dataST_13_1</option>
                                    <option value="dataST_13_2">dataST_13_2</option>
                                    <option value="dataST_13_3">dataST_13_3</option>
                                    <option value="dataST_13_4">dataST_13_4</option>
                                    <option value="dataST_13_5">dataST_13_5</option>
                                    <option value="dataST_14_1">dataST_14_1</option>
                                    <option value="dataST_14_2">dataST_14_2</option>
                                    <option value="dataST_14_3">dataST_14_3</option>
                                    <option value="dataST_14_4">dataST_14_4</option>
                                    <option value="dataST_14_5">dataST_14_5</option>
                                    <option value="dataST_15_1">dataST_15_1</option>
                                    <option value="dataST_15_2">dataST_15_2</option>
                                    <option value="dataST_15_3">dataST_15_3</option>
                                    <option value="dataST_15_4">dataST_15_4</option>
                                    <option value="dataST_15_5">dataST_15_5</option>
                                </select>
                            </div>
                        </div>
                    <?php } ?>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="sumbit_config_sn">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Save
                </button>
                <button class="btn btn-danger" data-dismiss="modal">
                    <i class="fa fa-times-circle" aria-hidden="true"></i> Close
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="model_config_sensor2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header custom-modal-title bg-dark">
                <b class="text-white title_m_sn"> </b>
            </div>
            <div class="modal-body">
                <form method="post" id="config_sensor2_form" enctype="multipart/form-data" onSubmit="return false;">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>เลือก sensor <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <select name="" class="form-control sn_sensor">
                                        <?php 
                                            $stmt = $dbcon->prepare("SELECT * FROM tb_sensor");
                                            $stmt->execute();
                                            while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                                                echo '<option value="' . $row["sensor_id"] . '">' . $row["sensor_name"].' (';
                                                if($row["sensor_unit"] == 1){
                                                    echo "℃";
                                                }else{
                                                    echo $row["sensor_unit"];
                                                }
                                                echo ')</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-b-15 " style="border:1px solid black">
                            <h4 class="mo_name m-t-15"></h4>
                            <div class="row">
                                <div class="col-7 css-bar css-bar-warning text-center">
                                    <img src="" class="mo_img" width="35%">
                                </div>
                                <h4 class="mo_unit" style="margin-top: 35px;"></h4>
                                <!-- <div class="m-b-15 "></div> -->
                            </div><br>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>ภาพจุดติดตั้ง sensor</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="file" class="form-control" name="image_input" id="img_input_house" onchange="Showimg_house(this)">
                                    </div>
                                </div>
                            </div>
                        </div>   
                        <div class="text-center">
                            <img src="" class="mo_img_map mb-2" width="100%" alt="...">
                        </div> 
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="sumbit_config_sensor2_form">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Save
                </button>
                <button class="btn btn-danger" data-dismiss="modal">
                    <i class="fa fa-times-circle" aria-hidden="true"></i> Close
                </button>
            </div>
        </div>
    </div>
</div>
