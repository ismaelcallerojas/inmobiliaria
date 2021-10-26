<?php 
include '../conexion/conexion.php'; 
$id = htmlentities($_GET['id']);
$ruta = htmlentities($_GET['ruta']);
$id_propiedad = htmlentities($_GET['id_propiedad']);

$del = $con->prepare("DELETE  FROM imagenes WHERE id = ? ");
$del->bind_param('i',$id);


if($del->execute()){
    unlink($ruta);
    header('location:../extend/alerta.php?msj=Imagen borrada&c=prop&p=img&t=success&id='.$id_propiedad.'');
}else{
    header('location:../extend/alerta.php?msj=Imagen no borrada&c=prop&p=img&t=error&id='.$id_propiedad.'');
}

$del->close();  
$con->close(); 
?>