<?php

/**
 * Description of MovilUserWsController
 *
 * @author Jhonatan Quilca
 */
class MovilUserWsController extends Controller {

    public function actionCreate() {
        $model = new MovilUser('create');
        $array = array();
        $_POST['MovilUser'] = json_decode(file_get_contents("php://input"), true);

        $model->attributes = $_POST['MovilUser'];
        $model->estado = MovilUser::ESTADO_OUT;

        if ($model->save()) {
            $array['success'] = true;
        } else {
            $array['success'] = false;
            $array['errors'] = $model->errors;
        }
        print json_encode($array);
        Yii::app()->end();
    }

    public function actionUpdate($id) {
        $model = MovilUser::model()->findByPk($id != 2 ? $id : 0);
        $array = array();


        $_POST['MovilUser'] = json_decode(file_get_contents("php://input"), true);
        if ($_POST['MovilUser']) {
            $model->attributes = $_POST['MovilUser'];
//            $model->estado = MovilUser::ESTADO_;
            if ($model->save()) {
                $array['success'] = true;
            } else {
                $array['success'] = false;
                $array['errors'] = $model->errors;
            }
        }
        print json_encode($array);
        Yii::app()->end();
    }

    public function actionView($id) {
        $model = MovilUser::model()->findByPk($id != 2 ? $id : 0);
        $array = array();
        if ($model != null) {
            $array['data'] = $model->attributes;
            $array['user'] = Yii::app()->user->um->loadUserById($model->id_user) ? Yii::app()->user->um->loadUserById($model->id_user)->attributes : '';
            $array['success'] = true;
        } else {
            $array['success'] = false;
        }

        print json_encode($array);
        Yii::app()->end();
    }

}
