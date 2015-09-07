<?php
/** @var PagoController $this */
/** @var Pago $model */
/** @var AweActiveForm $form */
$themeUrl = Yii::app()->theme->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($themeUrl . '/plugins/select2/css/core.css');
$cs->registerScriptFile($themeUrl . '/plugins/select2/select2.min.js');
// craga js de la paguina
Util::tsRegisterAssetJs('_form.js');
?>
<div id="flashMsg"  class="flash-messages">
<!--<div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <i class="fa fa-remove pr10"></i>
  <strong>Oh snap!</strong> You need to
  <a href="#" class="alert-link">Change a few things up</a> and try again.
</div>-->
</div> 
<div class="panel panel-primary">
    <div class="panel-heading">
        <span class="panel-icon">
            <i class="fa fa-legal"></i>
        </span>
        <span class="panel-title">     <?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . Pago::label(); ?>        </span>
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
        <div class="admin-form theme-info panel-body p15">
            <?php
            $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
                'type' => 'horizontal',
                'id' => 'pago-form',
                'enableAjaxValidation' => true,
                'enableClientValidation' => false,
            ));
            ?>
            <p class="note">
                <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
                <?php echo Yii::t('AweCrud.app', 'are required') ?>.            </p>
            <div class="col-md-6">   
                <?php
                $data = $model->cliente_id ? array($model->cliente_id => Cliente::model()->findByPk($model->cliente_id)->nombre_completo) : array();
                ?>
                <?php echo $form->dropDownListRow($model, 'cliente_id', $data, array('class' => 'form-control select2')) ?>

                <?php
                $data = $model->descripcion_palntilla_id ? array($model->descripcion_palntilla_id => DescripcionPalntilla::model()->findByPk($model->descripcion_palntilla_id)->nombre) : array();
                echo $form->dropDownListRow($model, 'descripcion_palntilla_id', $data, array('class' => 'form-control select2'))
                ?>

                <?php echo $form->textFieldRow($model, 'monto', array('class' => 'gui-input money')) ?>

                <?php // echo $form->textFieldRow($model, 'usuario_creacion_id', array('class' => 'gui-input')) ?>

                <?php // echo $form->textFieldRow($model, 'usuario_actualizacion', array('class' => 'gui-input')) ?>

                <?php echo $form->textAreaRow($model, 'obserbaciones', array('rows' => 3, 'cols' => 50, 'class' => 'gui-input')) ?>


            </div>
        </div>

        <div class="panel-footer text-right">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'success',
                'icon' => 'fa fa-check',
                'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
            ));
            ?>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                //'buttonType'=>'submit',
                'icon' => 'fa fa-remove',
                'label' => Yii::t('AweCrud.app', 'Cancel'),
                'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
            ));
            ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>