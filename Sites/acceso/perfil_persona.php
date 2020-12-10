<?php 
include('../templates/index.html');  
    #Llama a conexión, crea el objeto PDO y obtiene la variable $db
    require("../config/conexion2.php"); 
?>

<body class="subpage">
<!-- Acá se podría poner el nombre de la persona o idk jj -->
    <header id="header" class="alt">
        <div class="logo">
            <p>Grupo 32 - 115</p>
        </div>
        <a href="inicio.php"><span>Página principal</span></a>
    </header>

    <section id="post" class="wrapper bg-img" data-bg="Imagen_1.jpg" style=''>
        <div class="inner">
            <article class='box'>
                <header>
                    <h2 align='center'>Datos Personales</h2>
                </header>
                <div class='content'>
                    <?php
                        
                        $user = $_POST['n_pasaporte'];
                        // $sid = session_id();
                        echo "$user";
                        #Se construye la consulta como un string
                        $query = "SELECT * FROM usuario WHERE nro_pasaporte = '$user';";

                        #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
                        $result = $db -> prepare($query);
                        $result -> execute();
                        $data = $result -> fetchAll();
                        echo "<table>";
                      
                            foreach ($data as $d) {
                                // echo "$d[0]";
                                echo "<tr><td>Número de pasaporte: $d[1]</td></tr>";
                                echo "<tr><td>Nombre: $d[2]</td></tr>";
                                echo "<tr><td>Edad: $d[3]</td></tr>";
                                echo "<tr><td>Sexo: $d[4]</td></tr>";
                                echo "<tr><td>Nacionalidad: $d[5]</td></tr>";
                            };
                        
                        echo "</table>";
                    ?>
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
                        $query1 = "SELECT * FROM personal WHERE  personal.nro_pasaporte = '$user';";
                        $result1 = $db -> prepare($query1);
                        $result1 -> execute();
                        $data1 = $result1 -> fetchAll();
                            foreach ($data1 as $d) {
                                if ($d[6] == 1) {
                                    $bid = intval($data1[0]);
                                    echo "$bid";
                                    echo "<table>";
                                    echo "<tr>";
                                    echo "<th>Datos buque</th>";
                                    echo "</tr>";
                                    if ($data1) {
                                        foreach ($data1 as $d) {
                                            echo "<tr><td>Patente: $d[1]</td></tr>";
                                            echo "<tr><td>Nombre: $d[2]</td></tr>";
                                            echo "<tr><td>Tipo: $d[3]</td></tr>";
                                            echo "<tr><td>Naviera: $d[4]</td></tr>";
                                        };
                                    };
                                    echo "</table>";
                                    ?>
                                    <?php
                                
                                    global $bid;
                                
                                    $query2 = "SELECT fecha_llegada, punombre FROM buque, proximo_itinerario, puerto WHERE buque.bid = $buq AND buque.bid = proximo_itinerario.bid AND proximo_itinerario.pid = puerto.pid;";

                                    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
                                    $result2 = $db -> prepare($query2);
                                    $result2 -> execute();
                                    $data2 = $result2 -> fetchAll();
                                    if (empty($data2)) {
                                        echo "esta vacio";
                                    };
                                    echo "<table>";
                                    echo "<tr>";
                                    echo "<th>Próximo itinerario</th>";
                                    echo "</tr>";
                                    if ($data2) {
                                        foreach ($data2 as $d) {
                                            echo "<tr><td>Fecha llegada: $d[0]</td></tr>";
                                            echo "<tr><td>Puerto: $d[1]</td></tr>";
                                        };
                                    };
                                    echo "</table>";
                                    ?>
                                    <?php
                                    $query3 = "SELECT salida, ingreso, puerto.punombre FROM atraque, puerto WHERE atraque.bid=$bid AND atraque.pid = puerto.pid  ORDER BY ingreso DESC LIMIT 5;";

                                    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
                                    $result3 = $db -> prepare($query3);
                                    $result3 -> execute();
                                    $data3 = $result3 -> fetchAll();
                                    if (empty($data3)) {
                                        echo "esta vacio";
                                    };
                                    echo "<table>";
                                    echo "<tr>";
                                    echo "<th>Últimos atraques</th>";
                                    echo "</tr>";
                                    if ($data3) {
                                        foreach ($data3 as $d) {
                                            echo "<tr><td>Ingreso: $d[1]</td></tr>";
                                            echo "<tr><td>Salida: $d[0]</td></tr>";
                                            echo "<tr><td>Puerto: $d[2]</td></tr>";
                                        };
                                    };
                                    echo "</table>";
                                } else {
                                    echo "<h4> align='center'>No tienes buques:(</h4>";
                                }

                            }
                        #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
                        
                    ?>
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
                    $query4 = "SELECT tipo AS tipo_instalacion, nombre AS nombre_puerto FROM jefeinstalacion, puertosinstalaciones, instalaciones, puertos WHERE jefeinstalacion.rut = '$user' AND jefeinstalacion.iid = puertosinstalaciones.iid AND puertosinstalaciones.iid = instalaciones.iid AND puertosinstalaciones.pid = puertos.pid;";

                    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
                    $result4 = $db -> prepare($query4);
                    $result4 -> execute();
                    $data4 = $result4 -> fetchAll();
                  
                    if ($data4) {
                        foreach ($data4 as $d) {
                            echo "<tr><td>Puerto: $d[1]</td></tr>";
                            echo "<tr><td>Tipo de instalación: $d[0]</td></tr>";
                        };
                    };
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
