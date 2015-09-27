<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClienteWsController
 *
 * @author Jhonatan Quilca
 */
class ClienteWsController extends Controller {

    public function actionAdmin() {
        $model = new Cliente('search');
        $array = array();

        if (count($model->findAll()) > 0) {
            $command = Yii::app()->db->createCommand()
                    ->select('t.*,CONCAT(t.nombre, CONCAT(" ",t.apellido)) AS nombre_completo,
round((select if(ISNULL( sum(d.monto)),0, sum(d.monto)) from deuda d where d.cliente_id=t.id)-(select if(ISNULL( sum(p.monto)),0, sum(p.monto)) from pago p where p.cliente_id=t.id),2) as deuda')
                    ->from('cliente t')
                    ->order('CONCAT(t.nombre, CONCAT(" ",t.apellido)) ASC');
//            $array['data'] = $model->findAll();
            $array['data'] = $command->queryAll();
            $array['success'] = true;
        } else {
            $array['success'] = false;
        }

        print json_encode($array);
        Yii::app()->end();
    }

    public function actionSearch($param) {
//        select distinct(t.id), t.nombre, t.apellido, t.documento, t.telefono, t.celular, t.email_1, t.email_2,
//        CONCAT(t.nombre, CONCAT(" ", t.apellido)) AS nombre_completo,
//        round((select if(ISNULL( sum(d.monto)), 0, sum(d.monto)) from deuda d where d.cliente_id = t.id)-(select if(ISNULL( sum(p.monto)), 0, sum(p.monto)) from pago p where p.cliente_id = t.id), 2) as deuda
//        from cliente t
//        where CONCAT(t.nombre, CONCAT(" ", t.apellido)) LIKE "%j%" or t.documento LIKE "%j%"
//        order by CONCAT(t.nombre, CONCAT(" ", t.apellido)) ASC
        $model = new Cliente('search');
        $array = array();


        $command = Yii::app()->db->createCommand()
                ->select('distinct(t.id), t.nombre, t.apellido, t.documento, t.telefono, t.celular, t.email_1, t.email_2,
        CONCAT(t.nombre, CONCAT(" ", t.apellido)) AS nombre_completo,
        round((select if(ISNULL( sum(d.monto)), 0, sum(d.monto)) from deuda d where d.cliente_id = t.id)-(select if(ISNULL( sum(p.monto)), 0, sum(p.monto)) from pago p where p.cliente_id = t.id), 2) as deuda')
                ->from('cliente t')
                ->where('CONCAT(t.nombre, CONCAT(" ", t.apellido)) LIKE :param or t.documento LIKE :param', array(':param' => '%' . $param . '%'))
                ->order('CONCAT(t.nombre, CONCAT(" ",t.apellido)) ASC');

        if (count($command->queryAll()) > 0) {
            $array['data'] = $command->queryAll();
            $array['success'] = true;
        } else {
            $array['success'] = false;
        }

        print json_encode($array);
        Yii::app()->end();
    }

    public function actionView($id) {
        $model = Cliente::model()->findByPk($id);
        $array = array();

        if ($model !== null) {
            $model->usuario_creacion_id = Yii::app()->user->um->loadUserById($model->usuario_creacion_id)->username;
            $array['data'] = $model->attributes;
            $array['data']['nombre_completo'] = $model->nombre_completo;
            $array['data']['deuda'] = $model->deuda;
            $array['success'] = true;
        } else {
            $array['success'] = false;
        }


        print json_encode($array);
        Yii::app()->end();
    }

    public function actionCreate() {
        //$nombre, $apellido, $documento = null, $telefono = null, $celular = null, $email_1 = null, $email_2 = null, $usuario_creacion_id = null
        $model = new Cliente('create');
        $array = array();
        $_POST['Cliente'] = json_decode(file_get_contents("php://input"), true);

        $model->attributes = $_POST['Cliente'];
        $model->estado = Cliente::ESTADO_ACTIVO;
        $model->usuario_creacion_id = isset($_POST['Cliente']['usuario_creacion_id']) ? $_POST['Cliente']['usuario_creacion_id'] : 1;

        if ($model->save()) {
            $array['success'] = true;
        } else {
            $array['success'] = false;
            $array['errors'] = $model->errors;
            if (isset($array['errors']['nombre']) && isset($array['errors']['apellido']) && $array['errors']['nombre'][0] == "Nombre y Apellido ya estan registrados.") {
                $array['errors']['nombre_apellido'] = $array['errors']['nombre'];
                unset($array['errors']['nombre']);
                unset($array['errors']['apellido']);
            }
        }
        print json_encode($array);
        Yii::app()->end();
    }

    public function actionUpdate($id) {
        $model = Cliente::model()->findByPk($id);
        $array = array();


        $_POST['Cliente'] = json_decode(file_get_contents("php://input"), true);
        if ($_POST['Cliente']) {
            $model->attributes = $_POST['Cliente'];
            $model->estado = Cliente::ESTADO_ACTIVO;
            $model->usuario_actualizacion_id = isset($_POST['Cliente']['usuario_actualizacion_id']) ? $_POST['Cliente']['usuario_actualizacion_id'] : 1;

            if ($model->save()) {
                $array['success'] = true;
            } else {
                $array['success'] = false;
                $array['errors'] = $model->errors;
            }
        } else {
            if ($model !== null) {
                $model->usuario_creacion_id = Yii::app()->user->um->loadUserById($model->usuario_creacion_id)->username;
                $array['data'] = $model->attributes;
                $array['data']['nombre_completo'] = $model->nombre_completo;
                $array['data']['deuda'] = $model->deuda;
                $array['success'] = true;
            } else {
                $array['success'] = false;
            }
        }
        print json_encode($array);
        Yii::app()->end();
    }

}
