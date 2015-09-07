var inputClineteId, inputClineteDescripcionPalntillaId;
$(function() {

    select2Error();
    inputClineteId = $('#Pago_cliente_id');
    inputClineteId.select2({
        placeholder: "Seleccione un Cliente",
//        multiple: "multiple",
        ajax: {
            url: baseUrl + 'cliente/cliente/ajaxlistClientes',
            dataType: 'json',
//            delay: 250,
            data: function(params) {
                return {
                    search_value: params.term, // search term
                    page: params.page
                };
            },
            processResults: function(data, page) {
                return {
                    results: data
                };
            },
            cache: true
        },
//        language: {
//            inputTooShort: function () {
//                return "You sads...";
//            }
//        },
        allowClear: true,
        width: "100%",
    });
    inputClineteDescripcionPalntillaId = $('#Pago_descripcion_palntilla_id');
    inputClineteDescripcionPalntillaId.select2({
        placeholder: "Seleccione una Descripción",
        ajax: {
            url: baseUrl + 'cobranzas/descripcionPalntilla/ajaxlistDescripcionPlantilla',
            dataType: 'json',
//            delay: 25000000000,
            data: function(params) {
                return {
                    search_value: params.term, // search term
                    page: params.page
                };
            },
            processResults: function(data, page) {
                return {
                    results: data
                };
            },
            cache: true
        },
        allowClear: true,
        width: "100%",
    });
});
//function select2Error(id) {
//    $('#select2-' + id + '-container' + '>span').css('color', '#b94a48');

//    $('#select2-' + id + '-container').parent().css('border-color', '#b94a48');

//}
