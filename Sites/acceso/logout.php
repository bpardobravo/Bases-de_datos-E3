<?php
ob_start();
require("../config/conexion2.php");
$session_id='';
$_SESSION['id']=''; 
if(empty($session_id) && empty($_SESSION['id']))
{
    $url=BASE_URL.'index.php';
    header("Location: $url");
//echo "";
}
else {
    echo "No se pudo cerrar sesión";
};
ob_end_flush();
?>