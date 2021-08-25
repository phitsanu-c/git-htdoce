<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> -->
<?php
    require "connectdb.php";
    $house_master = $_POST["house_master"];
    $ch_value = $_POST["ch_value"];
    if ($_POST["mode"] == 'day') {
        $start_day = date("Y/m/d - H:i:s", strtotime('-1 day'));
        $stop_day = date("Y/m/d - H:i:s");
    } else if ($_POST["mode"] == 'week') {
        $start_day = date("Y/m/d - H:i:s", strtotime('-7 day'));
        $stop_day = date("Y/m/d - H:i:s");
    } else if ($_POST["mode"] == 'month') {
        $start_day = date("Y/m/d - H:i:s", strtotime('-30 day'));
        $stop_day = date("Y/m/d - H:i:s");
    } else if ($_POST["mode"] == 'from_to') {
        $start_day = $_POST["val_start"].':00';
        $stop_day = $_POST["val_end"].':00';
    }
    $data_channel = [];
    for($i=0; $i < count($ch_value[3]); $i++){
        if ($ch_value[3][$i] == 4 || $ch_value[3][$i] == 5) {
            $data_channel[] = 'round('.$ch_value[1][$i].'/1000, 1) AS data_cn'.($i+1);
        } elseif ($ch_value[3][$i] == 6 || $ch_value[3][$i] == 7) {
            $data_channel[] = 'round('.$ch_value[1][$i].'/54, 1) AS data_cn'.($i+1);
        } else {
            $data_channel[] = 'round('.$ch_value[1][$i].', 1) AS data_cn'.($i+1);
        }
    }
    // echo json_encode($data_channel);
    $sting_channrl = implode(", ",$data_channel);
    // echo $sting_channrl;
    // echo count($ch_value[1]);
    // echo $ch_value[3][0];
    // exit();
    // echo $a;
