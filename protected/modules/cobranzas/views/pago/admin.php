<?php
/** @var PagoController $this */
/** @var Pago $model */
$this->breadcrumbs = array(
    'Pagos' => array('index'),
    Yii::t('AweCrud.app', 'Manage'),
);

$this->menu = array(
//    array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Pago::label(2), 'icon' => 'fa fa-list', 'url' => array('index'), 'htmlOptions' => array('class' => 'btn-default'),),
    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . Pago::label(), 'icon' => 'fa fa-plus', 'url' => array('create'), 'htmlOptions' => array('class' => 'btn-inverse'),),
);
?>
<div class="col-sm-12 pln">
    <div class="bs-component p10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="panel-icon">
                    <i class="fa fa-legal"></i>
                </span>
                <span class="panel-title">     <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Pago::label(2) ?>                </span>
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
                            'id' => 'pago-grid',
                            'type' => 'striped condensed  bordered hover', //striped condensed  bordered hover
                            'dataProvider' => $model->search(),
                            'filter' => $model,
//                            'showTableOnEmpty' => false,
                            'emptyText' => '<div class="alert alert-border-bottom alert-primary pastel light dark text-center">                                            
                                           <h4><i class="fa fa-info pr10"></i>
                                            No se encontraron resultados.</h4>                                                                                        
                                            </div>',
                            'columns' => array(
//                                'id',
                                array(
                                    'name' => 'cliente_id',
                                    'value' => 'CHtml::link($data->cliente->nombre_completo , Yii::app()->createUrl("cliente/cliente/view/", array("id"=>$data->cliente_id)))',
                                    'type' => 'raw',
                                ),
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
//                                'usuario_actualizacion',
//                                'fecha_actualizacion',
                                /*
                                  'obserbaciones',
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
                                    'template' => '{update}',
                                    'afterDelete' => 'function(link,success,data){ 
                        if(success) {
                        $("#flashMsg").empty();
                        $("#flashMsg").css("display","");
                        $("#flashMsg").html(data).animate({opacity: 1.0}, 5500).fadeOut("slow");
                        }
                        }',
                                    'buttons' => array(
                                        'update' => array(
                                            'label' => '<button class="btn btn-primary"><i class="fa fa-pencil"></i></button>',
                                            'options' => array('title' => 'Actualizar'),
                                            'imageUrl' => false,
                                        //'visible' => 'Util::checkAccess(array("action_incidenciaPrioridad_update"))'
                                        ),

                                    ),
                                    'htmlOptions' => array(
                                        'width' => '100px'
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
</div>