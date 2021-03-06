<?php
/** @var ClienteController $this */
/** @var Cliente $model */
/** @var AweActiveForm $form */
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <span class="panel-icon">
            <i class="fa fa-user"></i>
        </span>
        <span class="panel-title">     <?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . Cliente::label(); ?>        </span>
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
                'id' => 'cliente-form',
                'enableAjaxValidation' => true,
                'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false),
                'enableClientValidation' => false
            ));
            ?>
            <p class="note">
                <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
                <?php echo Yii::t('AweCrud.app', 'are required') ?>.            </p>
            <div class="col-md-6">   
                <?php // echo $form->errorSummary($model, '<p>' . Yii::t('yii', 'Please fix the following input errors:') . '</p>', '', array('class' => 'alert alert-danger pastel'))  ?>

                <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 32, 'class' => 'gui-input')) ?>

                <?php echo $form->textFieldRow($model, 'apellido', array('maxlength' => 32, 'class' => 'gui-input')) ?>

                <?php echo $form->textFieldRow($model, 'documento', array('maxlength' => 20, 'class' => 'gui-input')) ?>

                <?php echo $form->textFieldRow($model, 'telefono', array('maxlength' => 24, 'class' => 'gui-input telefono')) ?>

                <?php echo $form->textFieldRow($model, 'celular', array('maxlength' => 24, 'class' => 'gui-input celular')) ?>

                <?php echo $form->textFieldRow($model, 'email_1', array('maxlength' => 255, 'class' => 'gui-input','placeholder'=>'Email Principal Ej:ejemplo@gmail.com')) ?>

                <?php echo $form->textFieldRow($model, 'email_2', array('maxlength' => 255, 'class' => 'gui-input')) ?>

                <?php // echo $form->dropDownListRow($model, 'estado', array('ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO',), array('class' => 'form-control'))  ?>

                <?php // echo $form->textFieldRow($model, 'usuario_creacion_id', array('class' => 'gui-input'))  ?>

                <?php // echo $form->textFieldRow($model, 'usuario_actualizacion_id', array('class' => 'gui-input'))  ?>
            </div>
        </div>

        <div class="panel-footer text-center">
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
//                'type' => 'inverse',
                'icon' => 'fa fa-remove',
                'label' => Yii::t('AweCrud.app', 'Cancel'),
                'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
            ));
            ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>