<?php
/** @var DeudaController $this */
/** @var Deuda $model */
$this->breadcrumbs = array(
    'Deudas' => array('index'),
    Yii::t('AweCrud.app', 'Manage'),
);

$this->menu = array(
//    array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Deuda::label(2), 'icon' => 'fa fa-list', 'url' => array('index'), 'htmlOptions' => array('class' => 'btn-default'),),
    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . Deuda::label(), 'icon' => 'fa fa-plus', 'url' => array('create'), 'htmlOptions' => array('class' => 'btn-inverse'),),
);
?>
<div class="col-sm-12 pln">
    <div class="bs-component p10">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <span class="panel-icon">
                    <i class="fa fa-shopping-cart"></i>
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
                        <?php
                        $this->widget('bootstrap.widgets.TbGridView', array(
                            'id' => 'deuda-grid',
                            'type' => 'striped condensed hover bordered', //striped condensed hover bordered
                            'dataProvider' => $model->search(),
                            'filter' => $model,
//                            'showTableOnEmpty' => false,
                            'emptyText' => '<div class="alert alert-border-bottom alert-primary pastel light dark text-center">                                            
                                           <h4><i class="fa fa-info pr10"></i>
                                            No se encontraron resultados.</h4>                                                                                        
                                            </div>',
                            'columns' => array(
//                                'cliente_id',
                                array(
                                    'name' => 'cliente_id',
                                    'value' => 'CHtml::link($data->cliente->nombre_completo , Yii::app()->createUrl("cliente/cliente/view/", array("id"=>$data->cliente_id)))',
                                    'type' => 'raw',
                                ),
//                                'id',
                                array(
                                    'name' => 'monto',
                                    'value' => '"$ " .number_format($data->monto,2)'
                                ),
                                array(
                                    'name' => 'usuario_creacion_id',
//                                    'value' => '$data->usuario_creacion_id', 
                                    'value' => ' Yii::app()->user->um->loadUserById($data->usuario_creacion_id)->username;',
                                ),
                                array(
                                    'name' => 'fecha_creacion',
                                    'value' => 'Util::FormatDate($data->fecha_creacion, "d/m/Y")',
                                ),
//                                'usuario_actualizacion_id',
//                                'fecha_actualizacion',
                                /*
                                  'observaciones',
                                  array(
                                  'name' => 'descripcion_palntilla_id',
                                  'value' => 'isset($data->descripcionPalntilla) ? $data->descripcionPalntilla : null',
                                  'filter' => CHtml::listData(DescripcionPalntilla::model()->findAll(), 'id', DescripcionPalntilla::representingColumn()),
                                  ),

                                 */
                                array(
                                    'class' => 'CButtonColumn',
                                    'template' => '{update}',
                                    'buttons' => array(
                                        'update' => array(
                                            'label' => '<button class="btn btn-primary"><i class="fa fa-pencil"></i></button>',
                                            'options' => array('title' => 'Actualizar'),
                                            'imageUrl' => false,
                                        //'visible' => 'Util::checkAccess(array("action_incidenciaPrioridad_update"))'
                                        ),
//                                        'delete' => array(
//                                            'label' => '<button class="btn btn-danger"><i class="fa fa-trash"></i></button>',
//                                            'options' => array('title' => 'Eliminar'),
//                                            'imageUrl' => false,
//                                        'visible' => 'Util::checkAccess(array("action_incidenciaPrioridad_delete"))'
//                                        ),
                                    ),
                                    'htmlOptions' => array(
                                        'width' => '50px'
                                    )
                                ),
                            ),
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>