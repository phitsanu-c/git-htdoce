<?php
session_start();
require '../config_db/connectdb.php';
$house_master = $_POST["house_master"];
// echo $house_master;
$stmtc = $dbcon->prepare("SELECT * from tb3_controlstatus  WHERE controlstatus_sn = '$house_master' ");
$stmtc->execute();
$rowc = $stmtc->fetch();

$stmt1 = $dbcon->prepare("SELECT * from tb3_conttrolname  WHERE conttrolname_sn = '$house_master' ");
$stmt1->execute();
$row1 = $stmt1->fetch();
?>

<div class="table-responsive m-t-10">
    <!-- <table id="table_exp" class="table table-striped table-bordered" cellspacing="0" width="100%"> -->
    <table id="table_exp" class="cell-border" width="100%">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Date </th>
                <th class="text-center">Time</th>
                <th class="text-center">User</th>
                <th class="text-center">Mode</th>
                <?php 
                    if($rowc["controlstatus_1"] == 1){echo '<th class="text-center">'.$row1["conttrolname_1"].'</th>';}
                    if($rowc["controlstatus_2"] == 1){echo '<th class="text-center">'.$row1["conttrolname_2"].'</th>';} 
                    if($rowc["controlstatus_3"] == 1){echo '<th class="text-center">'.$row1["conttrolname_3"].'</th>';} 
                    if($rowc["controlstatus_4"] == 1){echo '<th class="text-center">'.$row1["conttrolname_4"].'</th>';} 
                    if($rowc["controlstatus_5"] == 1){echo '<th class="text-center">'.$row1["conttrolname_5"].'</th>';} 
                    if($rowc["controlstatus_6"] == 1){echo '<th class="text-center">'.$row1["conttrolname_6"].'</th>';} 
                    if($rowc["controlstatus_7"] == 1){echo '<th class="text-center">'.$row1["conttrolname_7"].'</th>';} 
                    if($rowc["controlstatus_8"] == 1){echo '<th class="text-center">'.$row1["conttrolname_8"].'</th>';} 
                    if($rowc["controlstatus_9"] == 1){echo '<th class="text-center">'.$row1["conttrolname_9"].'</th>';} 
                    if($rowc["controlstatus_10"] == 1){echo '<th class="text-center">'.$row1["conttrolname_10"].'</th>';} 
                    if($rowc["controlstatus_11"] == 1){echo '<th class="text-center">'.$row1["conttrolname_11"].'</th>';} 
                    if($rowc["controlstatus_12"] == 1){echo '<th class="text-center">'.$row1["conttrolname_12"].'</th>';}  
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                
                $sql = "SELECT * FROM `tb3_control` WHERE `control_sn` = '$house_master' ORDER BY control_timestamp DESC Limit 500";
                $stmt = $dbcon->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                    echo '<tr>
                            <td class="text-center">'. $i .'</td>
                            <td class="text-center">'. date_format( date_create( substr($row["control_timestamp"], 0, 10) ), 'Y/m/d' ).'</td>
                            <td class="text-center">'. date_format( date_create(substr($row["control_timestamp"], 10) ), 'H:i:s' ).'</td>
                            <td class="text-center">'. $row["control_user"] .'</td>
                            <td class="text-center">'. $row["control_mode"] .'</td>';
                            if($rowc["controlstatus_1"] == 1){echo '<td class="text-center">'.$row["control_dripper_1"].'</td>';}
                            if($rowc["controlstatus_2"] == 1){echo '<td class="text-center">'.$row["control_dripper_2"].'</td>';}
                            if($rowc["controlstatus_3"] == 1){echo '<td class="text-center">'.$row["control_dripper_3"].'</td>';}
                            if($rowc["controlstatus_4"] == 1){echo '<td class="text-center">'.$row["control_dripper_4"].'</td>';}
                            if($rowc["controlstatus_5"] == 1){echo '<td class="text-center">'.$row["control_dripper_5"].'</td>';}
                            if($rowc["controlstatus_6"] == 1){echo '<td class="text-center">'.$row["control_dripper_6"].'</td>';}
                            if($rowc["controlstatus_7"] == 1){echo '<td class="text-center">'.$row["control_dripper_7"].'</td>';}
                            if($rowc["controlstatus_8"] == 1){echo '<td class="text-center">'.$row["control_dripper_8"].'</td>';}
                            if($rowc["controlstatus_9"] == 1){echo '<td class="text-center">'.$row["control_foggy"].'</td>';}
                            if($rowc["controlstatus_10"] == 1){echo '<td class="text-center">'.$row["control_fan"].'</td>';}
                            if($rowc["controlstatus_11"] == 1){echo '<td class="text-center">'.$row["control_shader"].'</td>';}
                            if($rowc["controlstatus_12"] == 1){echo '<td class="text-center">'.$row["control_fertilizer"].'</td>';}
                    echo '</tr>';
                    $i++;
                } 
            ?>
        </tbody>
    </table>
</div>

<script>
    $('#table_exp').DataTable({
        // "scrollY": "400px",
        // "scrollX": true,
        // "scrollCollapse": true,
        // "paging": false,
        // "searching": false,
        // "order": [
        //     [0, "desc"]
        // ],
        
        // "scrollY":  "400px",
            "scrollX": true,
            "scrollCollapse": false,
            "paging":         false,
            "searching": false,

        // "scrollY": "400px",
        // "scrollX": true,
        // "scrollCollapse": true,
        // "paging": false,
        // "searching": false,
        "order": [
            [0, "asc"]
        ],
        // autoWidth: false,
        // fixedColumns: true,
        // "autoWidth": false,
        // columnDefs: [{
        //     targets: [ 1 ]
        // }]
    });
</script>