<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CrugeWs
 *
 * @author Jhonatan Quilca
 */
class UiWsController extends Controller {

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

    public function actionLogin() {
        $array = array();
        //        url
//       http://localhost/driveworkhouse/cruge/uiWs/login/CrugeLogon[username]/admin/CrugeLogon[password]/adm/CrugeLogon[rememberMe]/0

        $model = Yii::app()->user->um->getNewCrugeLogon('login');

        // por ahora solo un metodo de autenticacion por vez es usado, aunque sea un array en config/main
        //
        $model->authMode = CrugeFactory::get()->getConfiguredAuthMethodName();

//        Yii::app()->user->setFlash('loginflash', null);//nose que hace

        Yii::log(__CLASS__ . "\nactionLogin\n", "info");

        if (isset($_GET[CrugeUtil::config()->postNameMappings['CrugeLogon']])) {
//        if (isset($_POST[CrugeUtil::config()->postNameMappings['CrugeLogon']])) {
            $model->attributes = $_GET[CrugeUtil::config()->postNameMappings['CrugeLogon']];

//            $model->attributes = $_POST[CrugeUtil::config()->postNameMappings['CrugeLogon']];
            if ($model->validate()) {
                if ($model->login(false) == true) {
//                    var_dump(Yii::app()->user->id);
//                    die();
                    Yii::log(__CLASS__ . "\nCrugeLogon->login() returns true\n", "info");

                    // a modo de conocimiento, Yii::app()->user->returnUrl es
                    // establecida automaticamente por CAccessControlFilter cuando
                    // preFilter llama a accessDenied quien a su vez llama a
                    // CWebUser::loginRequired que es donde finalmente se llama a setReturnUrl
//                    $this->redirect(Yii::app()->user->returnUrl);
                    $array['success'] = true;
                    $array['data'] = $model->attributes;
                } else {
                    $array['success'] = false;
                    $array['last'] = "Last error";
                    $array['errors'] = $model->errors;
                    $array['errors2'] = Yii::app()->user->getLastError();
//                    Yii::app()->user->setFlash('loginflash', Yii::app()->user->getLastError());
                }
            } else {
                $array['success'] = false;
                $array['errors'] = $model->errors;
            }
        }
        print json_encode($array);
        Yii::app()->end();
    }

    public function actionLogout() {
//        url
//        http://localhost/driveworkhouse/cruge/uiWs/logout
        $array = array();
        // retorna false si ocurrio un error O si el filtro de sesion
        // dispone de onBeforeLogin el cual ha retornado false.
        if (Yii::app()->user->logout() == false) {
            $array['success'] = false;
            $array['message'] = "No se ha iniciado sesión.";
        } else {//si cerro la seccion
            $array['success'] = true;
            $array['message'] = "La sesión se ha cerrado con exito.";
        }
        print json_encode($array);
        Yii::app()->end();
    }

}
