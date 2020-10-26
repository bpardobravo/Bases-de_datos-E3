<?php include('../templates/generic.html');   ?>
<body class="subpage">
<!-- Header -->
    <header id="header" class="alt">
        <div class="logo">
            <p>Hello</p>
        </div>
        <a href="perfil.php"><span>Perfil   |</span></a>
        <a href="../index.php"><span>   Salir</span></a>
    </header>

    <section id="post" class="wrapper bg-img" data-bg="../styles/Imagen_1.jpg">
        <div class="inner">
            <article class='box'>
                <header>
                    <h2 align='center'>Buscar a otros navegantes registrados</h2>
                </header>
                <div class='content'>
                    <form align="center" action="perfil_persona.php" method="get">
                        <input type="text" name="nombre_usuario" placeholder='Ingresa un nombre'>
                        <br/>
                        <input type="submit" value="Buscar">
                    </form>
                </div>
            </article>
            <article class='box'>
                <header>
                    <h2 align="center">Ver listado de navieras</h2>
                </header>
                <div class='content'>
                    <form align="center" action="../consultas/consulta_navieras.php" method="get">
                        <input type="submit" value="Ver">
                    </form>
                </div>
            </article>
            <article class='box'>
                <header>
                    <h2 align="center">Ver listado de puertos</h2>
                </header>
                <div class='content'>
                    <form align="center" action="../consultas/consulta_puertos.php" method="get">
                        <input type="submit" value="Ver">
                    </form>
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
