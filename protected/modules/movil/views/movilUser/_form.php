<?php
/** @var MovilUserController $this */
/** @var MovilUser $model */
/** @var AweActiveForm $form */
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <span class="panel-icon">
            <i class="fa fa-user"></i>
        </span>
        <span class="panel-title">     <?php echo Yii::t('AweCrud.app', $model->isNewRecord?'Create':'Update') . ' ' . MovilUser::label(); ?>        </span>
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
            'id' => 'movil-user-form',
            'enableAjaxValidation' => true,
            'clientOptions' => array('validateOnSubmit' => false, 'validateOnChange' => true,),
            'enableClientValidation' => false,
            ));?>
            <p class="note">
                <?php echo Yii::t('AweCrud.app', 'Fields with') ?> <span class="required">*</span>
                <?php echo Yii::t('AweCrud.app', 'are required') ?>.            </p>
            <div class="col-md-6">   
                <?php echo $form->errorSummary($model, '<p>' . Yii::t('yii', 'Please fix the following input errors:') . '</p>', '',array('class'=>'alert alert-danger pastel')) ?>
                <?php // add array('class'=>'gui-input')?> 
                 <!--@TODO: Utilizar la estructura comentada si el formulario es de--> 
                <!--type=vertical caso contrario si es hirizontal no cambia-->
                <!--                <div class="control-group">
                
                <?php // echo $form->textFieldRow($model, 'nombre', array('maxlength' => 64,'class' => 'gui-input')) ?>
                para select2 con este tema
                <?php //echo $form->dropDownListRow($model, 'cliente_id', array(), array('class' => 'form-control select2',"style"=>"width: 100%")) ?>

                
                                </div>-->
                                

                                    
                    <?php echo $form->textFieldRow($model, 'id_dispositivo', array('maxlength' => 45,'class'=>'gui-input')) ?>
                                    
                    <?php echo $form->textFieldRow($model, 'id_user',array('class'=>'gui-input')) ?>
                                    
                    <?php echo $form->dropDownListRow($model, 'estado', array('IN' => 'IN','OUT' => 'OUT',),array('class'=>'form-control')) ?>
                                            </div>
        </div>

        <div class="panel-footer text-right">
                        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'icon'=>'fa fa-check',
			'label'=>$model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
		)); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array(
			//'buttonType'=>'submit',
                        'icon'=>'fa fa-remove',
			'label'=> Yii::t('AweCrud.app', 'Cancel'),
			'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
		)); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>