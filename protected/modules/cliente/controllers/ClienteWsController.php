<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClienteWsController
 *
 * @author Administrador
 */
class ClienteWsController extends Controller {

    //put your code here
    public function actions() {
        return array(
            'webService' => array('class' => 'CWebServiceAction',),
        );
    }

    /**
      @return string                       <----- defines tipo de retorno
      @soap                                <----- declara este metodo como "remoto"
     */
    public function admin() {
        $model = new Cliente('search');
        return json_encode($model->findAll());
    }

    /**
     * @param string $id              <----- id de cliente
      @return string                       <----- defines tipo de retorno
      @soap                                <----- declara este metodo como "remoto"
     */
    public function view($id) {
        $model = new Cliente;
        $model = $model->findByPk($id);
        return json_encode($model->attributes);
    }

}
