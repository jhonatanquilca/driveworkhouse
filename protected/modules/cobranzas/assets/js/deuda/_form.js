var inputClineteId;
var descripcionPalntillaId;
$(function () {
    inputClineteId = $('#Deuda_cliente_id');
    inputClineteId.select2({
        placeholder: "Seleccione un Cliente",
//        allowClear: true,
    });
    
        descripcionPalntillaId = $('#Deuda_descripcion_palntilla_id');
        descripcionPalntillaId.select2({
        placeholder: "Seleccione una Plantilla",
//        allowClear: true,
    });


select2Error(inputClineteId);

});

function select2Error(object){
id=object.attr('id');
console.log(id);
if(object.hasClass('error')){
$('#select2-'+id+'>span').css('color','#b94a48');
console.log($('#select2-'+id+'>span'));

$('#select2-'+id+'-container').parent().css('border-color','#b94a48');
console.log($('#select2-'+id+'-container').parent());
}
}


