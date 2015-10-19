<?php
/** @var MovilUserController $this */
/** @var MovilUser $data */
?>
<div class="view">
                    
        <?php if (!empty($data->id_user)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->id_user); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->estado)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->estado); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>