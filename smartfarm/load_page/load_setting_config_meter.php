<?php
session_start();
require '../config_db/connectdb.php';

$house_master = $_GET["house_master"];
if($house_master != "0"){
    // --------------------------------------------
    $row1 = $dbcon->query("SELECT * from tb3_meter_status  WHERE meter_status_sn = '$house_master' ORDER BY meter_status_id DESC LIMIT 1")->fetch();
    
    $row2 = $dbcon->query("SELECT * from tb3_meter_chenal_mode WHERE meter_chenal_mode_sn = '$house_master' ORDER BY meter_chenal_mode_id DESC LIMIT 1")->fetch();
?>
    <div class="row">
        <?php for ($i = 1; $i <= 8; $i++) { 
            $sn_sn = $row2[$i + 11];
            $sn_row = $dbcon->query("SELECT * from tb_sensor  WHERE sensor_id = '$sn_sn' ")->fetch();
        ?>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="dashboard m-b-20">
                    <div class="card-body">
                        <h3 class="card-title">
                            <B class="text-dark">Meter Chanel <?= $i ?></B>
                        </h3>
                        <div class="form-body">
                        <div class="row">
                                <div class="col-md-5">
                                    <label class="form-control">แสดง </label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group has-icon-left">
                                        <select class="form-control" disabled value="<?= $row1[$i + 3] ?>">
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
                                        <div class="position-relative">
                                            <input type="text" class="form-control" disabled value="<?= $row1[$i + 11] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="form-control">ช่องเซนเซอร์ </label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group has-icon-left">
                                        <input type="text" class="form-control" disabled value="<?= $row2[$i + 3] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h4>Sensor : <?= $sn_row["sensor_name"] ?></h4>
                                <div class="row">
                                    <img class="col-7" src="dist/images/Sensor/<?= $sn_row['sensor_imgNor'] ?>" width="50" alt="...">
                                    <div class="col m-t-25"><?= $sn_row["sensor_unit"] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php }else{echo "";} ?>