<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
/** @var AweCrudCode $this */
?>
<?php echo "<?php\n" ?>
/** @var <?php echo $this->controllerClass; ?> $this */
/** @var <?php echo $this->modelClass; ?> $model */
<?php
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	Yii::t('AweCrud.app', 'Manage'),
);\n";
?>

$this->menu=array(
array('label' => Yii::t('AweCrud.app', 'List') . ' ' . <?php echo $this->modelClass ?>::label(2), 'icon' => 'fa fa-list', 'url' => array('index'),'htmlOptions'=>array('class'=>'btn-default'),),
array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . <?php echo $this->modelClass ?>::label(), 'icon' => 'fa fa-plus', 'url' => array('create'),'htmlOptions'=>array('class'=>'btn-default'),),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
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
                <span class="panel-title">     <?php echo "<?php echo Yii::t('AweCrud.app', 'Manage') ?>" ?> <?php echo "<?php echo {$this->modelClass}::label(2) ?>" ?>
                </span>
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

                        <?php echo "<?php echo CHtml::link('<i class=\"icon-search\"></i> ' . Yii::t('AweCrud.app', 'Advanced Search'), '#', array('class' => 'search-button btn')) ?>" ?>

                        <div class="search-form" style="display:none">
                            <?php echo "<?php \$this->renderPartial('_search',array(
	'model' => \$model,
)); ?>\n"; ?>
                        </div>
                        <!-- search-form -->

                        <?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbGridView',array(
                        'id' => '<?php echo $this->class2id($this->modelClass); ?>-grid',
                        'type' => 'striped condensed hover', //striped condensed  bordered hover
                        'dataProvider' => $model->search(),
                        'filter' => $model,
                        'emptyText'=>'no hay datos!',
                        'columns' => array(
                        <?php
                        $count = 0;
                        foreach ($this->tableSchema->columns as $column) {
                            if (++$count == 7):
                                ?>
                                /*<?php echo "\n" ?>
                            <?php endif; ?>
                            <?php echo $this->generateGridViewColumn($this->modelClass, $column) . ",\n" ?>
                            <?php
                        }
                        if ($count >= 7):
                            ?>
                            */<?php echo "\n" ?>
                        <?php endif; ?>
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