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
//                    $json=new PaseJson($success,data,$errorsData);
//                    $json->addExtraData($key,$value);
                    $array['data'] = $model->attributes;
                    $array['user'] = Yii::app()->user->um->loadUser($model->username, true)->attributes;
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
