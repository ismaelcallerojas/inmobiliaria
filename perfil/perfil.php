<?php

include '../extend/header.php';

?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <h3>Actualizar datos</h3>
            </div>
        <div class="card-tabs">
            <ul class="tabs tabs-fixed-width">
                <li class="tab" ><a  href="#datos"><b> Datos</b></a></li>
                <li class="tab"><a href="#pass" ><b>Contraseña</b></a></li>
            </ul>
        </div>
        <div class="card-content grey lighten-4">
            <div id="datos">
                <form class="form" action="up_perfil.php" method="post" enctype="multipart/form-data">   
                        <div class="input-field">
                            <input type="text" name="nombre" required title="Nombre del Usuario" id="nombre" onblur="may(this.value, this.id)" value="<?php echo $_SESSION['nombre'] ?>">
                            <label for="nombre">Nombre completo del usuario: </label>
                        </div>
                        <div class="input-field">
                            <input type="email" name="correo" title="Correo electronico" id="correo" value="<?php echo $_SESSION['correo'] ?>">
                            <label for="email">Correo electronico:</label>
                        </div>
                            <button type="submit" class="waves-effect waves-light btn black" >Editar <i class="material-icons right">send</i></button>
                </form>
            </div>

            <div id="pass">
                <form class="form" action="up_pass.php" method="post">
                            <div class="input-field">
                                <input type="password" name="pass1" title="CONTRASEÑA CON NÚMEROS, LETRAS, ENTRE 8 A 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" id="pass1" required>
                                <label for="pass1">Contraseña:</label>
                            </div>
                            <div class="input-field">
                                <input type="password" title="CONTRASEÑA CON NÚMEROS, LETRAS MAYÚSCULAS Y MINÚSCULAS, ENTE 8 A 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" id="pass2" required>
                                <label for="pass2">Verificar Contraseña:</label>
                            </div>                        
                                <button type="submit" class="waves-effect waves-light btn black" id="btn_guardar">Editar <i class="material-icons right">send</i></button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>


<?php include '../extend/scripts.php'; ?>
    <script src="../js/validacion.js"></script>
    </body>
</html>
