<?php
/** @var ClienteController $this */
/** @var Cliente $model */
$this->breadcrumbs = array(
    'Clientes' => array('index'),
    $model->id,
);

$this->menu = array(
//array('label' => Yii::t('AweCrud.app', 'List') . ' ' . Cliente::label(2), 'icon' => 'fa fa-list', 'url' => array('index')),
//    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . Cliente::label(), 'icon' => 'fa fa-plus', 'url' => array('create')),
//    array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'fa fa-pencil', 'url' => array('update', 'id' => $model->id)),
//    array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'fa fa-trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
//    array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'fa fa-list', 'url' => array('admin'), 'htmlOptions' => array('class' => 'btn-inverse'),),
);
?>
<div class="content-header text-left ml15 mbn mtn">
    <h1 class="mtn">
        <i class="fa fa-user fa-2x"></i> 
        <?php echo $model->nombre_completo ?>
    </h1>
</div>
<div class="col-sm-12 pln">
    <div class="bs-component p10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="panel-icon">
                    <i class="fa fa-info-circle"></i>
                </span>
                <span class="panel-title"> Informac&oacute;n General<?php // echo Yii::t('AweCrud.app', 'View') . ' ' . Cliente::label(); ?> <?php echo CHtml::encode($model) ?>                </span>
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

                    <?php
                    $this->widget('bootstrap.widgets.TbDetailView', array(
                        'data' => $model,
                        'attributes' => array(
//                            'id',
                            'nombre',
                            'apellido',
                            'documento',
                            'telefono',
                            'celular',
                            'email_1',
                            'email_2',
                            'estado',
                            'usuario_creacion_id',
                            'usuario_actualizacion_id',
                            array(
                                'name' => 'fecha_creacion',
                                'value' => Util::FormatDate($model->fecha_creacion, 'm/d/Y')
                            ),
                            array(
                                'name' => 'fecha_actualizacion',
                                'value' => Util::FormatDate($model->fecha_actualizacion, 'm/d/Y')
                            ),
                        ),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>