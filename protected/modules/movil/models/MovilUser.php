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

    public function rules() {
        return array(
            array('id_dispositivo', 'required'),
            array('id_dispositivo', 'unique', 'message' => 'Dispositivo ya existe', 'on' => 'create'),
            array('id_user', 'numerical', 'integerOnly' => true),
            array('id_dispositivo', 'length', 'max' => 45),
            array('estado', 'length', 'max' => 3),
            array('estado', 'in', 'range' => array('IN', 'OUT')), // enum,
            array('id_user, estado', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id_dispositivo, id_user, estado', 'safe', 'on' => 'search'),
        );
    }

    /* ---------------------------------------SCOPES----------------------------------- */
    /* --------------------------------------CONSULTAS--------------------------------- */
    /* '''''''''-------------------------FUNCIONES EXTRA------------------------------ */
}
