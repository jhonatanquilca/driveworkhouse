<?php

Yii::import('movil.models._base.BaseMovilUser');

class MovilUser extends BaseMovilUser {

    /**
     * @return MovilUser
     */
    const ESTADO_IN = "IN";
    const ESTADO_OUT = "OUT";

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'MovilUser|MovilUsers', $n);
    }

    /* ---------------------------------------DE BASE---------------------------------- */
    /* ---------------------------------------SCOPES----------------------------------- */
    /* --------------------------------------CONSULTAS--------------------------------- */
    /* '''''''''-------------------------FUNCIONES EXTRA------------------------------ */
}
