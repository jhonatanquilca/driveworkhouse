<?php
/** @var FormController $this */
/** @var Form $model es una instancia que implementa a ICrugeStoredUser */
/** @var Boolean $boolIsUserManagement true o false.  si es true indica que esta operandose bajo el action de adminstracion de usuarios, si es false indica que se esta operando bajo 'editar tu perfil' */
$this->pageTitle = Yii::t('app', 'Administrador de Usuarios');
?>
<div class="row">
    <div class="col-sm-12 pln">
        <div class="bs-component p10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="panel-title"> <?php echo ucwords(CrugeTranslator::t("crear nuevo usuario")); ?></span>
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
                        $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
                            'type' => 'horizontal',
                            'id' => 'crugestoreduser-form',
                            'enableAjaxValidation' => false,
                            'enableClientValidation' => false,
                        ));
                        ?>

                        <?php echo $form->textFieldRow($model, 'username', array('class' => 'form-control')) ?>

                        <?php echo $form->textFieldRow($model, 'email', array('class' => 'form-control')) ?>
                        <div class="control-group ">
                            <label class="control-label " for="CrugeStoredUser_newPassword">Clave </label>

                            <div class="controls ">
                                <div class="input-append">

                                    <input  name="CrugeStoredUser[newPassword]" id="CrugeStoredUser_newPassword" type="text" maxlength="20" class="form-control ">
                                    <span class="btn btn-success " type="button" onclick="generarPass()"><i class="fa fa-refresh"></i></span>
                                    <!--<div class="input-group-btn">-->                           
                                    <!--</div>-->
                                    <?php
//                    echo $form->textFieldRow($model, 'newPassword', array(
//                        'class' => 'span12',
//                        'append' => CHtml::ajaxLink(
//                                "<i class='icon-refresh'></i>"
//                                , Yii::app()->user->ui->ajaxGenerateNewPasswordUrl
//                                , array('success' => 'js:fnSuccess', 'error' => 'js:fnError')
//                        )
//                    ))
                                    ?>
                                </div>
                            </div>
                        </div>
                        <script>
                            function generarPass() {

                                $.get("<?php echo Yii::app()->user->ui->ajaxGenerateNewPasswordUrl ?>",
                                        null,
                                        function (data) {
                                            $("#CrugeStoredUser_newPassword").val(data);
                                        }
                                )
                            }
                            function fnSuccess(data) {
                                $('#CrugeStoredUser_newPassword').val(data);
                            }
                            function fnError(e) {
                                alert("error: " + e.responseText);
                            }
                        </script>

                        <!-- inicio de campos extra definidos por el administrador del sistema -->
                        <?php
                        if (count($model->getFields()) > 0) {
                            echo "<div class='row-fluid form-group'>";
                            echo "<div class='separator-form span11'>" . ucfirst(CrugeTranslator::t("datos de la cuenta")) . "</div>";
                            echo '<div class="clear"></div>';
                            foreach ($model->getFields() as $f) {
                                // aqui $f es una instancia que implementa a: ICrugeField
                                echo "<div class='col'>";
                                echo Yii::app()->user->um->getLabelField($f);
                                echo Yii::app()->user->um->getInputField($model, $f);
                                echo $form->error($model, $f->fieldname);
                                echo "</div>";
                            }
                            echo "</div>";
                        }
                        ?>
                        <!-- fin de campos extra definidos por el administrador del sistema -->



                        <?php //echo $form->errorSummary($model);  ?>
                    </div>
                    <div class="panel-footer text-right">

                        <?php
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'buttonType' => 'submit',
//                            'type' => 'success',
                            'type' => 'success',
                            'icon' => 'fa fa-check',
                            'label' => CrugeTranslator::t("Guardar"),
                        ));
                        ?>
                        <?php
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'type' => 'warning',
                            'icon' => 'fa fa-times',
                            'label' => Yii::t('AweCrud.app', 'Cancel'),
                            'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
                        ));
                        ?>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>

            </div>

        </div>

    </div>
</div>