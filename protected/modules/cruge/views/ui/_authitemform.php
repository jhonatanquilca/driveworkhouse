<?php
/* formulario comun para create y update

  argumento:

  $model: instancia de CrugeAuthItemEditor
 */
?>
<div class="panel-body p25">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'authitem-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => false,
        'htmlOptions' => array('class' => 'form-horizontal')
    ));
    ?>
    <!--<div class="row form-group">-->
    <!--<div class='row'>-->
    <div class='control-group'>
        <?php echo $form->labelEx($model, 'name', array('class' => 'control-label required')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'name', array('size' => 64, 'maxlength' => 64)); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>
    </div>
    <div class='control-group'>
        <?php echo $form->labelEx($model, 'description', array('class' => 'control-label required')); ?>
        <div class="controls">

            <?php echo $form->textField($model, 'description', array('size' => 50, 'maxlength' => 100)); ?>
            <?php echo $form->error($model, 'description'); ?>
        </div>
        <?php if ($model->categoria == "tarea") { ?>
            <div class='alert alert-info light'>Tip: precede este valor con un ":" para que la tarea sea exportada como un menuitem al usar<br/> <span class='code'>
                    Yii::app()->user->rbac->getMenu();</span> y finalizala con un {nombremenuitem} para que quede dentro de un -nombremenuitem-.
                ejemplo: <span class='code'>":Edita tu Perfil{menuprincipal}"</span></div>
        <?php } ?>
    </div>
    <!--</div>-->
    <!--	<div class='row-fluid'>
    <?php echo $form->labelEx($model, 'businessRule'); ?>
    <?php echo $form->textField($model, 'businessRule', array('size' => 50, 'maxlength' => 512)); ?>
    <?php echo $form->error($model, 'businessRule'); ?>
                    <p class='hint'>
    <?php echo CrugeTranslator::t("define una regla de negocio que sera ejecutada cada vez que este item sea evaluado mediante una llamada a checkAccess, el argumento params es entregado a checkAccess de forma opcional:"); ?>
                            <br/>
    <?php
    echo CrugeTranslator::t(
            "regla de ejemplo:");
    ?>
                            <br/>
                            <div class='code'>return Yii::app()->user->id==$params["post"]->authID;</div>
                            <br/>
                            <div class='code'>
                                    $params = ...<?php echo CrugeTranslator::t("cualquier cosa"); ?>...;<br/>
                                    if(Yii::app()->user->checkAccess('<?php echo $model->name; ?>', $params)){ ... }
                            </div>
                            <br/>
                    </p>
            </div>-->
</div>
<!--</div>-->

<div class="panel-footer text-right">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'success',
        'icon' => 'fa fa-check',
        'label' => CrugeTranslator::t(($model->isNewRecord ? 'Crear Nuevo' : 'Actualizar')),
    ));
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'warning',
        'id' => 'volver',
        'icon' => 'fa fa-remove',
        'label' => Yii::t('AweCrud.app', 'Cancel'),
        'htmlOptions' => array('name' => 'volver')
    ));
    ?>
</div>
<?php echo $form->errorSummary($model); ?>
<?php $this->endWidget(); ?>
