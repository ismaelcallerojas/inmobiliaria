<?php 
include '../conexion/conexion.php';
$id = htmlentities($_GET['id']);
$accion = htmlentities($_GET['accion']);

$up = $con->prepare("UPDATE inventario SET estatus =? WHERE propiedad = ?");
$up->bind_param('ss', $accion, $id);

if ($up->execute()) {
	header('location:../extend/alerta.php?msj=INMUEBLE '.$accion.'&c=prop&p=in&t=success');
}else {
	header('location:../extend/alerta.php?msj=INMUEBLE NO CANCELADO&c=prop&p=in&t=error');
}
$up->close();
$con->close();
 ?>