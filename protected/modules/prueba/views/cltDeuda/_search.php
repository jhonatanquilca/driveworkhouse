<?php
/** @var CltDeudaController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

<?php echo $form->textFieldRow($model, 'id',array('class'=>'gui-input')); ?>

<?php echo $form->textFieldRow($model, 'monto',array('class'=>'gui-input')); ?>

<?php echo $form->textFieldRow($model, 'usuario_creacion_id',array('class'=>'gui-input')); ?>

<?php echo $form->textFieldRow($model, 'fecha_creacion',array('class'=>'gui-input')); ?>

<?php echo $form->textFieldRow($model, 'usuario_actualizacion_id',array('class'=>'gui-input')); ?>

<?php echo $form->textFieldRow($model, 'fecha_actualizacion',array('class'=>'gui-input')); ?>

<?php echo $form->dropDownListRow($model, 'clt_cliente_id', array('' => ' -- Seleccione -- ') + CHtml::listData(CltCliente::model()->findAll(), 'id', CltCliente::representingColumn()),array('class'=>'form-control')); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('AweCrud.app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
