<?php
/** @var CltDeudaController $this */
/** @var CltDeuda $model */
$this->breadcrumbs=array(
	'Clt Deudas'=>array('index'),
	$model->id,
);

$this->menu=array(
    //array('label' => Yii::t('AweCrud.app', 'List') . ' ' . CltDeuda::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . CltDeuda::label(), 'icon' => 'plus', 'url' => array('create')),
	array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?php echo Yii::t('AweCrud.app', 'View') . ' ' . CltDeuda::label(); ?> <?php echo CHtml::encode($model) ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
        'id',
        'monto',
        'usuario_creacion_id',
        'fecha_creacion',
        'usuario_actualizacion_id',
        'fecha_actualizacion',
        array(
			'name' => 'clt_cliente_id',
			'value'=>($model->cltCliente !== null) ? CHtml::link($model->cltCliente, array('/cltCliente/view', 'id' => $model->cltCliente->id)).' ' : null,
			'type' => 'html',
		),
	),
)); ?>
</fieldset>