<?php
/** @var ClienteController $this */
/** @var Cliente $model */
$this->breadcrumbs=array(
	$model->label(2) => array('index'),
	Yii::t('app', $model->id) => array('view', 'id'=>$model->id),
	Yii::t('AweCrud.app', 'Update'),
);

$this->menu=array(
//array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Cliente::label(2), 'icon' => 'list', 'url' => array('index'),'htmlOptions'=>array('class'=>'btn-default'),),
//array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . Cliente::label(), 'icon' => 'plus', 'url' => array('create'),'htmlOptions'=>array('class'=>'btn-default'),),
//array('label' => Yii::t('AweCrud.app', 'View'), 'icon' => 'eye-open', 'url'=>array('view', 'id' => $model->id),'htmlOptions'=>array('class'=>'btn-default'),),
//array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?')),'htmlOptions'=>array('class'=>'btn-default'),),
array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'fa fa-list', 'url' => array('admin'),'htmlOptions'=>array('class'=>'btn-default'),'htmlOptions'=>array('class'=>'btn-inverse')),
);
?>

<div class="col-sm-12 pln">
    <div class="bs-component p10">
        <?php echo $this->renderPartial('_form',array('model' => $model)); ?>
    </div>
</div>