<?php

include '../conexion/conexion.php';
if (!isset($_SESSION['nick'])) {
  header('location:../');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css">
    <style>
        header, main, footer {
      padding-left: 300px;
    }

    body{
      text-transform: uppercase;
    }
    tr,th,td{
      text-align: center;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }
    }
    </style>
    <title>Sistema Web: Inmobiliaria</title>
</head>
<body class= "grey lighten-3">
    <main>
    <?php 
    
    if ($_SESSION['nivel']=='ADMINISTRADOR') {
      include 'menu_admin.php';
    }else {
      include 'menu_asesor.php';
    }
    
    ?>