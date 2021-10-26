<?php  

include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nick = $_SESSION['nick'];
    $foto = $_SESSION['foto'];

    //imagen
    $extension = '';
    $ruta = 'foto_perfil';
    $archivo = $_FILES['foto']['tmp_name'];
    $nombrearchivo = $_FILES['foto']['name'];
    $info = pathinfo($nombrearchivo);
    if ($archivo !='') {
        $extension = $info['extension'];
        if ($extension == "png" || $extension == "PNG" || $extension == "jpg" || $extension == "JPG") {
            unlink('../usuarios/'.$foto);
            $rand = 
            move_uploaded_file($archivo,'../usuarios/foto_perfil/'.$nick.'.'.$extension);
            $ruta = $ruta.'/'.$nick.'.'.$extension;
            $up = $con->query("UPDATE usuario SET foto='$ruta' WHERE nick='$nick'");
            if ($up) {
                $_SESSION['foto'] = $ruta;
                header('location:../extend/alerta.php?msj=Foto de Perfil Actualizado&c=pe&p=in&t=success');
            }else {
                header('location:../extend/alerta.php?msj=No se pudo actualizar la foto&c=pe&p=in&t=warning');
            }
        }else{
            header('location:../extend/alerta.php?msj=El formato de la imagen no es valido&c=us&p=in&t=error');
            exit;
        }
    }else{
        header('location:../extend/alerta.php?msj=No se detecto ninguna fot&c=pe&p=in&t=error');
    }
    //fin imagen



$con->close();
    
}else{
    header('location:../extend/alerta.php?msj=UTILIZA EL FORMULARIO&c=pe&p=in&t=error');
}



?>