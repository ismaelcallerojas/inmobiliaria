<?php  

include '../conexion/conexion.php';
$user = $_SESSION['nick'];
$up = $con->query("UPDATE usuario SET bloqueo=0 WHERE nick='$user'");
if ($up) {
    $_SESSION = array();
    session_destroy();
    header("location:../extend/alerta.php?msj=USO INDEBIDO DEL SISTEMA, USTED SERA BLOQUEADO&c=salir&p=salir&t=warning");
}

?>