<?php
    session_start();
    require '../config_db/connectdb.php';
    $url_host = 'http://'.$_SERVER['HTTP_HOST'];
    $url_part = explode("/",$_SERVER["PHP_SELF"]);
    $url_link = $url_host.'/'.$url_part[1];
    // echo $url_part[1];
    // exit();

    function encode($string) {
        return str_replace(['+','/','='], ['-','_',''], base64_encode($string.'zasn'));
    }

    $login_userid = $_SESSION['user_id'] ;
    $house_siteID = $_GET["siteID"];
    //  echo $login_userid." ". $house_siteID;
    if($_SESSION["login_status"] != 1){
        $sql = $dbcon->prepare("SELECT * FROM `tb3_userst`INNER JOIN tb2_login ON tb3_userst.userST_loginID = tb2_login.login_id INNER JOIN tb2_house ON tb3_userst.userST_siteID = tb2_house.house_siteID AND tb3_userst.userST_houseID = tb2_house.house_id  WHERE tb3_userst.userST_loginID = '$login_userid' AND tb2_house.house_siteID = '$house_siteID' GROUP BY userST_houseID ");
    }else{
        $sql = $dbcon->prepare("SELECT * FROM tb2_house WHERE house_siteID = '$house_siteID' order by house_id ");
    }
    $sql->execute();
    $data_array = array();
    while($row = $sql->fetch(PDO::FETCH_BOTH)){?>
        <a class="btn btn-rounded btn-block btn-outline-info" href="<?= $url_link ?>#<?= encode($row["house_master"]) ?>">
            <div class="mail-contnet"> <?= $row["house_name"] ?></div>
        </a>
    <?php } ?>

    