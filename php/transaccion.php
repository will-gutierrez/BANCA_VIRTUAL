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
 <form action="validar/validar2.php" method="post">
        <p>Numero de cuenta</p>
        <input type="text" placeholder="Cuenta" name="cuenta" required>
        <p>Valor</p>
        <input type="text" placeholder="Valor" name="valor" required><br><br>
        <input type="submit" value="ingresar" >
        </form>
                </center></td></tr>
            <tr>
            <td>
                <button onclick="window.location.href='inicio.php'" class="button button2">Regresar</button>
                </td></tr>
        </table>

        
    </center>
</body>
</html>