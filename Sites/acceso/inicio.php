<?php include('../templates/generic.html');   ?>
<body class="subpage">
<!-- Header -->
    <header id="header" class="alt">
        <div class="logo">
            <p>Grupo 32 - 115 </p>
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
                    <form align="center" action="../consultas/consulta_personas.php" method="post">
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
	    <article class='box'>
                <header>
                    <h2 align="center">Revisar mensajes recibidos</h2>
                </header>
                <div class='content'>
                    <form align="center" action="../consultas/consulta_puertos.php" method="get">
                        <input type="submit" value="Ver">
                    </form>
                </div>
            </article>
	    <article class='box'>
                <header>
                    <h2 align="center">Revisar mensajes enviados</h2>
                </header>
                <div class='content'>
                    <form align="center" action="../consultas/consulta_puertos.php" method="get">
                        <input type="submit" value="Ver">
                    </form>
                </div>
            </article>
	    <article class='box'>
                <header>
                    <h2 align='center'>Enviar mensaje a un usuario</h2>
                </header>
                <div class='content'>
                    <form align="center" action="../consultas/mensaje_enviado.php" method="post">
                        <input type="text" name="nombre_receptor" placeholder='Nombre del usuario receptor'>
			<!--  Quizás sería más fácil pedir directamente el pasaporte del receptor, y usar esos como id -->
                        <br/>
			<input type="text" name="Mensaje" placeholder='Mensaje'>
                        <br/>
                        <input type="submit" value="Enviar">
                    </form>
                </div>
            </article>
    <article class='box'>
        <header>
            <h2 align="center">Buscar localización mensajes</h2>
        </header>
        <div class='content'>
            <form align="center" action="../consultas/pdi.php" method="post">
                Forbidden:
                <input type="text" name="forbidden">
                <br/>
                Required:
                <input type="text" name="required">
                <br/>
                Desired:
                <input type="text" name="desired">
                <br/>
                Id de usuario:
                <input type="text" name="id_user" required>
                <br/>
                Fecha inicio:
                <input type="date" name="fecha_1">
                <br/>
                Fecha término:
                <input type="date" name="fecha_2">
                <br/><br/>
                <input type="submit" value="Buscar">
            </form>
        </div>
    </article>

<!-- Scripts -->
    <script src="../styles/js/jquery.min.js"></script>
    <script src="../styles/js/jquery.scrolly.min.js"></script>
    <script src="../styles/js/jquery.scrollex.min.js"></script>
    <script src="../styles/js/skel.min.js"></script>
    <script src="../styles/js/util.js"></script>
    <script src="../styles/js/main.js"></script>

    </body>
