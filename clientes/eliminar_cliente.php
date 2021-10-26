<?php 
include '../conexion/conexion.php';

$id = htmlentities($_GET['id']);

$del = $con->prepare("DELETE FROM cliente WHERE id = ? ");
$del->bind_param('i', $id);

if ($del->execute()) {
	header('location:../extend/alerta.php?msj=El cliente ha sido Eliminado&c=cli&p=in&t=success');
}else {
	header('location:../extend/alerta.php?msj=El cliente no pudo ser Eliminado&c=cli&p=in&t=error');
}
$del->close();
$con->close();

 ?>