<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	header("Content-type: application/vnd.ms-excel; name='excel'");
	header("Content-Disposition: filename=archivo.xls");
	header("Pragma: no-cache");
	header("Expires: 0");

	echo $_POST['datos'];

}else{
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=prop&p=in&t=error');
}

 ?>