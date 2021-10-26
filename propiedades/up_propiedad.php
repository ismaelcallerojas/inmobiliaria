<?php
include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

foreach ($_POST as $campo => $valor) {
  $variable = "$" . $campo. "='" . htmlentities($valor). "';";
  eval($variable);
}

$sel = $con->prepare("SELECT departamento FROM departamentos WHERE iddepartamentos = ? ");
$sel->bind_param('i', $departamento);
$sel->execute();
$res = $sel->get_result();
if ($f=$res->fetch_assoc()) {
  $nombre_departamento = $f['departamento'];
}
$mapa = $calle_num ." ". $fraccionamiento. " ". $nombre_departamento . ", ". $provincia;

$up = $con->prepare("UPDATE inventario SET departamento=?, provincia=?, precio=?, fraccionamiento=?, calle_num=?, numero_int=?, m2t=?, banos=?, plantas=?, caracteristicas=?, m2c=?, recamaras=?, cocheras=?, observaciones=?, forma_pago=?, asesor=?, tipo_inmueble=?, fecha_registro=?, comentario_web=?, operacion=?, mapa=?, latitud=?, longitud=? WHERE propiedad=? ");
$up->bind_param("ssdssiiiisiiisssssssssss", $nombre_departamento,$provincia,$precio,$fraccionamiento,$calle_num,$numero_int,$m2t,$banos,$plantas,$caracteristicas,$m2c,$recamaras,$cocheras,$observaciones,$forma_pago,$asesor,$tipo_inmueble,$fecha_registro,$comentario_web,$operacion,$mapa, $latitud, $longitud, $id);

if ($up->execute()) {
  header('location:../extend/alerta.php?msj=Edito propiedad&c=prop&p=in&t=success');
}else{
  header('location:../extend/alerta.php?msj=No edito la propiedad&c=prop&p=in&t=error');
}

  $up->close();
  $con->close();
  }else {
    header('location:../extend/alerta.php?msj=Utiliza el formulario&c=cli&p=in&t=error');
  }

 ?>
