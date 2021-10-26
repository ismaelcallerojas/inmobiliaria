<?php 

include '../conexion/conexion.php';
include '../extend/permiso.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $con->real_escape_string(htmlentities($_POST['id']));
    $nivel = $con->real_escape_string(htmlentities($_POST['nivel']));
    $up = $con->query("UPDATE usuario SET nivel='$nivel' WHERE id='$id'");

    if ($up) {
        header('location:../extend/alerta.php?msj=NIVEL ACTUALIZADO&c=us&p=in&t=success');
    }else {
        header('location:../extend/alerta.php?msj=El nivel de usuario no pudo ser actualizado&c=us&p=in&t=error');
    }
}else {
    header('location:../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');
}
$con->close();
?>