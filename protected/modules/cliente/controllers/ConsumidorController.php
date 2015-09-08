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

    public function actionCreate() {
        $baseUrl = Yii::app()->baseUrl;
        // Llamada al WebService
        $client = new SoapClient(Yii::app()->getBaseUrl(true) . "/cliente/clienteWs/webService");
        $result = $client->create('Andres', 'Benavides', null, '2 939 944', null, 'abc@asd.as', null, null);

        echo $result;
    }

    public function actionUpdate($id) {
        $baseUrl = Yii::app()->baseUrl;
        // Llamada al WebService
        $client = new SoapClient(Yii::app()->getBaseUrl(true) . "/cliente/clienteWs/webService");

        $result = $client->update($id, 'Andres', 'Salazar Cordova', null, '2 939 944', null, 'abc@asd.as', null, null);
        echo $result;
    }

}
