<?php
$this->pageTitle = Yii::t('app', 'Campos Personalizados');
?>

<?php
$cols = array();
// presenta los campos de ICrugeField
foreach (Yii::app()->user->um->getSortFieldNamesForICrugeField() as $key => $fieldName) {
    $value = null;
    if ($fieldName == 'required')
        $value = '$data->getRequiredName()';
    $cols[] = array('name' => $fieldName, 'value' => $value);
}
$cols[] = array(
    'class' => 'CButtonColumn',
    'template' => '{update} {delete}',
    'deleteConfirmation' => CrugeTranslator::t("Esta seguro de eliminar este campo ?"),
    'buttons' => array(
        'update' => array(
            'label' => '<button class="btn btn-primary"><i class="icon-pencil"></i></button>',
            'options' => array('title' => CrugeTranslator::t("editar campo")),
            'url' => 'array("fieldsadminupdate","id"=>$data->getPrimaryKey())',
            'imageUrl' => false,
        ),
        'delete' => array(
            'label' => '<button class="btn btn-danger"><i class="icon-trash"></i></button>',
            'options' => array('title' => CrugeTranslator::t("eliminar campo")),
            'url' => 'array("fieldsadmindelete","id"=>$data->getPrimaryKey())',
            'imageUrl' => false,
        ),
    ),
    'htmlOptions' => array(
        'width' => '80px'
    )
);
//$this->widget(Yii::app()->user->ui->CGridViewClass, array(
//    'dataProvider'=>$dataProvider,
//    'columns'=>$cols,
//	'filter'=>$model,
//));
?>

<div class="row">
    <div class="col-sm-12 pln">
        <div class="bs-component p10">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="panel-title"><?php echo ucwords(CrugeTranslator::t("campos personalizados")); ?></span>
                    <span class="panel-controls">
                        <a href="#" class="panel-control-loader"></a>
                        <!--<a href="#" class="panel-control-remove"></a>-->
                        <!--<a href="#" class="panel-control-title"></a>-->
                        <!--<a href="#" class="panel-control-color"></a>-->
                        <a href="#" class="panel-control-collapse"></a>
                        <!--<a href="#" class="panel-control-fullscreen"></a>-->
                    </span>
                </div>
                <div class="panel-body border">
                    <div style="overflow: auto">

                    <?php
                    $this->widget('bootstrap.widgets.TbGridView', array(
                        'id' => 'llamada-grid',
                        'type' => 'striped condensed',
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        'columns' => $cols
                    ));
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>