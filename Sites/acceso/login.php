<?php
ob_start();
require("../config/conexion2.php");
 #Se obtiene el valor del input del usuario

$npas = $_POST["nro_pasaporte"];
$contraseña = $_POST["contraseña"];



$stmt = $db->prepare("SELECT id FROM usuario WHERE nro_pasaporte='$npas' AND contraseña='$contraseña';"); 
$stmt->execute();
$count=$stmt->rowCount();
$data=$stmt->fetchAll();
// echo "$data->nro_pasaporte";
if($count) {
    session_start();
    // $last_id = $db->lastInsertId();
    $_SESSION['nro_pasaporte']=$npas; // Storing user session value
    header("Location: perfil.php");

}
else
{
    // echo "Este/a usuario/a no existe";
    header("Location: error_entrar.php");
};
ob_end_flush();
?>