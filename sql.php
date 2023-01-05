<?php
    session_start();
    require 'Connection.php';
    if(isset($_SESSION['idUser']) && isset($_SESSION['correo'])) {
        $usuario = $_SESSION['idUser'];
        $nombreC = $_POST['name'];
        $_SESSION['tipoMuestreo'] = $_POST['tipoMuestreo'];
        $tipoMuestra = $_SESSION['tipoMuestreo'];
        $otroTipo = $_POST['tipoNuevo'];
        $_SESSION['nomHidro'] = $_POST['nomHidro'];
        $nomHidro = $_SESSION['nomHidro'];
        $otroHidro = $_POST['hidroNuevo'];
        $_SESSION['concentracion'] = $_POST['concentracion'];
        $concentracion = $_SESSION['concentracion'];
        $_SESSION['idConsulta'];
        $id_Consulta = $_SESSION['idConsulta'];    

        // $queryUpdate ="UPDATE cenotes SET user = $usuario, nombreCenote = '$nombreC', tipo = $tipoMuestra, nombreHidro = $nomHidro, concentracion = $concentracion WHERE idCenote = $id_Consulta";
        // $query = mysqli_query($enlace, $queryUpdate);
        if($otroTipo!=''){
            if($otroHidro!=''){
                $sqla="INSERT INTO tipocenote(tipoNombre) VALUES('$otroTipo')";
                $query = mysqli_query($enlace, $sqla);
                $sqla ="SELECT * FROM tipocenote WHERE tipoNombre ='$otroTipo'";
                $query = mysqli_query($enlace, $sqla);
                $row=mysqli_fetch_array($query);
                $idTipo=$row['idTipo'];

                $sql="INSERT INTO nomhidro(nombrehidro) VALUES('$otroHidro')";
                $query = mysqli_query($enlace, $sql);
                $sql ="SELECT * FROM nomhidro WHERE nombrehidro ='$otroHidro'";
                $query = mysqli_query($enlace, $sql);
                $row=mysqli_fetch_array($query);
                $idHidro=$row['idNomHidro'];
               
   
                $queryUpdate ="UPDATE cenotes SET user = $usuario, nombreCenote = '$nombreC', tipo = $idTipo, nombreHidro = $idHidro, concentracion = $concentracion WHERE idCenote = $id_Consulta";
                $query = mysqli_query($enlace, $queryUpdate);
                   
                echo 
                "
                <script>
                alert('Se enviaron correctamente los datos.')
                window.location='home.php';
                </script>
                "
                ;
                
            } else {
                $sqla="INSERT INTO tipocenote(tipoNombre) VALUES('$otroTipo')";
                $query = mysqli_query($enlace, $sqla);
                $sqla ="SELECT * FROM tipocenote WHERE tipoNombre ='$otroTipo'";
                $query = mysqli_query($enlace, $sqla);
                $row=mysqli_fetch_array($query);
                $idTipo=$row['idTipo'];
                
                $queryUpdate ="UPDATE cenotes SET user = $usuario, nombreCenote = '$nombreC', tipo = $idTipo, nombreHidro = $nomHidro, concentracion = $concentracion WHERE idCenote = $id_Consulta";
                $query = mysqli_query($enlace, $queryUpdate);
                   
                echo 
                "
                <script>
                alert('Se enviaron correctamente los datos.')
                window.location='home.php';
                </script>
                "
                ;
            }
        } else{
            if($otroHidro!=''){
                $sql="INSERT INTO nomhidro(nombrehidro) VALUES('$otroHidro')";
                $query = mysqli_query($enlace, $sql);
                $sql ="SELECT * FROM nomhidro WHERE nombrehidro ='$otroHidro'";
                $query = mysqli_query($enlace, $sql);
                $row=mysqli_fetch_array($query);
                $idHidro=$row['idNomHidro'];
               
   
                $queryUpdate ="UPDATE cenotes SET user = $usuario, nombreCenote = '$nombreC', tipo = $tipoMuestra, nombreHidro = $idHidro, concentracion = $concentracion WHERE idCenote = $id_Consulta";
                $query = mysqli_query($enlace, $queryUpdate);
                   
                echo 
                "
                <script>
                alert('Se enviaron correctamente los datos.')
                window.location='home.php';
                </script>
                "
                ;
            } else {
                $queryUpdate ="UPDATE cenotes SET user = $usuario, nombreCenote = '$nombreC', tipo = $tipoMuestra, nombreHidro = $nomHidro, concentracion = $concentracion WHERE idCenote = $id_Consulta";
                $query = mysqli_query($enlace, $queryUpdate);
                   
                echo 
                "
                <script>
                alert('Se enviaron correctamente los datos.')
                window.location='home.php';
                </script>
                "
                ;
            }
        }

?>
<?php

}
else {
    header("Location: index.php");
}
?>