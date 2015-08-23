var Script = function () {


    $('.dropdown-list.active > a').addClass("menu-open");
    maskAttributes();
    dessabilitarEntreOnForm();
$(".panel-tile").on("click",function(){window.location.href = baseUrl+$(this).attr("url")})
//bandera para saltar la proÃ§imera accion al validar los formularios
    var primero = false;
    /**
     * @author Alex Yepez Chavez
     * validacion de formularios para bloquear botones de accion
     */
    $("form").submit(function (e) {
//        alert($('form button.btn-success').attr('class'));
        if (verificarValidacionModal("form"))
        {
            if (primero)
            {
                var botonSubmit = $('form button.btn-success');
                $(botonSubmit).attr("disabled", true);
                $(botonSubmit).html('<i class="icon-loading"></i> Espere...');
                $(botonSubmit).attr("disabled", true);
                $('form a').attr("disabled", true);
                $('form a').attr("onclick", "true");
            }
            else
            {
                primero = true;
            }

        }

        return;
    });

//    sidebar dropdown menu

    jQuery('#sidebar .sub-menu > a').click(function () {
        var last = jQuery('.sub-menu.open', $('#sidebar'));
        last.removeClass("open");
        jQuery('.arrow', last).removeClass("open");
        jQuery('.sub', last).slideUp(200);
        var sub = jQuery(this).next();
        if (sub.is(":visible")) {
            jQuery('.arrow', jQuery(this)).removeClass("open");
            jQuery(this).parent().removeClass("open");
            sub.slideUp(200);
        } else {
            jQuery('.arrow', jQuery(this)).addClass("open");
            jQuery(this).parent().addClass("open");
            sub.slideDown(200);
        }
    });

//    sidebar toggle

//    $('.icon-reorder').hasClass() .click(function() {
//        if ($('#sidebar > ul').is(":visible") === true) {
//            $('#main-content').css({
//                'margin-left': '0px'
//            });
//            $('#sidebar').css({
//                'margin-left': '-180px'
//            });
//            $('#sidebar > ul').hide();
//            $("#container").addClass("sidebar-closed");
//        } else {
//            $('#main-content').css({
//                'margin-left': '180px'
//            });
//            $('#sidebar > ul').show();
//            $('#sidebar').css({
//                'margin-left': '0'
//            });
//            $("#container").removeClass("sidebar-closed");
//        }
//    });

    // custom scrollbar
//    $(".sidebar-scroll").niceScroll({styler: "fb", cursorcolor: "#0076A5", cursorwidth: '5', cursorborderradius: '0px', background: '#404040', cursorborder: ''});
//    $("html").niceScroll({styler: "fb", cursorcolor: "#0076A5", cursorwidth: '8', cursorborderradius: '0px', background: '#404040', cursorborder: '', zindex: '1000'});


// widget tools

    jQuery('.widget .tools .icon-chevron-down, .widget .tools .icon-chevron-up').click(function () {
        var el = jQuery(this).parents(".widget").children(".widget-body");
        if (jQuery(this).hasClass("icon-chevron-down")) {
            jQuery(this).removeClass("icon-chevron-down").addClass("icon-chevron-up");
            el.slideUp(200);
        } else {
            jQuery(this).removeClass("icon-chevron-up").addClass("icon-chevron-down");
            el.slideDown(200);
        }
    });

    jQuery('.widget .tools .icon-remove').click(function () {
        jQuery(this).parents(".widget").remove();
    });

    // tool tips
    $('.element').tooltip();
    $('.tooltips').tooltip();

    // popovers
    $('.popovers').popover();

    // scroller
//    $('.scroller').slimscroll({
//        height: 'auto'
//    });

    // selects
//    $('select.fix').selectBox();

    var buttons = $('.form-actions-float');
    floatButtons();
    $(window).scroll(function () {
        floatButtons();
    });

    function floatButtons() {
        if ($(window).scrollTop() + $(window).height() < $(document).height() - 30) { // To far, the navigation needs to be set in place
            buttons.addClass('flotante');
        } else {
            buttons.removeClass('flotante');
        }
    }

    // Buscar logros (Gamification)
//    $.ajax({
//        type: "GET",
//        url: baseUrl+"gamification/default/buscarLogros",
//        dataType: 'html',
//        data: { uid: user_id },
//        success: function(html) {
//            if(html) {
//                $("#mainModal").html(html);
//                $("#mainModal").modal("show");
//                $('#mainModal').on('shown', function () {
//                    $speed = 0.05;
//                    for($i=0;$i<=1440;$i++) {
//                        if($i % 100 == 0) {
//                             $speed = $speed + 0.2 ;
//                        }
//                        rotateCoin($i,$speed,'Y');
//                    }
//                    setTimeout(function() {
//                        $('#moneda').removeAttr('style');
//                    },3000);
//                });
//            }
//        }
//    });

}();

