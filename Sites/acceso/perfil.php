<?php 
ob_start();
include('../templates/generic.html');  
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion2.php"); 
    require("../config/conexion.php"); 
    session_start();
    ob_end_flush();
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
                        // $sid = session_id();
                        // echo "$sid";
                        #Se construye la consulta como un string
                        $query = "SELECT nro_pasaporte, unombre, edad, sexo, nacionalidad FROM usuario WHERE nro_pasaporte = '$user';";

                        #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
                        $result = $db -> prepare($query);
                        $result -> execute();
                        $data = $result -> fetchAll();
                    ?>
                    <table>
                        <?php
                            foreach ($data as $d) {
                                // echo "$d[0]";
                                echo "<tr><td><p>Número de pasaporte: $d[0]</p></td></tr>";
                                echo "<tr><td>Nombre: $d[1]</td></tr>";
                                echo "<tr><td>Edad: $d[2]</td></tr>";
                                echo "<tr><td>Sexo: $d[3]</td></tr>";
                                echo "<tr><td>Nacionalidad: $d[4]</td></tr>";
                            };
                        ?>
                    </table>
                </div>
            </article>
            <article class='box'>
                <header>
                    <h2 align="center">Buques de los que es propietari@</h2>
                </header>
                <div class='content'>
                    <?php
                        // $user = $_SESSION['nro_pasaporte'];
                        #Se construye la consulta como un string
                        $query = "SELECT buque.bid, buque.patente, buque.bnombre, buque.tipo, naviera.nnombre FROM usuario, personal, buque, naviera WHERE usuario.nro_pasaporte = personal.nro_pasaporte AND personal.es_capitan = 1 AND personal.bid = buque.bid AND buque.nid = naviera.nid AND usuario.nro_pasaporte = '$user';";

                        #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
                        $result = $db -> prepare($query);
                        $result -> execute();
                        $data = $result -> fetchAll();
                        $bid = $data[0]
                        echo "<tr>"
                        echo "<th>Datos buque</th>"
                        echo "</tr>"
                        if ($data) {
                            foreach ($data as $d) {
                                echo "<tr><td>Patente: $d[1]</td></tr>";
                                echo "<tr><td>Nombre: $d[2]</td></tr>";
                                echo "<tr><td>Tipo: $d[3]</td></tr>";
                                echo "<tr><td>Naviera: $d[4]</td></tr>";
                            }
                        }

                        $query = "SELECT fecha_llegada, punombre FROM buque, proximo_itinerario, puerto WHERE buque.bid = $bid AND buque.bid = proximo_itinerario.bid AND proximo_itinerario.pid = puerto.pid;";

                        #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
                        $result = $db -> prepare($query);
                        $result -> execute();
                        $data = $result -> fetchAll();
                     
                        echo "<tr>"
                        echo "<th>Próximo itinerario</th>"
                        echo "</tr>"
                        if ($data) {
                            foreach ($data as $d) {
                                echo "<tr><td>Fecha llegada: $d[0]</td></tr>";
                                echo "<tr><td>Puerto: $d[1]</td></tr>";
                            }
                        }

                        $query = "SELECT salida, ingreso, puerto.punombre FROM atraque, puerto WHERE atraque.bid=$bid AND atraque.pid = puerto.pid  ORDER BY ingreso DESC LIMIT 5;";

                        #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
                        $result = $db -> prepare($query);
                        $result -> execute();
                        $data = $result -> fetchAll();
                     
                        echo "<tr>"
                        echo "<th>Últimos atraques</th>"
                        echo "</tr>"
                        if ($data) {
                            foreach ($data as $d) {
                                echo "<tr><td>Ingreso: $d[1]</td></tr>";
                                echo "<tr><td>Salida: $d[0]</td></tr>";
                                echo "<tr><td>Puerto: $d[2]</td></tr>";
                            }
                        }
                        
                    ?>
                </div>
            </article>
            <article class='box'>
                <header>
                    <h2 align="center">Cambio de contraseña</h2>
                </header>
                <div class='content'>
                    <form align="center" action="change_pswd.php" method="post">
                        Antigua contraseña:
                        <input type="password" name="old" required>
                        <br/>
                        Nueva contraseña:
                        <input type="password" name="new" required>
                        <br/><br/>
                        <input type="submit" value="Cambiar">
                    </form>
                    <!-- Insertar la instalación en la que trabaja o un mensaje de que no es dueño)? -->
                </div>
            </article>
            <article class='box'>
                <header>
                    <h2 align="center">Jefe de puerto</h2>
                </header>
                <div class='content'>
                
                <?php
                    require("../config/conexion.php"); 
                    $user = $_SESSION['nro_pasaporte'];
                    
                    #Se construye la consulta como un string
                    $query = "SELECT tipo AS tipo_instalacion, nombre AS nombre_puerto FROM jefeinstalacion, puertosinstalaciones, instalaciones, puertos WHERE jefeinstalacion.rut = '$user' AND jefeinstalacion.iid = puertosinstalaciones.iid AND puertosinstalaciones.iid = instalaciones.iid AND puertosinstalaciones.pid = puertos.pid;";

                    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
                    $result = $db -> prepare($query);
                    $result -> execute();
                    $data = $result -> fetchAll();
                  
                    if ($data) {
                        foreach ($data as $d) {
                            echo "<tr><td>Puerto: $d[1]</td></tr>";
                            echo "<tr><td>Tipo de instalación: $d[0]</td></tr>";
                        }
                    }
                ?>
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
