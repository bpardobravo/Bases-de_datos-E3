<?php include('../templates/index.html');   ?>

<body class="subpage">
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
$instalacion = $_POST["tipo_instalacion"];
$patente = $_POST["patente"];
$fecha_1 = $_POST["fecha_1"];
$fecha_2 = $_POST["fecha_2"];
$puerto = $_POST["puerto"];
  #Se construye la consulta como un string
  if ($instalacion == 'muelle'){
    $query = "SELECT instalaciones.iid, instalaciones_validas.cantidad, instalaciones.capacidad from instalaciones, (select instalaciones_validas.iid, count(permisos.atraque) as cantidad from permisos, permisootorgado, (select instalaciones.iid, instalaciones.capacidad from instalaciones, puertosinstalaciones, puertos where puertos.pid = $puerto and puertos.pid = puertosinstalaciones.pid and puertosinstalaciones.iid = instalaciones.iid and instalaciones.tipo = '$instalacion') as instalaciones_validas where permisos.peid = permisootorgado.peid and permisootorgado.iid = instalaciones_validas.iid and permisos.atraque >= '$fecha_1 00:00:00' and permisos.atraque <= '$fecha_1 23:59:59' group by instalaciones_validas.iid, instalaciones_validas.capacidad) as instalaciones_validas WHERE instalaciones.capacidad > instalaciones_validas.cantidad AND instalaciones.iid = instalaciones_validas.iid";
    $query2 = "SELECT instalaciones.iid from instalaciones, puertosinstalaciones, puertos where puertos.pid = puertosinstalaciones.pid and instalaciones.iid = puertosinstalaciones.iid and puertos.pid = $puerto and instalaciones.iid not in (select instalaciones.iid from instalaciones, (select instalaciones_validas.iid, instalaciones_validas.capacidad, count(permisos.atraque) as cantidad from permisos, permisootorgado, (select instalaciones.iid, instalaciones.capacidad from instalaciones, puertosinstalaciones, puertos where puertos.pid = $puerto and puertos.pid = puertosinstalaciones.pid and puertosinstalaciones.iid = instalaciones.iid and instalaciones.tipo = '$instalacion') as instalaciones_validas where permisos.peid = permisootorgado.peid and permisootorgado.iid = instalaciones_validas.iid and permisos.atraque >= '$fecha_1 00:00:00' and permisos.atraque <= '$fecha_1 23:59:59' group by instalaciones_validas.iid, instalaciones_validas.capacidad) as instalaciones_validas where instalaciones.capacidad > instalaciones_validas.cantidad and instalaciones.iid = instalaciones_validas.iid)";
  } else {
    $query = "SELECT * from capacidad_instalacion('" .$fecha_1 ."','" .$fecha_2 ."'," .$puerto .");";
  }
  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
    $buque = $result -> fetchAll();
  ?>
    <section id="post" class="wrapper bg-img" data-bg="Imagen_1.jpg">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Fechas disponibles</h2>
                </header>
                <div class="content">
                <table>
                    <tr>
                    <th>Identificación instalación</th><th>Ocupados</th><th>Cantidad límite</th>
                    </tr>
                    <?php
                        echo $puerto;
                        echo $instalacion;
                        echo $patente;
                        echo $fecha_1;
                        if ($instalacion == 'muelle'){
                            echo "<br/>yess<br/>";
                        }
                        foreach ($buque as $a) {
                            echo "<tr><td>$a[0]</td><td>$a[1]</td><td>$a[1]</td></tr>";
                        }
                    ?>
                    
                </table>
            </article>
        </div>
    </section>
	<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  #Se construye la consulta como un string
    $query = "SELECT * from promedio_uso('" .$inicio ."','" .$fin ."'," .$puerto .");";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$buque = $result -> fetchAll();
  ?>    
    <section id="post" class="wrapper bg-img" data-bg="Imagen_1.jpg">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Promedios de uso</h2>
                </header>
                <div class="content">
                <table>
                    <tr>
                    <th>Identificación instalación</th><th>Porcentaje de uso</th>
                    </tr>
                    <?php
                        // echo $atraques;
			foreach ($buque as $c) {
                        echo "<tr><td>$c[0]</td><td>$c[1]</td></tr>";
			}
                    ?>
                    
                </table>
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
