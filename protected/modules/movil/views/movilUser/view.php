<?php
/** @var MovilUserController $this */
/** @var MovilUser $model */
$this->breadcrumbs=array(
	'Movil Users'=>array('index'),
	$model->id_dispositivo,
);

$this->menu=array(
//array('label' => Yii::t('AweCrud.app', 'List') . ' ' . MovilUser::label(2), 'icon' => 'fa fa-list', 'url' => array('index'),'htmlOptions'=>array('class'=>'btn-inverse')),
array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . MovilUser::label(), 'icon' => 'fa fa-plus', 'url' => array('create'),'htmlOptions'=>array('class'=>'btn-inverse')),
array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'fa fa-pencil', 'url' => array('update', 'id' => $model->id_dispositivo),'htmlOptions'=>array('class'=>'btn-inverse')),
array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'fa fa-trash', 'url' => '#','htmlOptions'=>array('class'=>'btn-inverse'), 'linkOptions' => array('submit' => array('delete', 'id' => $model->id_dispositivo), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'fa fa-list', 'url' => array('admin'),'htmlOptions'=>array('class'=>'btn-inverse')),
);
?>
<div class="col-sm-12 pln">
    <div class="bs-component p10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="panel-icon">
                    <i class="fa fa-user"></i>
                </span>
                <span class="panel-title"><?php echo Yii::t('AweCrud.app', 'View') . ' ' . MovilUser::label(); ?> <?php echo CHtml::encode($model) ?>                </span>
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
                                            'id_dispositivo',
                                            'id_user',
                                            'estado',
                                        ),
                    )); ?>
                </div>
            </div>
        </div>
    </div>
</div>