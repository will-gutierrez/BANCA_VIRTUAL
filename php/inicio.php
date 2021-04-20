<?php
session_start();
$ID = $_SESSION['identificacion'];
error_reporting(0);
$varsesion = $_SESSION['identificacion'];
if ($varsesion == null || $varsesion=''){
    echo'Usted no tiene autorizacion';
    die();
}
echo $varsesion;
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
            <button onclick="window.location.href='saldo.php'" class="button button1">Consulta saldo</button><br>
            <button onclick="window.location.href='movimiento.php'" class="button button1">Ver movimientos</button><br>
            <button onclick="window.location.href='transaccion.php'" class="button button1">Realizar una transaccion</button><br>
            <button onclick="window.location.href='servicios.php'" class="button button1">Pagar servicios publicos</button><br>
            <button onclick="window.location.href='extracto.php'" class="button button1">Extracto</button>
                    </center>
                </td>
            </tr>
            <tr>
            <td>
                <a href="cerrar_sesion.php">Cerrar sesion</a>
                </td></tr>
        </table>

        
    </center>
</body>
</html>