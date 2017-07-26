<?php
class KantorController extends Controller
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
                'actions'=>array('index','view','create','update','index2'),
                'users'=>array('@'),
                //'roles'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionView($id){
        $this->render('view',array(
            'model'=>$this->loadKantor($id),
        ));
    }

    public function actionCreate(){
        $model=new Kantor;

        if(isset($_POST['Kantor']))
        {
            $model->attributes=$_POST['Kantor'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->kantorID));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    public function actionUpdate($id){
        $model=$this->loadKantor($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Kantor']))
        {
            $model->attributes=$_POST['Kantor'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->kantorID));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    public function actionDelete($id){
        if(Yii::app()->request->isPostRequest)
        {
            $this->loadKantor($id)->delete();
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    public function actionIndex1(){
        $model=new Kantor('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Kantor']))
            $model->attributes=$_GET['Kantor'];

        $this->render('index1',array(
            'model'=>$model,
        ));
    }

    public function actionIndex(){
        $cabang=new Cabang('korelasi_kantor');
        $cabang->unsetAttributes();  // clear any default values
        if(isset($_GET['Cabang']))
            $cabang->attributes=$_GET['Cabang'];

        $this->render('index',array(
            'cabang'=>$cabang,
        ));
    }

    public function loadKantor($id){
        $model=Kantor::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
    * Performs the AJAX validation.
    * @param CModel the model to be validated
    */
    protected function performAjaxValidation($model){
        if(isset($_POST['ajax']) && $_POST['ajax']==='kantor-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}