<?php
    session_start();
if(isset($_SESSION['idUser']) && isset($_SESSION['correo'])) {
    require 'Connection.php';
    if(isset($_POST["Guardar"])){

        $latitud = $_POST["latitud"];
        $longitud = $_POST["longitud"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];

        $queryInser ="INSERT INTO cenotes(idCenote,user,nombreCenote,latitud,longitud,fecha,hora,tipo,nombreHidro,concentracion) VALUES ('',1,1,'$latitud','$longitud','$fecha','$hora',1,1,1);";
        
        $query = mysqli_query($enlace, $queryInser);
        $_SESSION['idConsulta'] = mysqli_insert_id($enlace);
    }
    ?>
    <!DOCTYPE html>
<html>
    <STYLE>A {text-decoration: none;} </STYLE>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>home | Jool Ja</title>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script type="module" src="./index.js"></script>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400&display=swap" rel="stylesheet">

    </head>
    <body>  
                <section class="top-home">
                    <img class = "logo-home" src="logo.png" alt = "logo">
                </section>
                <section class="top-user">
                    <a class = ".bottonuser"href="#"><img src="user7.png"width="50px" height="50px"alt=""></a>
                    <a href="logout.php">Cerrar sesión</a>
                </section>
            <section class="banner">
                <img src="banner 5.png">
            </section>
            <div id="map"></div>
            <form class ="myForm" action="" method="post" autocomplete="off">
                <label for="">Latitud</label>
                <input type="text" readonly="readonly" name="latitud" required value=""> <br>
                <label for="">Longitud</label>
                <input type="text" readonly="readonly" name="longitud" required value=""> <br>
                <label for="">Fecha</label>
                <input type="text" readonly="readonly" name="fecha" required value=""> <br>
                <label for="">Hora</label>
                <input type="text" readonly="readonly" name="hora" required value=""> <br>
                <button type="submit" type="submit" name="Guardar" value="Guardar" >Guardar</button>
                <button class="buttons" name="Siguiente" value="Siguiente" formaction="Resultados.php" formmethod="POST">Siguiente</button>
            </form>
            
            <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnkodn7mqsfIDWdXxTvA3G2vWwsuH8s9g&callback=initMap"></script>
            <script type = "text/javascript">
                    if(navigator.geolocation){
                    const mapDiv = document.getElementById("map");
                    let map;
                    let marker;
                    function initMap(){
                        map = new google.maps.Map(mapDiv,{
                                zoom: 15,
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            });

                            navigator.geolocation.getCurrentPosition(function(position){
                                var geolocate = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                                var full_date = new Date().toLocaleDateString();
                                var full_time = new Date().toLocaleTimeString();
                                map.setCenter(geolocate);
                                marker = new google.maps.Marker({
                                    position: geolocate,
                                    map: map,
                                });
                                document.querySelector('.myForm input[name = "latitud"]').value = position.coords.latitude;
                                document.querySelector('.myForm input[name = "longitud"]').value = position.coords.longitude;
                                document.querySelector('.myForm input[name = "fecha"]').value = full_date;
                                document.querySelector('.myForm input[name = "hora"]').value = full_time;
                            },showError); 
                        }
                    }
                    function showError(error){
                        switch(error.code){
                            case error.PERMISSION_DENIED:
                                alert("Se debe de activar la geolocalización.");
                                location.reload();
                                break
                        }
                    }
            </script>

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

