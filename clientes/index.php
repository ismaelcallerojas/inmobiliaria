<?php include '../extend/header.php'; ?>

<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Alta de clientes</span>
        <form class="form" action="ins_clientes.php" method="post" autocomplete=off >
          <div class="input-field">
            <input type="text" name="nombre"  title="Solo letras" pattern="[A-Z/s ]+"  id="nombre" onblur="may(this.value, this.id)"  required>
            <label for="nombre">Nombre</label>
          </div>
          <div class="input-field">
            <input type="text" name="direccion"    id="direccion" onblur="may(this.value, this.id)" required >
            <label for="direccion">Dirección</label>
          </div>
          <div class="input-field">
            <input type="text" name="telefono"   id="telefono" required >
            <label for="telefono">Telefono</label>
          </div>
          <div class="input-field">
            <input type="email" name="email"   id="email"  >
            <label for="email">Correo</label>
          </div>
          <button type="submit" class="waves-effect waves-light btn" id="btn_guardar">Guardar <i class="material-icons right">send</i></button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col s12">
    <nav class="brown lighten-3" >
      <div class="nav-wrapper">
        <div class="input-field">
          <input type="search"   id="buscar" autocomplete="off"  >
          <label for="buscar"><i class="material-icons" >search</i></label>
          <i class="material-icons" >close</i>
        </div>
      </div>
    </nav>
  </div>
</div>

<?php
if ($_SESSION['nivel'] == 'ADMINISTRADOR') {
  $sel = $con->prepare("SELECT * FROM cliente");
}else {
  $sel = $con->prepare("SELECT * FROM cliente WHERE asesor = ? ");
  $sel->bind_param('s', $_SESSION['nombre']);
}
$sel->execute();
$res = $sel->get_result();
$row = mysqli_num_rows($res);
?>

<div class="row">
  <div class="col s12">
    <div class="card ">
      <div class="card-content">
        <span class="card-title">Clientes (<?php echo $row ?>)</span>
          <table>
            <thead>
              <tr class="cabecera">
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Asesor</th>
                <th>Propiedad</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <?php while ($f = $res->fetch_assoc()){ ?>
              <tr>
                <td><?php echo $f['nombre'] ?></td>
                <td><?php echo $f['direccion'] ?></td>
                <td><?php echo $f['tel'] ?></td>
                <td><?php echo $f['correo'] ?></td>
                <td><?php echo $f['asesor'] ?></td>
                
                <td><a href="../propiedades/alta_propiedades.php?id=<?php echo $f['id'] ?>&nombre=<?php echo $f['nombre'] ?>" class="btn-floating waves-effect waves-light green" title="Agregar propiedad"><i class="material-icons">add</i></a>

                <td><a href="editar_cliente.php?id=<?php echo $f['id'] ?>" class="btn-floating waves-effect waves-light blue" title="Actualizar datos del Cliente"><i class="material-icons">loop</i></a>
                </td>
                <td style="text-align:center">
                            <button onclick="swal({
                                title: 'Esta seguro que desea eliminar al Cliente?',
                                text: 'Al eliminarlo, no podra recuperarlo!',
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Si, eliminarlo!'
                                }).then(function() {
                                    location.href='eliminar_cliente.php?id=<?php echo $f['id'] ?>';})"" class="btn-floating waves-effect waves-light red"  title="Eliminar Cliente">
                                    <i class="material-icons">delete</i></button>
                </td>
              </tr>
              <?php
            }
            $sel->close();
            $con->close();
            ?>
          </table>
      </div>
    </div>
  </div>
</div>


<?php include '../extend/scripts.php'; ?>

</body>
</html>