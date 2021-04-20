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
    <td><center>Saldo disponible</center></td>
  </tr>                                      
  <tr>
    <td><center>$
        <?php
            $conexion=mysqli_connect("localhost","root","","bdprueba");
  $resultados = mysqli_query($conexion,"SELECT * FROM usuarios WHERE identificacion = '$ID'");
  while($consulta = mysqli_fetch_array($resultados))
  {
    $variable=$consulta['saldo'];
  }
        echo $variable

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