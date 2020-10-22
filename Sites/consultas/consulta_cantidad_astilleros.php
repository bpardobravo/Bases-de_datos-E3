<?php include('../templates/index.html');   ?>

<body class="subpage">
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $astilleros = $_POST["cantidad_astilleros"];
  $astilleros = intval($astilleros);


  #Se construye la consulta como un string
    $query = "SELECT nombre, cantidad FROM (SELECT puertos.nombre, COUNT (instalaciones.iid) AS cantidad FROM puertos, puertosinstalaciones, instalaciones WHERE puertos.pid = puertosinstalaciones.pid AND puertosinstalaciones.iid = instalaciones.iid AND tipo = 'astillero' GROUP BY puertos.nombre) AS tabla WHERE tabla.cantidad >= $astilleros;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
    $result = $db -> prepare($query);
    $result -> execute();
    $astillero = $result -> fetchAll();
  ?>
    <section id="post" class="wrapper bg-img" data-bg="Imagen_1.jpg">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Puertos y cantidad de astilleros.</h2>
                </header>
                <div class="content">
                <table>
                    <tr>
                    <th>Puerto</th><th>Cantidad</th>
                    </tr>
                    <?php
                    echo "Puertos con $astilleros o más astilleros";
                        // echo $atraques;
                        foreach ($astillero as $a) {
                        echo "<tr><td>$a[0]</td><td>$a[1]</td></tr>";
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