function showModalLoading() {
    var html = "";
    html +=
            '<div id="modal-form" class="popup-basic mfp-with-anim">'
            + '<div class="panel">'
            + '<div class="panel-heading">'
            + '<span class="panel-title">'
            + 'Cargando</span>'
            + '</div>'
            + '<form method="post" action="http://admindesigns.com/" id="comment">'
            + '<div class="panel-body p25 text-center">'
            + '<div class="section row">'
            + '<div class="loading"><img src="' + themeUrl + 'img/loaders/loader.gif" /></div>'
            + '</div>'
            + '</div>'
            + '</form>'
            + '</div>'
            + '</div>'
            + '</div>';
    showModalData(html);


}


function showModalData(html) {
    var animaciones = ["mfp-flipInY", "mfp-flipInX", "mfp-zoomIn", "mfp-zoomOut", "mfp-rotateUp", "mfp-rotateDown",
        "mfp-rotateLeft", "mfp-rotateRight", "mfp-slideUp", "mfp-slideDown", "mfp-slideLeft", "mfp-slideRight",
        "mfp-slideRight", "mfp-slideRight", "mfp-with-fade"/*, "mfp-fullscale"*/];

    // Inline Admin-Form example 
    $.magnificPopup.open({
        removalDelay: 500, //delay removal by X to allow out-animation,
        items: {
            src: html
//            src: $('#modal-form')
        },
        closeOnBgClick: false, // no cierra el modal si da clic en la parte oscura
//        overflowY: 'auto', // 

        callbacks: {
            beforeOpen: function (e) {
                this.st.mainClass = animaciones[Math.floor(Math.random() * animaciones.length)];
            }
        },
        midClick: false // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });
}

/**
 * 
 * @param {cadena} url
 * @returns {undefined}
 */
function viewModal(url, CallBack)
{
    $.ajax({
        type: "POST",
        url: baseUrl + url,
        beforeSend: function () {
//            showModalLoading();
        },
        success: function (data) {
//            $.magnificPopup.close();
            showModalData(data);
            CallBack();

        }
    });
}


function AjaxAtualizacionInformacion(Formulario)
{
    BloquearBotonesModal(Formulario);
    AjaxGestionModal(Formulario, function (list, data) {

//        ActualizarInformacion(list);
    });
}
/**
 * @author Alex Yepez Chavez
 * @param {cadena} $form
 * @argument name descriptionpermite evaluar el formulario de un modal, para su posterior actualizaciÃ³n 
 * o registro por medio de ajax.
 */
function AjaxGestionModal($form, CallBack) {
    var form = $($form);
    var settings = form.data('settings');
    settings.submitting = true;
    $.fn.yiiactiveform.validate(form, function (messages) {

        $.each(messages, function () {
            console.log(this);
        });
        if ($.isEmptyObject(messages)) {
            $.each(settings.attributes, function () {
                $.fn.yiiactiveform.updateInput(this, messages, form);
            });
            AjaxGuardarModal(true, $form, CallBack);
        }
        else {
            settings = form.data('settings'),
                    $.each(settings.attributes, function () {
                        $.fn.yiiactiveform.updateInput(this, messages, form);
                    });
            DesBloquearBotonesModal($form, 'Enviar', 'AjaxAtualizacionInformacion');
        }
    });
}
/**
 * @author Alex Yepez Chavez
 * @param {cadena} $form
 * @param {arreglo} listas
 * @argument  permite validar y guardar el formulario de un modal
 * al momento de ejecutar una accion.
 */
function AjaxAccionModal($form, CallBack) {
    var form = $($form);
    var settings = form.data('settings');
    settings.submitting = true;
    $.fn.yiiactiveform.validate(form, function (messages) {
        $.each(messages, function () {
            console.log(this);
        });
        if ($.isEmptyObject(messages)) {
            $.each(settings.attributes, function () {

                $.fn.yiiactiveform.updateInput(this, messages, form);
            });
            AjaxGuardarAccionModal(true, $form, CallBack);

        }
        else {
            settings = form.data('settings'),
                    $.each(settings.attributes, function () {
                        $.fn.yiiactiveform.updateInput(this, messages, form);
                    });
            DesBloquearBotonesModal($form, 'Enviar', 'AjaxCrearAccion');
        }
    });
}
/**
 * 
 * @author Alex Yepez
 * @param {cadena} name description
 * @returns {Boolean}
 * ValidaciÃ³n de los control-group de un elemento contenedor,
 * para determinar si no contiene la clase error 
 */
function BloquearBotonesModal($form)
{
    var elemento = $form + ' a[data-dismiss="modal"]';
    $(elemento).attr("disabled", true);
    $(elemento).attr('data-dismiss', 'long');
    elemento = $form + ' a.btn-success';
    $(elemento).html('<i class="icon-loading"></i> Espere...');
    $(elemento).attr("disabled", true);
    $(elemento).attr("onclick", "true");
}
function DesBloquearBotonesModal($form, Detalle, accion)
{
    var elemento = $form + ' a[data-dismiss="long"]';
    $(elemento).attr("disabled", false);
    $(elemento).attr('data-dismiss', 'modal');
    elemento = $form + ' a.btn-success';
    $(elemento).html('<i class="icon-ok"></i>' + Detalle);
    $(elemento).attr("disabled", false);
    $(elemento).attr("onclick", accion + '("' + $form + '");');
}
function verificarValidacionModal($contenedor)
{
    var verificar = true;
    $contenedor = $contenedor + ' div.control-group';
    $($contenedor).each(function (index, elemento) {
        if ($(elemento).hasClass('error'))
        {
            verificar = false;
        }
    });
    return verificar;
}


/**
 * @author Alex Yepez Chavez
 * @param {Cadena} Formulario
 * Guarda el contenido de los modales de entidades
 */

function AjaxGuardarModal(verificador, Formulario, callBack)
{
    if (verificador)
    {
        var listaActualizar = Formulario.split('-');
        listaActualizar = listaActualizar[0] + '-grid';
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: $(Formulario).attr('action'),
            data: $(Formulario).serialize(),
            beforeSend: function (xhr) {
            },
            success: function (data) {
                if (data.success) {
                    $.magnificPopup.close();

                    callBack(listaActualizar);

                } else {

                    DesBloquearBotonesModal(Formulario);
                    bootbox.alert(data);
                }
            }
        });
    }

}
/**
 * @author Alex Yepez Chavez
 * @param {cadena} Formulario
 * Guarda el contenido de los modales de las acciones
 */
