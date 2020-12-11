<?php include('../templates/index.html');   ?>

<body class="subpage">

<?php
ob_start();
include('../templates/generic.html');  
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion2.php");  
    // session_start();
    ob_end_flush();
$user_buscar = $_POST["id_user"];
$fecha1 = $_POST["fecha_1"];
$fecha2 = $_POST["fecha_2"];
$desired = explode(",", $_POST['desired']);
$required = explode(",",$_POST['required']);
$forbidden =  explode(",", $_POST['forbidden']);
$sender = $_SESSION['id'];
// $fecha = date("Y-m-d");
// falta el manejo de latitud y longitud, y meter a los usuarios nuevos a la base de mongo, para que la api no piense que el mensaje es de un usuario inexistente
// podriamos hacer que cuando un usuario mande un mensaje por primera vez, llame a create user de la api
// $arr = array('user_id' => $user_buscar, 'fecha_st' => $fecha1, 'fecha_end' => $fecha2, 'key_words' => array('forbidden' => $forbidden, 'required' => $required, 'desired' => $desired, 'user_id' => $user_buscar));
// $informacion = json_encode($arr);
// echo $user_buscar;
$data = array(
    'desired' => $desired,
    'required' => $required,
    'forbidden' => $forbidden,
    'userID' => intval($user_buscar)
);

$options = array(
    'http' => array(
    'method'  => 'GET',
    'content' => json_encode( $data ),
    'header'=>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
    )
);

$context  = stream_context_create( $options );
$result = file_get_contents( 'https://barcos.herokuapp.com/text-search', false, $context );
$response = json_decode($result, true);

echo $response['mid'];
echo '**************1';
foreach ($response as $message){
    echo $message['mid'];
    echo '**************2';
    $data_m = array(
        'fecha_inicio' => $fecha1,
        'fecha_fin' => $fecha2,
        'id' => intval($message['mid'])
    );


    $options = array(
        'http' => array(
        'method'  => 'GET',
        'content' => json_encode( $data_m ),
        'header'=>  "Content-Type: application/json\r\n" .
                    "Accept: application/json\r\n"
        )
    );

    $context  = stream_context_create( $options );
    $result = file_get_contents( 'https://barcos.herokuapp.com/mensajes_por_fecha', false, $context );
    $response = json_decode($result, true);
    echo $response;
    $locations = array();
    if ($response['success'] == 'true') {
        $locations[$message['mid']] = array('lat' => $response['lat'], 'long' => $response['long']);
    };
};
echo $locations;
foreach ($locations as $loc) {
    echo "<tr> <td>$loc[0]</td> <td>$loc[1]</td>";
  };

$query1 = "SELECT puerto.pid, puerto.punombre, coordenada.lat, coordenada.long FROM usuario, personal, buque, naviera, atraque, puerto, coordenada WHERE usuario.nro_pasaporte = personal.nro_pasaporte AND personal.es_capitan = 1 AND personal.bid = buque.bid AND buque.nid = naviera.nid AND usuario.nro_pasaporte = '$user_buscar' AND personal.bid = atraque.bid AND puerto.pid = atraque.pid AND puerto.punombre = coordenada.punombre;";

#Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
$result1 = $db -> prepare($query1);
$result1 -> execute();
$puertos = $result1 -> fetchAll();
$loc_puertos = array();
foreach ($puertos as $p) {
    $loc_puertos[$p[1]] = array('lat' => $p[2], 'long' => $p[3]);
};

$marker_list = $locations;
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL,"https://barcos.herokuapp.com/send_loc");
// curl_setopt($ch, CURLOPT_GET, TRUE);
// //en la siguiente linea de curl_setopt va la info de post, pero no esta testeado
// curl_setopt($ch, CURLOPT_GETFIELDS, $informacion);

// //los comentarios de aquí hacia abajo son de php.net de donde saqué código

// // recibimos la respuesta y la guardamos en una variable
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $remote_server_output = curl_exec ($ch);
 
// // cerramos la sesión cURL
// curl_close ($ch);
 
// // hacemos lo que queramos con los datos recibidos
// // por ejemplo, los mostramos
// print_r($remote_server_output);
// ?>
 <section id="banner" class="wrapper post bg-img" data-bg="Imagen_1">
        <div class="inner">
            <h1>Ubicación Mensajes</h1>
        </div>
    </section>

    <section id="post" class="wrapper bg-img" data-bg="Imagen_1.jpg">
        <div class="inner">
            <article class="box">
                <div id="mapid" style="height:500px">
                    
                </div>
            </article>
        </div>
    </section>
<!-- Scripts -->
    <script src="styles/js/jquery.min.js"></script>
    <script src="styles/js/jquery.scrolly.min.js"></script>
    <script src="styles/js/jquery.scrollex.min.js"></script>
    <script src="styles/js/skel.min.js"></script>
    <script src="styles/js/util.js"></script>
    <script src="styles/js/main.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    <script>
        var mymap = L.map('mapid').setView([<?php echo $lat ?>, <?php echo $long ?>], 10);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(mymap);
        // acá abajo va la lista y todo eso
        <?php foreach($marker_list as $marker) {
        echo
        'L.marker([' . $marker["lat"] . ',' . $marker["long"] . ']).addTo(mymap);';}; ?>
    </script>

</body>