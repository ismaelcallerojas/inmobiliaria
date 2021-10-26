<?php  

if ($_SESSION['nivel'] != 'ADMINISTRADOR') {
    header("location:bloqueo.php");
}

?>