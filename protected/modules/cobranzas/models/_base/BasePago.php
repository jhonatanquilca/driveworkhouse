<?php

/**
 * This is the model base class for the table "pago".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Pago".
 *
 * Columns in table "pago" available as properties of the model,
 * followed by relations of table "pago" available as properties of the model.
 *
 * @property integer $id
 * @property double $monto
 * @property integer $usuario_creacion_id
 * @property string $fecha_creacion
 * @property integer $usuario_actualizacion
 * @property string $fecha_actualizacion
 * @property string $obserbaciones
 * @property integer $descripcion_palntilla_id
 * @property integer $cliente_id
 *
 * @property Cliente $cliente
 * @property DescripcionPalntilla $descripcionPalntilla
 */
abstract class BasePago extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'pago';
    }

    public static function representingColumn() {
        return 'fecha_creacion';
    }

    public function rules() {
        return array(
            array('monto, usuario_creacion_id, cliente_id', 'required'),
            array('usuario_creacion_id, usuario_actualizacion, descripcion_palntilla_id, cliente_id', 'numerical', 'integerOnly'=>true),
            array('monto', 'numerical'),
            array('fecha_actualizacion, obserbaciones', 'safe'),
            array('usuario_actualizacion, fecha_actualizacion, obserbaciones, descripcion_palntilla_id', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, monto, usuario_creacion_id, fecha_creacion, usuario_actualizacion, fecha_actualizacion, obserbaciones, descripcion_palntilla_id, cliente_id', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'cliente' => array(self::BELONGS_TO, 'Cliente', 'cliente_id'),
            'descripcionPalntilla' => array(self::BELONGS_TO, 'DescripcionPalntilla', 'descripcion_palntilla_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id' => Yii::t('app', 'ID'),
                'monto' => Yii::t('app', 'Monto'),
                'usuario_creacion_id' => Yii::t('app', 'Usuario Creacion'),
                'fecha_creacion' => Yii::t('app', 'Fecha Creacion'),
                'usuario_actualizacion' => Yii::t('app', 'Usuario Actualizacion'),
                'fecha_actualizacion' => Yii::t('app', 'Fecha Actualizacion'),
                'obserbaciones' => Yii::t('app', 'Obserbaciones'),
                'descripcion_palntilla_id' => Yii::t('app', 'Descripcion Palntilla'),
                'cliente_id' => Yii::t('app', 'Cliente'),
                'cliente' => null,
                'descripcionPalntilla' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('monto', $this->monto);
        $criteria->compare('usuario_creacion_id', $this->usuario_creacion_id);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('usuario_actualizacion', $this->usuario_actualizacion);
        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);
        $criteria->compare('obserbaciones', $this->obserbaciones, true);
        $criteria->compare('descripcion_palntilla_id', $this->descripcion_palntilla_id);
        $criteria->compare('cliente_id', $this->cliente_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'fecha_creacion',
                'updateAttribute' => 'fecha_actualizacion',
                'timestampExpression' => new CDbExpression('NOW()'),
            )
        ), parent::behaviors());
    }
}