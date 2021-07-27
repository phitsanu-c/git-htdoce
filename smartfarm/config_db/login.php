<?php
session_start();
require "connectdb.php";

if (isset($_POST["mode_user"])) {
    $mode_user = $_POST["mode_user"];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    // echo $username." and ".$password;
    //เข้ารหัส รหัสผ่าน
    $salt = 'tikde78uj4ujuhlaoikiksakeidke';
    $new_password = hash_hmac('sha256', $password, $salt);
    // echo $new_password;
    if ($mode_user == "username") { //login user_mode
        if (isset($_POST['Username'])) {
            // if ($username == "Kmutt" || $username == "kmutt" || $username == "KMUTT" || $username == "nattapon kmutt" || $username == "NSTDA" || $username == "Nstda" || $username == "nstda" ) {
            //     if ($username && $new_password) {
            //         $query_User = $dbcon->prepare("select * from  tb_login where login_username='$username'  and login_password='$new_password'");
            //         $query_User->execute();
            //         $count_User = $query_User->fetch(PDO::FETCH_BOTH);
            //         // echo json_encode($count_User);
            //         // exit();
            //         if ($count_User["login_id"] > 0) {
            //             $_SESSION["status_login"] = "login";
            //             $_SESSION["pages"] = "v.1.2";
            //             $_SESSION['user_id'] = $count_User["login_id"];
            //             $_SESSION["Username"] = $count_User['login_username'];
            //             $_SESSION["login_status"] = $count_User["login_status"];
            //             $_SESSION["login_image"] = $count_User["login_image"];
            //             $_SESSION['start'] = time();
            //             $_SESSION['expire'] = $_SESSION['start'] + (120 * 60);
            //             // echo  $_SESSION['start']."<br>". $_SESSION['expire'];
            //             // echo json_encode("Login Succress");
            //             // echo $count_User["login_id"];
            //         } else {
            //             // $query_email = $dbcon->prepare("select * from  tb_login where login_email='$email' and login_password='$new_password'");
            //             // $query_email -> execute();
            //             // $count_email = $query_email -> fetch(PDO::FETCH_BOTH);
            //             // if($count_email["login_id"] > 0){
            //             //     $_SESSION['user_id'] = $count_email["login_id"];
            //             //     $_SESSION["Username"] = $count_email['login_username'];
            //             //     $_SESSION["login_status"] = $count_email["login_status"];
            //             //     $_SESSION["login_image"] = $count_email["login_image"];
            //             //     $_SESSION['start'] = time();
            //             //     $_SESSION['expire'] = $_SESSION['start'] + (120 * 60);
            //             //     // echo  $_SESSION['start']."<br>". $_SESSION['expire'];
            //             //     echo json_encode("Login Succress");
            //             //     // echo $count_email["login_id"];
            //             // }else{
            //             //     echo json_encode("Login Error");
            //             // }
            //         }
            //     }
            // } else { // เว็บใหม่
                $query = $dbcon->prepare("SELECT * FROM tb2_login WHERE login_user = '$username' AND login_pass = '$new_password' ");
                $query->execute();
                $row_count = $query->fetch(PDO::FETCH_BOTH);
                // echo $count_User["login_id"];

                if ($row_count == false) {
                    echo json_encode("ไม่มีชื่อผู้ใช้นี้", JSON_UNESCAPED_UNICODE);
                    exit();
                } elseif ($row_count["login_id"] > 0) {
                    $login_userid = $_SESSION['user_id'] = $row_count["login_id"];
                    $_SESSION["Username"] = $row_count['login_user'];
                    $_SESSION["login_status"] = $row_count["login_status"];
                    $_SESSION["time"] = date("Y-m-d H:i:s");
                    if ($row_count["login_image"] === "") {
                        $_SESSION["login_image"] = "user.png";
                    } else {
                        $_SESSION["login_image"] = $row_count["login_image"];
                    }
                    $_SESSION["status_login"] = "login";
                    // $_SESSION['start'] = time();
                    // $_SESSION['expire'] = $_SESSION['start'] + (120 * 60);
                    // echo  $_SESSION['start']."<br>". $_SESSION['expire'];

                    // ---------------------------------
                    // กำหนดไซต์ ค่าเริ่มต้น
                    // if (!isset($_SESSION["site_name"])) {
                    //     if ($_SESSION["login_status"] != 1) {
                    //         $df_site = "SELECT * FROM `tb2_userst`INNER JOIN tb2_login ON tb2_userst.userST_loginID = tb2_login.login_id INNER JOIN tb2_site ON tb2_userst.userST_siteID = tb2_site.site_id WHERE tb2_userst.userST_loginID = '$login_userid' limit 1";
                    //     } else {
                    //         $df_site = "SELECT * FROM tb2_site order by site_id limit 1";
                    //     }
                    //     $stmt_df_site = $dbcon->query($df_site);
                    //     $stmt_df_site->execute();
                    //     $row_df_site = $stmt_df_site->fetch();
                    //     // if($row_df_site["site_rev"] == 1){
                    //     $house_siteID = $row_df_site["site_id"];
                    //     // $_SESSION["site_name"] = $row_df_site["site_name"];
                    //     // echo $_SESSION["site_id"];
                    //     // echo $_SESSION["site_name"];

                    //     $df_house = $dbcon->prepare("SELECT * from tb2_house WHERE house_siteID = '$house_siteID' order by house_id limit 1");
                    //     $df_house->execute();
                    //     $row_df_house = $df_house->fetch();

                    //     if ($row_df_house["house_rev"] == 1) {
                    //         $_SESSION["site_id"] = "";
                    //         $_SESSION["site_name"] = "";
                    //         $_SESSION["house_id"] = $row_df_house["house_id"];
                    //         $_SESSION["house_name"] = $row_df_house["house_name"];
                    //         $_SESSION["house_master"] = $row_df_house["house_master"];
                    //         $_SESSION["house_qtyHouse"] = $row_df_house["house_qtyHouse"];
                    //         $_SESSION["pages"] = $row_df_house["house_rev"];
                    //     } else if ($row_df_house["house_rev"] == 2) {
                    //         $_SESSION["site_id"] = "";
                    //         $_SESSION["site_name"] = "";
                    $_SESSION["pages"] = "1";
                    //         $_SESSION["house_id"] = "";
                    //         $_SESSION["house_name"] = "";
                    //         $_SESSION["house_master"] = "";
                    //         $_SESSION["house_qtyHouse"] = "";
                    //     }
                    // }
                }
            // }
        }
    } elseif ($mode_user == "email") { //login email_mode


    }
}



if (isset($_POST['logout'])) {
    session_destroy();
    echo json_encode("logout_succress");
    exit();
}

if (isset($_SESSION["status_login"])) {
    $remain=intval( strtotime( date("Y-m-d H:i:s") )- strtotime( $_SESSION["time"]));
    $wan=floor($remain/86400);
    $l_wan=$remain%86400;
    $hour=floor($l_wan/3600);
    $l_hour=$l_wan%3600;
    $minute=floor($l_hour/60);
    $second=$l_hour%60;              
    echo json_encode([
        'user_id'       => $_SESSION['user_id'],
        'username'      => $_SESSION["Username"],
        'status'        => $_SESSION["login_status"],
        'image'         => $_SESSION["login_image"],
        'status_login'  => $_SESSION["status_login"],
        'pages'         => $_SESSION["pages"],
        'time_start'    => $_SESSION["time"],
        'z_time'        => $hour,
        'wan'=> "ผ่านมาแล้ว ".$wan." วัน ".$hour." ชั่วโมง ".$minute." นาที ".$second." วินาที"
        , JSON_UNESCAPED_UNICODE
        // 'site_id'       => $_SESSION["site_id"]
    ]);
} else {
    echo json_encode(['status_login'  => ""]);
}
