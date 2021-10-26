<?php include '../extend/header.php'; 
$id= $con->real_escape_string(htmlentities($_GET['id']));
$nombre= $con->real_escape_string(htmlentities($_GET['nombre']));
?>


<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Ingreso de propiedad de: <?php echo $nombre?> </span>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <h5 align="center"><b>DATOS GENERALES</b></h5>
        <form  action="ins_propiedad.php" method="post" autocomplete="off" >
          <!--AJAX AQUI -->
        <div class="row">
            <div class="col s6">
                <select id="departamento" name="departamento" required="">
                <option value="" disabled selected>SELECCIONA UN DEPARTAMENTO</option>
                <?php $sel_departamento =$con->prepare("SELECT * FROM departamentos");
                $sel_departamento->execute();

                $res_departamento = $sel_departamento->get_result();
                while($f_departamento=$res_departamento->fetch_assoc()) { ?>
                <option value="<?php echo $f_departamento['iddepartamentos'] ?>"><?php echo $f_departamento['departamento'] ?></option>
                <?php }
                $sel_departamento->close();
                 ?>
                </select>
            </div>
            <div class="col s6">
                <div class="res_departamento"></div>
            </div>
        </div>

        <div class="row">
          <div class="col s6">
              <input type="hidden" name="id_cliente" value="<?php echo $id ?>">
              <input type="hidden" name="nombre_cliente" value="<?php echo $nombre ?>">

            <div class="input-field">
              <input type="number" name="precio"  id="precio" step='0.01' required  >
              <label for="precio">Precio</label>
            </div>
            <div class="input-field">
              <input type="text" name="fraccionamiento"  id="fraccionamiento" required onblur="may(this.value, this.id)" >
              <label for="fraccionamiento">Barrio</label>
            </div>
            <div class="input-field">
              <input type="text" name="latitud"  id="latitud"  >
              <label for="num_int">Latitud</label>
            </div>


          </div> <!--Termina Primer columna -->
          <div class="col s6">

            <div class="input-field">
              <input type="text" name="calle_num"   id="calle_num" onblur="may(this.value, this.id)" required  >
              <label for="calle_num">Calle y numero</label>
            </div>
            <div class="input-field">
              <input type="number" name="numero_int"  id="numero_int"  >
              <label for="num_int">Numero interior</label>
            </div>
            <div class="input-field">
              <input type="text" name="longitud"  id="longitud"  >
              <label for="num_int">Longitud</label>
            </div>

          </div><!-- TerminaSegunda columna -->
        </div>


        <h5 align="center"><b>CARACTERISTICAS</b></h5>
        <div class="row">
          <div class="col s6">

            <div class="input-field">
              <input type="number" name="m2t"   id="m2t"  >
              <label for="m2t">Metros cuadrados de terreno</label>
            </div>
            <div class="input-field">
              <input type="number" name="banos"   id="banos"  >
              <label for="banos">Baños</label>
            </div>
            <div class="input-field">
              <input type="number" name="plantas"   id="plantas"  >
              <label for="plantas">Plantas</label>
            </div>
            <div class="input-field">
              <textarea name="caracteristicas" rows="8" cols="80" id="caracteristicas" onblur="may(this.value, this.id)" class="materialize-textarea"></textarea>
              <label for="caracteristicas">Otras caracteristicas</label>
            </div>

          </div><!--Termina Primer columna -->

          <div class="col s6">

            <div class="input-field">
              <input type="number" name="m2c"   id="m2c"  >
              <label for="m2c">Metros cuadrados de construccion</label>
            </div>
            <div class="input-field">
              <input type="number" name="recamaras"   id="recamaras"  >
              <label for="recamaras">Recamaras</label>
            </div>
            <div class="input-field">
              <input type="number" name="cocheras"   id="cocheras"  >
              <label for="cocheras">Cocheras</label>
            </div>
            <div class="input-field">
              <textarea name="observaciones" rows="8" cols="80" id="observaciones" onblur="may(this.value, this.id)" class="materialize-textarea"></textarea>
              <label for="observaciones">Observaciones</label>
            </div>

          </div><!-- TerminaSegunda columna -->
        </div>


        <h5 align="center"><b>DATOS DE VENTA</b></h5>
        <div class="row">
          <div class="col s6">

            <div class="input-field">
              <input type="text" name="forma_pago"  id="forma_pago" onblur="may(this.value, this.id)" required pattern="[A-Z\s ]+"  >
              <label for="forma_pago">Forma de pago</label>
            </div>

             <?php if ($_SESSION['nivel'] == 'ADMINISTRADOR'): ?>
                <select class="" name="asesor" required="">
                  <option value="" disabled selected >ESCOGE UN ASESOR</option>
                  <?php $sel= $con->prepare("SELECT nombre FROM usuario WHERE bloqueo = 1");
                  $sel->execute();
                  $res= $sel->get_result();
                  while($f = $res->fetch_assoc()){  ?>
                  <option value="<?php echo $f['nombre'] ?>"><?php echo $f['nombre'] ?></option>
                  <?php }
                  $sel->close();
                  $con->close();
                  ?>
                </select>
                <?php else: ?>
                    <input type="text" readonly name="asesor" value="<?php echo $_SESSION['nombre'] ?>">
                <?php endif; ?>


            <select name="tipo_inmueble" required >
              <option value="" disabled selected  >ELIGE EL TIPO DE INMUEBLE</option>
              <option value="CASA">CASA</option>
              <option value="TERRENO">TERRENO</option>
              <option value="LOCAL">LOCAL</option>
              <option value="DEPARTAMENTO">DEPARTAMENTO</option>
            </select>

          </div><!-- Termina Primera columna -->

          <div class="col s6">

            <div class="input-field">
              <!-- Se inicializa-->
              <input type="text" class="datepicker" name="fecha_registro" id="fecha_registro" required >
              <label for="fecha_registro">Fecha de registro</label>
            </div>

            <div class="input-field">
              <textarea name="comentario_web" rows="8" cols="80" id="comentario_web" onblur="may(this.value, this.id)" class="materialize-textarea"></textarea>
              <label for="comentario_web">Comentario para los clientes en la web</label>
            </div>

            <select name="operacion" required  >
              <option value="" disabled selected  >ELIGE LA OPERACION</option>
              <option value="VENTA">VENTA</option>
              <option value="RENTA">RENTA</option>
              <option value="TRASPASO">TRASPASO</option>
              <option value="OCUPADO">OCUPADO</option>
            </select>

          </div><!-- Termina Segunda columna -->
        </div>
        <center>
        <button type="submit" class="waves-effect waves-light btn" id="btn_guardar">Guardar <i class="material-icons right">send</i></button>
        </center>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include '../extend/scripts.php'; ?>
<script src="../js/departamentos.js">

</script>

</body>
</html>
