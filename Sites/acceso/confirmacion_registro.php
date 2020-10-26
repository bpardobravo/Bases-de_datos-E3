<?php include('../templates/index.html');   ?>
<body class="subpage">
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $nombre_usuario = $_POST["nombre_usuario"];
  $edad = $_POST["edad"];
  $gender = $_POST["gender"];
  $nacionalidad = $_POST["nacionalidad"];
  $numero_pasaporte = $_POST["nombre_pasaporte"];
  $contraseña = $_POST["constraseña"];

?>
    <section id="post" class="wrapper bg-img" data-bg="Imagen_2.jpg">
        <div class="inner">
            <article class="box">
                <div class="content">
                    <?php
                        //lean eso:(
                        echo "<p>Se supone que aquí debería recibir los datos pero no sé pq no lo hace:( He fallado en ver esto, peero en caso de que todo esté okk debería aparecer un botón para ingresar jj</p>";
                        if (empty($nombre_usuario)){
                            echo '<p>Te faltó ingresar tu nombre</p>';
                            echo "<p>$nombre_usuario</p>";
                            echo "<p>hellou</p>";
                        }
                        if (empty($edad)){
                            echo '<p>Te faltó ingresar tu edad</p>';
                        }
                        if (empty($gender)){
                            echo '<p>Te faltó ingresar tu género</p>';
                        }
                        if (empty($nacionalidad)){
                            echo '<p>Te faltó ingresar tu nacionalidad</p>';
                        }
                        if (empty($numero_pasaporte)){
                            echo '<p>Te faltó ingresar tu número de pasaporte</p>';
                        }
                        if (empty($contraseña)){
                            echo '<p>Te faltó ingresar tu contraseña</p>';
                        }
                        // aquí falta poner la condición de que no puede tener el mismo n° de pasaporte y ponerle un mensaje arriba
                        if (empty($nombre_usuario) or empty($edad) or empty($gender) or empty($nacionalidad) or empty($numero_pasaporte) or empty($contraseña)){
                            echo '<form align="center" action="registrarse.php" method="get">';
                                echo '<br/><br/>';
                                echo '<input type="submit" value="Volver">';
                            echo '</form>';
                        } else {
                            echo '<h1>¡Bienvenid@ a nuestra comunidad!</h1>';
                            echo '<form align="center" action="inicio.php" method="get">';
                                echo '<br/><br/>';
                                echo '<input type="submit" value="Entrar">';
                            echo '</form>';
                        }
                    ?>
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