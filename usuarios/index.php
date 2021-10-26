<?php include '../extend/header.php'; 

include '../extend/permiso.php';

?>
<!--Formulario de registro de usuarios -->
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Alta de Usuarios</span>
                <form class="form" action="ins_usuarios.php" method="post" enctype="multipart/form-data">
                    <div class="input-field">
                        <input type="text" name="nick" required autofocus title="DEBE DE CONTENER ENTRE 4 A 15 CARACTERES, SOLO LETRAS" pattern="[A-Za-z]{4,15}" id="nick" onblur="may(this.value, this.id)">
                        <label for="nick">Nick: </label>
                    </div>
                    <div class="validacion"></div>
                        <div class="input-field">
                            <input type="password" name="pass1" title="CONTRASEÑA CON NÚMEROS, LETRAS, ENTRE 8 A 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" id="pass1" required>
                            <label for="pass1">Contraseña:</label>
                        </div>
                        <div class="input-field">
                            <input type="password" title="CONTRASEÑA CON NÚMEROS, LETRAS MAYÚSCULAS Y MINÚSCULAS, ENTE 8 A 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}" id="pass2" required>
                            <label for="pass2">Verificar Contraseña:</label>
                        </div>
                    <select name="nivel" required>
                        <option value="" disabled selected>ELIJE UN NIVEL DE USUARIO</option>
                        <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                        <option value="ASESOR">ASESOR</option>
                    </select>
                    <div class="input-field">
                        <input type="text" name="nombre" required title="Nombre del Usuario" id="nombre" onblur="may(this.value, this.id)">
                        <label for="nombre">Nombre completo del usuario: </label>
                    </div>
                    <div class="input-field">
                        <input type="email" name="correo" title="Correo electronico" id="correo">
                        <label for="email">Correo electronico:</label>
                    </div>
                    <div class="file-field input-field">
                        <div class="waves-effect waves-light btn red">
                            <span><i class="material-icons left">add_a_photo</i>Foto:</span>
                            <input type="file" name="foto" id="">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    <button type="submit" class="waves-effect waves-light btn black" id="btn_guardar">Guardar <i class="material-icons right">send</i></button>
                </form>
            </div>
        </div>
    </div>
</div><!--Fin del formulario de registro de usuarios -->

<!--Buscador de usuarios -->
<div class="row">
    <div class="col s12">
        <nav class="brown lighten-3">
            <div class="nav-wrapper">
                <div class="input-field">
                    <input type="search" name="" id="buscar" autocomplete="off">
                    <label for="buscar"><i class="material-icons left">search</i></label>
                    <i class="material-icons">close</i>
                </div>
            </div>
        </nav>
    </div>
</div>
<!--Fin del buscador de usuarios -->

<!--Mostrar datos de la tabla usuarios -->
<?php 
$sel = $con->query("SELECT * FROM usuario");
$row = mysqli_num_rows($sel);
?>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Usuarios (<?php echo $row ?>)</span>
                <table>
                    <thead>
                        <th>Nick</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Nivel</th>
                        <th></th>
                        <th>Foto</th>
                        <th>Bloqueo</th>
                        <th>Eliminar</th>
                        
                    </thead>
                    <?php while($f = $sel->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $f['nick'] ?></td>
                        <td><?php echo $f['nombre'] ?></td>
                        <td><?php echo $f['correo'] ?></td>
                        <td>
                        <form action="up_nivel.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $f['id'] ?>">
                            <select name="nivel" required>
                                <option value="<?php echo $f['nivel']?>" disabled selected><?php echo $f['nivel']?></option>
                                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                <option value="ASESOR">ASESOR</option>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn-floating btn-small waves-effect waves-light"><i class="material-icons">repeat</i></button>
                        </form>                    
                        </td>
                        <td><img src="<?php echo $f['foto'] ?>" width="50" class="circle"></td>
                        <td style="text-align:center">
                        <?php
                        if ($f['bloqueo']==1): ?>
                        <a href="bloqueo_manual.php?us=<?php echo $f['id']?>&bl=<?php echo $f['bloqueo']?>"><i class="material-icons green-text">lock_open</i></a>
                        <?php else: ?>                        
                            <a href="bloqueo_manual.php?us=<?php echo $f['id']?>&bl=<?php echo $f['bloqueo']?>"><i class="material-icons red-text">lock_outline</i></a>
                                                
                        <?php endif; ?>
                        </td>
                        <td style="text-align:center">
                            <button onclick="swal({
                                title: 'Esta seguro que desea eliminar al usuario?',
                                text: 'Al eliminarlo, no podra recuperarlo!',
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Si, eliminarlo!'
                                }).then(function() {
                                    location.href='eliminar_usuario.php?id=<?php echo $f['id'] ?>';})"" class="btn-floating btn-small waves-effect waves-light red" >
                                    <i class="material-icons">clear</i></button>
                        </td>
                    </tr>
                    <?php  } ?>
                </table>
            </div>
        </div>
    </div>
</div><!--FIN Mostrar datos de la tabla usuarios -->

<?php include '../extend/scripts.php'; ?>
    <script src="../js/validacion.js"></script>
    </body>
</html>