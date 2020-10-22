<?php include('../templates/index.html');   ?>

<body class="subpage">
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $puerto = strtoupper($_POST["nombre_puerto"]);

  #Se construye la consulta como un string
    $query = "SELECT puertos.nombre, AVG(edad) AS edad_promedio FROM personal, personalinstalacion, instalaciones, puertosinstalaciones, puertos WHERE personal.rut = personalinstalacion.rut AND personalinstalacion.iid = instalaciones.iid AND instalaciones.iid = puertosinstalaciones.iid AND puertosinstalaciones.pid = puertos.pid AND upper(puertos.nombre) LIKE '%$puerto%'  GROUP BY puertos.nombre ;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$edad_promedio = $result -> fetchAll();
  ?>
    <section id="post" class="wrapper bg-img" data-bg="Imagen_1.jpg">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Edad Promedio de los trabajadores de los puertos.</h2>
                </header>
                <div class="content">
                <table>
                    <tr>
                    <th>Puerto</th><th>Edad Promedio</th>
                    </tr>
                    <?php
                    echo "Edad promedio de los trabajadores del puerto $puerto";
                        // echo $atraques;
                        foreach ($edad_promedio as $edad) {
                        echo "<tr><td>$edad[0]</td><td>$edad[1]</td></tr>";
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