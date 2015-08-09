<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
/** @var AweCrudCode $this */
?>
<?php echo "<?php\n" ?>
/** @var <?php echo $this->controllerClass; ?> $this */
/** @var <?php echo $this->modelClass; ?> $model */
/** @var AweActiveForm $form */
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <span class="panel-icon">
            <i class="fa fa-user"></i>
        </span>
        <span class="panel-title">     <?php echo "<?php echo Yii::t('AweCrud.app', \$model->isNewRecord?'Create':'Update') . ' ' . {$this->modelClass}::label(); ?>" ?>
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
        <div class="admin-form theme-info panel-body p15">
            <?php echo "<?php\n" ?>
            $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
            'type' => 'horizontal',
            'id' => '<?php echo $this->class2id($this->modelClass) ?>-form',
            'enableAjaxValidation' => <?php echo $this->validation == 1 || $this->validation == 3 ? 'true' : 'false' ?>,
            'clientOptions' => array('validateOnSubmit' => <?php echo $this->validation == 2 || $this->validation == 3 ? 'true' : 'false' ?>, 'validateOnChange' => <?php echo $this->validation == 1 || $this->validation == 3 ? 'true' : 'false' ?>,),
            'enableClientValidation' => <?php echo $this->validation == 2 || $this->validation == 3 ? 'true' : 'false' ?>,
            ));?>
            <p class="note">
                <?php echo "<?php echo Yii::t('AweCrud.app', 'Fields with') ?>" ?> <span class="required">*</span>
                <?php echo "<?php echo Yii::t('AweCrud.app', 'are required') ?>." ?>
            </p>
            <div class="col-md-6">   
                <?php echo "<?php echo \$form->errorSummary(\$model, '<p>' . Yii::t('yii', 'Please fix the following input errors:') . '</p>', '',array('class'=>'alert alert-danger pastel')) ?>\n" ?>
                <?php echo "<?php // add array('class'=>'gui-input')?> \n"; ?>
                <?php echo' <!--@TODO: Utilizar la estructura comentada si el formulario es de--> 
                <!--type=vertical caso contrario si es hirizontal no cambia-->
                <!--                <div class="control-group">
                
                <?php // echo $form->textFieldRow($model, \'nombre\', array(\'maxlength\' => 64,\'class\' => \'gui-input\')) ?>
                para select2 con este tema
                <?php //echo $form->dropDownListRow($model, \'cliente_id\', array(), array(\'class\' => \'form-control select2\',"style"=>"width: 100%")) ?>

                
                                </div>-->
                                ' ?>


                <?php foreach ($this->tableSchema->columns as $column): ?>
                    <?php
                    if ($column->autoIncrement || in_array($column->name, array_merge($this->create_time, $this->update_time))) {
                        continue;
                    }
                    //skip many to many relations, they are rendered below, this allows handling of nm relationships
                    foreach ($this->getRelations() as $relation) {
                        if ($relation[2] == $column->name && $relation[0] == 'CManyManyRelation') {
                            continue 2;
                        }
                    }
                    ?>

                    <?php echo "<?php echo " . $this->generateActiveField($this->modelClass, $column) . " ?>\n"; ?>
                <?php endforeach; ?>
                <?php
                foreach ($this->getRelations() as $relatedModelClass => $relation) {
                    if ($relation[0] == 'CManyManyRelation') {
                        echo "<div class=\"row nm_row\">\n";
                        echo $this->getNMField($relation, $relatedModelClass, $this->modelClass);
                        echo "</div>\n\n";
                    }
                }
                ?>
            </div>
        </div>

        <div class="panel-footer text-right">
            <?php echo "" ?>
            <?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'icon'=>'fa fa-check',
			'label'=>\$model->isNewRecord ? Yii::t('AweCrud.app', 'Create') : Yii::t('AweCrud.app', 'Save'),
		)); ?>\n" ?>
            <?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			//'buttonType'=>'submit',
                        'icon'=>'fa fa-remove',
			'label'=> Yii::t('AweCrud.app', 'Cancel'),
			'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
		)); ?>\n" ?>
        </div>

        <?php echo "<?php \$this->endWidget(); ?>\n" ?>
    </div>
</div>