?>
<div class="table-responsive m-t-10">
    <table id="example" class="cell-border" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">วัน-เวลา</th>
                <th class="text-center">วัน</th>
                <th class="text-center">เวลา</th>
                <?php for($i=0; $i<count($ch_value[3]); $i++ ){
                    echo '<th class="text-center">'.$ch_value[2][$i].'</th>';
                }?>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                $sql = "SELECT data_timestamp, $sting_channrl
                FROM tb_data_sensor WHERE data_sn = '$house_master' AND data_timestamp BETWEEN '$start_day' AND '$stop_day' AND mod(minute(`data_time`),5) = 0
                            ORDER BY data_timestamp ";
                $stmt = $dbcon->query($sql);
                $data0 = [];
                $j=count($ch_value[3]);
                while ($row = $stmt->fetch()) {
                    echo '<tr>
                        <td class="text-center">'.$i.'</td>
                        <td class="text-center">'.substr($row['data_timestamp'], 0 ,18).'</td>
                        <td class="text-center">'.substr($row['data_timestamp'], 0 ,10).'</td>
                        <td class="text-center">'.substr($row['data_timestamp'], 13 ,18).'</td>
                        <td class="text-center">'.$row[3].'</td>';
                        if($j >= 2){echo '<td class="text-center">'.$row[2].'</td>';}
                        if($j >= 3){echo '<td class="text-center">'.$row[3].'</td>';}
                        if($j >= 4){echo '<td class="text-center">'.$row[4].'</td>';}
                        if($j >= 5){echo '<td class="text-center">'.$row[5].'</td>';}
                        if($j >= 6){echo '<td class="text-center">'.$row[6].'</td>';}
                        if($j >= 7){echo '<td class="text-center">'.$row[7].'</td>';}
                        if($j >= 8){echo '<td class="text-center">'.$row[8].'</td>';}
                        if($j >= 9){echo '<td class="text-center">'.$row[9].'</td>';}
                        if($j >= 10){echo '<td class="text-center">'.$row[10].'</td>';}
                        if($j >= 11){echo '<td class="text-center">'.$row[11].'</td>';}
                        if($j >= 12){echo '<td class="text-center">'.$row[12].'</td>';}
                        if($j >= 13){echo '<td class="text-center">'.$row[13].'</td>';}
                        if($j >= 14){echo '<td class="text-center">'.$row[14].'</td>';}
                        if($j >= 15){echo '<td class="text-center">'.$row[15].'</td>';}
                        if($j >= 16){echo '<td class="text-center">'.$row[16].'</td>';}
                        if($j >= 17){echo '<td class="text-center">'.$row[17].'</td>';}
                        if($j >= 18){echo '<td class="text-center">'.$row[18].'</td>';}
                        if($j >= 19){echo '<td class="text-center">'.$row[19].'</td>';}
                        if($j >= 20){echo '<td class="text-center">'.$row[20].'</td>';}
                        if($j >= 21){echo '<td class="text-center">'.$row[21].'</td>';}
                        if($j >= 22){echo '<td class="text-center">'.$row[22].'</td>';}
                        if($j >= 23){echo '<td class="text-center">'.$row[23].'</td>';}
                        if($j >= 24){echo '<td class="text-center">'.$row[24].'</td>';}
                        if($j >= 25){echo '<td class="text-center">'.$row[25].'</td>';}
                        if($j >= 26){echo '<td class="text-center">'.$row[26].'</td>';}
                        if($j >= 27){echo '<td class="text-center">'.$row[27].'</td>';}
                        if($j >= 28){echo '<td class="text-center">'.$row[28].'</td>';}
                        if($j >= 29){echo '<td class="text-center">'.$row[29].'</td>';}
                        if($j >= 30){echo '<td class="text-center">'.$row[30].'</td>';}
                        if($j >= 31){echo '<td class="text-center">'.$row[31].'</td>';}
                        if($j >= 32){echo '<td class="text-center">'.$row[32].'</td>';}
                        if($j >= 33){echo '<td class="text-center">'.$row[33].'</td>';}
                        if($j >= 34){echo '<td class="text-center">'.$row[34].'</td>';}
                        if($j >= 35){echo '<td class="text-center">'.$row[35].'</td>';}
                        if($j >= 36){echo '<td class="text-center">'.$row[36].'</td>';}
                        if($j >= 37){echo '<td class="text-center">'.$row[37].'</td>';}
                        if($j >= 38){echo '<td class="text-center">'.$row[38].'</td>';}
                        if($j >= 39){echo '<td class="text-center">'.$row[39].'</td>';}
                        if($j >= 40){echo '<td class="text-center">'.$row[40].'</td>';}
                    echo '</tr>';
                $i++;
                }?>
        </tbody>
        <!-- <tfoot>
            <tr>
                <th>#</th>
                <th>วัน-เวลา</th>
                <th>วัน</th>
                <th>เวลา</th>
                <?php 
                    // for($i=0; $i<count($ch_value[3]); $i++ ){
                    //     echo '<th>'.$ch_value[2][$i].'</th>';
                    // }
                ?>
            </tr>
        </tfoot> -->
    </table>
</div>
    <script>
        var currentdate = new Date(); 
        var datetime = currentdate.getFullYear() + "-"
                    + (currentdate.getMonth()+1)  + "-" 
                    + currentdate.getDate() + "_"  
                    + currentdate.getHours() + "."  
                    + currentdate.getMinutes(); //+ ":" 
                    // + currentdate.getSeconds();
        $('#example').DataTable( {
            "scrollY": 200,
            "scrollX": true,
            "scrollCollapse": false,
            "paging":    false,
            "searching": false,
            "order": [
                [0, "desc"]
            ],
            "columnDefs": [
                {
                "targets": [ 1 ],
                // render: $.fn.dataTable.render.moment( 'X', 'YYYY/MM/DD' ),
                // "render": $.fn.dataTable.render.moment( 'YYYY/MM/DD' ),
                "visible": false,
                "searchable": false
                },
                
            ],
            dom: '<"floatRight"B><"clear">frtip',
            buttons: [
                //  'csv',
                {
                    text: 'Export csv',
                    title: "Smart Farm Data Sensor",
                    charset: 'utf-8',
                    extension: '.csv',
                    // exportOptions: {
                    //    columns: [ 0, 2, 5 ]
                    // },
                    extend: 'csv',
                    format: 'YYYY/MM/dd',
                    // fieldSeparator: ';',
                    // fieldBoundary: '',
                    filename: 'smart_farm_'+datetime,
                    // className: 'btn-info',
                    bom: true
                }
            ]
        });
    </script>