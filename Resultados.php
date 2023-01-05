<?php

session_start();

if(isset($_SESSION['idUser']) && isset($_SESSION['correo'])) {

    ?>
<!DOCTYPE html>
<html>
    <STYLE>A {text-decoration: none;} </STYLE>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registro | Jool Ja</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400&display=swap" rel="stylesheet">
    </head>
    <body>
    <section class="top-user">
                    <a class = ".bottonuser"href="#"><img src="user7.png"width="50px" height="50px"alt=""></a>
                    <a href="logout.php">Cerrar sesión</a>
                </section>
            <section class="top">
                <img class = "logo" src="logo.png" alt = "logo">
            </section>
            <section class="center-form">
                <form class="form-register" action="sql.php" method="post">
                    <label for="">Nombre del cenote</label>
                    <input type="text" name="name" required value=""> <br>
                    <label for="">Tipo de muestra</label><br>
                    <select name="tipoMuestreo">
                        <?php
                            require 'Connection.php';
                            $sql = 'SELECT * FROM tipoCenote';
                            $query2 = mysqli_query($enlace, $sql);
                            while($row=mysqli_fetch_array($query2)){
                                $idTipo=$row['idTipo'];
                                $tipoNombre=$row['tipoNombre'];
                        ?>
                        <option value = "<?php echo $idTipo ?>"><?php echo $tipoNombre ?></option>
                    <?php
                        }
                    ?>
                    
                    </select>  <br><br>
                    <label>Otro </label><br>  
                    <input type ="text" name="tipoNuevo" id=""><br><br>


                    
                    <label for="">Nombre de Hidrocarburo</label><br>
                    <select name="nomHidro">
                        <?php
                            require 'Connection.php';
                            $sql = 'SELECT * FROM nomhidro';
                            $query2 = mysqli_query($enlace, $sql);
                            while($row=mysqli_fetch_array($query2)){
                                $idHidro=$row['idNomHidro'];
                                $hidroNombre=$row['nombreHidro'];
                        ?>
                        <option value = "<?php echo $idHidro ?>"><?php echo $hidroNombre ?></option>
                    <?php
                        }
                    ?>
                    </select>  <br><br>
                    <label>Otro </label><br>  
                    <input type ="text" name="hidroNuevo" id=""><br><br>


                    <label for="">Concentracion</label><br>
                    <input class="" type="number" name="concentracion" require value="" min="0" value="0" step=".1"><br>
                    <button class="buttons" type="submit" name="Enviar" value="Enviar">Enviar</button>
                </form>
            </section>
    </body>  
    <footer>
        <div class= "RightSide" class>
            <p>© 2023 Jool Ja' <span>All rights reserved</span><br><a href="#">Privacidad</a> - <a href="#">Términos</a> - <a href="#">Acerca de</a> </p>
        </div>
    </footer>  

</html>
<?php

}
else {
    header("Location: index.php");
}
?>
