<?php
/** @var DeudaController $this */
/** @var Deuda $model */
$this->breadcrumbs=array(
	'Deudas'=>array('index'),
	Yii::t('AweCrud.app', 'Manage'),
);

$this->menu=array(
array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Deuda::label(2), 'icon' => 'fa fa-list', 'url' => array('index'),'htmlOptions'=>array('class'=>'btn-default'),),
array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . Deuda::label(), 'icon' => 'fa fa-plus', 'url' => array('create'),'htmlOptions'=>array('class'=>'btn-default'),),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('deuda-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<div class="col-sm-12 pln">
    <div class="bs-component p10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="panel-icon">
                    <i class="fa fa-user"></i>
                </span>
                <span class="panel-title">     <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Deuda::label(2) ?>                </span>
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

                    <div style="overflow: auto">

                        <?php echo CHtml::link('<i class="icon-search"></i> ' . Yii::t('AweCrud.app', 'Advanced Search'), '#', array('class' => 'search-button btn')) ?>
                        <div class="search-form" style="display:none">
                            <?php $this->renderPartial('_search',array(
	'model' => $model,
)); ?>
                        </div>
                        <!-- search-form -->

                        <?php $this->widget('bootstrap.widgets.TbGridView',array(
                        'id' => 'deuda-grid',
                        'type' => 'striped condensed hover', //striped condensed  bordered hover
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        'emptyText'=>'no hay datos!',
                        'columns' => array(
                                                    'id',
                                                        'monto',
                                                        'usuario_creacion_id',
                                                        'fecha_creacion',
                                                        'usuario_actualizacion_id',
                                                        'fecha_actualizacion',
                                                            /*
                                                        'observaciones',
                                                        array(
                    'name' => 'descripcion_palntilla_id',
                    'value' => 'isset($data->descripcionPalntilla) ? $data->descripcionPalntilla : null',
                    'filter' => CHtml::listData(DescripcionPalntilla::model()->findAll(), 'id', DescripcionPalntilla::representingColumn()),
                ),
                                                        array(
                    'name' => 'cliente_id',
                    'value' => 'isset($data->cliente) ? $data->cliente : null',
                    'filter' => CHtml::listData(Cliente::model()->findAll(), 'id', Cliente::representingColumn()),
                ),
                                                        */
                                                array(
                        'class' => 'CButtonColumn',
                        'template' => '{update} {delete}',
                        'afterDelete' => 'function(link,success,data){ 
                        if(success) {
                        $("#flashMsg").empty();
                        $("#flashMsg").css("display","");
                        $("#flashMsg").html(data).animate({opacity: 1.0}, 5500).fadeOut("slow");
                        }
                        }',
                        'buttons' => array(
                        'update' => array(
                        'label' => '<button class="btn btn-primary"><i class="icon-pencil"></i></button>',
                        'options' => array('title' => 'Actualizar'),
                        'imageUrl' => false,
                        //'visible' => 'Util::checkAccess(array("action_incidenciaPrioridad_update"))'
                        ),
                        'delete' => array(
                        'label' => '<button class="btn btn-danger"><i class="icon-trash"></i></button>',
                        'options' => array('title' => 'Eliminar'),
                        'imageUrl' => false,
                        //'visible' => 'Util::checkAccess(array("action_incidenciaPrioridad_delete"))'
                        ),
                        ),
                        'htmlOptions' => array(
                        'width' => '100px'
                        )
                        ),
                        ),
                        )); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>