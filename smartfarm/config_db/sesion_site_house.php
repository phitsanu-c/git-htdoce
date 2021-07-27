<?php
session_start();
require 'connectdb.php';

if(isset($_POST["siteID"])){
    // $get_site = $_POST["siteID"];
    // echo $get_site;
    $_SESSION["site_id"] = $site_id = $_POST["siteID"];
    $site_stmt = $dbcon->prepare("SELECT * FROM tb2_site WHERE site_id = '$site_id' ORDER BY site_id LIMIT 1");
    $site_stmt->execute();
    $row_site = $site_stmt->fetch(PDO::FETCH_BOTH);
    $_SESSION["site_name"] = $row_site["site_name"];
    // echo $_SESSION["site_id"]." - ".  $_SESSION["site_name"];

    $df_house = $dbcon->prepare("SELECT * from tb2_house WHERE house_siteID = '$site_id' order by house_id limit 1");
    $df_house->execute();
    $row_df_house = $df_house->fetch();
    // $_SESSION["house_id"] = $row_df_house["house_id"];
    $_SESSION["house_name"] = $row_df_house["house_name"];
    $_SESSION["house_master"] = $row_df_house["house_master"];
    // $_SESSION["house_qtyHouse"] = $row_df_house["house_qtyHouse"];
    // $_SESSION["pages"] = $row_df_house["house_rev"];
    $_SESSION["house_img_map"] = $row_df_house["house_img_map"];

}
if(isset($_POST["houseID"])){
    $get_house = $_POST["houseID"];
    // echo $get_house;
    $df_house = $dbcon->prepare("SELECT * from tb2_house WHERE house_id = '$get_house' order by house_id limit 1");
    $df_house->execute();
    $row_df_house = $df_house->fetch();
    // $_SESSION["house_id"] = $_POST["houseID"];
    // $_SESSION["house_name"] = $_POST["houseName"];
    $_SESSION["house_master"] = $row_df_house["house_master"];
    $_SESSION["house_qtyHouse"] = $row_df_house["house_qtyHouse"];
    $_SESSION["pages"] = $row_df_house["house_rev"];
    $_SESSION["house_img_map"] = $row_df_house["house_img_map"];
    
    $site_id = $row_df_house["house_siteID"];
    $site_stmt = $dbcon->prepare("SELECT * FROM tb2_site WHERE site_id = '$site_id' ORDER BY site_id LIMIT 1");
    $site_stmt->execute();
    $row_site = $site_stmt->fetch(PDO::FETCH_BOTH);
    // $_SESSION["site_id"] = $site_id;
    $_SESSION["site_name"] = $row_site["site_name"];
}

// echo $_SESSION["pages"];
