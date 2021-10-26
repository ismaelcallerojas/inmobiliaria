<?php
include '../conexion/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css">
    <title>Proyecto</title>
</head>
<body>

<?php
$mensaje = htmlentities($_GET['msj']);
$c = htmlentities($_GET['c']);
$p = htmlentities($_GET['p']);
$t = htmlentities($_GET['t']);

switch ($c) {
    case 'us':
        $carpeta = '../usuarios/';
        break;
    case 'home':
        $carpeta = '../inicio/';
        break;
    case 'salir':
        $carpeta = '../';
        break;
    case 'pe':
        $carpeta = '../perfil/';
        break;
    case 'cli':
        $carpeta = '../clientes/';
        break;
    case 'prop':
        $carpeta = '../propiedades/';
        break;
}
switch ($p) {
    case 'in':
        $pagina = 'index.php';
        break;
    case 'home':
        $pagina = 'index.php';
        break;
    case 'salir':
        $pagina = '';
        break;
    case 'perfil':
        $pagina = 'perfil.php';
        break;
    case 'img':
        $pagina = 'imagenes.php';
        break;
    case 'can':
        $pagina = 'cancelados.php';
        break;
}

if(isset($_GET['id'])){
    $id = htmlentities($_GET['id']);
    $dir=$carpeta.$pagina.'?id='.$id;
}else{
    $dir = $carpeta.$pagina;
}


if ($t == "error") {
    $titulo= "Oppss..";
}else{
    $titulo = "Muy Bien";
}
?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>
<script>
swal({
    title: '<?php echo $titulo ?>',
    text: '<?php echo $mensaje ?>',
    type: '<?php echo $t ?>',
    confirmButtonColor1: '#3085d6',
    confirmButtonText: 'Ok'
}).then(function(){
    location.href='<?php echo $dir ?>';
});
$(document).click(function(){
    location.href='<?php echo $dir ?>';
});
$(document).keyup(function(e){
    if (e.which == 27) {
        location.href='<?php echo $dir ?>';
    }
})
</script>
</body>
</html>