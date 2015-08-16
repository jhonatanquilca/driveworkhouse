$(function () {
    var Calendar = $('#calendar');
    Calendar.fullCalendar({
        lang: 'es',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay',
//            right: 'month,agendaDay',
        },
//        allDay:true,
        axisFormat: 'HH:mm',
//        timeFormat: {
//            week: 'HH:mm', //h:mm{ - h:mm}'
//            day: 'HH:mm', //h:mm{ - h:mm}'
//        },
        titleFormat: {
            month: 'MMMM YYYY',
            day: 'MMMM YYYY',
            agendaWeek: "MMMM D [de] YYYY"
        },
        columnFormat: {
            month: 'ddd',
            day: 'dddd D',
            agendaWeek: 'ddd D'
        },
        allDaySlot: false,
        minTime: '08:00:00',
        maxTime: '23:00:00',
//        defaultView: 'agendaDay',
        editable: false,
//        width:"100%",
//        height:"100%",
//alto los cuadors de cada dia del mes
        contentHeight: 'auto',
        slotEventOverlap: true,
        events: objeto,
        eventAfterRender: function (event, element, view) {
            $(element).css('width', 'auto');
        },
        viewRender: function (view) {
            // If monthpicker has been init update its date on change
//            if (Picker.hasClass('hasMonthpicker')) {
//                var selectedDate = Calendar.fullCalendar('getDate');
//                var formatted = moment(selectedDate, 'MM-DD-YYYY').format('MM/YY');
//                Picker.monthpicker("setDate", formatted);
//            }
            // Update mini calendar title
            var titleContainer = $('.fc-title-clone');
            if (!titleContainer.length) {
                return;
            }
            titleContainer.html(view.title);
        },
//        droppable: true, // this allows things to be dropped onto the calendar
//        drop: function () {
////            // is the "remove after drop" checkbox checked?
//            if (!$(this).hasClass('event-recurring')) {
//                $(this).remove();
//            }
//        },
        eventRender: function (event, element) {
            $(window).trigger('resize');
            // create event tooltip using bootstrap tooltips
            $(element).attr("data-original-title", event.title);
            $(element).tooltip({
                container: 'body',
                delay: {
                    "show": 100,
                    "hide": 200
                }
            });
            // create a tooltip auto close timer  
            $(element).on('show.bs.tooltip', function () {
                var autoClose = setTimeout(function () {
                    $('.tooltip').fadeOut();
                }, 4000);
            });
        }
    });
});