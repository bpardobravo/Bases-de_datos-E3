<?php include('templates/index.html');   ?>
<body>
<!-- one -->
    <section id="one" class="wrapper post bg-img" data-bg="Imagen_1">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Mostrar puertos junto a las ciudades a las que pertenecen.</h2>
                </header>
                <div class="content">
                    <form align="center" action="consultas/consulta_puertos_ciudades.php" method="post">
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
        <a href="#three" class="more">Más consultas</a>
    </section>

<!-- three -->
    <section id="three" class="wrapper post bg-img" data-bg="Imagen_3">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Mostrar puertos que tengan cierta cantidad de astilleros.</h2>
                </header>
                <div class="content">
                    <form align="center" action="consultas/consulta_cantidad_astilleros.php" method="post">
                        Cantidad de astilleros:
                        <input type="text" name="cantidad_astilleros">
                        <br/><br/>
                        <input type="submit" value="Buscar">
                    </form>
                </div>
            </article>
        </div>
        <a href="#four" class="more">Más consultas</a>
    </section>

<!-- four -->
    <section id="four" class="wrapper post bg-img" data-bg="Imagen_4">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Mostrar todas las veces que un barco ha atracado en una ciudad.</h2>
                </header>
                <div class="content">
                    <form align="center" action="consultas/consulta_atraques_ciudad.php" method="post">
                        Nombre del barco:
                        <input type="text" name="nombre_barco">
                        <br/>
                        Nombre de la ciudad:
                        <input type="text" name="nombre_ciudad">
                        <br/><br/>
                        <input type="submit" value="Buscar">
                    </form>
                </div>
            </article>
        </div>
        <a href="#five" class="more">Más consultas</a>
    </section>

<!-- Five -->
    <section id="five" class="wrapper post bg-img" data-bg="Imagen_5">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Mostrar la edad promedio de los trabajadores de algún puerto.</h2>
                </header>
                <div class="content">
                    <form align="center" action="consultas/consulta_edad_promedio_puerto.php" method="post">
                        Nombre del puerto:
                        <input type="text" name="nombre_puerto">
                        <br/><br/>
                        <input type="submit" value="Buscar">
                    </form>
            </article>
        </div>
        <a href="#six" class="more">Más consultas</a>
    </section>

<!-- six -->
    <section id="six" class="wrapper post bg-img" data-bg="Imagen_6">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Mostrar el puerto que haya recibido más barcos en algún mes de algún año.</h2>
                </header>
                <div class="content">
                    <form align="center" action="consultas/consulta_puerto_con_mas_barcos.php" method="post">
                        Año:
                        <input type="text" name="año">
                        <br/>
                        Mes (número):
                        <input type="text" name="mes">
                        <br/><br/>
                        <input type="submit" value="Buscar">
                    </form>
            </article>
        </div>
        <a href="#seven" class="more">Más consultas</a>
    </section>

<!-- seven -->
    <section id="seven" class="wrapper post bg-img" data-bg="Imagen_7">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Mostrar navieras</h2>
                </header>
                <div class="content">
                    <form align="center" action="consultas/consulta_navieras.php" method="post">
                        <br/><br/>
                        <input type="submit" value="Buscar">
                    </form>
                </div>
            </article>
        </div>
        <a href="#eight" class="more">Más consultas</a>
    </section>
<!-- eight -->
    <section id="eight" class="wrapper post bg-img" data-bg="Imagen_8">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Mostrar puertos</h2>
                </header>
                <div class="content">
                    <form align="center" action="consultas/consulta_puertos.php" method="post">
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
