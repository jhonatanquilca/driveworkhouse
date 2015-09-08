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

//put your code here
    public function actions() {
        return array(
            'webService' => array('class' => 'CWebServiceAction',),
        );
    }

    /**
     * sccion para visualizar todos los elemetos
      @return string                       <----- defines tipo de retorno
      @soap                                <----- declara este metodo como "remoto"
     */
    public function admin() {
        $model = new Cliente('search');
        $array = array();

        if (!empty($model->findAll())) {
            $command=  Yii::app()->db->createCommand()
                    ->select('t.*,CONCAT(t.nombre, CONCAT(" ",t.apellido)) AS nombre_completo')
                    ->from('cliente t')
                    ->order('CONCAT(t.nombre, CONCAT(" ",t.apellido)) ASC');
//            $array['data'] = $model->findAll();
            $array['data'] = $command->queryAll();
            $array['success'] = true;
        } else {
            $array['success'] = false;
        }

        return json_encode($array);
    }

    /**
     * accion para la vista informacion de un cliente
     * @param string $id              <----- id de cliente
      @return string                       <----- defines tipo de retorno
      @soap                                <----- declara este metodo como "remoto"
     */
    public function view($id) {
        $model = Cliente::model()->findByPk($id);
        $array = array();

        if ($model !== null) {
            $array['data'] = $model->attributes;
            $array['success'] = true;
        } else {
            $array['success'] = false;
        }


        return json_encode($array);
    }

    /**
     * accion para crear un nuevo cliente
     * @param string $nombre
     * @param string $apellido
     * @param string $documento 
     * @param string $telefono 
     * @param string $celular 
     * @param string $email_1 
     * @param string $email_2 
     * @param string $usuario_creacion_id 
      @return string                       <----- defines tipo de retorno
      @soap                                <----- declara este metodo como "remoto"
     */
    public function create($nombre, $apellido, $documento = null, $telefono = null, $celular = null, $email_1 = null, $email_2 = null, $usuario_creacion_id = null) {
        $model = new Cliente;
        $array = array();

        $model->nombre = $nombre;
        $model->apellido = $apellido;
        $model->documento = $documento;
        $model->telefono = $telefono;
        $model->celular = $celular;
        $model->email_1 = $email_1;
        $model->email_2 = $email_2;
        $model->estado = Cliente::ESTADO_ACTIVO;
        $model->usuario_creacion_id = $usuario_creacion_id ? $usuario_creacion_id : 1;
        if ($model->save()) {
            $array['success'] = true;
        } else {
            $array['success'] = false;
            $array['errors'] = $model->errors;
        }
        return json_encode($array);
    }

    /**
     * accion para actualizar un nuevo cliente
     * @param string $id
     * @param string $nombre
     * @param string $apellido
     * @param string $documento 
     * @param string $telefono 
     * @param string $celular 
     * @param string $email_1 
     * @param string $email_2 
     * @param string $usuario_actualizacion_id 
      @return string                       <----- defines tipo de retorno
      @soap                                <----- declara este metodo como "remoto"
     */
    public function update($id, $nombre, $apellido, $documento = null, $telefono = null, $celular = null, $email_1 = null, $email_2 = null, $usuario_actualizacion_id = null) {
        $model = Cliente::model()->findByPk($id);
        $array = array();

        $model->nombre = $nombre;
        $model->apellido = $apellido;
        $model->documento = $documento;
        $model->telefono = $telefono;
        $model->celular = $celular;
        $model->email_1 = $email_1;
        $model->email_2 = $email_2;
        $model->usuario_actualizacion_id = $usuario_actualizacion_id ? $usuario_actualizacion_id : 1;
        if ($model->save()) {
            $array['success'] = true;
        } else {
            $array['success'] = false;
            $array['errors'] = $model->errors;
        }
        return json_encode($array);
    }

}
