<?php
/** @var CltClienteController $this */
/** @var AweActiveForm $form */
?>
<div class="admin-form theme-info panel-body">


    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'type'=>'horizontal',
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

                    <?php echo $form->textFieldRow($model, 'id',array('class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 32,'class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'apellido', array('maxlength' => 32,'class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'documento', array('maxlength' => 20,'class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'telefono', array('maxlength' => 24,'class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'celular', array('maxlength' => 24,'class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'email_1', array('maxlength' => 255,'class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'email_2', array('maxlength' => 255,'class'=>'gui-input')); ?>

                    <?php echo $form->dropDownListRow($model, 'estado', array('ACTIVO' => 'ACTIVO','INACTIVO' => 'INACTIVO',),array('class'=>'form-control')); ?>

                    <?php echo $form->textFieldRow($model, 'usuario_creacion_id',array('class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'usuario_actualizacion_id',array('class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'fecha_creacion',array('class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'fecha_actualizacion',array('class'=>'gui-input')); ?>

    </div>
<div class="panel-footer text-right">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('AweCrud.app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
