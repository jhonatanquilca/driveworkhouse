<?php
/** @var CltClienteController $this */
/** @var CltCliente $model */
/** @var AweActiveForm $form */
//$baseUrl = Yii::app()->theme->baseUrl;
//$cs = Yii::app()->getClientScript();
//$cs->registerScriptFile($baseUrl . '/js/plugins/datepicker/css/bootstrap-datetimepicker.css');
//$cs->registerScriptFile($baseUrl . '/js/plugins/datepicker/js/bootstrap-datetimepicker.js');
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <span class="panel-icon">
            <i class="fa fa-user"></i>
        </span>
        <span class="panel-title">     <?php echo Yii::t('AweCrud.app', $model->isNewRecord ? 'Create' : 'Update') . ' ' . CltCliente::label(); ?>        </span>
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
                'id' => 'clt-cliente-form',
                'enableAjaxValidation' => true,
                'enableClientValidation' => false,
            ));
            ?>
            <p class="note">
                <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
                <?php echo Yii::t('AweCrud.app', 'are required') ?>.            </p>
            <div class="col-md-6">   
                <?php echo $form->errorSummary($model, '<p>' . Yii::t('yii', 'Please fix the following input errors:') . '</p>', '', array('class' => 'alert alert-danger pastel')) ?>
                <?php // add array('class'=>'gui-input') ?> 



                <?php echo $form->textFieldRow($model, 'nombre', array('maxlength' => 32, 'class' => 'gui-input')) ?>

                <?php echo $form->textFieldRow($model, 'apellido', array('maxlength' => 32, 'class' => 'gui-input')) ?>

                <?php echo $form->textFieldRow($model, 'documento', array('maxlength' => 20, 'class' => 'gui-input')) ?>

                <?php echo $form->textFieldRow($model, 'telefono', array('maxlength' => 24, 'class' => 'gui-input')) ?>

                <?php echo $form->textFieldRow($model, 'celular', array('maxlength' => 24, 'class' => 'gui-input')) ?>

                <?php echo $form->textFieldRow($model, 'email_1', array('maxlength' => 255, 'class' => 'gui-input')) ?>

                <?php echo $form->textFieldRow($model, 'email_2', array('maxlength' => 255, 'class' => 'gui-input')) ?>

                <?php echo $form->dropDownListRow($model, 'estado', array('ACTIVO' => 'ACTIVO', 'INACTIVO' => 'INACTIVO',), array('class' => 'form-control')) ?>

                <?php echo $form->textFieldRow($model, 'usuario_creacion_id', array('class' => 'gui-input')) ?>

                <?php echo $form->textFieldRow($model, 'usuario_actualizacion_id', array('class' => 'gui-input')) ?>
                <?php
                echo $form->datepickerRow(
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
                );
                ?>

            </div>
        </div>

        <div class="panel-footer text-right">
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
                'icon' => 'fa fa-remove',
                'label' => Yii::t('AweCrud.app', 'Cancel'),
                'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
            ));
            ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>