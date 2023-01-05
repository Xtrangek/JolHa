<?php
    session_start();
    require 'Connection.php';

    if(isset($_POST['Correo']) && isset($_POST['password'])){
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
    
    $user = validate($_POST['Correo']);
    $pass = validate($_POST['password']);

    if(empty($user)) {
        header("Location: index.php?error=Es necesario el correo.");
        exit();
    }
    
    else if(empty($pass)) {
        header("Location: index.php?error=Es necesaria la contraseña.");
        exit();
    }
    $consulta="SELECT*FROM users where Correo='$user' and pass='$pass'";
    $resultado=mysqli_query($enlace,$consulta);

    if(mysqli_num_rows($resultado) === 1) {
        $row = mysqli_fetch_assoc($resultado);
        if($row['correo'] === $user && $row['pass'] === $pass) {
            $_SESSION['correo'] = $row['correo'];
            $_SESSION['idUser'] = $row['idUser'];
            header("Location: home.php");
            exit();
        }
        else{
            header("Location: index.php?erro=Correo o contraseña incorrecta.");
            exit();
        }
    }
    else{
        header("Location: index.php");
        exit();
    }

?> 
    


