<?php
/** @var CltDeudaController $this */
/** @var CltDeuda $model */
/** @var AweActiveForm $form */
?>

<div class="panel panel-primary">

    <div class="panel-heading">
        <span class="panel-icon">
            <i class="fa fa-user"></i>
        </span>
        <span class="panel-title">     <?php echo Yii::t('AweCrud.app', 'Create') . ' ' . CltDeuda::label(); ?>        </span>
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
        <div class="admin-form theme-info panel-body p25">
            <?php
            $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
            'type' => 'horizontal',
            'id' => 'clt-deuda-form',
            'enableAjaxValidation' => true,
            'enableClientValidation'=> false,
            )); ?>
            <p class="note">
                <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
                <?php echo Yii::t('AweCrud.app', 'are required') ?>.            </p>

            <?php echo $form->errorSummary($model, '<p>' . Yii::t('yii', 'Please fix the following input errors:') . '</p>', '',array('class'=>'alert alert-danger pastel')) ?>
            <?php // add array('class'=>'gui-input')?> 


                                            
                <?php echo $form->textFieldRow($model, 'monto',array('class'=>'gui-input')) ?>
                            
                <?php echo $form->textFieldRow($model, 'usuario_creacion_id',array('class'=>'gui-input')) ?>
                                            
                <?php echo $form->textFieldRow($model, 'usuario_actualizacion_id',array('class'=>'gui-input')) ?>
                                            
                <?php echo $form->dropDownListRow($model, 'clt_cliente_id', array('' => ' -- Seleccione -- ') + CHtml::listData(CltCliente::model()->findAll(), 'id', CltCliente::representingColumn()),array('class'=>'form-control')) ?>
                                </div>

        <div class="panel-footer text-right">
                        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
		)); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array(
			//'buttonType'=>'submit',
			'label'=> Yii::t('AweCrud.app', 'Cancel'),
			'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
		)); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>