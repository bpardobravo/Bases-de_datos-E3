<?php
ob_start();
require("../config/conexion2.php");
// $name = $_POST["nombre_usuario"];
// $edad = $_POST["edad"];
// $gender = $_POST["gender"];
// $nac = $_POST["nacionalidad"];
// $npas = $_POST["numero_pasaporte"];
// $contraseña = $_POST["contraseña"];
// echo "$name\n";
// echo "$edad";
// echo "$gender";
// echo "$nac";
// echo "$npas";
// echo "$contraseña";
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
        // $stmt = $db->prepare("INSERT INTO usuario(nro_pasaporte, unombre, edad, sexo, nacionalidad, contraseña) VALUES ($npas, $name, $edad, $gender, $nac, $contrasena);");
        // $stmt->execute();
        $sql = "INSERT INTO usuario(nro_pasaporte, unombre, edad, sexo, nacionalidad, contraseña) VALUES ('$npas', '$name', $edad, '$gender', '$nac', '$contrasena');";
        $stmt = $db->prepare($sql);
        // echo "$contrasena";
        // pass values to the statement
        // $stmt->bindValue(':nro_pasaporte', $npas);
        // $stmt->bindValue(':unombre', $name);
        // $stmt->bindValue(':edad', $edad);
        // $stmt->bindValue(':contraseña', $contrasena);
        // $stmt->bindValue(':sexo', $gender);
        // $stmt->bindValue(':nacionalidad', $nac);
        
        
        // execute the insert statement
        if ($stmt->execute()) {
            session_start();
            $last_id = $db->lastInsertId();
            $_SESSION['id']=$last_id;
            header("Location: perfil.php");
        }
        else {
            
            echo "pucha no :c";
        };
        
    
    }
    else {
        echo "Este/a usuario/a ya existe";
    };

}
else {
    echo "Por favor ingrese los datos solicitados";
};
ob_end_flush();
?>