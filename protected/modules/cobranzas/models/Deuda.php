<?php

Yii::import('cobranzas.models._base.BaseDeuda');

class Deuda extends BaseDeuda {

    /**
     * @return Deuda
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Deuda|Deudas', $n);
    }

    /* ---------------------------------------DE BASE---------------------------------- */

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('monto', $this->monto);
        $criteria->compare('usuario_creacion_id', $this->usuario_creacion_id);
        $criteria->compare('fecha_creacion', $this->fecha_creacion, true);
        $criteria->compare('usuario_actualizacion_id', $this->usuario_actualizacion_id);
        $criteria->compare('fecha_actualizacion', $this->fecha_actualizacion, true);
        $criteria->compare('observaciones', $this->observaciones, true);
        $criteria->compare('descripcion_palntilla_id', $this->descripcion_palntilla_id);
        $criteria->compare('cliente_id', $this->cliente_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /* ---------------------------------------SCOPES----------------------------------- */
    /* --------------------------------------CONSULTAS--------------------------------- */

    public function getDeudasCalendar() {
//        select t.id as id,
//        concat("Asignado a: ", CONCAT(c.nombre, CONCAT(" ", c.apellido)), " Tipo: Deuda", " Monto: ", CONVERT(t.monto, DECIMAL(4,2))) as title,
//        t.fecha_creacion as start,
//        t.fecha_creacion as end,
//        "['fc-event-success', 'fc-border-event-success']" as className
//        from deuda t
//        join cliente c on c.id = t.cliente_id
//        order by t.fecha_creacion ASC;
        $command = Yii::app()->db->createCommand()
                ->select("t.id as id,
        concat(\"Asignado a:\", CONCAT(c.nombre, CONCAT(\" \", c.apellido)), \" Tipo:Deuda\", \" Monto:\",CONVERT(t.monto, DECIMAL(4,2)),\"$\") as title,
        t.fecha_creacion as start,
        t.fecha_creacion as end,
        \"fc-event-danger fc-border-event-danger\" as className")
                ->from("deuda t")
                ->join("cliente c", "c.id = t.cliente_id")
                ->order("t.fecha_creacion ASC");
//        var_dump($command->queryAll());
//        die();
        return $command->queryAll();
    }

    /* '''''''''-------------------------FUNCIONES EXTRA------------------------------ */
}
