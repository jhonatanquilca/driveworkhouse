<?php
/** @var ClienteController $this */
/** @var Cliente $model */
/** @var AweActiveForm $form */
Yii::app()->clientScript->scriptMap['jquery.js'] = false;
?>
<div id="modal-form" class="popup-basic admin-form mfp-with-anim">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">
                <i class="fa fa-rocket"></i> <?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . Cliente::label(); ?></span>
        </div>
        <!-- end .panel-heading section -->

        <?php
        $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
            'type' => 'vertical',
            'id' => 'cliente-form',
            'enableAjaxValidation' => true,
            'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => false),
            'enableClientValidation' => false
        ));
        ?>
        <div class="panel-body panel-scroller scroller-lg scroller-pn scroller-overlay pl25 pr25 ptn pbn">   
            <p class="note">
                <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
                <?php echo Yii::t('AweCrud.app', 'are required') ?>.            </p>
            <?php // echo $form->errorSummary($model, '<p>' . Yii::t('yii', 'Please fix the following input errors:') . '</p>', '', array('class' => 'alert alert-danger pastel'))  ?>

            <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 32, 'class' => 'gui-input')) ?>

            <?php echo $form->textFieldRow($model, 'apellido', array('maxlength' => 32, 'class' => 'gui-input')) ?>

            <?php echo $form->textFieldRow($model, 'documento', array('maxlength' => 20, 'class' => 'gui-input')) ?>

            <?php echo $form->textFieldRow($model, 'telefono', array('maxlength' => 24, 'class' => 'gui-input telefono')) ?>

            <?php echo $form->textFieldRow($model, 'celular', array('maxlength' => 24, 'class' => 'gui-input celular')) ?>

            <?php echo $form->textFieldRow($model, 'email_1', array('maxlength' => 255, 'class' => 'gui-input')) ?>

            <?php echo $form->textFieldRow($model, 'email_2', array('maxlength' => 255, 'class' => 'gui-input')) ?>

            <?php // echo $form->dropDownListRow($model, 'estado', array('ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO',), array('class' => 'form-control'))  ?>

            <?php echo $form->textFieldRow($model, 'usuario_creacion_id', array('class' => 'gui-input'))  ?>

            <?php // echo $form->textFieldRow($model, 'usuario_actualizacion_id', array('class' => 'gui-input'))  ?>
        </div>

        <div class="panel-footer">

            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
//                'buttonType' => 'submit',
                'type' => 'success',
                'icon' => 'fa fa-check',
                'label' => $model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
                'htmlOptions' => array(
                    'onClick' => 'js:AjaxAtualizacionInformacion("#cliente-form")')
            ));
            ?>
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                //'buttonType'=>'submit',
//                'type' => 'inverse',
                'icon' => 'fa fa-remove',
                'label' => Yii::t('AweCrud.app', 'Cancel'),
                'htmlOptions' => array('onclick' => '$.magnificPopup.close();')
            ));
            ?>
        </div>

        <?php $this->endWidget(); ?>

        <!-- end .form-body section -->

        <!-- end .form-footer section -->
    </div>
    <!-- end: .panel -->
</div>
<script type="text/javascript">
    jQuery(document).ready(function () {
        Core.init();

    });
</script>