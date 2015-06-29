<?php
/** @var CltDeudaController $this */
/** @var CltDeuda $model */
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    Yii::t('AweCrud.app', 'Create'),
);

$this->menu = array(
//array('label' => Yii::t('AweCrud.app', 'List').' '.CltDeuda::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>
<div class="col-sm-12 pln">
    <div class="bs-component p25">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>