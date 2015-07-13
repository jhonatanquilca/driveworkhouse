<?php
/** @var DescripcionPalntillaController $this */
/** @var DescripcionPalntilla $model */
$this->breadcrumbs=array(
	'Descripcion Palntillas'=>array('index'),
	$model->id,
);

$this->menu=array(
//array('label' => Yii::t('AweCrud.app', 'List') . ' ' . DescripcionPalntilla::label(2), 'icon' => 'fa fa-list', 'url' => array('index')),
array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . DescripcionPalntilla::label(), 'icon' => 'fa fa-plus', 'url' => array('create')),
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
                <span class="panel-title"><?php echo Yii::t('AweCrud.app', 'View') . ' ' . DescripcionPalntilla::label(); ?> <?php echo CHtml::encode($model) ?>                </span>
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
                                            'nombre',
                                            'descripcion',
                                            'estado',
                                        ),
                    )); ?>
                </div>
            </div>
        </div>
    </div>
</div>