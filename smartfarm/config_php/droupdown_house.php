<?php
session_start();
require "../config_db/connectdb.php";
$user_id = $_SESSION['user_id'];
$siteID = $_GET["siteID"];
echo '<option value="0"> -- Select Site -- </option>';
if($user_id != ""){
    $stmt = $dbcon->prepare("SELECT * FROM tb2_house WHERE house_siteID = '$siteID' ");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
        echo '<option value="' . $row["house_master"] . '">' . $row["house_name"] . '</option>';
    }
}
