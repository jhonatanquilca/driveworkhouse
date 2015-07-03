<?php
/** @var TxDescripcionPalntillaController $this */
/** @var AweActiveForm $form */
?>
<div class="admin-form theme-info panel-body">


    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'type'=>'horizontal',
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

                    <?php echo $form->textFieldRow($model, 'id',array('class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 45,'class'=>'gui-input')); ?>

                    <?php echo $form->textAreaRow($model,'descripcion',array('rows'=>3, 'cols'=>50,'class'=>'gui-input')); ?>

                    <?php echo $form->dropDownListRow($model, 'estado', array('ACTIVO' => 'ACTIVO','INACTIVO' => 'INACTIVO',),array('class'=>'form-control')); ?>

    </div>
<div class="panel-footer text-right">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('AweCrud.app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
