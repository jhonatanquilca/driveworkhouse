<?php
/** @var CltDeudaController $this */
/** @var CltDeuda $model */
$this->breadcrumbs=array(
	'Clt Deudas'=>array('index'),
	Yii::t('AweCrud.app', 'Manage'),
);

$this->menu=array(
	array('label' => Yii::t('AweCrud.app', 'List') . ' ' . CltDeuda::label(2), 'icon' => 'list', 'url' => array('index')),
	array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . CltDeuda::label(), 'icon' => 'plus', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('clt-deuda-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo CltDeuda::label(2) ?>    </legend>

<?php echo CHtml::link('<i class="icon-search"></i> ' . Yii::t('AweCrud.app', 'Advanced Search'), '#', array('class' => 'search-button btn')) ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id' => 'clt-deuda-grid',
    'type' => 'striped condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'monto',
        'usuario_creacion_id',
        'fecha_creacion',
        'usuario_actualizacion_id',
        'fecha_actualizacion',
        /*
        array(
                    'name' => 'clt_cliente_id',
                    'value' => 'isset($data->cltCliente) ? $data->cltCliente : null',
                    'filter' => CHtml::listData(CltCliente::model()->findAll(), 'id', CltCliente::representingColumn()),
                ),
        */
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
</fieldset>