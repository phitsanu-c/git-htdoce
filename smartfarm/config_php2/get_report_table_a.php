<?php
session_start();
require '../config_db/connectdb.php';
$house_master = $_POST["house_master"];
$chanel = $_POST["chanel"];

// $stmtc = $dbcon->prepare("SELECT * from tb3_controlstatus  WHERE controlstatus_sn = '$house_master' ");
// $stmtc->execute();
// $rowc = $stmtc->fetch();

// $stmt1 = $dbcon->prepare("SELECT * from tb3_conttrolname  WHERE conttrolname_sn = '$house_master' ");
// $stmt1->execute();
// $row1 = $stmt1->fetch();
?>

<div class="table-responsive m-t-10">
    <!-- <table id="table_exp" class="table table-striped table-bordered" cellspacing="0" width="100%"> -->
    <table id="table_exp2" class="cell-border" width="100%">
        <thead>
            <tr>
                <th rowspan="2" class="text-center">#</th>
                <th rowspan="2" class="text-center">Date </th>
                <th rowspan="2" class="text-center">Time</th>
                <th rowspan="2" class="text-center">User</th>
                <th colspan="2" class="text-center">Timer 1</th>
                <th colspan="2" class="text-center">Timer 2</th>
                <th colspan="2" class="text-center">Timer 3</th>
                <th colspan="2" class="text-center">Timer 4</th>
                <th colspan="2" class="text-center">Timer 5</th>
                <th colspan="2" class="text-center">Timer 6</th>
            </tr>
            <tr>
                <th class="text-center" > Start </th>
                <th class="text-center" > End</th>
                <th class="text-center" > Start </th>
                <th class="text-center" > End</th>
                <th class="text-center" > Start </th>
                <th class="text-center" > End</th>
                <th class="text-center" > Start </th>
                <th class="text-center" > End</th>
                <th class="text-center" > Start </th>
                <th class="text-center" > End</th>
                <th class="text-center" > Start </th>
                <th class="text-center" > End</th>
            </tr>
        </thead>
        <tbody>
            <?php
                try {
                    $i = 1;
                    $tb = "tb3_load_".$chanel;
                    $sn = "load_".$chanel."_sn";
                    $timestamp = "load_.$chanel._timestamp";
                    $sql = "SELECT * FROM `$tb` WHERE `$sn` = '$house_master' ORDER BY '$timestamp' DESC";
                    $stmt = $dbcon->prepare($sql);
                    $stmt->execute();
                } catch (Exception $ex) {
                    echo $ex->getMessage();
                }
                while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                    echo '<tr>
                            <td class="text-center">'. $i .'</td>
                            <td class="text-center">'. date_format( date_create( substr($row[1], 0, 10) ), 'Y/m/d' ).'</td>
                            <td class="text-center">'. substr($row[1], 10) .'</td>
                            <td class="text-center">'. $row[5] .'</td>';
                            if($row[6] == 0){echo '<td class="text-center">-</td><td class="text-center">-</td>';}
                            else{echo '<td class="text-center">'. $row[12] .'</td><td class="text-center">'. $row[18] .'</td>';}
                            if($row[7] == 0){echo '<td class="text-center">-</td><td class="text-center">-</td>';}
                            else{echo '<td class="text-center">'. $row[13] .'</td><td class="text-center">'. $row[19] .'</td>';}
                            if($row[8] == 0){echo '<td class="text-center">-</td><td class="text-center">-</td>';}
                            else{echo '<td class="text-center">'. $row[14] .'</td><td class="text-center">'. $row[20] .'</td>';}
                            if($row[9] == 0){echo '<td class="text-center">-</td><td class="text-center">-</td>';}
                            else{echo '<td class="text-center">'. $row[15] .'</td><td class="text-center">'. $row[21] .'</td>';}
                            if($row[10] == 0){echo '<td class="text-center">-</td><td class="text-center">-</td>';}
                            else{echo '<td class="text-center">'. $row[16] .'</td><td class="text-center">'. $row[22] .'</td>';}
                            if($row[11] == 0){echo '<td class="text-center">-</td><td class="text-center">-</td>';}
                            else{echo '<td class="text-center">'. $row[17] .'</td><td class="text-center">'. $row[23] .'</td>';}
                    echo '</tr>';
                    $i++;
                } 
            ?>
        </tbody>
    </table>
</div>

<script>
    $('#table_exp2').DataTable({
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
            "scrollCollapse": true,
            "paging":         false,
            "searching": false,

        // "scrollY": "400px",
        // "scrollX": true,
        // "scrollCollapse": true,
        // "paging": false,
        // "searching": false,
        "order": [
            [0, "desc"]
        ],
        // autoWidth: false,
        // fixedColumns: true,
        // "autoWidth": false,
        // columnDefs: [{
        //     targets: [ 1 ]
        // }]
    });
</script>