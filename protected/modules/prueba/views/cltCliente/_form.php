<div class="form">
    <?php
    /** @var CltClienteController $this */
    /** @var CltCliente $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'id' => 'clt-cliente-form',
    'enableAjaxValidation' => true,
    'enableClientValidation'=> false,
    )); ?>

    <p class="note">
        <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
        <?php echo Yii::t('AweCrud.app', 'are required') ?>.    </p>

    <?php echo $form->errorSummary($model) ?>

                            <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 32)) ?>
                        <?php echo $form->textFieldRow($model, 'apellido', array('maxlength' => 32)) ?>
                        <?php echo $form->textFieldRow($model, 'documento', array('maxlength' => 20)) ?>
                        <?php echo $form->textFieldRow($model, 'telefono', array('maxlength' => 24)) ?>
                        <?php echo $form->textFieldRow($model, 'celular', array('maxlength' => 24)) ?>
                        <?php echo $form->textFieldRow($model, 'email_1', array('maxlength' => 255)) ?>
                        <?php echo $form->textFieldRow($model, 'email_2', array('maxlength' => 255)) ?>
                        <?php echo $form->dropDownListRow($model, 'estado', array('ACTIVO' => 'ACTIVO','INACTIVO' => 'INACTIVO',)) ?>
                        <?php echo $form->textFieldRow($model, 'usuario_creacion_id') ?>
                        <?php echo $form->textFieldRow($model, 'usuario_actualizacion_id') ?>
                                <div class="form-actions">
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