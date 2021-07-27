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
    exit();
    // ------------------------------------------------------------------------------------------------------------
    $row = $dbcon->query("SELECT * FROM tb2_house WHERE house_master = '$house_master' ")->fetch();
    if ($row !== "") {
        echo json_encode([
            'username'      => $_SESSION["Username"],
            // 'site_id'       => $_SESSION["site_id"],
            // 'site_name'     => $_SESSION["site_name"],
            // 'house_id'      => $_SESSION["house_id"],
            // 'house_master'  => $_SESSION["house_master"],
            // 'house_qtyHouse'=> $_SESSION["house_qtyHouse"],
            // 'house_img_map' => $_SESSION["house_img_map"],
            'house_name'    => $row["house_name"],
            // 'house_qty'     => $_SESSION["house_qtyHouse"],
            // 'pages'         => $_SESSION["pages"],
            // 'cont_house'    => $cont
        ]);
    }
    exit();
    $login_userid = $_SESSION['user_id'] ;
    // echo $house_master;

    if($_SESSION["login_status"] != 1){
        $row = $dbcon->query("SELECT COUNT(*) AS cout_user FROM `tb2_userst`INNER JOIN tb2_login ON tb2_userst.userST_loginID = tb2_login.login_id INNER JOIN tb2_house ON tb2_userst.userST_siteID = tb2_house.house_id WHERE `userST_loginID`='$login_userid'")->fetch();
        // print_r($row);
        exit();
        $sql = "SELECT COUNT(*) FROM `tb2_userst`INNER JOIN tb2_login ON tb2_userst.userST_loginID = tb2_login.login_id INNER JOIN tb2_house ON tb2_userst.userST_siteID = tb2_house.house_id WHERE tb2_userst.userST_loginID = '$login_userid'";
    }else{
        $sql = "SELECT COUNT(`site_id`) FROM tb2_site ";
    }
    $stmt = $dbcon->query($sql);
    $stmt->execute();
    $row = $stmt->fetchColumn();
    if($row == 1){
        // $df_site = "SELECT * FROM `tb2_userst`INNER JOIN tb2_login ON tb2_userst.userST_loginID = tb2_login.login_id INNER JOIN tb2_house ON tb2_userst.userST_siteID = tb2_house.house_id WHERE tb2_userst.userST_loginID = '$login_userid' limit 1";
        // $stmt_df_site = $dbcon->query($df_site);
        // $stmt_df_site->execute();
        // $row_df_site = $stmt_df_site->fetch();
        $df_house_id = "SELECT * FROM `tb2_userst` WHERE userST_loginID = '$login_userid' limit 1";
        $stmt_df_house_id = $dbcon->query($df_house_id);
        $stmt_df_house_id->execute();
        $row_df_house_id = $stmt_df_house_id->fetch();
        $row_house_id = $row_df_house_id["userST_siteID"]; // house_id
    
        // $co;
        $sql2 = "SELECT COUNT(`house_id`) FROM tb2_house WHERE house_id = '$row_house_id' ";
        if ($res = $dbcon->query($sql2)) {
            $cont = $res->fetchColumn();
            if($cont == 1){
                if($_SESSION["login_status"] != 1){
                    $df_house = "SELECT * FROM `tb2_userst`INNER JOIN tb2_login ON tb2_userst.userST_loginID = tb2_login.login_id INNER JOIN tb2_house ON tb2_userst.userST_siteID = tb2_house.house_id WHERE tb2_userst.userST_loginID = '$login_userid' limit 1";
                    $stmt_df_house = $dbcon->query($df_house);
                    $stmt_df_house->execute();
                    $row_df_house = $stmt_df_house->fetch();
                    $_SESSION["site_id"] = $house_siteID = $row_df_house["house_siteID"];
                    

                    $_SESSION["house_id"] = $row_df_house["house_id"];
                    $_SESSION["house_name"] = $row_df_house["house_name"];
                    $_SESSION["house_master"] = $row_df_house["house_master"];
                    $_SESSION["house_qtyHouse"] = $row_df_house["house_qtyHouse"];
                    $_SESSION["house_img_map"] = $row_df_house["house_img_map"];

                    $df_site = $dbcon->prepare("SELECT * from tb2_site WHERE site_id = '$house_siteID' order by site_id limit 1");
                    $df_site->execute();
                    $row_df_site = $df_site->fetch();
                    $_SESSION["site_name"] = $row_df_site["site_name"];

                    
                    
                    $_SESSION["pages"] = $row_df_site["site_rev"];
                
                    echo json_encode($cont);
                }else{
                    $df_site = "SELECT * FROM tb2_site order by site_id limit 1";
                    $stmt_df_site = $dbcon->query($df_site);
                    $stmt_df_site->execute();
                    $row_df_site = $stmt_df_site->fetch();

                    $_SESSION["site_id"] = $house_siteID = $row_df_site["site_id"];
                    $_SESSION["site_name"] = $row_df_site["site_name"];
                    $_SESSION["pages"] = $row_df_site["site_rev"];

                    $df_house = $dbcon->prepare("SELECT * from tb2_house WHERE house_siteID = '$house_siteID' order by house_id limit 1");
                    $df_house->execute();
                    $row_df_house = $df_house->fetch();
                    $_SESSION["house_id"] = $row_df_house["house_id"];
                    $_SESSION["house_name"] = $row_df_house["house_name"];
                    $_SESSION["house_master"] = $row_df_house["house_master"];
                    $_SESSION["house_qtyHouse"] = $row_df_house["house_qtyHouse"];
                    $_SESSION["house_img_map"] = $row_df_house["house_img_map"];
                
                    echo json_encode($cont);
                }
                
                // $_SESSION["cont_house"] = $cont;
            }else{
                echo json_encode($cont);
                // $_SESSION["cont_house"] = $cont;
            }
        }
    }else{
        echo json_encode($row);
        // $_SESSION["cont_house"] = $row;
    }
    // ---------------------------------------
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
