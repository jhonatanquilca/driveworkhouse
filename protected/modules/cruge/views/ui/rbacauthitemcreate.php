<?php
/* $model:  es una instancia que implementa a CrugeAuthItemEditor */

$this->pageTitle = Yii::t('app', 'Roles y Asignaciones');
?>
<div class="row">
    <div class="col-sm-12 pl15">
        <div class="bs-component p10">            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="panel-title"> <?php echo ucwords(CrugeTranslator::t("Creando") . " " . CrugeTranslator::t($model->categoria)); ?>
                    </span>

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
                    <?php $this->renderPartial('_authitemform', array('model' => $model), false); ?>
                </div>
            </div>
        </div>
    </div>
</div>