<?php 

include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] ==  'POST') {
	$nombre =  htmlentities($_POST['nombre']);
	$direccion =  htmlentities($_POST['direccion']);
	$telefono =  htmlentities($_POST['telefono']);
	$correo =  htmlentities($_POST['email']);
	$asesor = $_SESSION['nombre'];
	$id = '';

	$ins = $con->prepare("INSERT INTO cliente VALUES(?,?,?,?,?,?) ");
	$ins->bind_param('isssss', $id, $nombre,  $direccion, $telefono,  $correo, $asesor);

	if ($ins->execute()) {
		header('location:../extend/alerta.php?msj=El cliente ha sido registrado&c=cli&p=in&t=success');
	}else {
		header('location:../extend/alerta.php?msj=El cliente no pudo ser registrado&c=cli&p=in&t=error');
	}

	$ins->close();
	$con->close();
}else {
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=cli&p=in&t=error');
}

?>
