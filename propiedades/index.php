<?php 
include '../extend/header.php'; 
$row=0;
if(isset($_GET['ope'])){
  $operacion = $con->real_escape_string(htmlentities($_GET['ope']));
  $sel = $con->prepare("SELECT propiedad,consecutivo,nombre_cliente,calle_num,fraccionamiento,departamento,provincia,precio,forma_pago,asesor,tipo_inmueble,operacion,mapa, latitud, longitud FROM inventario WHERE estatus = 'ACTIVO' AND operacion = ? ");
      $sel->bind_param('s',$operacion);
$sel->execute();
          $res = $sel->get_result();
          $row = mysqli_num_rows($res);
          
        
}else{
  $sel = $con->prepare("SELECT propiedad,consecutivo,nombre_cliente,calle_num,fraccionamiento,departamento,provincia,precio,forma_pago,asesor,tipo_inmueble,operacion,mapa, latitud, longitud FROM inventario WHERE estatus = 'ACTIVO' ");
  $sel->execute();
  $res = $sel->get_result();
  $row = mysqli_num_rows($res);
}

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
        <form action="excel.php" method="post" target="_blank" id="exportar">
        
        <span class="card-title">Propiedades (<?php echo $row ?>)
        <button title="Exportar a excel" class="btn-floating green botonExcel btn-small"><i class="material-icons">grid_on</i></button>
        <input type="hidden" name="datos" id="datos">
        </span>
        </form>
        <table class="excel" border="1">
          <thead>
              <th class="borrar">Vista</th>
              <th>Num</th>
              <th>Cliente</th>
              <th>Propiedad</th>
              <th>Precio</th>
              <th>Credito</th>
              <th>Asesor</th>
              <th>Tipo</th>
              <th>Operacion</th>
              <th colspan="5" class="borrar">Opciones</th>
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
              <!--boton de imagenes -->
              <td class="borrar" title="Acceso a imagenes de esta Propiedad"><a href="imagenes.php?id=<?php echo $f['propiedad'] ?>" class="btn-floating pink"><i class="material-icons">image</i></a></td>
              <!--boton de mapa -->
              <td class="borrar">
              <button data-target="modal2" onclick="enviar1(this.value)" value="<?php echo $f['propiedad'] ?>" class="btn-floating modal-trigger orange" title="Mapa de esta propiedad"><i class="material-icons">room</i>
              </button></td>
              <!--boton de reporte -->
              <td class="borrar">
              <a href="pdf.php?id=<?php echo $f['propiedad'] ?>" class="btn-floating green" title="Exportar datos en PDF"><i class="material-icons">picture_as_pdf</i></a>
              </td>
              <!--boton de reporte -->
              <td class="borrar"><a href="editar_propiedad.php?id=<?php echo $f['propiedad'] ?>" class="btn-floating waves-effect waves-light blue" title="Actualizar datos de la propiedad"><i class="material-icons">loop</i></a>
              </td>
              <td class="borrar"><a href="#" class="btn-floating waves-effect waves-light red" onclick="swal({
                  title: 'Esta seguro que desea cancelar la propiedad?',
                  text: 'Al cancelarlo la propiedad pasara a un estado inactivo!',
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si, cancelar!'
                  }).then(function() {
                  location.href='cancelar_propiedad.php?id=<?php echo $f['propiedad'] ?>&accion=CANCELADO'; })"> <i class="material-icons">delete</i></a>
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
  

  <?php include '../extend/scripts.php'; ?>
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
  <script>

    $('.botonExcel').click(function(){
    $('.borrar').remove();
    $('#datos').val( $("<div>").append($('.excel').eq(0).clone()).html());
    $('#exportar').submit();
    setInterval(function(){ location.reload();}, 3000);
    });
    
  </script>

</body>
</html>