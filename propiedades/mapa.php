<?php
include '../conexion/conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));
$sel = $con->prepare("SELECT * FROM inventario WHERE propiedad = ? ");
$sel->bind_param('s', $id);
$sel->execute();
$res = $sel->get_result();
if ($f =$res->fetch_assoc()) {
}

$lat = $f['latitud'];
$long = $f['longitud'];

$dir = "https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d488.9278896915554!2d".$long."!3d".$lat."!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1ses-419!2sbo!4v1634871992962!5m2!1ses-419!2sbo";

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
<h5 align="right"><b>#<?php echo $f['consecutivo'] ?></b></h5>
 <table class="striped" width="100%" >
   <tr>
     <td colspan="4" class="center"><b>Ubicacion</b></td>
   </tr>
   <tr>
     <td><b>Calle y numero</b></td>
     <td><?php echo $f['calle_num']?></td>
     <td><b>Barrio</b></td>
     <td><?php echo $f['fraccionamiento'] ?></td>
   </tr>
   <tr>
     <td><b>Provincia</b></td>
     <td><?php echo $f['provincia']?></td>
     <td><b>Departamento</b></td>
     <td><?php echo $f['departamento'] ?></td>
   </tr>
   <tr>
     <td><b>Latitud</b></td>
     <td><?php echo $f['latitud'] ?></td>
     <td><b>Longitud</b></td>
     <td><?php echo $f['longitud'] ?></td>
   </tr>
   
   <tr>
     <td colspan="4" class="center" ><b>Mapa</b></td>
     <td><div class="divider"></div></td>
   </tr>
   <tr>
     <td colspan="4" class="center">
       <iframe src="<?php echo $dir ?>" width="500" height="400" style="border:1;" allowfullscreen="" loading="lazy"></iframe>
     </td>
   </tr>

 </table>
 </body>
 </html>