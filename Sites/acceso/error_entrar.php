<?php include('../templates/index.html');   ?>
<body class="subpage">
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $nombre_usuario = $_POST["nombre_usuario"];
  $contraseña = $_POST["constraseña"];

?>
    <section id="post" class="wrapper bg-img" data-bg="Imagen_2.jpg">
        <div class="inner">
            <article class="box">
                <div class="content">
                    <?php
                        //lean eso:(
                        // aquí falta poner la condición de la contraseña y ponerle un mensaje arriba
                    
                        //puse las condiciones al revés para poder entrar, pero es lo mismo en copy paste
                        // echo '<h2 align="center">¡Estamos felices de que hayas vuelto!</h2>';
                        // echo '<form align="center" action="inicio.php" method="get">';
                        //     echo '<br/><br/>';
                        //     echo '<input type="submit" value="Entrar">';
                        // echo '</form>';
                            
                        echo '<h2 align="center">Este/a usuario/a no existe</h2>';
                        echo '<form align="center" action="entrar.php" method="get">';
                            echo '<br/><br/>';
                            echo '<input type="submit" value="Volver">';
                        echo '</form>';
                            
                      
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