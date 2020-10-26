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
$descripcion = $_POST["descripcion"];
$maximo = 0;
  #Se construye la consulta como un string
  $query = "SELECT max(permisos.iid) FROM permisos";
  $result = $db -> prepare($query);
	$result -> execute();
    $permisos = $result -> fetchAll();
  foreach ($permisos as $p){
    $maximo = $p[0] + 1;
  }
  $query = "INSERT INTO permisos VALUES($maximo, '$fecha_1 00:00:00')";
  $result = $db -> prepare($query);
  $query = "INSERT INTO permisootorgado VALUES($maximo, $instalacion, '$patente')";
  $result = $db -> prepare($query);
  if ($instalacion == 'muelle'){
    $query = "INSERT INTO permisoscargadescarga VALUES($maximo, '$descripcion')";
    $result = $db -> prepare($query);
  } else {
    $query = "INSERT INTO permisosastillero VALUES($maximo, '$fecha_2 23:59:59')";
    $result = $db -> prepare($query);
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