<?php
require("../config/conexion2.php");
 #Se obtiene el valor del input del usuario
$name = $_POST["nombre_usuario"];
$npas = $_POST["nro_pasaporte"]
$contraseña = $_POST["constraseña"];



$stmt = $db->prepare("SELECT nro_pasaporte FROM user WHERE unombre=$name AND nro_pasaporte=$npas AND contraseña=$contraseña"); 
$stmt->execute();
$count=$stmt->rowCount();
$data=$stmt->fetchAll();
if($count) {
    session_start();
    $_SESSION['nro_pasaporte']=$data->nro_pasaporte; // Storing user session value
    header("Location: perfil.php");

}
else
{
    echo "Este/a usuario/a no existe";
};
?>