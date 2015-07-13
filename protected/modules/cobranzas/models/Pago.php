<?php

Yii::import('cobranzas.models._base.BasePago');

class Pago extends BasePago
{
    /**
     * @return Pago
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Pago|Pagos', $n);
    }

}