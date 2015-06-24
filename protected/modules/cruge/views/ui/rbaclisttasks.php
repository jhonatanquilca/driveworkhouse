<?php
$this->pageTitle = Yii::t('app', 'Roles y Asignaciones');
?>
<div class="row">
    <div class="col-sm-12 pl15">
        <div class="bs-component p10">            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="panel-title">  <?php echo ucwords(CrugeTranslator::t("tareas")); ?></span>

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
                        <div class="panel-menu">
                            <div class="chart-legend">
                                <?php
                                echo CHtml::link('<i class="icon-plus icon-white"></i> ' . CrugeTranslator::t("Crear Nueva Tarea")
                                        , Yii::app()->user->ui->getRbacAuthItemCreateUrl(CAuthItem::TYPE_TASK), array('class' => 'legend-item btn btn-sm btn-success ph20 mr10'));
                                ?>
                            </div>
                        </div>
                        <?php $this->renderPartial('_listauthitems', array('dataProvider' => $dataProvider), false); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>