<?php

Yii::import('cobranzas.models._base.BaseDescripcionPalntilla');

class DescripcionPalntilla extends BaseDescripcionPalntilla
{
    /**
     * @return DescripcionPalntilla
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function label($n = 1)
    {
        return Yii::t('app', 'DescripcionPalntilla|DescripcionPalntillas', $n);
    }

}