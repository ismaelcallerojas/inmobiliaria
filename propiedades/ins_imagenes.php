<?php 
    include '../conexion/conexion.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = htmlentities($_POST['id']);
        $cont=0;
        foreach ($_FILES['ruta']['tmp_name'] as $key => $value) {
            $ruta=$_FILES['ruta']['tmp_name'][$key];
            $imagen=$_FILES['ruta']['name'][$key];

        $ancho = 500;
        $alto = 400;
        $info = pathinfo($imagen);
        $tamano = getimagesize($ruta);
        $width = $tamano[0];
        $heigth = $tamano[1];

        if($info['extension'] == 'jpg' || $info['extension'] == 'JPG'){
            $imagenvieja = imagecreatefromjpeg($ruta);
            $nueva = imagecreatetruecolor($ancho,$alto);
            imagecopyresampled($nueva, $imagenvieja, 0,0,0,0, $ancho,$alto,$width,$heigth);
            $cont++;
            $rand=rand(000,999);
            $renombrar = $id.$rand.$cont;
            $copia= "casas/".$renombrar.'.jpg';
            imagejpeg($nueva,$copia);
       
        }elseif ($info['extension'] == 'png' || $info['extension'] == 'PNG'){
            $imagenvieja = imagecreatefrompng($ruta);
            $nueva = imagecreatetruecolor($ancho,$alto);
            imagecopyresampled($nueva, $imagenvieja, 0,0,0,0, $ancho,$alto,$width,$heigth);
            $cont++;
            $rand=rand(000,999);
            $renombrar = $id.$rand.$cont;
            $copia= "casas/".$renombrar.'.png';
            imagepng($nueva,$copia);
        }else{
            header('location:../extend/alerta.php?msj=Solo se acepta formato JPG y PNG&c=prop&p=img&t=error&id='.$id.'');
            exit;
        }
        $ins = $con->prepare("INSERT INTO imagenes VALUES(?,?,?) ");
        $ins->bind_param('iss',$id_img,$id,$copia);
        $id_img = '';
        $ins->execute();

        } //termina foreach
        if($ins){
            header('location:../extend/alerta.php?msj=Imagenes guardadas&c=prop&p=img&t=success&id='.$id.'');
        }else{
            header('location:../extend/alerta.php?msj=Imagenes no guardadas&c=prop&p=img&t=error&id='.$id.'');
        }
    $ins->close();
    $con->close();
    }else{
        header('location:../extend/alerta.php?msj=Utilice el formulario&c=prop&p=img&t=error&id='.$id.'');
    }