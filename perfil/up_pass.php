<?php  

include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nick = $_SESSION['nick'];
    $pass = $con->real_escape_string(htmlentities($_POST['pass1']));
    $pass = sha1($pass);

    $up = $con->query("UPDATE usuario SET pass='$pass' WHERE nick='$nick'");
if ($up) {
    header('location:../extend/alerta.php?msj=Password Actualizado&c=pe&p=perfil&t=success');
}else {
    header('location:../extend/alerta.php?msj=No se pudo actualizar el password&c=pe&p=perfil&t=error');
}
$con->close();
}else {
    header('location:../extend/alerta.php?msj=Mensaje&c=pe&p=perfil&t=error');
}
?>