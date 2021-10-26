</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../js/v0.100.2/materialize.min.js"></script>
<script src="../js/materialize.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>
<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
        $('select').formSelect();
        $(".dropdown-trigger").dropdown();
        $('.modal').modal();
        $('.datepicker').datepicker({
          format: 'yyyy-m-d',
          i18n: {
                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
                weekdays: ["Domingo","Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                weekdaysShort: ["Dom","Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                weekdaysAbbrev: ["D","L", "M", "M", "J", "V", "S"]
                }
          });
  });

//Filtros de busqueda
  $('#buscar').keyup(function(event){
  var contenido = new RegExp($(this).val(),'i');
  $('tr').hide();
  $('tr').filter(function(){
    return contenido.test($(this).text());
  }).show();
});
//FIN filtros de busqueda

$(document).ready(function(){
  $(".dropdown-button").dropdown({
    inDuration: 300,
    outDuration: 225,
    constrainWidth: false,
    hover: false,
    gutter: 0,
    belowOrigin: false,
    alignment: 'left',
    stopPropagation: false
  });
  
$(".dropdown-trigger").dropdown({ hover: false});

      });

 

function may(obj, id){
  obj =obj.toUpperCase();
  document.getElementById(id).value =obj;
}


</script>
