<?php
session_start();
require '../config_db/connectdb.php';

$house_master = $_GET["house_master"];
if($house_master != "0"){
    $row_hous = $dbcon->query("SELECT * FROM tb2_house INNER JOIN tb2_site ON tb2_house.house_siteID = tb2_site.site_id Where house_master = '$house_master' ")->fetch();
                
    $stmt1 = $dbcon->prepare("SELECT * from tb3_dashstatus WHERE dashstatus_sn = '$house_master' order by dashstatus_id limit 1");
    $stmt1->execute();
    $row1 = $stmt1->fetch();

    $stmt2 = $dbcon->prepare("SELECT * from tb3_dashname WHERE dashname_sn = '$house_master' order by dashname_id limit 1");
    $stmt2->execute();
    $row2 = $stmt2->fetch();

    $stmt3 = $dbcon->prepare("SELECT * from tb3_statussn  WHERE statussn_sn = '$house_master' ");
    $stmt3->execute();
    $row3 = $stmt3->fetch();

    $stmt4 = $dbcon->prepare("SELECT * from tb3_sncanel  WHERE sncanel_sn = '$house_master' ");
    $stmt4->execute();
    $row4 = $stmt4->fetch();
    // ---------------------------------------------------------
    // $stmt5 = $dbcon->prepare("SELECT * from tb3_map_img WHERE map_sn = '$house_master' ORDER BY map_id DESC LIMIT 1");
    // $stmt5->execute();
    // $row5 = $stmt5->fetch();
    echo json_encode([
        'dashstatus' => $row1,
        'dashname' => $row2,
        'statussn' => $row3,
        'sncanel' => $row4,
        // 'map_img' => $row5,
        'site_name' => $row_hous["site_name"],
        'house_name' => $row_hous["house_name"],
    ]);
}
?>