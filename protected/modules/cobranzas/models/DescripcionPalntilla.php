<?php

Yii::import('cobranzas.models._base.BaseDescripcionPalntilla');

class DescripcionPalntilla extends BaseDescripcionPalntilla {

    /**
     * @return DescripcionPalntilla
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'DescripcionPalntilla|DescripcionPalntillas', $n);
    }

    /* ---------------------------------------DE BASE---------------------------------- */
    /* ---------------------------------------SCOPES----------------------------------- */
    /* --------------------------------------CONSULTAS--------------------------------- */

    public function getListSelect2($search_value = null) {
//        select t.id as id, t.nombre as text from descripcion_palntilla t
//        where t.nombre like 'por%'
        $command = Yii::app()->db->createCommand()
                ->select("t.id as id, t.nombre as text")
                ->from('descripcion_palntilla t');

        if ($search_value) {
            $command->andWhere("t.nombre like '$search_value%'");
        }
        $command->limit(10);
        return $command->queryAll();
    }

    /* '''''''''-------------------------FUNCIONES EXTRA------------------------------ */
}
