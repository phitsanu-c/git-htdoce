<?php
session_start();
if(isset($_POST["sesion"])){
    // $_SESSION["meter_load"] = "";
    unset($_SESSION['meter_load']);
}
// echo $_SESSION["meter_load"];