<?php
/** @var TxTrasaccionController $this */
/** @var AweActiveForm $form */
?>
<div class="admin-form theme-info panel-body">


    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'type'=>'horizontal',
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

                    <?php echo $form->textFieldRow($model, 'id',array('class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'monto_cuota',array('class'=>'gui-input')); ?>

                    <?php echo $form->dropDownListRow($model, 'tipo', array('ADEUDAR' => 'ADEUDAR','PAGAR' => 'PAGAR',),array('class'=>'form-control')); ?>

                    <?php echo $form->textAreaRow($model,'observaciones',array('rows'=>3, 'cols'=>50,'class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'usuario_creacion_id',array('class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'fecha_creacion',array('class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'usuario_actualizacion_id',array('class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'fecha_actualizacion',array('class'=>'gui-input')); ?>

                    <?php echo $form->dropDownListRow($model, 'clt_deuda_id', array('' => ' -- Seleccione -- ') + CHtml::listData(CltDeuda::model()->findAll(), 'id', CltDeuda::representingColumn()),array('class'=>'form-control')); ?>

                    <?php echo $form->dropDownListRow($model, 'tx_descripcion_palntilla_id', array('' => ' -- Seleccione -- ') + CHtml::listData(TxDescripcionPalntilla::model()->findAll(), 'id', TxDescripcionPalntilla::representingColumn()), array('prompt' => Yii::t('AweApp', 'None')),array('class'=>'form-control')); ?>

    </div>
<div class="panel-footer text-right">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('AweCrud.app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
