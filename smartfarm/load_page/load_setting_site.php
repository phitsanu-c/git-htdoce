<?php
session_start();
require '../config_db/connectdb.php';
$user_id = $_SESSION['user_id'];
?>
<div class="card">
    <div class="card-body">
        <table class="table table-striped table-bordered" style="width:100%" id="table1">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Images</th>
                    <th class="text-center">Site Name</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Latitude</th>
                    <th class="text-center">Longitude</th>
                    <th class="text-center">Time Update</th>
                    <th class="text-center">Record User</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($_SESSION["login_status"] == 1) {
                    $stmt = $dbcon->prepare("SELECT * FROM tb2_site");
                } else {
                    $stmt = $dbcon->prepare("SELECT * FROM tb_user_login INNER JOIN tb_site ON tb_user_login.userst_siteID = tb_site.site_id WHERE userst_customerID='$user_id' ");
                    // $stmt = $dbcon->prepare("SELECT * FROM tb_site ");
                }
                $stmt->execute();
                $count = $stmt->rowCount();

                // if($count != 0){
                $inc = 1;
                while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                    echo '<tr>
                            <td class="text-center">' . $inc . '</td>';
                    if ($row["site_img"] == "") {
                        echo '<td class="text-center"><img src="dist/images/default.jpg" width="50"  height="50" alt="..."></td>';
                    } else {
                        echo '<td class="text-center"><img src="dist/images/site/' . $row["site_img"] . '" width="50"  height="50" alt="..."></td>';
                    }
                    echo '  <td class="text-center">' . $row["site_name"] . '</td>
                                    <td class="text-center">' . $row["site_address"] . '</td>
                                    <td class="text-center">' . $row["site_la"] . '</td>
                                    <td class="text-center">' . $row["site_long"] . '</td>
                                    <td class="text-center">' . $row["site_timestamp"] . '</td>
                                    <td class="text-center">'; if($row["site_userset"] == ""){echo "Admin";}else{echo $row["site_userset"];} echo '</td>
                                    <td  class="text-center">
                                        <div class="buttons">
                                            <a href="javascript:void(0)" class="text-info edit_site" 
                                                site_id="' . $row["site_id"] . '" 
                                                name="' . $row["site_name"] . '" 
                                                img="' . $row["site_img"] . '" 
                                                adss="' . $row["site_address"] . '" 
                                                la="' . $row["site_la"] . '" 
                                                long="' . $row["site_long"] . '"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="text-danger delete_site" 
                                                site_id="' . $row["site_id"] . '" 
                                                name="' . $row["site_name"] . '"
                                                img="' . $row["site_img"] . '"> <i class="fa fa-trash-o" aria-hidden="true"></i>
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
    $('#table1').DataTable({
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
        //  "order": [
        //        [0, "desc"]
        //  ],
    });
    $(".edit_site").click(function() {
        $(".title_Msite").html("Edit Site : " + $(this).attr("name") );
        // $(".mode_site").val("edit_site");
        $(".site_id").val($(this).attr("site_id"));
        if($(this).attr("img") === ""){
            $('.image_site').attr("src", "dist/images/default.jpg");
        }else{
            $('.image_site').attr("src", "dist/images/site/"+$(this).attr("img") );
        }
        $("#img_input_site").val("");
        $(".s_name").val($(this).attr("name")).removeClass("is-invalid");
        $(".s_address").val($(this).attr("adss"));
        $(".s_la").val($(this).attr("la")).removeClass("is-invalid");
        $(".s_long").val($(this).attr("long")).removeClass("is-invalid");
        $("#model_site").modal("show");
    });
    $(".delete_site").click(function(){
        swal({
            title: 'Delete !',
            html: "คุณต้องการที่จะลบ Site : "+$(this).attr("name")+" หรือไม่ ?<br>ข้อมูลทั้งหมดของ "+$(this).attr("name")+" จะหายไป ไม่สามารถกู้คืนได้ !!!",
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
                        site_id : $(this).attr("site_id"),
                        mode : "delete_site",
                        img : $(this).attr("img")
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
                            $("#load_site").load("config_php/get_site.php");
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