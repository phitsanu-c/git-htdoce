<?php
    session_start();
    require "../../config_db/connectdb.php";
    // $house_siteID = $_SESSION["site_id"];
    // $houseID = $_SESSION["house_id"];
    $house_master = $_POST["house_master"]; // $_SESSION["house_master"];
    $status = $_POST["status"];
    if ($status == "day") {
        $start_day = date("Y/m/d - H:i:s", strtotime('-1 day'));
        $stop_day = date("Y/m/d - H:i:ss");
    } elseif ($status == "week") {
        $start_day = date("Y/m/d - H:i:s", strtotime('-7 day'));
        $stop_day = date("Y/m/d - H:i:ss");
    } elseif ($status == "month") {
        $start_day = date("Y/m/d - H:i:s", strtotime('-30 day'));
        $stop_day = date("Y/m/d - H:i:ss");
    } elseif ($status == "formto") {
        $start_day = $_POST["start"];
        $stop_day = $_POST["stop"];
    }

    $cannel =  $_POST["canel"];
    $mode =  $_POST["mode"];
    if($mode != ""){
        $stmt_s = $dbcon->prepare("SELECT * from tb_sensor  WHERE sensor_id = '$mode' ");
        $stmt_s->execute();
        $row_s = $stmt_s->fetch();
        if ($mode == 4 || $mode == 5) {
            if($house_master == "KMUMT001"){
                $new_sncanel  = $cannel;
            }else{
                $new_sncanel  = $cannel . "/1000";
            }
        } elseif ($mode == 6 || $mode == 7) {
            if($house_master == "KMUMT001"){
                $new_sncanel  = $cannel;
            }else{
                $new_sncanel  = $cannel . "/54";
            }
        } else {
            $new_sncanel  = $cannel;
        }
        if ($row_s["sensor_unit"] == 1) {
            $unit = "℃";
        } elseif ($row_s["sensor_unit"] == "Lux") {
            $unit = "Klux";
        } else {
            $unit = $row_s["sensor_unit"];
        }
    }else{
        $new_sncanel  = $cannel;
    }
?>
<style>
    .floatRight {
        float: right;
    }

    .clear {
        clear: both;
    }
</style>
<div class="table-responsive m-t-10">
    <table id="table_exp2" class="cell-border" width="100%">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Timestamp</th>
                <th class="text-center">Date</th>
                <th class="text-center">Time</th>
                <th class="text-center th_11"><?php if($mode != ""){ echo $_POST["name"] . " (" . $unit . ")"; }else{ echo $_POST["name"];} ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $i = 1;
                if($_POST["sel_time"] == 2){ // ทุก 5 นาที
                    $sql = "SELECT data_date, data_time,
                            round($new_sncanel, 1) AS new_data
                            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' AND mod(minute(`data_time`),5) = 0
                            ORDER BY data_timestamp "; 
                }else if($_POST["sel_time"] == 3){ // ทุก 10 นาที
                    $sql = "SELECT data_date, data_time,
                            round($new_sncanel, 1) AS new_data
                            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' AND mod(minute(`data_time`),10) = 0
                            ORDER BY data_timestamp "; 
                }else if($_POST["sel_time"] == 4){ // ทุก 15 นาที
                    $sql = "SELECT data_date, data_time,
                            round($new_sncanel, 1) AS new_data
                            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' AND mod(minute(`data_time`),15) = 0
                            ORDER BY data_timestamp "; 
                }else if($_POST["sel_time"] == 5){ // ทุก 10 นาที
                    $sql = "SELECT data_date, data_time,
                            round($new_sncanel, 1) AS new_data
                            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' AND mod(minute(`data_time`),30) = 0
                            ORDER BY data_timestamp "; 
                }else if($_POST["sel_time"] == 6){ // ทุก 10 นาที
                    $sql = "SELECT data_date, data_time,
                            round($new_sncanel, 1) AS new_data
                            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' AND mod(minute(`data_time`),60) = 0
                            ORDER BY data_timestamp "; 
                }else{
                    $sql = "SELECT data_date, data_time,
                            round($new_sncanel, 1) AS new_data
                            FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' 
                            ORDER BY data_timestamp "; // AND DataST1_1 > 0 
                }
                $stmt = $dbcon->prepare($sql);
                $stmt->execute();
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
            while ($row = $stmt->fetch(PDO::FETCH_BOTH)) { ?>
                <tr>
                    <td class="text-center"><?= $i ?></td>
                    <td class="text-center"><?= $row["data_date"].' - '.substr($row["data_time"], 0, 5) ?></td>
                    <td class="text-center"><?= $row["data_date"] ?></td>
                    <td class="text-center"><?= substr($row["data_time"], 0, 5) ?></td>
                    <td class="text-center"> 
                        <?php 
                            if($mode != ""){ 
                                echo $row["new_data"]; 
                            }else{
                                if($row["new_data"] <= 45){
                                    echo "เหนือ";
                                }elseif($row["new_data"] <= 90 && $row["new_data"] > 45){
                                    echo "ตะวันออกเฉียงเหนือ";
                                }elseif($row["new_data"] <= 135 && $row["new_data"] > 90){
                                    echo "ตะวันออก";
                                }elseif($row["new_data"] <= 180 && $row["new_data"] > 135){
                                    echo "ตะวันออกเฉียงใต้";
                                }elseif($row["new_data"] <= 225 && $row["new_data"] > 180){
                                    echo "ใต้";
                                }elseif($row["new_data"] <= 270 && $row["new_data"] > 225){
                                    echo "ตะวันตกเฉียงใต้";
                                }elseif($row["new_data"] <= 315 && $row["new_data"] > 270){
                                    echo "ตะวันตก";
                                }else if($row["new_data"] > 315){
                                    echo "ตะวันตกเฉียงเหนือ";
                                }
                            }
                        ?> 
                    </td>
                </tr><?php $i++;
                    } ?>
        </tbody>
    </table>
</div>
<script>
    $('#table_exp2').DataTable({
        // "columnDefs": [{
        //         "visible": false,
        //         "targets": 2
        //     }],
        //     "ordering": false,

        "scrollY": "400px",
        "scrollX": true,
        "scrollCollapse": true,
        "paging": false,
        "searching": false,
        "columnDefs": [
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            }
        ],
        "order": [
            [0, "desc"]
        ],
        dom: '<"floatRight"B><"clear">frtip',
        buttons: [
            //  'csv',
            {
                text: 'Export csv',
                title: "Smart Farm Data Sensor",
                charset: 'utf-8',
                extension: '.csv',
                extend: 'csv',
                // fieldSeparator: ';',
                // fieldBoundary: '',
                filename: 'export_smart_farm',
                // className: 'btn-info',
                bom: true
            }
        ]
    });
</script>

<?php $dbconn = null; ?>