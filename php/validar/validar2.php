<?php
//sesion
session_start();
$ID=$_SESSION['identificacion'];
$cuenta=$_POST['cuenta'];
$valor=$_POST['valor'];

//conexion a la base de datos
$conexion=mysqli_connect("localhost","root","","bdprueba");
//fecha
                date_default_timezone_set('America/Bogota');
                $fecha_actual=date("y-m-d h:i:s ");

//consulta a la base de datos
$consulta="SELECT *FROM usuarios WHERE numero_cuenta='$cuenta' ";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);

$resultados = mysqli_query($conexion,"SELECT * FROM usuarios WHERE identificacion= '$ID'");
if($consultas = mysqli_fetch_array($resultados))
  {
    $variable3="";  
    $variable3=$consultas['numero_cuenta'];
  }
//validar que no sea el mismo numero de cuenta de la session
if($variable3==$cuenta){
    header("location:validaciones/numerocu.php");
}

else{
//validar si el numero de cuenta existe
if ($filas>0){

//valor de la sesion
 $resultados = mysqli_query($conexion,"SELECT * FROM usuarios WHERE identificacion= '$ID'");
  if($consultas = mysqli_fetch_array($resultados))
  {
    $variable="";  
    $variable=$consultas['saldo'];
  }
//valor de el numero de cuenta
 $resultados = mysqli_query($conexion,"SELECT * FROM usuarios WHERE numero_cuenta= '$cuenta'");
  if($consultas = mysqli_fetch_array($resultados))
  {
    $variable2="";  
    $variable2=$consultas['saldo'];
  }

    

    if($variable>=$valor){
        $resta=$variable-$valor;
        $suma=$variable2+$valor;

        
        // actualizar saldo de la sesion
        $_UPDATE_SQL="UPDATE usuarios Set 
            saldo='$resta'WHERE identificacion='$ID'"; 
        mysqli_query($conexion,$_UPDATE_SQL);
        
        //actualizar saldo numero de cuenta
        $_UPDATE_SQL="UPDATE usuarios Set 
            saldo='$suma'WHERE numero_cuenta='$cuenta'"; 
        mysqli_query($conexion,$_UPDATE_SQL);

        // insertar fecha
        mysqli_query($conexion, "INSERT INTO fecha 
        (identificacion,fecha,cuenta,valor) 
        values 
        ('$ID','$fecha_actual','$cuenta','$valor')");
        header("location:../validaciones/exitosa.php");

    }
    else{
        header("location:../validaciones/error.php");
    }
        
}
else{

    header("location:../validaciones/numerocu.php");
}
}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>