<?php include('../templates/index.html');   ?>

<body class="subpage">
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $mes = $_POST["mes"];
  $año = $_POST["año"];
  $mes2 = "none";
  $año2 = $_POST["año"];
  if (intval($mes) == 12){
      $mes2 = '01';
      $año2 = strval(intval($mes) + 1);
  } elseif (intval($mes) == 1){
    $mes2 = '02';
} elseif (intval($mes) == 2){
    $mes2 = '03';
} elseif (intval($mes) == 3){
    $mes2 = '04';
} elseif (intval($mes) == 4){
    $mes2 = '05';
} elseif (intval($mes) == 5){
    $mes2 = '06';
} elseif (intval($mes) == 6){
    $mes2 = '07';
} elseif (intval($mes) == 7){
    $mes2 = '08';
} elseif (intval($mes) == 8){
    $mes2 = '09';
} elseif (intval($mes) == 9){
    $mes2 = '10';
} elseif (intval($mes) == 10){
    $mes2 = '11';
} elseif (intval($mes) == 11){
    $mes2 = '12';
} 


  #Se construye la consulta como un string
    $query = "SELECT nombre, MAX(barcos_recibidos) AS cantidad
    FROM (SELECT puertos.nombre, COUNT (puertos.pid) AS barcos_recibidos
    FROM permisos, permisootorgado, instalaciones, puertosinstalaciones, puertos
    WHERE permisos.peid = permisootorgado.peid AND permisootorgado.iid = instalaciones.iid 
    AND instalaciones.iid = puertosinstalaciones.iid AND puertosinstalaciones.pid = puertos.pid
    AND atraque >= '$año-$mes-01' AND atraque < '$año2-$mes2-01'
    GROUP BY puertos.pid) AS tabla GROUP BY tabla.nombre;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$ciudad = $result -> fetchAll();
  ?>
    <section id="post" class="wrapper bg-img" data-bg="Imagen_1.jpg">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Puerto que ha recibido más barcos en la fecha</h2>
                </header>
                <div class="content">
                <table>
                    <tr>
                    <th>Puerto</th><th>Cantidad</th>
                    </tr>
                    <?php
                    echo "En $mes del $año";
                        // echo $atraques;
                        foreach ($ciudad as $c) {
                        echo "<tr><td>$c[0]</td><td>$c[1]</td></tr>";
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