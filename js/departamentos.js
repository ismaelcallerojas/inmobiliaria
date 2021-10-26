$('#departamento').change(function(){
    $.post('ajax_provincia.php',{
        departamento:$('#departamento').val(),
        
        beforeSend: function(){
            $('.res_departamento').html("Espere un momento por favor..");
        }
    }, function(respuesta){
        $('.res_departamento').html(respuesta);
    });
});