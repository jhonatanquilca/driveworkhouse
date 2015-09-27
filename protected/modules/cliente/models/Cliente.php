<?php

Yii::import('cliente.models._base.BaseCliente');

class Cliente extends BaseCliente {

    /**
     * @return Cliente
     */
    const ESTADO_ACTIVO = "ACTIVO";
    const ESTADO_INACTIVO = "INACTIVO";

    private $nombre_completo;
    private $deuda;

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
            'usuario_creacion_id' => Yii::t('app', 'Creador'),
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
            array('nombre+apellido', 'application.extensions.uniqueMultiColumnValidator.uniqueMultiColumnValidator', 'message' => 'Nombre y Apellido ya estan registrados.','on'=>'create'),
            array('usuario_creacion_id, usuario_actualizacion_id', 'numerical', 'integerOnly' => true),
            array('nombre, apellido', 'length', 'max' => 32),
            array('documento', 'length', 'max' => 20),
            array('telefono, celular', 'length', 'max' => 24),
            array('email_1, email_2', 'length', 'max' => 255),
            array('email_1, email_2', 'email'),
            array('estado', 'length', 'max' => 8),
            array('fecha_actualizacion', 'safe'),
            array('estado', 'in', 'range' => array('ACTIVO', 'INACTIVO')), // enum,
            array('documento, telefono, celular, email_1, email_2, estado, usuario_actualizacion_id, fecha_actualizacion,nombre_completo,deuda', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, nombre, apellido, documento, telefono, celular, email_1, email_2, estado, usuario_creacion_id, usuario_actualizacion_id, fecha_creacion, fecha_actualizacion,nombre_completo,deuda', 'safe', 'on' => 'search'),
        );
    }

    public function safeAttributes() {
        /* Asignación general sin dependencia de escenarios */
        return 'id, nombre, apellido, documento, telefono, celular, email_1, email_2, estado, usuario_creacion_id, usuario_actualizacion_id, fecha_creacion, fecha_actualizacion,nombre_completo,deuda';
    }

    public function search() {
        $criteria = new CDbCriteria;
        $sort = new CSort;
        $sort->multiSort = true;
        $criteria->select = '*,((select sum(d.monto) from deuda d where d.cliente_id=t.id)-(select sum(p.monto) from deuda p where p.cliente_id=t.id)) as deuda';
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
        $criteria->compare('(select sum(d.monto) from deuda d where d.cliente_id=t.id)-(select sum(p.monto) from deuda p where p.cliente_id=t.id)', $this->deuda, true);

        if (!Yii::app()->request->isAjaxRequest) {
            $criteria->order = 'CONCAT(CONCAT(t.nombre," "),t.apellido)  ASC';
        }

        $sort->attributes = array(
            'nombre_completo' => array(
                'asc' => 'CONCAT(CONCAT(t.nombre," "),t.apellido) asc',
                'desc' => 'CONCAT(CONCAT(t.nombre," "),t.apellido) desc',
                'default' => 'desc',
            ),
            'deuda' => array(
                'asc' => '(select sum(d.monto) from deuda d where d.cliente_id=t.id)-(select sum(p.monto) from deuda p where p.cliente_id=t.id) asc',
                'desc' => '(select sum(d.monto) from deuda d where d.cliente_id=t.id)-(select sum(p.monto) from deuda p where p.cliente_id=t.id) desc',
                'default' => 'desc',
            ),
            '*',
        );
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 7
            ),
            'sort' => $sort
        ));
    }

    /* -----------------------------SCOPES------------------------- */
    /* ----------------------------CONSULTAS----------------------- */

    public function getListSelect2($search_value = null) {
//        select t.id as id, CONCAT(t.nombre, CONCAT(" ", t.apellido)) as text from cliente t
//        where CONCAT(t.nombre, CONCAT(" ", t.apellido)) like 'stan%'
        $command = Yii::app()->db->createCommand()
                ->select("t.id as id,CONCAT(t.nombre, CONCAT(' ',t.apellido)) as text")
                ->from('cliente t');

        if ($search_value) {
            $command->andWhere("CONCAT(t.nombre, CONCAT(' ', t.apellido)) like '$search_value%'");
        }
        $command->limit(10);
        return $command->queryAll();
    }

    /* -------------------------FUNCIONES EXTRA-------------------- */

    public function getNombre_completo() {
        $return = $this->nombre;
        $return = $return . ($this->apellido ? ' ' . $this->apellido : '');

        $this->nombre_completo = $return;
        return $this->nombre_completo;
    }

    public function setNombre_completo($nombre_completo) {
        $this->nombre_completo = $nombre_completo;
        return $this->nombre_completo;
    }

    public function getDeuda() {
        $return = number_format(Deuda::model()->getMontoTotalByClitente($this->id) - Pago::model()->getMontoTotalByClitente($this->id), 2);
        $this->deuda = $this->id ? $return : '';
//        $this->deuda =  $return;
        return $this->deuda;
    }

    public function setDeuda($monto) {
        $this->deuda = $monto;
        return $this->deuda;
    }

}
