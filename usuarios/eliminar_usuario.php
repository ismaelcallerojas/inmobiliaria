<?php  

include '../conexion/conexion.php';

$id = $con->real_escape_string(htmlentities($_GET['id']));

$del = $con->query("DELETE FROM usuario WHERE id='$id'");

if ($del) {
    header('location:../extend/alerta.php?msj=USUARIO ELIMINADO&c=us&p=in&t=success');

}else{
    header('location:../extend/alerta.php?msj=Error al eliminar usuario&c=us&p=in&t=error');
}

$con->close();
?>