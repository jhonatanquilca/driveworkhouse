<?php
/** @var CltClienteController $this */
/** @var CltCliente $model */
$this->titulo = Yii::t('AweCrud.app', 'Manage') . ' ' . CltCliente::label(2);


$this->breadcrumbs = array(
    'Clt Clientes' => array('index'),
    Yii::t('AweCrud.app', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('AweCrud.app', 'List') . ' ' . CltCliente::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . CltCliente::label(), 'icon' => 'plus', 'url' => array('create')),
);


//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$.fn.yiiGridView.update('clt-cliente-grid', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
?>

<fieldset>


    <?php // echo CHtml::link('<i class="icon-search"></i> ' . Yii::t('AweCrud.app', 'Advanced Search'), '#', array('class' => 'search-button btn')) ?>
    <!--<div class="search-form" style="display:none">-->
    <?php
//    $this->renderPartial('_search', array(
//        'model' => $model,
//    ));
//    
    ?>
    <!--</div>-->
    <!-- search-form -->

    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'clt-cliente-grid',
        'type' => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            'id',
            'nombre',
            'apellido',
            'documento',
            'telefono',
            'celular',
            /*
              'email_1',
              'email_2',
              array(
              'name' => 'estado',
              'filter' => array('ACTIVO'=>'ACTIVO','INACTIVO'=>'INACTIVO',),
              ),
              'usuario_creacion_id',
              'usuario_actualizacion_id',
              'fecha_creacion',
              'fecha_actualizacion',
             */
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
            ),
        ),
    ));
    ?>
</fieldset>