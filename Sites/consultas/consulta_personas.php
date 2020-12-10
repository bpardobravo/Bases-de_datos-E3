<?php include('../templates/index.html');   ?>

<body class="subpage">
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion2.php");

  #Se obtiene el valor del input del usuario
  $nombre = strtoupper($_POST["nombre_usuario"]);

  #Se construye la consulta como un string
  $query = "SELECT * FROM usuario WHERE upper(usuario.unombre) LIKE '%$nombre%';";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$puerto = $result -> fetchAll();
  ?>
    <section id="post" class="wrapper bg-img" data-bg="Imagen_1.jpg">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Personas que puedes estar buscando:</h2>
                </header>
                <div class="content">
                <table>
                    <tr>
                    <th>Nombre persona</th>
                    <th>Perfil</th>
                    </tr>
                    <?php
                        // echo $atraques;
                        foreach ($puerto as $c) {
                        echo "<tr><td>$c[2]</td>";
                        echo "<form align='center' action='../acceso/perfil_persona.php' method='post'>";
                        echo "<input type='hidden' name = 'n_pasaporte' value='$c[1]'>";
                        echo "<td><input type='submit' value='Ver Perfil'></td></tr>";
                        echo "</form>";
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
