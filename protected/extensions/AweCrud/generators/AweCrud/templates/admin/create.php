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
<?php
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	\$model->label(2) => array('index'),
	Yii::t('AweCrud.app', 'Create'),
);\n";
?>

$this->menu=array(
//array('label' => Yii::t('AweCrud.app', 'List').' '.<?php echo $this->modelClass ?>::label(2), 'icon' => 'fa fa-list', 'url' => array('index'),'htmlOptions'=>array('class'=>'btn-default'),),
array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'fa fa-list', 'url' => array('admin'),'htmlOptions'=>array('class'=>'btn-default'),),
);
?>
<div class="col-sm-12 pln">
    <div class="bs-component p10">
        <?php echo "<?php echo \$this->renderPartial('_form', array('model' => \$model)); ?>" . PHP_EOL; ?>
    </div>
</div>