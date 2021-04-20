<?php
//sesion
session_start();
$ID=$_SESSION['identificacion'];
$factura=$_POST['factura'];
$empresa=$_POST['empresa'];
$valor=$_POST['valor'];

//conexion a la base de datos
$conexion=mysqli_connect("localhost","root","","bdprueba");
//fecha
                date_default_timezone_set('America/Bogota');
                $fecha_actual=date("y-m-d h:i:s ");

//consultar valor de la sesion
 $resultados = mysqli_query($conexion,"SELECT * FROM usuarios WHERE identificacion= '$ID'");
  if($consultas = mysqli_fetch_array($resultados))
  {
    $variable="";  
    $variable=$consultas['saldo'];
  }

if($variable>=$valor){
        $resta=$variable-$valor;

        
        // actualizar saldo de la sesion
        $_UPDATE_SQL="UPDATE usuarios Set 
            saldo='$resta'WHERE identificacion='$ID'"; 
        mysqli_query($conexion,$_UPDATE_SQL);
        
        // insertar fecha
        mysqli_query($conexion, "INSERT INTO factura 
        (identificacion,fecha,factura,empresa,valor) 
        values 
        ('$ID','$fecha_actual','$factura','$empresa','$valor')");
        header("location:../validaciones/exitosa2.php");
 
}
else{
    header("location:../validaciones/error2.php");
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>