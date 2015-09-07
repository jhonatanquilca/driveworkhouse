<?php

Yii::import('cobranzas.models._base.BasePago');

class Pago extends BasePago {

    /**
     * @return Pago
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Pago|Pagos', $n);
    }

    /* ---------------------------------------DE BASE---------------------------------- */

    public function search() {
        $criteria = new CDbCriteria;
        $sort = new CSort;
        $sort->multiSort = true;

        $criteria->with = array('cliente');

        $criteria->compare('id', $this->id);
        $criteria->compare('monto', $this->monto);
        $criteria->compare('usuario_creacion_id', $this->usuario_creacion_id);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('usuario_actualizacion', $this->usuario_actualizacion);
        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);
        $criteria->compare('obserbaciones', $this->obserbaciones, true);
        $criteria->compare('descripcion_palntilla_id', $this->descripcion_palntilla_id);
//        $criteria->compare('cliente_id', $this->cliente_id);

        $criteria->compare('CONCAT(cliente.nombre, CONCAT(" ",cliente.apellido))', $this->cliente_id);

        if (!Yii::app()->request->isAjaxRequest) {
            $criteria->order = 't.fecha_creacion DESC';
        }

        $sort->attributes = array(
            'cliente_id' => array(
                'asc' => 'CONCAT(CONCAT(cliente.nombre," "),cliente.apellido) asc',
                'desc' => 'CONCAT(CONCAT(cliente.nombre," "),cliente.apellido) desc',
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

    /* ---------------------------------------SCOPES----------------------------------- */
    /* --------------------------------------CONSULTAS--------------------------------- */

    public function getPagosCalendar() {
//        select t.id as id,
//        concat("Asignado a: ", CONCAT(c.nombre, CONCAT(" ", c.apellido)), " Tipo: Deuda", " Monto: ", CONVERT(t.monto, DECIMAL(4, 2))) as title,
//        t.fecha_creacion as start,
//        t.fecha_creacion as end,
//        "['fc-event-danger', 'fc-border-event-danger']" as className
//        from pago t
//        join cliente c on c.id = t.cliente_id
//        order by t.fecha_creacion ASC;
        $command = Yii::app()->db->createCommand()
                ->select("t.id as id,
        concat(\"Asignado a:\", CONCAT(c.nombre, CONCAT(\" \", c.apellido)), \" Tipo:Pago\", \" Monto:\",CONVERT(t.monto, DECIMAL(4,2)),\"$\") as title,
        t.fecha_creacion as start,
        t.fecha_creacion as end,
        \"fc-event-success fc-border-event-success\" as className")
                ->from("pago t")
                ->join("cliente c", "c.id = t.cliente_id")
                ->order("t.fecha_creacion ASC");
//        var_dump($command->queryAll());
//        die();
        return $command->queryAll();
    }

    public function getMontoTotalByClitente($clinete_id) {
//        select sum(t.monto) from pago t where t.cliente_id=13;
        $command = Yii::app()->db->createCommand()
                ->select('sum(t.monto) as total')
                ->from('pago t')
                ->where('t.cliente_id=:cliente_id', array(':cliente_id' => $clinete_id));
        return $command->queryRow()['total'];
    }

    /* '''''''''-------------------------FUNCIONES EXTRA------------------------------ */
}
