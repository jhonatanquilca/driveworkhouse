<?php Util::tsRegisterAssetJs('calendario.js') ?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <span class="panel-icon">
            <i class="fa fa-calendar"></i>
        </span>
        <span class="panel-title">     <?php echo 'Calendario de Deudas' ?>                </span>
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
            <!--<a title="asd&#10;aaaa">sadasds</a>-->
            <?php
            $themeUrl = Yii::app()->theme->baseUrl;
            $cs = Yii::app()->getClientScript();
            $cs->registerCssFile($themeUrl . '/plugins/fullcalendar/fullcalendar.min.css');
            $cs->registerScriptFile($themeUrl . '/plugins/fullcalendar/lib/moment.min.js');
            $cs->registerScriptFile($themeUrl . '/plugins/fullcalendar/fullcalendar.min.js');
            $cs->registerScriptFile($themeUrl . '/plugins/fullcalendar/lang-all.js');

            $objeto = array_merge(Deuda::model()->getDeudasCalendar(), Pago::model()->getPagosCalendar());
            ?>

            <script type="text/javascript">
                var objeto =<?php echo json_encode($objeto) ?>
            </script>
            <div id='calendar' class="admin-theme" style="height: auto"></div>

            <!-- search-form -->


        </div>
    </div>
</div>