<?php
$this->pageTitle = Yii::t('app', 'Roles y Asignaciones');
?>
<div class="row">
    <div class="col-sm-12 pl15">
        <div class="bs-component p10">            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="panel-title">  <?php echo ucwords(CrugeTranslator::t("operaciones")); ?></span>

                    <span class="panel-controls">
                        <a href="#" class="panel-control-loader"></a>
                        <!--<a href="#" class="panel-control-remove"></a>-->
                        <!--<a href="#" class="panel-control-title"></a>-->
                        <!--<a href="#" class="panel-control-color"></a>-->
                        <a href="#" class="panel-control-collapse"></a>
                        <!--<a href="#" class="panel-control-fullscreen"></a>-->
                    </span>
                </div>
                <div class="panel-body border pn">
                    <div class="panel-body p25">


                        <?php
                        $ar = array(
                            '4' => CrugeTranslator::t('Ver Todo'),
                            '1' => CrugeTranslator::t('Módulos'),
                            '2' => CrugeTranslator::t('Usuarios'),
                                //'3'=>CrugeTranslator::t('Controladoras'),
                        );
                        ?>
                        <div class="panel-menu">
                            <div class="chart-legend">
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn dropdown-toggle"><?php echo CrugeTranslator::t("Filtrar") ?> <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <?php
                                        foreach ($ar as $filter => $text)
                                            echo "<li>" . CHtml::link($text, array('/cruge/ui/rbaclistops', 'filter' => $filter)) . "</li>";
                                        ?>
                                    </ul>
                                </div>
                                <?php
                                echo CHtml::link('<i class="icon-plus icon-white"></i> ' . CrugeTranslator::t("Crear Nueva Operacion")
                                        , Yii::app()->user->ui->getRbacAuthItemCreateUrl(CAuthItem::TYPE_OPERATION), array('class' => 'btn btn-success pull-right'));
                                ?>
                            </div>
                        </div>

                        <?php
                        $this->renderPartial('_listauthitems'
                                , array('dataProvider' => $dataProvider)
                                , false
                        );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>