<?php
session_start();
require '../config_db/connectdb.php';

$house_master = $_GET["house_master"];
if($house_master != "0"){
    // ---------------------------------------------------------
    $row1 = $dbcon->query("SELECT * from tb3_controlstatus  WHERE controlstatus_sn = '$house_master' ")->fetch();
    $row2 = $dbcon->query("SELECT * from tb3_conttrolname WHERE conttrolname_sn = '$house_master' ")->fetch();
    $row3 = $dbcon->query("SELECT * from tb3_controlcanel WHERE controlcanel_sn = '$house_master'")->fetch();

?>
    <div class="row">
    <?php for ($i = 1; $i <= 12; $i++) { 
        $load_id = $row3[$i + 3];
        $load_row = $dbcon->query("SELECT * from tb_loard  WHERE loard_id  = '$load_id' ")->fetch();
    ?>
        <div class="col-xl-3 col-md-6 col-sm-12">
            <div class="dashboard m-b-20">
                <div class="card-body">
                    <h3 class="card-title">
                        <B class="text-dark">Control Chanel <?= $i ?></B>
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
                                        <input type="text" class="form-control" disabled value="<?= $row2[$i + 3] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h4>Load : <?= $load_row["loard_name"] ?></h4>
                            <div class="row text-center">
                                <img class="col" src="dist/images/control/<?= $load_row['loard_imgOn'] ?>" width="100"  height="100" alt="...">
                                <img class="col" src="dist/images/control/<?= $load_row['loard_imgOff'] ?>" width="100"  height="100" alt="...">
                                <?php 
                                    if($load_row['loard_img2'] != ""){ 
                                        echo '<br><img class="col" src="dist/images/control/'. $load_row['loard_img2'] .'" width="50"  height="50" alt="...">'; 
                                    }
                                    if($load_row['loard_img3'] != ""){ 
                                        echo '<img class="col" src="dist/images/control/'. $load_row['loard_img3'] .'" width="50"  height="50" alt="...">'; 
                                    }
                                    if($load_row['loard_img4'] != ""){ 
                                        echo '<br><img class="col" src="dist/images/control/'. $load_row['loard_img4'] .'" width="50"  height="50" alt="...">'; 
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
<?php }else{echo "";} ?>