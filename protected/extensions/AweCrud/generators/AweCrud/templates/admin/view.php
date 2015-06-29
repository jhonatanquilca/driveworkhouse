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
$nameColumn = $this->guessNameColumn($this->tableSchema->columns);
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
//array('label' => Yii::t('AweCrud.app', 'List') . ' ' . <?php echo $this->modelClass ?>::label(2), 'icon' => 'fa fa-list', 'url' => array('index')),
array('label' => Yii::t('AweCrud.app', 'Create') . ' ' . <?php echo $this->modelClass ?>::label(), 'icon' => 'fa fa-plus', 'url' => array('create')),
array('label' => Yii::t('AweCrud.app', 'Update'), 'icon' => 'fa fa-pencil', 'url' => array('update', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>)),
array('label' => Yii::t('AweCrud.app', 'Delete'), 'icon' => 'fa fa-trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>), 'confirm' => Yii::t('AweCrud.app', 'Are you sure you want to delete this item?'))),
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
                <span class="panel-title"><?php echo "<?php echo Yii::t('AweCrud.app', 'View') . ' ' . {$this->modelClass}::label(); ?> <?php echo CHtml::encode(\$model) ?>" ?>
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

                    <?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbDetailView',array(
                    'data' => $model,
                    'attributes' => array(
                    <?php foreach ($this->tableSchema->columns as $column): ?>
                        <?php echo $this->generateDetailViewAttribute($this->modelClass, $column) . ",\n" ?>
                    <?php endforeach; ?>
                    ),
                    )); ?>
                </div>
            </div>
        </div>
    </div>
</div>