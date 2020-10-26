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
  } else {
    $query = "SELECT instalaciones.iid, instalaciones_validas.cantidad, instalaciones.capacidad from instalaciones, (select instalaciones_validas.iid, count(permisos.atraque) as cantidad from permisos, permisootorgado, (select instalaciones.iid, instalaciones.capacidad from instalaciones, puertosinstalaciones, puertos where puertos.pid = $puerto and puertos.pid = puertosinstalaciones.pid and puertosinstalaciones.iid = instalaciones.iid and instalaciones.tipo = '$instalacion') as instalaciones_validas where permisos.peid = permisootorgado.peid and permisootorgado.iid = instalaciones_validas.iid and permisos.atraque >= '$fecha_1 00:00:00' and permisos.atraque <= '$fecha_2 23:59:59' group by instalaciones_validas.iid, instalaciones_validas.capacidad) as instalaciones_validas WHERE instalaciones.capacidad > instalaciones_validas.cantidad AND instalaciones.iid = instalaciones_validas.iid";
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
                    <h2>Instalaciones ocupadas que tienen capacidad</h2>
                </header>
                <div class="content">
                <table>
                    <tr>
                    <th>Identificación instalación</th><th>Ocupados</th><th>Capacidad máxima</th>
                    </tr>
                    <?php
                        foreach ($buque as $a) {
                            echo "<tr><td>$a[0]</td><td>$a[1]</td><td>$a[2]</td></tr>";
                        }
                        require("../config/conexion.php");
                        if ($instalacion == 'muelle'){
                            $query = "SELECT instalaciones.iid, instalaciones.capacidad from instalaciones, puertosinstalaciones, puertos where puertos.pid = puertosinstalaciones.pid and instalaciones.iid = puertosinstalaciones.iid and puertos.pid = $puerto and instalaciones.iid not in (select instalaciones.iid from instalaciones, (select instalaciones_validas.iid, instalaciones_validas.capacidad, count(permisos.atraque) as cantidad from permisos, permisootorgado, (select instalaciones.iid, instalaciones.capacidad from instalaciones, puertosinstalaciones, puertos where puertos.pid = $puerto and puertos.pid = puertosinstalaciones.pid and puertosinstalaciones.iid = instalaciones.iid and instalaciones.tipo = '$instalacion') as instalaciones_validas where permisos.peid = permisootorgado.peid and permisootorgado.iid = instalaciones_validas.iid and permisos.atraque >= '$fecha_1 00:00:00' and permisos.atraque <= '$fecha_1 23:59:59' group by instalaciones_validas.iid, instalaciones_validas.capacidad) as instalaciones_validas where instalaciones.capacidad > instalaciones_validas.cantidad and instalaciones.iid = instalaciones_validas.iid)";
                        } else {
                            $query = "SELECT instalaciones.iid, instalaciones.capacidad from instalaciones, puertosinstalaciones, puertos where puertos.pid = puertosinstalaciones.pid and instalaciones.iid = puertosinstalaciones.iid and puertos.pid = $puerto and instalaciones.iid not in (select instalaciones.iid from instalaciones, (select instalaciones_validas.iid, instalaciones_validas.capacidad, count(permisos.atraque) as cantidad from permisos, permisootorgado, (select instalaciones.iid, instalaciones.capacidad from instalaciones, puertosinstalaciones, puertos where puertos.pid = $puerto and puertos.pid = puertosinstalaciones.pid and puertosinstalaciones.iid = instalaciones.iid and instalaciones.tipo = '$instalacion') as instalaciones_validas where permisos.peid = permisootorgado.peid and permisootorgado.iid = instalaciones_validas.iid and permisos.atraque >= '$fecha_1 00:00:00' and permisos.atraque <= '$fecha_2 23:59:59' group by instalaciones_validas.iid, instalaciones_validas.capacidad) as instalaciones_validas where instalaciones.capacidad > instalaciones_validas.cantidad and instalaciones.iid = instalaciones_validas.iid)";
                        }
                        $result = $db -> prepare($query);
                        $result -> execute();
                        $buque = $result -> fetchAll();
                        foreach ($buque as $c) {
                            echo "<tr><td>$c[0]</td><td>0</td><td>$c[1]</td></tr>";
                        }
                    ?>
                </table>
                <form align="center" action="../acceso/generar_permiso.php" method="get">
                        Generar permiso para la instalación:
                        <br/><br/>
                        <?php
                        foreach ($buque as $a) {
                            echo "<input type='radio' id=$a[0] name='instalacion' value=$a[0]>";
                            echo "<label for=$a[0]>$a[0]</label>";
                        }
                        require("../config/conexion.php");
                        if ($instalacion == 'muelle'){
                            $query = "SELECT instalaciones.iid, instalaciones_validas.cantidad, instalaciones.capacidad from instalaciones, (select instalaciones_validas.iid, count(permisos.atraque) as cantidad from permisos, permisootorgado, (select instalaciones.iid, instalaciones.capacidad from instalaciones, puertosinstalaciones, puertos where puertos.pid = $puerto and puertos.pid = puertosinstalaciones.pid and puertosinstalaciones.iid = instalaciones.iid and instalaciones.tipo = '$instalacion') as instalaciones_validas where permisos.peid = permisootorgado.peid and permisootorgado.iid = instalaciones_validas.iid and permisos.atraque >= '$fecha_1 00:00:00' and permisos.atraque <= '$fecha_1 23:59:59' group by instalaciones_validas.iid, instalaciones_validas.capacidad) as instalaciones_validas WHERE instalaciones.capacidad > instalaciones_validas.cantidad AND instalaciones.iid = instalaciones_validas.iid";
                        } else {
                            $query = "SELECT instalaciones.iid, instalaciones_validas.cantidad, instalaciones.capacidad from instalaciones, (select instalaciones_validas.iid, count(permisos.atraque) as cantidad from permisos, permisootorgado, (select instalaciones.iid, instalaciones.capacidad from instalaciones, puertosinstalaciones, puertos where puertos.pid = $puerto and puertos.pid = puertosinstalaciones.pid and puertosinstalaciones.iid = instalaciones.iid and instalaciones.tipo = '$instalacion') as instalaciones_validas where permisos.peid = permisootorgado.peid and permisootorgado.iid = instalaciones_validas.iid and permisos.atraque >= '$fecha_1 00:00:00' and permisos.atraque <= '$fecha_2 23:59:59' group by instalaciones_validas.iid, instalaciones_validas.capacidad) as instalaciones_validas WHERE instalaciones.capacidad > instalaciones_validas.cantidad AND instalaciones.iid = instalaciones_validas.iid";
                        }
                        $result = $db -> prepare($query);
                        $result -> execute();
                        $buque = $result -> fetchAll();
                        foreach ($buque as $a) {
                            echo "<input type='radio' id=$a[0] name='instalacion' value=$a[0]>";
                            echo "<label for=$a[0]>$a[0]</label>";
                        }
                        echo "<input type='hidden' name='puerto' value='$puerto'>";
                        echo "<input type='hidden' name='patente' value='$patente'>";
                        echo "<input type='hidden' name='fecha_1' value='$fecha_1'>";
                        echo "<input type='hidden' name='fecha_2' value='$fecha_2'>";
                        echo "<input type='hidden' name='instalacion' value='$instalacion'>";
                        ?>
                        <br/><br/>
                        <input type="submit" value="Generar permiso">
                    </form>
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
