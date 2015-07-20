<?php

Yii::import('cliente.models._base.BaseCliente');

class Cliente extends BaseCliente {

    /**
     * @return Cliente
     */
    const ESTADO_ACTIVO = "ACTIVO";
    const ESTADO_INACTIVO = "INACTIVO";

    private $nombre_completo;

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
            'nombre_completo' => Yii::t('app', 'Cliente'),
        );
    }

    public function rules() {
        return array(
            array('nombre, apellido, usuario_creacion_id', 'required'),
            array('usuario_creacion_id, usuario_actualizacion_id', 'numerical', 'integerOnly' => true),
            array('nombre, apellido', 'length', 'max' => 32),
            array('documento', 'length', 'max' => 20),
            array('telefono, celular', 'length', 'max' => 24),
            array('email_1, email_2', 'length', 'max' => 255),
            array('estado', 'length', 'max' => 8),
            array('fecha_actualizacion', 'safe'),
            array('estado', 'in', 'range' => array('ACTIVO', 'INACTIVO')), // enum,
            array('documento, telefono, celular, email_1, email_2, estado, usuario_actualizacion_id, fecha_actualizacion', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, nombre, apellido, documento, telefono, celular, email_1, email_2, estado, usuario_creacion_id, usuario_actualizacion_id, fecha_creacion, fecha_actualizacion', 'safe', 'on' => 'search'),
            array('nombre_completo', 'safe', 'on' => 'search'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;
        $sort = new CSort;
        $sort->multiSort = true;

        $criteria->compare('id', $this->id);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('apellido', $this->apellido, true);
        $criteria->compare('documento', $this->documento, true);
        $criteria->compare('telefono', $this->telefono, true);
        $criteria->compare('celular', $this->celular, true);
        $criteria->compare('email_1', $this->email_1, true);
        $criteria->compare('email_2', $this->email_2, true);
        $criteria->compare('estado', $this->estado, true);
        $criteria->compare('usuario_creacion_id', $this->usuario_creacion_id);
        $criteria->compare('usuario_actualizacion_id', $this->usuario_actualizacion_id);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);
        $criteria->compare('CONCAT(t.nombre, CONCAT(" ",t.apellido))', $this->nombre_completo, true);

        $sort->attributes = array(
            '*',
            'nombre_completo' => array(
                'asc' => 'CONCAT(CONCAT(t.nombre," "),t.apellido) asc',
                'desc' => 'CONCAT(CONCAT(t.nombre," "),t.apellido) desc',
                'default' => 'desc',
            ),
        );
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => $sort
        ));
    }

    /* -----------------------------SCOPES------------------------- */
    /* ----------------------------CONSULTAS----------------------- */
    /* -------------------------FUNCIONES EXTRA-------------------- */

    public function getNombre_completo() {
        $return = $this->nombre;
        $return = $return.($this->apellido?' '.$this->apellido:'');
        
        $this->nombre_completo = $return;
        return $this->nombre_completo;
    }

    public function setNombre_completo($nombre_completo) {
        $this->nombre_completo = $nombre_completo;
        return $this->nombre_completo;
    }

}
