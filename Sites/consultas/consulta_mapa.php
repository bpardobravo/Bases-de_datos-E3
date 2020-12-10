<?php include('../templates/index.html');   ?>

<body class="subpage">

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion2.php");

  #Se obtiene el valor del input del usuario

  #Se construye la consulta como un string
    $query = "SELECT nnombre, nid FROM naviera;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
    $naviera = $result -> fetchAll();
    $lat = -33.5;
    $long = -70.5;
  ?>

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
    </script>

</body>
