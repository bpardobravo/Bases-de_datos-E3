<?php
require("../config/conexion2.php");
$session_npas='';
$_SESSION['nro_pasaporte']=''; 
if(empty($session_npas) && empty($_SESSION['nro_pasaporte']))
{
    $url=BASE_URL.'index.php';
    header("Location: $url");
//echo "";
}
else {
    echo "No se pudo cerrar sesión";
};

?>