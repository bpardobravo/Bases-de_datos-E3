<?php include('templates/index.html');   ?>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("config/conexion.php");

  #Se obtiene el valor del input del usuario
$idpuerto = $_GET["val"];
  #Se construye la consulta como un string
  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
  ?>
<body>
<!-- one -->
    <section id="one" class="wrapper post bg-img" data-bg="Imagen_6">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Consultar capacidades y ocupación entre 2 fechas</h2>
                </header>
                <div class="content">
                    <form align="center" action="consultas/consulta_capacidad.php" method="post">
                        Fecha inicial:
                        <input type="text" name="fechaini">
                        Fecha final:
                        <input type="text" name="fechafin">
                        <br/>
			<?php
			echo '<input type="hidden" name="puerto" value=' .$idpuerto .'>';
			?>
			<br/>
                        <input type="submit" value="Buscar">
                    </form>
            </article>
        </div>
        <a href="#two" class="more">Más consultas</a>
    </section>

<!-- two -->
    <section id="two" class="wrapper post bg-img" data-bg="Imagen_6">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Consultar capacidad y generar permiso</h2>
                </header>
                <div class="content">
                    <form align="center" action="INSERTARFUNCIONALIDADAQUI.php" method="post">
                        Tipo
                        <input type="text" name="tipo">
                        <br/>
                        Fecha 1:
                        <input type="text" name="fecha1">
			Fecha 2:
                        <input type="text" name="fecha2">
                        <br/><br/>
			Patente:
                        <input type="text" name="patente">
                        <input type="submit" value="Buscar">
                    </form>
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
