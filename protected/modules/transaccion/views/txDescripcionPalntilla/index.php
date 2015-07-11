<?php
/** @var TxDescripcionPalntillaController $this */
/** @var TxDescripcionPalntilla $model */
$this->breadcrumbs = array(
	'Tx Descripcion Palntillas',
);

$this->menu = array(
    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . TxDescripcionPalntilla::label(), 'icon' => 'plus', 'url' => array('create'),'htmlOptions'=>array('class'=>'btn-default'),),
    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin'),'htmlOptions'=>array('class'=>'btn-default'),),
);
?>

<fieldset>
    <legend>
        <?php echo Yii::t('AweCrud.app', 'List') ?> <?php echo TxDescripcionPalntilla::label(2) ?>    </legend>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
)); ?>
</fieldset>