<?php
session_start();
$ID = $_SESSION['identificacion'];
error_reporting(0);
$varsesion = $_SESSION['identificacion'];
if ($varsesion == null || $varsesion=''){
    echo'Usted no tiene autorizacion';
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <center>
        <table class="customers">
            <tr>   
            <th><center>Bienvenido a tu banca virtual</center></th>    
            </tr>
            <tr>
            <td>
                <center>
                    <table>
  <tr>
    <td><center>Tus movimientos en el ultimo mes fueron:</center></td>
  </tr>
  <tr>
    <td><center>  
        
        <?php
        //conexion a la base de datos
  $conexion=mysqli_connect('localhost','root','','bdprueba');
        //consulta a la base de datos
  $resultados = mysqli_query($conexion,"SELECT * FROM fecha WHERE identificacion = '$ID'");
    echo "<h2>Transacciones</h2> <br>";
  while($consulta = mysqli_fetch_array($resultados))
  {
    echo"fecha:";
    echo $consulta['fecha']."<br>";
    echo"cuenta:";
    echo $consulta['cuenta']."<br>";
    echo"N_factura:";
    echo $consulta['factura']."<br>";
    echo"empresa:";
    echo $consulta['empresa']."<br>";
    echo"valor:$";
    echo $consulta['valor']."<br>-----------------------------------------------------------------";
  }
    ?>    
        
        </center></td></tr>
        <tr><td><center>
    <?php
            
        echo "<h2>servicios publicos</h2> <br>";
  $resultados = mysqli_query($conexion,"SELECT * FROM factura WHERE identificacion = '$ID'");
  while($consulta = mysqli_fetch_array($resultados))
  {
    echo"fecha:";
    echo $consulta['fecha']."<br>";
    echo"N_factura:";
    echo $consulta['factura']."<br>";
    echo"empresa:";
    echo $consulta['empresa']."<br>";
    echo"valor:$";
    echo $consulta['valor']."<br>---------------------------------------------------------------";
  }

 
?>
        </center></td>

  </tr>
</table>
                </center></td></tr>
            <tr>
            <td>
                <button onclick="window.location.href='inicio.php'" class="button button2">Regresar</button>
                </td></tr>
        </table>

        
    </center>
</body>
</html>