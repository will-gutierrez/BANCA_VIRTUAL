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
            
            
            <tr><td>
             <center>Descarga tu extracto<br>
                has clik en PDF</center>
                       
                </td></tr>
            
            
            
            
            
            
            <tr>
            <td>
                <button onclick="window.location.href='inicio.php'" class="button button2">Regresar</button>
                <button align="rigth" onclick="window.location.href='PDF.php'" class="button button2">PDF</button>
                </td></tr>
        </table>

        
    </center>
</body>
</html>