<?php
ob_start();
require("../config/conexion2.php");
session_start()
if(!empty($_POST['old'])&&!empty($_POST['new'])){


    $old = $_POST["old"];
    $new = $_POST["new"];
    $user = $_SESSION['nro_pasaporte']

    $st = $db->prepare("SELECT contraseña FROM usuario WHERE contraseña='$old';"); 
    $st->execute();
    $count=$st->rowCount();

    if($count<1){
        
        $sql = "UPDATE usuario set contraseña = '$new'  WHERE usuario.nro_pasaporte = '$user';";
        $stmt = $db->prepare($sql);
    
        // execute the insert statement
        if ($stmt->execute()) {
            echo '<script language="javascript">';
            echo 'alert("contraseña cambiada correctamente")';
            echo '</script>';
            header("Location: perfil.php");
        }
        else {
            
            // echo "pucha no :c";
            header("Location: error_registro.php");
        };
        
    
    }
    else {
        // echo "Este/a usuario/a ya existe";
        header("Location: error_registro.php");
    };

}
else {
    // echo "Por favor ingrese los datos solicitados";
    header("Location: error_registro.php");
};
ob_end_flush();
?>