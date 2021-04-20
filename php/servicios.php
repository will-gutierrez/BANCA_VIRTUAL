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
 <form action="validar/validar3.php" method="post">
        <p>Numero factura</p>
        <input type="text" placeholder="factura" name="factura" required>
        <p>Empresa</p>
        <input type="text" placeholder="empresa" name="empresa" required><br><br>
        <p>Valor</p>
        <input type="text" placeholder="valor" name="valor" required><br><br>
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