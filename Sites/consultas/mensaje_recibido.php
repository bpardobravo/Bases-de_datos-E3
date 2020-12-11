<?php
ob_start();
include('../templates/generic.html');  
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion2.php");  
    session_start();
    ob_end_flush();
$receptor = $_POST["nombre_receptor"];
$mensaje = $_POST["Mensaje"];
$sender = $_SESSION['id'];
$fecha = date("Y-m-d");
// falta el manejo de latitud y longitud, y meter a los usuarios nuevos a la base de mongo, para que la api no piense que el mensaje es de un usuario inexistente
// podriamos hacer que cuando un usuario mande un mensaje por primera vez, llame a create user de la api
$arr = array('date' => $fecha, 'lat' => 999, 'long' => 999, 'message' => $mensaje, 'mid' => 999, 'receptant' => $receptor, 'sender' => $sender);
$informacion = json_encode($arr);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://barcos.herokuapp.com/messages");
curl_setopt($ch, CURLOPT_POST, TRUE);
//en la siguiente linea de curl_setopt va la info de post, pero no esta testeado
curl_setopt($ch, CURLOPT_POSTFIELDS, $informacion);

//los comentarios de aquí hacia abajo son de php.net de donde saqué código

// recibimos la respuesta y la guardamos en una variable
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$remote_server_output = curl_exec ($ch);
 
// cerramos la sesión cURL
curl_close ($ch);
 
// hacemos lo que queramos con los datos recibidos
// por ejemplo, los mostramos
print_r($remote_server_output);
?>
<?php
ob_start();
include('../templates/generic.html');  
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion2.php");  
    session_start();
    ob_end_flush();
$receptor = $_POST["nombre_receptor"];
$mensaje = $_POST["Mensaje"];
$sender = $_SESSION['id'];
$fecha = date("Y-m-d");
// falta el manejo de latitud y longitud, y meter a los usuarios nuevos a la base de mongo, para que la api no piense que el mensaje es de un usuario inexistente
// podriamos hacer que cuando un usuario mande un mensaje por primera vez, llame a create user de la api
$arr = array('date' => $fecha, 'lat' => 999, 'long' => 999, 'message' => $mensaje, 'mid' => 999, 'receptant' => $receptor, 'sender' => $sender);
$informacion = json_encode($arr);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://barcos.herokuapp.com/messages");
curl_setopt($ch, CURLOPT_POST, TRUE);
//en la siguiente linea de curl_setopt va la info de post, pero no esta testeado
curl_setopt($ch, CURLOPT_POSTFIELDS, $informacion);

//los comentarios de aquí hacia abajo son de php.net de donde saqué código

// recibimos la respuesta y la guardamos en una variable
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$remote_server_output = curl_exec ($ch);
 
// cerramos la sesión cURL
curl_close ($ch);
 
// hacemos lo que queramos con los datos recibidos
// por ejemplo, los mostramos
print_r($remote_server_output);
?>
