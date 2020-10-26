<?php
require("../config/conexion2.php");

if(!empty($_POST['numero_pasaporte'])&&!empty($_POST['nombre_usuario'])&&!empty($_POST['edad'])&&!empty($_POST['gender'])&&!empty($_POST['nacionalidad'])&&&!empty($_POST['constraseña'])){
// $n = $_POST["numero_pasaporte"];
// echo "$n";
// if(!empty($n)){

    $name = $_POST["nombre_usuario"];
    $edad = $_POST["edad"];
    $gender = $_POST["gender"];
    $nac = $_POST["nacionalidad"];
    $npas = $_POST["numero_pasaporte"];
    $contraseña = $_POST["constraseña"];

    $st = $db->prepare("SELECT nro_pasaporte FROM user WHERE nro_pasaporte=$npas;"); 
    // $st->bindname", $username,PDO::PARAM_STR);
    // $st->bindParam("email", $email,PDO::PARAM_STR);Param("user
    $st->execute();
    $count=$st->rowCount();

    if($count<1){
        $stmt = $db->prepare("INSERT INTO user(nro_pasaporte, unombre, sexo, nacionalidad, contraseña) VALUES ($npas, $name, $gender, $nac, $contraseña);");
        $stmt->execute();
        // $uid=$db->lastInsertId(); // Last inserted row id
        session_start();
        $_SESSION['nro_pasaporte']=$npas;
        header("Location: perfil.php");
    
    }
    else {
        echo "Este/a usuario/a ya existe";
    };

}
else {
    echo "Por favor ingrese los datos solicitados";
};
?>