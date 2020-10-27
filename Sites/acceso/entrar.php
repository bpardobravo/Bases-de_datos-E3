<?php include('../templates/generic.html');   ?>
<body>
    <section id="one" class="wrapper post bg-img" data-bg="Imagen_1">
        <div class="inner">
            <article class="box">
                <h2  align="center">¡Que bueno que has vuelto!</h2>
                <h5>Debes completar todos los campos</h5>
                <div class="content">
                    <form align="center" action="login.php" method="post">
                       
                        Número de pasaporte:
                        <input type="text" name="nro_pasaporte" required>
                        <br/>
                        Contraseña:
                        <input type="password" name="contraseña" required>
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