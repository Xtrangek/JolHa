
<!DOCTYPE html>
<html>
    <STYLE>A {text-decoration: none;} </STYLE>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ingreso | Jool Ja</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400&display=swap" rel="stylesheet">
    </head>
    <body>
        <section class="left-form">
        </section>
        <section class="right-form">
            <form class="form-login" action="logindata.php" method="post">
                <h5>Iniciar sesión</h5>
                <?php
                if(isset($_GET['error'])){?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <input class="controls" type="text"  name="Correo" value="" placeholder="Correo">
                <input class="controls" type="password" name="password" value="" placeholder="Contraseña">
                <p><a href="#">¿Olvidaste la contraseña?</a></p>
                <input class="buttons" type="submit" name="" value="Iniciar sesión">
                <p>¿No tienes una cuenta?  <a href="./registro.html">Regístrate</a></p>
            </form>
        </section>
    </body>  
    <footer>
        <div class= "RightSide" class>
            <p>© 2023 Jool Ja' <span>All rights reserved</span><br><a href="#">Privacidad</a> - <a href="#">Términos</a> - <a href="#">Acerca de</a> </p>
        </div>
    </footer>  

</html>6