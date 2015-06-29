
<?php
/* $model:  es una instancia que implementa a ICrugeField */

$this->pageTitle = Yii::t('app', 'Campos Personalizados');
?>
<div class="row">

    <div class="col-sm-12 pl15">
        <div class="bs-component p10">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="panel-title"><?php
                        echo ucwords(CrugeTranslator::t(
                                        (($model->isNewRecord == 1) ? "creando nuevo campo personalizado" : "editando campo personalizado")
                        ));
                        ?></span>

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
                    <div class="admin-form theme-info panel-body p25">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
//                'type'=>'horizontal',
                            'id' => 'crugefield-form',
                            'enableAjaxValidation' => false,
                            'enableClientValidation' => false,
                            'htmlOptions' => array(
                                'class' => 'form-horizontal'
                            ),
                        ));
                        ?>
                        <legend class="section">
                            <?php echo ucfirst(CrugeTranslator::t("datos del campo")); ?>
                        </legend>
                        <div class="clear"></div>

                        <div class="section row">
                            <div class="col-md-4">
                                <div class='control-group'>
                                    <?php echo $form->labelEx($model, 'fieldname'); ?>
                                    <?php echo $form->textField($model, 'fieldname', array('size' => 15, 'maxlength' => 20, 'class' => 'gui-input')); ?>
                                    <?php echo $form->error($model, 'fieldname'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class='control-group'>
                                    <?php echo $form->labelEx($model, 'longname'); ?>
                                    <?php echo $form->textField($model, 'longname', array('class' => 'gui-input')); ?>
                                    <?php echo $form->error($model, 'longname'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class='control-group'>
                                    <label for="CrugeField_position" class="required">Posicion </label>
                                    <?php // echo $form->labelEx($model, 'position'); ?>
                                    <?php echo $form->textField($model, 'position', array('size' => 5, 'maxlength' => 3, 'class' => 'gui-input')) ?>
                                    <?php echo $form->error($model, 'position'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class='control-group'>
                                    <div class="col-md-12">
                                        <?php echo $form->labelEx($model, 'required'); ?>
                                    </div>
                                    <div class="col-md-12">

                                        <?php echo $form->checkBox($model, 'required'); ?>
                                    </div>
                                    <?php echo $form->error($model, 'required'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class='control-group'>
                                    <div class="col-md-12">

                                        <?php echo $form->labelEx($model, 'showinreports'); ?>
                                    </div>
                                    <div class="col-md-12">

                                        <?php echo $form->checkBox($model, 'showinreports'); ?>
                                    </div>
                                    <?php echo $form->error($model, 'showinreports'); ?>
                                </div>
                            </div>
                        </div>
                        <legend class="section">
                            <?php echo ucfirst(CrugeTranslator::t("datos del contenido")); ?>
                        </legend>
                        <div class="clear"></div>
                        <div class="section row">
                            <!--<div class="field-group">-->
                            <div class="col-md-4">

                                <div class='control-group'>
                                    <?php echo $form->labelEx($model, 'fieldtype'); ?>
                                    <?php
                                    echo $form->dropDownList($model, 'fieldtype'
                                            , Yii::app()->user->um->getFieldTypeOptions(), array('class' => 'gui-input'));
                                    ?>
                                    <?php echo $form->error($model, 'fieldtype'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class='control-group'>
                                    <?php echo $form->labelEx($model, 'fieldsize'); ?>
                                    <?php echo $form->textField($model, 'fieldsize', array('size' => 5, 'maxlength' => 3, 'class' => 'gui-input')); ?>
                                    <?php echo $form->error($model, 'fieldsize'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class='control-group'>
                                    <?php echo $form->labelEx($model, 'maxlength'); ?>
                                    <?php echo $form->textField($model, 'maxlength', array('size' => 5, 'maxlength' => 5, 'class' => 'gui-input')); ?>
                                    <?php echo $form->error($model, 'maxlength'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="section row">


                            <div class='control-group '>
                                <div class="col-md-4">
                                    <?php echo $form->labelEx($model, 'predetvalue'); ?>
                                    <?php echo $form->textArea($model, 'predetvalue', array('rows' => 5, 'cols' => 40)); ?>
                                    <?php echo $form->error($model, 'predetvalue'); ?>
                                </div>
                                <div class="col-md-12">

                                    <p class='hint'><?php
                                        echo CrugeTranslator::t(
                                                "si el fieldtype es un Listbox ponga aqui las opciones una por cada linea,
         el valor coloquelo al inicio seguido de una coma, ejemplo:
         <ul style='list-style: none;'>
         <li>1, azul</li>
         <li>2, rojo</li>
         <li>3, verde</li>
         </ul>
        "
                                        );
                                        ?></p>
                                </div>
                            </div>
                        </div>

                        <!--<div class="row-fluid form-group">
                                <div class='separator-form span11'><?php echo ucfirst(CrugeTranslator::t("datos de validacion")); ?></div>
                                <div class="clear"></div>
                                <div class='field-group'>
                                        <div class='row-fluid'>
                        <?php echo $form->labelEx($model, 'useregexp'); ?>
                        <?php echo $form->textArea($model, 'useregexp', array('rows' => 5, 'cols' => 40)); ?>
                        <?php echo $form->error($model, 'useregexp'); ?>
                                                <p class='hint'><?php echo CrugeTranslator::t("dejar en blanco si no se quiere usar"); ?></p>
                                        </div>
                        <?php
                        echo ucfirst(CrugeTranslator::t(
                                        "La expresion regular (regexp) es una lista de caracteres
                                         que validan la sintaxis de lo que el usuario ingrese en este campo.
                                         por ejemplo:"
                        ));
                        ?>
                        <?php
                        echo "<br/><u>" . CrugeTranslator::t("telefono:") . "</u><br/>^([0-9-.+ \(\)]{3,20})$";
                        echo "<br/><u>" . CrugeTranslator::t("digitos y letras:") . "</u><br/>^([a-zA-Z0-9]+)$";
                        ?>
                                </div>
                                <div class='row-fluid'>
                        <?php echo $form->labelEx($model, 'useregexpmsg'); ?>
                        <?php echo $form->textField($model, 'useregexpmsg', array('size' => 50, 'maxlength' => 512, 'class' => 'gui-input')); ?>
                        <?php echo $form->error($model, 'useregexpmsg'); ?>
                                </div>
                        </div>-->
                    </div>



                    <div class="panel-footer text-right">

                        <?php
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'buttonType' => 'submit',
                            'type' => 'success',
                            'icon' => 'fa fa-check',
                            'label' => CrugeTranslator::t(($model->isNewRecord ? "Crear Campo" : "Actualizar Campo")),
                        ));
                        ?>
                        <?php
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'icon' => 'fa fa-times',
                            'type' => 'warning',
                            'label' => Yii::t('AweCrud.app', 'Cancel'),
                            'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
                        ));
                        ?>
                    </div>
                    <?php echo $form->errorSummary($model); ?>

                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>