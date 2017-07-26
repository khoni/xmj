<?php
class Biaya_pusatController extends Controller
{
    public $layout='//layouts/column2_right_content';

    public function filters(){
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules(){
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('index'),
                'users'=>array('@'),
                //'roles'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex(){
        $model=BiayaPusat::model()->find();
		if(empty($model))
			throw new CHttpException(404,'Biaya Pusat Kosong');

        if(isset($_POST['BiayaPusat'])){
            $model->attributes=$_POST['BiayaPusat'];
			$model->save();
		}

        $this->render('index',array(
            'model'=>$model,
        ));
    }

    public function loadModel($id){
        $model=BiayaPusat::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
    * Performs the AJAX validation.
    * @param CModel the model to be validated
    */
    protected function performAjaxValidation($model){
        if(isset($_POST['ajax']) && $_POST['ajax']==='biaya-pusat-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}