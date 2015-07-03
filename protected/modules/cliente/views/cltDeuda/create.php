<?php
/** @var CltDeudaController $this */
/** @var CltDeuda $model */
$this->breadcrumbs=array(
	$model->label(2) => array('index'),
	Yii::t('AweCrud.app', 'Create'),
);

$this->menu=array(
//array('label' => Yii::t('AweCrud.app', 'List').' '.CltDeuda::label(2), 'icon' => 'fa fa-list', 'url' => array('index'),'htmlOptions'=>array('class'=>'btn-default'),),
array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'fa fa-list', 'url' => array('admin'),'htmlOptions'=>array('class'=>'btn-default'),),
);
?>
<div class="col-sm-12 pln">
    <div class="bs-component p10">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>