function AjaxGuardarAccionModal(verificador, Formulario, CallBack)
{
    if (verificador)
    {
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: $(Formulario).attr('action'),
            data: $(Formulario).serialize(),
            beforeSend: function (xhr) {
            },
            success: function (data) {
                if (data.success) {
                    $("#mainModal").modal("hide");
                    $("#maiMessages").removeClass('hidden');
                    $("#maiMessages").html('<div class="alert alert-success">' +
                            '<i data-dismiss="alert" class="icon-remove close"></i>' +
                            data.messages.success.toString() +
                            '</div>');
                    CallBack();
                } else {
                    DesBloquearBotonesModal(Formulario);
                    bootbox.alert(data.messages.error.toString());
                    $("#mainModal").modal("hide");
                }
            }
        });
    }
}

/**
 * Actualizacion de vistas por ajax
 * @param {type} url
 * @param {type} elemento
 * @param {type} callBack
 * @returns {undefined}
 */
function AjaxUpdateElement(url, elemento, callBack)
{
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: url,
        beforeSend: function (xhr) {
            var html = "<div class='loading'><img src='" + themeUrl + "images/truulo-loading.gif' /></div>";
            $(elemento).html(html);
        },
        success: function (data) {
            if (data.success) {
                $(elemento).html(data.html);
                callBack();
            } else {
                bootbox.alert(data.messages.error.toString());
            }
        }
    });
}
///**
// * Carga de formatos a input en formularios
// * @returns {undefined}
// */
function maskAttributes() {
    $('.fecha').mask('99/99/9999');
//    $('.time').mask('99:99:99');
//    $('.date_time').mask('99/99/9999 99:99:99');
//    $('.zip').mask('99999-999');
//    $('.phone').mask('(999) 999-9999');
//    $('.phoneext').mask("(999) 999-9999 x99999");
//    $(".money").mask("999,999,999.999");
//    $(".product").mask("999.999.999.999");
//    $(".tin").mask("99-9999999");
//    $(".ssn").mask("999-99-9999");
//    $(".ip").mask("9ZZ.9ZZ.9ZZ.9ZZ");
//    $(".eyescript").mask("~9.99 ~9.99 999");
//    $(".custom").mask("9.99.999.9999");


    $('input.telefono').mask('9 999 999');
    $('input.celular').mask('999999999');
    $('input.ID').mask('999999999');
    $('input.fax').mask('999-999999');
    $('input.numeric').mask('99999999999');
    $('input.money').mask('P999999999999999999999.ZZ', {
        translation: {
            'Z': {pattern: /[0-9]/, optional: true},
            'P': {pattern: /[1-9]/, },
        }});
    //continuar cargando formatos para input
}

