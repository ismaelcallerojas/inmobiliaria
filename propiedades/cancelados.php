<?php 
include '../extend/header.php'; 

  $sel = $con->prepare("SELECT propiedad,consecutivo,nombre_cliente,calle_num,fraccionamiento,departamento,provincia,precio,forma_pago,asesor,tipo_inmueble,operacion,mapa, latitud, longitud, foto_principal FROM inventario WHERE estatus = 'CANCELADO' ");
$sel->execute();
$res = $sel->get_result();
$row = mysqli_num_rows($res);

?>

<!--buscador -->
<br>
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
<!--fin buscador -->

<!--tabla de propiedades -->
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Propiedades (<?php echo $row ?>)</span>
        <table>
          <thead>
            <tr class="cabecera">
              <th>Vista</th>
              <th>Num</th>
              <th>Cliente</th>
              <th>Propiedad</th>
              <th>Precio</th>
              <th>Credito</th>
              <th>Asesor</th>
              <th>Tipo</th>
              <th>Operacion</th>
              <th colspan="2">Opciones</th>
            </tr>
          </thead>
          <?php
          $sel->execute();
          $res = $sel->get_result();

          while ($f =$res->fetch_assoc()) { ?>
            <tr>
              <!-- Modal Trigger -->
            <td class="borrar">
              <button data-target="modal1" onclick="enviar(this.value)" value="<?php echo $f['propiedad'] ?>" class="btn-floating modal-trigger" title="Visualizar todos los datos de esta propiedad"><i class="material-icons">visibility</i>
              </button>
            </td> 
           

              <td><?php echo $f['consecutivo'] ?></td>
              <td><?php echo $f['nombre_cliente'] ?></td>
              <td><?php echo $f['calle_num'].' '.$f['fraccionamiento'].' '.$f['departamento'].' ,'.$f['provincia'] ?></td>
              <td><?php echo number_format($f['precio'],2);  ?> $</td>
              <td><?php echo $f['forma_pago'] ?></td>
              <td><?php echo $f['asesor'] ?></td>
              <td><?php echo $f['tipo_inmueble'] ?></td>
              <td><?php echo $f['operacion'] ?></td>
              
              <!--boton para recuperar -->
              <td style="text-align:center"><a href="cancelar_propiedad.php?id=<?php echo $f['propiedad'] ?>&accion=ACTIVO" class="btn-floating waves-effect waves-light blue" title="Cambiar a estado ACTIVO"><i class="material-icons">loop</i></a>
              </td>
              <!--boton para eliminaf -->
              <td><a href="#" class="btn-floating waves-effect waves-light red" onclick="swal({
                  title: 'Esta seguro que desea eliminar la propiedad?',
                  text: 'Al eliminar la propiedad, no podra recuperarla!',
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si, eliminar!'
                  }).then(function() {
                  location.href='eliminar_propiedad.php?id=<?php echo $f['propiedad'] ?>&foto=<?php echo $f['foto_principal'] ?>'; })" title="Eliminar la Propiedad"> <i class="material-icons">delete_forever</i></a>
              </td>
            </tr>
          <?php }
          $sel->close();
          $con->close();
           ?>
        </table>
      </div>
    </div>
  </div>
</div>
<!--fin tabla de propeidad -->


  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Información</h4>
      <div class="res_modal">
      </div>
    </div>
    <div class="modal-footer">
      <a class="modal-close btn-floating btn-small waves-effect waves-light red"><i class="material-icons">clear</i></a>
    </div>
  </div>

<div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Mapa</h4>
      <div class="res_modal">
      </div>
    </div>
    <div class="modal-footer">
      <a class="modal-close btn-floating btn-small waves-effect waves-light red"><i class="material-icons">clear</i></a>
    </div>
  </div>
  
  <script>

    function enviar(valor){
      $.get('modal.php',{
        id:valor,
        
        beforeSend: function(){
            $('.res_modal').html("Espere un momento por favor..");
        }
    }, function(respuesta){
        $('.res_modal').html(respuesta);
    });
}
function enviar1(valor){
      $.get('mapa.php',{
        id:valor,
        
        beforeSend: function(){
            $('.res_modal').html("Espere un momento por favor..");
        }
    }, function(respuesta){
        $('.res_modal').html(respuesta);
    });
}
  </script>

<?php include '../extend/scripts.php'; ?>

</body>
</html>