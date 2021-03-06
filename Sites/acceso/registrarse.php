<?php include('../templates/index.html');   ?>
<body class="subpage">
    <section id="post" class="wrapper bg-img" data-bg="Imagen_2.jpg">
        <div class="inner">
            <article class="box">
                <h2  align="center">¡Registrate y se parte de nuestra asombrosa comunidad de navegantes!</h2>
                <h5>Debes completar todos los campos</h5>
                <div class="content">
                    <form align="center" action="registration.php" method="post">
                        Nombre de usuario:
                        <input type="text" name="nombre_usuario" placeholder='Nombre Apellido' required>
                        <br/>
                        Edad:
                        <input type="text" name="edad" placeholder='20' required>
                        <br/>
                        Sexo:
                        <br/>
                        <input type="radio" id="male" name="gender" value="hombre">
                        <label for="male">Hombre</label>
                        <input type="radio" id="female" name="gender" value="mujer">
                        <label for="female">Mujer</label>
                        <input type="radio" id="other" name="gender" value="other">
                        <label for="other">Otro</label><br>
                        <br/>
                        Nacionalidad:
                        <input type="text" name="nacionalidad" placeholder='Chile' required>
                        <br/>
                        Número de pasaporte:
                        <input type="text" name="numero_pasaporte" placeholder='12345678-9' required>
                        <br/>
                        Contraseña:
                        <input type="password" name="contraseña" required>
                        <br/><br/>
                        <input type="submit" value="Registrarme">
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