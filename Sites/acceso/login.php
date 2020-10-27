<?php
ob_start();
require("../config/conexion2.php");
 #Se obtiene el valor del input del usuario
$name = $_POST["nombre_usuario"];
$npas = $_POST["nro_pasaporte"];
$contraseña = $_POST["contraseña"];



$stmt = $db->prepare("SELECT id FROM usuario WHERE unombre='$name' AND nro_pasaporte='$npas' AND contraseña='$contraseña';"); 
$stmt->execute();
$count=$stmt->rowCount();
$data=$stmt->fetchAll();
// echo "$data->nro_pasaporte";
if($count) {
    session_start();
    $last_id = $db->lastInsertId();
    $_SESSION['id']=$last_id; // Storing user session value
    header("Location: perfil.php");

}
else
{
    echo "Este/a usuario/a no existe";
};
ob_end_flush();
?>