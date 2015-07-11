<?php
/** @var TxTrasaccionController $this */
/** @var TxTrasaccion $model */
$this->breadcrumbs=array(
	'Tx Trasaccions'=>array('index'),
	$model->id,
);

$this->menu=array(
//array('label' => Yii::t('AweCrud.app', 'List') . ' ' . TxTrasaccion::label(2), 'icon' => 'fa fa-list', 'url' => array('index')),
array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . TxTrasaccion::label(), 'icon' => 'fa fa-plus', 'url' => array('create')),
array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'fa fa-pencil', 'url' => array('update', 'id' => $model->id)),
array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'fa fa-trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'fa fa-list', 'url' => array('admin')),
);
?>
<div class="col-sm-12 pln">
    <div class="bs-component p10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="panel-icon">
                    <i class="fa fa-user"></i>
                </span>
                <span class="panel-title"><?php echo Yii::t('AweCrud.app', 'View') . ' ' . TxTrasaccion::label(); ?> <?php echo CHtml::encode($model) ?>                </span>
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

                    <?php $this->widget('bootstrap.widgets.TbDetailView',array(
                    'data' => $model,
                    'attributes' => array(
                                            'id',
                                            'monto_cuota',
                                            'tipo',
                                            'observaciones',
                                            'usuario_creacion_id',
                                            'fecha_creacion',
                                            'usuario_actualizacion_id',
                                            'fecha_actualizacion',
                                            array(
			'name' => 'clt_deuda_id',
			'value'=>($model->cltDeuda !== null) ? CHtml::link($model->cltDeuda, array('/cltDeuda/view', 'id' => $model->cltDeuda->id)).' ' : null,
			'type' => 'html',
		),
                                            array(
			'name' => 'tx_descripcion_palntilla_id',
			'value'=>($model->txDescripcionPalntilla !== null) ? CHtml::link($model->txDescripcionPalntilla, array('/txDescripcionPalntilla/view', 'id' => $model->txDescripcionPalntilla->id)).' ' : null,
			'type' => 'html',
		),
                                        ),
                    )); ?>
                </div>
            </div>
        </div>
    </div>
</div>