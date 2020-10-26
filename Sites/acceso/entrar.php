<?php include('../templates/generic.html');   ?>
<body class="subpage">
    <section id="post" class="wrapper bg-img" data-bg="Imagen_2.jpg">
        <div class="inner">
            <article class="box">
                <h2  align="center">¡Que bueno que has vuelto!</h2>
                <h5>Debes completar todos los campos</h5>
                <div class="content">
                    <form align="center" action="confirmacion_entrar.php" method="get">
                        Nombre de usuario:
                        <input type="text" name="nombre_usuario" placeholder='Nombre Apellido'>
                        <br/>
                        Contraseña:
                        <input type="text" name="contraseña">
                        <br/><br/>
                        <input type="submit" value="Entrar">
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