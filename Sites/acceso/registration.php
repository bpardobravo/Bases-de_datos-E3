<?php
ob_start();
require("../config/conexion2.php");

if(!empty($_POST['numero_pasaporte'])&&!empty($_POST['nombre_usuario'])&&!empty($_POST['edad'])&&!empty($_POST['gender'])&&!empty($_POST['nacionalidad'])&&!empty($_POST['contraseña'])){


    $name = $_POST["nombre_usuario"];
    $edad = intval($_POST["edad"]);
    $gender = $_POST["gender"];
    $nac = $_POST["nacionalidad"];
    $npas = $_POST["numero_pasaporte"];
    $contrasena = $_POST["contraseña"];

    $st = $db->prepare("SELECT nro_pasaporte FROM usuario WHERE nro_pasaporte='$npas';"); 
    $st->execute();
    $count=$st->rowCount();

    if($count<1){
        
        $sql = "INSERT INTO usuario(nro_pasaporte, unombre, edad, sexo, nacionalidad, contraseña) VALUES ('$npas', '$name', $edad, '$gender', '$nac', '$contrasena');";
        $stmt = $db->prepare($sql);
    
        // execute the insert statement
        if ($stmt->execute()) {
            session_start();
            // $last_id = $db->lastInsertId();
            $_SESSION['nro_pasaporte']=$npas;
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