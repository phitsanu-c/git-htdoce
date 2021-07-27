
<div class="row">
    <?php
        session_start();
        require '../config_db/connectdb.php';
        $url_host = 'http://'.$_SERVER['HTTP_HOST'];
        $url_part = explode("/",$_SERVER["PHP_SELF"]);
        $url_link = $url_host.'/'.$url_part[1];
        // echo $url_part[1];
        // exit();
        $login_userid = $_SESSION['user_id'] ;
        // $_SESSION["Username"] ;
        // $_SESSION["login_status"]  ;

        function encode($string) {
            return str_replace(['+','/','='], ['-','_',''], base64_encode($string.'zasn'));
        }
        
        // function decode($string) {
        //     return base64_decode(str_replace(['-','_'], ['+','/'], $string));
        // }

        if($_SESSION["login_status"] != 1){
            $site_stmt = $dbcon->prepare("SELECT * FROM `tb3_userst`INNER JOIN tb2_login ON tb3_userst.userST_loginID = tb2_login.login_id INNER JOIN tb2_site ON tb3_userst.userST_siteID = tb2_site.site_id WHERE tb3_userst.userST_loginID = '$login_userid' GROUP BY userST_siteID ");
        }else{
            $site_stmt = $dbcon->prepare("SELECT * FROM tb2_site ");
        }
        $site_stmt->execute();
        $i=1;
        // $row_site = $site_stmt->fetch(PDO::FETCH_BOTH);
        while ($row_site = $site_stmt->fetch(PDO::FETCH_BOTH)){ 
    ?>
        <div class="col-md-6 col-sm-12 col-xl-3">
            <div class="scene scene--card">
                <div class="cardflip">
                    <?php
                        $co = $row_site["site_id"];
                        if($_SESSION["login_status"] != 1){
                        $row_h = $dbcon->query("SELECT COUNT(house_siteID) as cont, house_master, house_name FROM `tb3_userst`INNER JOIN tb2_login ON tb3_userst.userST_loginID = tb2_login.login_id INNER JOIN tb2_house ON tb3_userst.userST_siteID = tb2_house.house_siteID AND tb3_userst.userST_houseID = tb2_house.house_id  WHERE tb3_userst.userST_loginID = '$login_userid' AND tb2_house.house_siteID = '$co' ")->fetch();
                                                // -- SELECT COUNT(house_siteID) as cont, house_master, house_name from tb2_house WHERE house_siteID = '$co' order by house_id ")->fetch();
                        }else{
                            $row_h = $dbcon->query("SELECT COUNT(house_id) as cont, house_master, house_name FROM tb2_house INNER JOIN tb2_site ON tb2_house.house_siteID = tb2_site.site_id WHERE house_siteID = '$co' order by house_id ")->fetch();
                        }
                        // $sql = "SELECT COUNT(*) as cont, * FROM tb2_house WHERE house_siteID = '$co' order by house_id ";
                        // $res = $dbcon->query($sql);
                        // $row_h = $res->fetch();
                        // $cont = $res->fetchColumn();
                        // echo $row_h["house_master"];
                        // exit();
                        // echo $row_h['cont'];
                        if ($row_h['cont'] == 1) {?>
                            <a class="card__face card__face--front sel_site "
                                style=" background-image:  url('dist/images/site/<?= $row_site["site_img"] ?>')"
                                href="<?= $url_link ?>#<?= encode($row_h["house_master"]) ?>">
                                <h1>SITE : <B><?= $row_site["site_name"] ?></B></h1>
                            </a>
                    <?php }else{?>
                            <div class="card__face card__face--front"
                                style="background-image: url('dist/images/site/<?= $row_site["site_img"] ?>')">
                                <h1>SITE : <B><?= $row_site["site_name"] ?></B></h1>
                            </div>
                            <div class="card__face card__face--back ">
                                <div class="cardflip-header">
                                    <h4>SITE : <B><?= $row_site["site_name"] ?></B></h4>
                                </div>
                                <div class="row button-group">
                                    <div class="btn waves-effect  btn-block data<?=$i?>" ></div>
                                </div>
                            </div>
                            <script>
                                var siteID = '<?= $co ?>';
                                $(".data<?=$i?>").load("load_page/load_house.php?siteID=" + siteID);
                            </script>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php $i++; } ?>
</div>

<script>
    const cards = document.querySelectorAll('.cardflip');
    function flipCard() {
        this.classList.toggle('is-flipped');
    }
    cards.forEach(card => card.addEventListener('click', flipCard));
</script>