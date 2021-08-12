<?php
    session_start();
    require '../config_db/connectdb.php';
    function encode($string) {
        return str_replace(['+','/','='], ['-','_',''], base64_encode($string.'zasn'));
    }

    $house_master = $_POST["house_master"];
    $login_userid = $_SESSION['user_id'];
    if($_SESSION["login_status"] != 1){
        $row = $dbcon->query("SELECT COUNT('userST_loginID') FROM `tb3_userst` WHERE `userST_loginID`='$login_userid'")->fetch();
    }else{
        $row = $dbcon->query("SELECT COUNT(`site_id`) FROM tb2_site ")->fetch();
    }
    if($row[0] == 1){
        $row_h = $dbcon->query("SELECT house_name, house_master, house_img_map FROM `tb3_userst`INNER JOIN tb2_site ON tb3_userst.userST_siteID = tb2_site.site_id INNER JOIN tb2_house ON tb3_userst.userST_siteID = tb2_house.house_siteID AND tb3_userst.userST_houseID = tb2_house.house_id  WHERE tb3_userst.userST_loginID = '$login_userid' ")->fetch();
        // $dbcon->query("SELECT * FROM tb2_house INNER JOIN tb2_site ON tb2_house.house_siteID = tb2_site.site_id WHERE house_master = '$house_master' ")->fetch();
        // echo json_encode($row_h);
        // exit();
        echo json_encode([
            'username'      => $_SESSION["Username"],
            // 'site_name'     => $row_h["site_name"],
            'house_name'    => $row_h["house_name"],
            'house_master'  => encode($row_h["house_master"]),
            'house_icon_map' => $row_h["house_img_map"],
            'cont' => $row[0]
        ]);
    }else{
        if($house_master === ""){
            echo json_encode([
                'username'      => $_SESSION["Username"],
                'cont' => $row[0]
            ]);
        }else{
            $row_h = $dbcon->query("SELECT * FROM tb2_house INNER JOIN tb2_site ON tb2_house.house_siteID = tb2_site.site_id WHERE house_master = '$house_master' ")->fetch();
            echo json_encode([
                'username'      => $_SESSION["Username"],
                'site_name'     => $row_h["site_name"],
                'house_name'    => $row_h["house_name"],
                'house_icon_map' => $row_h["house_img_map"],
                'cont' => $row[0]
            ]);
        }
    }