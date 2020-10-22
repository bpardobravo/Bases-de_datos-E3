<?php include('../templates/index.html');   ?>

<body class="subpage">
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $barco = strtoupper($_POST["nombre_barco"]);
  $ciudad = strtoupper($_POST["nombre_ciudad"]);

  #Se construye la consulta como un string
    $query = "SELECT barco.nombre, permisos.atraque, puertos.nombre FROM barco, permisootorgado, instalaciones, puertosinstalaciones, puertos, permisos WHERE barco.patente = permisootorgado.patente AND instalaciones.iid = puertosinstalaciones.iid AND puertosinstalaciones.pid = puertos.pid AND instalaciones.iid = permisootorgado.iid AND permisos.peid = permisootorgado.peid AND upper(barco.nombre) LIKE '%$barco%' AND upper(puertos.ciudad) LIKE '%$ciudad%';";
    
    
  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$atraques = $result -> fetchAll();
  ?>
    <section id="post" class="wrapper bg-img" data-bg="Imagen_1.jpg">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Veces que atraca un barco en una ciudad.</h2>
                </header>
                <div class="content">
                <table>
                    <tr>
                    <th>Barco</th><th>Fecha atraque</th><th>Puerto en que atracó</th>
                    </tr>
                    <?php
                    echo "Veces en que el barco $barco atraca en la ciudad $ciudad";
                        // echo $atraques;
                        foreach ($atraques as $c) {
                        echo "<tr><td>$c[0]</td><td>$c[1]</td><td>$c[2]</td></tr>";
                    }
                    ?>
                    
                </table>
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

</body>