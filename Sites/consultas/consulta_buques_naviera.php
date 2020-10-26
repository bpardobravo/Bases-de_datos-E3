<?php include('../templates/index.html');   ?>

<body class="subpage">
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion2.php");

  #Se obtiene el valor del input del usuario
$naviera = $_GET["val"];
  #Se construye la consulta como un string
    $query = "SELECT bnombre, patente, tipo FROM buque WHERE nid = $naviera;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$buque = $result -> fetchAll();
  ?>
    <section id="post" class="wrapper bg-img" data-bg="Imagen_1.jpg">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Buques petróleo</h2>
                </header>
                <div class="content">
                <table>
                    <tr>
                    <th>Nombre Buque</th><th>Patente</th><th>Tipo</th>
                    </tr>
                    <?php
                        // echo $atraques;
                        foreach ($buque as $c) {
			if ($c[2] == "petrolero"){
                        echo "<tr><td>$c[0]</td><td>$c[1]</td><td>$c[2]</td></tr>";
			}
                    }
                    ?>
                    
                </table>
		<header>
                    <h2>Buques carga</h2>
                </header>
                <div class="content">
                <table>
                    <tr>
                    <th>Nombre Buque</th><th>Patente</th><th>Tipo</th>
                    </tr>
                    <?php
                        // echo $atraques;
                        foreach ($buque as $c) {
			if ($c[2] == "carga"){
                        echo "<tr><td>$c[0]</td><td>$c[1]</td><td>$c[2]</td></tr>";
			}
                    }
                    ?>
                    
                </table>
		<header>
                    <h2>Buques pesquero</h2>
                </header>
                <div class="content">
                <table>
                    <tr>
                    <th>Nombre Buque</th><th>Patente</th><th>Tipo</th>
                    </tr>
                    <?php
                        // echo $atraques;
                        foreach ($buque as $c) {
			if ($c[2] == "pesquero"){
                        echo "<tr><td>$c[0]</td><td>$c[1]</td><td>$c[2]</td></tr>";
                    }
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
