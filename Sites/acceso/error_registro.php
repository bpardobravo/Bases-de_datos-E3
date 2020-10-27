<?php include('../templates/index.html');   ?>
<body class="subpage">
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
//   require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
//   $nombre_usuario = $_POST["nombre_usuario"];
//   $edad = $_POST["edad"];
//   $gender = $_POST["gender"];
//   $nacionalidad = $_POST["nacionalidad"];
//   $numero_pasaporte = $_POST["nombre_pasaporte"];
//   $contraseña = $_POST["constraseña"];

?>
    <section id="post" class="wrapper bg-img" data-bg="Imagen_2.jpg">
        <div class="inner">
            <article class="box">
                <div class="content">
                    <?php
                        echo '<h1>Se ha producido algún error con los datos, por favor, vuelve a intentarlo</h1>';
                        echo '<form align="center" action="registrarse.php" method="get">';
                            echo '<br/><br/>';
                            echo '<input type="submit" value="Volver">';
                        echo '</form>';
                    
                        // echo '<h1>¡Bienvenid@ a nuestra comunidad!</h1>';
                        // echo '<form align="center" action="inicio.php" method="get">';
                        //     echo '<br/><br/>';
                        //     echo '<input type="submit" value="Entrar">';
                        // echo '</form>';
                        
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