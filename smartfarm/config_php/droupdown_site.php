<?php
session_start();
require "../config_db/connectdb.php";
$user_id = $_SESSION['user_id'];
echo '<option value=""> -- Select Site -- </option>';

if ($_SESSION["login_status"] == 1) {
    $stmt = $dbcon->prepare("SELECT * FROM tb2_site ");
} else {
    $count = $dbcon->query("SELECT count(`userst_id`) FROM tb_user_login WHERE userst_customerID = '$user_id' ")->fetch();
    $stmt = $dbcon->prepare("SELECT * FROM tb_user_login INNER JOIN tb_site ON tb_user_login.userst_siteID = tb_site.site_id WHERE userst_customerID = '$user_id' ");

}
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
    echo '<option value="' . $row["site_id"] . '">' . $row["site_name"] . '</option>';
}
