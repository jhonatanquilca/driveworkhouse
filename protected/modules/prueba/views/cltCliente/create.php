<?php
/** @var CltClienteController $this */
/** @var CltCliente $model */
$this->breadcrumbs=array(
	$model->label(2) => array('index'),
	Yii::t('AweCrud.app', 'Create'),
);

$this->menu=array(
//array('label' => Yii::t('AweCrud.app', 'List').' '.CltCliente::label(2), 'icon' => 'fa fa-list', 'url' => array('index')),
array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'fa fa-list', 'url' => array('admin')),
);
?>
<div class="col-sm-12 pln">
    <div class="bs-component p10">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>