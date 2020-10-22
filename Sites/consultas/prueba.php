<?php include('../templates/index.html');   ?>

<body class="subpage">
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion2.php");

  #Se obtiene el valor del input del usuario
  $puerto = strtoupper($_POST["nombre_puerto"]);

  #Se construye la consulta como un string
    $query = "SELECT nnombre FROM naviera;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$ciudad = $result -> fetchAll();
  ?>
    <section id="post" class="wrapper bg-img" data-bg="Imagen_1.jpg">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Puertos y sus ciudades</h2>
                </header>
                <div class="content">
                <table>
                    <tr>
                    <th>Puerto</th><th>Ciudad</th>
                    </tr>
                    <?php
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