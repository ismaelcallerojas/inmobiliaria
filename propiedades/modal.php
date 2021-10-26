<?php
include '../conexion/conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));
$sel = $con->prepare("SELECT * FROM inventario WHERE propiedad = ? ");
$sel->bind_param('s', $id);
$sel->execute();
$res = $sel->get_result();
if ($f =$res->fetch_assoc()) {
}
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../css/materialize.min.css">
   <title>Detalles</title>

 </head>
 <body>
<h5 align="right"><b><?php echo number_format($f['precio'], 2); ?> $</b></h5>
 <table class="striped" width="100%" >
   <tr>
     <td colspan="4" class="center"><b>Datos generales</b></td>
   </tr>
   <tr>
     <td><b>Cliente</b></td>
     <td><?php echo $f['nombre_cliente'] ?></td>
     <td><b>Num.</b></td>
     <td><?php echo $f['consecutivo'] ?></td>
   </tr>
   <tr>
     <td><b>Calle y numero</b></td>
     <td><?php echo $f['calle_num']?></td>
     <td><b>Barrio</b></td>
     <td><?php echo $f['fraccionamiento'] ?></td>
   </tr>
   <tr>
     <td><b>Numero int.</b></td>
     <td><?php echo $f['numero_int']?></td>
     <td><b>Departamento</b></td>
     <td><?php echo $f['departamento'] ?></td>
   </tr>
   <tr>
     <td><b>Provincia</b></td>
     <td colspan="4"><?php echo $f['provincia']?></td>
     
   </tr>
   <tr>
     <td><b>Latitud</b></td>
     <td><?php echo $f['latitud'] ?></td>
     <td><b>Longitud</b></td>
     <td><?php echo $f['longitud'] ?></td>
   </tr>
   <tr>
     <td colspan="4" class="center" ><b>Caracteristicas</b></td>
   </tr>
   <tr>
     <td><b>M2 Terreno.</b></td>
     <td><?php echo $f['m2t']?></td>
     <td><b>M2 Construccion</b></td>
     <td><?php echo $f['m2c'] ?></td>
   </tr>
   <tr>
     <td><b>Baños</b></td>
     <td><?php echo $f['banos']?></td>
     <td><b>Plantas</b></td>
     <td><?php echo $f['plantas'] ?></td>
   </tr>
   <tr>
     <td><b>Recamaras</b></td>
     <td><?php echo $f['recamaras']?></td>
     <td><b>Cocheras</b></td>
     <td><?php echo $f['cocheras'] ?></td>
   </tr>
   <tr>
     <td><b>Caracteristicas</b></td>
     <td><?php echo $f['caracteristicas']?></td>
     <td><b>Observaciones</b></td>
     <td><?php echo $f['observaciones'] ?></td>
   </tr>
   <tr>
     <td colspan="4" class="center" ><b>Datos de venta</b></td>
   </tr>
   <tr>
     <td><b>Forma de pago</b></td>
     <td><?php echo $f['forma_pago']?></td>
     <td><b>Asesor</b></td>
     <td><?php echo $f['asesor'] ?></td>
   </tr>
   <tr>
     <td><b>Tipo de inmueble</b></td>
     <td><?php echo $f['tipo_inmueble']?></td>
     <td><b>Fecha de registro</b></td>
     <td><?php echo date('d-m-Y', strtotime($f['fecha_registro']))  ?></td>
   </tr>
   <tr>
     <td><b>Comentario web</b></td>
     <td><?php echo $f['comentario_web']?></td>
     <td><b>Operacion</b></td>
     <td><?php echo $f['operacion'] ?></td>
   </tr>
 </table>
 </body>
 </html>