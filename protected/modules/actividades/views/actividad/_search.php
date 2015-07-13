<?php
/** @var ActividadController $this */
/** @var AweActiveForm $form */
?>
<div class="admin-form theme-info panel-body">


    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'type'=>'horizontal',
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

                    <?php echo $form->textFieldRow($model, 'id',array('class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'entidad_tipo', array('maxlength' => 64,'class'=>'gui-input')); ?>

                    <?php echo $form->textFieldRow($model, 'entidad_id',array('class'=>'gui-input')); ?>

                    <?php echo $form->dropDownListRow($model, 'tipo', array('CREATE' => 'CREATE','UPDATE' => 'UPDATE','DELETE' => 'DELETE',),array('class'=>'form-control')); ?>

                    <?php echo $form->textFieldRow($model, 'usuario_id',array('class'=>'gui-input')); ?>

                    <?php echo $form->datepickerRow(
                        $model, 'fecha', array(
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

                    <?php echo $form->textAreaRow($model,'detalle',array('rows'=>3, 'cols'=>50,'class'=>'gui-input')); ?>

    </div>
<div class="panel-footer text-right">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('AweCrud.app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
