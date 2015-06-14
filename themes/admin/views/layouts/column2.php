<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?php if ($this->menu): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumbs">

                <?php foreach ($this->menu as $menu) : ?>
                    <?php
                    $this->widget(
                            'ext.bootstrap.widgets.TbButtonGroup', array(
                        'buttons' => array($menu),
                            )
                    );
                    ?>
                <?php endforeach; ?>
            </div>
            <div class="page-header title">
                <!-- PAGE TITLE ROW -->
                <!--<h1><?php echo $this->titulo; ?><span class="sub-title">sub titulo</span></h1>-->								
                <h1><?php echo $this->titulo; ?></h1>								
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="row">
    <?php echo $content; ?>
</div>

<?php $this->endContent(); ?>