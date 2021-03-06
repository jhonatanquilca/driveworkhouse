<?php
/** @var DescripcionPalntillaController $this */
/** @var DescripcionPalntilla $model */
$this->breadcrumbs = array(
	'Descripcion Palntillas',
);

$this->menu = array(
    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . DescripcionPalntilla::label(), 'icon' => 'plus', 'url' => array('create'),'htmlOptions'=>array('class'=>'btn-default'),),
    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin'),'htmlOptions'=>array('class'=>'btn-default'),),
);
?>

<fieldset>
    <legend>
        <?php echo Yii::t('AweCrud.app', 'List') ?> <?php echo DescripcionPalntilla::label(2) ?>    </legend>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
)); ?>
</fieldset>