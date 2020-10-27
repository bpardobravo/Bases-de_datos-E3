<?php include('../templates/generic.html');  
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion2.php"); 
?>

<body class="subpage">
<!-- Acá se podría poner el nombre de la persona o idk jj -->
    <header id="header" class="alt">
        <div class="logo">
            <p>Hello</p>
        </div>
        <a href="inicio.php"><span>Página principal</span></a>
    </header>

    <section id="post" class="wrapper bg-img" data-bg="../styles/Imagen_1.jpg">
        <div class="inner">
            <article class='box'>
                <header>
                    <h2 align='center'>Datos Personales</h2>
                </header>
                <div class='content'>
                    <?php
                        $user = $_SESSION['nro_pasaporte'];
                        #Se construye la consulta como un string
                        $query = "SELECT nro_pasaporte, unombre, edad, sexo, nacionalidad FROM usuario WHERE nro_pasaporte = '$user';";

                        #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
                        $result = $db -> prepare($query);
                        $result -> execute();
                        $data = $result -> fetchAll();

                        foreach ($data as $d) {
                            echo "<tr><td>Número de pasaporte: $d[0]</td></tr>";
                            echo "<tr><td>Nombre: $d[1]</td></tr>";
                            echo "<tr><td>Edad: $d[2]</td></tr>";
                            echo "<tr><td>Sexo: $d[3]</td></tr>";
                            echo "<tr><td>Nacionalidad: $d[4]</td></tr>";
                        }
                    ?>
                </div>
            </article>
            <article class='box'>
                <header>
                    <h2 align="center">Buques de los que es propietari@</h2>
                </header>
                <div class='content'>
                    <!-- <?php

                        #Se construye la consulta como un string
                        // $query = "";

                        // #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
                        // $result = $db -> prepare($query);
                        // $result -> execute();
                        // $data = $result -> fetchAll();

                        // foreach ($data as $d) {
                        //     echo "<tr><td>$d</td></tr>";
                        }
                    ?> -->
                </div>
            </article>
            <article class='box'>
                <header>
                    <h2 align="center">Jefe de puerto</h2>
                </header>
                <div class='content'>
                    <!-- Insertar la instalación en la que trabaja o un mensaje de que no es dueño)? -->
                </div>
            </article>
            <article class='box'>
                <header>
                    <h2 align="center">Cambio de contraseña</h2>
                </header>
                <div class='content'>
                    <!-- Insertar la instalación en la que trabaja o un mensaje de que no es dueño)? -->
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
