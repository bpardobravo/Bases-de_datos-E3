<?php include('../templates/generic.html');   ?>
<body>
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
    <section id="one" class="wrapper post bg-img" data-bg="Imagen_1">
        <div class="inner">
            <article class="box">
                <h2  align="center">¡Tu permiso ha sido generado con éxito!</h2>
                <h5>Puedes seguir navegando por nuestro sitio.</h5>
                <div class="content">
                    <form align="center" action="inicio.php" method="get">
                        <input type="submit" value="Volver a inicio">
                    </form>
                </div>
            </article>
        </div>
    </section>
<!-- Scripts -->
    <script src="../styles/js/jquery.min.js"></script>
    <script src="../styles/js/jquery.scrolly.min.js"></script>
    <script src="../styles/js/jquery.scrollex.min.js"></script>
    <script src="../styles/js/skel.min.js"></script>
    <script src="../styles/js/util.js"></script>
    <script src="../styles/js/main.js"></script>

</body>