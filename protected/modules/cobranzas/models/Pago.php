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

    /* '''''''''-------------------------FUNCIONES EXTRA------------------------------ */
}
