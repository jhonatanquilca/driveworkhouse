<div class="panel panel-primary">
    <div class="panel-heading">
        <span class="panel-icon">
            <i class="fa fa-user"></i>
        </span>
        <span class="panel-title">     <?php echo 'titulo' ?>                </span>
        <span class="panel-controls">
            <a href="#" class="panel-control-loader"></a>
            <!--<a href="#" class="panel-control-remove"></a>-->
            <!--<a href="#" class="panel-control-title"></a>-->
            <!--<a href="#" class="panel-control-color"></a>-->
            <a href="#" class="panel-control-collapse"></a>
            <!--<a href="#" class="panel-control-fullscreen"></a>-->
        </span>
    </div>
    <div class="panel-body border pn ">
        <div class="admin-form theme-info panel-body p15" style="height: auto">
            <?php
            $themeUrl = Yii::app()->theme->baseUrl;
            $cs = Yii::app()->getClientScript();
            $cs->registerCssFile($themeUrl . '/plugins/fullcalendar/fullcalendar.min.css');
            $cs->registerScriptFile($themeUrl . '/plugins/fullcalendar/lib/moment.min.js');
            $cs->registerScriptFile($themeUrl . '/plugins/fullcalendar/fullcalendar.min.js');
            $cs->registerScriptFile($themeUrl . '/plugins/fullcalendar/lang-all.js');
            ?>
            <div id='calendar' class="admin-theme" style="height: auto"></div>

            <!-- search-form -->


        </div>
    </div>
</div>
<!--background-color: #C7FDC7;-->
<script type="text/javascript">
    var Calendar = $('#calendar');
    Calendar.fullCalendar({
        lang: 'es',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
//        editable: true,
//        width:"100%",
//        height:"100%",
//alto los cuadors de cada dia del mes
        contentHeight: 'auto',
        events: [{
                title: 'All Day Event',
                start: '2015-08-01',
                className: ['fc-event-primary','fc-border-event-primary'],
            }, {
                title: 'Long Event',
                start: '2015-08-07',
                end: '2015-08-10',
                className: ['fc-event-success','fc-border-event-success']
            }, {
                id: 999,
                title: 'Repeating Event',
                start: '2015-08-09T16:00:00',
                className: ['fc-event-warning','fc-border-event-warning']

            }, {
                id: 999,
                title: 'Repeating Event',
                start: '2015-08-16T16:00:00',
                className: ['fc-event-alert','fc-border-event-alert']

            }, {
                title: 'Meeting',
                start: '2015-08-12T10:30:00',
                end: '2015-08-12T12:30:00'
            }, {
                title: 'Lunch',
                start: '2015-08-12T12:00:00'
            }, {
                title: 'Birthday Party',
                start: '2015-08-13T07:00:00'
            }, {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2015-08-28'
            }],
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
        droppable: true, // this allows things to be dropped onto the calendar
        drop: function () {
            // is the "remove after drop" checkbox checked?
            if (!$(this).hasClass('event-recurring')) {
                $(this).remove();
            }
        },
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
                }, 3500);
            });
        }
    });
</script>