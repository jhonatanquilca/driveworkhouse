<?php

Yii::import('cliente.models._base.BaseCliente');

class Cliente extends BaseCliente {

    /**
     * @return Cliente
     */
    const ESTADO_ACTIVO = "ACTIVO";
    const ESTADO_INACTIVO = "INACTIVO";

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Cliente|Clientes', $n);
    }

    /* -----------------------------DE BASE------------------------ */

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'apellido' => Yii::t('app', 'Apellido'),
            'documento' => Yii::t('app', 'Cédula'),
            'telefono' => Yii::t('app', 'Teléfono'),
            'celular' => Yii::t('app', 'Celular'),
            'email_1' => Yii::t('app', 'Email Principal'),
            'email_2' => Yii::t('app', 'Email Secundario'),
            'estado' => Yii::t('app', 'Estado'),
            'usuario_creacion_id' => Yii::t('app', 'Usuario Creación'),
            'usuario_actualizacion_id' => Yii::t('app', 'Usuario Actualización'),
            'fecha_creacion' => Yii::t('app', 'Fecha Creación'),
            'fecha_actualizacion' => Yii::t('app', 'Fecha Actualización'),
            'deudas' => null,
            'pagos' => null,
        );
    }
    

    /* -----------------------------SCOPES------------------------- */
    /* ----------------------------CONSULTAS----------------------- */
}
