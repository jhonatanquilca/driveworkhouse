<?php

Yii::import('cobranzas.models._base.BaseDeuda');

class Deuda extends BaseDeuda
{
    /**
     * @return Deuda
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'Deuda|Deudas', $n);
    }

}