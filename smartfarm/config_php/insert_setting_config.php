<?php
session_start();
require "../config_db/connectdb.php";
// $user_re = $_SESSION["Username"];

    // Site
    if($_POST["mode"] == "site"){
        $site_id = $_POST["site_id"];
        $s_name = $_POST["s_name"];
        $file	= $_FILES['image_input']['name'];
        if($site_id == ""){ // Add_site
            $ck_name = $dbcon->query("SELECT count(site_name) FROM tb2_site WHERE site_name = '$s_name' ")->fetch();
            if($ck_name[0] > 0){
                echo 'user_me';
                exit();
            }
            if($file == ""){
                $n_img = "";
            }else{
                $cont_img = $dbcon->query("SELECT site_id FROM tb2_site ORDER BY site_id DESC LIMIT 1 ")->fetch();
                // echo $cont_img[0]+1;
                // exit();
                $infoExt = getimagesize($_FILES['image_input']['tmp_name']);
                if(strtolower($infoExt['mime']) == 'image/gif' || strtolower($infoExt['mime']) == 'image/jpeg' || strtolower($infoExt['mime']) == 'image/jpg' || strtolower($infoExt['mime']) == 'image/png' || strtolower($infoExt['mime']) == 'image/svg'){
                    $img_part = pathinfo(basename($file),PATHINFO_EXTENSION); // ่สกุล
                    $n_img = "img_site_".($cont_img[0]+1).".".$img_part;
                    $location = "../dist/images/site/".$n_img;
                    move_uploaded_file($_FILES['image_input']['tmp_name'],$location);
                }else{
                    echo "img_part";
                    exit();
                }
            }
            $data = [
                'p1' => $s_name,
                'p2' => $_POST["s_address"],
                'p3' => $_POST["s_la"],
                'p4' => $_POST["s_long"],
                'p5' => $n_img,
                'p6' => $_SESSION["Username"]
            ];
            // echo json_encode($data);
            // exit();
            $sql = "INSERT INTO `tb2_site`(`site_name`, `site_address`, `site_la`, `site_long`, `site_img`, `site_userset`) VALUES (:p1, :p2, :p3, :p4, :p5, :p6)";
            if ($dbcon->prepare($sql)->execute($data) === TRUE) {
                echo "Insert_Succress";
            }else{
                echo "Insert_Error";
            }
        }else{ // Edit_site
            $sel_site = $dbcon->query("SELECT * FROM tb2_site WHERE site_id = '$site_id' ")->fetch();
            if($sel_site["site_name"] == $s_name){
                $n_name = $sel_site["site_name"];
            }else{
                $ck_name = $dbcon->query("SELECT count(site_name) FROM tb2_site WHERE site_name = '$s_name' ")->fetch();
                if($ck_name[0] > 0){
                    echo 'user_me';
                    exit();
                }
                $n_name = $s_name;
            }
            if($file == ""){
                $n_img = $sel_site["site_img"];
            }else{
                if($sel_site["site_img"] != ""){
                    $img_user_del = "../dist/images/site/".$sel_site["site_img"];
                    unlink($img_user_del);
                }
                $infoExt = getimagesize($_FILES['image_input']['tmp_name']);
                if(strtolower($infoExt['mime']) == 'image/gif' || strtolower($infoExt['mime']) == 'image/jpeg' || strtolower($infoExt['mime']) == 'image/jpg' || strtolower($infoExt['mime']) == 'image/png' || strtolower($infoExt['mime']) == 'image/svg'){
                    $img_part = pathinfo(basename($file),PATHINFO_EXTENSION); // ่สกุล
                    $n_img = "img_site_".$sel_site["site_img"].".".$img_part;
                    $location = "../dist/images/site/".$n_img;
                    move_uploaded_file($_FILES['image_input']['tmp_name'],$location);
                }else{
                    echo "img_part";
                    exit();
                }
            }
            $data = [
                'p1' => $n_name,
                'p2' => $_POST["s_address"],
                'p3' => $_POST["s_la"],
                'p4' => $_POST["s_long"],
                'p5' => $n_img,
                'p6' => $_SESSION["Username"],
                'pp' => $site_id
            ];
            // echo json_encode($data);
            // exit();
            $sql = "UPDATE `tb2_site` SET `site_name`=:p1,`site_address`=:p2,`site_la`=:p3,`site_long`=:p4,`site_img`=:p5, `site_userset`=:p6 WHERE site_id=:pp ";
            if ($dbcon->prepare($sql)->execute($data) === TRUE) {
                // echo json_encode($data);
                echo "Update_Succress";
            }else{
                echo "Insert_Error";
            }
        }
    }elseif($_POST["mode"] == "delete_site"){
        // $site_id = $_POST["site_id"];
        $site_img = $_POST["img"];
        // echo $site_img;
        // exit();
        if($site_img != ""){
            $Delete_image = "../dist/images/site/".$site_img;
            unlink($Delete_image);
        }

        $stmt = $dbcon->prepare("DELETE FROM tb2_site WHERE site_id = :site_id ");
        $stmt->bindParam(':site_id', $_POST['site_id'], PDO::PARAM_INT);   
        $count = $stmt->execute();
        if($count){
            echo json_encode("Succress");
        }else{
            echo json_encode("Error");
        }
    }
    if($_POST["mode"] == "house"){
        $house_id = $_POST["house_id"];
        $h_sn = $_POST["h_sn"];
        $file	= $_FILES['image_input']['name'];
        if($house_id == ""){ // Add_house
            $ck_sn = $dbcon->query("SELECT count(house_master) FROM tb2_house WHERE house_master = '$h_sn' ")->fetch();
            if($ck_sn[0] > 0){
                echo 'sn_me';
                exit();
            }
            if($file == ""){
                $n_img = "";
            }else{
                $cont_img = $dbcon->query("SELECT house_id FROM tb2_house ORDER BY house_id DESC LIMIT 1 ")->fetch();
                // echo $cont_img[0]+1;
                // exit();
                $infoExt = getimagesize($_FILES['image_input']['tmp_name']);
                if(strtolower($infoExt['mime']) == 'image/gif' || strtolower($infoExt['mime']) == 'image/jpeg' || strtolower($infoExt['mime']) == 'image/jpg' || strtolower($infoExt['mime']) == 'image/png' || strtolower($infoExt['mime']) == 'image/svg'){
                    $img_part = pathinfo(basename($file),PATHINFO_EXTENSION); // ่สกุล
                    $n_img = "img_mapAll_".($cont_img[0]+1).".".$img_part;
                    $location = "../dist/images/img_map/".$n_img;
                    move_uploaded_file($_FILES['image_input']['tmp_name'],$location);
                }else{
                    echo "img_part";
                    exit();
                }
            }
            $data = [
                'p1' => $_POST["h_site"],
                'p2' => $h_sn,
                'p3' => $_POST["h_name"],
                'p4' => $n_img,
                'p5' => $_SESSION["Username"]
            ];
            // echo json_encode($data);
            // exit();
            $sql = "INSERT INTO `tb2_house`(`house_siteID`, `house_master`, `house_name`, `house_img_map`, `house_userset`) VALUES (:p1, :p2, :p3, :p4, :p5)";
            if ($dbcon->prepare($sql)->execute($data) === TRUE) {
                $last_id = $dbcon->lastInsertId();
                echo "Insert_Succress";
            }else{
                echo "Insert_Error";
            }
        }else{ // Edit_house

        }
    }
    