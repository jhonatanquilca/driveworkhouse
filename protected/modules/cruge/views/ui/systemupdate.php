<?php
/* formulario de edicion de CrugeSystem argumento: $model: instancia de ICrugeSession */
$this->pageTitle = Yii::t('app', 'Sistema');
?>

<?php
if (Yii::app()->user->hasFlash('systemFormFlash')) {
    echo "<div class='alert alert-success light'>";
    echo Yii::app()->user->getFlash('systemFormFlash');
    echo "</div>";
}
?>
<div class="row">
    <div class="col-sm-12 pl15">
        <div class="bs-component p10">            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="panel-title"> <?php echo ucwords(CrugeTranslator::t("sesiones de usuario")); ?>
                    </span>

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
                    <div class="panel-body p25">                        
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'CrugeSystem-Form',
                            'enableAjaxValidation' => false,
                            'enableClientValidation' => false,
                        ));
                        ?>

                        <legend class="section">
                            <?php echo ucwords(CrugeTranslator::t("opciones de sesion")); ?>
                        </legend>
                        <div class="clear"></div>
                        <div class="section row">
                            <div class="col-md-4">
                                <?php echo $form->labelEx($model, 'systemdown'); ?>
                                <div class='control-group'>
                                    <?php echo $form->checkBox($model, 'systemdown', array()); ?>
                                    <?php echo $form->error($model, 'systemdown'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <?php echo $form->labelEx($model, 'systemnonewsessions'); ?>
                                <div class='control-group'>

                                    <?php echo $form->checkBox($model, 'systemnonewsessions', array()); ?>
                                    <?php echo $form->error($model, 'systemnonewsessions'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <?php echo $form->labelEx($model, 'sessionmaxdurationmins'); ?>
                                <div class='control-group'>

                                    <?php
                                    echo $form->textField($model, 'sessionmaxdurationmins'
                                            , array('size' => 5, 'maxlength' => 4, 'class' => 'form-control'));
                                    ?>
                                    <?php echo $form->error($model, 'sessionmaxdurationmins'); ?>
                                </div>
                            </div>
                        </div>

                        <legend class="section">
                            <?php echo ucwords(CrugeTranslator::t("opciones de registro de usuarios")); ?>                            
                        </legend>
                        <div class="clear"></div>
                        <div class="section row">
                            <div class="col-md-4">

                                <?php echo $form->labelEx($model, 'registerusingcaptcha'); ?>
                                <div class='control-group'>

                                    <?php echo $form->checkBox($model, 'registerusingcaptcha'); ?>
                                    <?php echo $form->error($model, 'registerusingcaptcha'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <?php echo $form->labelEx($model, 'registerusingactivation'); ?>
                                <div class='control-group'>

                                    <?php
                                    echo $form->dropDownList($model, 'registerusingactivation'
                                            , Yii::app()->user->um->getUserActivationOptions(), array('class' => 'form-control'));
                                    ?>
                                    <?php echo $form->error($model, 'registerusingactivation'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <?php echo $form->labelEx($model, 'defaultroleforregistration'); ?>
                                <div class='control-group'>
                                    <?php
                                    echo $form->dropDownList($model, 'defaultroleforregistration'
                                            , Yii::app()->user->rbac->getRolesAsOptions(CrugeTranslator::t(
                                                            "--no asignar ningun rol--")), array('class' => 'form-control'));
                                    ?>
                                    <?php echo $form->error($model, 'defaultroleforregistration'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="section row">
                            <div class="col-md-6">
                                <?php echo $form->labelEx($model, 'registrationonlogin'); ?>
                                <div class='control-group'>

                                    <?php echo $form->checkBox($model, 'registrationonlogin'); ?>
                                    <?php echo $form->error($model, 'registrationonloginn'); ?>
                                </div>
                            </div>
                        </div>

                        <legend class="section">                            
                            <?php echo ucwords(CrugeTranslator::t("terminos y condiciones de registro")); ?>
                        </legend>
                        <div class="clear"></div>
                        <div class="section row">

                            <div class="col-md-4">

                                <?php echo $form->labelEx($model, 'registerusingterms'); ?>
                                <div class='control-group'>

                                    <?php echo $form->checkBox($model, 'registerusingterms'); ?>
                                    <?php echo $form->error($model, 'registerusingterms'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <?php echo $form->labelEx($model, 'registerusingtermslabel'); ?>
                                <div class='control-group'>
                                    <?php
                                    echo $form->textField($model, 'registerusingtermslabel'
                                            , array('size' => 45, 'maxlength' => 100, 'class' => 'form-control'));
                                    ?>
                                    <?php echo $form->error($model, 'registerusingtermslabel'); ?>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class='section row'>
                            <?php echo $form->labelEx($model, 'terms'); ?>
                            <div class='control-group'>

                                <?php
                                echo $form->textArea($model, 'terms'
                                        , array('rows' => 5, ));
                                ?>
                                <?php echo $form->error($model, 'terms'); ?>

                            </div>
                        </div>


                    </div>
                    <div class="panel-footer text-right">
                        <?php Yii::app()->user->ui->tbutton("Actualizar"); ?>
                    </div>
                    <?php echo $form->errorSummary($model); ?>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>