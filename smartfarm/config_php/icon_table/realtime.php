<?php
    session_start();
    require "../../config_db/connectdb.php";
    // $house_siteID = $_SESSION["site_id"];
    // $houseID = $_SESSION["house_id"];
    $house_master = $_POST["house_master"]; // $_SESSION["house_master"];
    $start_day = date("Y/m/d - H:i:ss",strtotime('-1 day'));
    $stop_day = date("Y/m/d - H:i:ss");
    $cannel =  $_POST["canel"];
    $mode =  $_POST["mode"];
    
    $stmt_s= $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$mode' ");
    $stmt_s->execute();
    $row_s = $stmt_s->fetch();

    if($mode == 4 || $mode == 5){
        $new_sncanel  = $cannel."/1000";
    }elseif($mode == 6 || $mode == 7){
        $new_sncanel  = $cannel."/54";
    }else{
        $new_sncanel  = $cannel;
    }
    if($row_s["sensor_unit"] == 1){ 
        $unit = "℃"; 
    }elseif($row_s["sensor_unit"] == "Lux"){
        $unit = "Klux";
    }else{
        $unit= $row_s["sensor_unit"];
    }

?>
    <div class="table-responsive m-t-10">
        <table id="table_realtime" class="table nowrap table-bordered " width="100%">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Time</th>
                    <th class="text-center th_11"><?= $_POST["name"]." (".$unit.")" ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    try{
                        $i = 1;
                        $sql = "SELECT data_date, data_time,
                                round($new_sncanel, 1) AS new_data
                        FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                                            ORDER BY data_timestamp"; // AND DataST1_1 > 0 
                        $stmt = $dbcon->prepare($sql);
                        $stmt->execute();
                    }catch(Exception $ex){
                        echo $ex->getMessage();
                    }
                    while($row = $stmt->fetch(PDO::FETCH_BOTH)){ ?>                  
                <tr>
                    <td class="text-center" ><?=$i?></td>
                    <td class="text-center"><?= $row["data_date"] ?></td>
                    <td class="text-center"><?= substr($row["data_time"],0 ,5)?></td>
                    <td class="text-center"> <?= $row["new_data"] ?> </td>
                </tr><?php $i++;} ?>
            </tbody>
        </table>
    </div>
    <script>
        $('#table_realtime').DataTable( {
            // "columnDefs": [{
            //         "visible": false,
            //         "targets": 2
            //     }],
            //     "ordering": false,

            "scrollY":  "400px",
            "scrollX": true,
            "scrollCollapse": true,
            "paging":         false,
            "searching": false,
            "order": [[ 0, "desc" ]]
        });
    </script>

    <?php $dbconn = null; ?>
    
    