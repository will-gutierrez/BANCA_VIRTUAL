<?php

    session_start();
    $identificacion=$_POST['identificacion'];
    $clave=$_POST['clave'];
    $conexion=mysqli_connect("localhost","root","","bdprueba");
    $_SESSION['identificacion'] = $identificacion;

    //conexion a la base de datos
    $consulta="SELECT * FROM usuarios WHERE identificacion='$identificacion' and clave='$clave'";
    $resultado=mysqli_query($conexion,$consulta);

    $filas=mysqli_num_rows($resultado);
    if ($filas>0){
        header("location:../inicio.php");
    
    }
    else{
        echo "Error en la autentificacion";
        //header("location:../index.php");
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>