function rotateCoin(degree, speed, orientation) {
    $('#moneda').css({WebkitTransform: 'rotateY(' + degree + 'deg)'});
    $('#moneda').css({'-o-transform': 'rotateY(' + degree + 'deg)'});
    $('#moneda').css({'-transform': 'rotateY(' + degree + 'deg)'});
    $('#moneda').css({'-moz-transform': 'rotateY(' + degree + 'deg)'});
    $('#moneda').css({'-moz-transition': speed + 's'});
    $('#moneda').css({'-moz-transform-style': 'preserve-3d'});
    $('#moneda').css({'-webkit-transition': speed + 's'});
    $('#moneda').css({'-webkit-transform-style': 'preserve-3d'});
    $('#moneda').css({'-o-transition': speed + 's'});
    $('#moneda').css({'-o-transition-style': 'preserve-3d'});
    $('#moneda').css({'-transition': speed + 's'});
    $('#moneda').css({'-transform-style': 'preserve-3d'});
}

function dessabilitarEntreOnForm() {
    $("form").keypress(function (e) {
//        alert(e.which);
        if (e.which == 13) {
            return false;
        }
    });

}


//by jhonatan

function select2Error() {
    $(document).ready(function () {
        $.each($('.form-control.select2.error'), function (key, value) {
            $('#select2-' + $(value).attr('id') + '-container' + '>span').css('color', '#b94a48');

            $('#select2-' + $(value).attr('id') + '-container').parent().css('border-color', '#b94a48');
        });

    });



}
