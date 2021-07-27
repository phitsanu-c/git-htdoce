<?php
session_start();
require '../config_db/connectdb.php';
$user_id = $_SESSION['user_id'];
// $siteID = $_POST["siteID"];
?>

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-bordered" style="width:100%" id="table_2">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Serial Number</th>
                    <th class="text-center">Site</th>
                    <th class="text-center">House Name</th>
                    <th class="text-center">จุดติดตั้ง sensor</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // if ($_SESSION["login_status"] == 1) {
                //     $stmt = $dbcon->prepare("SELECT * FROM tb_site INNER JOIN tb_customer ON tb_site.site_user = tb_customer.customer_id ");
                // } else {
                    $stmt = $dbcon->prepare("SELECT * FROM tb2_house INNER JOIN tb2_site ON tb2_house.house_siteID = tb2_site.site_id "); //WHERE house_siteID = '$siteID' ");
                // }
                $stmt->execute();
                $count = $stmt->rowCount();

                // if($count != 0){
                $inc = 1;
                while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                    echo '<tr>
                            <td class="text-center">' . $inc . '</td>
                            <td class="text-center">' . $row["house_master"] . '</td>
                            <td class="text-center">' . $row["site_name"] . '</td>
                            <td class="text-center">' . $row["house_name"] . '</td>
                            <td class="text-center">'; if($row["house_img_map"] == ""){echo "";}else{echo '<img src="dist/images/img_map/' . $row["house_img_map"] . '" width="70"  height="50" alt="...">';} echo '</td>
                            <td  class="text-center">
                                <div class="buttons">
                                    <a href="javascript:void(0)" class="text-info edit_house" 
                                        house_id="' . $row["house_id"] . '" 
                                        house_siteID="' . $row["house_siteID"] . '" 
                                        house_sn="' . $row["house_master"] . '" 
                                        house_name="' . $row["house_name"] . '" 
                                        house_imamap="' . $row["house_img_map"] . '"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="text-danger delete_device" 
                                        house_id="' . $row["house_id"] . '" 
                                        house_name="' . $row["house_name"] . '" 
                                        house_imamap="' . $row["house_img_map"] . '"> <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>';
                    $inc++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $('#table_2').DataTable({
        "fnInitComplete": function(oSettings) {
            $( window ).resize();
        },
        "fnDrawCallback": function(oSettings) {
            $( window ).trigger('resize');
        },

        "scrollY": "400px",
        // //  "scrollX": true,
        // //  "scrollCollapse": true,
        "paging": false,
        "searching": false,
        "order": [
            [0, "desc"]
        ]
    });
    $(".h_site").load("config_php/droupdown_site.php");
    $(".edit_house").click(function() {
        $(".title_Mhouse").html("Edit House : " + $(this).attr("house_name") );
        // $(".mode_device").val("edit_devices");
        $(".house_id").val($(this).attr("house_id"));
        $(".h_site").val($(this).attr("house_siteID")).removeClass("is-invalid");
        $(".h_sn").val($(this).attr("house_sn")).removeClass("is-invalid");
        $(".h_name").val($(this).attr("house_name")).removeClass("is-invalid");
        if($(this).attr("house_imamap") === ""){
            $('.image_house').attr("src", "dist/images/default.jpg");
        }else{
            $('.image_house').attr("src", "dist/images/site/"+$(this).attr("house_imamap") );
        }
        $("#model_house").modal("show");
    });
    $(".delete_house").click(function(){
        swal({
            title: 'Delete !',
            html: "คุณต้องการที่จะลบ House : "+$(this).attr("house_name")+" หรือไม่ ?<br>ข้อมูลทั้งหมดของ "+$(this).attr("house_name")+" จะหายไป ไม่สามารถกู้คืนได้ !!!",
            type: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#00CC33',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: 'config_php/insert_setting_config.php',
                    type: 'POST',
                    data: {
                        site_id : $(this).attr("house_id"),
                        mode : "delete_house",
                        img : $(this).attr("house_imamap")
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data == "Error") {
                            swal({
                                title: 'เกิดข้อผลิดพลาด !',
                                text: "บันทึกไม่สำเร็จ !!!",
                                type: 'error',
                                allowOutsideClick: false,
                                confirmButtonColor: '#32CD32'
                            });
                        } else {
                            // var parseJSON = $.parseJSON(data);
                            $("#load_set_house").load("load_page/load_setting_house.php");
                            swal({
                                title: 'Successfully.',
                                // text: "" + sw_name + " ?",
                                type: 'success',
                                allowOutsideClick: false,
                                confirmButtonColor: '#32CD32'
                            });
                        }
                    }
                });
            }
        });
    });
</script>