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
    <link rel="stylesheet" href="../estilos.css">
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
    <td><center>Saldo insuficiente</center></td>
  </tr>                                      
                        
</table>
                </center></td></tr>
            <tr>
            <td><center>
                <button onclick="window.location.href='../servicios.php'" class="button button2">Regresar</button>
                </center>
                </td></tr>
        </table>

        
    </center>

</body>
</html>