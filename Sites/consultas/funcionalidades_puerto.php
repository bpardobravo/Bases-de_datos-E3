<?php include('../templates/index.html');   ?>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion2.php");

  #Se obtiene el valor del input del usuario
    $puerto = $_GET["val"];
  #Se construye la consulta como un string
    $query = "SELECT bnombre, patente, tipo FROM buque WHERE nid = $puerto;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$buque = $result -> fetchAll();
?>
<body>
<!-- one -->
    <section id="one" class="wrapper post bg-img" data-bg="Imagen_1">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Mostrar puertos junto a las ciudades a las que pertenecen.</h2>
                </header>
                <div class="content">
                    <form align="center" action="consulta_puertos_ciudades.php" method="post">
                    Nombre del puerto:
                        <input type="text" name="nombre_puerto">
                        <br/><br/>
                        <input type="submit" value="Buscar">
                    </form>
                </div>
            </article>
        </div>
        <a href="#two" class="more">Más consultas</a>
    </section>

<!-- two -->
    <section id="two" class="wrapper post bg-img" data-bg="Imagen_2">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Mostrar jefes de instalaciones de distintos puertos.</h2>
                </header>
                <div class="content">
                    <form align="center" action="consultas/consulta_jefes_puertos.php" method="post">
                        Nombre del puerto:
                        <input type="text" name="nombre_puerto">
                        <br/><br/>
                        <input type="submit" value="Buscar">
                    </form>
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
