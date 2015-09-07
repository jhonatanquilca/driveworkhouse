<?php

class ConsumidorController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionAdmin() {
        $baseUrl = Yii::app()->baseUrl;
        // Llamada al WebService
        $client = new SoapClient(Yii::app()->getBaseUrl(true) . "/cliente/clienteWs/webService");
        $result = $client->admin();
        echo $result;
    }
    public function actionView($id) {
        $baseUrl = Yii::app()->baseUrl;
        // Llamada al WebService
        $client = new SoapClient(Yii::app()->getBaseUrl(true) . "/cliente/clienteWs/webService");
        $result = $client->view($id);
        echo $result;
    }

}
