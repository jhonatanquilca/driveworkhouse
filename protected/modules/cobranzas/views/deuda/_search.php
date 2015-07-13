<?php
/** @var DeudaController $this */
/** @var AweActiveForm $form */
?>
<div class="admin-form theme-info panel-body">


    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'type'=>'horizontal',
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

                    <?php echo $form->textFieldRow($model, 'id',array('class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'monto',array('class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'usuario_creacion_id',array('class'=>'gui-input')); ?>

                    <?php echo $form->datepickerRow(
                        $model, 'fecha_creacion', array(
                    'options' => array(
                        'language' => 'es',
                        'format' => 'dd/mm/yyyy',
                        'autoclose' => true,
                        'startView' => 2,
                        'orientation' => 'bottom left',
                    ),
                    'htmlOptions' => array(
                        'class' => 'gui-input',
                        'readonly' => 'readonly',
                        'style' => 'cursor:pointer;'
                    )
                        )
                );; ?>

                    <?php echo $form->textFieldRow($model, 'usuario_actualizacion_id',array('class'=>'gui-input')); ?>

                    <?php echo $form->datepickerRow(
                        $model, 'fecha_actualizacion', array(
                    'options' => array(
                        'language' => 'es',
                        'format' => 'dd/mm/yyyy',
                        'autoclose' => true,
                        'startView' => 2,
                        'orientation' => 'bottom left',
                    ),
                    'htmlOptions' => array(
                        'class' => 'gui-input',
                        'readonly' => 'readonly',
                        'style' => 'cursor:pointer;'
                    )
                        )
                );; ?>

                    <?php echo $form->textAreaRow($model,'observaciones',array('rows'=>3, 'cols'=>50,'class'=>'gui-input')); ?>

                    <?php echo $form->dropDownListRow($model, 'descripcion_palntilla_id', array('' => ' -- Seleccione -- ') + CHtml::listData(DescripcionPalntilla::model()->findAll(), 'id', DescripcionPalntilla::representingColumn()), array('prompt' => Yii::t('AweApp', 'None')),array('class'=>'form-control')); ?>

                    <?php echo $form->dropDownListRow($model, 'cliente_id', array('' => ' -- Seleccione -- ') + CHtml::listData(Cliente::model()->findAll(), 'id', Cliente::representingColumn()),array('class'=>'form-control')); ?>

    </div>
<div class="panel-footer text-right">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('AweCrud.app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
