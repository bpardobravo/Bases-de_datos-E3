<?php include('../templates/index.html');   ?>

<body class="subpage">
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $puerto = strtoupper($_POST["nombre_puerto"]);

  #Se construye la consulta como un string
    $query = "SELECT personal.rut, personal.nombre, personal.edad, personal.sexo FROM puertos, puertosinstalaciones, instalaciones, jefeinstalacion, personal WHERE puertos.pid = puertosinstalaciones.pid AND puertosinstalaciones.iid = instalaciones.iid AND jefeinstalacion.iid = instalaciones.iid AND personal.rut = jefeinstalacion.rut AND upper(puertos.nombre) LIKE '%$puerto%';";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$jefe = $result -> fetchAll();
  ?>
    <section id="post" class="wrapper bg-img" data-bg="Imagen_1.jpg">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Jefes de Instalaciones del puerto.</h2>
                </header>
                <div class="content">
                <table>
                    <tr>
                    <th>RUT</th><th>Nombre</th><th>Edad</th><th>Sexo</th>
                    </tr>
                    <?php
                    echo $puerto;
                        // echo $atraques;
                        foreach ($jefe as $j) {
                        echo "<tr><td>$j[0]</td><td>$j[1]</td><td>$j[2]</td><td>$j[3]</td></tr>";
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
