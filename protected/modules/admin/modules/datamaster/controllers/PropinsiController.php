<?php
class PropinsiController extends Controller
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
                'actions'=>array('index','view','create','update'),
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
            'model'=>$this->loadModel($id),
        ));
    }

    public function actionCreate(){
        $model=new Propinsi;

        if(isset($_POST['Propinsi']))
        {
            $model->attributes=$_POST['Propinsi'];
			$model->updated_at=time();
			$model->updated_by=Yii::app()->user->id;
            if($model->save())
                $this->redirect(array('view','id'=>$model->propinsiID));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    public function actionUpdate($id){
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Propinsi']))
        {
            $model->attributes=$_POST['Propinsi'];
			$model->updated_at=time();
			$model->updated_by=Yii::app()->user->id;
            if($model->save())
                $this->redirect(array('view','id'=>$model->propinsiID));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    public function actionDelete($id){
        if(Yii::app()->request->isPostRequest)
        {
            $this->loadModel($id)->delete();
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    public function actionIndex(){
        $model=new Propinsi('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Propinsi']))
            $model->attributes=$_GET['Propinsi'];

        $this->render('index',array(
            'model'=>$model,
        ));
    }

    public function loadModel($id){
        $model=Propinsi::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
    * Performs the AJAX validation.
    * @param CModel the model to be validated
    */
    protected function performAjaxValidation($model){
        if(isset($_POST['ajax']) && $_POST['ajax']==='propinsi-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}