<?php
    session_start();
    require '../config_db/connectdb.php';
    // $sn = $_GET["sn"];
    if(!isset($_SESSION["house_id"])){
        echo json_encode([
            'username'      => $_SESSION["Username"],
            'site_id'       => "",
            'site_name'     => "",
            'house_id'      => "",
            'house_master'  => "",
            'house_qtyHouse' => "",
            'house_img_map'  => "",
            'house_name'    => "",
            'house_qty'     => "",
            'pages'         => $_SESSION["pages"],
            'cont_house'    => ""
        ]);
    }else{
        $houseID = $_SESSION["house_id"];
        $sql2 = "SELECT COUNT(`house_id`) FROM tb2_house WHERE house_id = '$houseID' ";
        if ($res = $dbcon->query($sql2)) {
            $cont = $res->fetchColumn();
            echo json_encode([
                'username'      => $_SESSION["Username"],
                // 'site_id'       => $_SESSION["site_id"],
                // 'site_name'     => $_SESSION["site_name"],
                // 'house_id'      => $_SESSION["house_id"],
                // 'house_master'  => $_SESSION["house_master"],
                // 'house_qtyHouse'=> $_SESSION["house_qtyHouse"],
                // 'house_img_map' => $_SESSION["house_img_map"],
                'house_name'    => $_SESSION["house_name"],
                // 'house_qty'     => $_SESSION["house_qtyHouse"],
                // 'pages'         => $_SESSION["pages"],
                'cont_house'    => $cont
            ]);
        }
    }
