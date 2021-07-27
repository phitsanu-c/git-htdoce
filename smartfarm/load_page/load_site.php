<div class="row">
    <?php
    session_start();
    require '../config_db/connectdb.php';
    $url_host = 'http://' . $_SERVER['HTTP_HOST'];
    $url_part = explode("/", $_SERVER["PHP_SELF"]);
    $url_link = $url_host . '/' . $url_part[1];
    // echo $url_part[1];
    // exit();
    $login_userid = $_SESSION['user_id'];
    // $_SESSION["Username"] ;
    // $_SESSION["login_status"]  ;

    function encode($string)
    {
        return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($string . 'zasn'));
    }

    // function decode($string) {
    //     return base64_decode(str_replace(['-','_'], ['+','/'], $string));
    // }

    if ($_SESSION["login_status"] != 1) {
        $site_stmt = $dbcon->prepare("SELECT * FROM `tb3_userst`INNER JOIN tb2_login ON tb3_userst.userST_loginID = tb2_login.login_id INNER JOIN tb2_site ON tb3_userst.userST_siteID = tb2_site.site_id WHERE tb3_userst.userST_loginID = '$login_userid' GROUP BY userST_siteID ");
    } else {
        $site_stmt = $dbcon->prepare("SELECT * FROM tb2_site ");
    }
    $site_stmt->execute();
    $i = 1;
    // $row_site = $site_stmt->fetch(PDO::FETCH_BOTH);
    while ($row_site = $site_stmt->fetch(PDO::FETCH_BOTH)) {
        $co = $row_site["site_id"];
    ?>
        <div class="col-md-6 col-sm-12 col-xl-3">
            <div class="card">
                <div class="card-content">
                    <img src="dist/images/site/<?= $row_site["site_img"] ?>" style="height: 20vh; width: 100%;" class="card-img-top img-fluid" alt="site01">
                    <div class="card-body">
                        <h5 class="card-title text-bold text-center">SITE : <B><?= $row_site["site_name"] ?></B></h5>
                        <div class="button-group data<?= $i ?>"></div>
                        <script>
                            var siteID = '<?= $co ?>';
                            $(".data<?= $i ?>").load("load_page/load_house.php?siteID=" + siteID);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    <?php $i++;
    } ?>
</div>