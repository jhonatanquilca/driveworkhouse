<?php
/** @var ClienteController $this */
/** @var Cliente $model */
$this->breadcrumbs = array(
    'Clientes' => array('index'),
    Yii::t('AweCrud.app', 'Manage'),
);

$this->menu = array(
//    array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Cliente::label(2), 'icon' => 'fa fa-list', 'url' => array('index'), 'htmlOptions' => array('class' => 'btn-default'),),
    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . Cliente::label(), 'icon' => 'fa fa-plus', 'url' => array('create'), 'htmlOptions' => array('class' => 'btn-inverse'),),
);
?>
<div class="col-sm-12 pln">
    <div class="bs-component p10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="panel-icon">
                    <i class="fa fa-group "></i>
                </span>
                <span class="panel-title">     <?php echo Yii::t('AweCrud.app', 'Manage') ?> <?php echo Cliente::label(2) ?>                </span>
                <span class="panel-controls">
                    <a href="#" class="panel-control-loader"></a>
                    <!--<a href="#" class="panel-control-remove"></a>-->
                    <!--<a href="#" class="panel-control-title"></a>-->
                    <!--<a href="#" class="panel-control-color"></a>-->
                    <a href="#" class="panel-control-collapse"></a>
                    <!--<a href="#" class="panel-control-fullscreen"></a>-->
                </span>
            </div>
            <div class="panel-body border pn ">
                <div class="admin-form theme-info panel-body p15">

                    <div style="overflow: auto">

                        <?php
                        $this->widget('bootstrap.widgets.TbGridView', array(
                            'id' => 'cliente-grid',
                            'type' => 'striped condensed hover bordered', //striped condensed  bordered hover
                            'template' => '<bold>{items}</bold><div class="row-fluid"><div class="col-lg-6" style="display: -webkit-box;">{summary}</div><div class="col-lg-6">{pager}</div></div>',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
//                            'showTableOnEmpty' => false,
                            'emptyText' => '<div class="alert alert-border-bottom alert-primary pastel light dark text-center">                                            
                                           <h4><i class="fa fa-info pr10"></i>
                                            No se encontraron resultados.</h4>                                                                                        
                                            </div>',
                            'columns' => array(
//                                'id',
//                                'nombre',
//                                'apellido', 
                                array(
                                    'name' => 'nombre_completo',
                                    'value' => 'CHtml::link($data->nombre_completo, Yii::app()->createUrl("cliente/cliente/view/id/".$data->id))',
                                    'type' => 'html',
                                ),
                                'documento',
                                'telefono',
                                'celular',
                                array(
                                    'name' => 'usuario_creacion_id',
                                    'value' => 'Yii::app()->user->um->loadUserById($data->usuario_creacion_id)->username'
                                ),
                                /*
                                  'email_1',
                                  'email_2',
                                  array(
                                  'name' => 'estado',
                                  'filter' => array('ACTIVO'=>'ACTIVO','INACTIVO'=>'INACTIVO',),
                                  ),
                                  'usuario_actualizacion_id',
                                  'fecha_creacion',
                                  'fecha_actualizacion',
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
//                                        'prueba' => array(
//                                            'label' => '<button class="btn btn-warning"><i class="fa fa-list"></i></button>',
//                                            'options' => array('title' => 'Modal'),
//                                            'url' => '"cliente/cliente/modal/id_cliente/".$data->id',
//                                            'imageUrl' => false,
//                                            'click' => 'js:function(e){e.preventDefault(); viewModal($(this).attr("href"),function() {maskAttributes();});  return false; }',
//                                        //'visible' => 'Util::checkAccess(array("action_incidenciaPrioridad_update"))'
//                                        ),
//                                        'delete' => array(
//                                            'label' => '<button class="btn btn-danger"><i class="icon-trash"></i></button>',
//                                            'options' => array('title' => 'Eliminar'),
//                                            'imageUrl' => false,
                                    //'visible' => 'Util::checkAccess(array("action_incidenciaPrioridad_delete"))'
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