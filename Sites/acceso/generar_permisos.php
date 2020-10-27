<?php include('../templates/generic.html');   ?>
<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
$instalacion = $_POST["instalacion"];
$instalacion_tipo = $_POST["instalacion_tipo"];
$patente = $_POST["patente"];
$fecha_1 = $_POST["fecha_1"];
$fecha_2 = $_POST["fecha_2"];
$puerto = $_POST["puerto"];
$descripcion = $_POST["descripcion"];
$maximo = 0;
$ejecuta = 0;
  #Se construye la consulta como un string
  $query = "SELECT max(peid) FROM permisos";
  $result = $db -> prepare($query);
	$result -> execute();
    $permisos = $result -> fetchAll();
  foreach ($permisos as $p){
    $maximo = $p[0] + 1;
  }
  $result = $db -> prepare("SELECT * FROM barco where barco.patente = '$patente'");
	$result -> execute();
    $permisos = $result -> fetchAll();
  foreach ($permisos as $p){
    $result2 = $db -> prepare("INSERT INTO permisos (peid, atraque) VALUES($maximo, '$fecha_1 00:00:00');");
    $result2 -> execute();
    $result3 = $db -> prepare("INSERT INTO permisootorgado (peid, iid, patente) VALUES($maximo, $instalacion, '$patente');");
    $result3 -> execute();
    if ($instalacion_tipo == 'muelle'){
      $result4 = $db -> prepare("INSERT INTO permisoscargadescarga (peid, descripcion) VALUES($maximo, '$descripcion');");
      $result4 -> execute();
      $ejecuta = 1;
    } else {
      $result5 = $db -> prepare("INSERT INTO permisosastillero (peid, salida) VALUES($maximo, '$fecha_2 23:59:59');");
      $result5 -> execute();
      $ejecuta = 1;
    }
  }
  
  ?>
    <section id="one" class="wrapper post bg-img" data-bg="Imagen_1">
        <div class="inner">
            <article class="box">
            <?php
            if ($ejecuta == 1){
                  echo "<h2  align='center'>¡Tu permiso ha sido generado con éxito!</h2>";
                  echo "<h5>Puedes seguir navegando por nuestro sitio.</h5>";
                  echo "<div class='content'>";
                  echo "<form align='center' action='inicio.php' method='get'>";
                  echo "<input type='submit' value='Volver a inicio'>";
                  echo "</form>";
                  echo "</div>";
              } else {
                  echo "<h2  align='center'>¡No se ha podido generar tu permiso!</h2>";
                  echo "<h5>Debes ingresar una patente existente</h5>";
                  echo "<div class='content'>";
                  echo "<form align='center' action='inicio.php' method='get'>";
                  echo "<input type='submit' value='Volver a inicio'>";
                  echo "</form>";
                  echo "</div>";
              }
                ?>
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