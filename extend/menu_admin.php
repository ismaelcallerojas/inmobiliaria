<nav class="black">
    <span class="right"> Sistema Web: Inmobiliaria</span>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
</nav>

<ul id="slide-out" class="sidenav sidenav-fixed nav-wrapper">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="../img/bg1.jpg" width="100%" height="100%">
            </div> 
            <a href="../perfil/index.php"><img class="circle" src="../usuarios/<?php echo $_SESSION['foto'] ?>"></a>
            <a href="../perfil/perfil.php" class="white-text"><b><?php echo $_SESSION['nombre'] ?></b></a>
            <a class="white-text"><?php echo $_SESSION['correo'] ?></a>
        </div>
    </li>
    <li><a href="../inicio"><i class="material-icons" style="color: skyblue">home</i>INICIO</a></li>

    <li><div class="divider"></div></li>

    <li><a href="../usuarios"><i class="material-icons" style="color: green">contact_phone</i>USUARIOS</a></li>

    <li><div class="divider"></div></li>

    <li><a href="../clientes"><i class="material-icons" style="color: black">contacts</i>CLIENTES</a></li>
    
    <li><div class="divider"></div></li>
    
    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons" style="color: orange">work</i>PROPIEDADES<i class="material-icons right">arrow_drop_down</i></a></li>

    <li><div class="divider"></div></li>

    <li><a href="../login/salir.php"><i class="material-icons" style="color: red">power_settings_new</i><b>SALIR</b></a></li>

    <li><div class="divider"></div></li>
</ul>
<ul id="dropdown1" class="dropdown-content">
    <li><a href="../propiedades/index.php">GENERAL</a></li>
  <li><a href="../propiedades/index.php?ope=VENTA">VENTA</a></li>
  <li><a href="../propiedades/index.php?ope=RENTA">RENTA</a></li>
  <li><a href="../propiedades/index.php?ope=TRASPASO">TRASPASO</a></li>
  <li><a href="../propiedades/index.php?ope=OCUPADO">OCUPADO</a></li>
  <li><a href="../propiedades/cancelados.php">CANCELADOS</a></li>
</ul>
<a class="dropdown-trigger" href="#!" data-target="dropdown1"></a>